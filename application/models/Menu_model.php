<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.menu 
                  FROM user_sub_menu JOIN `user_menu` 
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`menu_id`

        ";
        return $this->db->query($query)->result_array();
    }

    public function insert($data,$table){
        $hasil = $this->db->insert($table,$data);
        return $hasil;
    }

    public function getWhere($where,$table){
    	return $this->db->get_where($table,$where);
    }

    public function getAll($table){
        return $this->db->get($table);
    }

    public function Update($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function DeleteData($where,$table){
        $this->db->where($where);
        $this->db->table($table);
    }

    public function getPermintaanLowonganById($id){
        $this->db->select('*, user.id AS uid, permintaan_lowongan.status AS status_lamaran');
        $this->db->from('permintaan_lowongan');
        $this->db->join('lowongan', 'permintaan_lowongan.id_lowongan_pekerjaan = lowongan.id_lowongan');
        $this->db->join('kategori', 'lowongan.id_lowongan = kategori.id_lowongan');
        $this->db->join('jenis_pekerjaan', 'kategori.id_jenis_pekerjaan = jenis_pekerjaan.id_jenis_pekerjaan');
        $this->db->join('pendidikan', 'kategori.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('pengalaman', 'kategori.id_pengalaman = pengalaman.id_pengalaman');
        $this->db->join('kota', 'kategori.id_kota = kota.id_kota');
        $this->db->join('user', 'permintaan_lowongan.id_user_pengirim = user.id');
        $this->db->join('cv', 'user.id = cv.id_user');
        $this->db->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.id_profil');
        $this->db->where('permintaan_lowongan.id_lowongan_pekerjaan', $id);
        $result = $this->db->get();
        return $result;
    }

    public function getRekruitasiByIdLowongan($id){
        $this->db->select('*, user.id AS uid, rekruitasi.status AS status_rekruitasi');
        $this->db->from('rekruitasi');
        $this->db->join('lowongan', 'rekruitasi.id_lowongan = lowongan.id_lowongan');
        $this->db->join('kategori', 'lowongan.id_lowongan = kategori.id_lowongan');
        $this->db->join('jenis_pekerjaan', 'kategori.id_jenis_pekerjaan = jenis_pekerjaan.id_jenis_pekerjaan');
        $this->db->join('pendidikan', 'kategori.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('pengalaman', 'kategori.id_pengalaman = pengalaman.id_pengalaman');
        $this->db->join('kota', 'kategori.id_kota = kota.id_kota');
        $this->db->join('user', 'rekruitasi.id_user_penerima = user.id');
        $this->db->join('cv', 'user.id = cv.id_user');
        $this->db->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.id_profil');
        $this->db->where('rekruitasi.id_lowongan', $id);
        $result = $this->db->get();
        return $result;
    }

    public function get_pengalaman_keyword($keyword){
        $this->db->select('*');
        $this->db->from('portofolio as p');
        $this->db->join('cv as c', 'p.id_user = c.id_user');
        $this->db->like('p.pengalaman', $keyword);
        return $this->db->get()->result();
    }
}
