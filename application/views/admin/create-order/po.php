<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/lib/css/print-styles.css">
<div class="content-wrapper">

        <section class="content-header">
            <h1>Purchase Order</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Purchase Order</li>
            </ol>
        </section>
    <section class="content">
        <?php echo getMessage(); ?>
        <div class="box box-info">
            <div class="box-header with-border">

                <h3 class="box-title text-center po-title">PURCHASE ORDER</h3>

                <div class="box-tools">
                    <a href="<?php echo base_url() ?>admin/create-order/" class="btn btn-sm btn-danger " ><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12  p-t-b-20">
                        <div class="col-md-3 owner-info-1">
                            <?php echo !empty($from_address) ? $from_address['address'] : '' ?>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-3  owner-info-2">
                            <ul class="list-unstyled">
                                <li><span class="pull-left"><b>Order Date</b></span><span
                                            class="pull-right"><?php echo !empty($order['order_date']) ? $order['order_date'] : '' ?></span>
                                </li>
                                <br/>
                                <li><span class="pull-left"><b>Order no</b></span><span
                                            class="pull-right"><?php echo !empty($order['order_no']) ? $order['order_no'] : '' ?></span>
                                </li>
                                <br/>
                                <li><span class="pull-left"><b>Approved By</b></span><span
                                            class="pull-right"><?php echo !empty($order['approved_by_name']) ? $order['approved_by_name'] : '' ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-md-12 w-100">
                        <div class="line"></div>

                        <div class="col-md-3 p-0 w-40">
                            <h4 class="bill-title">Customer Name</h4>
                            <h4> <?php echo !empty($to_address) ? $to_address['first_name'].' ' .$to_address['last_name']: '' ?></h4>
                        </div>
                        <div class="col-md-offset-2 col-md-3 w-20">
                            <h4 class="bill-title">Billing Address</h4>
                            <h4> <?php echo !empty($to_address) ? $to_address['first_name'].' ' .$to_address['last_name']: '' ?></h4>
                        </div>
                        <div class="col-md-3 w-20">
                            <h4 class="bill-title">Shipping Address</h4>
                            <h4> <?php echo !empty($to_address) ? $to_address['first_name'].' ' .$to_address['last_name']: '' ?></h4>
                            <h4> <?php echo !empty($to_address) ? $to_address['state_name']: '' ?></h4>
                            <h4> <?php echo !empty($to_address) ? $to_address['country_name']: '' ?></h4>
                        </div>
                        <div class="clearfix"></div>

                        <div class="line"></div>
                    </div>
                    <div class="col-md-12">
                        <p class="place-supply"><b>Place of Supply </b> : <b><?php echo !empty($to_address) ? $to_address['state_name']: '' ?></b></p>
                        <div class="clearfix"></div>
                        <div class="line"></div>
                    </div>

                    <div class="col-md-12 p-t-20">
                        <table class="table table-bordered product_table" id="dynamic_field">
                            <thead>
                            <tr>
                                <th colspan="1" rowspan="2" class="text-center">S.No</th>
                                <th colspan="1" rowspan="2" class="text-center w-10">Name</th>
                                <th colspan="1" rowspan="2" class="text-center w-10">HSN / SAC</th>
                                <th colspan="1" rowspan="2" class="text-center">Qty</th>
                                <th colspan="1" rowspan="2" class="text-center w-10">Unit Price (Rs.)</th>
                                <th colspan="1" rowspan="2" class="text-center w-10">Discount (%)</th>
                                <th colspan="1" rowspan="2" class="text-right w-10">Taxable Value</th>
                                <th colspan="1" rowspan="2" class="text-center w-10">Taxable Rate</th>
                                <th colspan="3" rowspan="1" class="text-center w-10">Tax Values (Rs.)</th>
                                <th colspan="1" rowspan="2" class="text-center w-10">Total</th>
                            </tr>
                            <tr>

                                <th class="text-right">CGST</th>
                                <th class="text-right">SGST</th>
                                <th class="text-right">IGST</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (!empty($order['order_items'])) {
                                $i = 1;
                                foreach ($order['order_items'] as $order_item) {
                                    ?>

                                    <tr>
                                        <td class="text-center"><?php echo $i; ?></td>
                                        <td class="text-center"><?php echo !empty($order_item['child_product']) ? $order_item['child_product'] : '' ?></td>
                                        <td class="text-center"><?php echo !empty($order_item['hsn_code']) ? $order_item['hsn_code'] : '' ?></td>
                                        <td class="text-center"><?php echo !empty($order_item['quantity']) ? $order_item['quantity'] : '' ?></td>
                                        <td class="text-right"><?php echo !empty($order_item['unit_price']) ? $order_item['unit_price'] : '' ?></td>
                                        <td class="text-right"><?php echo !empty($order_item['discount_amount']) ? $order_item['discount_amount'] : '0' ?></td>
                                        <td class="text-right"><?php echo !empty($order_item['amnt_aft_discount']) ? $order_item['amnt_aft_discount'] : '' ?></td>
                                        <td class="text-right"><?php echo !empty($order_item['gst']) ? $order_item['gst'] : '' ?></td>
                                        <td class="text-right"><?php echo !empty($order_item['cgst_amount']) ? $order_item['cgst_amount'] : '' ?></td>
                                        <td class="text-right"><?php echo !empty($order_item['sgst_amount']) ? $order_item['sgst_amount'] : '' ?></td>
                                        <td class="text-right"><?php echo !empty($order_item['igst_amount']) ? $order_item['igst_amount'] : '' ?></td>
                                        <td class="text-right"><?php echo !empty($order_item['total_amount']) ? $order_item['total_amount'] : '' ?></td>
                                        <td class="hide">
                                            <button type="button" class="btn btn-sm btn-success add" id="add"><i class="fa fa-plus"></i></button>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                            }
                            ?>

                            </tbody>
                            <tfoot>

                            <tr>
                                <td class="text-right" colspan="5">Total Inv. Val</td>
                                <td><span class="pull-right"> <span class="discount_total"><?php echo !empty($order['discount_total']) ? $order['discount_total'] : 0.00 ?></span></span></td>
                                <td colspan="1"><span><span class="total pull-right"><?php echo !empty($order['sub_amount']) ? $order['sub_amount'] : 0.00 ?></span></span></td>
                                <td></td>
                                <td colspan="1"><span class="pull-right"> <span class="cgst_total"><?php echo !empty($order['cgst_amount']) ? $order['cgst_amount'] : 0.00; ?></span> </span></td>
                                <td colspan="1"><span class="pull-right"> <span class="sgst_total"><?php echo !empty($order['sgst_amount']) ? $order['sgst_amount'] : 0.00; ?></span> </span></td>
                                <td colspan="1"><span class="pull-right"> <span class="igst_total"><?php echo !empty($order['igst_amount']) ? $order['igst_amount'] : 0.00; ?></span> </span></td>
                                <td colspan="1"><span class="pull-right"> <span class="final_total"><?php echo !empty($order['final_total']) ? $order['final_total'] : 0.00; ?></span> </span>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td colspan="12">PLEASE NOTIFY US IMMEDIATELY IF THIS ORDER CANNOT BE SHIPPED COMPLETE ON OR BEFORE: <?php echo dateDB2SHOW($order['expected_date']) ?></td>
                            </tr>
                            </tfoot>
                            <tfoot class="hide">
                            <tr class="text-center">

                            </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-9">

                        </div>
                        <div class="col-md-3 w-30">
                            <table class="table ">
                                <input type="hidden" name="text_amount" class="input_text_amount" value="<?php echo !empty($order['text_amount']) ? $order['text_amount'] : 0.00 ?>"/>
                                <input type="hidden" name="sub_amount" class="input_total" value="<?php echo !empty($order['sub_abmount']) ? $order['sub_abmount'] : 0.00 ?>"/>
                                <input type="hidden" name="discount_total" class="input_discount_total" value="<?php echo !empty($order['discount_total']) ? $order['discount_total'] : 0.00 ?>"/>
                                <input type="hidden" name="" class="input_net_total" value="<?php echo !empty($order['sub_amount']) ? $order['sub_amount'] : 0.00; ?>"/>
                                <input type="hidden" name="cgst_amount" class="input_cgst_total" value="<?php echo !empty($order['cgst_amount']) ? $order['cgst_amount'] : 0.00; ?>"/>
                                <input type="hidden" name="sgst_amount" class="input_sgst_total" value="<?php echo !empty($order['sgst_amount']) ? $order['sgst_amount'] : 0.00; ?>"/>
                                <input type="hidden" name="igst_amount" class="input_igst_total" value="<?php echo !empty($order['igst_amount']) ? $order['igst_amount'] : 0.00; ?>"/>
                                <input type="hidden" name="tax_amount" class="input_tax_total" value="<?php echo !empty($order['tax_amount']) ? $order['tax_amount'] : 0.00; ?>"/>
                                <input type="hidden" name="final_total" class="input_final_total" value="<?php echo !empty($order['final_total']) ? $order['final_total'] : 0.00; ?>"/>
                                <tr>
                                    <th>Taxable Amount</th>
                                    <td><span><i class="fa fa-inr "></i>  <span class="total"><?php echo !empty($order['sub_amount']) ? $order['sub_amount'] : 0.00 ?></span></span></td>
                                </tr>
                                <tr>
                                    <th>Total Tax</th>
                                    <td><span> <i class="fa fa-inr "></i> <span class="tax_total"><?php echo !empty($order['tax_amount']) ? $order['tax_amount'] : 0.00 ?></span></span></td>
                                </tr>
                                <tr>
                                    <th>Total Value</th>
                                    <td><span> <i class="fa fa-inr "></i> <span class="final_total"><?php echo !empty($order['final_total']) ? $order['final_total'] : 0.00; ?></span> </span></td>
                                </tr>

                            </table>


                        </div>
                    </div>
                    <div class="col-md-12 ">

                        <div class="pull-right "> <b>Total Amount (In words)</b>   : <?php echo !empty($order['text_amount']) ? $order['text_amount'] : 0.00; ?>  </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    </div>
<script>
    $('.discount_type').change(function () {
        var val = $(this).val();
        $(".cart_table tbody tr").each(function () {
            var discount = parseFloat($(this).find('.input_discount_val').val());
            var discount_val = parseFloat($(this).find('.input_discount').val());
            discount = discount.toFixed(2);
            if (val == 'PERCENTAGE') {
                $(this).find('.discount').text(discount_val);
            } else {
                $(this).find('.discount').text(discount);
            }
        })
    })
</script>
