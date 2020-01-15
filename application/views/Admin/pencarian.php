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
                        <h3 class="text-themecolor">Pencarian</h3>
                        
                    </div>
                    
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                
                <!-- Row -->
                <!-- Row -->
                
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <?= $this->session->flashdata('message'); ?>

                 <!-- Icon Cards-->
                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <form class="form-inline" action="<?= base_url() ?>index.php/Admin/pencarian/cariMahasiswa" method="get">
                            <input class="form-control mr-sm-2" type="number" name="nim" placeholder="Nim" aria-label="Search" required="">
                            
                            <div class="form-group">
                                <select name="role" class="form-control" id="role">
                                <option value="Mahasiswa" >Mahasiswa</option>
                                <option value="Alumni" >Alumni</option>
                                </select>
                            </div>

                            <input class="btn btn-outline-primary ml-3 my-sm-0" type="submit" value="Search">
                        </form>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <?php if ($Tabel !="") { ?>
                    <div class="col-lg-12">
                        <?= $Tabel ?>
                    </div>
                    <?php } ?>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
