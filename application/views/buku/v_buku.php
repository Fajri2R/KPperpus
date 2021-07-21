<?php
if (!empty($this->session->flashdata('info'))) { ?>
	<div class="alert alert-success" role="alert"><?= $this->session->flashdata('info'); ?></div>
<?php }
if ($this->session->userdata('level') == '1') { ?>

	<div class="row">
		<div class="col-md-12">
			<a href="<?= base_url() ?>buku/tambah_buku" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Buku</a>
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
						<th>Id Buku</th>
						<th>Tanggal Terima</th>
						<th>Nomor Induk</th>
						<th>Pengarang</th>
						<th>Judul</th>
						<th>Penerbit</th>
						<th>Tahun Terbit</th>
						<th>Cetakan Ke</th>
						<th>Sumber</th>
						<th>Klasifikasi</th>
						<th>Jumlah</th>
						<th>Aksi</th>
					</tr>
				</thead>

				<tbody>
					<?php
					foreach ($data->result() as $row) { ?>
						<tr>
							<td><?= $row->id_buku; ?></td>
							<td><?= mediumdate_indo($row->tgl_terima); ?></td>
							<td><?= $row->nomor_induk; ?></td>
							<td><?= $row->nama_pengarang; ?></td>
							<td><?= $row->judul_buku; ?></td>
							<td><?= $row->nama_penerbit; ?></td>
							<td><?= $row->tahun_terbit; ?></td>
							<td><?= $row->cetakan; ?></td>
							<td><?= $row->sumber; ?></td>
							<td><?= $row->nama_klasifikasi; ?></td>
							<td><?= $row->jumlah; ?></td>
							<td>
								<a href="<?= base_url() ?>buku/edit/<?= $row->id_buku; ?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Edit</a>
								<a href="<?= base_url() ?>buku/hapus/<?= $row->id_buku; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Mau Menghapus ?');"><i class="fa fa-trash"></i> Hapus</a>
							</td>
						</tr>
					<?php }
					?>
				</tbody>
			</table>
		</div>
	</div>

<?php } else if ($this->session->userdata('level') == '2') { ?>


	<div class="box">
		<div class="box-header">

		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Id Buku</th>
						<th>Pengarang</th>
						<th>Penerbit</th>
						<th>Judul</th>
						<th>Tahun Terbit</th>
						<th>Cetakan Ke</th>
						<th>Klasifikasi</th>
						<th>Jumlah</th>
					</tr>
				</thead>

				<tbody>
					<?php
					foreach ($data->result() as $row) { ?>
						<tr>
							<td><?= $row->id_buku; ?></td>
							<td style="text-transform:capitalize;"><?= $row->nama_pengarang; ?></td>
							<td style="text-transform:capitalize;"><?= $row->nama_penerbit; ?></td>
							<td style="text-transform:capitalize;"><?= $row->judul_buku; ?></td>
							<td><?= $row->tahun_terbit; ?></td>
							<td><?= $row->cetakan; ?></td>
							<td style="text-transform:capitalize;"><?= $row->nama_klasifikasi; ?></td>
							<td><?= $row->jumlah; ?></td>
						</tr>
					<?php }
					?>
				</tbody>
			</table>
		</div>
	</div>


<?php }
?>