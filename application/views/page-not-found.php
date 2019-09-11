<!-- BEGIN #page-header -->
<!-- BEGIN search-results -->
<style type="text/css">
    .error-code {
        bottom: 60%;
        color: #2d353c;
        font-size: 96px;
        line-height: 100px;
        /*margin:0px auto;*/
        /*width: 300px;*/
    }
    .error-code, .error-content {
      /* position: absolute;
        left: 0;
        right: 0;*/
    }
    .error {
       margin: 0 auto;
        text-align: center;
    }
    .error-message {
        color: #00acac;
        font-size: 24px;
    }
</style>
<div id="page-header" class="section-container page-header-container bg-white">
    <!-- BEGIN page-header-cover -->
    <div class="page-header-cover">
        <img src="<?=base_url('assets/img/header-bg.jpg')?>" alt="" />
    </div>
</div>
<div class="section-container bg-silver">
    <div class="container">
        <div class="error">
            <div class="error-code m-b-10">404 <i class="fa fa-warning"></i></div>
            <div class="error-content">
                <div class="error-message">We couldn't find it...</div>
                <div class="error-desc m-b-20">
                    The page you're looking for doesn't exist. <br>
                    Perhaps, there pages will help find what you're looking for.
                </div>
                <div>
                    <?php 
                    $refer = base_url('home');
                    if ($this->agent->is_referral())
                    {
                        $refer =  $this->agent->referrer();
                    }?>
                    <a href="<?=$refer?>" class="btn btn-success">Go Back to Home Page</a>
                </div>
            </div>
        </div>
    </div>
    <!-- END container -->
</div>
<!-- END search-results -->