<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h1 class="h3 mb-0 text-gray-800">
        <i class="fas fa-fw fa-edit"></i> Data Asli Kriteria
    </h1>

</div>

<div class="card shadow mb-4">

    <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-danger">
            <i class="fa fa-table"></i>
            Data Asli Kriteria
        </h6>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead class="bg-danger text-white">

                    <tr align="center">

                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Kecamatan</th>

                        <?php foreach ($kriteria as $k): ?>
                            <th>
                                <?= $k->kode_kriteria ?>
                            </th>
                        <?php endforeach; ?>

                    </tr>

                </thead>

                <tbody>

                    <?php
                    $no = 1;

                    foreach ($alternatif as $alt):
                        ?>

                        <tr align="center">

                            <td>
                                <?= $no++ ?>
                            </td>

                            <td>
                                <?= $alt->kode_alternatif ?>
                            </td>

                            <td align="left">
                                <?= $alt->nama ?>
                            </td>

                            <?php foreach ($kriteria as $k): ?>

                                <?php

                                $nilai = $this->Penilaian_model
                                    ->data_penilaian(
                                        $alt->id_asli,
                                        $k->id_kriteria
                                    );

                                ?>

                                <td>

                                    <?= isset($nilai['nilai'])
                                        ? $nilai['nilai']
                                        : '-' ?>

                                </td>

                            <?php endforeach; ?>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php $this->load->view('layouts/footer_admin'); ?>