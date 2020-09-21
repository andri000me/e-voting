<script>
function preview_foto(event) {

    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('viewfoto');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Ubah Data Calon</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="<?=base_url('calon/proses_ubah');?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fakultas Calon Presma</label>
                                <select class="form-control" name="fakultas_calon_presma">
                                    <?php foreach($fakultas as $f): ?>
                                    <option value="<?= $f['nama_fakultas']; ?>"
                                        <?= $f['nama_fakultas']==$calonbyid['fakultas_calon_presma']?'selected':''; ?>>
                                        <?= ucwords($f['nama_fakultas']); ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="presma">NIM Calon Presma</label>
                                <input type="text" class="form-control" id="presma" name="nim_calon_presma"
                                    value="<?=$calonbyid['nim_calon_presma'];?>" autofocus required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="presma">Nama Calon Presma</label>
                        <input type="hidden" name="id_calon" value="<?=$calonbyid['id_calon'];?>">
                        <input type="text" class="form-control" id="presma" name="calon_presma"
                            value="<?=$calonbyid['calon_presma'];?>" autofocus required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fakultas Calon Wapresma</label>
                                <select class="form-control" name="fakultas_calon_wapresma">
                                    <?php foreach($fakultas as $f): ?>
                                    <option value="<?= $f['nama_fakultas']; ?>"
                                        <?= $f['nama_fakultas']==$calonbyid['fakultas_calon_wapresma']?'selected':''; ?>>
                                        <?= ucwords($f['nama_fakultas']); ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="presma">NIM Calon Presma</label>
                                <input type="text" class="form-control" id="presma" name="nim_calon_wapresma"
                                    value="<?=$calonbyid['nim_calon_wapresma'];?>" autofocus required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="wapresma">Nama Calon Wakil Presma</label>
                        <input type="text" class="form-control" id="wapresma" name="calon_wakil_presma"
                            value="<?=$calonbyid['calon_wakil_presma'];?>" required>
                    </div>
                    <div class="form-group">
                        <label for="visi_misi">Visi Misi</label>
                        <textarea class="form-control" id="visi_misi" rows="3" name="visi_misi"
                            required><?=$calonbyid['visi_misi'];?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto_calon">Foto Calon</label>
                        <input type="hidden" name="foto_lama" value="<?=$calonbyid['gambar'];?>">
                        <input type="file" class="form-control-file" id="foto_calon" name="foto_calon"
                            aria-describedby="file_help" onchange="preview_foto(event)">
                        <small id="file_help" class="form-text text-muted">Tipe foto yang di izinkan <b>.jpg .jpeg
                                .png</b>, Ukuran maksimum foto <b>2 MB</b>.</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div style="border:1px solid;height:300px;">
                        <img src="<?=base_url('uploads/image/');?><?=$calonbyid['gambar'];?>" alt="Foto Calon"
                            width="100%" height="297" id="viewfoto">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="float-left">
                        <a href="<?=base_url('calon');?>" class="btn btn-secondary"><i class="fas fa-times"></i>
                            Batal</a>
                    </div>
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i>
                            Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>