
<html lang="en">
<style>
.col-md-3{
	padding-left:0px;
	padding-right:0px;
}

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
/*.panel-heading span
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
}*/


</style>
<!--wrapper start here -->
 
<div class="container" style="margin-top:20px">

  <div class="row">
    <div class="col-md-12">
      <div><h3>Compare Products</h3></div>
    </div>
  </div>
  <?php //echo '<pre>';print_r($compore_products);exit;

$currentdate=date('Y-m-d h:i:s A');
				if($compore_products['offer_expairdate']>=$currentdate){
				$item_price= ($compore_products['item_cost']-$compore_products['offer_amount']);
				$percentage= $compore_products['offer_percentage'];
				$orginal_price=$compore_products['item_cost'];
				}else{
					//echo "expired";
					$item_price= $compore_products['special_price'];
					$prices= ($compore_products['item_cost']-$compore_products['special_price']);
					$percentage= (($prices) /$compore_products['item_cost'])*100;
					$orginal_price=$compore_products['item_cost'];
				}  ?>

    <div class="row">
        <div class="col-md-4 text-center">
            <div class="panel panel-default panel-pricing">
                <a href="<?php echo base_url('category/productview/'.base64_encode($compore_products['item_id']));?>">
				<div class="panel-heading">
                    <img class="img-responsive" src="<?php echo base_url('uploads/products/'.$compore_products['item_image']); ?>">                   
                </div>

                <ul class="list-group text-center">
									
					<li class="list-group-item">Product Name:
                        <?php echo $compore_products[ 'item_name'];?>
                    </li>
                    <li class="list-group-item">Product Price:
                        <?php echo ($item_price); ?>
                    </li>
                    <li class="list-group-item">Product Code:
                        <?php echo $compore_products[ 'product_code']; ?>
                    </li>
					</a>
					
				</form>
                </ul>
            </div>
        </div>
		<div id="compare_items" class="col-md-4 text-center" style="display:none;"></div>
		
		
		<div class="col-md-4 text-center" id="item_hide1">
            <div class="form-group nopaddingRight col-md-6 san-lg" >
                <label for="exampleInputPassword1">Select Compare Product</label>
                <select class="form-control" onchange="productitem_one(this.value);" id="item_id" name="item_id">
                    <option>Select item</option>
                    <?php foreach($item as $item_data){ ?>
					<?php if($item_data->item_id!=$first_item){ ?>
                    <option value="<?php echo $item_data->item_id; ?>"><?php echo $item_data->item_name; ?></option>
					<?php } ?>
                    <?php } ?>
                </select>
            </div>
        </div>
		<div id="compare_items2" class="col-md-4 text-center" style="display:none;"></div>
		<div class="col-md-4 text-center" id="item_hide2" style="display:none;">
            <div class="form-group nopaddingRight col-md-6 san-lg" >
                <label for="exampleInputPassword1">Select Compare Product</label>
                <select class="form-control" onchange="productitem_two(this.value);" id="item_idtwo" name="item_idtwo">
                    <option>Select item</option>
                     <?php foreach($item as $item_data){ ?>
					<?php if($item_data->item_id!=$first_item){ ?>
                    <option value="<?php echo $item_data->item_id; ?>"><?php echo $item_data->item_name; ?></option>
					<?php } ?>
                    <?php } ?>
                </select>
            </div>
        </div>
	</div>
</div>
<input type="hidden" name="category_id" id="category_id" value="<?php echo $compore_products['category_id']; ?>">      
   
         
    

<script type="text/javascript">
   var $dropdown1 = $("select[name='item_id']");
var $dropdown2 = $("select[name='item_idtwo']");

$dropdown1.change(function() {
    $dropdown2.find('option').prop("disabled", false);
    var selectedItem = $(this).val();
    if (selectedItem) {
        $dropdown2.find('option[value="' + selectedItem + '"]').prop("disabled", true);
    }
});
$dropdown2.change(function() {
    $dropdown1.find('option').prop("disabled", false);
    var selectedItem = $(this).val();
    if (selectedItem) {
        $dropdown1.find('option[value="' + selectedItem + '"]').prop("disabled", true);
    }
});
    function productitem_one(id)
    {
		var category_id = $("#category_id").val();
		$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>category/compare_items_list",
				data: {
					item_id:id,
					category_id:category_id
					},
				cache: false,
				dataType:'html',
				success: function (data) {
					$('#item_hide1').hide();
					$('#item_hide2').show();
					$('#compare_items').show();
					$('#compare_items').empty();
					$('#compare_items').append(data);
					
				} 
			});	
    
    }
	function productitem_two(id)
    {
		var category_id = $("#category_id").val();
		$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>category/compare_items_list_two",
				data: {
					item_id:id,
					category_id:category_id
					},
				cache: false,
				dataType:'html',
				success: function (data) {
					$('#item_hide2').hide();
					$('#compare_items2').show();
					$('#compare_items2').empty();
					$('#compare_items2').append(data);
					
				} 
			});	
    
    }
  
 </script>   
