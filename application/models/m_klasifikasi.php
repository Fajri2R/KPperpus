<?php

class M_klasifikasi extends CI_Model
{

    public function edit($id)
    {
        $this->db->where('id_klasifikasi', $id);
        return $this->db->get('klasifikasi')->row_array();
    }

    public function update($id_klasifikasi, $data)
    {
        $this->db->where('id_klasifikasi', $id_klasifikasi);
        $this->db->update('klasifikasi', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id_klasifikasi', $id);
        $this->db->delete('klasifikasi');
    }
}
