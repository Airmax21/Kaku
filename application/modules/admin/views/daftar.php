
    <?php $this->load->view('layout/navbar'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>DataTables</h1>
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
                  <h3 class="card-title">Table Jenis Obat</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                    Tambah Jenis Obat
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
                        <th>Id Jenis Obat</th>
                        <th>Jenis Obat</th>
                        <th>Modif</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($jenisobats as $jenisobat) : ?>
                        <tr>
                          <td><?php echo $jenisobat->id_jenis_obat ?></td>
                          <td><?php echo $jenisobat->nama_jenis_obat ?></td>
                          <td>
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalUpdate<?php echo $jenisobat->id_jenis_obat ?>">
                              Update
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete<?php echo $jenisobat->id_jenis_obat ?>">
                              Delete
                            </button>
                          </td>
                          <div class="modal fade" id="modalUpdate<?php echo $jenisobat->id_jenis_obat ?>" tabindex="-1" role="dialog" aria-labelledby="modalUpdateTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="modalUpdateTitle">Update User</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form action=<?php echo base_url('jenisobat/update') . '/' . $jenisobat->id_jenis_obat; ?> method="post" enctype="multipart/form-data">
                                  <div class="modal-body">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">ID Jenis Obat</label>
                                      <input type="text" name="nama" class="form-control" value=<?php echo $jenisobat->id_jenis_obat ?> disabled>
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Jenis Obat</label>
                                      <input type="text" name="nama" class="form-control" value=<?php echo $jenisobat->nama_jenis_obat ?> placeholder="Masukkan Jenis Obat">
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <div class="modal fade" id="modalDelete<?php echo $jenisobat->id_jenis_obat ?>" tabindex="-1" role="dialog" aria-labelledby="modalUpdateTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="modalUpdateTitle">Delete Obat</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">ID Jenis Obat</label>
                                    <input type="text" name="nama" class="form-control" value=<?php echo $jenisobat->id_jenis_obat ?> disabled>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Jenis Obat</label>
                                    <input type="text" name="nama" class="form-control" disabled value=<?php echo $jenisobat->nama_jenis_obat ?>>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalKonfirmasiDelete<?php echo $jenisobat->id_jenis_obat ?>">
                                    Delete
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal fade" id="modalKonfirmasiDelete<?php echo $jenisobat->id_jenis_obat ?>" tabindex="-1" role="dialog" aria-labelledby="modalUpdateTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="modalUpdateTitle">Konfirmasi Delete Obat</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form action=<?php echo base_url('jenisobat/delete') . '/' . $jenisobat->id_jenis_obat; ?> method="post" enctype="multipart/form-data">
                                  <div class="modal-body">
                                    <p>Apakah anda yakin ingin menghapus jenis obat <?php echo $jenisobat->nama_jenis_obat ?>?</p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Id Jenis Obat</th>
                        <th>Jenis Obat</th>
                        <th>Modif</th>
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