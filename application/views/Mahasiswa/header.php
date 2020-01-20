<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Sistem Informasi Alumni Unsyiah</title>
  <!-- icon image -->
  <link href="<?= base_url() ?>asset/image/logo_unsyiah.png" rel="icon">
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url()?>asset/sb-admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url()?>asset/sb-admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url()?>asset/sb-admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url()?>asset/sb-admin/css/sb-admin.css" rel="stylesheet">

 <!-- Bootstrap core JavaScript-->
 <script src="<?php echo base_url()?>asset/sb-admin/vendor/jquery/jquery.min.js"></script>

   <!-- Page level plugin JavaScript-->
  <script src="<?php echo base_url()?>asset/sb-admin/vendor/chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url()?>asset/sb-admin/vendor/datatables/jquery.dataTables.js"></script>
  <script src="<?php echo base_url()?>asset/sb-admin/vendor/datatables/dataTables.bootstrap4.js"></script>
  <script src="<?php echo base_url()?>asset/sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url()?>asset/sb-admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <style>
     @media (min-width: 992px) {
        .animate {
          animation-duration: 0.3s;
          -webkit-animation-duration: 0.3s;
          animation-fill-mode: both;
          -webkit-animation-fill-mode: both;
        }
      }

      @keyframes slideIn {
        0% {
          transform: translateY(1rem);
          opacity: 0;
        }
        100% {
          transform:translateY(0rem);
          opacity: 1;
        }
        0% {
          transform: translateY(1rem);
          opacity: 0;
        }
      }

      @-webkit-keyframes slideIn {
        0% {
          -webkit-transform: transform;
          -webkit-opacity: 0;
        }
        100% {
          -webkit-transform: translateY(0);
          -webkit-opacity: 1;
        }
        0% {
          -webkit-transform: translateY(1rem);
          -webkit-opacity: 0;
        }
      }

      .slideIn {
        -webkit-animation-name: slideIn;
        animation-name: slideIn;
      
      }
    </style>
    

</head>

<body class="fixed-nav sticky-footer bg-light sidenav-toggled" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style="background-color: #e3f2fd;" id="mainNav">
    <a class="navbar-brand" href="<?= base_url() ?>">
      <img src="<?php echo base_url()?>asset/image/logo4xtrans.png" class="img-fluid" alt="Responsive image" width="60%">
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
      <li class="nav-item mt-4" data-toggle="tooltip" data-placement="right" title="Beranda">
          <a class="nav-link" href="<?= base_url() ?>">
            <i class="fa fa-fw fa-home"></i>
            <span class="nav-link-text">Beranda</span>
          </a>
        </li>

        <?php if($User['Role'] == "Alumni") { ?>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Profile">
          <a class="nav-link nav-link-collapse" data-toggle="collapse" href="#userCollapse" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Profile</span>
          </a>
          <ul class="sidenav-second-level collapse" id="userCollapse">
            <li>
              <a class="fa fa-address-card"  href="<?= base_url() ?>index.php/Alumni/profile"> Data Diri</a>
            </li>
            <li>
              <a class="fa fa-history" href="<?= base_url() ?>index.php/Alumni/pengalaman"> Pengalaman</a>
            </li>
          </ul>
        </li>
        <?php } ?>


        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pencarian">
          <a class="nav-link nav-link-collapse" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-search"></i>
            <span class="nav-link-text">Pencarian Alumni</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a class="fa fa-search"  href="<?= base_url() ?>index.php/Mahasiswa/nim"> Berdasarkan Nim</a>
            </li>
            <li>
              <a class="fa fa-search" href="<?= base_url() ?>index.php/Mahasiswa/nama"> Berdasarkan Nama</a>
            </li>
            <li>
              <a class="fa fa-search" href="<?= base_url() ?>index.php/Mahasiswa/tahun"> Berdasarkan Tahun Lulus</a>
            </li>
            <li>
              <a class="fa fa-search" href="<?= base_url() ?>index.php/Mahasiswa/pekerjaan"> Berdasarkan Pekerjaan</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Data Alumni">
          <a class="nav-link" href="<?= base_url() ?>index.php/Mahasiswa/dataAlumni">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Data Alumni</span>
          </a>
        </li>

        
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>

       
      </ul>

      
      <ul class="navbar-nav ml-auto">

        <li class="nav-item avatar dropdown">
          <a class="btn dropdown" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false"> <?php echo $User['Nama'] ?> 
            <?php if($User['Image'] != "") { ?>
              <img src="<?= base_url()?>/asset/image/Mahasiswa/<?= $User['Image'] ?>" style="width: 40px; height: 40px; object-fit: cover;" class="rounded-circle z-depth-0" alt="avatar image">
            <?php } else { ?>
              <img src="<?= base_url()?>/asset/image/Mahasiswa/default.png" style="width: 40px; height: 40px; object-fit: cover;" class="rounded-circle z-depth-0" alt="avatar image">
            <?php } ?>
            </a>
          <ul class="dropdown-menu dropdown-menu-right dropdown-secondary animate slideIn" aria-labelledby="navbarDropdownMenuLink-5">
          <?php if($User['Role'] == "Alumni") { ?>
              <li>
              <a class="nav-link" href="<?php echo base_url() ?>index.php/alumni/profile">
                <i  class="fa fa-fw fa-user"></i> Profile</a>
              </li>
              <?php } else { ?>
                <li>
              <a class="nav-link" href="<?php echo base_url() ?>index.php/mahasiswa/setting">
                <i  class="fa fa-fw fa-cog"></i> Setting</a>
              </li>
              <?php } ?>
              <li>
              <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                <i  class="fa fa-fw fa-sign-out"></i> Logout</a>
              </li>
          </ul>
        </li>

      </ul>
    </div>
  </nav>

