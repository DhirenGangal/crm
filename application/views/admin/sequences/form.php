<div class="content-wrapper">
    <section class="content-header">
        <h1>Sequence Numbers</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Sequence Numbers</li>
        </ol>
    </section>
    <section class="content">
    
        <?php echo getMessage(); ?>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo ucwords($this->uri->segment(3));?> Sequence Number</h3>
            </div>
            <div class="box-body">
                <form method="POST" class="form-horizontal">
                <input type="hidden" name="pk_id" value="<?php echo !empty($sequence['pk_id']) ? $sequence['pk_id']:'';?>"/>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-6 control-label">Sequence Prefix</label>
                            <div class="col-md-6">
                                <input type="text" name="prefix" class="form-control" placeholder="Enter Profix" value="<?php echo !empty($sequence['prefix']) ? $sequence['prefix']:'';?>"/>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="submit" value="Save " class="btn btn-sm btn-success"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
            