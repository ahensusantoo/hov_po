<link rel="stylesheet" href="<?=base_url()?>assets/admin/libs/sweetalert2/dist/sweetalert2.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/admin/libs/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/admin/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<style type="text/css" media="screen">
    label{
        font-size: 12px !important;
    }
    .group-input{
        padding-bottom: 5px !important;
    }

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

<div class="container-fluid">
    <H2><?=$title?></H2>

    <div class="row">
        <div class="col-lg-7 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <div id="pesan_notifikasi"></div>
                    
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
                                <div class="mb-2 row align-items-center" id="notifikasi_users">
                                    <label for="users" class="form-label col-lg-4 ">Users</label>
                                    <div class="col-lg-8">
                                        <input type="hidden" name="id_users" id="id_users" value="<?=$_SESSION['id_users']?>" readonly>
                                        <input type="text" name="users" id="users" value="<?=$_SESSION['username_users']?>" class="form-control form-control-sm" placeholder="Otomatis" readonly>
                                    </div>
                                </div>
                                <div class="mb-2 row align-items-center" id="notifikasi_no_transaksi">
                                    <label for="no_transaksi" class="form-label col-lg-4 ">No Transaksi</label>
                                    <div class="col-lg-8">
                                        <input type="hidden" name="id_transaksi" id="id_transaksi">
                                        <input type="text" name="no_transaksi" id="no_transaksi" class="form-control form-control-sm" placeholder="Otomatis" readonly>
                                    </div>
                                </div>
                                <div class="mb-2 row align-items-center" id="notifikasi_tgl_po">
                                    <label for="tgl_po" class="form-label col-lg-4 ">Tgl PO</label>
                                    <div class="col-lg-8">
                                        <input type="text" name="tgl_po" id="tgl_po" value="<?= date('d-m-Y'); ?>" class="form-control form-control-sm mydatepicker" placeholder="Tanggal Purchase Order">
                                    </div>
                                </div>
                                <div class="mb-2 row align-items-center " id="notifikasi_divisi">
                                    <label for="divisi" class="form-label col-lg-4 ">Divisi</label>
                                    <div class="col-lg-8">
                                        <select name="divisi" id="divisi" class="select2 form-control form-control-sm custom-select" style="width: 100%; height: 36px;">
                                            <option value="">...</option>
                                            <?php foreach ($divisi as $key => $value) { ?>
                                                <option value="<?= $value->id_divisi ?>" <?= $value->id_divisi == $_SESSION['fk_divisi'] ? 'selected' : '' ?>>
                                                    <?= $value->nama_divisi ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-2 row align-items-center" id="notifikasi_supplier">
                                    <label for="supplier" class="form-label col-lg-4 ">Supplier</label>
                                    <div class="col-lg-8">
                                        <select name="supplier" id="supplier" class="select2 form-control form-control-sm custom-select" style="width: 100%; height: 36px;">
                                            <option value="">...</option>
                                            <?php foreach ($supplier as $key => $value) { ?>
                                                <option value="<?= $value->id_supplier ?>">
                                                    <?= $value->nama_supplier ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2 row align-items-center" id="notifikasi_jns_po">
                                    <label for="jns_po" class="form-label col-lg-4 ">Jenis PO</label>
                                    <div class="col-lg-8">
                                        <select name="jenis_po" id="jenis_po" class="select2 form-control form-control-sm custom-select" style="width: 100%; height: 36px;">
                                            <option value="">...</option>
                                            <?php foreach ($jns_po as $key => $value) { ?>
                                                <option value="<?= $value->id_jenis_po ?>">
                                                    <?= $value->nama_jenis_po ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2 row align-items-center" id="notifikasi_keterangan">
                                    <label for="keterangan" class="form-label col-lg-4 ">Keterangan</label>
                                    <div class="col-lg-8">
                                        <input type="text" name="keterangan" id="keterangan" class="form-control form-control-sm" placeholder="Keterangan">
                                    </div>
                                </div>
                                <div class="mb-2 row align-items-center" id="notifikasi_tgl_tempo">
                                    <label for="tgl_tempo" class="form-label col-lg-4 ">Tgl Tempo</label>
                                    <div class="col-lg-8">
                                        <input type="text" name="tgl_tempo" id="tgl_tempo" value="<?= date('d-m-Y'); ?>" class="form-control form-control-sm mydatepicker" placeholder="Tanggal Jatuh Tempo">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <div class="col-lg-5 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body" id="card_item_po">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <button type="submit" id="tambah_item" class="btn btn-primary btn-sm mb-3">
                                <i class="ti ti-plus fs-4"></i> Tambah Item
                            </button>
                        </div>
                        <input type="hidden" name="id_item_po" id="id_item_po" value="">
                        <div class="mb-2 row align-items-center">
                            <label for="nama_item_po" class="form-label col-lg-4 ">Nama Item</label>
                            <div class="col-lg-8" id="notifikasi_nama_item_po">
                                <input type="text" name="nama_item_po" id="nama_item_po" class="form-control form-control-sm" placeholder="Nama Item">
                            </div>
                        </div>
                        <div class="mb-2 row align-items-center">
                            <label for="qty_po" class="form-label col-lg-4 ">Quantity/Jumlah</label>
                            <div class="col-lg-8" id="notifikasi_qty_po">
                                <input type="text" name="qty_po" id="qty_po" class="nominal form-control form-control-sm" placeholder="Quantity / Jumlah">
                            </div>
                        </div>
                        <div class="mb-2 row align-items-center">
                            <label for="harga_po" class="form-label col-lg-4 ">Harga @</label>
                            <div class="col-lg-8" id="notifikasi_harga_po">
                                <input type="text" name="harga_po" id="harga_po" class="nominal form-control form-control-sm" placeholder="Harga">
                            </div>
                        </div>
                        <div class="mb-2 row align-items-center" id="notifikasi_grand_total_po">
                            <label for="grand_total_po" class="form-label col-lg-4 ">Grand Total</label>
                            <div class="col-lg-8">
                                <input type="text" name="grand_total_po" id="grand_total_po" class="form-control form-control-sm" placeholder="Grand Total" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <section>
                        <div id="pesan_notifikasi_cart_po"></div>
                        <button type="button" id="simpan_transaction" class="btn btn-primary btn-block mb-3" >
                            Simpan Purchase Order
                        </button>
                        <div class="table-responsive">
                            <table class="table align-middle text-nowrap mb-0">
                                <thead class="fs-2">
                                    <tr>
                                        <th>Nama Item</th>
                                        <th>Quantity</th>
                                        <th class="text-end">Harga @</th>
                                        <th class="text-end">Grand_total</th>
                                    </tr>
                                </thead>
                                <tbody id="cart_table">
                                    <?php  //$this->view('purchase_order/cart_data') ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="order-summary border rounded p-4 my-4">
                            <div class="p-3">
                                <h5 class="fs-5 fw-semibold mb-4">Ringkasan Pesanan</h5>
                                <div class="d-flex justify-content-between mb-4">
                                    <p class="mb-0 fs-4">Sub Total</p>
                                    <h6 class="mb-0 fs-4 fw-semibold" id="sub_total">0</h6>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-0 fs-4 fw-semibold">Grand Total</h6>
                                    <h6 class="mb-0 fs-5 fw-semibold" id="grand_total">0</h6>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="<?=base_url()?>assets/admin/libs/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="<?=base_url()?>assets/admin/libs/select2/dist/js/select2.full.min.js"></script>
<script src="<?=base_url()?>assets/admin/libs/select2/dist/js/select2.min.js"></script>
<script src="<?=base_url()?>assets/admin/libs/inputmask/dist/jquery.inputmask.min.js"></script>
<script src="<?=base_url()?>assets/admin/libs/moment-js/moment.js"></script>
<script src="<?=base_url()?>assets/admin/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>

    $(document).ready(function(){
        $(".select2").select2();
        $(".mydatepicker").datepicker({
            format: 'dd-mm-yyyy'
        });

        $('.nominal').inputmask("currency", {
            // prefix: 'Rp ',
            groupSeparator: '.',
            alias: "numeric",
            digits: 0,
            autoGroup: true,
            rightAlign: false
        });
        // $("#tbl_list").empty();
        load_cart_record()
    })


    $("#qty_po, #harga_po").keyup(function(){
        validateInput("qty_po", 'Hanya angka dan tidak boleh kosong');
        validateInput("harga_po", 'Hanya angka dan tidak boleh kosong');
        var qty_po = parseInt($("#qty_po").val().replace(/\D/g, '')); // Menghapus karakter non-angka
        var harga_po = parseInt($("#harga_po").val().replace(/\D/g, '')); // Menghapus karakter non-angka
        
        var qtyIsValid = !$("#qty_po").hasClass('is-invalid');
        var hargaIsValid = !$("#harga_po").hasClass('is-invalid');
        
        if (qtyIsValid && hargaIsValid) {
            var grand_total = indo_currency(qty_po * harga_po);
            $("#grand_total_po").val(grand_total);
        }
    });

    $("#tambah_item").click(function(){
        var id_item_po = $("#id_item_po").val();
        var nama_item_po = $("#nama_item_po").val();
        var qty_po = $("#qty_po").val();
        var harga_po = $("#harga_po").val();
        $.ajax("<?=base_url(set_url($this->uri->segment(2).'/cart_add_update'))?>",{
            dataType : 'json',
            type     : 'post',
            data     : {
                "id_item_po" : id_item_po,
                "nama_item_po" : nama_item_po,
                "qty_po" : qty_po,
                "harga_po" : harga_po
            },
            beforeSend:function(){
                $('.preloader').show()
            },
            complete:function(){
                $('.preloader').hide()
            },
            success  : function(data){
                $('#pesan_notifikasi_cart_po div').remove()
                $('#card_item_po').find('.invalid-feedback').remove()
                $('#card_item_po').find('.is-invalid').removeClass('is-invalid')
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
                        $('#pesan_notifikasi_cart_po').prepend(notifikasi('success', data.pesan));
                        load_cart_record()
                        $("html, body").animate({ scrollTop: 0 }, "slow");
                        $("#nama_item_po, #qty_po, #harga_po, #grand_total_po").fadeOut("slow", function() {
                            $(this).val("").fadeIn("slow");
                        });
                    }else{
                        if(data.errors){
                            $.each(data.errors, function(key, value){
                                // alert(key)
                                $('#'+key).addClass('is-invalid')
                                $('#notifikasi_'+key).append(`<div class="invalid-feedback">`+value+`</div>`)
                            })
                        }else{
                            if(data.status == false){
                                $('#pesan_notifikasi_item_po').prepend(notifikasi('danger', 'Terjadi kesalahan, silahkan untuk mencoba kemabli!'));
                            }
                            $.each(data.errors, function(key, value){
                                $('#'+key).removeClass('is-invalid')
                                $('#notifikasi_'+key).append('')
                            })
                        }
                    }
                    setTimeout(
                        function(){
                        //do something special
                        $('#pesan_notifikasi_cart_po div').remove()
                    }, 3000);
                }
            }
        })
    })


    // hapus item
    $("#cart_table").on('click', '.delete_cart_item', function(){
        var id_cart = $(this).data('id_cart_item');
        $('#pesan_notifikasi_cart_po').remove()
        Swal.fire({
            title: "Apakah kamu yakin?",
            text: "Anda tidak dapat mengembalikan data ini lagi",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, Hapus",
        }).then((result) => {
            if (result.value) {
                var hapus = getJSON("<?=base_url(set_url($this->uri->segment(2).'/delete_item_cart'))?>", {id:id_cart})
                if(hapus.status){
                    load_cart_record()
                    // $("html, body").animate({ scrollTop: 0 }, "slow");
                    $('#pesan_notifikasi_cart_po').prepend(notifikasi('success', hapus.pesan));
                }else{
                    $('#pesan_notifikasi_cart_po').prepend(notifikasi('danger', 'Terjadi kesalahan, silahkan untuk mencoba kemabli!'));
                }
            }
        });
    })

    function load_cart_record(page = 1, search = null){
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
                var html = ''
                var grand_total = parseInt(0);
                if(data.record.length > 0 ){
                    var no = ((parseInt(data.page-1))*parseInt(data.perpage)+1);
                    $.each(data.record, function( key, value ) {
                        grand_total += parseInt(value.sub_total_cart_po)
                        html += `
                            <tr style="border-bottom: 1px solid var(--bs-primary) !important;">                          
                                    <td class="border-bottom-0">
                                        <div class="d-flex align-items-center gap-3">
                                            <div>
                                                <h6 class="fw-semibold fs-4 mb-0">${value.item_cart_po}</h6>
                                                <a class="text-danger fs-4 delete_cart_item" data-id_cart_item="${value.id_cart_po}">
                                                    <i class="ti ti-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="border-bottom-0">
                                        <div class="input-group input-group-sm rounded">
                                            <input type="text" id="qty_cart" class="min-width-70 flex-grow-0 border border-success fs-3 fw-semibold form-control text-center qty"  placeholder="" aria-label="Example text with button addon" aria-describedby="add1" value="${indo_currency(value.qty_po_cart)}" disabled>
                                            
                                        </div>
                                    </td>
                                    <td class="text-end border-bottom-0">
                                        <h6 class="fs-4 fw-semibold mb-0">${indo_currency(value.harga_cart_po)}</h6>
                                    </td>
                                    <td class="text-end border-bottom-0">
                                        <h6 class="fs-4 fw-semibold mb-0" id="fix_grantol_cart">${indo_currency(value.sub_total_cart_po)}</h6>
                                    </td>
                                </tr>
                        `
                    });

                    // $('#total_data').html(data.total_rows)
                    // var pagination = pagination_hal(data.total_rows, data.perpage, data.page, '')
                    // $('#pagination').html(pagination);
                }else{
                    html += `
                        <tr>
                            <td colspan="4" class="text-center">Belum ada data</td>
                        </tr>
                    `
                }
                $("#cart_table").html(html)
                $("#grand_total, #sub_total").text(indo_currency(grand_total))
            }
        })
    }


    $('#simpan_transaction').click(function() {
        // Mengambil data formulir
        var dataToSend = new FormData($('#MyForm')[0]);
        $.ajax("<?=base_url(set_url('transaction/proses_transaction'))?>",{
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
                $('#pesan_notifikasi div').empty()
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
                        
                        // load_record()
                        // $('#pesan_notifikasi').prepend(notifikasi('success', data.pesan));
                        // $("#MyForm")[0].reset();
                        // $("html, body").animate({ scrollTop: 0 }, "slow");

                    }else{
                        if(data.errors){
                            $.each(data.errors, function(key, value){
                                // alert(key)
                                $('#'+key).addClass('is-invalid')
                                $('#notifikasi_'+key).append(`<div class="invalid-feedback">`+value+`</div>`)
                            })
                        }else{
                            if(data.status == false){
                                $('#pesan_notifikasi').prepend(notifikasi('danger', data.pesan));
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