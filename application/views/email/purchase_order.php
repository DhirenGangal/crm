<?php $company_name = "SCIE Technologies" ?>
<div style="width: 100%;float: left;display: block;font-size: 14px; color: #333;background: #f2f2f2; margin: 10px auto; max-width: 640px; padding: 20px 50px;">
    <div style="width:100%;margin: 0 auto;">
        <div style="width:100%;margin-bottom: 15px;">
            <div style="width:50%;float: left;"><h4><?php echo $company_name; ?></h4></div>
            <div style="width:50%;float: left;text-align:right">
                <img src="<?php echo base_url() ?>data/logo.png" alt="" width="200" height="100"/></div>
        </div>
        <div style=" border: 1px solid #fff; border-radius: 6px; background: #FFF; float: left; width:100%;padding: 15px 30px;">
            <p><b>Subject </b>:Welcome to <?php echo $company_name; ?></p>
            <p>Dear <?php echo !empty($to_address) ? $to_address['first_name'].' '.$to_address['last_name'] : '' ?>,</p>
            <p>Thank you for your order. Below are the order detail based upon PO number : <?php echo !empty($order['order_no']) ? $order['order_no'] : '' ?></p>
            <table border="1" cellpadding="5" style="width:100%;padding:5px;border-collapse: collapse;">
                <thead>
                <tr>
                    <th>S.No</th>
                    <th style="width:10%; text-align:center ">Product Name</th>
                    <th style="width:10%;text-align:center">HSN/SAC</th>
                    <th style="text-align:center">Quantity</th>
                    <th>Rate </th>
                    <th style="width:10%; text-align:center">Discount Rate(%)</th>
                    <th>Taxable Value </th>
                    <th>Taxable Rate </th>
                    <?php
                    if( $order['cgst_amount'] == '0.00'){
                        ?>
                        <th>IGST</th>
                        <?php
                    }else{
                        ?>
                        <th>CGST</th>
                        <th>SGST</th>
                        <?php
                    }
                    ?>


                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if(!empty($order['order_items'])){
                    $i=1;
                    foreach ($order['order_items'] as $oi){
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $oi['product_name']; ?></td>
                            <td><?php echo $oi['hsn_code']; ?></td>
                            <td><?php echo $oi['quantity']; ?></td>
                            <td><?php echo $oi['unit_price']; ?></td>
                            <td><?php echo $oi['discount']; ?></td>
                            <td><?php echo $oi['amnt_aft_discount']; ?></td>
                            <td><?php echo $oi['gst']; ?></td>
                            <?php
                            if($oi['cgst_amount'] == '0.00'){
                                ?>
                                <td><?php echo $oi['igst_amount']; ?></td>

                                <?php
                            }else{
                                ?>
                                <td><?php echo $oi['cgst_amount']; ?></td>
                                <td><?php echo $oi['sgst_amount']; ?></td>
                                <?php
                            }
                            ?>
                            <td><?php echo $oi['total_amount']; ?></td>
                        </tr>
                        <?php
                        $i++;
                    }
                }
                ?>


                </tbody>
                <tfoot>
                <tr>
                    <td colspan="5">Total Inv. Val</td>
                    <td><?php echo $order['discount_total'] ?></td>
                    <td><?php echo $order['sub_amount'] ?></td>
                    <td></td>
                    <?php
                    if( $order['cgst_amount'] == '0.00'){
                        ?>
                        <td><?php echo $order['igst_amount'] ?></td>

                        <?php
                    }else{
                        ?>
                        <td><?php echo $order['cgst_amount'] ?></td>
                        <td><?php echo $order['sgst_amount'] ?></td>
                        <?php
                    }
                    ?>


                    <td><?php echo $order['final_total'] ?></td>
                </tr>
                <tr >
                    <td colspan="12" style="text-align:center">PLEASE NOTIFY US IMMEDIATELY IF THIS ORDER CANNOT BE SHIPPED COMPLETE ON OR
                        BEFORE: <?php echo $order['expected_date'] ?></td>
                </tr>
                </tfoot>

            </table>
            <p>Need to make any changes? Contact us at orders@vscietechnologies.com. For any technical assistance
                contact +91 9620132023. Visit us at http://www.vscietechnologies.com </p>
            <h4>We hope to see you again. </h4>
            <h4><?php echo $company_name; ?> Team </h4>
        </div>
    </div>
</div>
