<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Sistem Informasi Alumni MIPA</title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url()?>asset/sb-admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url()?>asset/sb-admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url()?>asset/sb-admin/css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
          <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url() ?>index.php/Auth/login/login_validation" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Nim</label>
            <input class="form-control" id="exampleInputEmail1" type="number" name="nim" placeholder="Nomor Induk Mahasiswa" required="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="exampleInputPassword1" type="password" name="password" placeholder="Password" required="">
          </div>
          <input class="btn btn-primary btn-block" type="submit" value="Login" >
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo base_url()?>index.php/Auth/signup">Register an Account</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url()?>asset/sb-admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url()?>asset/sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url()?>asset/sb-admin/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
