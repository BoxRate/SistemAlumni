<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    var $data;

	public function __construct() {
        parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('dashboard_model');
		if(!$this->session->userdata('Role') == "Alumni") {
			redirect('Auth/login');
        }
        
        $dataUser = $this->session->all_userdata();

        $this->data = array(
            'User' => $dataUser
        );

	}

	public function index()
	{   

        $this->data['Pekerjaan'] = $this->dashboard_model->getPerkerjaan($this->data['User']['Nim']);
        $this->data['Organisasi'] = $this->dashboard_model->getOrganisasi($this->data['User']['Nim']);
        $this->data['Penghargaan'] = $this->dashboard_model->getPenghargaan($this->data['User']['Nim']);
        $this->data['Pendidikan'] = $this->dashboard_model->getPendidikan($this->data['User']['Nim']);
        $data = $this->dashboard_model->getAlumni("Nim =".$this->data['User']['Nim']);
        $this->data['Data'] = $data[0];

        $this->load->view('Alumni/header.php', $this->data);
		$this->load->view('Alumni/dashboard.php', $this->data);
		$this->load->view('Alumni/footer.php',$this->data);
	}

	function logout(){
		
		foreach($this->data as $row => $row_value) {
			$this->session->unset_userdata($row);
		}
		redirect('Auth/login');
	}
	
    
}
