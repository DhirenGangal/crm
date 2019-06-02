<div class="content-wrapper">
    <section class="content-header">
        <h1>Product</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Product</li>
        </ol>
    </section>
    <section class="content">
        <?php echo getMessage(); ?>

        <div class="box box-info">
            <div class="box-header with-border"><h3 class="box-title">Add Product</h3>
                <div class="box-tools">
                    <a href="<?php echo base_url(); ?>admin/clients/" class="btn btn-sm btn-danger"><i
                                class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
            <div class="box-body">
                <form class="form-horizontal" id="frm" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="client_id"
                           value="<?php echo !empty($client['client_id']) ? $client['client_id'] : ''; ?>"/>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4">Client Name <sup class="text-danger">*</sup></label>
                            <div class="col-md-8">
                                <input type="text" name="client_name" required class="form-control"
                                       placeholder="Client Name"
                                       value="<?php echo !empty($client['client_name']) ? $client['client_name'] : '' ?>"/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Alt Name <sup class="text-danger">*</sup></label>
                            <div class="col-md-8">
                                <input type="text" name="alt_name" required class="form-control" placeholder="Alt Name"
                                       value="<?php echo !empty($client['alt_name']) ? $client['alt_name'] : '' ?>"/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4"> Client Logo <sup class="text-danger">*</sup></label>
                            <div class="col-md-8">
                                <input type="file" name="client_logo" class="form-control"  value="<?php echo !empty($client['client_logo']) ? $client['client_logo'] : 'required' ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4"></label>
                            <div class="col-md-8">
                                <button form="frm" type="submit" class="btn btn-success">Submit</button>
                                <a href="<?php echo base_url() ?>admin/clients/" class="btn btn-danger">Cancel</a>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <h4><u>Client Logo</u></h4>
                        <?php
                        $img = (!empty($client['client_logo']) && file_exists(FCPATH . 'data/clients/')) ? 'data/clients/' . $client['client_logo'] : '';
                        ?>
                        <img src="<?php echo !empty($img) ? base_url() . $img : dummyLogo(); ?>" class="form-img" alt="CLient Pic">
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
