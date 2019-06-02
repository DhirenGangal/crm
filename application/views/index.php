
<section class="slider">
    <div id="page">
        <div id="content">
            <div class="skitter-large-box">
                <div class="skitter skitter-large with-dots">
                    <ul>
                        <?php
                        if(!empty($banners)){
                            foreach ($banners as $banner){
                                ?>
                                <li>
                                    <a href="#cubeRandom">
                                        <?php
                                        $img = !empty($banner['banner_img']) && file_exists(FCPATH.'data/banners/')? 'data/banners/'.$banner['banner_img'] : '';
                                        ?>
                                        <img src="<?php echo !empty($img) ? base_url().$img : dummyLogo() ?>"  alt="banner img" class="circlesInside">


                                    </a>
                                    <div class="label_text">
                                        <p><?php echo !empty($banner['banner_desc']) ? $banner['banner_desc'] : ''; ?> <a href="#" class="btn btn-small btn-yellow">See more</a></p>

                                    </div>
                                </li>
                        <?php
                            }
                        }else{
                            echo '<h1 class="text-center">No Banner Image Found</h1>';
                        }
                        ?>


                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="home-2">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="<?php echo base_url() ?>data/images/products/block1.jpg" class="img-fluid">
            </div>
            <div class="col-md-4">
                <img src="<?php echo base_url() ?>data/images/products/block2.jpg" class="img-fluid">
            </div>
            <div class="col-md-4">
                <img src="<?php echo base_url() ?>data/images/products/block3.jpg" class="img-fluid">
            </div>
        </div>
    </div>
</section>
<section class="home-3">
    <div class="container">
        <div class="section-heading">
            <h2 class="section-title">Special Products</h2>
        </div>
        <div class="row">
            <div class="col-md-6 p-0">
                <a href="#">
                    <img src="<?php echo base_url() ?>data/images/products/left-banner.jpg" class="img-fluid">
                </a>
            </div>
            <div class="col-md-6 p-0">
                <div class="d-inline-flex">
                    <div class="col-md-6 p-custom">
                        <a href="#">
                            <img src="<?php echo base_url() ?>data/images/products/right-banner-1.jpg" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-md-6 p-custom">
                        <a href="#">
                            <img src="<?php echo base_url() ?>data/images/products/right-banner-2.jpg" class="img-fluid">
                        </a>
                    </div>
                </div>
                <div class="w-100">
                    <a href="#">
                        <img src="<?php echo base_url() ?>data/images/products/right-banner-3.jpg" class="img-fluid">
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>
<section class="testi ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="carouselExampleIndicators" class="carousel slide text-center" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <h2>Hello hotness!</h2>
                            <h1>Summer collection</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam
                                lacus. Fusce condimentum. </p>
                            <a class="shop-now" href="#">View More</a>
                        </div>
                        <div class="carousel-item">
                            <h2>Hello hotness!</h2>
                            <h1>Summer collection</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam
                                lacus. Fusce condimentum. </p>
                            <a class="shop-now" href="#">View More</a>

                        </div>
                        <div class="carousel-item">
                            <h2>Hello hotness!</h2>
                            <h1>Summer collection</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam
                                lacus. Fusce condimentum. </p>
                            <a class="shop-now" href="#">View More</a>

                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

        </div>
    </div>

</section>
<section class="products">
    <div class="container">
        <div class="section-heading">
            <h2 class="section-title">TRENDING PRODUCTS</h2>
        </div>
        <div class="row ">
            <?php
            if(!empty($products)){
                foreach ($products as $product){
                    ?>
            <div class="owl-carousel owl-theme">
               <?php
                        if(!empty($product['sub_products'])){
                            foreach ($product['sub_products'] as $sub_product){
                                if(!empty($sub_product['child_products'])){
                                    foreach ($sub_product['child_products'] as $child_product){
                                        ?>
                                        <div class="item">
                                            <?php
                                            $img = !empty($child_product['product_logo']) && file_exists(FCPATH.'data/child-sub-products/')? 'data/child-sub-products/'.$child_product['product_logo'] : '';
                                            ?>
                                            <img src="<?php echo !empty($img) ? base_url().$img : dummyLogo() ?>" class="product-img">
                                            <div class="producttitle"><?php echo !empty($child_product['main_product_name']) ? $child_product['main_product_name'] : '' ?></div>
                                            <div class="productprice">
                                                <div class="pull-right"><a href="#" class="button  btn-cart" role="button"></a></div>
                                                <div class="pricetext"><i class="fa fa-inr"></i> <?php echo !empty($child_product['mrp_price']) ? $child_product['mrp_price'] : ''; ?></div>
                                            </div>
                                        </div>

                <?php
                                    }

                                }
                            }
                        }
                    }
                }else{
                    echo '<h1 class="text-danger text-center"> No Product Found</h1>';
                }

                ?>
            </div>
        </div>
    </div>
</section>
<section class="blog pb-5">
    <div class="container">
        <div class="section-heading">
            <h2 class="section-title">LATEST BLOG</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card rounded-0 bg-white blog-post border-0">
                    <div class="card-img">
                        <img src="<?php echo base_url() ?>data/images/blog/blog-img1.jpg" class="img-fluid" alt="">
                        <div class="card-body">
                            <h4 class="font-weight-normal">Standard blog post with photo</h4>
                            <p class="py-3">Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis
                                dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips.</p>
                            <a class="btn-read" href="">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card rounded-0 bg-white blog-post border-0">
                    <div class="card-img">
                        <img src="<?php echo base_url() ?>data/images/blog/blog-img2.jpg" class="img-fluid" alt="">
                        <div class="card-body">
                            <h4 class="font-weight-normal">Standard blog post with photo</h4>
                            <p class="py-3">Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis
                                dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips.</p>
                            <a class="btn-read" href="">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="cards">

</section>
