<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalUpdateTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUpdateTitle">Tambah Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action=<?php echo site_url('admin/order/tambah') ?> method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ID Order</label>
                        <input type="text" name="username" readonly class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Pelanggan</label>
                        <input type="text" name="pelanggan_nm" class="form-control" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">No Meja</label>
                        <input type="text" class="form-control" name="meja_id" placeholder="Masukkan No Meja">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Total Harga</label>
                        <input type="text" class="form-control" name="fullname" placeholder="Masukkan Total Harga">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Status</label>
                        <select name="status" class="form-control">
                            <option value="1">Belum Bayar</option>
                            <option value="2">Proses</option>
                            <option value="0">Selesai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pemesanan</label>
                        <input type="datetime-local" name="tgl_pesan" id="tgl_pesan" class="form-control">
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