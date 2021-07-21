<div class="col-md-12">
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title"><?= $judul; ?></h3>
		</div>

		<form method="post" action="<?= base_url() ?>anggota/update" class="form-horizontal">
			<div class="box-body">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">ID User</label>
					<div class="col-sm-10">
						<input type="text" name="id_anggota" value="<?= $data['id_anggota']; ?>" class="form-control" readonly>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Nama User</label>
					<div class="col-sm-10">
						<input type="text" name="nama" value="<?= $data['nama']; ?>" class="form-control" placeholder="Nama User">
						<?= form_error('nama', '<small class="text-danger pl-3">', '</small>')  ?>
					</div>
				</div>

				<div class=" form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Username</label>
					<div class="col-sm-10">
						<input type="text" name="username" value="<?= $data['username']; ?>" class=" form-control" placeholder="Username">
						<?= form_error('username', '<small class="text-danger pl-3">', '</small>')  ?>
					</div>
				</div>

				<div class=" form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Jenis Kelamin</label>
					<div class="col-sm-10">
						<select name="jenkel" class="form-control">
							<?php
							if ($data['jenkel'] == "Laki-laki") { ?>
								<option value="Laki-laki" selected> Laki-laki </option>
								<option value="Perempuan"> Perempuan </option>
							<?php } else { ?>
								<option value="Laki-laki"> Laki-laki </option>
								<option value="Perempuan" selected> Perempuan </option>
							<?php }
							?>

						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>
					<div class="col-sm-10">
						<textarea name="alamat" class="form-control" cols="30" rows="5"><?= $data['alamat']; ?></textarea>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Nomor HP (Whatsapp)</label>
					<div class="col-sm-10">
						<input type="text" name="no_hp" class="form-control" placeholder="Contoh: 08xxxxxxx" value="<?= $data['no_hp'];  ?>" placeholder="Nomor HP">
						<?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>')  ?>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Level</label>
					<div class="col-sm-10">
						<select name="level" class="form-control">
							<?php
							if ($data['level'] == "1") { ?>
								<option value="1" selected> Admin </option>
								<option value="2"> Siswa </option>
							<?php } else { ?>
								<option value="1"> Admin </option>
								<option value="2" selected> Siswa </option>
							<?php }
							?>
						</select>
						<?= form_error('level', '<small class="text-danger pl-3">', '</small>')  ?>
					</div>
				</div>
			</div>

			<div class="box-footer">
				<a href="<?= base_url() ?>anggota" class="btn btn-warning">Cancel</a>
				<button type="submit" class="btn btn-primary">Update</button>
			</div>
		</form>

	</div>
</div>