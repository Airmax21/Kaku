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
                <form action="javascript:void(0)" method="post">
                    <p class="judul">Register</p>
                    <br><br>
                        <input class="inptext" type="text" name="username" id="username" placeholder="Username" size="30">
                        <input type="password" class="inptext" name="pass" id="pass" placeholder="Password" size="30">
                        <input class="inptext" type="text" name="nama" id="nama" placeholder="Full Name" size="30">
                        <input class="inptext" type="email" name="email" id="email" placeholder="Email" size="30">
                        <textarea class="inptext" name="alamat" id="alamat" cols="30" rows="2" placeholder="Alamat"></textarea>
                        <input class="inptext" type="tel" name="no_telp" id="no_telp" placeholder="Nomer Telepon" size="30">
                    <button type="submit" class="btn btn-success inpbutt" id="submitbutt">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>