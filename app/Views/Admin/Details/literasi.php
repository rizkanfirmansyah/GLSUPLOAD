<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLN GAREULIS - Admin Literasi</title>

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('favicons/apple-touch-icon.png');?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('favicons/favicon-32x32.png');?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('favicons/favicon-16x16.png');?>">
    <link rel="manifest" href="<?php echo base_url('favicons/site.webmanifest');?>">

    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.3/b-2.0.1/b-html5-2.0.1/b-print-2.0.1/r-2.2.9/sc-2.0.5/datatables.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.3/b-2.0.1/b-html5-2.0.1/b-print-2.0.1/r-2.2.9/sc-2.0.5/datatables.min.js"></script>

    <style>
    main > .container {
    padding: 60px 15px 0;
    }

    /* .footer {
    background-color: #f5f5f5;
    } */

    .footer > .container {
    padding-right: 15px;
    padding-left: 15px;
    }

    code {
    font-size: 80%;
    }
    </style>
</head>
<body class="d-flex flex-column h-100">
    
<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">GLN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('/admin');?>">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo route_to('detail-admin-biodata',$nik,$token);?>">Biodata</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo route_to('detail-admin-diklat',$nik,$token);?>">Diklat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo route_to('detail-admin-diklat',$nik,$token);?>">Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo route_to('detail-admin-diorama',$nik,$token);?>">Diorama </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo route_to('detail-admin-karya',$nik,$token);?>">Karya Tulis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo route_to('detail-admin-antologi',$nik,$token);?>">Video</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo route_to('detail-admin-antologi',$nik,$token);?>">Antologi</a>
                </li> 
                <li class="nav-item active">
                    <a class="nav-link" href="#">Literasi <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo route_to('detail-admin-partisipasi',$nik,$token);?>">Partisipasi</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
    <div class="container">
        <h1 class="my-5">Data Literasi <span class="badge badge-pill badge-info"><?php echo $nik;?></span></h1>

        <div class="d-flex flex-row mb-4">
            <div><a href="javascript:void(0)" class="badge badge-primary mx-4" onclick=viewDetail('biodata',<?php echo "'".$nik."'"; ?>,<?php echo "'".$token."'"; ?>)><i class="lni lni-user p-2"></i>Biodata</a></div>
            <div><a href="javascript:void(0)" class="badge badge-light badge-pill mx-4" onclick=viewDetail('diklat',<?php echo "'".$nik."'"; ?>,<?php echo "'".$token."'"; ?>)><i class="lni lni-graduation p-2"></i>Diklat</a></div>
            <div><a href="javascript:void(0)" class="badge badge-info mx-4" onclick=viewDetail('antologi',<?php echo "'".$nik."'"; ?>,<?php echo "'".$token."'"; ?>)><i class="lni lni-empty-file p-2"></i>Antologi</a></div>
            <div><a href="javascript:void(0)" class="badge badge-secondary mx-4" onclick=viewDetail('book',<?php echo "'".$nik."'"; ?>,<?php echo "'".$token."'"; ?>)><i class="lni lni-book p-2"></i>Buku</a></div>
            <div><a href="javascript:void(0)" class="badge badge-danger mx-4" onclick=viewDetail('diorama',<?php echo "'".$nik."'"; ?>,<?php echo "'".$token."'"; ?>)><i class="lni lni-bricks p-2"></i>Diorama</a></div>
            <div><a href="javascript:void(0)" class="badge badge-warning mx-4" onclick=viewDetail('karya',<?php echo "'".$nik."'"; ?>,<?php echo "'".$token."'"; ?>)><i class="lni lni-hammer p-2"></i>Karya</a></div>
            <div><a href="javascript:void(0)" class="badge badge-success mx-4" onclick=viewDetail('video',<?php echo "'".$nik."'"; ?>,<?php echo "'".$token."'"; ?>)><i class="lni lni-video p-2"></i>Video</a></div>
            <div class="disabled"><i class="lni lni-angle-double-down"></i></div>
            <div><a href="javascript:void(0)" class="badge badge-dark mx-4" onclick=viewDetail('partisipasi',<?php echo "'".$nik."'"; ?>,<?php echo "'".$token."'"; ?>)><i class="lni lni-pointer p-2"></i>Partisipasi</a></div>
        </div>

        <h3>Kota</h3>
        <table id="kotaTable" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Token</th>
                    <th>Kota</th>
                    <th>Diunggah</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            <?php foreach ($kota as $k) : ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $k->kota_token;?></td>
                    <td><?php echo $k->kota_nama;?></td>
                    <td><?php echo $k->created_at;?></td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <a href="javascript:void(0)" class="badge badge-pill badge-warning" onclick=deleteDiorama(<?php echo $k->id; ?>)>
                                <i class="lni lni-trash-can p-2"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <h3>Media</h3>
        <table id="mediaTable" class="table table-striped table-bordered table-hover table-responsive">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Token</th>
                    <th>Majalah</th>
                    <th>SS_IG</th>
                    <th>SS_FB</th>
                    <th>SS_YT</th>
                    <th>Kegiatan IG</th>
                    <th>Kegiatan FB</th>
                    <th>Kegiatan YT</th>
                    <th>Kegiatan WA</th>
                    <th>Diunggah</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            <?php foreach ($media as $m) : ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $m->media_token;?></td>
                    <td class="text-truncate">
                        <?php echo $m->media_majalah;?>
                        </br>
                        <a href="javascript:void(0)" class="badge badge-pill badge-info" onclick=viewMedia(<?php echo "'".$m->media_ids."'"; ?>,<?php echo "'".$m->media_majalah."'"; ?>)>
                            <i class="lni lni-certificate p-2"></i>
                        </a>
                    </td>
                    <td class="text-truncate">
                        <?php echo $m->media_ssig;?>
                        </br>
                        <a href="javascript:void(0)" class="badge badge-pill badge-info" onclick=viewMedia(<?php echo "'".$m->media_ids."'"; ?>,<?php echo "'".$m->media_ssig."'"; ?>)>
                            <i class="lni lni-certificate p-2"></i>
                        </a>
                    </td>
                    <td class="text-truncate">
                        <?php echo $m->media_ssfb;?>
                        </br>
                        <a href="javascript:void(0)" class="badge badge-pill badge-info" onclick=viewMedia(<?php echo "'".$m->media_ids."'"; ?>,<?php echo "'".$m->media_ssfb."'"; ?>)>
                            <i class="lni lni-certificate p-2"></i>
                        </a></td>
                    <td class="text-truncate">
                        <?php echo $m->media_ssyt;?>
                        </br>
                        <a href="javascript:void(0)" class="badge badge-pill badge-info" onclick=viewMedia(<?php echo "'".$m->media_ids."'"; ?>,<?php echo "'".$m->media_ssyt."'"; ?>)>
                            <i class="lni lni-certificate p-2"></i>
                        </a>
                    </td>
                    <td class="text-truncate">
                        <?php echo $m->media_kegiatan_ig;?>
                        </br>
                        <a href="javascript:void(0)" class="badge badge-pill badge-info" onclick=viewMedia(<?php echo "'".$m->media_ids."'"; ?>,<?php echo "'".$m->media_kegiatan_ig."'"; ?>)>
                            <i class="lni lni-certificate p-2"></i>
                        </a>
                    </td>
                    <td class="text-truncate">
                        <?php echo $m->media_kegiatan_fb;?>
                        </br>
                        <a href="javascript:void(0)" class="badge badge-pill badge-info" onclick=viewMedia(<?php echo "'".$m->media_ids."'"; ?>,<?php echo "'".$m->media_kegiatan_fb."'"; ?>)>
                            <i class="lni lni-certificate p-2"></i>
                        </a>
                    </td>
                    <td class="text-truncate">
                        <?php echo $m->media_kegiatan_yt;?>
                        </br>
                        <a href="javascript:void(0)" class="badge badge-pill badge-info" onclick=viewMedia(<?php echo "'".$m->media_ids."'"; ?>,<?php echo "'".$m->media_kegiatan_yt."'"; ?>)>
                            <i class="lni lni-certificate p-2"></i>
                        </a>
                    </td>
                    <td class="text-truncate">
                        <?php echo $m->media_kegiatan_wa;?>
                        </br>
                        <a href="javascript:void(0)" class="badge badge-pill badge-info" onclick=viewMedia(<?php echo "'".$m->media_ids."'"; ?>,<?php echo "'".$m->media_kegiatan_wa."'"; ?>)>
                            <i class="lni lni-certificate p-2"></i>
                        </a>
                    </td>
                    <td><?php echo $m->created_at;?></td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <a href="javascript:void(0)" class="badge badge-pill badge-warning" onclick=deleteKarya(<?php echo $m->id; ?>)>
                                <i class="lni lni-trash-can p-2"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <h3>Assestment</h3>
        <table id="kotaTable" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Token</th>
                    <th>Jenis</th>
                    <th>Analisa</th>
                    <th>Diunggah</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            <?php foreach ($assestment as $a) : ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $a->assestment_token;?></td>
                    <td><?php echo $a->assestment_jenis;?></td>
                    <td><?php echo $a->assestment_analisa;?></td>
                    <td><?php echo $a->created_at;?></td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <a href="javascript:void(0)" class="badge badge-pill badge-warning" onclick=deleteDiorama(<?php echo $a->id; ?>)>
                                <i class="lni lni-trash-can p-2"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>


    </div>
</main>

<footer class="footer mt-auto py-3">
    <div class="container">
        <span class="text-muted">Dian Global Tech &copy; 2021</span>
    </div>
</footer>

    <script type="text/javascript">

        var $ = jQuery.noConflict();

        var baseUrl = "<?php echo base_url(); ?>";

        function viewKota(nik,file){
            var tabs = window.open(baseUrl + '/kota/' + nik + '/'+ file, '_blank');
            (tabs) ? tabs.focus() : alert('tolong ijinkan popup') ;
        }

        function viewDetail(category, nik, token){
            // alert(category + nik + token);
            var tabs = window.open(baseUrl + '/admin/pages/detail/'+category+'/' + nik + '/' + token);
            (tabs) ? tabs.focus() : alert('tolong ijinkan popup') ;
        }

    </script>

</body>
</html>