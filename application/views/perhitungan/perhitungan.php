<?php $this->load->view('layouts/header_admin'); ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-calculator"></i> Data Perhitungan</h1>
</div>
<div class="card shadow mb-4"> <!-- /.card-header -->
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-danger"><i class="fa fa-table"></i> Data Perhitungan</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-danger text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th width="15%">Kode Alternatif</th>
						<th>Nama Kecamatan</th>
						<?php foreach ($kriteria as $key): ?>
							<th>
								<?= $key->kode_kriteria ?>
							</th>
						<?php endforeach ?>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($alternatif as $keys): ?>
						<tr align="center">
							<td>
								<?= $no; ?>
							</td>
							<td>
								<?= $keys->kode_alternatif ?>
							</td>
							<td align="left">
								<?= $keys->nama ?>
							</td>
							<?php foreach ($kriteria as $key): ?>
								<td>
									<?php $nilai = $this->Perhitungan_model->nilai_preprocessing($keys, $key);
									if ($key->kode_kriteria == 'C1') {
										echo $nilai;
									} else {
										echo number_format($nilai, 5);
									}
									?>
								</td>
							<?php endforeach ?>
						</tr>
						<?php $no++; endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php $tip = array();
$jumlahaleternatif = array();
$entering = array();
$leaving = array();
$net = array();
$jkriteria = count($kriteria);

foreach ($kriteria as $r) {
	$bobot_kriteria = $r->bobot_kriteria;
	$all_nilai = [];

	foreach ($alternatif as $alt) {
		$nilai_tmp = $this->Perhitungan_model->nilai_preprocessing($alt, $r);
		$all_nilai[] = $nilai_tmp;
	}
	$max = max($all_nilai);
	$min = min($all_nilai);
	$rentang = $max - $min;
	$q = $rentang * 0.1;
	$p = $rentang * 0.4; ?>
	<div class="card shadow mb-4"> <!-- /.card-header -->
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-danger"><i class="fa fa-table"></i> Kriteria
				<?= $r->keterangan ?> (<?= $r->kode_kriteria ?>)
			</h6>
		</div>
		<div class="card-body"> <!-- Informasi Parameter Preferensi -->
			<div class="table-responsive mb-4">
				<table class="table table-bordered">
					<thead class="bg-secondary text-white">
						<tr align="center">
							<th>Fungsi Preferensi</th>
							<th>Sifat Kriteria</th>
							<th>Minimum</th>
							<th>Maximum</th>
							<th>Rentang</th>
							<th>q (Indifference Threshold)</th>
							<th>p (Preference Threshold)</th>
						</tr>
					</thead>
					<tbody>
						<tr align="center">
							<td>
								<?= $r->fungsi_preferensi ?>
							</td>
							<td>
								<?= $r->sifat_kriteria ?>
							</td>
							<?php
							$digit = ($r->kode_kriteria == 'C1') ? 0 : 5;
							?>

							<td><?= ($r->kode_kriteria == 'C1') ? (int) $min : number_format($min, 5) ?></td>
							<td><?= ($r->kode_kriteria == 'C1') ? (int) $max : number_format($max, 5) ?></td>
							<td><?= ($r->kode_kriteria == 'C1') ? (int) $rentang : number_format($rentang, 5) ?></td>
							<td><?= ($r->kode_kriteria == 'C1') ? (int) $q : number_format($q, 5) ?></td>
							<td><?= ($r->kode_kriteria == 'C1') ? (int) $p : number_format($p, 5) ?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered" width="100%" cellspacing="0">
					<thead class="bg-danger text-white">
						<tr align="center">
							<th colspan='2' class='text-center'>Alternatif</th>
							<th rowspan='2' class='text-center'>f(a)</th>
							<th rowspan='2' class='text-center'>f(b)</th>
							<th rowspan='2' class='text-center'>d (selisih)</th>
							<th rowspan='2' class='text-center'>Nilai Preferensi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1;
						$sub = array();
						foreach ($alternatif as $a1) {
							if ($i == 1) {
								$idk = "'" . $a1->id_asli . "'";
							} else {
								$idk = $idk . ",'" . $a1->id_asli . "'";
							}
							$alternatif2 = $this->Perhitungan_model->get_alt($idk);
							foreach ($alternatif2 as $a2) {
								$nilai1 = $this->Perhitungan_model->nilai_preprocessing($a1, $r);
								$nilai2 = $this->Perhitungan_model->nilai_preprocessing($a2, $r);
								/* |-------------------------------| COST / BENEFIT |------------------------------ */
								if ($r->sifat_kriteria == 'Benefit') {
									$d1 = $nilai1 - $nilai2;
									$d2 = $nilai2 - $nilai1;
								} else {
									$d1 = $nilai2 - $nilai1;
									$d2 = $nilai1 - $nilai2;
								} /* |--------------------------- | FUNGSI PREFERENSI |---------------------------- */
								$p1 = 0;
								$p2 = 0; /* |--------------------- | TIPE I - USUAL |------------------------------ */
								if ($r->fungsi_preferensi == 'Usual') {
									$p1 = ($d1 <= 0) ? 0 : 1;
									$p2 = ($d2 <= 0) ? 0 : 1;
								} /* |--------------------------- | TIPE II - QUASI |------------------------------ */
								elseif ($r->fungsi_preferensi == 'Quasi') {
									$p1 = ($d1 <= $q) ? 0 : 1;
									$p2 = ($d2 <= $q) ? 0 : 1;
								} /* |-------------------------- | TIPE III - LINEAR |----------------------------- */
								elseif ($r->fungsi_preferensi == 'Linear') {
									if ($d1 <= 0) {
										$p1 = 0;
									} elseif ($d1 <= $p) {
										$p1 = $d1 / $p;
									} else {
										$p1 = 1;
									}
									if ($d2 <= 0) {
										$p2 = 0;
									} elseif ($d2 <= $p) {
										$p2 = $d2 / $p;
									} else {
										$p2 = 1;
									}
								} /* |---------------------------- | TIPE IV - LEVEL |----------------------------- */
								elseif ($r->fungsi_preferensi == 'Level') {
									if ($d1 <= $q) {
										$p1 = 0;
									} elseif ($d1 <= $p) {
										$p1 = 0.5;
									} else {
										$p1 = 1;
									}
									if ($d2 <= $q) {
										$p2 = 0;
									} elseif ($d2 <= $p) {
										$p2 = 0.5;
									} else {
										$p2 = 1;
									}
								} /* |----------------- | TIPE V - LINEAR WITH INDIFFERENCE AREA |----------------- */
								elseif ($r->fungsi_preferensi == 'Linear with Indifference Area') {
									if ($d1 <= $q) {
										$p1 = 0;
									} elseif ($d1 <= $p) {
										$p1 = ($d1 - $q) / ($p - $q);
									} else {
										$p1 = 1;
									}
									if ($d2 <= $q) {
										$p2 = 0;
									} elseif ($d2 <= $p) {
										$p2 = ($d2 - $q) / ($p - $q);
									} else {
										$p2 = 1;
									}
								} /* |--------------------------- | TIPE VI - GAUSSIAN |-------------------------- */
								elseif ($r->fungsi_preferensi == 'Gaussian') {
									if ($d1 <= 0) {
										$p1 = 0;
									} else {
										$p1 = 1 - exp(-(pow($d1, 2)) / (2 * pow($p, 2)));
									}
									if ($d2 <= 0) {
										$p2 = 0;
									} else {
										$p2 = 1 - exp(-(pow($d2, 2)) / (2 * pow($p, 2)));
									}
								}
								$formatNilai1 = ($r->kode_kriteria == 'C1')
									? $nilai1
									: number_format($nilai1, 5);

								$formatNilai2 = ($r->kode_kriteria == 'C1')
									? $nilai2
									: number_format($nilai2, 5);

								$formatD1 = ($r->kode_kriteria == 'C1')
									? $d1
									: number_format($d1, 5);

								$formatD2 = ($r->kode_kriteria == 'C1')
									? $d2
									: number_format($d2, 5);

								echo "
								<tr align='center'>
								<td>[$a1->kode_alternatif] $a1->nama</td>
								<td>[$a2->kode_alternatif] $a2->nama</td>
								<td>$formatNilai1</td>
								<td>$formatNilai2</td>
								<td>$formatD1</td>
								<td>" . number_format($p1, 5) . "</td>
								</tr>

								<tr align='center'>
								<td>[$a2->kode_alternatif] $a2->nama</td>
								<td>[$a1->kode_alternatif] $a1->nama</td>
								<td>$formatNilai2</td>
								<td>$formatNilai1</td>
								<td>$formatD2</td>
								<td>" . number_format($p2, 5) . "</td>
								</tr>";
								if (isset($tip[$a1->id_asli][$a2->id_asli])) {
									$tip[$a1->id_asli][$a2->id_asli] =
										$tip[$a1->id_asli][$a2->id_asli] += ($p1 * $bobot_kriteria);
								} else {
									$tip[$a1->id_asli][$a2->id_asli] = ($p1 * $bobot_kriteria);
								}
								if (isset($tip[$a2->id_asli][$a1->id_asli])) {
									$tip[$a2->id_asli][$a1->id_asli] =
										$tip[$a2->id_asli][$a1->id_asli] += ($p2 * $bobot_kriteria);
								} else {
									$tip[$a2->id_asli][$a1->id_asli] = ($p2 * $bobot_kriteria);
								}
							}
							$i++;
						} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php } ?>
<div class="card shadow mb-4"> <!-- /.card-header -->
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-danger"><i class="fa fa-table"></i> Menghitung Indeks Preferensi
			Multikriteria</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-danger text-white">
					<tr align="center">
						<th colspan='2'>Alternatif</th>
						<th width="35%">Total Nilai</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1;
					foreach ($alternatif as $a1) {
						if ($i == 1) {
							$idk = "'" . $a1->id_asli . "'";
						} else {
							$idk = $idk . ",'" . $a1->id_asli . "'";
						}
						$alternatif2 = $this->Perhitungan_model->get_alt($idk);
						foreach ($alternatif2 as $a2) {
							echo " <tr align='center'> <td>[$a1->kode_alternatif] $a1->nama</td> <td>[$a2->kode_alternatif] $a2->nama</td> <td>" . number_format($tip[$a1->id_asli][$a2->id_asli], 5) . "</td> </tr> <tr align='center'> <td>[$a2->kode_alternatif] $a2->nama</td> <td>[$a1->kode_alternatif] $a1->nama</td> <td>" . number_format($tip[$a2->id_asli][$a1->id_asli], 5) . "</td> </tr>";
						}
						$i++;
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="card shadow mb-4"> <!-- /.card-header -->
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-danger"><i class="fa fa-table"></i> Indeks Preferensi Multikriteria</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-danger text-white">
					<tr align="center">
						<th>Alternatif</th>
						<?php foreach ($alternatif as $key): ?>
							<th>[
								<?= $key->kode_alternatif ?>]
								<?= $key->nama ?>
							</th>
						<?php endforeach ?>
						<th>Jumlah</th>
						<th>Leaving Flow</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($alternatif as $baris) {
						$jumlah = 0;
						echo "<tr align='center'>
						<th class='bg-danger text-white'>[$baris->kode_alternatif] $baris->nama</th>";
						foreach ($alternatif as $kolom) {
							echo "<td>";
							if (isset($tip[$baris->id_asli][$kolom->id_asli])) {
								echo number_format($tip[$baris->id_asli][$kolom->id_asli], 5);
								$jumlah += $tip[$baris->id_asli][$kolom->id_asli];
							} else {
								echo number_format(0, 5);
								$tip[$baris->id_asli][$kolom->id_asli] = 0;
							}
							echo "</td>";
							if (isset($jumlahaleternatif[$kolom->id_asli])) {
								$jumlahaleternatif[$kolom->id_asli] = $jumlahaleternatif[$kolom->id_asli] + $tip[$baris->id_asli][$kolom->id_asli];
							} else {
								$jumlahaleternatif[$kolom->id_asli] = $tip[$baris->id_asli][$kolom->id_asli];
							}
						}
						$i++;
						$leaving[$baris->id_asli] = $jumlah / (count($alternatif) - 1);
						echo "
						<td>" . number_format($jumlah, 5) . "</td>
						<td>" . number_format($leaving[$baris->id_asli], 5) . "</td>
						</tr>";
					}
					echo "<tr align='center'><th class='bg-danger text-white'>Jumlah</th>";
					foreach ($alternatif as $kolom) {
						echo "<td>" . number_format($jumlahaleternatif[$kolom->id_asli], 5) . "</td>";
					}
					echo "<td colspan='2'></td></tr>";
					echo "<tr align='center'><th class='bg-danger text-white'>Entering Flow</th>";
					foreach ($alternatif as $kolom) {
						$entering[$kolom->id_asli] = $jumlahaleternatif[$kolom->id_asli] / (count($alternatif) - 1);
						echo "<td>" . number_format($entering[$kolom->id_asli], 5) . "</td>";
					}
					echo "<td colspan='2'></td></tr>"; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="card shadow mb-4"> <!-- /.card-header -->
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-danger"><i class="fa fa-table"></i> Menghitung Leaving Flow, Entering Flow,
			Net Flow</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-danger text-white">
					<tr align="center">
						<th>Kode Alternatif</th>
						<th>Alternatif</th>
						<th>Leaving Flow</th>
						<th>Entering Flow</th>
						<th>Net Flow</th>
					</tr>
				</thead>
				<tbody>
					<?php $this->Perhitungan_model->hapus_hasil();
					foreach ($alternatif as $baris) {
						$net[$baris->id_asli][0] = $leaving[$baris->id_asli] - $entering[$baris->id_asli];
						$net[$baris->id_asli][1] = $baris->nama;
						$net[$baris->id_asli][2] = $baris->id_asli;
						echo "
						<tr align='center'>
						<td>$baris->kode_alternatif</td>
						<td>$baris->nama</td>
						<td>" . number_format($leaving[$baris->id_asli], 5) . "</td>
						<td>" . number_format($entering[$baris->id_asli], 5) . "</td>
						<td>" . number_format($net[$baris->id_asli][0], 5) . "</td>
						</tr>";
						$nilai_hasil = ['id_asli' => $baris->id_asli, 'nilai' => $net[$baris->id_asli][0]];
						$this->Perhitungan_model->insert_nilai_hasil($nilai_hasil);
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php $this->load->view('layouts/footer_admin'); ?>