<!-- BEGIN #page-header -->
<!-- BEGIN search-results -->
<div class="section-container bg-silver">
    <!-- BEGIN container -->
    <div class="container">
        <!-- BEGIN breadcrumb -->
        <ul class="breadcrumb m-b-10 f-s-12" style="margin-top: -30px;">
            <li><a href="<?=base_url('home')?>">Home</a></li>
            <li class="active">Regiter</li>
        </ul>
    </div>
    <!-- END breadcrumb -->
    <div class="container">
        <div class="login-content" style="width: 600px; margin: 0px auto;">
            <div class="panel panel-inverse" data-sortable-id="form-stuff-4">
                <div class="panel-heading">
                    <h4 class="panel-title"> <i class="fa fa-sign-in"></i> Create new account</h4>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="<?=base_url('login/do-login')?>" method="POST" id="sign-in-form">
                        <fieldset>
                            <legend>Register</legend>
                            <?php echo $this->session->flashdata('alert'); ?>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Email address</label>
                                <div class="col-md-8">
                                    <input type="email" class="form-control" placeholder="Please Enter Your Email" name="email" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Password</label>
                                <div class="col-md-8">
                                    <input type="password" class="form-control" placeholder="Password" name="password" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-inverse m-r-5">Create my Account</button>
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