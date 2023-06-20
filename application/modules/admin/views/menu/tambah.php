<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalUpdateTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUpdateTitle">Tambah Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action=<?php echo site_url('admin/menu/tambah') ?> method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Menu</label>
                        <input type="text" name="menu_nm" class="form-control" placeholder="Masukkan Nama Menu">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Menu</label>
                        <select name="jenis_id" class="form-control">
                            <?php foreach($jenis as $r): ?>
                                <option value="<?= $r['jenis_id'] ?>"><?= $r['jenis_nm'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga</label>
                        <input type="text" class="form-control" name="harga" placeholder="Masukkan Harga">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Gambar</label>
                        <input type="file" name="gambar" class="form-control" placeholder="Masukkan Gambar Menu">
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