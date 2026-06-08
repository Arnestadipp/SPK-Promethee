<!DOCTYPE html>
<html>

<head>
	<title>Laporan Hasil Akhir PROMETHEE</title>
	<style>
		body {
			font-family: Times New Roman, serif;
			font-size: 12px;
		}

		table {
			border-collapse: collapse;
			width: 100%;
		}

		table,
		th,
		td {
			border: 1px solid black;
		}

		th {
			text-align: center;
			padding: 6px;
		}

		td {
			padding: 5px;
		}

		h3,
		h4 {
			text-align: center;
			margin: 5px;
		}
	</style>
</head>

<body>

	<h3>HASIL AKHIR PERANKINGAN</h3>
	<h4>PRIORITAS PEMBANGUNAN KECAMATAN KABUPATEN BANTUL</h4>

	<br>

	<table>
		<thead>
			<tr>
				<th width="15%">Kode Alternatif</th>
				<th>Nama Kecamatan</th>
				<th width="20%">Hasil</th>
				<th width="15%">Ranking</th>
			</tr>
		</thead>

		<tbody>

			<?php
			$no = 1;
			foreach ($hasil as $keys):
				?>

				<tr>
					<td align="center">
						<?= $keys->kode_alternatif ?>
					</td>

					<td>
						<?= $keys->nama ?>
					</td>

					<td align="center">
						<?= number_format($keys->nilai, 5) ?>
					</td>

					<td align="center">
						<?= $no ?>
					</td>
				</tr>

				<?php
				$no++;
			endforeach;
			?>

		</tbody>
	</table>

</body>

</html>