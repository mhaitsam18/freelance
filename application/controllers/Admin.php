<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        is_logged_in();
    }
    public function index()
    {
        $data['tittle'] = 'Dashboard Admin';
        $data['judul'] = 'Selamat Datang di Dashboard ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        // echo 'Selamat Datang di Halaman Selanjutnya ' . $data['user']['username'];
        $this->load->view('template_admin/header_dashboard_admin', $data);
        $this->load->view('template_admin/sidebar_dashboard_admin', $data);
        $this->load->view('template_admin/topbar_dashboard_admin', $data);
        $this->load->view('admin/dashboard_admin', $data);
        $this->load->view('template_freelance/footer_dashboard_freelance', $data);
    }
    public function perusahaan()
    {
        $data['tittle'] = 'Data Perusahaan';
        $data['judul'] = 'Selamat Datang di Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->order_by('is_valid', 'ASC');
        $data['perusahaan'] = $this->db->get('perusahaan')->result_array();
        $data['perusahaan_1'] = $this->db->get_where('perusahaan', ['is_valid' => 1])->result_array();
        $data['perusahaan_0'] = $this->db->get_where('perusahaan', ['is_valid' => 0])->result_array();
        
        $data['perusahaan_total'] = $this->db->get('perusahaan')->num_rows();
        $data['perusahaan_unconfirmed'] = $this->db->get_where('perusahaan', ['is_valid' => 0])->num_rows();
        $data['perusahaan_valid'] = $this->db->get_where('perusahaan', ['is_valid' => 1])->num_rows();
        $data['perusahaan_invalid'] = $this->db->get_where('perusahaan', ['is_valid' => 2])->num_rows();
        // echo 'Selamat Datang di Halaman Selanjutnya ' . $data['user']['username'];
        
        $this->load->view('template_admin/header_dashboard_admin', $data);
        $this->load->view('template_admin/sidebar_dashboard_admin', $data);
        $this->load->view('template_admin/topbar_dashboard_admin', $data);
        $this->load->view('admin/data-perusahaan', $data);
        $this->load->view('template_freelance/footer_dashboard_freelance', $data);
    }

    public function inputCatatan()
    {
        $this->db->where('id_profil', $this->input->post('id_profil'));
        $this->db->update('perusahaan', ['catatan' => $this->input->post('catatan')]);
        $this->session->set_flashdata('flash', 'Catatan telah disubmit');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Catatan Telah disubmit!</div>');
        redirect('Admin/perusahaan');
    }

    public function freelance()
    {
        $data['tittle'] = 'Data Freelance';
        $data['judul'] = 'Selamat Datang di Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->join('user', 'cv.id_user = user.id');
        $data['freelance'] = $this->db->get('cv')->result_array();
        // echo 'Selamat Datang di Halaman Selanjutnya ' . $data['user']['username'];
        
        $this->load->view('template_admin/header_dashboard_admin', $data);
        $this->load->view('template_admin/sidebar_dashboard_admin', $data);
        $this->load->view('template_admin/topbar_dashboard_admin', $data);
        $this->load->view('admin/data-freelance', $data);
        $this->load->view('template_freelance/footer_dashboard_freelance', $data);
    }

    public function lihat_cv($id_user)
    {
        $data['tittle'] = 'Dashboard CV Freelance';
        $data['judul'] = 'Selamat Datang di Dashboard Freelance ';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user_pengirim'] = $this->db->get_where('user', ['id' => $id_user])->row_array();
        $this->db->join('agama', 'agama.id_agama = cv.id_agama');
        $this->db->join('kota', 'kota.id_kota = cv.id_kota');
        $this->db->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi');
        $data['cv'] = $this->db->get_where('cv', ['id_user' => $id_user])->row_array();
        $this->db->order_by('tahun', 'ASC');
        $data['portof'] = $this->db->get_where('portofolio', ['id_user' => $id_user])->result_array();

        $this->load->view('template_admin/header_dashboard_admin', $data);
        $this->load->view('template_admin/sidebar_dashboard_admin', $data);
        $this->load->view('template_admin/topbar_dashboard_admin', $data);
        $this->load->view('admin/cv', $data);
        $this->load->view('template_freelance/footer_dashboard_freelance', $data);
    }

    public function ubah_status_freelance($id_user = null, $is_active = null)
    {
        $this->db->where('id', $id_user);
        $this->db->update('user', ['is_active' => $is_active]);
        if ($is_active == 1) {
            $this->session->set_flashdata('flash', 'Akun berhasil diaktivasi');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun FreelanceBerhasil diaktivasi!</div>');
        } elseif ($is_active == 2) {
            $this->session->set_flashdata('flash', 'Akun berhasil diblokir');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun Freelance Berhasil diblokir!</div>');
        } elseif ($is_active == 0) {
            $this->session->set_flashdata('flash', 'Akun berhasil dinonaktifkan');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun Freelance Berhasil dinonaktifkan!</div>');
        }
        redirect('Admin/freelance');

    }

    public function validasiPerusahaan($id_perusahaan = null, $is_valid = null)
    {
        $this->db->where('id_profil', $id_perusahaan);
        $this->db->update('perusahaan', ['is_valid' => $is_valid]);
        if ($is_valid == 1) {
            $this->session->set_flashdata('flash', 'dinyatakan Valid');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Perusahaan dinyatakan Valid!</div>');
        } else{
            $this->session->set_flashdata('flash', 'dinyatakan Tidak Valid');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Perusahaan dinyatakan Tidak Valid!</div>');
        }
        redirect('Admin/perusahaan');
    }

    public function role()
    {
        $data['tittle'] = 'Dashboard Admin';
        $data['judul'] = 'Selamat Datang di Dashboard ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        // echo 'Selamat Datang di Halaman Selanjutnya ' . $data['user']['username'];
        $this->load->view('template_admin/header_dashboard_admin', $data);
        $this->load->view('template_admin/sidebar_dashboard_admin', $data);
        $this->load->view('template_admin/topbar_dashboard_admin', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('template_freelance/footer_dashboard_freelance', $data);
    }
    public function tambahrole()
    {
        $data['tittle'] = 'Dashboard Admin';
        $data['judul'] = 'Selamat Datang di Dashboard ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('template_admin/header_dashboard_admin', $data);
        $this->load->view('template_admin/sidebar_dashboard_admin', $data);
        $this->load->view('template_admin/topbar_dashboard_admin', $data);
        $this->load->view('admin/tambahrole', $data);
        $this->load->view('template_freelance/footer_dashboard_freelance', $data);
    }
    public function roleaccess($role_id)
    {
        $data['tittle'] = 'Dashboard Admin';
        $data['judul'] = 'Selamat Datang di Dashboard ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['role_id' => $role_id])->row_array();

        $this->db->where('menu_id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('template_admin/header_dashboard_admin', $data);
        $this->load->view('template_admin/sidebar_dashboard_admin', $data);
        $this->load->view('template_admin/topbar_dashboard_admin', $data);
        $this->load->view('admin/role_access', $data);
        $this->load->view('template_freelance/footer_dashboard_freelance', $data);
    }


    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];
        $result = $this->db->get_where('user_acces_menu', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_acces_menu', $data);
        } else {
            $this->db->delete('user_acces_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Akses sudah diubah
                    </div>');
    }
    public function editprofil()
    {
        $data['tittle'] = 'Edit Profil';
        $data['judul'] = 'Selamat Datang di Edit Profil ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]');
        // echo 'Selamat Datang di Halaman Selanjutnya ' . $data['user']['username'];
        if ($this->form_validation->run() == false) {
            $this->load->view('template_admin/header_dashboard_admin', $data);
            $this->load->view('template_admin/sidebar_dashboard_admin', $data);
            $this->load->view('template_admin/topbar_dashboard_admin', $data);
            $this->load->view('admin/editprofil', $data);
            $this->load->view('template_freelance/footer_dashboard_freelance', $data);
        } else {
            $username = $this->input->post('username');
            $email = $this->input->post('email');

            // cek jika ada gambar yang akan diupload

            $upload_image = $_FILES['image'];
            // var_dump($upload_image);
            // die;
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '5000';
                $config['upload_path'] = './assets/img/profil/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            // var_dump($upload_image);
            // die;
            $this->db->set('username', $username);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data anda sudah diubah
            </div>');
            redirect('Admin');
        }
    }
    public function editpass()
    {
        $data['tittle'] = 'Edit Password';
        $data['judul'] = 'Selamat Datang di Dashboard ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        // echo 'Selamat Datang di Halaman Selanjutnya ' . $data['user']['username'];

        $this->form_validation->set_rules('current_password', 'Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'Password', 'required|trim|min_length[4]|matches[new_password2]|');
        $this->form_validation->set_rules('new_password2', 'Password', 'required|trim|min_length[4]|matches[new_password1]|');

        if ($this->form_validation->run() == false) {
            $this->load->view('template_admin/header_dashboard_admin', $data);
            $this->load->view('template_admin/sidebar_dashboard_admin', $data);
            $this->load->view('template_admin/topbar_dashboard_admin', $data);
            $this->load->view('admin/editpass', $data);
            $this->load->view('template_freelance/footer_dashboard_freelance', $data);
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah</div>');
                redirect('Admin/editpass');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Tidak Boleh Sama</div>');
                    redirect('Admin/editpass');
                } else {
                    // password sudah Ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password diubah</div>');
                    redirect('Admin/editpass');
                }
            }
        }
    }
    public function carilowongan()
    {
        $data['tittle'] = 'Cari Lowongan';
        $data['judul'] = 'Selamat Datang di Dashboard ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        // echo 'Selamat Datang di Halaman Selanjutnya ' . $data['user']['username'];
        $this->load->view('template_admin/header_dashboard_admin', $data);
        $this->load->view('template_admin/sidebar_dashboard_admin', $data);
        $this->load->view('template_admin/topbar_dashboard_admin', $data);
        $this->load->view('admin/carilowongan', $data);
        $this->load->view('template_freelance/footer_dashboard_freelance', $data);
    }
}
