<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <title>Ubah Data</title>
</head>
<body>
  <!-- Judul diatas form -->
  <div class="card-header py-3">
      <h4 class="m-0 font-weight-bold text-primary">Ubah Data pada Guru</h6>
  </div>
  
  <!-- Input data (Khusus Admin) -->
  <div class="container-fluid">
    <?php
      include "../koneksi.php";
      $getGuru = $koneksi -> query("SELECT * FROM tbguru WHERE nip = '".$_GET['id']."'");
      $row = $getGuru -> fetch_array();
    ?>
        <form action="" method="POST" enctype="multipart/form-data" class="user">
            <br>
            <div class="form-group">
              <label for="number">NIP</label>
              <input type="number" name="nip" class="form-control form-control-user formlogin" id="" value="<?=$row['nip']?>" readonly>
            </div>

            <div class="form-group">
              <label for="text">Nama</label>
              <input type="text" name="nama" class="form-control form-control-user formlogin" id="" value="<?=$row['nama']?>" required>
            </div>

            <div class="form-group mb-4">
              <label for="text">Alamat</label>
              <input type="text" name="alamat" class="form-control form-control-user" id="" value="<?=$row['alamat']?>" required>                
            </div>

            <div class="form-group mb-4">
              <label for="date">Tanggal Lahir</label>
              <input type="date" name="tgllahir" class="form-control form-control-user" id="" value="<?=$row['tanggal_lahir']?>" required>                
            </div>

            <div class="form-group mb-4">
              <label for="text">Tempat Lahir</label>
              <input type="text" name="tmplahir" class="form-control form-control-user" id="" value="<?=$row['tempat_lahir']?>" required>                
            </div>

            <div class="form-group mb-4">
              <label for="number">No Handphone</label>
              <input type="number" name="nohp" class="form-control form-control-user" id="" value="<?=$row['nohp']?>" required>                
            </div>

            <div class="form-group mb-4">
              <label for="file">Foto Anda</label><br>
              <input type="file" name="file" class="" id="file" required>                
            </div>

            <div class="form-group mb-4">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control form-control-user" id="passwordVisible" value="<?=$row['password']?>" required>

              <input type="checkbox" onclick="myFunction()"> Perlihatkan Password                
            </div>

            <input type="submit" name="btUbah" value="Konfirmasi" class="btn btn-block btn-success">
            <a href="index.php?page=admin" class="btn btn-block btn-danger">Kembali</a>
        </form>
        <br>
       

        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Projek UAS &copy; Zul 2022</span>
                </div>
            </div>
        </footer>

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

              $queryubah = "UPDATE tbguru SET nama='".$namaGuru."', alamat='".$almt."',
              tanggal_lahir='".$tglLahir."', tempat_lahir='".$tmptLahir."', nohp='".$noHp."',
              foto='".$nama."', password='".$pwdGuru."', folder='../assets/img/'
              WHERE nip = '".$nipGuru."'";

              $ubahdata = $koneksi -> query($queryubah);

              if($ubahdata){
                  echo "<script>alert('Data telah berhasil diubah.');window.location='index.php?page=admin';</script>";
              } else {
                  echo $koneksi -> error;
              }
 
          } else {
              echo "<script>alert('Ukuran file melebihi batas yang telah ditentukan.');window.location='ubahdata.php';</script>";
          }

      } else {
          echo "<script>alert('Ekstensi file harus .jpg .jpeg dan .png')</script>";
      }

  }

?>