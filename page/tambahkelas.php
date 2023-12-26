<div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Kelas</h1>
        </div>
        <div class="row">
            <!-- Tanggal -->
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

    <!-- Judul diatas form -->
    <!-- <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Input data Guru</h6>
    </div> -->

    <!-- Ubah data (Khusus Admin) -->
    <form method="POST" class="user">
        <br>

        <input type="number" name="id_kelas" class="form-control form-control-user formlogin" id="" hidden>

        <div class="form-group">
            <label for="text">Nama Kelas</label>
            <input type="text" name="nama_kelas" class="form-control form-control-user formlogin" id="" required>
        </div>

        <input type="submit" name="btSimpan" value="Konfirmasi" class="btn btn-block btn-primary">
    </form>

    <script src="../js/custom.js"></script>

    <?php
    if (isset($_POST['btSimpan'])){
        include "../koneksi.php";
        
        // data kelas
        $namaKelas = $_POST['nama_kelas'];
        $idKelas = $_POST['id_kelas'];

        // query cek data kelas
        $result = mysqli_query($koneksi, "SELECT id_kelas FROM tbkelas WHERE id_kelas = '$idKelas' ");

        // validasi kelas agar tidak agar duplikasi
        if(mysqli_fetch_assoc($result)){
            echo "
            <script>
            alert('Kelas sudah tersedia. silakan coba lagi.')
            </script>
            ";
            return false;
        }

        // validasi untuk menyimpan data
        $querysimpan = "INSERT INTO `tbkelas` (`id_kelas`, `nama_kelas`) 
        VALUES ('".$idKelas."', '".$namaKelas."');";

        $simpandata = $koneksi->query($querysimpan);
    
        if($simpandata){
            echo "<script>alert('Data berhasil disimpan!');window.location='index.php?page=';</script>";
        } else {
            echo $koneksi->error;

            }
        }
    ?>
