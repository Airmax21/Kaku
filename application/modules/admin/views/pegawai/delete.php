<div class="modal fade" id="modalDelete<?= $pegawai['pegawai_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalUpdateTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUpdateTitle">Delete Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action=<?php echo site_url('admin/pegawai/delete') ?> method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ID Pegawai</label>
                        <input type="text" name="pegawai_id" readonly class="form-control" placeholder="Masukkan Username" value=<?= $pegawai['pegawai_id'] ?>>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" name="username" readonly class="form-control" placeholder="Masukkan Username" value=<?= $pegawai['username'] ?>>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Fullname</label>
                        <input type="text" name="nama" readonly class="form-control" placeholder="Masukkan fullname" value=<?= $pegawai['nama'] ?>>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" readonly name="email" placeholder="Masukkan Email" value=<?= $pegawai['email'] ?>>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <input type="text" name="alamat" readonly class="form-control" placeholder="Masukkan Alamat" value="<?= $pegawai['alamat'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">No Telepon</label>
                        <input type="text" class="form-control" readonly name="no_telp" placeholder="Masukkan No Telepon" value=<?= $pegawai['no_telp'] ?>>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Role</label>
                        <select name="role_id" readonly class="form-control">
                            <?php foreach ($role['role'] as $r) : ?>
                                <option value="<?= $r['role_id'] ?>" <?php $r['role_id'] == $pegawai['role_id'] ? 'selected' : '' ?>><?= $r['role_nm'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Jabatan</label>
                        <input type="text" readonly class="form-control" name="jabatan" placeholder="Masukkan Jabatan" value=<?= $pegawai['jabatan'] ?>>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>