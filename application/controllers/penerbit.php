<?php

class Penerbit extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_penerbit');
		if (!$this->session->userdata('username')) {
			redirect('login');
		}
	}

	public function index()
	{
		$isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
		if ($this->session->userdata('level') == '1') {
			$isi['content'] = 'penerbit/v_penerbit';
			$isi['judul']	= 'Data Penerbit';
			$isi['title']	= 'Data Penerbit';
			$isi['data'] 	= $this->db->get('penerbit')->result();
			$this->load->view('v_dashboard', $isi);
		} else {
			redirect('buku');
		}
	}

	public function tambah_penerbit()
	{
		$isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
		if ($this->session->userdata('level') == '1') {
			$isi['content'] = 'penerbit/form_penerbit';
			$isi['judul']	= 'Form Tambah Penerbit';
			$this->load->view('v_dashboard', $isi);
		} else {
			redirect('dashboard');
		}
	}

	public function simpan()
	{
		if ($this->session->userdata('level') == '1') {
			$data['nama_penerbit'] = ucwords($this->input->post('nama_penerbit'));
			$query = $this->db->insert('penerbit', $data);
			if ($query = true) {
				$this->session->set_flashdata('info', 'Data Berhasil di Simpan');
				redirect('penerbit');
			}
		} else {
			redirect('dashboard');
		}
	}

	public function edit($id)
	{
		if ($this->session->userdata('level') == '1') {
			$isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
			$isi['content'] = 'penerbit/edit_penerbit';
			$isi['judul']	= 'Form Edit Penerbit';
			$isi['data']	= $this->m_penerbit->edit($id);
			$this->load->view('v_dashboard', $isi);
		} else {
			redirect('dashboard');
		}
	}

	public function update()
	{
		if ($this->session->userdata('level') == '1') {
			$id_penerbit 			= $this->input->post('id_penerbit');
			$data['nama_penerbit'] 	= ucwords($this->input->post('nama_penerbit'));
			$query = $this->m_penerbit->update($id_penerbit, $data);
			if ($query = true) {
				$this->session->set_flashdata('info', 'Data Berhasil di Update');
				redirect('penerbit');
			}
		} else {
			redirect('dashboard');
		}
	}

	public function hapus($id)
	{
		if ($this->session->userdata('level') == '1') {
			$query = $this->m_penerbit->hapus($id);
			if ($query = true) {
				$this->session->set_flashdata('info', 'Data Berhasil di Hapus');
				redirect('penerbit');
			}
		} else {
			redirect('dashboard');
		}
	}
}
