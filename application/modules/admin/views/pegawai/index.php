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
              <h3 class="card-title">Table Pegawai</h3>
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
                    <th>ID Pegawai</th>
                    <th>Username</th>
                    <th>Nama Pegawai</th>
                    <th>Email</th>
                    <th>Alamat Rumah</th>
                    <th>No Telepon</th>
                    <th>Role</th>
                    <th>Jabatan</th>
                    <th>Aktif</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($order as $o) : ?>
                    <tr>
                      <td><?= $o['pegawai_id'] ?></td>
                      <td><?= $o['username'] ?></td>
                      <td><?= $o['nama'] ?></td>
                      <td><?= $o['email'] ?></td>
                      <td><?= $o['alamat'] ?></td>
                      <td><?= $o['no_telp'] ?></td>
                      <td><?= $o['role_nm'] ?></td>
                      <td><?= $o['jabatan'] ?></td>
                      <td>
                        <?php if ($o['is_active'] == 0) : ?>
                          <span class="badge badge-danger">Belum Aktif</span>
                        <?php elseif ($o['is_active'] == 1) : ?>
                          <span class="badge badge-success">Sudah Aktif</span>
                        <?php endif; ?>
                      </td>
                      <td>
                        <button type="button" class="btn btn-primary">
                          Aktivasi
                        </button>
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalUpdate<?php echo $jenisobat->id_jenis_obat ?>">
                          Update
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete<?php echo $jenisobat->id_jenis_obat ?>">
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
                    <th>ID Pegawai</th>
                    <th>Username</th>
                    <th>Nama Pegawai</th>
                    <th>Email</th>
                    <th>Alamat Rumah</th>
                    <th>No Telepon</th>
                    <th>Role</th>
                    <th>Jabatan</th>
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