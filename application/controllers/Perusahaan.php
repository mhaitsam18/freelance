<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perusahaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        is_logged_in();
    }

    public function index()
    {
        $data['tittle'] = 'Dashboard Perusahaan';
        $data['judul'] = 'Selamat Datang di Dashboard Perusahaan ';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
        // echo 'Selamat Datang di Halaman Selanjutnya ' . $data['user']['username'];


        $id_user = $this->session->userdata('id');

        $perusahaan = $this->db->get_where('perusahaan', ['id_user' => $this->session->userdata('id')])->row_array();
        $where = array('lowongan.id_perusahaan' => $perusahaan['id_profil']);
        $this->db->join('kategori', 'lowongan.id_lowongan = kategori.id_lowongan');
        $this->db->join('jenis_pekerjaan', 'kategori.id_jenis_pekerjaan = jenis_pekerjaan.id_jenis_pekerjaan');
        $this->db->join('pendidikan', 'kategori.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('pengalaman', 'kategori.id_pengalaman = pengalaman.id_pengalaman');
        $this->db->join('kota', 'kategori.id_kota = kota.id_kota');
        $data['lowongan'] = $this->db->get_where('lowongan', $where)->result();

        $where1 = array('id' => $id_user);
        $data['b'] = $this->Menu_model->getWhere($where1, 'user')->result();

        $this->load->view('template_perusahaan/header_dashboard_perusahaan', $data);
        $this->load->view('template_perusahaan/sidebar_dashboard_perusahaan', $data);
        $this->load->view('template_perusahaan/topbar_dashboard_perusahaan', $data);
        $this->load->view('perusahaan/dashboard_perusahaan', $data);
        $this->load->view('template_perusahaan/footer_dashboard_perusahaan', $data);
    }

    public function Input_lowongan()
    {
        // $data['tittle'] = 'Dashboard Perusahaan';
        // $data['judul'] = 'Selamat Datang di Dashboard Perusahaan ';
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $perusahaan = $this->db->get_where('perusahaan', ['id_user' => $user['id']])->row_array();
        $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
        $this->form_validation->set_rules('batas_tgl', 'Batas Tanggal', 'trim|required');
        if ($this->form_validation->run() ==  false) {
            $this->Buat_lowongan();
        } else {
            $data1 = array(
                'id_lowongan' => '',
                'id_perusahaan' => $perusahaan['id_profil'],
                'judul' => $this->input->post('judul'),
                'max_calon_pegawai' => $this->input->post('max_calon_pegawai'),
                // 'lokasi' => $this->input->post('lokasi'),
                'gaji_minimal' => $this->input->post('gaji_minimal'),
                'gaji_maksimal' => $this->input->post('gaji_maksimal'),
                'deskripsi' => $this->input->post('deskripsi'),
                // 'persyaratan' => $this->input->post('persyaratan'),
                'tgl_buat' => date('Y-m-d'),
                'batas_tgl' => $this->input->post('batas_tgl')
            );
            $this->db->insert('lowongan', $data1);
            $id_lowongan = $this->db->insert_id();

            $this->db->insert('kategori', [
                'id_lowongan' => $id_lowongan,
                'id_jenis_pekerjaan' => $this->input->post('id_jenis_pekerjaan'),
                'id_pendidikan' => $this->input->post('id_pendidikan'),
                'id_pengalaman' => $this->input->post('id_pengalaman'),
                'id_kota' => $this->input->post('id_kota')
            ]);
            $id_kategori = $this->db->insert_id();
            foreach ($this->input->post('keahlian') as $key => $value) {
                $this->db->insert('kategori_keahlian', [
                    'id_kategori' => $id_kategori,
                    'id_keahlian' => $value
                ]);
            }
            // $this->Menu_model->insert($data1,'lowongan');
            $this->session->set_flashdata('flash', 'Berhasil ditambahkan');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data Lowongan Berhasil diinput!
                </div>');

            redirect('Perusahaan/index');
        }
    }

    public function Input_profil()
    {
        $data['tittle'] = 'Dashboard Perusahaan';
        $data['judul'] = 'Selamat Datang di Dashboard Perusahaan ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $username = $this->input->post('username');
        $nama_perusahaan = $this->input->post('nama_perusahaan');
        $email = $this->input->post('email');
        $deskripsi = $this->input->post('deskripsi');
        $notlp = $this->input->post('notlp');
        $akta = $this->input->post('akta');
        $npwp = $this->input->post('npwp');
        $siup = $this->input->post('siup');

        $id = $this->session->userdata('id');
        $role_id = $this->session->userdata('role_id');

        $data1 = array(
            'id_profil' => '',
            'id' => $id,
            'role_id' => $role_id,
            'nama_perusahaan' => $nama_perusahaan,
            'email' => $email,
            'no_tlp' => $notlp,
            'deskripsi_perusahaan' => $deskripsi,
            'akta_pendirian_usaha' => $akta,
            'npwp' => $npwp,
            'surat_izin_usaha_perdagangan' => $siup
        );
        $this->Menu_model->insert($data1, 'perusahaan');
        $this->session->set_flashdata('pin', 'benar');
        redirect('Perusahaan/Lihat_profile');
    }

    public function Penerimaan_pelamar($id)
    {
        $data['tittle'] = 'Dashboard Perusahaan';
        $data['judul'] = 'Selamat Datang di Dashboard Perusahaan ';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->join('cv', 'user.id=cv.id_user');
        $data['data_user'] = $this->db->get_where('user')->result();

        $where = array(
            'lowongan.id_lowongan' => $id
        );

        $data['lowongan_id'] = $id;
        $this->db->join('kategori', 'lowongan.id_lowongan = kategori.id_lowongan');
        $this->db->join('jenis_pekerjaan', 'kategori.id_jenis_pekerjaan = jenis_pekerjaan.id_jenis_pekerjaan');
        $this->db->join('pendidikan', 'kategori.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('pengalaman', 'kategori.id_pengalaman = pengalaman.id_pengalaman');
        $this->db->join('kota', 'kategori.id_kota = kota.id_kota');
        $data['lowongan'] = $this->db->get_where('lowongan', $where)->row();

        $data['permintaan_lowongan'] = $this->Menu_model->getPermintaanLowonganById($id)->result();
        $data['rekruitasi'] = $this->Menu_model->getRekruitasiByIdLowongan($id)->result();


        $this->load->view('template_perusahaan/header_dashboard_perusahaan', $data);
        $this->load->view('template_perusahaan/sidebar_dashboard_perusahaan', $data);
        $this->load->view('template_perusahaan/topbar_dashboard_perusahaan', $data);
        $this->load->view('perusahaan/P_pelamar', $data);
        $this->load->view('template_perusahaan/footer_dashboard_perusahaan', $data);
    }

    public function export_pelamar($id)
    {
        $data['tittle'] = 'Dashboard Perusahaan';
        $data['judul'] = 'Selamat Datang di Dashboard Perusahaan ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $where = array(
            'lowongan.id_lowongan' => $id
        );
        $this->db->join('kategori', 'lowongan.id_lowongan = kategori.id_lowongan');
        $this->db->join('jenis_pekerjaan', 'kategori.id_jenis_pekerjaan = jenis_pekerjaan.id_jenis_pekerjaan');
        $this->db->join('pendidikan', 'kategori.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('pengalaman', 'kategori.id_pengalaman = pengalaman.id_pengalaman');
        $this->db->join('kota', 'kategori.id_kota = kota.id_kota');
        $data['lowongan'] = $this->db->get_where('lowongan', $where)->result();

        $data['permintaan_lowongan'] = $this->Menu_model->getPermintaanLowonganById($id)->result();
        $this->load->view('perusahaan/export_pelamar', $data);
    }

    public function export_pelamar2($id)
    {
        $data['tittle'] = 'Dashboard Perusahaan';
        $data['judul'] = 'Selamat Datang di Dashboard Perusahaan ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $where = array(
            'lowongan.id_lowongan' => $id
        );
        $this->db->join('kategori', 'lowongan.id_lowongan = kategori.id_lowongan');
        $this->db->join('jenis_pekerjaan', 'kategori.id_jenis_pekerjaan = jenis_pekerjaan.id_jenis_pekerjaan');
        $this->db->join('pendidikan', 'kategori.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('pengalaman', 'kategori.id_pengalaman = pengalaman.id_pengalaman');
        $this->db->join('kota', 'kategori.id_kota = kota.id_kota');
        $data['lowongan'] = $this->db->get_where('lowongan', $where)->result();

        $data['permintaan_lowongan'] = $this->Menu_model->getPermintaanLowonganById($id)->result();
        $this->load->view('perusahaan/export_pelamar2', $data);
    }

    public function lihatCV($id_user)
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

        $this->load->view('template_perusahaan/header_dashboard_perusahaan', $data);
        $this->load->view('template_perusahaan/sidebar_dashboard_perusahaan', $data);
        $this->load->view('template_perusahaan/topbar_dashboard_perusahaan', $data);
        $this->load->view('perusahaan/profil_freelance', $data);
        $this->load->view('template_perusahaan/footer_dashboard_perusahaan', $data);
    }

    public function print_cv($id_user)
    {
        $data['tittle'] = 'Dashboard CV Freelance';
        $data['judul'] = 'Selamat Datang di Dashboard Freelance ';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user_pengirim'] = $this->db->get_where('user', ['id' => $id_user])->row_array();
        $this->db->join('kota', 'kota.id_kota = cv.id_kota');
        $this->db->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi');
        $this->db->join('agama', 'agama.id_agama = cv.id_agama');
        $data['cv'] = $this->db->get_where('cv', ['id_user' => $data['user_pengirim']['id']])->row_array();
        $this->db->order_by('tahun', 'ASC');
        $data['portof'] = $this->db->get_where('portofolio', ['id_user' => $data['user_pengirim']['id']])->result_array();
        $this->load->view('template_perusahaan/header_dashboard_perusahaan', $data);
        $this->load->view('perusahaan/print_cv', $data);
    }




    public function Buat_lowongan()
    {
        $data['tittle'] = 'Dashboard Perusahaan';
        $data['judul'] = 'Selamat Datang di Dashboard Perusahaan ';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['keahlian'] = $this->db->get('keahlian')->result();
        $data['jenis_pekerjaan'] = $this->db->get('jenis_pekerjaan')->result();
        $data['pendidikan'] = $this->db->get('pendidikan')->result();
        $data['pengalaman'] = $this->db->get('pengalaman')->result();
        $data['provinsi'] = $this->db->get('provinsi')->result();

        $this->load->view('template_perusahaan/header_dashboard_perusahaan', $data);
        $this->load->view('template_perusahaan/sidebar_dashboard_perusahaan', $data);
        $this->load->view('template_perusahaan/topbar_dashboard_perusahaan', $data);
        $this->load->view('perusahaan/B_lowongan', $data);
        $this->load->view('template_perusahaan/footer_dashboard_perusahaan', $data);
    }

    public function cariKota($id_provinsi)
    {
        $data['kota'] = $this->db->get_where('kota', ['id_provinsi' => $id_provinsi])->result();
        $this->load->view('perusahaan/select-kota', $data);
    }

    public function Rincian_lowongan($id)
    {
        $data['tittle'] = 'Dashboard Perusahaan';
        $data['judul'] = 'Selamat Datang di Dashboard Perusahaan ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $id_user = $this->session->userdata('id');

        $perusahaan = $this->db->get_where('perusahaan', ['id_user' => $this->session->userdata('id')])->row_array();

        $where = array('lowongan.id_perusahaan' => $perusahaan['id_profil']);
        $this->db->join('kategori', 'lowongan.id_lowongan = kategori.id_lowongan');
        $this->db->join('jenis_pekerjaan', 'kategori.id_jenis_pekerjaan = jenis_pekerjaan.id_jenis_pekerjaan');
        $this->db->join('pendidikan', 'kategori.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('pengalaman', 'kategori.id_pengalaman = pengalaman.id_pengalaman');
        $this->db->join('kota', 'kategori.id_kota = kota.id_kota');
        $data['lowongan'] = $this->Menu_model->getWhere($where, 'lowongan')->result();

        $where = array('lowongan.id_lowongan' => $id);
        $this->db->join('kategori', 'lowongan.id_lowongan = kategori.id_lowongan');
        $this->db->join('jenis_pekerjaan', 'kategori.id_jenis_pekerjaan = jenis_pekerjaan.id_jenis_pekerjaan');
        $this->db->join('pendidikan', 'kategori.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('pengalaman', 'kategori.id_pengalaman = pengalaman.id_pengalaman');
        $this->db->join('kota', 'kategori.id_kota = kota.id_kota');
        $data['cur_lowongan'] = $this->Menu_model->getWhere($where, 'lowongan')->row();

        $this->db->join('user', 'user.id = komentar_lowongan.id_user');
        $data['komentar_lowongan'] = $this->db->get_where('komentar_lowongan', ['id_lowongan' => $id])->result();

        $this->load->view('template_perusahaan/header_dashboard_perusahaan', $data);
        $this->load->view('template_perusahaan/sidebar_dashboard_perusahaan', $data);
        $this->load->view('template_perusahaan/topbar_dashboard_perusahaan', $data);
        $this->load->view('perusahaan/dashboard_perusahaan_2', $data);
        $this->load->view('template_perusahaan/footer_dashboard_perusahaan', $data);
    }

    public function kirimKomentar()
    {
        $this->form_validation->set_rules('komentar', 'Komentar', 'trim|required');
        $this->form_validation->set_rules('id_user', 'User ID', 'trim|required');
        $this->form_validation->set_rules('id_lowongan', 'Lowongan ID', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->rincian_lowongan($this->input->post('id_lowongan'));
        } else{
            $this->db->insert('komentar_lowongan', [
                'id_lowongan' => $this->input->post('id_lowongan'),
                'id_user' => $this->input->post('id_user'),
                'komentar' => $this->input->post('komentar'),
                'aktif' => 1
            ]);
            $this->session->set_flashdata('flash', 'Komentar Terkirim');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Komentar Terkirim!
                </div>');
            redirect('Perusahaan/Rincian_lowongan/'.$this->input->post('id_lowongan'));
        }
    }

    public function hapusKomentar($id_komentar = null)
    {
        $this->db->delete('komentar_lowongan', ['id_komentar' => $id_komentar]);
        $this->session->set_flashdata('flash', 'Komentar dihapus');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Komentar dihapus!
            </div>');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function Rincian_lowongan_2($id)
    {
        $data['tittle'] = 'Dashboard Perusahaan';
        $data['judul'] = 'Selamat Datang di Dashboard Perusahaan ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $id_user = $this->session->userdata('id');

        $perusahaan = $this->db->get_where('perusahaan', ['id_user' => $this->session->userdata('id')])->row_array();
        $where = array('lowongan.id_perusahaan' => $perusahaan['id_profil']);
        $this->db->join('kategori', 'lowongan.id_lowongan = kategori.id_lowongan');
        $this->db->join('jenis_pekerjaan', 'kategori.id_jenis_pekerjaan = jenis_pekerjaan.id_jenis_pekerjaan');
        $this->db->join('pendidikan', 'kategori.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('pengalaman', 'kategori.id_pengalaman = pengalaman.id_pengalaman');
        $this->db->join('kota', 'kategori.id_kota = kota.id_kota');
        $data['lowongan'] = $this->Menu_model->getWhere($where, 'lowongan')->result();

        $where = array('lowongan.id_lowongan' => $id);
        $this->db->join('kategori', 'lowongan.id_lowongan = kategori.id_lowongan');
        $this->db->join('jenis_pekerjaan', 'kategori.id_jenis_pekerjaan = jenis_pekerjaan.id_jenis_pekerjaan');
        $this->db->join('pendidikan', 'kategori.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('pengalaman', 'kategori.id_pengalaman = pengalaman.id_pengalaman');
        $this->db->join('kota', 'kategori.id_kota = kota.id_kota');
        $data['cur_lowongan'] = $this->Menu_model->getWhere($where, 'lowongan')->row();

        $this->load->view('template_perusahaan/header_dashboard_perusahaan', $data);
        $this->load->view('template_perusahaan/sidebar_dashboard_perusahaan', $data);
        $this->load->view('template_perusahaan/topbar_dashboard_perusahaan', $data);
        $this->load->view('perusahaan/Penerimaan_pelamar_2', $data);
        $this->load->view('template_perusahaan/footer_dashboard_perusahaan', $data);
    }

    public function cek_pin($pin = null)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $where = array('id_user' => $data['user']['id']);
        $perusahaan = $this->Menu_model->getWhere($where, 'perusahaan')->row();

        if (md5($pin) == $perusahaan->pin) {
            $this->session->set_flashdata('pin', 'benar');
            redirect('Perusahaan/lihat_profile');
        } elseif ($perusahaan->pin == '') {
            $this->session->set_flashdata('pin', 'benar');
            redirect('Perusahaan/lihat_profile');
        } else{
            $this->session->set_flashdata('pin', 'salah');
            redirect($_SERVER['HTTP_REFERER']);
        }
        
    }
    public function lihat_profile()
    {
        $data['tittle'] = 'Dashboard Perusahaan';
        $data['judul'] = 'Selamat Datang di Dashboard Perusahaan ';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $where = array('id_user' => $data['user']['id']);
        $data['perusahaan'] = $this->Menu_model->getWhere($where, 'perusahaan')->row();

        if ($this->session->flashdata('pin') == true || $data['perusahaan']->pin == '') {
            $this->load->view('template_perusahaan/header_dashboard_perusahaan', $data);
            $this->load->view('template_perusahaan/sidebar_dashboard_perusahaan', $data);
            $this->load->view('template_perusahaan/topbar_dashboard_perusahaan', $data);
            $this->load->view('perusahaan/T_profile', $data);
            // $this->load->view('perusahaan/Profile', $data);
            $this->load->view('template_perusahaan/footer_dashboard_perusahaan', $data);
        } else{
            $this->session->set_flashdata('sesi', 'habis');
            redirect('Perusahaan');
        }
    }

    public function insertPin()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if (password_verify($this->input->post('password'), $user['password'])) {
            $this->db->where('id_profil', $this->input->post('id_perusahaan'));
            $this->db->update('perusahaan', ['pin' => md5($this->input->post('pin'))]);

            $this->session->set_flashdata('flash', 'Pin Berhasil diubah');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                PIN Berhasil diubah!
                </div>');
            $this->session->set_flashdata('pin', 'benar');
            redirect('Perusahaan/lihat_profile');
        } else {
            // $this->session->set_flashdata('flash', 'Pin Berhasil diubah');
            $this->session->set_flashdata('pin', 'benar');
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password yang anda masukkan Salah!
                </div>');
            redirect('Perusahaan/lihat_profile');
        }
    }

    public function update_profil()
    {
        $perusahaan = $this->db->get_where('perusahaan', ['id_profil' => $this->input->post('id_profil')])->row();
        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'trim|required');
        $this->form_validation->set_rules('email_perusahaan', 'Email Perusahaan', 'trim|required');
        $this->form_validation->set_rules('no_tlp', 'Nomor Telepon', 'trim|required|numeric', [
            'numeric' => 'Nomor Telpon harus berupa Angka'
        ]);
        $this->form_validation->set_rules('deskripsi_perusahaan', 'Deskripsi Perusahaan', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('pin', 'benar');
            $this->lihat_profile();
        } else {
            // if (md5($this->input->post('pin_validasi')) == $perusahaan->pin) {
                $data = [
                    'nama_perusahaan' => htmlspecialchars($this->input->post('nama_perusahaan'), true),
                    'email_perusahaan' => $this->input->post('email_perusahaan'),
                    'no_tlp' => $this->input->post('no_tlp'),
                    'deskripsi_perusahaan' => $this->input->post('deskripsi_perusahaan'),
                    'is_valid' => 0
                ];

                $this->db->where('id_profil', $this->input->post('id_profil'));
                $this->db->update('perusahaan', $data);
                $this->session->set_flashdata('flash', 'Berhasil diubah');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Profil Perusahaan Berhasil diubah!
                    </div>');
                $this->session->set_flashdata('pin', 'benar');
                redirect('Perusahaan/lihat_profile');
            // } else {
            //     $this->session->set_flashdata('gagal_pin', 'Gagal');
            //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            //         Pin yang Anda Masukkan Salah!
            //         </div>');
            //     $this->session->set_flashdata('pin', 'benar');
            //     redirect('Perusahaan/lihat_profile');
            // }
        }
    }

    public function set_gambar()
    {
        $perusahaan = $this->db->get_where('perusahaan', ['id_profil' => $this->input->post('id_profil')])->row_array();
        if ($this->input->post('submit_akte_pendirian_usaha')) {
            $config['allowed_types'] = 'pdf';
            $config['upload_path'] = './assets/img/profil/';
            $config['max_size']     = '50000000';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('akte_pendirian_usaha')) {
                $old_file = $perusahaan['akte_pendirian_usaha'];
                // if ($old_file != '') {
                //     unlink(FCPATH . 'assets/img/profil/' . $old_file);
                // }
                $new_file = $this->upload->data('file_name');
                $this->db->set('akte_pendirian_usaha', $new_file);
                $this->db->set('is_valid', 0);
                $this->db->where('id_profil', $this->input->post('id_profil'));
                $this->db->update('perusahaan');

                $this->session->set_flashdata('flash', 'Berhasil diunggah');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Upload Berhasil</div>');
                $this->session->set_flashdata('pin', 'benar');
                redirect('Perusahaan/lihat_profile/');
            } else {
                $this->session->set_flashdata('flash_error', 'Gagal diunggah');
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');


                $this->session->set_flashdata('pin', 'benar');
                redirect('Perusahaan/lihat_profile/');
            }
        } elseif ($this->input->post('submit_npwp')) {
            $config['allowed_types'] = 'gif|jpg|png|svg|pdf|jpeg';
            $config['upload_path'] = './assets/img/profil';
            $config['max_size']     = '50000000';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('npwp')) {
                $old_file = $perusahaan['npwp'];
                if ($old_file != '') {
                    unlink(FCPATH . 'assets/img/profil/' . $old_file);
                }
                $new_file = $this->upload->data('file_name');
                $this->db->set('npwp', $new_file);
                $this->db->set('is_valid', 0);
                $this->db->where('id_profil', $this->input->post('id_profil'));
                $this->db->update('perusahaan');

                $this->session->set_flashdata('pin', 'benar');
                redirect('Perusahaan/lihat_profile/');
            } else {
                $this->session->set_flashdata('flash_error', 'Gagal diunggah');
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');

                $this->session->set_flashdata('pin', 'benar');
                redirect('Perusahaan/lihat_profile/');
            }
        } elseif ($this->input->post('submit_surat_izin_usaha_perdagangan')) {
            $config['allowed_types'] = 'gif|jpg|png|svg|pdf|jpeg';
            $config['upload_path'] = './assets/img/profil';
            $config['max_size']     = '50000000';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('surat_izin_usaha_perdagangan')) {
                $old_file = $perusahaan['surat_izin_usaha_perdagangan'];
                if ($old_file != '') {
                    unlink(FCPATH . 'assets/img/profil/' . $old_file);
                }
                $new_file = $this->upload->data('file_name');
                $this->db->set('surat_izin_usaha_perdagangan', $new_file);
                $this->db->set('is_valid', 0);
                $this->db->where('id_profil', $this->input->post('id_profil'));
                $this->db->update('perusahaan');
                $this->session->set_flashdata('pin', 'benar');
                redirect('Perusahaan/lihat_profile/');
            } else {
                $this->session->set_flashdata('flash_error', 'Gagal diunggah');
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                $this->session->set_flashdata('pin', 'benar');
                redirect('Perusahaan/lihat_profile/');
            }
        } else {
            $this->session->set_flashdata('pin', 'benar');
            $this->lihat_profile();
        }
    }
    // public function Edit_profil($id){
    //     $data['tittle'] = 'Dashboard Perusahaan';
    //     $data['judul'] = 'Selamat Datang di Dashboard Perusahaan ';
    //     $data['user'] = $this->db->get_where('user', ['email' =>
    //     $this->session->userdata('email')])->row_array();


    //     $where1 = array('id' => $id);
    //     $data['b']= $this->Menu_model->getWhere($where1,'perusahaan')->result();

    //     $this->load->view('template_perusahaan/header_dashboard_perusahaan', $data);
    //     $this->load->view('template_perusahaan/sidebar_dashboard_perusahaan', $data);
    //     $this->load->view('template_perusahaan/topbar_dashboard_perusahaan', $data);
    //     $this->load->view('perusahaan/E_Profile', $data);
    //     $this->load->view('template_perusahaan/footer_dashboard_perusahaan', $data); 
    // }

    // public function Edit_profil_eksekusi($id2){
    //     $data['tittle'] = 'Dashboard Perusahaan';
    //     $data['judul'] = 'Selamat Datang di Dashboard Perusahaan ';
    //     $data['user'] = $this->db->get_where('user', ['email' =>
    //     $this->session->userdata('email')])->row_array();
    //     $where1 = array('id' => $id2);
    //     $cek = $this->Menu_model->getWhere($where1,'perusahaan')->result();


    //     $username = $this->input->post('username');
    //     $nama_perusahaan = $this->input->post('nama_perusahaan');
    //     $email = $this->input->post('email');
    //     $deskripsi = $this->input->post('deskripsi');
    //     $notlp = $this->input->post('notlp');

    //     $akta = basename($_FILES['akta']['name']);
    //     $npwp = basename($_FILES['npwp']['name']);
    //     $siup = basename($_FILES['siup']['name']);
    //     $akta1 = $akta;
    //     $npwp1 = $npwp;
    //     $siup1 = $siup;
    //     $target_dir = '././assets/img/profil/';
    //     $target_akta = $target_dir . $akta1;
    //     $target_npwp = $target_dir . $npwp1;
    //     $target_siup = $target_dir . $siup1;

    //     foreach ($cek as $key) {
    //         if ($akta == '') {
    //             $akta1 = $key->akta_pendirian_usaha;
    //         }
    //         if ($npwp == '') {
    //             $npwp1 = $key->npwp;
    //         }
    //         if ($siup == '') {
    //             $siup1 = $key->surat_izin_usaha_perdagangan;
    //         }
    //     }
    //     echo move_uploaded_file($_FILES['akta']['tmp_name'], $target_akta);
    //     echo move_uploaded_file($_FILES['npwp']['tmp_name'], $target_npwp);
    //     echo move_uploaded_file($_FILES['siup']['tmp_name'], $target_siup);

    //     $data1 = array(
    //         'nama_perusahaan' => $nama_perusahaan,
    //         'email' => $email,
    //         'no_tlp' => $notlp,
    //         'deskripsi_perusahaan' => $deskripsi,
    //         'akta_pendirian_usaha' => $akta1,
    //         'npwp' => $npwp1,
    //         'surat_izin_usaha_perdagangan' => $siup1
    //     );
    //     $this->Menu_model->Update($where1,$data1,'perusahaan');

    //     $data2 = array(
    //         'email' => $email,
    //     );
    //     $this->Menu_model->Update($where1,$data2,'user');
    //     $this->session->set_flashdata('notif_ganti_profil','Data Perusahaan Berhasil Diubah');
                // $this->session->set_flashdata('pin', 'benar');
    //     redirect('Perusahaan/Lihat_profile');
    // }

    public function Ganti_password()
    {
        $data['tittle'] = 'Dashboard Perusahaan';
        $data['judul'] = 'Selamat Datang di Dashboard Perusahaan ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('template_perusahaan/header_dashboard_perusahaan', $data);
        $this->load->view('template_perusahaan/sidebar_dashboard_perusahaan', $data);
        $this->load->view('template_perusahaan/topbar_dashboard_perusahaan', $data);
        $this->load->view('perusahaan/G_password', $data);
        $this->load->view('template_perusahaan/footer_dashboard_perusahaan', $data);
    }

    public function Ganti_password_eksekusi()
    {
        $data['tittle'] = 'Dashboard Perusahaan';
        $data['judul'] = 'Selamat Datang di Dashboard Perusahaan ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $pass_lama = $this->input->post('pass_lama');
        $pass_baru = $this->input->post('pass_baru');
        $pass_baru_ulang = $this->input->post('pass_baru_ulang');



        $id = $this->session->userdata('id');

        $where = array('id' => $id);
        $cek = $this->Menu_model->getWhere($where, 'user')->result();





        foreach ($cek as $key) {

            if (password_verify($pass_lama, $key->password)) {

                $this->form_validation->set_rules('pass_baru', 'Password', 'required|min_length[4]|matches[pass_baru_ulang]', ['matches' => 'Password Tidak Sama', 'min_length' => 'Password Sedikit Sekali']);
                $this->form_validation->set_rules('pass_baru_ulang', 'Password', 'required|trim|matches[pass_baru]');

                if ($this->form_validation->run() == true) {
                    $baru = password_hash($pass_baru_ulang, PASSWORD_DEFAULT);
                    $data = array('password' => $baru);
                    $this->Menu_model->Update($where, $data, 'user');
                    $this->session->set_flashdata('notif', 'Berhasil dong');
                    $this->session->set_flashdata('pin', 'benar');
                    redirect('Perusahaan/Lihat_profile');
                } else {

                    $this->session->set_flashdata('notif', 'password baru ga sama ih');
                    redirect('Perusahaan/Ganti_password');
                }
            } else {

                $this->session->set_flashdata('notif', 'password lama salah');
                redirect('Perusahaan/Ganti_password');
            }
        }
    }

    public function Edit_lowongan($id_lowongan = null)
    {
        $data['tittle'] = 'Dashboard Perusahaan';
        $data['judul'] = 'Selamat Datang di Dashboard Perusahaan ';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $where = array('lowongan.id_lowongan' => $id_lowongan);
        $this->db->join('kategori', 'lowongan.id_lowongan = kategori.id_lowongan');
        $this->db->join('jenis_pekerjaan', 'kategori.id_jenis_pekerjaan = jenis_pekerjaan.id_jenis_pekerjaan');
        $this->db->join('pendidikan', 'kategori.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('pengalaman', 'kategori.id_pengalaman = pengalaman.id_pengalaman');
        $this->db->join('kota', 'kategori.id_kota = kota.id_kota');
        $this->db->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi');
        $data['lowongan'] = $this->db->get_where('lowongan', $where)->row();

        $data['keahlian'] = $this->db->get('keahlian')->result();
        $data['jenis_pekerjaan'] = $this->db->get('jenis_pekerjaan')->result();
        $data['pendidikan'] = $this->db->get('pendidikan')->result();
        $data['pengalaman'] = $this->db->get('pengalaman')->result();
        $data['provinsi'] = $this->db->get('provinsi')->result();


        $this->load->view('template_perusahaan/header_dashboard_perusahaan', $data);
        $this->load->view('template_perusahaan/sidebar_dashboard_perusahaan', $data);
        $this->load->view('template_perusahaan/topbar_dashboard_perusahaan', $data);
        $this->load->view('perusahaan/E_lowongan', $data);
        $this->load->view('template_perusahaan/footer_dashboard_perusahaan', $data);
    }

    public function Edit_lowongan_eksekusi()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $perusahaan = $this->db->get_where('perusahaan', ['id_user' => $user['id']])->row_array();
        $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
        $this->form_validation->set_rules('batas_tgl', 'Batas Tanggal', 'trim|required');
        if ($this->form_validation->run() ==  false) {
            $this->Edit_lowongan();
        } else {
            $id_lowongan = $this->input->post('id_lowongan');
            $id_kategori = $this->input->post('id_kategori');
            $data1 = array(
                'judul' => $this->input->post('judul'),
                'max_calon_pegawai' => $this->input->post('max_calon_pegawai'),
                'deskripsi' => $this->input->post('deskripsi'),
                'persyaratan' => $this->input->post('persyaratan'),
                'gaji_minimal' => $this->input->post('gaji_minimal'),
                'gaji_maksimal' => $this->input->post('gaji_maksimal'),
                'batas_tgl' => $this->input->post('batas_tgl')
            );
            $this->db->where('id_lowongan', $id_lowongan);
            $this->db->update('lowongan', $data1);

            $this->db->where('id_kategori', $id_kategori);
            $this->db->update('kategori', [
                'id_jenis_pekerjaan' => $this->input->post('id_jenis_pekerjaan'),
                'id_pendidikan' => $this->input->post('id_pendidikan'),
                'id_pengalaman' => $this->input->post('id_pengalaman'),
                'id_kota' => $this->input->post('id_kota')
            ]);
            $this->db->delete('kategori_keahlian', ['id_kategori' => $id_kategori]);

            foreach ($this->input->post('keahlian') as $key => $value) {
                $this->db->insert('kategori_keahlian', [
                    'id_kategori' => $id_kategori,
                    'id_keahlian' => $value
                ]);
            }
            // $this->Menu_model->insert($data1,'lowongan');
            $this->session->set_flashdata('flash', 'Berhasil diperbarui');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data Lowongan Berhasil diperbarui!
                </div>');

            redirect('Perusahaan/Edit_lowongan/' . $id_lowongan);
        }
    }

    public function Terima($id)
    {
        $data['tittle'] = 'Dashboard Perusahaan';
        $data['judul'] = 'Selamat Datang di Dashboard Perusahaan ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $where = array('id_permintaan' => $id);
        $data = array('status' => 'Diterima');
        $this->Menu_model->Update($where, $data, 'permintaan_lowongan');

        $this->db->insert('tracking', [
            'id_permintaan_lowongan' => $id,
            'status' => 'Lamaran diterima',
            'waktu' => date('Y-m-d H:i:s'),
            'keterangan' => 'Silahkan bisa menghubungi Perusahaan(Client) yang bersangkutan'
        ]);
        $cek = $this->Menu_model->getWhere($where, 'permintaan_lowongan')->result();

        foreach ($cek as $v) {
            $id_pengirim = $v->id_user_pengirim;
            $id_lowongan = $v->id_lowongan_pekerjaan;
        }

        $data2 = array(
            'id_calon' => '',
            'id_user_pengirim' => $id_pengirim,
            'id_lowongan_pekerjaan' => $id_lowongan
        );
        $this->Menu_model->insert($data2, 'calon_pegawai');
        redirect('Perusahaan/Penerimaan_pelamar/' . $id_lowongan);
    }

    public function Tolak($id)
    {
        $data['tittle'] = 'Dashboard Perusahaan';
        $data['judul'] = 'Selamat Datang di Dashboard Perusahaan ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $where = array('id_permintaan' => $id);
        $data = array('status' => 'Ditolak');
        $this->db->insert('tracking', [
            'id_permintaan_lowongan' => $id,
            'status' => 'Lamaran ditolak',
            'waktu' => date('Y-m-d H:i:s'),
            'keterangan' => 'Maaf, kami belum dapat menerima Anda dikarenakan sudah penuh'
        ]);
        $cek = $this->Menu_model->getWhere($where, 'permintaan_lowongan')->result();
        foreach ($cek as $key) {
            $id_lowongan = $key->id_lowongan_pekerjaan;
        }

        $this->Menu_model->Update($where, $data, 'permintaan_lowongan');
        redirect('Perusahaan/Penerimaan_pelamar/' . $id_lowongan);
    }

    public function Pe_pelamar()
    {
        $data['tittle'] = 'Dashboard Perusahaan';
        $data['judul'] = 'Selamat Datang di Dashboard Perusahaan ';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id_user = $this->session->userdata('id');


        $perusahaan = $this->db->get_where('perusahaan', ['id_user' => $this->session->userdata('id')])->row_array();
        $where = array('lowongan.id_perusahaan' => $perusahaan['id_profil']);
        $this->db->join('kategori', 'lowongan.id_lowongan = kategori.id_lowongan');
        $this->db->join('jenis_pekerjaan', 'kategori.id_jenis_pekerjaan = jenis_pekerjaan.id_jenis_pekerjaan');
        $this->db->join('pendidikan', 'kategori.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('pengalaman', 'kategori.id_pengalaman = pengalaman.id_pengalaman');
        $this->db->join('kota', 'kategori.id_kota = kota.id_kota');
        $data['lowongan'] = $this->Menu_model->getWhere($where, 'lowongan')->result();



        $this->load->view('template_perusahaan/header_dashboard_perusahaan', $data);
        $this->load->view('template_perusahaan/sidebar_dashboard_perusahaan', $data);
        $this->load->view('template_perusahaan/topbar_dashboard_perusahaan', $data);
        $this->load->view('perusahaan/Penerimaan_pelamar', $data);
        $this->load->view('template_perusahaan/footer_dashboard_perusahaan', $data);
    }

    public function Lowongan_usang()
    {
        $data['tittle'] = 'Dashboard Perusahaan';
        $data['judul'] = 'Selamat Datang di Dashboard Perusahaan ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('template_perusahaan/header_dashboard_perusahaan', $data);
        $this->load->view('template_perusahaan/sidebar_dashboard_perusahaan', $data);
        $this->load->view('template_perusahaan/topbar_dashboard_perusahaan', $data);
        $this->load->view('perusahaan/dashboard_perusahaan', $data);
        $this->load->view('template_perusahaan/footer_dashboard_perusahaan', $data);
    }

    // public function cari_freelance(){

    //     $keyword = $this->input->post('keyword');
    //     $data['pengalaman']=$this->Menu_model->get_pengalaman_keyword($keyword);
    //     $this->load->view('perusahaan/C_freelance',$data);

    // }

    public function hasil_cari_freelance($id_lowongan = null)
    {
        $data['tittle'] = 'Dashboard Perusahaan';
        $data['judul'] = 'Selamat Datang di Dashboard Perusahaan ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $keyword = $this->input->post('keyword');
        // $data['pengalaman'] = $this->Menu_model->get_pengalaman_keyword($keyword);
        $data['freelance'] = $this->db->get('cv')->result();

        $this->load->view('template_perusahaan/header_dashboard_perusahaan', $data);
        $this->load->view('template_perusahaan/sidebar_dashboard_perusahaan', $data);
        $this->load->view('template_perusahaan/topbar_dashboard_perusahaan', $data);
        $this->load->view('perusahaan/hasil_C_freelance', $data);
        $this->load->view('template_perusahaan/footer_dashboard_perusahaan', $data);
    }

    public function rekrut_freelance($id_lowongan = null)
    {
        $data['tittle'] = 'Dashboard Perusahaan';
        $data['judul'] = 'Selamat Datang di Dashboard Perusahaan ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $keyword = $this->input->post('keyword');
        // $data['pengalaman'] = $this->Menu_model->get_pengalaman_keyword($keyword);
        $data['freelance'] = $this->db->get('cv')->result();
        $data['id_lowongan'] = $id_lowongan;
        $this->load->view('template_perusahaan/header_dashboard_perusahaan', $data);
        $this->load->view('template_perusahaan/sidebar_dashboard_perusahaan', $data);
        $this->load->view('template_perusahaan/topbar_dashboard_perusahaan', $data);
        $this->load->view('perusahaan/rekrut_freelance', $data);
        $this->load->view('template_perusahaan/footer_dashboard_perusahaan', $data);
    }

    public function rekrut($id_user = null, $id_lowongan = null)
    {
        $this->db->insert('rekruitasi', [
            'id_user_penerima' => $id_user,
            'id_lowongan' => $id_lowongan,
            'waktu_rekruitasi' => date('Y-m-d H:i:s'),
            'status' => 'Belum dikonfirmasi',
        ]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Rekruitasi terkirim!</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function batalkan_rekruitasi($id_rekruitasi = null)
    {
        $this->db->where('id_rekruitasi', $id_rekruitasi);
        $this->db->update('rekruitasi', [
            'status' => 'dibatalkan'
        ]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Rekruitasi dibatalkan!</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function export_freelancer($keyword)
    {
        $data['tittle'] = 'Dashboard Perusahaan';
        $data['judul'] = 'Selamat Datang di Dashboard Perusahaan ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $data['pengalaman'] = $this->Menu_model->get_pengalaman_keyword($keyword);

        $this->load->view('perusahaan/export_freelancer', $data);
    }

    public function chat()
    {
        $search = $this->input->get('search');
        $data['title'] = "Chat";
        $data['tittle'] = "Chat";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row();
        $data['chat'] = $this->db->query("
            SELECT *, user.id AS id_user, MAX(time) as max_time  FROM chat 

            RIGHT JOIN user ON IF(chat.id_user_from = $user->id, chat.id_user_to, chat.id_user_from) = user.id 
            JOIN permintaan_lowongan ON permintaan_lowongan.id_user_pengirim = user.id
            JOIN lowongan ON lowongan.id_lowongan = permintaan_lowongan.id_lowongan_pekerjaan
            JOIN perusahaan ON perusahaan.id_profil = lowongan.id_perusahaan
            
            WHERE (id_user_from = $user->id OR id_user_to = $user->id) 
            AND user.id != $user->id 
            AND perusahaan.id_user = $user->id

            AND username LIKE '%$search%'

            GROUP BY IF(id_user_to = $user->id, id_user_from, id_user_to) ORDER BY chat.id DESC
        ")->result();

        $data['freelance'] = $this->db->query("
            SELECT *, user.id AS idu FROM permintaan_lowongan 

            JOIN user ON id_user_pengirim = user.id 
            JOIN lowongan ON lowongan.id_lowongan = permintaan_lowongan.id_lowongan_pekerjaan
            JOIN cv ON cv.id_user = user.id
            JOIN perusahaan ON perusahaan.id_profil = lowongan.id_perusahaan
            
            WHERE perusahaan.id_user = $user->id

            GROUP BY user.id
            ORDER BY user.username ASC
            
        ")->result_array();

        $this->load->view('template_perusahaan/header_dashboard_perusahaan', $data);
        $this->load->view('template_perusahaan/sidebar_dashboard_perusahaan', $data);
        $this->load->view('template_perusahaan/topbar_dashboard_perusahaan', $data);
        $this->load->view('perusahaan/chat', $data);
        $this->load->view('template_perusahaan/footer_dashboard_perusahaan');
    }

    public function getChat()
    {
        $id_freelance = $this->input->post('id_freelance');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['freelance'] = $this->db->get_where('user', ['id' => $id_freelance])->row_array();
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row();

        $this->db->where('id_user_from', $id_freelance);
        $this->db->where('id_user_to', $user->id);
        $this->db->update('chat', ['is_read' => 1]);

        $data['chat'] = $this->db->query("
            SELECT * FROM chat 

            JOIN user ON IF(chat.id_user_from = $user->id, chat.id_user_to, chat.id_user_from) = user.id 
            
            WHERE (id_user_from = $user->id AND id_user_to = $id_freelance) 
            OR (id_user_to = $user->id AND id_user_from = $id_freelance)

            ORDER BY time ASC
        ")->result();

        return $this->load->view('perusahaan/message', $data);
    }


    public function getChat2($id_freelance = null)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['freelance'] = $this->db->get_where('user', ['id' => $id_freelance])->row_array();
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row();

        $this->db->where('id_user_from', $id_freelance);
        $this->db->where('id_user_to', $user->id);
        $this->db->update('chat', ['is_read' => 1]);

        $data['chat'] = $this->db->query("
            SELECT * FROM chat 

            JOIN user ON IF(chat.id_user_from = $user->id, chat.id_user_to, chat.id_user_from) = user.id 
            
            WHERE (id_user_from = $user->id AND id_user_to = $id_freelance) 
            OR (id_user_to = $user->id AND id_user_from = $id_freelance)

            ORDER BY time ASC
        ")->result();

        return $this->load->view('perusahaan/message-2', $data);
    }


    public function kirimChat()
    {
        $id_freelance = $this->input->post('id_freelance');
        $pesan = $this->input->post('pesan');

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['freelance'] = $this->db->get_where('user', ['id' => $id_freelance])->row_array();
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row();

        $this->db->insert('chat', [
            'id_user_from' => $user->id,
            'id_user_to' => $id_freelance,
            'message' => nl2br($pesan),
            'time' => date('Y-m-d H:i:s'),
            'status' => 1,
            'is_read' => 0
        ]);

        $this->getChat2($id_freelance);
    }

    public function kirimPesan()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row();
        $message = $this->input->post('message');
        $id_user_to = $this->input->post('id_user_to');
        $this->db->insert('chat', [
            'id_user_from' => $user->id,
            'id_user_to' => $id_user_to,
            'message' => nl2br($message),
            'time' => date('Y-m-d H:i:s'),
            'status' => 1,
            'is_read' => 0
        ]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesan telah terkirim!</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function buatGrup()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row();
        $upload_gambar = $_FILES['gambar']['name'];
        $gambar = 'default.png';
        if ($upload_gambar) {
            $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
            $config['upload_path'] = './assets/img/grup';
            $config['max_size']     = '20048';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
        $this->db->insert('grup', [
            'nama_grup' => $this->input->post('nama_grup'),
            'gambar' => $gambar,
            'id_creator' => $user->id,
            'is_active' => 1,
        ]);

        $id_grup = $this->db->insert_id();

        // untuk memasukkan creator grup ke dalma grup
        $this->db->insert('anggota_grup', [
            'id_grup' => $id_grup,
            'id_user' => $user->id,
            'status_anggota' => 1,
        ]);

        // untuk memasukkan anggota/user yang dipilih ke dalam grup
        foreach ($this->input->post('anggota') as $key => $value) {
            $this->db->insert('anggota_grup', [
                'id_grup' => $id_grup,
                'id_user' => $value,
                'status_anggota' => 3,
            ]);
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function chatGrup()
    {
        $search = $this->input->get('search');
        $data['title'] = "Chat Grup";
        $data['tittle'] = "Chat Grup";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row();
        $data['chat'] = $this->db->query("
            SELECT *, MAX(waktu_kirim) as max_time  FROM chat_grup 

            RIGHT JOIN grup ON chat_grup.id_grup = grup.id_grup
            JOIN anggota_grup ON grup.id_grup = anggota_grup.id_grup
            
            WHERE (chat_grup.id_user = $user->id OR id_creator = $user->id OR anggota_grup.id_user = $user->id)
            AND nama_grup LIKE '%$search%'

            GROUP BY grup.id_grup ORDER BY chat_grup.id_chat_grup DESC

        ")->result();

        $data['freelance'] = $this->db->query("
            SELECT *, user.id AS idu FROM permintaan_lowongan 

            JOIN user ON id_user_pengirim = user.id 
            JOIN lowongan ON lowongan.id_lowongan = permintaan_lowongan.id_lowongan_pekerjaan
            JOIN cv ON cv.id_user = user.id
            JOIN perusahaan ON perusahaan.id_profil = lowongan.id_perusahaan
            
            WHERE perusahaan.id_user = $user->id

            GROUP BY user.id
            ORDER BY user.username ASC
            
        ")->result_array();

        $this->load->view('template_perusahaan/header_dashboard_perusahaan', $data);
        $this->load->view('template_perusahaan/sidebar_dashboard_perusahaan', $data);
        $this->load->view('template_perusahaan/topbar_dashboard_perusahaan', $data);
        $this->load->view('perusahaan/chat-grup', $data);
        $this->load->view('template_perusahaan/footer_dashboard_perusahaan');
    }

    public function getChatGrup()
    {
        $id_grup = $this->input->post('id_grup');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['grup'] = $this->db->get_where('grup', ['id_grup' => $id_grup])->row_array();
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row();

        // $this->db->where('id_user_from', $id_freelance);
        // $this->db->where('id_user_to', $user->id);
        // $this->db->update('chat', ['is_read' => 1]);

        $data['chat'] = $this->db->query("
            SELECT * FROM chat_grup 

            JOIN user ON chat_grup.id_user = user.id 
            
            WHERE id_grup = $id_grup

            ORDER BY waktu_kirim ASC
        ")->result();

        return $this->load->view('perusahaan/message-grup', $data);
    }


    public function getChatGrup2($id_grup = null)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['grup'] = $this->db->get_where('grup', ['id_grup' => $id_grup])->row_array();
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row();

        // $this->db->where('id_user_from', $id_freelance);
        // $this->db->where('id_user_to', $user->id);
        // $this->db->update('chat', ['is_read' => 1]);

        $data['chat'] = $this->db->query("
            SELECT * FROM chat_grup 

            JOIN user ON chat_grup.id_user = user.id 
            
            WHERE id_grup = $id_grup

            ORDER BY waktu_kirim ASC
        ")->result();

        return $this->load->view('perusahaan/message-grup-2', $data);
    }


    public function kirimChatGrup()
    {
        $id_grup = $this->input->post('id_grup');
        $pesan = $this->input->post('pesan');

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['grup'] = $this->db->get_where('grup', ['id_grup' => $id_grup])->row_array();
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row();

        $this->db->insert('chat_grup', [
            'id_grup' => $id_grup,
            'id_user' => $user->id,
            'pesan' => nl2br($pesan),
            // 'waktu_kirim' => date('Y-m-d H:i:s'),
            'chat_aktif' => 1
        ]);

        $this->getChatGrup2($id_grup);
    }

    public function kirimPesanGrup()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row();
        $message = $this->input->post('message');
        $id_grup = $this->input->post('id_grup');
        $this->db->insert('chat_grup', [
            'id_grup' => $id_grup,
            'id_user' => $user->id,
            'pesan' => nl2br($pesan),
            // 'waktu_kirim' => date('Y-m-d H:i:s'),
            'chat_aktif' => 1
        ]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesan telah terkirim!</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }
}
