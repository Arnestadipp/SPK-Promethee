<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria_model extends CI_Model
{

    /* =========================
       TAMPIL DATA
    ========================= */
    public function tampil()
    {
        $query = $this->db->query("
            SELECT * FROM kriteria
            ORDER BY id_kriteria ASC
        ");

        return $query->result();
    }

    /* =========================
       TOTAL DATA
    ========================= */
    public function getTotal()
    {
        return $this->db->count_all('kriteria');
    }

    /* =========================
       INSERT DATA
    ========================= */
    public function insert($data = [])
    {
        return $this->db->insert('kriteria', $data);
    }

    /* =========================
       DETAIL DATA
    ========================= */
    public function show($id_kriteria)
    {
        $this->db->where('id_kriteria', $id_kriteria);

        $query = $this->db->get('kriteria');

        return $query->row();
    }

    /* =========================
       UPDATE DATA
    ========================= */
    public function update($id_kriteria, $data = [])
    {

        $ubah = array(

            'kode_kriteria' => $data['kode_kriteria'],
            'keterangan' => $data['keterangan'],
            'bobot_kriteria' => $data['bobot_kriteria'],
            'sifat_kriteria' => $data['sifat_kriteria'],
            'fungsi_preferensi' => $data['fungsi_preferensi']

        );

        $this->db->where('id_kriteria', $id_kriteria);

        return $this->db->update('kriteria', $ubah);
    }

    /* =========================
       HAPUS DATA
    ========================= */
    public function delete($id_kriteria)
    {
        $this->db->where('id_kriteria', $id_kriteria);

        return $this->db->delete('kriteria');
    }

}