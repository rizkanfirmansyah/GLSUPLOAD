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
            <h2 class="text-uppercase">Tugas Peserta </br>(VIII Media Literasi)</h2>
        </div>

        <div class="progress mb-3">
            <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <div class="row">
            <div class="col">

                <form enctype='multipart/form-data' action="<?php echo route_to('api-literasi-media'); ?>" method="post">
                    <h5 class="font-weight-bold">Majalah Giat Gemilang (MGG)</h5>
                    <p id="mediaText"></p>
                    <div class="form-group">
                        <label for="fileMajalah">Unggah Bukti Berlangganan <b>MGG Edisi 4</b> </label>
                        <input type="file" name="fileMajalah" id="fileMajalah" class="form-control-file">
                        <input type="hidden" name="prevNik" id="prevNik" value="<?php echo $nik ?? '' ;?>">
                        <input type="hidden" name="prevToken" id="prevToken" value="<?php echo $token ?? '' ;?>">
                        <small id="photo" class="form-text text-muted">
                            <ul>Ketentuan :
                                <li>Ukuran maksimal 2MB</li>
                                <li>Format Extensi PDF</li>
                            </ul>
                        </small>
                        <small class="text-danger"><?= $validation->getError('fileMajalah') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="fileMajalah2">Unggah Bukti Berlangganan <b>MGG Edisi 5</b> </label>
                        <input type="file" name="fileMajalah2" id="fileMajalah2" class="form-control-file">
                        <small id="photo" class="form-text text-muted">
                            <ul>Ketentuan :
                                <li>Ukuran maksimal 2MB</li>
                                <li>Format Extensi PDF</li>
                            </ul>
                        </small>
                        <small class="text-danger"><?= $validation->getError('fileMajalah2') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="fileMajalah3">Unggah Bukti Berlangganan <b>MGG Edisi 6</b> </label>
                        <input type="file" name="fileMajalah3" id="fileMajalah3" class="form-control-file">
                        <small id="photo" class="form-text text-muted">
                            <ul>Ketentuan :
                                <li>Ukuran maksimal 2MB</li>
                                <li>Format Extensi PDF</li>
                            </ul>
                        </small>
                        <small class="text-danger"><?= $validation->getError('fileMajalah3') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="fileMajalah4">Unggah Bukti Berlangganan <b>MGG Edisi 7</b> </label>
                        <input type="file" name="fileMajalah4" id="fileMajalah4" class="form-control-file">
                        <small id="photo" class="form-text text-muted">
                            <ul>Ketentuan :
                                <li>Ukuran maksimal 2MB</li>
                                <li>Format Extensi PDF</li>
                            </ul>
                        </small>
                        <small class="text-danger"><?= $validation->getError('fileMajalah4') ?></small>
                    </div>
                    <hr class="mx-2">
                    <h5 class="font-weight-bold">Follow Media</h5>
                    <div class="form-group">
                        <label for="fileSsIg">Unggah Screenshot <b>Follow</b> Instagram </label>
                        <input type="file" name="fileSsIg" id="fileSsIg" class="form-control-file">
                        <small id="photo" class="form-text text-muted">
                            <ul>Ketentuan :
                                <li>Ukuran maksimal 2MB</li>
                                <li>Format Extensi JPG,JPEG,PNG</li>
                            </ul>
                        </small>
                        <small class="text-danger"><?= $validation->getError('fileSsIg') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="fileSsFb">Unggah Screenshot <b>Follow</b> Facebook </label>
                        <input type="file" name="fileSsFb" id="fileSsFb" class="form-control-file">
                        <small id="photo" class="form-text text-muted">
                            <ul>Ketentuan :
                                <li>Ukuran maksimal 2MB</li>
                                <li>Format Extensi JPG,JPEG,PNG</li>
                            </ul>
                        </small>
                        <small class="text-danger"><?= $validation->getError('fileSsFb') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="fileSsYt">Unggah Screenshot <b>Follow</b> Youtube </label>
                        <input type="file" name="fileSsYt" id="fileSsYt" class="form-control-file">
                        <small id="photo" class="form-text text-muted">
                            <ul>Ketentuan :
                                <li>Ukuran maksimal 2MB</li>
                                <li>Format Extensi JPG,JPEG,PNG</li>
                            </ul>
                        </small>
                        <small class="text-danger"><?= $validation->getError('fileSsYt') ?></small>
                    </div>
                    <hr class="mx-2">
                    <h5 class="font-weight-bold">Partisipasi dalam penyebaran informasi melalui media</h5>
                    <div class="form-group">
                        <label for="fileKegiatanIg">Unggah kegiatan di instagram </label>
                        <input type="file" name="fileKegiatanIg" id="fileKegiatanIg" class="form-control-file">
                        <small id="photo" class="form-text text-muted">
                            <ul>Ketentuan :
                                <li>Ukuran maksimal 2MB</li>
                                <li>Format Extensi JPG,JPEG,PNG</li>
                            </ul>
                        </small>
                        <small class="text-danger"><?= $validation->getError('fileKegiatanIg') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="fileKegiatanFb">Unggah kegiatan di facebook </label>
                        <input type="file" name="fileKegiatanFb" id="fileKegiatanFb" class="form-control-file">
                        <small id="photo" class="form-text text-muted">
                            <ul>Ketentuan :
                                <li>Ukuran maksimal 2MB</li>
                                <li>Format Extensi JPG,JPEG,PNG</li>
                            </ul>
                        </small>
                        <small class="text-danger"><?= $validation->getError('fileKegiatanFb') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="fileKegiatanWa">Unggah kegiatan di whatsapp </label>
                        <input type="file" name="fileKegiatanWa" id="fileKegiatanWa" class="form-control-file">
                        <small id="photo" class="form-text text-muted">
                            <ul>Ketentuan :
                                <li>Ukuran maksimal 2MB</li>
                                <li>Format Extensi JPG,JPEG,PNG</li>
                            </ul>
                        </small>
                        <small class="text-danger"><?= $validation->getError('fileKegiatanWa') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="fileShareInfo">Unggah share info ( like, comments & subscribe )</br>di ig,yt,fb ke Whatsapp </label>
                        <input type="file" name="fileShareInfo" id="fileShareInfo" class="form-control-file">
                        <small id="photo" class="form-text text-muted">
                            <ul>Ketentuan :
                                <li>Ukuran maksimal 2MB</li>
                                <li>Format Extensi JPG,JPEG,PNG</li>
                            </ul>
                        </small>
                        <small class="text-danger"><?= $validation->getError('fileShareInfo') ?></small>
                    </div>
                    <hr class="mx-2">
                    <div class="form-group row">
                        <div class="col-12">
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
        const api_uris = "<?php echo route_to('api-count-media');?>";

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
                        $('#coreContent').append(`<a href="${baseUrl + '/peserta/tugas/literasi-assestment/'+nik+'/'+token}" class="btn btn-info">Lewati</a>`);
                    }
                }
            });

        }
    
    </script>

</body>

</html>