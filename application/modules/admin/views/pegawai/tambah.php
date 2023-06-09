<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalUpdateTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUpdateTitle">Tambah Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action=<?php echo site_url('admin/pegawai/tambah') ?> method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan Username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="pass" placeholder="Masukkan Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Fullname</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan fullname">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukkan Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">No Telepon</label>
                        <input type="text" class="form-control" name="no_telp" placeholder="Masukkan No Telepon">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Role</label>
                        <select name="role_id" class="form-control">
                            <?php foreach($role as $r): ?>
                                <option value="<?= $r['role_id'] ?>"><?= $r['role_nm'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Jabatan</label>
                        <input type="text" class="form-control" name="jabatan" placeholder="Masukkan Jabatan">
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