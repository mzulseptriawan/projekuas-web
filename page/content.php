<?php
if(isset($_GET['page'])){
    if($_GET['page']==''){
        include('home.php');
    } elseif($_GET['page']=='admin'){
        include('admin.php');
    } elseif($_GET['page']=='guru'){
        include('guru.php');
    } elseif($_GET['page']=='absensi'){
        include('absensi.php');
    } elseif($_GET['page']=='tambahdata'){
        include('tambahdata.php');
    } elseif($_GET['page']=='ubahdata'){
        include('ubahdata.php');
    } elseif($_GET['page']=='kelolaabsensi'){
        include('kelolaabsensi.php');
    } elseif($_GET['page']=='pengaturanakun'){
        include('pengaturanakun.php');
    } elseif($_GET['page']=='tambahmapel'){
        include('tambahmapel.php');
    } elseif($_GET['page']=='tambahkelas'){
        include('tambahkelas.php');
    } elseif($_GET['page']=='tambahadmin'){
        include('tambahadmin.php');
    } elseif($_GET['page']=='kelolaadmin'){
        include('kelolaadmin.php');
    } elseif($_GET['page']=='absen_mapel'){
        include('absen_mapel.php');
    }elseif($_GET['page']=='data_absen'){
        include('data_absen.php');
    }elseif($_GET['page']=='tambahjadwal'){
        include('tambahjadwal.php');
    }elseif($_GET['page']=='jadwal'){
        include('jadwal.php');
    }else {
        include('home.php');
    }
}
?>