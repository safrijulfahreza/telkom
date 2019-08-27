<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Input extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Input';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['teknisi'] = $this->db->get('teknisi')->result_array();
        $data['perbaikan'] = $this->db->get('perbaikan')->result_array();
        $data['sto'] = $this->db->get('sto')->result_array();


        $this->form_validation->set_rules('nomor', 'Nomor Tiket', 'required|is_unique[input.nomor_tiket]', [
            'is_unique' => 'Nomor Tiket sudah ada!'
        ]);
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('layanan', 'Layanan', 'required');
        $this->form_validation->set_rules('segmen', 'Segmen', 'required');
        $this->form_validation->set_rules('teknisi1', 'Teknisi 1', 'required');
        $this->form_validation->set_rules('teknisi2', 'Teknisi 2', 'required');
        $this->form_validation->set_rules('sto', 'STO', 'required');
        $this->form_validation->set_rules('alpro', 'Alpro', 'required');
        $this->form_validation->set_rules('subsegmen', 'Sub Segementasi Perbaikan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('input/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nomor_tiket' => $this->input->post('nomor'),
                'status' => $this->input->post('status'),
                'layanan' => $this->input->post('layanan'),
                'segmen' => $this->input->post('segmen'),
                'teknisi1' => $this->input->post('teknisi1'),
                'teknisi2' => $this->input->post('teknisi2'),
                'helpdesk' => $data['user']['name'],
                'sto' => $this->input->post('sto'),
                'alpro' => $this->input->post('alpro'),
                'perbaikan' => $this->input->post('subsegmen'),
                'keterangan' => $this->input->post('keterangan'),
            ];
            $this->db->set('tgl_input', 'NOW()', FALSE);
            $this->db->insert('input', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambah</div>');
            redirect('input');
        }
    }

    public function table()
    {
        $data['title'] = 'Table';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['input'] = $this->db->get('input')->result_array();
        $data['perbaikan'] = $this->db->get('perbaikan')->result_array();
        $data['sto'] = $this->db->get('sto')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('input/table', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
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

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data di update!</div>');
        redirect('input/table');
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('input');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Dihapus !</div>');
        redirect('input/table');
    }

    public function export()
    {
        $data['data'] = $this->db->get('input')->result_array();
        $this->load->view('input/export', $data);
    }

    public function grafik()
    {
        $data['title'] = 'Grafik';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['input'] = $this->db->get('input')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('input/grafik', $data);
        $this->load->view('templates/footer', $data);
    }
}