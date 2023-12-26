<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/custom.css" rel="stylesheet">
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    
    <title>Dashboard</title>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion smooth" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?page=">
                <div class="sidebar-brand-icon">
                    <img width="25px" height="25px" src="../img/home.svg">
                </div>
                <div class="sidebar-brand-text mx-3">
                    <?php
                    session_start();
                      if ($_SESSION['level'] == 2){
                        echo "Panel Admin";
                    } elseif ($_SESSION['level'] == 1) {
                        echo "Panel Guru";
                    } elseif ($_SESSION['level'] == 3){
                        echo "Superuser Admin";
                    } else {
                        echo "Data Tidak Valid";
                    }
                    ?>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php?page=">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <?php
            if ($_SESSION['level'] == 2){
                echo "
                <li class='nav-item'>
                    <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseGuru'
                        aria-expanded='true' aria-controls='collapseGuru'>
                        <i class='fas fa-fw fa-cog'></i>
                        <span>Data Guru</span>
                    </a>
                    <div id='collapseGuru' class='collapse' aria-labelledby='headingGuru' data-parent='#accordionSidebar'>
                        <div class='bg-white py-2 collapse-inner rounded'>
                            <h6 class='collapse-header'>Menu:</h6>
                            <a class='collapse-item' href='index.php?page=admin'>Kelola Data Guru</a>
                            <a class='collapse-item' href='index.php?page=tambahdata'>Tambah Data Guru</a>
                        </div>
                    </div>
                </li>

                <li class='nav-item'>
                    <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseAbsensi'
                        aria-expanded='true' aria-controls='collapseAbsensi'>
                        <i class='fas fa-fw fa-wrench'></i>
                        <span>Data Absensi</span>
                    </a>
                    <div id='collapseAbsensi' class='collapse' aria-labelledby='headingAbsensi' data-parent='#accordionSidebar'>
                        <div class='bg-white py-2 collapse-inner rounded'>
                            <h6 class='collapse-header'>Menu:</h6>
                            <a class='collapse-item' href='index.php?page=kelolaabsensi'>Kelola Absensi Guru</a>
                        </div>
                    </div>
                </li>

                <li class='nav-item'>
                    <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseSekolah'
                        aria-expanded='true' aria-controls='collapseSekolah'>
                        <i class='fas fa-fw fa-cog'></i>
                        <span>Data Sekolah</span>
                    </a>
                    <div id='collapseSekolah' class='collapse' aria-labelledby='headingSekolah' data-parent='#accordionSidebar'>
                        <div class='bg-white py-2 collapse-inner rounded'>
                            <h6 class='collapse-header'>Menu:</h6>
                            <a class='collapse-item' href='index.php?page=tambahmapel'>Tambah Mata Pelajaran</a>
                            <a class='collapse-item' href='index.php?page=tambahkelas'>Tambah Kelas</a>
                        </div>
                    </div>
                </li>
                <li class='nav-item'>
                    <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseJadwal'
                        aria-expanded='true' aria-controls='collapseJadwal'>
                        <i class='fas fa-fw fa-cog'></i>
                        <span>Data Jadwal</span>
                    </a>
                    <div id='collapseJadwal' class='collapse' aria-labelledby='headingJadwal' data-parent='#accordionSidebar'>
                        <div class='bg-white py-2 collapse-inner rounded'>
                            <h6 class='collapse-header'>Menu:</h6>
                            <a class='collapse-item' href='index.php?page=jadwal'>Kelola Jadwal</a>
                            <a class='collapse-item' href='index.php?page=tambahjadwal'>Tambah Jadwal Baru</a>
                        </div>
                    </div>
                </li>
                  "; // Sidebar khusus admin
            } elseif ($_SESSION['level'] == 1) {
                echo "
                <li class='nav-item'>
                    <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseTwo'
                        aria-expanded='true' aria-controls='collapseTwo'>
                        <i class='fas fa-fw fa-cog'></i>
                        <span>Absensi Guru</span>
                    </a>
                    <div id='collapseTwo' class='collapse' aria-labelledby='headingTwo' data-parent='#accordionSidebar'>
                        <div class='bg-white py-2 collapse-inner rounded'>
                            <h6 class='collapse-header'>Menu:</h6>
                                <a class='collapse-item' href='index.php?page=guru'>Data Absensi</a>
                                <a class='collapse-item' href='index.php?page=absensi'>Mengisi Absensi</a>
                        </div>
                    </div>
                </li>
                <li class='nav-item'>
                    <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseMapel'
                        aria-expanded='true' aria-controls='collapseMapel'>
                        <i class='fas fa-fw fa-cog'></i>
                        <span>Absensi Mengajar</span>
                    </a>
                    <div id='collapseMapel' class='collapse' aria-labelledby='headingMapel' data-parent='#accordionSidebar'>
                        <div class='bg-white py-2 collapse-inner rounded'>
                            <h6 class='collapse-header'>Menu:</h6>
                                <a class='collapse-item' href='index.php?page=data_absen'>Data Jadwal</a>
                                <a class='collapse-item' href='index.php?page=absen_mapel'>Mengisi Jadwal</a>
                        </div>
                    </div>
                </li>
                "; // Sidebar khusus guru
            } elseif ($_SESSION['level'] == 3){
                echo "
                <li class='nav-item'>
                    <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseSu'
                        aria-expanded='true' aria-controls='collapseSu'>
                        <i class='fas fa-fw fa-cog'></i>
                        <span>Data Admin</span>
                    </a>
                    <div id='collapseSu' class='collapse' aria-labelledby='headingSu' data-parent='#accordionSidebar'>
                        <div class='bg-white py-2 collapse-inner rounded'>
                            <h6 class='collapse-header'>Menu:</h6>
                                <a class='collapse-item' href='index.php?page=kelolaadmin'>Kelola Data Admin</a>
                                <a class='collapse-item' href='index.php?page=tambahadmin'>Tambah Admin</a>
                        </div>
                    </div>
                </li>
                "; // Sidebar khusus superuser admin
            } else {
                echo "
                <li class='nav-item'>
                    <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseTwo'
                        aria-expanded='true' aria-controls='collapseTwo'>
                        <i class='fas fa-fw fa-cog'></i>
                        <span>Data Login tidak valid</span>
                    </a>
                    <div id='collapseTwo' class='collapse' aria-labelledby='headingTwo' data-parent='#accordionSidebar'>
                        <div class='bg-white py-2 collapse-inner rounded'>
                            <h6 class='collapse-header'>Menu:</h6>
                                <a class='collapse-item' href='../logout,php'>Data Login tidak valid</a>
                                <a class='collapse-item' href='../logout,php'>Data Login tidak valid</a>
                        </div>
                    </div>
                </li>
                "; // Sidebar khusus user anonim
            }
            ?>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Menu sidebar 2 -->
            <div class="sidebar-heading">
                About me
            </div>

            <!-- Nav Item - About Creator -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Creator</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Social Media:</h6>
                        <a class="collapse-item" href="https://instagram.com/mzulseptriawan">Instagram</a>
                        <a class="collapse-item" href="https://web.facebook.com/profile.php?id=100004598371565">Facebook</a>
                        <a class="collapse-item" href="https://github.com/mzulseptriawan">Github</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Contact me on:</h6>
                        <a class="collapse-item" href="mailto:mzulfikarseptriawan@gmail.com">Gmail</a>
                        <a class="collapse-item" href="https://wa.me/6289657784310">WhatsApp</a>
                        <h6 class="collapse-header">Buy some coffee:</h6>
                        <a class="collapse-item" href="https://trakteer.id/mzulseptriawan">Trakteer</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form action="http://www.google.co.id/search" target="google_window" method="POST" class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" name="q" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                            
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <?php
                                include '../koneksi.php';
                                $getGuru = $koneksi -> query("SELECT * FROM tbguru WHERE nip = '".$_SESSION['nip']."'");
                                $row = mysqli_fetch_array($getGuru);

                                echo "Halo, ".$row['nama']."!";

                                ?>
                                </span>
                                <img class="img-profile rounded-circle img-fluid" src="../assets/img/<?=$row['foto']?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="index.php?page=pengaturanakun">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Pengaturan Akun
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">
                        <?php
                        include('content.php');
                        ?>
                    </div>
                </div>
                <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer" style="background-color : #f8f9fc">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Projek UAS &copy; Zul 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah anda yakin ingin Keluar?</div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>
    <script src="../js/custom.js"></script>

</body>

</html>