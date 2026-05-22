<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h1 class="h3 mb-0 text-gray-800">
        <i class="fas fa-fw fa-database"></i> Data Asli
    </h1>

    <a href="<?= base_url('Asli'); ?>" class="btn btn-secondary btn-icon-split">

        <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
        </span>

        <span class="text">Kembali</span>

    </a>

</div>

<div class="card shadow mb-4">

    <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-danger">
            <i class="fas fa-fw fa-edit"></i> Edit Data Asli
        </h6>

    </div>

    <?php echo form_open('Asli/update/'.$alternatif->id_asli); ?>

    <div class="card-body">

        <div class="row">

            <?php echo form_hidden('id_asli', $alternatif->id_asli) ?>

            <div class="form-group col-md-4">

                <label class="font-weight-bold">Kode Alternatif</label>

                <input autocomplete="off"
                       type="text"
                       name="kode_alternatif"
                       value="<?= $alternatif->kode_alternatif ?>"
                       required
                       class="form-control"/>

            </div>

            <div class="form-group col-md-4">

                <label class="font-weight-bold">Nama Kecamatan</label>

                <input autocomplete="off"
                       type="text"
                       name="nama"
                       value="<?= $alternatif->nama ?>"
                       required
                       class="form-control"/>

            </div>

            <div class="form-group col-md-4">

                <label class="font-weight-bold">Jumlah Penduduk</label>

                <input autocomplete="off"
                       type="number"
                       name="jumlah_penduduk"
                       value="<?= $alternatif->jumlah_penduduk ?>"
                       required
                       class="form-control"/>

            </div>

        </div>

    </div>

    <div class="card-footer text-right">

        <button type="submit" class="btn btn-success">
            <i class="fa fa-save"></i> Simpan
        </button>

    </div>

    <?php echo form_close() ?>

</div>

<?php $this->load->view('layouts/footer_admin'); ?>