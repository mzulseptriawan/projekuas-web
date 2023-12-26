<?php
        include '../koneksi.php';

        $hapus = $koneksi -> query("DELETE FROM tbjadwal WHERE id_jadwal = '".$_GET['id']."'");

        if ($hapus){
            echo "<script>alert('Data jadwal telah berhasil dihapus');window.location='index.php?page=jadwal';</script>";
        } else {
            echo $koneksi -> error;
        }
?>