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
            <form action="prosesregister.php" method="POST">
                <h1>Register</h1>
                <hr>
                <p>Sapta Dharma Kantin Fateta</p>

                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" placeholder="Nama Lengkap">
                
                <label for="email">Email</label>
                <input type="text" name="email" placeholder="example@gmail.com">

                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password">

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