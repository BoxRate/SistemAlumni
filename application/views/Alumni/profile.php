<div class="content-wrapper">
    <div class="container-fluid mt-3">

    <?= $this->session->flashdata('message'); ?>

      <div class="row mb-3">
      <div class="col-md-12">
      <form action="<?php echo base_url() ?>index.php/Alumni/profile/simpanData" method="post" >
      <div class="card">
            <div class="card-header" style="background:#f65c78; color:white">
                <div class="row">
                  <div class="col-md-11">
                      <i class="fa fa-address-card"></i> Data Diri
                  </div>
                  <div class="col-md-1 float-right">
                      <input class="btn btn-primary" type="submit" value="Simpan">
                  </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row"> 
                    <div class="col-md-6">

                    <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="nama">Nama :</label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="" aria-describedby="helpId" value="<?= $Data['Nama']?>">
                            <small id="helpId" class="text-danger"><?php echo form_error('nama') ?></small>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                      <div class="form-group">
                          <label for="kelamin">Jenis Kelamin :</label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-intersex"></i></span>
                            <select name="kelamin" id="kelamin" class="form-control" aria-describedby="helpId">
                              <option value="L" <?= $Data['Jk'] == 'L' ? ' selected="selected"' : '';?>>Laki - laki</option>
                              <option value="P" <?= $Data['Jk'] == 'P' ? ' selected="selected"' : '';?> >Perempuan</option>
                            </select>
                            <small id="helpId" class="text-danger"><?php echo form_error('kelamin') ?></small>
                          </div>
                        </div>
                      </div>

                     
                    </div>

                        

                        <div class="form-group">
                          <label for="email">Email :</label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" name="email" id="email" class="form-control" placeholder="" aria-describedby="helpId" value="<?= $Data['Email']?>">
                            <small id="helpId" class="text-danger"><?php echo form_error('email') ?></small>
                          </div>
                        </div>

                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="place">Tempat Lahir :</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-home"></i></span>
                              <input type="text" name="place" id="place" class="form-control" placeholder="" aria-describedby="helpId" value="<?= $Data['Tempat_Lahir']?>">
                              <small id="helpId" class="text-danger"><?php echo form_error('place') ?></small>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="ttl">Tanggal Lahir :</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                              <input type="date" name="ttl" id="ttl" class="form-control" placeholder="" aria-describedby="helpId" value="<?= $Data['Tanggal_Lahir']?>">
                              <small id="helpId" class="text-danger"><?php echo form_error('ttl') ?></small>
                            </div>
                          </div>
                        </div>
                        </div>

                        <div class="form-group">
                          <label for="phone">No Hp :</label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="" aria-describedby="helpId" value="<?= $Data['No_Telepon']?>">
                            <small id="helpId" class="text-danger"><?php echo form_error('phone') ?></small>
                          </div>
                        </div>


                        <div class="form-group">
                          <label for="pekerjaan">Pekerjaan :</label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                            <select name="pekerjaan" id="pekerjaan" class="form-control" aria-describedby="helpId">
                              <option value="Energi" <?= $Data['Pekerjaan'] == 'Energi' ? ' selected="selected"' : '';?>>Energi</option>
                              <option value="Kesehatan" <?= $Data['Pekerjaan'] == 'Kesehatan' ? ' selected="selected"' : '';?> >Kesehatan</option>
                              <option value="Teknologi Informasi" <?= $Data['Pekerjaan'] == 'Teknologi Informasi' ? ' selected="selected"' : '';?> >Teknologi Informasi</option>
                              <option value="PNS" <?= $Data['Pekerjaan'] == 'PNS' ? ' selected="selected"' : '';?> >PNS</option>
                              <option value="Swasta" <?= $Data['Pekerjaan'] == 'Swasta' ? ' selected="selected"' : '';?> >Swasta</option>
                              <option value="Wirausaha" <?= $Data['Pekerjaan'] == 'Wirausaha' ? ' selected="selected"' : '';?> >Wirausaha</option>
                              <option value="Scientist" <?= $Data['Pekerjaan'] == 'Scientist' ? ' selected="selected"' : '';?> >Scientist</option>
                            </select>
                            <small id="helpId" class="text-danger"><?php echo form_error('pekerjaan') ?></small>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label for="alamat">Alamat :</label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="" aria-describedby="helpId" value="<?= $Data['Alamat']?>">
                            <small id="helpId" class="text-danger"><?php echo form_error('alamat') ?></small>
                          </div>
                        </div>

                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="password">New Password :</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                              <input type="password" name="password" id="password" class="form-control" placeholder="" aria-describedby="helpId">
                              <small id="helpId" class="text-danger"><?php echo form_error('password') ?></small>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="password2">Confirm Password :</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                              <input type="password" name="password2" id="password2" class="form-control" placeholder="" aria-describedby="helpId">
                              <small id="helpId" class="text-danger"><?php echo form_error('password2') ?></small>
                            </div>
                          </div>
                        </div>
                        </div>

                    </div>

                    </form>

                    <div class="col-md-6">
                    <form action="<?php echo base_url() ?>index.php/Alumni/profile/uploadImage" method="post" enctype="multipart/form-data">
                    <div class="card float-right" style="width: 20rem;">
                        <?php if($User['Image'] != "") { ?>
                            <img class="card-img-top" src="<?= base_url()?>/asset/image/Mahasiswa/<?= $User['Image'] ?>" width="300px" height="300px" alt="avatar image">
                        <?php } else { ?>
                            <img class="card-img-top" src="<?= base_url()?>/asset/image/Mahasiswa/default.png" width="300px" height="300px"  alt="avatar image">
                        <?php } ?>
                        <div class="card-body">
                        <div class="form-group">
                          <label for="image">Gambar :</label>
                          <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="image" name="image" accept="image/x-png,image/gif,image/jpeg" required>
                            <label class="custom-file-label" for="image">Pilih Gambar</label>
                            <input hidden class="form-control" type="text" name="old_image"  value="<?= $User['Image'] ?>" readonly="readonly">
                          </div>
                        </div>

                        <div class ="form-group">
                          <input type="submit" class="btn btn-primary" value="Change Image">
                        </div>
                    
                        </div>
                      </div>
                      </form>
                    </div>                    
                </div>
            </div>
            
            
        </div>
        </div>
       
     
        </div>
       
      <!-- Example DataTables Card-->

      
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