<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalUpdateTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUpdateTitle">Update Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action=<?php echo site_url('admin/order/update') ?> method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ID Order</label>
                        <input type="text" name="order_id" readonly class="form-control" value="<?= $order_id ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Pelanggan</label>
                        <input type="text" name="pelanggan_nm" class="form-control" placeholder="Masukkan Nama" value="<?= $nama != null ? $nama : $pelanggan_nm ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">No Meja</label>
                        <input type="text" class="form-control" name="meja_id" placeholder="Masukkan No Meja" value="<?= $meja_id ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Total Harga</label>
                        <input type="text" class="form-control" name="grand_total" placeholder="Masukkan Total Harga" value="<?= $grand_total ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Status</label>
                        <select name="status" class="form-control">
                            <option value="1" <?php if ($status == 1) echo 'selected' ?>>Belum Bayar</option>
                            <option value="2" <?php if ($status == 2) echo 'selected' ?>>Proses</option>
                            <option value="0" <?php if ($status == 0) echo 'selected' ?>>Selesai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pemesanan</label>
                        <input type="datetime-local" name="tgl_pesan" id="tgl_pesan" class="form-control" value="<?= $tgl_pesan ?>">
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