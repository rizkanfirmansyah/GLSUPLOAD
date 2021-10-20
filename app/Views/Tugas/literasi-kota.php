<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLN GAREULIS - Tugas Peserta Diklat</title>

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('favicons/apple-touch-icon.png');?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('favicons/favicon-32x32.png');?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('favicons/favicon-16x16.png');?>">
    <link rel="manifest" href="<?php echo base_url('favicons/site.webmanifest');?>">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    
    <div class="container p-4" id="coreContent">

        <div class="py-4 text-center">
            <h2 class="text-uppercase">Tugas Peserta <br>(VII Literasi Kota)</h2>
        </div>

        <div class="progress mb-3">
            <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <div class="row">
            <div class="col">

                <form enctype='multipart/form-data' action="<?php echo route_to('api-literasi-kota');?>" method="post">
                    <h5 class="font-weight-bold">Roadshow Literasi Kota</h5>
                    <p id="textLiterasi"></p>
                    <div class="form-group">
                        <label for="kota">Kota / Kabupaten <sup class="text-danger font-weight-bold">*</sup></label>
                        <select class="form-control" id="kota" name="kota">
                            <option readonly="true" selected disabled>Pilih Kota / Kabupaten</option>
                            <option value="Kabupaten Bogor" data-id="3201" data-subid="32">Kabupaten Bogor</option>
                            <option value="Kabupaten Sukabumi" data-id="3202" data-subid="32">Kabupaten Sukabumi</option>
                            <option value="Kabupaten Cianjur" data-id="3203" data-subid="32">Kabupaten Cianjur</option>
                            <option value="Kabupaten Bandung" data-id="3204" data-subid="32">Kabupaten Bandung</option>
                            <option value="Kabupaten Garut" data-id="3205" data-subid="32">Kabupaten Garut</option>
                            <option value="Kabupaten Tasikmalaya" data-id="3206" data-subid="32">Kabupaten Tasikmalaya</option>
                            <option value="Kabupaten Ciamis" data-id="3207" data-subid="32">Kabupaten Ciamis</option>
                            <option value="Kabupaten Kuningan" data-id="3208" data-subid="32">Kabupaten Kuningan</option>
                            <option value="Kabupaten Cirebon" data-id="3209" data-subid="32">Kabupaten Cirebon</option>
                            <option value="Kabupaten Majalengka" data-id="3210" data-subid="32">Kabupaten Majalengka</option>
                            <option value="Kabupaten Sumedang" data-id="3211" data-subid="32">Kabupaten Sumedang</option>
                            <option value="Kabupaten Indramayu" data-id="3212" data-subid="32">Kabupaten Indramayu</option>
                            <option value="Kabupaten Subang" data-id="3213" data-subid="32">Kabupaten Subang</option>
                            <option value="Kabupaten Purwakarta" data-id="3214" data-subid="32">Kabupaten Purwakarta</option>
                            <option value="Kabupaten Karawang" data-id="3215" data-subid="32">Kabupaten Karawang</option>
                            <option value="Kabupaten Bekasi" data-id="3216" data-subid="32">Kabupaten Bekasi</option>
                            <option value="Kabupaten Bandung Barat" data-id="3217" data-subid="32">Kabupaten Bandung Barat</option>
                            <option value="Kabupaten Pangandaran" data-id="3218" data-subid="32">Kabupaten Pangandaran</option>
                            <option value="Kota Bogor" data-id="3271" data-subid="32">Kota Bogor</option>
                            <option value="Kota Sukabumi" data-id="3272" data-subid="32">Kota Sukabumi</option>
                            <option value="Kota Bandung" data-id="3273" data-subid="32">Kota Bandung</option>
                            <option value="Kota Cirebon" data-id="3274" data-subid="32">Kota Cirebon</option>
                            <option value="Kota Bekasi" data-id="3275" data-subid="32">Kota Bekasi</option>
                            <option value="Kota Depok" data-id="3276" data-subid="32">Kota Depok</option>
                            <option value="Kota Cimahi" data-id="3277" data-subid="32">Kota Cimahi</option>
                            <option value="Kota Tasikmalaya" data-id="3278" data-subid="32">Kota Tasikmalaya</option>
                            <option value="Kota Banjar" data-id="3279" data-subid="32">Kota Banjar</option>
                        </select>
                        <input type="hidden" name="prevNik" id="prevNik" value="<?php echo $nik ?? '' ;?>">
                        <input type="hidden" name="prevToken" id="prevToken" value="<?php echo $token ?? '' ;?>">
                        <small class="text-danger"><?= $validation->getError('kota') ?></small>
                    </div>
                    <hr class="mx-2">
                    <span>
                        <p class="font-weight-lighter"><sup class="text-danger font-weight-bold">*</sup>:harus diisi</p>
                    </span>
                    <hr class="mx-2">
                    <div class="form-group row">
                        <div class="col-12">
                        <button type="submit" id="btnKota" class="btn btn-primary btn-block">Selanjutnya</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>

    <script type="text/javascript">

        var $ = jQuery.noConflict();

        const baseUrl = "<?php echo base_url(); ?>";
        const api_uris = "<?php echo route_to('api-count-kota');?>";

        const nik = "<?php echo $nik ?? '' ;?>";
        const token = "<?php echo $token ?? '' ;?>";

        $(function(){
            countKota();

            $('#pengarangAntologi').change(function(){
                var pilihan = this.value;
                    var options = ``;
                    switch (pilihan) {
                        case '1':
                            // alert('1');
                            $('#pengarangAntologiJml').removeAttr('disabled');
                            $('#pengarangAntologiJml').html('<option value="1" selected>1 Orang</option>');
                            break;
                        case '2':
                            // alert('2');
                            $('#pengarangAntologiJml').removeAttr('disabled');
                            options = '<option readonly="true">Pilih jumlah</option>'
                            options += '<option value="2">2 Orang</option>';
                            options += '<option value="3">3 Orang</option>';
                            options += '<option value="4">4 Orang</option>';
                            $('#pengarangAntologiJml').html(options);
                            break;
                        case '3':
                            // alert('3');
                            $('#pengarangAntologiJml').removeAttr('disabled');
                            options += '<option value="5" selected>4 Orang Lebih</option>';
                            $('#pengarangAntologiJml').html(options);
                            break;

                        default:
                            console.log(pilihan);
                            var attrAntJml = $('#pengarangAntologiJml').is(':disabled');
                            attrAntJml ? console.log('OK') : $('#pengarangAntologiJml').attr('disabled', true);
                            $('#pengarangAntologiJml').html('<option readonly="true">Pilih pengarang</option>');
                    }
            });
        });

        function countKota(){
            $.ajax({
                url: api_uris,
                method: 'POST',
                data : {
                    nik:nik,
                    token:token,
                },
                success: function(response){
                    console.log(response.data);
                    if(response.data != 0){
                        $('#textLiterasi').text('Form sudah di isi');
                        $('#btnKota').prop('disabled', true);
                        $('#textLiterasi').append('<p>Anda dapat melewati form, silahkan klik tombol <span class="btn btn-info btn-sm">Lewati</span></p>');
                        $('#coreContent').append(`<a href="${baseUrl + '/peserta/tugas/literasi-media/'+nik+'/'+token}" class="btn btn-info">Lewati</a>`);
                    }
                }
            });

        }
    
    </script>

</body>
</html>