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
</head>
<body class="bg-light">
    
    <div class="container p-4" id="coreContent">

        <div class="py-4 text-center">
            <h2 class="text-uppercase">Tugas Peserta </br>(X Partisipasi)</h2>
        </div>

        <div class="progress mb-3">
            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <div class="row">
            <div class="col">
                <form enctype='multipart/form-data' action="<?php echo route_to('api-partisipasi');?>" method="post">
                    <h5 class="font-weighted-bold">Pameran Literasi <sup class="text-danger font-weight-bold">*</sup></h5>
                    <p id="partisipasiText"></p>
                    <h6 class="text-muted">Pameran Literasi <sup class="text-danger font-weight-bold">*</sup></h6>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pameranLiterasi" id="pameranLiterasi" value="ikut">
                            <label class="form-check-label" for="pameranLiterasi">Ikut</label>
                            <input type="hidden" name="prevNik" id="prevNik" value="<?php echo $nik ?? '' ; ?>">
                            <input type="hidden" name="prevToken" id="prevToken" value="<?php echo $token ?? '' ; ?>">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pameranLiterasi" id="pameranLiterasiTidak" value="tidak">
                            <label class="form-check-label" for="pameranLiterasiTidak">Tidak Ikut</label>
                        </div><br>
                        <small class="text-danger"><?= $validation->getError('pameranLiterasi') ?></small>
                    </div>
                    <hr class="mx-2">
                    <h6 class="text-muted">Festival Literasi <sup class="text-danger font-weight-bold">*</sup></h6>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="festivalLiterasi" id="festivalLiterasi" value="ikut">
                            <label class="form-check-label" for="festivalLiterasi">Ikut</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="festivalLiterasi" id="festivalLiterasiTidak" value="tidak">
                            <label class="form-check-label" for="festivalLiterasiTidak">Tidak Ikut</label>
                        </div><br>
                        <small class="text-danger"><?= $validation->getError('festivalLiterasi') ?></small>
                    </div>
                    <hr class="mx-2">
                    <h6 class="text-muted">Kemah Sastra Literasi <sup class="text-danger font-weight-bold">*</sup></h6>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kemahLiterasi" id="kemahLiterasi" value="ikut">
                            <label class="form-check-label" for="kemahLiterasi">Ikut</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kemahLiterasi" id="kemahLiterasiTidak" value="tidak">
                            <label class="form-check-label" for="kemahLiterasiTidak">Tidak Ikut</label>
                        </div><br>
                        <small class="text-danger"><?= $validation->getError('kemahLiterasi') ?></small>
                    </div>
                    <hr class="mx-2">
                    <h6 class="text-muted">Tantangan Literasi GLN GAREULIS JABAR 2021 - 2022 <sup class="text-danger font-weight-bold">*</sup></h6>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tantanganLiterasi" id="tantanganLiterasi" value="ikut">
                            <label class="form-check-label" for="tantanganLiterasi">Ikut</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tantanganLiterasi" id="tantanganLiterasiTidak" value="tidak">
                            <label class="form-check-label" for="tantanganLiterasiTidak">Tidak Ikut</label>
                        </div><br>
                        <small class="text-danger"><?= $validation->getError('tantanganLiterasi') ?></small>
                    </div>
                    <hr class="mx-2">
                    <span>
                        <p class="font-weight-lighter"><sup class="text-danger font-weight-bold">*</sup>:harus diisi</p>
                    </span>
                    <hr class="mx-2">
                    <div class="form-group row">
                        <div class="col-12">
                        <button type="submit" id="btnPartisipasi" class="btn btn-primary btn-block">Selesai</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>

    <script type="text/javascript">

        var $ = jQuery.noConflict();

        const baseUrl = "<?php echo base_url(); ?>";
        const api_uris = "<?php echo route_to('api-count-partisipasi');?>";

        const nik = "<?php echo $nik ?? '' ;?>";
        const token = "<?php echo $token ?? '' ;?>";

        $(function(){
            countMedia();

        });

        function countMedia(){
            $.ajax({
                url: api_uris,
                method: 'POST',
                data : {
                    nik:nik,
                    token:token,
                },
                success: function(response){
                    console.log(response.data);
                    if(response.data != 0){
                        $('#partisipasiText').text('Form sudah di isi');
                        $('#btnPartisipasi').prop('disabled', true);
                        $('#partisipasiText').append('<p>Anda dapat melewati form, silahkan klik tombol <span class="btn btn-info btn-sm">Selesai</span></p>');
                        $('#coreContent').append(`<a href="${baseUrl + '/peserta/tugas/selesai'}" class="btn btn-info">Selesai</a>`);
                    }
                }
            });

        }

    </script>

</body>
</html>