<div class="content-wrapper">
    <section class="content-header">
        <h1> Main Products
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"> Main Products</li>
        </ol>
    </section>
    <section class="content">
        <?php echo getMessage(); ?>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">List Of Main Products</h3>
                <div class="box-tools">
                    <a href="<?php echo base_url(); ?>admin/main-products/add" class="btn btn-info"><i class="fa fa-plus"></i> Add
                        Main Product</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover data-table">
                    <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Product Name</th>
                        <th>Order No</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($products)) {
                        $i = 1;
                        foreach ($products as $product) { ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo !empty($product['product_name']) ? $product['product_name'] : ""; ?></td>
                                <td><?php echo !empty($product['order_no']) ? $product['order_no'] : ""; ?></td>
                                <td class="">
                                    <a data-toggle="tooltip" data-placement="bottom"
                                       href="<?php echo base_url() ?>admin/main-products/edit/<?php echo $product['product_id']; ?>"
                                       title='Edit' class="btn btn-sm btn-default"><i
                                                class="fa fa-pencil text-info"></i></a>
                                    <a data-toggle="tooltip" data-placement="bottom"
                                       href="<?php echo base_url() ?>admin/main-products/?act=status&product_id=<?php echo $product['product_id']; ?>&sta=<?php echo ($product['is_active'] == "1") ? "0" : "1"; ?>"
                                       title='<?php echo ($product['is_active'] == "1") ? "Active" : "Inactive"; ?>'
                                       class="btn btn-sm btn-default"><i
                                                class="fa fa-star <?php echo ($product['is_active'] == "1") ? "text-success" : "text-danger"; ?>"></i></a>
                                    <a data-toggle="tooltip" data-placement="bottom"
                                       href="<?php echo base_url() ?>admin/main-products/?act=del&product_id=<?php echo $product['product_id']; ?>"
                                       title='Delete' onclick="return window.confirm('Do You Want to Delete?');"
                                       class="btn btn-sm btn-default"><i class="fa fa-trash text-danger"></i></a></td>
                            </tr>
                            <?php $i++;
                        }
                    } else {
                        echo "<tr class='text-center text-danger'><td colspan='5'>No Product added</td></tr>";
                    } ?>                    </tbody>
                </table>
                <div class="text-center">
                    <?php echo !empty($PAGING) ? $PAGING : ""; ?>
                </div>
            </div>
        </div>
    </section>
</div>
