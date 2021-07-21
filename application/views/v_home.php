<?php
if ($this->session->userdata('level') == '1') { ?>

  <div class="row">
    <div class="col-lg-6 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?= $anggota; ?></h3>

          <p>User</p>
        </div>
        <div class="icon">
          <i class="fa fa-users"></i>
        </div>
        <a href="<?= base_url() ?>anggota" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-6 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?= $buku; ?></h3>

          <p>Buku</p>
        </div>
        <div class="icon">
          <i class="fa fa-book"></i>
        </div>
        <a href="<?= base_url() ?>buku" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-6 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><?= $pinjam; ?></h3>

          <p>Buku Yang di Pinjam</p>
        </div>
        <div class="icon">
          <i class="fa fa-industry"></i>
        </div>
        <a href="<?= base_url() ?>peminjaman" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-6 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?= $kembali ?></h3>

          <p>Buku Sudah di Kembalikan</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="<?= base_url() ?>pengembalian" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>

<?php } else if ($this->session->userdata('level') == '2') { ?>

  <div class="row">
    <div class="col-lg-6 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h2>
            Profil Saya
          </h2>
          <br>
          <br>
        </div>
        <div class="icon">
          <i class="fa fa-user"></i>
        </div>
        <a href="<?= base_url() ?>profile" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-6 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h2>
            Daftar Buku
          </h2>
          <br>
          <br>
        </div>
        <div class="icon">
          <i class="fa fa-book"></i>
        </div>
        <a href="<?= base_url() ?>buku" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
  <br>
  <div class="shadow card">
    <div class="card-header">
      <h3 style="font-family: 'Righteous', Arial, Helvetica;">
        Visi dan Misi
      </h3>
    </div>
    <div class="card-body">
      <blockquote>
        <h2>
          Visi Universitas Dinamika Bangsa
        </h2>
        <p>
          “Menjadi Universitas yang unggul dan kompetitif dibidang Teknologi Informasi, Kewirausahaan dan Bisnis ditingkat Nasional.”
        </p>
        <h2>
          Misi Universitas Dinamika Bangsa
        </h2>
        <p>
          Misi Universitas Dinamika Bangsa adalah :
        </p>
        <ol>
          <li>
            Meningkatkan peran serta universitas dalam menghasilkan sumber daya manusia yang memiliki kecerdasan intelektual, emosional dan spiritual.
          </li>
          <li>
            Menyelenggarakan Tri Dharma Perguruan Tinggi.
          </li>
          <li>
            Membangun kerjasama dengan lembaga pendidikan tinggi maupun dunia industri.
          </li>
          <li>
            Menyelenggarakan pengelolaan pendidikan yang profesional dan akuntabel.
          </li>
        </ol>
        <h2>
          Tujuan Universitas Dinamika Bangsa
        </h2>
        <p>
          Tujuan Universitas Dinamika Bangsa adalah :
        <ol>
          <li>
            Menghasilkan sumber daya manusia yang mempunyai kecerdasan intelektual, emosional dan spiritual.
          </li>
          <li>
            Mendukung peran serta sivitas akademika dalam pembangunan dan pengabdian yang bermutu kepada masyarakat baik lokal, regional maupun nasional.
          </li>
          <li>
            Kerjasama dengan lembaga pendidikan tinggi maupun dunia industri untuk memperluas pengembangan ilmu pengetahuan teknologi maupun terapannya.
          </li>
          <li>
            Mewujudkan tata kelola universitas yang baik
            </p>
          </li>
        </ol>
      </blockquote>

    </div>
  </div>

<?php }
