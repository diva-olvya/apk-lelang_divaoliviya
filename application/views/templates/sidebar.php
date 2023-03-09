<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

                <div class="sidebar-brand-text mx-3"><i class="fas fa-duotone fa-car"></i> APP LELANG</div>
            </a>    

            <!-- Divider -->
            <hr class="sidebar-divider my-2">
            <!-- Heading -->
            <div class="sidebar-heading">
                DASHBOARD
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/dashboard/'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data Administrator
            </div>

             <!-- Nav Item - Utilities Collapse Menu -->
             <li class="nav-item">
             <a class="nav-link collapsed" href="<?= base_url('admin/dataadmin'); ?>" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Administrator</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pendataan Petugas:</h6>
                        <a class="collapse-item" href="<?= base_url('admin/dataadmin'); ?>">Admin</a>
                        <a class="collapse-item" href="<?= base_url('admin/datamasyarakat'); ?>">Masyarakat</a>
                        <!-- <a class="collapse-item" href="<?= base_url('admin/gantipassword'); ?>">Ganti Password</a> -->
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data Barang
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/databaranglelang/') ?> ">
                <i class="fas fa-fw fa-list"></i>
                    <span>Barang </span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data Lelang
            </div>

             <!-- Nav Item - Tables -->
             <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/datalelang') ?> ">
                <i class="fas fa-fw fa-folder"></i>
                    <span>Data Lelang</span></a>
            </li>



           <!-- Divider -->
           <hr class="sidebar-divider">

           <div class="sidebar-heading">
                Generate Laporan
            </div>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('admin/laporan'); ?>" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-money-check-alt"></i>
            <span>Generate Laporan</span>
             </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Laporan</h6>
                        <a class="collapse-item" href="<?= base_url('admin/laporan'); ?>">Laporan Lelang</a>
                        <a class="collapse-item" href="<?= base_url('admin/datamasyarakat/cetak_laporan'); ?>">Laporan Masyarakat</a>
                        <a class="collapse-item" href="<?= base_url('admin/databaranglelang/cetak_laporan'); ?>">Laporan Barang</a>
                </div>
            </div>
        </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout') ?> ">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>


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
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <h4 class="font-weight-bold">VIALelang Online</h4>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">







                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Selamat Datang <?= $this->session->userdata('username')  ?> <i class="fas fa-fw fa-user"></i></span>
                                
                                <!-- <img class="img-profile rounded-circle" src="  <?= base_url('assets/photo/') . $this->session->userdata('photo') ?>"> -->
                              
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                
