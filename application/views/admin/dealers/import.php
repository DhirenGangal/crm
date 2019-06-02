<div class="content-wrapper">
    <section class="content-header">
        <h1>Import Dealers</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Import Dealers</li>
        </ol>
    </section>
    <section class="content">
        <?php echo getMessage(); ?>
        <div class="box box-info">
            <div class="box-header with-border"><h3 class="box-title">Import Dealers</h3>
                <div class="box-tools">
                    <a href="<?php echo base_url(); ?>import/dealers-sample-csv/" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download Sample CSV</a>
                    <a href="<?php echo base_url(); ?>admin/dealers/" class="btn btn-sm btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
            <div class="box-body">
                <form class="form-horizontal" id="frm" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-10">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Attachment<sup class="text-danger">*</sup></label>
                                        <div class="col-md-8">
                                            <input type="hidden" name="import" class="form-control" value="TRUE" />
                                            <input type="file" name="import_csv" class="form-control" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4"></label>
                                        <div class="col-md-8">
                                            <button form="frm" type="submit" class="btn btn-success btn-submit">Submit</button>
                                            <a href="<?php echo base_url() ?>admin/dealers/" class="btn btn-danger">Cancel</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
</div>

