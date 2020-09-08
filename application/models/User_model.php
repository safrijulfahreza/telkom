<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getUser()
    {
        $query = "SELECT * FROM `user` WHERE role_id != 4";
        return $this->db->query($query)->result_array();
    }
    public function getPelanggan()
    {
        $query = "SELECT * FROM `user` WHERE role_id = 4";
        return $this->db->query($query)->result_array();
    }
}
