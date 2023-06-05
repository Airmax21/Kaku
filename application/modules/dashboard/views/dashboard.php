    <!-- SIDEBAR -->
    <section id="sidebar">
      <a href="#" class="brand">
        <i class="bx bxs-dashboard"></i>

        <span class="text">Softech Cash</span>
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
        <a href="#" class="profile">
          <img src="<?= base_url() ?>/assets/img/pegawai/people.png" />
        </a>
      </nav>
      <!-- NAVBAR -->

      <!-- MAIN -->
      <main>
        <div class="head-title">
          <div class="left">
            <h1>Selamat Datang</h1>
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
          <a href="#" class="btn-download">
            <i class="bx bxs-cloud-download"></i>
            <span class="text">Download</span>
          </a>
        </div>

        <ul class="box-info">
          <li>
            <i class="bx bxs-fa-regular fa-cash-register"></i>
            <span class="text">
              <h3>354</h3>
              <p>Pesanan</p>
            </span>
          </li>
          <li>
            <i class="bx bxs"></i>
            <span class="text">
              <h3>313</h3>
              <p>Antrian</p>
            </span>
          </li>
          <li>
            <i class="bx bxs "></i>
            <span class="text">
              <h3>456</h3>
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
                  <th>Total Harga</th>
                  <th>Aksi</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <img src="<?= base_url() ?>/assets/img/pegawai/people.png" />
                    <p>Ilham Akbar</p>
                  </td>
                  <td>01-10-2021</td>
                  <td><span class="status completed">Completed</span></td>
                </tr>
                <tr>
                  <td>
                    <img src="<?= base_url() ?>/assets/img/pegawai/people.png" />
                    <p>Ilham Akbar</p>
                  </td>
                  <td>01-10-2021</td>
                  <td><span class="status pending">Pending</span></td>
                </tr>
                <tr>
                  <td>
                    <img src="<?= base_url() ?>/assets/img/pegawai/people.png" />
                    <p>Ilham Akbar</p>
                  </td>
                  <td>01-10-2021</td>
                  <td><span class="status process">Process</span></td>
                </tr>
                <tr>
                  <td>
                    <img src="<?= base_url() ?>/assets/img/pegawai/people.png" />
                    <p>Ilham Akbar</p>
                  </td>
                  <td>01-10-2021</td>
                  <td><span class="status pending">Pending</span></td>
                </tr>
                <tr>
                  <td>
                    <img src="<?= base_url() ?>/assets/img/pegawai/people.png" />
                    <p>Ilham Akbar</p>
                  </td>
                  <td>01-10-2021</td>
                  <td><span class="status completed">Completed</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
          <!-- MAIN -->

    </section>
    <?php $this->load->view('_js_dashboard'); ?>