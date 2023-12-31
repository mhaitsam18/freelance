<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sendmail extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('email');
        date_default_timezone_set('Asia/Jakarta');
    }

    /**
     * Kirim email dengan SMTP Gmail.
     *
     */
    public function index()
    {
        // Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'amermrcl@gmail.com',  // Email gmail
            'smtp_pass'   => 'Bak0yewtf',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);
        $this->email->initialize($config);

        // Email dan nama pengirim
        $this->email->from('amermrcl@gmail.com', 'MasRud.com');

        // Email penerima
        $this->email->to('aan.gasir@gmail.com'); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

        // Subject email
        $this->email->subject('Kirim Email dengan SMTP Gmail CodeIgniter | MasRud.com');

        // Isi email
        $this->email->message("Ini adalah contoh email yang dikirim menggunakan SMTP Gmail pada CodeIgniter.<br><br> Klik <strong><a href='https://masrud.com/post/kirim-email-dengan-smtp-gmail' target='_blank' rel='noopener'>disini</a></strong> untuk melihat tutorialnya.");

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
        } else {
            echo 'Error! email tidak dapat dikirim.';
        }
    }
}
