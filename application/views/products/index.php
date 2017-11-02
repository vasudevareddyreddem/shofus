
    <div class="col-xs-12 col-md-9">
      <div class="category">
      <div class="product1">
        <div class="row" >
          <div class="col-md-12 col-xs-12" >
            <div class="top_product"  >
              <h4 style="margin-top:0;" >Products</h4>
            </div>
          </div>
        </div>
        
        <?php if(isset($latestproducts) && !empty($latestproducts) )
		{?>
        <div class="row mt_min">
                           <?php
						   $count =0;
						    foreach($latestproducts as $latestproduct): ?>   
                      <div class="col-sm-3" style="height:250px;">

                        <div class="col-item thumbitem" >
                        
                        <?php if(is_file('uploads/'.$latestproduct->product_image))
						{?>
                    
                          <div class="photo" style="height:125px;" > <img src="<?php echo base_url(); ?>uploads/<?php echo $latestproduct->product_image; ?>" class="img-responsive" style="height:120px;width:100%;" alt="a" /> </div>
                          <?php }else{ ?>
                           <div class="photo" style="height:125px;" > <img src="<?php echo base_url(); ?>assets/images/no-thumb.jpg" class="img-responsive" style="height:120px;width:100%;" alt="a" /> </div>
                         
                         <?php } ?>
                          <div class="info">
                            <div class="row">
                              <div class="price col-md-12">
                                <h5><?php echo $latestproduct->product_name; ?></h5>
                                <h5 class="price-text-color"> Rs <?php echo $latestproduct->discount_price; ?></h5>
                              </div>
                              <!--<div class="rating hidden-sm col-md-12"> <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star"> </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star"> </i><i class="fa fa-star"></i> </div>--> 
                            </div>
                            <div class="separator clear-left">


                              <p class="btn-add"> 
                              <i class="fa fa-shopping-cart"></i>
                              <a href="<?php echo base_url(); ?>cart/addtocart/<?php echo $latestproduct->card_id; ?>" 
                                class="addtocart">Add to cart</a>
                              </p>

                               

                              <p class="btn-details"> <i class="fa fa-list"></i><a href="#" class="hidden-sm">More info</a></p>
                            </div>

                            <div class="clearfix"> </div>

                          </div>
                        </div>
                          
                      </div>
                  
                <?php
				
				
				$count++;
				 endforeach; ?>  
                    </div>
                    <?php }
					else{ ?>
                    
                    These Products are in Out of stock	
                    <?php } ?>
        
        
   
        
      </div>
      </div>
      
     
      </div>
  </div>
</div>
