<?php
include 'config.php';
session_start();
if (!isset($_SESSION['login'])) {
    header("Location:login.php");
}

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM keranjang");


$delete = mysqli_query($conn, "DELETE FROM keranjang WHERE id_cart = '$id'");
if ($delete) {

    echo '<script>window.location="index.php"</script>';
}
