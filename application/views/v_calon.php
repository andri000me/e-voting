<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Calon</h1>
<?php if($this->session->flashdata('berhasil')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Berhasil</strong> <?= $this->session->flashdata('berhasil'); ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif; ?>
<?php if($this->session->flashdata('gagal')): ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Gagal</strong> <?= $this->session->flashdata('gagal'); ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif; ?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?=base_url('calon/tambah_calon');?>" class="btn btn-primary btn-icon-split btn-sm">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="25">No</th>
                        <th>Calon Presma</th>
                        <th>Calon Wakil Presma</th>
                        <th>Visi & Misi</th>
                        <th>Foto Calon</th>
                        <th width="220">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n=1; foreach($calon as $c): ?>
                    <tr>
                        <td><?= $n++; ?></td>
                        <td><?= $c['calon_presma']; ?></td>
                        <td><?= $c['calon_wakil_presma']; ?></td>
                        <td><?= $c['visi_misi']; ?></td>
                        <td>
                            <img src="<?=base_url('uploads/image/');?><?=$c['gambar'];?>" alt="Foto Calon" width="100"
                                height="85">
                        </td>
                        <td>
                            <a href="<?=base_url('calon/video/');?><?=$c['id_calon'];?>"
                                class="btn btn-primary btn-sm mb-1"><i class="fas fa-video"></i> Video</a>
                            <a href="<?=base_url('calon/ubah/');?><?=$c['id_calon'];?>"
                                class="btn btn-info btn-sm mb-1"><i class="fas fa-edit"></i> Ubah</a>
                            <a href="<?=base_url('calon/hapus/');?><?=$c['id_calon'];?>"
                                class="btn btn-danger btn-sm mb-1"
                                onclick="return confirm('Anda yakin ingin menghapus data ini ?')"><i
                                    class="fas fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>