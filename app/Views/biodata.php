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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body class="bg-light">

    <div class="container p-4">

        <div class="py-2 text-center">
            <h2 class="text-uppercase">Biodata Peserta</h2>
        </div>

        <div class="row">
            <div class="col">

                <!-- <form enctype='multipart/form-data' action="<?php //echo route_to('api-biodata');?>" method="POST"> -->
                <form enctype='multipart/form-data' action="/api/biodata" method="POST">
                    <div class="form-row align-items-center">
                        <div class="form-group col-lg-1 col-md-2 col-sm-2">
                            <label for="btnCopy">&nbsp;</label>
                            <button type="button" id="btnCopy" class="btn btn-primary form-control" onclick="copyText('#tokenPeserta')">Copy</button>
                        </div>
                        <div class="form-group col-lg-5 col-md-4 col-sm-10">
                            <label for="tokenPeserta">Token <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="text" name="resume_token" id="tokenPeserta" value="<?php echo $token ?? old('resume_token'); ?>" class="form-control <?= $validation->hasError('resume_token') ? 'is-invalid' : '' ?>">
                            <small id="nikPeserta" class="form-text text-muted">
                                <p class="text-muted text-wrap">(masukan token lalu nik jika ingin mencari data sebelumnya)</p>
                            </small>
                            <div class="invalid-feedback">
                            <?= $validation->getError('resume_token') ?>
                            </div>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                            <label for="nikPeserta">NIK Peserta (16 Digit) <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="text" name="resume_ids" id="nikPeserta" value="<?= old('resume_ids') ?>" placeholder="Masukan NIK" class="form-control <?= $validation->hasError('resume_ids') ? 'is-invalid' : '' ?>">
                            <small id="nikPeserta" class="form-text text-muted">
                                <p class="text-muted text-wrap">(masukan token terlebih dahulu jika ingin mencari data sebelumnya)</p>
                            </small>
                            <div class="invalid-feedback">
                            <?= $validation->getError('resume_ids') ?>
                            </div>
                            <input type="hidden" name="prevId" id="prevId">
                        </div>
                    </div>
                    <hr class="mx-2">
                    <div class="form-group">
                        <label for="kota">Kota / Kabupaten <sup class="text-danger font-weight-bold">*</sup></label>
                        <select class="form-control <?= $validation->hasError('resume_city') ? 'is-invalid' : '' ?>" id="kota" name="resume_city" value="<?= old('resume_city') ?>" >
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
                        <div class="invalid-feedback">
                            <?= $validation->getError('resume_city') ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label for="kategori">Kategori Peserta <sup class="text-danger font-weight-bold">*</sup></label>
                            <select class="form-control <?= $validation->hasError('resume_category') ? 'is-invalid' : '' ?>" id="kategori" name="resume_category" value="<?= old('resume_category') ?>">
                                <option readonly="true">Pilih kategori</option>
                                <option value="1">Perorangan</option>
                                <option value="2">GLK</option>
                                <option value="3">GLM</option>
                                <option value="4">GLS</option>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('resume_category') ?>
                            </div>
                        </div>
                        <div class="form-group col-lg-3 col-md-6 col-sm-6">
                            <label for="subKategori">Sub Kategori <sup class="text-danger font-weight-bold">*</sup></label>
                            <select class="form-control" id="subKategori" name="resume_subcategory" value="<?= old('resume_subcategory') ?>" disabled>
                                <option readonly="true">Pilih sub kategori</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-3 col-md-6 col-sm-6">
                            <label for="jumlahPesarta">Jumlah Peserta <sup class="text-danger font-weight-bold">*</sup></label>
                            <select class="form-control" value="<?= old('resume_participant') ?>" id="jumlahPesarta" name="resume_participant" disabled>
                                <option readonly="true">Pilih jumlah peserta</option>
                            </select>
                        </div>
                    </div>
                    <hr class="mx-2">
                    <div class="form-group">
                        <label for="namaPeserta">Nama Peserta <sup class="text-danger font-weight-bold">*</sup></label>
                        <input type="text" class="form-control <?= $validation->hasError('resume_name') ? 'is-invalid' : '' ?>" id="namaPeserta" name="resume_name" placeholder="nama peserta ..." value="<?= old('resume_name') ?>" >
                        <div class="invalid-feedback">
                            <?= $validation->getError('resume_name') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="statusGln">Status GLN GAREULIS JABAR <sup class="text-danger font-weight-bold">*</sup></label>
                        <select class="form-control <?= $validation->hasError('resume_status') ? 'is-invalid' : '' ?>" id="statusGln" name="resume_status" value="<?= old('resume_status') ?>" >
                            <option readonly="true">Pilih status</option>
                            <option value="1">Dewan Kehormatan</option>
                            <option value="2">Dewan Pembina</option>
                            <option value="3">Dewan Penasihat</option>
                            <option value="4">Perintis (Pengurus Tingkat Provinsi)</option>
                            <option value="5">Ketua Koordinator Kota/Kabupaten</option>
                            <option value="6">Bunda Literasi KEMENAG Kota/Kabupaten</option>
                            <option value="7">Penggerak (Pengurus Tingkat Kota/Kabupaten)</option>
                            <option value="8">Jabar</option>
                            <option value="9">Pegiat iterasi</option>
                            <option value="10">Lainnya</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('resume_status') ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label for="namaInstansiAwal">Nama Instansi <sub>(awal)</sub> <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="text" class="form-control" id="namaInstansiAwal" name="resume_agency" value="<?= old('resume_agency') ?>" placeholder="masukan instansi awal">
                        </div>
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label for="alamatInstansiAwal">Alamat Instansi <sub>(awal)</sub> <sup class="text-danger font-weight-bold">*</sup></label>
                            <textarea class="form-control" id="alamatInstansiAwal" value=""  name="resume_agency_address" rows="5" placeholder="alamat instansi awal"><?= old('resume_agency_address') ?></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label for="namaInstansiBaru">Nama Instansi <sub>(baru/sekarang)</sub></label>
                            <input type="text" class="form-control" id="namaInstansiBaru" name="resume_agency_new" placeholder="masukan instansi baru/sekarang"  value="<?= old('resume_agency_new') ?>">
                        </div>
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label for="alamatInstansiBaru">Alamat Instansi <sub>(baru/sekarang)</sub></label>
                            <textarea class="form-control" id="alamatInstansiBaru" name="resume_agency_address_new" rows="5" placeholder="alamat instansi baru/sekarang"  value=""><?= old('resume_agency_address_new') ?></textarea>
                        </div>
                    </div>
                    <hr class="mx-2">
                    <h6 class="text-muted">Jenis Kelamin <sup class="text-danger font-weight-bold">*</sup></h6>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="resume_gender" <?= old('resume_gender') == 'Pria' ? 'checked' : '' ?> id="jenisKelamin" value="Pria">
                            <label class="form-check-label" for="jenisKelamin">Laki - Laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" <?= old('resume_gender') == 'Perempuan' ? 'checked' : '' ?>  name="resume_gender" id="jenisKelamin2" value="Perempuan">
                            <label class="form-check-label" for="jenisKelamin2">Perempuan</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label for="noHp">No Handphone <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="text" class="form-control <?= $validation->hasError('resume_phone') ? 'is-invalid' : '' ?>" id="noHp" name="resume_phone" placeholder="+62" value="<?= old('resume_phone') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('resume_phone') ?>
                            </div>
                        </div>
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label for="email">Email <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="email" class="form-control <?= $validation->hasError('resume_email') ? 'is-invalid' : '' ?>" id="email" name="resume_email" placeholder="gln@jabar.co.id" value="<?= old('resume_email') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('resume_email') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label for="akunIg">Akun IG</label>
                            <input type="text" class="form-control" id="akunIg" name="resume_instagram" value="<?= old('resume_instagram') ?>" placeholder="@instagram">
                        </div>
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label for="akunFb">Akun FB</label>
                            <input type="text" class="form-control" id="akunFb" name="resume_facebook" value="<?= old('resume_facebook') ?>" placeholder="@facebook">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                            <label for="photo">Unggah Photo Peserta <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="file" class="form-control-file <?= $validation->hasError('resume_photo') ? 'is-invalid' : '' ?>" id="photo" name="resume_photo">
                            <small id="photo" class="form-text text-muted">
                                <ul>Ketentuan :
                                    <li>Ukuran masksimal 2MB</li>
                                    <li>Format Extensi JPG,JPEG,PNG</li>
                                </ul>
                            </small>
                            <div class="invalid-feedback">
                                <?= $validation->getError('resume_photo') ?>
                            </div>
                        </div>
                        <div class="form-group text-center col-lg-6 col-md-6 col-sm-12">
                            <img src="https://image.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg" id="photoPeserta"  alt="photoPeserta" style="width:10rem; height:10rem;">
                        </div>
                    </div>
                    <hr class="mx-2">
                    <div class="form-group">
                        <label for="kesan">Kesan <sup class="text-danger font-weight-bold">*</sup></label>
                        <textarea class="form-control" id="kesan" rows="5" name="resume_impression" placeholder="kesan mengikuti giat" value=""><?= old('resume_impression') ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="saran">Saran <sup class="text-danger font-weight-bold">*</sup></label>
                        <textarea class="form-control" id="saran" name="resume_suggestion" rows="5" value="" placeholder="saran" ><?= old('resume_suggestion') ?></textarea>
                    </div>
                    <hr class="mx-2">
                    <span>
                        <p class="font-weight-lighter"><sup class="text-danger font-weight-bold">*</sup>:harus diisi</p>
                    </span>
                    <hr class="mx-2">
                    <div class="form-group row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block">Selanjutnya</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>

    </div>

    <script type="text/javascript">
        var $ = jQuery.noConflict();
        const base_uri = "<?php echo base_url();?>";

        $(function() {

            $('#tokenPeserta').change(function() {
                var token = this.value;
                history.pushState(null, null, base_uri + '/peserta/biodata/' + token);
            });

            $('#kategori').change(function() {
                // alert(this.value);
                var pilihan = this.value;
                var options = ``;
                switch (pilihan) {
                    case '1':
                        // alert('1');
                        $('#jumlahPesarta').removeAttr('disabled');
                        $('#subKategori').html('<option readonly="true">...Lewati...</option>');
                        $('#jumlahPesarta').html('<option value="1" selected>1 Peserta</option>');
                        break;
                    case '2':
                        // alert('2');
                        $('#jumlahPesarta').removeAttr('disabled');
                        $('#jumlahPesarta').html('<option readonly="true">...Lewati...</option>');
                        options = '<option readonly="true">Pilih jumlah peserta</option>';
                        options += '<option value="2">2 Peserta</option>';
                        options += '<option value="3">3 Peserta</option>';
                        options += '<option value="4">4 Peserta</option>';
                        $('#jumlahPesarta').html(options);
                        break;
                    case '3':
                        // alert('3');
                        $('#jumlahPesarta').removeAttr('disabled');
                        $('#jumlahPesarta').html('<option readonly="true">...Lewati...</option>');
                        options = '<option readonly="true">Pilih jumlah peserta</option>';
                        options += '<option value="2">2 Peserta</option>';
                        options += '<option value="3">3 Peserta</option>';
                        options += '<option value="4">4 Peserta</option>';
                        options += '<option value="6">6 Peserta</option>';
                        $('#jumlahPesarta').html(options);
                        break;
                    case '4':
                        // alert('4');
                        attrJml ? console.log('OK') : $('#jumlahPesarta').attr('disabled', true);
                        $('#jumlahPesarta').html('<option readonly="true">Pilih jumlah peserta</option>');
                        $('#subKategori').removeAttr('disabled');
                        options = '<option readonly="true">Pilih sub kategori</option>';
                        options += '<option value="1">PAUD</option>';
                        options += '<option value="2">SD/SMP/SMA/SMK SEDERAJAT</option>';
                        $('#subKategori').html(options);
                        break;

                    default:
                        console.log(pilihan);
                        var attrSub = $('#subKategori').is(':disabled');
                        var attrJml = $('#jumlahPesarta').is(':disabled');
                        attrSub ? console.log('OK') : $('#subKategori').attr('disabled', true);
                        $('#subKategori').html('<option readonly="true">Pilih sub kategori</option>');
                        attrJml ? console.log('OK') : $('#jumlahPesarta').attr('disabled', true);
                        $('#jumlahPesarta').html('<option readonly="true">Pilih jumlah peserta</option>');
                }

            });

            $('#subKategori').change(function() {

                var pilihan = this.value;
                var options = ``;

                switch (pilihan) {
                    case '1':
                        $('#jumlahPesarta').removeAttr('disabled');
                        options += '<option value="2">2 Peserta</option>';
                        options += '<option value="3">3 Peserta</option>';
                        options += '<option value="4">4 Peserta</option>';
                        $('#jumlahPesarta').html(options);
                        break;
                    case '2':
                        $('#jumlahPesarta').removeAttr('disabled');
                        options += '<option value="9">9 Peserta</option>';
                        options += '<option value="16">16 Peserta</option>';
                        options += '<option value="23">23 Peserta</option>';
                        options += '<option value="30">30 Peserta</option>';
                        $('#jumlahPesarta').html(options);
                        break;
                    default:
                        console.log(pilihan);
                        var attrJml = $('#jumlahPesarta').is(':disabled');
                        attrJml ? console.log('OK') : $('#jumlahPesarta').attr('disabled', true);
                        $('#jumlahPesarta').html('<option readonly="true">Pilih jumlah peserta</option>');
                }

            });

            $('#nikPeserta').change(function(){
                // alert('ready');
                var token = $('#tokenPeserta').val();
                var nik = this.value;
                $.ajax({
                    type:'GET',
                    url : base_uri + '/api/get/prev-nik/' + nik + '/' + token,
                    timeout: 50000,
                    success:function(response){
                        console.log(response);
                        if(response.data.id != null){
                            alert("Data di temukan silahkan upload kembali photo ANDA !")
                            $('#prevId').val(response.data.id);
                            $('#namaPeserta').val(response.data.resume_name);
                            $('#kota').val(response.data.resume_city).change();
                            $('#kategori').val(response.data.resume_category).change();
                            (response.data.resume_subcategory != null) ? $('#subKategori').val(response.data.resume_subcategory).change() : false;
                            $('#jumlahPesarta').val(response.data.resume_participant).change();
                            $('#statusGln').val(response.data.resume_status).change();
                            $('#namaInstansiAwal').val(response.data.resume_agency);
                            $('#alamatInstansiAwal').val(response.data.resume_agency_address);
                            $('#namaInstansiBaru').val(response.data.resume_agency_new);
                            $('#alamatInstansiBaru').val(response.data.resume_agency_address_new);
                            if(response.data.resume_gender == "Pria"){
                                console.log('Pria');
                                $('#jenisKelamin').prop('checked', true);
                                $('#jenisKelamin2').prop('checked', false);
                            }else if(response.data.resume_gender == "Perempuan"){
                                console.log('Perempuan');
                                $('#jenisKelamin2').prop('checked', true);
                                $('#jenisKelamin').prop('checked', false);
                            }
                            $('#noHp').val(response.data.resume_phone);
                            $('#email').val(response.data.resume_email);
                            ($('#akunIg').val(response.data.resume_instagram) != '') ? $('#akunIg').val(response.data.resume_instagram) : $('#akunIg').val();
                            ($('#akunFb').val(response.data.resume_facebook) != '') ? $('#akunFb').val(response.data.resume_facebook) : $('#akunFb').val();
                            $('#kesan').val(response.data.resume_impression);
                            $('#saran').val(response.data.resume_suggestion);
                            var images = response.data.resume_photo;
                            var nik = response.data.resume_ids;
                            if(images == null ){
                                $('#photoPeserta').attr('src','https://image.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg')
                                // alert('default');
                            } else{
                                $('#photoPeserta').attr('src',base_uri + '/img/' + nik + '/' + images);
                                // alert('image ada');
                            }
                        }else{
                            // alert('pastikan nik & token anda !');
                            return false;
                        }
                    },
                    error: function(err){
                        console.log('Data tidak ditemukan');
                        return false;
                    }

                });

            });

        });

        function copyText(element){
            var elementText = document.querySelector(element);
            elementText.select();
            document.execCommand("copy");
            alert('Token Berhasil dicopy');
        }
    </script>

</body>

</html>