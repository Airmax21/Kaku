
   <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

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
                  <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalUpdateTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modalUpdateTitle">Tambah Jenis Obat</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action=<?php echo base_url('jenisobat/tambah') ?> method="post" enctype="multipart/form-data">
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Jenis Obat</label>
                              <input type="text" name="nama" class="form-control" placeholder="Masukkan Jenis Obat">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID Order</th>
                                        <th>Nama Pelanggan</th>
                                        <th>No Meja</th>
                                        <th>Total Harga</th>
                                        <th>Status</th>
                                        <th>Tanggal Pemesanan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($order as $o) : ?>
                                        <tr>
                                            <td><?= $o['order_id'] ?></td>
                                            <td><?= $o['nama'] ?></td>
                                            <td><?= $o['meja_id'] ?></td>
                                            <td><?= 'Rp. '.number_format($o['grand_total'], 0, ",", ".") ?></td>
                                            <td>
                                                <?php if ($o['status'] = 1) : ?>
                                                    <span class="badge badge-danger">Belum Bayar</span>
                                                <?php elseif ($o['status'] = 2) : ?>
                                                    <span class="badge badge-warning">Diproses</span>
                                                <?php elseif ($o['status'] = 0) : ?>
                                                    <span class="badge badge-success">Sudah Selesai</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $o['tgl_pesan'] ?></td>
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