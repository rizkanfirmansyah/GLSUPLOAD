<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLN GAREULIS - Tugas Peserta Diklat</title>

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('favicons/apple-touch-icon.png');?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('favicons/favicon-32x32.png');?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('favicons/favicon-16x16.png');?>">
    <link rel="manifest" href="<?php echo base_url('favicons/site.webmanifest');?>">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .logoGls {
            display : block;
            max-width: 100%;
            height: auto;
            margin-left: auto;
            margin-right: auto;
        }
    </style>

</head>
<body class="bg-light">
    <?php 
        $length = 6;
        $token = bin2hex(random_bytes($length));
    ?>
    <div class="container p-4">

        <div class="text-center">
            <img src="/logo.png" alt="logo" style="width:20rem; height:20rem;" class="logoGls">
            <h2 class="text-uppercase">Selamat Datang,</br>Peserta GLN GAREULIS JABAR 2021 - 2022</h2>
        </div>

        <div class="text-center">
            <h2 class="text-muted">Simpan Token ini sebagai pengingat form</h2>
            <div class="container border border-success py-4">
                <span id="token" class="font-weight-bold"><?php echo $token; ?></span>
                <!-- <button type="button" id="btnCopy" class="btn btn-secondary mx-4" onclick="copyText('#token')">Copy</button> -->
            </div>
        </div>

        <div class="mt-2 container">
            <a href="<?php echo route_to('biodata-peserta',$token);?>" class="btn btn-primary btn-block text-decoration-none">Lanjutkan</a>
        </div>

    </div>

    <script type="text/javascript">
    var $ = jQuery.noConflict();

    // function copyText(element){
    //     var elementText = $(`${element}`);
    //     elementText.select();
    //     document.execCommand("copy");
    //     alert('Token Berhasil dicopy');
    // }

    </script>

</body>
</html>