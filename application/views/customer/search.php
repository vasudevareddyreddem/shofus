<?php

foreach($detail as $searhitems){  
 if($searhitems['yes']==0){  ?>
	 
	<li style="list-style-type:none;"><a  style="text-delection:none;" href="<?php echo base_url('category/view/'.base64_encode($searhitems['subcategory_id'])); ?>"><?php  echo $searhitems['subcategory_name'];  ?></a></li> 
  <?php }else{ ?>
	 <li style="list-style-type:none;"><a  style="text-delection:none;" href="<?php echo base_url('category/productview/'.base64_encode($searhitems['item_id'])); ?>"><?php  echo $searhitems['item_name'];  ?></a></li> 

	 
<?php  } } ?>

