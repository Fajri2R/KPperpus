<?php

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->goToDefaultPage();
		$this->form_validation->set_rules('username', 'Username', 'required|trim', [
			'required'      => 'Kamu belum menginput %s',
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', [
			'required'      => 'Kamu belum menginput %s',
		]);
		if ($this->form_validation->run() == false) {
			$isi['title'] = 'Login';
			$this->load->view('templates/auth_header', $isi);
			$this->load->view('auth/v_login');
			$this->load->view('templates/auth_footer');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$user = $this->db->get_where('anggota', ['username' => $username])->row_array();

			if ($user) {
				if ($user['active'] == 1 || $user['active'] == 0) {
					if (password_verify($password, $user['password'])) {
						$isi = [
							'username' => $user['username'],
							'level' => $user['level']
						];
						$this->session->set_userdata($isi);
						redirect('dashboard');
					} else {
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
						Password salah!</div>');
						redirect('login');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Username belum diaktivasi!</div>');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Username tidak terdaftar!</div>');
				redirect('login');
			}
		}
	}

	// public function registration()
	// {
	// 	$this->goToDefaultPage();
	// 	$this->form_validation->set_rules('nama', 'Name', 'required|trim');
	// 	$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[login.username]', [
	// 		'is_unique' => 'Username sudah terdaftar!'
	// 	]);
	// 	$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
	// 		'matches' => 'Passsword tidak cocok',
	// 		'min_length' => 'Password terlalu pendek'
	// 	]);
	// 	$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
	// 	if ($this->form_validation->run() == false) {
	// 		$isi['title'] = 'Registration';
	// 		$this->load->view('templates/auth_header', $isi);
	// 		$this->load->view('auth/v_registration');
	// 		$this->load->view('templates/auth_footer');
	// 	} else {
	// 		$isi = [
	// 			'nama' => htmlspecialchars($this->input->post('nama', true)),
	// 			'username' => htmlspecialchars($this->input->post('username', true)),
	// 			'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
	// 			'image' => 'default.jpg',
	// 			'level' => 3,
	// 			'active' => 1,
	// 		];
	// 		$this->db->insert('login', $isi);
	// 		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
	// 		Selamat! akun berhasil dibuat. Silahkan login
	// 	  	</div>');
	// 		redirect('login');
	// 	}
	// }
	public function goToDefaultPage()
	{
		if ($this->session->userdata('level') == '1') {
			redirect('dashboard');
		} else if ($this->session->userdata('level') == '2') {
			redirect('buku');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Anda telah logout!
		  </div>');
		redirect('login');
	}
}
