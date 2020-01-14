<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

    var $data;

	public function __construct() {
        parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('dashboard_model');
		$this->load->model('admin_model');
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

        $this->data['Admin'] = $this->admin_model->getAllAdmin();

        $this->load->view('Admin/header.php', $this->data);
		$this->load->view('Admin/akun.php', $this->data);
		$this->load->view('Admin/footer.php',$this->data);
    }

    function deleteAdmin() {
        $username = $this->input->get('username');

        $query = $this->db->delete('admin', array('Username' => $username));

        if($query) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berhasil Menghapus data</div>');
            redirect('Admin/akun');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Gagal Menghapus data</div>');
            redirect('Admin/akun');
        }

    }

    function updateAdmin() {
        $data = array(
            'Nama' => $this->input->post('nama'),
            'Password' => $this->input->post('password')
        );

        $username = $this->input->post('username');

        $this->db->where('Username', $username);
        $check = $this->db->update('admin',$data);

        if($username == $this->data['User']['Username']) {
           $this->session->set_userdata('Nama', $data['Nama']);
        }

        if($check) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengedit data</div>');
            redirect('Admin/akun');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Mengedit data</div>');
            redirect('Admin/akun');
        }

    }

    function addAdmin() {
        $data = array(
            'Username' => $this->input->post('username'),
            'Nama' => $this->input->post('nama'),
            'Password' => $this->input->post('password')
        );

        $query = $this->db->insert('admin', $data);
        if($query) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambah data</div>');
            redirect('Admin/akun');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menambah data</div>');
            redirect('Admin/akun');
        }
    }
}