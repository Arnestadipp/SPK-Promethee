<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">

	<h1 class="h3 mb-0 text-gray-800">
		<i class="fas fa-fw fa-cube"></i> Data Kriteria
	</h1>

	<a href="<?= base_url('Kriteria'); ?>" class="btn btn-secondary btn-icon-split">

		<span class="icon text-white-50">
			<i class="fas fa-arrow-left"></i>
		</span>

		<span class="text">
			Kembali
		</span>

	</a>

</div>

<div class="card shadow mb-4">

	<div class="card-header py-3">

		<h6 class="m-0 font-weight-bold text-danger">

			<i class="fas fa-fw fa-edit"></i>
			Edit Data Kriteria

		</h6>

	</div>

	<?php echo form_open('Kriteria/update/' . $kriteria->id_kriteria); ?>

	<div class="card-body">

		<div class="row">

			<?php echo form_hidden('id_kriteria', $kriteria->id_kriteria) ?>

			<!-- KODE KRITERIA -->
			<div class="form-group col-md-6">

				<label class="font-weight-bold">
					Kode Kriteria
				</label>

				<input autocomplete="off" type="text" name="kode_kriteria" value="<?= $kriteria->kode_kriteria ?>"
					required class="form-control" />

			</div>

			<!-- NAMA KRITERIA -->
			<div class="form-group col-md-6">

				<label class="font-weight-bold">
					Nama Kriteria
				</label>

				<input autocomplete="off" type="text" name="keterangan" value="<?= $kriteria->keterangan ?>" required
					class="form-control" />

			</div>

			<!-- BOBOT KRITERIA-->
			<div class="form-group col-md-6">

				<label class="font-weight-bold">
					Bobot Kriteria
				</label>

				<input type="number" step="0.01" name="bobot_kriteria" value="<?= $kriteria->bobot_kriteria ?>" required
					class="form-control" />

			</div>

			<!-- SIFAT KRITERIA -->
			<div class="form-group col-md-6">

				<label class="font-weight-bold">
					Sifat Kriteria
				</label>

				<select name="sifat_kriteria" class="form-control" required>

					<option value="">
						-- Pilih --
					</option>

					<option value="Benefit" <?= $kriteria->sifat_kriteria == 'Benefit' ? 'selected' : '' ?>>

						Benefit

					</option>

					<option value="Cost" <?= $kriteria->sifat_kriteria == 'Cost' ? 'selected' : '' ?>>

						Cost

					</option>

				</select>

			</div>

			<!-- FUNGSI PREFERENSI -->
			<div class="form-group col-md-6">

				<label class="font-weight-bold">
					Fungsi Preferensi
				</label>

				<select name="fungsi_preferensi" class="form-control" required>

					<option value="">
						-- Pilih --
					</option>

					<option value="Usual" <?= $kriteria->fungsi_preferensi == 'Usual' ? 'selected' : '' ?>>

						Tipe I - Usual

					</option>

					<option value="Quasi" <?= $kriteria->fungsi_preferensi == 'Quasi' ? 'selected' : '' ?>>

						Tipe II - Quasi

					</option>

					<option value="Linear" <?= $kriteria->fungsi_preferensi == 'Linear' ? 'selected' : '' ?>>

						Tipe III - Linear

					</option>

					<option value="Level" <?= $kriteria->fungsi_preferensi == 'Level' ? 'selected' : '' ?>>

						Tipe IV - Level

					</option>

					<option value="Linear with Indifference Area" <?= $kriteria->fungsi_preferensi == 'Linear with Indifference Area' ? 'selected' : '' ?>>

						Tipe V - Linear with Indifference Area

					</option>

					<option value="Gaussian" <?= $kriteria->fungsi_preferensi == 'Gaussian' ? 'selected' : '' ?>>

						Tipe VI - Gaussian

					</option>

				</select>

			</div>

		</div>

	</div>

	<div class="card-footer text-right">

		<button type="submit" class="btn btn-success">

			<i class="fa fa-save"></i>
			Simpan

		</button>

		<button type="reset" class="btn btn-info">

			<i class="fa fa-sync-alt"></i>
			Reset

		</button>

	</div>

	<?php echo form_close() ?>

</div>

<?php $this->load->view('layouts/footer_admin'); ?>