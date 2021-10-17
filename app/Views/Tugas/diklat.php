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
    
    <div class="container p-4">

        <div class="py-4 text-center">
            <h2 class="text-uppercase">Tugas Peserta </br>(I Diklat)</h2>
        </div>

        <div class="progress mb-3">
            <div class="progress-bar bg-success" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <div class="row">
            <div class="col">

                <form enctype='multipart/form-data' action="<?php echo route_to('api-diklat');?>" method="post">
                    <h5 class="font-weight-bold">Diklat Literasi</h5>
                    <div class="form-group">
                        <label for="fileDiklat">Unggah Diklat Literasi <sup class="text-danger font-weight-bold">*</sup></label>
                        <input type="file" name="fileDiklat[]" id="fileDiklat" class="form-control-file" multiple>
                        <input type="hidden" name="prevId" id="prevId" value="<?php echo $nik ?? ''; ?>">
                        <input type="hidden" name="prevToken" id="prevToken" value="<?php echo $token ?? ''; ?>">
                        <small id="photo" class="form-text text-muted">
                            <ul>Ketentuan :
                                <li>Anda dapat mengunggah 9 dokumen secara langsung</li>
                                <li>Ukuran masksimal 2MB</li>
                                <li>Format Extensi PDF</li>
                            </ul>
                        </small>

                        <small class="text-danger"><?= session()->getFlashdata('error') ?></small>
                    </div>
                    <hr class="mx-2">
                    <span>
                        <p class="font-weight-lighter"><sup class="text-danger font-weight-bold">*</sup>:harus diisi</p>
                    </span>
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