<?php
include("config.php");
session_start();
if(!isset($_SESSION['email'])){
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang | Sapta</title>
    <link rel="stylesheet" href="cart2Style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
	<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
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

		<div class="main">
            <label class="icon">
                <i class="fa-solid fa-cart-shopping"></i>    
            </label>

            <label class="icon">
                <i class="fa-solid fa-user"></i> 
            </label>
            <span class="nyambutUser">Hi! <?php echo $_SESSION['nama'] ?></span>
            <p>|</p>
            <a href="logout.php" class="tombolLogout">Log out</a>
		</div>
	</header>

    <main class="container">
        <h1 class="heading">
            <i class="fa-solid fa-cart-shopping"></i><span>Keranjang Belanja</span>
        </h1>

        <div class="itemFlex">
            <section class="checkout">
                <h2 class="sectionHeading">Detail Pembayaran</h2>
                
                <div class="formPembayaran">
                    
                    <div class="metodePembayaran">
                        <button class="pilihMetode">
                            <i class="fa-solid fa-money-bill-transfer"></i>
                            <span>E-Money</span>
                            <i class="fa-sharp fa-solid fa-circle-check"></i>
                        </button>

                        <button class="metode">
                            <i class="fa-solid fa-credit-card"></i>
                            <span>E-Banking</span>
                            <i class="fa-regular fa-circle-check"></i>
                        </button>
                    </div>

                    <div class="containerRadio">
                        <div class="radio-tile-group">
                  
                          <div class="input-container">
                            <input id="walk" type="radio" name="radio">
                            <div class="radio-tile">
                              <img src="icon/Gopay_logo (1).svg" alt="" width="300px">
                              <label for="walk">Gopay</label>
                            </div>
                          </div>
                  
                          <div class="input-container">
                            <input id="bike" type="radio" name="radio">
                            <div class="radio-tile">
                              <img src="icon/ShopeePay Logo (SVG-720p) - Vector69Com.svg" alt="" width="150px">
                              <label for="bike">ShopeePay</label>
                            </div>
                          </div>
                  
                          <div class="input-container">
                            <input id="car" type="radio" name="radio">
                            <div class="radio-tile">
                              <img src="icon/Logo_ovo_purple (1).svg" alt="" width="200px">
                              <label for="car">OVO</label>
                            </div>
                          </div>
                  
                          <div class="input-container">
                            <input id="fly" type="radio" name="radio">
                            <div class="radio-tile">
                              <img src="icon/Logo_dana_blue (1).svg" alt="" width="200px">
                              <label for="fly">Dana</label>
                            </div>
                          </div>
                  
                        </div>
                      </div>
                  
                      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
                      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
                </div>
                <?php if(isset($_SESSION['cart'])){
                    $total = pg_fetch_array(pg_query("SELECT harga_total FROM pesanan WHERE id_order = '".$_SESSION['cart']."' and not status_bayar"))['harga_total'];
                    if($total > 0){; ?>
                    <button class="btn btn-primary">
                        <a href="bayar.php">
                        <b>Bayar</b> IDR <span id="payAmount"><?php echo number_format($total, '0', ',', '.') ?></span>
                        </a>
                    </button>
                    <?php }else{; ?>
                    <button class="btn btn-primary">
                        <b>Bayar</b> IDR <span id="payAmount"><?php echo number_format($total, '0', ',', '.') ?></span>
                    </button>
                    <?php }; ?>
                <?php }else{; ?>
                <button class="btn btn-primary">
                    <a href="invoice.php">
                        <b>Bayar</b> IDR <span id="payAmount">0</span>
                    </a>

                    <style>
                        .btn a {
                            color: #FFFFFF;
                        }
                    </style>
                </button>
                <?php }; ?>
            </section>

            <section class="cart">
                <div class="cartItemBox">
                    <h2 class="sectionHeading">Riwayat Pemesanan</h2>
                    <?php
                    if(isset($_SESSION['cart'])){
                        $query = pg_query("SELECT D.id_order, M.id_menu, nama_menu, foto_menu, harga_menu, qty FROM menu M, detail_order D, pesanan O WHERE (not O.status_bayar) and M.id_menu = D.id_menu and O.id_order = D.id_order and O.id_order = '".$_SESSION['cart']."' ORDER BY M.id_menu");
                        while($cart = pg_fetch_array($query)){; ?>
                    <div class="productCard">
                        <div class="card">
                            <div class="imgBox">
                                <a href="#">
                                    <div class="gambarMakanan" style="background-image: url(<?php echo $cart['foto_menu'] ?>);"></div>
                                </a>

                                <div class="descProductImage">
                                    <h3 class="judulProduct"><?php echo $cart['nama_menu'] ?></h3>
                                    <div class="hargaQuantity">
                                        <div class="jumlahProduk">
                                            <button id="decrement">
                                                <a href="incdec.php?status=dec&menu=<?php echo $cart['id_menu'] ?>&from=cart">
                                                    <i class="fa-solid fa-circle-minus"></i>
                                                </a>
                                            </button>

                                            <span id="jumlah"><?php echo $cart['qty'] ?></span>

                                            <button id="increment">
                                                <a href="incdec.php?status=inc&menu=<?php echo $cart['id_menu'] ?>&from=cart">
                                                    <i class="fa-solid fa-circle-plus"></i>
                                                </a>
                                            </button>
                                            <p class="kisaranHarga">IDR <span id="price"><?php echo number_format($cart['harga_menu']*$cart['qty'], '0', ',', '.') ?></span></p>
                                        </div>
                                    </div>
                                </div>
                                
                                <button class="closeButton">
                                    <a href="delcart.php?menu=<?php echo $cart['id_menu'] ?>">
                                        <i class="fa-solid fa-xmark"></i>
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php }}; ?>
                </div>

                <div class="wrapper">
                    <div class="discountToken">
                        <label for="discountToken" class="labelDefault">Kode Promo</label>

                        <div class="wrapperFlex">
                            <input type="text" name="discountToken" id="discountToken" class="inputDefault">
                            <button class="btn2 btn-outline">Apply</button>
                        </div>
                    </div>

                    <div class="amount">
                        <?php if(isset($_SESSION['cart'])){; ?>
                        <div class="totalHarga">
                            <span>Total Harga</span> <span>IDR<span id="totalHarga"> <?php echo number_format($total, '0', ',', '.') ?> </span></span>
                        </div>
                        <?php }else{; ?>
                        <div class="totalHarga">
                            <span>Total Harga</span> <span>IDR<span id="totalHarga"> 0</span></span>
                        </div>
                        <?php }; ?>

                        
                    </div>
                </div>
            </section>
        </div>
    </main>
    
</body>
</html>