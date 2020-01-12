

<div class="content-wrapper">
    <div class="container-fluid mt-3">

    <?= $this->session->flashdata('message'); ?>

     
      <div class="card mb-3">
            <div class="card-header" style="background:#f65c78; color:white">
                <div class="row">
                  <div class="col-md-10">
                      <i class="fa fa-address-card"></i> Pengalaman
                  </div>
                  <div class="col-md-2">
                  <div class="float-right">
                     <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalTambah">
                        <i class="fa fa-plus"></i> Tambah
                     </button>
                  </div>
                  </div>
                </div>
            </div>
        </div>
   
    <div class="row"> 
        <div class="col-md-6">
        <div class="card">
            <div class="card-header" style="background:#f65c78; color:white">
                <i class="fa fa-sitemap"></i> Riwayat Pekerjaan
            </div>
            <div class="card-body">

            <ul class="list-group">
                <?php foreach($Pekerjaan as $keys): ?>
				<li class="list-group-item mb-1">
					<a style="color:#f65c78"><?= $keys["Nama_Pekerjaan"] ?> ( <?= $keys["Tahun_Masuk"] ?> - <?= $keys["Tahun_Keluar"] ?> )</a>
                    <button class="ml-2 float-right btn btn-danger" data-toggle="modal" data-target="#deletepk-<?=$keys['id']?>">
                        <i class="fa fa-trash"></i>
                    </button>
                    <button class="float-right btn btn-success" data-toggle="modal" data-target="#pekerjaan-<?=$keys['id']?>">
                        <i class="fa fa-pencil"></i>
                    </button>
                </li>


                <!-- Delete Modal -->
                <div class="modal fade" id="deletepk-<?=$keys['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apa anda yakin ingin menghapus data Pekerjaan <?=$keys['Nama_Pekerjaan']?> ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a class="btn btn-danger" href="<?= base_url() ?>index.php/Alumni/pengalaman/deletePekerjaan?id=<?=$keys['id']?>">OK</a>
                        </div>
                        </div>
                    </div>
                    </div>
                <!-- End Delete Modal -->

                <div class="modal fade" id="pekerjaan-<?=$keys['id']?>" tabindex="-1" role="dialog" aria-labelledby="Ubah" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Ubah</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url() ?>index.php/Alumni/pengalaman/editPekerjaan" method="post" >
                        <div class="modal-body">  
                            <input hidden type="text" name="id_penghargaan" id="" class="form-control" placeholder="" aria-describedby="" value="<?= $keys["id"] ?>" readonly>   
                                <div class="form-group">
                                    <label for="">Nama Pekerjaan</label>
                                    <input type="text" name="nama" id="" class="form-control" placeholder="" aria-describedby="" value="<?= $keys["Nama_Pekerjaan"] ?>">
                                </div>
                            <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Tahun Masuk</label>
                                    <input type="number" name="tahun_masuk" id="" class="form-control" placeholder="" aria-describedby="" value="<?= $keys["Tahun_Masuk"] ?>">
                                </div>
                           </div>
                           <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Tahun Keluar</label>
                                    <input type="number" name="tahun_keluar" id="" class="form-control" placeholder="" aria-describedby="" value="<?= $keys["Tahun_Keluar"] ?>">
                                </div>
                            </div>
                           </div>

                           <div class="form-group">
                             <label for="">Keterangan</label>
                             <textarea type="text" name="keterangan" id="" class="form-control" placeholder="" aria-describedby=""><?= $keys["Keterangan"] ?></textarea>
                           </div>
                        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        </div>

                        </form>
                        </div>
                        
                    </div>
                </div>

                <?php endforeach; ?>
            </ul>
            
            </div>
                
        </div>

        <div class="card mt-3 mb-3" >
            <div class="card-header" style="background:#fff3af;">
            <i class="fa fa-certificate"></i> Penghargaan 
            </div>
            <div class="card-body">
            <ul class="list-group" id="organisasi">
                <?php foreach($Penghargaan as $keys): ?>
				<li class="list-group-item mb-1">
					<a style="color:#f65c78"><?= $keys["Nama_Penghargaan"] ?> ( <?= $keys["Tahun"] ?> )</a>
                    <button class="ml-2 float-right btn btn-danger" data-toggle="modal" data-target="#deletepg-<?=$keys['id']?>">
                        <i class="fa fa-trash"></i>
                    </button>
                    <button class="float-right btn btn-success" data-toggle="modal" data-target="#penghargaan-<?=$keys['id']?>">
                        <i class="fa fa-pencil"></i>
                    </button>
                </li>

                 <!-- Delete Modal -->
                 <div class="modal fade" id="deletepg-<?=$keys['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apa anda yakin ingin menghapus data Penghargaan <?=$keys['Nama_Penghargaan']?> ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a class="btn btn-danger" href="<?= base_url() ?>index.php/Alumni/pengalaman/deletePenghargaan?id=<?=$keys['id']?>">OK</a>
                        </div>
                        </div>
                    </div>
                    </div>
                <!-- End Delete Modal -->


                <div class="modal fade" id="penghargaan-<?=$keys['id']?>" tabindex="-1" role="dialog" aria-labelledby="Ubah" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Ubah</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url() ?>index.php/Alumni/pengalaman/editPenghargaan" method="post" >
                        <div class="modal-body">  
                            <input hidden type="text" name="id_penghargaan" id="" class="form-control" placeholder="" aria-describedby="" value="<?= $keys["id"] ?>" readonly>   
                            <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="">Nama Penghargaan</label>
                                    <input type="text" name="nama" id="" class="form-control" placeholder="" aria-describedby="" value="<?= $keys["Nama_Penghargaan"] ?>">
                                </div>
                           </div>
                           <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Tahun</label>
                                    <input type="number" name="tahun" id="" class="form-control" placeholder="" aria-describedby="" value="<?= $keys["Tahun"] ?>">
                                </div>
                            </div>
                           </div>

                           <div class="form-group">
                             <label for="">Keterangan</label>
                             <textarea type="text" name="keterangan" id="" class="form-control" placeholder="" aria-describedby=""><?= $keys["Keterangan"] ?></textarea>
                           </div>
                        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        </div>

                        </form>
                        </div>

                    </div>
                </div>
                <?php endforeach; ?>
            </ul>
            </div>
                
        </div>
        </div>

        <div class="col-md-6">
        <div class="card" >
            <div class="card-header" style="background:#ffd271;">
            <i class="fa fa-link"></i> Riwayat Organisasi 
            </div>
            <div class="card-body">
            <ul class="list-group" id="organisasi">
                <?php foreach($Organisasi as $keys): ?>
				<li class="list-group-item mb-1">
					<a style="color:#ff8364; "><?= $keys["Nama_Organisasi"] ?> ( <?= $keys["Tahun_Masuk"] ?> - <?= $keys["Tahun_Keluar"] ?> )</a>
					<button class="ml-2 float-right btn btn-danger" data-toggle="modal" data-target="#deleteog-<?=$keys['id']?>">
                        <i class="fa fa-trash"></i>
                    </button>
                    <button class="float-right btn btn-success" data-toggle="modal" data-target="#organisasi-<?=$keys['id']?>">
                        <i class="fa fa-pencil"></i>
                    </button>
                </li>

                <!-- Delete Modal -->
                <div class="modal fade" id="deleteog-<?=$keys['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apa anda yakin ingin menghapus data Organisasi <?=$keys['Nama_Organisasi']?> ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a class="btn btn-danger" href="<?= base_url() ?>index.php/Alumni/pengalaman/deleteOrganisasi?id=<?=$keys['id']?>">OK</a>
                        </div>
                        </div>
                    </div>
                    </div>
                <!-- End Delete Modal -->


                <div class="modal fade" id="organisasi-<?=$keys['id']?>" tabindex="-1" role="dialog" aria-labelledby="Ubah" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Ubah</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url() ?>index.php/Alumni/pengalaman/editOrganisasi" method="post" >
                        <div class="modal-body">  
                            <input hidden type="text" name="id_penghargaan" id="" class="form-control" placeholder="" aria-describedby="" value="<?= $keys["id"] ?>" readonly>   
                                <div class="form-group">
                                    <label for="">Nama Organisasi</label>
                                    <input type="text" name="nama" id="" class="form-control" placeholder="" aria-describedby="" value="<?= $keys["Nama_Organisasi"] ?>">
                                </div>
                            <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Tahun Masuk</label>
                                    <input type="number" name="tahun_masuk" id="" class="form-control" placeholder="" aria-describedby="" value="<?= $keys["Tahun_Masuk"] ?>">
                                </div>
                           </div>
                           <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Tahun Keluar</label>
                                    <input type="number" name="tahun_keluar" id="" class="form-control" placeholder="" aria-describedby="" value="<?= $keys["Tahun_Keluar"] ?>">
                                </div>
                            </div>
                           </div>

                           <div class="form-group">
                             <label for="">Keterangan</label>
                             <textarea type="text" name="keterangan" id="" class="form-control" placeholder="" aria-describedby=""><?= $keys["Keterangan"] ?></textarea>
                           </div>
                        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        </div>

                        </form>
                        </div>
                        
                    </div>
                </div>


                <?php endforeach; ?>
            </ul>
            
            </div>
                
        </div>

        <div class="card mt-3 mb-3" >
            <div class="card-header" style="background:#c3f584;">
            <i class="fa fa-graduation-cap"></i> Riwayat Pendidikan 
            </div>
            <div class="card-body">
            <ul class="list-group" id="pendidikan" >
                <?php foreach($Pendidikan as $keys): ?>
				<li class="list-group-item mb-1">
					<a style="color:#f65c78; "><?= $keys["Nama_Instansi"] ?> (
					<?= $keys["Tahun_Masuk"] ?> - <?= $keys["Tahun_Keluar"] ?> )</a>
                    <button class="ml-2 float-right btn btn-danger" data-toggle="modal" data-target="#deletepd-<?=$keys['id']?>">
                        <i class="fa fa-trash"></i>
                    </button>
                    <button class="float-right btn btn-success" data-toggle="modal" data-target="#pendidikan-<?=$keys['id']?>">
                        <i class="fa fa-pencil"></i>
                    </button>
                </li>


                <!-- Delete Modal -->
                <div class="modal fade" id="deletepd-<?=$keys['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apa anda yakin ingin menghapus data pendidikan di <?=$keys['Nama_Instansi']?> ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a class="btn btn-danger" href="<?= base_url() ?>index.php/Alumni/pengalaman/deletePendidikan?id=<?=$keys['id']?>">OK</a>
                        </div>
                        </div>
                    </div>
                    </div>
                <!-- End Delete Modal -->

                <div class="modal fade" id="pendidikan-<?=$keys['id']?>" tabindex="-1" role="dialog" aria-labelledby="Ubah" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Ubah</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url() ?>index.php/Alumni/pengalaman/editPendidikan" method="post" >
                        <div class="modal-body">  
                            <input hidden type="text" name="id_penghargaan" id="" class="form-control" placeholder="" aria-describedby="" value="<?= $keys["id"] ?>" readonly>   
                                <div class="form-group">
                                    <label for="">Nama Instansi</label>
                                    <input type="text" name="nama" id="" class="form-control" placeholder="" aria-describedby="" value="<?= $keys["Nama_Instansi"] ?>">
                                </div>
                            <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Tahun Masuk</label>
                                    <input type="number" name="tahun_masuk" id="" class="form-control" placeholder="" aria-describedby="" value="<?= $keys["Tahun_Masuk"] ?>">
                                </div>
                           </div>
                           <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Tahun Keluar</label>
                                    <input type="number" name="tahun_keluar" id="" class="form-control" placeholder="" aria-describedby="" value="<?= $keys["Tahun_Keluar"] ?>">
                                </div>
                            </div>
                           </div>

                           <div class="form-group">
                             <label for="">Kota</label>
                             <input type="text" name="keterangan" id="" class="form-control" placeholder="" aria-describedby="" value="<?= $keys["Alamat"] ?>">
                           </div>
                        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        </div>

                        </form>
                        </div>
                        
                    </div>
                </div>


                <?php endforeach; ?>
            </ul>
            </div>
                
        </div>

        </div>
      

      
    </div>

</div>
</div>


<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Pilih Data yang Ingin di Tambahkan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  
        <button class="btn col-md-12 mb-1" style="background:#f65c78; color:white" data-toggle="modal" data-target="#pekerjaanModal">
            Pekerjaan
        </button>
        
        <button class="btn col-md-12 mb-1" style="background:#ffd271;" data-toggle="modal" data-target="#organisasiModal">
            Organisasi
        </button>
        
        <button class="btn col-md-12 mb-1" style="background:#fff3af;" data-toggle="modal" data-target="#penghargaanModal">
            Penghargaan
        </button>
        
        <button class="btn col-md-12" style="background:#c3f584;" data-toggle="modal" data-target="#pendidikanmodal">
            Pendidikan
        </button>
     
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="pendidikanmodal" tabindex="-1" role="dialog" aria-labelledby="Ubah" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Pendidikan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?= base_url() ?>index.php/Alumni/pengalaman/addPendidikan" method="post" >
        <div class="modal-body">    
                <div class="form-group">
                    <label for="">Nama Instansi</label>
                    <input type="text" name="nama" id="" class="form-control" placeholder="" aria-describedby="" required>
                </div>
            <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Tahun Masuk</label>
                    <input type="number" name="tahun_masuk" id="" class="form-control" placeholder="" aria-describedby="" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Tahun Keluar</label>
                    <input type="number" name="tahun_keluar" id="" class="form-control" placeholder="" aria-describedby="" required>
                </div>
            </div>
            </div>

            <div class="form-group">
                <label for="">Kota</label>
                <input type="text" name="keterangan" id="" class="form-control" placeholder="" aria-describedby="" required>
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <input type="submit" class="btn btn-primary" value="Simpan">
        </div>

        </form>
        </div>
        
    </div>
    </div>


    <!-- Modal Penghargaan -->
    <div class="modal fade" id="penghargaanModal" tabindex="-1" role="dialog" aria-labelledby="Ubah" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Tambah Penghargaan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url() ?>index.php/Alumni/pengalaman/addPenghargaan" method="post" >
                        <div class="modal-body"> 
                            <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="">Nama Penghargaan</label>
                                    <input type="text" name="nama" id="" class="form-control" placeholder="" aria-describedby="" required>
                                </div>
                           </div>
                           <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Tahun</label>
                                    <input type="number" name="tahun" id="" class="form-control" placeholder="" aria-describedby="" required>
                                </div>
                            </div>
                           </div>

                           <div class="form-group">
                             <label for="">Keterangan</label>
                             <textarea type="text" name="keterangan" id="" class="form-control" placeholder="" aria-describedby=""></textarea>
                           </div>
                        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <input type="submit" class="btn btn-primary" value="Tambah">
                        </div>

                        </form>
                        </div>

                    </div>
                </div>
            <!-- End Modal -->


    <!-- Organisasi modal -->
    <div class="modal fade" id="organisasiModal" tabindex="-1" role="dialog" aria-labelledby="Ubah" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Organisasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url() ?>index.php/Alumni/pengalaman/addOrganisasi" method="post" >
                <div class="modal-body">    
                        <div class="form-group">
                            <label for="">Nama Organisasi</label>
                            <input type="text" name="nama" id="" class="form-control" placeholder="" aria-describedby="">
                        </div>
                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Tahun Masuk</label>
                            <input type="number" name="tahun_masuk" id="" class="form-control" placeholder="" aria-describedby="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Tahun Keluar</label>
                            <input type="number" name="tahun_keluar" id="" class="form-control" placeholder="" aria-describedby="" >
                        </div>
                    </div>
                    </div>

                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <textarea type="text" name="keterangan" id="" class="form-control" placeholder="" aria-describedby=""></textarea>
                    </div>
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <input type="submit" class="btn btn-primary" value="Tambah">
                </div>

                </form>
                </div>
                
            </div>
        </div>
        <!-- End Modal -->

        <!-- Pekerjaan Modal -->
<div class="modal fade" id="pekerjaanModal" tabindex="-1" role="dialog" aria-labelledby="Ubah" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Pekerjaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>index.php/Alumni/pengalaman/addPekerjaan" method="post" >
            <div class="modal-body">   
                    <div class="form-group">
                        <label for="">Nama Pekerjaan</label>
                        <input type="text" name="nama" id="" class="form-control" placeholder="" aria-describedby="">
                    </div>
                <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Tahun Masuk</label>
                        <input type="number" name="tahun_masuk" id="" class="form-control" placeholder="" aria-describedby="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Tahun Keluar</label>
                        <input type="number" name="tahun_keluar" id="" class="form-control" placeholder="" aria-describedby="">
                    </div>
                </div>
                </div>

                <div class="form-group">
                    <label for="">Keterangan</label>
                    <textarea type="text" name="keterangan" id="" class="form-control" placeholder="" aria-describedby=""></textarea>
                </div>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <input type="submit" class="btn btn-primary" value="Simpan">
            </div>

            </form>
            </div>
            
        </div>
    </div>

        <!-- End Modal -->

    <script>
// Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">