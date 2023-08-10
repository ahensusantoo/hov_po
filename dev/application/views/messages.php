<?php if ($this->session->has_userdata('warning')){ ?>
	<div class="alert alert-warning alert-dismissible bg-warning text-white border-0 fade show"
      role="alert">
      	<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
      	<strong><?=$this->session->flashdata('warning'); ?></strong>
    </div>
<?php } ?>

<?php if($this->session->has_userdata('danger')){ ?>
	<div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show"
      role="alert">
      	<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
      	<strong><?=$this->session->flashdata('danger'); ?></strong>
    </div>
<?php } ?>

<?php if($this->session->has_userdata('success')){ ?>
	<div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show"
      role="alert">
      	<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
      	<strong><?=$this->session->flashdata('success'); ?></strong>
    </div>
<?php } ?>

<?php if($this->session->has_userdata('error')){ ?>
	<div class="alert alert-error alert-dismissible bg-error text-white border-0 fade show"
      role="alert">
      	<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
      	<strong><?=$this->session->flashdata('error'); ?></strong>
    </div>
<?php } ?>

<?php if($this->session->has_userdata('info')){ ?>
	<div class="alert alert-info alert-dismissible bg-info text-white border-0 fade show"
      role="alert">
      	<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
      	<strong><?=$this->session->flashdata('info'); ?></strong>
    </div>
<?php } ?>