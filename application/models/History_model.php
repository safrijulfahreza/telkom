<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History_model extends CI_Model
{
    public function getHistory()
    {
        $query = "SELECT `history`.*, `user`.`name`, `user`.`nik` 
                    FROM `history` 
                    JOIN `user` 
                    ON `history`.`hd` = `user`.`nik`";

        return $this->db->query($query)->result_array();
    }
}
