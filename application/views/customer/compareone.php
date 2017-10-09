 
 <div class="panel panel-default panel-pricing">
 <?php //echo '<pre>';print_r($compare_one);
 
 $currentdate=date('Y-m-d h:i:s A');
				if($compare_one['offer_expairdate']>=$currentdate){
				$item_price= ($compare_one['item_cost']-$compare_one['offer_amount']);
				$percentage= $compare_one['offer_percentage'];
				$orginal_price=$compare_one['item_cost'];
				}else{
					//echo "expired";
					$item_price= $compare_one['special_price'];
					$prices= ($compare_one['item_cost']-$compare_one['special_price']);
					$percentage= (($prices) /$compare_one['item_cost'])*100;
					$orginal_price=$compare_one['item_cost'];
				}  ?>
		<div class="panel-heading">
		<i style="position:absolute;right:36px;top:0;font-size:18px;background:#fff;border-radius:50%;padding:5px;" onclick="removefunction('compare_items','<?php echo $compare_one['item_id']; ?>');" class="fa fa-times" aria-hidden="true"></i>
			<div class="clearfix"></div>
			<a href="<?php echo base_url('category/productview/'.base64_encode($compare_one['item_id']));?>">
			<img style="height:200px;width:auto;margin: 0 auto;" class="img-responsive" src="<?php echo base_url('uploads/products/'.$compare_one['item_image']); ?>">
		</div>
		<ul class="list-group text-center">
			<li class="list-group-item">Product Name:
				<?php echo $compare_one[ 'item_name'];?>
			</li>
			<li class="list-group-item">Product Price:
				<?php echo $item_price; ?>
			</li>
			<li class="list-group-item">Product Code:
				<?php echo $compare_one[ 'product_code']; ?>
			</li>
			
			</a>
			

		</ul>

</div>

<script>
function removefunction(id,itemid){
	$('#'+id).hide();
	$('#item_hide1').show();
	$("#item_id").val('');
	$("#"+itemid).prop("disabled", false);
	document.getElementById("item_id").selectedIndex = 0;

	
}
</script>
     



	