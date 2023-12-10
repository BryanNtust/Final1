const APP_ID = "8b132c316bb0446989b277e14b5421ee"

let uid = sessionStorage.getItem('uid')
if(!uid){
    uid = String(Math.floor(Math.random() * 10000))
    sessionStorage.setItem('uid', uid)
}

let token = null;
let client;

let rtmClient;
let channel;

const queryString = window.location.search
const urlParams = new URLSearchParams(queryString)
let roomId = urlParams.get('room')

if(!roomId){
    roomId = 'main'
    var Media = navigator.mediaDevices.getUserMedia 
}

let displayName = sessionStorage.getItem('display_name')
if(!displayName){
   window.location = 'lobby.php'
}

let localTracks = []
let remoteUsers = {}

let localScreenTracks;
let sharingScreen = false;

let joinRoomInit = async () => {
    rtmClient = await AgoraRTM.createInstance(APP_ID)
    await rtmClient.login({uid,token})

    await rtmClient.addOrUpdateLocalUserAttributes({'name':displayName})

    channel = await rtmClient.createChannel(roomId)
    await channel.join()

    channel.on('MemberJoined', handleMemberJoined)
    channel.on('MemberLeft', handleMemberLeft)
    channel.on('ChannelMessage', handleChannelMessage)

    getMembers()
    addBotMessageToDom(`歡迎 ${displayName} 加入直播間! 👋`)

    client = AgoraRTC.createClient({mode:'rtc', codec:'vp8'})
    await client.join(APP_ID, roomId, token, uid)

    client.on('user-published', handleUserPublished)
    client.on('user-left', handleUserLeft)
}

let joinStream = async () => {
    document.getElementById('join-btn').style.display = 'none'
    document.getElementsByClassName('stream__actions')[0].style.display = 'flex'

    localTracks = await AgoraRTC.createMicrophoneAndCameraTracks({}, {encoderConfig:{
        width:{min:640, ideal:1920, max:1920},
        height:{min:480, ideal:1080, max:1080}
    }})


    let player = `<div class="video__container" id="user-container-${uid}">
                    <div class="video-player" id="user-${uid}"></div>
                 </div>`

    document.getElementById('streams__container').insertAdjacentHTML('beforeend', player)
    document.getElementById(`user-container-${uid}`).addEventListener('click', expandVideoFrame)

    localTracks[1].play(`user-${uid}`)
    await client.publish([localTracks[0], localTracks[1]])
}

let switchToCamera = async () => {
    let player = `<div class="video__container" id="user-container-${uid}">
                    <div class="video-player" id="user-${uid}"></div>
                 </div>`
    displayFrame.insertAdjacentHTML('beforeend', player)

    await localTracks[0].setMuted(true)
    await localTracks[1].setMuted(true)

    document.getElementById('mic-btn').classList.remove('active')
    document.getElementById('screen-btn').classList.remove('active')

    localTracks[1].play(`user-${uid}`)
    await client.publish([localTracks[1]])
}

let handleUserPublished = async (user, mediaType) => {
    remoteUsers[user.uid] = user

    await client.subscribe(user, mediaType)

    let player = document.getElementById(`user-container-${user.uid}`)
    if(player === null){
        player = `<div class="video__container" id="user-container-${user.uid}">
                <div class="video-player" id="user-${user.uid}"></div>
            </div>`

        document.getElementById('streams__container').insertAdjacentHTML('beforeend', player)
        document.getElementById(`user-container-${user.uid}`).addEventListener('click', expandVideoFrame)
   
    }

    if(displayFrame.style.display){
        let videoFrame = document.getElementById(`user-container-${user.uid}`)
        videoFrame.style.height = '100px'
        videoFrame.style.width = '100px'
    }

    if(mediaType === 'video'){
        user.videoTrack.play(`user-${user.uid}`)
    }

    if(mediaType === 'audio'){
        user.audioTrack.play()
    }

}

let handleUserLeft = async (user) => {
    delete remoteUsers[user.uid]
    let item = document.getElementById(`user-container-${user.uid}`)
    if(item){
        item.remove()
    }

    if(userIdInDisplayFrame === `user-container-${user.uid}`){
        displayFrame.style.display = null
        
        let videoFrames = document.getElementsByClassName('video__container')

        for(let i = 0; videoFrames.length > i; i++){
            videoFrames[i].style.height = '300px'
            videoFrames[i].style.width = '300px'
        }
    }
}

let toggleMic = async (e) => {
    let button = e.currentTarget

    if(localTracks[0].muted){
        await localTracks[0].setMuted(false)
        button.classList.add('active')
    }else{
        await localTracks[0].setMuted(true)
        button.classList.remove('active')
    }
}

let toggleCamera = async (e) => {
    let button = e.currentTarget

    if(localTracks[1].muted){
        await localTracks[1].setMuted(false)
        button.classList.add('active')
    }else{
        await localTracks[1].setMuted(true)
        button.classList.remove('active')
    }
}

let toggleScreen = async (e) => {
    let screenButton = e.currentTarget
    let cameraButton = document.getElementById('camera-btn')

    if(!sharingScreen){
        sharingScreen = true

        screenButton.classList.add('active')
        cameraButton.classList.remove('active')
        cameraButton.style.display = 'none'

        localScreenTracks = await AgoraRTC.createScreenVideoTrack()

        document.getElementById(`user-container-${uid}`).remove()
        displayFrame.style.display = 'block'

        let player = `<div class="video__container" id="user-container-${uid}">
                <div class="video-player" id="user-${uid}"></div>
            </div>`

        displayFrame.insertAdjacentHTML('beforeend', player)
        document.getElementById(`user-container-${uid}`).addEventListener('click', expandVideoFrame)

        userIdInDisplayFrame = `user-container-${uid}`
        localScreenTracks.play(`user-${uid}`)

        await client.unpublish([localTracks[1]])
        await client.publish([localScreenTracks])

        let videoFrames = document.getElementsByClassName('video__container')
        for(let i = 0; videoFrames.length > i; i++){
            if(videoFrames[i].id != userIdInDisplayFrame){
              videoFrames[i].style.height = '100px'
              videoFrames[i].style.width = '100px'
            }
          }


    }else{
        sharingScreen = false 
        cameraButton.style.display = 'block'
        document.getElementById(`user-container-${uid}`).remove()
        await client.unpublish([localScreenTracks])

        switchToCamera()
    }
}

let leaveStream = async (e) => {
    e.preventDefault()

    document.getElementById('join-btn').style.display = 'block'
    document.getElementsByClassName('stream__actions')[0].style.display = 'none'

    for(let i = 0; localTracks.length > i; i++){
        localTracks[i].stop()
        localTracks[i].close()
    }

    await client.unpublish([localTracks[0], localTracks[1]])

    if(localScreenTracks){
        await client.unpublish([localScreenTracks])
    }

    document.getElementById(`user-container-${uid}`).remove()

    if(userIdInDisplayFrame === `user-container-${uid}`){
        displayFrame.style.display = null

        for(let i = 0; videoFrames.length > i; i++){
            videoFrames[i].style.height = '300px'
            videoFrames[i].style.width = '300px'
        }
    }

    channel.sendMessage({text:JSON.stringify({'type':'user_left', 'uid':uid})})
}

document.addEventListener('DOMContentLoaded', function() {
    const btn1 = document.getElementById('camera-btn');
    const btn2 = document.getElementById('mic-btn');
    const btn3 = document.getElementById('screen-btn');
    const btn4 = document.getElementById('leave-btn');
    const btn5 = document.getElementById('donate-btn');
    const returnBtn = document.getElementById('return-btn');
    const sticker1Btn = document.getElementById('sticker1');
    const sticker2Btn = document.getElementById('sticker2');
    const sticker3Btn = document.getElementById('sticker3');
    const sticker4Btn = document.getElementById('sticker4');
    const sticker5Btn = document.getElementById('sticker5');
    const sticker6Btn = document.getElementById('sticker6');
    const stickerContainer = document.getElementById('sticker-container');
    const stickerSound = new Audio('sound/donate.mp3');

    // 点击 donate-btn 时
    btn5.addEventListener('click', function() {
        // 隐藏原始按钮
        btn5.style.display = 'none';
        // 显示返回按钮和贴图按钮
        returnBtn.style.display = 'block';
        sticker1Btn.style.display = 'block';
        sticker2Btn.style.display = 'block';
        sticker3Btn.style.display = 'block';
        sticker4Btn.style.display = 'block';
        sticker5Btn.style.display = 'block';
        sticker6Btn.style.display = 'block';
    });

    // 点击返回按钮时
    returnBtn.addEventListener('click', function() {
        // 显示原始按钮
        btn5.style.display = 'flex';

        // 隐藏返回按钮和贴图按钮
        returnBtn.style.display = 'none';
        sticker1Btn.style.display = 'none';
        sticker2Btn.style.display = 'none';
        sticker3Btn.style.display = 'none';
        sticker4Btn.style.display = 'none';
        sticker5Btn.style.display = 'none';
        sticker6Btn.style.display = 'none';
    });
  
  
    // 在直播画面上显示选定的贴图
    function handleStickerClick(stickerSrc) {
        // 创建一个 <img> 元素
        const stickerElement = document.createElement('img');
        stickerElement.src = stickerSrc;
        stickerElement.style.maxWidth = '100px'; // 最大寬度為100像素
        stickerElement.style.maxHeight = '100px'; // 最大高度為100像素
    
        // 为贴图元素生成一个唯一的 ID
        const stickerId = 'sticker-' + Date.now();
        stickerElement.id = stickerId;
    
        // 将贴图添加到贴图容器
        stickerContainer.appendChild(stickerElement);
    
        // 在5秒后自动移除贴图
        setTimeout(function() {
            // 通过 ID 获取贴图元素并移除
            const elementToRemove = document.getElementById(stickerId);
            if (elementToRemove) {
                stickerContainer.removeChild(elementToRemove);
            }
        }, 5000);
    }

    // 点击贴图按钮时，分别处理不同的贴图点击事件
    sticker1Btn.addEventListener('click', function() {
        const message = JSON.stringify({ type: 'sticker', src: 'images/sticker/pa.png' });
        channel.sendMessage({ text: message });
        handleStickerClick('images/sticker/pa.png');
        stickerSound.play();
        addBotMessageToDom(`感謝 ${displayName} 的100元贊助! 👋`)
    });
    sticker2Btn.addEventListener('click', function() {
        const message = JSON.stringify({ type: 'sticker', src: 'images/sticker/hentai.png' });
        channel.sendMessage({ text: message });
        handleStickerClick('images/sticker/hentai.png');
        stickerSound.play();
        addBotMessageToDom(`感謝 ${displayName} 的300元贊助! 👋`)
    });
    sticker3Btn.addEventListener('click', function() {
        const message = JSON.stringify({ type: 'sticker', src: 'images/sticker/doge.png' });
        channel.sendMessage({ text: message });
        handleStickerClick('images/sticker/doge.png');
        stickerSound.play();
        addBotMessageToDom(`感謝 ${displayName} 的500元贊助! 👋`)
    });
    sticker4Btn.addEventListener('click', function() {
        const message = JSON.stringify({ type: 'sticker', src: 'images/sticker/arona.png' });
        channel.sendMessage({ text: message });
        handleStickerClick('images/sticker/arona.png');
        stickerSound.play();
        addBotMessageToDom(`感謝 ${displayName} 的1000元贊助! 👋`)
    });
    sticker5Btn.addEventListener('click', function() {
        const message = JSON.stringify({ type: 'sticker', src: 'images/sticker/azusa.png' });
        channel.sendMessage({ text: message });
        handleStickerClick('images/sticker/azusa.png');
        stickerSound.play();
        addBotMessageToDom(`感謝 ${displayName} 的1500元贊助! 👋`)
    });
    sticker6Btn.addEventListener('click', function() {
        const message = JSON.stringify({ type: 'sticker', src: 'images/sticker/party-parrot-rgb-rainbow-dance-cool.gif' });
        channel.sendMessage({ text: message });
        handleStickerClick('images/sticker/party-parrot-rgb-rainbow-dance-cool.gif');
        stickerSound.play();
        addBotMessageToDom(`感謝 ${displayName} 的3000元贊助! 👋`)
    });
});

document.getElementById('camera-btn').addEventListener('click', toggleCamera)
document.getElementById('mic-btn').addEventListener('click', toggleMic)
document.getElementById('screen-btn').addEventListener('click', toggleScreen)
document.getElementById('join-btn').addEventListener('click', joinStream)
document.getElementById('leave-btn').addEventListener('click', leaveStream)


joinRoomInit()