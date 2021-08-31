<?php
if (!empty($this->session->flashdata('info'))) { ?>
    <div class="alert alert-success" role="alert"><?= $this->session->flashdata('info'); ?></div>
<?php }
?>

<div class="row">
    <div class="col-md-12">
        <a href="<?= base_url() ?>klasifikasi/tambah_klasifikasi" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Klasifikasi</a>
    </div>
</div>

<br>

<div class="box">
    <div class="box-header">

    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Id Klasifikasi</th>
                    <th>Nama Klasifikasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                foreach ($data as $row) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row->id_klasifikasi; ?></td>
                        <td><?= $row->nama_klasifikasi; ?></td>
                        <td>
                            <a href="<?= base_url() ?>klasifikasi/edit/<?= $row->id_klasifikasi; ?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Edit</a>
                            <a href="<?= base_url() ?>klasifikasi/hapus/<?= $row->id_klasifikasi; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin mau menghapus ?');"><i class="fa fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
</div>