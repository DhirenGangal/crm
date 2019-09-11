
        <div id="page-header" class="section-container page-header-container bg-white">
            <!-- BEGIN page-header-cover -->
            <div class="page-header-cover">
                <img src="<?=base_url('assets/img/header-bg.jpg')?>" alt="" />
            </div>
            <!-- END page-header-cover -->
            <!-- BEGIN container -->
            <div class="container">
                <h1 class="page-header"><b><?=get_product_name($main_product_id)?></b> Product</h1>
            </div>
            <!-- END container -->
        </div>
        <!-- BEGIN #page-header -->
        <!-- BEGIN search-results -->
        <div id="search-results" class="section-container bg-silver">
            <!-- BEGIN container -->
            <div class="container">
                <!-- BEGIN breadcrumb -->
                <ul class="breadcrumb m-b-10 f-s-12" style="margin-top: -30px;">
                    <li><a href="<?=base_url('home')?>">Home</a></li>
                    <!-- <li><a href="<?//=base_url('products')?>">Products</a></li> -->
                    <li><a href="<?=base_url('products/'.$main_product_id)?>"><?=get_product_name($main_product_id)?></a></li>
                    <?php $product_name = get_product_name($sub_products_id);?>
                    <li class="active"><?=$product_name?></li>
                </ul>
            </div>
        <!-- END breadcrumb -->
        <div class="container">
                <!-- BEGIN search-container -->
                <div class="search-container">
                    <!-- BEGIN search-content -->
                    <div class="search-content">
                        <!-- BEGIN search-toolbar -->
                        <div class="search-toolbar">
                            <!-- BEGIN row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>We found <?=count($products)?> Items for "<?=$product_name?> Products"</h4>
                                </div>
                                <!-- END col-6 -->
                                <!-- BEGIN col-6 -->
                                <div class="col-md-6 text-right">
                                    <ul class="sort-list">
                                        <li class="text"><i class="fa fa-filter"></i> Sort by:</li>
                                        <li class="active"><a href="#">Popular</a></li>
                                        <li><a href="#">New Arrival</a></li>
                                        <li><a href="#">Discount</a></li>
                                        <li><a href="#">Price</a></li>
                                    </ul>
                                </div>
                                <!-- END col-6 -->
                            </div>
                            <!-- END row -->
                        </div>
                        <!-- END search-toolbar -->
                        <!-- BEGIN search-item-container -->
                        <div class="search-item-container">
                            <!-- BEGIN item-row -->
                            <?php
                                $rows = array_chunk($products, 3);
                                foreach ($rows as $key => $row) {?>
                                <div class="item-row">
                                <?php foreach ($row as $k => $product) {?>
                                    <!-- BEGIN item -->
                                    <div class="item item-thumbnail">
                                        <a href="<?=base_url("product-discription/".$product['product_id'])?>" class="item-image">
                                            <?php 
                                            $imag_src = base_url('assets/img/no-image.png');
                                            if (file_exists(base_url('assets/img/'.$product['product_logo']))) {
                                                $imag_src = base_url('assets/img/'.$product['product_logo']);
                                            }?>
                                            <img src="<?=$imag_src?>" alt="" />
                                            <?php if($product['discount'] > 0) {?>
                                            <div class="discount"><?=$product['discount']?>% OFF</div>
                                            <?php }?>
                                        </a>
                                        <div class="item-info">
                                            <h4 class="item-title">
                                                <a href="product-detail.html"><?=$product['product_name']?></a>
                                            </h4>
                                            <p class="item-desc"><?=$product['description_1']?></p>
                                            <div class="item-price"><i class="fa fa-inr"></i><?=number_format($product['mrp_price'],2)?></div>
                                            <?php if($product['discount'] > 0) {?>
                                            <div class="item-discount-price"><i class="fa fa-inr"></i>
                                                <?php 
                                                $p = $product['mrp_price'] / 100 * $product['discount'];
                                                $p = $p + $product['mrp_price'];
                                                echo number_format($p,2);
                                                ?>
                                            </div>
                                            <?php }?>
                                        </div>
                                    </div>
                                    <!-- END item -->
                                <?php } ?>
                                </div>        
                            <?php } ?>
                        </div>
                        <!-- END search-item-container -->
                        <!-- BEGIN pagination -->

                        <!-- <div class="text-center">
                            <ul class="pagination m-t-0">
                                <li class="disabled"><a href="javascript:;">Previous</a></li>
                                <li class="active"><a href="javascript:;">1</a></li>
                                <li><a href="javascript:;">2</a></li>
                                <li><a href="javascript:;">3</a></li>
                                <li><a href="javascript:;">4</a></li>
                                <li><a href="javascript:;">5</a></li>
                                <li><a href="javascript:;">Next</a></li>
                            </ul>
                        </div> -->
                        <!-- END pagination -->
                    </div>
                    <!-- END search-content -->
                    <!-- BEGIN search-sidebar -->
                    <div class="search-sidebar">
                        <h4 class="title">Filter By</h4>
                        <form action="<?=base_url('products')?>" method="GET" name="filter_form">
                            <div class="form-group">
                                <label class="control-label">Keywords</label>
                                <input type="text" class="form-control input-sm" name="keyword" value="<?=($this->input->get('keyword') ? $this->input->get('keyword') : '')?>" placeholder="Product Name" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Price</label>
                                <div class="row row-space-0">
                                    <div class="col-md-5">
                                        <input type="number" class="form-control input-sm" name="price_from" value="<?=($this->input->get('price_from') ? $this->input->get('price_from') : '')?>" placeholder="Price From" />
                                    </div>
                                    <div class="col-md-2 text-center p-t-5 f-s-12 text-muted">to</div>
                                    <div class="col-md-5">
                                        <input type="number" class="form-control input-sm" name="price_to" value="<?=($this->input->get('price_to') ? $this->input->get('price_to') : '')?>" placeholder="Price To" />
                                    </div>
                                </div>
                            </div>
                            <div class="m-b-30">
                                <button type="submit" class="btn btn-sm btn-inverse"><i class="fa fa-search"></i> Filter</button>
                                <button type="button" id="btn-reset" class="btn btn-sm btn-white pull-right"><i class="fa fa-refresh"></i> Clear</button>
                            </div>
                        </form>
                        <h4 class="title m-b-0">Sub Products</h4>
                        <ul class="search-category-list">
                        <?php foreach ($sub_products as $key => $value) { 
                            $style = $value['product_id'] == $sub_products_id ? 'style="color:#00acac"' : '';
                        ?>
                            <li><a <?=$style?> href="<?=base_url('products/'.$main_product_id.'/'.$value['product_id'])?>"><?=$value['sub_product_name']?> <span class="pull-right">(<?=$value['model_cnt']?>)</span></a></li>
                        <?php }?>
                        </ul>
                    </div>
                    <!-- END search-sidebar -->
                </div>
                <!-- END search-container -->
            </div>
            <!-- END container -->
        </div>
        <!-- END search-results -->
        <script type="text/javascript">
            function reset_form() {
                
            }
        </script>
