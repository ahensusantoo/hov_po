<?php $this->view('template/auth/header') ?>
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
<?php $this->view('template/auth/footer') ?>