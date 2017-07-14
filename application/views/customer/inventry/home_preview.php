<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="cart_bdy" style="display:none;" id="location_seacrh_result"></div>
            <div class="cart_bdy" id="location_seacrh">
                <!--Top Category slider Start-->
                <div class="top-cate">
                    <div class="featured-pro container_main">
                        <div class="row">
                            <div class="slider-items-products">
                                <div class="new_title">
                                    <h2>Top Offers </h2>
                                </div>
                                <div id="top-categories" class="product-flexslider hidden-buttons">
                                    <div class="slider-items slider-width-col4 products-grid">
                                        <?php foreach ($topoffers as $tops){ ?>
                                        <div class="item">
                                            <div class="pro-img"><img src="<?php echo base_url('assets/home/images/'.$tops['item_image']); ?>" alt="<?php echo $tops['item_name']; ?>">
                                                <div class="pro-info">
                                                    <?php echo $tops[ 'item_name']; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="text-center">
                                    <button class="btn btn-primary"> See More</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>