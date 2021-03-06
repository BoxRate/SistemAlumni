<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('dashboard_model');

		if(!$this->session->userdata('Role')) {
			redirect('Auth/login');
		}

		if($this->session->userdata('Role') == "Alumni") {
			redirect('Alumni/dashboard');
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

		$dataPekerjaan = array (
			'IT' => $this->db->get_where("alumni", "Pekerjaan = 'Teknologi Informasi'")->num_rows(),
			'Energi' => $this->db->get_where("alumni", "Pekerjaan = 'Energi'")->num_rows(),
			'Kesehatan' => $this->db->get_where("alumni", "Pekerjaan = 'Kesehatan'")->num_rows(),
			'PNS' => $this->db->get_where("alumni", "Pekerjaan = 'PNS'")->num_rows(),
			'Swasta' => $this->db->get_where("alumni", "Pekerjaan = 'Swasta'")->num_rows(),
			'Wirausaha' => $this->db->get_where("alumni", "Pekerjaan = 'Wirausaha'")->num_rows(),
			'Scientist' => $this->db->get_where("alumni", "Pekerjaan = 'Scientist'")->num_rows()
		);


		$data =array(
			'User' => $dataUser,
			'Tahun' => $dataTahun,
			'Count'	=> $dataCount,
			'Pekerjaan' =>$dataPekerjaan
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
		$this->session->sess_destroy();
		redirect('Auth/login');
	}
	
    
}
