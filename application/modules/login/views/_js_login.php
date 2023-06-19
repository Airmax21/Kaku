<script type="text/javascript">
    var login_form;
    $(document).ready(function() {
        var login_form = $("#login_form").submit(function(e) {
            e.preventDefault(); // Mencegah pengiriman formulir dengan metode konvensional

            // Mengambil nilai-nilai input dari formuli

            $.ajax({
                type: 'post',
                url: '<?= site_url() ?>/login/pegawai/auth',
                data: $(this).serialize(),
                success: function(data) {
                    console.log(data)
                    window.location.replace("<?= site_url() ?>/dashboard/pegawai");
                },
                error: function(request, status, error) {
                    $('#error').html(request.responseText);
                }
            });
        });
    })
</script>