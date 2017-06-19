<div class="banner_home ">
      <div class="inner_bnr"><img src="<?php echo base_url(); ?>assets/home/images/product.jpg"></div>
    </div>
  </div>
  <!--header part end here --> 
  <!--body part start here -->
  <div class="cart_bdy">
    <section class="main-container col2-left-layout">
	
	<body onload = "startTimer()">

<div id = "message" style="text-align:center; margin-top:35px;background-color:#FFF;font-weight:bold; font-size:15px; display:block"><span style="color:green;"><?php  echo @$this->session->flashdata('verify_msg');?></span></div>

</body>

      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-9 col-left cart_sidebar">
            <div class="pro-coloumn">
              <article class="col-main">
                <!--<div class="toolbar">
                  <div class="pager">
                    <div id="limiter">
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
                        <li><a href="#">«</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">»</a></li>
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
                          <div class="item-img-info"><a href="<?php echo base_url();  ?>home/single_product/<?php  echo $product_data->item_id; ?>" class="product-image"><img src="<?php echo base_url();?>uploads/products/<?php  echo $product_data->item_image; ?>" style="width:306px;height:306px;" alt=""></a> </div>
                        </div>
                        <div class="item-info">
                          <div class="info-inner">
                            <div class="item-title"><a href="#"><?php echo $product_data->item_name;  ?></a> </div>
                            <div class="item-content">
                              <div class="item-price">
                                <div class="price-box"><span class="regular-price" id="product-price-1"><span class="price">RS <?php echo $product_data->item_cost;  ?></span> </span> </div>
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
                  </ul>
                </div>
				<center><?= $this->pagination->create_links(); ?></center>
              </article>
            </div>
            <!--	///*///======    End article  ========= //*/// --> 
          </div>
          <aside class="col-sm-3 col-xs-12 cart_product-grid col-main " > 
            <!-- BEGIN SIDE-NAV-CATEGORY -->
            <div class="side-nav-categories">
              <div class="block-title"> Filters </div>
              <!--block-title--> 
              <!-- BEGIN BOX-CATEGORY -->
              <div class="box-content box-category">
              
                <!--<ul>
                  <li> <a class="active" href="#">Food</a> <span class="subDropdown minus"></span>
                    <ul class="level0_415" style="display: block;">
                      <li> <a href="#"> Bread Salads </a> <span class="subDropdown plus"></span>
                        <ul class="level1" style="display: none;">
                          <li> <a href="#"><span>Cappon Magro</span></a> </li>
                          <li> <a href="#"><span>Dakos</span></a> </li>
                        </ul>
                       
                      </li>
                   
                      <li> <a href="#"> Fruit Salads&lrm; </a> <span class="subDropdown plus"></span>
                        <ul class="level1" style="display: none;">
                          <li> <a href="#"><span>Candle Salad</span></a> </li>
                          <li> <a href="#"><span>Frogeye Salad</span></a> </li>
                        </ul>
                       
                      </li>
                    </ul>
                   
                  </li>
                  
                </ul>-->   
                <ul class="lisrs">
                <li>Brands</li>
                                <li>Brands</li>
                                                <li>Brands</li>
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
  </div>
  <!--shipping blocks start here -->
  
  <script type = "text/javascript">

function hideMessage() {
document.getElementById("message").style.display="none"; 
}

function startTimer() {
var tim = window.setTimeout("hideMessage()", 3000);  // 5000 milliseconds = 5 seconds
}

</script>