<div class="content-wrapper">
    <div class="container-fluid mt-3">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb bg">
        <li class="breadcrumb-item">
          <a class="fa fa-cog"> Pengaturan/ <?= $User['Nama']?></a>
        </li>
      </ol>
      <?= $this->session->flashdata('message'); ?>

      <div class="row">
      <div class = "col-md-6 mb-3">
        <form action="<?php echo base_url() ?>index.php/Mahasiswa/setting/simpanData" method="post" enctype="multipart/form-data">
          <div class="form-group">       
              <label for="nama">Nama</label>
              <input class="form-control" id="nama" type="text" name="nama" aria-describedby="Nama" value="<?= $User['Nama'] ?>">    
              <small class="text-danger"><?php echo form_error('nama') ?></small>     
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" id="email" type="email" name="email" aria-describedby="emailHelp" value="<?= $User['Email'] ?>">
            <small class="text-danger"><?php echo form_error('email') ?></small>  
        </div>
          <div class="form-group">
          <label for="image">Gambar</label>
          <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="image" name="image" accept="image/x-png,image/gif,image/jpeg">
            <label class="custom-file-label" for="image">Pilih Gambar</label>
            <input hidden class="form-control" type="text" name="old_image"  value="<?= $User['Image'] ?>" readonly="readonly">
          </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="password">Password Baru</label>
                <input class="form-control" id="password" name="password1" type="password" placeholder="Password">
                <small class="text-danger"><?php echo form_error('password1') ?></small>  
            </div>
              <div class="col-md-6">
                <label for="password2">Konfirmasi password Baru</label>
                <input class="form-control" id="password2" name="password2" type="password" placeholder="Konfirmasi password">
              </div>
            </div>
          </div>
          <input class="btn btn-primary btn-block" type="submit" value="Simpan">
        </form>
    </div>

    <div class="col-md-3 mt-5" style="margin-left: 100px "> 
        <?php if($User['Image'] != "") { ?>
            <img src="<?= base_url()?>/asset/image/Mahasiswa/<?= $User['Image'] ?>" style="width: 300px; height: 300px; object-fit: cover;" alt="avatar image">
        <?php } else { ?>
            <img src="<?= base_url()?>/asset/image/Mahasiswa/default.png" style="width: 300px; height: 300px; object-fit: cover;"  alt="avatar image">
        <?php } ?>
    </div>

</div>

</div>
</div>

<script>
// Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

