<!--body start here --> 
<!--  banner section  start here-->
<!-- / banner section  end here -->
<?php //echo "<pre>";print_r($checkoutproducts) ;exit;?>
<div class="checkout">
  <div class="container">
    <div class="mmp">
      <div class="col-md-9 product-price1">
        <div class="check-out">
          <div class=" cart-items">
            <h3>My Shopping Bag (<span id="countofcart" ></span> )</h3>
          
            
            <div class="in-check">
              <ul class="unit">
                <li><span>Item</span></li>
                <li><span>Product Name</span></li>
                <li><span>Quantity</span></li>
                <li><span>Unit Price</span></li>
                
                <div class="clearfix"> </div>
              </ul>
              <div class="cart_mmt" style="overflow:auto;overflow-x:none;">
                       <?php if(isset($checkoutproducts) && count($checkoutproducts)!='' && count($checkoutproducts)!=0 ){
								for($i=0;$i<count($checkoutproducts);$i++)
								{?>        
                                     
                <ul class="cart-header" id="product-remove<?php echo $checkoutproducts[$i]['product_id'] ; ?>" >
                  <div class="close1"> </div>
                  <li class="ring-in"><a href="javascript:void();"><img  class="img-responsive" src="<?php echo base_url(); ?>uploads/<?php echo $checkoutproducts[$i]['picture']; ?>" alt="No Image" width="100" height="80"></a> </li>
                  <li><span><?php echo isset($checkoutproducts[$i]['product_name']) && $checkoutproducts[$i]['product_name']!=''?ucfirst($checkoutproducts[$i]['product_name']):'' ; ?></span></li>
                  <li>
                    <div class="aa-cartbox-number prt_qu">
                      <div class="btn-counter mg_t">
                        <button class="" onclick="reduceqty('<?php echo $checkoutproducts[$i]['product_id'] ; ?>')"  >−</button>
                        <input class="text-change-qty-search-popup qa_in" onkeyup="changequantity('<?php echo $checkoutproducts[$i]['product_id'] ; ?>')" prod="<?php echo isset($checkoutproducts[$i]['row_id']) && $checkoutproducts[$i]['row_id']!=''?$checkoutproducts[$i]['row_id']:'' ; ?>" value="<?php echo isset($checkoutproducts[$i]['quantity']) && $checkoutproducts[$i]['quantity']!=''?$checkoutproducts[$i]['quantity']:'' ; ?>"  id="p_id<?php echo $checkoutproducts[$i]['product_id'] ; ?>"  type="text">
                        <button class="icon icon-increase-qty-search-popup" onclick="increaseqty('<?php echo $checkoutproducts[$i]['product_id'] ; ?>')"  >+</button>
                      </div>
                    </div>
                  </li>
                  <li><span class="amount"><?php echo isset($checkoutproducts[$i]['product_price']) && $checkoutproducts[$i]['product_price']!=''?'Rs.'.$checkoutproducts[$i]['product_price']:'' ; ?></span> </li>
                  
                  <!--<li><span>In Stock</span></li>-->
                  <li class="product-remove" >   <span  proddiv="<?php echo $checkoutproducts[$i]['row_id'] ; ?>" class="btn-xs" style="cursor:pointer" id="cartatdelete<?php echo $checkoutproducts[$i]['product_id'] ; ?>" onclick="Deleteitemofcartat('<?php echo $checkoutproducts[$i]['product_id'] ; ?>')" ><i class="fa fa-trash"></i></span></li>
                  <div class="clearfix"> </div>
                </ul>
                 <?php } } ?>
                <!---728x90--->
                
                <!---728x90---> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 cart-total"> 
      <!--<a class="continue" href="#">Continue to basket</a>-->
     <div class="price-details">
        <h3>Price Details</h3>
        <span>Total</span> <span class="total" id="total_price_at"><?php echo isset($allcheckoutproducts['totalprice']) &&$allcheckoutproducts['totalprice']!=''?$allcheckoutproducts['totalprice']:'' ; ?></span>    
        <div class="clearfix"></div>
      </div>
      <h4 class="last-price">TOTAL</h4>
      <span class="total final"><strong><span class="amount" id="grosspriceofcart"><?php echo isset($allcheckoutproducts['totalprice']) &&$allcheckoutproducts['totalprice']!=''?$allcheckoutproducts['totalprice']:'' ; ?></span></strong></span>
      <div class="clearfix"></div>
        
        
        <div class="total-item">
        <form id="orderform"  method="post"  action="<?php echo base_url(); ?>orders/insert">
      <ul >
        <li>
          <label for="mrova-name">Your Name *</label>
          <input type="text" name="name" class="required" id="name" value="" required="required">
        </li>
        
        <li>
          <label for="mrova-email">Mobile *</label>
          <input type="text" pattern="[789][0-9]{9}" name="mobile" class="required" id="mobile" value="" required="required">
        </li>
        <li>
          <label for="mrova-message">Address *</label>
          <textarea class="required" id="txtmsg" name="shippingaddress"  rows="1" cols="30" required="required"></textarea>
        </li>
        <li>
          <label for="mrova-name">Shipping Area  *</label>
          <input type="text" name="shipping_area" class="required" id="shipping_area" value="" required="required">
        </li>
        <li>
          <label for="mrova-name">Shipping PIN  *</label>
          <input type="text" name="shipping_PIN" pattern="[0-9]{6}" title="Please Enter Correct Pin Code" class="required" id="shipping_PIN" value="" required="required">
        </li>
      </ul>
      
      <button class="order" name="submit" type="submit" >Place Order</button>
    </form>
        </div>
             
     
      <!--<div class="total-item">
        <h3>Options</h3>
        <h4>Coupons</h4>
        <a class="cpns" href="#">Apply Coupons</a>
        <p><a href="#">Log In</a> to use accounts - linked coupons</p>
      </div>-->
    </div>
  </div>
</div>

<!--body end --> 

<!--footer start here -->

<!--footer end here --> 

<!-- Login Modal --> 

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script>
function reduceqty(id)
{

	 var qty =document.getElementById("p_id"+id).value;
	 if(isNaN(qty) || qty <= 0 || qty=='' || qty <=1 )
	 {
		document.getElementById("p_id"+id).value = 1;
	 }
	 else{
	  minusquantity =  document.getElementById("p_id"+id).value = parseInt(qty)-parseInt(1);
	  row_id =document.getElementById("p_id"+id).getAttribute("prod");
	  //alert(row_id)
	  update_url = base_url+"cart/updateQuantity/"+row_id+"/"+minusquantity+"/1";
			$.ajax({
			url : update_url,
			success : function(data)
			{
			alert(data);
			try
			{
			var response = JSON.parse(data);
			}
			catch(e)
			{
			window.location.href = window.location.href;
			}
			if(response.status=='success')
			{ 
			if(response.productData.length>=1)
			{
			
			document.getElementById("grosspriceofcart").innerHTML = response.grossprice ;
			document.getElementById("total_price_at").innerHTML = response.grossprice ;
			totalcartcount();
			}
			}
			}
			});
	  
	  
	 }
				
		

	
		
}
function increaseqty(id)
{
	var qty = document.getElementById("p_id"+id).value;
	 if(isNaN(qty) || qty <= 0 || qty=='' )
	 {
		document.getElementById("p_id"+id).value = 1;
	 }
	 else{

	  var plusquantity  =  document.getElementById("p_id"+id).value = parseInt(qty)+parseInt(1);
	  row_id =document.getElementById("p_id"+id).getAttribute("prod");
	  var update_url = base_url+"cart/updateQuantity/"+row_id+"/"+plusquantity+"/1";
		$.ajax({
		url : update_url,
		success : function(data)
		{
			alert(data);
		try
		{
		var response = JSON.parse(data);
		}
		catch(e)
		{
		window.location.href = window.location.href;
		}
		if(response.status=='success')
		{ 
		if(response.productData.length>=1)
		{
		document.getElementById("grosspriceofcart").innerHTML = response.grossprice ;
		document.getElementById("total_price_at").innerHTML = response.grossprice ;
		totalcartcount();	
		}
		}
		}
		});
	  
	  
	 }
		

	
	
}



function changequantity(id)
{
	 	var qty = document.getElementById("p_id"+id).value;
		alert(qty)
	
	 if(isNaN(qty) || qty <= 0 || qty=='' )
	 {
		
		document.getElementById("p_id"+id).value = 1;
		
		
		 
	       row_id =document.getElementById("p_id"+id).getAttribute("prod");
	  
	       update_url = base_url+"cart/updateQuantity/"+row_id+"/1/1";
	  
	  
	  $.ajax
					(
						{
							url : update_url,
							success : function(data)
							{
								
								try
								{
									var response = JSON.parse(data);
									
										
								}
								catch(e)
								{
									window.location.href = window.location.href;
								}
								
								if(response.status=='success')
								{ 
								
								if(response.productData.length>=1)
								{
							
						
								
										document.getElementById("grosspriceofcart").innerHTML = response.totalprice ;
										document.getElementById("total_price_at").innerHTML = response.totalprice ;
										totalcartcount();
						
								
						
								}
								
								
									
								}
								
							}
							
						}
					);
	  	 
		 
	 
		
		
	 }
	 else
	 {
		//alert(qty)
		 
	       row_id =document.getElementById("p_id"+id).getAttribute("prod");
	  
	  update_url = base_url+"cart/updateQuantity/"+row_id+"/"+qty+"/1";
	  
	  
	  $.ajax
					(
						{
							url : update_url,
							success : function(data)
							{
								
								try
								{
									var response = JSON.parse(data);
									
										
								}
								catch(e)
								{
									window.location.href = window.location.href;
								}
								
								if(response.status=='success')
								{ 
								
								if(response.productData.length>=1)
								{
							
							for(i in response.productData)
								{
									if(id==response.productData[i]['card_id'])
									{
									      document.getElementById("p_sub"+id).innerHTML = 'Rs.'+ response.productData[i]['sub_total'] ;	
									}
								}
								
									
										document.getElementById("grosspriceofcart").innerHTML = response.totalprice ;
											document.getElementById("total_price_at").innerHTML = response.totalprice ;
											totalcartcount();
						
								
						
								}
								
								
									
								}
								
							}
							
						}
					);
	  	 
		 
	 }
	 
}

function Deleteitemofcartat(id)
{
	 row_id =document.getElementById("cartatdelete"+id).getAttribute("proddiv");

	 if(row_id)
	 { 
	 
	     update_url = base_url+"cart/removeCartItem/"+row_id ;
	
		  $.ajax
					(
						{
							url : update_url,
							success : function(data)
							{   document.getElementById("product-remove"+id).style.display = "none";
							
							
							repeatcartitemstotal();
							totalcartcount();
							
												 $.ajax
	(
		{
			url : base_url+"cart/totalcartitems",
			success : function(data)
			{
				//alert(data)
				if(data==0)
				{
					
					 
				    document.getElementById("cart_totals").style.display = "none"; 
					
			 document.getElementById("emptycartmessage").innerHTML ='<tr  >           <td colspan="7"  >Your Cart is empty <a href="<?php echo base_url(); ?>" class="checkout-button button btn btn-primary alt wc-forward pull-left" > Continue Shopping</a></td></tr>' ;
				
				}
				
			
			},
	fail : function(data)
						{
							//alert(2)
							//$("#cartloader").trigger("click");
							//displayalertblock("<strong>Cart cannot be loaded.</strong>");
						}
		}
	);	
							
							}
							
						}
					);
	  	 
		 
	 }
	 
	
}




function repeatcartitemstotal() 
{

		$.ajax({
		url : base_url+"cart/getcurrentcart",
		success : function(data)
		{
		//alert(data)
		
		try
		{
		var response = JSON.parse(data);
		}
		catch(e)
		{
		window.location.href = base_url;
		}
		if(response.status=='success')
		{ 
		if(response.productData.length>=1)
		{
		document.getElementById("total_price_at").innerHTML = response.totalprice ;
		document.getElementById("grosspriceofcart").innerHTML = response.totalprice ;
		}
		}
		
		}
		
		}
					);
	  	 	
	
	
	
}
	</script>