<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataMahasiswa extends CI_Controller {

    var $dataTahun = array();
    var $data;

	public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('Username')) {
			redirect('Auth/adminlogin');
		}

        $this->load->library('form_validation');
        $this->load->model('dashboard_model');
        $this->load->model('admin_model');

        $tahun = $this->dashboard_model->getTahun();
       
        foreach($tahun->result() as $row) {
            array_push($this->dataTahun, $row->Tahun_Keluar);
        }

        $dataUser = $this->session->all_userdata();
		$this->data =array(
            'User' => $dataUser
        );
	
	}

	public function index()
	{
        
        $jurusan = $this->dashboard_model->getJurusan();
        $isi = '';
        $i=1;

        foreach($jurusan as $jr) {
            $isi = $isi.'
            <tr>
            <td>'.$i.'</td>
            <td>'.$jr.'</td>
            <td><a href="./getJurusan?jurusan='.$jr.'">Tampilkan Per Tahun Akademik</a></td>
            </tr>
            ';
            $i+=1;
        }

        $tableJurusan= '
        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Daftar Jurusan MIPA Universitas Syiah Kuala</h4>
                                <h6 class="card-subtitle">List Jurusan
                                <div class="table-responsive">
                                    <table class="table"  style="color: #000000">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Jurusan</th>
                                                <th>Tampilkan Per Prodi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        '.$isi.'
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
        ';

        $this->data['Tabel']=$tableJurusan;
        $this->load->view('Admin/header.php',$this->data);
		$this->load->view('Admin/data_mahasiswa.php',$this->data);
		$this->load->view('Admin/footer.php',$this->data);
    }

    function getJurusan() {
        $jurusan = $this->input->get('jurusan');
        $tahunJurusan = $this->admin_model->getTahunJurusan($jurusan);

        $isi = '';
        $i=1;

        foreach($tahunJurusan as $jr) {
            $isi = $isi.'
            <tr>
            <td>'.$i.'</td>
            <td>'.$jr.'</td>
            <td><a href="./getMahasiswa?jurusan='.$jurusan.'&tahun='.$jr.'">Tampilkan Data Alumni</a></td>
            </tr>
            ';
            $i+=1;
        }

        $tableJurusan= '
        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Daftar Leting Jurusan '.$jurusan.'</h4>
                                <h6 class="card-subtitle">List Jurusan
                                <div class="table-responsive">
                                    <table class="table"  style="color: #000000">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tahun Masuk</th>
                                                <th>Tampilkan Data Alumni</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        '.$isi.'
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
        ';

        $this->data['Tabel']=$tableJurusan;
        $this->load->view('Admin/header.php',$this->data);
		$this->load->view('Admin/data_mahasiswa.php',$this->data);
		$this->load->view('Admin/footer.php',$this->data);

    }
    
    function getMahasiswa() {
        $jurusan = $this->input->get('jurusan');
        $tahun = $this->input->get('tahun');

        $dataAlumni = $this->admin_model->getMahasiswa("Jurusan = '".$jurusan."' AND Tahun_Masuk = ".$tahun );

        $isi = '';
        $i=1;

        foreach($dataAlumni as $row) {
            $isi = $isi.'
            <tr>
            <td><a>'.$i.'</a></td>
            <td><a>'.$row['Nim'].'</a></td>
            <td><a>'.$row['Nama'].'</a></td>
            <td><a>'.$row['Jurusan'].'</a></td>
            <td><a>'.$row['Email'].'</a></td>
            <td><a><img width="100px" src="'.base_url().'asset/image/Mahasiswa/'.$row['Image'].'"></a></td>
            <td>
            <a class="btn btn-danger pull-right ml-3" style="color: #ffff" data-toggle="modal" data-target="#delete-'.$row['Nim'].'"><i class="mdi mdi-delete-forever"></i></a>
            <a class="btn pull-right btn-success ml-3" style="color: #ffff" data-toggle="modal" data-target="#graduate-'.$row['Nim'].'"><i class="mdi mdi-school"></i></a>
            <a class="btn pull-right btn-primary" style="color: #ffff" data-toggle="modal" data-target="#edit-'.$row['Nim'].'"><i class="mdi mdi-pencil"></i></a>
            </td>
            </tr>

            <!-- Delete Modal -->
            <div class="modal fade" id="delete-'.$row['Nim'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data Mahasiswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                       Apa anda yakin ingin menghapus '.$row['Nama'].' dari Data ? 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <a href="./deleteMahasiswa?nim='.$row['Nim'].'" type="button" class="btn btn-danger">Hapus</a>
                    </div>
                    </div>
                </div>
            </div>

            <!-- End Delete Modal -->

            <!-- Graduate Modal -->
            <div class="modal fade" id="graduate-'.$row['Nim'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Luluskan </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div> 
                    <form action="/graduateMahasiswa" method="get">
                    <div class="modal-body">
                       Apa Mahasiswa bernama '.$row['Nama'].' Sudah Lulus ? Masukkan Tahun Lulus :
                       <input hidden id="nim" type="number" class="form-control" name="nim" value="'.$row['Nim'].'">
                       <div class="input-group mt-3">
                            <span class="input-group-addon"><i class="mdi mdi-calendar"></i></span>
                            <input id="tahun" type="number" class="form-control" name="tahun" value="'.date('Y').'">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <input type="submit" class="btn btn-primary" value="Lulus"> 
                    </div>
                    </form>
                    </div>
                </div>
            </div>

            <!-- End Graduate Modal -->


            <!-- Edit Modal -->
            <div class="modal fade" id="edit-'.$row['Nim'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Data </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div> 
                    <form action="./editMahasiswa" method="post">
                    <div class="modal-body">
                       <div class="input-group mt-3">
                            <span class="input-group-addon"><i class="mdi mdi-account"></i></span>
                            <input id="nim" type="number" class="form-control" name="nim" value="'.$row['Nim'].'" readonly>
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-addon"><i class="mdi mdi-account"></i></span>
                            <input id="nama" type="text" class="form-control" name="nama" value="'.$row['Nama'].'">
                        </div>
                        <div class="input-group mt-3">
                        <span class="input-group-addon"><i class="mdi mdi-school"></i></span>
                          <select name="jurusan" class="form-control" id="jurusan">
                            <option value="'.$row['Jurusan'].'" >'.$row['Jurusan'].'</option>
                            <option disabled role=separator>----------------------------------------------------</option>
                            <option value="Matematika" >Matematika</option>
                            <option value="Fisika" >Fisika</option>
                            <option value="Kimia" >Kimia</option>
                            <option value="Biologi" >Biologi</option>
                            <option value="Teknik Elektronika" >Teknik Elektronika</option>
                            <option value="Informatika" >Informatika</option>
                            <option value="Manajemen Informatika" >Manajemen Informatika</option>
                            <option value="Statistika" >Statistika</option>
                            <option value="Farmasi" >Farmasi</option>
                          </select>
                        </div>
                        <div class="input-group mt-3">
                        <span class="input-group-addon"><i class="mdi mdi-email"></i></span>
                        <input id="email" type="email" class="form-control" name="email" value="'.$row['Email'].'">
                    </div>

                    <div class="input-group mt-3">
                    <span class="input-group-addon"><i class="mdi mdi-calendar"></i></span>
                    <input id="tahun" type="number" class="form-control" name="tahun" value="'.$row['Tahun_Masuk'].'">
                </div>



                    </div>
                    <div class="modal-footer">
                        <a href="./resetPass?nim='.$row['Nim'].'" type="button" class="btn btn-danger">Reset Password</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <input type="submit" class="btn btn-primary" value="Simpan"> 
                    </div>
                    </form>
                    </div>
                </div>
            </div>

            <!-- End edit Modal -->


            ';
            $i+=1;
        }

        $tableJurusan= '
        <div class="card">
        <div class="card-block">
            <h4 class="card-title">Daftar Mahasiswa Jurusan '.$jurusan.' Tahun '.$tahun.'</h4>
            <h6 class="card-subtitle">List Mahasiswa
            <div class="table-responsive">
                <table id="dataTable" class="table"  style="color: #000000">
                    <thead>
                    <tr>
                    <th>No</th>
                    <th>Nim</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Email</th>
                    <th width="15%">Image</th>
                    <th width="20%%" ></th>
                    </tr>
                    </thead>
                    <tbody>
                    '.$isi.'
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        ';

        $this->data['Tabel']=$tableJurusan;
        $this->load->view('Admin/header.php',$this->data);
		$this->load->view('Admin/data_mahasiswa.php',$this->data);
		$this->load->view('Admin/footer.php',$this->data);

    }

    function deleteMahasiswa() {
        $nim = $this->input->get('nim');

        $query = $this->db->delete('mahasiswa', array('Nim' => $nim));

        if($query) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berhasil Menghapus data</div>');
            header('Location: ' . $_SERVER["HTTP_REFERER"] );
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Gagal Menghapus data</div>');
            header('Location: ' . $_SERVER["HTTP_REFERER"] );

        }

    }

    function graduateMahasiswa() {
        $nim = $this->input->get('nim');
        $tahun =  $this->input->get('tahun');

        //Check in alumni
        $this->db->where('Nim', $nim);
        $query = $this->db->get('alumni');
        
        if ($query->num_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Mahasiswa dengan nim '.$nim.' Sudah Menjadi Alumni</div>');
            header('Location: ' . $_SERVER["HTTP_REFERER"] );
        } else {
            $this->db->where('Nim', $nim);
            $query = $this->db->get('mahasiswa');

            $data = array();
    
            foreach($query->result() as $row) {
                $data['Nama'] = $row->Nama;
                $data['Nim'] = $row->Nim;
                $data['Password'] = $row->Password;
                $data['Email'] = $row->Email;
                $data['Jurusan'] = $row->Jurusan;
                $data['Tahun_Masuk'] = $row->Tahun_Masuk;
                $data['Tahun_Lulus'] = $tahun;
                $data['Image'] = $row->image;
                $data['role'] = 'Alumni';
            }

            $check = $this->db->insert('alumni',$data);

            if($check) {

                $query = $this->db->delete('mahasiswa', array('Nim' => $nim));

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Meluluskan Mahasasiswa</div>');
                header('Location: ' . $_SERVER["HTTP_REFERER"] );
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Meluluskan Mahasasiswa</div>');
                header('Location: ' . $_SERVER["HTTP_REFERER"] );
    
            }
        }
    }


    function editMahasiswa() {
        $data = array (
            'Nama' => $this->input->post('nama'),
            'Email' => $this->input->post('email'),
            'Tahun_Masuk' => $this->input->post('tahun'),
            'Jurusan' => $this->input->post('jurusan')
        );

        $nim = $this->input->post('nim');

        $this->db->where('Nim', $nim);
        $check = $this->db->update('mahasiswa',$data);

        
        if($check) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengubah data Mahasasiswa</div>');
            header('Location: ' . $_SERVER["HTTP_REFERER"] );
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Mengubah data Mahasasiswa</div>');
            header('Location: ' . $_SERVER["HTTP_REFERER"] );

        }
        
    }

    function resetPass() {
        $nim = $this->input->get('nim');

        $data['Password'] = md5("123456789");

        $this->db->where('Nim', $nim);
        $check = $this->db->update('mahasiswa',$data);

        if($check) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mereset Password Mahasasiswa Menjadi "123456789"</div>');
            header('Location: ' . $_SERVER["HTTP_REFERER"] );
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Mereset Password Mahasasiswa</div>');
            header('Location: ' . $_SERVER["HTTP_REFERER"] );

        }
    }


}