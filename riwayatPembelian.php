<?php
include("config.php");
session_start();
if(!isset($_SESSION['email'])){
    header("Location: login.php");
    exit;
}
$query = pg_query("SELECT * FROM pesanan WHERE status_bayar AND email = '".$_SESSION['email']."' ORDER BY id_order");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda | Sapta</title>
    <link rel="stylesheet" href="riwayatPembelianStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
	<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/a9b2fd740f.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
		<a href="#" class="logo"><i class="ri-home-6-fill"></i><span>Sapta</span></a>

		<ul class="navbar">
			<li><a href="beranda.php" class="active">Beranda</a></li>
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

    <section class="riwayatPembelian">
        <h2>Riwayat Pembelian</h2>
        <div class="containerRadio">
            <div class="radio-tile-group">
                <?php
                while($data_history = pg_fetch_array($query)){; ?>
                <a href="invoice.php?id=<?php echo $data_history['id_order'] ?>">
                    <div class="input-container">
                        <div class="radio-tile">
                            <?php 
                                $str = "";
                                $num = $data_history['id_order'];
                                while($num < 1000){
                                    $str .= "0";
                                    $num *= 10;
                                }
                            ?>
                            <label>SPTA<?php echo $str; echo $data_history['id_order'] ?></label>
                            <div class="tglTransaksi"><p>Tanggal Transaksi </p><span>: <?php echo date('d F Y', strtotime($data_history['tanggal_order'])) ?></span></div>
                            <div class="statusTransaksi"><p>Status </p> <span>: Sukses</span></div>
                            <div class="pembayaranVia"><p>Pembayaran melalui </p><span>: GoPay</span></div>
                        </div>
                    </div>
                </a>
                <?php }; ?>
                <style>
                    .radio-tile {
                        background-color: #FFFFFF;
                    }

                    .radio-tile label {
                        margin-left: 20px;
                    }

                    .radio-tile {
                        display: list-item;
                    }

                    .tglTransaksi {
                        display: flex;
                        margin-left: 20px;
                    }

                    .statusTransaksi {
                        display: flex;
                        margin-left: 20px;
                    }

                    .pembayaranVia {
                        display: flex;
                        margin-left: 20px;
                    }

                    .tglTransaksi span {
                        margin-left: 40px;
                    }

                    .statusTransaksi span {
                        margin-left: 136px;
                    }

                    .pembayaranVia span {
                        margin-left: 18px;
                    }
                </style>
                  
            </div>
        </div>
                  
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    
    </div>

    </section>

</body>
</html>