<div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Guru</h1>
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

    <!-- Tambah data guru (Khusus Admin) -->
    <form action="#" method="post" enctype="multipart/form-data" class="user">
        <br>
        
        <input type="number" name="level" class="form-control form-control-user formlogin" id="" value="1" hidden>
        
        <div class="form-group">
            <label for="number">NIP</label>
            <input type="number" name="nip" class="form-control form-control-user formlogin" id="" required>
        </div>

        <div class="form-group">
            <label for="text">Nama</label>
            <input type="text" name="nama" class="form-control form-control-user formlogin" id="" required>
        </div>

        <div class="form-group mb-4">
            <label for="text">Alamat</label>
            <input type="text" name="alamat" class="form-control form-control-user" id="" required>                
        </div>

        <div class="form-group mb-4">
            <label for="date">Tanggal Lahir</label>
            <input type="date" name="tgllahir" class="form-control form-control-user" id="" required>                
        </div>

        <div class="form-group mb-4">
            <label for="text">Tempat Lahir</label>
            <input type="text" name="tmplahir" class="form-control form-control-user" id="" required>                
        </div>

        <div class="form-group mb-4">
            <label for="number">No Handphone</label>
            <input type="number" name="nohp" class="form-control form-control-user" id="" required>                
        </div>
        
        <div class="form-group mb-4">
            <label class="input-group" for="file">Foto Anda</label>
            <input type="file" name="file" class="" id="file" required>           
        </div>

        <div class="form-group mb-4">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control form-control-user" id="passwordVisible" value="1234" readonly>
            <input type="checkbox" onclick="myFunction()"> Perlihatkan Password
        </div>

        <input type="submit" name="btSimpan" value="Konfirmasi" class="btn btn-block btn-primary">
    </form>

    <script src="../js/custom.js"></script>

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
        $nip = $_POST['nip'];
        $namaGuru = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $tglLahir = $_POST['tgllahir'];
        $tmptLahir = $_POST['tmplahir'];
        $noHp = $_POST['nohp'];
        $level = $_POST['level'];
        $pwdGuru = MD5($_POST['password']);
        // query cek data nip
        $result = mysqli_query($koneksi, "SELECT nip FROM tbguru WHERE nip = '$nip' ");
        // validasi nip agar tidak agar duplikasi
        if(mysqli_fetch_assoc($result)){
            echo "
            <script>
            alert('NIP Sudah terdaftar, silakan coba lagi.')
            </script>
            ";
            return false;
        }
        // validasi untuk menyimpan data
            if(in_array($extention, $allowedExtention) === true){
                if($size < 1044070){
                    move_uploaded_file($file_tmp, '../assets/img/'.$nama);
                    $querysimpan = "INSERT INTO `tbguru` (`nip`, `nama`, `alamat`, `tanggal_lahir`
                    , `tempat_lahir`, `nohp`, `foto`, `password`,`level`, `folder`) VALUES ('".$nip."','".$namaGuru."'
                    ,'".$alamat."','".$tglLahir."','".$tmptLahir."','".$noHp."','".$nama."'
                    ,'".$pwdGuru."','".$level."','../assets/img/');";
                    $simpandata = $koneksi -> query($querysimpan);
                    if($simpandata){
                        echo "<script>alert('Data telah berhasil disimpan.');window.location='index.php?page=admin';</script>";
                    } else {
                        echo $koneksi -> error;
                    }
                } else {
                    echo "<script>alert('Ukuran file melebihi batas yang telah ditentukan.');window.location='index.php?page=tambahdata';</script>";
                }
            } else {
                echo "<script>alert('Ekstensi file harus .jpg .jpeg dan .png')</script>";
            }
    }

    ?>
