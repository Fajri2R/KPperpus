    <div class="card">
        <div class="card-header">
            <h3>DATA PROFIL</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <!-- start biodata diri -->
                    <div class="row">
                        <div class="col-md-2">

                            <img src="<?= base_url('assets/dist/img/') . $user['image'] ?>" class="users-avatar-shadow rounded mb-2 pr-2 ml-1" alt="avatar" width="180">
                        </div>
                        <div class="col-md-10" style="margin-left: -15px;">
                            <table class="table table-sm table-stripped">
                                <tbody>
                                    <tr>
                                        <td class="font-weight-bold">Username</td>
                                        <td>: <?= $user['username']  ?></td>
                                    </tr>
                                    <tr>
                                        <td width="22%" class="font-weight-bold">Nama</td>
                                        <td>: <?= $user['nama'];  ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Jenis Kelamin</td>
                                        <td>: <?= $user['jenkel'];  ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Nomor HP</td>
                                        <td>: <?= $user['no_hp'];  ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Level</td>
                                        <td>: <?php if ($user['level'] == 1) : ?>
                                                Admin
                                            <?php else : ?>
                                                Siswa
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end biodata diri -->
                    <div id="biodata-diri">
                        <?php echo form_open_multipart('profile/update'); ?>

                        <hr>
                        <h3>UPDATE PROFIL</h3>
                        <br>
                        <?php
                        if ($this->session->flashdata('error_msg')) {
                            echo '<div class="alert alert-danger" role="alert">
                            Foto gagal diupdate, silahkan cek kembali format foto anda
                              </div>';
                        } else {
                            echo $this->session->flashdata('info');
                        }
                        ?>


                        <div class="form-row col-md-12">
                            <div class="form-group col-md-12">
                                <label for="username">USERNAME</label>
                                <input class="form-control" name="username" type="text" value="<?= $user['username'];  ?>" readonly>
                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>')  ?>
                            </div>
                        </div>

                        <div class="form-row col-md-12">
                            <div class="form-group col-md-12">
                                <label for="no_hp">NOMOR HP</label>
                                <input class="form-control" name="no_hp" type="number" value="<?= $user['no_hp'];  ?>">
                                <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>')  ?>
                            </div>
                        </div>

                        <!-- <div class="form-row col-md-12">
                            <div class="form-group col-md-6">
                                <label for="password">PASSWORD BARU (kosongkan jika tidak ingin mengganti password)</label>
                                <input class="form-control" name="password1" type="password" value="">
                                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>')  ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password_confirmation">KONFIRMASI PASSWORD BARU</label>
                                <input class="form-control" name="password2" type="password" value="">

                            </div>
                        </div> -->

                        <div class="form-row col-md-12">
                            <div class="form-group col-md-12">
                                <label for="image">GANTI FOTO (Format: jpg, jpeg, png. Ukuran foto maksimal 512x512. Ukuran File Maks 2MB)</label>
                                <input class="form-control col" name="image" type="file">

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