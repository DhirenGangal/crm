<div class="content-wrapper">
    <section class="content-header">
        <h1> Sub Products
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Sub Products</li>
        </ol>
    </section>
    <section class="content">
        <?php echo getMessage(); ?>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">List Of Sub Products</h3>
                <div class="box-tools">
                    <a href="<?php echo base_url(); ?>admin/sub-products/add" class="btn btn-info"><i class="fa fa-plus"></i> Add Sub Products</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Sub Product</th>
                        <th>Sub Product Image</th>
                        <th>Parent Product</th>
                        <th>Order No</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    if (!empty($products)) {
                        $i=1;
                        foreach ($products as $product) {
                            if (!empty($product['sub_products'])) {
                                foreach ($product['sub_products'] as $sub_product) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo !empty($sub_product['product_name']) ? $sub_product['product_name'] : ""; ?></td>
                                        <td><?php
                                            $img = (!empty($sub_product['product_logo']) && file_exists(FCPATH.'data/sub-products/')) ?   'data/sub-products/'.$sub_product['product_logo']  : '' ;
                                            ?>
                                            <img src="<?php echo !empty($img) ? base_url().$img : dummyLogo()  ?>" class="img-table" alt="Product Image">
                                        <td><?php echo !empty($sub_product['main_product']) ? $sub_product['main_product'] : ""; ?></td>
                                        <td><?php echo !empty($sub_product['order_no']) ? $sub_product['order_no'] : ""; ?></td>
                                        <td class="">
                                            <a data-toggle="tooltip" data-placement="bottom"
                                               href="<?php echo base_url() ?>admin/sub-products/edit/<?php echo $sub_product['product_id']; ?>"
                                               title='Edit' class="btn btn-sm btn-default"><i
                                                        class="fa fa-pencil text-info"></i></a>
                                            <a data-toggle="tooltip" data-placement="bottom"
                                               href="<?php echo base_url() ?>admin/sub-products/?act=status&product_id=<?php echo $sub_product['product_id']; ?>&sta=<?php echo ($sub_product['is_active'] == "1") ? "0" : "1"; ?>"
                                               title='<?php echo ($sub_product['is_active'] == "1") ? "Active" : "Inactive"; ?>'
                                               class="btn btn-sm btn-default"><i
                                                        class="fa fa-star <?php echo ($sub_product['is_active'] == "1") ? "text-success" : "text-danger"; ?>"></i></a>
                                            <a data-toggle="tooltip" data-placement="bottom"
                                               href="<?php echo base_url() ?>admin/sub-products/?act=del&product_id=<?php echo $sub_product['product_id']; ?>"
                                               title='Delete' onclick="return window.confirm('Do You Want to Delete?');"
                                               class="btn btn-sm btn-default"><i class="fa fa-trash text-danger"></i></a></td>
                                    </tr>
                                    <?php
                                        $i++;
                                }
                            }
                        }
                    } else {
                        echo "<tr class='text-center text-danger'><td colspan='6'>No Sub Product added</td></tr>";
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
