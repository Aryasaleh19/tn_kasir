<?php include 'template/header.php'; ?>
<div class="col-md-9 mb-2">
  <div class="row">

    <!-- table barang -->
    <div class="col-md-7 mb-2">

      <?php
      error_reporting(0);
      if (isset($_POST['get'])) {
        require "config.php";
        $user = $_POST['user'];

        $telp = $_POST['telp'];
        $pass = $_POST['pass'];
        $result = mysqli_query($conn, "UPDATE pegawai SET nama='$user',password='$pass',telp='$telp'
     WHERE user='$user'");
        if (!$result) {
          echo "
        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>NOOO!</strong> data gagal di update.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>
<meta http-equiv='refresh' content='1; url= pengaturan.php'/>
        ";
        } else {
          echo "
        <div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>YESSS!</strong> data berhasil di update.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>
<meta http-equiv='refresh' content='1; url= pengaturan.php'/>
        ";
        }
      } ?>
      <?php
      $result1 = mysqli_query($conn, "SELECT * FROM pegawai");
      while ($data = mysqli_fetch_array($result1)) {
        $user = $data['user'];
        $id = $data['id_login'];
        $toko = $data['nama_toko'];
        $alamat = $data['alamat'];
        $telp = $data['telp'];
      }
      ?>
      <div class="card">
        <div class="card-header bg-dark">
          <div class="card-tittle text-white"><i class="fa fa-cog"></i> <b>Account Setting</b></div>
        </div>
        <div class="card-body">
          <form method="POST">
            <fieldset>

              <div class="form-group row">

                <label class="col-sm-4 col-form-label"><b>Telepon :</b></label>
                <div class="col-sm-8 mb-2">
                  <input type="number" name="telp" class="form-control" value="<?php echo $telp; ?>" required>
                </div>

                <label class="col-sm-4 col-form-label"><b>Username :</b></label>
                <div class="col-sm-8 mb-2">
                  <input type="text" name="user" class="form-control" value="<?php echo $user; ?>" required>
                </div>
                <label class="col-sm-4 col-form-label"><b>New Password:</b></label>
                <div class="col-sm-8 mb-2">
                  <input type="password" name="pass" class="form-control" placeholder="****" required>
                </div>
              </div>
              <div class="text-right">
                <button class="btn btn-dark" name="get" type="submit">Update</button>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
    <!-- end table barang -->

  </div><!-- end row col-md-9 -->
</div>

<?php include 'template/footer.php'; ?>