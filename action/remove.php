<?php 
 
require_once '../library/dbConnect.php';
 
if($_GET['id']) {
    $id = $_GET['id'];
 
    $sql = "DELETE FROM announcement WHERE id = {$id}";
    if($connect->query($sql) === TRUE) {
        ?><script type="text/javascript">alert("Succesfully Deleted From Database !");</script><?php
        header('Location:../view.php');
    } else {
        echo "Error while updating record : ". $connect->error;
    }
 
    $connect->close();

}
?>
