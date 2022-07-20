<?php
include_once "../config/koneksi.php";
$id = $_GET['id'];
$hapus = mysqli_query($koneksi, "DELETE FROM barang WHERE id_barang='$id'");
if($hapus) {
    header('location:data_barang.php?pesan=Data Berhasil Di Hapus');
}else{
 
    header('location:data_user.php?pesan=Data Gagal Di Hapus');
}