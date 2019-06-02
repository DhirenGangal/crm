<style>
    .close {
        color: red;
        opacity: 1.3;
        font-size: 30px;
    }

    .p-img {
        height: 100px !important;
        width: 150px !important;
    }
</style>
<div class="content-wrapper">
    <div class="container">
        <section class="content-header">
            <h1> Products
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"> Products</li>
            </ol>
        </section>

        <section class="content">
            <?php echo getMessage(); ?>
            <div class="box">
                <div class="box-body text-center">
                    <form class="form-inline" method="get">
                        <div class="form-group">
                            <select class="form-control" name="main_product" id="main_product_id" required>
                                <option value="">Select Product</option>
                                <?php
                                if (!empty($main_products)) {
                                    foreach ($main_products as $key => $value) {
                                        ?>
                                        <option value="<?php echo $key; ?>" <?php echo !empty($_GET['main_product']) && ($_GET['main_product'] == $key) ? "selected='selected'" : ''; ?>><?php echo $value; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="product_id" id="sproduct_id" required>
                                <option value="">Select Sub Product</option>
                                <?php
                                if (!empty($sub_products)) {
                                    foreach ($sub_products as $key => $value) {
                                        ?>
                                        <option value="<?php echo $key; ?>" <?php echo !empty($_GET['product_id']) && ($_GET['product_id'] == $key) ? "selected='selected'" : ''; ?>><?php echo $value; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-warning text-white">Search</button>
                    </form>
                </div>
            </div>
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">List Of Products</h3>
                </div>
                <div class="box-body">

                    <table class="table table-bordered data-table table-hover">

                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Product Image</th>
                            <th>HSN/SAC</th>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Datasheet</th>
                            <th>Pricing(INR)</th>
                            <th>Discount</th>
                            <th>Quantity</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($products)) {
                            $i = 1;
                            foreach ($products as $product) {
                                if (!empty($product['sub_products'])) {
                                    foreach ($product['sub_products'] as $sub_product) {
                                        if (!empty($sub_product['child_products'])) {
                                            foreach ($sub_product['child_products'] as $child_product) {
                                                if (!empty($child_product['product_details'])) {
                                                    foreach ($child_product['product_details'] as $info) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td>
                                                                <?php
                                                                $img = !empty($child_product['product_logo']) && file_exists(FCPATH . 'data/child-sub-products/') ? 'data/child-sub-products/' . $child_product['product_logo'] : '';
                                                                ?>
                                                                <a class="without-caption"
                                                                   title="<?php echo $info['child_product_name']; ?>"
                                                                   href="<?php echo !empty($img) ? base_url() . $img : dummyLogo() ?>">
                                                                    <img src="<?php echo !empty($img) ? base_url() . $img : dummyLogo() ?>"
                                                                         alt="product image" class="p-img">
                                                                </a>
                                                            </td>
                                                            <td class="w-10"><?php echo !empty($info['hsn_code']) ? $info['hsn_code'] : '' ?></td>
                                                            <td class="w-15"><?php echo $info['child_product_name']; ?></td>
                                                            <td class="w-25"><?php echo limit_words($info['description_1'], 15) . '...'; ?></td>
                                                            <td>
                                                                <?php
                                                                $datasheet = !empty($info['datasheet']) && file_exists(FCPATH . 'data/datasheets/') ? 'data/datasheets/' . $info['datasheet'] : '';
                                                                ?>
                                                                <a href="<?php echo !empty($datasheet) ? base_url() . $datasheet : '#' ?>"
                                                                   target="_blank">Datasheet</a>
                                                            </td>
                                                            <td class="w-15">
                                                                <table>
                                                                    <tbody>
                                                                    <?php
                                                                    if (!empty($info['price_range'])) {
                                                                        foreach ($info['price_range'] as $pr) {
                                                                            ?>
                                                                            <tr>
                                                                                <?php
                                                                                if (!empty($pr['value_range'])) {
                                                                                    ?>
                                                                                    <th><?php echo $pr['value_range']; ?></th>
                                                                                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;<i
                                                                                                class="fa fa-inr"></i> <?php echo $pr['dealer_price']; ?>
                                                                                    </td>
                                                                                    <?php
                                                                                } else {
                                                                                    ?>

                                                                                    <td>&nbsp;&nbsp;<i
                                                                                                class="fa fa-inr"></i> <?php echo $pr['dealer_price']; ?>
                                                                                    </td>
                                                                                    <?php
                                                                                }
                                                                                ?>

                                                                            </tr>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td>
                                                                <span class="discount_text"><?php echo !empty($info['discount']) ? $info['discount'] . ' ' . '%' : ''; ?></span>
                                                                <input type="hidden" class="form-control input_discount"
                                                                       name="discount"
                                                                       value="<?php echo !empty($info['discount']) ? $info['discount'] : ''; ?>">
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="hidden"
                                                                       class="form-control product_info_id"
                                                                       name="product_info_id"
                                                                       value="<?php echo !empty($info['product_info_id']) ? $info['product_info_id'] : ''; ?>">
                                                                <input type="hidden" class="form-control total"
                                                                       name="total" value="0">
                                                                <input type="text"
                                                                       class="form-control quantity w-100 text-center"
                                                                       name="quantity"
                                                                       onkeypress="return isNumber(event)"
                                                                       placeholder="Quantity" value="1">
                                                                <button data-toggle="modal" data-target="#view-details"
                                                                        type="submit"
                                                                        data-id="<?php echo $info['product_info_id'] ?>"
                                                                        class="btn btn-sm btn-success buy">Add to Cart
                                                                </button>
                                                            </td>

                                                        </tr>
                                                        <?php
                                                        $i++;
                                                    }
                                                }
                                                ?>

                                                <?php

                                            }
                                        }

                                    }
                                }

                            }
                        } else {
                            echo "<tr class='text-center text-danger'><td colspan='6'>No Child Sub Product added</td></tr>";
                        } ?>                  </tbody>
                    </table>
                    <div class="text-center">
                        <?php echo !empty($PAGING) ? $PAGING : ""; ?>
                    </div>
                    <div class="modal fade" id="view-details">
                        <div id="product_details"></div>

                        <!-- /.modal-dialog -->
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<link type="text/css" rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script>
    $('.without-caption').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        closeBtnInside: false,
        closeOnBgClick: false,
        mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
        image: {
            verticalFit: true
        },
        zoom: {

            enabled: true,
            duration: 300 // don't foget to change the duration also in CSS
        }
    });
    $('.with-caption').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        closeBtnInside: false,
        closeOnBgClick: false,
        mainClass: 'mfp-with-zoom mfp-img-mobile',
        image: {
            verticalFit: true,
            titleSrc: function (item) {
                return item.el.attr('title') + ' &middot; <a class="image-source-link" href="' + item.el.attr('data-source') + '" target="_blank">image source</a>';
            }
        },
        zoom: {
            enabled: true
        }
    });
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
                    url: "<?php echo base_url() ?>" + "dealer/fetch_sub_products/?main_product_id=" + main_product_id,
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
        /*$('body').on('change', '.quantity', function () {
            var product_info_id = $(this).closest('tr').find('.product_info_id').val();
            var quantity = $(this).closest('tr').find('.quantity').val();
            $.ajax({
                type: 'POST',
                url:  "dealer/fetch_price_ranges/",
                data: {quantity: quantity, product: product_info_id},
                success: function (data) {
                    $(this).closest('td').find(".total").val(data);
                    console.log(data);
                    // $(this).closest('tr').find('.total').append(data);
                }
            });
        });*/

        $('body').on('click', '.buy', function (e) {
            e.preventDefault();
            var product_info_id = $(this).closest('tr').find('.product_info_id').val();
            var total = $(this).closest('tr').find('.total').val();
            var quantity = $(this).closest('tr').find('.quantity').val();
            var discount = $(this).closest('tr').find('.input_discount').val();

            $.ajax({
                type: 'POST',
                url: "<?php echo base_url() ?>" + "dealer/add_cart_info/",
                data: {quantity: quantity, product: product_info_id, discount: discount},
                success: function (data) {
                    $("#product_details").html(data);
                    //$('.quantity').val('');
                    //window.location.reload(true,5000);
                    // setTimeout("location.href = '<?php echo base_url() ?>" + "dealer/products'",2000);

                }
            });

        });

       /* $.ajax({
            type: 'POST',
            url: "" + "dealer/load/",
            success: function (data) {
                $('.cart-data').html(data);
                console.log(data);
            }
        });*/

    });
</script>