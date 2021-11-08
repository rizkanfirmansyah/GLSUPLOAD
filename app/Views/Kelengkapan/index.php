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

        <div class="p-4 text-center">
            <h2 class="text-uppercase">Kelengkapan Data Peserta</h2>
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
                            <button type="button" id="btnKelengkapan" class="btn btn-primary btn-block">Cek Kelengkapan</button>
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
                        <th>#</th>
                        <th>Kategori</th>
                        <th>Cover</th>
                        <th>Diunggah</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody id="colReview">
                </tbody>
            </table>
            
            <h4>Diorama</h4>
            <table id="tabelDiorama" class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Awal</th>
                        <th>Akhir</th>
                        <th>Diunggah</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody id="colDiorama">
                </tbody>
            </table>

            <h4>Karya (Naskah)</h4>
            <table id="tabelKarya" class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Artikel</th>
                        <th>Carpon</th>
                        <th>Cerpen</th>
                        <th>Story</th>
                        <th>Diunggah</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody id="colKarya">
                </tbody>
            </table>

            <h4>Karya (Puisi)</h4>
            <table id="tabelPuisi" class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Naskah Puisi</th>
                        <th>Diunggah</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody id="colPuisi">
                </tbody>
            </table>

            <h4>Karya (Pantun)</h4>
            <table id="tabelPantun" class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Naskah Pantun</th>
                        <th>Diunggah</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody id="colPantun">
                </tbody>
            </table>

            <h4>Video</h4>
            <table id="tabelVideo" class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Link Kegiatan</th>
                        <th>Link Cerita</th>
                        <th>Diunggah</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody id="colVideo">
                </tbody>
            </table>

            <h4>Antologi</h4>
            <table id="tabelAntologi" class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Pengarang</th>
                        <th>Kategori</th>
                        <th>Peserta</th>
                        <th>Cover</th>
                        <th>Diunggah</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody id="colAntologi">
                </tbody>
            </table>

            <h4>Kota</h4>
            <table id="tabelKota" class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kota/Kabupaten</th>
                        <th>Diunggah</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody id="colKota">
                </tbody>
            </table>

            <h4>Media</h4>
            <table id="tabelMedia" class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Majalah 4</th>
                        <th>Majalah 5</th>
                        <th>Majalah 6</th>
                        <th>Majalah 7</th>
                        <th>IG</th>
                        <th>FB</th>
                        <th>YT</th>
                        <th>Kegiatan IG</th>
                        <th>Kegiatan FB</th>
                        <th>Kegiatan YT</th>
                        <th>Kegiatan WA</th>
                        <th>Diunggah</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody id="colMedia">
                </tbody>
            </table>

            <h4>Assestment</h4>
            <table id="tabelAssestment" class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Personal</th>
                        <th>Minat Baca</th>
                        <th>AKM</th>
                        <th>Analisa Budaya</th>
                        <th>Diunggah</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody id="colAssestment">
                </tbody>
            </table>

            <h4>Partisipasi</h4>
            <table id="tabelPartisipasi" class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pameran</th>
                        <th>Festival</th>
                        <th>Kemah</th>
                        <th>Tantangan</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody id="colPartisipasi">
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
        const delete_diorama = "<?php echo route_to('api-admin-delete-diorama'); ?>";
        const delete_karya = "<?php echo route_to('api-admin-delete-karya'); ?>";
        const delete_puisi = "<?php echo route_to('api-admin-delete-puisi'); ?>";
        const delete_pantun = "<?php echo route_to('api-admin-delete-pantun'); ?>";
        const delete_video = "<?php echo route_to('api-admin-delete-video'); ?>";
        const delete_antologi = "<?php echo route_to('api-admin-delete-antologi'); ?>";
        const delete_kota = "<?php echo route_to('api-admin-delete-kota'); ?>";
        const delete_media = "<?php echo route_to('api-admin-delete-media'); ?>";
        const delete_assestment  = "<?php echo route_to('api-admin-delete-assestment'); ?>";
        const delete_partisipasi = "<?php echo route_to('api-admin-delete-partisipasi'); ?>";

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
                        alert('data sedang dicari ....');
                        setTimeout(5000);
                    },
                    success: function(response){
                        // console.log(response.data);
                        var i = 1;
                        var x = 1;
                        var y = 1;
                        
                        // Diklat
                        $('#colDiklat').empty();
                        $.each(response.data.diklat, function(key, value){
                            // console.log(value);
                            if(value != null){
                                $(`
                                <tr id="diklat${y++}">
                                    <td>${i++}</td>
                                    <td>
                                        <a href="${baseUrl}/diklat/${nik}/${value.diklat_name}" class="badge badge-pill badge-info" target="_blank">
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
                        var y = 1;
                        // Buku (baca)
                        $('#colBaca').empty();
                        $.each(response.data.book, function(key, value){
                            // console.log(value);
                            if(value != null){
                                $(`
                                <tr id="baca${y++}">
                                    <td>${i++}</td>
                                    <td>${value.book_author}</td>
                                    <td>${value.book_publisher}</td>
                                    <td>${value.book_year}</td>
                                    <td>${value.book_page}</td>
                                    <td>
                                        <a href="${baseUrl}/baca-buku/${nik}/${(value.book_cover) ? value.book_cover : '../../404.php'}" class="badge badge-pill ${(value.book_cover) ? 'badge-info' : 'badge-danger'}" target="_blank">
                                        ${(value.book_cover) ? '<i class="lni lni-certificate p-2"></i>' : '<i class="lni lni-cross-circle p-2"></i>'}
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

                        var i = 1;
                        var x = 1;
                        var y = 1;
                        // Buku (review)
                        $('#colReview').empty();
                        $.each(response.data.review, function(key, value){
                            // console.log(value);
                            if(value != null){
                                var kategori = value.review_category;
                                switch (kategori) {
                                    case '1':
                                        kategori = 'Ishikawa Fish Bone';
                                        break;
                                    case '2':
                                        kategori = 'AIH';
                                        break;
                                    case '3':
                                        kategori = 'Y CHART';
                                        break;
                                    case '4':
                                        kategori = 'Info Grafis';
                                        break;
                                    case '5':
                                        kategori = 'Lainnya';
                                        break;
                                    default:
                                        kategori = '';
                                        break;
                                }
                                $(`
                                <tr id="review${y++}">
                                    <td>${i++}</td>
                                    <td>${kategori}</td>
                                    <td>
                                        <a href="${baseUrl}/review-buku/${nik}/${(value.review_cover) ? value.review_cover : '../../404.php'}" class="badge badge-pill ${(value.review_cover) ? 'badge-info' : 'badge-danger'}" target="_blank">
                                        ${(value.review_cover) ? '<i class="lni lni-certificate p-2"></i>' : '<i class="lni lni-cross-circle p-2"></i>'}
                                        </a>
                                    </td>
                                    <td>${value.created_at}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="badge badge-pill badge-warning" onclick=deleteReview(${value.id},${x++})>
                                            <i class="lni lni-trash-can p-2"></i>
                                        </a>
                                    </td>
                                </tr>`
                                ).appendTo('#colReview');
                            }
                        });

                        var i = 1;
                        var x = 1;
                        var y = 1;
                        // Diorama
                        $('#colDiorama').empty();
                        $.each(response.data.diorama, function(key, value){
                            // console.log(value);
                            if(value != null){
                                $(`
                                <tr id="diorama${y++}">
                                    <td>${i++}</td>
                                    <td>
                                        <a href="${baseUrl}/diorama/${nik}/${(value.diorama_first) ? value.diorama_first : '../../404.php'}" class="badge badge-pill ${(value.diorama_first) ? 'badge-info' : 'badge-danger'}" target="_blank">
                                        ${(value.diorama_first) ? '<i class="lni lni-certificate p-2"></i>' : '<i class="lni lni-cross-circle p-2"></i>'}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="${baseUrl}/diorama/${nik}/${(value.diorama_last) ? value.diorama_last : '../../404.php'}" class="badge badge-pill ${(value.diorama_last) ? 'badge-info' : 'badge-danger'}" target="_blank">
                                        ${(value.diorama_last) ? '<i class="lni lni-certificate p-2"></i>' : '<i class="lni lni-cross-circle p-2"></i>'}
                                        </a>
                                    </td>
                                    <td>${value.created_at}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="badge badge-pill badge-warning" onclick=deleteDiorama(${value.id},${x++})>
                                            <i class="lni lni-trash-can p-2"></i>
                                        </a>
                                    </td>
                                </tr>`
                                ).appendTo('#colDiorama');
                            }
                        });

                        var i = 1;
                        var x = 1;
                        var y = 1;
                        // Karya (naskah)
                        $('#colKarya').empty();
                        $.each(response.data.karya, function(key, value){
                            // console.log(value);
                            if(value != null){
                                $(`
                                <tr id="karya${y++}">
                                    <td>${i++}</td>
                                    <td>
                                        <a href="${baseUrl}/karya/${nik}/naskah/${(value.karya_artikel) ? value.karya_artikel : '../../../404.php'}" class="badge badge-pill ${(value.karya_artikel) ? 'badge-info' : 'badge-danger'}" target="_blank">
                                            ${(value.karya_artikel) ? '<i class="lni lni-certificate p-2"></i>' : '<i class="lni lni-cross-circle p-2"></i>' }
                                        </a>
                                    </td>
                                    <td>
                                        <a href="${baseUrl}/karya/${nik}/naskah/${(value.karya_carpon) ? value.karya_carpon : '../../../404.php'}" class="badge badge-pill ${(value.karya_carpon) ? 'badge-info' : 'badge-danger'}" target="_blank">
                                            ${(value.karya_carpon) ? '<i class="lni lni-certificate p-2"></i>' : '<i class="lni lni-cross-circle p-2"></i>' }
                                        </a>
                                    </td>
                                    <td>
                                        <a href="${baseUrl}/karya/${nik}/naskah/${(value.karya_cerpen) ? value.karya_cerpen : '../../../404.php'}" class="badge badge-pill ${(value.karya_cerpen) ? 'badge-info' : 'badge-danger'}" target="_blank">
                                            ${(value.karya_cerpen) ? '<i class="lni lni-certificate p-2"></i>' : '<i class="lni lni-cross-circle p-2"></i>' }
                                        </a>
                                    </td>
                                    <td>
                                        <a href="${baseUrl}/karya/${nik}/naskah/${(value.karya_story) ? value.karya_story : '../../../404.php'}" class="badge badge-pill ${(value.karya_story) ? 'badge-info' : 'badge-danger'}" target="_blank">
                                            ${(value.karya_story) ? '<i class="lni lni-certificate p-2"></i>' : '<i class="lni lni-cross-circle p-2"></i>' }
                                        </a>
                                    </td>
                                    <td>${value.created_at}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="badge badge-pill badge-warning" onclick=deleteKarya(${value.id},${x++})>
                                            <i class="lni lni-trash-can p-2"></i>
                                        </a>
                                    </td>
                                </tr>`
                                ).appendTo('#colKarya');
                            }

                        });

                        var i = 1;
                        var x = 1;
                        var y = 1;
                        // Karya (puisi)
                        $('#colPuisi').empty();
                        $.each(response.data.puisi, function(key, value){
                            // console.log(value);
                            if(value != null){
                                $(`
                                <tr id="puisi${y++}">
                                    <td>${i++}</td>
                                    <td>
                                        <a href="${baseUrl}/karya/${nik}/puisi/${(value.puisi_naskah) ? value.puisi_naskah : '../../../404.php'}" class="badge badge-pill ${(value.puisi_naskah) ? 'badge-info' : 'badge-danger'}" target="_blank">
                                            ${(value.puisi_naskah) ? '<i class="lni lni-certificate p-2"></i>' : '<i class="lni lni-cross-circle p-2"></i>' }
                                        </a>
                                    </td>
                                    <td>${value.created_at}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="badge badge-pill badge-warning" onclick=deletePuisi(${value.id},${x++})>
                                            <i class="lni lni-trash-can p-2"></i>
                                        </a>
                                    </td>
                                </tr>`
                                ).appendTo('#colPuisi');
                            }

                        });

                        var i = 1;
                        var x = 1;
                        var y = 1;
                        // Karya (pantun)
                        $('#colPantun').empty();
                        $.each(response.data.pantun, function(key, value){
                            // console.log(value);
                            if(value != null){
                                $(`
                                <tr id="pantun${y++}">
                                    <td>${i++}</td>
                                    <td>
                                        <a href="${baseUrl}/karya/${nik}/pantun/${(value.pantun_naskah) ? value.pantun_naskah : '../../../404.php'}" class="badge badge-pill ${(value.pantun_naskah) ? 'badge-info' : 'badge-danger'}" target="_blank">
                                            ${(value.pantun_naskah) ? '<i class="lni lni-certificate p-2"></i>' : '<i class="lni lni-cross-circle p-2"></i>' }
                                        </a>
                                    </td>
                                    <td>${value.created_at}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="badge badge-pill badge-warning" onclick=deletePantun(${value.id},${x++})>
                                            <i class="lni lni-trash-can p-2"></i>
                                        </a>
                                    </td>
                                </tr>`
                                ).appendTo('#colPantun');
                            }

                        });

                        var i = 1;
                        var x = 1;
                        var y = 1;
                        // Video
                        $('#colVideo').empty();
                        $.each(response.data.video, function(key, value){
                            // console.log(value);
                            if(value != null){
                                $(`
                                <tr id="video${y++}">
                                    <td>${i++}</td>
                                    <td>
                                        <a href="${value.video_link_kegiatan}" class="text-decoration-none" target="_blank">
                                            ${value.video_link_kegiatan}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="${value.video_link_cerita}" class="text-decoration-none" target="_blank">
                                            ${value.video_link_cerita}
                                        </a>
                                    </td>
                                    <td>${value.created_at}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="badge badge-pill badge-warning" onclick=deleteVideo(${value.id},${x++})>
                                            <i class="lni lni-trash-can p-2"></i>
                                        </a>
                                    </td>
                                </tr>`
                                ).appendTo('#colVideo');
                            }

                        });

                        var i = 1;
                        var x = 1;
                        var y = 1;
                        // Antologi
                        $('#colAntologi').empty();
                        $.each(response.data.antologi, function(key, value){
                            // console.log(value);
                            if(value != null){
                                var pengarang = value.antologi_author;
                                var kategori = value.antologi_category;
                                switch (pengarang) {
                                    case '1':
                                        pengarang = 'Tunggal';
                                        break;
                                    case '2':
                                        pengarang = 'Kelompok';
                                        break;
                                    case '3':
                                        pengarang = 'Grup';
                                        break;
                                    default:
                                        pengarang = '';
                                        break;
                                }
                                switch (kategori) {
                                    case '1':
                                        kategori = 'Kumpulan Puisi';
                                        break;
                                    case '2':
                                        kategori = 'Kumpulan Pantun';
                                        break;
                                    case '3':
                                        kategori = 'Kumpulan Cerpen';
                                        break;
                                    case '4':
                                        kategori = 'Kumpulan Artikel';
                                        break;
                                    case '5':
                                        kategori = 'Kumpulan Best Practice';
                                        break;
                                    case '6':
                                        kategori = 'Novel';
                                        break;
                                    case '7':
                                        kategori = 'Non Fiksi';
                                        break;
                                    default:
                                    kategori = '';
                                        break;
                                }
                                $(`
                                <tr id="antologi${y++}">
                                    <td>${i++}</td>
                                    <td>${value.antologi_judul}</td>
                                    <td>${pengarang}</td>
                                    <td>${kategori}</td>
                                    <td>${value.antologi_peserta}</td>
                                    <td>
                                        <a href="${baseUrl}/antologi/${nik}/${(value.antologi_cover) ? value.antologi_cover : '../../404.php'}" class="badge badge-pill ${(value.antologi_cover) ? 'badge-info' : 'badge-danger'}" target="_blank">
                                            ${(value.antologi_cover) ? '<i class="lni lni-certificate p-2"></i>' : '<i class="lni lni-cross-circle p-2"></i>' }
                                        </a>
                                    </td>
                                    <td>${value.created_at}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="badge badge-pill badge-warning" onclick=deleteAntologi(${value.id},${x++})>
                                            <i class="lni lni-trash-can p-2"></i>
                                        </a>
                                    </td>
                                </tr>`
                                ).appendTo('#colAntologi');
                            }

                        });

                        var i = 1;
                        var x = 1;
                        var y = 1;
                        // Kota
                        $('#colKota').empty();
                        $.each(response.data.kota, function(key, value){
                            // console.log(value);
                            if(value != null){
                                $(`
                                <tr id="kota${y++}">
                                    <td>${i++}</td>
                                    <td>${value.kota_nama}</td>
                                    <td>${value.created_at}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="badge badge-pill badge-warning" onclick=deleteKota(${value.id},${x++})>
                                            <i class="lni lni-trash-can p-2"></i>
                                        </a>
                                    </td>
                                </tr>`
                                ).appendTo('#colKota');
                            }

                        });

                        var i = 1;
                        var x = 1;
                        var y = 1;
                        // Media
                        $('#colMedia').empty();
                        $.each(response.data.media, function(key, value){
                            // console.log(value);
                            if(value != null){
                                $(`
                                <tr id="media${y++}">
                                    <td>${i++}</td>
                                    <td>
                                        <a href="${baseUrl}/media/${nik}/${(value.media_majalah) ? value.media_majalah : '../../404.php'}" class="badge badge-pill ${(value.media_majalah) ? 'badge-info' : 'badge-danger'}" target="_blank">
                                            ${(value.media_majalah) ? '<i class="lni lni-certificate p-2"></i>' : '<i class="lni lni-cross-circle p-2"></i>' }
                                        </a>
                                    </td>
                                    <td>
                                        <a href="${baseUrl}/media/${nik}/${(value.media_majalah_2) ? value.media_majalah_2 : '../../404.php'}" class="badge badge-pill ${(value.media_majalah_2) ? 'badge-info' : 'badge-danger'}" target="_blank">
                                            ${(value.media_majalah_2) ? '<i class="lni lni-certificate p-2"></i>' : '<i class="lni lni-cross-circle p-2"></i>' }
                                        </a>
                                    </td>
                                    <td>
                                        <a href="${baseUrl}/media/${nik}/${(value.media_majalah_3) ? value.media_majalah_3 : '../../404.php'}" class="badge badge-pill ${(value.media_majalah_3) ? 'badge-info' : 'badge-danger'}" target="_blank">
                                            ${(value.media_majalah_3) ? '<i class="lni lni-certificate p-2"></i>' : '<i class="lni lni-cross-circle p-2"></i>' }
                                        </a>
                                    </td>
                                    <td>
                                        <a href="${baseUrl}/media/${nik}/${(value.media_majalah_4) ? value.media_majalah_4 : '../../404.php'}" class="badge badge-pill ${(value.media_majalah_4) ? 'badge-info' : 'badge-danger'}" target="_blank">
                                            ${(value.media_majalah_4) ? '<i class="lni lni-certificate p-2"></i>' : '<i class="lni lni-cross-circle p-2"></i>' }
                                        </a>
                                    </td>
                                    <td>
                                        <a href="${baseUrl}/media/${nik}/${(value.media_ssig) ? value.media_ssig : '../../404.php'}" class="badge badge-pill ${(value.media_ssig) ? 'badge-info' : 'badge-danger'}" target="_blank">
                                            ${(value.media_ssig) ? '<i class="lni lni-certificate p-2"></i>' : '<i class="lni lni-cross-circle p-2"></i>' }
                                        </a>
                                    </td>
                                    <td>
                                        <a href="${baseUrl}/media/${nik}/${(value.media_ssfb) ? value.media_ssfb : '../../404.php'}" class="badge badge-pill ${(value.media_ssfb) ? 'badge-info' : 'badge-danger'}" target="_blank">
                                            ${(value.media_ssfb) ? '<i class="lni lni-certificate p-2"></i>' : '<i class="lni lni-cross-circle p-2"></i>' }
                                        </a>
                                    </td>
                                    <td>
                                        <a href="${baseUrl}/media/${nik}/${(value.media_ssyt) ? value.media_ssyt : '../../404.php'}" class="badge badge-pill ${(value.media_ssyt) ? 'badge-info' : 'badge-danger'}" target="_blank">
                                            ${(value.media_ssyt) ? '<i class="lni lni-certificate p-2"></i>' : '<i class="lni lni-cross-circle p-2"></i>' }
                                        </a>
                                    </td>
                                    <td>
                                        <a href="${baseUrl}/media/${nik}/${(value.media_kegiatan_ig) ? value.media_kegiatan_ig : '../../404.php'}" class="badge badge-pill ${(value.media_kegiatan_ig) ? 'badge-info' : 'badge-danger'}" target="_blank">
                                            ${(value.media_kegiatan_ig) ? '<i class="lni lni-certificate p-2"></i>' : '<i class="lni lni-cross-circle p-2"></i>' }
                                        </a>
                                    </td>
                                    <td>
                                        <a href="${baseUrl}/media/${nik}/${(value.media_kegiatan_fb) ? value.media_kegiatan_fb : '../../404.php'}" class="badge badge-pill ${(value.media_kegiatan_fb) ? 'badge-info' : 'badge-danger'}" target="_blank">
                                            ${(value.media_kegiatan_fb) ? '<i class="lni lni-certificate p-2"></i>' : '<i class="lni lni-cross-circle p-2"></i>' }
                                        </a>
                                    </td>
                                    <td>
                                        <a href="${baseUrl}/media/${nik}/${(value.media_kegiatan_yt) ? value.media_kegiatan_yt : '../../404.php'}" class="badge badge-pill ${(value.media_kegiatan_yt) ? 'badge-info' : 'badge-danger'}" target="_blank">
                                            ${(value.media_kegiatan_yt) ? '<i class="lni lni-certificate p-2"></i>' : '<i class="lni lni-cross-circle p-2"></i>' }
                                        </a>
                                    </td>
                                    <td>
                                        <a href="${baseUrl}/media/${nik}/${(value.media_kegiatan_wa) ? value.media_kegiatan_wa : '../../404.php'}" class="badge badge-pill ${(value.media_kegiatan_wa) ? 'badge-info' : 'badge-danger'}" target="_blank">
                                            ${(value.media_kegiatan_wa) ? '<i class="lni lni-certificate p-2"></i>' : '<i class="lni lni-cross-circle p-2"></i>' }
                                        </a>
                                    </td>
                                    <td>${value.created_at}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="badge badge-pill badge-warning" onclick=deleteMedia(${value.id},${x++})>
                                            <i class="lni lni-trash-can p-2"></i>
                                        </a>
                                    </td>
                                </tr>`
                                ).appendTo('#colMedia');
                            }

                        });

                        var i = 1;
                        var x = 1;
                        var y = 1;
                        // Assestment
                        $('#colAssestment').empty();
                        $.each(response.data.assestment, function(key, value){
                            // console.log(value);
                            if(value != null){
                                var jenis = value.assestment_jenis;
                                var analisa = value.assestment_analisa;
                                switch (analisa) {
                                    case '1':
                                        analisa = 'Peserta Perorangan';
                                        break;
                                    case '2':
                                        analisa = 'Peserta GLK';
                                        break;
                                    case '3':
                                        analisa = 'Peserta GLM';
                                        break;
                                    case '4':
                                        analisa = 'Peserta GLS';
                                        break;
                                    default:
                                        analisa = '';
                                        break;
                                }
                                $(`
                                <tr id="assestment${y++}">
                                    <td>${i++}</td>
                                    <td>${analisa}</td>
                                    <td>${jenis}</td>
                                    <td>${value.assestment_akm}</td>
                                    <td>${value.assestment_nab}</td>
                                    <td>${value.created_at}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="badge badge-pill badge-warning" onclick=deleteAssestment(${value.id},${x++})>
                                            <i class="lni lni-trash-can p-2"></i>
                                        </a>
                                    </td>
                                </tr>`
                                ).appendTo('#colAssestment');
                            }

                        });

                        var i = 1;
                        var x = 1;
                        var y = 1;
                        // Partisipasi
                        $('#colPartisipasi').empty();
                        $.each(response.data.partisipasi, function(key, value){
                            // console.log(value);
                            if(value != null){
                                $(`
                                <tr id="partisipasi${y++}">
                                    <td>${i++}</td>
                                    <td>${value.partisipasi_pameran}</td>
                                    <td>${value.partisipasi_festival}</td>
                                    <td>${value.partisipasi_kemah}</td>
                                    <td>${value.partisipasi_tantangan}</td>
                                    <td>${value.created_at}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="badge badge-pill badge-warning" onclick=deletePartisipasi(${value.id},${x++})>
                                            <i class="lni lni-trash-can p-2"></i>
                                        </a>
                                    </td>
                                </tr>`
                                ).appendTo('#colPartisipasi');
                            }

                        });
                        
                    },
                    error: function(response){
                        setTimeout(3000);
                        alert('data tidak ditemukan');
                        return false;
                    }
                });

            });

        });

        function deleteDiklat(id,n)
        {
            var n = 'diklat'+n;
            var question = confirm('Anda Yakin ? menghapus data, data tidak dapat dikembalikan');
            // (question) ? executeDelete(id) + alert('data terhapus') : false;
            (question) ? executeDelete(delete_diklat,id,n) : false;
        }

        function deleteBook(id,n)
        {
            var n = 'baca'+n
            var question = confirm('Anda Yakin ? menghapus data, data tidak dapat dikembalikan');
            // (question) ? executeDelete(id) + alert('data terhapus') : false;
            (question) ? executeDelete(delete_book,id,n) : false;
        }

        function deleteReview(id,n)
        {
            var n = 'review'+n
            var question = confirm('Anda Yakin ? menghapus data, data tidak dapat dikembalikan');
            // (question) ? executeDelete(id) + alert('data terhapus') : false;
            (question) ? executeDelete(delete_review,id,n) : false;
        }

        function deleteDiorama(id,n)
        {
            var n = 'diorama'+n
            var question = confirm('Anda Yakin ? menghapus data, data tidak dapat dikembalikan');
            // (question) ? executeDelete(id) + alert('data terhapus') : false;
            (question) ? executeDelete(delete_diorama,id,n) : false;
        }

        function deleteKarya(id,n)
        {
            var n = 'karya'+n
            var question = confirm('Anda Yakin ? menghapus data, data tidak dapat dikembalikan');
            // (question) ? executeDelete(id) + alert('data terhapus') : false;
            (question) ? executeDelete(delete_karya,id,n) : false;
        }

        function deletePuisi(id,n)
        {
            var n = 'puisi'+n
            var question = confirm('Anda Yakin ? menghapus data, data tidak dapat dikembalikan');
            // (question) ? executeDelete(id) + alert('data terhapus') : false;
            (question) ? executeDelete(delete_puisi,id,n) : false;
        }

        function deletePantun(id,n)
        {
            var n = 'pantun'+n
            var question = confirm('Anda Yakin ? menghapus data, data tidak dapat dikembalikan');
            // (question) ? executeDelete(id) + alert('data terhapus') : false;
            (question) ? executeDelete(delete_pantun,id,n) : false;
        }

        function deleteVideo(id,n)
        {
            var n = 'video'+n
            var question = confirm('Anda Yakin ? menghapus data, data tidak dapat dikembalikan');
            // (question) ? executeDelete(id) + alert('data terhapus') : false;
            (question) ? executeDelete(delete_video,id,n) : false;
        }

        function deleteAntologi(id,n)
        {
            var n = 'antologi'+n
            var question = confirm('Anda Yakin ? menghapus data, data tidak dapat dikembalikan');
            // (question) ? executeDelete(id) + alert('data terhapus') : false;
            (question) ? executeDelete(delete_antologi,id,n) : false;
        }

        function deleteKota(id,n)
        {
            var n = 'kota'+n
            var question = confirm('Anda Yakin ? menghapus data, data tidak dapat dikembalikan');
            // (question) ? executeDelete(id) + alert('data terhapus') : false;
            (question) ? executeDelete(delete_kota,id,n) : false;
        }

        function deleteMedia(id,n)
        {
            var n = 'media'+n
            var question = confirm('Anda Yakin ? menghapus data, data tidak dapat dikembalikan');
            // (question) ? executeDelete(id) + alert('data terhapus') : false;
            (question) ? executeDelete(delete_media,id,n) : false;
        }

        function deleteAssestment(id,n)
        {
            var n = 'assestment'+n
            var question = confirm('Anda Yakin ? menghapus data, data tidak dapat dikembalikan');
            // (question) ? executeDelete(id) + alert('data terhapus') : false;
            (question) ? executeDelete(delete_assestment,id,n) : false;
        }

        function deletePartisipasi(id,n)
        {
            var n = 'partisipasi'+n
            var question = confirm('Anda Yakin ? menghapus data, data tidak dapat dikembalikan');
            // (question) ? executeDelete(id) + alert('data terhapus') : false;
            (question) ? executeDelete(delete_partisipasi,id,n) : false;
        }

        function executeDelete(url,id,n){
            // alert('tunggu sebentar...');
            $.post(url, {id:id}, function(response){
                // (response) ? alert('Data terhapus') + document.getElementsByTagName("tr")[n].remove() : false;
                (response) ? alert('Data terhapus') + $(`#${n}`).remove() : false;
            });
        }

    </script>

</body>

</html>