<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Register</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/dist/css/adminlte.min.css'); ?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Halaman Register</p>

      <form action="<?= base_url('auth/process_register'); ?>" method="POST">
  <!-- username -->
  <div class="input-group mb-3">
    <input type="text" class="form-control" name="username" id="username" placeholder="username" required>
    <div class="input-group-append">
      <div class="input-group-text"><span class="fas fa-user"></span></div>
    </div>
  </div>

  <!-- password -->
  <div class="input-group mb-3">
    <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
    <div class="input-group-append">
      <div class="input-group-text"><span class="fas fa-lock"></span></div>
    </div>
  </div>

  <!-- konfirmasi password -->
  <div class="input-group mb-3">
    <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Konfirmasi Password" required>
    <div class="input-group-append">
      <div class="input-group-text"><span class="fas fa-lock"></span></div>
    </div>
  </div>

  <div class="row">
    <div class="col-4">
      <button type="submit" class="btn btn-primary btn-block">Register</button>
    </div>
  </div>
</form>
      <a href="<?= base_url('auth/login'); ?>" class="text-center">Punya akun? Klik login</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
