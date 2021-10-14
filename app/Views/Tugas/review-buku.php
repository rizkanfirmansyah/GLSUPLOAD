<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLN GAREULIS - Tugas Peserta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    
    <div class="container p-4">

        <div class="py-4 text-center">
            <h2>Tugas Peserta (II Membaca & Review Buku)</h2>
        </div>

        <div class="row">
            <div class="col">

                <form enctype='multipart/form-data'>

                    <h6 class="text-muted">Membaca dan mereview buku</h6>  
                    <div class="form-row">
                        <div class="form-group col-2">
                            <label for="jmlBuku">Jumlah Buku</label>
                            <input type="number" name="jmlBuku" id="jmlBuku" class="form-control">
                        </div>
                        <div class="form-group col-4">
                            <label for="fileCoverBuku">Unggah Cover Buku</label>
                            <input type="file" name="fileCoverBuku" id="fileCoverBuku" class="form-control-file">
                        </div>
                        <div class="form-group col-2">
                            <label for="jmlReviewBuku">Jumlah Review Buku</label>
                            <input type="number" name="jmlReviewBuku" id="jmlReviewBuku" class="form-control">
                        </div>
                        <div class="form-group col-4">
                            <label for="fileCoverReviewBuku">Unggah Cover Review Buku</label>
                            <input type="file" name="fileCoverReviewBuku" id="fileCoverReviewBuku" class="form-control-file">
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