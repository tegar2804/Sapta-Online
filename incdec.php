<?php
include("config.php");
session_start();
if(!isset($_SESSION['email'])){
    header("Location: login.php");
    exit;
}
if(!isset($_GET['status']) || !isset($_GET['menu'])|| !isset($_GET['from'])){
    die("AKSES DILARANG!!!");
    exit;
}else if(!isset($_SESSION['cart'])){
    $add_order = pg_query("INSERT INTO pesanan(email, tanggal_order, harga_total, status_bayar) VALUES ('".$_SESSION['email']."', NOW(), 0, FALSE)");
    $datacart = pg_query("SELECT * FROM pesanan WHERE email = '".pg_escape_string($_SESSION['email'])."' and status_bayar = FALSE");
    $_SESSION['cart'] = pg_fetch_array($datacart)['id_order'];
}
$data_menu_cart = pg_query("SELECT D.id_menu, id_order, qty, harga_menu FROM detail_order D, menu M WHERE M.id_menu = D.id_menu and id_order = '".$_SESSION['cart']."' and D.id_menu = '".$_GET['menu']."'");
$cek = pg_num_rows($data_menu_cart);
$menu_cart = pg_fetch_array($data_menu_cart);
if($cek == 1){
    $id_menu = $menu_cart['id_menu'];
    $harga_menu = $menu_cart['harga_menu'];
    if($_GET['status'] == 'inc'){
        $query = pg_query("UPDATE detail_order SET qty = qty+1 WHERE id_order = '".$_SESSION['cart']."' AND id_menu = '$id_menu'");
        $query_order = pg_query("UPDATE pesanan SET harga_total = harga_total+$harga_menu WHERE id_order = '".$_SESSION['cart']."'");
    }else if($_GET['status'] == 'dec'){
        if($menu_cart['qty'] == 1){
            header("Location: delcart.php?menu=".$_GET['menu']."");
            exit;
        }else{
            $query = pg_query("UPDATE detail_order SET qty = qty-1 WHERE id_order = '".$_SESSION['cart']."' and id_menu = '$id_menu'");
        }
        $query_order = pg_query("UPDATE pesanan SET harga_total = harga_total-$harga_menu WHERE id_order = '".$_SESSION['cart']."'");
    }
}else{
    $add_detail = pg_query("INSERT INTO detail_order (id_order, id_menu, qty) VALUES (".$_SESSION['cart'].", '".$_GET['menu']."', 1)");
    $harga_menu = pg_fetch_array(pg_query("SELECT D.id_menu, id_order, qty, harga_menu FROM detail_order D, menu M WHERE M.id_menu = D.id_menu and id_order = '".$_SESSION['cart']."' and D.id_menu = '".$_GET['menu']."'"))['harga_menu'];
    $query_order = pg_query("UPDATE pesanan SET harga_total = harga_total+$harga_menu WHERE id_order = '".$_SESSION['cart']."'");
}
#$harga_total = pg_fetch_array(pg_query("SELECT SUM(harga_menu*qty) FROM detail_order D, menu M WHERE M.id_menu = D.id_menu and id_order = '".$_SESSION['cart']."'"))['sum'];
#$query_order = pg_query("UPDATE pesanan SET harga_total = $harga_total WHERE id_order = '".$_SESSION['cart']."'");
if($_GET['from'] == 'cart'){
    header("Location: cart.php");
}else{
    header("Location: kantin.php?toko=".$_GET['from']."");
}
?>