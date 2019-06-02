<?php
function fetch_data()
{
    $content = '';
    if (!empty($order)) {


    }
    return $content;
}

?>
<?php

$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$obj_pdf->SetTitle("Purchase Order");
$obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
$obj_pdf->setPrintHeader(false);
$obj_pdf->setPrintFooter(false);
$obj_pdf->SetAutoPageBreak(TRUE, 5);
$obj_pdf->SetFont('helvetica', '', 10);
$obj_pdf->AddPage();
$content = '';
$content = '
<style>
 .w-100{
 width: 100% !important;
 display: flex;
 }  
 .w-40{
 width: 40% !important;
 }
 .w-20{
 width: 20% !important;
 }
 .w-30{
 width: 40% !important;
 float: right !important;
 }
 .p-t-b-20{
 padding-top: 20px !important;
 padding-bottom: 20px !important;
 }
</style>

';
$content .= '<div class="col-md-12">';
$content .= '<h3 class="text-center po-title" style="color: #d43021;font-weight: 600; text-align: center">PURCHASE ORDER</h3>';
/*$content.='<div class="block pull-right text-center"><p class="print-for">ORIGINAL </p>';
$content.='<div class="line"></div>';
$content.='<p class="m-0">For <span class="print-to">Recipient</span></p>';
$content.='</div>';*/

$content .= '</div>';
$content.='<div class="col-md-12  p-t-b-20">';
$content.='<div class="col-md-3 owner-info-1">'. $from_address["address"] .'</div>';
$content.='<div class="col-md-6"></div>';
$content.='<div class="col-md-3  owner-info-2">';
    $content.='<ul class="list-unstyled" style="list-style-type: none">';
        $content.='<li><span class=""><b>Order Date : </b></span><span style="text-align: right !important;">'. $order['order_date'] .'</span></li><br/>';
        $content.='<li><span class=""><b>Order no : </b></span><span style="text-align: right !important;">'. $order['order_no'] .'</span></li><br/>';
        $content.='<li><span class=""><b>Approved By : </b></span><span style="text-align: right !important;">'. $order['approved_by_name'] .'</span></li>';
    $content.='</ul>';
$content.='</div>';
$content.='</div>';
$content .= '<div class="w-100">';
$content .= '<div class="line" style="width: 100%;border-bottom: 1px solid #d43021;position: relative;"></div>';
$content .= '<div class="w-40">';
$content .= '<h4 style="font-size: 15px; font-weight: 700;">Customer Name</h4>';
$content .= '<h4 style="font-size: 14px;font-weight: 100; font-family: sans-serif;">' . $to_address["first_name"] . " " . $to_address["last_name"] . '</h4>';
$content .= '</div>';
$content .= '<div class="w-20">';
$content .= '<h4 class="bill-title" style="font-size: 15px; font-weight: 700;">Billing Address</h4>';
$content .= '<h4>' . $to_address["first_name"] . " " . $to_address["last_name"] . '</h4>';
$content .= '</div>';
$content .= '<div  class="w-20">';
$content .= '<h4 class="bill-title" style="font-size: 15px; font-weight: 700;">Shipping Address</h4>';
$content .= '<h4> ' . $to_address["first_name"] . " " . $to_address["last_name"] . '</h4>';
$content .= '<h4> ' . $to_address["state_name"] . '</h4>';
$content .= '<h4> ' . $to_address["country_name"] . '</h4>';
$content .= '</div>';
$content .= '<div class="clearfix"></div>';
$content .= '<div class="line" style="width: 100%;border-bottom: 1px solid #d43021;position: relative;"></div>';
$content .= '</div>';
$content .= '<div class="col-md-12">';
$content .= '<p class="place-supply"><b>Place of Supply </b> : <b>' . $to_address['state_name'] . '</b></p>';
$content .= '<div class="clearfix"></div>';
$content .= '<div class="line" style="width: 100%;border-bottom: 1px solid #d43021;position: relative;"></div>';
$content .= '</div>';
$content .= '<table class="table table-bordered product_table"  width="100%" border="1" cellpadding="5" style="background-color: yellow;">';
$content .= '<thead>';
$content .= '<tr>';
$content .= '<th colspan="1" rowspan="2">S.No</th>';
$content .= '<th colspan="1" rowspan="2">Name</th>';
$content .= '<th colspan="1" rowspan="2">HSN/SAC</th>';
$content .= '<th colspan="1" rowspan="2">Qty</th>';
$content .= '<th colspan="1" rowspan="2">Rate</th>';
$content .= '<th colspan="1" rowspan="1">Discount Rate</th>';
$content .= '<th colspan="1" rowspan="2">Taxable Value </th>';
if (($order['order_items'][0]['cgst_amount'] != '0.00')) {
    $content .= '<th colspan="1" rowspan="1" class="text-center w-10">CGST </th>';
    $content .= '<th colspan="1" rowspan="1" class="text-center w-10">SGST </th>';
}
if (($order['order_items'][0]['igst_amount'] != '0.00')) {
    $content .= ' <th colspan="1" rowspan="1" class="text-center w-10">IGST </th>';
}
$content .= '<th colspan="1" rowspan="2" class="text-center w-10">Total </th>';
$content .= '</tr>';
$content .= '</thead>';
$content .= '<tbody>';
if (!empty($order['order_items'])) {
    $i = 1;
    foreach ($order['order_items'] as $order_item) {
        $content .= '<tr>';
        $content .= '<td>' . $i . '</td>';
        $content .= '<td>' . $order_item["child_product"] . '</td>';
        $content .= '<td>' . $order_item["hsn_code"] . '</td>';
        $content .= '<td>' . $order_item["quantity"] . '</td>';
        $content .= '<td>' . $order_item["unit_price"] . '</td>';
        $content .= '<td>' . $order_item["discount"] . '</td>';
        $content .= '<td>' . $order_item["amnt_aft_discount"] . '</td>';
        if (($order['order_items'][0]['cgst_amount'] != '0.00')) {
            $content .= '<td>';
            $content .= !empty($order_item["cgst_amount"]) ? $order_item["cgst_amount"] : "";
            $content .= '<div>' . !empty($order_item["gst"]) ? "@" . " " . $order_item["gst"] . " " . "%" : " " . '</div>';
            $content .= '</td>';
            $content .= '<td class="text-right">';
            $content .= !empty($order_item["sgst_amount"]) ? $order_item["sgst_amount"] : "";
            $content .= '<div>' . !empty($order_item["gst"]) ? "@" . " " . $order_item["gst"] . " " . "%" : " " . '</div>';
            $content .= '</td>';
        } else {
            $content .= '<td class="text-right">';
            $content .= !empty($order_item["igst_amount"]) ? $order_item["igst_amount"] : "";
            $content .= !empty($order_item["gst"]) ? $order_item["gst"] : "";
            $content .= '</td>';
        }
        $content .= '<td class="text-right">' . $order_item["total_amount"] . '</td>';
        $content .= '</tr>';
        $i++;
    }
}
$content .= '</tbody>';
$content .= '<tfoot>';
$content .= '<tr>';
$content .= '<td colspan="5">Total Inv. Val</td>';
$content .= '<td>' . $order["discount_total"] . '</td>';
$content .= '<td colspan="1">' . $order["sub_amount"] . '</td>';
if (($order['cgst_amount'] != '0.00')) {
    $content .= '<td colspan="1">' . $order["cgst_amount"] . ' </td > ';
    $content .= '<td colspan = "1" > ' . $order["sgst_amount"] . ' </td>';
} else {
    $content .= '<td colspan="1">' . $order["igst_amount"] . '</td>';

}
$content .= '<td colspan="1">' . $order["final_total"] . '</td>';
$content .= '</tr>';
$content .= '<tr>';
$content .= '<td colspan="12" style="text-align: center">PLEASE NOTIFY US IMMEDIATELY IF THIS ORDER CANNOT BE SHIPPED COMPLETE ON OR BEFORE: ' . dateDB2SHOW($order["expected_date"]) . '</td>';
$content .= '</tr>';
$content .= '</tfoot>';
$content .= '</table>';
$content .= '<div class="col-md-12">';
$content .= '<div class="col-md-9"></div >';
$content .= '<div class="col-md-3 w-30" >';
$content .= '<table class="table" border="1" cellpadding="5">';
$content .= '<tr>';
$content .= '<th> Taxable Amount </th >';
$content .= '<td>' . $order['sub_amount'] . '</td>';
$content .= '</tr>';
$content .= '<tr>';
$content .= '<th>Total Tax</th>';
$content .= '<td>' . $order['tax_amount'] . '</td>';
$content .= '</tr>';
$content .= '<tr>';
$content .= '<th> Total Value </th >';
$content .= '<td>' . $order['final_total'] . '</td>';
$content .= '</tr>';
$content .= '</table>';
$content .= '</div>';
$content .= '</div>';
$content.='<div class="col-md-12 ">';
$content.='<div class="col-md-6"></div>';
$content.='<div class="col-md-6 w-50"><b>Total Amount (In words)</b>: '.  $order['text_amount'] .'  </div>';
$content.='</div>';
$obj_pdf->writeHTML($content);
$obj_pdf->Output('sample.pdf', 'I');
?>

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
<body>
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
                <a href="<?php echo base_url() ?>admin/orders/print/1?type=customer" class="btn btn-success ptype"
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
                <?php
                echo fetch_data();
                ?>
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
