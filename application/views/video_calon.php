<script>
function preview_video(event) {

    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('viewfoto');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Video Calon</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="<?=base_url('calon/upload_video');?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="video_calon">Pilih Video Calon</label>
                        <input type="hidden" name="id_calon" value="<?=$calonbyid['id_calon'];?>">
                        <input type="file" class="form-control-file" id="video_calon" name="video_calon"
                            aria-describedby="file_help" onchange="preview_video(event)">
                        <small id="file_help" class="form-text text-muted">Tipe video yang di izinkan <b>.mp4 .mkv</b>,
                            Ukuran maksimum foto <b>130 MB</b>.</small>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div style="border:1px solid;height:300px;">
                        <video src="<?=base_url('uploads/video/');?><?=$calonbyid['video'];?>" id="viewfoto" controls
                            width="100%" height="300"></video>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="float-left">
                        <a href="<?=base_url('calon');?>" class="btn btn-secondary"><i class="fas fa-times"></i>
                            Batal</a>
                    </div>
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i>
                            Unggah</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>