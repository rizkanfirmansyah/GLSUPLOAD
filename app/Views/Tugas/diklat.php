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
            <h2 class="text-uppercase">Tugas Peserta </br>(I Diklat)</h2>
        </div>

        <!-- <div class="progress mb-3" style="height: 10px;"> -->
        <div class="progress mb-3">
            <div class="progress-bar bg-success" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <div class="row">
            <div class="col-12">
                <h5 class="font-weight-bold">Diklat Literasi</h5>
                <p id="diklatText">Dokumen yang sudah diunggah <span id="coreUpload" class="font-weight-bold">0</span>
                <hr class="mx-2">
                    <div class="form-group row">
                        <div class="col-12">
                            <button type="button" class="btn btn-secondary btn-block btn-sm" id="btnTambah" data-number="1" onclick="addForm()">Tambah Form</button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <a href="<?php echo route_to('tugas-baca-buku',$nik ?? '', $token ?? '');?>" class="btn btn-info">Selanjutnya</a>
                        </div>
                    </div>
                <hr class="mx-2">
            </div>

            <div class="col-12" id="addForm">
            </div>

        </div>

    </div>

    <script type="text/javascript">

        var $ = jQuery.noConflict();

        const baseUrl = '<?php echo base_url(); ?>';
        const api_uris = "<?php echo route_to('api-count-diklat');?>"
        const api_uris2 = "<?php echo route_to('api-diklat');?>"

        const nik = "<?php echo $nik ?? '' ;?>"
        const token = "<?php echo $token ?? '' ;?>"

        $(function(){
            countDiklat();

            $('#btnTambah').click(function(e){
                e.preventDefault();
                var number = Number($(this).data('number'));
                // console.log(number);
                $(this).data('number',number+1);
                // $('#coreForm').children().clone().appendTo('#addForm');
                // $('#addForm').append(forms);
                // alert('ok');
            });

        });

        function addForm(){
            var number = Number($('#btnTambah').data('number'));
            let forms = `
                <form enctype='multipart/form-data' id="diklatForm${number}">
                    <input type="hidden" name="prevId" id="prevId" value="<?php echo $nik ?? ''; ?>">
                    <input type="hidden" name="prevToken" id="prevToken" value="<?php echo $token ?? ''; ?>">
                    <div class="form-group">
                        <label for="fileDiklat">Unggah Diklat Literasi</label>
                        <input type="file" name="fileDiklat" id="fileDiklat" class="form-control-file">
                        <small id="photo" class="form-text text-muted">
                            <ul>Ketentuan :
                                <li>Ukuran maksimal 2MB</li>
                                <li>Format Extensi PDF, PNG, JPEG/JPG</li>
                            </ul>
                        </small>
                        <small class="text-danger"><?php echo session()->getFlashdata('error') ?></small> 
                    </div>
                    <hr class="mx-2">
                    <div class="form-group row text-center">
                        <div class="col-6">
                            <input type="submit" class="btn btn-primary" id="btnInsert${number}" onclick="submitForm(${number})" value="Simpan">
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-danger" id="btnRemove${number}" onclick="removeForm(${number})">Hapus</button>
                        </div>
                    </div>
                    <hr class="mx-2">
                </form>
            `;
            $('#addForm').append(forms);
        }

        function submitForm(id = null){
            $(`#diklatForm${id}`).submit(function(e){
                e.preventDefault();
                var formData = new FormData(this);
                formData.append('nik', nik);
                formData.append('token', token);
                $.ajax({
                    url: api_uris2,
                    type: 'post',
                    data:  formData,
                    contentType: false,
                    cache: false,
                    processData:false,
                    async: false,
                    beforeSend: function(response){
                        $(`#btnInsert${id}`).prop('disabled',true);
                        $(`#btnRemove${id}`).prop('disabled',true);
                        setTimeout(3000);
                    },
                    success : function(response){
                        // console.log(response);
                        if(response.status == 200){
                            alert(response.msg);
                            countDiklat();
                        }else{
                            alert(response.msg);
                            $(`#btnInsert${id}`).prop('disabled',false);
                            $(`#btnRemove${id}`).prop('disabled',false);
                            // throw new Error("ERROR");
                            // return false;
                        }
                    },
                    error : function(response){
                        alert(response.msg);
                        setTimeout(3000);
                        // return false;
                        // console.log(response.msg);
                        // $(`#btnInsert${id}`).prop('disabled',false);
                        // $(`#btnRemove${id}`).prop('disabled',false);
                        // return false;
                    }
                });
                e.stopImmediatePropagation();
            });
            return false;
        }

        function countDiklat(){
            $.ajax({
                url: api_uris,
                method: 'POST',
                data : {
                    nik:nik,
                    token:token,
                },
                success: function(response){
                    // console.log(response.data);
                    if(response.data < 9){
                        $('#coreUpload').text(response.data);
                    }
                    if(response.data == 9){
                        $('#diklatText').text('Form terisi, anda dapat melewati form ini');
                        $('#btnDiklat').prop('disabled', true);
                        $('#fileDiklat').prop('disabled', true);
                        $('#diklatText').append('<p>Anda dapat melewati form, silahkan klik tombol <span class="btn btn-info btn-sm">Lewati</span></p>');
                        $('#coreContent').append(`<a href="${baseUrl + '/peserta/tugas/baca-buku/'+nik+'/'+token}" class="btn btn-info">Lewati</a>`);
                    }
                }
            });
        }

        function removeForm(id = null){
            $(`#diklatForm${id}`).remove();
        }

    </script>

</body>
</html>