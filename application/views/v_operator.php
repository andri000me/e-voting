<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Operator</h1>
<?php if($this->session->flashdata('berhasil')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Berhasil</strong> <?= $this->session->flashdata('berhasil'); ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif; ?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#staticBackdrop">
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
                        <th>Nama Fakultas</th>
                        <th>Username</th>
                        <th width="100">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n=1; foreach($operator as $o): ?>
                    <tr>
                        <td><?= $n++; ?></td>
                        <td><?= ucwords($o['nama_fakultas']); ?></td>
                        <td><?= $o['username']; ?></td>
                        <td>
                            <a href="<?=base_url('operator/hapus/');?><?=$o['id_admin'];?>"
                                class="btn btn-danger btn-sm"
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

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?=base_url('operator/tambah');?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Operator</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="fakultas">Fakultas</label>
                        <select class="form-control" id="fakultas" name="id_fakultas">
                            <?php foreach($fakultas as $f): ?>
                            <option value="<?=$f['id_fakultas'];?>"><?= ucwords($f['nama_fakultas']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
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