<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jabatan extends CI_Model {

    function get_jabatan()
    {
        // $this->db->where('id', $id);
        return $this->db->get('jabatan')->result();
    }

    function insert($data)
    {
        return $this->db->insert('jabatan', $data);
    }
}