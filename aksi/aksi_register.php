<?php
include "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
    $email = $_POST['v_email'];
    $password = $_POST['v_password'];
    $fullname = $_POST['v_fullname'];
    $sql = "INSERT INTO tb_user (fullname,email, password)VALUES ('".$fullname."','".$email."', '".md5($password)."')";

    if ($conn->query($sql) === TRUE) {
      echo "<script>alert('Berhasil tambahkan Akun')</script>";
      header('Location: ../index.php');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
}
?>