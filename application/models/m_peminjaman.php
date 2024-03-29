<?php

class M_peminjaman extends CI_Model
{

    public function id_peminjaman()
    {
        $this->db->select('RIGHT(peminjaman.id_pm,3) as kode', FALSE);
        $this->db->order_by('id_pm', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('peminjaman');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "PM" . $kodemax;
        return $kodejadi;
    }

    public function onlysiswa()
    {
        $this->db->select('id_anggota, nama, level');
        $this->db->from('anggota');
        $this->db->where('level =', 2);
        return $this->db->get();
    }

    public function jumlah_buku($id)
    {
        $this->db->select('jumlah');
        $this->db->from('buku');
        $this->db->where('id_buku', $id);
        return $this->db->get()->row_array();
    }

    public function getDataPeminjaman()
    {
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->join('anggota', 'peminjaman.id_anggota = anggota.id_anggota');
        $this->db->join('buku', 'peminjaman.id_buku = buku.id_buku');
        return $this->db->get()->result();
    }

    public function getDataPeminjaman1()
    {
        $user = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->join('anggota', 'peminjaman.id_anggota = anggota.id_anggota');
        $this->db->join('buku', 'peminjaman.id_buku = buku.id_buku');
        $this->db->where('peminjaman.id_anggota', $user['id_anggota']);
        return $this->db->get()->result();
    }

    public function getDataById_pm($id)
    {
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->join('anggota', 'peminjaman.id_anggota = anggota.id_anggota');
        $this->db->join('buku', 'peminjaman.id_buku = buku.id_buku');
        $this->db->where('peminjaman.id_pm', $id);
        return $this->db->get()->row_array();
    }

    public function deletePm($id)
    {
        $this->db->where('id_pm', $id);
        $this->db->delete('peminjaman');
    }

    public function hapus($id)
    {
        $this->db->where('id_pm', $id);
        $this->db->delete('peminjaman');
    }
}
