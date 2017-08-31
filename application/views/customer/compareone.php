 
 <div class="panel panel-default panel-pricing">
 
		<div class="panel-heading">
		<i style="position:absolute;right:36px;top:0;font-size:18px;background:#fff;border-radius:50%;padding:5px;" onclick="removefunction('compare_items');" class="fa fa-times" aria-hidden="true"></i>
			<div class="clearfix"></div>
			<a href="<?php echo base_url('category/productview/'.base64_encode($compare_one['item_id']));?>">
			<img class="img-responsive" src="<?php echo base_url('uploads/products/'.$compare_one['item_image']); ?>">
		</div>
		<ul class="list-group text-center">
			<li class="list-group-item">Product Name:
				<?php echo $compare_one[ 'item_name'];?>
			</li>
			<li class="list-group-item">Product Price:
				<?php echo $compare_one[ 'item_cost']; ?>
			</li>
			<li class="list-group-item">Product Code:
				<?php echo $compare_one[ 'item_code']; ?>
			</li>
			
			</a>
			

		</ul>

</div>

<script>
function removefunction(id){
	$('#'+id).hide();
	$('#item_hide1').show();
	
}
</script>
     



	