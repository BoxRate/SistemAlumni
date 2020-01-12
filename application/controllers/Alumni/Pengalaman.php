<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengalaman extends CI_Controller {

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
        $this->data['Pekerjaan'] = $this->dashboard_model->getPerkerjaan($this->data['User']['Nim']);
        $this->data['Organisasi'] = $this->dashboard_model->getOrganisasi($this->data['User']['Nim']);
        $this->data['Penghargaan'] = $this->dashboard_model->getPenghargaan($this->data['User']['Nim']);
        $this->data['Pendidikan'] = $this->dashboard_model->getPendidikan($this->data['User']['Nim']);
      
        $this->load->view('Mahasiswa/header.php',$this->data);
		$this->load->view('Alumni/pengalaman.php',$this->data);
        $this->load->view('Mahasiswa/footer.php',$this->data);
    }

    function editPenghargaan() {
        $data = array(
            'Nama_Penghargaan' => $this->input->post('nama'),
            'Tahun' => $this->input->post('tahun'),
            'Keterangan' => $this->input->post('keterangan')
        );

        $this->db->where("Nim", $this->data['User']['Nim']);
        $this->db->where("id",$this->input->post('id_penghargaan'));
        $check = $this->db->update('r_penghargaan',$data);

        if($check) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengubah data</div>');
            redirect('Alumni/pengalaman');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Mengubah data</div>');
            redirect('Alumni/pengalam');
        }

    }

    function editPekerjaan() {
        $data = array(
            'Nama_Pekerjaan' => $this->input->post('nama'),
            'Tahun_Masuk' => $this->input->post('tahun_masuk'),
            'Tahun_Keluar' => $this->input->post('tahun_keluar'),
            'Keterangan' => $this->input->post('keterangan')
        );

        $this->db->where("Nim", $this->data['User']['Nim']);
        $this->db->where("id",$this->input->post('id_penghargaan'));
        $check = $this->db->update('p_perkerjaan',$data);

        if($check) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengubah data</div>');
            redirect('Alumni/pengalaman');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Mengubah data</div>');
            redirect('Alumni/pengalam');
        }

    }

    function editOrganisasi() {
        $data = array(
            'Nama_Organisasi' => $this->input->post('nama'),
            'Tahun_Masuk' => $this->input->post('tahun_masuk'),
            'Tahun_Keluar' => $this->input->post('tahun_keluar'),
            'Keterangan' => $this->input->post('keterangan')
        );

        $this->db->where("Nim", $this->data['User']['Nim']);
        $this->db->where("id",$this->input->post('id_penghargaan'));
        $check = $this->db->update('r_organisasi',$data);

        if($check) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengubah data</div>');
            redirect('Alumni/pengalaman');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Mengubah data</div>');
            redirect('Alumni/pengalam');
        }

    }

    function editPendidikan() {
        $data = array(
            'Nama_Instansi' => $this->input->post('nama'),
            'Tahun_Masuk' => $this->input->post('tahun_masuk'),
            'Tahun_Keluar' => $this->input->post('tahun_keluar'),
            'Kota' => $this->input->post('keterangan')
        );

        $this->db->where("Nim", $this->data['User']['Nim']);
        $this->db->where("id",$this->input->post('id_penghargaan'));
        $check = $this->db->update('r_pendidikan',$data);

        if($check) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengubah data</div>');
            redirect('Alumni/pengalaman');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Mengubah data</div>');
            redirect('Alumni/pengalam');
        }

    }

    function deletePekerjaan() {
        $id = $this->input->get('id');

        $this->db->where("Nim", $this->data['User']['Nim']);
        $check = $this->db->delete('p_perkerjaan', array('id' => $id));

        if($check) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berhasil Menghapus data</div>');
            redirect('Alumni/pengalaman');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Gagal Menghapus data</div>');
            redirect('Alumni/pengalam');
        }
    }

    function deletePendidikan() {
        $id = $this->input->get('id');

        $this->db->where("Nim", $this->data['User']['Nim']);
        $check = $this->db->delete('r_pendidikan', array('id' => $id));
        
        if($check) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berhasil Menghapus data</div>');
            redirect('Alumni/pengalaman');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Gagal Menghapus data</div>');
            redirect('Alumni/pengalam');
        }
    }

    function deleteOrganisasi() {
        $id = $this->input->get('id');

        $this->db->where("Nim", $this->data['User']['Nim']);
        $check = $this->db->delete('r_organisasi', array('id' => $id));

        if($check) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berhasil Menghapus data</div>');
            redirect('Alumni/pengalaman');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Gagal Menghapus data</div>');
            redirect('Alumni/pengalam');
        }
    }

    function deletePenghargaan() {
        $id = $this->input->get('id');

        $this->db->where("Nim", $this->data['User']['Nim']);
        $check = $this->db->delete('r_penghargaan', array('id' => $id));

        if($check) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berhasil Menghapus data</div>');
            redirect('Alumni/pengalaman');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Gagal Menghapus data</div>');
            redirect('Alumni/pengalam');
        }
    }

    function addPendidikan() {
        $data = array(
            'Nama_Instansi' => $this->input->post('nama'),
            'Nim' => $this->data['User']['Nim'],
            'Tahun_Masuk' => $this->input->post('tahun_masuk'),
            'Tahun_Keluar' => $this->input->post('tahun_keluar'),
            'Kota' => $this->input->post('keterangan')
        );

        $check = $this->db->insert('r_pendidikan', $data);

        if($check) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambah data</div>');
            redirect('Alumni/pengalaman');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menambah data</div>');
            redirect('Alumni/pengalam');
        }

    }


    function addPenghargaan() {
        $data = array(
            'Nama_Penghargaan' => $this->input->post('nama'),
            'Nim' => $this->data['User']['Nim'],
            'Tahun' => $this->input->post('tahun'),
            'Keterangan' => $this->input->post('keterangan')
        );

        $check = $this->db->insert('r_penghargaan', $data);

        if($check) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambah data</div>');
            redirect('Alumni/pengalaman');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menambah data</div>');
            redirect('Alumni/pengalam');
        }

    }

    function addOrganisasi() {
        $data = array(
            'Nama_Organisasi' => $this->input->post('nama'),
            'Nim' => $this->data['User']['Nim'],
            'Tahun_Masuk' => $this->input->post('tahun_masuk'),
            'Tahun_Keluar' => $this->input->post('tahun_keluar'),
            'Keterangan' => $this->input->post('keterangan')
        );

        $check = $this->db->insert('r_organisasi', $data);

        if($check) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambah data</div>');
            redirect('Alumni/pengalaman');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menambah data</div>');
            redirect('Alumni/pengalam');
        }

    }

    function addPekerjaan() {
        $data = array(
            'Nama_Pekerjaan' => $this->input->post('nama'),
            'Nim' => $this->data['User']['Nim'],
            'Tahun_Masuk' => $this->input->post('tahun_masuk'),
            'Tahun_Keluar' => $this->input->post('tahun_keluar'),
            'Keterangan' => $this->input->post('keterangan')
        );

        $check = $this->db->insert('p_perkerjaan', $data);

        if($check) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambah data</div>');
            redirect('Alumni/pengalaman');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menambah data</div>');
            redirect('Alumni/pengalam');
        }

    }


}

?>