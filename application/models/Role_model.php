<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role_model extends CI_Model
{
    public function getRole()
    {
        $query = "SELECT * FROM `user_role` WHERE id != 4";
        return $this->db->query($query)->result_array();
    }
}
