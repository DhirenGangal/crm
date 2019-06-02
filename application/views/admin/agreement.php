<div class="content-wrapper">
    <section class="content-header">
        <h1>Agreement</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Agreement</li>
        </ol>
    </section>
    <section class="content">
        <?php echo getMessage(); ?>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Agreement</h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal" id="frm" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="pk_id" value="<?php echo !empty($agreement['pk_id']) ? $agreement['pk_id'] : ''; ?>"/>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-2">Terms of Use</label>
                            <div class="col-md-8">
                               <textarea name="terms_of_use" class="form-control ckeditor" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Privacy Policy</label>
                            <div class="col-md-8">
                                <textarea name="privacy_policy" class="form-control ckeditor" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="box-footer">
                <div class="pull-right">
                    <button form="frm" type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </div>
    </section>
</div>
