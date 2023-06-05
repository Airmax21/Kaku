<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Selamat Datang, <?= $this->cookie['fullname'] ?></h1>
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
                <div class="col-md-4 col-sm-6 col-12">
                    <a href=<?php echo base_url('admin/order'); ?>>
                        <div class="info-box bg-info">

                            <span class="info-box-icon"><i class="fas fa-coffee mx-0"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Order</span>
                                <span class="info-box-number"><?php echo $count_order ?></span>
                                <span class="progress-description">
                                    Order Belum Bayar &emsp; <?php echo $order_belum ?>
                                </span>
                                <span class="progress-description">
                                    Order di Proses &emsp; <?php echo $order_proses ?>
                                </span>
                                <span class="progress-description">
                                    Order Sudah Selesai &emsp; <?php echo $order_selesai ?>
                                </span>
                            </div>

                            <!-- /.info-box-content -->
                        </div>
                    </a>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <a href=<?php echo base_url('admin/pelanggan'); ?>>
                        <div class="info-box bg-success">

                            <span class="info-box-icon"><i class="fas fa-users mx-0"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Pelanggan</span>
                                <span class="info-box-number"><?php echo $jumlahjenis['jumlah'][0]->jumlah ?></span>
                                <span class="progress-description">
                                    Pelanggan Belum Aktivasi &emsp; <?php echo $jumlahuser['belum_aktif'][0]->jumlah ?>
                                </span>
                                <span class="progress-description">
                                    Pelanggan Sudah Aktivasi &emsp; <?php echo $jumlahuser['belum_aktif'][0]->jumlah ?>
                                </span>
                                <span class="progress-description">
                                    <br>
                                </span>
                            </div>

                            <!-- /.info-box-content -->
                        </div>
                    </a>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <a href=<?php echo base_url('admin/pegawai'); ?>>
                        <div class="info-box bg-danger">
                            <span class="info-box-icon"><i class="fas fa-address-card mx-0"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Pegawai</span>
                                <span class="info-box-number"><?php echo $jumlahobat['jumlah'][0]->jumlah ?></span>
                                <span class="progress-description">
                                    Pegawai Belum Aktivasi &emsp; <?php echo $jumlahobat['yang_expired'][0]->jumlah ?>
                                </span>
                                <span class="progress-description">
                                    Pegawai Sudah Aktivasi &emsp; <?php echo $jumlahobat['belum_expired'][0]->jumlah ?>
                                </span>
                                <span class="progress-description">
                                    <br>
                                </span>
                            </div>

                            <!-- /.info-box-content -->
                        </div>
                    </a>
                    <!-- /.info-box -->
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Table Order</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href=<?php echo site_url('admin/dashboard/order_cetakpdf'); ?>>
                                <button type="button" class="btn btn-primary">
                                    Export PDF
                                </button>
                            </a>
                            <a href=<?php echo site_url('admin/dashboard/order_cetakxls'); ?>>
                                <button type="button" class="btn btn-primary">
                                    Export XLS
                                </button>
                            </a>
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

</body>

</html>