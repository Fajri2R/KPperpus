<?php

class Peminjaman extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_peminjaman');
		if (!$this->session->userdata('username')) {
			redirect('login');
		}
	}

	public function index()
	{

		$isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
		if ($this->session->userdata('level') == '1') {
			$isi['content'] = 'peminjaman/v_peminjaman';
			$isi['judul']	= 'Data Peminjaman';
			$isi['title']	= 'Data Peminjam';
			$isi['data']	= $this->m_peminjaman->getDataPeminjaman();
			$this->load->view('v_dashboard', $isi);
		} else {
			redirect('buku');
		}
	}

	public function tambah_peminjaman()
	{
		$isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
		if ($this->session->userdata('level') == '1') {
			$isi['content'] 	= 'peminjaman/t_peminjaman';
			$isi['judul']		= 'Form Tambah Peminjaman';
			$isi['id_peminjaman'] = $this->m_peminjaman->id_peminjaman();
			$isi['peminjam']	=  $this->m_peminjaman->onlysiswa()->result();
			// var_dump($isi);
			// die;
			$isi['buku']		= $this->db->get('buku')->result();
			$this->load->view('v_dashboard', $isi);
		} else {
			redirect('buku');
		}
	}

	public function simpan()
	{
		$only = $this->db->get_where('anggota', ['level' == 2])->row_array();
		$this->form_validation->set_rules('id_anggota', 'ID Anggota', 'required|trim', [
			'required'      => 'Kamu belum memilih nama peminjam',
		]);
		$this->form_validation->set_rules('id_buku', 'ID Buku', 'required|trim', [
			'required'      => 'Kamu belum memilih judul buku',
		]);

		if ($this->form_validation->run() == false) {
			$isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
			$isi['content'] 	= 'peminjaman/t_peminjaman';
			$isi['judul']		= 'Form Tambah Peminjaman';
			$isi['id_peminjaman'] = $this->m_peminjaman->id_peminjaman();
			$only = $this->db->get_where('anggota', ['level' == 2])->row_array();
			$isi['peminjam']	= $only;
			$isi['buku']		= $this->db->get('buku')->result();
			$this->load->view('v_dashboard', $isi);
		} else {

			$data = array(
				'id_pm' => $this->input->post('id_pm'),
				'id_anggota' => $this->input->post('id_anggota'),
				'id_buku' => $this->input->post('id_buku'),
				'tgl_pinjam' => $this->input->post('tgl_pinjam'),
				'tgl_kembali' => $this->input->post('tgl_kembali'),
			);
			$query = $this->db->insert('peminjaman', $data);
			if ($query = true) {
				$this->session->set_flashdata('info', 'Data Transaksi Berhasil di Simpan');
				redirect('peminjaman');
			}
		}
	}

	public function jumlah_buku()
	{
		$id = $this->input->post('id');
		$data = $this->m_peminjaman->jumlah_buku($id);
		echo json_encode($data);
	}

	public function hapus($id)
	{
		$query = $this->m_peminjaman->hapus($id);
		if ($query = true) {
			$this->session->set_flashdata('info', 'Data Berhasil di Hapus');
			redirect('peminjaman');
		}
	}

	public function kembalikan($id)
	{
		$data = $this->m_peminjaman->getDataById_pm($id);
		$kembalikan = array(
			'id_anggota' 		=> $data['id_anggota'],
			'id_buku' 			=> $data['id_buku'],
			'tgl_pinjam' 		=> $data['tgl_pinjam'],
			'tgl_kembali' 		=> $data['tgl_kembali'],
			'tgl_kembalikan' 	=> date('Y-m-d')
		);

		$query = $this->db->insert('pengembalian', $kembalikan);
		if ($query = true) {
			$delete = $this->m_peminjaman->deletePm($id);
			if ($delete = true) {
				$this->session->set_flashdata('info', 'Buku Berhasil di Kembalikan');
				redirect('peminjaman');
			}
		}
	}
}
