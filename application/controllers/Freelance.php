<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Freelance extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User/M_user', 'Freelance_model');
        $this->load->model('Freelance_model', 'freelance');

        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Jakarta');
        $this->load->helper('url', 'form');
    }
    public function index()
    {

        $data['tittle'] = 'Dashboard Freelance';
        $data['judul'] = 'Selamat Datang di Dashboard Freelance ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['lowongan'] = $this->load->model('Freelance_model', 'freelance');
        // $data['lamar'] = $this->freelance->hitung_lowongan();
        // var_dump($data['lowongan']);
        // die;
        // echo 'Selamat Datang di Halaman Selanjutnya ' . $data['user']['username'];
        $data['jumlah_melamar'] = $this->db->get_where('permintaan_lowongan', [
            'id_user_pengirim' => $data['user']['id']
        ])->num_rows();
        $data['jumlah_diterima'] = $this->db->get_where('permintaan_lowongan', [
            'id_user_pengirim' => $data['user']['id'],
            'status' => 'Diterima'
        ])->num_rows();
        $data['jumlah_ditolak'] = $this->db->get_where('permintaan_lowongan', [
            'id_user_pengirim' => $data['user']['id'],
            'status' => 'Ditolak'
        ])->num_rows();
        $data['jumlah_pending'] = $this->db->get_where('permintaan_lowongan', [
            'id_user_pengirim' => $data['user']['id'],
            'status' => 'Pending'
        ])->num_rows();
        $data['jumlah_jalur_undangan'] = $this->db->get_where('permintaan_lowongan', [
            'id_user_pengirim' => $data['user']['id'],
            'status' => 'Jalur undangan'
        ])->num_rows();
        $this->load->view('template_freelance/header_dashboard_freelance', $data);
        $this->load->view('template_freelance/sidebar_dashboard_freelance', $data);
        $this->load->view('template_freelance/topbar_dashboard_freelance', $data);
        $this->load->view('freelance/dashboard_freelance', $data);
        $this->load->view('template_freelance/footer_dashboard_freelance', $data);
    }

    public function undangan()
    {
        $data['tittle'] = 'Undangan / Rekruitasi';
        $data['judul'] = 'Undangan/Rekruitasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->select('*, user.id AS uid, rekruitasi.status AS status_rekruitasi');
        $this->db->join('lowongan', 'rekruitasi.id_lowongan = lowongan.id_lowongan');
        $this->db->join('kategori', 'lowongan.id_lowongan = kategori.id_lowongan');
        $this->db->join('jenis_pekerjaan', 'kategori.id_jenis_pekerjaan = jenis_pekerjaan.id_jenis_pekerjaan');
        $this->db->join('pendidikan', 'kategori.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('pengalaman', 'kategori.id_pengalaman = pengalaman.id_pengalaman');
        $this->db->join('kota', 'kategori.id_kota = kota.id_kota');
        $this->db->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi');
        $this->db->join('user', 'rekruitasi.id_user_penerima = user.id');
        $this->db->join('cv', 'user.id = cv.id_user');
        $this->db->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.id_profil');
        $data['rekruitasi'] = $this->db->get_where('rekruitasi', ['id_user_penerima' => $data['user']['id']])->result();
        
        $this->load->view('template_freelance/header_dashboard_freelance', $data);
        $this->load->view('template_freelance/sidebar_dashboard_freelance', $data);
        $this->load->view('template_freelance/topbar_dashboard_freelance', $data);
        $this->load->view('freelance/undangan', $data);
        $this->load->view('template_freelance/footer_dashboard_freelance', $data);
    }

    public function detail_rekruitasi($id_lowongan = null, $id_rekruitasi = null)
    {
        $data['tittle'] = 'Detail Undangan';
        $data['judul'] = 'Detail Undangan';
        // $this->load->model('Freelance_model');
        // $detail = $this->freelance_model->detail_lowongan($id);
        // $data['detail'] = $detail;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['lowongan'] = $this->freelance->ambilDetail($id_lowongan);
        $this->db->join('kota', 'kota.id_kota = cv.id_kota');
        $this->db->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi');
        $this->db->join('agama', 'agama.id_agama = cv.id_agama');
        $data['cv'] = $this->db->get_where('cv', ['id_user' => $data['user']['id']])->row_array();
        $this->db->order_by('tahun', 'ASC');
        $data['portof'] = $this->db->get_where('portofolio', ['id_user' => $data['user']['id']])->result_array();
        $this->db->where_not_in('id_agama', 0);
        $data['agama'] = $this->db->get('agama')->result_array();

        $data['permintaan_lowongan'] = $this->db->get_where('permintaan_lowongan', [
            'id_user_pengirim' => $data['user']['id'],
            'id_lowongan_pekerjaan' => $id_lowongan
        ]);

        $data['id_rekruitasi'] = $id_rekruitasi;

        $this->db->select('*, user.id AS uid, rekruitasi.status AS status_rekruitasi');
        $this->db->join('lowongan', 'rekruitasi.id_lowongan = lowongan.id_lowongan');
        $this->db->join('kategori', 'lowongan.id_lowongan = kategori.id_lowongan');
        $this->db->join('jenis_pekerjaan', 'kategori.id_jenis_pekerjaan = jenis_pekerjaan.id_jenis_pekerjaan');
        $this->db->join('pendidikan', 'kategori.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('pengalaman', 'kategori.id_pengalaman = pengalaman.id_pengalaman');
        $this->db->join('kota', 'kategori.id_kota = kota.id_kota');
        $this->db->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi');
        $this->db->join('user', 'rekruitasi.id_user_penerima = user.id');
        $this->db->join('cv', 'user.id = cv.id_user');
        $this->db->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.id_profil');
        $data['rekruitasi'] = $this->db->get_where('rekruitasi', ['id_rekruitasi' => $id_rekruitasi])->row();

        $this->load->view('template_freelance/header_dashboard_freelance', $data);
        $this->load->view('template_freelance/sidebar_dashboard_freelance', $data);
        $this->load->view('template_freelance/topbar_dashboard_freelance', $data);
        $this->load->view('freelance/detail_rekruitasi', $data);
        $this->load->view('template_freelance/footer_dashboard_freelance', $data);
    }

    public function update_status_undangan($status = null,$id_rekruitasi = null, $id_lowongan = null)
    {
        $this->db->where('id_rekruitasi', $id_rekruitasi);
        $this->db->update('rekruitasi', ['status' => $status]);
        if ($status == 'diterima') {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $kode  = "P-";
            $query     = "SELECT MAX(TRIM(REPLACE(no_registrasi,'P-', ''))) as no_regis
                     FROM permintaan_lowongan WHERE no_registrasi LIKE '$kode%'";
            $baris = $this->db->query($query);
            $akhir = $baris->row()->no_regis;
            $akhir++;
            $no_registrasi    =str_pad($akhir, 3, "0", STR_PAD_LEFT);
            $no_registrasi    = "P-".$no_registrasi;
            $this->db->insert('permintaan_lowongan', [
                'id_user_pengirim' => $data['user']['id'],
                'id_lowongan_pekerjaan' => $id_lowongan,
                'no_registrasi' => $no_registrasi,
                'waktu_melamar' => date('Y-m-d H:i:s'),
                'status' => 'Jalur undangan'
            ]);
            $this->db->insert('tracking', [
                'id_permintaan_lowongan' => $this->db->insert_id(),
                'status' => 'Lamaran dipending',
                'waktu' => date('Y-m-d H:i:s'),
                'keterangan' => 'Undangan diterima'
            ]);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Undangan '.$status.'!</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function profil()
    {
        $data['tittle'] = 'Dashboard CV Freelance';
        $data['judul'] = 'Selamat Datang di Dashboard Freelance ';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->join('kota', 'kota.id_kota = cv.id_kota');
        $this->db->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi');
        $this->db->join('agama', 'agama.id_agama = cv.id_agama');
        $data['cv'] = $this->db->get_where('cv', ['id_user' => $data['user']['id']])->row_array();
        
        $this->db->join('pendidikan', 'pendidikan.id_pendidikan = kuliah.id_jenjang_pendidikan');
        $data['kuliah'] = $this->db->get_where('kuliah', ['id_cv' => $data['cv']['id_cv']])->result();
        
        $data['jenjang_pendidikan'] = $this->db->get_where('pendidikan', ['id_pendidikan >' => 4])->result();

        $this->db->order_by('tahun', 'ASC');
        $data['portof'] = $this->db->get_where('portofolio', ['id_user' => $data['user']['id']])->result_array();
        $this->db->where_not_in('id_agama', 0);
        $data['agama'] = $this->db->get('agama')->result_array();

        $data['provinsi'] = $this->db->get('provinsi')->result();
        if ($this->input->post('username') != $data['user']['username']) {
            // $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[user.username]');
        } else{
            // $this->form_validation->set_rules('username', 'Username', 'trim|required');
        }

        $this->db->join('keahlian', 'keahlian_freelance.id_keahlian = keahlian.id_keahlian');
        $data['keahlian_freelance'] = $this->db->get_where('keahlian_freelance', ['id_cv' => $data['cv']['id_cv']])->result();
        $data['keahlian'] = $this->db->get('keahlian')->result_array();
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
        // $this->form_validation->set_rules('tempat_lahir');
        // $this->form_validation->set_rules('tgl_lahir');
        // $this->form_validation->set_rules('jenis_kelamin');
        // $this->form_validation->set_rules('id_agama');
        // $this->form_validation->set_rules('gol_darah');
        // $this->form_validation->set_rules('tinggi');
        // $this->form_validation->set_rules('berat');
        // $this->form_validation->set_rules('no_telp');
        // $this->form_validation->set_rules('id_kota');
        // // $this->form_validation->set_rules('provinsi');
        // $this->form_validation->set_rules('alamat');
        // $this->form_validation->set_rules('status');
        // $this->form_validation->set_rules('keahlian');
        // $this->form_validation->set_rules('sd');
        // $this->form_validation->set_rules('smp');
        // $this->form_validation->set_rules('sma');
        // $this->form_validation->set_rules('universitas');
        // $this->form_validation->set_rules('jurusan');
        if ($this->form_validation->run() == false) {
            $this->load->view('template_freelance/header_dashboard_freelance', $data);
            $this->load->view('template_freelance/sidebar_dashboard_freelance', $data);
            $this->load->view('template_freelance/topbar_dashboard_freelance', $data);
            $this->load->view('freelance/profil_freelance', $data);
            $this->load->view('template_freelance/footer_dashboard_freelance', $data);
        } else {
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
                $config['upload_path'] = './assets/img/profil';
                $config['max_size']     = '20048';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg' || $old_image != 'default.svg' || $old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/profil/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                    $this->db->where('id', $data['user']['id']);
                    $this->db->update('user');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('Freelance/profil');
                }
            }
            $update = [
                'nama' => $this->input->post('nama'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'id_agama' => $this->input->post('id_agama'),
                'gol_darah' => $this->input->post('gol_darah'),
                'tinggi' => $this->input->post('tinggi'),
                'berat' => $this->input->post('berat'),
                'no_telp' => $this->input->post('no_telp'),
                'id_kota' => $this->input->post('id_kota'),
                // 'provinsi' => $this->input->post('provinsi'),
                'alamat' => $this->input->post('alamat'),
                'status' => $this->input->post('status'),
                'keahlian' => $this->input->post('keahlian'),
                'sd' => $this->input->post('sd'),
                'smp' => $this->input->post('smp'),
                'sma' => $this->input->post('sma'),
                'universitas' => $this->input->post('universitas'),
                'jurusan' => $this->input->post('jurusan')
            ];
            $this->db->where('id_cv', $this->input->post('id_cv'));
            $this->db->update('cv', $update);
            $this->session->set_flashdata('flash', 'Berhasil diubah');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data CV Berhasil diubah!
                </div>');
            redirect('Freelance/profil');
        }
    }

    public function hapus_kuliah($id_kuliah = null)
    {
        $this->db->delete('kuliah', ['id_kuliah' => $id_kuliah]);

        $this->session->set_flashdata('flash', 'Berhasil dihapus');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Riwayat Kuliah berhasil dihapus
            </div>');
        // redirect('Freelance/profil');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function update_kuliah()
    {
        $upload_ijazah = $_FILES['ijazah']['name'];
        $ijazah = '';
        if ($upload_ijazah) {
            $config['allowed_types'] = 'gif|jpg|png|svg|jpeg|pdf';
            $config['upload_path'] = './assets/doc/ijazah';
            $config['max_size']     = '20048';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('ijazah')) {
                $ijazah = $this->upload->data('file_name');
                $this->db->set('ijazah', $ijazah);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect('Freelance/profil');
            }
        }

        $upload_transkip_nilai = $_FILES['transkip_nilai']['name'];
        $transkip_nilai = '';
        if ($upload_transkip_nilai) {
            $config['allowed_types'] = 'gif|jpg|png|svg|jpeg|pdf';
            $config['upload_path'] = './assets/doc/ijazah';
            $config['max_size']     = '20048';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('transkip_nilai')) {
                $transkip_nilai = $this->upload->data('file_name');
                $this->db->set('transkip_nilai', $transkip_nilai);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect('Freelance/profil');
            }
        }

        if (empty($this->input->post('tahun_lulusan'))) {
            $tahun = date('Y');
        } else {
            $tahun = $this->input->post('tahun_lulusan');
        }
        $this->db->where('id_kuliah', $this->input->post('id_kuliah'));
        $this->db->update('kuliah', [
            'id_jenjang_pendidikan' => $this->input->post('id_jenjang_pendidikan'),
            'universitas' => $this->input->post('universitas'),
            'fakultas' => $this->input->post('fakultas'),
            'prodi' => $this->input->post('prodi'),
            'tahun_lulusan' => $tahun
        ]);
        $this->session->set_flashdata('flash', 'Berhasil diubah');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Riwayat Kuliah berhasil diubah
            </div>');
        // redirect('Freelance/profil');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function get_update_kuliah()
    {
        echo json_encode($this->db->get_where('kuliah', ['id_kuliah' => $this->input->post('id_kuliah')])->row_array());
    }

    public function insert_keahlian_freelance()
    {
        $this->form_validation->set_rules('id_keahlian', 'Keahlian', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->profil();
        } else{
            $upload_sertifikat = $_FILES['sertifikat']['name'];
            $sertifikat = '';
            if ($upload_sertifikat) {
                $config['allowed_types'] = 'gif|jpg|png|svg|jpeg|pdf';
                $config['upload_path'] = './assets/doc/sertifikat';
                $config['max_size']     = '20048';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('sertifikat')) {
                    $sertifikat = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('Freelance/profil');
                }
            }
            if (empty($this->input->post('tahun'))) {
                $tahun = date('Y');
            } else {
                $tahun = $this->input->post('tahun');
            }
            $this->db->insert('keahlian_freelance', [
                'id_cv' => $this->input->post('id_cv'),
                'id_keahlian' => $this->input->post('id_keahlian'),
                'sertifikat' => $sertifikat,
                'tahun' => $tahun,
                'keterangan' => $this->input->post('keterangan')
            ]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data Sertifikasi Keahlian ditambahkan!
                </div>');
            redirect('Freelance/profil');
        }

    }

    public function insert_kuliah()
    {
        $this->form_validation->set_rules('id_jenjang_pendidikan', 'Jenjang Pendidikan', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->profil();
        } else{
            $upload_ijazah = $_FILES['ijazah']['name'];
            $ijazah = '';
            if ($upload_ijazah) {
                $config['allowed_types'] = 'gif|jpg|png|svg|jpeg|pdf';
                $config['upload_path'] = './assets/doc/ijazah';
                $config['max_size']     = '20048';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('ijazah')) {
                    $ijazah = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('Freelance/profil');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Ijazah Harus diupload</div>');
                redirect('Freelance/profil');
            }

            $upload_transkip_nilai = $_FILES['transkip_nilai']['name'];
            $transkip_nilai = '';
            if ($upload_transkip_nilai) {
                $config['allowed_types'] = 'gif|jpg|png|svg|jpeg|pdf';
                $config['upload_path'] = './assets/doc/ijazah';
                $config['max_size']     = '20048';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('transkip_nilai')) {
                    $transkip_nilai = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('Freelance/profil');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Transkip Nilai wajib diupload</div>');
                redirect('Freelance/profil');
            }
            
            if (empty($this->input->post('tahun_lulusan'))) {
                $tahun = date('Y');
            } else {
                $tahun = $this->input->post('tahun_lulusan');
            }
            $this->db->insert('kuliah', [
                'id_cv' => $this->input->post('id_cv'),
                'id_jenjang_pendidikan' => $this->input->post('id_jenjang_pendidikan'),
                'universitas' => $this->input->post('universitas'),
                'fakultas' => $this->input->post('fakultas'),
                'prodi' => $this->input->post('prodi'),
                'ijazah' => $ijazah,
                'transkip_nilai' => $transkip_nilai,
                'tahun_lulusan' => $tahun
            ]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Riwayat Kuliah ditambahkan!
                </div>');
            redirect('Freelance/profil');
        }

    }

    public function hapus_keahlian_freelance($id_keahlian_freelance = null)
    {
        if (!$id_keahlian_freelance) {
            $id_keahlian_freelance = $this->input->post('id_keahlian_freelance');
        }
        $this->db->delete('keahlian_freelance', ['id_keahlian_freelance' => $id_keahlian_freelance]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data keahlian dihapus!
            </div>');
        redirect('Freelance/profil');
    }

    public function print_cv()
    {
        $data['tittle'] = 'Dashboard CV Freelance';
        $data['judul'] = 'Selamat Datang di Dashboard Freelance ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->db->join('agama', 'agama.id_agama = cv.id_agama');
        $this->db->join('kota', 'kota.id_kota = cv.id_kota');
        $this->db->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi');
        $data['cv'] = $this->db->get_where('cv', ['id_user' => $data['user']['id']])->row_array();
        $this->db->order_by('tahun', 'ASC');
        $data['portof'] = $this->db->get_where('portofolio', ['id_user' => $data['user']['id']])->result_array();
        $this->load->view('template_freelance/header_dashboard_freelance', $data);
        $this->load->view('freelance/print_cv', $data);
    }

    public function upload_ijazah()
    {
        $cv = $this->db->get_where('cv', ['id_cv' => $this->input->post('id_cv')])->row_array();
        if ($this->input->post('submit_ijazah_sd')) {
            $config['allowed_types'] = 'gif|jpg|png|svg|pdf';
            $config['upload_path'] = './assets/doc/ijazah';
            $config['max_size']     = '1500000';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('ijazah_sd')) {
                $old_image = $cv['ijazah_sd'];
                if ($old_image !='') {
                    // unlink(FCPATH.'assets/doc/ijazah/'.$old_image);
                } 
                $new_image = $this->upload->data('file_name');
                $this->db->set('ijazah_sd', $new_image);
                $this->db->where('id_cv', $this->input->post('id_cv'));
                $this->db->update('cv');
                redirect('Freelance/profil/');
            } else{
                $this->session->set_flashdata('flash_error', 'Gagal diunggah');
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
                redirect('Freelance/profil/');
            }
        } elseif ($this->input->post('submit_ijazah_smp')) {
            $config['allowed_types'] = 'gif|jpg|png|svg|pdf';
            $config['upload_path'] = './assets/doc/ijazah';
            $config['max_size']     = '1500000';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('ijazah_smp')) {
                $old_image = $cv['ijazah_smp'];
                if ($old_image !='') {
                    // unlink(FCPATH.'assets/doc/ijazah/'.$old_image);
                } 
                $new_image = $this->upload->data('file_name');
                $this->db->set('ijazah_smp', $new_image);
                $this->db->where('id_cv', $this->input->post('id_cv'));
                $this->db->update('cv');
                redirect('Freelance/profil/');
            } else{
                $this->session->set_flashdata('flash_error', 'Gagal diunggah');
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
                redirect('Freelance/profil/');
            }
        } elseif ($this->input->post('submit_ijazah_sma')) {
            $config['allowed_types'] = 'gif|jpg|png|svg|pdf';
            $config['upload_path'] = './assets/doc/ijazah';
            $config['max_size']     = '1500000';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('ijazah_sma')) {
                $old_image = $cv['ijazah_sma'];
                if ($old_image !='') {
                    // unlink(FCPATH.'assets/doc/ijazah/'.$old_image);
                } 
                $new_image = $this->upload->data('file_name');
                $this->db->set('ijazah_sma', $new_image);
                $this->db->where('id_cv', $this->input->post('id_cv'));
                $this->db->update('cv');
                redirect('Freelance/profil/');
            } else{
                $this->session->set_flashdata('flash_error', 'Gagal diunggah');
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
                redirect('Freelance/profil/');
            }
        } elseif ($this->input->post('submit_ijazah_universitas')) {
            $config['allowed_types'] = 'gif|jpg|png|svg|pdf';
            $config['upload_path'] = './assets/doc/ijazah';
            $config['max_size']     = '1500000';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('ijazah_universitas')) {
                $old_image = $cv['ijazah_universitas'];
                if ($old_image !='') {
                    // unlink(FCPATH.'assets/doc/ijazah/'.$old_image);
                } 
                $new_image = $this->upload->data('file_name');
                $this->db->set('ijazah_universitas', $new_image);
                $this->db->where('id_cv', $this->input->post('id_cv'));
                $this->db->update('cv');
                redirect('Freelance/profil/');
            } else{
                $this->session->set_flashdata('flash_error', 'Gagal diunggah');
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
                redirect('Freelance/profil/');
            }
        } elseif ($this->input->post('submit_transkip_sd')) {
            $config['allowed_types'] = 'gif|jpg|png|svg|pdf';
            $config['upload_path'] = './assets/doc/ijazah';
            $config['max_size']     = '1500000';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('transkip_sd')) {
                $old_image = $cv['transkip_sd'];
                if ($old_image !='') {
                    // unlink(FCPATH.'assets/doc/ijazah/'.$old_image);
                } 
                $new_image = $this->upload->data('file_name');
                $this->db->set('transkip_sd', $new_image);
                $this->db->where('id_cv', $this->input->post('id_cv'));
                $this->db->update('cv');
                redirect('Freelance/profil/');
            } else{
                $this->session->set_flashdata('flash_error', 'Gagal diunggah');
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
                redirect('Freelance/profil/');
            }
        } elseif ($this->input->post('submit_transkip_smp')) {
            $config['allowed_types'] = 'gif|jpg|png|svg|pdf';
            $config['upload_path'] = './assets/doc/ijazah';
            $config['max_size']     = '1500000';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('transkip_smp')) {
                $old_image = $cv['transkip_smp'];
                if ($old_image !='') {
                    // unlink(FCPATH.'assets/doc/ijazah/'.$old_image);
                } 
                $new_image = $this->upload->data('file_name');
                $this->db->set('transkip_smp', $new_image);
                $this->db->where('id_cv', $this->input->post('id_cv'));
                $this->db->update('cv');
                redirect('Freelance/profil/');
            } else{
                $this->session->set_flashdata('flash_error', 'Gagal diunggah');
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
                redirect('Freelance/profil/');
            }
        } elseif ($this->input->post('submit_transkip_sma')) {
            $config['allowed_types'] = 'gif|jpg|png|svg|pdf';
            $config['upload_path'] = './assets/doc/ijazah';
            $config['max_size']     = '1500000';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('transkip_sma')) {
                $old_image = $cv['transkip_sma'];
                if ($old_image !='') {
                    // unlink(FCPATH.'assets/doc/ijazah/'.$old_image);
                } 
                $new_image = $this->upload->data('file_name');
                $this->db->set('transkip_sma', $new_image);
                $this->db->where('id_cv', $this->input->post('id_cv'));
                $this->db->update('cv');
                redirect('Freelance/profil/');
            } else{
                $this->session->set_flashdata('flash_error', 'Gagal diunggah');
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
                redirect('Freelance/profil/');
            }
        } elseif ($this->input->post('submit_transkip_kuliah')) {
            $config['allowed_types'] = 'gif|jpg|png|svg|pdf';
            $config['upload_path'] = './assets/doc/ijazah';
            $config['max_size']     = '1500000';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('transkip_kuliah')) {
                $old_image = $cv['transkip_kuliah'];
                if ($old_image !='') {
                    // unlink(FCPATH.'assets/doc/ijazah/'.$old_image);
                } 
                $new_image = $this->upload->data('file_name');
                $this->db->set('transkip_kuliah', $new_image);
                $this->db->where('id_cv', $this->input->post('id_cv'));
                $this->db->update('cv');
                redirect('Freelance/profil/');
            } else{
                $this->session->set_flashdata('flash_error', 'Gagal diunggah');
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
                redirect('Freelance/profil/');
            }
        } else {
            $this->session->set_flashdata('flash_error', 'Gagal diunggah');
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda tidak mengunggah Apapun</div>');
            redirect('Freelance/profil/');
        }
    }
    public function print_ijazah($ijazah = null)
    {
        $data['tittle'] = 'Ijazah Freelance';
        // $data['judul'] = 'Selamat Datang di Dashboard Freelance ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->db->join('agama', 'agama.id_agama = cv.id_agama');
        $this->db->join('kota', 'kota.id_kota = cv.id_kota');
        $this->db->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi');
        $data['cv'] = $this->db->get_where('cv', ['id_user' => $data['user']['id']])->row_array();
        $this->db->order_by('tahun', 'ASC');
        $data['portof'] = $this->db->get_where('portofolio', ['id_user' => $data['user']['id']])->result_array();
        $data['ijazah'] = $ijazah;
        $this->load->view('template_freelance/header_dashboard_freelance', $data);
        $this->load->view('freelance/print_ijazah', $data);
    }
    public function print_surat_paklaring($id_portofolio = null)
    {
        $data['tittle'] = 'Surat Paklaring';
        // $data['judul'] = 'Selamat Datang di Dashboard Freelance ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->db->join('agama', 'agama.id_agama = cv.id_agama');
        $this->db->join('kota', 'kota.id_kota = cv.id_kota');
        $this->db->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi');
        $data['cv'] = $this->db->get_where('cv', ['id_user' => $data['user']['id']])->row_array();
        $this->db->order_by('tahun', 'ASC');
        $data['portof'] = $this->db->get_where('portofolio', ['id_portofolio' => $id_portofolio])->row_array();
        $this->load->view('template_freelance/header_dashboard_freelance', $data);
        $this->load->view('freelance/print_surat_paklaring', $data);
    }

    public function print_surat_lamar($id_lowongan)
    {
        $data['tittle'] = 'Surat Lamaran';
        // $data['judul'] = 'Selamat Datang di Dashboard Freelance ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['lowongan'] = $this->freelance->ambilDetail($id_lowongan);
        // $data['permintaan_lowongan'] = $this->db->get_where('permintaan_lowongan', [
        //     'id_user_pengirim' => $data['user']['id'],
        //     'id_lowongan_pekerjaan' => $id_lowongan
        // ]);
        // $this->load->model('Freelance_model', 'freelance');
        // // $data['permintaan_lowongan'] = $this->freelance->getAllPermintaanLowongan($data['user']['id']);
        // // $where = array(
        // //     'lowongan.id_lowongan' => $id_lowongan
        // // );
        // $this->db->join('kategori', 'lowongan.id_lowongan = kategori.id_lowongan');
        // $this->db->join('jenis_pekerjaan', 'kategori.id_jenis_pekerjaan = jenis_pekerjaan.id_jenis_pekerjaan');
        // $this->db->join('pendidikan', 'kategori.id_pendidikan = pendidikan.id_pendidikan');
        // $this->db->join('pengalaman', 'kategori.id_pengalaman = pengalaman.id_pengalaman');
        // $this->db->join('kota', 'kategori.id_kota = kota.id_kota');
        // $data['lowongan'] = $this->db->get_where('lowongan', $where)->result();
        // $this->db->join('kota', 'kota.id_kota = cv.id_kota');
        // $this->db->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi');
        // $this->db->join('agama', 'agama.id_agama = cv.id_agama');
        // $data['cv'] = $this->db->get_where('cv', ['id_user' => $data['user']['id']])->row_array();
        // $this->db->order_by('tahun', 'ASC');
        $data['porlowongan'] = $this->db->get_where('permintaan_lowongan', ['id_user_pengirim' => $data['user']['id']])->row_array();
        $this->load->view('template_freelance/header_dashboard_freelance', $data);
        $this->load->view('freelance/print_surat_lamaran', $data);
    }

    public function portofolio()
    {
        $data['tittle'] = 'Dashboard Portofolio Freelance';
        $data['judul'] = 'Selamat Datang di Dashboard Freelance ';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['porto'] = $this->db->get('portofolio')->result_array();
        $data['lowongan'] = $this->load->model('Freelance_model', 'freelance');


        // $this->session->
        // echo 'Selamat Datang di Halaman Selanjutnya ' . $data['user']['username'];
        $this->form_validation->set_rules('tahun', 'tahun', 'required|trim|numeric');
        $this->form_validation->set_rules('pengalaman', 'pengalaman', 'required|trim');
        // $this->form_validation->set_rules('paklaring', 'Paklaring', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('template_freelance/header_dashboard_freelance', $data);
            $this->load->view('template_freelance/sidebar_dashboard_freelance', $data);
            $this->load->view('template_freelance/topbar_dashboard_freelance', $data);
            $this->load->view('freelance/portofolio', $data);
            $this->load->view('template_freelance/footer_dashboard_freelance', $data);
        } else {
            $config['allowed_types'] = 'gif|jpg|png|svg|pdf';
            $config['upload_path'] = './assets/doc/paklaring';
            $config['max_size']     = '1500000';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('paklaring')) {
                $old_image = $cv['paklaring'];
                if ($old_image !='') {
                    // unlink(FCPATH.'assets/doc/ijazah/'.$old_image);
                } 
                $new_image = $this->upload->data('file_name');
                $this->db->insert('portofolio', [
                    'tahun' => $this->input->post('tahun'),
                    'id_user' => $data['user']['id'],
                    'pengalaman' => $this->input->post('pengalaman'),
                    'paklaring' => $new_image
                ]);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Selamat! Data Portofolio berhasil ditambahkan.
                    </div>');
                redirect('Freelance/portofolio');
            } else{
                $this->session->set_flashdata('flash_error', 'Gagal diunggah');
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
                redirect('Freelance/portofolio');
            }
        }
    }

    function load_portofolio()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->order_by('tahun', 'ASC');
        $query = $this->db->get_where('portofolio', ['id_user' => $user['id']]);
        echo json_encode($query->result_array());
    }

    public function insert_portofolio()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = array(
            'id_user' => $user['id'],
            'tahun' => $this->input->post('tahun'),
            'pengalaman' => $this->input->post('pengalaman')
        );
        $this->db->insert('portofolio', $data);
        // $this->form_validation->set_rules('tahun', 'Tahun', 'trim|required|numeric|max_length[4]|min_length[4]');
        // $this->form_validation->set_rules('pengalaman', 'Pengalaman', 'trim|required');
        // if ($this->form_validation->run() == true) {
        // }else{

        // }
    }

    function update_portofolio()
    {
        $data = array(
            $this->input->post('table_column') => $this->input->post('value')
        );
        $this->db->where('id_portofolio', $this->input->post('id'));
        $this->db->update('portofolio', $data);
    }

    function delete_portofolio()
    {
        $this->db->delete('portofolio', ['id_portofolio' => $this->input->post('id')]);
    }

    public function hapus_porto($id)
    {
        // $where = array('id_portofolio' => $id);
        $this->load->model('Freelance_model', 'freelance');
        $this->freelance->hapus_portofolio($id);
        $this->session->set_flashdata('flash', 'data berhasil dihapus');
        redirect('Freelance/portofolio');
    }
    public function riwayat_lamar()
    {
        $data['tittle'] = 'Dashboard Riwayat lamar Freelance';
        $data['judul'] = 'Selamat Datang di Dashboard Freelance ';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['permintaan_lowongan'] = $this->freelance->getAllPermintaanLowongan($data['user']['id']);
        // $data['lowongan'] = $this->db->get('lowongan')->result_array();
        // $this->db->join('kota', 'kota.id_kota = cv.id_kota');
        // $this->db->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi');
        // $data['cv'] = $this->db->get('cv')->result_array();
        // echo 'Selamat Datang di Halaman Selanjutnya ' . $data['user']['username'];
        $data['pertanyaan'] = $this->db->get('pertanyaan')->result_array();
        $this->load->view('template_freelance/header_dashboard_freelance', $data);
        $this->load->view('template_freelance/sidebar_dashboard_freelance', $data);
        $this->load->view('template_freelance/topbar_dashboard_freelance', $data);
        $this->load->view('freelance/riwayat_lamar', $data);
        $this->load->view('template_freelance/footer_dashboard_freelance', $data);
    }

    public function templatePesan($pertanyaan)
    {
        echo '<textarea class="form-control" name="message" id="message">'.urldecode($pertanyaan).'?</textarea>';

        // $data['pertanyaan'] = str_r$pertanyaan;
        // $this->load->view('freelance/pesan_by_pertanyaan', $data);
    }

    public function templateMessage($pertanyaan)
    {
        echo '<textarea class="form-control" name="pesan" id="pesan" rows="3">'.urldecode($pertanyaan).'?</textarea>';
    }

    public function lihat_perusahaan($id_perusahaan = null)
    {
        $data['tittle'] = 'Dashboard Riwayat lamar Freelance';
        $data['judul'] = 'Selamat Datang di Dashboard Freelance ';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['perusahaan'] = $this->db->get_where('perusahaan', ['id_profil' => $id_perusahaan])->row();

        $this->load->view('template_freelance/header_dashboard_freelance', $data);
        $this->load->view('template_freelance/sidebar_dashboard_freelance', $data);
        $this->load->view('template_freelance/topbar_dashboard_freelance', $data);
        $this->load->view('freelance/lihat_perusahaan', $data);
        $this->load->view('template_freelance/footer_dashboard_freelance', $data);
    }

    public function lowonganByTanggal($tanggal)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['permintaan_lowongan'] = $this->freelance->getPermintaanLowonganByTanggal($data['user']['id'], $tanggal);
        $this->load->view('freelance/riwayat_lamar_by_tanggal', $data);
    }
    public function profil_akun()
    {
        $data['tittle'] = 'Dashboard Riwayat lamar Freelance';
        $data['judul'] = 'Selamat Datang di Dashboard Freelance ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->db->join('kota', 'kota.id_kota = cv.id_kota');
        $this->db->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi');
        $this->db->join('agama', 'agama.id_agama = cv.id_agama');
        $data['cv'] = $this->db->get('cv');
        // echo 'Selamat Datang di Halaman Selanjutnya ' . $data['user']['username'];
        $this->load->view('template_freelance/header_dashboard_freelance', $data);
        $this->load->view('template_freelance/sidebar_dashboard_freelance', $data);
        $this->load->view('template_freelance/topbar_dashboard_freelance', $data);
        $this->load->view('freelance/profil_akun', $data);
        $this->load->view('template_freelance/footer_dashboard_freelance', $data);
    }


    public function editpass()
    {
        $data['tittle'] = 'Edit Password';
        $data['judul'] = 'Selamat Datang di Dashboard ';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // echo 'Selamat Datang di Halaman Selanjutnya ' . $data['user']['username'];

        $this->form_validation->set_rules('current_password', 'Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'Password', 'required|trim');
        $this->form_validation->set_rules('new_password2', 'Password', 'required|trim|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('template_freelance/header_dashboard_freelance', $data);
            $this->load->view('template_freelance/sidebar_dashboard_freelance', $data);
            $this->load->view('template_freelance/topbar_dashboard_freelance', $data);
            $this->load->view('freelance/editpass', $data);
            $this->load->view('template_freelance/footer_dashboard_freelance', $data);
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah</div>');
                redirect('Freelance/editpass');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Tidak Boleh Sama</div>');
                    redirect('Freelance/editpass');
                } else {
                    // password sudah Ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password diubah</div>');
                    redirect('Freelance/editpass');
                }
            }
        }
    }

    public function edit_profil()
    {
        $data['tittle'] = 'Dashboard Riwayat lamar Freelance';
        $data['judul'] = 'Selamat Datang di Dashboard Freelance ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->db->join('kota', 'kota.id_kota = cv.id_kota');
        $this->db->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi');
        $this->db->join('agama', 'agama.id_agama = cv.id_agama');
        $data['cv'] = $this->db->get('cv');
        // echo 'Selamat Datang di Halaman Selanjutnya ' . $data['user']['username'];
        if ($this->form_validation->run() == false) {
            $this->load->view('template_freelance/header_dashboard_freelance', $data);
            $this->load->view('template_freelance/sidebar_dashboard_freelance', $data);
            $this->load->view('template_freelance/topbar_dashboard_freelance', $data);
            $this->load->view('freelance/profil_akun', $data);
            $this->load->view('template_freelance/footer_dashboard_freelance', $data);
        }
    }
    public function tambah_portofolio()
    {
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim');
        $this->form_validation->set_rules('pengalaman', 'Pengalaman', 'required|trim');
        $data['tittle'] = 'Tambah Portofolio Freelance';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['porto'] = $this->db->get('portofolio');
        if ($this->form_validation->run() == false) {
            $this->load->view('template_freelance/header_dashboard_freelance', $data);
            $this->load->view('template_freelance/sidebar_dashboard_freelance', $data);
            $this->load->view('template_freelance/topbar_dashboard_freelance', $data);
            $this->load->view('freelance/tambahportofolio', $data);
            $this->load->view('template_freelance/footer_dashboard_freelance', $data);
        } else {
            $data = [
                'Tahun' => htmlspecialchars($this->input->post('tahun', true)),
                'Pengalaman' => htmlspecialchars($this->input->post('pengalaman', true)),
            ];
            $this->db->insert('portofolio', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Portofolio sudah ditambahkan </div>');
            redirect('Freelance/portofolio');
        }
    }

    public function edit_portofolio()
    {
        $data['tittle'] = 'Edit Portofoilo Freelance';
        $data['judul'] = 'Selamat Datang di Dashboard Freelance ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['portofolio'] = $this->db->get('portofolio')->row_array();
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim');
        $this->form_validation->set_rules('pengalaman', 'Pengalaman', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('template_freelance/header_dashboard_freelance', $data);
            $this->load->view('template_freelance/sidebar_dashboard_freelance', $data);
            $this->load->view('template_freelance/topbar_dashboard_freelance', $data);
            $this->load->view('freelance/edit_portofolio', $data);
            $this->load->view('template_freelance/footer_dashboard_freelance', $data);
        } else {
            $tahun = $this->input->post('tahun');
            $pengalaman = $this->input->post('pengalaman');
            $this->db->set('Tahun', $tahun);
            $this->db->set('Pengalaman', $pengalaman);
            $this->db->update('portofolio');
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">
            Data anda sudah diubah
            </div>');
            redirect('Freelance/portofolio');
        }
    }
    public function ubahportofolio()
    {
        $data['tittle'] = 'Dashboard Riwayat lamar Freelance';
        $data['judul'] = 'Selamat Datang di Dashboard Freelance ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['portofolio'] = $this->db->get('portofolio')->row_array();
        // echo 'Selamat Datang di Halaman Selanjutnya ' . $data['user']['username'];
        $this->load->view('template_freelance/header_dashboard_freelance', $data);
        $this->load->view('template_freelance/sidebar_dashboard_freelance', $data);
        $this->load->view('template_freelance/topbar_dashboard_freelance', $data);
        $this->load->view('freelance/ubahporto', $data);
        $this->load->view('template_freelance/footer_dashboard_freelance', $data);
    }
    public function edit_cv()
    {
        $data['tittle'] = 'CV Freelance';
        $data['judul'] = 'Selamat Datang di Dashboard Freelance ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->db->join('kota', 'kota.id_kota = cv.id_kota');
        $this->db->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi');
        $this->db->join('agama', 'agama.id_agama = cv.id_agama');
        $data['cv'] = $this->db->get('cv')->row_array();
        // echo 'Selamat Datang di Halaman Selanjutnya ' . $data['user']['username'];
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('bln_lahir', 'Bulan Lahir', 'required');
        $this->form_validation->set_rules('thn_lahir', 'Tahun Lahir', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
        $this->form_validation->set_rules('agama', 'Status', 'required|trim');
        $this->form_validation->set_rules('gol_darah', 'Golongan Darah', 'required|trim');
        $this->form_validation->set_rules('tinggi', 'Tinggi', 'required|trim');
        $this->form_validation->set_rules('berat', 'Berat', 'required|trim');
        $this->form_validation->set_rules('notelp', 'Nomor Handphone', 'required|trim');
        $this->form_validation->set_rules('id_kota', 'Kota', 'required|trim');
        // $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template_freelance/header_dashboard_freelance', $data);
            $this->load->view('template_freelance/sidebar_dashboard_freelance', $data);
            $this->load->view('template_freelance/topbar_dashboard_freelance', $data);
            $this->load->view('freelance/edit_cv', $data);
            $this->load->view('template_freelance/footer_dashboard_freelance', $data);
        } else {
            $nama = $this->input->post('nama', true);
            $email = $this->input->post('email', true);
            $tempat_lahir = $this->input->post('tempat_lahir', true);
            $tgl_lahir = $this->input->post('tgl_lahir', true);
            $bln_lahir = $this->input->post('bln_lahir', true);
            $thn_lahir = $this->input->post('thn_lahir', true);
            $jenis_kelamin = $this->input->post('jenis_kelamin', true);
            $id_agama = $this->input->post('id_agama', true);
            $gol_darah = $this->input->post('gol_darah', true);
            $tinggi = $this->input->post('tinggi', true);
            $berat = $this->input->post('berat', true);
            $no_telp = $this->input->post('notelp', true);
            $id_kota = $this->input->post('id_kota', true);
            // $provinsi = $this->input->post('provinsi', true);

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
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'tempat_lahir' => htmlspecialchars($tempat_lahir),
                'tgl_lahir' => htmlspecialchars($tgl_lahir),
                'bln_lahir' => htmlspecialchars($bln_lahir),
                'thn_lahir' => htmlspecialchars($thn_lahir),
                'thn_lahir' => htmlspecialchars($thn_lahir),
                'jenis_kelamin' => htmlspecialchars($jenis_kelamin),
                'id_agama' => htmlspecialchars($id_agama),
                'gol_darah' => htmlspecialchars($gol_darah),
                'tinggi' => htmlspecialchars($tinggi),
                'berat' => htmlspecialchars($berat),
                'no_telp' => htmlspecialchars($no_telp),
                'id_kota' => htmlspecialchars($id_kota),
                // 'provinsi' => htmlspecialchars($provinsi),
            ];
            $this->db->set('nama', $nama);
            $this->db->set('tempat_lahir', $tempat_lahir);
            $this->db->set('tgl_lahir', $tgl_lahir);
            $this->db->set('bln_lahir', $bln_lahir);
            $this->db->set('thn_lahir', $thn_lahir);
            $this->db->set('jenis_kelamin', $jenis_kelamin);
            $this->db->set('agama', $agama);
            $this->db->set('gol_darah', $gol_darah);
            $this->db->set('tinggi', $tinggi);
            $this->db->set('berat', $berat);
            $this->db->set('no_telp', $no_telp);
            $this->db->set('id_kota', $id_kota);
            $this->db->update('cv');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data anda sudah diubah
            </div>');
            redirect('Freelance/profil');
        }
    }
    public function cari_lowongan()
    {
        $data['tittle'] = 'CARI LOWONGAN';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['lowongan'] = $this->load->model('Freelance_model', 'freelance');
        $this->load->library('pagination');
        $config['total_rows'] = $this->db->count_all_results();
        $config['base_url'] = 'http://localhost/web_PA/Freelance/cari_lowongan/index';
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;
        $config['num_links'] = 4;

        // initialize
        $this->pagination->initialize($config);

        $data['lowongan'] = $this->freelance->getAlldatalowongan();
        $data['start'] = $this->uri->segment(4);
        $data['lowongan'] = $this->freelance->getAlldatalowongan($config['per_page'], $data['start']);

        $data['lowongan'] = $this->freelance->getAlllowongan();
        // echo 'Selamat Datang di Halaman Selanjutnya ' . $data['user']['username'];
        $this->load->view('template_freelance/header_dashboard_freelance', $data);
        $this->load->view('template_freelance/sidebar_dashboard_freelance', $data);
        $this->load->view('template_freelance/topbar_dashboard_freelance', $data);
        $this->load->view('freelance/carilowongan', $data);
        $this->load->view('template_freelance/footer_dashboard_freelance', $data);
    }
    public function detail_lowongan($id_lowongan)
    {
        $data['tittle'] = 'Dashboard Riwayat lamar Freelance';
        $data['judul'] = 'Selamat Datang di Dashboard Freelance ';
        // $this->load->model('Freelance_model');
        // $detail = $this->freelance_model->detail_lowongan($id);
        // $data['detail'] = $detail;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['lowongan'] = $this->freelance->ambilDetail($id_lowongan);
        $this->db->join('kota', 'kota.id_kota = cv.id_kota');
        $this->db->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi');
        $this->db->join('agama', 'agama.id_agama = cv.id_agama');
        $data['cv'] = $this->db->get_where('cv', ['id_user' => $data['user']['id']])->row_array();
        $this->db->order_by('tahun', 'ASC');
        $data['portof'] = $this->db->get_where('portofolio', ['id_user' => $data['user']['id']])->result_array();
        $this->db->where_not_in('id_agama', 0);
        $data['agama'] = $this->db->get('agama')->result_array();

        $data['permintaan_lowongan'] = $this->db->get_where('permintaan_lowongan', [
            'id_user_pengirim' => $data['user']['id'],
            'id_lowongan_pekerjaan' => $id_lowongan
        ]);

        $data['porlowongan'] = $this->db->get_where('permintaan_lowongan', ['id_user_pengirim' => $data['user']['id']])->row_array();

        $this->db->join('user', 'user.id = komentar_lowongan.id_user');
        $data['komentar_lowongan'] = $this->db->get_where('komentar_lowongan', ['id_lowongan' => $id_lowongan])->result();

        $this->load->view('template_freelance/header_dashboard_freelance', $data);
        $this->load->view('template_freelance/sidebar_dashboard_freelance', $data);
        $this->load->view('template_freelance/topbar_dashboard_freelance', $data);
        $this->load->view('freelance/detail_lamar', $data);
        $this->load->view('template_freelance/footer_dashboard_freelance', $data);
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
            redirect('Freelance/detail_lowongan/'.$this->input->post('id_lowongan'));
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

    public function detail_tracking($id_lowongan = null)
    {
        $data['tittle'] = 'Dashboard Riwayat lamar Freelance';
        $data['judul'] = 'Selamat Datang di Dashboard Freelance ';
        // $this->load->model('Freelance_model');
        // $detail = $this->freelance_model->detail_lowongan($id);
        // $data['detail'] = $detail;
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['lowongan'] = $this->freelance->ambilDetail($id_lowongan);

        $this->load->view('template_freelance/header_dashboard_freelance', $data);
        $this->load->view('template_freelance/sidebar_dashboard_freelance', $data);
        $this->load->view('template_freelance/topbar_dashboard_freelance', $data);
        $this->load->view('freelance/detail_lamar', $data);
        $this->load->view('template_freelance/footer_dashboard_freelance', $data);
    }
    public function pencarian($id_provinsi = null, $id_kota = null)
    {
        $data['tittle'] = 'Dashboard Riwayat lamar Freelance';
        $data['judul'] = 'Selamat Datang di Dashboard Freelance ';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['id_provinsi'] = $id_provinsi;
        $data['id_kota'] = $id_kota;

        if ($id_provinsi) {
            $this->db->where('kota.id_provinsi', $id_provinsi);
        }
        if ($id_kota) {
            $this->db->where('kategori.id_kota', $id_kota);
        }
        $data['lowongan'] = $this->freelance->getAlllowongan2();

        $this->db->where('batas_tgl >=', date('Y-m-d'));
        $this->db->join('kategori_keahlian', 'kategori_keahlian.id_keahlian = keahlian.id_keahlian');
        $this->db->join('kategori', 'kategori_keahlian.id_kategori = kategori.id_kategori');
        $this->db->join('lowongan', 'kategori.id_lowongan = lowongan.id_lowongan');
        $data['keahlian'] = $this->db->get('keahlian');
        
        $this->db->where('batas_tgl >=', date('Y-m-d'));
        $this->db->join('kategori', 'kategori.id_jenis_pekerjaan = jenis_pekerjaan.id_jenis_pekerjaan');
        $this->db->join('lowongan', 'kategori.id_lowongan = lowongan.id_lowongan');
        $data['jenis_pekerjaan'] = $this->db->get('jenis_pekerjaan');
        
        $this->db->where('batas_tgl >=', date('Y-m-d'));
        $this->db->join('kategori', 'kategori.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('lowongan', 'kategori.id_lowongan = lowongan.id_lowongan');
        $data['pendidikan'] = $this->db->get('pendidikan');
        
        $this->db->where('batas_tgl >=', date('Y-m-d'));
        $this->db->join('kategori', 'kategori.id_pengalaman = pengalaman.id_pengalaman');
        $this->db->join('lowongan', 'kategori.id_lowongan = lowongan.id_lowongan');
        $data['pengalaman'] = $this->db->get('pengalaman');

        $data['provinsi'] = $this->db->get('provinsi');
        if ($id_provinsi) {
            $data['kota'] = $this->db->get_where('kota', ['id_provinsi' => $id_provinsi]);
        }

        $this->db->join('kota', 'kota.id_kota = cv.id_kota');
        $this->db->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi');
        $this->db->join('agama', 'agama.id_agama = cv.id_agama');
        $data['cv'] = $this->db->get_where('cv', ['id_user' => $data['user']['id']])->row();
        
        $this->load->view('template_freelance/header_dashboard_freelance', $data);
        $this->load->view('template_freelance/sidebar_dashboard_freelance', $data);
        $this->load->view('template_freelance/topbar_dashboard_freelance', $data);
        $this->load->view('freelance/pencarian', $data);
        $this->load->view('template_freelance/footer_dashboard_freelance', $data);
    }
    public function cariKota($id_provinsi)
    {
        if ($this->input->post('id_provinsi') != '') {
            $id_provinsi = $this->input->post('id_provinsi');
            $data['kota'] = $this->db->get_where('kota', ['id_provinsi' => $id_provinsi])->result();
        } else{
            $data['kota'] = $this->db->get_where('kota', ['id_provinsi' => $id_provinsi])->result();
        }
        return $this->load->view('freelance/select-kota', $data);
    }


    // public function pencarianBySlamet()
    // {
    //     $data['tittle'] = 'Dashboard Riwayat lamar Freelance';
    //     $data['judul'] = 'Selamat Datang di Dashboard Freelance ';
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //     $data['lowongan'] = $this->load->model('Freelance_model', 'freelance');
    //     // Pagination
    //     $this->load->library('pagination');
    //     // ambil data keyword
    //     if ($this->input->post('cari')) {
    //         $data['keyword'] = $this->input->post('keyword');
    //         $this->session->set_userdata('keyword', $data['keyword']);
    //     } else {
    //         $data['keyword'] = null;
    //     }

    //     // config
    //     $this->db->like('judul', $data['keyword']);
    //     // $this->db->or_like('lokasi', $data['keyword']);
    //     $this->db->or_like('deskripsi', $data['keyword']);
    //     $this->db->or_like('persyaratan', $data['keyword']);
    //     $this->db->or_like('max_calon_pegawai', $data['keyword']);
    //     $this->db->or_like('tgl_buat', $data['keyword']);
    //     $this->db->or_like('batas_tgl', $data['keyword']);
    //     $this->db->from('lowongan');
    //     $config['total_rows'] = $this->db->count_all_results();
    //     $data['total_rows'] = $config['total_rows'];
    //     $config['per_page'] = 5;

    //     // initialize
    //     $this->pagination->initialize($config);
    //     $data['lowongan'] = $this->load->model('Freelance_model', 'freelance');

    //     $data['lowongan'] = $this->freelance->getAlllowongan2();
    //     $data['kategori'] = $this->freelance->kategorilowongan();
    //     $data['start'] = $this->uri->segment(4);
    //     $data['lowongan'] = $this->freelance->getlowongan($config['per_page'], $data['start'], $data['keyword']);

    //     // $data['lowongan'] = $this->db->get('lowongan')->result_array();
    //     $this->db->join('kota', 'kota.id_kota = cv.id_kota');
    //     // $this->db->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi');
    //     // $this->db->join('agama', 'agama.id_agama = cv.id_agama');
    //     // $data['cv'] = $this->db->get('cv')->result_array();
    //     // echo 'Selamat Datang di Halaman Selanjutnya ' . $data['user']['username'];
    //     $this->load->view('template_freelance/header_dashboard_freelance', $data);
    //     $this->load->view('template_freelance/sidebar_dashboard_freelance', $data);
    //     $this->load->view('template_freelance/topbar_dashboard_freelance', $data);
    //     $this->load->view('freelance/pencarian', $data);
    //     $this->load->view('template_freelance/footer_dashboard_freelance', $data);
    // }
    public function melamar($id_lowongan)
    {
        $data['tittle'] = 'Melamar Lowongan Kerja';
        $data['judul'] = 'Selamat Datang di Dashboard Freelance ';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $kode  = "P-";
        $query     = "SELECT MAX(TRIM(REPLACE(no_registrasi,'P-', ''))) as no_regis
                 FROM permintaan_lowongan WHERE no_registrasi LIKE '$kode%'";
        $baris = $this->db->query($query);
        $akhir = $baris->row()->no_regis;
        $akhir++;
        $no_registrasi    =str_pad($akhir, 3, "0", STR_PAD_LEFT);
        $no_registrasi    = "P-".$no_registrasi;
        $this->db->insert('permintaan_lowongan', [
            'id_user_pengirim' => $data['user']['id'],
            'id_lowongan_pekerjaan' => $id_lowongan,
            'no_registrasi' => $no_registrasi,
            'waktu_melamar' => date('Y-m-d H:i:s'),
            'status' => 'Pending'
        ]);
        $this->db->insert('tracking', [
            'id_permintaan_lowongan' => $this->db->insert_id(),
            'status' => 'Lamaran dipending',
            'waktu' => date('Y-m-d H:i:s'),
            'keterangan' => 'Dalam proses penyeleksian data'
        ]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Lamaran Anda sudah tersimpan
        </div>');
        redirect('Freelance/riwayat_lamar');
    }

    public function hapusPermintaanLowongan($id_permintaan)
    {
        $data['tittle'] = 'Melamar Lowongan Kerja';
        $data['judul'] = 'Selamat Datang di Dashboard Freelance ';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->delete('permintaan_lowongan', ['id_permintaan' => $id_permintaan]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Lamaran Anda sudah dibatalkan
        </div>');
        redirect('Freelance/riwayat_lamar');
    }
    public function editprofil()
    {
        $data['tittle'] = 'Edit Profil';
        $data['judul'] = 'Selamat Datang di Edit Profil ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        // echo 'Selamat Datang di Halaman Selanjutnya ' . $data['user']['username'];
        if ($this->form_validation->run() == false) {
            $this->load->view('template_freelance/header_dashboard_freelance', $data);
            $this->load->view('template_freelance/sidebar_dashboard_freelance', $data);
            $this->load->view('template_freelance/topbar_dashboard_freelance', $data);
            $this->load->view('freelance/editprofil', $data);
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
            redirect('Freelance/editprofil');
        }
    }
    public function kategori()
    {
        $data['tittle'] = 'Dashboard Riwayat lamar Freelance';
        $data['judul'] = 'Selamat Datang di Dashboard Freelance ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Freelance_model', 'freelance');
        // Pagination
        $this->load->library('pagination');
        // ambil data keyword
        if ($this->input->post('cari')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = null;
        }

        // config
        $this->db->like('judul', $data['keyword']);
        // $this->db->or_like('lokasi', $data['keyword']);
        $this->db->or_like('deskripsi', $data['keyword']);
        $this->db->or_like('persyaratan', $data['keyword']);
        $this->db->or_like('max_calon_pegawai', $data['keyword']);
        $this->db->or_like('tgl_buat', $data['keyword']);
        $this->db->or_like('batas_tgl', $data['keyword']);
        $this->db->from('lowongan');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;

        // initialize
        $this->pagination->initialize($config);

        $data['kategori'] = $this->Freelance_model->kategorilowongan();
        $data['lowongan'] = $this->freelance->getAlllowongan();
        $data['start'] = $this->uri->segment(4);
        $data['lowongan'] = $this->freelance->getlowongan($config['per_page'], $data['start'], $data['keyword']);

        // $data['lowongan'] = $this->db->get('lowongan')->result_array();
        // $this->db->join('kota', 'kota.id_kota = cv.id_kota');
        // $this->db->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi');
        // $this->db->join('agama', 'agama.id_agama = cv.id_agama');
        // $data['cv'] = $this->db->get('cv')->result_array();
        // echo 'Selamat Datang di Halaman Selanjutnya ' . $data['user']['username'];
        $this->load->view('template_freelance/header_dashboard_freelance', $data);
        $this->load->view('template_freelance/sidebar_dashboard_freelance', $data);
        $this->load->view('template_freelance/topbar_dashboard_freelance', $data);
        $this->load->view('freelance/sales', $data);
        $this->load->view('template_freelance/footer_dashboard_freelance', $data);
    }
    public function kategori_supir()
    {
        $data['tittle'] = 'Dashboard Riwayat lamar Freelance';
        $data['judul'] = 'Selamat Datang di Dashboard Freelance ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Freelance_model', 'freelance');
        // Pagination
        $this->load->library('pagination');
        // ambil data keyword
        if ($this->input->post('cari')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = null;
        }

        // config
        $this->db->like('judul_lowongan', $data['keyword']);
        $this->db->or_like('nama_perusahaan', $data['keyword']);
        $this->db->or_like('bidang_lowongan', $data['keyword']);
        $this->db->or_like('keahlian', $data['keyword']);
        // $this->db->or_like('kota', $data['keyword']);
        $this->db->or_like('gaji', $data['keyword']);
        $this->db->or_like('provinsi', $data['keyword']);
        $this->db->from('lowongan');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;

        // initialize
        $this->pagination->initialize($config);

        // $data['kategori'] = $this->Freelance_model->kategorilowongan();
        $data['lowongan'] = $this->freelance->getAlllowongan();
        $data['start'] = $this->uri->segment(4);
        $data['lowongan'] = $this->freelance->getlowongan($config['per_page'], $data['start'], $data['keyword']);

        // $data['lowongan'] = $this->db->get('lowongan')->result_array();
        // $this->db->join('kota', 'kota.id_kota = cv.id_kota');
        // $this->db->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi');
        // $this->db->join('agama', 'agama.id_agama = cv.id_agama');
        // $data['cv'] = $this->db->get('cv')->result_array();
        // echo 'Selamat Datang di Halaman Selanjutnya ' . $data['user']['username'];
        $this->load->view('template_freelance/header_dashboard_freelance', $data);
        $this->load->view('template_freelance/sidebar_dashboard_freelance', $data);
        $this->load->view('template_freelance/topbar_dashboard_freelance', $data);
        $this->load->view('freelance/sales', $data);
        $this->load->view('template_freelance/footer_dashboard_freelance', $data);
    }
    public function kategori_guru()
    {
        $data['tittle'] = 'Dashboard Riwayat lamar Freelance';
        $data['judul'] = 'Selamat Datang di Dashboard Freelance ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        // Pagination
        $this->load->library('pagination');
        // ambil data keyword
        if ($this->input->post('cari')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = null;
        }

        // config
        $this->db->like('judul_lowongan', $data['keyword']);
        $this->db->or_like('nama_perusahaan', $data['keyword']);
        $this->db->or_like('bidang_lowongan', $data['keyword']);
        $this->db->or_like('keahlian', $data['keyword']);
        $this->db->or_like('kota', $data['keyword']);
        $this->db->or_like('gaji', $data['keyword']);
        $this->db->or_like('provinsi', $data['keyword']);
        $this->db->from('lowongan');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;

        // initialize
        $this->pagination->initialize($config);

        $data['kategori'] = $this->Freelance_model->kategorilowongan();
        $data['lowongan'] = $this->freelance->getAlllowongan();
        $data['start'] = $this->uri->segment(4);
        $data['lowongan'] = $this->freelance->getlowongan($config['per_page'], $data['start'], $data['keyword']);

        // $data['lowongan'] = $this->db->get('lowongan')->result_array();
        // $this->db->join('kota', 'kota.id_kota = cv.id_kota');
        // $this->db->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi');
        // $this->db->join('agama', 'agama.id_agama = cv.id_agama');
        // $data['cv'] = $this->db->get('cv')->result_array();
        // echo 'Selamat Datang di Halaman Selanjutnya ' . $data['user']['username'];
        $this->load->view('template_freelance/header_dashboard_freelance', $data);
        $this->load->view('template_freelance/sidebar_dashboard_freelance', $data);
        $this->load->view('template_freelance/topbar_dashboard_freelance', $data);
        $this->load->view('freelance/sales', $data);
        $this->load->view('template_freelance/footer_dashboard_freelance', $data);
    }
    public function kategori_programer()
    {
        $data['tittle'] = 'Dashboard Riwayat lamar Freelance';
        $data['judul'] = 'Selamat Datang di Dashboard Freelance ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['lowongan'] = $this->load->model('Freelance_model', 'freelance');
        // Pagination
        $this->load->library('pagination');
        // ambil data keyword
        if ($this->input->post('cari')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = null;
        }

        // config
        $this->db->like('judul_lowongan', $data['keyword']);
        $this->db->or_like('nama_perusahaan', $data['keyword']);
        $this->db->or_like('bidang_lowongan', $data['keyword']);
        $this->db->or_like('keahlian', $data['keyword']);
        $this->db->or_like('kota', $data['keyword']);
        $this->db->or_like('gaji', $data['keyword']);
        $this->db->or_like('provinsi', $data['keyword']);
        $this->db->from('lowongan');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;

        // initialize
        $this->pagination->initialize($config);

        $data['kategori'] = $this->Freelance_model->kategorilowongan();
        $data['lowongan'] = $this->freelance->getAlllowongan();
        $data['start'] = $this->uri->segment(4);
        $data['lowongan'] = $this->freelance->getlowongan($config['per_page'], $data['start'], $data['keyword']);

        // $data['lowongan'] = $this->db->get('lowongan')->result_array();
        // $this->db->join('kota', 'kota.id_kota = cv.id_kota');
        // $this->db->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi');
        // $this->db->join('agama', 'agama.id_agama = cv.id_agama');
        // $data['cv'] = $this->db->get('cv')->result_array();
        // echo 'Selamat Datang di Halaman Selanjutnya ' . $data['user']['username'];
        $this->load->view('template_freelance/header_dashboard_freelance', $data);
        $this->load->view('template_freelance/sidebar_dashboard_freelance', $data);
        $this->load->view('template_freelance/topbar_dashboard_freelance', $data);
        $this->load->view('freelance/sales', $data);
        $this->load->view('template_freelance/footer_dashboard_freelance', $data);
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
            JOIN perusahaan ON perusahaan.id_user = user.id
            -- JOIN permintaan_lowongan ON permintaan_lowongan.id_user_pengirim = user.id
            -- JOIN lowongan ON lowongan.id_lowongan = permintaan_lowongan.id_lowongan_pekerjaan
            
            WHERE (id_user_from = $user->id OR id_user_to = $user->id) 
            AND user.id != $user->id 
            -- AND permintaan_lowongan.id_user_pengirim = $user->id

            AND username LIKE '%$search%'

            GROUP BY IF(id_user_to = $user->id, id_user_from, id_user_to) ORDER BY chat.id DESC
        ")->result();

        $data['perusahaan'] = $this->db->query("
            SELECT *, user.id AS idu FROM user 

            JOIN perusahaan ON perusahaan.id_user = user.id
            -- JOIN lowongan ON lowongan.id_perusahaan = perusahaan.id_profil
            -- JOIN permintaan_lowongan ON permintaan_lowongan.id_lowongan_pekerjaan = lowongan.id_lowongan 
            
            -- WHERE permintaan_lowongan.id_user_pengirim = $user->id

            GROUP BY user.id
            ORDER BY perusahaan.nama_perusahaan ASC
        ")->result_array();


        $data['pertanyaan'] = $this->db->get('pertanyaan')->result_array();

        $this->load->view('template_freelance/header_dashboard_freelance', $data);
        $this->load->view('template_freelance/sidebar_dashboard_freelance', $data);
        $this->load->view('template_freelance/topbar_dashboard_freelance', $data);
        $this->load->view('freelance/chat', $data);
        $this->load->view('template_freelance/footer_dashboard_freelance');
    }

    public function getChat()
    {
        $id_perusahaan = $this->input->post('id_perusahaan');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->join('perusahaan', 'perusahaan.id_user=user.id');
        $data['perusahaan'] = $this->db->get_where('user', ['id' => $id_perusahaan])->row_array();
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row();

        $this->db->where('id_user_from', $id_perusahaan);
        $this->db->where('id_user_to', $user->id);
        $this->db->update('chat', ['is_read' => 1]);

        $data['chat'] = $this->db->query("
            SELECT * FROM chat 

            JOIN user ON IF(chat.id_user_from = $user->id, chat.id_user_to, chat.id_user_from) = user.id 
            JOIN perusahaan ON perusahaan.id_user = user.id
            
            WHERE (id_user_from = $user->id AND id_user_to = $id_perusahaan) 
            OR (id_user_to = $user->id AND id_user_from = $id_perusahaan)

            ORDER BY time ASC
        ")->result();

        
        $data['pertanyaan'] = $this->db->get('pertanyaan')->result_array();

        return $this->load->view('freelance/message', $data);
    }


    public function getChat2($id_perusahaan = null)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->join('perusahaan', 'perusahaan.id_user=user.id');
        $data['perusahaan'] = $this->db->get_where('user', ['id' => $id_perusahaan])->row_array();
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row();

        $this->db->where('id_user_from', $id_perusahaan);
        $this->db->where('id_user_to', $user->id);
        $this->db->update('chat', ['is_read' => 1]);

        $data['chat'] = $this->db->query("
            SELECT * FROM chat 

            JOIN user ON IF(chat.id_user_from = $user->id, chat.id_user_to, chat.id_user_from) = user.id 
            JOIN perusahaan ON perusahaan.id_user = user.id
            
            WHERE (id_user_from = $user->id AND id_user_to = $id_perusahaan) 
            OR (id_user_to = $user->id AND id_user_from = $id_perusahaan)

            ORDER BY time ASC
        ")->result();

        
        $data['pertanyaan'] = $this->db->get('pertanyaan')->result_array();

        return $this->load->view('freelance/message-2', $data);
    }


    public function kirimChat()
    {
        $id_perusahaan = $this->input->post('id_perusahaan');
        $pesan = $this->input->post('pesan');

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->join('perusahaan', 'perusahaan.id_user=user.id');
        $data['perusahaan'] = $this->db->get_where('user', ['id' => $id_perusahaan])->row_array();
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row();

        $this->db->insert('chat', [
            'id_user_from' => $user->id,
            'id_user_to' => $id_perusahaan,
            'message' => nl2br($pesan),
            'time' => date('Y-m-d H:i:s'),
            'status' => 1,
            'is_read' => 0
        ]);

        $this->getChat2($id_perusahaan);
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
        // redirect($_SERVER['HTTP_REFERER']);
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

        $data['users'] = $this->db->query("
            SELECT * FROM user
            ORDER BY user.username ASC
        ")->result_array();

        $this->load->view('template_freelance/header_dashboard_freelance', $data);
        $this->load->view('template_freelance/sidebar_dashboard_freelance', $data);
        $this->load->view('template_freelance/topbar_dashboard_freelance', $data);
        $this->load->view('freelance/chat-grup', $data);
        $this->load->view('template_freelance/footer_dashboard_freelance');
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

        return $this->load->view('freelance/message-grup', $data);
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

        return $this->load->view('freelance/message-grup-2', $data);
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
