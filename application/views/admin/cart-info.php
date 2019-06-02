<style>
    .box {
        border-top: 1px solid #605ca8 !important;
    }

    .modal-img {
        height: auto;
    }

    .m-b-5 {
        margin-bottom: 5px;
    }
    .modal-lg{
        width: 700px;
    }
    .panel, .panel-heading {
        background-color: #ebe5e55e;
    }
</style>
<?php if (!empty($product_details)) {
    ?>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-7">
                            <h4 class="cart-title">Added to Cart</h4>
                            <div class="col-md-4 text-center">
                                <?php
                                $img = !empty($product_details['product_logo']) && (file_exists(FCPATH . 'data/child-sub-products/' . $product_details['product_logo'])) ? 'data/child-sub-products/' . $product_details['product_logo'] : '';
                                ?>
                                <img src="<?php echo !empty($img) ? base_url() . $img : dummyLogo() ?>"
                                     class="modal-img" alt="Product Image">
                            </div>
                            <div class="col-md-8">
                                <ul class="list-unstyled">
                                    <li><b>Product Name : </b><span
                                                data-name="<?php echo $product_details['child_product_name'] ?>"><?php echo $product_details['child_product_name'] ?></span>
                                    </li>
                                    <li><b>Mfr No : </b> 12345</li>
                                    <li><b>Description
                                            : </b><?php echo limit_words($product_details['description_1'], 5) ?></li>
                                    <li><b>Quantity : </b><?php echo $qty ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="panel panel-default">
                                <div class="panel-heading">Cart</div>
                                <div class="panel-body">
                                    <h4>Cart Subtotal : <?php echo number_format($total,2) ?></h4>
                                    <div class="text-center">
                                        <form id="frm" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="product_info_id"
                                                   value="<?php echo $product_details['product_info_id'] ?>">
                                            <input type="hidden" name="quantity" value="<?php echo $qty ?>">
                                            <input type="hidden" name="sub_total" value="<?php echo $total ?>">
                                            <a href="<?php echo base_url() ?>admin/products"
                                               class="btn btn-sm btn-primary m-b-5 w-100">Continue Shopping</a>
                                        </form>

                                        <a href="<?php echo base_url() ?>admin/view-cart" type="button"
                                           class="btn btn-sm btn-success w-100">View Basket</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>

    <?php
} else {
    ?>
    <h1>No Data Found</h1>
    <?php
}

?>
