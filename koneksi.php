<?php
    $koneksi = new mysqli("localhost", "id20192682_root", "D>t9>(Cu7U2FP/eX", "id20192682_newuasdb");
    
    if($koneksi->connect_errno){
        die("ERROR : -> ".$koneksi->connect_error);
        exit();
    } else {
        
    }
    
?>