<div class="modal fade" id="modalDelete<?= $detail_order_id ?>" tabindex="-1" role="dialog" aria-labelledby="modaldeleteTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeleteTitle">Delete Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form<?= $detail_order_id ?>" action="javascript:void(0)" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" id="detail_order_id<?= $detail_order_id ?>" name="detail_order_id" value="<?= $detail_order_id ?>">
                    <input type="hidden" readonly id="order_id<?= $detail_order_id ?>" name="order_id" value="<?= $order_id ?>" >
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Menu</label>
                        <select readonly id="menu_id<?= $detail_order_id ?>" name="menu_id" class="form-control" >
                            <?php foreach ($menu as $r) : ?>
                                <option value="<?= $r['menu_id'] ?>" <?php $r['menu_id'] == $menu_id ? 'selected' : '' ?>><?= $r['menu_nm'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jumlah</label>
                        <input readonly type="text" class="form-control" id="jumlah<?= $detail_order_id ?>" name="jumlah" placeholder="Masukkan Jumlah" value="<?= $jumlah ?>">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pemesanan</label>
                        <input readonly type="datetime-local" id="tgl_pesan<?= $detail_order_id ?>" name="tgl_pesan" id="tgl_pesan" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="Delete<?= $detail_order_id ?>" class="btn btn-primary">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#Delete<?= $detail_order_id ?>').on('click', function(e) {
            e.preventDefault();
            console.log(<?= $detail_order_id ?>);
            $('#modalDelete<?= $detail_order_id ?>').modal('toggle');
            $.post('<?= site_url('dashboard/pegawai/delete_order') ?>', {
                    detail_order_id: $('#detail_order_id<?= $detail_order_id ?>').val(),
                    order_id: $('#order_id<?= $detail_order_id ?>').val(),
                },
                function(data) {
                    $('#main').html(data.html);
                }, 'json');
        });
    })
</script>