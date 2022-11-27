<?php
include("config.php");
session_start();
if(!isset($_SESSION['email'])){
    header("Location: login.php");
    exit;
}
$harga = pg_fetch_array(pg_query("SELECT * FROM pesanan WHERE id_order = '".$_SESSION['cart']."'"));
if($harga['harga_total'] > 0){
    $bayar = pg_query("UPDATE pesanan SET tanggal_order = NOW(), status_bayar = TRUE WHERE id_order = '".$_SESSION['cart']."'");
    unset($_SESSION['cart']);
}else{
    header("Location: cart.php");
    exit;
}
header("Location: invoice.php");
?>