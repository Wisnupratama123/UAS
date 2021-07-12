<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tabel Nama-Nama Anggota</title>
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
      <li><a href="cari.php">Cari</a></li>
      <li><a href="input.php">Add Member</a></li>
      <li><a href="about.php">About</a></li>
    </ul>
  </div>
</nav>
	<?php 
$koneksi=new mysqli("localhost","root","","perpustakaan1");
$sql="SELECT * FROM `anggota`";
$q=$koneksi->query($sql);
$r=$q->fetch_array();
if (empty($r)) {
   echo "<h2>Anggota yang dicari tidak ditemukan !</h2>";
   exit();
 }
?>
<div class="container">
  <h2>Tabel Nama-Nama Anggota</h2>
  <p>Daftar Nama-Nama Anggota yang tersimpan adalah:</p>            
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Nomor Anggota</th>
        <th>Nama Anggota</th>
        <th>Alamat</th>
    <th>Tanggal Daftar</th>
    <th>Tanggal Kadaluarsa</th>
      </tr>
    </thead>
    <tbody>
      <?php do { 
  ?>
      <tr>
    <td><?php echo $r['nomoranggota'];?></td>
    <td><?php echo $r['namaanggota'];?></td>
    <td><?php echo $r['alamat'];?></td>
    <td><?php echo $r['tanggaldaftar'];?></td>
    <td><?php echo $r['tanggalkadaluarsa'];?></td>

    <td><a href="koreksi.php?nomoranggota=<?php echo $r['nomoranggota'];?>" class="btn btn-primary">Update</a></td>
      <td><a href="hapus.php?nomoranggota=<?php echo $r['nomoranggota'];?>" class="btn btn-danger" onclick="return confirm('Apakah yakin akan menghapus  <?php echo $r['nomoranggota'];?> ?')">Delete</a></td>
      </tr>
      <?php } while ($r=$q->fetch_array());
  ?>
    </tbody>
  </table>
</div>

</body>
</html>