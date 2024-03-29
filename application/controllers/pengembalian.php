<?php

class Pengembalian extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pengembalian');
		if (!$this->session->userdata('username')) {
			redirect('login');
		}
	}

	public function index()
	{
		$isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
		if ($this->session->userdata('level') == '1') {
			$isi['content'] = 'pengembalian/v_pengembalian';
			$isi['judul']	= 'Data Pengembalian Buku';
			$isi['title']	= 'Data Pengembalian';
			$this->load->model('m_pengembalian');
			$isi['data']	= $this->m_pengembalian->getAllData();
			$this->load->view('v_dashboard', $isi);
		} else {
			$isi['content'] = 'pengembalian/v_pengembalian1';
			$isi['judul']	= 'Riwayat Pengembalian';
			$isi['title']	= 'Data Pengembalian';
			$this->load->model('m_pengembalian');
			$isi['data']	= $this->m_pengembalian->getAllData1();
			$this->load->view('v_dashboard', $isi);
		}
	}

	public function hapus($id)
	{
		if ($this->session->userdata('level') == '1') {
			$query = $this->m_pengembalian->hapus($id);
			if ($query = true) {
				$this->session->set_flashdata('info', 'Data Berhasil di Hapus');
				redirect('pengembalian');
			}
		} else {
			redirect('dashboard');
		}
	}
}
