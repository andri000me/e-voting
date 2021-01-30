<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Voting</title>
    <style>
    .uppercase {
        text-transform: uppercase;
    }

    #graph {
        width: 100%;
        height: 450px;
        margin: 20px auto 0 auto;
    }
    </style>
    <!-- Custom fonts for this template-->
    <link href="<?=base_url('assets/');?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url('assets/');?>css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link rel="stylesheet" href="<?=base_url('assets/');?>vendor/chart/morris.css">
    <link rel="stylesheet" href="<?=base_url('assets/');?>vendor/chart/prettify.min.css">
    <link href="<?=base_url('assets/');?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#7109e0;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="<?=base_url('assets/img/');?>unipa.png" alt="Logo" height="50" width="50">
                </div>
                <div class="sidebar-brand-text mx-3">E-Voting BEM<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?=isset($mDashboard)?'active':'';?>">
                <a class="nav-link" href="<?=base_url('welcome');?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Daftar Menu
            </div>
            <?php if($this->session->userdata('level')=='administrator'): ?>
            <!-- Nav Item - Fakultas -->
            <li class="nav-item <?=isset($mFakultas)?'active':'';?>">
                <a class="nav-link" href="<?=base_url('fakultas');?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Fakultas</span></a>
            </li>
            <!-- Nav Item - Operator -->
            <li class="nav-item <?=isset($mOperator)?'active':'';?>">
                <a class="nav-link" href="<?=base_url('operator');?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Operator</span></a>
            </li>
            <?php endif; ?>
            <?php if($this->session->userdata('level')=='administrator' || $this->session->userdata('level')=='operator'): ?>
            <!-- Nav Item - Data Pemilih -->
            <li class="nav-item <?=isset($mPemilih)?'active':'';?>">
                <a class="nav-link" href="<?=base_url('pemilih');?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data Pemilih</span></a>
            </li>
            <?php endif; ?>
            <?php if($this->session->userdata('level')=='administrator'): ?>
            <!-- Nav Item - Data Calon -->
            <li class="nav-item <?=isset($mCalon)?'active':'';?>">
                <a class="nav-link" href="<?=base_url('calon');?>">
                    <i class="fas fa-fw fa-user-plus"></i>
                    <span>Data Calon</span></a>
            </li>
            <?php endif; ?>
            <?php if($this->session->userdata('level')=='user'): ?>
            <!-- Nav Item - Pemilihan Suara -->
            <li class="nav-item <?=isset($mPemilihan)?'active':'';?>">
                <a class="nav-link" href="<?=base_url('pemilihan');?>">
                    <i class="fas fa-fw fa-pen"></i>
                    <span>Pemilihan</span></a>
            </li>
            <?php endif; ?>
            <!-- Nav Item - Hasil Perolehan Suara -->
            <li class="nav-item <?=isset($mHasil)?'active':'';?>">
                <a class="nav-link" href="<?=base_url('hasil');?>">
                    <i class="fas fa-fw fa-chart-pie"></i>
                    <span>Hasil Perolehan Suara</span></a>
            </li>
            <?php if($this->session->userdata('level')=='administrator'): ?>
            <!-- Nav Item - Grafik Perolehan Suara -->
            <li class="nav-item <?=isset($mGrafik)?'active':'';?>">
                <a class="nav-link" href="<?=base_url('hasil/grafik');?>">
                    <i class="fas fa-fw fa-chart-pie"></i>
                    <span>Grafik Perolehan Suara</span></a>
            </li>
            <?php endif; ?>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Divider -->
            <!-- <hr class="sidebar-divider d-none d-md-block"> -->

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow"
                    style="background-color:#840ced;">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-4 d-none d-lg-inline text-white text-uppercase"><?= $this->session->username; ?></span>
                                <!-- <img class="img-profile rounded-circle" src="<?=base_url('assets/img/');?>mhs.png"> -->
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#changepasswordModal">
                                    <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ubah Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-power-off fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <?php $this->load->view($content); ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; e-Voting <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="changepasswordModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="dialog">
            <div class="modal-content">
                <form action="<?=base_url('welcome/ubah_password');?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="password">Password Baru</label>
                            <input type="hidden" name="id" value="<?=$this->session->userdata('id');?>">
                            <input type="password" class="form-control" id="password" name="password"
                                aria-describedby="importInfo" required>
                            <!-- <small id="importInfo" class="form-text text-muted">Tipe foto yang di izinkan <b>.xlsx</b>,
                            Ukuran maksimum file <b>2 MB</b>.</small> -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary float-left" type="button" data-dismiss="modal">Batal</button>
                        <button class="btn btn-primary" type="submit">Ganti Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Keluar ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Anda yakin ingin keluar dari aplikasi ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                    <a class="btn btn-danger" href="<?=base_url('welcome/logout');?>">Iya, Keluar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url('assets/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url('assets/');?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url('assets/');?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?=base_url('assets/');?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url('assets/');?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?=base_url('assets/');?>js/demo/datatables-demo.js"></script>
    <script src="<?=base_url('assets/');?>vendor/chart/morris.js"></script>
    <script src="<?=base_url('assets/');?>vendor/chart/prettify.min.js"></script>
    <script src="<?=base_url('assets/');?>vendor/chart/raphael.min.js"></script>
    <script src="https://files.codepedia.info/files/uploads/iScripts/html2canvas.js"></script>
    <script>
    $(function() {
        /*
         * BAR CHART
         * ---------
         */
        $.ajax({
            type: "GET",
            url: '<?=base_url();?>hasil/datagrafik',
            dataType: 'json',
            success: function(e) {
                chartBar(e);
            }
        });
    })

    function chartBar(data) {
        Morris.Bar({
            element: 'graph',
            data: data,
            xkey: 'x',
            ykeys: ['y'],
            labels: ['Jumlah '],
            barColors: function(row, series, type) {
                if (type === 'bar') {
                    var blue = Math.ceil(255 * row.y / this.ymax);
                    return 'rgb(0,0,' + blue + ')';
                } else {
                    return '#000';
                }
            }
        });
    }
    </script>

</body>

</html>