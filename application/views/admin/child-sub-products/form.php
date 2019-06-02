<link rel="stylesheet" href="<?php echo base_url(); ?>assets/lib/css/jquery-ui.min.css">
<style>
#hsn-list {
float: left;
list-style: none;
margin-top: 0;
padding: 0;
width: 92%;
z-index: 6666;
border: 1px solid #dddddd;
position: absolute;
max-height: 200px;
overflow: scroll;
}
#hsn-list li {
padding: 10px 10px 0;
background: #f0f0f0;
border-bottom: #bbb9b9 1px solid;
}
#hsn-list li:hover {
background: #ece3d2;
cursor: pointer;
}
#hsn_code {
padding: 10px;
border: #a8d4b1 1px solid;
border-radius: 4px;
}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Product Model</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Product Model</li>
        </ol>
    </section>
    <section class="content">
        <?php echo getMessage(); ?>
        <div class="box box-info">
            <div class="box-header with-border"><h3 class="box-title">Add Product Model</h3>
                <div class="box-tools">
                    <a href="<?php echo base_url(); ?>admin/child-sub-products/" class="btn btn-sm btn-danger"><i
                    class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
            <div class="box-body">
                <form class="form-horizontal" id="frm" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <input type="hidden" name="product_id"
                        value="<?php echo !empty($sub_product['product_id']) ? $sub_product['product_id'] : ''; ?>"/>
                        <input type="hidden" name="product_info_id"
                        value="<?php echo !empty($sub_product['product_info_id']) ? $sub_product['product_info_id'] : ''; ?>"/>
                        <div class="col-md-10">
                            <div class="panel panel-default">
                                <div class="panel-heading">Product Details</div>
                                <div class="panel-body">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Product Name <sup class="text-danger">*</sup></label>
                                            <div class="col-md-8">
                                                <input type="text" name="mproduct_name" id="mproduct_name" autofocus
                                                class="form-control" placeholder="Main Product" required
                                                value="<?php echo !empty($sub_product['main_product_name']) ? $sub_product['main_product_name'] : '' ?>">
                                                <input type="hidden" name="mproduct_id" id="mproduct_id"
                                                class="form-control"
                                                value="<?php echo !empty($sub_product['main_product_id']) ? $sub_product['main_product_id'] : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Manufacturer No </label>
                                            <div class="col-md-8">
                                                <input type="text" name="mfr_no" class="form-control"
                                                placeholder="Manufacturer No"
                                                value="<?php echo !empty($sub_product['mfr_no']) ? $sub_product['mfr_no'] : '' ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Sub Product<sup
                                            class="text-danger">*</sup></label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="sub_product_name"
                                                id="sproduct_id" required placeholder="Sub Product Name"
                                                value="<?php echo !empty($sub_product['sub_product_name']) ? $sub_product['sub_product_name'] : '' ?>">
                                                <input type="hidden" class="form-control" name="sproduct_id"
                                                id="sproduct_id" required placeholder="Sub Product Name"
                                                value="<?php echo !empty($sub_product['sub_prodcut_id']) ? $sub_product['sub_prodcut_id'] : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Sub Product Img</label>
                                            <div class="col-md-8">
                                                <input type="file" class="form-control" name="sub_product_img"
                                                id="sub_product_img">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Product Model <sup
                                            class="text-danger">*</sup></label>
                                            <div class="col-md-8">
                                                <input type="text" name="product_name" class="form-control" required
                                                placeholder="Product Model "
                                                value="<?php echo !empty($sub_product['child_product_name']) ? $sub_product['child_product_name'] : '' ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Product Image <sup
                                                class="text-danger">*</sup>
                                            </label>
                                            <div class="col-md-8">
                                                <input type="file"
                                                name="product_logo" <?php echo !empty($sub_product['product_logo']) ? $sub_product['product_logo'] : 'required' ?>
                                                class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Datasheet</label>
                                            <div class="col-md-8">
                                                <input type="file" name="datasheet" class="form-control"
                                                accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Has Mac ID</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="has_mac_id">
                                                    <option value="1"
                                                        <?php if (isset($sub_product['has_mac_id'])) {
	if ($sub_product['has_mac_id'] == '1') {
		echo 'selected="selected"';
	}
}?>
                                                    >Yes</option>
                                                    <option value="0"
                                                        <?php if (isset($sub_product['has_mac_id'])) {
	if ($sub_product['has_mac_id'] == '0') {
		echo 'selected="selected"';
	}
}?>
                                                    >No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">Price Details</div>
                                <div class="panel-body">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4">HSN Code <sup
                                            class="text-danger">*</sup> </label>
                                            <div class="col-md-8 frmSearch">
                                                <input type="text" name="hsn_code" class="form-control" id="hsn_code"
                                                onkeypress="return isNumber(event)"
                                                placeholder="Enter HSN Code"
                                                value="<?php echo !empty($sub_product['hsn_code']) ? $sub_product['hsn_code'] : '' ?>"
                                                required/>
                                                <div id="suggesstion-box"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    
                                        <div class="form-group">
                                            <label class="control-label col-md-4">HSN Description</label>
                                            <div class="col-md-8 frmSearch">
                                                <textarea class="form-control" name="hsn_description"><?php echo !empty($sub_product['hsn_description']) ? $sub_product['hsn_description'] : '' ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4">GST in % <sup
                                            class="text-danger">*</sup> </label>
                                            <div class="col-md-8">
                                                <input type="text" name="gst" id="gst" required class="form-control"
                                                onkeypress="return isNumber(event)"
                                                placeholder="GST in %"
                                                value="<?php echo !empty($sub_product['gst']) ? $sub_product['gst'] : '' ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4">MRP <sup
                                            class="text-danger">*</sup></label>
                                            <div class="col-md-8">
                                                <input type="text" name="mrp_price" class="form-control"
                                                placeholder="MRP" onkeypress="return isNumber(event)"
                                                value="<?php echo !empty($sub_product['mrp_price']) ? $sub_product['mrp_price'] : '' ?>"
                                                required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Discount(%) </label>
                                            <div class="col-md-8">
                                                <input type="text" name="discount" class="form-control"
                                                placeholder="Discount in %" onkeypress="return isNumber(event)"
                                                value="<?php echo !empty($sub_product['discount']) ? $sub_product['discount'] : '' ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Price Range</label>
                                            <div class="col-md-8">
                                                <table class="table table-bordered tbl_range" id="dynamic_field">
                                                    <thead>
                                                        <tr id="">
                                                            <th>S.No</th>
                                                            <th>Range</th>
                                                            <th>Dealer Price</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
if (!empty($sub_product['ranges'])) {
	$i = 1;
	foreach ($sub_product['ranges'] as $range) {
		?>
                                                        <tr>
                                                            <input type="hidden" name="pk_id[]"
                                                            value="<?php echo !empty($range['pk_id']) ? $range['pk_id'] : '' ?>">
                                                            <td><?php echo $i; ?></td>
                                                            <td><input type="text" name="value_range[]"
                                                                class="form-control" placeholder="0 - 100"
                                                                value="<?php echo !empty($range['value_range']) ? $range['value_range'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" name="dealer_price[]"
                                                                class="form-control" required
                                                                placeholder="Delaer Price"
                                                                onkeypress="return isNumber(event)"
                                                                value="<?php echo !empty($range['dealer_price']) ? $range['dealer_price'] : '' ?>"/>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-sm btn-<?php echo ($i == 1) ? 'success add' : 'danger delete_row'; ?>"
                                                                <?php echo ($i == 1) ? 'id="add"' : ''; ?> >
                                                                <?php echo ($i == 1) ? '<i class="fa fa-plus"></i>' : '<i class="fa fa-trash"></i>'; ?>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <?php
$i++;
	}
} else {
	?>
                                                        <tr>
                                                            <td>1</td>
                                                            <td><input type="text" name="value_range[]"
                                                                class="form-control"
                                                                placeholder="Quantity Value"
                                                                value="<?php echo !empty($range['value_range']) ? $range['value_range'] : '' ?>">
                                                            </td>
                                                            <td><input type="text" name="dealer_price[]"
                                                                class="form-control"
                                                                required placeholder="Delaer Price"
                                                                onkeypress="return isNumber(event)"
                                                                value="<?php echo !empty($range['dealer_price']) ? $range['dealer_price'] : '' ?>"/>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-sm btn-success add"
                                                                id="add"><i
                                                                class="fa fa-plus"></i></button>
                                                            </td>
                                                        </tr>
                                                        <?php
}
?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">Stock Information</div>
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-4">Usage Unit</label>
                                                <div class="col-md-7">
                                                    <select class="form-control" name="usage_unit">
                                                        <option value="">--Select an Option--</option>
                                                        <option value="Box">Box</option>
                                                        <option value="Carton">Carton</option>
                                                        <option value="Dazon">Dazon</option>
                                                        <option value="Each">Each</option>
                                                        <option value="Hours">Hours</option>
                                                        <option value="Hours">Hours</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Qty/Unit</label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" name="unit" placeholder="Qty/Unit">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Qty in Stock</label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" name="qty_in_stock" placeholder="Qty in Stock">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Reorder Level </label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" name="reorder_level" placeholder="Reorder Level ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Handler  </label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" name="handler" placeholder="Handler  ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Qty. in Demand </label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" name="qty_in_demand" placeholder="Qty. in Demand ">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 text-center">
                            <h4>Sub Product Image</h4>
                            <?php
$img = (!empty($sub_product['sub_product_img']) && file_exists(FCPATH . "data/sub-products/" . $sub_product['sub_product_img'])) ? "data/sub-products/" . $sub_product['sub_product_img'] : '';
?>
                            <img src="<?php echo !empty($img) ? base_url() . $img : dummyLogo() ?>" alt="Profile Pic"
                            class="product-pic">
                            <h4>Product Model</h4>
                            <?php
$img = (!empty($sub_product['product_logo']) && file_exists(FCPATH . "data/child-sub-products/" . $sub_product['product_logo'])) ? "data/child-sub-products/" . $sub_product['product_logo'] : '';
?>
                            <img src="<?php echo !empty($img) ? base_url() . $img : dummyLogo() ?>" alt="Profile Pic"
                            class="product-pic">
                        </div>
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">Product Description</div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-2"> Description </label>
                                        <div class="col-md-8">
                                            <textarea class="form-control ckeditor " id="tdesc1" name="description_1"
                                            rows="5"><?php echo !empty($sub_product['description_1']) ? $sub_product['description_1'] : '' ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2"></label>
                                        <div class="col-md-8">
                                            <?php
if (!empty($sub_product)) {
	?>
                                            <button form="frm" type="submit" class="btn btn-success">Update</button>
                                            <?php
} else {
	?>
                                            <button form="frm" type="submit" class="btn btn-success">Submit</button>
                                            <?php
}
?>
                                            <a href="<?php echo base_url() ?>admin/child-sub-products/"
                                            class="btn btn-danger">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New HSN Code</h4>
            </div>
            <div class="modal-body">
                <form method="post" class="form-horizontal" id="frm1">
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            HSN Code
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="hsn_code" id="hsn_code_modal" class="form-control"
                            placeholder="Enter HSN Code" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            Description
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="description" class="form-control" placeholder="Enter Description"
                            required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            GST
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="gst" class="form-control gst" placeholder="Enter GST %" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success submit" form="frm1">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>assets/lib/js/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="<?php echo base_url() ?>assets/lib/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>assets/lib/js/jquery-ui.custom.min.js"></script>
<script>
jQuery(document).ready(function ($) {
var main_products = [<?php if (!empty($main_products)) {
	$count = count($main_products);
	$i = 1;
	foreach ($main_products as $k => $v) {
		?>
{
key: "<?php echo $k ?>",
value: "<?php echo $v ?>"
}
<?php
echo ($i == $count) ? '' : ',';
		$i++;
	}
} ?>];
// Auto Completion Script
$("#mproduct_name").autocomplete({
minLength: 0,
source: main_products,
focus: function (event, ui) {
$("#mproduct_name").val(ui.item.value);
return false;
},
select: function (event, ui) {
$("#mproduct_name").val(ui.item.value);
return false;
}
}).autocomplete("instance")._renderItem = function (ul, item) {
return $("<li>")
    .append("<div>" + item.value + "</div>")
    .appendTo(ul);
    };
    $("#mproduct_name").on("focusout", function () {
    var th = $(this);
    var val = $("#mproduct_name").val();
    $.ajax({
    method: 'post',
    url: '<?php echo base_url() ?>admin/getProdcutIdByName/',
    data: {'product_name': val},
    type: 'POST',
    dataType: 'json',
    cache: false,
    success: function (data) {
    $("#mproduct_id").val(data.product_id);
    }
    });
    });
    $("#mproduct_name").on("change", function () {
    $("#sproduct_id").val("");
    $("#sub_product_img").attr('disabled', false);
    });
    $("#sproduct_id").on("focus", function () {
    var th = $(this);
    var id = $("#mproduct_id").val();
    var $data = [];
    $.ajax({
    url: '<?php echo base_url() ?>/admin/getSubProductsList/',
    data: {'product_id': id},
    type: 'POST',
    dataType: 'json',
    cache: false,
    success: function (data) {
    if (data) {
    $.each(data, function (key, val) {
    console.log();
    $data.push({value: val});
    });
    log($data);
    } else {
    $("#sub_product_img").attr('disabled', false);
    }
    },
    error: function () {
    // $("#product_id").val('');
    }
    });
    $("#sproduct_id").autocomplete({
    minLength: 0,
    source: $data,
    focus: function (event, ui) {
    $("#sproduct_id").val(ui.item.value);
    return false;
    },
    select: function (event, ui) {
    $("#sproduct_id").val(ui.item.value);
    return false;
    }
    }).autocomplete("instance")._renderItem = function (ul, item) {
    return $("<li>")
        .append("<div>" + item.value + "</div>")
        .appendTo(ul);
        };
        });
        function log($data) {
        return $data;
        }
        });
        </script>
        <script>
        $(document).ready(function () {
        $('#main_product_id').on("change", function () {
        var main_product_id = $(this).val();
        if ((main_product_id == "") || (main_product_id == null)) {
        $('#sproduct_id').empty();
        }
        else {
        $('#sproduct_id').empty();
        $.ajax({
        type: 'POST',
        url: "<?php echo base_url() ?>" + "admin/fetch_sub_products/?main_product_id=" + main_product_id,
        dataType: 'json',
        cache: false,
        success: function (data) {
        $('#sproduct_id').append($("<option></option>").attr("value", "").text("-- Select Sub Product --"));
        $.each(data, function (key, value) {
        $('#sproduct_id').append($("<option></option>").attr("value", key).text(value));
        });
        }
        });
        }
        });
        $("#desc1").on("click", function () {
        check = $("#desc1").prop("checked");
        if (check) {
        $('#pdesc1').hide();
        } else {
        $('#pdesc1').show();
        }
        });
        $("#desc2").on("click", function () {
        check = $("#desc2").prop("checked");
        if (check) {
        $('#pdesc2').hide();
        } else {
        $('#pdesc2').show();
        }
        });
        $("#desc3").on("click", function () {
        check = $("#desc3").prop("checked");
        if (check) {
        $('#pdesc3').hide();
        } else {
        $('#pdesc3').show();
        }
        });
        $('#select2--results').append('<li>Test</li>');
        $('#input_file').hide();
        $('#input_youtube').hide();
        $('#file').click(function () {
        $('#input_file').show();
        $('#input_youtube').hide();
        });
        $('#youtube').click(function () {
        $('#input_youtube').show();
        $('#input_file').hide();
        });
        $('#frm1').on('submit', function () {
        var form = $(this).find('#frm');
        var data = form.serialize();
        $.ajax({
        type: 'POST',
        url: "<?php echo base_url() ?>" + "admin/add_hsn_code",
        data: data,
        dataType: 'json',
        success: function (data) {
        }
        });
        });
        });
        </script>
        <script>
        $("#frm").validate({
        rules: {
        product_name: {
        required: true,
        <?php if (!empty($sub_product['product_name'])) {?>
        remote: '<?php echo base_url() ?>' + 'admin/check-product-exists'
        <?php }?>
        },
        mrp_price: {
        required: true,
        currency: ['$', false]
        }
        },
        messages: {
        product_name: "This Product is Already exists",
        mrp_price: "Please enter numbers only"
        }
        });
        </script>
        <script>
        $(document).ready(function () {
        var i = $('.tbl_range tbody tr').length;
        $('#add').click(function () {
        i++;
        var row = '<tr id="row' + i + '">' +
            '<td>' + i + '</td>' +
            '<td><input type="text" name="value_range[]" class="form-control" placeholder="Quantity Value"></td>' +
            '<td><input type="text" name="dealer_price[]" onkeypress="return isNumber(event)" class="form-control" required placeholder="Delaer Price" /></td>' +
            '<td><span id="' + i + '" class="btn btn-sm btn-danger delete_row"><i class="fa fa-trash"></i></span></td>' +
        '</td>' +
    '</tr>';
    $("table#dynamic_field tbody").append(row);
    });
    $("body").on("click", ".delete_row", function (e) {
    e.preventDefault();
    var button_id = $(this).attr("id");
    $(this).closest("#row" + button_id + "").remove();
    //$(this).closest('tr').remove();
    });
    });
    </script>
    <script>
    $(document).ready(function () {
    $("#hsn_code").keyup(function () {
    var hsn_code = $(this).val();
    $.ajax({
    type: "GET",
    url: "<?php echo base_url() ?>" + "admin/getHsnCodeList",
    data: {hsn_code: hsn_code},
    beforeSend: function () {
    $("#hsn_code").css("background", "#FFF url(../../data/LoaderIcon.gif) no-repeat 165px");
    },
    success: function (data) {
    $("#suggesstion-box").show();
    $("#suggesstion-box").html(data);
    $("#hsn_code").css("background", "#FFF");
    }
    });
    });
    $('body').on('click', '.modal-toggle', function (e) {
    $("#suggesstion-box").hide();
    e.preventDefault();
    var hsn_code = $('#hsn_code').val();
    console.log(hsn_code);
    $('#hsn_code_modal').val(hsn_code);
    $('#myModal').modal('show');
    });
    $('.submit').on('click', function () {
    $.ajax({
    type: 'POST',
    url: "<?php echo base_url(); ?>" + "admin/add_hsn_code",
    data: $('#frm1').serialize(),
    dataType: 'json',
    cache: false,
    success: function (data) {
    $('.gst').val(data.gst);
    $('#hsn_code').val(data.hsn_code);
    $('#myModal').modal('hide');
    }
    });
    });
    });
    function selectHSN(val) {
    $("#hsn_code").val(val);
    $(".hsn").val(val);
    $(".hsn_text ").text(val);
    //  console.log(value);
    $.ajax({
    type: "GET",
    url: "<?php echo base_url() ?>" + "admin/getGSTByHsnCode/?hsn_code=" + val,
    dataType: 'json',
    cache: false,
    success: function (data) {
    $('#gst').val(data.gst);
    }
    });
    $("#suggesstion-box").hide();
    }
    </script>