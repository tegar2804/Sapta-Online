<?php
$db=pg_connect('host=localhost dbname= user=postgres password= port=');
if( !$db ){
    die("Gagal terhubung dengan database: " . pg_connect_error());
}
?>