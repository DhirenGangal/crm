<!-- BEGIN #page-header -->
<!-- BEGIN search-results -->
<div id="page-header" class="section-container page-header-container bg-white">
    <!-- BEGIN page-header-cover -->
    <div class="page-header-cover">
        <img src="<?=base_url('assets/img/contact-us-cover.jpg')?>" alt="" />
    </div>
    <div class="container">
        <h1 class="page-header"><b>Contact</b> Us</h1>
    </div>
</div>
<div class="section-container bg-silver">

    <!-- BEGIN container -->
    <div class="container">
        <!-- BEGIN breadcrumb -->
        <ul class="breadcrumb m-b-10 f-s-12" style="margin-top: -30px;">
            <li><a href="<?=base_url('home')?>">Home</a></li>
            <li class="active">Contact US</li>
        </ul>
    </div> 
    <!-- END breadcrumb -->
    <div class="container bg-white">
        <!-- BEGIN row -->
        <div class="row row-space-30 search-item-container">
            <!-- BEGIN col-8 -->
            <div class="col-md-8 ">
                <h4 class="page-header">Contact Form</h4>
                <?php echo $this->session->flashdata('alert'); ?>
                <!-- <p class="m-b-30 f-s-13">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur lobortis tortor justo, elementum volutpat ante porta eu. 
                    Sed eget tellus neque. Nam feugiat magna turpis. Vestibulum pharetra nibh et pretium efficitur. Donec porta sollicitudin laoreet. 
                    Sed a condimentum urna. Curabitur placerat ornare venenatis. Cras iaculis venenatis imperdiet.
                </p> -->
                <form class="form-horizontal" name="contact_us_form" action="<?=base_url('home/submit_contact_us')?>" method="POST">
                    <div class="form-group">
                        <label class="control-label col-md-3">Name <span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="text" class="form-control"  name="name" required="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Email <span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="email" class="form-control" name="email" required=""/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Phone No</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="phone_no"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Subject <span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="subject" required=""/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Message <span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <textarea class="form-control" rows="10" name="message" required=""></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3"></label>
                        <div class="col-md-7">
                            <button type="submit" class="btn btn-inverse btn-lg">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END col-8 -->
            <!-- BEGIN col-4 -->
            <div class="col-md-4">
                <h4 class="page-header">Our Contacts</h4>
                <div class="embed-responsive embed-responsive-16by9 m-b-15">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3890.0292679952995!2d77.6834923141996!3d12.84138522119811!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae6cf72db733db%3A0xca5abad5197568a0!2sVSCI-E+Technologies!5e0!3m2!1sen!2sin!4v1515416490598"  allowfullscreen></iframe>
                </div>
                <div>
                    <address>
                        <strong>VSCI-E Technologies</strong><br />
                        Pavani Apt, Beside TCS,<br />
                        Santhipura Road, Ecity-2<br />
                        Bangalore-560100<br />
                        <abbr title="Phone"><b>Phone:</b></abbr> +919620132023<br />
                    </address>
                </div>
                <div><b>Email</b></div>
                <p class="m-b-15">
                    <a href="mailto:info@vscietechnologies.com" class="text-inverse">info@vscietechnologies.com</a><br />
                    
                </p>
                <div class="m-b-5"><b>Social Network</b></div>
                <p class="m-b-15">
                    <a href="#" class="btn btn-icon btn-white btn-circle"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="btn btn-icon btn-white btn-circle"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="btn btn-icon btn-white btn-circle"><i class="fa fa-google-plus"></i></a>
                    <a href="#" class="btn btn-icon btn-white btn-circle"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="btn btn-icon btn-white btn-circle"><i class="fa fa-dribbble"></i></a>
                </p>
            </div>
            <!-- END col-4 -->
        </div>
        <!-- END row -->
        
    </div>
        <!-- END #product -->
        
</div>
<!-- END container -->
