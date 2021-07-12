<?php $koneksi=new mysqli("localhost","root","","perpustakaan1");
if (isset($_GET['kodepustakawan'])) {
 $kodepustakawandicari=$_GET['kodepustakawan'];	
 $sql="SELECT * FROM `pustakawan` WHERE `kodepustakawan` = '".$kodepustakawandicari."'";
 $q=$koneksi->query($sql);
 $r=$q->fetch_array();
 if (empty($r)) {
	 echo "<h2>Pustakawan yang dicari tidak ditemukan !</h2>";
	 exit();
 }
 $sql2="DELETE FROM `pustakawan` WHERE `kodepustakawan` = '".$kodepustakawandicari."'";
 $q2=$koneksi->query($sql2);
 echo "
	<script>window.location.href='daftar.php';</script>";
} 
?>