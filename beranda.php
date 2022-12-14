<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda | Sapta</title>
    <link rel="stylesheet" href="berandaStyle.css">
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

            <style>
                .login a:hover {
                    width: 100%;
                    color: #FFFFFF;
                }
            </style>
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

    <section class="container">
        <section class="detailSapta">
            <div class="main1">
                <div class="rating">
                    <div class="bintang">
                        <img src="icon/Star 1.svg" alt="" class="star1">
                        <img src="icon/Star 1.svg" alt="" class="star1">
                        <img src="icon/Star 1.svg" alt="" class="star1">
                        <img src="icon/Star 1.svg" alt="" class="star1">
                        <img src="icon/Star 1.svg" alt="" class="star1"><span>5.0</span><span>(5.2k)</span>
                    </div>
                </div>
                <div class="desc">
                    <?php
                    include("config.php");
                    $kisaran = pg_fetch_array(pg_query("SELECT MIN(harga_menu), MAX(harga_menu) FROM menu"));
                    ?>
                    <h3>Sapta Dharma</h3>
                    <h4>IDR <?php echo number_format($kisaran['min'], '0', ',', '.') ?> - IDR <?php echo number_format($kisaran['max'], '0', ',', '.') ?></h4>
                    <i class="ri-map-pin-line"></i><span>Kantin Fateta</span>
                </div>
                <button class="cekKantin">
                    <a href="daftarKantin.php">Cek Kantin ></a>
                </button>
                <div class="info">
                    <i class="ri-information-line"></i><span>No extra cost</span>
                </div>
            </div>
        </section>

        <div class="slider">
            <div class="slides">
                <input type="radio" name="radioBtn" id="radio1">
                <input type="radio" name="radioBtn" id="radio2">
                <input type="radio" name="radioBtn" id="radio3">

                <div class="slide first">
                    <img src="images/image 9.png" width="1500px" style="border-radius: 24px;" alt="">
                </div>
                <div class="slide">
                    <img src="images/image 12.png" width="1500px" style="border-radius: 24px;" alt="">
                </div>
                <div class="slide">
                    <img src="images/image 13.png" width="1500px" style="border-radius: 24px;" alt="">
                </div>

                <div class="autoNavigation">
                    <div class="autoBtn1"></div>
                    <div class="autoBtn2"></div>
                    <div class="autoBtn3"></div>
                </div>
            </div>
            
            <div class="manualNavigation">
                <label for="radio1" class="manualBtn"></label>
                <label for="radio2" class="manualBtn"></label>
                <label for="radio3" class="manualBtn"></label>
            </div>
        </div>

        <script type="text/javascript">
            var counter = 1;
            setInterval(function(){
                document.getElementById('radio' + counter).checked = true;
                counter++;
                if(counter > 3){
                    counter = 1;
                }
            }, 5000);
        </script>

        
    </section>

    <section class="hero1">
        <div class="bbrpAlasanKnpKamuHarusMakanDiSapta">
            <h3 class="bbrpAlasan">Beberapa Alasan</h3>
            <h1 class="kmHarusMakan">Kenapa kamu harus makan di Sapta</h1>
        </div>
    
        <section class="alasanMakanDiSapta">
            <section class="murah">
                <img src="Icon/murahico.svg" alt="">
                <h4>Murah</h4>
                <p align="center">Di sini, makanan disajikan dengan harga yang aman bagi kantong mahasiswa</p>
                <button class="lihatDetailAktif">
                    <p>Lihat Detail ></p>
                </button>
            </section>
    
            <section class="higenis">
                <img src="Icon/higenisico.svg" alt="">
                <h4>Higenis</h4>
                <p align="center">Makanan dijamin bergizi dan sehat untuk tubuh kalian</p>
                <button class="lihatDetailAktif">
                    <p>Lihat Detail ></p>
                </button>
            </section>
    
            <section class="gaAdaPajak">
                <img src="Icon/gaAdaPajakIco.svg" alt="">
                <h4>Ga ada pajak</h4>
                <p align="center">Santai aja, di Sapta ngga ada pajak lohheeee</p>
                <button class="lihatDetailAktif">
                    <p>Lihat Detail ></p>
                </button>
            </section>
    
            <section class="bersih">
                <img src="Icon/bersihIco.svg" alt="">
                <h4>Bersih</h4>
                <p align="center">Sapta menyediakan tempat untuk cuci tangan, jadi amann</p>
                <button class="lihatDetailAktif">
                    <p>Lihat Detail ></p>
                </button>
            </section>
    
        </section>
    </section>

    <section class="kantinPalingLaris">
        <section class="teks">
            <h4>TOP 3 KANTIN PALING LARIS</h4>
            <h3>KANTIN PALING LARIS</h3>
            <p>Kantin terbaik menurut kami adalah seberapa banyak pelanggan menyukainya dari segi tempat, harga, kenyamanan, dan tentunya rasa makanan itu sendiri.</p>
            <button class="lokitSemuaKantin">
                <a href="daftarKantin.php"><p>Lihat semua kantin ></p></a>
            </button>
        </section>

        <section class="carousel">
            <div class="card">
                <img src="Images/nasiTelorSapta 1.png" alt="">
                <div class="cont">
                    <div class="content">
                        <div class="ratingMakanan">
                            <img src="icon/Star 1.svg" alt="" class="star1">
                            <span class="starRating">5.0</span>
                            <span class="jumlahRating">(100+)</span>
                            <img src="icon/Panah Kanan.svg" alt="" class="panahKanan">
                        </div>
                        <p class="judulMakanan">Nasi Pecel Sapta</p>
                        <div class="lokasiMakanan">
                            <i class="ri-map-pin-line"></i><span>Kantin Fateta</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <img src="Images/nasiPadangSapta 1.png" alt="">
                <div class="cont">
                    <div class="ratingMakanan">
                        <img src="icon/Star 1.svg" alt="" class="star1">
                        <span class="starRating">5.0</span>
                        <span class="jumlahRating">(100+)</span">
                        <img src="icon/Panah Kanan.svg" alt="" class="panahKanan">
                    </div>
                    <p class="judulMakanan">Nasi Padang Sapta</p>
                    <div class="lokasiMakanan">
                        <i class="ri-map-pin-line"></i><span>Kantin Fateta</span>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <img src="Images/Resep-Gado-Gado (1).webp" alt="" width="500px" style="border-radius: 24px;">
                <div class="cont">
                    <div class="ratingMakanan">
                        <img src="icon/Star 1.svg" alt="" class="star1">
                        </i><span class="starRating">5.0</span>
                        <span class="jumlahRating">(100+)</span>
                        <img src="icon/Panah Kanan.svg" alt="" class="panahKanan">
                    </div>
                    <p class="judulMakanan">Warung Sambal Kacang</p>
                    <div class="lokasiMakanan">
                        <i class="ri-map-pin-line"></i><span>Kantin Fateta</span>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <section class="makananBerdasarkanKantin">
        <section class="makananTerlaris">
            <div class="tekusu">
                <h4>MAKANAN BERDASARKAN KANTIN</h4>
                <h3>Makanan Terlaris</h3>
            </div>
            <button class="dropdown">
                <i class="ri-map-pin-line"></i>
                <span class="nasiPadang">Nasi Padang, Kantin Fateta</span>
                <span><img src="icon/icon.svg" alt=""></span>
            </button>
        </section>
        
        <div class="cardMakanan">
            <div class="mak">
                <img src="Images/nasi padang pake rendang.png" alt="">
                <div class="contMak">
                    <div class="ratingMakanan">
                        <img src="icon/Star 1.svg" alt="" class="star1">
                        </i><span class="starRating">5.0</span>
                        <span class="jumlahRating">(1K+)</span>
                        <img src="icon/Panah Kanan.svg" alt="" class="panahKanan">
                    </div>
                    <p class="judulMakanan">Nasi Rendang</p>
                    <p class="hargaMakanan">IDR 16.000</p>
                </div>
            </div>

            <div class="mak">
                <img src="Images/nasi padang pake ayam bakar.png" alt="">
                <div class="contMak">
                    <div class="ratingMakanan">
                        <img src="icon/Star 1.svg" alt="" class="star1">
                        </i><span class="starRating">5.0</span>
                        <span class="jumlahRating">(1.2K+)</span>
                        <img src="icon/Panah Kanan.svg" alt="" class="panahKanan">
                    </div>
                    <p class="judulMakanan">Nasi Ayam Bakar</p>
                    <p class="hargaMakanan">IDR 16.000</p>
                </div>
            </div>

            <div class="mak">
                <img src="Images/nasi padang pake telor.png" alt="">
                <div class="contMak">
                    <div class="ratingMakanan">
                        <img src="icon/Star 1.svg" alt="" class="star1">
                        </i><span class="starRating">5.0</span>
                        <span class="jumlahRating">(500K+)</span>
                        <img src="icon/Panah Kanan.svg" alt="" class="panahKanan">
                    </div>
                    <p class="judulMakanan">Nasi Telor Dadar</p>
                    <p class="hargaMakanan">IDR 10.000</p>
                </div>
            </div>
        </div>

        <button class="lokitKantin">
            <a href="daftarKantin.php"><p>Lihat Semua Kantin ></p></a>
        </button>

    </section>
</body>
</html>