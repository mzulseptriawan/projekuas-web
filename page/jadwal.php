<div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Jadwal</h1>
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
                <h6 class="m-0 font-weight-bold text-primary">Data Jadwal pada Guru</h6>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Guru</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Kelas</th>
                                    <th>Jam</th>
                                    <th>Hapus</th>
                                </tr>
                                <?php
                                include '../koneksi.php';
                                $no = 1;
                                $tampilguru = $koneksi -> query("SELECT `tbjadwal`.`nip`, `tbjadwal`.`id_mapel`, `tbjadwal`.`id_kelas`, `tbguru`.`nama`, `tbmapel`.`nama_mapel`, `tbkelas`.`nama_kelas`, `tbjadwal`.`jam`, `tbjadwal`.`id_jadwal`
                                FROM `tbkelas`
                                    LEFT JOIN `tbjadwal` ON `tbjadwal`.`id_kelas` = `tbkelas`.`id_kelas`
                                    LEFT JOIN `tbmapel` ON `tbjadwal`.`id_mapel` = `tbmapel`.`id_mapel`
                                    LEFT JOIN `tbguru` ON `tbjadwal`.`nip` = `tbguru`.`nip`");
                                while($row = $tampilguru -> fetch_array()){
                                    echo "<tbody><tr>
                                    <td>".$no."</td>
                                    <td>".$row['nama']."</td>
                                    <td>".$row['nama_mapel']."</td>
                                    <td>".$row['nama_kelas']."</td>
                                    <td>".$row['jam']."</td>
                                    <td><a href='hapusjadwal.php?id=".$row['id_jadwal']."'>Hapus</a></td>
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