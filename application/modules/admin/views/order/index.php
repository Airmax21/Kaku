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
              <h3 class="card-title">Table Order</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                Tambah Order
              </button>
              <!-- Modal -->
              <?php $this->load->view('tambah') ?>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID Order</th>
                    <th>Nama Pelanggan</th>
                    <th>No Meja</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($order as $o) : ?>
                    <tr>
                      <td><?= $o['order_id'] ?></td>
                      <td><?= $o['nama'] != null ? $o['nama'] : $o['pelanggan_nm'] ?></td>
                      <td><?= $o['meja_id'] ?></td>
                      <td><?= 'Rp. ' . number_format($o['grand_total'], 0, ",", ".") ?></td>
                      <td>
                        <?php if ($o['status'] == 1) : ?>
                          <span class="badge badge-danger">Belum Bayar</span>
                        <?php elseif ($o['status'] == 2) : ?>
                          <span class="badge badge-warning">Diproses</span>
                        <?php elseif ($o['status'] == 0) : ?>
                          <span class="badge badge-success">Sudah Selesai</span>
                        <?php endif; ?>
                        <?php elseif ($o['status'] == 3) : ?>
                          <span class="badge badge-secondary">Belum Checkout</span>
                        <?php endif; ?>
                      </td>
                      <td><?= $o['tgl_pesan'] ?></td>
                      <td>
                        <a href="<?= site_url('admin/detailorder/order') . '/' . $o['order_id'] ?>">
                          <button type="button" class="btn btn-primary">
                            Detail
                          </button>
                        </a>
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalUpdate<?= $o['order_id'] ?>">
                          Update
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete<?= $o['order_id'] ?>">
                          Delete
                        </button>
                      </td>
                      <?php $this->load->view('update', $o) ?>
                      <?php $this->load->view('delete', $o) ?>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>ID Order</th>
                    <th>Nama Pelanggan</th>
                    <th>No Meja</th>
                    <th>Total Harga</th>
                    <th>Status</th>
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