<!DOCTYPE html>
<html>
<head>
    <title>Import User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body class="p-5">

<div class="container p-5">
    <h3>Import Data User dari Excel</h3>
    <input type="file" id="excel_file" class="form-control mb-3" />

    <button id="uploadBtn" class="btn btn-primary">Upload & Sync</button>

    <div class="progress mt-3" style="height: 25px;">
        <div id="progressBar" class="progress-bar" style="width: 0%;">0%</div>
    </div>

    <div id="status" class="mt-2"></div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
$(function(){
    $("#uploadBtn").click(function(){
        var formData = new FormData();
        formData.append('excel_file', $("#excel_file")[0].files[0]);

        $("#status").text("Mengunggah file...");

        $.ajax({
            url: "<?= base_url('userimport/upload') ?>",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(res){
                if(res.status === 'ok'){
                    $("#status").text("Proses dimulai...");
                    processNextChunk();
                } else {
                    $("#status").text(res.message);
                }
            }
        });
    });

    function processNextChunk(){
        $.ajax({
            url: "<?= base_url('userimport/processChunk') ?>",
            type: "POST",
            success: function(res){
                if(res.status === 'ok'){
                    $("#progressBar").css("width", res.progress + "%").text(res.progress + "%");

                    if(res.done){
                        $("#status").text("Proses selesai!");
                    } else {
                        processNextChunk(); // lanjut chunk berikutnya
                    }
                } else {
                    $("#status").text(res.message);
                }
            }
        });
    }
});
</script>


</body>
</html>
