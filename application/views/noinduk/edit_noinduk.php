<div class="col-md-12">
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title"><?= $judul; ?></h3>
		</div>

		<form method="post" action="<?= base_url() ?>noinduk/update" class="form-horizontal">
			<div class="box-body">

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Id Nomor Induk</label>
					<div class="col-sm-10">
						<input type="text" name="id_noinduk" value="<?= $data['id_noinduk']; ?>" class="form-control" readonly>
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Nomor Induk</label>
					<div class="col-sm-10">
						<input type="text" name="nomor_induk" value="<?= $data['nomor_induk']; ?>" class="form-control" placeholder="Nomor Induk" required>
					</div>
				</div>

			</div>

			<div class="box-footer">
				<a href="<?= base_url() ?>noinduk" class="btn btn-warning">Cancel</a>
				<button type="submit" class="btn btn-primary">Update</button>
			</div>
		</form>

	</div>
</div>