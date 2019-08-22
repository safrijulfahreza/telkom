<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubmenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                    FROM `user_sub_menu` JOIN `user_menu`
                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                ";
        return $this->db->query($query)->result_array();
    }

    public function editMenu($data)
    {
        $query = "UPDATE user_menu SET
                        menu = :menu
                        WHERE id = :id
                    ";
        $this->db->query($query);
        $this->db->bind('menu', $data['menu']);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
