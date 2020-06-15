<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teknisi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Task';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['perbaikan'] = $this->db->get('perbaikan')->result_array();
        $data['sto'] = $this->db->get('sto')->result_array();
        $this->load->model('Teknisi_model', 'teknisi');
        $data['teknisi'] = $this->teknisi->getTeknisi();
        // var_dump($data['user']);
        // die;
        $data['helpdeskk'] = $this->db->get('user')->result_array();

        $this->db->select('name');
        $data['hd'] = $this->db->get('user')->result_array();


        $this->load->model('History_model', 'history');
        $data['history'] = $this->history->getHistory();

        $this->load->model('Table_model', 'laporan');
        $data['input'] = $this->laporan->getLaporanASC();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('teknisi/tech', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $temp = $this->db->get_where('input', ['nomor_tiket' => $this->input->post('nomor')])->row_array();
        $data = [
            'status' => $this->input->post('status'),
            'perbaikan' => $this->input->post('subsegmen'),
            'keterangan' => $this->input->post('keterangan'),
            'sleeve' => $this->input->post('sleeve'),
            'adaptor' => $this->input->post('adaptor'),
            'precon50' => $this->input->post('precon50'),
            'precon75' => $this->input->post('precon75'),
            'precon100' => $this->input->post('precon100'),
            'precon150' => $this->input->post('precon150'),
            'ps1:4' => $this->input->post('ps14'),
            'ps1:8' => $this->input->post('ps18'),
            'pigtail' => $this->input->post('pigtail')
        ];
        $this->db->set($data);
        $this->db->set('tgl_update', 'NOW()', FALSE);
        $this->db->where('nomor_tiket', $this->input->post('nomor'));
        $this->db->update('input');

        if ($temp['status'] == $this->input->post('status')) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data di update!</div>');
            redirect('teknisi');
        } else {
            $history = [
                'nomor' => $this->input->post('nomor'),
                'hd' => $this->session->userdata('nik'),
                'status' => $this->input->post('status')
            ];
            $this->db->set('waktu', 'NOW()', FALSE);
            $this->db->insert('history', $history);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data di update!</div>');
        redirect('teknisi');
    }

    public function foto($nomor_tiket)
    {
        $data['title'] = 'Upload Foto';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['nomor_tiket'] = $nomor_tiket;
        $data['laporan'] = $this->db->get('input')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('teknisi/foto', $data);
        $this->load->view('templates/footer');
    }

    public function upload()
    {
        $data['title'] = 'Upload Foto';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['nomor_tiket'] = $this->input->post('nomor_tiket');

        var_dump($data['nomor_tiket']);
        die;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('teknisi/foto', $data);
        $this->load->view('templates/footer');

        // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');

    }
}
