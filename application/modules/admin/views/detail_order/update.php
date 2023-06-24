<div class="modal fade" id="modalUpdate<?= $detail_order_id ?>" tabindex="-1" role="dialog" aria-labelledby="modalUpdateTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUpdateTitle">Update Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action=<?php echo site_url('admin/detail_order/update') ?> method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="order_id" value="<?= $order_id ?>">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Menu</label>
                        <select name="menu_id" class="form-control">
                            <?php foreach ($menu as $r) : ?>
                                <option value="<?= $r['menu_id'] ?>" <?php $r['menu_id'] == $menu_id ? 'selected' : '' ?>><?= $r['menu_nm'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jumlah</label>
                        <input type="text" class="form-control" name="jumlah" placeholder="Masukkan Jumlah" value="<?= $jumlah ?>">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pemesanan</label>
                        <input type="datetime-local" name="tgl_pesan" id="tgl_pesan" class="form-control">
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