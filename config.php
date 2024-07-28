<?php
ini_set('display_errors', 1);
$host = "localhost";
$username = "root";
$password = "";
$dbname = "tb_tn";

$conn = mysqli_connect($host, $username, $password, $dbname);

$query = mysqli_query($conn, "SELECT * FROM barang");

$data = mysqli_fetch_assoc($query);
if ($data) {
    echo json_encode(
        array(
            'response' => true,
            'payload' => array(
                'id' => $data['id'],
                'nama_barang' => $data['nama_barang'],
            )
        ),
    );
} else {
    echo json_encode(
        array(
            'response' => false,
            'payload' => null
        ),
    );
}

date_default_timezone_set('Asia/Makassar');
