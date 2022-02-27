<?php
    include 'connect.php';
    ?>
<?php

    
    $tb="user";
    //$tb2="room_status";
    //print_r($_POST);
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $national_id = $_POST['national_id'];
    
    $room_id = $_POST['room_id'];
    //$status = $_POST['status'];

    mysqli_query($conn,"INSERT INTO user (name, last_name,  phone, national_id, room_id)
                VALUES('$name', '$last_name', '$phone','$national_id', '$room_id')");
    
    //mysqli_query($conn,"UPDATE $tb2 SET status='$status' WHERE room_id=$room_id");
    //$sql="UPDATE $tb2 SET status='$status' WHERE room_id=$room_id";
    
    if (mysqli_affected_rows($conn) > 0){
        echo "<script>";
        echo "alert('เพิ่มข้อมูลสำเร็จ');";
        echo "window.location.href='./';";
        echo "</script>";
        header("location: user.php");

      

    }else{
        echo 'Member notadded';
        echo mysqli_error($conn);
    }

?>

