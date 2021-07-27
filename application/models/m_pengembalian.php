<?php

class M_pengembalian extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllData()
    {
        $this->db->select('*');
        $this->db->from('pengembalian');
        $this->db->join('anggota', 'pengembalian.id_anggota = anggota.id_anggota');
        $this->db->join('buku', 'pengembalian.id_buku = buku.id_buku');
        return $this->db->get()->result();
    }

    public function getAllData1()
    {
        $user = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
        $this->db->select('*');
        $this->db->from('pengembalian');
        $this->db->join('anggota', 'pengembalian.id_anggota = anggota.id_anggota');
        $this->db->join('buku', 'pengembalian.id_buku = buku.id_buku');
        $this->db->where('pengembalian.id_anggota', $user['id_anggota']);
        return $this->db->get()->result();
    }

    function rp($angka)
    {
        $hasil_rupiah = "Rp. " . number_format($angka, 0, ',', '.') . ',-';
        return $hasil_rupiah;
    }

    public function hapus($id)
    {
        $this->db->where('id_pengembalian', $id);
        $this->db->delete('pengembalian');
    }
}
