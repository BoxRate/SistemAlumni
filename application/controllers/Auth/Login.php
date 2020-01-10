<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('Auth/login');
	}

	public function login_validation() {

		$this->form_validation->set_rules('nim', 'Nim', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('Auth/login');
		} else {
			$nim = $this->input->post('nim');
			$password = md5($this->input->post('password'));
			$role = $this->input->post('role');

			$this->db->where('Nim', $nim);
			$this->db->where('Password', $password);

			$query;
			if ($role == "Mahasiswa") {
				$query = $this->db->get('mahasiswa');
			} else {
				$query = $this->db->get('alumni');
			}

			if ($query->num_rows() > 0) {

				foreach($query->result() as $row) {
					$session_data = array(
						'Nama' => $row->Nama,
						'Nim' => $row->Nim,
						'Email' => $row->Email,
						'Image' => $row->image,
						'Role' => $row->role
					);
					
					$this->session->set_userdata($session_data);
				}

				if ($role == "Mahasiswa") {
					redirect('Mahasiswa/dashboard');
				} else {
					redirect('Alumni/dashboard');
				}	
				
	
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Autentkasi Gagal</div>');
				redirect('Auth/login');
			}

		}

		
	}
}
