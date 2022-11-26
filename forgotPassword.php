<?php
include("config.php");
session_start();
if(isset($_SESSION['email'])){
    header("Location: beranda.php");
    exit;
}
if(isset($_POST['cont'])&&!empty($_POST['cont'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordjuga = $_POST['passwordjuga'];
    $data = pg_query("select * from customer where email = '".pg_escape_string($_POST['email'])."'");
    $login_check = pg_num_rows($data);
    if($login_check < 1){
        header('Location: forgotPassword.php?status=terdaftar');
    }else if($password != $passwordjuga){
        header('Location: forgotPassword.php?status=pwsalah');
    }else{
        $hashpassword = md5($password);
        $query = pg_query("UPDATE customer SET password='$hashpassword' WHERE email='$email'");

	    if($query == TRUE) {
            header('Location: login.php');
	    } else {
	    	header('Location: forgotPassword.php?status=gagal');
	    }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sapta</title>
    <link rel="stylesheet" href="forgotPasswordStyle.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
<body>
    <div class="container">
        <div class="login">
            <form action="" method="POST">
                <h1>Forgot Password</h1>
                <hr>
                <p>Masukkan alamat email dan ganti password mu</p>
                
                <input type="text" name="email" placeholder="Masukkan email">
                <?php if(isset($_GET['status']) && $_GET['status'] == 'terdaftar'): ?>
                    <a href="register.php"> Email belum terdaftar! </a>
                <?php endif; ?>

                <input type="password" name="password" placeholder="Masukan password baru">
                <input type="password" name="passwordjuga" placeholder="Konfirmasi password baru">
                <?php if(isset($_GET['status']) && $_GET['status'] == 'pwsalah'): ?>
                    <p> Password Salah! </p>
                <?php endif; ?>

                <?php if(isset($_GET['status']) && $_GET['status'] == 'gagal'): ?>
                    <p> Gagal Mengganti Password! </p>
                <?php endif; ?>
                    
                <button>
                    <input type="submit" value="Continue" name="cont"/>
                </button>
            </form>
        </div>
    </div>
</body>
</html>