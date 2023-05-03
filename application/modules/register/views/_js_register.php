<script>
    $(() => {
        $("#submitbutt").click(function(ev) {
            $.ajax({
                type: "POST",
                url: <?= site_url() . "/register/pegawai/register" ?>,
                data: $("#formId").serialize(),
                success: function(data) {
                    alert("Form Submited Successfully");
                },
                error: function(data) {
                    alert("some Error");
                }
            });
        });
    });
</script>