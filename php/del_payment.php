<?php

require_once('connection.php');

if (isset($_REQUEST['delete_id'])) {
    $id = $_REQUEST['delete_id'];

    // delete an original record from db
    $delete_stmt = $db->prepare('DELETE FROM tbl_file WHERE id = :id');
    $delete_stmt->bindParam(':id', $id);
    $delete_stmt->execute();
   if ($delete_stmt){ 
       header("http://localhost/Project/php/payment.php");
    exit;
   }
}
?>