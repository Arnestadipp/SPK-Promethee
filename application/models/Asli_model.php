<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asli_model extends CI_Model
{

    public function get_all_data()
    {
        return $this->db
            ->query("
            SELECT *
            FROM asli
            ORDER BY CAST(SUBSTRING(kode_alternatif, 2) AS UNSIGNED) ASC
        ")
            ->result();
    }

    public function insert($data)
    {
        return $this->db->insert('asli', $data);
    }

    public function detail($id)
    {
        return $this->db
            ->get_where('asli', [
                'id_asli' => $id
            ])
            ->row();
    }

    public function update($id, $data)
    {
        $this->db->where('id_asli', $id);
        return $this->db->update('asli', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('asli', [
            'id_asli' => $id
        ]);
    }
}