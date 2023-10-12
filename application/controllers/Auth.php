<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User/M_user');
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        // if ($this->session->userdata('email')) {
        //     redirect(('User'));
        // };
        $this->form_validation->set_rules('email', 'email Anda', 'required|trim');
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim'

        );

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Akun';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_loginn();
        }
    }
    private function _loginn()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        // $user1 = $this->db->get_where('freelance', ['id_free' => $id_free])->row_array();
        // $user1 = $this->db->get_where('perusahaan', ['id_free' => $id_free])->row_array();
        // Jika usernya ada
        if ($user) {
            // Jika usernya aktif
            if ($user['is_active'] == 1) {
                // Cek Password di login
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'id' => $user['id']
                    ];
                    // if ($user1 && $user2){
                    // if (password_verify($password, $user1['password'] && )) {
                    //     $data = [
                    //         'email' => $user1['email'],
                    //         'id' => $user1['id'],
                    //     ];

                    // }

                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('Admin');
                    } elseif ($user['role_id'] == 2) {
                        redirect('Freelance');
                    } elseif ($user['role_id'] == 3) {
                        redirect('Perusahaan');
                    }
                }
                //Jika password salah maka akan muncul pesan berikut 
                else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password Anda Masukkan Salah, Silahkan Periksa Kembali
                    </div>');
                    redirect('auth');
                }
                // jika usernya belum aktif maka akan muncul pesan berikut
            } elseif ($user['is_active'] == 2) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Akun Anda dibanned atau Terblokir. Hubungi Customer Service!
                </div>');
                redirect('auth');                
            } else {

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email anda belum Aktivisasi, Silahkan melakukan Aktivasi dulu
                </div>');
                redirect('auth');
            }
            // Jika usernya belum terdaftar, maka akan muncul pesan 
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        	Email anda belum terdaftar sebagai Akun , Silahkan Daftar Akun dulu
          </div>');
            redirect('auth');
        }
    }

    public function daftar_perusahaan()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]');
        // $this->form_validation->set_rules('email_perusahaan', 'Email Perusahaan', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('email_perusahaan', 'Email Perusahaan', 'required|trim|valid_email|is_unique[user.email]',[
            'is_unique' => 'Email Sudah Terpakai!'
        ]);
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[4]|matches[password2]',
            [
                'matches' => 'Password Tidak sama',
                'min_length' => 'Password Sedikit sekali'
            ]

        );
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        // $this->load->library('form_validation') ;
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Daftar Akun Perusahaan';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registrasi_perusahaan');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'email' => htmlspecialchars($this->input->post('email_perusahaan', true)),
                'image' => 'default.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => '3',
                'is_active' => '1',
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->db->insert('perusahaan', ['id_user' => $this->db->insert_id(), 'no_tlp' => 0]);
            // $this->_sendEmail($token,'verify');
            // redirect('Auth');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Silahkan Isi Data Pribadi Selanjutnya ! </div>');
            redirect('Auth');
        }
    }
    public function daftar_freelance()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]');
        $this->form_validation->set_rules('nama_freelance', 'Nama Freelance', 'required|trim');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('id_agama', 'Agama', 'required|trim');
        $this->form_validation->set_rules('gol_darah', 'Golongan Darah', 'required|trim');
        $this->form_validation->set_rules('tinggi', 'Tinggi Badan', 'required|trim');
        $this->form_validation->set_rules('berat', 'Berat Badan', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|trim');
        $this->form_validation->set_rules('id_kota', 'Kota', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');
        $this->form_validation->set_rules('keahlian', 'Keahlian', 'required|trim');
        $this->form_validation->set_rules('sd', 'SD', 'required|trim');
        $this->form_validation->set_rules('smp', 'SMP', 'required|trim');
        $this->form_validation->set_rules('sma', 'SMA', 'required|trim');
        $this->form_validation->set_rules('universitas', 'Kuliah', 'required|trim');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim');
        $this->form_validation->set_rules('email_freelance', 'Email Freelance', 'required|trim|valid_email|is_unique[user.email]',[
            'is_unique' => 'Email Sudah Terpakai!'
        ]);
        // $this->form_validation->set_rules('email_perusahaan', 'Email Perusahaan', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim',
            [
                'matches' => 'Password Tidak sama',
                'min_length' => 'Password Sedikit sekali'
            ]

        );
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->db->where_not_in('id_agama', [0]);
        $data['agama'] = $this->db->get('agama')->result();
        $data['provinsi'] = $this->db->get('provinsi')->result();
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Daftar Akun Freelance';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registrasi_freelance');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email_freelance', true);
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => '2',
                'is_active' => '0',
                'date_created' => time()
            ];

            // $token = base64_encode(random_bytes(32));
            $token = base64_encode(random_bytes(32));
            $usertoken = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];


            $this->db->insert('user', $data);
            $upload_ijazah_sd = $_FILES['ijazah_sd']['name'];
            if ($upload_ijazah_sd) {
                $config['allowed_types'] = 'gif|jpg|png|svg|pdf|jpeg';
                $config['upload_path'] = './assets/doc/ijazah';
                $config['max_size']     = '1500000';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('ijazah_sd')) {
                    $ijazah_sd = $this->upload->data('file_name');
                } else{
                    $this->session->set_flashdata('flash_error', 'Gagal diunggah');
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
                    redirect('Auth/daftar_freelance');
                }
            } else{
                $ijazah_sd = '';
            }
            $upload_ijazah_smp = $_FILES['ijazah_smp']['name'];
            if ($upload_ijazah_smp) {
                $config['allowed_types'] = 'gif|jpg|png|svg|pdf|jpeg';
                $config['upload_path'] = './assets/doc/ijazah';
                $config['max_size']     = '1500000';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('ijazah_smp')) {
                    $ijazah_smp = $this->upload->data('file_name');
                } else{
                    $this->session->set_flashdata('flash_error', 'Gagal diunggah');
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
                    redirect('Auth/daftar_freelance');
                }
            } else{
                $ijazah_smp = '';
            }
            $upload_ijazah_sma = $_FILES['ijazah_sma']['name'];
            if ($upload_ijazah_sma) {
                $config['allowed_types'] = 'gif|jpg|png|svg|pdf|jpeg';
                $config['upload_path'] = './assets/doc/ijazah';
                $config['max_size']     = '1500000';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('ijazah_sma')) {
                    $ijazah_sma = $this->upload->data('file_name');
                } else{
                    $this->session->set_flashdata('flash_error', 'Gagal diunggah');
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
                    redirect('Auth/daftar_freelance');
                }
            } else{
                $ijazah_sma = '';
            }
            $upload_ijazah_universitas = $_FILES['ijazah_universitas']['name'];
            if ($upload_ijazah_universitas) {
                $config['allowed_types'] = 'gif|jpg|png|svg|pdf|jpeg';
                $config['upload_path'] = './assets/doc/ijazah';
                $config['max_size']     = '1500000';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('ijazah_universitas')) {
                    $ijazah_universitas = $this->upload->data('file_name');
                } else{
                    $this->session->set_flashdata('flash_error', 'Gagal diunggah');
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
                    redirect('Auth/daftar_freelance');
                }
            } else{
                $ijazah_universitas = '';
            }
            $this->db->insert('cv', [
                'id_user' => $this->db->insert_id(),
                'nama' => $this->input->post('nama_freelance'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'id_agama' => $this->input->post('id_agama'),
                'gol_darah' => $this->input->post('gol_darah'),
                'tinggi' => $this->input->post('tinggi'),
                'berat' => $this->input->post('berat'),
                'no_telp' => $this->input->post('no_telp'),
                'id_kota' => $this->input->post('id_kota'),
                'alamat' => $this->input->post('alamat'),
                'status' => $this->input->post('status'),
                'keahlian' => $this->input->post('keahlian'),
                'sd' => $this->input->post('sd'),
                'smp' => $this->input->post('smp'),
                'sma' => $this->input->post('sma'),
                'universitas' => $this->input->post('universitas'),
                'jurusan' => $this->input->post('jenjang_pendidikan').' '.$this->input->post('jurusan'),
                'ijazah_sd' => $ijazah_sd,
                'ijazah_smp' => $ijazah_smp,
                'ijazah_sma' => $ijazah_sma,
                'ijazah_universitas' => $ijazah_universitas,
            ]);
            $this->db->insert('user_token', $usertoken);


            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Silahkan Isi Data Pribadi Selanjutnya ! </div>');
            redirect('Auth');
        }
    }
    public function cariKota($id_provinsi)
    {
        $data['kota'] = $this->db->get_where('kota', ['id_provinsi' => $id_provinsi])->result();
        $this->load->view('auth/select-kota', $data);
    }

    
    private function _sendEmail($token, $type)
    {
        // $config = [
        //     'mailtype'  => 'html',
        //     'charset'   => 'utf-8',
        //     'protocol'  => 'smtp',
        //     'smtp_host' => 'ssl://smtp.googlemail.com',
        //     // 'smtp_host' => 'smtp.gmail.com',
        //     'smtp_user' => 'amermrcl@gmail.com',  // Email gmail
        //     'smtp_pass'   => 'Bak0yewtf',  // Password gmail
        //     'smtp_crypto' => 'ssl',
        //     'smtp_port'   => 465,
        //     'crlf'    => "\r\n",
        //     'newline' => "\r\n"
        // ];

        // $this->load->library('email', $config);
        // $this->email->initialize($config);

        // $this->email->from('amermrcl@gmail.com', 'Web freelance');
        // $this->email->to($this->input->post('email_freelance'));

        // if ($type == 'verify') {
        //     $this->email->subject('Account Verification');
        //     $this->email->message('Hello world Ini adalah contoh email yang dikirim menggunakan SMTP Gmail pada CodeIgniter. Click link untuk verifikasi akun : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email_freelance') . '&token=' . urlencode($token) . '">Aktifasi</a>');
        // }

        // if ($this->email->send()) {
        //     return true;
        // } else {
        //     echo $this->email->print_debugger();
        // }

        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'amermrcl@gmail.com',
            'smtp_pass' => 'Bak0yewtf',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'chatset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config); 
        $this->email->from('amermrcl@gmail.com', 'SLAMET SETIADI RIYANTO');
        $this->email->to($this->input->post('email_freelance'));
        if ($type== 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify your account : <a href="'.base_url('auth/verify?email=').$this->input->post('email_freelance').'&token='.urlencode($token).'">Activate</a>');
        } elseif($type== 'forgot'){
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="'.base_url('auth/resetPassword?email=').$this->input->post('email_freelance').'&token='.urlencode($token).'">Reset Password</a>');
        }
        if ($this->email->send()) {
            return true;
        } else{
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        // $email = $this->input->get('email');
        // $token = $this->input->get('token');

        // $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // if ($user) {
        //     $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
        //     if ($user_token) {
        //         if (time() - $user_token['date_created'] < (60 * 60)) {
        //             $this->db->set('is_active', 1);
        //             $this->db->where('email', $email);
        //             $this->db->update('user');


        //             $this->db->delete('user_token', ['email' => $email]);
        //             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email .
        //                 'Aktivasi yang dilakukan berhasil, tolong login </div>');
        //             redirect('Auth');
        //         } else {
        //             $this->db->delete('user', ['email' => $email]);
        //             $this->db->delete('user_token', ['email' => $email]);
        //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        //             Aktivasi yang dilakukan gagal, Token sudah kadaluarsa </div>');
        //             redirect('Auth');
        //         }
        //     } else {
        //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        //         Aktivasi yang dilakukan gagal, Token berbeda </div>');
        //         redirect('Auth');
        //     }
        // } else {
        //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        //         Aktivasi yang dilakukan gagal </div>');
        //     redirect('Auth');
        // }
        echo $this->input->get('email');
        echo $this->input->get('token');
die;
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            if ($user['is_active']!=1) {
                $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
                if ($user_token) {
                    if (time() - $user_token['date_created'] < (60*60*24)) {
                        $this->db->set('is_active', 1);
                        $this->db->where('email', $email);
                        $this->db->update('user');
                        $this->db->delete('user_token',['email' => $email]);
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        '.$email.' has been activated. Please Login! Please Check Your Email!
                        </div>');
                        redirect('auth');
                    } else{
                        $this->db->delete('user',['email' => $email]);
                        $this->db->delete('user_token',['email' => $email]);
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Account activation failed: Token Expired!
                        </div>');
                        redirect('auth');
                    }
                } else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Account activation failed: Invalid Token!
                    </div>');
                    redirect('auth');
                }
            } else{
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                Your account has been activated!
                </div>');
                redirect('auth');
            }
        } else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Account activation failed: Wrong Email!
            </div>');
            redirect('auth');
        }
    }

    public function daftar_lanjut_freelance()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal lahir', 'required|trim');
        $this->form_validation->set_rules('bln_lahir', 'Bulan lahir', 'required|trim');
        $this->form_validation->set_rules('thn_lahir', 'Tahun lahir', 'required|trim');
        $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');
        $this->form_validation->set_rules('gol_darah', 'Golongan Darah', 'required|trim');
        $this->form_validation->set_rules('tinggi', 'Tinggi Badan', 'required|trim');
        $this->form_validation->set_rules('berat', 'Berat Badan', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No. Hp', 'required|trim');
        $this->form_validation->set_rules('id_kota', 'Kota', 'required|trim');
        // $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');



        if ($this->form_validation->run() == false) {

            $data['title'] = 'Daftar Akun Freelance';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registrasi_lanjut_freelance');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama_lengkap', true)),
                'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir', true)),
                'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
                'bln_lahir' => htmlspecialchars($this->input->post('bln_lahir', true)),
                'thn_lahir' => htmlspecialchars($this->input->post('thn_lahir', true)),
                'agama' => htmlspecialchars($this->input->post('agama', true)),
                'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
                'status' => htmlspecialchars($this->input->post('status', true)),
                'gol_darah' => htmlspecialchars($this->input->post('gol_darah', true)),
                'tinggi' => htmlspecialchars($this->input->post('tinggi', true)),
                'berat' => htmlspecialchars($this->input->post('berat', true)),
                'no_telp' => htmlspecialchars($this->input->post('no_hp', true)),
                'id_kota' => htmlspecialchars($this->input->post('id_kota', true)),
                // 'provinsi' => htmlspecialchars($this->input->post('provinsi', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),

            ];
            // $this->db->insert('cv', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Sukses Anda Sudah Mengisi Form Data Pribadi, Silahkan Lanjutkan ! </div>');
            redirect('auth/daftar_lanjut_freelance2');
        }
    }
    public function daftar_lanjut_freelance2()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('sd', 'SD', 'required|trim');
        $this->form_validation->set_rules('smp', 'SMP', 'required|trim');
        $this->form_validation->set_rules('sma', 'SMA', 'required|trim');
        $this->form_validation->set_rules('universitas', 'Universitas', 'required|trim');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim');
        $this->form_validation->set_rules('gelar', 'Gelar', 'required|trim');
        if ($this->form_validation->run() == false) {

            $data['title'] = 'Daftar Akun Freelance';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registrasi_lanjut_freelance2');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'sd' => htmlspecialchars($this->input->post('sd', true)),
                'smp' => htmlspecialchars($this->input->post('smp', true)),
                'sma' => htmlspecialchars($this->input->post('sma', true)),
                'universitas' => htmlspecialchars($this->input->post('universitas', true)),
                'jurusan' => htmlspecialchars($this->input->post('jurusan', true)),
                'gelar' => htmlspecialchars($this->input->post('gelar', true)),

            ];
            // $this->db->insert('cv', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Sukses Akun Anda Sudah Terdaftar, Silahkan Login ! </div>');
            redirect('Auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Anda Telah Keluar Dari Dashboard </div>');
        redirect('Auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
    public function home()
    {
        $data['tittle'] = 'Beranda JobAgency';
        $data['judul'] = 'Selamat Datang di Dashboard Freelance ';
        // $data['user'] = $this->db->get_where('user', ['email' =>
        // $this->session->userdata('email')])->row_array();
        // echo 'Selamat Datang di Halaman Selanjutnya ' . $data['user']['username'];
        $this->load->view('homepage/beranda', $data);
    }
    public function jobs($id_provinsi = null, $id_kota = null)
    {
        $data['tittle'] = 'JobAgency';
        $data['judul'] = 'Selamat Datang di Dashboard Freelance ';
        // $data['user'] = $this->db->get_where('user', ['email' =>
        // $this->session->userdata('email')])->row_array();
        // echo 'Selamat Datang di Halaman Selanjutnya ' . $data['user']['username'];
        $data['id_provinsi'] = $id_provinsi;
        $data['id_kota'] = $id_kota;

        if ($id_provinsi) {
            $this->db->where('kota.id_provinsi', $id_provinsi);
        }
        if ($id_kota) {
            $this->db->where('kategori.id_kota', $id_kota);
        }
        $data['lowongan'] = $this->Freelance_model->getAlllowongan2();

        $data['keahlian'] = $this->db->get('keahlian');
        $data['jenis_pekerjaan'] = $this->db->get('jenis_pekerjaan');
        $data['pendidikan'] = $this->db->get('pendidikan');
        $data['pengalaman'] = $this->db->get('pengalaman');
        $data['provinsi'] = $this->db->get('provinsi');
        $data['keahlian'] = $this->db->get('keahlian');
        if ($id_provinsi) {
            $data['kota'] = $this->db->get_where('kota', ['id_provinsi' => $id_provinsi]);
        }

        $this->load->view('homepage/jobs', $data);
    }
    public function about()
    {
        $data['tittle'] = 'Tentang Kami JobAgency';
        $data['judul'] = 'Selamat Datang di Dashboard Freelance ';
        // $data['user'] = $this->db->get_where('user', ['email' =>
        // $this->session->userdata('email')])->row_array();
        // echo 'Selamat Datang di Halaman Selanjutnya ' . $data['user']['usernama'];
        $this->load->view('homepage/about', $data);
    }
    public function team()
    {
        $data['tittle'] = 'Tim Pengembang JobAgency';
        $data['judul'] = 'Selamat Datang di Dashboard Freelance ';
        // $data['user'] = $this->db->get_where('user', ['email' =>
        // $this->session->userdata('email')])->row_array();
        // echo 'Selamat Datang di Halaman Selanjutnya ' . $data['user']['username'];
        $this->load->view('homepage/team', $data);
    }
    public function kontak()
    {
        $data['tittle'] = 'Hubungi JobAgency';
        $data['judul'] = 'Selamat Datang di Dashboard Freelance ';
        // $data['user'] = $this->db->get_where('user', ['email' =>
        // $this->session->userdata('email')])->row_array();
        // echo 'Selamat Datang di Halaman Selanjutnya ' . $data['user']['username'];
        $this->load->view('homepage/kontak', $data);
    }
}
