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
	$mapel = $_POST['nama_mapel'];
	$jumlah_jam = $_POST['jumlah_jam'];
	$guru_pengampu = $_POST['guru_pengampu'];
	$ruangan = $_POST['ruangan'];
	$id = $_GET['id'];

	$query = mysqli_query($koneksi, "UPDATE tbl_mapel SET mapel = '$mapel', jumlah_jam = $jumlah_jam, guru_pengampu = '$guru_pengampu', ruangan = '$ruangan' WHERE id = $id");

	if($query){
		set_flash_message('sukses', 'Data berhasil diubah!');
		header('Location: index.php');
	} else die('gagal!' . mysqli_error($koneksi));
} else {
	header('Location: tambah.php');
}

?>