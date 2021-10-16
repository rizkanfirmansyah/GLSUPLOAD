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

                <form enctype='multipart/form-data' action="/resume/insert" method="POST">
                    <div class="form-group">
                        <label for="kota">Kota / Kabupaten</label>
                        <select class="form-control <?= $validation->hasError('resume_city') ? 'is-invalid' : '' ?>" id="kota" name="resume_city" value="<?= old('resume_city') ?>">
                            <option selected="true" disabled value>Pilih Kota / Kabupaten</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('resume_city') ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="kategori">Kategori Peserta</label>
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
                            <label for="subKategori">Sub Kategori</label>
                            <select class="form-control" id="subKategori" name="resume_subcategory" value="<?= old('resume_subcategory') ?>" disabled>
                                <option readonly="true">Pilih sub kategori</option>
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label for="jumlahPesarta">Jumlah Peserta</label>
                            <select class="form-control" value="<?= old('resume_participant') ?>" id="jumlahPesarta" name="resume_participant" disabled>
                                <option readonly="true">Pilih jumlah peserta</option>
                            </select>
                        </div>
                    </div>
                    <hr class="mx-2">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="namaPeserta">Nama Peserta</label>
                            <input type="text" class="form-control <?= $validation->hasError('resume_name') ? 'is-invalid' : '' ?>" id="namaPeserta" name="resume_name" placeholder="nama peserta ..." value="<?= old('resume_name') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('resume_name') ?>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nikPeserta">NIK</label>
                            <input type="text" class="form-control <?= $validation->hasError('resume_identity') ? 'is-invalid' : '' ?>" id="namaPeserta" name="resume_identity" placeholder="nama peserta ..." value="<?= old('resume_identity') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('resume_identity') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="statusGln">Status GLN GAREULIS JABAR</label>
                        <select class="form-control <?= $validation->hasError('resume_status') ? 'is-invalid' : '' ?>" id="statusGln" name="resume_status" value="<?= old('resume_status') ?>">
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
                            <label for="namaInstansiAwal">Nama Instansi <sub>(awal)</sub></label>
                            <input type="text" class="form-control" id="namaInstansiAwal" name="resume_agency" value="<?= old('resume_agency') ?>" placeholder="masukan instansi awal">
                        </div>
                        <div class="form-group col-6">
                            <label for="alamatInstansiAwal">Alamat Instansi <sub>(awal)</sub></label>
                            <textarea class="form-control" id="alamatInstansiAwal" value="<?= old('resume_agency_address') ?>" name="resume_agency_address" rows="5" placeholder="alamat instansi awal"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="namaInstansiBaru">Nama Instansi <sub>(baru/sekarang)</sub></label>
                            <input type="text" class="form-control" id="namaInstansiBaru" name="resume_agency_new" placeholder="masukan instansi baru/sekarang" value="<?= old('resume_agency_new') ?>">
                        </div>
                        <div class="form-group col-6">
                            <label for="alamatInstansiBaru">Alamat Instansi <sub>(baru/sekarang)</sub></label>
                            <textarea class="form-control" id="alamatInstansiBaru" name="resume_agency_address_new" rows="5" placeholder="alamat instansi baru/sekarang" value="<?= old('resume_agency_address_new') ?>"></textarea>
                        </div>
                    </div>
                    <hr class="mx-2">
                    <h6 class="text-muted">Jenis Kelamin</h6>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="resume_gender" <?= old('resume_gender') == 'Pria' ? 'checked' : '' ?> id="jenisKelamin" value="Pria">
                            <label class="form-check-label" for="jenisKelamin">Laki - Laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" <?= old('resume_gender') == 'Perempuan' ? 'checked' : '' ?> name="resume_gender" id="jenisKelamin" value="Perempuan">
                            <label class="form-check-label" for="jenisKelamin">Perempuan</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="noHp">No Handphone</label>
                            <input type="text" class="form-control <?= $validation->hasError('resume_phone') ? 'is-invalid' : '' ?>" id="noHp" name="resume_phone" placeholder="+62" value="<?= old('resume_phone') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('resume_phone') ?>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label for="email">Email</label>
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
                    <div class="form-group">
                        <label for="photo">Unggah Photo Peserta</label>
                        <input type="file" class="form-control-file <?= $validation->hasError('resume_photo') ? 'is-invalid' : '' ?>" id="photo" name="resume_photo">
                        <div class="invalid-feedback">
                            <?= $validation->getError('resume_photo') ?>
                        </div>
                    </div>
                    <hr class="mx-2">
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="kesan">Kesan</label>
                            <textarea class="form-control" id="kesan" rows="5" name="resume_impression" placeholder="kesan mengikuti giat" value="<?= old('resume_impression') ?>"></textarea>
                        </div>
                        <div class="form-group col-6">
                            <label for="saran">Saran</label>
                            <textarea class="form-control" id="saran" name="resume_suggestion" rows="5" value="<?= old('resume_suggestion') ?>" placeholder="saran"></textarea>
                        </div>
                    </div>
                    <hr class="mx-2">
                    <span>
                        <p class="font-weight-lighter"><sup class="text-danger">*</sup>:harus diisi</p>
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

        const apiUrl = 'https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=32';

        $(function() {

            $('#kota').click(function() {
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
                        options = '<option readonly="true">Pilih jumlah peserta</option>'
                        options += '<option value="2">2 Peserta</option>';
                        options += '<option value="3">3 Peserta</option>';
                        options += '<option value="4">4 Peserta</option>';
                        $('#jumlahPesarta').html(options);
                        break;
                    case '3':
                        // alert('3');
                        $('#jumlahPesarta').removeAttr('disabled');
                        $('#jumlahPesarta').html('<option readonly="true">...Lewati...</option>');
                        options = '<option readonly="true">Pilih jumlah peserta</option>'
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
                        options = '<option readonly="true">Pilih sub kategori</option>'
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

            })

        });
    </script>

</body>

</html>