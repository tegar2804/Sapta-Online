<?php
include("config.php");
session_start();
if(isset($_SESSION['email'])){
    header("Location: beranda.php");
    exit;
}
if(isset($_POST['login'])&&!empty($_POST['login'])){
    $hashpassword = md5($_POST['password']);
    $data = pg_query("select * from customer where email = '".pg_escape_string($_POST['email'])."' and password ='".$hashpassword."'"); 
    $login_check = pg_num_rows($data);
    
    if($login_check > 0){ 
        $datacart = pg_query("select * from pesanan where email = '".pg_escape_string($_POST['email'])."' and status_bayar = FALSE");
        $checkcart = pg_num_rows($datacart);
        if($checkcart > 0){
            $_SESSION['cart'] = pg_fetch_array($datacart)['id_order'];
        }
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['nama'] = pg_fetch_array($data)['nama_lengkap'];
        header('Location: beranda.php');
    }else{
        header('Location: login.php?status=gagal');
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
    <link rel="stylesheet" href="loginStyle.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
<body>
    <div class="container">
        <div class="login">
            <form method="POST">
                <h1>Login</h1>
                <hr>
                <p class="desc">Sapta Dharma Kantin Fateta</p>
                <?php if(isset($_GET['status']) && $_GET['status'] == 'gagal'): ?>
                    <p style="color: #fd3a4a; font-size:16px; font-weight:600"> Email dan Password tidak cocok! </p>
                <?php endif; ?>
                <label for="email">Email</label>
                <input type="text" name="email" placeholder="example@gmail.com">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password">
                
                <input class="loginLurde" type="submit" value="Login" name="login"/>
                
                <style>
                    .loginLurde {
                        background-color:#FDC886; 
                        color:#FFFFFF;
                        border:none;
                        margin-top:10px;
                        cursor:pointer;
                        font-weight:500;
                    }
                    .loginLurde:hover {
                        background: rgba(20, 200, 64, 1);
                    }
                </style>

                <p>
                    <a href="forgotPassword.php">Forgot Password</a>
                </p>
                <p>
                    <a href="register.php">Belum punya akun?</a>
                </p>
            </form>
        </div>
        <div class="right">
            <img src="Images/image 9.png" alt="">
        </div>
    </div>
</body>
</html>