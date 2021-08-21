<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style type="text/css">
        .tgl_ahir {
            margin-left: -20px;
        }

        .btn-filter {
            margin-left: -40px;
        }

        .btn-refresh {
            margin-left: -60px;
        }

        .btn-pdf {
            margin-left: -80px;
        }
    </style>
</head>

<body>
    <div class="box">
        <div class="box-header">
            <form method="post" action="<?= base_url() ?>laporan/dataanggota">

                <div class="row">
                    <div class="col-md-2" style="visibility: hidden;">
                        <h4 class="text-primary"><b>Filter Laporan Data Anggota</b></h4>
                    </div>

                    <div class="col-md-2" style="visibility: hidden;">
                        <input type="text" name="jenkel" class="form-control" placeholder="Tanggal Pinjam" onfocus="(this.type='text')">
                    </div>

                    <div class="col-md-2" style="visibility: hidden;">
                        <input type="text" name="tgl_ahir" class="form-control tgl_ahir" placeholder="Tanggal Kembali" onfocus="(this.type='date')">
                    </div>

                    <div class="col-md-2" style="visibility: hidden;">
                        <button type="submit" class="btn btn-primary btn-block btn-filter"> <i class="fa fa-filter"></i> Filter</button>
                    </div>

                    <div class="col-md-2">
                        <a href="<?= base_url() ?>laporan/dataanggota" class="btn btn-warning btn-block btn-refresh"><i class="fa fa-refresh"></i> Refresh</a>
                    </div>

                    <div class="col-md-2">
                        <a href="<?= base_url() ?>laporan/pdf_dataanggota" class="btn btn-danger btn-block btn-pdf" target="_blank"> <i class="fa fa-file-pdf-o"></i> Cetak Laporan</a>
                    </div>
                </div>

            </form>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id Anggota</th>
                        <th>Username</th>
                        <th>Nama Anggota</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No. Telpon</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    foreach ($data as $row) { ?>
                        <tr>
                            <td><?= $row->id_anggota; ?></td>
                            <td><?= $row->username; ?></td>
                            <td style="text-transform: capitalize;"><?= $row->nama; ?></td>
                            <td><?= $row->jenkel; ?></td>
                            <td style="text-transform: capitalize;"><?= $row->alamat; ?></td>
                            <td><?= hp($row->no_hp); ?></td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>