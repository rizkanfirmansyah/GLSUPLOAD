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
            /* max-width: 100%; */
            /* height: auto; */
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
            <img src="<?= base_url();?>/logo.png" alt="logo" style="width:20rem; height:20rem;" class="logoGls">
            <h3 class="text-uppercase py-4">Selamat Datang,</br>Peserta GLN GAREULIS JAWA BARAT</br>2021 - 2022</h3>
        </div>

        <div class="text-center">
            <h2 class="text-muted text-capitalize">Simpan Token ini</br> Untuk melanjutkan pengisian data</h2>
            <div class="container py-4">
                <span id="token" class=" border border-success font-weight-bold p-3 rounded-pill"><?php echo $token; ?></span>
            </div>
        </div>

        <div class="container p-4">
            <a href="<?php echo route_to('biodata-peserta',$token);?>" class="btn btn-primary btn-block text-decoration-none">Isi Form Biodata</a>
        </div>

        <div class="text-center">
            <h3 class="text-muted text-center">Cek Kelengkapan Data</h3>
        </div>
        
        <div class="container p-4">
            <a href="<?php echo route_to('kelengkapan');?>" class="btn btn-secondary btn-block text-decoration-none">Cek Data</a>
        </div>

    </div>

    <script type="text/javascript">
        var $ = jQuery.noConflict();

        // $(function(){
            
            // $(window).bind('beforeunload', function(){
            //     return 'Are you sure you want to leave?';
            // });

        // });

    </script>

</body>
</html>