<?php
include("config.php");
session_start();
if(!isset($_SESSION['email'])){
    header("Location: login.php");
    exit;
}
if(!isset($_SESSION['cart']) || !isset($_GET['menu'])){
    die("AKSES DILARANG!!!");
    exit;
}else{
    $data_menu_cart = pg_fetch_array(pg_query("SELECT D.id_menu, id_order, qty, harga_menu FROM detail_order D, menu M WHERE M.id_menu = D.id_menu and id_order = '".$_SESSION['cart']."' and D.id_menu = '".$_GET['menu']."'"));
    $qty = $data_menu_cart['qty'];
    $harga = $data_menu_cart['harga_menu']*$qty;
    $query_order = pg_query("UPDATE pesanan SET harga_total = harga_total-$harga WHERE id_order = '".$_SESSION['cart']."'");
    $query = pg_query("DELETE FROM detail_order WHERE id_order = ".$_SESSION['cart']." and id_menu = '".$_GET['menu']."'");
}
header("Location: cart.php");
?>