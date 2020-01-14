<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Sistem Informasi Alumni Unsyiah</title>
  <!-- icon image -->
  <link href="<?= base_url() ?>asset/image/logo_unsyiah.png" rel="icon">
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url()?>asset/sb-admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url()?>asset/sb-admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url()?>asset/sb-admin/css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark" style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(255,255,24,1) 0%, rgba(37,203,215,1) 90% );">
  <div class="container">

  <div class="text-center mt-5">
    <img src="<?php echo base_url()?>asset/image/logo4xtrans.png" class="img-fluid" alt="Responsive image" width="40%">
  </div>

    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Admin Form Login</div>
      <div class="card-body">
          <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url() ?>index.php/Auth/adminlogin/login_validation" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input class="form-control" id="exampleInputEmail1" type="text" name="username" placeholder="Username" required="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="exampleInputPassword1" type="password" name="password" placeholder="Password" required="">
          </div>
          <!-- <div class="form-group">
          <label for="role">Masuk Sebagai</label>
            <select name="role" class="form-control" id="role">
              <option value="Mahasiswa" >Mahasiswa</option>
              <option value="Alumni" >Alumni</option>
            </select>
          </div> -->
          <input class="btn btn-primary btn-block" type="submit" value="Login" >
        </form>

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
