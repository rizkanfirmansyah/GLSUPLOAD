<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLN GAREULIS - Biodata Peserta</title>

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('favicons/apple-touch-icon.png');?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('favicons/favicon-32x32.png');?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('favicons/favicon-16x16.png');?>">
    <link rel="manifest" href="<?php echo base_url('favicons/site.webmanifest');?>">

    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body class="bg-light">

    <div class="container p-4">

        <div class="py-2 text-center">
            <h2 class="text-uppercase">Kelengkapan</h2>
        </div>

        <div class="row">
            <div class="col">
                <form enctype='multipart/form-data' id="formKelengkapan">
                    <div class="form-row align-items-center">
                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                            <label for="tokenPeserta">Token</label>
                            <input type="text" name="resume_token" id="tokenPeserta" class="form-control" placeholder="Masukan Token">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                            <label for="nikPeserta">NIK Peserta (16 Digit)</label>
                            <input type="text" name="resume_ids" id="nikPeserta" class="form-control" placeholder="Masukan NIK">
                        </div>
                    </div>
                    <hr class="mx-2">
                    <div class="form-group row">
                        <div class="col">
                            <button type="button" id="btnKelengkapan" class="btn btn-primary btn-block">Cek</button>
                        </div>
                    </div>
                    <hr class="mx-2">
                </form>
            </div>
        </div>

        <div class="container" id="kelengkapanRow">
            <h4 class="py-2">Diklat</h4>
            <table id="tabelKarya" class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>File</th>
                        <th>Diunggah</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody id="colDiklat">
                </tbody>
            </table>

            <h4 class="py-2">Buku (Baca)</h4>
            <table id="tabelBaca" class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Jumlah Halaman</th>
                        <th>Cover</th>
                        <th>Diunggah</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody id="colBaca">
                </tbody>
            </table>

            <h4>Buku (Review)</h4>
            <table id="tabelKarya" class="table">
                <thead>
                    <tr>
                        <th>Artikel</th>
                        <th>Carpon</th>
                        <th>Cerpen</th>
                        <th>Story</th>
                    </tr>
                </thead>
                <tbody id="colReview">
                </tbody>
            </table>
            <h4>Karya</h4>
            <table id="tabelKarya" class="table">
                <thead>
                    <tr>
                        <th>Artikel</th>
                        <th>Carpon</th>
                        <th>Cerpen</th>
                        <th>Story</th>
                    </tr>
                </thead>
                <tbody id="colKarya">
                </tbody>
            </table>
        </div>

    </div>

    <script type="text/javascript">
        var $ = jQuery.noConflict();
        const baseUrl = "<?php echo base_url();?>";
        const api_uris = "<?php echo route_to('kelengkapan-cek');?>";
        const delete_diklat = "<?php echo route_to('api-admin-delete-diklat'); ?>";
        const delete_book = "<?php echo route_to('api-admin-delete-book'); ?>";
        const delete_review = "<?php echo route_to('api-admin-delete-review'); ?>";

        $(function() {
            
            $('#btnKelengkapan').on('click', function(e){
                e.preventDefault();

                var nik = $('#nikPeserta').val();
                var token = $('#tokenPeserta').val();

                $.ajax({
                    url : api_uris,
                    type: 'POST',
                    data : {
                        nik: nik,
                        token: token
                    },
                    beforeSend: function(){
                        alert('tunggu sebentar');
                    },
                    success: function(response){
                        var i = 1;
                        var x = 1;
                        
                        // Diklat
                        $('#colDiklat').empty();
                        $.each(response.data.diklat, function(key, value){
                            // console.log(value);
                            if(value != null){
                                $(`
                                <tr>
                                    <td>${i++}</td>
                                    <td>
                                        <a href="${baseUrl + '/diklat/' + nik + '/' + value.diklat_name}" class="badge badge-pill badge-info" target="_blank">
                                            <i class="lni lni-certificate p-2"></i>
                                        </a>
                                    </td>
                                    <td>${value.created_at}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="badge badge-pill badge-warning" onclick=deleteDiklat(${value.id},${x++})>
                                            <i class="lni lni-trash-can p-2"></i>
                                        </a>
                                    </td>
                                </tr>`
                                ).appendTo('#colDiklat');
                            }
                        });

                        var i = 1;
                        var x = 1;
                        // Buku (baca)
                        $('#colBaca').empty();
                        $.each(response.data.book, function(key, value){
                            // console.log(value);
                            if(value != null){
                                $(`
                                <tr>
                                    <td>${i++}</td>
                                    <td>${value.book_author}</td>
                                    <td>${value.book_publisher}</td>
                                    <td>${value.book_year}</td>
                                    <td>${value.book_page}</td>
                                    <td>
                                        <a href="${baseUrl + '/baca-buku/' + nik + '/' + value.book_cover}" class="badge badge-pill badge-info" target="_blank">
                                            <i class="lni lni-certificate p-2"></i>
                                        </a>
                                    </td>
                                    <td>${value.created_at}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="badge badge-pill badge-warning" onclick=deleteBook(${value.id},${x++})>
                                            <i class="lni lni-trash-can p-2"></i>
                                        </a>
                                    </td>
                                </tr>`
                                ).appendTo('#colBaca');
                            }
                        });

                        // Buku (review)
                        $('#colReview').empty();
                        $.each(response.data.review, function(key, value){
                            // console.log(value);
                            if(value != null){
                                $(`
                                <tr>
                                    <td>${i++}</td>
                                    <td>${value.review_category}</td>
                                    <td>
                                        <a href="${baseUrl + '/review-buku/' + nik + '/' + value.review_cover}" class="badge badge-pill badge-info" target="_blank">
                                            <i class="lni lni-certificate p-2"></i>
                                        </a>
                                    </td>
                                    <td>${value.created_at}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="badge badge-pill badge-warning" onclick=deleteBook(${value.id},${x++})>
                                            <i class="lni lni-trash-can p-2"></i>
                                        </a>
                                    </td>
                                </tr>`
                                ).appendTo('#colBaca');
                            }
                        });

                        // Karya
                        $.each(response.data.karya, function(key, value){
                            console.log(value);
                            if(value != null){
                                $(`
                                <tr>
                                    <td>${JSON.stringify(value.karya_artikel)}</td>
                                    <td>${JSON.stringify(value.karya_carpon)}</td>
                                    <td>${JSON.stringify(value.karya_cerpen)}</td>
                                    <td>${JSON.stringify(value.karya_story)}</td>
                                    <td>${JSON.stringify(value.created_at)}</td>
                                </tr>`
                                ).appendTo('#colKarya');
                            }

                        });
                        

                    },
                    error: function(response){
                        return false;
                    }
                });

            });

        });

        function deleteDiklat(id,n)
        {
            var question = confirm('Anda Yakin ? menghapus data, data tidak dapat dikembalikan');
            // (question) ? executeDelete(id) + alert('data terhapus') : false;
            (question) ? executeDelete(delete_diklat,id,n) : false;
        }

        function deleteBook(id,n)
        {
            var question = confirm('Anda Yakin ? menghapus data, data tidak dapat dikembalikan');
            // (question) ? executeDelete(id) + alert('data terhapus') : false;
            (question) ? executeDelete(delete_book,id,n) : false;
        }

        function deleteReview(id,n)
        {
            var question = confirm('Anda Yakin ? menghapus data, data tidak dapat dikembalikan');
            // (question) ? executeDelete(id) + alert('data terhapus') : false;
            (question) ? executeDelete(delete_review,id,n) : false;
        }

        function executeDelete(url,id,n){
            // alert('tunggu sebentar...');
            $.post(url, {id:id}, function(response){
                // (response) ? alert('Data terhapus') + document.getElementsByTagName("tr")[n].remove() : false;
                (response) ? alert('Data terhapus') + $(this).closest('tr').remove() : false;
            });
        }

    </script>

</body>

</html>