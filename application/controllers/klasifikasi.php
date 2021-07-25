<?php

class Klasifikasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_klasifikasi');
        if (!$this->session->userdata('username')) {
            redirect('login');
        }
    }

    public function index()
    {
        $isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
        if ($this->session->userdata('level') == '1') {
            $isi['content'] = 'klasifikasi/v_klasifikasi';
            $isi['judul']     = 'Daftar Data Klasifikasi';
            $isi['title']    = 'Data Klasifikasi';
            $isi['data']    = $this->db->get('klasifikasi')->result();
            $this->load->view('v_dashboard', $isi);
        } else {
            redirect('dashboard');
        }
    }

    public function tambah_klasifikasi()
    {
        $isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
        if ($this->session->userdata('level') == '1') {
            $isi['content'] = 'klasifikasi/form_klasifikasi';
            $isi['judul']     = 'Form Tambah Klasifikasi';
            $this->load->view('v_dashboard', $isi);
        } else {
            redirect('dashboard');
        }
    }

    public function simpan()
    {
        if ($this->session->userdata('level') == '1') {
            $data['nama_klasifikasi'] = ucwords($this->input->post('nama_klasifikasi'));
            $query = $this->db->insert('klasifikasi', $data);
            if ($query = true) {
                $this->session->set_flashdata('info', 'Data Berhasil di Simpan');
                redirect('klasifikasi');
            }
        } else {
            redirect('dashboard');
        }
    }

    public function edit($id)
    {
        if ($this->session->userdata('level') == '1') {
            $isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
            $isi['content'] = 'klasifikasi/edit_klasifikasi';
            $isi['judul']     = 'Form Edit Klasifikasi';
            $isi['data']     = $this->m_klasifikasi->edit($id);
            $this->load->view('v_dashboard', $isi);
        } else {
            redirect('dashboard');
        }
    }

    public function update()
    {
        if ($this->session->userdata('level') == '1') {
            $id_klasifikasi             = $this->input->post('id_klasifikasi');
            $data['nama_klasifikasi']   = ucwords($this->input->post('nama_klasifikasi'));
            $query = $this->m_klasifikasi->update($id_klasifikasi, $data);
            if ($query = true) {
                $this->session->set_flashdata('info', 'Data Berhasil di Update');
                redirect('klasifikasi');
            }
        } else {
            redirect('dashboard');
        }
    }

    public function hapus($id)
    {
        if ($this->session->userdata('level') == '1') {
            $query = $this->m_klasifikasi->hapus($id);
            if ($query = true) {
                $this->session->set_flashdata('info', 'Data Berhasil di Hapus');
                redirect('klasifikasi');
            }
        } else {
            redirect('dashboard');
        }
    }
}
