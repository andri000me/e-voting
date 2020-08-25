<!-- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Data Pemilih</h1> -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <?php if($this->session->userdata('level')=='administrator' || $this->session->userdata('level')=='operator'): ?>
        <a href="<?=base_url('hasil');?>" class="btn btn-primary btn-icon-split btn-sm">
            <span class="icon text-white-50">
                <i class="fas fa-chevron-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <video src="<?=base_url('uploads/video/');?><?=$calonbyid['video'];?>" controls width="100%"
                height="500"></video>
        </div>
    </div>
</div>