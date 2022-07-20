<?php
// session_start();
if ($_SESSION['status'] != "sudah_login") {
//melakukan pengalihan
header("location:../login/login.php");
}
include "../config/koneksi.php";
error_reporting();
$id = $_POST['id_lokasi'];
$nama = $_POST['alamat'];
// $petugas = $_SESSION['id_petugas'];
$update_data = mysqli_query($koneksi, "UPDATE location set
alamat='$nama' where id_lokasi=$id");
if ($update_data) {
header('location:data_lokasi.php?pesan=Data Berhasil Di Ubah');
} else {
echo ('ERROR' . mysqli_error($koneksi));
// header('location:data_pendaftar.php?pesan=Data Gagal Di Ubah');
}