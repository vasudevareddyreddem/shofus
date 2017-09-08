<?php
if(count($detail)>0){
foreach($detail as $searhitems){
//echo '<pre>';print_r($searhitems);exit;	
 if($searhitems['yes']==0){  ?>
	 
	<a  style="text-decoration:none;" href="<?php echo base_url('category/subcategoryview/'.base64_encode($searhitems['category_id'])); ?>"><li style="list-style-type:none;"><?php  echo ucfirst($searhitems['subcategory_name']);  ?> in <?php echo ucfirst($searhitems['category_name']); ?></li></a> 
  <?php }else{ ?>
	 <a  style="text-decoration:none;" href="<?php echo base_url('category/productview/'.base64_encode($searhitems['item_id'])); ?>"><li style="list-style-type:none;"><?php  echo ucfirst($searhitems['item_name']);  ?> in <?php echo ucfirst($searhitems['subcategory_name']); ?></li> </a>

	 
<?php  } } }else{ ?>
	<li style="list-style-type:none;">No results found</li> 

<?php } ?>

