
<html lang="en">
<style>
.col-md-3{
	padding-left:0px;
	padding-right:0px;
}
@import url("http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css");

.panel-pricing {
  -moz-transition: all .3s ease;
  -o-transition: all .3s ease;
  -webkit-transition: all .3s ease;
}
.panel-pricing:hover {
  box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.2);
}
.panel-pricing .panel-heading {
  padding: 20px 10px;
}
.panel-pricing .panel-heading .fa {
  margin-top: 10px;
  font-size: 58px;
}
.panel-pricing .list-group-item {
  color: #777777;
  border-bottom: 1px solid rgba(250, 250, 250, 0.5);
}
.panel-pricing .list-group-item:last-child {
  border-bottom-right-radius: 0px;
  border-bottom-left-radius: 0px;
}
.panel-pricing .list-group-item:first-child {
  border-top-right-radius: 0px;
  border-top-left-radius: 0px;
}
.panel-pricing .panel-body {
  background-color: #f0f0f0;
  font-size: 40px;
  color: #777777;
  padding: 20px;
  margin: 0px;
}
.panel-heading span
{
    margin-top: -26px;
    font-size: 15px;
    margin-right: -12px;
}

.clickable {
    background: rgba(0, 0, 0, 0.15);
    display: inline-block;
    padding: 6px 12px;
    border-radius: 4px;
    cursor: pointer;
}

</style>
<!--wrapper start here -->
 
<div class="container" style="margin-top:180px">
    <div class="row">
        <div class="col-md-4 text-center">
            <div class="panel panel-danger panel-pricing">
                <div class="panel-heading">
                    <img class="img-responsive" src="<?php echo base_url('uploads/products/'.$compore_products['item_image']); ?>">                   
                </div>

                <ul class="list-group text-center">
                    <li class="list-group-item">Product Name:
                        <?php echo $compore_products[ 'item_name'];?>
                    </li>
                    <li class="list-group-item">Product Price:
                        <?php echo ($compore_products[ 'item_cost']); ?>
                    </li>
                    <li class="list-group-item">Product Code:
                        <?php echo $compore_products[ 'item_code']; ?>
                    </li>

                </ul>

            </div>
        </div>
        <div class="col-md-3" id="compare_items"></div>

        <div class="col-md-3" id="item_hide">
            <div class="form-group nopaddingRight col-md-6 san-lg">
                <label for="exampleInputPassword1">Select Item</label>
                <select class="form-control" id="item_id" name="item_id">
                    <option>Select item</option>
                    <?php foreach($item as $item_data){ ?>
                    <option value="<?php echo $item_data->item_id; ?>">
                        <?php echo $item_data->item_name; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

    </div>
</div>
<input type="hidden" name="category_id" id="category_id" value="<?php echo $compore_products['category_id']; ?>">      
    <!--  <div class="row">
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
          <td id="compare_item_name"></td>
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
      <!-- <div class="col-md-3" id="compare_items" ></div> -->
          <nav aria-label="Shopping Cart Next Navigation">
            <ul class="pager">
              <li class="previous"><a href="products.html"><span aria-hidden="true">&larr;</span> Continue Shopping</a></li>
              <li class="next"><a href="cart.html">My Shopping Cart <span aria-hidden="true">&rarr;</span></a></li>
            </ul>
          </nav>
         
    

<script type="text/javascript">
    $(document).ready(function()
    {
    $("#item_id").change(function()
    {
    var id=$(this).val();
    //alert(id);
    //var dataString = 'item_id='+ id;
    var item_id = $("#item_id").val();
    var category_id = $("#category_id").val();
    //alert(category_id);exit;
    //var item_name = $("#item_id").val();
    //alert(item_id);exit;
    $.ajax
    ({
    type: "POST",
    url: "<?php echo base_url();?>category/compare_items_list",
     data: {item_id:item_id,category_id:category_id},
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
