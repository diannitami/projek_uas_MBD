<?php
session_start();
if ($_SESSION['status'] != "sudah_login") {
//melakukan pengalihan
header("location:../login/login.php");
}
include "../config/koneksi.php";
error_reporting();
$id = $_POST['id_barang'];
$nama = $_POST['nama_barang'];
$Harga = $_POST['harga'];
$Stok = $_POST['stok'];
// $petugas = $_SESSION['id_petugas'];
$update_data = mysqli_query($koneksi, "UPDATE barang set
nama_barang='$nama',harga='$Harga',stok='$Stok' where id_barang=$id");
if ($update_data) {
header('location:data_barang.php?pesan=Data Berhasil Di Ubah');
} else {
echo ('ERROR' . mysqli_error($koneksi));
// header('location:data_pendaftar.php?pesan=Data Gagal Di Ubah');
}