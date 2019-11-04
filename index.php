<?php 

require_once 'session.php';
require_once 'functions.php';

if (!isset($_SESSION['auth'])) {
	set_flash_message('gagal', 'Anda harus login dulu!');
	header('Location: login.php');
}

header('Location: dashboard.php');

?>