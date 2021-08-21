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
            <form method="post" action="<?= base_url() ?>laporan/pengembalian">

                <div class="row">
                    <div class="col-md-2">
                        <h4 class="text-primary"><b>Filter Laporan Pengembalian</b></h4>
                    </div>

                    <div class="col-md-2">
                        <input type="text" name="tgl_awal" class="form-control" placeholder="Tanggal Pinjam" onfocus="(this.type='date')">
                    </div>

                    <div class="col-md-2">
                        <input type="text" name="tgl_ahir" class="form-control tgl_ahir" placeholder="Tanggal Kembali" onfocus="(this.type='date')">
                    </div>

                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary btn-block btn-filter"> <i class="fa fa-filter"></i> Filter</button>
                    </div>

                    <div class="col-md-2">
                        <a href="<?= base_url() ?>laporan/pengembalian" class="btn btn-warning btn-block btn-refresh"><i class="fa fa-refresh"></i> Refresh</a>
                    </div>

                    <div class="col-md-2">
                        <a href="<?= base_url() ?>laporan/pdf_pengembalian" class="btn btn-danger btn-block btn-pdf" target="_blank"> <i class="fa fa-file-pdf-o"></i> Cetak Laporan</a>
                    </div>
                </div>

            </form>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Id Anggota</th>
                        <th>Nama Peminjam</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Tanggal di Kembalikan</th>
                        <th>Denda</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data as $row) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row->id_anggota; ?></td>
                            <td><?= $row->nama; ?></td>
                            <td><?= $row->judul_buku; ?></td>
                            <td><?= $row->tgl_pinjam; ?></td>
                            <td><?= $row->tgl_kembali; ?></td>
                            <td><?= $row->tgl_kembalikan; ?></td>
                            <td>
                                <?php
                                $tgl_kembali = new DateTime($row->tgl_kembali);
                                $tgl_kembalikan = new DateTime($row->tgl_kembalikan);
                                $selisih = $tgl_kembalikan->diff($tgl_kembali)->format("%a");
                                if ($tgl_kembali >= $tgl_kembalikan or $selisih == 0) {
                                    echo "Tidak ada denda";
                                } else {
                                    echo $this->m_pengembalian->rp(1000 * $selisih);
                                }
                                ?>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>