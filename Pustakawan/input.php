<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pustakawan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Rekord Nama-Nama Pustakawan</h2>
  <form method="post">
    <div class="form-group">
      <label for="kodepustakawan">Kode Pustakawan:</label>
      <input type="text" class="form-control" id="kodepustakawan" placeholder="Ketik Kode Pustakawan" name="kodepustakawan">
    </div>
    <div class="form-group">
      <label for="namapustakawan">Nama Pustakawan:</label>
      <input type="text" class="form-control" id="namapustakawan" placeholder="Ketik Nama Pustakawan" name="namapustakawan">
    </div>
    <div class="form-group">
      <label for="pasword">Password:</label>
      <input type="text" class="form-control" id="pasword" placeholder="Ketik Password" name="pasword">
    </div>
<div class="form-group">
      <label for="nomortelepon">Nomor Telepon:</label>
      <input type="text" class="form-control" id="nomortelepon" placeholder="Ketik Nomor Telepon" name="nomortelepon">
      <br>
    <button type="submit" class="btn btn-primary" name="bsimpan">Submit</button>
    <button type="submit" class="btn btn-primary" name="bcari">Cari Pustakawan</button>
  </form>
</div>
</br>
</body>
</html>
<?php 
if (isset($_POST['binput'])) {
  echo "<script>window.location.href='daftar.php';</script>";
  exit();
  }
if (isset($_POST['bcari'])) {
  echo "<script>window.location.href='daftar.php';</script>";
  exit();
  
  }
if (isset($_POST['bsimpan'])) {
  $kodepustakawan=$_POST['kodepustakawan'];
  $namapustakawan=$_POST['namapustakawan'];
  $pasword=$_POST['pasword'];
  $nomortelepon=$_POST['nomortelepon'];
  if (empty($kodepustakawan)) {
    echo "Kode Pustakawan harus diisi !";
    exit();
  }
  $koneksi=new mysqli("localhost","root","","perpustakaan1");
  $sql="INSERT INTO `pustakawan`(`kodepustakawan`, `namapustakawan`, `password`, `nomortelepon`) Values 
  ('".$kodepustakawan."', '".$namapustakawan."', '".$pasword."', '".$nomortelepon."');";
  $q=$koneksi->query($sql);
    if ($q) {
      echo "Nama Pustakawan sudah tersimpan !";
    } else {
      echo "Nama Pustakawan gagal tersimpan !";
    }   
 }
 ?>