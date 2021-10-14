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
    
    <div class="container p-4">

        <div class="py-4 text-center">
            <h2>Tugas Peserta (VIII Media Literasi)</h2>
        </div>

        <div class="progress mb-3">
            <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <div class="row">
            <div class="col">

                <form enctype='multipart/form-data' action="<?php echo route_to('api-literasi-media');?>" method="post">
                    <h6 class="text-muted">MGG & Follow Media</h6>
                    <div class="form-group">
                        <label for="fileMajalah">Unggah Majalah Diklat</label>
                        <input type="file" name="fileMajalah" id="fileMajalah" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <label for="fileSsIg">Unggah Screenshot Instagram</label>
                        <input type="file" name="fileSsIg" id="fileSsIg" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <label for="fileSsFb">Unggah Screenshot Facebook</label>
                        <input type="file" name="fileSsFb" id="fileSsFb" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <label for="fileSsYt">Unggah Screenshot Youtube</label>
                        <input type="file" name="fileDiklat" id="fileDiklat" class="form-control-file">
                    </div>
                    <hr class="mx-2">
                    <h6 class="text-muted">Partisipasi dalam penyebaran informasi melalui media</h6>
                    <div class="form-group">
                        <label for="fileKegiatanIg">Unggah kegiatan di instagram</label>
                        <input type="file" name="fileKegiatanIg" id="fileDifileKegiatanIgklat" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <label for="fileKegiatanFb">Unggah kegiatan di facebook</label>
                        <input type="file" name="fileKegiatanFb" id="fileKegiatanFb" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <label for="fileKegiatanWa">Unggah kegiatan di whatsapp</label>
                        <input type="file" name="fileKegiatanWa" id="fileKegiatanWa" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <label for="fileShareInfo">Unggah share info (like, comments & subscribe ) di ig,yt,fb ke Whatsapp</label>
                        <input type="file" name="fileShareInfo" id="fileShareInfo" class="form-control-file">
                    </div>
                    <hr class="mx-2">
                    <div class="form-group row">
                        <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Selanjutnya</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>

    </div>


</body>
</html>