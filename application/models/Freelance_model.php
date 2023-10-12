<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Freelance_model extends CI_Model
{
    public function getAlldatalowongan()
    {
        $this->db->join('kategori', 'lowongan.id_lowongan = kategori.id_lowongan');
        $this->db->join('jenis_pekerjaan', 'kategori.id_jenis_pekerjaan = jenis_pekerjaan.id_jenis_pekerjaan');
        $this->db->join('pendidikan', 'kategori.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('pengalaman', 'kategori.id_pengalaman = pengalaman.id_pengalaman');
        $this->db->join('kota', 'kategori.id_kota = kota.id_kota');
        $this->db->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.id_profil');
        $this->db->join('user', 'perusahaan.id_user = user.id');
        $query = $this->db->get('lowongan');
        // $query = "SELECT `lowongan`.*,`user`.`nama`,`email` FROM `lowongan` JOIN `user` ON `lowongan`.`id_lowongan`=`user`.`id`";
        return $this->db->query($query)->result_array();
    }
    public function getAllPermintaanLowongan($id_user)
    {
        $this->db->select('*, perusahaan.id_user AS idup');
        $this->db->join('lowongan', 'permintaan_lowongan.id_lowongan_pekerjaan = lowongan.id_lowongan');
        $this->db->join('kategori', 'lowongan.id_lowongan = kategori.id_lowongan');
        $this->db->join('jenis_pekerjaan', 'kategori.id_jenis_pekerjaan = jenis_pekerjaan.id_jenis_pekerjaan');
        $this->db->join('pendidikan', 'kategori.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('pengalaman', 'kategori.id_pengalaman = pengalaman.id_pengalaman');
        $this->db->join('kota', 'kategori.id_kota = kota.id_kota');
        $this->db->join('user', 'permintaan_lowongan.id_user_pengirim = user.id');
        $this->db->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.id_profil');
        return $this->db->get_where('permintaan_lowongan', ['id_user_pengirim' => $id_user])->result_array();
    }
    public function getPermintaanLowonganByTanggal($id_user, $tanggal)
    {
        $this->db->select('*, perusahaan.id_user AS idup');
        $this->db->join('lowongan', 'permintaan_lowongan.id_lowongan_pekerjaan = lowongan.id_lowongan');
        $this->db->join('kategori', 'lowongan.id_lowongan = kategori.id_lowongan');
        $this->db->join('jenis_pekerjaan', 'kategori.id_jenis_pekerjaan = jenis_pekerjaan.id_jenis_pekerjaan');
        $this->db->join('pendidikan', 'kategori.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('pengalaman', 'kategori.id_pengalaman = pengalaman.id_pengalaman');
        $this->db->join('kota', 'kategori.id_kota = kota.id_kota');
        $this->db->join('user', 'permintaan_lowongan.id_user_pengirim = user.id');
        $this->db->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.id_profil');
        return $this->db->get_where('permintaan_lowongan', [
            'id_user_pengirim' => $id_user, 
            'YEAR(waktu_melamar)' => date('Y', strtotime($tanggal)), 
            'MONTH(waktu_melamar)' => date('m', strtotime($tanggal)), 
            'DAY(waktu_melamar)' => date('d', strtotime($tanggal))
        ])->result_array();
    }
    public function getAlluser()
    {
        return $this->db->get('user')->result_array();
    }
    public function getUser($limit, $star, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('username', $keyword);
            $this->db->or_like('email', $keyword);
        }
        return $this->db->get('user', $limit, $star)->result_array();
    }

    public function countAlluser()
    {
        return $this->db->get('user')->num_rows();
    }
    public function countAlllowongan()
    {
        return $this->db->get('lowongan')->num_rows();
    }
    public function getAlllowongan()
    {
        $this->db->join('kategori', 'lowongan.id_lowongan = kategori.id_lowongan');
        $this->db->join('jenis_pekerjaan', 'kategori.id_jenis_pekerjaan = jenis_pekerjaan.id_jenis_pekerjaan');
        $this->db->join('pendidikan', 'kategori.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('pengalaman', 'kategori.id_pengalaman = pengalaman.id_pengalaman');
        $this->db->join('kota', 'kategori.id_kota = kota.id_kota');
        return $this->db->get('lowongan')->result_array();
    }
    public function getAlllowongan2()
    {
        $this->db->where('batas_tgl >=', date('Y-m-d'));
        $this->db->join('kategori', 'lowongan.id_lowongan = kategori.id_lowongan');
        $this->db->join('jenis_pekerjaan', 'kategori.id_jenis_pekerjaan = jenis_pekerjaan.id_jenis_pekerjaan');
        $this->db->join('pendidikan', 'kategori.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('pengalaman', 'kategori.id_pengalaman = pengalaman.id_pengalaman');
        $this->db->join('kota', 'kategori.id_kota = kota.id_kota');
        $this->db->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi');
        return $this->db->get('lowongan')->result_array();
    }
    public function getlowongan($limit, $star, $keyword = null)
    {
        $this->db->where('batas_tgl >=', date('Y-m-d'));
        if ($keyword) {
            $this->db->like('judul', $keyword);
            // $this->db->or_like('lokasi', $keyword);
            $this->db->or_like('deskripsi', $keyword);
            $this->db->or_like('persyaratan', $keyword);
            $this->db->or_like('max_calon_pegawai', $keyword);
            $this->db->or_like('tgl_buat', $keyword);
            $this->db->or_like('batas_tgl', $keyword);
        }
        $this->db->join('kategori', 'lowongan.id_lowongan = kategori.id_lowongan');
        $this->db->join('jenis_pekerjaan', 'kategori.id_jenis_pekerjaan = jenis_pekerjaan.id_jenis_pekerjaan');
        $this->db->join('pendidikan', 'kategori.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('pengalaman', 'kategori.id_pengalaman = pengalaman.id_pengalaman');
        $this->db->join('kota', 'kategori.id_kota = kota.id_kota');
        return $this->db->get('lowongan', $limit, $star)->result_array();
    }
    // public function detail_lowongan($id)
    // {
    //     $query = $this->db->get_where('lowongan', array('id' => $id))->row();
    //     return $query;
    // }
    public function ambilDetail($id_lowongan)
    {
        $this->db->join('kategori', 'lowongan.id_lowongan = kategori.id_lowongan');
        $this->db->join('jenis_pekerjaan', 'kategori.id_jenis_pekerjaan = jenis_pekerjaan.id_jenis_pekerjaan');
        $this->db->join('pendidikan', 'kategori.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('pengalaman', 'kategori.id_pengalaman = pengalaman.id_pengalaman');
        $this->db->join('kota', 'kategori.id_kota = kota.id_kota');
        return $this->db->get_where('lowongan', ['lowongan.id_lowongan' => $id_lowongan])->row_array();

        // $query = $this->db->get_where('lowongan', array('id_lowongan' => $id_lowongan))->row();
        // return $query;
        // return $this->db->get_where('lowongan', ['id_lowongan' => $id_lowongan])->row_array();
    }
    public function ambillamar()
    {
        // return $this->db->get_where('lamar_freelance', ['id_lamar' => ])->row_array();

        // $query = $this->db->get_where('lowongan', array('id_lowongan' => $id_lowongan))->row();
        // return $query;
        // return $this->db->get_where('lowongan', ['id_lowongan' => $id_lowongan])->row_array();
    }
    public function getcv($id_cv)
    {
        // $query = "SELECT `cv`.*, `user`.id
        // FROM user JOIN `cv` 
        // ON `user`.`id` = `cv`.`id_cv`
        // ";
        // return $this->db->query($query)->result_array;
        $this->db->join('kota', 'kota.id_kota = cv.id_kota');
        $this->db->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi');
        $this->db->join('agama', 'agama.id_agama = cv.id_agama');
        return $this->db->get_where('cv', ['id_cv' => $id_cv])->row_array();
    }
    public function kategorilowongan()
    {
        // return $this->db->get_where('lowongan', array('bidang_lowongan' => 'Sales Marketing'));
        $query = "SELECT * FROM `lowongan`WHERE persyaratan LIKE 'sarjana'";
        return $this->db->query($query)->result_array();
    }
    public function kategorisupir()
    {
        // return $this->db->get_where('lowongan', array('bidang_lowongan' => 'Sales Marketing'));
        $query = "SELECT * FROM `lowongan`WHERE bidang_lowongan LIKE 'supir'";
        return $this->db->query($query)->result_array();
    }
    public function kategoriguru()
    {
        // return $this->db->get_where('lowongan', array('bidang_lowongan' => 'Sales Marketing'));
        $query = "SELECT * FROM `lowongan`WHERE bidang_lowongan LIKE 'pengajar'";
        return $this->db->query($query)->result_array();
    }
    public function kategoriprogramer()
    {
        // return $this->db->get_where('lowongan', array('bidang_lowongan' => 'Sales Marketing'));
        $query = "SELECT * FROM `lowongan`WHERE bidang_lowongan LIKE 'programer'";
        return $this->db->query($query)->result_array();
    }
    // public function hitung_lowongan()
    // {
    //     // $query = "SELECT COUNT(id_lowongan) FROM lamar_freelance
    //     // ";
    //     $data = $this->db->SELECT_sum('id_lowongan')
    //         ->from('lamar_freelance');
    //     return $this->db->query($data)->result();
    // }
    public function hapus_portofolio($id)
    {
        $this->db->where('id_portofolio', $id);
        $this->db->delete('portofolio');
    }
}
