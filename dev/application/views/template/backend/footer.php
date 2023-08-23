
    
    <script src="<?=base_url()?>assets/admin/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="<?=base_url()?>assets/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- core files -->
    <script src="<?=base_url()?>assets/admin/js/app.min.js"></script>
    <script src="<?=base_url()?>assets/admin/js/app.minisidebar.init.js"></script>
    <script src="<?=base_url()?>assets/admin/js/app-style-switcher.js"></script>
    <script src="<?=base_url()?>assets/admin/js/sidebarmenu.js"></script>
    <script src="<?=base_url()?>assets/admin/js/custom.js"></script>
</body>
</html>


<script>
    var searchTerm = "";
    $("#pencarian").on("keydown", function(event) {
        if (event.keyCode === 13) {
            searchTerm = $(this).val();
            load_record(1, searchTerm);
        }
    });

    $("#pagination").on("click", ".page-link[data-halaman]", function() {
        load_record($(this).data("halaman"), searchTerm);
    });

    $("#add_record, #edit_record, #delete_record").click(function(){
        var action = $(this).attr("id");
        var id = $('#id').val();
        $('#pesan_notifikasi div').remove()
        if (action != "add_record") {
            if (id == "" || id == null){
                $("#MyForm input, #MyForm textarea").prop("disabled", true);
                $("#submit_button").prop("disabled", true);
                $('#pesan_notifikasi').prepend(notifikasi('danger', 'Data belum di pilih'));
            } else {
                if(action == "edit_record"){
                    $("#MyForm input, #MyForm textarea").prop("disabled", false);
                    $("#submit_button").prop("disabled", false);
                }else{
                    // delete
                    // kasih muncul alert dulu
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
                            var hapus = getJSON("<?=base_url(set_url($this->uri->segment(2).'/delete_record'))?>", {id:id})
                            if(hapus.status){
                                load_record()
                                $("#MyForm")[0].reset();
                                $("#id").val("");
                                $("html, body").animate({ scrollTop: 0 }, "slow");
                                $('#pesan_notifikasi').prepend(notifikasi('success', hapus.pesan));
                            }else{
                                $('#pesan_notifikasi').prepend(notifikasi('danger', 'Terjadi kesalahan, silahkan untuk mencoba kemabli!'));
                            }
                        }
                    });
                }
            }
        } else{
            $("#MyForm")[0].reset();
            $("#id").val("");
            $("#MyForm input, #MyForm textarea").prop("disabled", false);
            $("#submit_button").prop("disabled", false);
        }
    });

    /* ******************************************* */
    /*         BUTTON SAVE CREATE UPDATE           */
    /* ******************************************* */
    $('#MyForm').submit(function(e){
        e.preventDefault()
        var dataToSend = new FormData(this)
        $.ajax("<?=base_url(set_url($this->uri->segment(2).'/add_update'))?>",{
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