$(function () {
  "use strict";

  // Feather Icon Init Js
  // feather.replace();

  // $(".preloader").fadeOut();

  // =================================
  // Tooltip
  // =================================
  var tooltipTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="tooltip"]')
  );
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });

  // =================================
  // Popover
  // =================================
  var popoverTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="popover"]')
  );
  var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl);
  });

  // increment & decrement
  $(".minus,.add").on("click", function () {
    var $qty = $(this).closest("div").find(".qty"),
      currentVal = parseInt($qty.val()),
      isAdd = $(this).hasClass("add");
    !isNaN(currentVal) &&
      $qty.val(
        isAdd ? ++currentVal : currentVal > 0 ? --currentVal : currentVal
      );
  });

  // ==============================================================
  // Collapsable cards
  // ==============================================================
  $('a[data-action="collapse"]').on("click", function (e) {
    e.preventDefault();
    $(this)
      .closest(".card")
      .find('[data-action="collapse"] i')
      .toggleClass("ti-minus ti-plus");
    $(this).closest(".card").children(".card-body").collapse("toggle");
  });
  // Toggle fullscreen
  $('a[data-action="expand"]').on("click", function (e) {
    e.preventDefault();
    $(this)
      .closest(".card")
      .find('[data-action="expand"] i')
      .toggleClass("ti-arrows-maximize ti-arrows-maximize");
    $(this).closest(".card").toggleClass("card-fullscreen");
  });
  // Close Card
  $('a[data-action="close"]').on("click", function () {
    $(this).closest(".card").removeClass().slideUp("fast");
  });

  // fixed header
  $(window).scroll(function () {
    if ($(window).scrollTop() >= 60) {
      $(".app-header").addClass("fixed-header");
    } else {
      $(".app-header").removeClass("fixed-header");
    }
  });

  // Checkout
  $(function () {
    $(".billing-address").click(function () {
      $(".billing-address-content").hide();
    });
    $(".billing-address").click(function () {
      $(".payment-method-list").show();
    });
  });
});

/*change layout boxed/full */
$(".full-width").click(function () {
  $(".container-fluid").addClass("mw-100");
  $(".full-width i").addClass("text-primary");
  $(".boxed-width i").removeClass("text-primary");
});
$(".boxed-width").click(function () {
  $(".container-fluid").removeClass("mw-100");
  $(".full-width i").removeClass("text-primary");
  $(".boxed-width i").addClass("text-primary");
});

/*Dark/Light theme*/
$(".light-logo").hide();
$(".dark-theme").click(function () {
  $("nav.navbar-light").addClass("navbar-dark");
  $(".dark-theme i").addClass("text-primary");
  $(".light-theme i").removeClass("text-primary");
  $(".light-logo").show();
  $(".dark-logo").hide();
});
$(".light-theme").click(function () {
  $("nav.navbar-light").removeClass("navbar-dark");
  $(".dark-theme i").removeClass("text-primary");
  $(".light-theme i").addClass("text-primary");
  $(".light-logo").hide();
  $(".dark-logo").show();
});

/*Card border/shadow*/
$(".cardborder").click(function () {
  $("body").addClass("cardwithborder");
  $(".cardshadow i").addClass("text-dark");
  $(".cardborder i").addClass("text-primary");
});
$(".cardshadow").click(function () {
  $("body").removeClass("cardwithborder");
  $(".cardborder i").removeClass("text-primary");
  $(".cardshadow i").removeClass("text-dark");
});

$(".change-colors li a").click(function () {
  $(".change-colors li a").removeClass("active-theme");
  $(this).addClass("active-theme");
});

/*Theme color change*/
function toggleTheme(value) {
  $(".preloader").show();
  var sheets = document.getElementById("themeColors");
  sheets.href = value;
  $(".preloader").fadeOut();
}
$(".preloader").fadeOut();



/* ******************************************* */
/*             HELPER JAVASCRIPT               */
/* ******************************************* */
function getJSON(url,data){
    return JSON.parse($.ajax({
        type        : 'POST',
        url         : url,
        data        : data,
        dataType    :'json',
        global      : false,
        async       : false,
        beforeSend:function(){
            $('#loading').show();
        },
        complete: function(){
            $('#loading').hide();
        },
        success:function(msg){

        },
    }).responseText);
}

// get url_id with java script
function getUrlVars(){
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++){
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}


// $('.pagination').on('click', '.spinner_aktif', function(){
//     $('#spiner_pagin').show();
// })


function pagination_hal(total_rows, perpage, hal_aktif, url) {
    var pagination = '<ul class="pagination justify-content-end">'; // Tambahkan ul tag untuk daftar halaman
    var paging = Math.ceil(total_rows / perpage);

    // PREV BUTTON
    if (hal_aktif == "1"){
        pagination += `<li class="page-item"><a disabled class="page-link">&laquo</a></li>`
    }else{
        pagination += `<li class="page-item"><a class="page-link spinner_aktif" href="javascript:void(0)" data-halaman="${parseInt(hal_aktif) - 1}" >&laquo</a></li>`
    }

    // PAGE PREV
    if (hal_aktif > 1){
        for (i=(parseInt(hal_aktif)-2); i < hal_aktif; i++) { 
            if (i < hal_aktif && i > 0) {
               pagination += `<li class="page-item"><a class="page-link spinner_aktif"href="javascript:void(0)" data-halaman="${parseInt(i)}">`+i+`</a></li>`;
            }
        }
    }

    // PAGE ACTIVE
    pagination += `<li class="page-item active"><a disabled class="page-link">`+hal_aktif+`</a></li>`

    // PAGE NEXT
    if (hal_aktif < paging){
        for (i=(parseInt(hal_aktif)+1); i < (parseInt(hal_aktif)+3); i++) { 
            if (i > hal_aktif && i <= paging) {
                pagination += `<li class="page-item"><a class="page-link spinner_aktif" href="javascript:void(0)" data-halaman="${parseInt(i)}">${i}</a></li>`;
            }
        }
    }

    //NEXT BUTTON
    if (hal_aktif == paging){
        pagination += `<li class="page-item"><a disabled class="page-link">&raquo</a></li>`
    }else{
        pagination += `<li class="page-item"><a class="page-link spinner_aktif" href="javascript:void(0)" data-halaman="${parseInt(hal_aktif) + 1}">&raquo</a></li>`
    }

    pagination += '</ul>'; // Tutup ul tag untuk daftar halaman
    return pagination;
}








function notifikasi(type, string){
  var notifikasi = `
        <div class="alert alert-`+type+` alert-dismissible bg-`+type+` text-white border-0 fade show"
      role="alert">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>`+string+`</strong>
    </div>`
    return notifikasi
}

// $(document).ready(function() {
//     $('.datatable').DataTable( {
//         "processing": true,
//     } );
// } );

// $(function () {
//     $('.select2').select2()
//     $('.select2bs4').select2({
//      theme: 'bootstrap4'
//     })
// });


// $(function(){
//   $(".datepicker").datepicker({
//       format: 'yyyy-mm-dd',
//       autoclose: true,
//       locale: 'id',
//       todayHighlight: true,
//   });
//  });

function get_just_number(arg){
    var bayar = $(arg).val().replace(/[^0-9]/g, '');
    if (bayar == 0) {bayar = 0}
    $(arg).val(parseInt(bayar).toLocaleString());
    // onkeyup="format_nominal(this)"
}


function indo_currency(string){
    return  parseInt(string).toLocaleString()
}

function indo_date(date){
    if(date == null){
        return date;
    }else{
        var date = date
        var parts = date.split('-')
        var indo_date = parts[2]+'-'+parts[1]+'-'+parts[0]
        return indo_date;
    }
} 

function indo_date_time(date){
    var hari = date.substr(0, 10)
    var time = date.substr(10, 20)
    var parts = hari.split('-')
    var indo_date = parts[2]+'-'+parts[1]+'-'+parts[0]+' '+ time
    return indo_date;
}

function status_lunas(nominal){
    var nominal = nominal
    if(nominal < 0 ){
        var angka = 0
    }else{
        var angka = nominal
    }
    return angka
}

function badge(type, string){
  return `
    <span class="mb-1 badge rounded-pill bg-`+type+`">`+string+`</span>`
}

// $(function() {
//     $('.datepicker').datepicker({
//         format : 'dd-mm-yyyy',
//         autoclose: true,
//         locale: 'id',
//         todayHighlight: true,
//     })
// });