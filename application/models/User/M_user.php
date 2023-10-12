<?php

class M_user extends CI_Model
{
    public function tampil_cv()
    {
        $this->db->join('kota', 'kota.id_kota = cv.id_kota');
        $this->db->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi');
        $this->db->join('agama', 'agama.id_agama = cv.id_agama');
        return $this->db->get('cv');
    }
}
