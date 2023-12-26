<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Mengisi Jadwal Guru</h1>
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
        <form action="" method="POST" class="user" enctype="multipart/form-data">
            <div class="form-group">
              <input type="hidden" name="id_absen" class="form-control form-control-user formlogin" id="" value="">
            </div>
            
            <div class="form-group">
              <label for="number">NIP</label>
              <input type="number" name="nip" class="form-control form-control-user formlogin" id="" value="<?=$_SESSION['nip']?>" readonly>
            </div>

            <div class="form-group mb-4">
              <label for="dropdown">
                Jadwal Mengajar
                </label>
                <br>
                <select class="form-control" name="id_jadwal">
                  <option value="">- Pilih Jadwal -</option>
                    <?php
                    include "../koneksi.php";
                    $tampilJadwal = $koneksi -> query("SELECT * FROM tbjadwal INNER JOIN tbkelas ON tbjadwal.id_kelas = tbkelas.id_kelas INNER JOIN tbmapel ON tbjadwal.id_mapel = tbmapel.id_mapel WHERE nip = '".$_SESSION['nip']."' GROUP BY tbjadwal.id_kelas ");
                    while ($row = $tampilJadwal -> fetch_array()){
                        echo "<option value='".$row['id_jadwal']."'>Nama Mapel : ".$row['nama_mapel']." || Kelas : ".$row['nama_kelas']."</option>";
                    }
                    ?>
                </select>                
            </div>

            <div class="form-group mb-4">
                <label for="date">
                    Tanggal Absen
                </label>
                <script>document.getElementById('DateField').valueAsDate = new Date();</script>
                <input type="date" name="tglabsen" class="form-control form-control-user" value="<?php echo date('Y-m-d') ?>" id="" readonly>
            </div>

            <div class="form-group mb-4">
                <label for="time">Waktu Absen</label>
                <script>document.getElementById('DateField').valueAsDate = new Date();</script>
                <input type="time" name="waktuabsen" class="form-control form-control-user" value="<?= date('H:i:s'); ?>" id="" readonly>
            </div>


            <div class="form-group mb-4">
                <label class="input-group" for="file">Bukti Absensi</label>
                <input type="file" name="file" class="" id="file" required>                
            </div>

            <input type="submit" name="btSimpan" value="Konfirmasi" class="btn btn-block btn-primary">
        </form>

    </div>

    <?php
    if (isset($_POST['btSimpan'])){
        include "../koneksi.php";
        // only foto
        $allowedExtention = array('png', 'jpg', 'jpeg');
        $nama = $_FILES['file']['name'];
        $x = explode('.', $nama);
        $extention = strtolower(end($x));
        $size = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];

        // biodata
        $idAbsen = $_POST['id_absen'];
        $nip = $_POST['nip'];
        $idJadwal = $_POST['id_jadwal'];
        $tglAbsen = $_POST['tglabsen'];
        $waktuAbsen = $_POST['waktuabsen'];
        $ketAbsen = $_POST['keterangan'];

        $sql = $koneksi -> query("SELECT * FROM tbjadwal INNER JOIN tbkelas ON tbjadwal.id_kelas = tbkelas.id_kelas INNER JOIN tbmapel ON tbjadwal.id_mapel = tbmapel.id_mapel WHERE id_jadwal = '".$idJadwal."'  ");
        $row = $sql -> fetch_array();
        $jam = $row['jam'];
        
        date_default_timezone_set('Asia/Jakarta');
        $sekarang = strtotime(date('H:i'));
        if($sekarang >=  $jam){
            $ketAbsen = "Terlambat";
            //echo 'Terlambat';
        } else {
            $ketAbsen = "Tepat Waktu";
            //echo 'Tepat Waktu';
        }


        
        // validasi untuk menyimpan data
        if(in_array($extention, $allowedExtention) === true){
            if($size < 1044070){
                move_uploaded_file($file_tmp, '../assets/img/absensi/'.$nama);
                
                $querysimpan = "INSERT INTO `tbabsenn` (`id_absen`, `id_jadwal`, `tgl_absen`, `waktu_absen`, `keterangan`, `foto`, `folder`) VALUES ('".$idAbsen."','".$idJadwal."', '".$tglAbsen."', '".$waktuAbsen."', '".$ketAbsen."', '".$nama."', '../assets/img/absensi/');";
                
                $simpandata = $koneksi -> query($querysimpan);

                if($simpandata){
                    echo "<script>alert('Absensi telah dicatat.');window.location='index.php?page=data_absen';</script>";
                } else {
                    echo $koneksi -> error;
                }

            } else {
                echo "<script>alert('Ukuran file melebihi batas yang telah ditentukan.');window.location='index.php?page=absen_mapel';</script>";
            }
        } else {
            echo "<script>alert('Ekstensi file harus .jpg .jpeg dan .png')</script>";
        }

    }

    ?>