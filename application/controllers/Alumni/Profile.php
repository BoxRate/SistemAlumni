<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    var $data;

	public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('dashboard_model');
		if($this->session->userdata('Role') != "Alumni") {
			redirect('Mahasiswa/dashboard');
        }
        
        $dataUser = $this->session->all_userdata();

		$this->data =array(
			'User' => $dataUser
        );
	}

	public function index()
	{   
        $data = $this->dashboard_model->getAlumni("Nim =".$this->data['User']['Nim']);
        $this->data['Data'] = $data[0];
        $this->load->view('Mahasiswa/header.php',$this->data);
		$this->load->view('Alumni/profile.php',$this->data);
        $this->load->view('Mahasiswa/footer.php',$this->data);
    }

    function simpanData(){

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('kelamin', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('place', 'Tempat Lahir', 'required|trim');
		$this->form_validation->set_rules('ttl', 'Tanggal Lahir', 'required|trim');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		// $this->form_validation->set_rules('phone', 'No Hp', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'trim|matches[password]');

        if ($this->form_validation->run() == false) {
			$this->index();
		} else { 
            $data = array(
                'Nama' => $this->input->post('nama'),
                'Jenis_Kelamin' => $this->input->post('kelamin'),
                'Email' => $this->input->post('email'),
                'Tempat_Lahir' => $this->input->post('place'),
                'Tanggal_Lahir' => $this->input->post('ttl'),
                'Alamat' =>  $this->input->post('alamat'),
                'Pekerjaan' => $this->input->post('pekerjaan'),
                'No_Telepon' => $this->input->post('phone'),
                'Nama_Pekerjaan' => $this->input->post('nama_pekerjaan')
            );

            if ( $this->input->post('password') != "") {
                $data['Password'] = md5($this->input->post('password'));
            }

                $this->db->where("Nim", $this->data['User']['Nim']);
                $check = $this->db->update('alumni',$data);

                $this->db->where("Nim", $this->data['User']['Nim']);
                $query = $this->db->get('alumni');

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
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengubah data</div>');
                    redirect('Alumni/profile');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Mengganti data</div>');
                    redirect('Alumni/profile');
                }
                

        }
    }


    function uploadImage(){
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
                redirect('Alumni/profile');
            } else {
                $gbr = $this->upload->data();
                if($this->input->post('old_image') != "") {
                    unlink("./asset/image/Mahasiswa/".$this->input->post('old_image'));
                }
                $data=array();
                if(!$gbr==null) {
                    $data['Image'] = $gbr['file_name'];
                }

                $this->db->where("Nim", $this->data['User']['Nim']);
                $check = $this->db->update('alumni',$data);

                $this->db->where("Nim", $this->data['User']['Nim']);
                $query = $this->db->get('alumni');

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
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengganti Image</div>');
                    redirect('Alumni/profile');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Mengganti Image</div>');
                    redirect('Alumni/profile');
                }
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Mengganti Image</div>');
            redirect('Alumni/profile');
        } 
        
    }
}
?>