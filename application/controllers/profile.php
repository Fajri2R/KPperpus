<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
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
        $isi['judul']        = 'Profil Saya';
        $isi['content']     = 'v_profile';
        $this->load->view('v_dashboard', $isi);
    }

    public function update()
    {

        $isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
        // $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[anggota.username]', [
        //     'is_unique' => 'Username sudah terdaftar!'
        // ]);
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|trim', [
            'required' => 'belum memasukan %s'
        ]);
        // $this->form_validation->set_rules('password1', 'Password', 'trim|min_length[3]|matches[password2]', [
        //     'matches' => 'Passsword tidak cocok',
        //     'min_length' => 'Password terlalu pendek',
        // ]);
        // $this->form_validation->set_rules('password2', 'Password', 'trim|matches[password1]');

        if ($this->form_validation->run() == false) {

            $isi['judul']        = 'Profil Saya';
            $isi['content']      = 'v_profile';

            $this->load->view('v_dashboard', $isi);
        } else {

            $no_hp = $this->input->post('no_hp');
            // $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            // $this->db->set('password', $password);
            $username = $this->input->post('username');

            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['upload_path'] = './assets/dist/img/';
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size']     = '2048';
                $config['max_width'] = '512';
                $config['max_height'] = '512';


                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $isi['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/dist/img/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('error_msg', $this->upload->display_errors());
                }
            }

            $this->db->set('no_hp', $no_hp);
            $this->db->where('username', $username);
            $this->db->update('anggota');
            $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">
                     Data berhasil diupdate
                       </div>');
            redirect('profile');
        }
    }
}
