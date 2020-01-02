<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('Nim')) {
			redirect('Auth/login');
		}
	}

	public function index()
	{
        $data = $this->session->all_userdata();
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
