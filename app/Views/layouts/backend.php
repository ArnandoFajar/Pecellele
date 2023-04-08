<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Pecel Lele Mbok Citro</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href=<?= base_url("assets/backend/plugins/fontawesome-free/css/all.min.css"); ?>>
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href=<?= base_url("assets/backend/dist/css/adminlte.min.css"); ?>>
    <!-- DataTables -->
    <link rel="stylesheet" href=<?= base_url("assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"); ?>>
    <link rel="stylesheet" href=<?= base_url("assets/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css"); ?>>
    <link rel="stylesheet" href=<?= base_url("assets/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"); ?>>

</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-black navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                        Fullscreen
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('logout'); ?>" >
                        <i class="fas fa-user"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url('admin'); ?>" class="brand-link">
                <img src="<?= base_url('assets/backend/dist/img/kosong.jpg'); ?> " alt="pecel lele Mbok Citro" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"><strong>Pecel lele Mbok Citro</strong></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('assets/backend/dist/img/user8-128x128.jpg'); ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Administrator</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="<?= base_url('admin'); ?>" class="nav-link <?= $title == 'dashboard' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/menu'); ?>" class="nav-link <?= $title == 'menu' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Menu
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/galeri'); ?>" class="nav-link <?= $title == 'galeri' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-image"></i>
                                <p>
                                    Galeri
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/reservasi'); ?>" class="nav-link <?= $title == 'reservasi' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-envelope"></i>
                                <p>
                                    Reservasi
                                    <span class="badge badge-info right totalBookingSidebar"><?= isset($totalBookingSidebar) ? $totalBookingSidebar : ''  ?></span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content  -->
            <?= $this->renderSection('content') ?>
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>&copy; 2020-2023 Pecel lele Mbok Citro .</strong>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src=<?= base_url("assets/backend/plugins/jquery/jquery.min.js"); ?>></script>
    <!-- Bootstrap -->
    <script src=<?= base_url("assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"); ?>></script>
    <!-- AdminLTE -->
    <script src=<?= base_url("assets/backend/dist/js/adminlte.js"); ?>></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src=<?= base_url("assets/backend/plugins/chart.js/Chart.min.js"); ?>></script>
    <script src=<?= base_url("assets/backend/dist/js/pages/dashboard3.js"); ?>></script>
    
    <!-- DataTables  & Plugins -->
<script src=<?= base_url("assets/backend/plugins/datatables/jquery.dataTables.min.js"); ?>></script>
<script src=<?= base_url("assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"); ?>></script>
<script src=<?= base_url("assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"); ?>></script>
<script src=<?= base_url("assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"); ?>></script>
<script src=<?= base_url("assets/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js"); ?>></script>
<script src=<?= base_url("assets/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"); ?>></script>
<script src=<?= base_url("assets/backend/plugins/jszip/jszip.min.js"); ?>></script>
<script src=<?= base_url("assets/backend/plugins/pdfmake/pdfmake.min.js"); ?>></script>
<script src=<?= base_url("assets/backend/plugins/pdfmake/vfs_fonts.js"); ?>></script>
<script src=<?= base_url("assets/backend/plugins/datatables-buttons/js/buttons.html5.min.js"); ?>></script>
<script src=<?= base_url("assets/backend/plugins/datatables-buttons/js/buttons.print.min.js"); ?>></script>
<script src=<?= base_url("assets/backend/plugins/datatables-buttons/js/buttons.colVis.min.js"); ?>></script>

    <!-- script  -->
    <?= $this->renderSection('script') ?>
</body>

</html>