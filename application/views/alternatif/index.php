<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <i class="fas fa-fw fa-users"></i> Data Alternatif
    </h1>

    <a href="<?= base_url('Alternatif/create'); ?>" class="btn btn-success">
        <i class="fa fa-plus"></i> Tambah Data
    </a>
</div>

<?= $this->session->flashdata('message'); ?>

<div class="card shadow mb-4">

    <!-- Card Header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger">
            <i class="fa fa-table"></i> Daftar Data Kecamatan
        </h6>
    </div>

    <!-- Card Body -->
    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead class="bg-danger text-white">
                    <tr align="center">
                        <th width="5%">No</th>
                        <th width="20%">Kode Alternatif</th>
                        <th>Nama Kecamatan</th>
                        <th width="20%">Data Penilaian</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                        $no = 1;
                        foreach ($list as $data => $value) {
                    ?>

                    <tr align="center">

                        <td><?= $no ?></td>

                        <td>
                            <?= $value->kode_alternatif ?>
                        </td>

                        <td>
                            <?= $value->nama ?>
                        </td>

                        <!-- Tombol Penilaian -->
                        <td>

                            <?php
                            $cek = $this->db
                                ->where('id_alternatif', $value->id_alternatif)
                                ->get('penilaian')
                                ->num_rows();
                            ?>

                            <?php if($cek > 0){ ?>

                                <a href="#edit<?= $value->id_alternatif ?>"
                                   data-toggle="modal"
                                   class="btn btn-warning btn-sm">

                                    <i class="fa fa-edit"></i> Edit
                                </a>

                            <?php } else { ?>

                                <a href="#input<?= $value->id_alternatif ?>"
                                   data-toggle="modal"
                                   class="btn btn-info btn-sm">

                                    <i class="fa fa-plus"></i> Input
                                </a>

                            <?php } ?>

                        </td>

                        <!-- Tombol Aksi -->
                        <td>

                            <div class="btn-group">

                                <a href="<?= base_url('Alternatif/edit/'.$value->id_alternatif) ?>"
                                   class="btn btn-warning btn-sm">

                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href="<?= base_url('Alternatif/destroy/'.$value->id_alternatif) ?>"
                                   onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"
                                   class="btn btn-danger btn-sm">

                                    <i class="fa fa-trash"></i>
                                </a>

                            </div>

                        </td>

                    </tr>

                    <!-- MODAL INPUT -->
                    <div class="modal fade"
                         id="input<?= $value->id_alternatif ?>"
                         tabindex="-1"
                         role="dialog">

                        <div class="modal-dialog modal-lg" role="document">

                            <div class="modal-content">

                                <div class="modal-header bg-info text-white">

                                    <h5 class="modal-title">
                                        Input Penilaian - <?= $value->nama ?>
                                    </h5>

                                    <button type="button"
                                            class="close text-white"
                                            data-dismiss="modal">

                                        <span>&times;</span>
                                    </button>

                                </div>

                                <form action="<?= base_url('Penilaian/tambah_penilaian') ?>"
                                      method="POST">

                                    <div class="modal-body">

                                        <?php foreach($kriteria as $k){ ?>

                                            <input type="hidden"
                                                   name="id_alternatif"
                                                   value="<?= $value->id_alternatif ?>">

                                            <input type="hidden"
                                                   name="id_kriteria[]"
                                                   value="<?= $k->id_kriteria ?>">

                                            <div class="form-group">

                                                <label class="font-weight-bold">
                                                    <?= $k->keterangan ?>
                                                </label>

                                                <input type="number"
                                                       name="nilai[]"
                                                       class="form-control"
                                                       placeholder="Masukkan nilai"
                                                       required>

                                            </div>

                                        <?php } ?>

                                    </div>

                                    <div class="modal-footer">

                                        <button type="button"
                                                class="btn btn-secondary"
                                                data-dismiss="modal">

                                            Batal
                                        </button>

                                        <button type="submit"
                                                class="btn btn-info">

                                            Simpan
                                        </button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                    <!-- MODAL EDIT -->
                    <div class="modal fade"
                         id="edit<?= $value->id_alternatif ?>"
                         tabindex="-1"
                         role="dialog">

                        <div class="modal-dialog modal-lg" role="document">

                            <div class="modal-content">

                                <div class="modal-header bg-warning text-white">

                                    <h5 class="modal-title">
                                        Edit Penilaian - <?= $value->nama ?>
                                    </h5>

                                    <button type="button"
                                            class="close text-white"
                                            data-dismiss="modal">

                                        <span>&times;</span>
                                    </button>

                                </div>

                                <form action="<?= base_url('Penilaian/update_penilaian') ?>"
                                      method="POST">

                                    <div class="modal-body">

                                        <?php foreach($kriteria as $k){ ?>

                                            <?php
                                            $nilai = $this->db
                                                ->where('id_alternatif', $value->id_alternatif)
                                                ->where('id_kriteria', $k->id_kriteria)
                                                ->get('penilaian')
                                                ->row();
                                            ?>

                                            <input type="hidden"
                                                   name="id_alternatif"
                                                   value="<?= $value->id_alternatif ?>">

                                            <input type="hidden"
                                                   name="id_kriteria[]"
                                                   value="<?= $k->id_kriteria ?>">

                                            <div class="form-group">

                                                <label class="font-weight-bold">
                                                    <?= $k->keterangan ?>
                                                </label>

                                                <input type="number"
                                                       name="nilai[]"
                                                       class="form-control"
                                                       value="<?= isset($nilai->nilai) ? $nilai->nilai : '' ?>"
                                                       required>

                                            </div>

                                        <?php } ?>

                                    </div>

                                    <div class="modal-footer">

                                        <button type="button"
                                                class="btn btn-secondary"
                                                data-dismiss="modal">

                                            Batal
                                        </button>

                                        <button type="submit"
                                                class="btn btn-warning">

                                            Update
                                        </button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                    <?php
                        $no++;
                        }
                    ?>

                </tbody>

            </table>

        </div>
    </div>
</div>

<?php $this->load->view('layouts/footer_admin'); ?>