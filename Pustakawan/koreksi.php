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
	if (isset($_GET['kodepustakawan'])) {
 $kodepustakawandicari=$_GET['kodepustakawan'];	
 $sql="SELECT * FROM `pustakawan` WHERE `kodepustakawan` = '".$kodepustakawandicari."'";
 $q=$koneksi->query($sql);
 $r=$q->fetch_array();
 if (empty($r)) {
	 echo "<h2>Pustakawan yang dicari tidak ditemukan !</h2>";
	 exit();
 }
}
?>
<div class="container">
  <h2>Koreksi Rekord Pustakawan Baru</h2>
  <form method="post">
    <div class="form-group">
      <label for="kodepustakawan">Kode Pustakawan:</label>
      <input type="text" class="form-control" id="kodepustakawan" placeholder="Ketik Kode Pustakawan" name="kodepustakawan" value="<?php echo $r['kodepustakawan'];?>" readonly>
    </div>
     <div class="form-group">
      <label for="namapustakawan">Nama Pustakawan:</label>
      <input type="text" class="form-control" id="namapustakawan" placeholder="Ketik Nama Pustakawan" name="namapustakawan" value="<?php echo $r['namapustakawan'];?>" readonly>
    </div>
     <div class="form-group">
      <label for="password">Password:</label>
      <input type="text" class="form-control" id="password" placeholder="Ketik Password" name="password" value="<?php echo $r['password'];?>" readonly>
    </div>
     <div class="form-group">
      <label for="nomortelepon">Nomor Telepon:</label>
      <input type="text" class="form-control" id="nomortelepon" placeholder="Ketik Nomor Telepon" name="nomortelepon" value="<?php echo $r['nomortelepon'];?>" readonly>
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
 	$kodepustakawan=$_POST['kodepustakawan'];
 	$namapustakawan=$_POST['namapustakawan'];
 	$password=$_POST['password'];
 	$nomortelepon=$_POST['nomortelepon'];
 $sql="Update `Pustakawan` set `namapustakawan`=".$namapustakawan."', `password`='".$password."',`nomortelepon`='".$nomortelepon."' where kodepustakawan='".$kodepustakawan."';";
 $q=$koneksi->query($sql);
    if ($q) {
      echo "Rekord Pustakawan sudah tersimpan !";
    } else {
      echo "Rekord Pustakawan gagal tersimpan !";
    }	  
	echo "
	<script>window.location.href='input.php';</script>";
 }
 
?>