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
        
        <div class="progress mb-3">
            <div class="progress-bar bg-success" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        
        <a href="<?php echo route_to('tugas-review-buku'); ?>" class="my-4 btn btn-block btn-primary text-decoration-none">Selanjutnya</a>

        <h6 class="text-muted">Membaca buku</h6>
        <div class="form-group">
            <label for="coreJml">Jumlah Baca Buku</label>
            <input type="number" name="coreJml" id="coreJml" class="form-control" min="0" value="0">
        </div>

        <div id="formCol">
        </div>

    </div>

    <script type="text/javascript">
    
    var $ = jQuery.noConflict();

    $(function(){

        $('#coreJml').change(function(){
            // alert(this.value);
            var jumlahInput = this.value;
            let html = ``;
            for(var i = 0; i < jumlahInput; i++){
                html += `
                    <div class="row colRow" id="formNo${i+1}">
                        <div class="col">

                            <form enctype='multipart/form-data'>
                                
                                <hr class="mx-2">
                                <h6 class="text-muted">Form No ${i+1}</h6>
                                <div class="form-row">
                                    <div class="form-group col-4">
                                        <label for="judulBuku">Judul Buku</label>
                                        <input type="text" name="judulBuku" id="judulBuku" class="form-control">
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="pengarangBuku">Pengarang</label>
                                        <input type="text" name="pengarangBuku" id="pengarangBuku" class="form-control">
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="penerbitBuku">Penerbit</label>
                                        <input type="text" name="penerbitBuku" id="penerbitBuku" class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-4">
                                        <label for="tahunBuku">Tahun</label>
                                        <input type="number" name="tahunBuku" id="tahunBuku" class="form-control">
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="halamanBuku">Jumlah Halaman</label>
                                        <input type="number" name="halamanBuku" id="halamanBuku" class="form-control" value="0">
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="fileCover">Upload Cover Buku Yang Dibaca</label>
                                        <input type="file" name="fileCover" id="fileCover" class="form-control-file">
                                    </div>
                                </div>
                                <hr class="mx-2">
                                <div class="form-group row">
                                    <div class="col-6">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>

                            </form>
                            <button type="button" class="btn btn-danger" onclick="hapusForm(${i+1})">Hapus Form</button>

                        </div>
                    </div>
                `;
            }
            
            $('#formCol').html(html);


        });
        
    });

    function hapusForm(id = null){
        $('#formNo'+id).remove();
        // $('coreJml').val() - 1;
    }

    </script>

</body>
</html>