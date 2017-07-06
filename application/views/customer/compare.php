
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
					<th>Product Name</th>
				</tr>
				<tr>
					<th style="width: 40%">Product Image</th>
				</tr>
				<tr>
					<th>Product Price</th>
				</tr>
        <tr>
          <th>Product code</th>
        </tr>
			</table>
		</div>
			<div class="col-md-3">
			<table class="table table-bordered table-compare">
				<tr>
					<td><?php echo $compore_products['item_name'];?></td>
				</tr>
				<tr>
					<td><img class="img-responsive" style="width: 40%" src="<?php echo base_url('uploads/products/'.$compore_products['item_image']); ?>"></td>
				</tr>
				<tr>
					<td><?php echo ($compore_products['item_cost']); ?></td>
				</tr>
        <tr>
          <td><?php echo $compore_products['item_code']; ?></td>
        </tr>
			</table>
			</div>
      <input type="hidden" name="category_id" id="category_id"  value="<?php echo $compore_products['category_id']; ?>"> 
			<div class="col-md-3" id="item_hide">
			<div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Select Item</label>
                  <select class="form-control" id="item_id" name="item_id">
                      <option>Select item</option> 
                        <?php foreach($item as $item_data){ ?>
                      <option value="<?php echo $item_data->item_id; ?>"><?php echo $item_data->item_name; ?></option>
                    <?php } ?> 
                  </select>
                </div>
			</div>
      <div class="col-md-3" id="compare_items" ></div>
	  </div>
          <nav aria-label="Shopping Cart Next Navigation">
            <ul class="pager">
              <li class="previous"><a href="products.html"><span aria-hidden="true">&larr;</span> Continue Shopping</a></li>
              <li class="next"><a href="cart.html">My Shopping Cart <span aria-hidden="true">&rarr;</span></a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
	 

<script type="text/javascript">
    $(document).ready(function()
    {
    $("#item_id").change(function()
    {
    var id=$(this).val();
    //alert(id);
    //var dataString = 'item_id='+ id;
    var item_id = $("#item_id").val();
    //var item_name = $("#item_id").val();
    //alert(item_id);exit;
    $.ajax
    ({
    type: "POST",
    url: "<?php echo base_url();?>category/compare_items_list",
     data: {item_id:item_id},
     cache: false,
    dataType:'html',
    success: function (data) {

       $('#compare_items').append(data);
       $('#item_hide').hide();
     } 
    });
    
    });
    });
    </script>   
