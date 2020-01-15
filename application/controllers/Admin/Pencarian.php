<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencarian extends CI_Controller {

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
		$this->data['Tabel'] = "";
        $this->load->view('Admin/header.php', $this->data);
		$this->load->view('Admin/pencarian.php', $this->data);
		$this->load->view('Admin/footer.php',$this->data);
	}
	
	function cariMahasiswa() {
		$nim = $this->input->get('nim');
		$role = $this ->input->get('role');

		if($role == "Mahasiswa") {
			$this->getMahasiswa($nim);
		} elseif ($role =="Alumni") {
			$this->getAlumni($nim);
		}

	}

	function getMahasiswa($nim) {

        $dataAlumni = $this->admin_model->getMahasiswa("Nim = ".$nim );

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
                        <a href="'. base_url().'index.php/Admin/DataMahasiswa/deleteMahasiswa?nim='.$row['Nim'].'" type="button" class="btn btn-danger">Hapus</a>
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
                    <form action="'. base_url().'index.php/Admin/DataMahasiswa/Admin/DataMahasiswa/graduateMahasiswa" method="get">
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
                    <form action="'. base_url().'index.php/Admin/DataMahasiswa/editMahasiswa" method="post">
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
                        <a href="'. base_url().'index.php/Admin/DataMahasiswa/resetPass?nim='.$row['Nim'].'" type="button" class="btn btn-danger">Reset Password</a>
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
            <h4 class="card-title">Daftar Mahasiswa Jurusan</h4>
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
		$this->load->view('Admin/pencarian.php',$this->data);
		$this->load->view('Admin/footer.php',$this->data);

	}

	function getAlumni($nim) {
        $dataAlumni = $this->dashboard_model->getAlumni("Nim = ".$nim);

        $isi = '';
        $i=1;

        foreach($dataAlumni as $row) {
            $isi = $isi.'
            <tr>
            <td><a href="'.base_url().'index.php/Admin/DataAlumni/getPerson?nim='.$row['Nim'].'">'.$row['Nim'].'</a></td>
            <td><a href="'.base_url().'index.php/Admin/DataAlumni//getPerson?nim='.$row['Nim'].'">'.$row['Nama'].'</a></td>
            <td><a href="'.base_url().'index.php/Admin/DataAlumni//getPerson?nim='.$row['Nim'].'">'.$row['Jurusan'].'</a></td>
            <td><a href="'.base_url().'index.php/Admin/DataAlumni//getPerson?nim='.$row['Nim'].'">'.$row['Email'].'</a></td>
            <td><a href="'.base_url().'index.php/Admin/DataAlumni//getPerson?nim='.$row['Nim'].'">'.$row['Tahun_Keluar'].'</a></td>
            <td><a href="'.base_url().'index.php/Admin/DataAlumni//getPerson?nim='.$row['Nim'].'">'.$row['Pekerjaan'].'</a></td>
            <td>
                <a class="btn btn-danger pull-right ml-3" style="color: #ffff" data-toggle="modal" data-target="#delete-'.$row['Nim'].'"><i class="mdi mdi-delete-forever"></i></a>
				<a class="btn pull-right btn-primary" style="color: #ffff" data-toggle="modal" data-target="#edit-'.$row['Nim'].'"><i class="mdi mdi-pencil"></i></a>
				</td>
            </tr>

            <!-- Delete Modal -->
            <div class="modal fade" id="delete-'.$row['Nim'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data Alumni</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                       Apa anda yakin ingin menghapus '.$row['Nama'].' dari Data ? 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <a href="'.base_url().'index.php/Admin/DataAlumni/deleteAlumni?nim='.$row['Nim'].'" type="button" class="btn btn-danger">Hapus</a>
                    </div>
                    </div>
                </div>
            </div>

			<!-- End Delete Modal -->
			
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
                    <form action="'.base_url().'index.php/Admin/DataAlumni/editAlumni" method="post">
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mt-3">
                            <span class="input-group-addon"><i class="mdi mdi-calendar"></i></span>
                            <input id="tahun_masuk" type="number" class="form-control" name="tahun_masuk" value="'.$row['Tahun_Masuk'].'">
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="input-group mt-3">
                        <span class="input-group-addon"><i class="mdi mdi-calendar"></i></span>
                        <input id="tahun_keluar" type="number" class="form-control" name="tahun_keluar" value="'.$row['Tahun_Keluar'].'">
                        </div>
                    </div>
                    </div>
                    



                    </div>
                    <div class="modal-footer">
                        <a href="'.base_url().'index.php/Admin/DataAlumni/resetPass?nim='.$row['Nim'].'" type="button" class="btn btn-danger">Reset Password</a>
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
            <h4 class="card-title">Daftar Alumni</h4>
            <h6 class="card-subtitle">List Alumni
            <div class="table-responsive">
                <table id="dataTable" class="table"  style="color: #000000">
                    <thead>
                    <tr>
                    <th>Nim</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Email</th>
                    <th>Tahun Lulus</th>
                    <th>Pekerjaan</th>
                    <th width="15%" ></th>
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
		$this->load->view('Admin/pencarian.php',$this->data);
		$this->load->view('Admin/footer.php',$this->data);
	}
}