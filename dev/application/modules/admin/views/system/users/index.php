<link rel="stylesheet" href="<?=base_url()?>assets/admin/libs/sweetalert2/dist/sweetalert2.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/admin/libs/select2/dist/css/select2.min.css">

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
                    <form action="" id="MyForm" method="post" autocomplete="off" accept-charset="utf-8">
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
                                    <input type="password" name="password" id="password" class="form-control form-control-sm" placeholder="Kata Sandi" autocomplete="off" disabled/>
                                </div>
                                <div class="group-input" id="notifikasi_passwordConf">
                                    <label for="passwordConf">Kata Sandi Konfirmasi</label>
                                    <input type="password" name="passwordConf" id="passwordConf" class="form-control form-control-sm" placeholder="Kata Sandi Konfirmasi" autocomplete="off" disabled/>
                                </div>

                                <style type="text/css" media="screen">
                                    .group-input-select2 {
                                        position: relative;
                                        margin-bottom: 10px;
                                        margin-top: 20px;
                                    }

                                    .group-input-select2 label {
                                        position: absolute;
                                        top: -20px; /* Menyesuaikan jarak label dari input */
                                        background-color: #fff;
                                        padding: 0 5px;
                                    }

                                    .group-input-select2 select:disabled {
                                        background-color: red !important;
                                    }
                                </style>
                                <div class="group-input-select2" id="notifikasi_divisi">
                                    <label for="divisi">Divisi</label>
                                    <select name="divisi" id="divisi" class="select2 form-control form-control-sm custom-select" style="width: 100%; height: 36px;" disabled>
                                        <option value="">...</option>
                                        <?php foreach($divisi as $key => $value) { ?>
                                            <option value="<?=$value->id_divisi?>"><?=$value->nama_divisi?></option>
                                        <?php } ?>
                                    </select>
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
                        <div class="col-lg-4 col-md-4 col-6 ms-auto">
                            <div class="mb-3">
                                <input type="text" name="pencarian" id="pencarian" class="form-control" placeholder="Pencarian"/>
                            </div>
                        </div>
                    </div>
                    <div class="table-resposive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="5%">no</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Divisi</th>
                                    <th width="10%" class="text-center">Aktif</th>
                                </tr>
                            </thead>
                            <tbody id="tbl_list">
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <nav class="">
                                Record : <span id="total_data"></span>
                            </nav>
                        </div>
                        <div class="col-6">
                            <nav aria-label="Page navigation" id="pagination"></nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?=base_url()?>assets/admin/libs/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="<?=base_url()?>assets/admin/libs/select2/dist/js/select2.full.min.js"></script>
<script src="<?=base_url()?>assets/admin/libs/select2/dist/js/select2.min.js"></script>

<script>

    $(document).ready(function(){
        $(".select2").select2();
        $("#tbl_list").empty();
        load_record();
    })

    function load_record(page = 1, search = null){
        $.ajax({
            url : '<?=base_url(set_url($this->uri->segment(2)."/get_record"))?>',
            type : "post",
            data: {
                page : page,
                search : search
            },
            dataType:"json",
            beforeSend:function(){
                $('.preloader').show()
            },
            complete:function(){
                $('.preloader').hide()
            },
            success:function(data){
                $("#MyForm")[0].reset();
                $("#MyForm input, #MyForm textarea, #MyForm select").prop("disabled", true);
                $("#submit_button").prop("disabled", true);
                var html = ''
                if(data.record.length > 0 ){
                    var no = ((parseInt(data.page-1))*parseInt(data.perpage)+1);
                    $.each(data.record, function( key, value ) {
                        html += `
                            <tr data-id_record="`+value.id_users+`" class="table_edit">
                                <td>${ no ++ }</td>
                                <td>`+value.nama_users+`</td>
                                <td>`+value.username_users+`</td>
                                <td>`+value.nama_divisi+`</td>
                                <td class="text-center">`+badge(value.stts_aktif_users == 1 ? 'success' : 'danger', value.stts_aktif_users == 1 ? 'aktif' : 'non aktif')+`</td>
                            </tr>
                        `
                    });

                    $('#total_data').html(data.total_rows)
                    var pagination = pagination_hal(data.total_rows, data.perpage, data.page, '')
                    $('#pagination').html(pagination);
                }else{
                    html += `
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data</td>
                        </tr>
                    `
                }
                $("#tbl_list").html(html)
            }
        })
    }


    var clickTimer = null;
    var delay = 1000; // Penundaan dalam milidetik (misalnya 300ms)

    $("#tbl_list").on('click', '.table_edit', function() {
        if (clickTimer === null) {
            clickTimer = setTimeout(function() {
                clickTimer = null;
                // alert('tolong double klick')
            }.bind(this), delay);
        } else {
            // Klik kedua dalam waktu yang singkat, dianggap sebagai double click
            // alert()
            clearTimeout(clickTimer);
            clickTimer = null;
            var id_record = $(this).data('id_record');
            var url = "<?=base_url(set_url($this->uri->segment(2).'/get_record'))?>"

            var detail = getJSON(url, { id: id_record })
            $("#MyForm input, #MyForm textarea, #MyForm select").prop("disabled", true);
            $("#submit_button").prop("disabled", true);

            $('#id').val(detail.record.id_users)
            $('#nama').val(detail.record.nama_users)
            $('#username').val(detail.record.username_users)
            $('#email').val(detail.record.email_users)
            $("#divisi option[value='" + detail.record.fk_divisi + "']").prop("selected", true);
            $('#stts_aktif').prop('checked', parseInt(detail.record.stts_aktif_users));
            
        }
    });
</script>