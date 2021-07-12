<?php 
 $koneksi=new mysqli("localhost","root","");
 $sql="create database perpustakaan1";
 $q=$koneksi->query($sql);
 if ($q) {
	 echo "Database sudah dibuat !";
 } else {
	 echo "Database gagal dibuat !";
 }
 $sql2="CREATE TABLE perpustakaan1.`pustakawan` (
  `kodepustakawan` varchar(10) not null primary key,
  `namapustakawan` varchar(40) not null,
  `password` varchar (30) not null,
  `nomortelepon` varchar (10) null
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
  $sql3="CREATE TABLE perpustakaan1.`pustaka` (
  `kodepustaka` varchar (10) not null primary key,
  `judulpustaka` text not null,
  `pengarang` varchar (100) not null,
  `penerbit` varchar (100) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
  $sql4="CREATE TABLE perpustakaan1.`anggota`(
  `nomoranggota` varchar (10) not null primary key,
  `namaanggota` varchar (40) not null,
  `alamat` text null,
  `tanggaldaftar` datetime not null default CURRENT_TIMESTAMP,
  `tanggalkadaluarsa` datetime not null default CURRENT_TIMESTAMP
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
  $sql5="CREATE TABLE perpustakaan1.`transaksi`(
  `idtransaksi` int (10) not null auto_increment primary key,
  `kodepustaka` varchar (40) not null,
  `kodepustakawanpinjam` varchar (10) not null,
  `tanggalpinjam` datetime not null default CURRENT_TIMESTAMP
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
$q2=$koneksi->query($sql2);
$q2=$koneksi->query($sql3);
$q2=$koneksi->query($sql4);
$q2=$koneksi->query($sql5);
 if ($q2) {
	 echo "Tabel sudah dibuat !";
 } else {
	 echo "Tabel gagal dibuat !";
 }