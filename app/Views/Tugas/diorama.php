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
            <h2>Tugas Peserta (III Diorama)</h2>
        </div>

        <div class="progress mb-3">
            <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <div class="row">
            <div class="col">

                <form enctype='multipart/form-data' action="<?php echo route_to('api-diorama');?>" method="post">
                    <h6 class="text-muted">Diorama dunia baca</h6>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="filePhotoAwal">Unggah Photo Awal</label>
                            <input type="file" name="filePhotoAwal" id="filePhotoAwal" class="form-control-file">
                        </div>
                        <div class="form-group col-6">
                            <label for="filePhotoAkhir">Unggah Photo Akhir</label>
                            <input type="file" name="filePhotoAkhir" id="filePhotoAkhir" class="form-control-file">
                        </div>
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