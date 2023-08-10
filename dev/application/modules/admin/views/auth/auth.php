<?php global $SConfig; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Title -->
    <title><?=$SConfig->_site_name?></title>
    <!-- Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mordenize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="<?=base_url()?>assets/admin/images/logos/favicon.ico" />
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="<?=base_url()?>assets/admin/libs/owl.carousel/dist/assets/owl.carousel.min.css">
    <!-- Core Css -->
    <link rel="stylesheet" href="<?=base_url()?>assets/admin/css/style.min.css" />
</head>
<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="<?=base_url()?>uploads/images/pos/logo.png" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-4 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="javascript:void(0)" class="text-nowrap logo-img text-center d-block mb-5 w-100">
                                    <img src="<?=base_url()?>uploads/images/pos/logo_hov.jpg" width="80" alt="Logo" style="border-radius: 5px;">
                                </a>
                                <div class="position-relative text-center my-4">
                                    <p class="mb-0 fs-4 px-3 d-inline-block bg-white text-dark z-index-5 position-relative">Login</p>
                                    <span class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
                                </div>
                                <?php $this->view('messages') ?>
                                <form action="<?=base_url('admin/auth/proses_login') ?>" method="post">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" name="username" class="form-control" id="username" aria-describedby="Username" placeholder="Username">
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" aria-describedby="Password" placeholder="Password">
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4"></div>
                                    <button type="submit" name="login" class="btn btn-primary w-100 py-8 mb-4 rounded-2">
                                        Login
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Import Js Files -->
    <script src="<?=base_url()?>assets/admin/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/admin/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="<?=base_url()?>assets/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- core files -->
    <script src="<?=base_url()?>assets/admin/js/app.min.js"></script>
    <script src="<?=base_url()?>assets/admin/js/app.minisidebar.init.js"></script>
    <script src="<?=base_url()?>assets/admin/js/app-style-switcher.js"></script>
    <script src="<?=base_url()?>assets/admin/js/sidebarmenu.js"></script>
    
    <script src="<?=base_url()?>assets/admin/js/custom.js"></script>
    <!-- current page js files -->
    <script src="<?=base_url()?>assets/admin/libs/owl.carousel/dist/owl.carousel.min.js"></script>
</body>
</html>