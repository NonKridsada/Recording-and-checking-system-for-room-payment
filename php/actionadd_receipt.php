<?php
    include 'connect.php';
    ?>
<?php

    
    $tb="receipt_room";
    //$tb2="room_status";
    //print_r($_POST);
    $month = $_POST['month'];
    $year = $_POST['year'];

    $room_id = $_POST['room_id'];
    $elect = $_POST['elect'];
    $water = $_POST['water'];
    $room_rate = $_POST['room_rate'];

    $status_payment = $_POST['status_payment'];
    
    
    //$status = $_POST['status'];

    mysqli_query($conn,"INSERT INTO $tb (month,year,elect,water,room_rate,room_id,status_payment)
                VALUES('$month','$year', '$elect', '$water','$room_rate', '$room_id','$status_payment')");
    
    //mysqli_query($conn,"UPDATE $tb2 SET status='$status' WHERE room_id=$room_id");
    //$sql="UPDATE $tb2 SET status='$status' WHERE room_id=$room_id";
    
    if (mysqli_affected_rows($conn) > 0){
        echo "<script>";
        echo "alert('เพิ่มข้อมูลสำเร็จ');";
        echo "window.location.href='./';";
        echo "</script>";
        header("location: receipt.php");

      

    }else{
        echo 'Member notadded';
        echo mysqli_error($conn);
    }

?>

