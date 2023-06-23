<div class="head-title">
  <div class="left">
    <h1>Halaman Dapur</h1>
    <ul class="breadcrumb">
      <li>
        <a href="#">Dashboard</a>
      </li>
      <li><i class="bx bx-chevron-right"></i></li>
      <li>
        <a class="active">Dapur</a>
      </li>
    </ul>
  </div>
</div>
<div class="table-data">
  <div class="order">
    <div class="head">
      <h3>Antrian Dapur</h3>
      <i class="bx bx-search"></i>
      <i class="bx bx-filter"></i>
    </div>
    <table>
      <thead>
        <tr>
          <th>User</th>
          <th>Date Order</th>
          <th>No. Meja</th>
          <th>Item</th>
          <th>Aksi</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($main as $p) : ?>
          <tr>
            <td>
              <?= $p['nama'] != null ? $p['nama'] : $p['pelanggan_nm'] ?>
            </td>
            <td><?= date('d-m-Y', strtotime($p['tgl_pesan'])) ?></td>
            <td><?= $p['meja_id'] ?></td>
            <td>
              <ul>
              <?php
              $item = $this->m_detail_order->detail_order_data($p['order_id']); 
              foreach ($item as $o) : ?>
                <li ><?= $o['menu_nm'] ?> &nbsp;&nbsp;<?= $o['jumlah'] ?></li>
              <?php endforeach; ?>
              </ul>
            </td>
            <td>
            <a href=""><button type="button" class="btn btn-success btn-lg rounded-pill" style="font-size: x-small;"><b>Selesai</b></button></a>
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