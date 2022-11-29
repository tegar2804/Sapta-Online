<?php
include("config.php");
session_start();
if(!isset($_SESSION['email'])){
    header("Location: login.php");
    exit;
}
$query = pg_query("SELECT D.id_order, email, tanggal_order, harga_total, status_bayar, SUM(qty) FROM pesanan O, detail_order D WHERE O.id_order = D.id_order and D.id_order = ".$_GET['id']." GROUP BY D.id_order, email, tanggal_order, harga_total, status_bayar");
$data_invoice = pg_fetch_array($query);
if($data_invoice['email'] != $_SESSION['email'] || !($data_invoice['status_bayar'])){
    echo "AKSES DILARANG!!";
    exit;
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
                    <h4><?php echo date('d F Y', strtotime($data_invoice['tanggal_order'])) ?></h4>
                </div>

                <div class="totalMakanan">
                    <h3>Daftar menu yang dibeli</h3>
                    <h4>Total: <?php echo $data_invoice['sum'] ?> Menu</h4>
                </div>

                <div class="listMakanan">
                    <?php
                        $query_toko = pg_query("SELECT DISTINCT M.id_toko, nama_toko FROM detail_order D, menu M, toko T WHERE D.id_menu = M.id_menu and T.id_toko = M.id_toko and id_order = ".$_GET['id']."");
                        while($data_toko = pg_fetch_array($query_toko)){;
                    ?>
                    <h5><?php echo $data_toko['nama_toko'] ?></h5>
                    <?php 
                        $query_menu = pg_query("SELECT D.id_menu, qty, nama_menu, harga_menu FROM detail_order D, menu M WHERE D.id_menu = M.id_menu and id_order = ".$_GET['id']." and id_toko = '".$data_toko['id_toko']."'");
                        while($data_menu = pg_fetch_array($query_menu)){;
                    ?>
                    <ul class="menuMakanan">
                        <li><?php echo $data_menu['nama_menu'] ?></li> <span class="qty">x<?php echo $data_menu['qty'] ?> = </span>
                        <li>IDR <?php echo number_format($data_menu['harga_menu']*$data_menu['qty'], 0, ',', '.') ?></li>
                    </ul>
                    <?php }
                        $subtotal =  pg_fetch_array(pg_query("SELECT SUM(qty*harga_menu) FROM detail_order D, menu M WHERE D.id_menu = M.id_menu and id_order = ".$_GET['id']." and id_toko = '".$data_toko['id_toko']."'"))['sum'];
                    ?>
                    <h6 class="totalPerToko">Total = IDR <?php echo number_format($subtotal, 0, ',', '.') ?></h6>
                    
                    <style>
                        .menuMakanan span {
                            position: absolute;
                            font-size: 14px;
                            font-weight: 500;
                            color: #232631;
                            margin-left: 272px;
                        }

                        .totalPerToko {
                            position: flex;
                            float: right;
                            font-size: 14px;
                            font-weight: 500;
                            color: #232631;
                        }

                        .container {
                            min-height: 456px;
                            height: auto;
                            height: auto;
	                        min-height: 456px;
                        }

                        .backButton {
                            margin-left: 530px;
                        }
                        
                    </style>
                    <?php }; ?>
                </div>

                <div class="pesan">
                    <p>Pesanan Anda sudah kami terima, silahkan nanti ambil langsung di Kantin Sapta Fateta ya. Terimakasih!</p>
                </div>

                <div class="footer"></div>
            </div>
        </div>
    </div>

    <section class="backButton">
        <button class="backBtn"><a href="cart.php">Kembali</a></button>
    </section>

</body>
</html>