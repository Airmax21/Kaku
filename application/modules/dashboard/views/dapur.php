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
            <td><?= $p['meja_id'] . $p['order_id'] ?></td>
            <td>
              <ul>
                <?php
                $item = $this->m_detail_order->detail_order_data($p['order_id']);
                foreach ($item as $o) : ?>
                  <li><?= $o['menu_nm'] ?> &nbsp;&nbsp;<?= $o['jumlah'] ?></li>
                <?php endforeach; ?>
              </ul>
            </td>
            <td>
              <button type="button" class="btn btn-success btn-lg rounded-pill btn-selesai" href="javascript:void(0)" data-order-id="<?= $p['order_id'] ?>" style="font-size: x-small;"><b>Selesai</b></button>

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
<script>
  $(document).ready(function() {
    $('.btn-selesai').click(function(e) {
      e.preventDefault();
      var order_id = $(this).attr('data-order-id');
      console.log(order_id);
      $.post('<?= site_url('dashboard/pegawai/ajax_dapur') ?>', {
        order_id: order_id,
        status: 0
      }, function(data) {
        $('#main').html(data.html);
      }, 'json')
    })
  })
</script>