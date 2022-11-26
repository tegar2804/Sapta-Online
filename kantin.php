<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kantin Nasi Pecel | Sapta</title>
    <link rel="stylesheet" href="kantinStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
	<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/a9b2fd740f.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
		<a href="#" class="logo"><i class="ri-home-6-fill"></i><span>Sapta</span></a>

		<ul class="navbar">
			<li><a href="beranda.php" >Beranda</a></li>
			<li><a href="daftarKantin.php" class="active">Kantin</a></li>
			<li><a href="tentangSapta.php">Tentang Sapta</a></li>		
        </ul>

		<div class="main">
            <label class="icon">
                <i class="fa-solid fa-cart-shopping"></i>
            </label>

            <button class="login">
                <a href="login.php">Login</a>
            </button>
		</div>
	</header>
    
    <?php 
    include("config.php");
    if(isset($_GET['toko'])){
        $id = $_GET['toko'];
        $toko = pg_fetch_array(pg_query("SELECT * FROM toko WHERE id_toko = '".$_GET['toko']."'"));
	}else{
		die("akses dilarang...");
	}
    ?>
    
    <section class="top">
        <h1><?php echo $toko['nama_toko'] ?></h1>
        <h3><?php echo date("H:i", strtotime($toko['waktu_buka'])) ?> - <?php echo date("H:i", strtotime($toko['waktu_tutup'])) ?></h3>
    </section>

    <section class="daftarKantin">
        <?php
		$query = pg_query("SELECT * FROM menu WHERE id_toko='".$id."'");
		
		while($menu = pg_fetch_array($query)){;?>
        <article class="kantin">

            <div class="gambarKantin"></div>
            <a href="#">
                <div class="gambarKantinHover" style="background-image: url(<?php echo $menu['foto_menu'] ?>);"></div>
            </a>
            
            <div class="descKantin">
                <h3 class="judulKantin"><?php echo $menu['nama_menu'] ?></h3>
                <p class="kisaranHarga">IDR <?php echo number_format($menu['harga_menu'], '0', ',', '.') ?></p>
                <a class="tambahItem" href="#">
                    <img src="icon/+cartKuning.svg" alt="">
                </a>
            </div>

        </article>
        <?php }; ?>
    </section>

</body>
</html>