<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataAlumni extends CI_Controller {

    var $dataTahun = array();
    var $data;

	public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('Role')) {
			redirect('Auth/login');
		}

        $this->load->library('form_validation');
        $this->load->model('dashboard_model');

        $tahun = $this->dashboard_model->getTahun();
       
        foreach($tahun->result() as $row) {
            array_push($this->dataTahun, $row->Tahun_Keluar);
        }

        $dataUser = $this->session->all_userdata();
		$this->data =array(
            'User' => $dataUser
        );
	
	}

	public function index()
	{
        
        $jurusan = $this->dashboard_model->getJurusan();
        $isi = '';
        $i=1;

        foreach($jurusan as $jr) {
            $isi = $isi.'
            <tr>
            <td>'.$i.'</td>
            <td>'.$jr.'</td>
            <td><a href="dataAlumni/getJurusan?jurusan='.$jr.'">Tampilkan Per Tahun Akademik</a></td>
            </tr>
            ';
            $i+=1;
        }

        $tableJurusan= '
        <div class="card-header" id="dataAlumni">
        <i class="fa fa-table"></i> Daftar Jurusan MIPA Universitas Syiah Kuala</div>
        <div class="row">
        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Jurusan</th>
                    <th>Tampilkan Per Prodi</th>
                </tr>
                </thead>
                <tbody>
                '.$isi.'
                </tbody>
            </table>
            </div>
            </div>
        ';

        $this->data['Tabel']=$tableJurusan;
        $this->load->view('Mahasiswa/header.php',$this->data);
		$this->load->view('Mahasiswa/data_alumni.php',$this->data);
		$this->load->view('Mahasiswa/footer.php',$this->data);
	}
    
    function getJurusan() {
        $jurusan = $this->input->get('jurusan');
        $tahunJurusan = $this->dashboard_model->getTahunJurusan($jurusan);

        $isi = '';
        $i=1;

        foreach($tahunJurusan as $jr) {
            $isi = $isi.'
            <tr>
            <td>'.$i.'</td>
            <td>'.$jr.'</td>
            <td><a href="./getAlumni?jurusan='.$jurusan.'&tahun='.$jr.'">Tampilkan Data Alumni</a></td>
            </tr>
            ';
            $i+=1;
        }

        $tableJurusan= '
        <div class="card-header" id="dataAlumni">
        <i class="fa fa-table"></i> Daftar Angkatan Jurusan '.$jurusan.' MIPA</div>
        <div class="row">
        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Tahun Masuk</th>
                    <th>Tampilkan Per Prodi</th>
                </tr>
                </thead>
                <tbody>
                '.$isi.'
                </tbody>
            </table>
            </div>
            </div>
        ';

        $this->data['Tabel']=$tableJurusan;
        $this->load->view('Mahasiswa/header.php',$this->data);
		$this->load->view('Mahasiswa/data_alumni.php',$this->data);
		$this->load->view('Mahasiswa/footer.php',$this->data);

    }

    function getAlumni() {
        $jurusan = $this->input->get('jurusan');
        $tahun = $this->input->get('tahun');

        $dataAlumni = $this->dashboard_model->getAlumni("Jurusan = '".$jurusan."' AND Tahun_Masuk = ".$tahun );

        $isi = '';
        $i=1;

        foreach($dataAlumni as $row) {
            $isi = $isi.'
            <tr>
            <td><a href="./getPerson?nim='.$row['Nim'].'">'.$row['Nim'].'</a></td>
            <td><a href="./getPerson?nim='.$row['Nim'].'">'.$row['Nama'].'</a></td>
            <td><a href="./getPerson?nim='.$row['Nim'].'">'.$row['Jurusan'].'</a></td>
            <td><a href="./getPerson?nim='.$row['Nim'].'">'.$row['Email'].'</a></td>
            <td><a href="./getPerson?nim='.$row['Nim'].'">'.$row['Tahun_Keluar'].'</a></td>
            <td><a href="./getPerson?nim='.$row['Nim'].'">'.$row['Pekerjaan'].'</a></td>
            </tr>
            ';
            $i+=1;
        }

        $tableJurusan= '
        <div class="card-header" id="dataAlumni">
        <i class="fa fa-table"></i> Daftar Alumni Jurusan '.$jurusan.' MIPA Tahun '.$tahun.'</div>
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
                    <th>Tahun Lulus</th>
                    <th>Pekerjaan</th>
                </tr>
                </thead>
                <tbody>
                '.$isi.'
                </tbody>
            </table>
            </div>
            </div>
        ';

        $this->data['Tabel']=$tableJurusan;
        $this->load->view('Mahasiswa/header.php',$this->data);
		$this->load->view('Mahasiswa/data_alumni.php',$this->data);
		$this->load->view('Mahasiswa/footer.php',$this->data);

    }

    function getPerson() {
        $nim = $this->input->get('nim');

        $this->data['Pekerjaan'] = $this->dashboard_model->getPerkerjaan($nim);
        $this->data['Organisasi'] = $this->dashboard_model->getOrganisasi($nim);
        $this->data['Penghargaan'] = $this->dashboard_model->getPenghargaan($nim);
        $this->data['Pendidikan'] = $this->dashboard_model->getPendidikan($nim);
        $data = $this->dashboard_model->getAlumni("Nim =".$nim);
        $this->data['Data'] = $data[0];

        $this->load->view('Mahasiswa/header.php',$this->data);
		$this->load->view('Mahasiswa/data_person.php',$this->data);
		$this->load->view('Mahasiswa/footer.php',$this->data);
    }


    

}
