<?php
ob_start();
$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle('My Title');
$pdf->SetHeaderMargin(30);
$pdf->SetTopMargin(20);
$pdf->setFooterMargin(20);
$pdf->SetAutoPageBreak(true);
$pdf->SetAuthor('Author');
$pdf->SetDisplayMode('real', 'default');

$pdf->AddPage();

$content='';
 $content .='<!DOCTYPE html>';
    $content.='<html>';
    $content.='<head>';
        $content.='<meta charset="utf-8">';
        $content.='<meta http-equiv="X-UA-Compatible" content="IE=edge">';
      //  $content.='<title>'. !empty($title) ? $title : "" .'</title>';
        $content.='<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">';
        $content.='<link rel="stylesheet" href="'. base_url() .'assets/lib/css/print-styles.css">';
        $content.='<link rel="stylesheet" href="'. base_url() .'assets/lib/css/bootstrap.min.css">';
        $content.='<link rel="stylesheet" href="'. base_url() .'assets/lib/css/dataTables.bootstrap.min.css">';
        $content.='<link rel="stylesheet" href="'. base_url() .'assets/lib/css/font-awesome.min.css">';
        $content.='<link rel="stylesheet" href="'. base_url() .'assets/lib/css/ionicons.min.css">';
        $content.='<link rel="stylesheet" href="'. base_url() .'assets/lib/css/AdminLTE.min.css">';
        $content.='<link rel="stylesheet" href="'. base_url() .'assets/lib/css/skins/_all-skins.min.css">';
        $content.='<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>';
        $content.='<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>';
        $content.='<link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">';
    if (!empty($_GET["type"])) {
      $msg = "";
      $msg1 = "";
        if ($_GET["type"] == "customer") {
            $content.='$msg = "ORIGINAL"';
            $content.='$msg1 = "Recipient"';
        } else if ($_GET["type"] == "transporter") {
            $content.='$msg = "DUPLICATE"';
            $content.='$msg1 = "Transporter"';
        } else if ($_GET["type"] == "supplier") {
            $content.='$msg = "TRIPLICATE"';
            $content.='$msg1 = "Supplier"';
        }
    }

    $content.='<body >';
    $content.='<section class="content">';
        $content.='<div class="box box-info">';
            $content.='<div class="box-header with-border hidden-print">';
                $content.='<div class="form-group text-center">';
                    $content.='<label>Print for &nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;</label>';
                    $content.='<label class="radio-inline"><input type="radio" class="radio" name="print_type" value="customer" checked>Customer</label>';
                    $content.='<label class="radio-inline"><input type="radio" class="radio" name="print_type" value="transporter">Transporter</label>';
                    $content.='<label class="radio-inline"><input type="radio" class="radio" name="print_type" value="supplier">Supplier</label>';
                $content.='</div>';
                $content.='<div class="box-tools">';
                    $content.='<a href="'. base_url() .'admin/orders/print/1?type=customer" class="btn btn-success ptype" target="_blank"><i class="fa fa-print"></i> Print</a>';
                $content.='</div>';
            $content.='</div>';
            $content.='<div class="box-body">';
                $content.='<div class="row">';
                    $content.='<div class="col-md-12">';
                        $content.='<h3 class="text-center po-title">PURCHASE ORDER</h3>';
                        $content.='<div class="block pull-right text-center">';
                            //$content.='<p class="print-for">'. !empty($msg) ? $msg : "ORIGINAL" .'</p>';
                            $content.='<div class="line"></div>';
                          //  $content.='<p class="m-0">For <span class="print-to">'. !empty($msg1) ? $msg1 : "Recipient".'</span></p>';
                        $content.='</div>';
                    $content.='</div>';
                   $content.='<div class="col-md-12  p-t-b-20">';
                        $content.='<div class="col-md-3 owner-info-1">';
                            $content.='. !empty($from_address) ? $from_address["address"] : "" .';
                        $content.='</div>';
                        $content.='<div class="col-md-6"></div>';
                        $content.='<div class="col-md-3  owner-info-2">';
                            $content.='<ul class="list-unstyled">';
                                $content.='<li><span class="pull-left"><b>Order Date</b></span><span class="pull-right">'. $order["order_date"] .'</span></li><br/>';
                                $content.='<li><span class="pull-left"><b>Order no</b></span><span class="pull-right">'. $order["order_no"] .'</span></li><br/>';
                                $content.='<li><span class="pull-left"><b>Approved By</b></span><span class="pull-right">'. $order["approved_by_name"] .'</span></li>';
                            $content.='</ul>';
                        $content.='</div>';
                    $content.='</div>';
                    $content.='<div class="clearfix"></div>';
                    $content.='<div class="col-md-12 w-100">';
                       $content.=' <div class="line"></div>';
                        $content.='<div class="col-md-3 p-0 w-40">';
                            $content.='<h4 class="bill-title">Customer Name</h4>';
                           $content.=' <h4> '. $to_address["last_name"] .'</h4>';
                        $content.='</div>';
                        $content.='<div class="col-md-offset-2 col-md-3 w-20">';
                            $content.='<h4 class="bill-title">Billing Address</h4>';
                           $content.=' <h4> ' .$to_address["last_name"].'</h4>';
                       $content.=' </div>';
                        $content.='<div class="col-md-3 w-20">';
                           $content.=' <h4 class="bill-title">Shipping Address</h4>';
                           $content.=' <h4> '. $to_address["first_name"]." '. . '" .$to_address["last_name"] .'</h4>';
                           $content.=' <h4> '. $to_address["state_name"] .'</h4>';
                           $content.=' <h4> '. $to_address["country_name"].'</h4>';
                        $content.='</div>';
                        $content.='<div class="clearfix"></div>';
                       $content.=' <div class="line"></div>';
                   $content.=' </div>';
                   $content.=' <div class="col-md-12">';
                       $content.=' <p class="place-supply"><b>Place of Supply </b> : <b>'. $to_address["state_name"] .'</b></p>';
                       $content.=' <div class="clearfix"></div>';
                       $content.=' <div class="line"></div>';
                   $content.=' </div>';
                    $content.='<div class="col-md-12 p-t-20">';
                        $content.='<table class="table table-bordered product_table" id="dynamic_field">';
                           $content.=' <thead>';
                           $content.=' <tr>';
                                $content.='<th colspan="1" rowspan="2" class="text-center">S.No</th>';
                                $content.='<th colspan="1" rowspan="2" class="text-center">Name</th>';
                                $content.='<th colspan="1" rowspan="2" class="text-center w-10">HSN/SAC</th>';
                                $content.='<th colspan="1" rowspan="2" class="text-center">Qty</th>';
                                $content.='<th colspan="1" rowspan="2" class="text-center w-10">Rate ( <i class="fa fa-inr"></i> )</th>';
                                $content.='<th colspan="1" rowspan="1" class="text-center w-10">Discount Rate(%)</th>';
                                $content.='<th colspan="1" rowspan="2" class="text-right w-10">Taxable Value ( <i class="fa fa-inr"></i> ) </th>';
                                if (($order["order_items"][0]["cgst_amount"] != "0.00")) {
                                    $content.='<th colspan="1" rowspan="1" class="text-center w-10">CGST ( <i class="fa fa-inr"></i> )</th>';
                                    $content.='<th colspan="1" rowspan="1" class="text-center w-10">SGST ( <i class="fa fa-inr"></i> )</th>';
                                }
                                if (($order["order_items"][0]["igst_amount"] != "0.00")) {
                                    $content.='<th colspan="1" rowspan="1" class="text-center w-10">IGST ( <i class="fa fa-inr"></i> )</th>';

                                }
                                $content.='<th colspan="1" rowspan="2" class="text-center w-10">Total ( <i class="fa fa-inr"></i> )</th>';
                            $content.='</tr>';
                            $content.='</thead>';
                            $content.='<tbody>';
                            if (!empty($order["order_items"])) {
                                $i = 1;
                                foreach ($order["order_items"] as $order_item) {
                                    $content .= '<tr>';
                                    $content .= '<td class="text-center">' . $i . '</td>';
                                    $content .= '<td class="text-center">' . $order_item["child_product"] . '</td>';
                                    $content .= '<td class="text-center">' . $order_item["hsn_code"] . '</td>';
                                    $content .= '<td class="text-center">' . $order_item["quantity"] . '</td>';
                                    $content .= '<td class="text-right">' . $order_item["unit_price"] . '</td>';
                                    $content .= '<td class="text-right">' . $order_item["discount"] . '</td>';
                                    $content .= '<td class="text-right">' . $order_item["amnt_aft_discount"] . '</td>';
                                    if (($order["order_items"][0]["cgst_amount"] != "0.00")) {
                                        $content .= '<td class="text-right">' . $order_item["cgst_amount"] . '</td>';
                                        $content .= '<td class="text-right">' . $order_item["sgst_amount"] . '</td>';
                                    } else {
                                        $content .= '<td class="text-right">' . $order_item["igst_amount"] . '</td>';
                                        $content .= '<td class="text-right">' . $order_item["total_amount"] . '</td>';
                                        $content .= '</tr>';
                                        $i++;
                                    }
                                }
                                $content .= '</tbody>';
                                $content .= '<tfoot>';
                                $content .= '<tr>';
                                $content .= '<td class="text-right" colspan="5">Total Inv. Val</td>';
                                $content .= '<td><span class="pull-right"> <span class="discount_total">' . $order["discount_total"] . '</span></span></td>';
                                $content .= '<td colspan="1"><span><span class="total pull-right">' . $order["sub_amount"] . '</span></span></td>';
                                if (($order["cgst_amount"] != "0.00")) {
                                    $content .= '<td colspan="1"><span class="pull-right"> <span class="cgst_total">' . $order["cgst_amount"] . '</span> </span></td>';
                                    $content .= '<td colspan="1"><span class="pull-right"> <span class="sgst_total">' . $order["sgst_amount"] . '</span> </span></td>';
                                } else {
                                    $content .= '  <td colspan="1"><span class="pull-right"> <span class="igst_total">' . $order["igst_amount"] . '</span> </span></td>';
                                }
                                $content .= ' <td colspan="1"><span class="pull-right"> <span class="final_total">' . $order["final_total"] . '</span> </span></td>';
                                $content .= '</tr>';
                                $content .= '<tr class="text-center">';
                                $content .= '  <td colspan="12">PLEASE NOTIFY US IMMEDIATELY IF THIS ORDER CANNOT BE SHIPPED COMPLETE ON OR BEFORE: ' . dateDB2SHOW($order["expected_date"]) . '</td>';
                                $content .= '</tr>';
                                $content .= '</tfoot>';
                                $content .= ' </table>';
                                $content .= '</div>';
                                $content .= '<div class="col-md-12">';
                                $content .= '<div class="col-md-9">';
                                $content .= '</div>';
                                $content .= '<div class="col-md-3 w-30">';
                                $content .= '<table class="table ">';
                                $content .= '<tr>';
                                $content .= '<th>Taxable Amount</th>';
                                $content .= '<td><span><i class="fa fa-inr "></i>  <span class="total">' . $order["sub_amount"] . '</span></span></td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<th>Total Tax</th>';
                                $content .= '<td><span> <i class="fa fa-inr "></i> <span class="tax_total">' . $order["tax_amount"] . '</span></span>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<th>Total Value</th>';
                                $content .= '<td><span> <i class="fa fa-inr "></i> <span class="final_total">' . $order["final_total"] . '</span> </span>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= ' </table>';
                                $content .= '</div>';
                                $content .= '</div>';
                                $content .= '<div class="col-md-12 ">';
                                $content .= '<div class="col-md-6">';
                                $content .= '</div>';
                                $content .= '<div class="col-md-6 w-50"><b>Total Amount (In words)</b>: ' . $order["text_amount"] . '  </div>';
                                $content .= '</div>';
                                $content .= '</div>';
                                $content .= '</div>';
                                $content .= '</section>';
                                $content .= '<script src="'. base_url() .'assets/lib/js/jquery.min.js"></script>';
                                $content .= '<script src="'. base_url() .'assets/lib/js/bootstrap.min.js"></script>';
                                $content .= '<script src="'. base_url() .'assets/lib/js/jquery.slimscroll.min.js"></script>';
                                $content .= '<script src="'. base_url() .'assets/lib/js/fastclick.js"></script>';
                                $content .= '<script src="'. base_url() .'assets/lib/js/adminlte.min.js"></script>';
                                $content .= '<script src="'. base_url() .'assets/lib/js/demo.js"></script>';
                                $content .= '<script src="'. base_url() .'assets/lib/js/custom-script.js"></script>';
                                $content .= '</body>';
                                $content .= '</html>';
                            }

$pdf->write(5,$content);

$pdf->Output('My-File-Name.pdf', 'I');


?>





