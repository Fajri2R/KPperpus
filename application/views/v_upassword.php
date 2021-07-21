<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- start biodata diri -->
                <?= $this->session->flashdata('info');  ?>
                <div id="biodata-diri">
                    <?php echo form_open_multipart('upassword/update'); ?>
                    <div class="form-row col-md-12">
                        <div class="form-group col-md-12">
                            <label for="cpassword">PASSWORD LAMA</label>
                            <input class="form-control" name="cpassword" type="password">
                            <?= form_error('cpassword', '<small class="text-danger pl-3">', '</small>')  ?>
                        </div>
                    </div>
                    <div class="form-row col-md-12">
                        <div class="form-group col-md-12">
                            <label for="npassword1">PASSWORD BARU</label>
                            <input class="form-control" name="npassword1" type="password">
                            <?= form_error('npassword1', '<small class="text-danger pl-3">', '</small>')  ?>
                        </div>
                    </div>
                    <div class="form-row col-md-12">
                        <div class="form-group col-md-12">
                            <label for="npassword2">KONFIRMASI PASSWORD BARU</label>
                            <input class="form-control" name="npassword2" type="password">
                            <?= form_error('npassword2', '<small class="text-danger pl-3">', '</small>')  ?>
                        </div>
                    </div>

                    <p style="margin: 0 0 0 30px;">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                    </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>