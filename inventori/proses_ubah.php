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
	$id = $_GET['id'];

	$query = mysqli_query($koneksi, "UPDATE tbl_inventori SET nama = '$nama', jumlah = $jumlah, kondisi = '$kondisi' WHERE id = $id");

	if($query){
		set_flash_message('sukses', 'Data berhasil diubah!');
		header('Location: index.php');
	} else die('gagal!' . mysqli_error($koneksi));
} else {
	header('Location: tambah.php');
}

?>