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
              <h3 class="card-title">Table Jenis Menu</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                Tambah jenis menu
              </button>
              <!-- Modal -->
              <?php $this->load->view('tambah') ?>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID Jenis Menu</th>
                    <th>Nama Jenis Menu</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($jenis_menu as $o) : ?>
                    <tr>
                      <td><?= $o['jenis_id'] ?></td>
                      <td><?= $o['jenis_nm'] ?></td>
                      <td><img src="<?= base_url() . "assets/img/jenis_menu/" . $o['gambar'] ?>" alt="<?= $o['jenis_nm'] ?>"></td>
                      <td>
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalUpdate<?= $o['jenis_id'] ?>">
                          Update
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete<?= $o['jenis_id'] ?>">
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
                    <th>ID Jenis Menu</th>
                    <th>Nama Jenis Menu</th>
                    <th>Gambar</th>
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