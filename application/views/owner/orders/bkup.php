<link rel="stylesheet" href="<?php echo base_url() ?>assets/lib/css/bootstrap-datepicker.min.css">
<div class="content-wrapper">
    <div class="container">
        <section class="content-header">
            <h1>Product Orders</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Product Orders</li>
            </ol>
        </section>

        <section class="content">
            <?php echo getMessage(); ?>
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Product Orders</h3>
                    <div class="box-tools">
                        <a href="<?php echo base_url(); ?>owner/orders/" class="btn btn-sm btn-danger"><i
                                class="fa fa-arrow-left"></i> Back</a>
                    </div>
                </div>
                <div class="box-body">
                    <form method="post" enctype="multipart/form-data" id="frm">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" class="form-control ofc_state" name="state" value="<?php echo !empty($site_info['state']) ? $site_info['state'] : ''; ?>">
                                <input type="hidden" class="form-control user_state_id" name="state" value="<?php echo !empty($user['state']) ? $user['state'] : ''; ?>">
                                <input type="hidden" class="form-control" name="order_id" value="<?php echo !empty($order['order_id']) ? $order['order_id'] : ''; ?>">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Order Date <sup
                                                class="text-danger">*</sup></label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" id="order_date" name="order_date"
                                                   placeholder="Order Date"
                                                   value="<?php echo !empty($order['order_date']) ? dateDB2SHOW($order['order_date']) : ''; ?>"
                                                   required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Expected Date <sup
                                                class="text-danger">*</sup></label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" id="expected_date"
                                                   name="expected_date" placeholder="Expected Date" required
                                                   value="<?php echo !empty($order['expected_date']) ? dateDB2SHOW($order['expected_date']) : ''; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Delivery Within</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="delivery_within"
                                                   id="date_diff" placeholder="Delivery with in...."
                                                   value="<?php echo !empty($order['delivery_within']) ? $order['delivery_within'] : ''; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br/>
                        <br/>
                        <table class="table table-bordered cart_table" id="cart">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Mfr No</th>
                                <th>Qty</th>
                                <th>Unit Price</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (!empty($cart_items)) {
                                $i = 1;
                                foreach ($cart_items as $cart_item) {
                                    ?>

                                    <tr>
                                        <input type="hidden" name="product_info_id[]" value="<?php echo !empty($cart_item['product_info_id']) ? $cart_item['product_info_id'] : ''; ?>">
                                        <input type="hidden" name="product_id[]" value="<?php echo !empty($cart_item['product_id']) ? $cart_item['product_id'] : ''; ?>">
                                        <input type="hidden" name="product_name[]" value="<?php echo !empty($cart_item['product_name']) ? $cart_item['product_name'] : ''; ?>">
                                        <input type="hidden" class="gst" name="gst[]" value="<?php echo !empty($cart_item['gst']) ? $cart_item['gst'] : ''; ?>">
                                        <td><?php echo $i; ?></td>
                                        <td>
                                            <?php
                                            $img = !empty($cart_item['product_logo']) && file_exists(FCPATH . 'data/child-sub-products/') ? 'data/child-sub-products/' . $cart_item['product_logo'] : '';
                                            ?>
                                            <img src="<?php echo !empty($img) ? base_url() . $img : dummyLogo() ?>"
                                                 alt="product image" class="img-table">
                                        </td>
                                        <td><?php echo !empty($cart_item['product_name']) ? $cart_item['product_name'] : ''; ?></td>
                                        <td><?php echo !empty($cart_item['mfr_no']) ? $cart_item['mfr_no'] : '123456'; ?></td>
                                        <td><input type="hidden" name="quantity[]" class="w-100 quantity"
                                                   value="<?php echo !empty($cart_item['quantity']) ? $cart_item['quantity'] : ''; ?>">
                                            <?php echo !empty($cart_item['quantity']) ? $cart_item['quantity'] : ''; ?>
                                        </td>
                                        <td><input type="hidden" name="mrp_price[]"
                                                   value="<?php echo !empty($cart_item['mrp_price']) ? $cart_item['mrp_price'] : ''; ?>">
                                            <?php echo !empty($cart_item['mrp_price']) ? $cart_item['mrp_price'] : ''; ?>
                                        </td>
                                        <td><input type="hidden" class="input_amount" name="sub_total[]"
                                                   value="<?php echo !empty($cart_item['sub_total']) ? $cart_item['sub_total'] : ''; ?>">
                                            <?php echo !empty($cart_item['sub_total']) ? $cart_item['sub_total'] : ''; ?>
                                        </td>
                                    </tr>


                                    <?php
                                    $i++;

                                }
                            }
                            ?>

                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label>Remarks</label>
                                        <textarea class="form-control" name="remarks" rows="5"
                                                  placeholder="Enter remarks"><?php echo !empty($order['remarks']) ? $order['remarks'] : '' ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <table class="table table-bordered m-t-7p">
                                        <tbody>
                                        <tr>
                                            <th class="w-50 font-amnt">Amount Payable</th>
                                            <td><span><i class="fa fa-inr fa-inr-icon"></i> <span
                                                        class="total"><?php echo !empty($order['final_amount']) ? $order['final_amount'] : 0.00; ?></span></span>
                                                <input type="hidden" name="final_amount" class="input_total"
                                                       value="<?php echo !empty($order['final_amount']) ? $order['final_amount'] : 0; ?>"/>
                                            </td>
                                        </tr>
                                        <!--  <tr>
                                            <th class="w-50">DISCOUNT TOTAL</th>
                                            <td>
                                                <span><i class="fa fa-inr"></i> <span
                                                            class="discount_total"><?php /*echo !empty($order['discount_total']) ? $order['discount_total'] : 0.00; */?></span> </span>
                                                <input type="hidden" name="discount_total" class="input_discount_total"
                                                       value="<?php /*echo !empty($order['discount_total']) ? $order['discount_total'] : 0.00; */?>"/>

                                            </td>
                                        </tr>-->
                                        <!-- <tr>
                                            <th class="w-50">FINAL TOTAL</th>
                                            <td>
                                                <span><i class="fa fa-inr"></i> <span
                                                            class="final_total"><?php /*echo !empty($order['final_total']) ? $order['final_total'] : 0.00; */?></span> </span>
                                                <input type="hidden" name="final_total" class="input_final_total"
                                                       value="<?php /*echo !empty($order['final_total']) ? $order['final_total'] : 0.00; */?>"/>
                                            </td>
                                        </tr>-->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <button form="frm" type="submit" class="btn btn-success">Submit</button>
                        <a href="<?php echo base_url() ?>owner/orders/" class="btn btn-danger">Cancel</a>

                    </div>
                </div>
            </div>
        </section>


    </div>
</div>
<script src="<?php echo base_url() ?>assets/lib/js/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/lib/js/bootstrap-datepicker.min.js"></script>
<script>
    $(document).ready(function () {
        var amount;
        var total_amount = 0;
        $(".cart_table tbody tr").each(function () {
            amount = $(this).find('.input_amount').val();
            total_amount += parseFloat(amount);
        });
        $('.total').html(total_amount);
        $('.input_total').val(total_amount);
    })

</script>
<script>
    $(function ($) {
        var $from = $('#order_date');
        var $to = $("#expected_date");

        $from.datepicker({
            todayBtn: "linked",
            autoclose: true,
            todayHighlight: true,
            format: 'dd/mm/yyyy',
            startDate: '+0d',
            endDate: '+0d',
            onClose: function (selectedDate) {
                $to.datepicker("option", "minDate", selectedDate);
            }
        });

        $to.datepicker({

            todayBtn: "linked",
            autoclose: true,
            format: 'dd/mm/yyyy',
            startDate: '+1d',
            onClose: function (selectedDate) {
                $from.datepicker("option", "maxDate", selectedDate);
            }
        });

        $from.add($to).change(function () {
            var dayFrom = $from.datepicker('getDate');
            var dayTo = $to.datepicker('getDate');
            if (dayFrom && dayTo) {
                var days = calcDaysBetween(dayFrom, dayTo);
                (days == 0 || days == 1) ?
                    $('#date_diff').val(days + " Day") :
                    $('#date_diff').val(days + " Days");

            }
        });

        function calcDaysBetween(startDate, endDate) {
            return (endDate - startDate) / (1000 * 60 * 60 * 24);
        }
    });
</script>
<script>
    $(document).ready(function () {
        function totalAmount(){
            var $totalAmt = 0;
            $("body").find(".q_amount").each(function () {
                var total_amt = $(this).val();
                if (total_amt.length !== 0) {
                    $totalAmt += parseFloat(total_amt);
                }
            });
            $totalAmt = toDecimal($totalAmt,2);
            $('.totalAmtTxt').val($totalAmt);
            $('.net_amt').text($totalAmt);

            var $totalNetAmt = 0;

            $("body").find(".tax_amount").each(function () {
                var net_amt = $(this).val();
                if (!isNaN(net_amt)) {
                    $totalNetAmt += parseFloat(net_amt);
                }
            });
            var $taxAmt = parseFloat($totalNetAmt) - parseFloat($totalAmt);
            $taxAmt = toDecimal($taxAmt,2);
            $('.totalTaxTxt').val($taxAmt);
            var $customerBranchId = $('.customer_branch_id').val();
            var $branchId = $('.branch_id').val();
            if ($customerBranchId == $branchId) {
                // CGST and SGST
                var $halfTax = parseFloat($taxAmt / 2);
                $halfTax = $halfTax.toFixed(2);
                $('.cgst_amt,.sgst_amt').text($halfTax);
                $('.cgstAmtTxt,.sgstAmtTxt').val($halfTax);
                $('.igst_amt').text('0.00');
                $('.igstAmtTxt').val('0.00');
            } else {
                // IGST
                $('.cgst_amt,.sgst_amt').text('0.00');
                $('.cgstAmtTxt,.sgstAmtTxt').val('0.00');
                $('.igst_amt').text($taxAmt);
                $('.igstAmtTxt').val($taxAmt);
            }

            finalAmount();
        }
        var $userStateId = $('.user_state_id').val();
        var $scieStateId = $('.ofc_state').val();
        console.log($userStateId);
        console.log($scieStateId);
        if ($userStateId == $scieStateId) {
            // CGST and SGST
            //var $halfTax = parseFloat($taxAmt / 2);
            $halfTax = $halfTax.toFixed(2);
            $('.cgst_amt,.sgst_amt').text($halfTax);
            $('.cgstAmtTxt,.sgstAmtTxt').val($halfTax);
            $('.igst_amt').text('0.00');
            $('.igstAmtTxt').val('0.00');
        } else {
            // IGST
            $('.cgst_amt,.sgst_amt').text('0.00');
            $('.cgstAmtTxt,.sgstAmtTxt').val('0.00');
            //  $('.igst_amt').text($taxAmt);
            //  $('.igstAmtTxt').val($taxAmt);
        }

    })
</script>