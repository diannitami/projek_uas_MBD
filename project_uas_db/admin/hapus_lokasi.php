<?php
include_once "../config/koneksi.php";
$id = $_GET['id'];
$hapus = mysqli_query($koneksi, "DELETE FROM location WHERE id_lokasi='$id'");
if($hapus) {
    header('location:data_lokasi.php?pesan=Data Berhasil Di Hapus');
}else{
 
    header('location:data_lokasi.php?pesan=Data Gagal Di Hapus');
}