<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tabel Nama-Nama Pustakawan</title>
  <link rel="stylesheet" type="text/css" href="css landing.css">
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
     <img src="bukubaru.jpg" alt="logo" style="width:85px;">
    </div>
    <ul class="nav navbar-nav">
      <li class="viewport"><a href="http://localhost/uas/index.html">Home</a></li>
      <li><a href="daftar.php">Pustakawan</a></li>
      <li><a href="cari.php">Cari</a></li>
      <li><a href="input.php">Add</a></li>
      <li><a href="about.php">About</a></li>
    </ul>
  </div>
</nav>
  <?php 
$koneksi=new mysqli("localhost","root","","perpustakaan1");
$sql="SELECT * FROM `pustakawan`";
$q=$koneksi->query($sql);
$r=$q->fetch_array();
if (empty($r)) {
   echo "<h2>Pustakawan yang dicari tidak ditemukan !</h2>";
   exit();
 }
?>
<div class="container">
  <h2>Tabel Nama-Nama Pustakawan</h2>
  <p>Daftar Nama-Nama Pustakawan yang tersimpan adalah:</p>            
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Kode Pustakawan</th>
        <th>Nama Pustakawan</th>
        <th>Password</th>
    <th>No Telepon</th>
      </tr>
    </thead>
    <tbody>
      <?php do { 
  ?>
      <tr>
    <td><?php echo $r['kodepustakawan'];?></td>
    <td><?php echo $r['namapustakawan'];?></td>
    <td><?php echo $r['password'];?></td>
    <td><?php echo $r['nomortelepon'];?></td>

    <td><a href="koreksi.php?kodepustakawan=<?php echo $r['kodepustakawan'];?>" class="btn btn-primary">Update</a></td>
      <td><a href="hapus.php?kodepustakawan=<?php echo $r['kodepustakawan'];?>" class="btn btn-danger" onclick="return confirm('Apakah yakin akan menghapus  <?php echo $r['kodepustakawan'];?> ?')">Delete</a></td>
      </tr>
      <?php } while ($r=$q->fetch_array());
  ?>
    </tbody>
  </table>
</div>

</body>
</html>