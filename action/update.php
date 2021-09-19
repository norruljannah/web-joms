<?php 
 
require_once '../library/dbConnect.php';
 
if($_POST) {
    $Name = $_POST['Name'];
    $idstaf= $_POST['idstaf'];
    $desc = $_POST['desc'];
 
    $id = $_POST['user_ID'];// hidden text

     // A list of permitted file extensions
  $allowed = array('png', 'jpg', 'gif', 'pdf');


if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
  
  $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

  if(!in_array(strtolower($extension), $allowed)){
    echo '{"status":"error"}';
    exit;
  }
  
  $logotemp = md5($_POST['desc']);
  $dir="../image/";
  $temp = explode(".", $_FILES["image"]["name"]);
  $newfilename = round(microtime(true)) . $logotemp. '.' . end($temp);
  $dir2=$dir.$newfilename;
  $dir3="image/".$newfilename;  //display at frontend
  
  if(move_uploaded_file($_FILES["image"]["tmp_name"], $dir2)){ 
    
  }
}
 
    $sql = "UPDATE announcement SET AdminName = '$Name', StaffID = '$idstaf', image='$dir3' ,Description = '$desc' WHERE id = {$id}";
    if($connect->query($sql) === TRUE) {
        ?><script type="text/javascript">alert("Succesfully Saved !");</script><?php
        header('Location:../view.php');
    } else {
        echo "Erorr while updating record : ". $connect->error;
    }
 
    $connect->close();
 
}
 
?>