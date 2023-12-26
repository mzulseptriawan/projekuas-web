<?php
        include '../koneksi.php';
        $hapus = $koneksi -> query("DELETE FROM tbabsen WHERE id_absen = '".$_GET['id']."'");
        if ($hapus){
            echo "<script>alert('Data telah berhasil dihapus');window.location='index.php?page=kelolaabsensi';</script>";
        } else {
            echo $koneksi -> error;
        }
?>