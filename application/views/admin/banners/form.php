<div class="content-wrapper">
    <section class="content-header">
        <h1>Banner</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Banner</li>
        </ol>
    </section>
    <section class="content">
        <?php echo getMessage(); ?>
        <div class="box box-info">
            <div class="box-header with-border"><h3 class="box-title">Add Banner</h3>
                <div class="box-tools">
                    <a href="<?php echo base_url(); ?>admin/banners/" class="btn btn-danger btn-sm"><i
                            class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
            <div class="box-body">
                <form class="form-horizontal" id="frm" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="banner_id"
                           value="<?php echo !empty($banner['banner_id']) ? $banner['banner_id'] : ''; ?>"/>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-5">Banner Name <sup
                                    class="text-danger">*</sup></label>
                            <div class="col-md-7">
                                <input type="text" name="banner_name" class="form-control" required
                                       placeholder="Banner Name"
                                       value="<?php echo !empty($banner['banner_name']) ? $banner['banner_name'] : '' ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">Banner Image <sup
                                    class="text-danger">*</sup></label>
                            <div class="col-md-7">
                                <input type="file" name="banner_img" class="form-control" <?php echo !empty($banner['banner_img']) ? $banner['banner_img'] : 'required' ?> />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">Banner Description <sup
                                        class="text-danger">*</sup></label>
                            <div class="col-md-7">
                                <input type="text" name="banner_desc" class="form-control" required
                                       placeholder="Banner Description"
                                       value="<?php echo !empty($banner['banner_desc']) ? $banner['banner_desc'] : '' ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5"></label>
                            <div class="col-md-7">
                                <button form="frm" type="submit" class="btn btn-success">Submit</button>
                                <a href="<?php echo base_url() ?>admin/banners/" class="btn btn-danger">Cancel</a>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <?php
                        $img = (!empty($banner['banner_img']) && file_exists(FCPATH .'data/banners/'.$banner['banner_img'])) ? 'data/banners/'.$banner['banner_img'] : '';
                        ?>
                        <img src="<?php echo !empty($img) ? base_url().$img : dummyLogo() ?>"  alt="Banner img" class="product-pic"/>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<script src="<?php echo base_url() ?>assets/lib/js/jquery.validate.min.js"></script>
