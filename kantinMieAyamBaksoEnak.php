<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kantin Nasi Pecel | Sapta</title>
    <link rel="stylesheet" href="kantinNasiPecelStyle.css">
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
            <input type="search" placeholder="Cari makanan favoritmu!" class="search">
            <label class="icon">
                <i class="fa-solid fa-magnifying-glass"></i>
            </label>

            <button class="login">
                <a href="login.php">Login</a>
            </button>
		</div>
	</header>
    
    <section class="top">
        <h1>Mie ayam Bakso Enak</h1>
        <h3>08:00 - 17:00</h3>
    </section>

    <section class="daftarKantin">
        <article class="kantin">

            <div class="gambarKantin"></div>
            <a href="#">
                <div class="gambarKantinHover" style="background-image: url(images/Resep-Mie-Ayam-Ceker-Nikmat.jpg);"></div>
            </a>
            
            <div class="descKantin">
                <h3 class="judulKantin">Mie Ayam Original</h3>
                <p class="kisaranHarga">IDR 12.000</p>
                <a class="tambahItem" href="#">
                    <img src="icon/+cartKuning.svg" alt="">
                </a>
            </div>

        </article>

        <article class="kantin">

            <div class="gambarKantin"></div>
            <a href="#">
                <div class="gambarKantinHover" style="background-image: url(images/mie\ ayam\ ceker.jpg);"></div>
            </a>
            
            <div class="descKantin">
                <h3 class="judulKantin">Mie Ayam Ceker</h3>
                <p class="kisaranHarga">IDR 15.000</p>
                <a class="tambahItem" href="#">
                    <img src="icon/+cartKuning.svg" alt="">
                </a>
            </div>

        </article>

        <article class="kantin">

            <div class="gambarKantin"></div>
            <a href="#">
                <div class="gambarKantinHover" style="background-image: url(images/bakso\ bang.jpeg);"></div>
            </a>
            
            <div class="descKantin">
                <h3 class="judulKantin">Bakso Spesial</h3>
                <p class="kisaranHarga">IDR 12.000</p>
                <a class="tambahItem" href="#">
                    <img src="icon/+cartKuning.svg" alt="">
                </a>
            </div>

        </article>

        <article class="kantin">

            <div class="gambarKantin"></div>
            <a href="#">
                <div class="gambarKantinHover" style="background-image: url(images/mie\ ayam\ bakso.webp);"></div>
            </a>
            
            <div class="descKantin">
                <h3 class="judulKantin">Mie Ayam Bakso</h3>
                <p class="kisaranHarga">IDR 17.000</p>
                <a class="tambahItem" href="#">
                    <img src="icon/+cartKuning.svg" alt="">
                </a>
            </div>

        </article>
    </section>

</body>
</html>