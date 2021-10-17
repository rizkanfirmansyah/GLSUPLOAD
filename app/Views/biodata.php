<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLN GAREULIS - Biodata Peserta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body class="bg-light">

    <div class="container p-4">

        <div class="py-2 text-center">
            <h2>Biodata Peserta</h2>
        </div>

        <div class="row">
            <div class="col">

                <form enctype='multipart/form-data' action="<?php echo route_to('api-biodata');?>" method="POST">
                    <div class="form-row align-items-center">
                        <div class="form-group col-lg-6 col-md-6 col-sm12">
                            <label for="nikPeserta">NIK Peserta (16 Digit) <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="text" name="resume_ids" id="nikPeserta" value="<?= old('resume_ids') ?>" placeholder="Masukan NIK" class="form-control <?= $validation->hasError('resume_ids') ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                            <?= $validation->getError('resume_ids') ?>
                            </div>
                            <input type="hidden" name="prevId" id="prevId">
                        </div>
                        <div class="form-group col-lg-5 col-md-5 col-sm-11">
                            <label for="tokenPeserta">Token <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="text" name="resume_token" id="tokenPeserta" value="<?php echo $token ?? old('resume_token'); ?>" class="form-control <?= $validation->hasError('resume_token') ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                            <?= $validation->getError('resume_token') ?>
                            </div>
                        </div>
                        <div class="form-group col-1">
                            <label for="btnCopy">&nbsp;</label>
                            <button type="button" id="btnCopy" class="btn btn-primary form-control" onclick="copyText('#tokenPeserta')">Copy</button>
                        </div>
                    </div>
                    <hr class="mx-2">
                    <div class="form-group">
                        <label for="kota">Kota / Kabupaten <sup class="text-danger font-weight-bold">*</sup></label>
                        <select class="form-control <?= $validation->hasError('resume_city') ? 'is-invalid' : '' ?>" id="kota" name="resume_city" value="<?= old('resume_city') ?>">
                            <option readonly="true">Pilih Kota / Kabupaten</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('resume_city') ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
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
                        <div class="form-group col-3">
                            <label for="subKategori">Sub Kategori <sup class="text-danger font-weight-bold">*</sup></label>
                            <select class="form-control" id="subKategori" name="resume_subcategory" value="<?= old('resume_subcategory') ?>" disabled>
                                <option readonly="true">Pilih sub kategori</option>
                            </select>
                        </div>
                        <div class="form-group col-3">
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
                        <div class="form-group col-6">
                            <label for="namaInstansiAwal">Nama Instansi <sub>(awal)</sub> <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="text" class="form-control" id="namaInstansiAwal" name="resume_agency" value="<?= old('resume_agency') ?>" placeholder="masukan instansi awal">
                        </div>
                        <div class="form-group col-6">
                            <label for="alamatInstansiAwal">Alamat Instansi <sub>(awal)</sub> <sup class="text-danger font-weight-bold">*</sup></label>
                            <textarea class="form-control" id="alamatInstansiAwal" value="<?= old('resume_agency_address') ?>"  name="resume_agency_address" rows="5" placeholder="alamat instansi awal"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="namaInstansiBaru">Nama Instansi <sub>(baru/sekarang)</sub></label>
                            <input type="text" class="form-control" id="namaInstansiBaru" name="resume_agency_new" placeholder="masukan instansi baru/sekarang"  value="<?= old('resume_agency_new') ?>">
                        </div>
                        <div class="form-group col-6">
                            <label for="alamatInstansiBaru">Alamat Instansi <sub>(baru/sekarang)</sub></label>
                            <textarea class="form-control" id="alamatInstansiBaru" name="resume_agency_address_new" rows="5" placeholder="alamat instansi baru/sekarang"  value="<?= old('resume_agency_address_new') ?>"></textarea>
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
                        <div class="form-group col-6">
                            <label for="noHp">No Handphone <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="text" class="form-control <?= $validation->hasError('resume_phone') ? 'is-invalid' : '' ?>" id="noHp" name="resume_phone" placeholder="+62" value="<?= old('resume_phone') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('resume_phone') ?>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label for="email">Email <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="email" class="form-control <?= $validation->hasError('resume_email') ? 'is-invalid' : '' ?>" id="email" name="resume_email" placeholder="gln@jabar.co.id" value="<?= old('resume_email') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('resume_email') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="akunIg">Akun IG</label>
                            <input type="text" class="form-control" id="akunIg" name="resume_instagram" value="<?= old('resume_instagram') ?>" placeholder="@instagram">
                        </div>
                        <div class="form-group col-6">
                            <label for="akunFb">Akun FB</label>
                            <input type="text" class="form-control" id="akunFb" name="resume_facebook" value="<?= old('resume_facebook') ?>" placeholder="@facebook">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
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
                        <div class="form-group col-6 text-center">
                            <img src="https://image.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg" id="photoPeserta"  alt="photoPeserta" style="width:10rem; height:10rem;">
                        </div>
                    </div>
                    <hr class="mx-2">
                    <div class="form-group">
                        <label for="kesan">Kesan <sup class="text-danger font-weight-bold">*</sup></label>
                        <textarea class="form-control" id="kesan" rows="5" name="resume_impression" placeholder="kesan mengikuti giat" value="<?= old('resume_impression') ?>"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="saran">Saran <sup class="text-danger font-weight-bold">*</sup></label>
                        <textarea class="form-control" id="saran" name="resume_suggestion" rows="5" value="<?= old('resume_suggestion') ?>" placeholder="saran" ></textarea>
                    </div>
                    <hr class="mx-2">
                    <span>
                        <p class="font-weight-lighter"><sup class="text-danger font-weight-bold">*</sup>:harus diisi</p>
                    </span>
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

    <script type="text/javascript">
        var $ = jQuery.noConflict();
        const base_uri = "<?php echo base_url();?>";

        const apiUrl = 'https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=32';

        $(function() {

            $('#tokenPeserta').change(function() {
                var token = this.value;
                history.pushState(null, null, base_uri + '/peserta/biodata/' + token);
            });

            $('#kota').on('change click',function() {
                // alert('ok');
                let html = ``;
                $.ajax({
                    type: 'GET',
                    url: apiUrl,
                    timeout: 20000,
                    beforeSend: function() {
                        $('#kota').html('<option>Tunggu sebentar...</option>');
                    },
                    success: function(response) {
                        console.log('Respone OK');
                    }
                }).done(function(response) {

                    $.each(response.kota_kabupaten, function(key, value) {
                        // console.log();
                        html += `<option value="${value.nama}" data-id="${value.id}" data-subid="${value.id_provinsi}">${value.nama}</option>`;
                    });

                    $('#kota').html(html);

                })

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
                        if(response.data != null){
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
                            // $('#photo').val(response.data.resume_photo);
                            // var x = response.data.resume_photo;
                            // alert(x);
                            // $('#photo input[type="file]"').change(function(){
                            //     let fileName = e.target.files[0].x;
                            //     alert(fileName);
                            // });
                            ($('#akunIg').val(response.data.resume_instagram) != '') ? $('#akunIg').val(response.data.resume_instagram) : $('#akunIg').val();
                            ($('#akunFb').val(response.data.resume_facebook) != '') ? $('#akunFb').val(response.data.resume_facebook) : $('#akunFb').val();
                            $('#kesan').val(response.data.resume_impression);
                            $('#saran').val(response.data.resume_suggestion);
                            $('#photoPeserta').attr('src',base_uri + '/img/' + response.data.resume_photo)
                        }else{
                            alert('pastikan nik & token anda !');
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