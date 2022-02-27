<?php
    include("connect.php");

    
    $tb="user";
    $tb2="room_status";
    //print_r($_POST)
    
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $national_id = $_POST['national_id'];
    $room_id = $_POST['room_id'];
    $id = $_POST['id'];
    
    //$status = $_POST['status'];
    

    $sql="UPDATE $tb set name='$name',last_name='$last_name',phone='$phone',national_id='$national_id',room_id='$room_id' where id=$id";
    //$sql="UPDATE ";
    //$sql="UPDATE $tb2 set status='$status' where room_id=$room_id";
    //"UPDATE $tb  
                //INNER JOIN Customer_table  
                //ON customer_table.rel_cust_name = customer_table.cust_id  
                //SET customer_table.rel_cust_name = customer_table.cust_name";
    $dbname=mysqli_query($conn,$sql);

    echo "<script>";
    echo "alert('แก้ไขสำเร็จ');";
    echo "window.location.href='./';";
    echo "</script>";
    header("location: user.php");

    
    mysqli_close($conn);
?>