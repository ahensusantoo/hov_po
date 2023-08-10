
<?php $this->view('template/backend/header') ?>
    <!-- Preloader -->
    
    <div class="preloader">
        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico" alt="loader" class="lds-ripple img-fluid" />
    </div>
    
    <!-- Body Wrapper -->
    <div
        class="page-wrapper"
        id="main-wrapper"
        data-layout="vertical"
        data-navbarbg="skin6"
        data-sidebartype="full"
        data-sidebar-position="fixed"
         data-header-position="fixed"
    >
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="index.html" class="text-nowrap logo-img">
                        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/dark-logo.svg" class="dark-logo" width="180" alt="" />
                        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/light-logo.svg" class="light-logo"  width="180" alt="" />
                    </a>
                    <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8 text-muted"></i>
                    </div>
                </div>

                <nav class="sidebar-nav scroll-sidebar" data-simplebar>
                    <ul id="sidebarnav">
                        <!-- ============================= -->
                        <!-- Home -->
                        <!-- ============================= -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <!-- =================== -->
                        <!-- Dashboard -->
                        <!-- =================== -->
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?=base_url(set_url('dashboard'))?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-aperture"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Laporan</span>
                        </li>
                        <!-- =================== -->
                        <!-- Laporan -->
                        <!-- =================== -->
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-file-description"></i>
                                </span>
                                <span class="hide-menu">Laporan</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="./chart-apex-line.html" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">Pendapatan</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./chart-apex-line.html" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">Pendapatan</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- Sidebar End -->
      

      
        <!-- Main wrapper -->
      
        <div class="body-wrapper">
            <!-- Header Start -->
            
            <header class="app-header"> 
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse" href="javascript:void(0)">
                            <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="ti ti-search"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav quick-links d-none d-lg-flex">
                        <li class="nav-item dropdown hover-dd d-none d-lg-block">
                            <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">System
                                <span class="mt-1">
                                    <i class="ti ti-chevron-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class=" ps-7 pt-7">
                                            <div class="border-bottom">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="position-relative">
                                                            <a href="<?=base_url(set_url('users'))?>" class="d-flex align-items-center pb-9 position-relative">
                                                                <div class="d-inline-block">
                                                                    <span class="fs-2 d-block text-dark">
                                                                        Manajemen User
                                                                    </span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="position-relative">
                                                            <a href="<?=base_url(set_url('users'))?>" class="d-flex align-items-center pb-9 position-relative">
                                                                <div class="d-inline-block">
                                                                    <span class="fs-2 d-block text-dark">
                                                                        learn more information
                                                                    </span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="position-relative">
                                                            <a href="./page-user-profile.html" class="d-flex align-items-center pb-9 position-relative">
                                                                <div class="d-inline-block">
                                                                    <span class="fs-2 d-block text-dark">
                                                                        learn more information
                                                                    </span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="d-block d-lg-none">
                        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/dark-logo.svg" width="180" alt="" />
                    </div>
                    <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="p-2">
                            <i class="ti ti-dots fs-7"></i>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="javascript:void(0)" class="nav-link d-flex d-lg-none align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar" aria-controls="offcanvasWithBothOptions">
                                <i class="ti ti-align-justified fs-7"></i>
                            </a>
                            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                                <li class="nav-item dropdown">
                                    <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="d-flex align-items-center">
                                            <div class="user-profile-img">
                                                <img src="<?=base_url()?>assets/admin/images/profile/user-1.jpg" class="rounded-circle" width="35" height="35" alt="" />
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
                                        <div class="profile-dropdown position-relative" data-simplebar>
                                            <div class="py-3 px-7 pb-0">
                                                <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                                            </div>
                                            <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                                <img src="<?=base_url()?>assets/admin/images/profile/user-1.jpg" class="rounded-circle" width="80" height="80" alt="" />
                                                <div class="ms-3">
                                                    <h5 class="mb-1 fs-3"><?=$_SESSION['nama_company']?></h5>
                                                    <span class="mb-1 d-block text-dark">Owner</span>
                                                    <p class="mb-0 d-flex text-dark align-items-center gap-2">
                                                        <i class="ti ti-mail fs-4"></i> email@info.com
                                                    </p>
                                                </div>
                                            </div>
                                            <a href="<?=base_url()?>admin/auth/logout" class="btn btn-outline-primary">Log Out</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>   
            <!-- Header End -->
        
            <!-- CONTENT -->
            <?= $template ?>


        </div>
    </div>

<?php $this->view('template/backend/footer') ?>