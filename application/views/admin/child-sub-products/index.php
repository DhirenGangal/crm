<link rel="stylesheet" href="<?php echo base_url(); ?>assets/lib/css/jquery-ui.min.css">
<div class="content-wrapper">
    <section class="content-header">
        <h1> Products Models
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Product Models</li>
        </ol>
    </section>
    <section class="content">
        <?php echo getMessage(); ?>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">List Of Product Models</h3>
                <div class="box-tools">
                    <a href="<?php echo base_url(); ?>import/import-products/" class="btn btn-primary"><i
                                class="fa fa-download"></i> Import</a>
                    <a href="<?php echo base_url(); ?>import/export-products/" class="btn btn-success"><i
                                class="fa fa-upload"></i> Export</a>
                    <a href="<?php echo base_url(); ?>admin/child-sub-products/add" class="btn btn-info"><i
                                class="fa fa-plus"></i> Add Product Model</a>
                </div>
            </div>
            <div class="box-body">
                <div class="toggle-col">
                    Show/Hide column : <a class="toggle-vis" data-column="0">S.No</a> -- <a class="toggle-vis"
                                                                                            data-column="1">Product
                        Model</a> -- <a class="toggle-vis" data-column="2">Sub Product Name</a> -- <a class="toggle-vis"
                                                                                                      data-column="3">Parent
                        Product</a> -- <a class="toggle-vis" data-column="4">Order No</a> -- <a class="toggle-vis"
                                                                                                data-column="5">Status</a>
                    -- <a class="toggle-vis" data-column="6">Action</a>
                </div>
                <table class="table table-bordered table-hover data-table">
                    <thead >
                    <tr>
                        <th>S.No</th>
                        <th>Product Model</th>
                        <th>Sub Product Name</th>
                        <th>Parent Product</th>
                        <th>Order No</th>
                        <th>Status</th>
                        <th>Action</th>
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
                                                        <td><?php echo $info['child_product_name']; ?></td>

                                                        <td><?php echo $info['sub_product_name']; ?></td>
                                                        <td><?php echo $info['main_product_name']; ?></td>

                                                        <td><?php echo !empty($info['order_no']) ? $info['order_no'] : ''; ?></td>
                                                        <td><?php echo !empty($info['status']) ? $info['status'] : ''; ?></td>
                                                        <td>
                                                            <a data-toggle="tooltip" data-placement="bottom"
                                                               href="<?php echo base_url() ?>admin/child-sub-products/edit/<?php echo $info['product_info_id']; ?>"
                                                               title='Edit' class="btn btn-sm btn-default"><i
                                                                        class="fa fa-pencil text-info"></i></a>
                                                            <a data-toggle="tooltip" data-placement="bottom"
                                                               href="<?php echo base_url() ?>admin/child-sub-products/view/<?php echo $info['product_info_id']; ?>"
                                                               title='View' class="btn btn-sm btn-default"><i
                                                                        class="fa fa-eye text-warning"></i></a>
                                                            <a data-toggle="tooltip" data-placement="bottom"
                                                               href="<?php echo base_url() ?>admin/child-sub-products/?act=status&product_info_id=<?php echo $info['product_info_id']; ?>&sta=<?php echo ($info['is_active'] == "1") ? "0" : "1"; ?>"
                                                               title='<?php echo ($info['is_active'] == "1") ? "Active" : "Inactive"; ?>'
                                                               class="btn btn-sm btn-default"><i
                                                                        class="fa fa-star <?php echo ($info['is_active'] == "1") ? "text-success" : "text-danger"; ?>"></i></a>
                                                            <a data-toggle="tooltip" data-placement="bottom"
                                                               href="<?php echo base_url() ?>admin/child-sub-products/?act=del&product_info_id=<?php echo $info['product_info_id']; ?>"
                                                               title='Delete'
                                                               onclick="return window.confirm('Do You Want to Delete?');"
                                                               class="btn btn-sm btn-default"><i
                                                                        class="fa fa-trash text-danger"></i></a>
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
                    } ?>
                    </tbody>
                </table>
                <div class="text-center">
                    <?php echo !empty($PAGING) ? $PAGING : ""; ?>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script>
    jQuery(document).ready(function ($) {

        $("#sortable").sortable({

            axis: 'y', update: function (event, ui) {
                var order = $(this).sortable('serialize');
                $.ajax({
                    data: order,
                    type: 'POST',
                    url: '<?php echo base_url(); ?>sortapi/sort-products/',
                    error: function () {
                        alert("There is an error with AJAX");
                    }
                });
            }
        });
        // $("#sortable").disableSelection();

    });
</script>