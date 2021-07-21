<?php

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if (!$this->session->userdata('username')) {
			redirect('login');
		}
	}
	public function index()
	{
		$isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();


		$isi['content'] 	= 'v_home';
		$isi['judul']		= 'Dashboard';
		$this->load->model('m_dashboard');
		$isi['anggota'] 	= $this->m_dashboard->countAnggota();
		$isi['buku'] 		= $this->m_dashboard->countBuku();
		$isi['pinjam'] 		= $this->m_dashboard->countPinjam();
		$isi['kembali'] 	= $this->m_dashboard->countKembali();
		$this->load->view('v_dashboard', $isi);
	}
}
