<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access has changed!</div>');
    }

    public function teknisi()
    {
        $data['title'] = 'Teknisi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['teknisi'] = $this->db->get('teknisi')->result_array();

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('nik', 'Nik', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/teknisi', $data);
            $this->load->view('templates/footer');
        } else {
            $teknisi = [
                'nama' => $this->input->post('name'),
                'nik' => $this->input->post('nik')
            ];
            $this->db->insert('teknisi', $teknisi);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Teknisi berhasil ditambah!</div>');
            redirect('admin/teknisi');
        }
    }

    public function hapusTeknisi($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('teknisi');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Dihapus</div>');
        redirect('admin/teknisi');
    }

    public function subSegmentasi()
    {
        $data['title'] = 'Sub Segmentasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['perbaikan'] = $this->db->get('perbaikan')->result_array();

        $this->form_validation->set_rules('subsegmen', 'Subsegmentasi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/subsegmentasi', $data);
            $this->load->view('templates/footer');
        } else {
            $subsegmen = ['subsegmen' => $this->input->post('subsegmen')];
            $this->db->insert('perbaikan', $subsegmen);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub Segmentasi berhasil ditambah!</div>');
            redirect('admin/subsegmentasi');
        }
    }

    public function hapusSubsegmentasi($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('perbaikan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Dihapus</div>');
        redirect('admin/subsegmentasi');
    }

    public function registrasi()
    {
        $data['title'] = 'Registrasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['regis'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('nik', 'Nik', 'required|is_unique[user.email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password is too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/registrasi', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('nik', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => $this->input->post('status'),
                'date_created' => time()
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Helpdesk Terdaftar</div>');
            redirect('admin/registrasi');
        }
    }

    public function hapusHelpdesk($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Dihapus</div>');
        redirect('admin/registrasi');
    }

    public function updateUser()
    {
        $data = [
            'name' => $this->input->post('name'),
            'is_active' => $this->input->post('status'),
            'role_id' => $this->input->post('role')
        ];
        $this->db->set($data);
        $this->db->where('email', $this->input->post('nik'));
        $this->db->update('user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data di update!</div>');
        redirect('admin/registrasi');
    }
}
