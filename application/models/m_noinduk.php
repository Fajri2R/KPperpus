<?php

class M_noinduk extends CI_Model
{

    public function edit($id)
    {
        $this->db->where('id_noinduk', $id);
        return $this->db->get('noinduk')->row_array();
    }

    public function update($id_noinduk, $data)
    {
        $this->db->where('id_noinduk', $id_noinduk);
        $this->db->update('noinduk', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id_noinduk', $id);
        $this->db->delete('noinduk');
    }
}
