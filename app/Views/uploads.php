<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLN GAREULIS - Upload Tugas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <?php echo link_tag('css/dropzone.css') ;?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

    <?php echo script_tag('js/dropzone.js') ;?>

</head>
<body>

<div class="container p-4">
    <div class="row">
        <div class="col-md-12">
        <h2 class="title mb-3">Unggah Dokumen Anda Disini</h2>
        <form action="<?php echo route_to('upload-tugas'); ?>" enctype="multipart/form-data" class="dropzone" id="image-upload">
            <div>
            <h4>Unggah Dokumen atau Tarik Ke sini</h4>
            <span><p><sup class="text-danger">*</sup>Jenis dokumen yang di dukung</p>
                <ul>
                    <li>pdf</li>
                    <li>jpg/jpeg</li>
                    <li>png</li>
                </ul>
                <p><sup class="text-danger">*</sup>maksimal <b>2MB</b></p>
            </span>
            </div>
        </form>
        <button id="uploadFile" class="btn btn-primary mt-3">Unggah Dokumen</button>
        </div>
    </div>
</div>

<script type="text/javascript">

var $ = jQuery.noConflict();
Dropzone.autoDiscover = false;

$(function(){
    
    var myDropzone = new Dropzone(".dropzone", { 
        autoProcessQueue: false,
        maxFilesize: 1,
        acceptedFiles: ".jpeg,.jpg,.png,.gif"
    });
    
    $('#uploadFile').click(function(){
        myDropzone.processQueue();
    });

    myDropzone.on('complete', function(file){
        myDropzone.removeFile(file);
    });
    
});
</script>

</body>
</html>