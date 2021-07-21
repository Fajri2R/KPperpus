<div class="col-md-12">
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title"><?= $judul; ?></h3>
		</div>

		<form method="post" action="<?= base_url() ?>buku/simpan" class="form-horizontal">
			<div class="box-body">

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Id Buku</label>
					<div class="col-sm-10">
						<input type="text" name="id_buku" value="<?= $id_buku; ?>" class="form-control" readonly>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Tanggal Terima</label>
					<div class="col-sm-10">
						<input type="date" name="tgl_terima" class="form-control" required>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Nomor Induk</label>
					<div class="col-sm-10">
						<select name="id_noinduk" class="form-control select2">
							<option value=""> - Pilih Nomor Induk - </option>
							<?php
							foreach ($noinduk as $row) { ?>
								<option value="<?= $row->id_noinduk; ?>"><?= $row->nomor_induk; ?></option>
							<?php }
							?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Judul Buku</label>
					<div class="col-sm-10">
						<input type="text" name="judul_buku" class="form-control" placeholder="Judul Buku" required>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Pengarang</label>
					<div class="col-sm-10">
						<select name="id_pengarang" class="form-control select2">
							<option value=""> - Pilih Pengarang - </option>
							<?php
							foreach ($pengarang as $row) { ?>
								<option value="<?= $row->id_pengarang; ?>"><?= $row->nama_pengarang; ?></option>
							<?php }
							?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Penerbit</label>
					<div class="col-sm-10">
						<select name="id_penerbit" class="form-control select2">
							<option value=""> - Pilih Penerbit - </option>
							<?php
							foreach ($penerbit as $row) { ?>
								<option value="<?= $row->id_penerbit; ?>"><?= $row->nama_penerbit; ?></option>
							<?php }
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
							for ($tahun = 2000; $tahun <= 2025; $tahun++) { ?>
								<option value="<?= $tahun ?>"><?= $tahun; ?></option>
							<?php }
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
							for ($tahun = 1; $tahun <= 100; $tahun++) { ?>
								<option value="<?= $tahun ?>"><?= $tahun; ?></option>
							<?php }
							?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Sumber Buku</label>
					<div class="col-sm-10">
						<input type="text" name="sumber" class="form-control" placeholder="Sumber Buku" required>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Klasifikasi</label>
					<div class="col-sm-10">
						<select name="id_klasifikasi" class="form-control select2">
							<option value=""> - Pilih Klasifikasi - </option>
							<?php
							foreach ($klasifikasi as $row) { ?>
								<option value="<?= $row->id_klasifikasi; ?>"><?= $row->nama_klasifikasi; ?></option>
							<?php }
							?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Jumlah</label>
					<div class="col-sm-10">
						<input type="number" name="jumlah" class="form-control">
					</div>
				</div>

			</div>

			<div class="box-footer">
				<a href="<?= base_url() ?>buku" class="btn btn-warning">Cancel</a>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		</form>

	</div>
</div>