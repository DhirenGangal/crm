        <!-- BEGIN #footer -->
        <div id="footer" class="footer">
            <!-- BEGIN container -->
            <div class="container">
                <!-- BEGIN row -->
                <div class="row">
                    <!-- BEGIN col-3 -->
                    <div class="col-md-3">
                        <h4 class="footer-header">ABOUT US</h4>
                        <p> VSCI-E is product realization company providing end-to-end solutions in the embedded Domain. We offer professional design services which includes hardware and Software Development <a href="<?=base_url('about-us')?>" title="Read more about">Read More...</a></p>
                       
                        
                    </div>
                    <!-- END col-3 -->
                    <!-- BEGIN col-3 -->
                    <div class="col-md-3">
                        <h4 class="footer-header">RELATED LINKS</h4>
                        <ul class="fa-ul">
                            <li><i class="fa fa-li fa-angle-right"></i> <a href="<?=base_url('contact-us')?>">Contact Us</a></li>
                            <li><i class="fa fa-li fa-angle-right"></i> <a href="<?=base_url('about-us')?>">About Us</a></li>
                            <li><i class="fa fa-li fa-angle-right"></i> <a href="<?=base_url('product')?>">Products</a></li>
                            <li><i class="fa fa-li fa-angle-right"></i> <a href="#">Terms of Use</a></li>
                            <li><i class="fa fa-li fa-angle-right"></i> <a href="#">Privacy & Policy</a></li>
                        </ul>
                    </div>
                    <!-- END col-3 -->
                    <!-- BEGIN col-3 -->
                    <div class="col-md-3">
                        <h4 class="footer-header">LATEST PRODUCT</h4>
                        <ul class="list-unstyled list-product">
                            <?php $latest_products = get_latest_products(3);
                            foreach ($latest_products as $key => $value) {?>
                            <li>
                                <a href="<?=base_url("product-discription/".$value['product_id'])?>" target="_blank" title="More about <?=$value['product_name']?>" style="text-decoration: none;">
                                <div class="image" style="text-align: center;">
                                <?php $imag_src = base_url('assets/img/no-image.png');
                                    if (file_exists(base_url('assets/img/'.$value['product_logo']))) {
                                        $imag_src = base_url('assets/img/'.$value['product_logo']);
                                    }?>
                                    <img src="<?=$imag_src?>" alt=""  height="38"/>
                                </div>
                                <div class="info">
                                    <h4 class="info-title"><?=$value['product_name']?></h4>
                                    <div class="price"><i class="fa fa-inr"></i><?=number_format($value['mrp_price'],2)?></div>
                                </div>
                                </a>
                            </li>
                        <?php }?>
                        </ul>
                    </div>
                   
                    <!-- END col-3 -->
                    <!-- BEGIN col-3 -->
                    <div class="col-md-3">
                        <h4 class="footer-header">OUR CONTACT</h4>
                        <address>
                            <strong><?=$this->header_data['title']?></strong><br />
                            Pavani Apt,<br />
                            Beside TCS,<br />
                            Santhipura Road, Ecity-2<br />
                            Bangalore-560100<br />
                            <abbr title="Phone">Phone:</abbr> +919620132023<br />
                            <abbr title="Email">Email:</abbr> <a href="mailto:info@vscietechnologies.com">info@vscietechnologies.com</a><br />
                        </address>
                    </div>
                    <!-- END col-3 -->
                </div>
                <!-- END row -->
            </div>
            <!-- END container -->
        </div>
        <!-- END #footer -->
    
        <!-- BEGIN #footer-copyright -->
        <div id="footer-copyright" class="footer-copyright">
            <!-- BEGIN container -->
            <div class="container">
                <div class="payment-method">
                    <img src="assets/img/payment_method.png" alt="" />
                </div>
                <div class="copyright">
                    Copyright &copy; <?=date('Y')?> VSCI-E Technologies. All rights reserved.
                </div>
            </div>
            <!-- END container -->
        </div>
        <!-- END #footer-copyright -->
    </div>
    <!-- END #page-container -->
    
    <!-- begin theme-panel -->
    <!-- <div class="theme-panel">
        <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
        <div class="theme-panel-content">
            <ul class="theme-list clearfix">
                <li><a href="javascript:;" class="bg-purple" data-theme="purple" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-blue" data-theme="blue" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Blue">&nbsp;</a></li>
                <li class="active"><a href="javascript:;" class="bg-green" data-theme="default" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-orange" data-theme="orange" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-red" data-theme="red" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red">&nbsp;</a></li>
            </ul>
        </div>
    </div> -->
    <!-- end theme-panel -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?=base_url("assets/plugins/jquery/jquery-1.9.1.min.js")?>"></script>
	<script src="<?=base_url("assets/plugins/jquery/jquery-migrate-1.1.0.min.js")?>"></script>
	<script src="<?=base_url("assets/plugins/bootstrap/js/bootstrap.min.js")?>"></script>
	<!--[if lt IE 9]>
		<script src="<?//=base_url("assets/crossbrowserjs/html5shiv.js")?>"></script>
		<script src="<?//=base_url("assets/crossbrowserjs/respond.min.js")?>"></script>
		<script src="<?//=base_url("assets/crossbrowserjs/excanvas.min.js")?>"></script>
	<![endif]-->
	<script src="<?=base_url("assets/plugins/jquery-cookie/jquery.cookie.js")?>"></script>
	<script src="<?=base_url("assets/js/apps.min.js")?>"></script>
	<!-- ================== END BASE JS ================== -->
	
	<script>
	    $(document).ready(function() {
	        App.init();
	    });
	</script>
</body>
</html>
