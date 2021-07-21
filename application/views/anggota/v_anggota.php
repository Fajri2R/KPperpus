<?php
if (!empty($this->session->flashdata('info'))) { ?>
	<div class="alert alert-success" role="alert"><?= $this->session->flashdata('info'); ?></div>
<?php }
?>

<div class="row">
	<div class="col-md-6">
		<a href="<?= base_url() ?>anggota/tambah_anggota" class="btn btn-success"><i class="fa fa-plus"></i> Tambah User</a>
		<a href="<?= base_url() ?>anggota/data_admin" class="btn btn-success"><i class="fa fa-users"></i> Data Admin</a>
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
					<th>ID User</th>
					<th>Username</th>
					<th>Nama User</th>
					<th>Jenis Kelamin</th>
					<th>Alamat</th>
					<th>No. Telpon</th>
					<th>Level</th>
					<th>Aksi</th>
				</tr>
			</thead>

			<tbody>
				<?php
				foreach ($data as $row) { ?>
					<tr>
						<td><?= $row->id_anggota; ?></td>
						<td><?= $row->username; ?></td>
						<td style="text-transform: capitalize;"><?= $row->nama; ?></td>
						<td><?= $row->jenkel; ?></td>
						<td><?= $row->alamat; ?></td>
						<td><?= $row->no_hp; ?></td>
						<td><?= $row->level == 1 ? "Admin" : "Siswa" ?></td>
						<td>
							<a href="<?= base_url() ?>anggota/edit/<?= $row->id_anggota; ?>" class="btn btn-success btn-xs">Edit</a>
							<a href="<?= base_url() ?>anggota/hapus/<?= $row->id_anggota; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin mau menghapus user ini?');">Hapus</a>
						</td>
					</tr>
				<?php }
				?>
			</tbody>
		</table>
	</div>
</div>