<?php

class Anggota extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('fnohp');
		$this->load->model('m_anggota');
		if (!$this->session->userdata('username')) {
			redirect('login');
		}
	}

	public function index()
	{

		$isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
		if ($this->session->userdata('level') == '1') {
			$isi['content']	= 'anggota/v_anggota';
			$isi['judul']	= 'Daftar Data User';
			$isi['title']	= 'Data User';
			$isi['data']	= $this->m_anggota->onlysiswa()->result();
			$this->load->view('v_dashboard', $isi);
		} else {
			redirect('dashboard');
		}
	}

	public function tambah_anggota()
	{
		$isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
		if ($this->session->userdata('level') == '1') {
			$isi['content']		= 'anggota/form_anggota';
			$isi['judul']		= 'Form Tambah User';
			$isi['id_anggota'] 	= $this->m_anggota->id_anggota();
			$this->load->view('v_dashboard', $isi);
		} else {
			redirect('dashboard');
		}
	}

	public function data_admin()
	{
		$isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
		if ($this->session->userdata('level') == '1') {
			$isi['content']	= 'anggota/v_dataadmin';
			$isi['judul']	= 'Daftar Data Admin';
			$isi['title']	= 'Data Admin';
			$isi['data']	= $this->m_anggota->onlyadmin()->result();
			$this->load->view('v_dashboard', $isi);
		} else {
			redirect('dashboard');
		}
	}

	public function simpan()
	{
		$this->form_validation->set_rules('nama', 'Nama User', 'required|trim', [
			'required'      => 'Kamu belum menginput %s',
		]);
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[anggota.username]', [
			'required'      => 'Kamu belum menginput %s',
			'is_unique' => 'Username sudah terdaftar!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Passsword tidak cocok',
			'min_length' => 'Password terlalu pendek',
			'required' => 'Kamu belum menginput %s'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		$this->form_validation->set_rules('jenkel', 'Jenis Kelamin', 'required', [
			'required'      => 'Kamu belum memilih %s',
		]);
		$this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|trim|min_length[11]', [
			'required'      => 'Kamu belum menginput %s',
			'min_length'    => 'Cek kembali Nomor HP yang diinput, min. 11 digit dimulai dari 0',
		]);
		$this->form_validation->set_rules('level', 'Level', 'required', [
			'required'      => 'Kamu belum memilih %s',
		]);
		if ($this->form_validation->run() == false) {
			if ($this->session->userdata('level') == '1') {
				$isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
				$isi['content']		= 'anggota/form_anggota';
				$isi['judul']		= 'Form Tambah User';
				$isi['id_anggota'] 	= $this->m_anggota->id_anggota();
				$this->load->view('v_dashboard', $isi);
			} else {
				redirect('dashboard');
			}
		} else {
			$data = array(
				'id_anggota' 	=> $this->input->post('id_anggota'),
				'nama' 			=> ucwords(htmlspecialchars($this->input->post('nama', true))),
				'jenkel' 		=> $this->input->post('jenkel'),
				'alamat' 		=> $this->input->post('alamat'),
				'no_hp' 		=> $this->input->post('no_hp'),
				'username' 		=> htmlspecialchars($this->input->post('username', true)),
				'password' 		=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'image' 		=> 'default.jpg',
				'level'			=> $this->input->post('level'),
				'active' 		=> 1,
			);

			$query = $this->db->insert('anggota', $data);
			if ($query = true) {
				$this->session->set_flashdata('info', 'Data Berhasil di Simpan');
				redirect('anggota');
			}
		}
	}

	public function edit($id)
	{
		$isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
		if ($this->session->userdata('level') == '1') {
			$isi['content']		= 'anggota/edit_anggota';
			$isi['judul']		= 'Form Edit User';
			$isi['data']	 	= $this->m_anggota->edit($id);
			$this->load->view('v_dashboard', $isi);
		} else {
			redirect('dashboard');
		}
	}

	public function update()
	{
		$isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
		$this->form_validation->set_rules('nama', 'Nama User', 'required|trim', [
			'required'      => 'Kamu belum menginput %s',
		]);
		$this->form_validation->set_rules('username', 'Username', 'required|trim', [
			'required'      => 'Kamu belum menginput %s',
		]);
		$this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|trim|min_length[11]', [
			'required'      => 'Kamu belum menginput %s',
			'min_length'    => 'Cek kembali Nomor HP yang diinput, min. 11 digit dimulai dari 0',
		]);
		if ($this->form_validation->run() == false) {
			if ($this->session->userdata('level') == '1') {
				$idg = $this->m_anggota->editid()->result();
				foreach ($idg as $row) {
					$id = $row->id_anggota;
				};
				$isi['content']		= 'anggota/edit_anggota';
				$isi['judul']		= 'Form Edit User';
				$isi['data']	 	= $this->m_anggota->edit($id);
				$this->load->view('v_dashboard', $isi);
			} else {
				redirect('dashboard');
			}
		} else {
			$id_anggota = $this->input->post('id_anggota');
			$data = array(
				'id_anggota' 	=> $this->input->post('id_anggota'),
				'nama' 			=> ucwords(htmlspecialchars($this->input->post('nama', true))),
				'jenkel' 		=> $this->input->post('jenkel'),
				'alamat' 		=> $this->input->post('alamat'),
				'no_hp' 		=> $this->input->post('no_hp'),
				'username' 		=> htmlspecialchars($this->input->post('username', true)),
				'level'			=> $this->input->post('level'),
			);

			$query = $this->m_anggota->update($id_anggota, $data);
			if ($query = true) {
				$this->session->set_flashdata('info', 'Data Berhasil di Update');
				redirect('anggota');
			}
		}
	}

	public function hapus($id)
	{
		if ($this->session->userdata('level') == '1') {
			$query = $this->m_anggota->hapus($id);
			if ($query = true) {
				$this->session->set_flashdata('info', 'Data Berhasil di Hapus');
				redirect('anggota');
			}
		} else {
			redirect('dashboard');
		}
	}
}
