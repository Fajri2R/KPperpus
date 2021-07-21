<?php

class Noinduk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_noinduk');
        if (!$this->session->userdata('username')) {
            redirect('login');
        }
    }

    public function index()
    {
        $isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
        if ($this->session->userdata('level') == '1') {
            $isi['content'] = 'noinduk/v_noinduk';
            $isi['judul']    = 'Data Nomor Induk';
            $isi['title']    = 'Data Nomor Induk';
            $isi['data']     = $this->db->get('noinduk')->result();
            $this->load->view('v_dashboard', $isi);
        } else {
            redirect('buku');
        }
    }

    public function tambah_noinduk()
    {
        $isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
        if ($this->session->userdata('level') == '1') {
            $isi['content'] = 'noinduk/form_noinduk';
            $isi['judul']    = 'Form Tambah Nomor Induk';
            $this->load->view('v_dashboard', $isi);
        } else {
            redirect('buku');
        }
    }

    public function simpan()
    {
        $data['nomor_induk'] = strtoupper($this->input->post('nomor_induk'));
        $query = $this->db->insert('noinduk', $data);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Berhasil di Simpan');
            redirect('noinduk');
        }
    }

    public function edit($id)
    {
        $isi['user'] = $this->db->get_where('anggota', ['username' => $this->session->userdata('username')])->row_array();
        $isi['content'] = 'noinduk/edit_noinduk';
        $isi['judul']    = 'Form Edit Nomor Induk';
        $isi['data']    = $this->m_noinduk->edit($id);
        $this->load->view('v_dashboard', $isi);
    }

    public function update()
    {
        $id_noinduk           = $this->input->post('id_noinduk');
        $data['nomor_induk']     = strtoupper($this->input->post('nomor_induk'));
        $query = $this->m_noinduk->update($id_noinduk, $data);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Berhasil di Update');
            redirect('noinduk');
        }
    }

    public function hapus($id)
    {
        $query = $this->m_noinduk->hapus($id);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Berhasil di Hapus');
            redirect('noinduk');
        }
    }
}
