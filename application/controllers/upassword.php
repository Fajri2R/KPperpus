<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upassword extends CI_Controller
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
        $isi['judul']        = 'Ganti Password';
        $isi['content']     = 'v_upassword';
        $this->load->view('v_dashboard', $isi);
    }

    public function update()
    {
        $isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
        $this->form_validation->set_rules('cpassword', 'Password Lama', 'required|trim', [
            'required'      => 'Kamu belum menginput %s',
        ]);
        $this->form_validation->set_rules('npassword1', 'Password Baru', 'required|trim|min_length[3]|matches[npassword2]', [
            'matches' => 'Passsword tidak cocok',
            'min_length' => 'Password terlalu pendek',
            'required' => 'Kamu belum menginput %s'
        ]);
        $this->form_validation->set_rules('npassword2', 'Konfirmasi Password Baru', 'required|trim|min_length[3]|matches[npassword1]', [
            'matches' => 'Passsword tidak cocok',
            'min_length' => 'Password terlalu pendek',
            'required' => 'Kamu belum menginput %s'
        ]);
        if ($this->form_validation->run() == false) {
            $isi['judul']        = 'Ganti Password';
            $isi['content']     = 'v_upassword';
            $this->load->view('v_dashboard', $isi);
        } else {
            $cpassword = $this->input->post('cpassword');
            $npassword = $this->input->post('npassword1');
            if (!password_verify($cpassword, $isi['user']['password'])) {
                $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">
                     Password lama salah!
                       </div>');
                redirect('upassword');
            } else {
                if ($cpassword == $npassword) {
                    $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">
                     Password baru tidak boleh sama dengan password lama!
                       </div>');
                    redirect('upassword');
                } else {
                    $password_hash = password_hash($npassword, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('anggota');
                    $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">
                     Password berhasil diganti  
                       </div>');
                    redirect('upassword');
                }
            }
        }
    }
}
