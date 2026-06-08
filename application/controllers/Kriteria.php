<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->model('Kriteria_model');

        if ($this->session->userdata('id_user_level') != "1") {
            ?>
            <script type="text/javascript">
                alert('Anda tidak berhak mengakses halaman ini!');
                window.location = '<?php echo base_url("Login/home"); ?>'
            </script>
            <?php
        }
    }

    /* ===============================
       TAMPIL DATA
    =============================== */
    public function index()
    {
        $data['page'] = "Kriteria";
        $data['list'] = $this->Kriteria_model->tampil();

        $this->load->view('kriteria/index', $data);
    }

    /* ===============================
       FORM TAMBAH
    =============================== */
    public function create()
    {
        $data['page'] = "Kriteria";

        $this->load->view('kriteria/create', $data);
    }

    /* ===============================
       SIMPAN DATA
    =============================== */
    public function store()
    {

        $this->form_validation->set_rules(
            'kode_kriteria',
            'Kode Kriteria',
            'required'
        );

        $this->form_validation->set_rules(
            'keterangan',
            'Nama Kriteria',
            'required'
        );

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                    Data gagal disimpan!
                </div>'
            );

            redirect('Kriteria/create');
        }

        $data = [

            'kode_kriteria' => $this->input->post('kode_kriteria'),
            'keterangan' => $this->input->post('keterangan'),
            'bobot_kriteria' => $this->input->post('bobot_kriteria'),
            'sifat_kriteria' => $this->input->post('sifat_kriteria'),
            'fungsi_preferensi' => $this->input->post('fungsi_preferensi')

        ];

        $this->Kriteria_model->insert($data);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success">
                Data berhasil disimpan!
            </div>'
        );

        redirect('Kriteria');
    }

    /* ===============================
       FORM EDIT
    =============================== */
    public function edit($id_kriteria)
    {
        $data['page'] = "Kriteria";

        $data['kriteria'] = $this->Kriteria_model->show($id_kriteria);

        $this->load->view('kriteria/edit', $data);
    }

    /* ===============================
       UPDATE DATA
    =============================== */
    public function update($id_kriteria)
    {

        $id_kriteria = $this->input->post('id_kriteria');

        $data = [

            'kode_kriteria' => $this->input->post('kode_kriteria'),
            'keterangan' => $this->input->post('keterangan'),
            'bobot_kriteria' => $this->input->post('bobot_kriteria'),
            'sifat_kriteria' => $this->input->post('sifat_kriteria'),
            'fungsi_preferensi' => $this->input->post('fungsi_preferensi'),
            'q' => $this->input->post('q'),
            'p' => $this->input->post('p')

        ];

        $this->Kriteria_model->update($id_kriteria, $data);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success">
                Data berhasil diupdate!
            </div>'
        );

        redirect('Kriteria');
    }

    /* ===============================
       HAPUS DATA
    =============================== */
    public function destroy($id_kriteria)
    {

        $this->Kriteria_model->delete($id_kriteria);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success">
                Data berhasil dihapus!
            </div>'
        );

        redirect('Kriteria');
    }

}