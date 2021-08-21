<?php
if ($this->session->userdata('level') == '1') { ?>

  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('assets/dist/img/') . $user['image'] ?> " class=" img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $user['nama']; ?></p>
          <div style="font-size: 14px; color: rgba(255, 255, 255, 0.9);"><?= $user['level'] == 1 ? "Admin" : "Siswa" ?></div>
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>

      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
          <a href="<?= base_url() ?>dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li <?= $this->uri->segment(1) == 'anggota' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
          <a href="<?= base_url() ?>anggota">
            <i class="fa fa-users"></i> <span>Data User</span>
          </a>
        </li>

        <li class="treeview <?= $this->uri->segment(1) == 'pengarang' || $this->uri->segment(1) == 'penerbit' || $this->uri->segment(1) == 'noinduk' || $this->uri->segment(1) == 'klasifikasi' || $this->uri->segment(1) == 'buku' || $this->uri->segment(1) == '' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-desktop"></i>
            <span>Master Buku</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'pengarang' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>><a href="<?= base_url() ?>pengarang"><i class="fa fa-circle-o"></i> Pengarang</a></li>
            <li <?= $this->uri->segment(1) == 'penerbit' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>><a href="<?= base_url() ?>penerbit"><i class="fa fa-circle-o"></i> Penerbit</a></li>
            <li <?= $this->uri->segment(1) == 'noinduk' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>><a href="<?= base_url() ?>noinduk"><i class="fa fa-circle-o"></i> Nomor Induk</a></li>
            <li <?= $this->uri->segment(1) == 'klasifikasi' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>><a href="<?= base_url() ?>klasifikasi"><i class="fa fa-circle-o"></i> Klasifikasi</a></li>
            <li <?= $this->uri->segment(1) == 'buku' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>><a href="<?= base_url() ?>buku"><i class="fa fa-circle-o"></i> Buku</a></li>
          </ul>
        </li>

        <li class="treeview <?= $this->uri->segment(1) == 'peminjaman' || $this->uri->segment(1) == 'pengembalian' || $this->uri->segment(1) == '' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-area-chart"></i>
            <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'peminjaman' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>><a href="<?= base_url() ?>peminjaman"><i class="fa fa-circle-o"></i> Peminjaman</a></li>
            <li <?= $this->uri->segment(1) == 'pengembalian' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>><a href="<?= base_url() ?>pengembalian"><i class="fa fa-circle-o"></i> Pengembalian</a></li>
          </ul>
        </li>

        <li class="treeview <?= $this->uri->segment(1) == 'laporan' || $this->uri->segment(1) == '' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-file-text"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(2) == 'peminjaman' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>><a href="<?= base_url() ?>laporan/peminjaman"><i class="fa fa-circle-o"></i> Laporan Peminjaman</a></li>
            <li <?= $this->uri->segment(2) == 'pengembalian' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>><a href="<?= base_url() ?>laporan/pengembalian"><i class="fa fa-circle-o"></i> Laporan Pengembalian</a></li>
            <li <?= $this->uri->segment(2) == 'dataanggota' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>><a href="<?= base_url() ?>laporan/dataanggota"><i class="fa fa-circle-o"></i> Laporan Data Anggota</a></li>
            <li <?= $this->uri->segment(2) == 'databuku' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>><a href="<?= base_url() ?>laporan/databuku"><i class="fa fa-circle-o"></i> Laporan Data Buku</a></li>
          </ul>
        </li>

        <hr>
        <li class="header">USER NAVIGATION</li>
        <li <?= $this->uri->segment(1) == 'profile' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
          <a href="<?= base_url() ?>profile">
            <i class="fa fa-user"></i> <span>Profil Saya</span>
          </a>
        </li>
        <li <?= $this->uri->segment(1) == 'upassword' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
          <a href="<?= base_url() ?>upassword">
            <i class="fa fa-key"></i> <span>Ganti Password</span>
          </a>
        </li>
        <li><a href="<?= base_url() ?>login/logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

<?php } else if ($this->session->userdata('level') == '2') { ?>

  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('assets/dist/img/') . $user['image'] ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $user['nama']; ?></p>
          <div style="font-size: 14px; color: rgba(255, 255, 255, 0.9);"><?= $user['level'] == 1 ? "Admin" : "Siswa" ?></div>
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
          <a href="<?= base_url() ?>dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li <?= $this->uri->segment(1) == 'buku' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
          <a href="<?= base_url() ?>buku">
            <i class="fa fa-book"></i> <span>Daftar Buku</span>
          </a>
        </li>
        <li class="treeview <?= $this->uri->segment(1) == 'peminjaman' || $this->uri->segment(1) == 'pengembalian' || $this->uri->segment(1) == '' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-history"></i>
            <span style="white-space: normal;">Riwayat</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'peminjaman' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>><a style="white-space: normal;" href="<?= base_url() ?>peminjaman"><i class="fa fa-circle-o"></i> Peminjaman</a></li>
            <li <?= $this->uri->segment(1) == 'pengembalian' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>><a style="white-space: normal;" href="<?= base_url() ?>pengembalian"><i class="fa fa-circle-o"></i> Pengembalian</a></li>
          </ul>
        </li>

        <hr>
        <li class="header">USER NAVIGATION</li>
        <li <?= $this->uri->segment(1) == 'profile' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
          <a href="<?= base_url() ?>profile">
            <i class="fa fa-user"></i> <span>Profil Saya</span>
          </a>
        </li>
        <li <?= $this->uri->segment(1) == 'upassword' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
          <a href="<?= base_url() ?>upassword">
            <i class="fa fa-key"></i> <span>Ganti Password</span>
          </a>
        </li>
        <li><a href="<?= base_url() ?>login/logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

<?php }
