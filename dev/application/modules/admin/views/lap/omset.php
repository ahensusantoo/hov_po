 <link rel="stylesheet" href="<?=base_url()?>assets/admin/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <?php if( isset($_GET['tgl_awal']) AND isset($_GET['tgl_akhir']) ) : ?>
                        <div class="info_filter text-center mb-5">
                            asd
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered border-primary">
                                <thead class="bg-success text-white">
                                    <tr>
                                        <th>No</th>
                                        <th>tanggal</th>
                                        <th>id transaksi</th>
                                        <th>nama customer</th>
                                        <th>total transaksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($record)): ?>
                                        <?php $total_omset = 0; ?>
                                        <?php foreach($record as $key=> $value){ ?>
                                            <?php $total_omset += $value->total_transaksi; ?>
                                            <tr>
                                                <td><?=$key+1?></td>
                                                <td><?=tanggal_jam_indo($value->tanggal)  ?></td>
                                                <td><?=$value->idtransaksi  ?></td>
                                                <td><?=$value->nama_customer  ?></td>
                                                <td><?= indo_currency($value->total_transaksi)  ?></td>
                                            </tr>
                                        <?php } ?>
                                            <tr>
                                                <th colspan="4" class="text-left">Total</th>
                                                <th><?= indo_currency($total_omset) ?></th>
                                            </tr>
                                    <?php else: ?>
                                        <tr>
                                            <t colspan="5" class="text-center">Tidak Terdahap Data</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <center>Selahkan melakukan filter data terlebih dahulu</center>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

     <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-lg-5 col-md-6 col-6 mb-2">
                                <input type="text" name="tgl_awal" class="form-control date datepicker dashboard">
                            </div>
                            <div class="col-lg-5 col-md-6 col-6 mb-2">
                                <input type="text" name="tgl_akhir" class="form-control date datepicker dashboard">
                            </div>
                            <div class="col-lg-2 col-md-12 col-12">
                                <button type="submit" class="btn waves-effect waves-light btn-primary block-button">
                                    Proses
                                </button>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>

</div>

<script src="<?=base_url()?>assets/admin/libs/moment-js/moment.js"></script>
<script src="<?=base_url()?>assets/admin/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script>
    $('.datepicker').datepicker({
        format: "dd-mm-yyyy",
        todayHighlight: true,
        autoclose: true
    });
    $(".datepicker").datepicker('setDate', new Date()); // = set to today
</script>