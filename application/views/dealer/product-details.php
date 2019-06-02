<style>
    .box{
        border-top: 1px solid #605ca8 !important;
    }
</style>
<?php if(!empty($product_details)){
    ?>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?php echo $product_details['child_product_name'] ?></h4>
            </div>
            <div class="modal-body">
                <div class="row">




            <div class="col-md-12">
                <div class="col-md-4 text-center">
                    <?php 
                    $img = !empty($product_details['product_logo'] && file_exists(FCPATH.'data/child-sub-products/'.$product_details['product_logo'])) ? 'data/child-sub-products/'.$product_details['product_logo'] : '';
                    ?>
                    <img src="<?php echo !empty($img) ?  base_url().$img : dummyLogo()  ?>" class="modal-img" alt="Product Image">
                </div>
                <div class="col-md-8">
                    <div class="box-group" id="accordion">
                        <div class="panel box ">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                       Description 1
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="box-body">
                                   <?php echo $product_details['description_1'] ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel box box-danger">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                        Description 2
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="box-body">
                                    <?php echo $product_details['description_2'] ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel box box-success">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                        Description 3
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="box-body">
                                    <?php echo $product_details['description_3'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success pull-left" data-toggle="modal" data-target="#view-video" >PLEASE CLICK HERE FOR DEMO VIDEO </button>
                <a role="button" href="javascript:void(0)" class="btn btn-primary hide">
                    <ul class="list-unstyled list-inline">
                        <li>Dealer Price:<?php echo $product_details['dealer_price'] ?></li>|
                        <li>MRP Price:<?php echo $product_details['mrp_price'] ?></li>
                    </ul>
                </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>

<?php
}else{
    ?>
<h1>No Data Found</h1>
<?php
}

?>
