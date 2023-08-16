<div class="container-fluid">
    <H2><?=$title?></H2>

    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <div id="pesan_notifikasi"></div>
                	<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                  		<div class="btn-group me-2 mb-2" role="group" aria-label="First group">
                    		<button type="button" class="btn btn-primary" id="add_record">
                      			<i class="ti ti-plus fs-4"></i> Tambah
                    		</button>
                    		<button type="button" class="btn btn-warning" id="edit_record">
                      			<i class="ti ti-pencil fs-4"></i> Ubah
                    		</button>
                    		<button type="button" class="btn btn-danger" id="delete_record">
                      			<i class="ti ti-trash fs-4"></i> Hapus
                    		</button>
                  		</div>
                  	</div>
                  	<style type="text/css" media="screen">
                  		label{
                  			font-size: 12px !important;
                  		}
                  		.group-input{
                  			padding-bottom: 5px !important;
                  		}
                  	</style>
                  	<form action="" id="MyForm" method="post" accept-charset="utf-8">
	                  	<div class="row">
	                  		<input type="hidden" name="id" id="id" value="">
	                  		<div class="col-lg-6">
	                  			<div class="group-input" id="notifikasi_nama">
			                  		<label for="nama">Nama Lengkap</label>
			                  		<input type="text" name="nama" id="nama" class="form-control form-control-sm" placeholder="Nama Lengkap" disabled/>
			                  	</div>
			                  	<div class="group-input" id="notifikasi_username">
			                  		<label for="username">Username</label>
			                  		<input type="text" name="username" id="username" class="form-control form-control-sm" placeholder="Username" disabled/>
			                  	</div>
			                  	<div class="group-input" id="notifikasi_email">
			                  		<label for="email">E-mail</label>
			                  		<input type="text" name="email" id="email" class="form-control form-control-sm" placeholder="E-mail" disabled/>
			                  	</div>		
	                  		</div>
	                  		<div class="col-lg-6">
	                  			<div class="group-input" id="notifikasi_password">
			                  		<label for="password">Kata Sandi</label>
			                  		<input type="password" name="password" id="password" class="form-control form-control-sm" placeholder="Kata Sandi" disabled/>
			                  	</div>
			                  	<div class="group-input" id="notifikasi_passwordConf">
			                  		<label for="passwordConf">Kata Sandi Konfirmasi</label>
			                  		<input type="password" name="passwordConf" id="passwordConf" class="form-control form-control-sm" placeholder="Kata Sandi Konfirmasi" disabled/>
			                  	</div>
			                  	<div class="group-input" id="notifikasi_stts_aktif">
			                  		<label for="stts_aktif">Status Aktif</label>
			                  		<div class="custom-control custom-checkbox" style="margin-top: 5px;">
	            						<input type="checkbox" name="stts_aktif" class="" id="stts_aktif" disabled>
	            						<label class="custom-control-label" for="stts_aktif">Aktif</label>
	            					</div>
	        					</div>
	                  		</div>
	                  		<div class="col-lg-12 mt-2">
	                  			<button type="submit" id="submit_button" class="btn btn-success" style="float:right;" disabled>
	                  				<i class="ti ti-save fs-4"></i> Simpan
	                  			</button>
	                  		</div>
	                  	</div>
                  	</form>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 ms-auto">
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Pencarian"/>
                            </div>
                            <div class="mb-3">
                                
                                <button type="button" class="btn btn-primary btn-block">CARI</button>
                            </div>
                        </div>
                    </div>
                	<div class="table-resposive">
                		<table class="table table-bordered">
                			<thead>
                				<tr>
                					<th width="5%">no</th>
                					<th>username</th>
                					<th>nama</th>
                                    <th width="10%" class="text-center">Aktif</th>
                				</tr>
                			</thead>
                			<tbody id="tbl_users">
                				
                			</tbody>
                		</table>
                	</div>
                	<nav aria-label="Page navigation example">
                      	<ul class="pagination justify-content-end">
                        	<li class="page-item">
                          		<a class="page-link link" href="#" aria-label="Previous">
                            		<span aria-hidden="true">
                              			<i class="ti ti-chevrons-left fs-4"></i>
                            		</span>
                          		</a>
                        	</li>
                        	<li class="page-item">
                          		<a class="page-link link" href="#">1</a>
                        	</li>
                        	<li class="page-item">
                          		<a class="page-link link" href="#">2</a>
                        	</li>
                        	<li class="page-item">
                          		<a class="page-link link" href="#">3</a>
                        	</li>
                        	<li class="page-item">
                          		<a class="page-link link" href="#" aria-label="Next">
                            		<span aria-hidden="true">
                              			<i class="ti ti-chevrons-right fs-4"></i>
                            		</span>
                          		</a>
                        	</li>
                      	</ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

	$(document).ready(function(){
		$("#tbl_users").empty();
		load_record();
	})

	function load_record(page = 1, search = null){
		$.ajax({
            url : '<?=base_url("admin/users/get_record")?>',
            type : "post",
            data: {},
            dataType:"json",
            beforeSend:function(){
                $('.preloader').show()
            },
            complete:function(){
                $('.preloader').hide()
            },
            success:function(data){
            	var html = ''
            	if(data.record.length > 0 ){
            		$.each(data.record, function( key, value ) {
					  	html += `
					  		<tr>
                            <td>${key + 1}</td>
                            <td>${value.nama_users}</td>
                            <td>${value.username_users}</td>
                            <td class="text-center">${badge(value.stts_aktif_users == 1 ? 'success' : 'danger', value.stts_aktif_users == 1 ? 'aktif' : 'non aktif')}</td>
                        </tr>
					  	`
					});
            	}else{
            		html += `
            			<tr>
        					<td colspan="3" class="text-center">Belum ada data</td>
        				</tr>
            		`
            	}
            	$("#tbl_users").html(html)
            }
        })
	}


	$("#add_record, #edit_record").click(function(){
	    var action = $(this).attr("id");
        var id = $('#id').val()
        // alert(); 

	    // Mengaktifkan input dan mengosongkan form
	    $("#MyForm input:disabled").add("#submit_button").prop("disabled", false);
	    $("#MyForm")[0].reset();

	    if (action == "edit_record") {
            //harus ada data yang di pilih terlebih dahulu
            if(id == "" || id == null){
                $('#pesan_notifikasi').prepend(notifikasi('danger', 'Data belum di pilih'));
            }
        }
	});



	/* ******************************************* */
    /*         BUTTON SAVE CREATE UPDATE           */
    /* ******************************************* */
    $('#MyForm').submit(function(e){
        e.preventDefault()
        var dataToSend = new FormData(this)
        $.ajax("<?=base_url(set_url('users/add_update'))?>",{
            dataType : 'json',
            type     : 'post',
            data     : dataToSend,
            processData :false,
            contentType :false,
            cache       :false,
            beforeSend:function(){
                $('.preloader').show()
            },
            complete:function(){
                $('.preloader').hide()
            },
            success  : function(data){
                $('#pesan_notifikasi div').remove()
                $('#MyForm').find('.invalid-feedback').remove()
                $('#MyForm').find('.is-invalid').removeClass('is-invalid')
                if(typeof(data.file) != "undefined" && data.file !== null){
                    if(data.file == false){
                        $.each(data.error_file, function(key, value){
                            $('#'+key).addClass('is-invalid')
                            $('#notifikasi_'+key).append(`<div class="invalid-feedback">`+value+`</div>`)
                        })
                    }else{
                        $.each(data.error_file, function(key, value){
                            $('#'+key).removeClass('is-invalid')
                            $('#notifikasi_'+key).append('')
                        })
                    }
                }else{
                    if(data.status){
                        load_record()
                        $('#pesan_notifikasi').prepend(notifikasi('success', data.pesan));
                        $("#MyForm")[0].reset();
                        $("html, body").animate({ scrollTop: 0 }, "slow");

                    }else{
                        if(data.errors){
                            $.each(data.errors, function(key, value){
                            	// alert(key)
                                $('#'+key).addClass('is-invalid')
                                $('#notifikasi_'+key).append(`<div class="invalid-feedback">`+value+`</div>`)
                            })
                        }else{
                            if(data.status == false){
                                $('#pesan_notifikasi').prepend(notifikasi('danger', 'Terjadi kesalahan, silahkan untuk mencoba kemabli!'));
                            }
                            $.each(data.errors, function(key, value){
                                $('#'+key).removeClass('is-invalid')
                                $('#notifikasi_'+key).append('')
                            })
                        }
                    }
                    // setTimeout(
                    //     function(){
                    //     //do something special
                    //     $('#pesan_notifikasi div').remove()
                    // }, 9000);
                }
            }
        })
    })
</script>