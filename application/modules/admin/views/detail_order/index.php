<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1></h1>
        </div>
        <div class="col-sm-6">

        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Detail Order ID <?= $order_id ?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                Tambah Pesanan
              </button>
              <!-- Modal -->
              <?php $this->load->view('tambah', $menu) ?>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID Detail Order</th>
                    <th>Nama Menu</th>
                    <th>No Meja</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $jumlah = 0;
                  foreach ($detail_order as $o) : ?>
                    <tr>
                      <td><?= $o['detail_order_id'] ?></td>
                      <td><?= $o['menu_nm'] ?></td>
                      <td><?= $o['meja_id'] ?></td>
                      <td><?= $o['jumlah'] ?></td>
                      <td><?= 'Rp. ' . number_format($o['jumlah'] * $o['harga'], 0, ",", ".") ?></td>
                      <td><?= $o['tgl_pesan'] ?></td>
                      <td>
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalUpdate<?= $o['detail_order_id'] ?>">
                          Update
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete<?= $o['detail_order_id'] ?>">
                          Delete
                        </button>
                      </td>
                      <?php $this->load->view('update', $o) ?>
                      <?php $this->load->view('delete', $o) ?>
                    </tr>
                  <?php
                    $jumlah += $o['jumlah'] * $o['harga'];
                  endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="6">Total Harga</th>
                    <th><?= 'Rp. ' . number_format($order['grand_total'], 0, ",", ".") ?></th>
                  </tr>
                  <tr>
                    <th>ID Detail Order</th>
                    <th>Nama Menu</th>
                    <th>No Meja</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Aksi</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
</body>

</html>