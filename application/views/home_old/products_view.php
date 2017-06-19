
  <div class="page-heading">
    <div class="breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <ul>
              <li class="home"> <a href="index.html" title="Go to Home Page">Home</a> <span>&mdash;› </span> </li>
              <li class="category1599"> <a href="#" title="">Salad</a> <span>&mdash;› </span> </li>
              <li class="category1600"> <a href="#" title="">Bread Salad</a> <span>&mdash;› </span> </li>
              <li class="category1601"> <strong>Dakos</strong> </li>
            </ul>
          </div>
          <!--col-xs-12--> 
        </div>
        <!--row--> 
      </div>
      <!--container--> 
    </div>
    <div class="page-title">
      <h2>Cappon Magro</h2>
    </div>
  </div>
  
  <!--container-->
  <section class="main-container col2-left-layout bounceInUp animated"> 
    <!-- For version 1, 2, 3, 8 --> 
    <!-- For version 1, 2, 3 -->
	
	<body onload = "startTimer()">

<div id = "message" style="text-align:center; margin-top:35px;background-color:#FFF;font-weight:bold; font-size:15px; display:block"><span style="color:green;"><?php  echo @$this->session->flashdata('verify_msg');?></span></div>

</body>
	
    <div class="container">
	
      <div class="row">
	 
        <div class="col-main col-sm-9 col-sm-push-3 product-grid">
          <div class="pro-coloumn">
		  
            <article class="col-main">
			
              <!--<div class="toolbar">
                <div class="pager">
                 <!-- <div id="limiter">
                    <label>View: </label>
                    <ul>
                      <li><a href="#">15<span class="right-arrow"></span></a>
                        <ul>
                          <li><a href="#">20</a></li>
                          <li><a href="#">30</a></li>
                          <li><a href="#">35</a></li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                  <div class="pages">
                    <label>Page:</label>
                    <ul class="pagination">
                     
                    </ul>
                  </div>
                </div>
              </div>-->
              <div class="category-products">
                <ul class="products-grid">
				 <?php foreach($productdata as $product_data){?>
                  <li class="item col-lg-4 col-md-3 col-sm-4 col-xs-6">
                    <div class="item-inner">
                      <div class="item-img">
                        <div class="item-img-info"><a href="#" class="product-image"><img src="<?php echo base_url();?>uploads/products/<?php  echo $product_data->item_image; ?>" style="width:267x;height:200px;" alt=""></a>
                          <div class="item-box-hover">
                            <div class="box-inner">
                              <div class="product-detail-bnt"><a class="button detail-bnt" type="button"><span>Quick View</span></a></div>
                              <div class="actions"><span class="add-to-links"><a href="#" class="link-wishlist" ><span>Add to Wishlist</span></a> </span> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"><a href="#"><?php echo $product_data->item_name;  ?></a> </div>
                          <div class="item-content">
                            <div class="rating">
                              <div class="ratings">
                                <div class="rating-box">
                                  <div class="rating" style="width:80%"></div>
                                </div>
                                <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                              </div>
                            </div>
                            <div class="item-price">
                              <div class="price-box"><span class="regular-price" id="product-price-1"><span class="price">RS <?php echo $product_data->item_cost;  ?> </span> </span> </div>
                            </div>
							
		             <?php
                        
                        // Create form and send values in 'shopping/add' function.
                        echo form_open('home/add/'.$this->uri->segment(3).'/'.$this->uri->segment(4));
                        echo form_hidden('id', $product_data->item_id);
                        echo form_hidden('name', $product_data->item_name);
                        echo form_hidden('price', $product_data->item_cost);
						echo form_hidden('pro_image', $product_data->item_image);
						echo form_hidden('item_quantity', $product_data->item_quantity);
                        ?>
							
                            <div class="add_cart">
                              <button class="button btn-cart" type="submit" name="submit" id="cart_submit"><span>Add to Cart</span></button>
							  <?php
                        //$btn = array(
                            //'class' => 'button btn-cart',
                            //'value' => 'Add to Cart',
                            //'name' => 'action'
                        //);
                        
                        // Submit Button.
                        //echo form_submit($btn);
                        echo form_close();
                        ?>
							
                            </div>
							</form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
				 <?php } ?>
                  <!--<li class="item col-lg-4 col-md-3 col-sm-4 col-xs-6">
                    <div class="item-inner">
                      <div class="item-img">
                        <div class="item-img-info"><a href="#" class="product-image"><img src="<?php echo base_url(); ?>assets/home/images/p2.jpg" alt=""></a>
                          <div class="item-box-hover">
                            <div class="box-inner">
                              <div class="product-detail-bnt"><a class="button detail-bnt" type="button"><span>Quick View</span></a></div>
                              <div class="actions"><span class="add-to-links"><a href="#" class="link-wishlist" ><span>Add to Wishlist</span></a> </span> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"><a href="#">Retis lapen casen</a> </div>
                          <div class="item-content">
                            <div class="rating">
                              <div class="ratings">
                                <div class="rating-box">
                                  <div class="rating" style="width:80%"></div>
                                </div>
                                <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                              </div>
                            </div>
                            <div class="item-price">
                              <div class="price-box"><span class="regular-price" id="product-price-1"><span class="price">$125.00</span> </span> </div>
                            </div>
                            <div class="add_cart">
                              <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>-->
                  <!--<li class="item col-lg-4 col-md-3 col-sm-4 col-xs-6">
                    <div class="item-inner">
                      <div class="item-img">
                        <div class="item-img-info"><a href="#" class="product-image"><img src="<?php echo base_url(); ?>assets/home/images/p3.jpg" alt=""></a>
                          <div class="item-box-hover">
                            <div class="box-inner">
                              <div class="product-detail-bnt"><a class="button detail-bnt" type="button"><span>Quick View</span></a></div>
                              <div class="actions"><span class="add-to-links"><a href="#" class="link-wishlist" ><span>Add to Wishlist</span></a> </span> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"><a href="#">Retis lapen casen</a> </div>
                          <div class="item-content">
                            <div class="rating">
                              <div class="ratings">
                                <div class="rating-box">
                                  <div class="rating" style="width:80%"></div>
                                </div>
                                <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                              </div>
                            </div>
                            <div class="item-price">
                              <div class="price-box"><span class="regular-price" id="product-price-1"><span class="price">$125.00</span> </span> </div>
                            </div>
                            <div class="add_cart">
                              <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>-->
                 
                 
                 
                </ul>
				
              </div>
			  <center><?= $this->pagination->create_links(); ?></center>
            </article>
          </div>
          <!--	///*///======    End article  ========= //*/// --> 
        </div>
        <aside class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9 wow bounceInUp animated animated" style="visibility: visible;"> 
          <!-- BEGIN SIDE-NAV-CATEGORY -->
          <div class="side-nav-categories">
            <div class="block-title"> Categories </div>
            <!--block-title--> 
            <!-- BEGIN BOX-CATEGORY -->
            <div class="box-content box-category">
              <ul>
                <li> <a class="active" href="#"><?php echo $catdat;?></a> <span class="subDropdown minus"></span>
				<?php  foreach($subcatdata as $subcat_data)   {?>
                  <ul class="level0_415" style="display: block;">
                    <li> <a href="<?php echo base_url(); ?>home/productsview/<?php echo $catdat; ?>/<?php echo $subcat_data->subcategory_name;  ?>"> <?php echo $subcat_data->subcategory_name;?> </a> 
                     
                      <!--level1--> 
                    </li>
                    <!--level1-->
                   
                  </ul>
                  <!--level0--> 
				  <?php } ?>
                </li>
                <!--level 0-->
                
             
                <!--level 0-->
                
              </ul>
            </div>
            <!--box-content box-category--> 
          </div>
          <!--side-nav-categories--> 
          
        </aside>
        <!--col-right sidebar--> 
      </div>
      <!--row--> 
    </div>
    <!--container--> 
  </section>
  <div class="our-features-box wow bounceInUp animated animated animated" style="visibility: visible;">
    <div class="container">
      <ul>
        <li>
          <div class="feature-box free-shipping">
            <div class="icon-truck"></div>
            <div class="content">FREE SHIPPING on order over $99</div>
          </div>
        </li>
        <li>
          <div class="feature-box need-help">
            <div class="icon-support"></div>
            <div class="content">Need Help +1 800 123 1234</div>
          </div>
        </li>
        <li>
          <div class="feature-box money-back">
            <div class="icon-money"></div>
            <div class="content">Money Back Guarantee</div>
          </div>
        </li>
        <li class="last">
          <div class="feature-box return-policy">
            <div class="icon-return"></div>
            <div class="content">30 days return Service</div>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <!-- For version 1,2,3,4,6 -->
 
  
<script type = "text/javascript">

function hideMessage() {
document.getElementById("message").style.display="none"; 
}

function startTimer() {
var tim = window.setTimeout("hideMessage()", 3000);  // 5000 milliseconds = 5 seconds
}

</script>