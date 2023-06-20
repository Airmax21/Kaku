    <!-- SIDEBAR -->
    <section id="sidebar">
      <a href="#" class="brand">
        <i class="bx bxs-dashboard"></i>

        <span class="text">Kaku</span>
      </a>
      <ul class="side-menu top">
        <li id="btn_dashboard" class="active btn-side">
          <a href="#">
            <i class="bx bxs-dashboard"></i>
            <span class="text">Dashboard</span>
          </a>
        </li>

        <li id="btn_kasir" class="btn-side">
          <a href="#">
            <i class="bx bxs-doughnut-chart"></i>
            <span class="text">Kasir</span>
          </a>
        </li>
        <li id="btn_dapur" class="btn-side">
          <a href="#">
            <i class="bx bxs-message-dots"></i>
            <span class="text">Dapur</span>
          </a>
        </li>
      </ul>
      <ul class="side-menu">
        <li>
          <a>
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
        </a>
      </nav>
      <!-- NAVBAR -->

      <!-- MAIN -->
      <main id="main"></main>
    </section>
    <?php $this->load->view('_js') ?>