<?php
    include("connect.php");

    
    //$tb="user";
    //$tb2="room_status";
    $tb3="receipt_room";
    //print_r($_POST)
    

    $month= $_POST['month'];
    $year= $_POST['year'];

    $room_id = $_POST['room_id'];
    //$name = $_POST['name'];
    $elect = $_POST['elect'];
    $water = $_POST['water'];
    $room_rate = $_POST['room_rate'];
    $status_payment = $_POST['status_payment'];
    $received_payment = $_POST['received_payment'];
    $id = $_POST['id'];
    //$last_name = $_POST['last_name'];
    //$phone = $_POST['phone'];
    //$national_id = $_POST['national_id'];
    //$room_id = $_POST['room_id'];
    //$id = $_POST['id'];
    
    //$status = $_POST['status'];
    

    $sql="UPDATE $tb3 set month='$month',year='$year',room_id='$room_id',
                        elect='$elect',water='$water',room_rate='$room_rate' ,received_payment='$received_payment',status_payment='$status_payment'where id=$id";
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
    header("location: receipt.php");
    
    mysqli_close($conn);
?>