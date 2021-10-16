<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLN GAREULIS - Tugas Peserta Diklat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    <?php 
        $length = 6;
        $token = bin2hex(random_bytes($length));
    ?>
    <div class="container p-4">

        <div class="py-4 text-center">
            <h1 class="text-uppercase">Selamat Datang,</br>Peserta GLN GAREULIS JABAR 2021 - 2022</h1>
        </div>

        <div class="my-4 text-center">
            <h2 class="text-muted">Simpan Token ini sebagai pengingat form</h2>
            <div class="container-fluid border border-primary py-4">
                <span id="token" class="font-weight-bold"><?php echo $token; ?></span>
            </div>
        </div>

        <div class="container">
            <a href="<?php echo route_to('biodata-peserta',$token);?>" class="btn btn-primary btn-block text-decoration-none">Lanjutkan</a>
        </div>

    </div>


</body>
</html>