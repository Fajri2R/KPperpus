<div class="row">
	<div class="col-md-6">
		<a href="<?= base_url() ?>anggota" class="btn btn-success"><i class="fa fa-arrow-left"></i> Kembali</a>
	</div>
</div>
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
						<td style="text-transform: capitalize;"><?= $row->alamat; ?></td>
						<td><?= hp($row->no_hp); ?></td>
						<td><?= $row->level == 1 ? "Admin" : "Siswa" ?></td>
					</tr>
				<?php }
				?>
			</tbody>
		</table>
	</div>
</div>