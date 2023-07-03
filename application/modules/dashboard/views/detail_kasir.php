<div class="head-title">
  <div class="left">
    <h1>Halaman Order Detail ID <?= $order_id ?></h1>
    <h5>Meja <?= $main[0]['meja_id'] ?></h5>
    <ul class="breadcrumb">
      <li>
        <a href="#">Dashboard</a>
      </li>
      <li><i class="bx bx-chevron-right"></i></li>
      <li>
        <a class="active">Kasir</a>
      </li>
      <li><i class="bx bx-chevron-right"></i></li>
      <li>
        <a class="active">Order Detail</a>
      </li>
    </ul>
    <button type="button" class="btn btn-primary btn-md rounded-pill" data-toggle="modal" data-target="#modalTambah">
      Tambah Pesanan
    </button>
    <!-- Modal -->
    <?php $this->load->view('detail_order/tambah', $menu) ?>
  </div>
</div>
<div class="row">
  <div class="table-data col-sm-8">
    <div class="order">
      <div class="head">
        <h3>Order Detail</h3>
        <i class="bx bx-search"></i>
        <i class="bx bx-filter"></i>
      </div>
      <table>
        <thead>
          <tr>
            <th>Menu</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Waktu</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($main as $o) : ?>
            <tr>
              <td><?= $o['menu_nm'] ?></td>
              <td><?= $o['jumlah'] ?></td>
              <td><?= 'Rp. ' . number_format($o['jumlah'] * $o['harga'], 0, ",", ".") ?></td>
              <td><?= date('H:i:s', strtotime($o['tgl_pesan'])) ?></td>
              <td>
                <button type="button" class="btn btn-secondary btn-md rounded-pill" style="font-size: x-small;" data-toggle="modal" data-target="#modalUpdate<?= $o['detail_order_id'] ?>">
                  Update
                </button>
                <button type="button" class="btn btn-danger btn-md rounded-pill" style="font-size: x-small;" data-toggle="modal" data-target="#modalDelete<?= $o['detail_order_id'] ?>">
                  Delete
                </button>
              </td>
            </tr>
            <?php $this->load->view('detail_order/update',$o) ?>
            <?php $this->load->view('detail_order/delete',$o) ?>
          <?php
            $jumlah += $o['jumlah'] * $o['harga'];
          endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="table-data col-sm-4">
    <div class="order">
      <form action=<?php echo site_url('dashboard/order_bayar') ?> method="post" enctype="multipart/form-data">
        <table>
          <tbody>
            <tr>
              <td>Subtotal : </td>
              <td><?= 'Rp. ' . number_format($order['grand_total'] * 89 / 100, 0, ",", ".") ?></td>
            </tr>
            <tr>
              <td>Diskon : </td>
              <td>Rp. 0</td>
            </tr>
            <tr>
              <td>Pajak : </td>
              <td><?= 'Rp. ' . number_format($order['grand_total'] * 11 / 100, 0, ",", ".") ?></td>
            </tr>
            <tr>
              <td colspan="2">
              </td>
            </tr>
            <tr>
              <td>Total :</td>
              <td><?= 'Rp. ' . number_format($order['grand_total'], 0, ",", ".") ?></td>
            </tr>
            <tr>
              <td>Bayar : </td>
              <td>Rp. <input class="inptext" style="color: #343A40;" type="text" name="pembayaran" id="pembayaran" size="10"></td>
            </tr>
            <tr>
              <td>Kembalian :</td>
              <td id="kembalian"></td>
            </tr>
            <tr>
              <td colspan="2" id="keterangan">

              </td>
            </tr>
            <tr>
              <td></td>
              <td>
                <button type="button" id="btn_bayar" class="btn btn-primary">
                  Bayar
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    var kembalian = null;
    var pembayaran = null;
    $('#pembayaran').bind('keyup', function(e) {
      e.preventDefault();
      pembayaran = parseInt(($('#pembayaran').val() != '' ? $('#pembayaran').val() : '0'));
      kembalian = pembayaran - parseInt(<?= $order['grand_total'] ?>);
      console.log(kembalian);
      $('#kembalian').html('Rp. ' + kembalian.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
    })
    $('#btn_bayar').click((e) => {
      e.preventDefault();
      if (kembalian == null) {
        $('#keterangan').html('Belum memasukkan uang');
      } else if (kembalian < 0) {
        $('#keterangan').html('Pembayaran kurang dari harga');
      } else {
        $.post('<?= site_url('dashboard/pegawai/ajax_bayar') ?>', {
          order_id: <?= $order_id ?>,
          pembayaran: pembayaran,
          kembalian: kembalian,
          status: 2
        }, function(data) {
          $('#main').html(data.html);
        }, 'json')
      }
    });
  });
</script>