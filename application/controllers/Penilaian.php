<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Penilaian_model');
        $this->load->model('Kriteria_model');
    }

    /*
    =====================================
    HALAMAN PENILAIAN
    =====================================
    */

    public function index()
    {
        $data['alternatif'] = $this->db
            ->order_by('id_asli', 'ASC')
            ->get('asli')
            ->result();

        $data['kriteria'] = $this->Kriteria_model
            ->tampil();

        $this->load->view('penilaian/index', $data);
    }

    /*
    =====================================
    SIMPAN PENILAIAN
    =====================================
    */

    public function tambah_penilaian()
    {
        $id_alternatif = $this->input->post('id_alternatif');

        $id_kriteria = $this->input->post('id_kriteria');

        $nilai = $this->input->post('nilai');

        for ($i = 0; $i < count($id_kriteria); $i++) {

            $data = [
                'id_alternatif' => $id_alternatif,
                'id_kriteria' => $id_kriteria[$i],
                'nilai' => $nilai[$i]
            ];

            $this->db->insert('penilaian', $data);
        }

        redirect('Penilaian');
    }

    /*
    =====================================
    UPDATE PENILAIAN
    =====================================
    */

    public function update_penilaian()
    {
        $id_alternatif = $this->input->post('id_alternatif');

        $id_kriteria = $this->input->post('id_kriteria');

        $nilai = $this->input->post('nilai');

        for ($i = 0; $i < count($id_kriteria); $i++) {

            $this->db->where('id_alternatif', $id_alternatif);

            $this->db->where('id_kriteria', $id_kriteria[$i]);

            $this->db->update('penilaian', [
                'nilai' => $nilai[$i]
            ]);
        }

        redirect('Penilaian');
    }
}