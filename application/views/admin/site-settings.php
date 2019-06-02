<div class="content-wrapper">
    <section class="content-header">
        <h1>Site Settings</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Site Settings</li>
        </ol>
    </section>
    <section class="content">
        <?php echo getMessage(); ?>
        <div class="box box-info">
            <div class="box-header with-border"><h3 class="box-title">Edit Site Settings</h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal" id="frm" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-10">
                            <input type="hidden" name="pk_id"
                                   value="<?php echo !empty($settings['pk_id']) ? $settings['pk_id'] : ''; ?>"/>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Web URL <sup class="text-danger">*</sup>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="web_url" class="form-control" required
                                               placeholder="Web URL"
                                               value="<?php echo !empty($settings['web_url']) ? $settings['web_url'] : '' ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Email <sup class="text-danger">*</sup></label>
                                    <div class="col-md-8">
                                        <input type="email" name="email" class="form-control" required placeholder="Email" value="<?php echo !empty($settings['email']) ? $settings['email'] : '' ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Is mail to send </label>
                                    <div class="col-md-8">
                                        <label class="radio-inline"><input type="radio" name="is_mail_send" value="Yes">Yes</label>
                                        <label class="radio-inline"><input type="radio" name="is_mail_send" value="No" checked>No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4"> Company Logo</label>
                                    <div class="col-md-8">
                                        <input type="file" name="logo" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">State <sup class="text-danger">*</sup></label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="state" required>
                                            <option value="">Select State</option>
                                            <?php
                                            if(!empty($states)){
                                                foreach ($states as $k=>$v){
                                                    ?>
                                                    <option value="<?php echo $k ?>" <?php echo !empty($settings['state']) && ($k==$settings['state']) ? 'selected=selected' : ''; ?>><?php echo $v; ?></option>
                                                    <?php
                                                }
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2">Address</label>
                                    <div class="col-md-10">
                                        <textarea name="address" class="form-control ckeditor" rows="5"
                                                  placeholder="Address"><?php echo !empty($settings['address']) ? $settings['address'] : '' ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Agreement</label>
                                    <div class="col-md-10">
                                        <textarea name="agreement" class="form-control ckeditor" rows="5"
                                                  placeholder="Agreement"><?php echo !empty($settings['agreement']) ? $settings['agreement'] : '' ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Privacy Policy</label>
                                    <div class="col-md-10">
                                        <textarea name="privacy_policy" class="form-control ckeditor" rows="5"
                                                  placeholder="Privacy Policy"><?php echo !empty($settings['privacy_policy']) ? $settings['privacy_policy'] : '' ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2"> About Us</label>
                                    <div class="col-md-10">
                                        <textarea rows="5" name="about_us"
                                                  class="form-control ckeditor"><?php echo !empty($settings['about_us']) ? $settings['about_us'] : '' ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4"> Meta Description</label>
                                    <div class="col-md-8">
                                        <input type="text" name="meta_description" class="form-control"
                                               value="<?php echo !empty($settings['meta_description']) ? $settings['meta_description'] : '' ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Meta Keywords</label>
                                    <div class="col-md-8">
                                        <input type="text" name="meta_keywords" class="form-control"
                                               value="<?php echo !empty($settings['meta_keywords']) ? $settings['meta_keywords'] : '' ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <h4>Company Logo</h4>
                            <?php
                            $img = (!empty($settings['logo']) && file_exists(FCPATH."data/settings/"))? "data/settings/".$settings['logo'] : '';
                            ?>
                            <img src="<?php echo !empty($img) ? base_url().$img : dummyLogo() ?>" alt="Site Settings Pic"
                                 class="profile-pic">
                        </div>
                        <div class="col-md-10">
                            <h4 class="text-center"><b>Social Links</b></h4>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4"> Facebook</label>
                                    <div class="col-md-8">
                                        <input type="text" name="facebook" class="form-control"
                                               value="<?php echo !empty($settings['facebook']) ? $settings['facebook'] : '' ?>" placeholder="Enter your fb link">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Twitter</label>
                                    <div class="col-md-8">
                                        <input type="text" name="twitter" class="form-control"
                                               value="<?php echo !empty($settings['twitter']) ? $settings['twitter'] : '' ?>" placeholder="Enter your twitter link">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4"> Youtube</label>
                                    <div class="col-md-8">
                                        <input type="text" name="youtube" class="form-control"
                                               value="<?php echo !empty($settings['youtube']) ? $settings['youtube'] : '' ?>" placeholder="Enter your Youtube link">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Instagram</label>
                                    <div class="col-md-8">
                                        <input type="text" name="instagram" class="form-control"
                                               value="<?php echo !empty($settings['instagram']) ? $settings['instagram'] : '' ?>" placeholder="Enter your Instagram link">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group hide">
                                <label class="control-label col-md-2">Google Map</label>
                                <div class="col-md-10">
                                        <textarea rows="3" name="google_map"
                                                  class="form-control ckeditor" placeholder="Google Maps"><?php echo !empty($settings['google_map']) ? $settings['google_map'] : '' ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2"></label>
                                <div class="col-md-10">
                                    <button form="frm" type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </div>
                        <div class="clearfix"></div>

                    </div>

                </form>
            </div>
        </div>
    </section>
</div>
