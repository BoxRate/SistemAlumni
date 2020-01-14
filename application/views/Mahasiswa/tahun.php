<div class="content-wrapper">
    <div class="container-fluid mt-3">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a class="fa fa-search" > Cari Berdasarkan Tahun Kelulusan</a>
        </li>
      </ol>
      <?= $this->session->flashdata('message'); ?>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-sm-6 mb-3" style="margin-left:20px">
            <form action="<?= base_url() ?>index.php/Mahasiswa/tahun/getTahun" method="post">
            <?php foreach($Tahun as $value): ?>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="<?= $value ?>" name="tahun_lulus" class="custom-control-input" value="<?= $value ?>">
                <label class="custom-control-label" for="<?= $value ?>"><?= $value ?></label>
            </div>
            <?php endforeach; ?>
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
                  <td><a target="_blank" href="<?= base_url()?>index.php/Mahasiswa/DataAlumni/getPerson?nim=<?=$keys['Nim']?>"><a target="_blank" href="<?= base_url()?>index.php/Mahasiswa/DataAlumni/getPerson?nim=<?=$keys['Nim']?>"><?= $keys['Nim']?></a></td>
                  <td><a target="_blank" href="<?= base_url()?>index.php/Mahasiswa/DataAlumni/getPerson?nim=<?=$keys['Nim']?>"><?= $keys['Nama']?></a></td>
                  <td><a target="_blank" href="<?= base_url()?>index.php/Mahasiswa/DataAlumni/getPerson?nim=<?=$keys['Nim']?>"><?= $keys['Jurusan']?></a></td>
                  <td><a target="_blank" href="<?= base_url()?>index.php/Mahasiswa/DataAlumni/getPerson?nim=<?=$keys['Nim']?>"><?= $keys['Email']?></a></td>
                  <td><a target="_blank" href="<?= base_url()?>index.php/Mahasiswa/DataAlumni/getPerson?nim=<?=$keys['Nim']?>"><?= $keys['Tahun_Keluar']?></a></td>
                  <td><a target="_blank" href="<?= base_url()?>index.php/Mahasiswa/DataAlumni/getPerson?nim=<?=$keys['Nim']?>"><?= $keys['Pekerjaan']?></a></td>
                </tr>
                <?php endforeach; ?>
                <?php  } ?>
              
              </tbody>
            </table>
          </div>
        </div>
                  </div>
    
     
    </div>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">