<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rating extends CI_Controller
{
    public function index($token)
    {
        $data['token'] = $token;
        $this->load->view('rating/rating', $data);
    }
}
