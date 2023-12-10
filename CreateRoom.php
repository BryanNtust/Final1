<?php 
    session_start(); 
    include "db_conn.php";
?>

<?php 
        $room_name =  $_REQUEST['room_name'];
        $host_name = $_SESSION['name']; 
        $sql = "SELECT * FROM rooms WHERE room_name='$room_name' ";
        $result = mysqli_query($conn, $sql);
        if (empty($room_name)) {
            header("Location: lobby.php?error=Room Name is required");
            exit();
        }
        if (mysqli_num_rows($result) > 0) {
            header("Location: lobby.php?error=Room Name is taken");
            exit();
        }else{
            $sql2 = "INSERT INTO rooms(room_name, host_name) VALUES('$room_name', '$host_name')";
            $result2 = mysqli_query($conn, $sql2);
            header("Location: room.php?room=${room_name}");
            exit();
        }
?>