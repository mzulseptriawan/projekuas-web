<!-- Title Dashboard (Ujung kiri atas) -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
</div>

<!-- Hari Tanggal Card -->
<div class="col-xl-6 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Tanggal / Jam</div> 
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
                                    setlocale(LC_ALL, 'id_ID');
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

<!-- Ucapan selamat datang card -->
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

<div class="card-header py-3">
      <h4 class="m-0 font-weight-bold text-primary">Pengaturan Akun</h6>
  </div>
  
  <!-- Input data (Khusus Admin) -->
  <div class="container-fluid">
    <?php
      include "../koneksi.php";
      $getGuru = $koneksi -> query("SELECT * FROM tbguru WHERE nip = '".$_SESSION['nip']."'");
      $row = $getGuru -> fetch_array();
    ?>
        <form action="" method="POST" enctype="multipart/form-data" class="user">
            <div class="form-group mb-4">
                <p>Foto Anda :</p>
                <center><img src='../assets/img/<?=$row['foto']?>' width='150px' height='150px' class='img-fluid'/></center>
                <br>
                <label for="file">Ganti Foto</label><br>
                <input type="file" name="file" class="" id="file" required>                
            </div>

            <div class="form-group">
              <label for="number">NIP</label>
              <input type="number" name="nip" class="form-control form-control-user formlogin" id="" value="<?=$row['nip']?>" readonly>
            </div>

            <div class="form-group">
              <label for="text">Nama</b></label>
              <input type="text" name="nama" class="form-control form-control-user formlogin" id="" value="
              <?=$row['nama']?>">
            </div>

            <div class="form-group mb-4">
              <label for="password">Masukan Password Baru</label>
              <input type="password" name="password" class="form-control form-control-user" id="passwordVisible" value="">

              <input type="checkbox" onclick="myFunction()"> Perlihatkan Password                
            </div>

            <input type="submit" name="btUbah" value="Konfirmasi" class="btn btn-block btn-success">
            <a href="index.php?page=" class="btn btn-block btn-danger">Kembali</a>
        </form>
        <br>       

    </div>

    <script src="../js/custom.js"></script>
</body>
</html>

<?php
    if(isset($_POST['btUbah'])){
      include "../koneksi.php";

      // only foto
      $allowedExtention = array('png', 'jpg', 'jpeg');
      $nama = $_FILES['file']['name'];
      $x = explode('.', $nama);
      $extention = strtolower(end($x));
      $size = $_FILES['file']['size'];
      $file_tmp = $_FILES['file']['tmp_name'];

      // biodata
      $nipGuru = $_POST['nip'];
      $namaGuru = $_POST['nama'];
      $almt = $_POST['alamat'];
      $tglLahir = $_POST['tgllahir'];
      $tmptLahir = $_POST['tmplahir'];
      $noHp = $_POST['nohp'];
      $pwdGuru = MD5($_POST['password']);

      // validasi untuk menyimpan data
      if(in_array($extention, $allowedExtention) === true){
          if($size < 1044070){
              move_uploaded_file($file_tmp, '../assets/img/'.$nama);

              $queryubah = "UPDATE tbguru SET nama='".$namaGuru."', foto='".$nama."', password='".$pwdGuru."', folder='../assets/img/'
              WHERE nip = '".$nipGuru."'";

              $ubahdata = $koneksi -> query($queryubah);

              if($ubahdata){
                  echo "<script>alert('Data akun telah berhasil diubah.');window.location='index.php?page=pengaturanakun';</script>";
              } else {
                  echo $koneksi -> error;
              }
 
          } else {
              echo "<script>alert('Ukuran file melebihi batas yang telah ditentukan.');window.location='index.php?page=pengaturanakun';</script>";
          }

      } else {
          echo "<script>alert('Ekstensi file harus .jpg .jpeg dan .png')</script>";
      }

  }

?>