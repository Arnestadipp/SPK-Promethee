<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asli extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Asli_model');
        $this->load->model('Kriteria_model');

        $data['kriteria'] = $this->Kriteria_model->tampil();
    }

    public function index()
    {
        $data['list'] = $this->Asli_model->get_all_data();
        $data['kriteria'] = $this->Kriteria_model->tampil();

        $this->load->view('asli/index', $data);
    }

    public function create()
    {
        $this->load->view('asli/create');
    }

    public function store()
    {
        $data = [
            'kode_alternatif' => $this->input->post('kode_alternatif'),
            'nama' => $this->input->post('nama'),
            'jumlah_penduduk' => $this->input->post('jumlah_penduduk')
        ];

        $this->Asli_model->insert($data);

        redirect('Asli');
    }

    public function edit($id)
    {
        $data['alternatif'] = $this->Asli_model->detail($id);

        $this->load->view('asli/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'kode_alternatif' => $this->input->post('kode_alternatif'),
            'nama' => $this->input->post('nama'),
            'jumlah_penduduk' => $this->input->post('jumlah_penduduk')
        ];

        $this->Asli_model->update($id, $data);

        redirect('Asli');
    }

    public function destroy($id)
    {
        $this->Asli_model->delete($id);

        redirect('Asli');
    }
}