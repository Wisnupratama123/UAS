<!DOCTYPE html>
<html lang="en">
<head>
  <title>Anggota</title>
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
  <h2>Nama-Nama Anggota</h2>
  <form method="post">
    <div class="form-group">
      <label for="nomoranggota">Nomor Anggota:</label>
      <input type="text" class="form-control" id="nomoranggota" placeholder="Ketik Nomor Anggota" name="nomoranggota">
    </div>
     <div class="form-group">
      <label for="namaanggota">Nama Anggota:</label>
      <input type="text" class="form-control" id="namaanggota" placeholder="Ketik Nama Anggota" name="namaanggota">
    </div>
       <div class="form-group">
      <label for="alamat">Alamat:</label>
      <input type="text" class="form-control" id="alamat" placeholder="Ketik Alamat" name="alamat">
    </div>
     <div class="form-group">
      <label for="tanggaldaftar">Tanggal Daftar:</label>
      <input type="datetime-local" class="form-control" id="tanggaldaftar" placeholder="Ketik Tanggal Daftar" name="tanggaldaftar">
    </div>
     <div class="form-group">
      <label for="tanggalkadaluarsa">Tanggal Kadaluarsa:</label>
      <input type="datetime-local" class="form-control" id="tanggalkadaluarsa" placeholder="Ketik Tanggal Kadaluarsa" name="tanggalkadaluarsa">
    </div>
    <br>
    <button type="submit" class="btn btn-primary" name="bsimpan">Submit</button>
    <button type="submit" class="btn btn-primary" name="bcari">Cari Anggota</button>
  </form>
</div>
</br>
</body>
</html>
<?php 
if (isset($_POST['binput'])) {
  echo "<script>window.location.href='cari.php';</script>";
  exit();
  }
  if (isset($_POST['bcari'])) {
  echo "<script>window.location.href='daftar.php';</script>";
  exit();
  
  }
  if (isset($_POST['bsimpan'])) {
  $nomoranggota=$_POST['nomoranggota'];
  $namaanggota=$_POST['namaanggota'];
  $alamat=$_POST['alamat'];
  $tanggaldaftar=$_POST['tanggaldaftar'];
  $tanggalkadaluarsa=$_POST['tanggalkadaluarsa'];
  if (empty($nomoranggota)) {
    echo "Nomor Anggota  harus diisi !";
    exit();
  }
  $koneksi=new mysqli("localhost","root","","perpustakaan1");
  $sql="INSERT INTO `anggota`(`nomoranggota`, `namaanggota`, `alamat`, `tanggaldaftar`,`tanggalkadaluarsa`) Values 
  ('".$nomoranggota."', '".$namaanggota."', '".$alamat."', '".$tanggaldaftar."','".$tanggalkadaluarsa."');";
  $q=$koneksi->query($sql);
    if ($q) {
      echo "Nomor Anggota sudah tersimpan !";
    } else {
      echo "Nomor Anggota gagal tersimpan !";
    }   
 }
 ?>