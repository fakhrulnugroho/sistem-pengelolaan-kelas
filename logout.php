<?php 

// panggil file yang dibutuhkan
require_once 'session.php';
require_once 'koneksi.php';
require_once 'functions.php';

if (isset($_SESSION['auth'])) {
	unset($_SESSION['auth']);
	set_flash_message('sukses', 'Anda berhasil logout!');
	header('Location: login.php');
}

?>