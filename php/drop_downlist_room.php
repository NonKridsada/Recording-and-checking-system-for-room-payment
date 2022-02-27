<?php
require_once "connect.php";
$sql = "SELECT * FROM user";
if(!$conn->query($sql)){
    echo "Error in connecting to Database.";
}
else{
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $return_arr['user'] = array();
        while($row = $result->fetch_array()){
            array_push($return_arr['user'],array(
            'id' =>$row['id'],
            'room_id'=>$row['room_id']
        ));
    }
    echo json_encode($return_arr);
}
// $records = mysqli_query($conn, "SELECT * FROM user");
// while ($data = mysqli_fetch_array($records)) {
//     echo "<option value='" . $data['room_id'] . "'>" . $data['room_id'] . "</option>";  // displaying data in option menu
//}
}
?>