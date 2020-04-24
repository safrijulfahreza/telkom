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
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        $this->load->model('Teknisi_model', 'teknisi');
        $data['teknisi'] = $this->teknisi->getTeknisi();
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
        $data['title'] = 'Report Status Ticket';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['perbaikan'] = $this->db->get('perbaikan')->result_array();
        $data['sto'] = $this->db->get('sto')->result_array();
        $this->load->model('Teknisi_model', 'teknisi');
        $data['teknisi'] = $this->teknisi->getTeknisi();
        $data['helpdeskk'] = $this->db->get('user')->result_array();

        $this->db->select('name');
        $data['hd'] = $this->db->get('user')->result_array();

        // $f_sto = $this->input->post('f_sto');
        // $f_help = $this->input->post('f_helpdesk');
        // $f_segmen = $this->input->post('f_segmen');

        // var_dump($f_sto);
        // die;

        $data['input'] = $this->db->get('input')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('input/table', $data);
        $this->load->view('templates/footer');
        // $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        // $this->load->view('templates/topbar', $data);
        // filtering
        // if ($f_sto != "" && $f_help != "" && $f_segmen != "") {
        //     $data['input'] = $this->db->get_where('input', ['sto' => $f_sto, 'helpdesk' => $f_help, 'segmen' => $f_segmen])->result_array();
        //     $this->load->view('input/table', $data);
        //     if (isset($_POST['filter'])) {
        //         $data['input'] = $this->db->get_where('input', ['sto' => $f_sto, 'helpdesk' => $f_help, 'segmen' => $f_segmen])->result_array();
        //         $this->load->view('input/export', $data);
        //     }
        // } elseif ($f_sto != "" && $f_help != "") {
        //     $data['input'] = $this->db->get_where('input', ['sto' => $f_sto, 'helpdesk' => $f_help])->result_array();
        //     $this->load->view('input/table', $data);
        // } elseif ($f_help != "" && $f_segmen != "") {
        //     $data['input'] = $this->db->get_where('input', ['helpdesk' => $f_help, 'segmen' => $f_segmen])->result_array();
        //     $this->load->view('input/table', $data);
        // } elseif ($f_sto != "" && $f_segmen != "") {
        //     $data['input'] = $this->db->get_where('input', ['sto' => $f_sto, 'segmen' => $f_segmen])->result_array();
        //     $this->load->view('input/table', $data);
        // } elseif ($f_sto != "") {
        //     $data['input'] = $this->db->get_where('input', ['sto' => $f_sto])->result_array();
        //     $this->load->view('input/table', $data);
        // } elseif ($f_help != "") {
        //     $data['input'] = $this->db->get_where('input', ['helpdesk' => $f_help])->result_array();
        //     $this->load->view('input/table', $data);
        // } elseif ($f_segmen) {
        //     $data['input'] = $this->db->get_where('input', ['segmen' => $f_segmen])->result_array();
        //     $this->load->view('input/table', $data);
        // } else {
        //     $data['input'] = $this->db->get('input')->result_array();
        //     $this->load->view('input/table', $data);
        // }
        // $this->load->view('templates/footer');
    }

    public function update()
    {
        $data = [
            'status' => $this->input->post('status'),
            'teknisi1' => $this->input->post('teknisi1'),
            'teknisi2' => $this->input->post('teknisi2'),
            'helpdesk' => $this->input->post('hd'),
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

        // $this->db->query('UPDATE input SET durasi = timediff(tgl_update, tgl_input) WHERE status = \'CLOSE\'');

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
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['input'] = $this->db->get('input')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('input/grafik', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tech()
    {
        $data['title'] = 'Report Technician';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('input/tech', $data);
        $this->load->view('templates/footer');
    }
}
