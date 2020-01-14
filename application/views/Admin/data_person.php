


<!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor"><?=$Data['Nama']?></h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Data Alumni</a></li>
                            <li class="breadcrumb-item active"><?= $Data['Nim'] ?></li>
                        </ol>
                    </div>
                    
                </div>

                <?= $this->session->flashdata('message'); ?>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background:#f65c78; color:white">
                        <i class="fa fa-address-card"></i> Profil
                    </div>
                    <div class="card-body">
                    <div class="media">
                            <a class="thumbnail pull-left mr-4">
                                <?php if($Data['Image'] != "") { ?>
                                    <img class="media-object" src="<?= base_url()?>/asset/image/Mahasiswa/<?= $Data['Image'] ?>" width="230px" height="230px"  alt="avatar image">
                                    <?php } else { ?>
                                    <img class="media-object"  src="<?= base_url()?>/asset/image/Mahasiswa/default.png" width="230px" height="230px" alt="avatar image">
                                <?php } ?>
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading text-uppercase font-weight-bold"><?= $Data['Nama'] ?> 
                                <?php if($Data['Jk'] == "L") { ?>
                                    <i class=" font-weight-bold fa fa-mars text-primary"></i>
                                    <?php } else { ?>
                                    <i class=" font-weight-bold fa fa-venus text-danger"></i>
                                <?php } ?>
                                </h4>
                                <h6><span class="text-uppercase text-success"><?= $Data['Jurusan']?> </span><span class="label text-uppercase">( <?= $Data['Tahun_Masuk']?> - <?= $Data['Tahun_Keluar']?> )</span></h6>
                                <h6><span class="fa fa-address-card"> <?= $Data['Nim']?> </span></h6>
                                <h6><span class="text-capitalize fa fa-suitcase"> <?= $Data['Pekerjaan']?> </span></h6>
                                <h6><span class="text-capitalize fa fa-suitcase"> <?= $Data['Nama_Pekerjaan']?> </span></h6>
                                <h6><span class="fa fa-birthday-cake"> <?= $Data['Tempat_Lahir']?>, <?= $Data['Tanggal_Lahir']?></span></h6>
                                <h6><span class="text-capitalize fa fa-envelope"> <?= $Data['Email']?> </span></h6>
                                <h6><span class="fa fa-phone"> <?= $Data['No_Telepon']?> </span></h6>
                                <h6><span class="text-capitalize fa fa-home"> <?= $Data['Alamat']?> </span></h6>
                               
                            </div>
                        </div>
                    </div>
                   
                   
                </div>
            </div>

                <div class="col-lg-4 col-md-5">
                        <div class="card">
                            <div class="card-block">
                                <div id="pengalamanUser" style="height:280px; width:100%;"></div>
                            </div>
                            <div>
                                <hr class="m-t-0 m-b-0">
                            </div>
                            
                        </div>
                    </div>


                    

        </div>

        <!--Another Card -->
        <div class="card">
                 <div class="card-header" style="background:#f65c78; color:white">
                        <i class="fa fa-sitemap"></i> Riwayat Pekerjaan
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" style="color: #000000; text-align:center"  >
                            <thead>
                                <tr>
                                    <th style=" text-align:center" width="5%">No</th>
                                    <th style=" text-align:center" width="10%" >Masuk</th>
                                    <th style=" text-align:center" width="10%" >Keluar</th>
                                    <th style=" text-align:center" width="30%">Nama Pekerjaan</th>
                                    <th style=" text-align:center" >Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1;?>
                            <?php foreach($Pekerjaan as $keys): ?>
                                <tr>
                                    <td><?= $i?></td>
                                    <td><?= $keys["Tahun_Masuk"] ?></td>
                                    <td><?= $keys["Tahun_Keluar"] ?></td>
                                    <td><?= $keys["Nama_Pekerjaan"] ?></td>
                                    <td><?= $keys["Keterangan"] ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                            </div>
                    <!--End Another Card -->


        <!--Another Card -->
        <div class="card">
                 <div class="card-header" style="background:#ffd271;">
                        <i class="fa fa-sitemap"></i> Riwayat Organisasi
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" style="color: #000000; text-align:center"  >
                            <thead>
                                <tr>
                                    <th style=" text-align:center" width="5%">No</th>
                                    <th style=" text-align:center" width="10%" >Masuk</th>
                                    <th style=" text-align:center" width="10%" >Keluar</th>
                                    <th style=" text-align:center" width="30%">Nama Organisasi</th>
                                    <th style=" text-align:center" >Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1;?>
                            <?php foreach($Organisasi as $keys): ?>
                                <tr>
                                    <td><?= $i?></td>
                                    <td><?= $keys["Tahun_Masuk"] ?></td>
                                    <td><?= $keys["Tahun_Keluar"] ?></td>
                                    <td><?= $keys["Nama_Organisasi"] ?></td>
                                    <td><?= $keys["Keterangan"] ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                            </div>
                    <!--End Another Card -->

        <!--Another Card -->
        <div class="card">
            <div class="card-header" style="background:#c3f584;">
                <i class="fa fa-sitemap"></i> Riwayat Pendidikan
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" style="color: #000000; text-align:center"  >
                    <thead>
                        <tr>
                            <th style=" text-align:center" width="5%">No</th>
                            <th style=" text-align:center" width="10%" >Masuk</th>
                            <th style=" text-align:center" width="10%" >Keluar</th>
                            <th style=" text-align:center" width="30%">Nama_Instansi</th>
                            <th style=" text-align:center" >Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=1;?>
                    <?php foreach($Pendidikan as $keys): ?>
                        <tr>
                            <td><?= $i?></td>
                            <td><?= $keys["Tahun_Masuk"] ?></td>
                            <td><?= $keys["Tahun_Keluar"] ?></td>
                            <td><?= $keys["Nama_Instansi"] ?></td>
                            <td><?= $keys["Alamat"] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
                    </div>
            <!--End Another Card -->

        <!--Another Card -->
        <div class="card">
            <div class="card-header" style="background:#fff3af;">
                <i class="fa fa-sitemap"></i> Riwayat Penghargaan
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" style="color: #000000; text-align:center"  >
                    <thead>
                        <tr>
                            <th style=" text-align:center" width="5%">No</th>
                            <th style=" text-align:center" width="10%" >Tahun</th>
                            <th style=" text-align:center" width="30%">Nama Penghargaan</th>
                            <th style=" text-align:center" >Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=1;?>
                    <?php foreach($Penghargaan as $keys): ?>
                        <tr>
                            <td><?= $i?></td>
                            <td><?= $keys["Tahun"] ?></td>
                            <td><?= $keys["Nama_Penghargaan"] ?></td>
                            <td><?= $keys["Keterangan"] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
                    </div>
            <!--End Another Card -->

                   <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>

<!-- End Edit Modal -->


<script>
    var chart = c3.generate({
        bindto: '#pengalamanUser',
        data: {
            columns: [
                ['Pekerjaan',<?=count($Pekerjaan)?>],
                ['Organisasi', <?=count($Organisasi)?>],
                ['Penghargaan', <?=count($Penghargaan)?>],
                ['Pendidikan', <?=count($Pendidikan)?>],
            ],

            type: 'pie',
            onclick: function(d, i) { console.log("onclick", d, i); },
            onmouseover: function(d, i) { console.log("onmouseover", d, i); },
            onmouseout: function(d, i) { console.log("onmouseout", d, i); }
        },
        
        color: {
            pattern: ['#f65c78','#ffd271','#fff3af','#c3f584']
        }
    });

</script>