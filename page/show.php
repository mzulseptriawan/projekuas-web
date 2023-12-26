<?php  
include '../koneksi.php';
session_start();

$query = mysqli_query($koneksi, "SELECT * FROM tbjadwal INNER JOIN tbmapel ON tbjadwal.id_mapel = tbmapel.id_mapel INNER JOIN tbkelas ON tbjadwal.id_kelas = tbkelas.id_kelas WHERE nip = '".$_SESSION['nip']."' ");
$output = '<option value="">--Pilih Jadwal--</option>';
while($row = mysqli_fetch_array($query)){
	$output	.= '<option value="'.$row["id_jadwal"].'">Nama Mapel : '.$row["nama_mapel"].' || Kelas : '.$row["nama_kelas"].'</option>';
}
echo $output;
?>