<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Validasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Table_model', 'data');
    }
    public function index()
    {
        $data['title'] = 'Gangguan';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();


        $data['gangguan'] = $this->data->getVal($data['user']['id']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('validasi/index', $data);
        $this->load->view('templates/footer');
    }

    public function rate()
    {
        $data = [
            'rate' => $this->input->post('rate'),
            'keterangan' => $this->input->post('ket')
        ];
        $nomor = $this->input->post('no_ti');
        $this->db->set($data);
        $this->db->where('nomor_tiket', $nomor);
        $this->db->update('penilaian');
        redirect('validasi');
    }
}
