<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100 bg-light-info overflow-hidden shadow-none">
                <div class="card-body position-relative">
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="d-flex align-items-center mb-7">
                                <div class="rounded-circle overflow-hidden me-6">
                                    <img src="<?=base_url()?>assets/admin/images/profile/user-1.jpg" alt="" width="40" height="40">
                                </div>
                                <h5 class="fw-semibold mb-0 fs-5">Welcome back <?=$_SESSION['username_users']?></h5>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="border-end pe-4 border-muted border-opacity-10">
                                    <h3 class="mb-1 fw-semibold fs-7 d-flex align-content-center">Rp. 1000<i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h3>
                                    <p class="mb-0 text-dark">Penjualan Hari Ini</p>
                                </div>
                                <!-- <div class="ps-4">
                                    <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">35%<i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h3>
                                    <p class="mb-0 text-dark">Overall Performance</p>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="welcome-bg-img mb-n7 text-end">
                                <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/welcome-bg.svg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-2 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h4 class="fw-semibold">Rp. 0</h4>
                    <p class="mb-2 fs-3">Pengeluaran</p>
                    <div id="expense"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-2 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h4 class="fw-semibold">Rp. 1000 ?></h4>
                    <p class="mb-1 fs-3">Pemasukkan</p>
                <div id="sales" class="sales-chart"></div>
                </div>
            </div>
        </div>
        <div class="owl-carousel counter-carousel owl-theme">
            <div class="item">
                <div class="card border-0 zoom-in bg-light-danger shadow-none">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="<?=base_url()?>assets/admin/images/svgs/icon-wallet.svg" width="50" height="50" class="mb-3" alt="" />
                            <p class="fw-semibold fs-3 text-primary mb-1">Pendapatan tahun ini </p>
                            <h5 class="fw-semibold text-primary mb-0">Rp 1000</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card border-0 zoom-in bg-light-warning shadow-none">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="<?=base_url()?>assets/admin/images/svgs/icon-wallet.svg" width="50" height="50" class="mb-3" alt="" />
                            <p class="fw-semibold fs-3 text-primary mb-1">Pendapatan bulan ini </p>
                            <h5 class="fw-semibold text-primary mb-0">Rp 1000</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card border-0 zoom-in bg-light-primary shadow-none">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="<?=base_url()?>assets/admin/images/svgs/icon-wallet.svg" width="50" height="50" class="mb-3" alt="" />
                            <p class="fw-semibold fs-3 text-primary mb-1">Pendapatan minggu ini </p>
                            <h5 class="fw-semibold text-primary mb-0">Rp 1000</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card border-0 zoom-in bg-light-success shadow-none">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="<?=base_url()?>assets/admin/images/svgs/icon-wallet.svg" width="50" height="50" class="mb-3" alt="" />
                            <p class="fw-semibold fs-3 text-primary mb-1">Pendapatan hari ini </p>
                            <h5 class="fw-semibold text-primary mb-0">Rp 1000</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <h5 class="card-title fw-semibold">Statistik Mingguan</h5>
                    <p class="card-subtitle mb-0">Penjualan rata-rata</p>
                    <div id="weekly-stats" class="mb-4 mt-7"></div>
                        <div class="position-relative">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="d-flex">
                                    <div class="p-6 bg-light-primary rounded-2 me-6 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-grid-dots text-primary fs-6"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 fs-4 fw-semibold">Penjualan Teratas</h6>
                                        <p class="fs-3 mb-0">Johnathan Doe</p>
                                    </div>
                                </div>
                                <div class="bg-light-primary badge">
                                    <p class="fs-3 text-primary fw-semibold mb-0">+68</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="d-flex">
                                    <div class="p-6 bg-light-success rounded-2 me-6 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-grid-dots text-success fs-6"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 fs-4 fw-semibold">Customer Terbaik</h6>
                                        <p class="fs-3 mb-0">Footware</p>
                                    </div>
                                </div>
                                <div class="bg-light-success badge">
                                    <p class="fs-3 text-success fw-semibold mb-0">+68</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex">
                                    <div class="p-6 bg-light-danger rounded-2 me-6 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-grid-dots text-danger fs-6"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1 fs-4 fw-semibold">Penjualan Terbaik</h6>
                                    <p class="fs-3 mb-0">Fashionware</p>
                                </div>
                            </div>
                            <div class="bg-light-danger badge">
                                <p class="fs-3 text-danger fw-semibold mb-0">+68</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="col-md-12 col-lg-6 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <div>
                        <h5 class="card-title fw-semibold">Penjualan Mingguan</h5>
                        <p class="card-subtitle mb-0">Satu minggu terakhir</p>
                        <div id="grafik_mingguan" class="mb-7 pb-8"></div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="bg-light-primary rounded-2 me-8 p-8 d-flex align-items-center justify-content-center">
                                      <i class="ti ti-grid-dots text-primary fs-6"></i>
                                </div>
                                <div>
                                    <p class="fs-3 mb-0 fw-normal">Jumlah Penjualan</p>
                                    <h6 class="fw-semibold text-dark fs-4 mb-0" id="grafik_pendapatan"></h6>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="bg-light rounded-2 me-8 p-8 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-grid-dots text-muted fs-6"></i>
                                </div>
                                <div>
                                    <p class="fs-3 mb-0 fw-normal">Pengeluaran</p>
                                    <h6 class="fw-semibold text-dark fs-4 mb-0">Rp. 0</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <h5 class="card-title fw-semibold">Payment Gateways</h5>
                    <p class="card-subtitle mb-7">Platform for Income</p>
                    <div class="position-relative">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="d-flex">
                                <div class="p-8 bg-light-primary rounded-2 d-flex align-items-center justify-content-center me-6">
                                    <img src="<?=base_url()?>assets/admin/images/svgs/icon-paypal2.svg" alt="" class="img-fluid" width="24" height="24">
                                </div>
                                <div>
                                    <h6 class="mb-1 fs-4 fw-semibold">PayPal</h6>
                                    <p class="fs-3 mb-0">Big Brands</p>
                                </div>
                            </div>
                            <h6 class="mb-0 fw-semibold">+$6,235</h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="d-flex">
                                <div class="p-8 bg-light-success rounded-2 d-flex align-items-center justify-content-center me-6">
                                <img src="<?=base_url()?>assets/admin/images/svgs/icon-wallet.svg" alt="" class="img-fluid" width="24" height="24">
                            </div>
                            <div>
                                <h6 class="mb-1 fs-4 fw-semibold">Wallet</h6>
                                <p class="fs-3 mb-0">Bill payment</p>
                            </div>
                        </div>
                        <h6 class="mb-0 fw-semibold text-muted">+$345</h6>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="d-flex">
                            <div class="p-8 bg-light-warning rounded-2 d-flex align-items-center justify-content-center me-6">
                                <img src="<?=base_url()?>assets/admin/images/svgs/icon-credit-card.svg" alt="" class="img-fluid" width="24" height="24">
                            </div>
                            <div>
                                <h6 class="mb-1 fs-4 fw-semibold">Credit card</h6>
                                <p class="fs-3 mb-0">Money reversed</p>
                            </div>
                        </div>
                          <h6 class="mb-0 fw-semibold">+$2,235</h6>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-7 pb-1">
                        <div class="d-flex">
                            <div class="p-8 bg-light-danger rounded-2 d-flex align-items-center justify-content-center me-6">
                                <img src="<?=base_url()?>assets/admin/images/svgs/icon-pie2.svg" alt="" class="img-fluid" width="24" height="24">
                            </div>
                            <div>
                                <h6 class="mb-1 fs-4 fw-semibold">Refund</h6>
                                <p class="fs-3 mb-0">Bill payment</p>
                            </div>
                        </div>
                        <h6 class="mb-0 fw-semibold text-muted">-$32</h6>
                    </div>
                </div>
                <button class="btn btn-outline-primary w-100">View all transactions</button>
            </div>
        </div>
    </div> -->
    <div class="col-md-12 col-lg-6 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body">
                <div class="mb-4">
                    <h5 class="card-title fw-semibold">Transaksi Terkini</h5>
                    <p class="card-subtitle">Daftar List Transaksi Terkini</p>
                </div>
                    <ul class="timeline-widget mb-0 position-relative mb-n5">
                            <li class="timeline-item d-flex position-relative overflow-hidden">
                                <div class="timeline-time text-dark flex-shrink-0 text-end">
                                    08:22
                                </div>
                                <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                    <span class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
                                    <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                </div>                        
                                <div class="timeline-desc fs-3 text-dark mt-n1">
                                    A001
                                    <b> (Rp 1000)</b>
                                </div>
                            </li> 
                    </ul>                  
                </div>
            </div>
        </div>
    </div>
</div>


 <script src="<?=base_url()?>assets/admin/js/custom.js"></script>
<!-- current page js files -->
 <script src="<?=base_url()?>assets/admin/libs/owl.carousel/dist/owl.carousel.min.js"></script>
<script src="<?=base_url()?>assets/admin/libs/apexcharts/dist/apexcharts.min.js"></script>
<!-- <script src="<?=base_url()?>assets/admin/js/dashboard2.js"></script> -->
<script type="text/javascript">

    //
  // Carousel
  //
    $(".counter-carousel").owlCarousel({
        loop: true,
        margin: 20,
        mouseDrag: true,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplaySpeed: 2000,
        nav: false,
        rtl: true,
        responsive: {
            0: {
                items: 2,
            },
            576: {
                items: 2,
            },
            768: {
                items: 3,
            },
            1200: {
                items: 3,
            },
            1400: {
                items: 3,
            },
        },
    });

    // =====================================
    // grafik_mingguan
    // =====================================
    var totalPendapatan = 0;
    var options = {
        series: [
            {
                name: "Pendapatan",
                data: [
                    <?php foreach($grafik_mingguan as $key => $value){ ?>
                        totalPendapatan += <?php $value->total?>
                        <?= $value->total ?>,
                    <?php } ?>
                ],
            },
        ],

        chart: {
            toolbar: {
                show: false,
            },
            // offsetX: -20,
            height: 250,
            width: '100%',
            type: "bar",
            fontFamily: "Plus Jakarta Sans', sans-serif",
            foreColor: "#adb0bb",
        },
        
        plotOptions: {
            bar: {
                borderRadius: 5,
                columnWidth: "45%",
                distributed: true,
                endingShape: "rounded",
            },
        },

        dataLabels: {
            enabled: false,
        },
        legend: {
            show: false,
        },
        grid: {
            yaxis: {
                lines: {
                    show: false,
                },
            },
            xaxis: {
                lines: {
                    show: false,
                },
            },
        },
        xaxis: {
            categories: [
                <?php foreach($grafik_mingguan as $key => $value){ ?>
                    ["<?= $value->tanggal ?>"],
                <?php } ?>
            ],
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
        },
        yaxis: {
            labels: {
                show: true,
                formatter: function(val) {
                    return new Intl.NumberFormat('id-ID', { maximumFractionDigits: 0 }).format(val);
                },
            },
        },
        tooltip: {
            enabled: true,
            y: {
                formatter: function(val) {
                    return new Intl.NumberFormat('id-ID', { maximumFractionDigits: 0 }).format(val);
                },
            },
        },
    };

    var chart = new ApexCharts(document.querySelector("#grafik_mingguan"), options);
    chart.render();
    $('#grafik_pendapatan').text("Rp "+parseInt(totalPendapatan).toLocaleString())
</script>