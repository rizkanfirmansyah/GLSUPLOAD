<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLN GAREULIS - Tugas Peserta</title>

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
            <h2 class="text-uppercase">Tugas Peserta </br>(II Membaca & Review Buku)</h2>
        </div>
        
        <div class="progress mb-3">
            <div class="progress-bar bg-success" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        
        <h5 class="font-weight-bold">Membaca buku</h5>
        <div class="form-group">
            <label for="coreJml">Jumlah Baca Buku <sup class="text-danger font-weight-bold">*</sup><sub class="text-muted">(min 10)</sub></label>
            <input type="number" name="coreJml" id="coreJml" class="form-control" min="10" max="250" placeholder="Masukan Jumlah">
        </div>
        <hr class="mx-2">

        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <h6 class="text-muted mb-4">Pastikan tekan tombol <b class="btn btn-primary btn-sm">Simpan</b></br> ketika akan pindah ke halaman selanjutnya</h6>
                <h6 class="text-muted mb-4">Tekan tombol <b class="btn btn-danger btn-sm">Hapus Form</b></br> untuk menghapus Form input</h6>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <p>File yang anda sudah upload <span id="coreJmlFile" class="font-weight-bold">0</span> file</p>
            </div>
        </div>

        <hr class="mx-2">
        <h5 class="font-weight-bold">Jumlah Form <span id="coreForm">0</span></h5>

        <span>
            <p class="font-weight-lighter"><sup class="text-danger font-weight-bold">*</sup>:harus diisi</p>
        </span>

        <div id="formCol">
        </div>

        <a href="<?php echo route_to('tugas-review-buku',$nik,$token); ?>" class="my-4 btn btn-block btn-primary text-decoration-none">Selanjutnya</a>

    </div>

    <script type="text/javascript">
    
    var $ = jQuery.noConflict();
    // const base_uri = "<?php echo base_url();?>";
    const api_uri = "<?php echo route_to('api-baca-buku');?>"

    const nik = "<?php echo $nik ?? '' ;?>"
    const token = "<?php echo $token ?? '' ;?>"

    $(function(){

        $('#coreJml').change(function(){
            // alert(this.value);
            var jumlahInput = this.value;

            if(jumlahInput > $(this).attr('max')){
                alert('Jumlah melebihi maksimal 250');
                // confirm('Anda Yakin ?');
                $(this).val('');
                return false;
                // die();
                // window.stop()
            } else if(jumlahInput < $(this).attr('min')){
                alert('Jumlah kurang dari minimal 10');
                $(this).val('');
                // die();
                // window.stop();
                return false;
            }
            var retVal = confirm('Anda Yakin ? jumlah tidak dapat di kembalikan');  

            if(retVal == true){
                $('#coreJml').prop('disabled',true);
            } else{
                return false;
                // die();
            }
            let html = ``;

            for(var i = 0; i < jumlahInput; i++){
                html += `
                    <div class="row colRow" id="formNo${i+1}">
                        <div class="col">

                            <form enctype='multipart/form-data' id="coreForm${i+1}">
                                
                                <hr class="mx-2">
                                <h5 class="text-muted font-weight-bold">Form No ${i+1}</h5>
                                <div class="form-row">
                                    <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                        <label for="judulBuku">Judul Buku <sup class="text-danger font-weight-bold">*</sup></label>
                                        <input type="text" name="judulBuku" id="judulBuku" class="form-control">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                        <label for="pengarangBuku">Pengarang <sup class="text-danger font-weight-bold">*</sup></label>
                                        <input type="text" name="pengarangBuku" id="pengarangBuku" class="form-control">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                        <label for="penerbitBuku">Penerbit <sup class="text-danger font-weight-bold">*</sup></label>
                                        <input type="text" name="penerbitBuku" id="penerbitBuku" class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                        <label for="tahunBuku">Tahun <sup class="text-danger font-weight-bold">*</sup></label>
                                        <input type="number" name="tahunBuku" id="tahunBuku" class="form-control">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                        <label for="halamanBuku">Jumlah Halaman <sup class="text-danger font-weight-bold">*</sup></label>
                                        <input type="number" name="halamanBuku" id="halamanBuku" class="form-control" value="0">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                        <label for="fileCover">Upload Cover Buku Yang Dibaca <sup class="text-danger font-weight-bold">*</sup></label>
                                        <input type="file" name="fileCover" id="fileCover" class="form-control-file">
                                        <small id="photo" class="form-text text-muted">
                                            <ul>Ketentuan :
                                                <li>Ukuran masksimal 2MB</li>
                                                <li>Format Extensi JPG,JPEG,PNG</li>
                                            </ul>
                                        </small>
                                    </div>
                                </div>
                                <hr class="mx-2">
                                <div class="form-row">
                                    <div class="form-group col-6 text-left">
                                        <input type="submit" class="btn btn-primary" onclick="insertForm(${i+1})" id="btnSimpanForm${i+1}" value="Simpan">
                                    </div>
                                    <div class="form-group col-6 text-right">
                                        <button type="button" class="btn btn-danger" onclick="hapusForm(${i+1})" id="btnHapusForm${i+1}">Hapus Form</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                `;
            }
            
            // $('#coreForm').text(jumlahInput);
            $('#formCol').html(html);

        });
        
    });

    function insertForm(id = null){
        // e.preventDefault();
        $(`#coreForm${id}`).submit(function(e){
            e.preventDefault();
            // alert('ok')
            var formData = new FormData(this); 
            formData.append('nik', nik);
            formData.append('token', token);
            $.ajax({
                url: api_uri,
                type: "POST",
                // data:  new FormData(this),
                data:  formData,
                contentType: false,
                cache: false,
                processData:false,
                success : function(response){
                    // console.log(response);
                    if(response.status == 200){
                        alert(response.msg);
                        var jumlah = $('#coreJmlFile').text();
                        var hasil = Number(jumlah) + 1;
                        // alert(hasil);
                        $('#coreJmlFile').text(hasil);
                        $(`#btnHapusForm${id}`).prop('disabled',true);
                        // $(':input[type="submit"]').prop('disabled',true);
                        $(`#btnSimpanForm${id}`).prop('disabled',true);
                        $(`#coreJml`).prop('disabled',true);
                    }
                },
                error : function(err){
                    alert(err.msg);
                    return false;
                }
            });
        });
        // e.preventDefault();
        // stats = $('#statusMerek').is(':checked') ? '1' : '0';
        // var formData = {
        //     book_title : $('#judulBuku').val(),
        //     book_writer : $('#pengarangBuku').val(),
        //     book_establish : $('#penerbitBuku').val(),
        //     book_year : $('#tahunBuku').val(),
        //     book_page : $('#halamanBuku').val(),
        //     book_cover : $(`#coreForm${id} #fileCover`)[0].files,
        //     // status : stats,
        // };
        // var file_data = $('#fileCover').prop('files')[0];   
        // var form_data = new FormData();
        // form_data.append('file', file_data);
        // alert(form_data);
        // $.ajax({
        //     processData: false,
        //     cache: false,
        //     contentType: false,
        //     type: 'post',
        //     url : api_uri,
        //     data : form_data,
        //     timeout: 50000,
        //     success:function(response){
        //         alert('File Tersimpan')
        //     },
        //     error: function(err){
        //         console.log('Data tidak ditemukan');
        //         return false;
        //     }

        // });


    }

    function hapusForm(id = null){
        $('#formNo'+id).remove();
        var jumlahForm = $('.colRow').length;
        $('#coreForm').text(jumlahForm);
        // $('coreJml').val() - 1;
    }

    </script>

</body>
</html>