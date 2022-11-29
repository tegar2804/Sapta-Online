<?php
$db=pg_connect('host=localhost dbname=proyek_basdat user=postgres password=Pramudya03');
if( !$db ){
    die("Gagal terhubung dengan database: " . pg_connect_error());
}
?>
