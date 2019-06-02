<div class="content-wrapper">
    <section class="content-header">
        <h1>Main Product</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Main Product</li>
        </ol>
    </section>
    <section class="content">
        <?php echo getMessage(); ?>

        <div class="box box-info">
            <div class="box-header with-border"><h3 class="box-title">Add Product</h3>
                <div class="box-tools">
                    <a href="<?php echo base_url(); ?>admin/main-products/" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
            <div class="box-body">
                <form class="form-horizontal" id="frm" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="product_id" value="<?php echo !empty($product['product_id']) ? $product['product_id'] : ''; ?>"/>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4">Product Name <sup class="text-danger">*</sup></label>
                            <div class="col-md-8">
                                <input type="text" name="product_name"  class="form-control required" placeholder="Product Name" value="<?php echo !empty($product['product_name']) ? $product['product_name'] : '' ?>"/>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <?php
                        if(!empty($product)){
                            ?>
                            <button form="frm" type="submit" class="btn btn-success">Update</button>
                        <?php
                        }else{
                            ?>

                            <button form="frm" type="submit" class="btn btn-success">Submit</button>
                        <?php
                        }
                        ?>

                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<script src="<?php echo base_url() ?>assets/lib/js/jquery.validate.min.js"></script>
<script>
    $(document).ready(function(){
        $("#password").keyup(function(){

            var value = $("#password").val();
            var strength = value.length;
            if(strength > 0){
                $(".process").show();
                $("#bar").addClass("progress-bar-danger").html("poor") ;
                $("#eye").show();

                if(strength > 2){
                    $("#bar").removeClass("progress-bar-danger").removeClass("progress-bar-success").addClass("progress-bar-warning").css("width","30%").html("Weak ") ;
                }if(strength > 4){
                    $("#bar").css("width","60%").html("Medium").removeClass("progress-bar-success").addClass("progress-bar-warning") ;
                }
                if(strength > 6){
                    $("#bar").removeClass("progress-bar-warning").addClass("progress-bar-success").css("width","100%").html("Strong ") ;
                }

            }else{
                $("#bar").removeClass("progress-bar-warning").removeClass("progress-bar-success").addClass("progress-bar-danger").css("width","10%").html("poor ") ;
                $("#eye").hide();
                $(".process").hide();
            }

        });

        $("#eye").click(function(){

            if($(this).attr('data-click-state') == 1) {
                $(this).attr('data-click-state', 0).removeClass("glyphicon-eye-open").addClass("glyphicon-eye-close");
                $("#password").attr('type','text');

            } else {
                $(this).attr('data-click-state', 1).removeClass("glyphicon-eye-close").addClass("glyphicon-eye-open");
                $("#password").attr('type','password');

            }


        });

    });


</script>
<script>
    $("#frm").validate({
        rules: {
            product_name: {
                required: true,
                <?php if(empty($product)){ ?>
                remote: '<?php echo base_url() ?>' + 'admin/check-product-exists'
                <?php } ?>
            }
        },
        messages: {
            product_name: "This Product is Already exists"

        }
    });
</script>