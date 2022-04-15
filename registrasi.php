<?php

require_once 'fungsi.php';

$conn = koneksi();

if (isset($_POST['submit'])) {


    if (registrasi($_POST) > 0) {

        header('location:login.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="core/css/style.css">

    <title>Note Apps</title>
</head>

<body class="d-flex">

    <main class="box m-auto">
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label"> nama</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label"> Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label"> Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary" type="submit" name="submit">Sing In</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- js -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>