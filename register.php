<?php 

require_once 'session.php';
require_once 'functions.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Register</title>

  <!-- Custom fonts for this template-->
  <link href="_template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="_template/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Buat Akun Baru!</h1>
              </div>
              <?php if (check_flash_message('gagal')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php get_flash_message() ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php endif ?>
              <form class="user" method="POST" action="proses_register.php">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" required="required" placeholder="Nama Lengkap" name="nama" autocomplete="off">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" required="required" placeholder="Username" name="username" autocomplete="off">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" required="required" placeholder="Password" name="password"  autocomplete="off">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" required="required" placeholder="Konfirmasi Password" name="password2">
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-block btn-primary btn-user">Daftar</button>
                </div>
              </form>
              <hr>
              <div class="text-center">
                <span class="small">Sudah punya akun?</span> <a class="small" href="login.php">Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="_template/vendor/jquery/jquery.min.js"></script>
  <script src="_template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="_template/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
