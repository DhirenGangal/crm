<div class="content-wrapper">
    <section class="content-header">
        <h1>Sub Product</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Sub Product</li>
        </ol>
    </section>
    <section class="content">
        <?php echo getMessage(); ?>
        <div class="box box-info">
            <div class="box-header with-border"><h3 class="box-title">Add Sub Product</h3>
                <div class="box-tools">
                    <a href="<?php echo base_url(); ?>admin/sub-products/" class="btn btn-danger btn-sm"><i
                                class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
            <div class="box-body">
                <form class="form-horizontal" id="frm" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="product_id"
                           value="<?php echo !empty($sub_product['product_id']) ? $sub_product['product_id'] : ''; ?>"/>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Main Product <sup class="text-danger">*</sup></label>
                            <div class="col-md-7">
                                <select class="form-control" name="main_product_id" required>
                                    <option value="">---Select Product---</option>
                                    <?php
                                    if (!empty($main_products)) {
                                        foreach ($main_products as $key=>$value) {
                                            ?>
                                            <option value="<?php echo $key; ?>" <?php echo !empty($sub_product) && ($sub_product['parent_id'] == $key) ? "selected='selected'" : ''; ?>><?php echo $value; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">Sub Product Name <sup
                                        class="text-danger">*</sup></label>
                            <div class="col-md-7">
                                <input type="text" name="product_name" class="form-control" required
                                       placeholder="Sub Product Name"
                                       value="<?php echo !empty($sub_product['product_name']) ? $sub_product['product_name'] : '' ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">Sub Product Image <sup
                                        class="text-danger">*</sup></label>
                            <div class="col-md-7">
                                <input type="file" name="product_logo" class="form-control" <?php echo !empty($sub_product['product_logo']) ? $sub_product['product_logo'] : 'required' ?> />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5"></label>
                            <div class="col-md-7">
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

                                <a href="<?php echo base_url() ?>admin/sub-products/" class="btn btn-danger">Cancel</a>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <?php
                        $img = (!empty($sub_product['product_logo']) && file_exists(FCPATH .'data/sub-products/'.$sub_product['product_logo'])) ? 'data/sub-products/'.$sub_product['product_logo'] : '';
                        ?>
                        <img src="<?php echo !empty($img) ? base_url().$img : dummyLogo() ?>"  alt="product img" class="product-pic"/>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<script src="<?php echo base_url() ?>assets/lib/js/jquery.validate.min.js"></script>
<script>
    $("#frm").validate({
        rules: {
            product_name: {
                required: true,
                <?php if(empty($sub_product['product_name'])){ ?>
                remote: '<?php echo base_url() ?>' + 'admin/check-product-exists'
                <?php } ?>
            }
        },
        messages: {
            product_name: "This Product is Already exists"

        }
    });
</script>