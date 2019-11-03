<?php 

// panggil file yang dibutuhkan
require_once 'session.php';
require_once 'koneksi.php';
require_once 'functions.php';


// ambil semua data atau value dari form
$username = $_POST['username'];
$password = $_POST['password'];

// cek apakah data sudah diisi atau belum
if($username == '' && $password == ''){
	set_flash_message('gagal', 'Semua data wajib diisi!');
	header('Location: login.php');
	die();
}

// cek username ada atau tidak
$cek_username = mysqli_query($koneksi, "SELECT * FROM tbl_users WHERE username = '$username'");
if($cek_username->num_rows == 1){
	// ambil data berdasarkan username di database
	$data = mysqli_fetch_assoc($cek_username);

	if(password_verify($password, $data['password'])){
		$_SESSION['auth'] = [
			'logged_in' => TRUE,
			'nama' => $data['nama'],
			'username' => $data['username'],
			'password' => $data['password'],
		];

		set_flash_message('sukses', 'Login sukses!');
		header('Location: dashboard.php');
	} else {
		set_flash_message('gagal', 'Password tidak cocok!');
		header('Location: login.php');
		die();
	}
} else {
	set_flash_message('gagal', 'Username tidak tersedia!');
	header('Location: login.php');
	die();
}
?>