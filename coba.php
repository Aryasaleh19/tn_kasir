<?php

require 'config.php';
$result = mysqli_query($conn, "SELECT * FROM cabang");
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $status = $_POST['status'];
    $cabang = $_POST['cabang'];

    mysqli_query($conn, "INSERT INTO pegawai VALUES (NULL, '$nama', '$email', '$password', '$alamat','$telp', '$status', '$cabang')");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>coba</title>
</head>

<body>
    <form action="" method="POST">
        <input type="text" name="nama" placeholder="nama">
        <input type="email" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <input type="text" name="alamat" placeholder="alamat">
        <input type="text" name="telp" placeholder="telp">
        <select name="status" id="status">
            <option value="admin">Admin</option>
            <option value="pegawai">Pegawai</option>
        </select>
        <select name="cabang" id="cabang">
            <?php foreach ($result as $row) : ?>
                <option value="<?= $row['id_cabang'] ?>"><?= $row['nama_cabang'] ?></option>
            <?php endforeach; ?>

        </select>
        <button type="submit" name="submit">simpan</button>
    </form>
</body>

</html>