<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Ubah Data Pemilih</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="<?=base_url('pemilih/proses_ubah');?>" method="post">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="username">NIM</label>
                        <input type="hidden" name="id_pemilih" value="<?=$pemilihbyid['id_pemilih'];?>">
                        <input type="text" class="form-control" id="username" name="nim" placeholder="ex: 201552001"
                            value="<?=$pemilihbyid['nim'];?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="ex: admin@gmail.com" value="<?=$pemilihbyid['email'];?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="ex: John Andy"
                            value="<?=$pemilihbyid['nama'];?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="hidden" name="password_lama" value="<?=$pemilihbyid['password'];?>">
                        <input type="password" class="form-control" id="password" name="password"
                            aria-describedby="passwordInfo">
                        <small id="passwordInfo" class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah
                            password</small>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="float-left">
                        <a href="<?=base_url('pemilih');?>" class="btn btn-secondary"><i class="fas fa-times"></i>
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