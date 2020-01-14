<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLogin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('Auth/adminlogin');
	}

	function login_validation() {
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('Auth/adminlogin');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			// $role = $this->input->post('role');

			$this->db->where('Username', $username);
			$this->db->where('Password', $password);

			$query = $this->db->get('admin'); 

			if ($query->num_rows() > 0) {
				$session_data;
				foreach($query->result() as $row) {
					$session_data = array(
						'Username' => $row->Username,
						'Nama' => $row->Nama,
						'Image' => $row->Image
					);
				}
					
				$this->session->set_userdata($session_data);
				redirect('Admin/dashboard');

			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Autentkasi Gagal</div>');
				redirect('Auth/adminlogin');
			}
		}

	}
}
