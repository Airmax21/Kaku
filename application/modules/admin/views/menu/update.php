<div class="modal fade" id="modalUpdate<?= $menu_id ?>" tabindex="-1" role="dialog" aria-labelledby="modalUpdateTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUpdateTitle">Update Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action=<?php echo site_url('admin/menu/update') ?> method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ID Menu</label>
                        <input type="text" name="menu_id" readonly class="form-control" value="<?= $menu_id ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Menu</label>
                        <input type="text" name="menu_nm" class="form-control" placeholder="Masukkan Nama Menu" value="<?= $menu_nm ?>">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Menu</label>
                        <select name="jenis_id" class="form-control">
                            <?php foreach($jenis as $r): ?>
                                <option value="<?= $r['jenis_id'] ?>" <?php $r['jenis_id'] == $jenis_id ? 'selected' : '' ?>><?= $r['jenis_nm'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga</label>
                        <input type="text" class="form-control" name="harga" placeholder="Masukkan Harga" value="<?= $harga ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Gambar</label>
                        <input type="file" name="gambar" class="form-control" placeholder="Masukkan Gambar Menu">
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