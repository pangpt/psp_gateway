<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

    public $id = 'id';
    
    function insert($data)
    {
        $this->db->insert('users', $data);
    }

    function get_username($id)
    {
        $this->db->where('username', $id);
        return $this->db->get('users')->row();
    }
}