<?php 

// panggil file yang dibutuhkan
require_once 'session.php';
require_once 'koneksi.php';
require_once 'functions.php';

if(isset($_POST['simpan'])){
	$nama_kelas = $_POST['nama_kelas'];
    $wali_kelas = $_POST['wali_kelas'];
    $sekolah = $_POST['sekolah'];
    $alamat_sekolah = $_POST['alamat_sekolah'];
    $tahun_ajaran = $_POST['tahun_ajaran'];
    $semester = $_POST['semester'];

    $query = mysqli_query($koneksi, "UPDATE tbl_kelas SET kelas = '$nama_kelas', wali_kelas = '$wali_kelas', sekolah = '$sekolah', alamat_sekolah = '$alamat_sekolah', tahun_ajaran = '$tahun_ajaran', semester = '$semester' WHERE id = 1");

    if($query){
    	set_flash_message('sukses', 'Data berhasil diubah!');
		header('Location: dashboard.php');
    } else die('gagal'. mysqli_error($koneksi));
}


?>