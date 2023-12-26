<link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Begin Page Content -->
<div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kelola Data Guru</h1>
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
                            <marquee>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                include '../koneksi.php';
                                $getGuru = $koneksi -> query("SELECT * FROM tbguru WHERE nip = '".$_SESSION['nip']."'");
                                $row = mysqli_fetch_array($getGuru);

                                echo "Halo ".$row['nama']."!";
                                ?>
                                </div>
                            </marquee>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Admin -->
    <div class="row">
        <div class="card shadow mb-6" style="width:100%";>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Guru</h6>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <tr>
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Tempat Lahir</th>
                                    <th>No Handphone</th>
                                    <th>Foto</th>
                                    <th>Edit</th>
                                    <th>Hapus</th>
                                </tr>
                                <?php
                                include '../koneksi.php';
                                $no = 1;
                                $tampilguru = $koneksi -> query("SELECT * FROM tbguru WHERE level = 1;");
                                while($row = $tampilguru -> fetch_array()){
                                    echo "<tbody><tr>
                                    <td>".$no."</td>
                                    <td>".$row['nip']."</td>
                                    <td>".$row['nama']."</td>
                                    <td>".$row['alamat']."</td>
                                    <td>".$row['tanggal_lahir']."</td>
                                    <td>".$row['tempat_lahir']."</td>
                                    <td>".$row['nohp']."</td>
                                    <td>"."<img src='../assets/img/".$row['foto']."'width='150px' height='150px' class='img-fluid'/>"."</td>
                                    <td><a href='ubahdata.php?id=".$row['nip']."'>Ubah</a></td>
                                    <td><a href='hapusdata.php?id=".$row['nip']."'>Hapus</a></td>
                                    </tr></tbody>";
                                
                                    $no++;
                                };
                                ?>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../js/custom.js"></script>
<!-- Bootstrap core JavaScript-->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="../js/sb-admin-2.min.js"></script>
<!-- Page level plugins -->
<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Page level custom scripts -->
<script src="../js/demo/datatables-demo.js"></script>