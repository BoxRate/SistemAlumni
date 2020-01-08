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
            $result['Jurusan'] = $row->Jurusan;
            $result['Tahun_Masuk'] = $row->Tahun_Masuk;
            $result['Tahun_Keluar'] = $row->Tahun_Keluar;
            $result['Tempat_Lahir'] = $row->Tempat_Lahir;
            $result['Tanggal_Lahir'] = $row->Tanggal_Lahir;
            $result['Pekerjaan'] = $row->Pekerjaan;
            $result['Alamat'] = $row->Alamat;
            $result['No_Telepon'] = $row->No_Telepon; 
            array_push($data, $result);
        }
        
        return $data;
    }

}

?>