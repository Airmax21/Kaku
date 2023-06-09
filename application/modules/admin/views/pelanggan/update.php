<div class="modal fade" id="modalUpdate<?= $pelanggan['pelanggan_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalUpdateTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUpdateTitle">Update Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action=<?php echo site_url('admin/pelanggan/update') ?> method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ID pelanggan</label>
                        <input type="text" name="pelanggan_id" readonly class="form-control" placeholder="Masukkan Username" value=<?= $pelanggan['pelanggan_id'] ?>>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan Username" value=<?= $pelanggan['username'] ?>>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="pass" placeholder="Masukkan Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Fullname</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan fullname" value=<?= $pelanggan['nama'] ?>>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukkan Email" value=<?= $pelanggan['email'] ?>>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">No Telepon</label>
                        <input type="text" class="form-control" name="no_telp" placeholder="Masukkan No Telepon" value=<?= $pelanggan['no_telp'] ?>>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat Rumah</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat Rumah" value=<?= $pelanggan['alamat'] ?>>
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