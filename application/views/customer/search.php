
<?php

foreach($detail as $searhitems){  
 if($searhitems['yes']==0){  ?>
	 
	<li style="list-style-type:none;"><a  style="text-delection:none;" href=""><?php  echo $searhitems['subcategory_name'];  ?></a></li> 
  <?php }else{ ?>
	 <li style="list-style-type:none;"><a  style="text-delection:none;" href=""><?php  echo $searhitems['item_name'];  ?></a></li> 

	 
<?php  } } ?>

