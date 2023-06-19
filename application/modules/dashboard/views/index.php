    <!-- SIDEBAR -->
    <section id="sidebar">
      <a href="#" class="brand">
        <i class="bx bxs-dashboard"></i>

        <span class="text">Kaku</span>
      </a>
      <ul class="side-menu top">
        <li class="active">
          <a href="#">

            <i class="bx bxs-dashboard"></i>
            <span class="text">Dashboard</span>
          </a>
        </li>

        <li>
          <a href="#">
            <i class="bx bxs-doughnut-chart"></i>
            <span class="text">Kasir</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bxs-message-dots"></i>
            <span class="text">Dapur Makanan</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bxs-group"></i>
            <span class="text">Dapur Minuman</span>
          </a>
        </li>
      </ul>
      <ul class="side-menu">
        <li>
          <a href="#">
            <i class="bx bxs-cog"></i>
            <span class="text">Settings</span>
          </a>
        </li>
        <li>
          <a href="#" class="logout">
            <i class="bx bxs-log-out-circle"></i>
            <span class="text">Logout</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- SIDEBAR -->

    <!-- CONTENT -->
    <section id="content">
      <!-- NAVBAR -->
      <nav>
        <i class="bx bx-menu"></i>
        <a href="#" class="nav-link">Categories</a>
        <form action="#">
          <div class="form-input">
            <input type="search" placeholder="Search..." />
            <button type="submit" class="search-btn">
              <i class="bx bx-search"></i>
            </button>
          </div>
        </form>
        <input type="checkbox" id="switch-mode" hidden />
        <label for="switch-mode" class="switch-mode"></label>
        <a href="#" class="notification">
          <i class="bx bxs-bell"></i>
          <span class="num">8</span>
        </a>
      </nav>
      <!-- NAVBAR -->

      <!-- MAIN -->
      <main id="main">
        <div class="head-title">
          <div class="left">
            <h1>Selamat Datang, <?= $this->cookie['fullname'] ?></h1>
            <ul class="breadcrumb">
              <li>
                <a href="#">Dashboard</a>
              </li>
              <li><i class="bx bx-chevron-right"></i></li>
              <li>
                <a class="active" href="#">Home</a>
              </li>
            </ul>
          </div>
        </div>

        <ul class="box-info">
          <li>
            <i class="bx bxs-fa-regular fa-cash-register"></i>
            <span class="text">
              <h3><?= $count['pesanan'] ?></h3>
              <p>Pesanan</p>
            </span>
          </li>
          <li>
            <i class="bx bxs"></i>
            <span class="text">
              <h3><?= $count['antrian'] ?></h3>
              <p>Antrian</p>
            </span>
          </li>
          <li>
            <i class="bx bxs "></i>
            <span class="text">
              <h3><?= $count['selesai'] ?></h3>
              <p>Pesanan Selesai</p>
            </span>
          </li>
        </ul>

        <div class="table-data">
          <div class="order">
            <div class="head">
              <h3>Antrian Pelanggan</h3>
              <i class="bx bx-search"></i>
              <i class="bx bx-filter"></i>
            </div>
            <table>
              <thead>
                <tr>
                  <th>User</th>
                  <th>Date Order</th>
                  <th>No. Meja</th>
                  <th>Total Harga</th>
                  <th>Aksi</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($main as $p) : ?>
                  <tr>
                    <td>
                      <p><?= $p['nama'] != null ? $p['nama'] : $p['pelanggan_nm'] ?></p>
                    </td>
                    <td><?= date('d-m-Y', strtotime($p['tgl_pesan'])) ?></td>
                    <td><?= $p['meja_id'] ?></td>
                    <td><?= 'Rp. ' . number_format($p['grand_total'], 0, ",", ".") ?></td>
                    <td>
                      <a href=""><button type="button" class="btn btn-primary btn-sm rounded-pill">Detail</button></a>
                    </td>
                    <td>
                      <?php if ($p['status'] == 1) : ?>
                        <span class="status pending">Belum Bayar</span>
                      <?php elseif ($p['status'] == 2) : ?>
                        <span class="status process">Diproses</span>
                      <?php elseif ($p['status'] == 0) : ?>
                        <span class="status completed">Sudah Selesai</span>
                      <?php endif; ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- MAIN -->
      </main>
    </section>
    <?php $this->load->view('_js'); ?>