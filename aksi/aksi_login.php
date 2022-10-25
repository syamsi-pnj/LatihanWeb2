<?php
include "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $email = $_POST['v_email'];
    $password = $_POST['v_password'];

    $sql = "SELECT * FROM tb_user WHERE email='".$email."' AND password='".md5($password)."'";

    $result = $conn->query($sql);

    if($result->num_rows >0) {
        //sukses
        $row = $result->fetch_assoc();
        // echo  $row["email"];
        session_start();
        $_SESSION['email'] =  $row["email"];
        header("Location: ../admin/");
    }else{
        //gagal
        echo "<script>alert('Email atau Password Salah Silahkan Coba Kembali')</script>";
        //header('Location: ../index.php');
    }



    //echo "Email : ".$email.", Password : ".$password;
}
?>