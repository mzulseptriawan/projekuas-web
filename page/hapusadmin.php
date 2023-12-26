<?php
        include '../koneksi.php';

        $hapus = $koneksi -> query("DELETE FROM tbguru WHERE nip = '".$_GET['id']."'");

        if ($hapus){
            echo "<script>alert('Data admin telah berhasil dihapus');window.location='index.php?page=kelolaadmin';</script>";
        } else {
            echo $koneksi -> error;
        }
?>