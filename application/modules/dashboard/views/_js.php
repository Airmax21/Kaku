<script>
    $(document).ready(function() {
        $.post('<?= site_url('dashboard/pegawai/ajax') ?>', {
            view_name: 'dashboard'
        }, function(data) {
            $('.btn-side').removeClass('active');
            $('#btn_dashboard').addClass('active');
            $('#main').html(data.html);
        }, 'json');


        $('#btn_dashboard').click(function(e) {
            e.preventDefault();
            $.post('<?= site_url('dashboard/pegawai/ajax') ?>', {
                view_name: 'dashboard'
            }, function(data) {
                $('.btn-side').removeClass('active');
                $('#btn_dashboard').addClass('active');
                $('#main').html(data.html);
            }, 'json');
        })
        $('#btn_kasir').click(function(e) {
            e.preventDefault();
            $.post('<?= site_url('dashboard/pegawai/ajax') ?>', {
                view_name: 'kasir'
            }, function(data) {
                $('.btn-side').removeClass('active');
                $('#btn_kasir').addClass('active');
                $('#main').html(data.html);
            }, 'json');
        })
        $('#btn_dapur').click(function(e) {
            e.preventDefault();
            $.post('<?= site_url('dashboard/pegawai/ajax') ?>', {
                view_name: 'dapur'
            }, function(data) {
                $('.btn-side').removeClass('active');
                $('#btn_dapur').addClass('active');
                $('#main').html(data.html);
            }, 'json');
        })

        $('.bx-menu').click(function(e) {
            e.preventDefault();
            $('#sidebar').toggleClass('hide');
        })

        $('#switch-mode').change(function(e) {
            e.preventDefault();
            if ($(this).is(':checked')) {
                $('body').addClass('dark')
            } else {
                $('body').removeClass('dark')
            }
        })

        $(window).on('resize', function(e) {
            e.preventDefault();
            if ($(window).width() < 768) {
                $('#sidebar').addClass('hide');
            } else {
                $('#sidebar').removeClass('hide');
            }
        })


    });
</script>