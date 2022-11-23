<?php
include("config.php");
if(isset($_POST['regis'])){
	$nama = $_POST['nama_lengkap'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$jk = $_POST['jk'];
	$telp = $_POST['telp'];

	// buat query
  $query = pg_query("INSERT INTO customer (nama_lengkap, email, password, jk, telp) VALUEs ('$nama', '$email', '$password', '$jk', '$telp')");

	if( $query==TRUE ) {
		header('Location: beranda.php');
	} else {
		header('Location: register.php');
	}


} else {
	die("Akses dilarang...");
}
?>
