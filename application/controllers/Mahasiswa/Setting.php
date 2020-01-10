<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

    var $data;

	public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
		if($this->session->userdata('Role') != "Mahasiswa") {
			redirect('Auth/login');
        }
        
        $dataUser = $this->session->all_userdata();

		$this->data =array(
			'User' => $dataUser
        );
	}

	public function index()
	{   
        $this->load->view('Mahasiswa/header.php',$this->data);
		$this->load->view('Mahasiswa/setting.php',$this->data);
        $this->load->view('Mahasiswa/footer.php',$this->data);
    }


    function simpanData() {
	
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password1', 'Password', 'trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'trim|matches[password1]');
        $gbr;
        if (!empty($_FILES["image"]['name'])) {
            $config['upload_path']          = './asset/image/Mahasiswa';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['encrypt_name']          = TRUE;
            $config['max_size']             = 1024;
            $config['overwrite']			= true;
            // $config['file_name']            = $this->input->post('nim');
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$error['error'].'</div>');
                redirect('Mahasiswa/setting');
            } else {
                $gbr = $this->upload->data();
                unlink("./asset/image/Mahasiswa/".$this->input->post('old_image'));
            }
        } 
        
        if ($this->form_validation->run() == false) {
			$this->index();
		} else {

            $data = array(
				'Nama' => $this->input->post('nama'),
				'Nim' => $this->data['User']['Nim'],
                'Email' => $this->input->post('email')
            );
           
            if(!$gbr==null) {
                $data['image'] = $gbr['file_name'];
                
            }
            
            $password = $this->input->post('password1');
            if($password != '') {
                $data['Password'] = md5($password);
            }

            $this->db->where("Nim", $data['Nim']);
            $check = $this->db->update('mahasiswa',$data);
            $this->db->where("Nim", $data['Nim']);
			$query = $this->db->get('mahasiswa');

            foreach($query->result() as $row) {
                $session_data = array(
                    'Nama' => $row->Nama,
                    'Nim' => $row->Nim,
                    'Email' => $row->Email,
                    'Image' => $row->image
                ); 
                $this->session->set_userdata($session_data);
            }

			if($check) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengubah Data</div>');
				redirect('Mahasiswa/setting');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Mengubah Data</div>');
				redirect('Mahasiswa/setting');
			}
		}

    }
    
    
}
?>