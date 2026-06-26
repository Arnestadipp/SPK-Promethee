<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h1 class="h3 mb-0 text-gray-800">
        <i class="fas fa-fw fa-users"></i> Data Alternatif
    </h1>

</div>

<div class="card shadow mb-4">

    <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-danger">
            <i class="fa fa-table"></i> Data Alternatif (Hasil Preprocessing Data Asli)
        </h6>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

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
                    foreach ($list as $value):
                        ?>

                        <tr align="center">

                            <td><?= $no++ ?></td>
                            <td><?= $value->kode_alternatif ?></td>
                            <td><?= $value->nama ?></td>

                            <td>

                                <button class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#lihat<?= $value->id_asli ?>">

                                    <i class="fa fa-eye"></i> Lihat

                                </button>

                            </td>

                        </tr>

                        <!-- ========================= -->
                        <!-- MODAL LIHAT -->
                        <!-- ========================= -->
                        <div class="modal fade" id="lihat<?= $value->id_asli ?>" tabindex="-1">

                            <div class="modal-dialog modal-lg">

                                <div class="modal-content">

                                    <div class="modal-header bg-info text-white">

                                        <h5 class="modal-title">
                                            Data Alternatif - <?= $value->nama ?>
                                        </h5>

                                        <button type="button" class="close text-white" data-dismiss="modal">

                                            <span>&times;</span>

                                        </button>

                                    </div>

                                    <div class="modal-body">

                                        <?php foreach ($kriteria as $k): ?>

                                            <?php
                                            $data_nilai = $this->db
                                                ->where('id_alternatif', $value->id_asli)
                                                ->where('id_kriteria', $k->id_kriteria)
                                                ->get('penilaian')
                                                ->row();

                                            $nilai_asli = isset($data_nilai->nilai)
                                                ? $data_nilai->nilai
                                                : 0;

                                            $hasil = 0;
                                            $satuan = '';
                                            ?>

                                            <!-- ========================= -->
                                            <!-- PREPROCESSING RULE -->
                                            <!-- ========================= -->
                                            <?php if ($k->kode_kriteria == 'C1') { ?>

                                                <?php
                                                // C1 = tetap menggunakan data asli
                                                $hasil = $nilai_asli;
                                                $satuan = ' jiwa/km²';
                                                ?>

                                            <?php } elseif ($k->kode_kriteria == 'C9' || $k->kode_kriteria == 'C10') { ?>

                                                <?php
                                                // C9 & C10 = proporsi fasilitas terhadap jumlah penduduk
                                                if ($value->jumlah_penduduk > 0) {
                                                    $hasil = $nilai_asli / $value->jumlah_penduduk;
                                                } else {
                                                    $hasil = 0;
                                                }

                                                $satuan = '';
                                                ?>

                                            <?php } else { ?>

                                                <?php
                                                // C2 - C8 = proporsi penduduk
                                                if ($value->jumlah_penduduk > 0) {
                                                    $hasil = $nilai_asli / $value->jumlah_penduduk;
                                                } else {
                                                    $hasil = 0;
                                                }

                                                $satuan = '';
                                                ?>

                                            <?php } ?>
                                            <div class="form-group">

                                                <label class="font-weight-bold">
                                                    <?= $k->keterangan ?>
                                                </label>

                                                <input type="text" class="form-control" <?php
                                                if ($k->kode_kriteria == 'C1') {
                                                    $tampil = number_format($hasil, 0, '.', '');
                                                } else {
                                                    $tampil = number_format($hasil, 5, '.', '');
                                                }
                                                ?> <input type="text"
                                                    class="form-control" value="<?= $tampil . $satuan ?>" readonly>

                                            </div>

                                        <?php endforeach; ?>

                                    </div>

                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">

                                            Tutup

                                        </button>

                                    </div>

                                </div>

                            </div>

                        </div>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php $this->load->view('layouts/footer_admin'); ?>