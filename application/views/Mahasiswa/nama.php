<div class="content-wrapper">
    <div class="container-fluid mt-3">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a class="fa fa-search" > Cari Berdasarkan Nama Alumni</a>
        </li>
      </ol>
      <?= $this->session->flashdata('message'); ?>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-sm-6 mb-3">
            <form class="form-inline" action="<?= base_url() ?>index.php/Mahasiswa/nama/getNama" method="post">
                <input class="form-control mr-sm-2" type="text" name="nama" placeholder="Nama" aria-label="Search" required="">
                <input class="btn btn-outline-primary my-2 my-sm-0" type="submit" value="Search">
            </form>
        </div>
      </div>
      <!-- Area Chart Example-->
     
      <!-- Example DataTables Card-->
        <div class="card-header">
          <i class="fa fa-user"></i> Data Alumni MIPA</div>
          <div class="row">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nim</th>
                  <th>Nama</th>
                  <th>Jurusan</th>
                  <th>Email</th>
                  <th>Tahun Selesai</th>
                  <th>Pekerjaan</th>
                </tr>
              </thead>
            
              <tbody>
                  <?php if(!empty($Alumni)) { ?>
                <tr>
                <?php foreach($Alumni as $keys): ?>
                  <td><?= $keys['Nim']?></td>
                  <td><?= $keys['Nama']?></td>
                  <td><?= $keys['Jurusan']?></td>
                  <td><?= $keys['Email']?></td>
                  <td><?= $keys['Tahun_Keluar']?></td>
                  <td><?= $keys['Pekerjaan']?></td>
                </tr>
                <?php endforeach; ?>
                <?php  } ?>
              
              </tbody>
            </table>
          </div>
        </div>
                  </div>
    
     
    </div>