<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cari Nama-Nama Pustakawan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Cari Nama-Nama Pustakawan</h2>
  <p>Ketik kata kunci nama Pustakawan yang dicari:</p>
  <form method="post">
    <div class="form-group">
      <label for="namadicari">Nama Pustakawan atau Kata kunci namanya:</label>
      <input type="text" class="form-control" id="namadicari" name="namadicari">
    </div>
    <button type="submit" class="btn btn-primary" name="bcari">Cari Pustakawan</button>
  </form>
</div>
<?php 
if (isset($_POST['bcari'])) {
	echo "<script>window.location.href='daftar.php';</script>";
	exit();
}
$koneksi=new mysqli("localhost","root","","perpustakaan1");
if (isset($_POST['bcari'])) {
 $namadicari=$_POST['namadicari'];	
 $sql="SELECT * FROM `pustakawan` WHERE `namapustakawan` LIKE '%".$namadicari."%'";
} else {
 $sql="SELECT * FROM `pustakawan`";
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