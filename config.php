<?php
$db=pg_connect('host=localhost dbname=proyek_basdat user=postgres password=student');
if( !$db ){
    die("Gagal terhubung dengan database: " . pg_connect_error());
}
?>
