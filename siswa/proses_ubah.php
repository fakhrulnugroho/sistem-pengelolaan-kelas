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
	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$agama = $_POST['agama'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$alamat = $_POST['alamat'];
	$id = $_GET['id'];

	$query = mysqli_query($koneksi, "UPDATE tbl_siswa SET nis = $nis, nama = '$nama', agama = '$agama', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', alamat = '$alamat' WHERE id = $id");

	if($query){
		set_flash_message('sukses', 'Data berhasil diubah!');
		header('Location: index.php');
	} else die('gagal!' . mysqli_error($koneksi));
} else {
	header('Location: tambah.php');
}

?>