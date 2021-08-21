<?php

class Laporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_laporan');
		$this->load->model('m_pengembalian');
		$this->load->helper('tgl_indo_helper');
		$this->load->library('pdf_report');
		$this->load->helper('fnohp');
		if (!$this->session->userdata('username')) {
			redirect('login');
		}
	}

	public function peminjaman()
	{
		$isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
		if ($this->session->userdata('level') == '1') {
			$tgl_awal = $this->input->post('tgl_awal');
			$tgl_ahir = $this->input->post('tgl_ahir');

			$this->session->set_userdata('tanggal_awal', $tgl_awal);
			$this->session->set_userdata('tanggal_ahir', $tgl_ahir);

			if (empty($tgl_awal) || empty($tgl_ahir)) {
				$isi['content']	= 'laporan/v_peminjaman';
				$isi['judul']	= 'Laporan Peminjaman';
				$isi['title']	= 'Laporan';
				$isi['data']	= $this->m_laporan->getAllData();
			} else {
				$isi['content']	= 'laporan/v_peminjaman';
				$isi['judul']	= 'Laporan Peminjaman';
				$isi['data']	= $this->m_laporan->filterData($tgl_awal, $tgl_ahir);
			}

			$this->load->view('v_dashboard', $isi);
		} else {
			redirect('dashboard');
		}
	}

	public function pdf_peminjaman()
	{
		if ($this->session->userdata('level') == '1') {
			if (empty($this->session->userdata('tanggal_awal')) || empty($this->session->userdata('tanggal_ahir'))) {
				$isi['data'] = $this->m_laporan->getAllData();
				$isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
				$this->load->view('laporan/pdf_peminjaman', $isi);
			} else {
				$isi['data'] = $this->m_laporan->filterData($this->session->userdata('tanggal_awal'), $this->session->userdata('tanggal_ahir'));
				$isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
				$this->load->view('laporan/pdf_peminjaman', $isi);
			}
		} else {
			redirect('dashboard');
		}
	}

	public function pengembalian()
	{
		$isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
		if ($this->session->userdata('level') == '1') {
			$tgl_awal = $this->input->post('tgl_awal');
			$tgl_ahir = $this->input->post('tgl_ahir');

			$this->session->set_userdata('tanggal_awal', $tgl_awal);
			$this->session->set_userdata('tanggal_ahir', $tgl_ahir);

			if (empty($tgl_awal) || empty($tgl_ahir)) {
				$isi['content']	= 'laporan/v_pengembalian';
				$isi['judul']	= 'Laporan Pengembalian';
				$isi['title']	= 'Laporan';
				$isi['data']	= $this->m_laporan->getAllData2();
			} else {
				$isi['content']	= 'laporan/v_pengembalian';
				$isi['judul']	= 'Laporan Pengembalian';
				$isi['data']	= $this->m_laporan->filterData2($tgl_awal, $tgl_ahir);
			}

			$this->load->view('v_dashboard', $isi);
		} else {
			redirect('dashboard');
		}
	}

	public function pdf_pengembalian()
	{
		if ($this->session->userdata('level') == '1') {
			if (empty($this->session->userdata('tanggal_awal')) || empty($this->session->userdata('tanggal_ahir'))) {
				$isi['data'] = $this->m_laporan->getAllData2();
				$isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
				$this->load->view('laporan/pdf_pengembalian', $isi);
			} else {
				$isi['data'] = $this->m_laporan->filterData2($this->session->userdata('tanggal_awal'), $this->session->userdata('tanggal_ahir'));
				$isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
				$this->load->view('laporan/pdf_pengembalian', $isi);
			}
		} else {
			redirect('dashboard');
		}
	}

	public function dataanggota()
	{
		$isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
		if ($this->session->userdata('level') == '1') {
			$tgl_awal = $this->input->post('tgl_awal');
			$tgl_ahir = $this->input->post('tgl_ahir');

			$this->session->set_userdata('tanggal_awal', $tgl_awal);
			$this->session->set_userdata('tanggal_ahir', $tgl_ahir);

			if (empty($tgl_awal) || empty($tgl_ahir)) {
				$isi['content']	= 'laporan/v_dataanggota';
				$isi['judul']	= 'Laporan Data Anggota';
				$isi['title']	= 'Laporan';
				$isi['data']	= $this->m_laporan->getAllData3();
			} else {
				$isi['content']	= 'laporan/v_dataanggota';
				$isi['judul']	= 'Laporan Data Anggota';
				$isi['data']	= $this->m_laporan->filterData2($tgl_awal, $tgl_ahir);
			}

			$this->load->view('v_dashboard', $isi);
		} else {
			redirect('dashboard');
		}
	}

	public function pdf_dataanggota()
	{
		if ($this->session->userdata('level') == '1') {
			if (empty($this->session->userdata('tanggal_awal')) || empty($this->session->userdata('tanggal_ahir'))) {
				$isi['data'] = $this->m_laporan->getAllData3();
				$isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
				$this->load->view('laporan/pdf_dataanggota', $isi);
			} else {
				$isi['data'] = $this->m_laporan->filterData2($this->session->userdata('tanggal_awal'), $this->session->userdata('tanggal_ahir'));
				$isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
				$this->load->view('laporan/pdf_dataanggota', $isi);
			}
		} else {
			redirect('dashboard');
		}
	}

	public function databuku()
	{
		$isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
		if ($this->session->userdata('level') == '1') {
			$tgl_terima = $this->input->post('tgl_terima');
			$this->session->set_userdata('tgl_terima', $tgl_terima);


			if (empty($tgl_terima)) {
				$isi['content']	= 'laporan/v_databuku';
				$isi['judul']	= 'Laporan Data Buku';
				$isi['title']	= 'Laporan';
				$isi['data']	= $this->m_laporan->getAllData1();
			} else {
				$isi['content']	= 'laporan/v_databuku';
				$isi['judul']	= 'Laporan Data Buku';
				$isi['data']	= $this->m_laporan->filterData1($tgl_terima);
			}

			$this->load->view('v_dashboard', $isi);
		} else {
			redirect('dashboard');
		}
	}

	public function pdf_databuku()
	{
		if ($this->session->userdata('level') == '1') {
			if (empty($this->session->userdata('tgl_terima'))) {
				$isi['data'] = $this->m_laporan->getAllData1();
				$isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
				$this->load->view('laporan/pdf_databuku', $isi);
			} else {
				$isi['data'] = $this->m_laporan->filterData1($this->session->userdata('tgl_terima'));
				$isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
				$this->load->view('laporan/pdf_databuku', $isi);
			}
		} else {
			redirect('dashboard');
		}
	}
}
