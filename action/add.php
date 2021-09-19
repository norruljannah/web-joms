<?php require_once '../library/dbConnect.php';
 
if($_POST) {
    $Name = $_POST['Name'];
    $id= $_POST['id'];
    $desc = $_POST['desc'];

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

 
    $sql = "INSERT INTO announcement (id, AdminName, StaffID, image, Description) VALUES ('', '$Name', '$id', '$dir3','$desc')";
    if($connect->query($sql) === TRUE) {
        ?><script type="text/javascript">alert("Succesfully Saved !");</script><?php
        header('Location:../view.php');
    } else {
        echo "Error " . $sql . ' ' . $connect->connect_error;
    }
 
    $connect->close();
}
 
?>