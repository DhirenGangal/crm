
<style>
    .form-control{
        padding: 1rem .75rem !important;
        border-radius: 0 !important;
    }
</style>
<div class="clearfix py-3"></div>
<div class="w-100 breadcrumb mt-5">
    <div class="container ">
        <ul class="d-inline-flex">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Contact Us</li>
        </ul>
    </div>
</div>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <?php echo getMessage();  ?>
                <div class="col-md-6">
                    <form method="post">
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Please enter your name" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Please enter your email" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="phone_no" class="form-control" placeholder="Please enter your Contact no" />
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <input type="text" name="subject" class="form-control" placeholder="Please enter subject" />
                            </div>
                        </div>
                        </div>


                        <div class="form-group">
                          <textarea class="form-control" rows="5" name="message" placeholder="Enter Message"></textarea>
                        </div>
                        <div class="form-group pull-right">
                          <button type="submit" class="btn btn-success btn-flat">SUBMIT</button>
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3890.0292679952995!2d77.6834923141996!3d12.84138522119811!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae6cf72db733db%3A0xca5abad5197568a0!2sVSCI-E+Technologies!5e0!3m2!1sen!2sin!4v1515416490598" width="600" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
