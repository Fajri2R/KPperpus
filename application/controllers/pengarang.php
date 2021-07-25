<?php

class Pengarang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pengarang');
		if (!$this->session->userdata('username')) {
			redirect('login');
		}
	}

	public function index()
	{
		$isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
		if ($this->session->userdata('level') == '1') {
			$isi['content'] = 'pengarang/v_pengarang';
			$isi['judul'] 	= 'Daftar Data Pengarang';
			$isi['title']	= 'Data Pengarang';
			$isi['data']	= $this->db->get('pengarang')->result();
			$this->load->view('v_dashboard', $isi);
		} else {
			redirect('dashboard');
		}
	}

	public function tambah_pengarang()
	{
		$isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
		if ($this->session->userdata('level') == '1') {
			$isi['content'] = 'pengarang/form_pengarang';
			$isi['judul'] 	= 'Form Tambah Pengarang';
			$this->load->view('v_dashboard', $isi);
		} else {
			redirect('dashboard');
		}
	}

	public function simpan()
	{
		if ($this->session->userdata('level') == '1') {
			$data['nama_pengarang'] = ucwords($this->input->post('nama_pengarang'));
			$query = $this->db->insert('pengarang', $data);
			if ($query = true) {
				$this->session->set_flashdata('info', 'Data Berhasil di Simpan');
				redirect('pengarang');
			}
		} else {
			redirect('dashboard');
		}
	}

	public function edit($id)
	{
		if ($this->session->userdata('level') == '1') {
			$isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
			$isi['content'] = 'pengarang/edit_pengarang';
			$isi['judul'] 	= 'Form Edit Pengarang';
			$isi['data'] 	= $this->m_pengarang->edit($id);
			$this->load->view('v_dashboard', $isi);
		} else {
			redirect('dashboard');
		}
	}

	public function update()
	{
		if ($this->session->userdata('level') == '1') {
			$id_pengarang 			= $this->input->post('id_pengarang');
			$data['nama_pengarang'] = ucwords($this->input->post('nama_pengarang'));
			$query = $this->m_pengarang->update($id_pengarang, $data);
			if ($query = true) {
				$this->session->set_flashdata('info', 'Data Berhasil di Update');
				redirect('pengarang');
			}
		} else {
			redirect('dashboard');
		}
	}

	public function hapus($id)
	{
		if ($this->session->userdata('level') == '1') {
			$query = $this->m_pengarang->hapus($id);
			if ($query = true) {
				$this->session->set_flashdata('info', 'Data Berhasil di Hapus');
				redirect('pengarang');
			}
		} else {
			redirect('dashboard');
		}
	}
}
