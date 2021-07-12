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
 $kodepustakawandicari=$_GET['kodepustaka'];	
 $sql="SELECT * FROM `transaksi` WHERE `kodepustaka` = '".$kodepustakadicari."'";
 $q=$koneksi->query($sql);
 $r=$q->fetch_array();
 if (empty($r)) {
	 echo "<h2>Kode Buku-Buku Transaksi yang dicari tidak ditemukan !</h2>";
	 exit();
 }
}
?>
<div class="container">
  <h2>Koreksi Rekord Kode Buku-Buku Transaksi Baru</h2>
  <form method="post">
    <div class="form-group">
      <label for="idtransaksi">ID Transaksi:</label>
      <input type="text" class="form-control" id="idtransaksi" placeholder="Ketik ID Transaksi" name="idtransaksi" value="<?php echo $r['idtransaksi'];?>" readonly>
    </div>
     <div class="form-group">
      <label for="kodepustaka">Kode Pustaka:</label>
      <input type="text" class="form-control" id="kodepustaka" placeholder="Ketik Kode Pustaka" name="kodepustaka" value="<?php echo $r['kodepustaka'];?>" readonly>
    </div>
     <div class="form-group">
      <label for="kodepustakawanpinjam">Kode Pinjam Pustakawan:</label>
      <input type="text" class="form-control" id="kodepustakawanpinjam" placeholder="Ketik Kode Pinjam Pustakawan" name="kodepustakawanpinjam" value="<?php echo $r['kodepustakawanpinjam'];?>" readonly>
    </div>
     <div class="form-group">
      <label for="tanggalpinjam">Tanggal Pinjam:</label>
      <input type="text" class="form-control" id="tanggalpinjam" placeholder="Ketik Tanggal Pinjam" name="tanggalpinjam" value="<?php echo $r['tanggalpinjam'];?>" readonly>
    </div>
    <br>
    <button type="submit" class="btn btn-primary" name="bsimpan">Submit</button>
    </form>
</div>
</body>
</br>
</html>
<?php 
 if (isset($_POST['bsimpan'])) {
 	$idtransaksi=$_POST['idtransaksi'];
 	$kodepustaka=$_POST['kodepustaka'];
 	$kodepustakawanpinjam=$_POST['kodepustakawanpinjam'];
 	$tanggalpinjam=$_POST['tanggalpinjam'];
 $sql="Update `transaksi` set `kodepustaka`=".$kodepustaka."', `kodepustakawanpinjam`='".$kodepustakawanpinjam."',`tanggalpinjam`='".$tanggalpinjam."' where idtransaksi='".$idtransaksi."';";
 $q=$koneksi->query($sql);
    if ($q) {
      echo "Rekord Buku-Buku Transaksi Pustaka sudah tersimpan !";
    } else {
      echo "Rekord Buku-Buku Transaksi Pustaka gagal tersimpan !";
    }	  
	echo "
	<script>window.location.href='cari.php';</script>";
 }
 
?>