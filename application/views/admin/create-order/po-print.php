<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo !empty($title) ? $title : '' ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/lib/css/print-styles.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lib/css/dataTables.bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/lib/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/lib/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/lib/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/lib/css/skins/_all-skins.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        th {
            vertical-align: middle !important;
        }
    </style>
</head>
<?php
if (!empty($_GET['type'])) {
    $msg = '';
    $msg1 = '';
    if ($_GET['type'] == 'customer') {
        $msg = 'ORIGINAL';
        $msg1 = 'Recipient';
    } else if ($_GET['type'] == 'transporter') {
        $msg = 'DUPLICATE';
        $msg1 = 'Transporter';
    } else if ($_GET['type'] == 'supplier') {
        $msg = 'TRIPLICATE';
        $msg1 = 'Supplier';
    }
}
?>
<body onload="window.print();" onfocus="window.close();">
<section class="content">
    <?php echo getMessage(); ?>
    <div class="box box-info">
        <div class="box-header with-border hidden-print">
            <div class="form-group text-center">
                <label>Print for &nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;</label>
                <label class="radio-inline"><input type="radio" class="radio" name="print_type" value="customer"
                                                   checked>Customer</label>
                <label class="radio-inline"><input type="radio" class="radio" name="print_type" value="transporter">Transporter</label>
                <label class="radio-inline"><input type="radio" class="radio" name="print_type" value="supplier">Supplier</label>
            </div>
            <div class="box-tools">
                <a href="<?php echo base_url() ?>admin/create-order/print/1?type=customer" class="btn btn-success ptype"
                   target="_blank"><i class="fa fa-print"></i> Print</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center po-title">PURCHASE ORDER</h3>
                    <div class="block pull-right text-center">
                        <p class="print-for"><?php echo !empty($msg) ? $msg : 'ORIGINAL' ?></p>
                        <div class="line"></div>
                        <p class="m-0">For <span
                                    class="print-to"><?php echo !empty($msg1) ? $msg1 : 'Recipient' ?></span></p>
                    </div>
                </div>
                <div class="col-md-12  p-t-b-20">
                    <div class="col-md-3 owner-info-1">
                        <?php echo !empty($from_address) ? $from_address['address'] :''?>
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
                        <h4><?php echo !empty($to_address) ? $to_address['first_name'].' '.$to_address['last_name'] : '' ?></h4>
                    </div>
                    <div class="col-md-offset-2 col-md-3 w-20">
                        <h4 class="bill-title">Billing Address</h4>
                        <h4><?php echo !empty($to_address) ? $to_address['first_name'].' '.$to_address['last_name'] : '' ?></h4>
                    </div>
                    <div class="col-md-3 w-20">
                        <h4 class="bill-title">Shipping Address</h4>
                        <h4><?php echo !empty($to_address) ? $to_address['first_name'].' '.$to_address['last_name'] : '' ?></h4>
                        <h4><?php echo !empty($to_address['state_name']) ? $to_address['state_name'] : '' ?></h4>
                        <h4><?php echo !empty($to_address['country_name']) ? $to_address['country_name'] : '' ?></h4>
                    </div>
                    <div class="clearfix"></div>
                    <div class="line"></div>
                </div>
                <div class="col-md-12">
                    <p class="place-supply"><b>Place of Supply </b> : <b><?php echo !empty($to_address['state_name']) ? $to_address['state_name'] : '' ?></b></p>
                    <div class="clearfix"></div>
                    <div class="line"></div>
                </div>
                <div class="col-md-12 p-t-20">
                    <table class="table table-bordered product_table" id="dynamic_field">
                        <thead>
                        <tr>
                            <th colspan="1" rowspan="2" class="text-center">S.No</th>
                            <th colspan="1" rowspan="2" class="text-center">Name</th>
                            <th colspan="1" rowspan="2" class="text-center w-10">HSN/SAC</th>
                            <th colspan="1" rowspan="2" class="text-center">Qty</th>
                            <th colspan="1" rowspan="2" class="text-center w-10">Rate ( <i class="fa fa-inr"></i> )</th>
                            <th colspan="1" rowspan="1" class="text-center w-10">Discount Rate(%)</th>
                            <th colspan="1" rowspan="2" class="text-right w-10">Taxable Value ( <i class="fa fa-inr"></i> ) </th>
                            <?php
                            if (($order['order_items'][0]['cgst_amount'] != '0.00')) {
                                ?>
                                <th colspan="1" rowspan="1" class="text-center w-10">CGST ( <i class="fa fa-inr"></i> )</th>
                                <th colspan="1" rowspan="1" class="text-center w-10">SGST ( <i class="fa fa-inr"></i> )</th>
                                <?php
                            }
                            ?>
                            <?php
                            if (($order['order_items'][0]['igst_amount'] != '0.00')) {
                                ?>
                                <th colspan="1" rowspan="1" class="text-center w-10">IGST ( <i class="fa fa-inr"></i> )</th>
                                <?php
                            }
                            ?>
                            <th colspan="1" rowspan="2" class="text-center w-10">Total ( <i class="fa fa-inr"></i> )</th>
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
                                    <td class="text-center"><?php echo !empty($order_item['product_name']) ? $order_item['product_name'] : '' ?></td>
                                    <td class="text-center"><?php echo !empty($order_item['hsn_code']) ? $order_item['hsn_code'] : '' ?></td>
                                    <td class="text-center"><?php echo !empty($order_item['quantity']) ? $order_item['quantity'] : '' ?></td>
                                    <td class="text-right"><?php echo !empty($order_item['unit_price']) ? $order_item['unit_price'] : '' ?></td>
                                    <td class="text-right"><?php echo !empty($order_item['discount']) ? $order_item['discount'] . ' ' . '%' : '0' . ' ' . '%' ?></td>
                                    <td class="text-right"><?php echo !empty($order_item['amnt_aft_discount']) ? $order_item['amnt_aft_discount'] : '' ?></td>
                                    <?php
                                    if (($order['order_items'][0]['cgst_amount'] != '0.00')) {
                                        ?>
                                        <td class="text-right">
                                            <?php echo !empty($order_item['cgst_amount']) ? $order_item['cgst_amount'] : '' ?>
                                            <div><?php echo !empty($order_item['gst']) ? '@'.' '.$order_item['gst'] .' '.'%' : '' ?></div>
                                        </td>
                                        <td class="text-right">
                                            <?php echo !empty($order_item['sgst_amount']) ? $order_item['sgst_amount'] : '' ?>
                                            <div><?php echo !empty($order_item['gst']) ? '@'.' '.$order_item['gst'] .' '.'%' : '' ?></div>
                                        </td>
                                        <?php
                                    }else{
                                        ?>
                                        <td class="text-right">
                                            <?php echo !empty($order_item['igst_amount']) ? $order_item['igst_amount'] : '' ?>
                                            <?php echo !empty($order_item['gst']) ? $order_item['gst'] : '' ?>
                                        </td>

                                        <?php
                                    }
                                    ?>
                                    <td class="text-right"><?php echo !empty($order_item['total_amount']) ? $order_item['total_amount'] : '' ?></td>
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
                            <td><span class="pull-right"> <span
                                            class="discount_total"><?php echo !empty($order['discount_total']) ? $order['discount_total'] : 0.00 ?></span></span>
                            </td>
                            <td colspan="1"><span><span class="total pull-right"><?php echo !empty($order['sub_amount']) ? $order['sub_amount'] : 0.00 ?></span></span>
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
                </div>
                <div class="col-md-12">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6" style="width: 40%;float:right;">
                        <table class="table ">
                            <input type="hidden" name="text_amount" class="input_text_amount"
                                   value="<?php echo !empty($order['text_amount']) ? $order['text_amount'] : 0.00 ?>"/>
                            <input type="hidden" name="sub_amount" class="input_total"
                                   value="<?php echo !empty($order['sub_abmount']) ? $order['sub_abmount'] : 0.00 ?>"/>
                            <input type="hidden" name="discount_total" class="input_discount_total"
                                   value="<?php echo !empty($order['discount_total']) ? $order['discount_total'] : 0.00 ?>"/>
                            <input type="hidden" name="" class="input_net_total"
                                   value="<?php echo !empty($order['sub_amount']) ? $order['sub_amount'] : 0.00; ?>"/>
                            <input type="hidden" name="cgst_amount" class="input_cgst_total"
                                   value="<?php echo !empty($order['cgst_amount']) ? $order['cgst_amount'] : 0.00; ?>"/>
                            <input type="hidden" name="sgst_amount" class="input_sgst_total"
                                   value="<?php echo !empty($order['sgst_amount']) ? $order['sgst_amount'] : 0.00; ?>"/>
                            <input type="hidden" name="igst_amount" class="input_igst_total"
                                   value="<?php echo !empty($order['igst_amount']) ? $order['igst_amount'] : 0.00; ?>"/>
                            <input type="hidden" name="tax_amount" class="input_tax_total"
                                   value="<?php echo !empty($order['tax_amount']) ? $order['tax_amount'] : 0.00; ?>"/>
                            <input type="hidden" name="final_total" class="input_final_total"
                                   value="<?php echo !empty($order['final_total']) ? $order['final_total'] : 0.00; ?>"/>
                            <tr>
                                <th>Taxable Amount</th>
                                <td><span><i class="fa fa-inr "></i>  <span
                                                class="total"><?php echo !empty($order['sub_amount']) ? $order['sub_amount'] : 0.00 ?></span></span>
                                </td>
                            </tr>
                            <tr>
                                <th>Total Tax</th>
                                <td><span> <i class="fa fa-inr "></i> <span
                                                class="tax_total"><?php echo !empty($order['tax_amount']) ? $order['tax_amount'] : 0.00 ?></span></span>
                                </td>
                            </tr>
                            <tr>
                                <th>Total Value</th>
                                <td><span> <i class="fa fa-inr "></i> <span
                                                class="final_total"><?php echo !empty($order['final_total']) ? $order['final_total'] : 0.00; ?></span> </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-12" style="width: 100%; float: right; text-align: right">
                    <b>Total Amount (In words)</b>: <?php echo !empty($order['text_amount']) ? $order['text_amount'] : 0.00; ?>  </div>
                </div>
            </div>
        </div>
</section>
<script src="<?php echo base_url() ?>assets/lib/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/lib/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url() ?>assets/lib/js/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/lib/js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/lib/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/lib/js/demo.js"></script>
<script src="<?php echo base_url() ?>assets/lib/js/custom-script.js"></script>
<script>
    $(document).ready(function () {
    })
</script>
</body>
</html>
