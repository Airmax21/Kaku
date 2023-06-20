<div class="modal fade" id="modalDelete<?= $jenis_id ?>" tabindex="-1" role="dialog" aria-labelledby="modalUpdateTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUpdateTitle">Update Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action=<?php echo site_url('admin/menu/delete') ?> method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ID Jenis Menu</label>
                        <input type="text" name="jenis_id" readonly class="form-control" value="<?= $jenis_id ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama jenis menu</label>
                        <input type="text" name="jenis_nm" readonly class="form-control" placeholder="Masukkan Nama jenis menu" value="<?= $jenis_nm ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Gambar</label>
                        <input type="file" name="gambar" readonly class="form-control" placeholder="Masukkan Gambar jenis menu">
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