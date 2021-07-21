<?php
if (!empty($this->session->flashdata('info'))) { ?>
	<div class="alert alert-success" role="alert"><?= $this->session->flashdata('info'); ?></div>
<?php }
?>

<div class="row">
	<div class="col-md-12">
		<a href="<?= base_url() ?>pengarang/tambah_pengarang" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Pengarang</a>
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
					<th>Id Pengarang</th>
					<th>Nama Pengarang</th>
					<th>Aksi</th>
				</tr>
			</thead>

			<tbody>
				<?php
				foreach ($data as $row) { ?>
					<tr>
						<td><?= $row->id_pengarang; ?></td>
						<td><?= $row->nama_pengarang; ?></td>
						<td>
							<a href="<?= base_url() ?>pengarang/edit/<?= $row->id_pengarang; ?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Edit</a>
							<a href="<?= base_url() ?>pengarang/hapus/<?= $row->id_pengarang; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin mau menghapus ?');"><i class="fa fa-trash"></i> Hapus</a>
						</td>
					</tr>
				<?php }
				?>
			</tbody>
		</table>
	</div>
</div>