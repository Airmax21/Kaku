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
              <h3 class="card-title">Table Pelanggan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                Tambah Pelanggan
              </button>
              <!-- Modal -->
              <?php $this->load->view('tambah') ?>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID Pelanggan</th>
                    <th>Username</th>
                    <th>Nama Pelanggan</th>
                    <th>Email</th>
                    <th>Alamat Rumah</th>
                    <th>No Telepon</th>
                    <th>Aktif</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($pelanggan as $p) : ?>
                    <tr>
                      <td><?= $p['pelanggan_id'] ?></td>
                      <td><?= $p['username'] ?></td>
                      <td><?= $p['nama'] ?></td>
                      <td><?= $p['email'] ?></td>
                      <td><?= $p['alamat'] ?></td>
                      <td><?= $p['no_telp'] ?></td>
                      <td>
                        <?php if ($p['is_active'] == 0) : ?>
                          <span class="badge badge-danger">Belum Aktif</span>
                        <?php elseif ($p['is_active'] == 1) : ?>
                          <span class="badge badge-success">Sudah Aktif</span>
                        <?php endif; ?>
                      </td>
                      <td>
                        <a href="<?= site_url('admin/pelanggan/aktivasi/') . $p['pelanggan_id'] ?>">
                          <button type="button" class="btn btn-primary">
                            Aktivasi
                          </button>
                        </a>
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalUpdate<?= $p['pelanggan_id'] ?>">
                          Update
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete<?= $p['pelanggan_id'] ?>">
                          Delete
                        </button>
                      </td>
                      <?php 
                      $data['pelanggan'] = $p;
                      $this->load->view('update', $data);
                      ?>
                      <?php $this->load->view('delete', $data); 
                      ?>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>ID pelanggan</th>
                    <th>Username</th>
                    <th>Nama pelanggan</th>
                    <th>Email</th>
                    <th>Alamat Rumah</th>
                    <th>No Telepon</th>
                    <th>Aktif</th>
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