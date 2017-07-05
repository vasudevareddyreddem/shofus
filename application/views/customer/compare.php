
<html lang="en">
<style>
.col-md-3{
	padding-left:0px;
	padding-right:0px;
}
</style>
<!--wrapper start here -->

<div class="container" style="margin-top:180px">
      <div class="row">
	  <div class="col-md-12">
			<h4>Product Details</h4>
	  </div>
	  <div class="col-md-12">
		<div class="col-md-3">
			<table class="table table-bordered table-compare">
				<tr>
					<th>hdfsdafg</th>
				</tr>
				<tr>
					<th>hdfsdafg</th>
				</tr>
				<tr>
					<th>hdfsdafg</th>
				</tr>
			</table>
		</div>
			<div class="col-md-3">
			<table class="table table-bordered table-compare">
				<tr>
					<td>hdfsdafg</td>
				</tr>
				<tr>
					<td>hdfsdafg</td>
				</tr>
				<tr>
					<td>hdfsdafg</td>
				</tr>
			</table>
			</div>
			<div class="col-md-3">
			<table class="table table-bordered table-compare">
				<tr>
					<td>hdfsdafg</td>
				</tr>
				<tr>
					<td>hdfsdafg</td>
				</tr>
				<tr>
					<td>hdfsdafg</td>
				</tr>
			</table>
			</div>
			<div class="col-md-3">
			<table class="table table-bordered table-compare">
				<tr>
					<td>hdfsdafg</td>
				</tr>
				<tr>
					<td>hdfsdafg</td>
				</tr>
				<tr>
					<td>hdfsdafg</td>
				</tr>
			</table>
			</div>

	  
	  </div>
       <!-- <div class="col-xs-12">
          
          <div class="table-responsive">
            <table class="table table-bordered table-compare">
              <thead>
                <tr>
                  <td class="compare-product" colspan="5"><h3>Product Details</h3></td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Product</td>
                  <td><a href="detail.html" class="d-block"><?php echo $compore_products['item_name'];?></a></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>Image</td>
                  <td>
                    <a href="detail.html"><img src="<?php echo base_url('uploads/products/'.$compore_products['item_image3']); ?>"></a>
                  </td>
                  <td>
                       <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Select Subcategory</label>
                  <select class="form-control" id="subcategory_id" name="subcategory_id">
                      <option>Select Subcategory</option> 
                        <?php foreach($subcatdata as $subcat_data){ ?>
                      <option value="<?php echo $subcat_data->subcategory_id; ?>"><?php echo $subcat_data->subcategory_name; ?></option>
                    <?php } ?> 
                  </select>
                </div> 
                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Select Item</label>
                  <select class="form-control" id="item_id" name="item_id">
                      <option>Select item</option> 
                        <?php foreach($item as $item_data){ ?>
                      <option value="<?php echo $item_dta->item_name; ?>"><?php echo $item_data->item_name; ?></option>
                    <?php } ?> 
                  </select>
                </div>
                  </td>
                  <td id="compare_items">
                    <p><?php echo $compare_item->item_name; ?></p>
                  </td>
                  <td>
                    
                  </td>
                </tr>
                <tr>
                  <td>Price</td>
                  <td>
				
				<div class="price">
                    <div><?php echo ($compore_products['item_cost'])-($compore_products['offer_amount']); ?></div>
                    <!-- <span class="price-old"><?php echo $compore_products['item_cost']; ?></span> -->
                  </div>
                  <!-- <div class="price">
                    <span class="price-old"><?php echo $compore_products['item_cost']; ?></span>
                  </div> 				  

                </td>
                  <td>
                    <div class="price">
                      <div></div>
                      
                    </div>
                  </td>
                  <td>
                    <div class="price">
                      <div> </div>
                      
                    </div>
                  </td>
                  <td>
                    <div class="price">
                      <div></div>
                    
                    </div>
                  </td>
                </tr>
                <tr>
                <td>Item Code</td>
                	<td>

                    <div class="price">
                      <div><?php echo $compore_products['item_code']; ?></div>
                    </div>
                  </td><td>
                    <div class="price">
                      <div></div>
                      
                    </div>
                  </td><td>
                    <div class="price">
                      <div></div>
                      
                    </div>
                  </td><td>
                    <div class="price">
                      <div></div>
                      
                    </div>
                  </td>

                </tr>
                
                
               
                
                <tr>
                  <td></td>
                  <td><a href="" class="btn btn-sm btn-theme" type="button"><i class="fa fa-shopping-cart"></i> Add To Cart</a></td>
                  <td><button class="btn btn-sm btn-theme" type="button"><i class="fa fa-shopping-cart"></i> Add To Cart</button></td>
                  <td><button class="btn btn-sm btn-theme" type="button"><i class="fa fa-shopping-cart"></i> Add To Cart</button></td>
                  <td><button class="btn btn-sm btn-theme" type="button"><i class="fa fa-shopping-cart"></i> Add To Cart</button></td>
                </tr>
                <tr>
                  <td></td>
                  <td><button class="btn btn-sm btn-theme" type="button"><i class="fa fa-remove"></i> Remove</button></td>
                  <td><button class="btn btn-sm btn-theme" type="button"><i class="fa fa-remove"></i> Remove</button></td>
                  <td><button class="btn btn-sm btn-theme" type="button"><i class="fa fa-remove"></i> Remove</button></td>
                  <td><button class="btn btn-sm btn-theme" type="button"><i class="fa fa-remove"></i> Remove</button></td>
                </tr>
              </tbody>
            </table>
          </div>
          <nav aria-label="Shopping Cart Next Navigation">
            <ul class="pager">
              <li class="previous"><a href="products.html"><span aria-hidden="true">&larr;</span> Continue Shopping</a></li>
              <li class="next"><a href="cart.html">My Shopping Cart <span aria-hidden="true">&rarr;</span></a></li>
            </ul>
          </nav>
        </div>-->
      </div>
	  
    </div>
	 

<script type="text/javascript">
    $(document).ready(function()
    {
    $("#subcategory_id").change(function()
    {
    var id=$(this).val();
    //alert(id);
    var dataString = 'subcategory_id='+ id;
    //alert(dataString);
    $.ajax
    ({
    type: "POST",
    url: "<?php echo base_url();?>category/getitems",
    data: dataString,
    cache: false,
    success: function(data)
    {
    $("#item_id").html(data);
    } 
    });
    
    });
    });



    $(document).ready(function()
    {
    $("#item_id").change(function()
    {
    var id=$(this).val();
    //alert(id);
    var dataString = 'item_id='+ id;
    //alert(dataString);
    $.ajax
    ({
    type: "POST",
    url: "<?php echo base_url();?>category/compare_items",
    data: dataString,
    cache: false,
    success: function(data)
    {
    $("#compare_items").html(data);
    //$('#compare_items').show();
    } 
    });
    
    });
    });
    </script>   