<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alternatif extends CI_Controller
{

    public function index()
    {
        $data['list'] = $this->db
            ->query("
            SELECT *
            FROM asli
            ORDER BY CAST(SUBSTRING(kode_alternatif,2) AS UNSIGNED) ASC
        ")
            ->result();

        $data['kriteria'] = $this->db
            ->order_by('id_kriteria', 'ASC')
            ->get('kriteria')
            ->result();

        $this->load->view('alternatif/index', $data);
    }
}