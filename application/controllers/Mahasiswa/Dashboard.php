<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
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
    
    function getNim(){ 
       
       
        $nim = $this->input->post('nim');

        $this->db->where('Nim', $nim);
        $query = $this->db->get('alumni');

        if ($query->num_rows() > 0) { 
            $result=array();
            foreach($query->result() as $row) {
                $result['Nama'] = $row->Nama;
                $result['Nim'] = $row->Nim;
                $result['Email'] = $row->Email;
                $result['Tahun_Keluar'] = $row->Tahun_Keluar;
                $result['Pekerjaan'] = $row->Pekerjaan;
                
            }
                $data = $this->session->all_userdata();
                $this->load->view('Mahasiswa/header.php',$data);
                $this->load->view('Mahasiswa/dashboard.php',$result);
                $this->load->view('Mahasiswa/footer.php',$data);
            
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tidak Ada Data Yang Ditemukan</div>');
            redirect('Mahasiswa/dashboard');
        }
        
        

    }
}
