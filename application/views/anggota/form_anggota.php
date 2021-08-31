<div class="col-md-12">
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title"><?= $judul; ?></h3>
		</div>
		<br>
		<?= $this->session->flashdata('info'); ?>

		<form method="post" action="<?= base_url() ?>anggota/simpan" class="form-horizontal">
			<div class="box-body">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">ID User</label>
					<div class="col-sm-10">
						<input type="text" name="id_anggota" value="<?= $id_anggota; ?>" class="form-control" readonly>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Nama User</label>
					<div class="col-sm-10">
						<input type="text" name="nama" class="form-control" placeholder="Nama Anggota" value="<?= set_value('nama')  ?>">
						<?= form_error('nama', '<small class="text-danger pl-3">', '</small>')  ?>
					</div>
				</div>

				<div class=" form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Username</label>
					<div class="col-sm-10">
						<input type="text" name="username" class="form-control" placeholder="Username" value="<?= set_value('username')  ?>">
						<?= form_error('username', '<small class="text-danger pl-3">', '</small>')  ?>
					</div>
				</div>

				<div class=" form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-5">
						<input type="password" name="password1" class="form-control" placeholder="Password">
						<?= form_error('password1', '<small class="text-danger pl-3">', '</small>')  ?>
					</div>
					<div class="col-sm-5">
						<input type="password" name="password2" class="form-control" placeholder="Konfirmasi Password">
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Jenis Kelamin</label>
					<div class="col-sm-10">
						<select name="jenkel" class="form-control">
							<option value=""> - Pilih Jenis Kelamin - </option>
							<option value="Laki-laki" <?= set_value('jenkel') == "Laki-laki" ? "selected" : null ?>> Laki-laki </option>
							<option value="Perempuan" <?= set_value('jenkel') == "Perempuan" ? "selected" : null ?>> Perempuan </option>
						</select>
						<?= form_error('jenkel', '<small class="text-danger pl-3">', '</small>')  ?>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>
					<div class="col-sm-10">
						<textarea name="alamat" class="form-control" cols="30" rows="5" value="<?= set_value('alamat')  ?>"><?= set_value('alamat')  ?></textarea>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Nomor HP (Whatsapp)</label>
					<div class="col-sm-10">
						<input type="number" name="no_hp" class="form-control" placeholder="Contoh: 08xxxxxxx" value="<?= set_value('no_hp')  ?>">
						<?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>')  ?>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Level</label>
					<div class="col-sm-10">
						<select name="level" class="form-control">
							<option value=""> - Pilih - </option>
							<option value="1"> Admin </option>
							<option value="2"> Siswa </option>
						</select>
						<?= form_error('level', '<small class="text-danger pl-3">', '</small>')  ?>
					</div>
				</div>

			</div>

			<div class="box-footer">
				<a href="<?= base_url() ?>anggota" class="btn btn-warning">Cancel</a>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		</form>

	</div>
</div>