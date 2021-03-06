<style>
    ul.timeline {
    list-style-type: none;
    position: relative;
}
ul.timeline:before {
    content: ' ';
    background: #d4d9df;
    display: inline-block;
    position: absolute;
    left: 29px;
    width: 2px;
    height: 100%;
    z-index: 400;
}
ul.timeline > li {
    margin: 20px 0;
    padding-left: 20px;
}
ul.timeline > li:before {
    content: ' ';
    background: white;
    display: inline-block;
    position: absolute;
    border-radius: 50%;
    border: 3px solid #f65c78;
    left: 20px;
    width: 20px;
    height: 20px;
    z-index: 400;
}

#organisasi.timeline > li:before {
    border: 3px solid #ffd271; 
}

#pendidikan.timeline > li:before {
    border: 3px solid #c3f584; 
}
</style>
<div class="content-wrapper">
    <div class="container-fluid mt-3">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb bg"  style="background:#edf7fa;">
        <li class="breadcrumb-item">
          <a class="fa fa-home"> Beranda Alumni</a>
        </li>
      </ol>

      <div class="row mb-3">
      <div class="col-md-6">
      <div class="card">
            <div class="card-header" style="background:#f65c78; color:white">
                <i class="fa fa-address-card"></i> Profil
            </div>
            <div class="card-body">
            <div class="row">
                <div class="">
                    <div class="well well-sm">
                        <div class="media">
                            <a class="thumbnail pull-left mr-4">
                                <?php if($User['Image'] != "") { ?>
                                    <img class="media-object" src="<?= base_url()?>/asset/image/Mahasiswa/<?= $User['Image'] ?>" style="width: 230px; height: 230px; object-fit: cover;"  alt="avatar image">
                                    <?php } else { ?>
                                    <img class="media-object"  src="<?= base_url()?>/asset/image/Mahasiswa/default.png" style="width: 230px; height: 230px; object-fit: cover;" alt="avatar image">
                                <?php } ?>
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading text-uppercase font-weight-bold"><?= $User['Nama'] ?> 
                                <?php if($Data['Jk'] == "P") { ?>
                                    <i class=" font-weight-bold fa fa-venus text-danger"></i>
                                    <?php } else { ?>
                                    <i class=" font-weight-bold fa fa-mars text-primary"></i>
                                <?php } ?>
                                </h4>
                                <h6><span class="label text-uppercase text-success"><?= $Data['Jurusan']?> </span><span class="label text-uppercase">( <?= $Data['Tahun_Masuk']?> - <?= $Data['Tahun_Keluar']?> )</span></h6>
                                <h6><span class="label fa fa-address-card"> <?= $Data['Nim']?> </span></h6>
                                <h6><span class="label text-capitalize fa fa-suitcase"> <?= $Data['Pekerjaan']?> </span></h6>
                                <h6><span class="label text-capitalize fa fa-suitcase"> <?= $Data['Nama_Pekerjaan']?> </span></h6>
                                <h6><span class="label fa fa-birthday-cake"> <?= $Data['Tempat_Lahir']?>, <?= $Data['Tanggal_Lahir']?></span></h6>
                                <h6><span class="label text-capitalize fa fa-envelope"> <?= $Data['Email']?> </span></h6>
                                <h6><span class="label fa fa-phone"> <?= $Data['No_Telepon']?> </span></h6>
                                <h6><span class="label text-capitalize fa fa-home"> <?= $Data['Alamat']?> </span></h6>
                               
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

            </div>

            
            
        </div>
        </div>
       
        <div class="col-sm-6">
            <!-- Example Pie Chart Card-->
            <canvas id="pieChart" width="100%"></canvas>
        </div>

        </div>
       
      <!-- Example DataTables Card-->

      <ol class="breadcrumb bg"  style="background:#edf7fa;">
        <li class="breadcrumb-item">
          <a class="fa fa-history"> Pengalaman</a>
        </li>
      </ol>
   
    <div class="row"> 
        <div class="col-md-6">
        <div class="card">
            <div class="card-header" style="background:#f65c78; color:white">
                <i class="fa fa-sitemap"></i> Riwayat Pekerjaan
            </div>
            <div class="card-body">

            <ul class="timeline">
                <?php foreach($Pekerjaan as $keys): ?>
				<li >
					<a style="color:#f65c78"><?= $keys["Nama_Pekerjaan"] ?></a>
					<a class="float-right" style="color:#f65c78"><?= $keys["Tahun_Masuk"] ?> - <?= $keys["Tahun_Keluar"] ?></a>
					<p><?= $keys["Keterangan"] ?></p>
                </li>
                <?php endforeach; ?>
            </ul>
            
            </div>
                
        </div>

        <div class="card mt-3 mb-3" >
            <div class="card-header" style="background:#fff3af;">
            <i class="fa fa-certificate"></i> Penghargaan 
            </div>
            <div class="card-body">
            <ul class="timeline" id="organisasi">
                <?php foreach($Penghargaan as $keys): ?>
				<li>
					<a style="color:#ff8364; "><?= $keys["Nama_Penghargaan"] ?></a>
					<a class="float-right" style="color:#ff8364"><?= $keys["Tahun"] ?></a>
					<p><?= $keys["Keterangan"] ?></p>
                </li>
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
            <ul class="timeline" id="organisasi">
                <?php foreach($Organisasi as $keys): ?>
				<li>
					<a style="color:#ff8364; "><?= $keys["Nama_Organisasi"] ?></a>
					<a class="float-right" style="color:#ff8364"><?= $keys["Tahun_Masuk"] ?> - <?= $keys["Tahun_Keluar"] ?></a>
					<p><?= $keys["Keterangan"] ?></p>
                </li>
                <?php endforeach; ?>
            </ul>
            
            </div>
                
        </div>

        <div class="card mt-3 mb-3" >
            <div class="card-header" style="background:#c3f584;">
            <i class="fa fa-graduation-cap"></i> Riwayat Pendidikan 
            </div>
            <div class="card-body">
            <ul class="timeline" id="pendidikan" >
                <?php foreach($Pendidikan as $keys): ?>
				<li>
					<a style="color:#f65c78; "><?= $keys["Nama_Instansi"] ?></a>
					<a class="float-right" style="color:#f65c78"><?= $keys["Tahun_Masuk"] ?> - <?= $keys["Tahun_Keluar"] ?></a>
					<p><?= $keys["Alamat"] ?></p>
                </li>
                <?php endforeach; ?>
            </ul>
            </div>
                
        </div>

        </div>
      

      
    </div>
    </div>
    
    </div>





<script>
var ctx = document.getElementById("pieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Pekerjaan", "Organisasi", "Penghargaan", "Pendidikan"],
    datasets: [{
      data: [<?=count($Pekerjaan)?>, <?=count($Organisasi)?>, <?=count($Penghargaan)?>, <?=count($Pendidikan)?>],
      backgroundColor: ['#f65c78', '#ffd271', '#fff3af', '#c3f584'],
    }],
  },
});
</script>
