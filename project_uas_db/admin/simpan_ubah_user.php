<?php
session_start();
if ($_SESSION['status'] != "sudah_login") {
//melakukan pengalihan
header("location:../login/login.php");
}
include "../config/koneksi.php";
error_reporting();
$id = $_POST['id_user'];
$nama = $_POST['nama_user'];
$user = $_POST['username'];
$pass = $_POST['password'];
// $petugas = $_SESSION['id_petugas'];
$update_data = mysqli_query($koneksi, "UPDATE user set
nama_user='$nama',username='$user',password='$pass' where id_user=$id");
if ($update_data) {
header('location:data_user.php?pesan=Data Berhasil Di Ubah');
} else {
echo ('ERROR' . mysqli_error($koneksi));
// header('location:data_pendaftar.php?pesan=Data Gagal Di Ubah');
}