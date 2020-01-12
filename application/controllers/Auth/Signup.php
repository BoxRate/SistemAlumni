<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('register_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('Auth/signup');
	}

	public function register() {

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('nim', 'Nim', 'required|trim');
		// $this->form_validation->set_rules('role', 'Role', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[konfirm_password]');
		$this->form_validation->set_rules('konfirm_password', 'Password', 'required|trim|matches[konfirm_password]');


		if ($this->form_validation->run() == false) {
			$this->load->view('Auth/signup');
		} else {

			$data = array(
				'Nama' => $this->input->post('nama'),
				'Nim' => $this->input->post('nim'),
				'Email' => $this->input->post('email'),
				'Password' => md5($this->input->post('password')),
				'role' =>  $this->input->post('role')
			);

			$check;
			if ($this->input->post('role') == "Mahasiswa") {
				$check = $this->register_model->insert($data);
			} else {
				$check = $this->db->insert('alumni',$data);
			}
 
			if($check) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Selamat Kamu Telah Terdaftar, Silahkan Login Untuk Melanjutkan</div>');
				redirect('Auth/login');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Mendaftar, Mohon Coba Lagi</div>');
				redirect('Auth/signup');
			}
		}
		
		
	}
}
