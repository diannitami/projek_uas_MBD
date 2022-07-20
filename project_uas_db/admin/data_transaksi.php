<?php
session_start();
if ($_SESSION['status'] != "sudah_login") {
//melakukan pengalihan
header("location:../login/login.php");
}
include "../layout/header.php";
include "../config/koneksi.php";
$sql = mysqli_query($koneksi, "SELECT barang.nama_barang,user.nama_user,unit_rumah.no_rumah,tbl_transaksi.* FROM tbl_transaksi 
INNER JOIN barang ON barang.id_barang=tbl_transaksi.id_barang INNER JOIN user ON user.id=tbl_transaksi.id 
LEFT JOIN unit_rumah ON unit_rumah.id_unit=tbl_transaksi.id_unit GROUP BY tbl_transaksi.id_unit");
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Order</h1>
    </div>
    <?php if (isset($_GET['pesan'])) : ?>
    <div class="alert alert-success" role="alert">
        <?php echo $_GET['pesan']; ?>
    </div>
    <?php endif; ?>
    <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380">
    </canvas> -->
    <!-- <h4>Data Jadwal Kegiatan</h4> -->
    <a href="tambah_transaksi.php" class="btn btn-sm btn-primary">Tambah Order</button></a>
    <br> <br>
    <div class="table-responsive">
        <table class="table table-striped table-bordered display nowrap"id="example" style="width:100%">
            <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Nama User</th>
                    <th scope="col">No Rumah</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">nik</th>
                    <th scope="col">telpon</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($rs = mysqli_fetch_assoc($sql)) : ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $rs['nama_barang']; ?></td>
                    <td><?= $rs['nama_user']; ?></td>
                    <td><?= $rs['no_rumah']; ?></td>
                    <td><?= $rs['nama']; ?></td>
                    <td><?= $rs['alamt']; ?></td>
                    <td><?= $rs['nik']; ?></td>
                    <td><?= $rs['tlpn']; ?></td>
                    <td>
                        <a href="frm_order.php?id=<?= $rs['id_order']; ?>" class="btn btn-success btn-sm">Order</a>
                        <a href="ubah_data_order.php?id=<?= $rs['id_order']; ?>"class="btn btn-info btn-sm">Ubah</a>
                        <a href="hapus_data_order.php?id=<?= $rs['id_order']; ?>"" class=" btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
                <?php
                $no++;
                endwhile;
                ?>
            </tbody>
        </table>
    </div>
</main>
<?php
include "../layout/footer.php";
?>