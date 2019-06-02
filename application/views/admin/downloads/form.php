<div class="content-wrapper">
    <section class="content-header">
        <h1>Attachment</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Attachment</li>
        </ol>
    </section>
       <section class="content">
        <?php echo getMessage(); ?>
        <div class="box box-info">
            <div class="box-header with-border"><h3 class="box-title">Add Attachment</h3>
                <div class="box-tools">
                    <a href="<?php echo base_url(); ?>admin/downloads/" class="btn btn-sm btn-danger"><i
                                class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
            <div class="box-body">
                <form class="form-horizontal" id="frm" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="download_id"
                           value="<?php echo !empty($download['download_id']) ? $download['download_id'] : ''; ?>"/>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="control-label col-md-3">Title <sup class="text-danger">*</sup></label>
                                <div class="col-md-6">
                                    <input type="text" name="title" class="form-control" required
                                           placeholder="Title"
                                           value="<?php echo !empty($download['title']) ? $download['title'] : '' ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"> Choose One <sup
                                            class="text-danger">*</sup></label>
                                <div class="col-md-8 ">
                                    <div class="radio">
                                        <label class="radio-inline"><input type="radio" name="video_type" value="VIDEO" id="file" <?php echo !empty($download) && ($download['video_type']=='VIDEO') ? 'checked=checked' : ''?>>File</label>
                                        <label class="radio-inline"><input type="radio" name="video_type" value="YOUTUBE" id="youtube" <?php echo !empty($download) && ($download['video_type']=='YOUTUBE') ? 'checked=checked' : ''?>>Youtube</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="input_file">
                                <label class="control-label col-md-3">File <sup class="text-danger">*</sup> </label>
                                <div class="col-md-6">
                                    <input type="file" name="download_file" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group" id="input_youtube">
                                <label class="control-label col-md-3">Youtube <sup class="text-danger">*</sup>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="youtube_url" class="form-control" placeholder="Youtube"
                                           value="<?php echo !empty($download['youtube_url']) ? $download['youtube_url'] : '' ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Description</label>
                                <div class="col-md-9">
                                        <textarea class="form-control" rows="5" name="description"
                                                  placeholder="Enter Description"><?php echo !empty($download['description']) ? $download['description'] : ''; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3"></label>
                                <div class="col-md-9">
                                    <button form="frm" type="submit" class="btn btn-success">Submit</button>
                                    <a href="<?php echo base_url() ?>admin/downloads/" class="btn btn-danger">Cancel</a>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <?php
                            $img = (!empty($download['download_file']) && file_exists(FCPATH."data/downloads/")) ? 'data/downloads/'.$download['download_file'] : '';
                            ?>
                            <img src="<?php echo !empty($img) ? base_url().$img : dummyLogo() ?>" class="product-pic" alt="Product Pic">
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </section>
</div>
<script>
    $(document).ready(function () {
        $('#input_file').hide();
        $('#input_youtube').hide();
        <?php
if(!empty($download)){
    ?>
    $("#file").prop("checked", function () {
        $('#input_file').show();
        $('#input_youtube').hide();
    });

    $("#youtube").prop("checked", function () {
        $('#input_youtube').show();
        $('#input_file').hide();
    });
    <?php
}else{
    ?>
        $('#file').click(function () {
            $('#input_file').show();
            $('#input_youtube').hide();
        });
        $('#youtube').click(function () {
            $('#input_youtube').show();
            $('#input_file').hide();
        });
        <?php
    }
?>



    });
</script>