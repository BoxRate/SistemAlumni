<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    var $data;

	public function __construct() {
        parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('dashboard_model');
		if(!$this->session->userdata('Username')) {
			redirect('Auth/adminlogin');
		}
        
        $dataUser = $this->session->all_userdata();

        $this->data = array(
            'User' => $dataUser
        );

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

		$this->data['Tahun'] = $dataTahun;
		$this->data['Count'] = $dataCount;

        $this->load->view('Admin/header.php', $this->data);
		$this->load->view('Admin/dashboard.php', $this->data);
		$this->load->view('Admin/footer.php',$this->data);
	}
	
	function logout(){
		foreach($this->data as $row => $row_value) {
			$this->session->unset_userdata($row);
		}
		
		$this->session->sess_destroy();
		redirect('Auth/adminlogin');
	}
    

}