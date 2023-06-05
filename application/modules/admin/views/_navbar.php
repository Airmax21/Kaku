<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= site_url('admin/dashboard') ?>" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= site_url('admin/dashboard/order') ?>" class="nav-link">Order</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= site_url('admin/dashboard/pelanggan') ?>" class="nav-link">Pelanggan</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= site_url('admin/dashboard/jenis_menu') ?>" class="nav-link">Jenis Menu</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= site_url('admin/dashboard/menu') ?>" class="nav-link">Menu</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= site_url('admin/dashboard/meja') ?>" class="nav-link">Meja</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= site_url('admin/dashboard/pegawai') ?>" class="nav-link">Pegawai</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= site_url('admin/dashboard/role') ?>" class="nav-link">Role</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" href="logout" role="button">
          Logout
        </a>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="<?php echo base_url() ?>assets/img/icon/icon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Kaku</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= site_url('admin/dashboard') ?>" class="nav-link">
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('admin/order') ?>" class="nav-link">
              <p>
                Order
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('admin/pelanggan') ?>" class="nav-link">
              <p>
                Pelanggan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('admin/jenis_menu') ?>" class="nav-link">
              <p>
                Jenis Menu
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('admin/menu') ?>" class="nav-link">
              <p>
                Menu
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('admin/meja') ?>" class="nav-link">
              <p>
                Meja
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('admin/pegawai') ?>" class="nav-link">
              <p>
                Pegawai
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('admin/role') ?>" class="nav-link">
              <p>
                Role
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>