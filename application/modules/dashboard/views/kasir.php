<div class="head-title">
  <div class="left">
    <h1>Halaman Kasir</h1>
    <ul class="breadcrumb">
      <li>
        <a href="#">Dashboard</a>
      </li>
      <li><i class="bx bx-chevron-right"></i></li>
      <li>
        <a class="active">Kasir</a>
      </li>
    </ul>
  </div>
</div>
<div class="table-data">
  <div class="order">
    <div class="head">
      <h3>Antrian Kasir</h3>
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
            <button type="button" class="btn btn-primary btn-lg rounded-pill btn-detail" data-order_id="<?= $p['order_id'] ?>" style="font-size: x-small;"><b>Detail</b></button>
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
  $(document).ready(function(){
    $('.btn-detail').click(function(e){
      e.preventDefault();
      var order_id = $(this).attr('data-order_id');
      $.post('<?= site_url('dashboard/pegawai/ajax_kasir') ?>',{
        order_id : order_id
      },function(data){
        $('#main').html(data.html);
      },'json')
    });
  });
</script>