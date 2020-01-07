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


}

?>