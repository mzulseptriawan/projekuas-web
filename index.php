<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- link yg dibutuhkan -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/custom.css">
    <title>Login</title>
  </head>

  <style>
    formlogin {padding-top: 14px;}
  </style>

  <body>
    <div class="content" style="background-image: linear-gradient(180deg, #6e68ea 0%, #d83389 100%);">
      <div class="container">
        <div class="row">

          <div class="col-md-6">
            <img src="img/subscribe.svg" alt="Image" class="img-fluid">
          </div>

          <div class="col-md-5 contents card shadow mb-4">
            <div class="row justify-content-center card-body">

                  <div class="col-md-12">
                    <div class="mb-4">
                      <h3>Selamat Datang</h3>
                      <p class="mb-4">Silakan login untuk melanjutkan.</p>
                    </div>

                    <form action="" method="POST" class="user">
                      <div class="form-group form-content mb-4">
                        <label for="username">Username</label>
                        <input type="text" name="txtUsername" class="form-control form-control-user formlogin" id="username">
                      </div>  

                      <div class="form-group form-content mb-4">
                        <label for="password">Password</label>
                        <input type="password" name="txtPassword" class="form-control form-control-user" id="password">
                      </div>

                      <div class="d-flex mb-5 align-items-center">
                        <span class="ml-auto"><a href="page/forgot-password.html" class="forgot-pass">Lupa Password?</a></span> 
                      </div>
                        
                      <input type="submit" name="btLogin" value="Masuk" class="btn btn-block btn-primary">  
                    
                    </form>
                  </div>

                  <?php
                  if(isset($_POST['btLogin'])){
                      include 'koneksi.php';
                  
                      $user = $_POST['txtUsername'];
                      $pass = MD5($_POST['txtPassword']);
                  
                      $queryLogin = $koneksi -> query(" SELECT * FROM tbguru WHERE nip='".$user."'
                      AND password='".$pass."' ");
                  
                      $cekData = $queryLogin -> num_rows;
                      $getData = $queryLogin -> fetch_array();
                  
                      if ($cekData == 1) {
                          session_start();
                          $_SESSION['username'] = $user;
                          $_SESSION['nip'] = $getData ['nip'];
                          $_SESSION['nama'] = $getData ['nama'];
                          $_SESSION['level'] = $getData ['level'];
                          header("location:page/index.php?page=");
                      } else {
                          echo "<script>alert('Username atau Password anda salah.');window:location='login.php';</script>";
                      } 
                    }
                  ?>
                </div>
              </div>  
            </div>
          </div>
      </div>

      <footer class="sticky-footer" style="background-color : #d83389">
        <div class="container" >
          <div class="copyright text-center" >
            <span>Projek UAS &copy; Zul 2023</span>
          </div>
        </div>
      </footer>

    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>