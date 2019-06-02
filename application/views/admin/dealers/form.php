<div class="content-wrapper">
    <section class="content-header">
        <h1>Dealer</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dealer</li>
        </ol>
    </section>
    <section class="content">
        <?php echo getMessage(); ?>
        <div class="box box-info">
            <div class="box-header with-border"><h3 class="box-title">Add Dealer</h3>
                <div class="box-tools">
                    <a href="<?php echo base_url(); ?>admin/dealers/" class="btn btn-sm btn-danger"><i
                                class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
            <div class="box-body">
                <form class="form-horizontal" id="frm" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="member_id"
                           value="<?php echo !empty($dealer['member_id']) ? $dealer['member_id'] : ''; ?>"/>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-10">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">User Name <sup class="text-danger">*</sup>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" name="user_name" class="form-control" required
                                                   placeholder="User Name"
                                                   value="<?php echo !empty($dealer['user_name']) ? $dealer['user_name'] : '' ?>"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Email <sup
                                                    class="text-danger">*</sup></label>
                                        <div class="col-md-8">
                                            <input type="email" name="email" class="form-control email" id="email"  required placeholder="Email" value="<?php echo !empty($dealer['email']) ? $dealer['email'] : '' ?>"/>
                                            <span id="msg"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Password <sup class="text-danger">*</sup></label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="password" name="password" id="password" class="form-control" required placeholder="Change Password" value="<?php echo !empty($dealer['password']) ? $dealer['password'] : '' ?>"/>
                                                <span class="input-group-addon"><i id="pwd_eye" data-click-state="1" class="fa fa-eye"></i> </span>
                                            </div>
                                            <div class="process" style="display:none"><p> </p>
                                                <div class="progress"><div id="bar" class="progress-bar progress-bar-danger progress-bar-striped active" style="width: 10%;">Poor </div></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">ConfirmPassword<sup class="text-danger">*</sup></label>
                                        <div class="col-md-8">
                                            <input type="password" name="confirm_password" class="form-control" required
                                                   placeholder="Password"
                                                   value="<?php echo !empty($dealer['confirm_password']) ? $dealer['confirm_password'] : '' ?>"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">First Name <sup
                                                    class="text-danger">*</sup></label>
                                        <div class="col-md-8">
                                            <input type="text" name="first_name" class="form-control" required
                                                   placeholder="First Name"
                                                   value="<?php echo !empty($dealer['first_name']) ? $dealer['first_name'] : '' ?>"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Last Name</label>
                                        <div class="col-md-8">
                                            <input type="text" name="last_name" class="form-control"
                                                   placeholder="Last Name"
                                                   value="<?php echo !empty($dealer['last_name']) ? $dealer['last_name'] : '' ?>"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Role <sup class="text-danger">*</sup></label>
                                        <div class="col-md-8">
                                            <input type="text" name="role" class="form-control" required value="DEALER" readonly/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Comapany <sup class="text-danger">*</sup></label>
                                        <div class="col-md-8">
                                            <input type="text" name="company_name" class="form-control" required
                                                   placeholder="Company Name"
                                                   value="<?php echo !empty($dealer['company_name']) ? $dealer['company_name'] : '' ?>"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Phone <sup
                                                    class="text-danger">*</sup></label>
                                        <div class="col-md-8">
                                            <input type="text" name="phone_no" class="form-control" required placeholder="Phone No" data-inputmask='"mask": "(999) 999-9999"' data-mask
                                                   value="<?php echo !empty($dealer['phone_no']) ? $dealer['phone_no'] : '' ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4"> Profile Picture</label>
                                        <div class="col-md-8">
                                            <input type="file" name="profile_logo" class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">State </label>
                                        <div class="col-md-8">
                                            <select class="form-control" name="state" required>
                                                <option value="">Select State</option>
                                                <?php
                                                if (!empty($states)) {
                                                    foreach ($states as $k => $v) {
                                                        ?>
                                                        <option value="<?php echo $k ?>" <?php echo !empty($dealer['state']) && ($k == $dealer['state']) ? 'selected=selected' : ''; ?>><?php echo $v; ?></option>
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
                                            <textarea class="form-control ckeditor"  rows="5" name="address" placeholder="Enter your Address"><?php echo !empty($dealer['address']) ? $dealer['address'] : '' ?></textarea>
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
                            <div class="col-md-2">
                                <h4>Profile Picture</h4>
                                <?php
                                    $img = (!empty($dealer['profile_logo']) && file_exists(FCPATH.'data/profile/')) ? 'data/profile/'.$dealer['profile_logo']  : '';
                                ?>
                                <img src="<?php echo !empty($img) ? base_url().$img : dummyLogo() ?>" alt="Profile Picture"  class="profile-pic"/>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
</div>
<script>
    $('document').ready(function () {
        $("#email").change(function () {
            var email = $("#email").val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>admin/check-email-exists",
                    data: {email: email},
                    success: function (data) {
                        if (data == 'false') {
                            $("#msg").html('<span class="text-danger"> Email Already Exists..! </span>');
                            $('.btn-submit').attr('disabled',true);
                        }else{
                            $("#msg").html('<span class="text-danger"> Email Already Exists..! </span>').hide();
                            $('.btn-submit').attr('disabled',false);
                        }

                    }
                });
            return false;
        });



        $("#pwd_eye").click(function () {
            if ($(this).attr('data-click-state') == 1) {
                $(this).attr('data-click-state', 0).removeClass("fa-eye").addClass("fa-eye-slash");
                $("#password").attr('type', 'text');

            } else {
                $(this).attr('data-click-state', 1).removeClass("fa-eye-slash").addClass("fa-eye");
                $("#password").attr('type', 'password');

            }


        });
        $("#frm").validate({
            rules: {
                user_name :{
                  required : true
                },
                email: {
                    required: true
                },
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                }
            },
            messages: {
                user_name : "Enter Alphanumeric only..!",
                email : "Entetr correct email",
                password: " Enter Password(minimum 5 characters)",
                confirm_password: " Enter Confirm Password Same as Password"
            }
        });
        $("#password").keyup(function () {

            var value = $("#password").val();
            var strength = value.length;
            if (strength > 0) {
                $(".process").show();
                $("#bar").addClass("progress-bar-danger").html("poor");
                $("#eye").show();

                if (strength > 2) {
                    $("#bar").removeClass("progress-bar-danger").removeClass("progress-bar-success").addClass("progress-bar-warning").css("width", "30%").html("Weak ");
                }
                if (strength > 4) {
                    $("#bar").css("width", "60%").html("Medium").removeClass("progress-bar-success").addClass("progress-bar-warning");
                }
                if (strength > 6) {
                    $("#bar").removeClass("progress-bar-warning").addClass("progress-bar-success").css("width", "100%").html("Strong ");
                }

            } else {
                $("#bar").removeClass("progress-bar-warning").removeClass("progress-bar-success").addClass("progress-bar-danger").css("width", "10%").html("poor ");
                $("#eye").hide();
                $(".process").hide();
            }

        });
    })
</script>
