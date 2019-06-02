<div class="content-wrapper">
    <section class="content-header">
        <h1>Import Products</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Import Products</li>
        </ol>
    </section>
    <section class="content">
        <?php echo getMessage(); ?>
        <div class="box box-info">
            <div class="box-header with-border"><h3 class="box-title">Import Products</h3>
                <div class="box-tools">
                    <a href="<?php echo base_url(); ?>import/products-sample-csv/" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download Sample CSV</a>
                    <a href="<?php echo base_url(); ?>admin/child-sub-products/" class="btn btn-sm btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
            <div class="box-body">
                <form class="form-horizontal" action="<?=base_url('import/import-products-ajax')?>" id="frm-import" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-10">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Attachment<sup class="text-danger">*</sup></label>
                                        <div class="col-md-8">
                                            <input type="hidden" name="import" class="form-control" value="TRUE" />
                                            <input type="file" name="import_csv" class="form-control" required />
                                            <span id="status" class="help-block"></span>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4"></label>
                                        <div class="col-md-8">
                                            <button type="submit" class="btn btn-success btn-submit">Submit</button>
                                            <button type="button" class="btn btn-danger">Cancel</button>
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

<script type="text/javascript">
    $(document).ready(function () {
        var xhRequest = "";

        $(document).on('click', 'button[type=button]' , function(event){
            cancelXHR();
        });
        /*** Submit form with file ***/
        $(document).on('submit', '#frm-import', function(event) {

            startAjax($(this));
            event.preventDefault();
            uploadFIle($(this));
        });
    });

    function startAjax (){
        $('button[type=submit').html('<i class="fa fa-spinner fa-spin"></i> Please wait...').prop('disabled','disabled');
    }

    function stopAjax (){
        $('button[type=submit').html('Submit').removeAttr("disabled");
    }

    function cancelXHR() {
        try{

            xhRequest.abort() ;
            stopAjax();
        }catch (err){
            alert("Error : " + err.message);
        }
    }

    function uploadFIle(form){
        var formData = new FormData(form[0]);
        xhRequest = $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        percentComplete = parseInt(percentComplete * 100);
                        //$this.setProgress(percentComplete);
                        $("#status").html(percentComplete + "% done.");
                        console.log(percentComplete);
                        if (percentComplete === 100)
                        {
                            $("#status").html("");
                            //$('.lobibox-progress-text').addClass('white');
                            //$('.lobibox-progress-text').html("Done");

                        }
                    }
                }, false);
            return xhr;
            },
            url: form.attr('action'),  //Server script to process data
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(data){
                console.log(data);
                if(data.status == 'error') {
                   $("#status").html(data.message);
                } else {
                    $("#status").html(data.message);
               }

                stopAjax();
            },
            complete:function()
            {
                $('.btn-close').click();
            },
        });
    }
</script>