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

<!-- Content Column -->
<div class="row">
<div class="col-lg-6 mb-4">
    <!-- Development Approach -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Biodata Anda</h6>
        </div>
        <div class="card-body">
        <center><img src='../assets/img/<?=$row['foto']?>' width='200px' height='200px' class='img-fluid'/></center>
        <br>
                <?php
                include '../koneksi.php';
                $getGuru = $koneksi -> query("SELECT * FROM tbguru WHERE level = '".$_SESSION['level']."'");
                $row = mysqli_fetch_array($getGuru);
                
                if ($_SESSION['level'] == 1){
                    echo "Hai <b>".$row['nama']."</b>, anda saat ini login sebagai Guru.
                    <p>Anda sebagai Guru hanya dapat melakukan Menambah, dan Melihat Data.
                    Selamat bekerja dan semoga harimu menyenangkan! :)</p>";
                } elseif ($_SESSION['level'] == 2) {
                    echo "Hai <b>".$row['nama']."</b>, anda saat ini login sebagai Admin.
                    <p>Anda sebagai Admin dapat melakukan Menambah, Mengubah, Menghapus, dan Melihat Data.
                    Selamat bekerja dan semoga harimu menyenangkan! :)</p>";
                } elseif ($_SESSION['level'] == 3) {
                    echo "Hai <b>Superuser Admin</b>, anda saat ini hanya memiliki akses menambah/menghapus Admin.
                    <p>Anda sebagai Superuser Admin hanya dapat melakukan Penambahan data dan menghapus
                    data pada admin.
                    Selamat bekerja dan semoga harimu menyenangkan! :)</p>";
                } else {
                    echo "Data login tidak benar, silakan coba kembali.";
                }
                ?>
        </div>
</div>
</div>

<!-- Illustrations -->
<div class="col-lg-6 mb-4">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Reminder</h6>
    </div>
    <div class="card-body">
        <div class="text-center">
            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                src="../img/business-salesman.gif" alt="Illustration for Admin/Guru">
        </div>
        <p>
        “Hidup tidak pernah mudah. Ada pekerjaan yang harus dilakukan dan kewajiban yang harus dipenuhi 
        – kewajiban terhadap kebenaran, keadilan, dan kebebasan.”  <b>- John F. Kennedy</b>
        </p>
    </div>
</div>
</div>
