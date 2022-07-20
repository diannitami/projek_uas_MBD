<?php
session_start();
if ($_SESSION['status'] != "sudah_login") {
//melakukan pengalihan
header("location:../login/login.php");
}
include "../config/koneksi.php";
$idbarang = $_POST['id_barang'];
$id_user = $_POST['id'];
$Unit = $_POST['id_unit'];
$Nama = $_POST['nama'];
$Nik = $_POST['nik'];
$alamat = $_POST['alamt'];
$Tlp = $_POST['tlpn'];
$insert_data = mysqli_query($koneksi, "INSERT INTO tbl_transaksi
(id_barang,id,id_unit,nama,nik,alamt,tlpn)
Values('$idbarang','$id_user','$Unit','$Nama','$Nik','$alamat','$Tlp')");
if ($insert_data) {
header('location:data_transaksi.php?pesan=Data Berasil Di simpan');
} else {
// header('location:data_ekskul.php?pesan=Data Gagal Di simpan');
echo ("ERROR" . mysqli_error($koneksi));
}