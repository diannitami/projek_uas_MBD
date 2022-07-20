<?php
include_once "../config/koneksi.php";
$id = $_GET['id'];
$hapus = mysqli_query($koneksi, "DELETE FROM unit_rumah WHERE id_unit='$id'");
if($hapus) {
    header('location:data_rumah.php?pesan=Data Berhasil Di Hapus');
}else{
 
    header('location:data_rumah.php?pesan=Data Gagal Di Hapus');
}