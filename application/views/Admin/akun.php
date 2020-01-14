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
                        <h3 class="text-themecolor m-b-0 m-t-0">Akun Admin</h3>
                      
                    </div>
                    <div class="col-md-7 col-4 align-self-center">
                        <a class="btn waves-effect waves-light btn-warning pull-right hidden-sm-down" data-toggle="modal" data-target="#tambahModal"><i class="mdi mdi-plus"></i> Tambah Akun</a>
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
                    <!-- column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Akun Admin</h4>
                                <h6 class="card-subtitle">List Akun
                                <div class="table-responsive">
                                    <table class="table" style="color: #000000">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>Nama Admin</th>
                                                <th>Password</th>
                                                <th width="15%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=1;?>
                                        <?php foreach($Admin as $value): ?>
                                            <tr>
                                                <td><?= $i?></td>
                                                <td><?= $value['Username']?></td>
                                                <td><?= $value['Nama']?></td>
                                                <td><?= $value['Password']?></td>
                                                <td>
                                                    <a class="btn btn-danger pull-right ml-3 <?php if($value['Username'] == $User['Username']) echo "disabled";?>" style="color: #ffff" data-toggle="modal" data-target="#delete-<?=$value['Username']?>"><i class="mdi mdi-delete-forever"></i></a>
                                                    <a class="btn pull-right btn-success" style="color: #ffff" data-toggle="modal" data-target="#edit-<?=$value['Username']?>"><i class="mdi mdi-pencil"></i></a>
                                                </td>
                                            </tr>
                                            
                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="delete-<?=$value['Username']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Hapus Admin</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                       Apa anda yakin ingin menghapus <?=$value['Nama']?> dari Admin ? 
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <a href="<?= base_url()?>index.php/Admin/akun/deleteAdmin?username=<?=$value['Username']?>" type="button" class="btn btn-danger">Hapus</a>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- End Delete Modal -->

                                             <!-- Edit Modal -->
                                             <form action="<?= base_url() ?>index.php/Admin/akun/updateAdmin" method="post">
                                             <div class="modal fade" id="edit-<?=$value['Username']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Admin</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                    <div class="input-group mb-3">
                                                        <span class="input-group-addon"><i class="mdi mdi-account"></i></span>
                                                        <input id="username" type="text" class="form-control" name="username" value="<?=$value['Username']?>" readonly>
                                                    </div>

                                                    <div class="input-group mb-3">
                                                        <span class="input-group-addon"><i class="mdi mdi-account-card-details"></i></span>
                                                        <input id="nama" type="text" class="form-control" name="nama" value="<?=$value['Nama']?>">
                                                    </div>

                                                    <div class="input-group mb-3">
                                                        <span class="input-group-addon"><i class="mdi mdi-key"></i></span>
                                                        <input id="password" type="text" class="form-control" name="password" value="<?=$value['Password']?>">
                                                    </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <input type="submit" class="btn btn-primary" value="Simpan">
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </form>

                                            <!-- End Edit Modal -->
                                            <?php $i++; ?>
                                            <?php endforeach; ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>

  <!-- Tambah Modal -->
<form action="<?= base_url() ?>index.php/Admin/akun/addAdmin" method="post">
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">

    <div class="input-group mb-3">
        <span class="input-group-addon"><i class="mdi mdi-account"></i></span>
        <input id="username" type="text" class="form-control" name="username" placeholder="Username" required>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-addon"><i class="mdi mdi-account-card-details"></i></span>
        <input id="nama" type="text" class="form-control" name="nama" placeholder="Nama" required>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-addon"><i class="mdi mdi-key"></i></span>
        <input id="password" type="text" class="form-control" name="password" placeholder="Password" required>
    </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <input type="submit" class="btn btn-primary" value="Simpan">
    </div>
    </div>
</div>
</div>
</form>

<!-- End Edit Modal -->