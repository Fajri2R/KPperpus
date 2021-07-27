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
            <form method="post" action="<?= base_url() ?>laporan/peminjaman">
                <div class="row">
                    <div class="col-md-2">
                        <h4 class="text-primary"><b>Filter Laporan Data Buku</b></h4>
                    </div>

                    <div class="col-md-3" style="margin-right:30px;">
                        <input type="text" name="tgl_terima" class="form-control" placeholder="Tanggal Terima" onfocus="(this.type='date')">
                    </div>

                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary btn-block btn-filter"> <i class="fa fa-filter"></i> Filter</button>
                    </div>

                    <div class="col-md-2">
                        <a href="<?= base_url() ?>laporan/databuku" class="btn btn-warning btn-block btn-refresh"><i class="fa fa-refresh"></i> Refresh</a>
                    </div>

                    <div class="col-md-2">
                        <a href="<?= base_url() ?>laporan/pdf_databuku" class="btn btn-danger btn-block btn-pdf" target="_blank"> <i class="fa fa-file-pdf-o"></i> Cetak Laporan</a>
                    </div>
                </div>

            </form>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id Buku</th>
                        <th>Tanggal Terima</th>
                        <th>Nomor Induk</th>
                        <th>Judul Buku</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Sumber</th>

                    </tr>
                </thead>

                <tbody>
                    <?php
                    foreach ($data as $row) { ?>
                        <tr>
                            <td><?= $row->id_buku; ?></td>
                            <td><?= slashdate_indo($row->tgl_terima); ?></td>
                            <td><?= $row->nomor_induk; ?></td>
                            <td style="text-transform: capitalize;"><?= $row->judul_buku; ?></td>
                            <td style="text-transform: capitalize;"><?= $row->nama_pengarang; ?></td>
                            <td style="text-transform: capitalize;"><?= $row->nama_penerbit; ?></td>
                            <td><?= $row->tahun_terbit; ?></td>
                            <td><?= $row->sumber; ?></td>

                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>