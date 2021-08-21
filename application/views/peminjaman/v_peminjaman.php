<?php
if (!empty($this->session->flashdata('info'))) { ?>
	<div class="alert alert-success" role="alert"><?= $this->session->flashdata('info'); ?></div>
<?php }
?>

<div class="row">
	<div class="col-md-12">
		<a href="<?= base_url() ?>peminjaman/tambah_peminjaman" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Peminjaman</a>
	</div>
</div>

<br>

<div class="box">
	<div class="box-header">

	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Id Peminjaman</th>
					<th>Id Anggota</th>
					<th>Peminjam</th>
					<th>Buku</th>
					<th>Tanggal Pinjam</th>
					<th>Tanggal Kembali</th>
					<th>Status</th>
					<th>Nomor HP (Whatsapp)</th>
					<th>Aksi</th>
				</tr>
			</thead>

			<tbody>
				<?php
				foreach ($data as $row) {
					$tgl_kembali = new DateTime($row->tgl_kembali);
					$tgl_sekarang = new DateTime();
					$selisih = $tgl_sekarang->diff($tgl_kembali)->format("%a");
					// var_dump($selisih);
					// die;
				?>
					<tr>
						<td><?= $row->id_pm; ?></td>
						<td><?= $row->id_anggota; ?></td>
						<td><?= $row->nama; ?></td>
						<td><?= $row->judul_buku; ?></td>
						<td><?= $row->tgl_pinjam; ?></td>
						<td><?= $row->tgl_kembali; ?></td>
						<td>
							<?php
							if ($tgl_kembali >= $tgl_sekarang or $selisih == 0) {
								echo "<span class='label label-warning'>Belum di Kembalikan</span>";
							} else {
								echo "Telat <b style = 'color:red;'>" . $selisih . "</b> Hari <br> <span class='label label-danger'> Denda Perhari = 1.000";
							}
							?>
						</td>
						<td> <?= hp($row->no_hp); ?> </td>
						<?php
						date_default_timezone_set("Asia/Bangkok");
						$waktu = date("H");
						if ($waktu < "12") {
							$salam = "pagi";
						} elseif ($waktu >= "12" && $waktu < "17") {
							$salam = "siang";
						} elseif ($waktu >= "17" && $waktu < "19") {
							$salam = "sore";
						} elseif ($waktu >= "19") {
							$salam = "malam";
						}
						$nomor = hp($row->no_hp);
						$jdlbuku = ($row->judul_buku);
						$e1 = '%20%F0%9F%98%81%0A%0A';
						$e2 = '%20%F0%9F%A5%BA.';
						$e3 = '%20%F0%9F%99%8F%2C';
						$pesanreal = '&text=' . 'Halo selamat ' . $salam . $e1 . 'Ini dari perpustakaan, ingin mengingatkan bahwa waktu pinjam buku berjudul ' . $jdlbuku . ' telah habis' . $e2 . ' Mohon segera dikembalikan' . $e3 . ' terima kasih';
						$penutup = '%0A%0ASalam hangat dari Petugas Perpustakaan%20%F0%9F%98%89';
						if ($this->agent->is_mobile()) $linkWA = 'https://api.whatsapp.com/send?phone=' . $nomor . $pesanreal . $penutup;
						// tapi kalau desktop pakai web.whatsapp.com
						else $linkWA = 'https://web.whatsapp.com/send?phone=' . $nomor . $pesanreal . $penutup;
						?>
						<td>
							<a href="<?php echo $linkWA ?>" target="_blank" class="btn btn-success btn-xs" onclick="return confirm('Kirim Notifikasi Pengembalian Buku ke User ini ?');"><i class="fa fa-whatsapp"></i> Notifikasi</a>
							<a href="<?= base_url() ?>peminjaman/kembalikan/<?= $row->id_pm; ?>" class="btn btn-primary btn-xs" onclick="return confirm('Yakin User ini sudah mengembalikan buku ?');"><i class="fa fa-undo"></i> Kembalikan</a>
							<a href="<?= base_url() ?>peminjaman/hapus/<?= $row->id_pm; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Mau Menghapus ?');"><i class="fa fa-trash"></i> Hapus</a>
						</td>

					</tr>
				<?php }
				?>
			</tbody>
		</table>
	</div>
</div>