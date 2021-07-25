<div class="vid-container1">

    <div class="inner-container1">

        <div class="box1">
            <?= $this->session->flashdata('message'); ?>
            <h1>Selamat Datang</h1>
            <p>Silahkan Login Terlebih Dahulu</p>


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
    </div>
</div>