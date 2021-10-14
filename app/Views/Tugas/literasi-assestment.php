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
            <h2>Tugas Peserta (IX Literasi Assestment)</h2>
        </div>

        <div class="progress mb-3">
            <div class="progress-bar bg-success" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <div class="row">
            <div class="col">

                <form enctype='multipart/form-data' action="<?php echo route_to('api-literasi-assestment');?>" method="post">
                    <h6 class="text-muted">Assestment Literasi</h6>
                    <div class="form-group">
                        <label for="minatBaca">Jenis Buku</label>
                        <select name="minatBaca" id="minatBaca" class="form-control">
                            <option value="1" selected>Personal</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="analisaLiterasi">Analisa Literasi</label>
                        <select name="analisaLiterasi" id="analisaLiterasi" class="form-control">
                            <option readonly>Personal</option>
                            <option value="1" >Peserta Perorangan</option>
                            <option value="2" >Peserta GLK</option>
                            <option value="3" >Peserta GLM</option>
                            <option value="4" >Peserta GLM</option>
                        </select>
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