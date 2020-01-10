<?php
class Dashboard_model extends CI_Model {

    function getTahun() {
        $this->db->distinct();
        $this->db->select('Tahun_Keluar');
        return $query = $this->db->get('alumni');
    }

    function getCountTahun($tahun) {
        $this->db->where('Tahun_Keluar', $tahun);
        $query = $this->db->get('alumni');

        return $query->num_rows();
    }

    function getJurusan() {
        $this->db->distinct();
        $this->db->select('Nama_Jurusan');
        $query = $this->db->get('jurusan');
        $dataJurusan = array();

        foreach($query->result() as $row) {
            array_push($dataJurusan, $row->Nama_Jurusan);
        }

        return $dataJurusan;
    }


    function getTahunJurusan($jurusan) {
        $this->db->distinct();
        $this->db->select('Tahun_Masuk');
        $this->db->where('Jurusan', $jurusan);
        $query = $this->db->get('alumni');

        $data = array();

        foreach($query->result() as $row) {
            array_push($data, $row->Tahun_Masuk);
        }

        return $data;
    }


    function getAlumni($where) {
        $this->db->where($where);
        $query = $this->db->get('alumni'); 

        $data = array();
        $result = array();

        foreach($query->result() as $row) {
            $result['Nama'] = $row->Nama;
            $result['Nim'] = $row->Nim;
            $result['Email'] = $row->Email;
            $result['Jk'] = $row->Jenis_Kelamin;
            $result['Jurusan'] = $row->Jurusan;
            $result['Tahun_Masuk'] = $row->Tahun_Masuk;
            $result['Tahun_Keluar'] = $row->Tahun_Keluar;
            $result['Tempat_Lahir'] = $row->Tempat_Lahir;
            $result['Tanggal_Lahir'] = $row->Tanggal_Lahir;
            $result['Pekerjaan'] = $row->Pekerjaan;
            $result['Alamat'] = $row->Alamat;
            $result['No_Telepon'] = $row->No_Telepon;
            $result['Image'] = $row->Image;
            array_push($data, $result);
        }
        
        return $data;
    }

    function getPerkerjaan($nim) {
        $this->db->where('Nim', $nim);
        $this->db->order_by("Tahun_Masuk", "asc");
        $query = $this->db->get('p_perkerjaan'); 

        $data = array();
        $result = array();

        foreach($query->result() as $row) { 
            $result['id'] = $row->id;
            $result['Tahun_Masuk'] = $row->Tahun_Masuk;
            $result['Tahun_Keluar'] = $row->Tahun_Keluar;
            $result['Nama_Pekerjaan'] = $row->Nama_Pekerjaan;
            $result['Keterangan'] = $row->Keterangan;
            array_push($data, $result);
        }
        return $data;
    }

    function getOrganisasi($nim) {
        $this->db->where('Nim', $nim);
        $this->db->order_by("Tahun_Masuk", "asc");
        $query = $this->db->get('r_organisasi'); 

        $data = array();
        $result = array();

        foreach($query->result() as $row) { 
            $result['id'] = $row->id;
            $result['Tahun_Masuk'] = $row->Tahun_Masuk;
            $result['Tahun_Keluar'] = $row->Tahun_Keluar;
            $result['Nama_Organisasi'] = $row->Nama_Organisasi;
            $result['Keterangan'] = $row->Keterangan;
            array_push($data, $result);
        }
        return $data;
    }

    function getPenghargaan($nim) {
        $this->db->where('Nim', $nim);
        $this->db->order_by("Tahun", "asc");
        $query = $this->db->get('r_penghargaan'); 

        $data = array();
        $result = array();

        foreach($query->result() as $row) { 
            $result['id'] = $row->id;
            $result['Tahun'] = $row->Tahun;
            $result['Nama_Penghargaan'] = $row->Nama_Penghargaan;
            $result['Keterangan'] = $row->Keterangan;
            array_push($data, $result);
        }
        return $data;
    }

    function getPendidikan($nim) {
        $this->db->where('Nim', $nim);
        $this->db->order_by("Tahun_Masuk", "asc");
        $query = $this->db->get('r_pendidikan'); 

        $data = array();
        $result = array();

        foreach($query->result() as $row) { 
            $result['id'] = $row->id;
            $result['Tahun_Masuk'] = $row->Tahun_Masuk;
            $result['Tahun_Keluar'] = $row->Tahun_Keluar;
            $result['Nama_Instansi'] = $row->Nama_Instansi;
            $result['Alamat'] = $row->Kota;
            array_push($data, $result);
        }
        return $data;
    }


}

?>