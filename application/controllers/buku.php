<?php

class Buku extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_buku');
		$this->load->helper('tgl_indo_helper');
		if (!$this->session->userdata('username')) {
			redirect('login');
		}
	}

	public function index()
	{
		$isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
		$isi['content'] = 'buku/v_buku';
		$isi['judul']	= 'Daftar Data Buku';
		$isi['title']	= 'Data Buku';
		$isi['data']	= $this->m_buku->get_data_buku();
		$this->load->view('v_dashboard', $isi);
	}

	public function tambah_buku()
	{
		$isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
		if ($this->session->userdata('level') == '1') {
			$isi['content'] = 'buku/form_buku';
			$isi['judul']	= 'Form Tambah Buku';
			$isi['id_buku']	= $this->m_buku->id_buku();
			$isi['pengarang'] = $this->db->get('pengarang')->result();
			$isi['penerbit'] = $this->db->get('penerbit')->result();
			$isi['noinduk'] = $this->db->get('noinduk')->result();
			$isi['klasifikasi'] = $this->db->get('klasifikasi')->result();
			$this->load->view('v_dashboard', $isi);
		} else {
			redirect('dashboard');
		}
	}

	public function simpan()
	{
		if ($this->session->userdata('level') == '1') {
			$data = array(
				'id_buku' 		=> $this->input->post('id_buku'),
				'id_pengarang' 	=> $this->input->post('id_pengarang'),
				'id_penerbit' 	=> $this->input->post('id_penerbit'),
				'id_noinduk' 	=> $this->input->post('id_noinduk'),
				'judul_buku' 	=> ucwords($this->input->post('judul_buku')),
				'cetakan' 		=> $this->input->post('cetakan'),
				'sumber' 		=> ucwords($this->input->post('sumber')),
				'tahun_terbit' 	=> $this->input->post('tahun_terbit'),
				'jumlah' 		=> $this->input->post('jumlah'),
				'id_klasifikasi' 	=> $this->input->post('id_klasifikasi'),
				'tgl_terima' 	=> $this->input->post('tgl_terima')
			);


			$query = $this->db->insert('buku', $data);
			if ($query = true) {
				$this->session->set_flashdata('info', 'Data Berhasil di Simpan');
				redirect('buku');
			}
		} else {
			redirect('dashboard');
		}
	}

	public function edit($id)
	{
		$isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
		if ($this->session->userdata('level') == '1') {
			$isi['content'] 	= 'buku/edit_buku';
			$isi['judul']		= 'Form Edit Buku';
			$isi['pengarang'] 	= $this->db->get('pengarang')->result();
			$isi['penerbit'] 	= $this->db->get('penerbit')->result();
			$isi['noinduk'] 	= $this->db->get('noinduk')->result();
			$isi['klasifikasi'] = $this->db->get('klasifikasi')->result();
			$isi['data']		= $this->m_buku->edit($id);
			$this->load->view('v_dashboard', $isi);
		} else {
			redirect('dashboard');
		}
	}

	public function update()
	{
		$id_buku = $this->input->post('id_buku');
		if ($this->session->userdata('level') == '1') {
			$data = array(
				'id_buku' 		=> $this->input->post('id_buku'),
				'id_pengarang' 	=> $this->input->post('id_pengarang'),
				'id_penerbit' 	=> $this->input->post('id_penerbit'),
				'id_noinduk' 	=> $this->input->post('id_noinduk'),
				'judul_buku' 	=> ucwords($this->input->post('judul_buku')),
				'cetakan' 		=> $this->input->post('cetakan'),
				'sumber' 		=> ucwords($this->input->post('sumber')),
				'tahun_terbit' 	=> $this->input->post('tahun_terbit'),
				'jumlah' 		=> $this->input->post('jumlah'),
				'id_klasifikasi' => $this->input->post('id_klasifikasi'),
				'tgl_terima' 	=> $this->input->post('tgl_terima')
			);

			$query = $this->m_buku->update($id_buku, $data);
			if ($query = true) {
				$this->session->set_flashdata('info', 'Data Berhasil di Update');
				redirect('buku');
			}
		} else {
			redirect('dashboard');
		}
	}

	public function hapus($id)
	{
		if ($this->session->userdata('level') == '1') {
			$query = $this->m_buku->hapus($id);
			if ($query = true) {
				$this->session->set_flashdata('info', 'Data Berhasil di Hapus');
				redirect('buku');
			}
		} else {
			redirect('dashboard');
		}
	}
}
