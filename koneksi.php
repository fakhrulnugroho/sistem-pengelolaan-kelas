<?php 


require_once dirname(__FILE__) . "/config.php";

$koneksi = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die("Gagal Konek!");

?>
