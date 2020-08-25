<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Hasil Pemungutan Suara</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="row">
            <?php foreach($daftar_calon as $key => $dc): ?>
            <div class="col-md-4 mb-4">
                <div class="card" style="width: 18rem;">
                    <img src="<?=base_url('uploads/image/');?><?=$dc['gambar'];?>" class="card-img-top" alt="Foto Calon"
                        width="100%" height="150">
                    <div class="card-body">
                        <h4 class="card-title text-center border-left-info">
                            <?=$dc['calon_presma'].' & '.$dc['calon_wakil_presma'];?>
                        </h4>
                        <p class="card-text"><?=$dc['visi_misi'];?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Total Suara <span
                                class="badge badge-primary float-right"><?= $dc['total']; ?>
                                Suara</span>
                        </li>
                    </ul>
                    <div class="card-footer">
                        <?php if($this->session->userdata('level')=='administrator' || $this->session->userdata('level')=='operator'): ?>
                        <a href="<?=base_url('hasil/suara/');?><?=$dc['id_calon'];?>"
                            class="badge badge-secondary float-left"><i class="fas fa-bullhorn"></i> Lihat
                            Suara</a>
                        <a href="<?=base_url('hasil/video/');?><?=$dc['id_calon'];?>"
                            class="badge badge-dark float-right"><i class="fas fa-video"></i>
                            Nonton Video</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>