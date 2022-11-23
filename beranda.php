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
			<li><a href="#" class="active">Beranda</a></li>
			<li><a href="#">Kantin</a></li>
			<li><a href="#">Tentang Sapta</a></li>		
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

    <section class="container">
        <div class="slider-wrapper">
            <div class="slider">
                <img id="slide-1" src="Images/image 9.png" alt="">
                <img id="slide-2" src="Images/image 12.png" alt="">
                <img id="slide-3" src="Images/image 13.png" alt="">
            </div>
            
            <div class="slider-nav">
                <a href="#slide-1"></a>
                <a href="#slide-2"></a>
                <a href="#slide-3"></a>
            </div>
        </div>

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
                    <h3>Sapta Dharma</h3>
                    <h4>IDR 3.000 - IDR 20.000</h4>
                    <i class="ri-map-pin-line"></i><span>Kantin Fateta</span>
                </div>
                <button class="cekKantin">
                    <a href="#">Cek Kantin ></a>
                </button>
                <div class="info">
                    <i class="ri-information-line"></i><span>No extra cost</span>
                </div>
            </div>
        </section>
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
                <p>Lihat semua kantin ></p>
            </button>
        </section>

        <section class="carousel">
            <div class="card">
                <img src="Images/nasiTelorSapta.svg" alt="">
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
                <img src="Images/nasiPadangSapta.svg" alt="">
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
                <img src="Images/nasiBentoSapta.svg" alt="">
                <div class="cont">
                    <div class="ratingMakanan">
                        <img src="icon/Star 1.svg" alt="" class="star1">
                        </i><span class="starRating">5.0</span>
                        <span class="jumlahRating">(100+)</span>
                        <img src="icon/Panah Kanan.svg" alt="" class="panahKanan">
                    </div>
                    <p class="judulMakanan">Nasi Padang Sapta</p>
                    <div class="lokasiMakanan">
                        <i class="ri-map-pin-line"></i><span>Kantin Fateta</span>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <section class="makananBerdasarkanKantin">
        <h4>MAKANAN BERDASARKAN KANTIN</h4>
        <h3>Makanan Terlaris</h3>
        <button class="dropdown">
                <i class="ri-map-pin-line"></i><span class="nasiPadang">Nasi Padang, Kantin Fateta</span><span><img src="icon/icon.svg" alt=""></span>
            </button>
        <div class="cardMakanan">
            <div class="mak1">
                <img src="Images/image 8.png" alt="">
                <div class="contMak1">
                    <img src="icon/Star 1.svg" alt="" class="star1"></i><span class="starRating">5.0</span><span>(1K+)</span>
                    <p>Nasi Rendang</p>
                    <p>IDR 15.000</p>
                </div>
            </div>
            <div class="mak2">
                <img src="Images/image 10.png" alt="">
                <div class="contMak2">
                    <img src="icon/Star 1.svg" alt="" class="star1"></i><span class="starRating">5.0</span><span>(1.2K+)</span>
                    <p>Nasi Ayam Bakar</p>
                    <p>IDR 15.000</p>
                </div>
            </div>
            <div class="mak3">
                <img src="Images/image 11.png" alt="">
                <div class="contMak3">
                    <img src="icon/Star 1.svg" alt="" class="star1"></i><span class="starRating">5.0</span><span>(500+)</span>
                    <p>Nasi Telor Dadar</p>
                    <p>IDR 10.000</p>
                </div>
            </div>
        </div>
        <button class="lokitKantin">
            <p>Lihat Semua Kantin ></p>
        </button>
    </section>
</body>
</html>