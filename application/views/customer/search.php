<?php
if(count($detail)>0){
foreach($detail as $searhitems){  
 if($searhitems['yes']==0){  ?>
	 
	<li style="list-style-type:none;"><a  style="text-decoration:none;" href="<?php echo base_url('category/subcategoryview/'.base64_encode($searhitems['category_id'])); ?>"><?php  echo ucfirst($searhitems['subcategory_name']);  ?></a></li> 
  <?php }else{ ?>
	 <li style="list-style-type:none;"><a  style="text-decoration:none;" href="<?php echo base_url('category/productview/'.base64_encode($searhitems['item_id'])); ?>"><?php  echo ucfirst($searhitems['item_name']);  ?></a></li> 

	 
<?php  } } }else{ ?>
	<li style="list-style-type:none;">No results found</li> 

<?php } ?>

