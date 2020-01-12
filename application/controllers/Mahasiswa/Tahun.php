<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun extends CI_Controller {

    var $dataTahun = array();
    var $data;

	public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('Role')) {
			redirect('Auth/login');
		}

        $this->load->library('form_validation');
        $this->load->model('dashboard_model');

        $tahun = $this->dashboard_model->getTahun();
       
        foreach($tahun->result() as $row) {
            array_push($this->dataTahun, $row->Tahun_Keluar);
        }

        $dataUser = $this->session->all_userdata();
		$this->data =array(
            'User' => $dataUser,
            'Tahun' => $this->dataTahun,
        );
	
	}

	public function index()
	{
        $this->load->view('Mahasiswa/header.php',$this->data);
		$this->load->view('Mahasiswa/tahun.php',$this->data);
		$this->load->view('Mahasiswa/footer.php',$this->data);
	}
    
    function getTahun() {
        $tahun = $this->input->post('tahun_lulus');
        $this->db->where('Tahun_Keluar', $tahun);
        $query = $this->db->get('alumni');

        if ($query->num_rows() > 0) { 
            $dataUser = $this->session->all_userdata();
            $result=array();
          
            $this->data['Alumni'] = array();

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
                array_push($this->data['Alumni'], $result);         
            } 
                $this->load->view('Mahasiswa/header.php',$this->data);
                $this->load->view('Mahasiswa/tahun.php',$this->data);
                $this->load->view('Mahasiswa/footer.php',$this->data);
            
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tidak Ada Data Yang Ditemukan</div>');
            redirect('Mahasiswa/tahun');
        }
    }

}
