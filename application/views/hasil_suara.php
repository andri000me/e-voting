<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Pemilih</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?=base_url('hasil');?>" class="btn btn-primary btn-icon-split btn-sm">
            <span class="icon text-white-50">
                <i class="fas fa-chevron-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
    </div>
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