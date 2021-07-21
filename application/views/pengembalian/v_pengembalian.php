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
						<td><a href="<?= base_url() ?>pengembalian/hapus/<?= $row->id_pengembalian; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Mau Menghapus ?');">Hapus</a></td>
					</tr>
				<?php }
				?>

			</tbody>
		</table>
	</div>
</div>