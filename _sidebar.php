<?php 
// panggil file yang dibutuhkan
require_once 'session.php';
require_once 'koneksi.php';
require_once 'functions.php';

if (!isset($_SESSION['auth'])) {
  set_flash_message('gagal', 'Anda harus login dulu!');
  header('Location: login.php');
}

$query1 = mysqli_query($koneksi, "SELECT kelas FROM tbl_kelas WHERE id = 1");
$kelas1 = mysqli_fetch_assoc($query1);

?>
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('dashboard.php') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?php echo $kelas1['kelas']; ?></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('dashboard.php') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item">
      	<a href="<?= base_url('siswa/index.php') ?>" class="nav-link">
      		<i class="fas fa-fw fa-users"></i>
      		<span>Data Siswa</span>
      	</a>
      </li>
      <li class="nav-item">
        <a href="<?= base_url('inventori/index.php') ?>" class="nav-link">
          <i class="fas fa-fw fa-box"></i>
          <span>Data Inventori</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= base_url('mapel/index.php') ?>" class="nav-link">
          <i class="fas fa-fw fa-book-open"></i>
          <span>Mata Pelajaran</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= base_url('akun/index.php') ?>" class="nav-link">
          <i class="fas fa-fw fa-lock"></i>
          <span>Manajemen Akun</span>
        </a>
      </li>
      <hr class="sidebar-divider d-none d-md-block">
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>