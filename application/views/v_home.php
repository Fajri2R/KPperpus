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
      <div class="small-box bg-blue">
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
      <div class="small-box bg-green">
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
          Visi SMA Pelita Raya Kota Jambi
        </h2>
        <p>
          “Menjadi lembaga unggulan dalam prestasi akademik dan non akademik, handal dalam kemampuan komunikasi dan IPTEK, santun dalam bersikap, berkepribadian dan keluhuran budi”
        </p>
        <h2>
          Misi SMA Pelita Raya Kota Jambi
        </h2>
        <p>
          Misi SMA Pelita Raya Kota Jambi adalah :
        </p>
        <ol>
          <li>
            Pembelajaran menggunakan Kurikulum yang sedang berjalan saat ini dengan motto <i>Learning by Doing</i>.
          </li>
          <li>
            Melengkapi sarana dan prasarana pembelajaran dengan baik.
          </li>
          <li>
            Mendidik warga sekolah agar memiliki akhlak mulia dan berbudi pekerti luhur.
          </li>
          <li>
            Menumbuhkan semangat untuk meningkatkan kompetensi akademik secara seimbang dan selaras antara ranah kognitif, afektif, dan psikomotor untuk berani bersaing di setiap event kompetensi secara jujur dan sportif.
          </li>
          <li>
            Menumbuh kembangkan penghayatan terhadap agama yang dianut, olahraga, kesehatan jasmani dan rohani, seni budaya, serta keterampilan sehingga menghasilkan kearifan dalam berpikir dan bertindak, sifat sportifitas jujur, berjiwa besar, dan memiliki rasa estetis yang harmonis di lingkungan keluarga, sekolah, masyarakat, dan negara.
          </li>
        </ol>
        <!-- <h2>
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
        </ol> -->
      </blockquote>

    </div>
  </div>

<?php }
