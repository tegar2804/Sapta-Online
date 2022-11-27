<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pembelian | Sapta</title>
    <link rel="stylesheet" href="invoiceStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
	<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.3.2/css/simple-line-icons.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/a9b2fd740f.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
		<a href="#" class="logo"><i class="ri-home-6-fill"></i><span>Sapta</span></a>

		<ul class="navbar">
			<li><a href="beranda.php">Beranda</a></li>
			<li><a href="daftarKantin.php">Kantin</a></li>
			<li><a href="tentangSapta.php">Tentang Sapta</a></li>		
        </ul>
        <?php
        session_start();
        if(!isset($_SESSION['email'])){;
        ?>
		<div class="main">
            <label class="icon">
                <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
            </label>

            <button class="login">
                <a href="login.php">Login</a>
            </button>
		</div>
        <?php }else{; ?>
        <div class="main">
            <label class="icon">
                <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
            </label>
            
            <label class="icon">
                <i class="fa-solid fa-user"></i> 
            </label>
            <span class="nyambutUser">Hi! <?php echo $_SESSION['nama'] ?></span>
            <p>|</p>
            <a href="logout.php" class="tombolLogout">Log out</a>
		</div>
        <?php }; ?>
	</header>

    <div class="container">
        <div class="left">
            <div class="infoBox">
                <div class="receipt">
                    Bukti Pembayaran <br> <span>Sapta Dharma</span>
                </div>
                <div class="entry">
                    <i class="icon-wallet" aria-hidden></i>
                    <p>Total Harga: <br> <span>Rp32.000</span></p>
                </div>

                <div class="entry">
                    <i class="icon-calendar" aria-hidden></i>
                    <p>Tanggal: <br> <span>28 November 2022</span></p>
                </div>

                <div class="entry">
                    <i class="icon-star" aria-hidden></i>
                    <p>Status: <br> <span>Berhasil</span></p>
                </div>

                <div class="entry">
                    <i class="icon-notebook" aria-hidden></i>
                    <p>Nomor Order: <br> <span>SPTA2144910</span></p>
                </div>
            </div>
        </div>
            
        <div class="right">
            <div class="content">
                <div class="header">
                    <img src="icon/logoSapta.png" alt="">
                    <h4>28 November 2022 | 09:17 WIB</h4>
                </div>

                <div class="totalMakanan">
                    <h3>Daftar makanan yang dibeli</h3>
                    <h4>Total: 5 Makanan</h4>
                </div>

                <div class="listMakanan">
                    <h5>Warung Makan Padang</h5>
                    <ul class="menuMakanan">
                        <li>Nasi Padang Ayam Bakar</li>
                        <li>IDR 16.000</li>
                    </ul>
                    <ul class="menuMakanan">
                        <li>Nasi Padang Rendang</li>
                        <li>IDR 16.000</li>
                    </ul>
                </div>

                <div class="pesan">
                    <p>Pesanan Anda sudah kami terima, silahkan nanti ambil langsung di Kantin Sapta Fateta ya. Terimakasih!</p>
                </div>

                <div class="footer">
                    <h6>Invoice ID: 121236</h6>
                </div>
            </div>
        </div>
    </div>

</body>
</html>