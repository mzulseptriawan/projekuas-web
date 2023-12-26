<?php
        include '../koneksi.php';

        $hapus = $koneksi -> query("DELETE FROM tbguru WHERE nip = '".$_GET['id']."'");

        if ($hapus){
            echo "<script>alert('Data telah berhasil dihapus');window.location='index.php?page=admin';</script>";
        } else {
            echo $koneksi -> error;
        }
?>