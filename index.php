<?php
include 'template/header.php';
include "config.php";

$barang = mysqli_query($conn, "SELECT * FROM barang");
$id_user = $_SESSION['id'];

$status = $_SESSION['status'];
$alamat = $_SESSION['alamat'];
$cabang = $_SESSION['cabang'];
$user = $_SESSION['nama'];

if ($status != 'pegawai') {

    $fail = $_SESSION['fail'] = true;
    echo "<script>window.location='barang.php';</script>";
}
if (mysqli_num_rows($barang) > 0) {
    // Ambil semua data hasil query
    $brg = [];
    while ($row = mysqli_fetch_assoc($barang)) {
        $brg[] = $row;
    }
} else {
    $brg = [];
}

?>
<div class="col-md-9 mb-2">
    <div class="row">

        <!-- kasir -->
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body py-4">
                    <form id="formBarang" action="tambahtransaksi.php" method="POST">

                        <div class="form-group row mb-0">
                            <label class="col-sm-4 col-form-label col-form-label-sm"><b>Tgl. Transaksi</b></label>
                            <div class="col-sm-8 mb-2">
                                <input type="text" class="form-control form-control-sm" name="tgl_input" value="<?php echo  date("j F Y"); ?>" readonly>
                            </div>
                            <label class="col-sm-4 col-form-label col-form-label-sm"><b>Nama Barang</b></label>
                            <div class="col-sm-8 mb-2">
                                <select class="form-select w-100" name="nama_barang" id="nama_barang">
                                    <?php foreach ($brg as $row) : ?>
                                        <option value="<?= $row['id'] ?>" data-harga="<?= $row['harga_barang'] ?>">
                                            <?= $row['nama_barang'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <label class="col-sm-4 col-form-label col-form-label-sm"><b>Quantity</b></label>
                            <div class="col-sm-8 mb-2">
                                <input type="number" class="form-control form-control-sm" id="quantity" oninput="hitungSubtotal()" name="quantity" placeholder="0" required>
                            </div>

                            <label class="col-sm-4 col-form-label col-form-label-sm"><b>Sub-Total</b></label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm" id="subtotal" name="subtotal" readonly>
                                    <div class="input-group-append">
                                        <button class="btn btn-dark btn-sm" name="save" value="simpan" type="submit">
                                            <i class="fa fa-plus mr-2"></i>Tambah
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>


                    <?php
                    // if (isset($_POST['save'])) {
                    // $idb = $_POST['kode_barang'];
                    // $nama = $_POST['nama_barang'];
                    // $harga = $_POST['harga_barang'];
                    // $qty = $_POST['quantity'];
                    // $total = $_POST['subtotal'];
                    // $tgl = $_POST['tgl_input'];

                    // $sql = "INSERT INTO keranjang (kode_barang, nama_barang, harga_barang, quantity, subtotal, tgl_input)
                    // VALUES('$idb','$nama','$harga','$qty','$total','$tgl')";
                    // $query = mysqli_query($conn, $sql);

                    // echo "<script>window.location='index.php'</script>";
                    // }
                    ?>
                    <hr>
                    <?php

                    function format_ribuan($nilai)
                    {
                        return number_format($nilai, 0, ',', '.');
                    }
                    $tgl = date("jmYGi");

                    $huruf = "TN";
                    $kodeCart = $huruf . $tgl;
                    ?>
                    <?php
                    include "config.php";
                    $query = mysqli_query($conn, "SELECT * FROM keranjang");
                    $total = 0;
                    $tot_bayar = 0;
                    $no = 1;
                    while ($r = $query->fetch_assoc()) {
                        $total = $r['harga_barang'] * $r['quantity'];


                        $tot_bayar += $total;
                        $bayar = $r['bayar'];
                    }
                    error_reporting(0);
                    ?>
                    <form action="" method="POST">
                        <div class="form-group row mb-0">
                            <input type="hidden" class="form-control" name="no_transaksi" value="<?php echo $kodeCart; ?>" readonly>
                            <input type="hidden" class="form-control" value="<?php echo $tot_bayar; ?>" id="hargatotal" readonly>
                            <label class="col-sm-4 col-form-label col-form-label-sm"><b>Bayar</b></label>
                            <div class="col-sm-8 mb-2">
                                <input type="number" class="form-control form-control-sm" value="<?= $kembalian ?>" name="bayar" id="bayarnya" onchange="">
                            </div>
                            <label class="col-sm-4 col-form-label col-form-label-sm"><b>Kembali</b></label>
                            <div class="col-sm-8 mb-2">
                                <input type="number" class="form-control form-control-sm" name="kembalian" id="total1" readonly>
                            </div>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-dark btn-sm" name="save1" value="simpan" type="submit">
                                <i class="fa fa-shopping-cart mr-2"></i>Bayar</button>
                        </div>
                    </form>

                    <?php
                    if (isset($_POST['save1'])) {
                        $notrans = $_POST['no_transaksi'];
                        $kmbalian = mysqli_query($conn, "SELECT * FROM keranjang");
                        $st = 0;
                        while ($row = mysqli_fetch_assoc($kmbalian)) {
                            $st += $row['subtotal'];
                        }

                        $bayar = $_POST['bayar'];
                        $kembalian = intval($bayar) - $st;

                        $sql = "UPDATE keranjang SET no_transaksi='$notrans',bayar='$bayar',kembalian='$kembalian' ";
                        $query = mysqli_query($conn, $sql);
                        header('Location: index.php');
                    } ?>
                </div>
            </div>
        </div>
        <!-- end kasir -->

        <!-- tes -->
        <div class="col-md-6 mb-3" style="font-family: 'Nunito', sans-serif;">
            <div class="card" id="print">
                <div class="card-header bg-white border-0 pb-0 pt-4">
                    <h5 class='card-tittle mb-0 text-center' style="font-family: 'Nunito', sans-serif;"><b>TAMPA NONGKRONG</b></h5>
                    <p class='m-0 small text-center' style="font-family: 'Nunito', sans-serif;"><?= $alamat; ?></p>
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM pegawai WHERE id = '$id_user'");
                    $noTelp = mysqli_fetch_assoc($query)['no_telp'];


                    ?>

                    <p class='small text-center'>Telp. <?= $noTelp; ?></p>
                    <div class="row">
                        <div class="col-8 col-sm-9 pr-0">
                            <ul class="pl-0 small" style="list-style: none;text-transform: uppercase;">
                                <li>NOTA : <?php
                                            $notrans = mysqli_query($conn, "SELECT * FROM keranjang ORDER BY no_transaksi ASC LIMIT 1");
                                            while ($dat2 = mysqli_fetch_array($notrans)) {
                                                $notransaksi = $dat2['no_transaksi'];
                                                echo "$notransaksi";
                                            }
                                            ?></li>
                                <li>KASIR : <?php echo $user ?></li>
                            </ul>
                        </div>
                        <div class="col-4 col-sm-3 pl-0">
                            <ul class="pl-0 small" style="list-style: none;">
                                <li>TGL : <?php echo  date("j-m-Y"); ?></li>
                                <li>JAM : <?php echo  date("G:i:s"); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body small pt-0">
                    <hr class="mt-0">
                    <div class="row">
                        <div class="col-5 pr-0">
                            <span><b>Nama Barang</b></span>
                        </div>
                        <div class="col-1 px-0 text-center">
                            <span><b>Qty</b></span>
                        </div>
                        <div class="col-3 px-0 text-right">
                            <span><b>Harga</b></span>
                        </div>
                        <div class="col-3 pl-0 text-right">
                            <span><b>Subtotal</b></span>
                        </div>
                        <div class="col-12">
                            <hr class="mt-2">
                        </div>
                        <?php $brg = mysqli_query($conn, "SELECT * FROM keranjang WHERE id_cabang = '$id_user'"); ?>
                        <?php foreach ($brg as $row) : ?>
                            <div class="col-5 pr-0">
                                <a href="hapus.php?id=<?php echo $row['id_cart']; ?>" onclick="javascript:return confirm('Hapus Data Barang ?');" style="text-decoration:none;">
                                    <i class="fa fa-times fa-xs text-danger mr-1"></i>
                                    <span class="text-dark"><?php echo $row['nama_barang']; ?></span>
                                </a>
                            </div>
                            <div class="col-1 px-0 text-center">
                                <span><?php echo $row['quantity']; ?></span>
                            </div>
                            <div class="col-3 px-0 text-right">
                                <span><?= $row['harga_barang']; ?></span>

                            </div>
                            <div class="col-3 pl-0 text-right">
                                <span><?= $row['subtotal']; ?></span>
                            </div>
                        <?php endforeach; ?>
                        <div class="col-12">
                            <hr class="mt-2">
                            <ul class="list-group border-0">
                                <li class="list-group-item p-0 border-0 d-flex justify-content-between align-items-center">
                                    <b>Total</b>
                                    <span><b><?= format_ribuan($tot_bayar); ?></b></span>
                                </li>
                                <li class="list-group-item p-0 border-0 d-flex justify-content-between align-items-center">
                                    <b>Bayar</b>
                                    <span><b><?= format_ribuan($bayar); ?></b></span>
                                </li>

                                <li class="list-group-item p-0 border-0 d-flex justify-content-between align-items-center">
                                    <b>Kembalian</b>
                                    <span><b><?= format_ribuan($kembalian); ?></b></span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-12 mt-3 text-center">
                            <p>* TERIMA KASIH TELAH BERBELANJA*</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-right mt-3">
                <form action="tambahlaporan.php" method="POST">
                    <button class="btn btn-dark-light btn-sm mr-2" onclick="printContent('print')"><i class="fa fa-print mr-1"></i> Print</button>
                    <button class="btn btn-dark btn-sm" name="selesai" type="submit"><i class="fa fa-check mr-1"></i> Selesai</button>
                </form>
            </div>

        </div>
        <!-- end tes -->

        <?php
        include 'config.php';
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $hapus_data = mysqli_query($conn, "DELETE FROM keranjang WHERE id_cart ='$id'");
            echo header('index.php');
        }

        ?>
    </div><!-- end row col-md-9 -->
</div>
<script>
    // <script>
    function hitungSubtotal() {
        var select = document.getElementById('nama_barang');
        var selectedOption = select.options[select.selectedIndex];
        var harga_barang = parseFloat(selectedOption.getAttribute('data-harga'));
        var quantity = parseInt(document.getElementById('quantity').value);

        var subtotal = harga_barang * quantity;

        if (!isNaN(subtotal)) {
            document.getElementById('subtotal').value = subtotal;
        }
        document.getElementById('subtotal').value = subtotal;

    }

    function kembalian_barang() {
        var bayar = parseInt(document.getElementById('bayar').value);
        var total = parseInt(document.getElementById('total').value);
        var kembalian = bayar - total;
        if (!isNaN(kembalian)) {
            document.getElementById('kembalian').value = kembalian;

        }

    }
    document.getElementById('formBarang').addEventListener('submit', function(event) {
        // Menjalankan hitungSubtotal() untuk menghitung sub-total sebelum submit
        hitungSubtotal();

        // Reset sub-total setelah submit
        resetSubtotal();
    });
    window.onload = function() {
        resetSubtotal();
    };


    // 

    // function changeValue(kode_barang) {
    // document.getElementById('harga_barang').value = harga_barang[kode_barang].harga_barang;
    // document.getElementById('nama_barang').value = nama_barang[kode_barang].nama_barang;
    // total();
    // }

    // function total() {
    // var harga_barang = document.getElementById('harga_barang').value;
    // var quantity = document.getElementById('quantity').value;
    // var subtotal = parseInt(harga_barang) * parseInt(quantity);
    // if (!isNaN(subtotal)) {
    // document.getElementById('subtotal').value = subtotal;
    // }
    // }
    function printContent(print) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(print).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>
<?php include 'template/footer.php'; ?>