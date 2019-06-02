<div class="content-wrapper">
    <div class="container">
        <section class="content-header">
            <h1>Profile</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Profile</li>
            </ol>
        </section>
        <section class="content">
            <?php echo getMessage(); ?>
            <div class="box box-info">
                <div class="box-header with-border"><h3 class="box-title">Edit Profile</h3>
                </div>
                <div class="box-body">
                    <form class="form-horizontal" id="frm" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-10">
                                <input type="hidden" name="member_id"
                                       value="<?php echo !empty($profile['member_id']) ? $profile['member_id'] : ''; ?>"/>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Company Name</label>
                                        <div class="col-md-8">
                                            <input type="text" name="company_name" class="form-control"
                                                   placeholder="Company Name"
                                                   value="<?php echo !empty($profile['company_name']) ? $profile['company_name'] : '' ?>"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">User Name</label>
                                        <div class="col-md-8">
                                            <input type="text" name="user_name" class="form-control"
                                                   placeholder="User Name"
                                                   value="<?php echo !empty($profile['user_name']) ? $profile['user_name'] : '' ?>"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Email <sup
                                                    class="text-danger">*</sup></label>
                                        <div class="col-md-8">
                                            <input type="email" name="email" class="form-control" required
                                                   placeholder="Email"
                                                   value="<?php echo !empty($profile['email']) ? $profile['email'] : '' ?>"/>
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
                                        <label class="control-label col-md-4">Password <sup class="text-danger">*</sup></label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="password" name="password" id="password" class="form-control" required placeholder="Change Password" value="<?php echo !empty($profile['password']) ? $profile['password'] : '' ?>"/>
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
                                        <label class="control-label col-md-4">Confirm Password <sup class="text-danger">*</sup></label>
                                        <div class="col-md-8">
                                            <input type="password" name="confirm_password" class="form-control" required
                                                   placeholder="Confirm Password"
                                                   value="<?php echo !empty($profile['confirm_password']) ? $profile['confirm_password'] : '' ?>"/>
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
                                                   value="<?php echo !empty($profile['first_name']) ? $profile['first_name'] : '' ?>"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Last Name</label>
                                        <div class="col-md-8">
                                            <input type="text" name="last_name" class="form-control"
                                                   placeholder="Last Name"
                                                   value="<?php echo !empty($profile['last_name']) ? $profile['last_name'] : '' ?>"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Phone </label>
                                        <div class="col-md-8">
                                            <input type="text" name="phone_no" class="form-control" placeholder="Phone"
                                                   value="<?php echo !empty($profile['phone_no']) ? $profile['phone_no'] : '' ?>"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Address </label>
                                        <div class="col-md-8">
                                            <input type="text" name="address" class="form-control" placeholder="Address"
                                                   value="<?php echo !empty($profile['address']) ? $profile['address'] : '' ?>"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">City </label>
                                        <div class="col-md-8">
                                            <input type="text" name="city" class="form-control" placeholder="City"
                                                   value="<?php echo !empty($profile['city']) ? $profile['city'] : '' ?>"/>
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
                                                        <option value="<?php echo $k ?>" <?php echo !empty($profile['state']) && ($k == $profile['state']) ? 'selected=selected' : ''; ?>><?php echo $v; ?></option>
                                                        <?php
                                                    }
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Postal Code </label>
                                        <div class="col-md-8">
                                            <input type="text" name="postal_code" class="form-control"
                                                   placeholder="Postal Code"
                                                   value="<?php echo !empty($profile['postal_code']) ? $profile['postal_code'] : '' ?>"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <h4>Profile Picture</h4>
                                <?php
                                $img = (!empty($profile['profile_logo']) && file_exists(FCPATH . "data/profile/" . $profile['profile_logo'])) ? "data/profile/" . $profile['profile_logo'] : '';
                                ?>
                                <img src="<?php echo !empty($img) ? base_url() . $img : dummyLogo() ?>"
                                     alt="Profile Pic" class="profile-pic">
                            </div>
                        </div>

                    </form>
                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <button form="frm" type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    $(document).ready(function () {
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
    });
</script>
