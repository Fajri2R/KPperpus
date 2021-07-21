<div class="col-md-12">
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title"><?= $judul; ?></h3>
		</div>
		<form method="post" action="<?= base_url() ?>buku/update" class="form-horizontal">
			<div class="box-body">

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Id Buku</label>
					<div class="col-sm-10">
						<input type="text" name="id_buku" value="<?= $data['id_buku']; ?>" class="form-control" readonly>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Tanggal Terima</label>
					<div class="col-sm-10">
						<input type="date" name="tgl_terima" value="<?= $data['tgl_terima']; ?>" class="form-control" required>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Nomor Induk</label>
					<div class="col-sm-10">
						<select name="id_noinduk" class="form-control select2">
							<?php
							foreach ($noinduk as $row) {
								if ($data['id_noinduk'] == $row->id_noinduk) { ?>
									<option value="<?= $row->id_noinduk ?>" selected> <?= $row->nomor_induk; ?> </option>
								<?php } else { ?>
									<option value="<?= $row->id_noinduk ?>"> <?= $row->nomor_induk; ?> </option>
							<?php }
							}
							?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Judul Buku</label>
					<div class="col-sm-10">
						<input type="text" name="judul_buku" value="<?= $data['judul_buku']; ?>" class="form-control" placeholder="Judul Buku" required>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Pengarang</label>
					<div class="col-sm-10">
						<select name="id_pengarang" class="form-control select2">
							<?php
							foreach ($pengarang as $row) {
								if ($data['id_pengarang'] == $row->id_pengarang) { ?>
									<option value="<?= $row->id_pengarang ?>" selected> <?= $row->nama_pengarang; ?> </option>
								<?php } else { ?>
									<option value="<?= $row->id_pengarang ?>"> <?= $row->nama_pengarang; ?> </option>
							<?php }
							}
							?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Penerbit</label>
					<div class="col-sm-10">
						<select name="id_penerbit" class="form-control select2">
							<?php
							foreach ($penerbit as $row) {
								if ($data['id_penerbit'] == $row->id_penerbit) { ?>
									<option value="<?= $row->id_penerbit ?>" selected> <?= $row->nama_penerbit; ?> </option>
								<?php } else { ?>
									<option value="<?= $row->id_penerbit ?>"> <?= $row->nama_penerbit; ?> </option>
							<?php }
							}
							?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Tahun Terbit</label>
					<div class="col-sm-10">
						<select name="tahun_terbit" class="form-control select2">
							<option value=""> - Pilih Tahun - </option>
							<?php
							for ($tahun = 2000; $tahun <= 2020; $tahun++) {
								if ($data['tahun_terbit'] == $tahun) { ?>
									<option value="<?= $tahun; ?>" selected> <?= $tahun; ?></option>
								<?php } else { ?>
									<option value="<?= $tahun; ?>"> <?= $tahun; ?></option>
							<?php }
							}
							?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Cetakan Ke</label>
					<div class="col-sm-10">
						<select name="cetakan" class="form-control select2">
							<option value=""> - Pilih Cetakan Ke - </option>
							<?php
							for ($tahun = 1; $tahun <= 100; $tahun++) {
								if ($data['cetakan'] == $tahun) { ?>
									<option value="<?= $tahun; ?>" selected> <?= $tahun; ?></option>
								<?php } else { ?>
									<option value="<?= $tahun; ?>"> <?= $tahun; ?></option>
							<?php }
							}
							?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Sumber Buku</label>
					<div class="col-sm-10">
						<input type="text" name="sumber" value="<?= $data['sumber']; ?>" class="form-control" placeholder="Sumber Buku" required>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Klasifikasi</label>
					<div class="col-sm-10">
						<select name="id_klasifikasi" class="form-control select2">
							<?php
							foreach ($klasifikasi as $row) {
								if ($data['id_klasifikasi'] == $row->id_klasifikasi) { ?>
									<option value="<?= $row->id_klasifikasi ?>" selected> <?= $row->nama_klasifikasi; ?> </option>
								<?php } else { ?>
									<option value="<?= $row->id_klasifikasi ?>"> <?= $row->nama_klasifikasi; ?> </option>
							<?php }
							}
							?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Jumlah</label>
					<div class="col-sm-10">
						<input type="number" name="jumlah" value="<?= $data['jumlah']; ?>" class="form-control">
					</div>
				</div>

			</div>

			<div class="box-footer">
				<a href="<?= base_url() ?>buku" class="btn btn-warning">Cancel</a>
				<button type="submit" class="btn btn-primary">Update</button>
			</div>
		</form>

	</div>
</div>