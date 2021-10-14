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
            <h2>Tugas Peserta (VI Antologi)</h2>
        </div>

        <div class="progress mb-3">
            <div class="progress-bar bg-success" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <div class="row">
            <div class="col">

                <form enctype='multipart/form-data' action="<?php echo route_to('api-antologi');?>" method="post">
                    <h6 class="text-muted">Diklat Literasi</h6>
                    <div class="form-group">
                        <label for="fileAntologi">Unggah Cover Buku</label>
                        <input type="file" name="fileAntologi" id="fileAntologi" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <label for="judulAntologi">Judul Buku</label>
                        <input type="text" name="judulAntologi" id="judulAntologi" class="form-control">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="pengarangAntologi">Pengarang</label>
                            <select name="pengarangAntologi" id="pengarangAntologi" class="form-control">
                                <option readonly="true">Pilih pengarang</option>
                                <option value="1">Tunggal</option>
                                <option value="2">Kelompok</option>
                                <option value="3">Grup</option>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="pengarangAntologiJml">Pengarang</label>
                            <select name="pengarangAntologiJml" id="pengarangAntologiJml" class="form-control" disabled>
                                <option readonly="true">Pilih jumlah</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jenisBuku">Jenis Buku</label>
                        <select name="jenisBuku" id="jenisBuku" class="form-control">
                            <option readonly="true">Pilih jenis</option>
                            <option value="1">Kumpulan Puisi</option>
                            <option value="2">Kumpulan Pantun</option>
                            <option value="3">Kumpulan Cerpen</option>
                            <option value="4">Kumpulan Artikel</option>
                            <option value="5">Kumpulan Best Practice</option>
                            <option value="6">Novel</option>
                            <option value="7">Non Fiksi</option>
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