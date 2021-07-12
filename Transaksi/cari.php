<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cari Buku-Buku Transaksi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Cari Buku-Buku Transaksi</h2>
  <p>Ketik kata kunci nama Buku-Buku Transaki yang dicari:</p>
  <form method="post">
    <div class="form-group">
      <label for="kodepustakadicari">ID Buku-Buku Transaksi:</label>
      <input type="text" class="form-control" id="kodepustakadicari" name="kodepustakadicari">
    </div>
    <button type="submit" class="btn btn-primary" name="bcari">Cari Buku-Buku Transaksi</button>
  </form>
</div>
<?php 
if (isset($_POST['bcari'])) {
	echo "<script>window.location.href='daftar.php';</script>";
	exit();
}
$koneksi=new mysqli("localhost","root","","perpustakaan1");
if (isset($_POST['bcari'])) {
 $kodepustakadicari=$_POST['kodepustakadicari'];	
 $sql="SELECT * FROM `transaksi` WHERE `kodepustaka` LIKE '%".$kodepustakadicari."%'";
} else {
 $sql="SELECT * FROM `transaksi`";
}
 $q=$koneksi->query($sql);
 $r=$q->fetch_array();
 if (empty($r)) {
	 echo "<h2></h2>";
	 exit();
 }
 ?>

    </tbody>
  </table>
</div>
</body>
</html>