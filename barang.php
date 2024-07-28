<?php

include 'template/header.php';
if (!isset($_SESSION['login'])) {
    header("Location:login.php");
}
$status = $_SESSION['status'];
if ($status == 'admin') {
    if (!empty($_POST['add_barang'])) {



        $nama = $_POST['nama_barang'];
        $harga = $_POST['harga_barang'];
        $tgl = $_POST['tgl_input'];

        mysqli_query($conn, "insert into barang values(NULL, '$nama','$harga','$tgl')");
        echo "<script>alert ('berhasil menambah barang'); window.location='barang.php';</script>";
    }
}

$query = mysqli_query($conn, "SELECT max(id) as kodeTerbesar FROM barang");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kodeTerbesar'];
$urutan = (int) substr($kodeBarang, 3, 3);
$urutan++;
$huruf = "BRG";
$kodeBarang = $huruf . sprintf("%03s", $urutan);
?>

<div class="col-md-9 mb-2">
    <div class="row">

        <!-- barang -->
        <div class="col-md-12 mb-3">
            <?php if (isset($_SESSION['fail'])) : ?>
                <div class="alert alert-danger mr-5 ml-5 radius" role="alert">
                    anda bukan pegawai
                </div>
                <?php unset($_SESSION['fail']); ?>
            <?php endif; ?>

            <div class="card" <?php if ($status != 'admin') {
                                    echo "hidden";
                                } ?>>
                <div class="card-header bg-dark">
                    <div class="card-tittle text-white"><i class="fa-solid fa-mug-saucer fs-3"></i> <b>Tambah Barang</b></div>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-row">
                            <!-- <div class="form-group col-md-6">
                                <label><b>Kode Barang</b></label>
                                <input type="text" name="id_barang" class="form-control" value="<?php echo $kodeBarang; ?>" readonly>
                            </div> -->
                            <div class="form-group col-md-6">
                                <label><b>Nama Barang</b></label>
                                <input type="text" name="nama_barang" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label><b>Harga Barang</b></label>
                                <input type="number" name="harga_barang" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label><b>Tanggal Input</b></label>
                                <div class="input-group">
                                    <input type="text" name="tgl_input" class="form-control" value="<?php echo  date("j F Y, G:i"); ?>" readonly>
                                    <div class="input-group-append">
                                        <button name="add_barang" value="simpan" class="btn btn-dark" type="submit">
                                            <i class="fa fa-plus mr-2"></i>Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end barang -->


        <!-- table barang -->
        <div class="col-md-12 mb-2">
            <div class="card">
                <div class="card-header bg-dark">
                    <div class="card-tittle text-white"><i class="fa fa-table"></i> <b>Data Barang</b></div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-sm dt-responsive nowrap" id="table_barang" width="100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>

                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Tanggal Input</th>
                                <th <?php if ($status == 'pegawai') {
                                        echo 'hidden';
                                    } ?>>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $data_barang = mysqli_query($conn, "select * from barang");
                            while ($d = mysqli_fetch_array($data_barang)) {
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d['nama_barang']; ?></td>
                                    <td><?php echo $d['harga_barang']; ?></td>
                                    <td><?php echo $d['tgl_input']; ?></td>
                                    <td <?php if ($status == 'pegawai') {
                                            echo 'hidden';
                                        } ?>>
                                        <a class="btn btn-primary btn-xs" href="edit.php?id=<?php echo $d['id']; ?>">
                                            <i class="fa fa-pen fa-xs"></i> Edit</a>
                                        <a class="btn btn-danger btn-xs" href="?id=<?php echo $d['id']; ?>" onclick="javascript:return confirm('Hapus Data Barang ?');">
                                            <i class="fa fa-trash fa-xs"></i> Hapus</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end table barang -->

    </div><!-- end row col-md-9 -->
</div>
<?php
include 'config.php';
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $hapus_data = mysqli_query($conn, "DELETE FROM barang WHERE id ='$id'");
    echo '<script>window.location="barang.php"</script>';
}

?>
<?php include 'template/footer.php'; ?>