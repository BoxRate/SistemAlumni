<?php
class Admin_Model extends CI_Model {

    function getAllAdmin() {
        $query = $this->db->get('admin'); 

        $data = array();
        $result = array();

        foreach($query->result() as $row) {
            $result['Username'] = $row->Username;
            $result['Nama'] = $row->Nama;
            $result['Password'] = $row->Password;
            $result['Image'] = $row->image;
            array_push($data, $result);
        }
        
        return $data;
    }

    function getCountAlumni() {
        $query = $this->db->get('alumni');

        return $query->num_rows();
    }

    function getCountMahasiswa() {
        $query = $this->db->get('mahasiswa');
        return $query->num_rows();
    }

    function getTahunJurusan($jurusan) {
        $this->db->distinct();
        $this->db->select('Tahun_Masuk');
        $this->db->where('Jurusan', $jurusan);
        $query = $this->db->get('mahasiswa');

        $data = array();

        foreach($query->result() as $row) {
            array_push($data, $row->Tahun_Masuk);
        }

        return $data;
    }

    function getMahasiswa($where) {
        $this->db->where($where);
        $query = $this->db->get('mahasiswa'); 

        $data = array();
        $result = array();

        foreach($query->result() as $row) {
            $result['Nama'] = $row->Nama;
            $result['Nim'] = $row->Nim;
            $result['Email'] = $row->Email;
            $result['Jurusan'] = $row->Jurusan;
            $result['Tahun_Masuk'] = $row->Tahun_Masuk;
            $result['Image'] = $row->image;
            array_push($data, $result);
        }
        
        return $data;
    }


}

?>