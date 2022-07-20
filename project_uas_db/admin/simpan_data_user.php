<?php
session_start();
if ($_SESSION['status'] != "sudah_login") {
//melakukan pengalihan
header("location:../login/login.php");
}
include "../config/koneksi.php";
$nama = $_POST['nama_user'];
$user = $_POST['username'];
$pass = $_POST['password'];
$insert_data = mysqli_query($koneksi, "INSERT INTO user
(nama_user,username,password) values('$nama','$user','$pass')");
if ($insert_data) {
header('location:data_user.php?pesan=Data Berasil Di simpan');
} else {
// header('location:data_jns_ekskul.php?pesan=Data Gagal Di simpan');
echo ('ERROR' . mysqli_error($koneksi));
}