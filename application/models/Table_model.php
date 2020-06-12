<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Table_model extends CI_Model
{
    public function getLaporanASC()
    {
        $query = "SELECT * FROM `input` ORDER BY tgl_input ASC";

        return $this->db->query($query)->result_array();
    }
}
