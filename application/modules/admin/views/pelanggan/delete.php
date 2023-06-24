<div class="modal fade" id="modalDelete<?= $pelanggan['pelanggan_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalUpdateTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUpdateTitle">Update Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action=<?php echo site_url('admin/pelanggan/delete') ?> method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ID pelanggan</label>
                        <input type="text" name="pelanggan_id" readonly class="form-control" placeholder="Masukkan Username" value=<?= $pelanggan['pelanggan_id'] ?>>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" name="username" readonly class="form-control" placeholder="Masukkan Username" value=<?= $pelanggan['username'] ?>>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Fullname</label>
                        <input type="text" name="nama" readonly class="form-control" placeholder="Masukkan fullname" value=<?= $pelanggan['nama'] ?>>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" readonly name="email" placeholder="Masukkan Email" value=<?= $pelanggan['email'] ?>>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">No Telepon</label>
                        <input type="text" class="form-control" readonly name="no_telp" placeholder="Masukkan No Telepon" value=<?= $pelanggan['no_telp'] ?>>
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