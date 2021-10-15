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
            <h2 class="text-uppercase">Tugas Peserta </br>(II Membaca & Review Buku)</h2>
        </div>
        
        <div class="progress mb-3">
            <div class="progress-bar bg-success" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        
        <h5 class="font-weight-bold">Mereview buku</h5>
        <div class="form-group">
            <label for="coreJml">Jumlah Review Buku <sup class="text-danger font-weight-bold">*</sup></label>
            <input type="number" name="coreJml" id="coreJml" class="form-control" min="0" value="0">
        </div>

        <h6 class="text-muted">Pastikan tekan tombol <b class="btn btn-primary">Simpan</b> ketika akan pindah ke halaman selanjutnya</h6>
        <h6 class="text-muted">Tekan tombol <b class="btn btn-danger">Hapus Form</b> untuk menghapus Form input</h6>

        <hr class="mx-2">
        <span>
            <p class="font-weight-lighter"><sup class="text-danger font-weight-bold">*</sup>:harus diisi</p>
        </span>

        <div id="formCol">
        </div>

        <a href="<?php echo route_to('tugas-diorama'); ?>" class="my-4 btn btn-block btn-primary text-decoration-none">Selanjutnya</a>

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
                                <div class="form-group">
                                    <label for="jenisReviewBuku">Jenis Review Buku <sup class="text-danger font-weight-bold">*</sup></label>
                                    <select name="jenisReviewBuku" id="jenisReviewBuku" class="form-control">
                                        <option readonly>Personal</option>
                                        <option value="1" >Ishikawa Fish Bone</option>
                                        <option value="2" >AIH</option>
                                        <option value="3" >Y CHART</option>
                                        <option value="4" >Info Grafis</option>
                                        <option value="5" >Lainnya</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="fileReview">Upload Cover Buku Yang Direview <sup class="text-danger font-weight-bold">*</sup></label>
                                    <input type="file" name="fileReview" id="fileReview" class="form-control-file">
                                </div>
                                <hr class="mx-2">
                                <div class="form-row">
                                    <div class="form-group col-6 text-left">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                    <div class="form-group col-6 text-right">
                                        <button type="button" class="btn btn-danger" onclick="hapusForm(${i+1})">Hapus Form</button>
                                    </div>
                                </div>

                            </form>

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