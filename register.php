<?php
include("config.php");
if(isset($_POST['regis'])&&!empty($_POST['regis'])){
	$nama = $_POST['nama_lengkap'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$passwordjuga = $_POST['passwordjuga'];
	$jk = $_POST['jk'];
	$telp = $_POST['telp'];

    if(empty($nama) || empty($email) || empty($password) || empty($jk) || empty($telp)){
        header('Location: register.php?status=kosong');
    }else if($password != $passwordjuga){
        header('Location: register.php?status=pwsalah');
    }else{
        $hashpassword = md5($password);
  	    $query = pg_query("INSERT INTO customer (nama_lengkap, email, password, jk, telp) VALUEs ('$nama', '$email', '$hashpassword', '$jk', '$telp')");

	    if($query == TRUE) {
	    	header('Location: beranda.php');
	    } else {
	    	header('Location: register.php?status=gagal');
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
    <link rel="stylesheet" href="registerStyle.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
<body>
    <div class="container">
        <div class="login">
            <form action="" method="POST">
                <h1>Register</h1>
                <hr>
                <p>Sapta Dharma Kantin Fateta</p>
                <?php if(isset($_GET['status']) && $_GET['status'] == 'kosong'): ?>
                    <p> ada yang kosong tuh ngab! </p>
                <?php endif; ?>
                
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" placeholder="Nama Lengkap">
                
                <label for="email">Email</label>
                <input type="text" name="email" placeholder="example@gmail.com">
                <?php if(isset($_GET['status']) && $_GET['status'] == 'gagal'): ?>
                    <p> Email Sudah Terdaftar Ngab! </p>
                <?php endif; ?>
                
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password">

                <label for="passwordjuga">Re-type Password</label>
                <input type="password" name="passwordjuga" placeholder="Re-type Password">
                <?php if(isset($_GET['status']) && $_GET['status'] == 'pwsalah'): ?>
                    <p> Password Salah! </p>
                <?php endif; ?>
                
                <label for="JK">Jenis Kelamin</label>
                <input type="radio" class="jk" name="jk" value="L"> Laki-laki
                <input type="radio" class="jk" name="jk" value="P"> Perempuan
                
                <label for="telp">Nomor Telepon</label>
                <input type="text" name="telp" placeholder="+62812XXXXXXXX">
                
                <button>
                    <input type="submit" value="Register" name="regis"/>
                    <!--a type="submit" value="regis" name="regis">Register</a-->
                </button>
                <p>
                    <a href="login.php">Sudah punya akun?</a>
                </p>
            </form>
        </div>
        <div class="right">
            <img src="Images/image 9.png" alt="">
        </div>
    </div>
</body>
</html>