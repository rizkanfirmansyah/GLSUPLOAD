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
            <h2 class="text-uppercase">Tugas Peserta </br>(IX Literasi Assestment)</h2>
        </div>

        <div class="progress mb-3">
            <div class="progress-bar bg-success" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <div class="row">
            <div class="col">

                <form enctype='multipart/form-data' action="<?php echo route_to('api-literasi-assestment');?>" method="post">
                    <h5 class="font-weight-bold">Assestment Literasi (Peran Serta)</h5>
                    <p id="mediaText"></p>
                    <input type="hidden" name="prevNik" id="prevNik" value="<?php echo $nik ?? ''; ?>">
                    <input type="hidden" name="prevToken" id="prevToken" value="<?php echo $token ?? ''; ?>">
                    <div class="form-group">
                        <label for="analisaLiterasi">Personal</label>
                        <select name="analisaLiterasi" id="analisaLiterasi" class="form-control">
                            <option readonly disabled selected>Pilih analisa literasi</option>
                            <option value="1" >Peserta Perorangan</option>
                            <option value="2" >Peserta GLK</option>
                            <option value="3" >Peserta GLM</option>
                            <option value="4" >Peserta GLS</option>
                        </select>
                        <small class="text-danger"><?= $validation->getError('analisaLiterasi') ?></small>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-4 col-md-4 col-sm-12">
                            <label for="minatBaca">Minat Baca</label>
                            <!-- <select name="minatBaca" id="minatBaca" class="form-control">
                                <option value="1" selected>Personal</option>
                            </select> -->
                            <input type="number" name="minatBaca" id="minatBaca" class="form-control" min="0" value="0">
                            <small class="text-danger"><?= $validation->getError('minatBaca') ?></small>
                        </div>
                        <div class="form-group col-lg-4 col-md-4 col-sm-12">
                            <label for="akmLiterasi">Assestment Kompetensi Minimum</label>
                            <input type="number" id="akmLiterasi" name="akmLiterasi" class="form-control" min="0" value="0">
                            <small class="text-danger"><?= $validation->getError('akmLiterasi') ?></small>
                        </div>
                        <div class="form-group col-lg-4 col-md-4 col-sm-12">
                            <label for="">Analisa Lingkungan Berbudaya Literasi</label>
                            <input type="number" name="nilaiAnalisaBudaya" id="nilaiAnalisaBudaya" class="form-control" min="0" value="0">
                            <small class="text-danger"><?= $validation->getError('nilaiAnalisaBudaya') ?></small>
                        </div>
                    </div>
                    <hr class="mx-2">
                    <div class="form-group row">
                        <div class="col-12" id="colBtn">
                        <button type="submit" id="btnMedia" class="btn btn-primary btn-block">Selanjutnya</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>

    <script type="text/javascript">

        var $ = jQuery.noConflict();

        const baseUrl = "<?php echo base_url(); ?>";
        const api_uris = "<?php echo route_to('api-count-assestment');?>";

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
                        $('#mediaText').text('Form sudah di isi');
                        // $('#btnMedia').prop('disabled', true);
                        $('#mediaText').append('<p>Anda dapat melewati form, silahkan klik tombol <span class="btn btn-info btn-sm">Lewati</span></p>');
                        $('#colBtn').empty();
                        $('#colBtn').append(`<input type="hidden" name="update" value="1">`);
                        $('#colBtn').append(`<input type="hidden" name="prevId" value="${response.data[0].id}">`);
                        $('#colBtn').append(`<button type="submit" id="btnAssestmentUpdate" class="btn btn-secondary btn-block">Perbarui</button>`);
                        $('#coreContent').append(`<a href="${baseUrl + '/peserta/tugas/partisipasi/'+nik+'/'+token}" class="btn btn-info">Lewati</a>`);
                    }
                }
            });

        }

    </script>

</body>
</html>