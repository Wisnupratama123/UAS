<!DOCTYPE html>
<html lang="en">
<head>
  <title>Koreksi Nama-Nama Pustakawan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
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
}
?>
<div class="container">
  <h2>Koreksi Rekord Anggota Baru</h2>
  <form method="post">
    <div class="form-group">
      <label for="nomoranggota">Nomor Anggota:</label>
      <input type="text" class="form-control" id="nomoranggota" placeholder="Ketik Nomor Anggota" name="nomoranggota" value="<?php echo $r['nomoranggota'];?>" readonly>
    </div>
     <div class="form-group">
      <label for="namaanggota">Nama Anggota:</label>
      <input type="text" class="form-control" id="namaanggota" placeholder="Ketik Nama Anggota" name="namaanggota" value="<?php echo $r['namaanggota'];?>" readonly>
    </div>
     <div class="form-group">
      <label for="alamat">Alamat:</label>
      <input type="text" class="form-control" id="alamat" placeholder="Ketik Alamat" name="alamat" value="<?php echo $r['alamat'];?>" readonly>
    </div>
     <div class="form-group">
      <label for="tanggalkadaluarsa">Tanggal Daftar:</label>
      <input type="date" class="form-control" id="tanggalkadaluarsa" placeholder="Ketik Tanggal Daftar" name="tanggaldaftar" value="<?php echo $r['tanggaldaftar'];?>" readonly>
    </div>
     <div class="form-group">
      <label for="tanggalkadaluarsa">Tanggal Kadaluarsa:</label>
      <input type="date" class="form-control" id="tanggalkadaluarsa" placeholder="Ketik Tanggal Kadaluarsa" name="tanggalkadaluarsa" value="<?php echo $r['tanggalkadaluarsa'];?>" readonly>
    </div>
    <br>
    <button type="submit" class="btn btn-primary" name="bsimpan">Change</button>
    </form>
</div>
</body>
</br>
</html>
<?php 
 if (isset($_POST['bsimpan'])) {
 	$nomoranggota=$_POST['nomoranggota'];
 	$namaanggota=$_POST['namaanggota'];
 	$alamat=$_POST['alamat'];
 	$tanggaldaftar=$_POST['tanggaldaftar'];
  $tanggalkadluarsa=$_POST['tanggalkadluarsa'];
 $sql="Update `anggota` set `namaanggota`=".$namaanggota."', `alamat`='".$alamat."',`tanggaldaftar`='".$tanggaldaftar."',`tanggalkadluarsa`='".$tanggalkadluarsa."' where nomoranggota='".$nomoranggota."';";
 $q=$koneksi->query($sql);
    if ($q) {
      echo "Rekord Nama Anggota sudah tersimpan !";
    } else {
      echo "Rekord Nama Anggota gagal tersimpan !";
    }	  
	echo "
	<script>window.location.href='input.php';</script>";
 }
 
?>