<?php 

// panggil file yang dibutuhkan
require_once 'session.php';
require_once 'koneksi.php';
require_once 'functions.php';

if (!isset($_SESSION['auth'])) {
	set_flash_message('gagal', 'Anda harus login dulu!');
	header('Location: login.php');
}

$query = mysqli_query($koneksi, "SELECT * FROM tbl_kelas WHERE id = 1");
$kelas = mysqli_fetch_assoc($query);
$siswa = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM tbl_siswa"));
$guru = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(guru_pengampu) AS total FROM tbl_mapel"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?= $_SESSION['app_name'] ?> - Dashboard</title>
  <link href="_template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="_template/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
	<div id="wrapper">
	<?php require_once '_sidebar.php'; ?>
		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

		<!-- Main Content -->
		<div id="content">

		<!-- Topbar -->
		<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

		<!-- Topbar Navbar -->
		<?php require_once '_topnav.php'; ?>
		</nav>
		<!-- End of Topbar -->
		<!-- Begin Page Content -->
		<div class="container-fluid">
		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
		<hr>
		<?php if (check_flash_message('sukses')): ?>
	        <div class="alert alert-success alert-dismissible fade show" role="alert">
	            <?php get_flash_message() ?>
	          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button>
	        </div>
	      <?php elseif(check_flash_message('gagal')) : ?>
	        <div class="alert alert-danger alert-dismissible fade show" role="alert">
	            <?php get_flash_message() ?>
	          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button>
	        </div>
	    <?php endif ?>
			<div class="row">
			<!-- Earnings (Monthly) Card Example -->
				<div class="col-md-3 mb-4">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nama Kelas</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $kelas['kelas']; ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-smile-wink fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 mb-4">
					<div class="card border-left-danger shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nama Wali Kelas</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $kelas['wali_kelas']; ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-user fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 mb-4">
					<div class="card border-left-success shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Siswa</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $siswa['total']; ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-users fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 mb-4">
					<div class="card border-left-warning shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Guru Pengampu</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $guru['total']; ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-book-open fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="card shadow">
						<div class="card-header">Data Kelas - <?php echo $kelas['kelas'] ?></div>
						<div class="card-body">
							<form action="proses_ubah.php" method="POST">
								<div class="form-group">
									<label for="nama_kelas">Nama Kelas </label>
									<input type="text" name="nama_kelas" class="form-control" autocomplete="off" required="required" value="<?php echo $kelas['kelas'] ?>">
								</div>
								<div class="form-group">
									<label for="wali_kelas">Wali Kelas </label>
									<input type="text" name="wali_kelas" class="form-control" autocomplete="off" required="required" value="<?php echo $kelas['wali_kelas'] ?>">
								</div>
								<div class="form-group">
									<label for="sekolah">Sekolah </label>
									<input type="text" name="sekolah" class="form-control" autocomplete="off" required="required" value="<?php echo $kelas['sekolah'] ?>">
								</div>
								<div class="form-group">
									<label for="alamat_sekolah">Alamat Sekolah </label>
									<input type="text" name="alamat_sekolah" class="form-control" autocomplete="off" required="required" value="<?php echo $kelas['alamat_sekolah'] ?>">
								</div>
								<div class="form-group">
									<label for="tahun_ajaran">Tahun Ajaran </label>
									<input type="text" name="tahun_ajaran" class="form-control" autocomplete="off" required="required" value="<?php echo $kelas['tahun_ajaran'] ?>">
								</div>
								<div class="form-group">
									<label for="semester">Semester </label>
									<input type="text" name="semester" class="form-control" autocomplete="off" required="required" value="<?php echo $kelas['semester'] ?>">
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-sm btn-primary" name="simpan" onclick="return confirm('apakah anda yakin?')"><i class="fas fa-save"></i> Ubah</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- /.container-fluid -->
		</div>
		<!-- End of Main Content -->

		<!-- Footer -->
		<footer class="sticky-footer bg-white">
		<div class="container my-auto">
		<div class="copyright text-center my-auto">
		<span>Copyright &copy; Your Website 2019</span>
		</div>
		</div>
		</footer>
		<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>

<!-- End of Page Wrapper -->
<script src="_template/vendor/jquery/jquery.min.js"></script>
<script src="_template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="_template/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="_template/js/sb-admin-2.min.js"></script>
</body>

</html>
