<?php if(!empty($cart)): ?>
    <?php foreach($cart as $key => $value) { ?>

        <tr style="border-bottom: 1px solid var(--bs-primary) !important;">                          
            <td class="border-bottom-0">
                <div class="d-flex align-items-center gap-3">
                    <!-- <img src="../../dist/images/products/s11.jpg" alt="" class="img-fluid rounded" width="80"> -->
                    <div>
                        <h6 class="fw-semibold fs-4 mb-0"><?=$value->item_cart_po?></h6>
                        <!-- <p class="mb-0">toys</p> -->
                        <a class="text-danger fs-4 delete_cart_item" data-id_cart_item="<?=$value->id_cart_po?>">
                            <i class="ti ti-trash"></i>
                        </a>
                    </div>
                </div>
            </td>
            <td class="border-bottom-0">
                <div class="input-group input-group-sm rounded">
                    <button class="btn minus min-width-20 py-0 border-end border-success border-end-0 text-success" type="button" id="add1">
                        <i class="ti ti-minus"></i>
                    </button>
                    <input type="text" id="qty_cart" class="min-width-70 flex-grow-0 border border-success text-success fs-3 fw-semibold form-control text-center qty"  placeholder="" aria-label="Example text with button addon" aria-describedby="add1" value="<?=$value->qty_po_cart?>">
                    <button class="btn min-width-20 py-0 border border-success border-start-0 text-success add" type="button" id="addo2">
                        <i class="ti ti-plus"></i>
                    </button>
                </div>
            </td>
            <td class="text-end border-bottom-0">
                <h6 class="fs-4 fw-semibold mb-0"><?=$value->harga_cart_po?></h6>
            </td>
            <td class="text-end border-bottom-0">
                <h6 class="fs-4 fw-semibold mb-0" id="fix_grantol_cart"><?=$value->sub_total_cart_po?></h6>
            </td>
        </tr>
    <?php } ?>
<?php else : ?>
    <tr>
        <td colspan="5" class="text-center">Belum ada data</td>
    </tr>
<?php endif; ?>