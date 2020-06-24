<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rating extends CI_Controller
{
    public function index($token)
    {
        $data['token'] = $token;

        $result = $this->db->get_where('penilaian', ['token' => $token])->row_array();

        if ($result > 0) {
            if ($result['rate'] != 0) {
                redirect('rating/terimakasih');
            } else {
                $this->load->view('rating/rating', $data);
            }
        } else {
            $this->load->view('rating/unvalid');
        }
    }

    public function update()
    {
        $rate = $this->input->post('rate');
        $keterangan = $this->input->post('ket');
        $token = $this->input->post('token');
        $data = [
            'rate' => $rate,
            'keterangan' => $keterangan
        ];
        $this->db->set($data);
        $this->db->where('token', $token);
        $this->db->update('penilaian');
        redirect('rating/terimakasih');
    }

    public function terimakasih()
    {
        $this->load->view('rating/terimakasih');
    }
}
