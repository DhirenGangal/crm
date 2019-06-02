<style>
    .close{
        color: red;
        opacity: 1.3;
        font-size: 30px;
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
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">List Of Products</h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered data-table table-hover">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Child Sub Product Name</th>
                            <th>Sub Product Name</th>
                            <th>Product Name</th>
                            <th>MRP Price<sub>[Rs]</sub></th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php if (!empty($products)) {
                            foreach ($products as $product) {
                                if (!empty($product['sub_products'])) {
                                    foreach ($product['sub_products'] as $sub_product) {
                                        if (!empty($sub_product['child_sub_products'])) {
                                            $i=1;
                                            foreach ($sub_product['child_sub_products'] as $child_product) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $child_product['child_product_name']; ?></td>
                                                    <td><?php echo $child_product['sub_prodcut_name']; ?></td>
                                                    <td><?php echo $child_product['main_product_name']; ?></td>
                                                    <td><?php echo !empty($child_product['mrp_price']) ? $child_product['mrp_price'] : ''; ?></td>
                                                    <td class="">
                                                        <a data-toggle="modal"  data-target="#view-details" data-id="<?php echo $child_product['product_info_id'] ?>"  title='View' class="btn btn-sm btn-success view-details" ><i class="fa fa-eye"></i>  View Details</a>
                                                    </td>
                                                </tr>
                                                <?php
                                                $i++;

                                            }
                                        }
                                    }
                                }
                            }
                        } else {
                            echo "<tr class='text-center text-danger'><td colspan='6'>No Child Sub Product added</td></tr>";
                        } ?>                    </tbody>
                    </table>
                    <div class="text-center">
                        <?php echo !empty($PAGING) ? $PAGING : ""; ?>
                    </div>
                    <div class="modal fade" id="view-details">
                        <div id="product_details"></div>

                        <!-- /.modal-dialog -->
                    </div>
                    <div class="modal fade" id="view-video" style="top: 25%">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="row text-center">
                                        Video Here
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success pull-right" data-dismiss="modal" >Close</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.view-details').click(function(e) {
            e.preventDefault();
            var product_info_id = $(this).data('id');
            console.log(product_info_id);
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url() ?>" + "owner/fetch_product_details/?product_info_id=" + product_info_id,
                success: function (data) {
                    $("#product_details").html(data);
                }
            });

        });
    });
</script>