<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Detail & Hasil Suara Pasangan Calon
    <b><?=$calon['calon_presma'].' & '.$calon['calon_wakil_presma'];?></b>
</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?=base_url();?><?=$this->session->level=='user'?'pemilihan':'calon';?>"
            class="btn btn-primary btn-icon-split btn-sm">
            <span class="icon text-white-50">
                <i class="fas fa-chevron-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h4>Calon Presma</h4>
                <table>
                    <tr>
                        <td>Nomor Induk Mahasiswa</td>
                        <td>:</td>
                        <td><?= $calon['nim_calon_presma']; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td><?= $calon['calon_presma']; ?></td>
                    </tr>
                    <tr>
                        <td>Fakultas</td>
                        <td>:</td>
                        <td><?= $calon['fakultas_calon_presma']; ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <h4>Calon Wakil Presma</h4>
                <table>
                    <tr>
                        <td>Nomor Induk Mahasiswa</td>
                        <td>:</td>
                        <td><?= $calon['nim_calon_wapresma']; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td><?= $calon['calon_wakil_presma']; ?></td>
                    </tr>
                    <tr>
                        <td>Fakultas</td>
                        <td>:</td>
                        <td><?= $calon['fakultas_calon_wapresma']; ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-12 mt-4">
                <h4>Visi dan Misi</h4>
                <p><?= $calon['visi_misi']; ?></p>
            </div>
        </div>
    </div>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="25">No</th>
                        <th>NIM</th>
                        <!-- <th>Nama Lengkap</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php $n=1; foreach($suara_calon as $key => $sc): ?>
                    <tr>
                        <td><?= $n++; ?></td>
                        <td><?= $sc['nim']; ?></td>
                        <!-- <td><?= ucwords($sc['nama']); ?></td> -->
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>