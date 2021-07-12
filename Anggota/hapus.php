<?php $koneksi=new mysqli("localhost","root","","perpustakaan1");
if (isset($_GET['nomoranggota'])) {
 $nomoranggotadicari=$_GET['nomoranggota'];	
 $sql="SELECT * FROM `anggota` WHERE `nomoranggota` = '".$nomoranggotadicari."'";
 $q=$koneksi->query($sql);
 $r=$q->fetch_array();
 if (empty($r)) {
	 echo "<h2>Anggota yang dicari tidak ditemukan !</h2>";
	 exit();
 }
 $sql4="DELETE FROM `anggota` WHERE `nomoranggota` = '".$nomoranggotadicari."'";
 $q2=$koneksi->query($sql4);
 echo "
	<script>window.location.href='daftar.php';</script>";
} 
?>