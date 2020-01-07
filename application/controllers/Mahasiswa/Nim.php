<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nim extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
		if(!$this->session->userdata('Nim')) {
			redirect('Auth/login');
		}
	}

	public function index()
	{
      
		$dataUser = $this->session->all_userdata();

		$data =array(
			'User' => $dataUser
        );
        
        $this->load->view('Mahasiswa/header.php',$data);
		$this->load->view('Mahasiswa/nim.php',$data);
		$this->load->view('Mahasiswa/footer.php',$data);
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
                $result['Jurusan'] = $row->Jurusan;
                $result['Tahun_Masuk'] = $row->Tahun_Masuk;
                $result['Tahun_Keluar'] = $row->Tahun_Keluar;
                $result['Tempat_Lahir'] = $row->Tempat_Lahir;
                $result['Tanggal_Lahir'] = $row->Tanggal_Lahir;
                $result['Pekerjaan'] = $row->Pekerjaan;
                $result['Alamat'] = $row->Alamat;
                $result['No_Telepon'] = $row->No_Telepon;                
            }
                $data = $this->session->all_userdata();
                $this->load->view('Mahasiswa/header.php',$data);
                $this->load->view('Mahasiswa/nim.php',$result);
                $this->load->view('Mahasiswa/footer.php',$data);
            
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tidak Ada Data Yang Ditemukan</div>');
            redirect('Mahasiswa/dashboard');
        }
    
    
    }
}
