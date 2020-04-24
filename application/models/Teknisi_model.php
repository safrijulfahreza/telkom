<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teknisi_model extends CI_Model
{
    public function getTeknisi()
    {
        $query = "SELECT `user`.`id`,`user`.`name`,`user`.`nik`, `user`.`role_id`, `user_role`.`role` 
                    FROM `user` 
                    JOIN `user_role` ON `user`.`role_id` = `user_role`.`id` 
                    WHERE `user_role`.`role` = 'teknisi'";

        return $this->db->query($query)->result_array();
    }
}
