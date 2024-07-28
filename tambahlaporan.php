<?php
include 'config.php';
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
}
$id_cabang = $_SESSION['id'];

if (isset($_POST['selesai'])) {
    $ambildata = mysqli_query($conn, "INSERT INTO laporanku (no_transaksi,bayar,kembalian,id_Cart, nama_barang, harga_barang, quantity, subtotal, tgl_input, id_cabang)
                SELECT no_transaksi,bayar,kembalian,id_Cart, nama_barang, harga_barang, quantity, subtotal, tgl_input, id_cabang
                FROM keranjang ");
    $hapusdata = mysqli_query($conn, "DELETE FROM keranjang");
    echo '<script>window.location="index.php"</script>';
}
