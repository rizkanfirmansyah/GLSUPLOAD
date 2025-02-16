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
            <h2>Tugas Peserta (X Partisipasi)</h2>
        </div>

        <div class="progress mb-3">
            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <div class="row">
            <div class="col">

                <form enctype='multipart/form-data' action="<?php echo route_to('api-partisipasi');?>" method="post">
                    <h6 class="text-muted">Pameran Literasi</h6>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pameranLiterasi" id="pameranLiterasi" value="ikut">
                            <label class="form-check-label" for="pameranLiterasi">Ikut</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pameranLiterasiTidak" id="pameranLiterasiTidak" value="tidak">
                            <label class="form-check-label" for="pameranLiterasiTidak">Tidak Ikut</label>
                        </div>
                    </div>
                    <hr class="mx-2">
                    <h6 class="text-muted">Festival Literasi</h6>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="festivalLiterasi" id="festivalLiterasi" value="ikut">
                            <label class="form-check-label" for="festivalLiterasi">Ikut</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="festivalLiterasiTidak" id="festivalLiterasiTidak" value="tidak">
                            <label class="form-check-label" for="festivalLiterasiTidak">Tidak Ikut</label>
                        </div>
                    </div>
                    <hr class="mx-2">
                    <h6 class="text-muted">Kemah Sastra Literasi</h6>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kemahLiterasi" id="kemahLiterasi" value="ikut">
                            <label class="form-check-label" for="kemahLiterasi">Ikut</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kemahLiterasiTidak" id="kemahLiterasiTidak" value="tidak">
                            <label class="form-check-label" for="kemahLiterasiTidak">Tidak Ikut</label>
                        </div>
                    </div>
                    <hr class="mx-2">
                    <h6 class="text-muted">Tantangan Literasi GLN GAREULIS JABAR 2021 - 2022</h6>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tantanganLiterasi" id="tantanganLiterasi" value="ikut">
                            <label class="form-check-label" for="tantanganLiterasi">Ikut</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tantanganLiterasiTidak" id="tantanganLiterasiTidak" value="tidak">
                            <label class="form-check-label" for="tantanganLiterasiTidak">Tidak Ikut</label>
                        </div>
                    </div>
                    <hr class="mx-2">
                    <div class="form-group row">
                        <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Selesai</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>

</body>
</html>