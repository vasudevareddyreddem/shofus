 <script type="text/javascript">
            // To conform clear all data in cart.
            function clear_cart() {
                var result = confirm('Are you sure want to clear all bookings?');

              
            }
        </script>
 <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="page-title">
            <h2>Shopping Cart</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="text"> 
            <?php  $cart_check = $this->cart->contents();
            
            // If cart is empty, this will show below message.
             if(empty($cart_check)) {
             echo 'To add products to your shopping cart click on "Add to Cart" Button'; 
             }  ?> </div>
  <!--container-->
  <div class="main-container col1-layout wow bounceInUp animated animated" style="visibility: visible;">
    <div class="main">
      <div class="cart wow bounceInUp animated animated" style="visibility: visible;">
        <div class="table-responsive shopping-cart-tbl  container">
          
            <input name="form_key" value="EPYwQxF6xoWcjLUr" type="hidden">
			
            <fieldset>
              <table id="shopping-cart-table" class="data-table cart-table table-striped">
                <colgroup>
                <col width="1">
                <col>
                <col width="1">
                <col width="1">
                <col width="1">
                <col width="1">
                <col width="1">
                </colgroup>
				<?php
                  // All values of cart store in "$cart". 
                  if ($cart = $this->cart->contents()): ?>
                <thead>
                  <tr class="first last">
                    <th rowspan="1">&nbsp;</th>
                    <th rowspan="1"><span class="nobr">Product Name</span></th>
                    <th rowspan="1"></th>
                    <th class="a-center" colspan="1"><span class="nobr">Unit Price</span></th>
                    <th rowspan="1" class="a-center">Qty</th>
                    <th class="a-center" colspan="1">Subtotal</th>
                    <th rowspan="1" class="a-center">&nbsp;</th>
                  </tr>
                </thead>
                
				
                <tbody>
				
<?php
                     // Create form and send all values in "shopping/update_cart" function.
                    echo form_open('home/update_cart');
                    $grand_total = 0;
                    $i = 1;

                    foreach ($cart as $item):
                        //   echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                        //  Will produce the following output.
                        // <input type="hidden" name="cart[1][id]" value="1" />
                        
                        echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                        echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                        echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                        echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
						echo form_hidden('cart[' . $item['id'] . '][pro_image]', $item['pro_image']);
                        echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
						echo form_hidden('cart[' . $item['id'] . '][item_quantity]', $item['item_quantity']);
                        ?>				
				
				
                  <tr class="first last odd">
                    <td class="image hidden-table"><a href="#" class="product-image"><img src="<?php echo base_url();?>uploads/products/<?php  echo $item['pro_image']; ?>" width="75"></a></td>
                    <td><h2 class="product-name"> <a href="#"><?php echo $item['name']; ?></a> </h2></td>
                    <td class="a-center hidden-table"><a href="#" class="edit-bnt"></a></td>
                    <td class="a-right hidden-table"><span class="cart-price"> <span class="price">RS <?php echo number_format($item['price']); ?></span> </span></td>
                    <td class="a-center movewishlist "><?php echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: right" '); ?>
					                         </td>
                    <?php $grand_total = $grand_total + $item['subtotal']; ?>
					<td class="a-right movewishlist"><span class="cart-price"> <span class="price">RS <?php echo number_format($item['subtotal']) ?></span> </span></td>
                    <td class="a-center last"><a href="<?php echo base_url();?>home/remove/<?php echo $item['rowid']; ?>" title="Remove item" class="button remove-item"><span><span>Remove item</span></span></a></td>
                  </tr>
				  <?php $i++; ?>
				   <?php endforeach; ?>
				  
                  <!--<tr class="odd">
                    <td class="image hidden-table"><a href="#" class="product-image"><img src="<?php //echo base_url(); ?>assets/home/images/p9.jpg" width="75"></a></td>
                    <td><h2 class="product-name"> <a href="#">Women's Georgette Animal Print</a> </h2></td>
                    <td class="a-center hidden-table"><a href="#" class="edit-bnt"></a></td>
                    <td class="a-right hidden-table"><span class="cart-price"> <span class="price">$129.00</span> </span></td>
                    <td class="a-center movewishlist"><input name="cart[26340][qty]" value="1" size="4" title="Qty" class="input-text qty" maxlength="12"></td>
                    <td class="a-right movewishlist"><span class="cart-price"> <span class="price">$129.00</span> </span></td>
                    <td class="a-center last"><a href="#" title="Remove item" class="button remove-item"><span><span>Remove item</span></span></a></td>
                  </tr>
                  <tr class="odd">
                    <td class="image hidden-table"><a href="#" class="product-image"><img src="<?php //echo base_url(); ?>assets/home/images/p1.jpg" width="75"></a></td>
                    <td><h2 class="product-name"> <a href="#">Women's Georgette Animal Print</a> </h2></td>
                    <td class="a-center hidden-table"><a href="#" class="edit-bnt"></a></td>
                    <td class="a-right hidden-table"><span class="cart-price"> <span class="price">$129.00</span> </span></td>
                    <td class="a-center movewishlist"><input name="cart[26340][qty]" value="1" size="4" title="Qty" class="input-text qty" maxlength="12"></td>
                    <td class="a-right movewishlist"><span class="cart-price"> <span class="price">$129.00</span> </span></td>
                    <td class="a-center last"><a href="#" title="Remove item" class="button remove-item"><span><span>Remove item</span></span></a></td>
                  </tr>
                  <tr class="last">
                    <td class="image hidden-table"><a href="#" class="product-image"><img src="<?php //echo base_url(); ?>assets/home/images/p4.jpg" width="75"></a></td>
                    <td><h2 class="product-name"> <a href="#">Women's Georgette Animal Print</a> </h2></td>
                    <td class="a-center hidden-table"><a href="#" class="edit-bnt"></a></td>
                    <td class="a-right hidden-table"><span class="cart-price"> <span class="price">$129.00</span> </span></td>
                    <td class="a-center movewishlist"><input name="cart[26340][qty]" value="1" size="4" title="Qty" class="input-text qty" maxlength="12"></td>
                    <td class="a-right movewishlist"><span class="cart-price"> <span class="price">$129.00</span> </span></td>
                    <td class="a-center last"><a href="#" title="Remove item" class="button remove-item"><span><span>Remove item</span></span></a></td>
                  </tr>-->
                </tbody>
				<tfoot>
				 <tr class="first last">
                    <td colspan="50" class="a-right last">
                      <h5><b>Order Total:  RS <?php 
                        
                        //Grand Total.
                        echo number_format($grand_total); ?></b></h5>
                      
                     
                  
					  </td>
                  
				  </tr>
				
                  <tr class="first last">
                    <td colspan="50" class="a-right last">
					<button type="submit" title="Continue Shopping" class="button btn-continue" onclick="window.location='<?php echo base_url(); ?>home';return false;"><span><span>Continue Shopping</span></span></button>
					
					
					
					<center><div class="buttons-set11">
                    <button type="button" name="submit" class="button get-quote"><span><a href="<?php echo base_url(); ?>home/shipping_address">Place Order</a></span></button>
                  </div></center>
					
					
					 
                      <button type="submit" name="submit" value="update_qty" title="Update Cart" class="button btn-update"><span><span>Update Cart</span></span></button>
                      <?php echo form_close(); ?>
                      
                      
					  <?php
                     
                    echo form_open('home/remove/all'); ?>
					  <button type="submit" name="update_cart_action" value="empty_cart" title="Clear Cart" class="button btn-empty" id="empty_cart_button" onclick="clear_cart()"><span><span>Clear Cart</span></span></buttone Order></td>
                  <?php echo form_close(); ?>
				  </tr>
                </tfoot>
				
              </table>
			  <?php endif; ?>
            </fieldset>
         
        </div>
        
        <!-- BEGIN CART COLLATERALS --> 
        
        <!--cart-collaterals--> 
        
      </div>
      <!--cart--> 
      
    </div>
    <!--main-container--> 
    
  </div>
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
  <script>
 <?php  for($x=1; $x<=4; $x++){ ?> 
var input= document.getElementById('theInput'+<?php echo $x; ?>);

document.getElementById('plus'+<?php echo $x; ?>).onclick = function(){
    input.value = parseInt(input.value, 10) +1
}
document.getElementById('minus'+<?php echo $x; ?>).onclick = function(){
    input.value = parseInt(input.value, 10) -1
}
<?php }?>
</script>



  