

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  


</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
      <?= $this->session->flashdata('message'); ?>
        <form action="<?php echo base_url() ?>index.php/Auth/signup/register" method="post">
          <div class="form-group">

                <label for="exampleInputName">Nama Lengkap</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Masukkan Nama Lengkap" name="nama" required="">
                <small class="text-danger"><?php echo form_error('nama') ?></small>
       
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Alamat Email</label>
            <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="ex: abcd@axc.mail.com" name="email" required="">
            <small class="text-danger"><?php echo form_error('email') ?></small> 
        </div>
        <div class="form-group">
                <label for="exampleInputNim">Nim</label>
                <input class="form-control" id="exampleInputNim" type="number" aria-describedby="nameHelp" placeholder="Masukkan Nomor Induk Mahasiswa" name="nim" required="">
                <small class="text-danger"><?php echo form_error('nim') ?></small>
        </div>
          <div class="form-group">
            <div class="form-row">
            <div class="col-md-6">
                <label for="exampleInputPassword1">Password</label>
                <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password" name="password" required="">
            </div>
              <div class="col-md-6">
                <label for="exampleInputPassword2">Konfirmasi Password</label>
                <input class="form-control" id="exampleInputPassword2" type="password" placeholder="Password" name="konfirm_password" required="">
            </div>
            <small class="text-danger"><?php echo form_error('password') ?></small>  
            </div>
          </div>
          <div class="form-group">
          <label for="jurusan">Jurusan</label>
            <select name="jurusan" class="form-control" id="">
              <option value="Matematika" >Matematika</option>
              <option value="Fisika" >Fisika</option>
              <option value="Kimia" >Kimia</option>
              <option value="Biologi" >Biologi</option>
              <option value="Teknik Elektronika" >Teknik Elektronika</option>
              <option value="Informatika" >Informatika</option>
              <option value="Manajemen Informatika" >Manajemen Informatika</option>
              <option value="Statistika" >Statistika</option>
              <option value="Farmasi" >Farmasi</option>
            </select>
          </div>

          
           <div class="form-group">
          <label for="role">Sebagai</label>
            <select name="role" class="form-control" id="role">
              <option value="Mahasiswa" >Mahasiswa</option>
              <option value="Alumni" >Alumni</option>
            </select>
          </div>

          <div id="tahunGroup" class="form-group" >
            <div class="form-row">
              <div class="col-md-6">
                  <label for="tahun_masuk">Tahun Masuk</label>
                  <input class="form-control" id="tahun_masuk" type="text" placeholder="" name="tahun_masuk" >
              </div>
              <div class="col-md-6">
                <label for="tahun_keluar">Tahun Lulus</label>
                <input class="form-control" id="tahun_keluar" type="text" placeholder="" name="tahun_keluar" >
            </div>
            <small class="text-danger"><?php echo form_error('tahun_keluar') ?></small>  
            </div>
            
          </div>
          <input class="btn btn-primary btn-block" type="submit" value="Register" >
          </div>
        </form>
        <div class="text-center mb-3">
          <a class="d-block small mt-3" href="<?php echo base_url()?>index.php/Auth/login">Login Page</a>
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

<script>
    $(document).ready(function(){
      
      var role = $('#role').val();
           if(role == 'Alumni')
           {
            $('#tahunGroup').show();
           } else {
            $('#tahunGroup').hide();
           }

      $('#role').change(function(){
           var role = $('#role').val();
           if(role == 'Alumni')
           {
            $('#tahunGroup').show();
           } else {
            $('#tahunGroup').hide();
           }
      });
 });
</script>