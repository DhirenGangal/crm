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
                    <h3 class="box-title">Purchase Order</h3>
                    <div class="box-tools">
                        <a href="<?php echo base_url(); ?>admin/orders/" class="btn btn-sm btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-offset-1 col-md-10">
                            <div class="col-md-6">
                                <?php
                                echo $site_info['address']

                                ?>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <th>Order no</th>
                                        <td><?php echo !empty($order['order_no'])? $order['order_no'] : '' ?></td>
                                    </tr>
                                    <tr>
                                        <th>Order Date</th>
                                        <td><?php echo !empty($order['order_date'])? $order['order_date'] : '' ?></td>
                                    </tr>
                                    <tr>
                                        <th>Dealer name</th>
                                        <td>O<?php echo !empty($order['created_by'])? $order['created_by'] : '' ?></td>
                                    </tr>
                                    <tr>
                                        <th>Approved By</th>
                                        <td><?php echo !empty($order['approved_by_name'])? $order['approved_by_name'] : '' ?></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered product_table" id="dynamic_field">
                            <thead>
                            <tr>
                                <td>S.No</td>
                                <th>Name</th>
                                <th>Quautity</th>
                                <th>Unit Price</th>
                                <th>Discount</th>
                                <th>Total Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(!empty($order['order_items'])){
                                $i=1;
                                foreach ($order['order_items'] as $order_item){
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo !empty($order_item['product_name'])? $order_item['product_name'] : '' ?></td>
                                        <td><?php echo !empty($order_item['quantity'])? $order_item['quantity'] : '' ?></td>
                                        <td><?php echo !empty($order_item['unit_price'])? $order_item['unit_price'] : '' ?></td>
                                        <td><?php echo !empty($order_item['discount_amount'])? $order_item['discount_amount'] : '' ?></td>
                                        <td><?php echo !empty($order_item['total_amount'])? $order_item['total_amount'] : '' ?></td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                            }
                            ?>

                            </tbody>
                            <tfoot>
                            <tr class="text-center"><td colspan="7">PLEASE NOTIFY US IMMEDIATELY IF THIS ORDER CANNOT BE SHIPPED COMPLETE ON OR BEFORE: <?php echo dateDB2SHOW($order['expected_date']) ?></td></tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-8">

                            </div>
                            <div class="col-md-4">
                                <table class="table table-bordered m-t-7p">
                                    <tbody>
                                    <tr>
                                        <th class="w-50 ">Net Amount</th>
                                        <td><span><i class="fa fa-inr "></i> <span
                                                        class="total"><?php echo !empty($order['sub_amount']) ? $order['sub_amount'] : 0.00; ?></span></span>
                                            <input type="hidden" name="sub_amount" class="input_total"
                                                   value="<?php echo !empty($order['sub_amount']) ? $order['sub_amount'] : 0; ?>"/>
                                        </td>
                                    </tr>
                                    <?php if ($order['cgst_amount'] !='0.00') {
                                        ?>
                                        <tr>
                                            <th class="w-50">CGST Amount</th>
                                            <td>
                                                    <span><i class="fa fa-inr"></i> <span
                                                                class="cgst_total"><?php echo !empty($order['cgst_amount']) ? $order['cgst_amount'] : 0.00; ?></span> </span>
                                                <input type="hidden" name="cgst_amount" class="input_cgst_total"
                                                       value="<?php echo !empty($order['cgst_amount']) ? $order['cgst_amount'] : 0.00; ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="w-50">SGST Amount</th>
                                            <td>
                                            <span><i class="fa fa-inr"></i> <span
                                                        class="sgst_total"><?php echo !empty($order['sgst_amount']) ? $order['sgst_amount'] : 0.00; ?></span> </span>
                                                <input type="hidden" name="sgst_amount" class="input_sgst_total"
                                                       value="<?php echo !empty($order['sgst_amount']) ? $order['sgst_amount'] : 0.00; ?>"/>
                                            </td>
                                        </tr>
                                        <?php
                                    } ?>
                                    <?php if ($order['igst_amount'] != '0.00') {
                                        ?>
                                        <tr>
                                            <th class="w-50">IGST Amount</th>
                                            <td>
                                            <span><i class="fa fa-inr"></i> <span
                                                        class="igst_total"><?php echo !empty($order['igst_amount']) ? $order['igst_amount'] : ''; ?></span> </span>
                                                <input type="hidden" name="igst_amount" class="input_igst_total"
                                                       value="<?php echo !empty($order['igst_amount']) ? $order['igst_amount'] : 0.00; ?>"/>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <tr>
                                        <th class="w-50 font-amnt">Amount Payable</th>
                                        <td>
                                            <span><i class="fa fa-inr fa-inr-icon"></i> <span
                                                        class="final_total"><?php echo !empty($order['final_total']) ? $order['final_total'] : 0.00; ?></span> </span>
                                            <input type="hidden" name="tax_amount" class="input_tax_total"
                                                   value="<?php echo !empty($order['tax_amount']) ? $order['tax_amount'] : 0.00; ?>"/>
                                            <input type="hidden" name="final_total" class="input_final_total"
                                                   value="<?php echo !empty($order['final_total']) ? $order['final_total'] : 0.00; ?>"/>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
