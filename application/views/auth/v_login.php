		<div class="login-box">
			<div class="login-logo">

			</div>
			<br>
			<br>
			<br>
			<!-- /.login-logo -->
			<div class="login-box-body">
				<p class="login-box-msg login">Selamat Datang</p>
				<p class="login-box-msg1">Silahkan Login terlebih dahulu!</p>

				<?= $this->session->flashdata('message'); ?>

				<form action="<?= base_url() ?>login" method="post">

					<div class="form-group">
						<input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username">
						<?= form_error('username', '<small class="text-danger pl-3">', '</small>')  ?>
					</div>
					<div class="form-group">
						<input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
						<?= form_error('password', '<small class="text-danger pl-3">', '</small>')  ?>
					</div>
					<button type="submit" class="btn btn-primary btn-user btn-block">
						Login
					</button>
				</form>
			</div>
			<!-- /.login-box-body -->
		</div>