<?php 
    include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kantin | Sapta</title>
    <link rel="stylesheet" href="daftarKantinSyle.css">
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
    
    <section class="top">
        <h1>Daftar Kantin Sapta</h1>
    </section>

    <section class="daftarKantin">
        <?php
		$query = pg_query("SELECT * FROM toko");
		
		while($toko = pg_fetch_array($query)){;?>
        <article class="kantin">
            <?php
            $kisaran = pg_fetch_array(pg_query("SELECT MIN(harga_menu), MAX(harga_menu) FROM menu WHERE id_toko = '".$toko['id_toko']."'"));
            ?>

            <div class="infoJamOperasional">
                <svg class="jamOperasional" viewBox="0 0 24 24">
                    <path d="M12,20A7,7 0 0,1 5,13A7,7 0 0,1 12,6A7,7 0 0,1 19,13A7,7 0 0,1 12,20M19.03,7.39L20.45,5.97C20,5.46 19.55,5 19.04,4.56L17.62,6C16.07,4.74 14.12,4 12,4A9,9 0 0,0 3,13A9,9 0 0,0 12,22C17,22 21,17.97 21,13C21,10.88 20.26,8.93 19.03,7.39M11,14H13V8H11M15,1H9V3H15V1Z" />
               </svg>
               <span class="waktuOperasional"><?php echo date("H:i", strtotime($toko['waktu_buka'])) ?> - <?php echo date("H:i", strtotime($toko['waktu_tutup'])) ?></span>
            </div>

            <div class="gambarKantin"></div>
            <a href="kantin.php?toko=<?php echo $toko['id_toko']?>">
                <div class="gambarKantinHover" style="background-image: url(<?php echo $toko['foto_toko'] ?>);">

                </div>
            </a>
            
            <div class="descKantin">
                <span class="kategoriMakanan"><?php echo $toko['kategori'] ?></span>
                <h3 class="judulKantin"><?php echo $toko['nama_toko'] ?></h3>
                <span class="kisaranHarga">IDR <?php echo $kisaran['min']/1000 ?>K-<?php echo $kisaran['max']/1000 ?>K</span>
            </div>

        </article>
        <?php }; ?>
    </section>

</body>
</html>