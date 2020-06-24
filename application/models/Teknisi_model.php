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

    public function getTask($name)
    {
        $query = "SELECT COUNT(teknisi1) AS helpdesk FROM input WHERE teknisi1 = '$name' OR teknisi2 = '$name'";
        return $this->db->query($query)->row_array();
    }

    public function getClose($name)
    {
        $query = "SELECT COUNT(status) AS close FROM input WHERE status = 'CLOSE' AND teknisi1 = '$name' OR teknisi2 = '$name'";
        return $this->db->query($query)->row_array();
    }
}
