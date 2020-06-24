<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Table_model extends CI_Model
{
    public function getLaporanASC()
    {
        $query = "SELECT * FROM `input` ORDER BY tgl_input ASC";

        return $this->db->query($query)->result_array();
    }

    public function getLaporanDitangani($name)
    {
        $query = "SELECT COUNT(helpdesk) AS helpdesk FROM input WHERE helpdesk = '$name'";
        return $this->db->query($query)->row_array();
    }

    public function getLaporanClose($name)
    {
        $query = "SELECT COUNT(helpdesk) AS close FROM input WHERE helpdesk = '$name' AND status = 'CLOSE'";
        return $this->db->query($query)->row_array();
    }

    public function dataGrafikStat()
    {
        $query = "SELECT status, COUNT(*) AS total FROM input GROUP BY status";
        return $this->db->query($query)->result();
    }
}
