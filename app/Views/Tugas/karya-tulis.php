<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLN GAREULIS - Tugas Peserta Diklat</title>

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('favicons/apple-touch-icon.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('favicons/favicon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('favicons/favicon-16x16.png'); ?>">
    <link rel="manifest" href="<?php echo base_url('favicons/site.webmanifest'); ?>">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-light">

    <div class="container p-4" id="coreContent">

        <div class="py-4 text-center">
            <h2 class="text-uppercase">Tugas Peserta </br>(IV Karya Tulis)</h2>
        </div>

        <div class="progress mb-3">
            <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <div class="row">
            <div class="col">

                <form enctype='multipart/form-data' action="<?php echo route_to('api-karya-tulis'); ?>" method="post">
                    <h5 class="font-weight-bold">Hasil Karya Tulis</h5>
                    <div id="dioramaText text-muted">
                        <p id="coreKelengkapan">Kelengkapan Naskah :</br>
                            <span id="puisiText">Puisi 0</span>,
                            <span id="pantunText">Pantun 0</span>,
                            <span id="cerpenText">Cerpen 0</span>,
                            <span id="carponText">Carpon 0</span>,
                            <span id="storyText">English Story 0</span>,
                            <span id="artikelText">Artikel 0</span></br>yang anda unggah
                        </p>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label for="filePuisi">Unggah Naskah Puisi <sub>(min 4 naskah puisi)</sub></label>
                            <input type="file" name="filePuisi[]" id="filePuisi" class="form-control-file" multiple>
                            <input type="hidden" name="prevNik" id="prevNik" value="<?php echo $nik ?? ''; ?>">
                            <input type="hidden" name="prevToken" id="prevToken" value="<?php echo $token ?? ''; ?>">
                            <small id="photo" class="form-text text-muted">
                                <ul>Ketentuan :
                                    <li>Unggah 4 dokumen secara langsung</li>
                                    <li>Ukuran masksimal 2MB setiap 1 dokumen</li>
                                    <li>Format Extensi PDF</li>
                                </ul>
                            </small>
                            <small class="text-danger"><?= $validation->getError('filePuisi.*') ?></small>
                        </div>
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label for="filePantun">Unggah Naskah Pantun <sub>(min 4 naskah pantun)</sub></label>
                            <input type="file" name="filePantun[]" id="filePantun" class="form-control-file" multiple>
                            <small id="photo" class="form-text text-muted">
                                <ul>Ketentuan :
                                    <li>Unggah 4 dokumen secara langsung</li>
                                    <li>Ukuran masksimal 2MB setiap 1 dokumen</li>
                                    <li>Format Extensi PDF</li>
                                </ul>
                            </small>
                            <small class="text-danger"><?= $validation->getError('filePantun.*') ?></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-3 col-md-4 col-sm-6">
                            <label for="fileCerpen">Unggah Naskah Cerpen </label>
                            <input type="file" name="fileCerpen" id="fileCerpen" class="form-control-file">
                            <small id="photo" class="form-text text-muted">
                                <ul>Ketentuan :
                                    <li>Ukuran masksimal 2MB</li>
                                    <li>Format Extensi PDF</li>
                                </ul>
                            </small>
                            <small class="text-danger"><?= $validation->getError('fileCerpen') ?></small>
                        </div>
                        <div class="form-group col-lg-3 col-md-4 col-sm-6">
                            <label for="fileCarpon">Unggah Naskah Carpon </label>
                            <input type="file" name="fileCarpon" id="fileCarpon" class="form-control-file">
                            <small id="photo" class="form-text text-muted">
                                <ul>Ketentuan :
                                    <li>Ukuran masksimal 2MB</li>
                                    <li>Format Extensi PDF</li>
                                </ul>
                            </small>
                            <small class="text-danger"><?= $validation->getError('fileCarpon') ?></small>
                        </div>
                        <div class="form-group col-lg-3 col-md-4 col-sm-6">
                            <label for="fileEnglishStory">Unggah English Story </label>
                            <input type="file" name="fileEnglishStory" id="fileEnglishStory" class="form-control-file">
                            <small id="photo" class="form-text text-muted">
                                <ul>Ketentuan :
                                    <li>Ukuran masksimal 2MB</li>
                                    <li>Format Extensi PDF</li>
                                </ul>
                            </small>
                            <small class="text-danger"><?= $validation->getError('fileEnglishStory') ?></small>
                        </div>
                        <div class="form-group col-lg-3 col-md-4 col-sm-6">
                            <label for="fileArtikel">Unggah Artikel </label>
                            <input type="file" name="fileArtikel" id="fileArtikel" class="form-control-file">
                            <small id="photo" class="form-text text-muted">
                                <ul>Ketentuan :
                                    <li>Ukuran masksimal 2MB</li>
                                    <li>Format Extensi PDF</li>
                                </ul>
                            </small>
                            <small class="text-danger"><?= $validation->getError('fileArtikel') ?></small>
                        </div>
                    </div>
                    <hr class="mx-2">
                    <div class="form-group row">
                        <div class="col-12" id="colBtn">
                            <button type="submit" id="btnKarya" class="btn btn-primary btn-block">Selanjutnya</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>

    <script type="text/javascript">

    var $ = jQuery.noConflict();

    const baseUrl = "<?php echo base_url();?>";
    const api_uris = "<?php echo route_to('api-count-karya');?>";

    const nik = "<?php echo $nik ?? '' ;?>"
    const token = "<?php echo $token ?? '' ;?>"

    $(function(){
        countKarya();
    });

    function countKarya(){
        $.ajax({
            url: api_uris,
            method: 'POST',
            data : {
                nik:nik,
                token:token,
            },
            success: function(response){
                // console.log(response.data);

                var naskah_id = response.data.karya[0]['id'];
                var puisi = response.data.puisi.length;
                var puisi_id = new Array(response.data.puisi);
                var pantun = response.data.pantun.id;
                var pantun_id = new Array(response.data.pantun);
                var naskah_artikel = new Array(response.data.karya[0]['karya_artikel']);
                var naskah_carpon = new Array(response.data.karya[0]['karya_carpon']);
                var naskah_cerpen = new Array(response.data.karya[0]['karya_cerpen']);
                var naskah_story = new Array(response.data.karya[0]['karya_story']);
                
                console.log(puisi_id);
                console.log(pantun_id);
                // console.log(naskah_artikel);
                var karya = response.data;
                if(response.data != null){

                    $('#puisiText').text('Puisi ' + puisi);
                    $('#pantunText').text('Pantun ' + pantun);
                    $('#cerpenText').text('Cerpen ' + naskah_cerpen.length);
                    $('#carponText').text('Carpon ' + naskah_carpon.length);
                    $('#storyText').text('English Story ' + naskah_story.length);
                    $('#artikelText').text('Artikel ' + naskah_artikel.length);

                    // if(karya.puisi == 4){
                    //     $('#filePuisi').prop('disabled', true);
                    // }  
                    // if(karya.pantun == 4){
                    //     $('#filePantun').prop('disabled',true);
                    // }
                    // if(karya.cerpen == 1){
                    //     $('#fileCerpen').prop('disabled', true);
                    // }
                    // if(karya.carpon == 1){
                    //     $('#fileCarpon').prop('disabled', true);
                    // }
                    // if(karya.story == 1){
                    //     $('#fileEnglishStory').prop('disabled', true);
                    // }
                    // if(karya.artikel == 1){
                    //     $('#fileArtikel').prop('disabled', true);
                    // }

                    // if((karya.puisi == 4) && (karya.pantun == 4) && (karya.cerpen == 1) && (karya.carpon == 1) && (karya.story == 1) && (karya.artikel == 1)){
                        //     $('#btnKarya').prop('disabled', true);
                        //     $('#coreKelengkapan').append('<p>Anda dapat melewati form, silahkan klik tombol <span class="btn btn-info btn-sm">Lewati</span></p>');
                        //     $('#coreContent').append(`<a href="${baseUrl + '/peserta/tugas/video/'+nik+'/'+token}" class="btn btn-info">Lewati</a>`);
                        // }
                    if((naskah_cerpen.length == 1) && (naskah_carpon.length == 1) && (naskah_story.length == 1) && (naskah_artikel.length == 1)){
                            $('#colBtn').empty();
                            $('#colBtn').append(`<input type="hidden" name="update" value="1">`);
                            $('#colBtn').append(`<input type="hidden" name="prevIdNaskah" value="${naskah_id}">`);
                            $('#colBtn').append(`<input type="hidden" name="prevIdPuisi[]" value="${puisi_id}">`);
                            $('#colBtn').append(`<input type="hidden" name="prevIdPantun[]" value="${pantun_id}">`);
                            $('#colBtn').append(`<button type="submit" id="btnKaryaUpdate" class="btn btn-secondary btn-block">Perbarui</button>`);
                            $('#coreContent').append(`<a href="${baseUrl + '/peserta/tugas/video/'+nik+'/'+token}" class="btn btn-info">Lewati</a>`);
                    }

                }
            }
        });
    }

    </script>

</body>

</html>