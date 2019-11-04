<?php 

// panggil file yang dibutuhkan
require_once '../session.php';
require_once '../koneksi.php';
require_once '../functions.php';

if (!isset($_SESSION['auth'])) {
	set_flash_message('gagal', 'Anda harus login dulu!');
	header('Location: login.php');
}

if(isset($_POST['simpan'])){
	// print_r($_POST);
	$nama = $_POST['nama_barang'];
	$jumlah = $_POST['jumlah_barang'];
	$kondisi = $_POST['kondisi_barang'];

	$query = mysqli_query($koneksi, "INSERT INTO tbl_inventori (nama, jumlah, kondisi) VALUES ('$nama', $jumlah, '$kondisi')");

	if($query){
		set_flash_message('sukses', 'Data berhasil ditambahkan!');
		header('Location: index.php');
	} else die('gagal!' . mysqli_error($koneksi));
} else {
	header('Location: tambah.php');
}

?>