<?php
session_start();
if ($_SESSION['status'] != "sudah_login") {
//melakukan pengalihan
header("location:../login/login.php");
}
include "../config/koneksi.php";
$nama = $_POST['nama_barang'];
$Harga = $_POST['harga'];
$Stok = $_POST['stok'];
$insert_data = mysqli_query($koneksi, "INSERT INTO barang
(nama_barang,harga,stok) values('$nama','$Harga','$Stok')");
if ($insert_data) {
header('location:data_barang.php?pesan=Data Berasil Di simpan');
} else {
// header('location:data_jns_ekskul.php?pesan=Data Gagal Di simpan');
echo ('ERROR' . mysqli_error($koneksi));
}