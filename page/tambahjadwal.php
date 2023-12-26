<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Jadwal Guru</h1>
    </div>

    <div class="row">
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Tanggal / Jam
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <script type="text/javascript">
                                    window.onload = function() { jam(); }
                                   
                                    function jam() {
                                        var e = document.getElementById('jam'),
                                        d = new Date(), h, m, s;
                                        h = d.getHours();
                                        m = set(d.getMinutes());
                                        s = set(d.getSeconds());
                                        session = "AM";

                                        if(h == 0){
	                                    	h = 12;
	                                    }
	                                    if (h > 12) {
	                                    	h = h - 12 ;
	                                    	session = "PM";
	                                    }
                                    
                                        e.innerHTML = h +':'+ m +':'+ s + session;
                                    
                                        setTimeout('jam()', 1000);
                                    }
                                
                                    function set(e) {
                                        e = e < 10 ? '0'+ e : e;
                                        return e;
                                    }
                                </script>
                                    <?php
                                    date_default_timezone_set("Asia/Jakarta");
                                    echo "".date("l, d F Y /")."";
                                    ?> <span id="jam"></span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Greeting Messages -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pesan
                                </div>
                                <marquee><div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                include '../koneksi.php';
                                $getGuru = $koneksi -> query("SELECT * FROM tbguru WHERE nip = '".$_SESSION['nip']."'");
                                $row = mysqli_fetch_array($getGuru);

                                echo "Selamat datang, ".$row['nama']."!";
                                ?>
                                </div></marquee>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
<form action="#" method="post" enctype="multipart/form-data" class="user">
    <br>

    <input type="number" name="id_jadwal" class="form-control form-control-user" id="" value="" hidden>

        <div class="form-group">
            <label for="dropdowm">Nama Guru</label>
            <select class="form-control" name="nip">
                  <option value="">- Pilih Guru -</option>
                    <?php
                    include "../koneksi.php";
                    $tampilGuru = $koneksi -> query("SELECT * FROM tbguru WHERE level = 1");
                    while ($row = $tampilGuru -> fetch_array()){
                        echo "<option value='".$row['nip']."'>".$row['nama']."</option>";
                    }
                    ?>
                </select>
        </div>

        <div class="form-group mb-4">
            <label for="password">Mata Pelajaran</label>
            <select class="form-control" name="id_mapel">
                  <option value="">- Pilih Mata Pelajaran -</option>
                    <?php
                    include "../koneksi.php";
                    $tampilGuru = $koneksi -> query("SELECT * FROM tbmapel");
                    while ($row = $tampilGuru -> fetch_array()){
                        echo "<option value='".$row['id_mapel']."'>".$row['nama_mapel']."</option>";
                    }
                    ?>
                </select>
        </div>

        <div class="form-group">
            <label for="text">Kelas</label>
            <select class="form-control" name="id_kelas">
                  <option value="">- Pilih Kelas -</option>
                    <?php
                    include "../koneksi.php";
                    $tampilGuru = $koneksi -> query("SELECT * FROM tbkelas");
                    while ($row = $tampilGuru -> fetch_array()){
                        echo "<option value='".$row['id_kelas']."'>".$row['nama_kelas']."</option>";
                    }
                    ?>
                </select>
        </div>

        <div class="form-group mb-4">
            <label for="time">Jam</label>
            <input type="time" name="jam" class="form-control form-control-user" id="" required>                
        </div>

        <input type="submit" name="btSimpan" value="Konfirmasi" class="btn btn-block btn-primary">
    </form>
    </div>

    <script src="../js/custom.js"></script>

    <?php
    if (isset($_POST['btSimpan'])){
        include "../koneksi.php";
        // data jadwal
        $idJadwal = $_POST['id_jadwal'];
        $nip = $_POST['nip'];
        $idMapel = $_POST['id_mapel'];
        $idKelas = $_POST['id_kelas'];
        $jam = $_POST['jam'];

        // validasi untuk menyimpan data
        $querysimpan = "INSERT INTO `tbjadwal` (`id_jadwal`, `nip`, `id_mapel`, `id_kelas`, `jam`) 
        VALUES ('".$idJadwal."', '".$nip."', '".$idMapel."', '".$idKelas."', '".$jam."');";

        $simpandata = $koneksi->query($querysimpan);
    
        if($simpandata){
            echo "<script>alert('Jadwal berhasil disimpan!');window.location='index.php?page=jadwal';</script>";
        } else {
            echo $koneksi->error;
        }
    }

    ?>