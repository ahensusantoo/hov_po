
<div class="page-content">
    <?php $this->view('title_page') ?>


    <div class="row flex-grow">
        <div class="col-12 grid-margin stretch-card">
            <div class="card" style="border-radius: 10px; ">
                <!-- <div class="card-header">
                    <h7>Lap</h7>
                </div> -->
                <div class="card-body">
                    <?php if( isset($_GET['tgl_awal']) AND isset($_GET['tgl_akhir']) ) : ?>
                        <?php if(!empty($record)): ?>
                           <canvas id="chartjsMixedBar"></canvas>
                        <?php else: ?>
                            <center>Tidak terdapat data pada periode ini</center>
                        <?php endif; ?>
                    <?php else: ?>
                        <center>Selahkan melakukan filter data terlebih dahulu</center>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div> 

    <form action="" method="get">
        <div class="card" style="border-radius: 10px; ">
            <div class="card-body">
                <div class="row flex-grow">
                    <div class="col-lg-5 col-md-6 col-6 mb-2">
                        <input type="text" name="tgl_awal" class="form-control date datepicker dashboard">
                    </div>
                    <div class="col-lg-5 col-md-6 col-6 mb-2">
                        <input type="text" name="tgl_akhir" class="form-control date datepicker dashboard">
                    </div>
                    <div class="col-lg-2 col-md-12 col-12">
                        <button type="submit" class="btn btn-primary btn-block">
                            <!-- <i></i> -->Proses
                        </button>
                    </div>
                </div>
            </div>
        </div> 
    </form> 

</div>

<script src="<?=base_url()?>assets/admin/vendors/chartjs/Chart.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.datepicker').datepicker({
            format: "dd-mm-yyyy",
            todayHighlight: true,
            autoclose: true
        });
        $(".datepicker").datepicker('setDate', new Date()); // = set to today


        new Chart($('#chartjsMixedBar'), {
            type: 'bar',
            data: {
                labels: [
                    <?php foreach($record as $key => $value){ ?>
                        "<?= $value->tanggal ?>",
                    <?php } ?>
                ],
                datasets: [
                    {
                        label: "Line",
                        type: "line",
                        borderColor: "#ff3366",
                        backgroundColor: "rgba(0,0,0,0)",
                        data: [
                            <?php foreach($record as $key => $value){ ?>
                                <?= $value->total ?>,
                            <?php } ?>
                        ],
                        fill: false
                    }, {
                        label: "Bar",
                        type: "bar",
                        backgroundColor: "#7ee5e5",
                        backgroundColorHover: "#3e95cd",
                        // backgroundColor: "rgba(0,0,0,0)",
                        data: [
                            <?php foreach($record as $key => $value){ ?>
                                <?= $value->total ?>,
                            <?php } ?>
                        ]
                    }
                ]
            },
            option:{
                locale : 'en-IN',
                scale : {
                    y: {
                        ticks:{
                            callback : (value, index, values) => {
                                return new Intl.NumberFormat('en-IN',{
                                    style : "currency",
                                    currency : 'INR',
                                    maximumSignificantDigits:3
                                }).format(value);
                            }
                        },
                        beginAtZero : true
                    }
                }
            },
            responsive : true
        });
        // end chart


    });


</script>

