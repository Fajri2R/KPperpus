	<div class="login-box">
		<!-- /.login-logo -->
		<div class="login-box-body">
			<p class="login-box-msg login">Silahkan Registrasi</p>
			<br>
			<?= $this->session->flashdata('message'); ?>

			<form action="<?= base_url() ?>login/registration" method="post">

				<div class="form-group">
					<input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama')  ?>">
					<?= form_error('nama', '<small class="text-danger pl-3">', '</small>')  ?>
				</div>
				<div class="form-group">
					<input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="<?= set_value('username')  ?>">
					<?= form_error('username', '<small class="text-danger pl-3">', '</small>')  ?>
				</div>

				<div class="form-group row">
					<div class="col-sm-6 mb-3 mb-sm-0">
						<input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
						<?= form_error('password1', '<small class="text-danger pl-3">', '</small>')  ?>
					</div>
					<div class="col-sm-6">
						<input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
					</div>
				</div>
				<button type="submit" class="btn btn-primary btn-user btn-block">
					Register Account
				</button>
				<a class="collapse-item" href="<?= base_url() ?>login">Login</a>
			</form>
		</div>
		<!-- /.login-box-body -->
	</div>