<?php 
include "db_conn.php";
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Home</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="Home.css" media="screen">
    <link rel='stylesheet' type='text/css' media='screen' href='styles/main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='styles/lobby.css'>
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.0.3, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <script type="application/ld+json">
        {
      "@context": "http://schema.org",
      "@type": "Organization",
      "name": ""
      }
    </script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Home">
    <meta property="og:type" content="website">
    <meta data-intl-tel-input-cdn-path="intlTelInput/">
  </head>
  <body data-path-to-root="./" data-include-products="true" class="u-body u-xl-mode" data-lang="en">
    <header class="u-clearfix u-custom-color-1 u-header u-header" id="sec-c525">
      <div class="u-clearfix u-sheet u-sheet-1">
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
        <div class="menu-collapse" style="font-size: 1.25rem; letter-spacing: 0px; text-transform: uppercase; font-weight: 500;">
          <a class="u-button-style u-custom-active-color u-custom-border u-custom-border-color u-custom-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
            <svg class="u-svg-link" viewBox="0 0 24 24">
              <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use>
            </svg>
            <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
              <g>
                <rect y="1" width="16" height="2"></rect>
                <rect y="7" width="16" height="2"></rect>
                <rect y="13" width="16" height="2"></rect>
              </g>
            </svg>
          </a>
        </div>
        <div class="u-custom-menu u-nav-container"> 
            <ul class="u-nav u-spacing-2 u-unstyled u-nav-1">
              <li class="u-nav-item"><a class="u-active-palette-1-light-1 u-button-style u-hover-palette-1-light-1 u-nav-link u-text-active-black u-text-grey-90 u-text-hover-white" href="Home.php" style="padding: 18px 24px;">Home</a></li>
              <li class="u-nav-item"><a class="u-active-palette-1-light-1 u-button-style u-hover-palette-1-light-1 u-nav-link u-text-active-black u-text-grey-90 u-text-hover-white" href="lobby.php" style="padding: 18px 24px;">Room</a></li>
              <?php 
                if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
              ?>
                <li class="u-nav-item"><a class="u-active-palette-1-light-1 u-button-style u-hover-palette-1-light-1 u-nav-link u-text-active-black u-text-grey-90 u-text-hover-white" style="padding: 18px 24px;" href="UserInfo.php">Account</a>
                  <div class="u-nav-popup">
                    <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10">
                      <li class="u-nav-item"><a class="u-button-style u-nav-link u-white" href="index.php">Logout</a></li>
                    </ul>
                  </div>
                </li>
              <?php }else{ ?>
                <li class="u-nav-item"><a class="u-active-palette-1-light-1 u-button-style u-hover-palette-1-light-1 u-nav-link u-text-active-black u-text-grey-90 u-text-hover-white" style="padding: 18px 24px;">Account</a>
                  <div class="u-nav-popup">
                    <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10">
                      <li class="u-nav-item"><a class="u-button-style u-nav-link u-white" href="index.php">Login</a></li>
                      <li class="u-nav-item"><a class="u-button-style u-nav-link u-white" href="signup.php">Register</a></li>
                    </ul>
                  </div>
                </li>
              <?php }?>
            </ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
              <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                <div class="u-inner-container-layout u-sidenav-overflow">
                  <div class="u-menu-close"></div>
                  <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-3">
                    <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Home.php">Home</a></li>
                    <li class="u-nav-item"><a class="u-button-style u-nav-link" href="lobby.php">Room</a></li>
                    <?php if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) { ?>
                    <li class="u-nav-item"><a class="u-button-style u-nav-link" href="UserInfo.php">Account</a></li>
                      <div class="u-nav-popup">
                        <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10">
                          <li class="u-nav-item"><a class="u-button-style u-nav-link">Logout</a></li>
                        </ul>
                      </div>
                    <?php }else{?>
                    <li class="u-nav-item"><a class="u-button-style u-nav-link">Account</a>
                      <div class="u-nav-popup">
                        <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10">
                          <li class="u-nav-item"><a class="u-button-style u-nav-link" href="index.php">Login</a></li>
                          <li class="u-nav-item"><a class="u-button-style u-nav-link" href="signup.php">Register</a></li>
                        </ul>
                      </div>
                    </li>
                    <?php } ?>
                  </ul>
                </div>
              </div>
              <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
            </div>
        </nav>
        <img class="u-image u-image-contain u-image-default u-image-1" src="images/Logo_White.png" alt="" data-image-width="3200" data-image-height="2500">
      </div>
    </header>
      <main id="room__lobby__container">
        <div id="form__container">
            <div id="form__container__header">
                <p>👋 Create or Join Room</p>
            </div>
            <form action="CreateRoom.php" method="post" >
                <div class="form__field__wrapper">
                  <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                  <?php } ?>
                  <p>
                    <label for="room">Room Name:</label>
                    <input type="text" name="room_name" id="room">
                  </p>
                </div>
                <div class="form__field__wrapper">
                  <button type="submit">Go to Room 
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"/></svg>
                  </button>
                </div>
            </form>
        </div>
        <h2>聊天室列表</h2>
        <ol>
          <?php 
          $query ="SELECT room_name FROM rooms";
          $result = $conn->query($query);
          if($result->num_rows> 0){
              while($optionData=$result->fetch_assoc()){
                $option = $optionData['room_name'];
          ?>
          <li><a href="room.php?room=<?php echo $option ?>"><?php echo $option ?></a></li>
          <?php
          }}
          ?>
        </ol>
     </main>
    
</body>
</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
?>

<script type="text/javascript">
  sessionStorage.setItem('display_name', '<?php echo $_SESSION['name']; ?>');
</script>
<?php
echo "<script>console.log('Debug Objects: " . $_SESSION['name'] . "' );</script>";
?>