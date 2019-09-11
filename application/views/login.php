<!-- BEGIN #page-header -->
<!-- BEGIN search-results -->
<div id="page-header" class="section-container page-header-container bg-white">
    <!-- BEGIN page-header-cover -->
    <div class="page-header-cover">
        <img src="<?=base_url('assets/img/header-bg.jpg')?>" alt="" />
    </div>
</div>
<div class="section-container bg-silver">

    <!-- BEGIN container -->
    <div class="container">
        <!-- BEGIN breadcrumb -->
        <ul class="breadcrumb m-b-10 f-s-12" style="margin-top: -30px;">
            <li><a href="<?=base_url('home')?>">Home</a></li>
            <li class="active">Login</li>
        </ul>
    </div> 
    <!-- END breadcrumb -->
    <div class="container">

        <div class="login-content" style="width: 500px; margin: 0px auto;">
            <div class="panel panel-inverse" data-sortable-id="form-stuff-4">
                <div class="panel-heading">
                    <h4 class="panel-title"> <i class="fa fa-sign-in"></i> Login Here</h4>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="<?=base_url('login/do-login')?>" method="POST" id="sign-in-form">
                        <fieldset>
                            <legend>Login</legend>
                            <?php 
                            echo $this->session->flashdata('alert');
                            $email = ""; $password = ""; 
                            if ( get_cookie('remember_me') != "") 
                            {
                                $user = unserialize(get_cookie('remember_me'));
                                $email = $user['email'];
                                $password = $user['password'];
                            }
                        ?>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Email address</label>
                                <div class="col-md-8">
                                    <input type="email" class="form-control" placeholder="Please Enter Your Email" name="email" value="<?=$email?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Password</label>
                                <div class="col-md-8">
                                    <input type="password" class="form-control" placeholder="Password" name="password" value="<?=$password?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <div class="checkbox">
                                        <label <?=!empty($email) ? 'class="checked"' : ''?> for="logged"><input type="checkbox" name="logged" id="logged" value="1" <?=!empty($email) ? 'checked="checked"' : ''?>>Remember me</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-inverse m-r-5">Login</button>
                                    <button type="submit" class="btn btn-default">Cancel</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END container -->
</div>
<!-- END search-results -->