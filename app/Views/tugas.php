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
            <h2>Tugas Peserta</h2>
        </div>

        <div class="row">
            <div class="col">

                <form enctype='multipart/form-data'>

                    <div class="form-group">
                        <label for="fileDiklat">Unggah Diklat Literasi</label>
                        <input type="file" name="fileDiklat" id="fileDiklat" class="form-control-file">
                    </div>
                    <hr class="mx-2">
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
                    <h6 class="text-muted">Hasil Karya Tulis</h6>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="filePuisi">Unggah Naskah Puisi</label>
                            <input type="file" name="filePuisi" id="filePuisi" class="form-control-file">
                        </div>
                        <div class="form-group col-6">
                            <label for="filePantun">Unggah Naskah Pantun</label>
                            <input type="file" name="filePantun" id="filePantun" class="form-control-file">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-3">
                            <label for="fileCerpen">Unggah Naskah Puisi</label>
                            <input type="file" name="fileCerpen" id="fileCerpen" class="form-control-file">
                        </div>
                        <div class="form-group col-3">
                            <label for="fileCarpon">Unggah Naskah Pantun</label>
                            <input type="file" name="fileCarpon" id="fileCarpon" class="form-control-file">
                        </div>
                        <div class="form-group col-3">
                            <label for="fileEnglishStory">Unggah English Story</label>
                            <input type="file" name="fileEnglishStory" id="fileEnglishStory" class="form-control-file">
                        </div>
                        <div class="form-group col-3">
                            <label for="fileArtikel">Unggah Artikel</label>
                            <input type="file" name="fileArtikel" id="fileArtikel" class="form-control-file">
                        </div>
                    </div>
                    <hr class="mx-2">
                    <h6 class="text-muted">Membuat Video</h6>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="linkKegiatan">Link Kegiatan</label>
                            <input type="text" name="linkKegiatan" id="linkKegiatan" class="form-control">
                        </div>
                        <div class="form-group col-6">
                            <label for="linkCerita">Link Cerita</label>
                            <input type="text" name="linkCerita" id="linkCerita" class="form-control">
                        </div>
                    </div>
                    <hr class="mx-2">
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="fileAntologi">Unggah Cover Antologi</label>
                            <input type="file" name="fileAntologi" id="fileAntologi" class="form-control-file">
                        </div>
                        <div class="form-group col-6">
                            <label for="fileRoadshow">Unggah Sertifikat Literasi</label>
                            <input type="file" name="fileRoadshow" id="fileRoadshow" class="form-control-file">
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