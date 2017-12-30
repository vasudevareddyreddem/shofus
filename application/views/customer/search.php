<?php
//echo '<pre>';print_r($detail);exit;
if(count($detail)>0){
$i=1;foreach($detail as $searhitems){

 if ($i <= 10){	
 if($searhitems['yes']==0){  ?>
	 
	<a  style="text-decoration:none;" href="<?php echo base_url('category/subcategoryview/'.base64_encode($searhitems['category_id'])); ?>"><li style="list-style-type:none;padding:5px 0px; font-size:16px;"><?php  echo ucfirst(strtolower($searhitems['subcategory_name']));  ?> in <?php echo ucfirst(strtolower($searhitems['category_name'])); ?></li></a> 
  <?php }else{ ?>
	 <a  style="text-decoration:none;" href="<?php echo base_url('category/productview/'.base64_encode($searhitems['item_id'])); ?>"><li style="list-style-type:none;padding:5px 0px; font-size:16px;"><?php  echo ucfirst(strtolower($searhitems['item_name'].' '.$searhitems['colour'].' '.$searhitems['internal_memeory'].' '.$searhitems['ram'].' '.'Ram'));  ?></a><a style="color:#d32134" href="<?php echo base_url('category/subcategoryview/'.base64_encode($searhitems['category_id']).'/'.base64_encode('search').'/'.base64_encode($searhitems['subcategory_id'])); ?>"> in <?php echo ucfirst(strtolower($searhitems['subcategory_name'])); ?></li> </a>

	 
 <?php  }  ?>
 <?php } $i++;}   ?>

<?php }else{ ?>
	<li style="list-style-type:none;10px 0px; font-size:16px;">No results found</li> 

<?php } ?>

