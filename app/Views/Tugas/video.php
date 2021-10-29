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
            <h2 class="text-uppercase">Tugas Peserta </br>(V Video)</h2>
        </div>

        <div class="progress mb-3">
            <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <div class="row">
            <div class="col">

                <form enctype='multipart/form-data' action="<?php echo route_to('api-video'); ?>" method="post">
                    <h5 class="font-weight-bold">Membuat Video</h5>
                    <p id="videoText">
                        <span id="textKegiatan">Link Kegiatan belum di unggah</span>
                        <span id="textCerita">Link Cerita belum di unggah</span>
                    </p>
                    <div class="form-row">
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label for="linkKegiatan">Link Kegiatan </label>
                            <input type="text" name="linkKegiatan" id="linkKegiatan" class="form-control" placeholder="Masukan link kegiatan">
                            <snall class="text-danger"><?= $validation->getError('linkKegiatan') ?></snall>
                            <input type="hidden" name="prevNik" id="prevNik" value="<?php echo $nik ?? ''; ?>">
                            <input type="hidden" name="prevToken" id="prevToken" value="<?php echo $token ?? ''; ?>">
                        </div>
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label for="linkCerita">Link Cerita </label>
                            <input type="text" name="linkCerita" id="linkCerita" class="form-control" placeholder="Masukan link cerita">
                            <snall class="text-danger"><?= $validation->getError('linkCerita') ?></snall>
                        </div>
                    </div>
                    <hr class="mx-2">
                    <div class="form-group row">
                        <div class="col-12" id="colBtn">
                        <button type="submit" id="btnVideo" class="btn btn-primary btn-block">Selanjutnya</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>

    <script type="text/javascript">
    
        var $ = jQuery.noConflict();

        const baseUrl = "<?php echo base_url(); ?>";
        const api_uris = "<?php echo route_to('api-count-video');?>";

        const nik = "<?php echo $nik ?? '' ;?>";
        const token = "<?php echo $token ?? '' ;?>";

        $(function() {
            countVideo();
        });

        function countVideo(){
            $.ajax({
                url: api_uris,
                method: 'POST',
                data : {
                    nik:nik,
                    token:token,
                },
                success: function(response){
                    console.log(response.data);
                    if(response.data.length != 0){
                        if(response.data[0].video_link_kegiatan != ''){
                            // $('#linkKegiatan').prop('disabled', true);
                            $('#textKegiatan').text('link kegiatan sudah di unggah, ');
                            $('#linkKegiatan').val(response.data[0].video_link_kegiatan);
                        }
                        if(response.data[0].video_link_cerita != ''){
                            // $('#linkCerita').prop('disabled', true);
                            $('#textCerita').text('link cerita sudah di unggah, ');
                            $('#linkCerita').val(response.data[0].video_link_cerita);
                        }
                        if((response.data[0].video_link_cerita != '') || (response.data[0].video_link_kegiatan != '')){
                            // $('#btnVideo').prop('disabled', true);
                            $('#videoText').append('<p>Anda dapat melewati form, silahkan klik tombol <span class="btn btn-info btn-sm">Lewati</span></p>');
                            // $('#coreContent').append(`<a href="${baseUrl + '/peserta/tugas/antologi/'+nik+'/'+token}" class="btn btn-info">Lewati</a>`);
                            $('#colBtn').empty();
                            $('#colBtn').append(`<input type="hidden" name="update" value="1">`);
                            $('#colBtn').append(`<input type="hidden" name="prevId" value="${response.data[0].id}">`);
                            $('#colBtn').append(`<button type="submit" id="btnVideoUpdate" class="btn btn-secondary btn-block">Perbarui</button>`);
                            $('#coreContent').append(`<a href="${baseUrl + '/peserta/tugas/antologi/'+nik+'/'+token}" class="btn btn-info">Lewati</a>`);
                        }
                    }
                }
            });

        }

    </script>

</body>
</html>