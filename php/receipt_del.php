<?php
    include("connect.php");

    
    $tb="receipt_room";
    //print_r($_POST)
    //$tb2="room_status";
    
   
    $id = $_GET['id'];
    //$room_id =$_POST['room_id'];

    $sql="DELETE  FROM $tb where id=$id";
    //$sql="UPDATE $tb2 SET status='ว่าง' WHERE room_id=$room_id";
    //$sql="UPDATE $tb2 SET status ='ว่าง'where room_id=$room_id";
    //mysqli_query($conn,"UPDATE $tb2 SET status='ว่าง' WHERE room_id=$room_id");
    $dbname=mysqli_query($conn,$sql);

    echo "<script>";
    echo "alert('ลบสำเร็จ');";
    echo "window.location.href='./';";
    echo "</script>";
    
    header("location: receipt.php");
    //print_r($_GET);
    //print_r($_POST);
    
    mysqli_close($conn);
?>