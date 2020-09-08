<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Table_model extends CI_Model
{
    public function getLaporanASC()
    {
        $query = "SELECT input.*, user.name FROM input JOIN user ON input.id_pel = user.id ORDER BY tgl_input ASC";

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

    public function getVal($id)
    {
        $query = "SELECT input.nomor_tiket, input.perbaikan, input.tgl_update ,input.status, input.image, input.id_pel, penilaian.rate, penilaian.keterangan 
                    FROM input JOIN penilaian ON input.nomor_tiket = penilaian.nomor_tiket 
                    WHERE input.id_pel = $id AND penilaian.rate = 0 AND input.status = 'CLOSE'";
        return $this->db->query($query)->row_array();
    }
}
