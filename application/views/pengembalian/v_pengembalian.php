<div class="box">
	<div class="box-header">

	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama Peminjam</th>
					<th>Judul Buku</th>
					<th>Tanggal Pinjam</th>
					<th>Tanggal Kembali</th>
					<th>Tanggal di Kembalikan</th>
					<th>Denda</th>
					<th>Aksi</th>
				</tr>
			</thead>

			<tbody>

				<?php
				$no = 1;
				foreach ($data as $row) { ?>
					<tr>
						<td><?= $no++; ?></td>
						<td><?= $row->nama; ?></td>
						<td><?= $row->judul_buku; ?></td>
						<td><?= $row->tgl_pinjam; ?></td>
						<td><?= $row->tgl_kembali; ?></td>
						<td><?= $row->tgl_kembalikan; ?></td>
						<td>
							<?php
							$tgl_kembali = new DateTime($row->tgl_kembali);
							$tgl_kembalikan = new DateTime($row->tgl_kembalikan);
							$selisih = $tgl_kembalikan->diff($tgl_kembali)->format("%a");
							if ($tgl_kembali >= $tgl_kembalikan or $selisih == 0) {
								echo "Tidak ada denda";
							} else {
								echo $this->m_pengembalian->rp(1000 * $selisih);
							}
							?>
						</td>
						<td><a href="<?= base_url() ?>pengembalian/hapus/<?= $row->id_pengembalian; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Mau Menghapus ?');"><i class="fa fa-trash"></i> Hapus</a></td>
					</tr>
				<?php }
				?>

			</tbody>
		</table>
	</div>
</div>