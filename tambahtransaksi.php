<?php
include 'config.php';
session_start();
if (!isset($_SESSION['login'])) {
    header("location:login.php");
}
$id_cabang = $_SESSION['cabang'];

if (isset($_POST['save'])) {
    $id = $_POST['nama_barang'];
    $barang = mysqli_query($conn, "SELECT * FROM barang WHERE id = '$id'");



    foreach ($barang as $row) {

        $harga = $row['harga_barang'];
        $nama_barang = $row['nama_barang'];


        $qty = $_POST['quantity'];
        $total = $_POST['subtotal'];
        $total = intval($total);
        $qty = intval($qty);
        $st = $harga * $qty;

        $st = '' . $st;
        $tgl = $_POST['tgl_input'];

        $sql = "INSERT INTO keranjang VALUES(null, '$id_cabang', '$nama_barang','$harga','$qty','$st','$tgl', '', '', '')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            // echo json_encode(['status' => 'success']);
            header('Location: index.php');
        } else {
            echo json_encode(['status' => 'error', 'message' => mysqli_error($conn)]);
        }
    }
}
