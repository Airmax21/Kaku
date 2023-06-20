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
              <a href=""><button type="button" class="btn btn-primary btn-lg rounded-pill" style="font-size: x-small;"><b>Detail</b></button></a>
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