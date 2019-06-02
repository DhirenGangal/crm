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
        <h1>Child Sub Product</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Child Sub Product</li>
        </ol>
    </section>
    <section class="content">
        <?php echo getMessage(); ?>
        <div class="box box-info">
            <div class="box-header with-border"><h3 class="box-title">Add Child Sub Product</h3>
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-4">Product Name <sup
                                        class="text-danger">*</sup></label>
                                <div class="col-md-8">
                                    <select class="form-control" name="main_product_id" id="main_product_id" required>
                                        <option value="">Select Product</option>
                                        <?php
                                        if (!empty($main_products)) {
                                            foreach ($main_products as $key => $value) {
                                                ?>
                                                <option value="<?php echo $key; ?>" <?php echo !empty($sub_product) && ($sub_product['main_product_id'] == $key) ? "selected='selected'" : ''; ?>><?php echo $value; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4">Sub Product Name <sup class="text-danger">*</sup></label>
                                <div class="col-md-8">
                                    <select class="form-control" name="sub_product_id" id="sproduct_id" required>
                                        <option value="">Select Sub Product</option>
                                        <?php
                                        if (!empty($sub_products)) {
                                            foreach ($sub_products as $key => $value) {
                                                ?>
                                                <option value="<?php echo $key; ?>" <?php echo !empty($sub_product['sub_prodcut_id']) && ($sub_product['sub_prodcut_id'] == $key) ? "selected='selected'" : ''; ?>><?php echo $value; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Child Product Name <sup
                                        class="text-danger">*</sup></label>
                                <div class="col-md-8">
                                    <input type="text" name="product_name" class="form-control" required
                                           placeholder="Child Sub Product Name"
                                           value="<?php echo !empty($sub_product['child_product_name']) ? $sub_product['child_product_name'] : '' ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Manufacturer No </label>
                                <div class="col-md-8">
                                    <input type="text" name="mfr_no" class="form-control"
                                           placeholder="Manufacturer No"
                                           value="<?php echo !empty($sub_product['mfr_no']) ? $sub_product['mfr_no'] : '' ?>"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4">Sub Product Image <sup class="text-danger">*</sup>
                                </label>
                                <div class="col-md-8">
                                    <input type="file"
                                           name="product_logo" <?php echo !empty($sub_product['product_logo']) ? $sub_product['product_logo'] : 'required' ?>
                                           class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Datasheet
                                </label>
                                <div class="col-md-8">
                                    <input type="file" name="datasheet" class="form-control" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">HSN Code <sup class="text-danger">*</sup> </label>
                                <div class="col-md-8 frmSearch">
                                    <input type="text" name="hsn_code" class="form-control" id="hsn_code" onkeypress="return isNumber(event)"
                                           placeholder="Enter HSN Code"
                                           value="<?php echo !empty($sub_product['hsn_code']) ? $sub_product['hsn_code'] : '' ?>"
                                           required/>
                                    <div id="suggesstion-box"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">GST in % <sup class="text-danger">*</sup> </label>
                                <div class="col-md-8">
                                    <input type="text" name="gst" id="gst" required class="form-control" onkeypress="return isNumber(event)"
                                           placeholder="GST in %"
                                           value="<?php echo !empty($sub_product['gst']) ? $sub_product['gst'] : '' ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">MRP <sup class="text-danger">*</sup></label>
                                <div class="col-md-8">
                                    <input type="text" name="mrp_price" class="form-control" placeholder="MRP" onkeypress="return isNumber(event)"
                                           value="<?php echo !empty($sub_product['mrp_price']) ? $sub_product['mrp_price'] : '' ?>"
                                           required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Discount(%) </label>
                                <div class="col-md-8">
                                    <input type="text" name="discount" class="form-control" placeholder="Discount in %"
                                           onkeypress="return isNumber(event)"
                                           value="<?php echo !empty($sub_product['discount']) ? $sub_product['discount'] : '' ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-center">
                            <h4>Product Image</h4>
                            <?php
                            $img = (!empty($sub_product['product_logo']) && file_exists(FCPATH . "data/child-sub-products/" . $sub_product['product_logo'])) ? "data/child-sub-products/" . $sub_product['product_logo'] : '';
                            ?>
                            <img src="<?php echo !empty($img) ? base_url() . $img : dummyLogo() ?>" alt="Profile Pic"
                                 class="product-pic">
                            <h4>Data Sheet</h4>
                            <?php
                            $img = (!empty($sub_product['datasheet']) && file_exists(FCPATH . "data/datasheets/" . $sub_product['datasheet'])) ? "data/datasheets/" . $sub_product['datasheet'] : '';
                            ?>
                            <img src="<?php echo !empty($img) ? base_url() . $img : dummyLogo() ?>" alt="Profile Pic"
                                 class="product-pic">
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-2">Price Range</label>
                                <div class="col-md-6">
                                    <table class="table table-bordered tbl_range" id="dynamic_field">
                                        <thead>
                                        <tr id="">
                                            <th>S.No</th>
                                            <th>Range</th>
                                            <th>Dealer Price</th>
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
                                                    <td><input type="text" name="value_range[]" class="form-control"
                                                               placeholder="0 - 100" onkeypress="return isNumber(event)"
                                                               value="<?php echo !empty($range['value_range']) ? $range['value_range'] : '' ?>">
                                                    </td>
                                                    <td><input type="text" name="dealer_price[]" class="form-control"
                                                               required placeholder="Delaer Price" onkeypress="return isNumber(event)"
                                                               value="<?php echo !empty($range['dealer_price']) ? $range['dealer_price'] : '' ?>"/>
                                                    </td>
                                                </tr>
                                                <?php
                                                $i++;
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td>1</td>
                                                <td><input type="text" name="value_range[]" class="form-control"
                                                           placeholder="Quantity Value" onkeypress="return isNumber(event)"
                                                           value="<?php echo !empty($range['value_range']) ? $range['value_range'] : '' ?>">
                                                </td>
                                                <td><input type="text" name="dealer_price[]" class="form-control"
                                                           required placeholder="Delaer Price" onkeypress="return isNumber(event)"
                                                           value="<?php echo !empty($range['dealer_price']) ? $range['dealer_price'] : '' ?>"/>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-success add" id="add"><i
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
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-4">If This Product Has Mac Id Plz Check</label>
                                <div class="col-md-8">
                                    <input type="checkbox">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2"><input type="checkbox" id="desc1"> Description
                                    1</label>
                                <div class="col-md-8">
                                    <textarea class="form-control ckeditor " id="tdesc1" name="description_1"
                                              rows="5"><?php echo !empty($sub_product['description_1']) ? $sub_product['description_1'] : '' ?></textarea>
                                    <p class="text-danger" id="pdesc1">Data will not be Saved from here</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2"><input type="checkbox" id="desc2"> Description
                                    2</label>
                                <div class="col-md-8">
                                    <textarea class="form-control ckeditor" id="tdesc2" name="description_2"
                                              rows="5"><?php echo !empty($sub_product['description_2']) ? $sub_product['description_2'] : '' ?></textarea>
                                    <p class="text-danger" id="pdesc2">Data will not be Saved from here</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2"><input type="checkbox" id="desc3"> Description
                                    3</label>
                                <div class="col-md-8">
                                    <textarea class="form-control ckeditor" id="tdesc3" name="description_3"
                                              rows="5"><?php echo !empty($sub_product['description_3']) ? $sub_product['description_3'] : '' ?></textarea>
                                    <p class="text-danger" id="pdesc3">Data will not be Saved from here</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Choose One</label>
                                <div class="col-md-8">
                                    <div class="radio">
                                        <label class="radio-inline"><input type="radio" id="file" name="demo_video_type"
                                                                           value="VIDEO">Video</label>
                                        <label class="radio-inline"><input type="radio" id="youtube"
                                                                           name="demo_video_type" value="YOUTUBE">Yotube</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="input_file">
                                <label class="control-label col-md-2">File </label>
                                <div class="col-md-4">
                                    <input type="file" name="demo_video" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group" id="input_youtube">
                                <label class="control-label col-md-2">Youtube
                                </label>
                                <div class="col-md-4">
                                    <input type="text" name="demo_video" class="form-control" placeholder="Youtube"
                                           value="<?php echo !empty($download['youtube']) ? $download['youtube'] : '' ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Demo</label>
                                <div class="col-md-8">
                                    <textarea class="form-control ckeditor" name="demo_text"
                                              rows="5"><?php echo !empty($sub_product['demo_text']) ? $sub_product['demo_text'] : '' ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2"></label>
                                <div class="col-md-8">
                                    <?php
                                    if(!empty($sub_product)){
                                        ?>
                                        <button form="frm" type="submit" class="btn btn-success">Update</button>
                                        <?php
                                    }else{
                                        ?>
                                        <button form="frm" type="submit" class="btn btn-success">Submit</button>

                                        <?php
                                    }
                                    ?>

                                    <a href="<?php echo base_url() ?>admin/child-sub-products/" class="btn btn-danger">Cancel</a>

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
        })
    });
</script>
<script>
    $("#frm").validate({
        rules: {
            product_name: {
                required: true,
                <?php if(!empty($sub_product['product_name'])){?>
                remote: '<?php echo base_url() ?>' + 'admin/check-product-exists'
                <?php } ?>

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
                '<td><input type="text" name="value_range[]" onkeypress="return isNumber(event)" class="form-control" placeholder="Quantity Value"></td>' +
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