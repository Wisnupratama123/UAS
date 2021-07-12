<?php 
$koneksi=new mysqli("localhost","root","","perpustakaan1");
if (isset($_GET['kodepustaka'])) {
 $kodepustakadicari=$_GET['kodepustaka'];	
 $sql="SELECT * FROM `pustaka` WHERE `kodepustaka` = '".$kodepustakadicari."'";
 $q=$koneksi->query($sql);
 $r=$q->fetch_array();
 if (empty($r)) {
	 echo "<h2>Buku-buku Pustaka yang dicari tidak ditemukan !</h2>";
	 exit();
 }
 $sql3="DELETE FROM `pustaka` WHERE `kodepustaka` = '".$kodepustakadicari."'";
 $q2=$koneksi->query($sql3);
 echo "
	<script>window.location.href='daftar.php';</script>";
} 
?>