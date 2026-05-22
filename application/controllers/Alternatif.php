<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alternatif extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function index()
    {
        $data['list'] = $this->db->get('asli')->result();

        $data['kriteria'] = $this->db
            ->order_by('id_kriteria', 'ASC')
            ->get('kriteria')
            ->result();

        $this->load->view('alternatif/index', $data);
    }
}