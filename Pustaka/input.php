<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pustaka</title>
   <link rel="shortcut icon" href="perpus.jpg" style="width: 300px" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Rekord Nama-Nama Buku-Buku Pustaka</h2>

  <form method="post">
    <div class="form-group">
      <label for="kodepustaka">Kode Pustaka:</label>
      <input type="text" class="form-control" id="kodepustaka" placeholder="Ketik Kode Pustaka" name="kodepustaka">
    </div>
    <div class="form-group">
      <label for="judulpustaka">Judul Pustaka:</label>
      <input type="text" class="form-control" id="judulpustaka" placeholder="Ketik Judul Pustaka" name="judulpustaka">
    </div>
    <div class="form-group">
      <label for="pengarang">Pengarang:</label>
      <input type="text" class="form-control" id="pengarang" placeholder="Ketik Pengarang" name="pengarang">
    </div>
<div class="form-group">
      <label for="penerbit">Penerbit:</label>
      <input type="text" class="form-control" id="penerbit" placeholder="Ketik Penerbit" name="penerbit">
      <br>
    <button type="submit" class="btn btn-primary" name="bsimpan">Submit</button>
    <button type="submit" class="btn btn-primary" name="bcari">Cari Pustaka</button>
  </form>
</div>
</br>
</body>
</html>
<?php
if (isset($_POST['bupload'])) {
  echo "<script>window.location.href='daftar.php';</script>";
  exit();
  } 
if (isset($_POST['binput'])) {
  echo "<script>window.location.href='daftar.php';</script>";
  exit();
  }
  if (isset($_POST['bcari'])) {
  echo "<script>window.location.href='daftar.php';</script>";
  exit();
  
  }
if (isset($_POST['bsimpan'])) {
  $kodepustaka=$_POST['kodepustaka'];
  $judulpustaka=$_POST['judulpustaka'];
  $pengarang=$_POST['pengarang'];
  $penerbit=$_POST['penerbit'];
  if (empty($kodepustaka)) {
    echo "Kode Buku-Buku Pustaka harus diisi !";
    exit();
  }
  $koneksi=new mysqli("localhost","root","","perpustakaan1");
  $sql="INSERT INTO `pustaka`(`kodepustaka`, `judulpustaka`, `pengarang`, `penerbit`) Values ('".$kodepustaka."', '".$judulpustaka."', '".$pengarang."', '".$penerbit."');";
  $q=$koneksi->query($sql);
    if ($q) {
      echo "Nama Pustaka sudah tersimpan !";
    } else {
      echo "Nama Pustaka gagal tersimpan !";
    }   
 }
 ?>