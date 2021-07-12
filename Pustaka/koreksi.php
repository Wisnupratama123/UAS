<!DOCTYPE html>
<html lang="en">
<head>
  <title>Koreksi Nama-Nama Buku-Buku Pustaka</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<?php $koneksi=new mysqli("localhost","root","","perpustakaan1");
	if (isset($_GET['kodepustaka'])) {
 $kodepustakadicari=$_GET['kodepustaka'];	
 $sql="SELECT * FROM `pustaka` WHERE `kodepustaka` = '".$kodepustakadicari."'";
 $q=$koneksi->query($sql);
 $r=$q->fetch_array();
 if (empty($r)) {
	 echo "<h2>Pustakawan yang dicari tidak ditemukan !</h2>";
	 exit();
 }
}
?>
<div class="container">
  <h2>Koreksi Rekord Buku-Buku Pustaka Baru</h2>
  <form method="post">
    <div class="form-group">
      <label for="kodepustaka">Kode Pustaka:</label>
      <input type="text" class="form-control" id="kodepustaka" placeholder="Ketik Kode Pustakawan" name="kodepustaka" value="<?php echo $r['kodepustaka'];?>" readonly>
    </div>
     <div class="form-group">
      <label for="judulpustaka">Judul Pustaka:</label>
      <input type="text" class="form-control" id="judulpustaka" placeholder="Ketik Judul Pustaka" name="judulpustaka" value="<?php echo $r['judulpustaka'];?>" readonly>
    </div>
     <div class="form-group">
      <label for="pengarang">Pengarang:</label>
      <input type="text" class="form-control" id="pengarang" placeholder="Ketik Pengarang" name="pengarang" value="<?php echo $r['pengarang'];?>" readonly>
    </div>
     <div class="form-group">
      <label for="penerbit">Penerbit:</label>
      <input type="text" class="form-control" id="penerbit" placeholder="Ketik Penerbit" name="penerbit" value="<?php echo $r['penerbit'];?>" readonly>
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
 	$kodepustaka=$_POST['kodepustaka'];
 	$judulpustaka=$_POST['judulpustaka'];
 	$pengarang=$_POST['pengarang'];
 	$penerbit=$_POST['penerbit'];
 $sql="Update `Pustaka` set `judulpustaka`=".$judulpustaka."', `pengarang`='".$pengarang."',`penerbit`='".$penerbit."' where kodepustaka='".$kodepustaka."';";
 $q=$koneksi->query($sql);
    if ($q) {
      echo "Rekord Buku-Buku Pustaka sudah tersimpan !";
    } else {
      echo "Rekord Buku-Buku Pustaka gagal tersimpan !";
    }	  
	echo "
	<script>window.location.href='input.php';</script>";
 }
 
?>