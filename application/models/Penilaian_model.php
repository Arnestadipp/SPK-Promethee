<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian_model extends CI_Model {

    /*
    =====================================
    CEK DATA PENILAIAN
    =====================================
    */

    public function untuk_tombol($id_alternatif)
    {
        return $this->db
            ->where('id_alternatif', $id_alternatif)
            ->get('penilaian')
            ->num_rows();
    }

    /*
    =====================================
    AMBIL DATA PENILAIAN
    =====================================
    */

    public function data_penilaian($id_alternatif, $id_kriteria)
    {
        return $this->db
            ->where('id_alternatif', $id_alternatif)
            ->where('id_kriteria', $id_kriteria)
            ->get('penilaian')
            ->row_array();
    }
}