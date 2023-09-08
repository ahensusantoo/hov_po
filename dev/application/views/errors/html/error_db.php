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
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
  	<div class="position-relative overflow-hidden min-vh-100 d-flex align-items-center justify-content-center">
    	<div class="d-flex align-items-center justify-content-center w-100">
      		<div class="row justify-content-center w-100">
        		<div class="col-lg-4">
          			<div class="text-center">
            			<img src="<?=base_url()?>assets/admin/images/error/error.svg" alt="" class="img-fluid" width="500">
            			<h1 class="fw-semibold mb-7 fs-9">Opps!!!</h1>
            			<h4 class="fw-semibold mb-7">Halaman yang Anda cari ini tidak dapat ditemukan.</h4>
            			<a class="btn btn-primary" href="<?=base_url()?>" role="button">Kembali ke halaman utama</a>
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