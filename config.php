<?php
$db=pg_connect('host=localhost dbname=proyek_basdat user=postgres password=Pqlamz01#psql');
if( !$db ){
    die("Gagal terhubung dengan database: " . pg_connect_error());
}
?>
