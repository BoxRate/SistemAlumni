<?php
class Register_model extends CI_Model {

    function insert($data) {
        return $this->db->insert('mahasiswa', $data);
    }

}

?>