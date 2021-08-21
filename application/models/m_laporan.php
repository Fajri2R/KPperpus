<?php

class M_laporan extends CI_Model
{

	public function getAllData()
	{
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->join('anggota', 'peminjaman.id_anggota = anggota.id_anggota');
		$this->db->join('buku', 'peminjaman.id_buku = buku.id_buku');
		return $this->db->get()->result();
	}

	public function filterData($tgl_awal, $tgl_ahir)
	{
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->join('anggota', 'peminjaman.id_anggota = anggota.id_anggota');
		$this->db->join('buku', 'peminjaman.id_buku = buku.id_buku');
		$this->db->where('peminjaman.tgl_pinjam >=', $tgl_awal);
		$this->db->where('peminjaman.tgl_pinjam <=', $tgl_ahir);
		return $this->db->get()->result();
	}

	public function getAllData1()
	{
		$this->db->select('*');
		$this->db->from('buku');
		$this->db->join('pengarang', 'buku.id_pengarang = pengarang.id_pengarang');
		$this->db->join('penerbit', 'buku.id_penerbit = penerbit.id_penerbit');
		$this->db->join('noinduk', 'buku.id_noinduk = noinduk.id_noinduk');
		$this->db->join('klasifikasi', 'buku.id_klasifikasi = klasifikasi.id_klasifikasi');
		return $this->db->get()->result();
	}

	public function filterData1($tgl_terima)
	{
		$this->db->select('*');
		$this->db->from('buku');
		$this->db->join('pengarang', 'buku.id_pengarang = pengarang.id_pengarang');
		$this->db->join('penerbit', 'buku.id_penerbit = penerbit.id_penerbit');
		$this->db->join('noinduk', 'buku.id_noinduk = noinduk.id_noinduk');
		$this->db->join('klasifikasi', 'buku.id_klasifikasi = klasifikasi.id_klasifikasi');
		$this->db->where('buku.tgl_terima =', $tgl_terima);
		return $this->db->get()->result();
	}

	public function getAllData2()
	{
		$this->db->select('*');
		$this->db->from('pengembalian');
		$this->db->join('anggota', 'pengembalian.id_anggota = anggota.id_anggota');
		$this->db->join('buku', 'pengembalian.id_buku = buku.id_buku');
		return $this->db->get()->result();
	}

	public function filterData2($tgl_awal, $tgl_ahir)
	{
		$this->db->select('*');
		$this->db->from('pengembalian');
		$this->db->join('anggota', 'pengembalian.id_anggota = anggota.id_anggota');
		$this->db->join('buku', 'pengembalian.id_buku = buku.id_buku');
		$this->db->where('pengembalian.tgl_pinjam >=', $tgl_awal);
		$this->db->where('pengembalian.tgl_pinjam <=', $tgl_ahir);
		return $this->db->get()->result();
	}

	public function getAllData3()
	{
		$this->db->select('*');
		$this->db->from('anggota');
		$this->db->where('level =', 2);
		return $this->db->get()->result();
	}

	public function filterData3($jenkel)
	{
		$this->db->select('*');
		$this->db->from('anggota');
		$this->db->where('level =', 2);
		$this->db->where('jenkel =', $jenkel);
		return $this->db->get()->result();
	}
}
