<?php
include "../config/database.php";

$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {

 $id = $_POST['id'];
 $email = $_POST['email'];
 $fullname = $_POST['fullname'];

  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }

  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    
    $sql = "UPDATE tb_user SET email = '".$email."', fullname = '".$fullname."', avatar = '".basename($_FILES["fileToUpload"]["name"])."' WHERE id='".$id."';";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../admin/?menu=user");  
    }else {
        echo "Error: " . $sql . "<br>" . $conn->error;

    }
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }

}else {
    echo "Error";
}
?>