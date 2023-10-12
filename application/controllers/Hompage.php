<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{
    public function index()
    {
        
        date_default_timezone_set('Asia/Jakarta');
        $data['tittle'] = 'Beranda JobAgency';
        $data['judul'] = 'Selamat Datang di Dashboard Freelance ';
        // $data['user'] = $this->db->get_where('user', ['email' =>
        // $this->session->userdata('email')])->row_array();
        // echo 'Selamat Datang di Halaman Selanjutnya ' . $data['user']['username'];
        $this->load->view('homepage/beranda', $data);
    }
}
