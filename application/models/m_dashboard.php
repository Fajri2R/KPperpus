<?php

class M_dashboard extends CI_Model
{

	public function countAnggota()
	{
		$this->db->from('anggota');
		$this->db->where('level =', 2);
		return $this->db->count_all_results();
	}

	public function countBuku()
	{
		return $this->db->count_all('buku');
	}

	public function countPinjam()
	{
		return $this->db->count_all('peminjaman');
	}

	public function countKembali()
	{
		return $this->db->count_all('pengembalian');
	}
}
