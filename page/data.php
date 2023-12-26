<?php  
include "../koneksi.php";
session_start();
$jamId = $_POST["jamId"];
if($jamId !== ""){
	$query = mysqli_query($koneksi, "SELECT * FROM tbjadwal INNER JOIN tbmapel ON tbjadwal.id_mapel = tbmapel.id_mapel INNER JOIN tbkelas ON tbjadwal.id_kelas = tbkelas.id_kelas WHERE nip = '".$_SESSION['nip']."' WHERE id_jadwal = '".$jamId."' ");
	//$query = mysqli_query($koneksi, "SELECT * FROM tbl_lokasi_jakarta WHERE country_id = '$kotaId' ");
	$output = '<option value=""></option>';
	while($row = mysqli_fetch_array($query)){
		$output .= '<option>'.$row["jam"].'</option>';
	}
}else{
	$output = '<option value="">--Tolong pilih data--</option>';
}
echo  $output;
?>