<div class="col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><?= $judul; ?></h3>
        </div>

        <form method="post" action="<?= base_url() ?>noinduk/simpan" class="form-horizontal">
            <div class="box-body">

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Nomor Induk</label>
                    <div class="col-sm-10">
                        <input type="text" name="nomor_induk" class="form-control" placeholder="Nomor Induk" required>
                    </div>
                </div>

            </div>

            <div class="box-footer">
                <a href="<?= base_url() ?>noinduk" class="btn btn-warning">Cancel</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>

    </div>
</div>