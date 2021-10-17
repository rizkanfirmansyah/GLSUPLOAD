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
            <h2 class="text-uppercase">Tugas Peserta </br>(V Video)</h2>
        </div>

        <div class="progress mb-3">
            <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <div class="row">
            <div class="col">

                <form enctype='multipart/form-data' action="<?php echo route_to('api-video'); ?>" method="post">
                    <h5 class="font-weight-bold">Membuat Video</h5>
                    <div class="form-row">
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label for="linkKegiatan">Link Kegiatan <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="text" name="linkKegiatan" id="linkKegiatan" class="form-control">
                            <snall class="text-danger"><?= $validation->getError('linkKegiatan') ?></snall>
                            <input type="hidden" name="prevNik" id="prevNik" value="<?php echo $nik ?? ''; ?>">
                            <input type="hidden" name="prevToken" id="prevToken" value="<?php echo $token ?? ''; ?>">
                        </div>
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label for="linkCerita">Link Cerita <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="text" name="linkCerita" id="linkCerita" class="form-control">
                            <snall class="text-danger"><?= $validation->getError('linkCerita') ?></snall>
                        </div>
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