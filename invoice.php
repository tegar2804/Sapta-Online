<?php
include("config.php");
session_start();
if(!isset($_SESSION['email'])){
    header("Location: login.php");
    exit;
}
$query = pg_query("SELECT D.id_order, email, tanggal_order, harga_total, status_bayar, M.id_menu, nama_menu, harga_menu, qty FROM pesanan O, menu M, detail_order D WHERE O.id_order = D.id_order and M.id_menu = D.id_menu and D.id_order = ".$_GET['id']."");
$data_invoice = pg_fetch_array($query);
if($data_invoice['email'] != $_SESSION['email'] || !($data_invoice['status_bayar'])){
    echo "AKSES DILARANG!!";
}
?>
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
                    <p>Total Harga: <br> <span>Rp<?php echo number_format($data_invoice['harga_total'], '0', ',', '.') ?></span></p>
                </div>

                <div class="entry">
                    <i class="icon-calendar" aria-hidden></i>
                    <p>Tanggal: <br> <span><?php echo date('d F Y', strtotime($data_invoice['tanggal_order'])) ?></span></p>
                </div>

                <div class="entry">
                    <i class="icon-star" aria-hidden></i>
                    <p>Status: <br> <span>Berhasil</span></p>
                </div>

                <div class="entry">
                    <i class="icon-notebook" aria-hidden></i>
                    <?php 
                    $str = "";
                    $num = $data_invoice['id_order'];
                    while($num < 1000){
                        $str .= "0";
                        $num *= 10;
                    }
                    ?>
                    <p>Nomor Order: <br> <span>SPTA<?php echo $str; echo $data_invoice['id_order'] ?></span></p>
                </div>
            </div>
        </div>
            
        <div class="right">
            <div class="content">
                <div class="header">
                    <img src="icon/logoSapta.png" alt="">
                    <h4><?php echo date('d F Y', strtotime($data_invoice['tanggal_order'])) ?> | 09:17 WIB</h4>
                </div>

                <div class="totalMakanan">
                    <h3>Daftar menu yang dibeli</h3>
                    <h4>Total: 2 Menu</h4>
                </div>

                <div class="listMakanan">
                    <?php
                        $query_toko = pg_query("SELECT D.id_order, email, tanggal_order, harga_total, status_bayar, M.id_menu, nama_menu, harga_menu, qty FROM pesanan O, menu M, detail_order D WHERE O.id_order = D.id_order and M.id_menu = D.id_menu and D.id_order = ".$_GET['id']."");
                        $data_toko = pg_fetch_array($query_toko);
                    ?>
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

    <section class="backButton">
        <button class="backBtn"><a href="cart.php">Kembali</a></button>
    </section>

</body>
</html>