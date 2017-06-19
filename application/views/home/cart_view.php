  <script type="text/javascript">
            // To conform clear all data in cart.
            function clear_cart() {
                var result = confirm('Are you sure want to clear all bookings?');

              
            }
        </script>
 <div class="banner_home ">
      <div class="inner_bnr"><img src="<?php echo base_url(); ?>assets/home/images/product.jpg"></div>
    </div>
  </div>
  <!--header part end here --> 
  <!--body part start here -->
  <div class="cart_bdy">
    <section class="main-container col2-left-layout">
      <div class="container">
      <div class="row">
        <div class="cart_chek">
          <div class="col-md-12">
            <div class="row">
              <div class="pro-coloumn check_ig">
                <div class="table-responsive">
				 <?php
                  // All values of cart store in "$cart". 
                  if ($cart = $this->cart->contents()): ?>
                  <table id="cart" class="table table-hover table-condensed">
                    <thead>
                      <tr>
                        <th style="width:50%">Product</th>
                        <th style="width:10%">Price</th>
                        <th style="width:8%">Quantity</th>
                        <th style="width:22%" class="text-center">Subtotal</th>
                        <th style="width:10%"></th>
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
                      <tr>
					  
                        <td data-th="Product"><div class="row">
                            <div class="col-sm-2 hidden-xs"><img src="<?php echo base_url();?>uploads/products/<?php  echo $item['pro_image']; ?>" alt="..." class="img-responsive"/></div>
                            <div class="col-sm-10">
                              <h4 class="nomargin"><?php echo $item['name']; ?></h4>
                              <p class="pro_des">Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            </div>
                          </div></td>
                        <td data-th="Price"><?php echo number_format($item['price']); ?></td>
                        <td data-th="Quantity"><?php echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: right" '); ?></td>
						 <?php $grand_total = $grand_total + $item['subtotal']; ?>
                        <td data-th="Subtotal" class="text-center">Rs.<?php echo number_format($item['subtotal']) ?></td>
                        <td class="actions" data-th=""><!--<button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>-->
                         <a href="<?php echo base_url();?>home/remove/<?php echo $item['rowid']; ?>" title="Remove item" class="button remove-item"><i class="fa fa-trash-o"></i></a></td>
                      </tr>
                      <?php $i++; ?>
				   <?php endforeach; ?>
				  
                     
                    </tbody>
                    
					
					<tfoot>
                      <tr class="visible-xs">
                        <td class="text-center"><strong>Total 1.99</strong></td>
                      </tr>
                      <tr>
                        <td><a href="#" class="hidden-xs"></a></td>
                        <td colspan="2" class="hidden-xs"></td>
                        <td class="hidden-xs text-center"><strong class="itu ch_ty">Total Rs. <?php
                        echo number_format($grand_total); ?></strong></td>
                        <td><a href="#" class="hidden-xs"></a></td>
                      </tr>
                      <tr>
                        <!--<td><input type="submit" class="btn btn-warning itu" value="Continue Shopping"></td>-->
                         <td><a href="<?php echo base_url(); ?>" class="btn btn-warning check_cnt itu"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>    						
                        <!--<td  colspan="2" class="text-right"><input type="submit" class="btn btn-primary itu" value="Place Order"></td>-->
						<td  colspan="2" class="text-right"><a href="<?php echo base_url(); ?>home/shipping_address" class="btn btn-success btn-block itu" style="width:62%">Place Order <i class="fa fa-angle-right"></i></a></td>

                        <td class="text-right"><input type="submit" name="submit" class="btn btn-info itu" value="Update Cart"></td>
						<?php echo form_close(); ?>
						<?php
                     
                    echo form_open('home/remove/all'); ?>
                        <td class="text-left"><input type="submit" class="btn btn-primary itu" value="Clear Cart" name="submit" onclick="clear_cart()"></td>
						<?php echo form_close(); ?>
                      </tr>
                    </tfoot>
                  </table>
				   <?php endif; ?>
                </div>
              </div>
            </div>
            
            <!--col-right sidebar--> 
          </div>
        </div>
        <!--row--> 
      </div>
      <!--container--> 
    </section>
  </div>