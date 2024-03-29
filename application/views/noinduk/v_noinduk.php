<?php
if (!empty($this->session->flashdata('info'))) { ?>
    <div class="alert alert-success" role="alert"><?= $this->session->flashdata('info'); ?></div>
<?php }
?>

<div class="row">
    <div class="col-md-12">
        <a href="<?= base_url() ?>noinduk/tambah_noinduk" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Nomor Induk</a>
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
                    <th>Id Nomor Induk</th>
                    <th>Nomor Induk</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                foreach ($data as $row) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row->id_noinduk; ?></td>
                        <td><?= $row->nomor_induk; ?></td>
                        <td>
                            <a href="<?= base_url() ?>noinduk/edit/<?= $row->id_noinduk; ?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Edit</a>
                            <a href="<?= base_url() ?>noinduk/hapus/<?= $row->id_noinduk; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin mau menghapus ?');"><i class="fa fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
</div>