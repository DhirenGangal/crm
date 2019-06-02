<?php $company_name = 'SCIE Technologies' ?>
<div style="width: 85%;float: left;display: block;font-size: 14px; color: #333;background: #f2f2f2; margin: 10px auto; max-width: 640px; padding: 20px 50px;">
    <div style="width:90%;margin: 0 auto;">
        <div style="width:100%;margin-bottom: 15px;">
            <div style="width:50%;float: left;"> <img src="<?php echo base_url() ?>data/logo.png" alt="<?php echo $company_name; ?>" width="200" height="100"/></div>
            <div style="width:50%;float: left;text-align:right">
            </div>
        </div>
        <div style=" border: 1px solid #fff; border-radius: 6px; background: #FFF; float: left; width: 91%;padding: 15px 30px;">
            <p>Dear <?php echo !empty($to_name) ? $to_name : ""; ?>,</p> <br/>
            <table class="table table-bordered product_table" id="dynamic_field">
                <thead>
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>HSN/SAC</th>
                    <th>Qty</th>
                    <th>Rate ( <i class="fa fa-inr"></i> )</th>
                    <th>Discount Rate(%)</th>
                    <th>Taxable Value ( <i class="fa fa-inr"></i> )</th>
                    <?php
                    if (($order['order_items'][0]['cgst_amount'] != '0.00')) {
                        ?>
                        <th>CGST ( <i class="fa fa-inr"></i> )</th>
                        <th>SGST ( <i class="fa fa-inr"></i> )</th>
                        <?php
                    }
                    ?>
                    <?php
                    if (($order['order_items'][0]['igst_amount'] != '0.00')) {
                        ?>
                        <th>IGST ( <i class="fa fa-inr"></i> )</th>
                        <?php
                    }
                    ?>
                    <th>Total ( <i class="fa fa-inr"></i> )</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (!empty($order['order_items'])) {
                    $i = 1;
                    foreach ($order['order_items'] as $order_item) {
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo !empty($order_item['product_name']) ? $order_item['product_name'] : '' ?></td>
                            <td><?php echo !empty($order_item['hsn_code']) ? $order_item['hsn_code'] : '' ?></td>
                            <td><?php echo !empty($order_item['quantity']) ? $order_item['quantity'] : '' ?></td>
                            <td><?php echo !empty($order_item['unit_price']) ? $order_item['unit_price'] : '' ?></td>
                            <td><?php echo !empty($order_item['discount']) ? $order_item['discount'] . ' ' . '%' : '0' . ' ' . '%' ?></td>
                            <td><?php echo !empty($order_item['amnt_aft_discount']) ? $order_item['amnt_aft_discount'] : '' ?></td>
                            <?php
                            if (($order['order_items'][0]['cgst_amount'] != '0.00')) {
                                ?>
                                <td>
                                    <?php echo !empty($order_item['cgst_amount']) ? $order_item['cgst_amount'] : '' ?>
                                    <div><?php echo !empty($order_item['gst']) ? '@'.' '.$order_item['gst'] .' '.'%' : '' ?></div>
                                </td>
                                <td>
                                    <?php echo !empty($order_item['sgst_amount']) ? $order_item['sgst_amount'] : '' ?>
                                    <div><?php echo !empty($order_item['gst']) ? '@'.' '.$order_item['gst'] .' '.'%' : '' ?></div>
                                </td>
                                <?php
                            }else{
                                ?>
                                <td>
                                    <?php echo !empty($order_item['igst_amount']) ? $order_item['igst_amount'] : '' ?>
                                    <?php echo !empty($order_item['gst']) ? $order_item['gst'] : '' ?>
                                </td>

                                <?php
                            }
                            ?>
                            <td><?php echo !empty($order_item['total_amount']) ? $order_item['total_amount'] : '' ?></td>
                        </tr>
                        <?php
                        $i++;
                    }
                }
                ?>
                </tbody>
                <tfoot>
                <tr>
                    <td>Total Inv. Val</td>
                    <td><?php echo !empty($order['discount_total']) ? $order['discount_total'] : 0.00 ?></td>
                    <td><?php echo !empty($order['sub_amount']) ? $order['sub_amount'] : 0.00 ?></span></span>
                    </td>
                    <?php
                    if (($order['cgst_amount'] != '0.00')) {
                        ?>
                        <td colspan="1"><span class="pull-right"> <span class="cgst_total"><?php echo !empty($order['cgst_amount']) ? $order['cgst_amount'] : 0.00; ?></span> </span>
                        </td>
                        <td colspan="1"><span class="pull-right"> <span class="sgst_total"><?php echo !empty($order['sgst_amount']) ? $order['sgst_amount'] : 0.00; ?></span> </span>
                        </td>
                        <?php
                    }else{
                        ?>
                        <td colspan="1"><span class="pull-right"> <span
                                    class="igst_total"><?php echo !empty($order['igst_amount']) ? $order['igst_amount'] : 0.00; ?></span> </span>
                        </td>
                        <?php
                    }
                    ?>

                    <td colspan="1"><span class="pull-right"> <span
                                class="final_total"><?php echo !empty($order['final_total']) ? $order['final_total'] : 0.00; ?></span> </span>
                    </td>
                </tr>
                <tr class="text-center">
                    <td colspan="12">PLEASE NOTIFY US IMMEDIATELY IF THIS ORDER CANNOT BE SHIPPED COMPLETE ON OR
                        BEFORE: <?php echo dateDB2SHOW($order['expected_date']) ?></td>
                </tr>
                </tfoot>

            </table>
            <p>We hope to see you again. <?php echo $company_name; ?></p>
            <p>Team <?php echo $company_name; ?></p>
        </div>
    </div>
</div>
