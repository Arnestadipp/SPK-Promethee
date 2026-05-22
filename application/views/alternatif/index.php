<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h1 class="h3 mb-0 text-gray-800">
        <i class="fas fa-fw fa-users"></i> Data Alternatif
    </h1>

</div>

<div class="card shadow mb-4">

    <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-danger">
            <i class="fa fa-table"></i> Daftar Data Alternatif
        </h6>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered"
                   id="dataTable"
                   width="100%"
                   cellspacing="0">

                <thead class="bg-danger text-white">

                    <tr align="center">

                        <th width="5%">No</th>
                        <th width="15%">Kode</th>
                        <th>Nama Kecamatan</th>
                        <th width="20%">Lihat Data</th>

                    </tr>

                </thead>

                <tbody>

                    <?php
                    $no = 1;

                    foreach($list as $value){
                    ?>

                    <tr align="center">

                        <td><?= $no++ ?></td>

                        <td><?= $value->kode_alternatif ?></td>

                        <td><?= $value->nama ?></td>

                        <td>

                            <button class="btn btn-info btn-sm"
                                    data-toggle="modal"
                                    data-target="#lihat<?= $value->id_asli ?>">

                                <i class="fa fa-eye"></i> Lihat

                            </button>

                        </td>

                    </tr>

                    <!-- MODAL LIHAT -->
                    <div class="modal fade"
                         id="lihat<?= $value->id_asli ?>"
                         tabindex="-1"
                         role="dialog">

                        <div class="modal-dialog modal-lg"
                             role="document">

                            <div class="modal-content">

                                <div class="modal-header bg-info text-white">

                                    <h5 class="modal-title">

                                        Data Alternatif -
                                        <?= $value->nama ?>

                                    </h5>

                                    <button type="button"
                                            class="close text-white"
                                            data-dismiss="modal">

                                        <span>&times;</span>

                                    </button>

                                </div>

                                <div class="modal-body">

                                    <table class="table table-bordered">

                                        <thead class="bg-light">

                                            <tr align="center">

                                                <th width="15%">Kode</th>
                                                <th>Kriteria</th>
                                                <th width="30%">Nilai Alternatif</th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                            <?php
                                            foreach($kriteria as $k){

                                                $data_nilai = $this->db
                                                    ->where('id_alternatif', $value->id_asli)
                                                    ->where('id_kriteria', $k->id_kriteria)
                                                    ->get('penilaian')
                                                    ->row();

                                                $nilai_asli = isset($data_nilai->nilai)
                                                    ? $data_nilai->nilai
                                                    : 0;

                                                $hasil = 0;

                                                /*
                                                C1 = dibagi 1000
                                                C2 - C10 = proporsi %
                                                */

                                                if($k->kode_kriteria == 'C1'){

                                                    $hasil = $nilai_asli / 1000;

                                                    $satuan = ' ribu jiwa/km²';

                                                } else {

                                                    if($value->jumlah_penduduk > 0){

                                                        $hasil = ($nilai_asli / $value->jumlah_penduduk) * 100;

                                                    }

                                                    $satuan = ' %';
                                                }
                                            ?>

                                            <tr>

                                                <td align="center">
                                                    <?= $k->kode_kriteria ?>
                                                </td>

                                                <td>
                                                    <?= $k->keterangan ?>
                                                </td>

                                                <td align="center">

                                                    <?= number_format($hasil, 4) ?>
                                                    <?= $satuan ?>

                                                </td>

                                            </tr>

                                            <?php } ?>

                                        </tbody>

                                    </table>

                                </div>

                                <div class="modal-footer">

                                    <button type="button"
                                            class="btn btn-secondary"
                                            data-dismiss="modal">

                                        Tutup

                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>

                    <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php $this->load->view('layouts/footer_admin'); ?>