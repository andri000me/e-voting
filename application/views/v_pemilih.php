<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Pemilih</h1>
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
<?php if($this->session->userdata('level')=='administrator'): ?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <form action="<?=base_url('pemilih/fakultas');?>" method="post">
            <div class="row">
                <div class="col-md-11">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Memilih Fakultas</label>
                        </div>
                        <select class="custom-select text-uppercase" id="inputGroupSelect01" name="fakultas">
                            <?php foreach($fakultas as $f): ?>
                            <option value="<?= $f['id_fakultas']; ?>"><?= $f['nama_fakultas']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-1">
                    <label for=""></label>
                    <button type="submit" class="btn btn-primary">Pilih</button>
                </div>
        </form>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="25">No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n=1; foreach($pemilih as $p): ?>
                    <tr>
                        <td><?= $n++; ?></td>
                        <td><?= $p['nim']; ?></td>
                        <td><?= $p['nama']; ?></td>
                        <td><?= $p['email']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php endif; ?>
<?php if($this->session->userdata('level')=='operator'): ?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?=base_url('pemilih/tambah_baru');?>" class="btn btn-primary btn-icon-split btn-sm">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah</span>
        </a>
        <a href="#" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#import">
            <span class="icon text-white-50">
                <i class="fas fa-file-import"></i>
            </span>
            <span class="text">Import</span>
        </a>
        <a href="<?=base_url('pemilih/kirim_all/'.$this->session->userdata('id_fakultas'));?>"
            class="btn btn-primary btn-icon-split btn-sm float-right">
            <span class="icon text-white-50">
                <i class="fas fa-envelope"></i>
            </span>
            <span class="text">Kirim Email ke Semua</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="25">No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th width="325">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n=1; foreach($pemilihbyfakultas as $pf): ?>
                    <tr>
                        <td><?= $n++; ?></td>
                        <td><?= $pf['nim']; ?></td>
                        <td><?= $pf['nama']; ?></td>
                        <td><?= $pf['email']; ?></td>
                        <td>
                            <a href="<?=base_url('pemilih/kirim/');?><?=$pf['id_pemilih'];?>"
                                class="btn btn-primary btn-sm mb-1"><i class="fas fa-envelope"></i> Kirim <?=$pf['mail_sent']!=0?'<i
                                    class="fas fa-check"></i>':'';?></a>
                            <a href="<?=base_url('pemilih/ubah/');?><?=$pf['id_pemilih'];?>"
                                class="btn btn-info btn-sm mb-1"><i class="fas fa-edit"></i> Ubah</a>
                            <a href="<?=base_url('pemilih/reset/');?><?=$pf['id_pemilih'];?>"
                                class="btn btn-warning btn-sm mb-1"
                                onclick="return confirm('Password anda akan diubah menjadi NIM, Anda yakin ingin mereset ulang password ?')"><i
                                    class="fas fa-key"></i> Reset</a>
                            <a href="<?=base_url('pemilih/hapus/');?><?=$pf['id_pemilih'];?>"
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


<!-- Modal Import -->
<div class="modal fade" id="import" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?=base_url('pemilih/import');?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Import Pemilih</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <p>Silah unduh format file import <a href="<?=base_url('uploads/excel/');?>format.xlsx"
                                target="_blank">Di
                                Sini</a></p>
                        <label for="username">File Excel</label>
                        <input type="file" class="form-control-file" id="username" name="import_file"
                            aria-describedby="importInfo" required>
                        <small id="importInfo" class="form-text text-muted">Tipe foto yang di izinkan <b>.xlsx</b>,
                            Ukuran maksimum file <b>2 MB</b>.</small>
                    </div>
                </div>
                <div class="modal-footer float-left">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i>
                        Batal</button>
                </div>
                <div class="modal-footer float-right">
                    <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i>
                        Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>