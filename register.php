<?php
require 'config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="codingcenter.jpg">
    <link rel="icon" href="icon.ico" type="image/ico">
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-dark">

    <div class="container">
        <br><br><br><br><br><br>

        <div class="row justify-content-center">

            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-body">
                        <h1 class="h4 text-center mb-4"><b>Registrasi</b></h1>
                        <?php if (isset($error)) : ?>
                            <div class="alert alert-danger mr-5 ml-5 radius" role="alert">
                                Email / Password salah
                            </div>
                        <?php endif; ?>
                        <form action="" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" name="pass" placeholder="Password">
                            </div>
                            <button class="btn btn-dark form-control-user btn-block" name="login" type="submit">Login</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>


    </div> <!-- end container fluid -->

    <script src="assets/js/jquery.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 1000);
    </script>
</body>

</html>