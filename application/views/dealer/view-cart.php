<style>
    .close {
        color: red;
        opacity: 1.3;
        font-size: 30px;
    }
    .p-img {
        height: 80px !important;
        width: 100px !important;
    }
    .form-inline .form-control {
        display: inline-block;
        width: 100%;
        vertical-align: middle;
    }
</style>
<div class="content-wrapper">
    <div class="container">
        <section class="content-header">
            <h1>
                <?php if (!empty($cart_items)) { ?>
                    View Cart Items
                <?php } else {
                    echo "";
                } ?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <?php if (!empty($cart_items)) { ?>
                    <li class="active"> View Cart Items</li>
                <?php } ?>
            </ol>
        </section>
        <section class="content">
            <?php echo getMessage(); ?>
            <div class="row">

                <?php if (!empty($cart_items)) { ?>
                    <div class="col-md-12">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">List Of Cart Items</h3>
                            </div>
                            <div class="box-body">
                                <table class="table table-bordered cart_table" id="cart">
                                    <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>HSN/SAC</th>
                                        <th class="w-10">Qty</th>
                                        <th>Pricing(INR)</th>
                                        <th>Discount</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($cart_items as $cart_item) {
                                        ?>
                                        <form id="frm" method="post">
                                            <tr>
                                                <input type="hidden" class="product_info_id" name="product_info_id" value="<?php echo !empty($cart_item['product_info_id']) ? $cart_item['product_info_id'] : ''; ?>">
                                                <td><?php echo $i; ?></td>
                                                <td>
                                                    <?php
                                                    $img = !empty($cart_item['product_logo']) && file_exists(FCPATH . 'data/child-sub-products/') ? 'data/child-sub-products/' . $cart_item['product_logo'] : '';
                                                    ?>
                                                    <img src="<?php echo !empty($img) ? base_url() . $img : dummyLogo() ?>"
                                                         alt="product image" class="p-img">
                                                </td>
                                                <td><?php echo !empty($cart_item['product_name']) ? $cart_item['product_name'] : ''; ?></td>
                                                <td><?php echo !empty($cart_item['hsn_code']) ? $cart_item['hsn_code'] : '12345'; ?></td>
                                                <td>
                                                    <input type="text" name="quantity" class="w-100 quantity" onkeypress="return isNumber(event)" value="<?php echo !empty($cart_item['quantity']) ? $cart_item['quantity'] : ''; ?>">
                                                </td>
                                                <td class="w-15">
                                                    <table>
                                                        <tbody>
                                                        <?php
                                                        if (!empty($cart_item['ranges'])) {
                                                            foreach ($cart_item['ranges'] as $pr) {
                                                                ?>
                                                                <tr>
                                                                    <?php
                                                                    if(!empty($pr['value_range'])){
                                                                        ?>
                                                                        <th><?php echo $pr['value_range']; ?></th>
                                                                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;<i class="fa fa-inr"></i> <?php echo $pr['dealer_price']; ?></td>
                                                                        <?php
                                                                    }else{
                                                                        ?>
                                                                        <td>&nbsp;<i class="fa fa-inr"></i> <?php echo $pr['dealer_price']; ?></td>
                                                                        <?php
                                                                    }
                                                                    ?>

                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td>
                                                    <input type="hidden" name="discount" class="input_discount" value="<?php echo !empty($cart_item['discount']) ? $cart_item['discount'] : ''; ?>">
                                                    <span class="discount_text"> <?php echo !empty($cart_item['discount']) ? $cart_item['discount'] .' '.'%' : ''; ?></span>
                                                </td>
                                                <td>
                                                    <input type="hidden" name="total" class="full_total" value="<?php echo !empty($cart_item['full_total']) ? $cart_item['full_total'] : ''; ?>">
                                                    <input type="hidden" name="sub_total" class="input_total" value="<?php echo !empty($cart_item['sub_total']) ? $cart_item['sub_total'] : ''; ?>">
                                                    <span class="span_total"> <?php echo !empty($cart_item['sub_total']) ? $cart_item['sub_total'] : ''; ?></span>
                                                </td>
                                                <td>
                                                    <a data-toggle="tooltip" data-placement="bottom" href="<?php echo base_url() ?>dealer/view-cart/?act=del&pk_id=<?php echo $cart_item['pk_id']; ?>" title='Delete' onclick="return window.confirm('Do You Want to Delete?');" class="btn btn-sm btn-default"><i class="fa fa-trash text-danger"></i></a>
                                                    <button class="btn btn-success btn-sm update">Update</button>
                                                </td>
                                            </tr>
                                        </form>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    <?php echo !empty($PAGING) ? $PAGING : ""; ?>
                                </div>
                            </div>
                            <div class="box-footer ">
                                <div class="pull-right">
                                    <a href="<?php echo base_url() ?>dealer/products" role="button"
                                       class="btn btn-success"><i class="fa fa-chevron-left"></i> &nbsp;&nbsp;Continue
                                        Shopping</a>
                                    <a href="<?php echo base_url() ?>dealer/orders/add" role="button"
                                       class="btn btn-warning">Place Order</a>
                                </div>
                            </div>
                        </div>
                    </div>
                  <!--  <div class="col-md-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">Price Details</div>
                            <div class="panel-body">
                                <ul class="list-inline list-unstyled">
                                    <li><h4>Price (Items)</h4></li>
                                    <li class="pull-right"><span class="total"></span></li>
                                </ul>
                                <hr/>
                                <ul class="list-inline list-unstyled">
                                    <li><h4><b>Amount Payable</b></h4></li>
                                    <li class="pull-right"><span class="total"></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>-->
                <?php } else {
                    ?>
                    <h1 class="text-center">Your Cart is Empty !</h1>
                    <div class="text-center">
                        <img src="<?php echo base_url() ?>data/empty-cart.jpg" class="text-center" height="250px">
                    </div>
                    <div class="clearfix"></div>
                    <div class="text-center">
                        <h3>Looks like you have no items in your shopping cart</h3>
                        <h4>Click <a href="<?php echo base_url()  ?>dealer/products">here</a> to continue shopping </h4>
                    </div>
                    <?php
                }
                ?>
            </div>
        </section>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('body').on('change', '.quantity', function () {
            var product_info_id = $(this).closest('tr').find('.product_info_id').val();
            var quantity = $(this).closest('tr').find('.quantity').val();
            var discount = $(this).closest('tr').find('.input_discount').val();
            console.log(discount);
            var thRow = $(this).closest('tr');
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url() ?>" + "dealer/fetch_price_ranges1/",
                data: {quantity: quantity, product: product_info_id},
                success: function (data) {
                    thRow.find('.full_total').val(data);
                    var dis = (data*discount)/100;
                    thRow.find('.input_total').val(data-dis);
                   thRow.find('.span_total').text((data-dis).toFixed(2));
                }
            });
        });
        $('body').on('click', '.update', function (e) {
            e.preventDefault();
            var product_info_id = $(this).closest('tr').find('.product_info_id').val();
            var total = $(this).closest('tr').find('.full_total').val();
            console.log(total);
            var sub_total = $(this).closest('tr').find('.input_total').val();
            var quantity = $(this).closest('tr').find('.quantity').val();
            var discount = $(this).closest('tr').find('.input_discount').val();
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url() ?>" + "dealer/update_cart/",
                data: {quantity: quantity, product: product_info_id, total: total,sub_total: sub_total,discount: discount},
                success: function (data) {
                 if(data == 'TRUE'){
                     window.location.reload(true);
                 }

                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        var amount;
        var total_amount = 0;
        $(".cart_table tbody tr").each(function () {
            amount = $(this).find('.total_amount').val();
            total_amount += parseFloat(amount);
        });
        $('.total').html(total_amount);
    })
</script>