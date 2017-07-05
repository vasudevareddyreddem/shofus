<div class="compar_btn" id="compar_btn" >
	 <div class="btn-group show-on-hover">
          <a href="<?php echo base_url('category/productscompare/'.base64_encode($products_list['item_id'])); ?>" onclick="category(<?php echo $products_list['category_id']; ?>);"  class="btn btn-primary" ><?php echo $products_list['item_name'];?>&nbsp;<span><?php echo count($products_list['item_id']) ?></span> 
          </a>
          <input type="hidden" name="category_id" id="category_id"  value="<?php echo $products_list['category_id']; ?>"> 
          <!--  <ul class="dropdown-menu" role="menu" style="position: absolute;top:-100px;height:150px;width:10px;left:-50px;opacity: 0.8;">
				<li>
					<img src="<?php echo base_url('uploads/products/'.$products_list['item_image3']); ?>" style="width: 80%;height: 80%">
				</li>
          </ul> --> 
        </div>
			
	  </div>