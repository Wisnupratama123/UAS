<!DOCTYPE html>
<html lang="en">
<head>
  <title>Anggota</title>
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
      <label for="idtransaksi">ID Transaksi:</label>
      <input type="text" class="form-control" id="idtransaksi" placeholder="Ketik Id transaksi" name="idtransaksi">
    </div>
     <div class="form-group">
      <label for="kodepustaka">Kode Pustaka:</label>
      <input type="text" class="form-control" id="kodepustaka" placeholder="Ketik Kode Pustaka" name="kodepustaka">
    </div>
       <div class="form-group">
      <label for="kodepustakawanpinjam">Kode Pustakawan Pinjam:</label>
      <input type="text" class="form-control" id="kodepustakawanpinjam" placeholder="Ketik Kode Pustakawan Pinjam" name="kodepustakawanpinjam">
    </div>
     <div class="form-group">
      <label for="tanggalpinjam">Tanggal Pinjam:</label>
      <input type="datetime-local" class="form-control" id="tanggalpinjam" placeholder="Ketik Tanggal Pinjam" name="tanggalpinjam">
    </div>
    <br>
    <button type="submit" class="btn btn-primary" name="bsimpan">Submit</button>
      <button type="submit" class="btn btn-primary" name="bcari">Cari ID Transaksi</button>
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
  $nomoranggota=$_POST['idtransaksi'];
  $namaanggota=$_POST['kodepustaka'];
  $alamat=$_POST['kodepustakawanpinjam'];
  $tanggaldaftar=$_POST['tanggalpinjam'];
  if (empty($idtransaksi)) {
    echo "Nomor Anggota  harus diisi !";
    exit();
  }
  $koneksi=new mysqli("localhost","root","","perpustakaan1");
  $sql="INSERT INTO `transaksi`(`idtransaksi`, `kodepustaka`, `kodepustakawanpinjam`, `tanggalpinjam`) Values 
  ('".$idtransaksi."', '".$kodepustaka."', '".$kodepustakawanpinjam."','".$tanggalpinjam."');";
  $q=$koneksi->query($sql);
    if ($q) {
      echo "Nomor Transaksi sudah tersimpan !";
    } else {
      echo "Nomor Transaksi gagal tersimpan !";
    }   
 }
 ?>