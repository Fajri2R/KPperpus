<?php
if (!empty($this->session->flashdata('info'))) { ?>
    <div class="alert alert-success" role="alert"><?= $this->session->flashdata('info'); ?></div>
<?php }
?>
<div class="box">
    <div class="box-header">

    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id Peminjaman</th>
                    <th>Peminjam</th>
                    <th>Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($data as $row) {
                    $tgl_kembali = new DateTime($row->tgl_kembali);
                    $tgl_sekarang = new DateTime();
                    $selisih = $tgl_sekarang->diff($tgl_kembali)->format("%a");
                    // var_dump($selisih);
                    // die;
                ?>
                    <tr>
                        <td><?= $row->id_pm; ?></td>
                        <td><?= $row->nama; ?></td>
                        <td><?= $row->judul_buku; ?></td>
                        <td><?= $row->tgl_pinjam; ?></td>
                        <td><?= $row->tgl_kembali; ?></td>
                        <td>
                            <?php
                            if ($tgl_kembali >= $tgl_sekarang or $selisih == 0) {
                                echo "<span class='label label-warning'>Belum di Kembalikan</span>";
                            } else {
                                echo "Telat <b style = 'color:red;'>" . $selisih . "</b> Hari ";
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