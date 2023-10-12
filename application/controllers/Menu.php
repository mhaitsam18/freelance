<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function index()
    {
        $data['tittle'] = 'Menu Management';
        $data['url'] = 'Selamat Datang di Dashboard ';
        $data['is_active'] = 'Selamat Datang di Dashboard ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('template_admin/header_dashboard_admin', $data);
        $this->load->view('template_admin/sidebar_dashboard_admin', $data);
        $this->load->view('template_admin/topbar_dashboard_admin', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('template_freelance/footer_dashboard_freelance', $data);
    }


    public function tambahmenu()
    {
        $data['tittle'] = 'Menu Management';
        $data['judul'] = 'Selamat Datang di Dashboard ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template_admin/header_dashboard_admin', $data);
            $this->load->view('template_admin/sidebar_dashboard_admin', $data);
            $this->load->view('template_admin/topbar_dashboard_admin', $data);
            $this->load->view('menu/coba', $data);
            $this->load->view('template_freelance/footer_dashboard_freelance', $data);
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Menu Baru sudah ditambahkan </div>');
            redirect('Menu');
        }


    }

    public function submenu()
    {
        $data['tittle'] = 'SubMenu Management';
        $data['judul'] = 'Selamat Datang di Dashboard ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');
        // $data['subMenu'] = $this->db->get('user_sub_menu')->result_array();
        $data['subMenu'] = $this->menu->getSubMenu();

        $this->load->view('template_admin/header_dashboard_admin', $data);
        $this->load->view('template_admin/sidebar_dashboard_admin', $data);
        $this->load->view('template_admin/topbar_dashboard_admin', $data);
        $this->load->view('menu/submenu', $data);
        $this->load->view('template_freelance/footer_dashboard_freelance', $data);
    }

    public function tambahsubmenu()
    {

        $data['tittle'] = 'Tambah SubMenu Management';
        $data['judul'] = 'Selamat Datang di Dashboard ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');
        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('url', 'url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template_admin/header_dashboard_admin', $data);
            $this->load->view('template_admin/sidebar_dashboard_admin', $data);
            $this->load->view('template_admin/topbar_dashboard_admin', $data);
            $this->load->view('menu/tambahsubmenu', $data);
            $this->load->view('template_freelance/footer_dashboard_freelance', $data);
        } else {

            $data = [
                'menu_id' => htmlspecialchars($this->input->post('menu_id', true)),
                'judul' => htmlspecialchars($this->input->post('judul', true)),
                'url' => htmlspecialchars($this->input->post('url', true)),
                'icon' => htmlspecialchars($this->input->post(',icon', true)),
                'is_active' => htmlspecialchars($this->input->post('is_active', true))
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            SubMenu Baru sudah ditambahkan </div>');
            redirect('Menu/submenu');
            $this->db->insert('user_sub_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Menu Baru sudah ditambahkan </div>');
            redirect('Menu');
        }
    }
}



