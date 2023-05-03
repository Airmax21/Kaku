<div class="container-fluid">
    <div class="row">
        <div class="col-sm sec1">
            <div class="title">
                <p class="judul">Kaku</p>
                <br>
                <p class="sub">Halaman <?= $jenis ?></p>
            </div>
        </div>
        <div class="col-sm">
            <div class="title">
                <form action="<?= base_url() ?>login/pegawai/auth" method="post">
                    <p class="judul">Login</p>
                    <br><br>
                        <input class="inptext" type="text" name="username" id="username" placeholder="Username" size="30">
                        <input type="password" class="inptext" name="pass" id="pass" placeholder="Password" size="30">
                    <button type="submit" class="btn btn-success inpbutt">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>