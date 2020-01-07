<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('dashboard_model');
		if(!$this->session->userdata('Nim')) {
			redirect('Auth/login');
		}
	}

	public function index()
	{
		$tahun = $this->dashboard_model->getTahun();
		$dataTahun = array();
		$dataCount = array();

		foreach($tahun->result() as $row) {
		 	array_push($dataTahun, $row->Tahun_Keluar);
			array_push($dataCount, $this->dashboard_model->getCountTahun($row->Tahun_Keluar));
		}

		$dataUser = $this->session->all_userdata();

		$data =array(
			'User' => $dataUser,
			'Tahun' => $dataTahun,
			'Count'	=> $dataCount
		);

        
        $this->load->view('Mahasiswa/header.php',$data);
		$this->load->view('Mahasiswa/dashboard.php',$data);
		$this->load->view('Mahasiswa/footer.php',$data);
	}

	function logout(){
		$data = $this->session->all_userdata();
		foreach($data as $row => $row_value) {
			$this->session->unset_userdata($row);
		}
		redirect('Auth/login');
	}
	
    
}
