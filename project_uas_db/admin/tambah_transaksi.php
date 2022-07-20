<?php
session_start();
if ($_SESSION['status'] != "sudah_login") {
//melakukan pengalihan
header("location:../login/login.php");
}
include "../layout/header.php";
include "../config/koneksi.php";
$query_1 = mysqli_query($koneksi, "SELECT * from barang");
$query_2 = mysqli_query($koneksi, "SELECT * from user");
$query_3 = mysqli_query($koneksi, "SELECT * from unit_rumah");
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

        <h1 class="h2">Form Data Transaksi</h1>
    </div>
    <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380">
    </canvas> -->
    <!-- <h4>Data Jadwal Kegiatan</h4> -->
    <div class="table-responsive">
        <form action="simpan_data_transaksi.php" method="POST">
            <div class="col-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Jenis Barang</label>
                        <select name="id_barang" class="form-control" id="">
                        <option value=""> Pilih Jensi Barang</option>
                        <?php
                        while ($rs_1 = mysqli_fetch_assoc($query_1)) : ?>
                        ?>
                        <option value="<?= $rs_1['id_barang']; ?>"> <?= $rs_1['nama_barang']; ?></option>
                        <?php endwhile; ?>
                        </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Nama User</label>
                        <select name="id" class="form-control" id="">
                            <option value=""> Pilih User</option>
                            <?php
                            while ($rs_2 = mysqli_fetch_assoc($query_2)) : ?>
                            ?>
                            <option value="<?= $rs_2['id']; ?>"> <?= $rs_2['nama_user']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Unit Rumah</label>
                        <select name="id_unit" class="form-control" id="">
                            <option value=""> Pilih Unit Rumah</option>
                            <?php
                            while ($rs_3 = mysqli_fetch_assoc($query_3)) : ?>
                            ?>
                            <option value="<?= $rs_3['id_unit']; ?>"> <?= $rs_3['no_rumah']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                        <input type="text" name="alamt" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Nik</label>
                        <input type="text" name="nik" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">telpon</label>
                        <input type="text" name="tlpn" class="form-control">
                    </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</main>
<?php
include "../layout/footer.php";
?>