<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tabel Buku-Buku Pustaka</title>
   <link rel="shortcut icon" href="perpus.jpg" style="width: 300px" />
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
      <li><a href="daftar.php">Pustaka</a></li>
      <li><a href="cari.php">Cari</a></li>
      <li><a href="input.php">Add</a></li>
      <li><a href="about.php">About</a></li>
    </ul>
  </div>
</nav>

  <?php 
$koneksi=new mysqli("localhost","root","","perpustakaan1");
$sql="SELECT * FROM `pustaka`";
$q=$koneksi->query($sql);
$r=$q->fetch_array();
if (empty($r)) {
   echo "<h2>Buku-Buku Pustaka yang dicari tidak ditemukan !</h2>";
   exit();
 }
?>
<div class="container">
  <h2>Tabel Buku-Buku Pustaka</h2>
  <p>Daftar Buku-Buku Pustaka yang tersimpan adalah:</p>            
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Kode Pustaka</th>
        <th>Nama Pustaka</th>
        <th>Pengarang</th>
    <th>Penerbit</th>
      </tr>
    </thead>
    <tbody>
      <?php do { 
  ?>
      <tr>
    <td><?php echo $r['kodepustaka'];?></td>
    <td><?php echo $r['judulpustaka'];?></td>
    <td><?php echo $r['pengarang'];?></td>
    <td><?php echo $r['penerbit'];?></td>
    

    <td><a href="koreksi.php?kodepustaka=<?php echo $r['kodepustaka'];?>" class="btn btn-primary">Update</a></td>
           <td><a href="hapus.php?kodepustaka=<?php echo $r['kodepustaka'];?>" class="btn btn-danger" onclick="return confirm('Apakah yakin akan menghapus  <?php echo $r['kodepustaka'];?> ?')">Delete</a></td>
      </tr>
      <?php } while ($r=$q->fetch_array());
  ?>
    </tbody>
  </table>
</div>

</body>
</html>