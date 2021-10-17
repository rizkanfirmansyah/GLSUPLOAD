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
    
    <div class="container p-4">

        <div class="py-4 text-center">
            <h2 class="text-uppercase">Tugas Peserta </br>(VI Antologi)</h2>
        </div>

        <div class="progress mb-3">
            <div class="progress-bar bg-success" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <div class="row">
            <div class="col">

                <!-- <form enctype='multipart/form-data' action="<?php //echo route_to('api-antologi');?>" method="post"> -->
                <form enctype='multipart/form-data' action="<?php echo base_url('/api/tugas/antologi');?>" method="post">
                    <h5 class="font-weight-bold">Diklat Literasi</h5>
                    <div class="form-group">
                        <label for="fileAntologi">Unggah Cover Buku <sup class="text-danger font-weight-bold">*</sup></label>
                        <input type="file" name="fileAntologi" id="fileAntologi" class="form-control-file">
                        <input type="hidden" name="prevNik" id="prevNik" value="<?php echo $nik ?? '' ;?>">
                        <input type="hidden" name="prevToken" id="prevToken" value="<?php echo $token ?? '' ;?>">
                        <small class="text-danger"><?= $validation->getError('fileAntologi') ?></small>
                        <small id="photo" class="form-text text-muted">
                            <ul>Ketentuan :
                                <li>Ukuran masksimal 2MB</li>
                                <li>Format Extensi JPG,JPEG,PNG</li>
                            </ul>
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="judulAntologi">Judul Buku <sup class="text-danger font-weight-bold">*</sup></label>
                        <input type="text" name="judulAntologi" id="judulAntologi" class="form-control" placeholder="Masukan judul">
                        <small class="text-danger"><?= $validation->getError('judulAntologi') ?></small>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label for="pengarangAntologi">Pengarang <sup class="text-danger font-weight-bold">*</sup></label>
                            <select name="pengarangAntologi" id="pengarangAntologi" class="form-control">
                                <option readonly="true" disabled selected value>Pilih pengarang</option>
                                <option value="1">Tunggal</option>
                                <option value="2">Kelompok</option>
                                <option value="3">Grup</option>
                            </select>
                            <small class="text-danger"><?= $validation->getError('pengarangAntologi') ?></small>
                        </div>
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label for="pengarangAntologiJml">Jumlah Peserta <sup class="text-danger font-weight-bold">*</sup></label>
                            <select name="pengarangAntologiJml" id="pengarangAntologiJml" class="form-control" disabled>
                                <option readonly="true" disabled selected value>Pilih jumlah</option>
                            </select>
                            <small class="text-danger"><?= $validation->getError('pengarangAntologiJml') ?></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jenisBuku">Jenis Buku <sup class="text-danger font-weight-bold">*</sup></label>
                        <select name="jenisBuku" id="jenisBuku" class="form-control">
                            <option readonly="true" disabled selected value>Pilih jenis</option>
                            <option value="1">Kumpulan Puisi</option>
                            <option value="2">Kumpulan Pantun</option>
                            <option value="3">Kumpulan Cerpen</option>
                            <option value="4">Kumpulan Artikel</option>
                            <option value="5">Kumpulan Best Practice</option>
                            <option value="6">Novel</option>
                            <option value="7">Non Fiksi</option>
                        </select>
                        <small class="text-danger"><?= $validation->getError('jenisBuku') ?></small>
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

    $(function(){
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
    
    </script>

</body>
</html>