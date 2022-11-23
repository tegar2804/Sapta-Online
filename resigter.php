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
            <form action="">
                <h1>Register</h1>
                <hr>
                <p>Sapta Dharma Kantin Fateta</p>

                <label for="">Email</label>
                <input type="text" placeholder="example@gmail.com">

                <label for="">Password</label>
                <input type="password" placeholder="Password">

                <label for="">Jenis Kelamin</label>
                <input type="radio" class="jk" name="gender" value="laki-laki"> Laki-laki
                <input type="radio" class="jk" name="gender" value="perempuan"> Perempuan

                <label for="">Tempat Tanggal Lahir</label>
                <input type="text" placeholder="Tempat, tanggal lahir">

                <label for="">Nomor Telepon</label>
                <input type="text" placeholder="+62812XXXXXXXX">

                <button>
                    <a href="login.php">Register</a>
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