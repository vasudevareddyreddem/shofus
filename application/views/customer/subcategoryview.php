<?php if(isset($quick) && $quick=='quick'){ ?>
	<script>
	
$(document).ready(function() {
   $('#onclicksubcat<?php echo $subcatid; ?>').click();
});
 </script>
<?php } ?>
<style>


.top-navbar1{
	display:none;
}
.product-ratings{
	color:#ddd !important;
	}
.product-rateing{
	color:#fc0 !important;
	}
	.fa {
    padding-right: 0px !important;
}
.panel-title > a:before {
    float: right !important;
    font-family: FontAwesome;
	content:"\f077";
    padding-right: 5px;
}
.panel-heading {
    background:#45b1b5 ;
}
.panel-title > a.collapsed:before {
    float: right !important;
    content:"\f078";
}
.panel-title > a:hover, 
.panel-title > a:active, 
.panel-title > a:focus  {
    text-decoration:none;
	
}
.fluid_mod{
	margin:0px 60px;
	background:#fff;
}
#input-select,
#input-number {
	padding: 7px;
	margin: 15px 5px 5px;
	width: 70px;
}
.wish{
	color:#ef5350;
}
</style>
<!--<div class="" style="margin-top:50px;">
	<img  src="<?php echo base_url(); ?>assets/home/images/ban1.png">
</div>-->
<body >
	  <div class="container-fluid fluid_mod " id="containerhigh"></div>
	 <div class="container-fluid fluid_mod " id="containerhighold">
	 <div class="row ">
			<div class="col-md-12  ">
			  
			  <div class="col-md-12 gir_alg" >
			  <div class="title text-left mar_t10"><span><?php echo ucfirst(strtolower(isset($category_name['category_name'])?$category_name['category_name']:'')); ?> Sub Categories list</span></div>
			  <?php foreach($subcategory_list as $list){ ?>
				  <div class="col-md-2" id="onclicksubcat<?php echo $list['subcategory_id']; ?>"  onclick="getproduct(<?php echo $list['subcategory_id']; ?>);">
					 <div class="catg_sty">
						<?php echo $list['subcategory_name']; ?>
					  </div>
					  <img  style="position:absolute;top:0;left:5px;width:50px;background:#ddd" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGwAAABUCAYAAABnT9INAAAAAXNSR0IArs4c6QAABMZJREFUeAHtnc9rXFUUx7/3zSQZgr+KxRaNwQF/YAuN02qblRWpP6qLCiK40I3+AUmjZqEuXLgSNE3AtQsXrnSposYqKtpAm0SpguCqLmwRgr+ayfy6nheMnPvmJdPXvJlwku+DZM6979x7z3w+7728yeINwI0ESIAESIAESIAESIAESIAESIAESIAESIAESIAEOhNwnVNSMirjx9FqvQ2PcspednUm8BscXsbizDudU8OM7MKeeq0fPy9dgvfXh1OxlYmAcw2UBso488avWcZFWZJXc3/5Y5iyMlNrH+B9EdX6vvYdG/dkF9Z02cdsXMPO3euRmWUxF1rOvS9n3Q+5zLVdJ3HuVmH0/GbfXj7CIhE2P/3eZovZ1uMPToyi0di0sMyn5LaGauDNUZgBSbpECtM0DMQUZkCSLpHCNA0DMYUZkKRLpDBNw0BMYQYk6RIpTNMwEFOYAUm6RArTNAzEFGZAki6RwjQNAzGFGZCkS6QwTcNATGEGJOkSKUzTMBBTmAFJukQK0zQMxBRmQJIukcI0DQMxhRmQpEukME3DQExhBiTpEilM0zAQU5gBSbpECtM0DMQUZkCSLpHCNA0DMYUZkKRLpDBNw0BMYQYk6RIpTNMwEFOYAUm6RArTNAzEFGZAki6RwjQNAzGFGZCkS6QwTcNATGEGJOkSKUzTMBBTmAFJukQK0zQMxBRmQJIukcI0DQNxPk9z8ziMynjdwPvduhJbrTvyWPwqhDX2ty3cao1LX/zDLQsB17pb0j/OMqSQJRmVsfvlwcwfyJi+TOOYnE7A4Rj2jJ7HxTM/pSe09175Q5oPjB2R4Z8C/trENCtw0bfytM1mop/NgEB8u9A8LL8S/FwNBfcE5k99FKSv07gyYSMTFVnsc5FyQ2KeJUTRg1g4tZDoZzONwKGxYdTxlRz0w8Fu55aF43HMT30Z9Kc0OgsbOSl/s1pfiKzdwXiHP4HCQ1icmgv6826c9tegviKX4tZ1eU8dzBcJyn7M4ejghaA/78bBk7ej0RRp2BtO7f6SK9WxTjw3FjYycSd8I7YeTu7cP9L3KBanvw4Xzbl1Wg6S+vKcHCzlnGdOn865KhCdwMOlT9ITcuqNTwLfjLnemJhxCUX3AM5Nf5/o/7+5/uewAy+WRdasZIaygCoif6LrsuISG8vP9ExWvJ73JbmaTMZhV7fFqfMo4hH5dgi5SgXbLjTlPuHesbuCXtVIF3ZkcgiuFssaUrkSyh/ICE9ifibe1/3Nu7+7v0hiBY/erHlu5qzwfFykXQ4q8P4m1PxnuGf8tqD/v0a7sPte2otqdbbte1Xir55w/mkszHyYNlFX+sqld2VeuTPt1eYuoK/wSq9WW71KOblDBFYSaw6h5WdRmbw50S9+9Xbohd3ybPX4BqP9wzHcRUmVo2ILtv7+AUSFq/iQn6FW3/RYqYVHe4bhm0p1GBHmt7TN4fAjin1HcfbN39f2hRAa9bfkzEqRFaf7PfLrsbWBPX2tJQ/Anq7e/cX8Okt47JMTaEr2PruWEV4S/RYJWauGr+0EEk5CYXDftI9gz5YScD5wEl4SS4PPoXr5Vbn8jcK5wpYWutMXX/1Xn/sOA4Ov73QUfP8kQAIkQAIkQAIkQAKdCPwLm0HrVPVw6EIAAAAASUVORK5CYII=">
				  </div> 
			  <?php } ?>
			</div>
			</div>
	 </div>
	<br>
	<hr>
	 <div class=" clearfix"></div>
	 <!-- Filter Sidebar -->
	 <div id="subcategorywise_products" style="">
		<div class="col-sm-3">
		 <div class="title"><span>Filters</span></div>
		 
			
		 <form action="<?php echo base_url('category/categorywiseearch'); ?>" method="POST" >
			<div class="example">
			<h3>Price</h3>
			<div id="html5"  name="html5" onclick="mobileaccessories(this.value, '<?php echo ''; ?>','<?php echo ''; ?>');" class="noUi-target noUi-ltr noUi-horizontal">

			</div>
			<select id="input-select" name="min_amount" >
			<?php for( $i=floor($minimum_price['item_cost']); $i<=floor($maximum_price['item_cost']); $i+=500 ){  ?>
				<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			<?php } ?>
			
			</select>
			<input type="text" name="max_amount"   step="1" id="input-number">
			</div>
			<input type="hidden" name="categoryid" id="categoryid" value="<?php echo $this->uri->segment(3);?>">
			
			<?php if(base64_decode($this->uri->segment(3))=='18'){ ?>
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<?php if(count($myrestaurant)>0){?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingOne">
						 <h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					    My Restaurant
					</a>
				  </h4>

					</div>
					<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">
								<?php foreach ($myrestaurant as $reslist){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="mobileaccessories(this.value, '<?php echo 'res'; ?>','<?php echo ''; ?>');" id="restrarent" name="products[res][]" value="<?php echo $reslist['seller_id']; ?>"><span>&nbsp;<?php echo $reslist['seller_name']; ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php if(count($cusine_list)>0){?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingThree">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					  Cuisine
					</a>
				  </h4>

					</div>
					
					<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
						<?php foreach ($cusine_list as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="mobileaccessories(this.value, '<?php echo 'cusine'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[cusine][]" value="<?php echo $list['cusine']; ?>"><span>&nbsp;<?php echo $list['cusine']; ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php if(count($avalibility_list)>0){?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingOne1">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					    Availability
					  </a>
				  </h4>

					</div>
					<?php //echo '<pre>';print_r($avalibility_list);exit; ?>
					<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne1">
						<div class="panel-body">
							<select onchange="mobileaccessories(this.value, '<?php echo 'status'; ?>','<?php echo ''; ?>');" name="products[availability]" class="form-control" id="sel1">
								<option value="">Select</option>
								
								<?php foreach ($avalibility_list as $list){ ?>
								<option value="<?php echo $list; ?>"><?php if($list==1){ echo "Instock";}else{ echo "Out of stock";}; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<?php } ?>
				
				
				
			</div>
			
			<?php }else if(base64_decode($this->uri->segment(3))=='21'){ ?>
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<?php if(count($offer_list)>0){?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingThree">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					  Offer	
					  </a>
				  </h4>

					</div>
					<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
						<?php foreach ($offer_list as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="mobileaccessories(this.value, '<?php echo 'offer'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[offers][]" value="<?php echo $list['offers']; ?>"><span>&nbsp;<?php echo number_format($list['offers'], 2, '.', ''); ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php if(count($brand_list)>0){?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingThree2">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree1" aria-expanded="false" aria-controls="collapseThree1">
					  BRAND	
					  </a>
				  </h4>

					</div>
					<div id="collapseThree1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree2">
						<div class="panel-body">
						<?php foreach ($brand_list as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="mobileaccessories(this.value, '<?php echo 'brand'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[brand][]" value="<?php echo $list['brand']; ?>"><span>&nbsp;<?php echo $list['brand']; ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php if(count($discount_list)>0){ ?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingThree0">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree0" aria-expanded="false" aria-controls="collapseThree0">
					  Discount	
					  </a>
				  </h4>

					</div>
					<div id="collapseThree0" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree0">
						<div class="panel-body">
						<?php foreach ($discount_list as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="mobileaccessories(this.value, '<?php echo 'discount'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[discount][]" value="<?php echo $list['discount']; ?>"><span>&nbsp;<?php echo $list['discount']; ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php if(count($avalibility_list)>0){?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingOne10">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne01" aria-expanded="true" aria-controls="collapseOne01">
					    Availability
					  </a>
				  </h4>

					</div>
					<?php //echo '<pre>';print_r($avalibility_list);exit; ?>
					<div id="collapseOne01" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne10">
						<div class="panel-body">
							<select onchange="mobileaccessories(this.value, '<?php echo 'status'; ?>','<?php echo ''; ?>');" name="products[availability]" class="form-control" id="sel1">
								<option value="">Select</option>
								
								<?php foreach ($avalibility_list as $list){ ?>
								<option value="<?php echo $list; ?>"><?php if($list==1){ echo "Instock";}else{ echo "Out of stock";}; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			<?php } ?>
				
				
				
			</div>
			<?php }else if(base64_decode($this->uri->segment(3))=='19'){ ?>
			<?php if(count($offer_list)>0){ ?>
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingThree11">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree11" aria-expanded="false" aria-controls="collapseThree11">
					  Offer	
					  </a>
				  </h4>

					</div>
					<div id="collapseThree11" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree11">
						<div class="panel-body">
						<?php foreach ($offer_list as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="mobileaccessories(this.value, '<?php echo 'offer'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[offers][]" value="<?php echo $list['offers']; ?>"><span>&nbsp;<?php echo number_format($list['offers'], 2, '.', ''); ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
				<?php if(count($brand_list)>0){ ?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingThree">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					  BRAND	
					  </a>
				  </h4>

					</div>
					<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
						<?php foreach ($brand_list as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="mobileaccessories(this.value, '<?php echo 'brand'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[brand][]" value="<?php echo $list['brand']; ?>"><span>&nbsp;<?php echo $list['brand']; ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php if(count($color_list)>0){ ?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingThree45">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					  Colors	
					  </a>
				  </h4>

					</div>
					<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree45">
						<div class="panel-body">
						<?php foreach ($color_list as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="mobileaccessories(this.value, '<?php echo 'color'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[color][]" value="<?php echo $list['color_name']; ?>"><span>&nbsp;<?php echo $list['color_name']; ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php if(count($sizes_list)>0){ ?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingThr">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					  SIZE	
					  </a>
				  </h4>

					</div>
					<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThr">
						<div class="panel-body">
						<?php foreach ($sizes_list as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="mobileaccessories(this.value, '<?php echo 'size'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[size][]" value="<?php echo $list['p_size_name']; ?>"><span>&nbsp;<?php echo $list['p_size_name']; ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php if(count($discount_list)>0){?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="Discount">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					  Discount	
					  </a>
				  </h4>

					</div>
					<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="Discount">
						<div class="panel-body">
						<?php foreach ($discount_list as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="mobileaccessories(this.value, '<?php echo 'discount'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[discount][]" value="<?php echo $list['discount']; ?>"><span>&nbsp;<?php echo $list['discount']; ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php if(count($avalibility_list)>0){?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="Availability">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					    Availability
					  </a>
				  </h4>

					</div>
					<?php //echo '<pre>';print_r($avalibility_list);exit; ?>
					<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="Availability">
						<div class="panel-body">
							<select onchange="mobileaccessories(this.value, '<?php echo 'status'; ?>','<?php echo ''; ?>');" name="products[availability]" class="form-control" id="sel1">
								<option value="">Select</option>
								
								<?php foreach ($avalibility_list as $list){ ?>
								<option value="<?php echo $list; ?>"><?php if($list==1){ echo "Instock";}else{ echo "Out of stock";}; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			<?php } ?>
				
				
				
			</div>
			<?php }else if(base64_decode($this->uri->segment(3))=='20'){ ?>
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<?php if(count($offer_list)>0){ ?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="Offer">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					  Offer	
					  </a>
				  </h4>

					</div>
					<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="Offer">
						<div class="panel-body">
						<?php foreach ($offer_list as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="mobileaccessories(this.value, '<?php echo 'offer'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[offers][]" value="<?php echo $list['offers']; ?>"><span>&nbsp;<?php echo number_format($list['offers'], 2, '.', ''); ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php if(count($brand_list)>0){ ?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="BRAND">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					  BRAND	
					  </a>
				  </h4>

					</div>
					<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="BRAND">
						<div class="panel-body">
						<?php foreach ($brand_list as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="mobileaccessories(this.value, '<?php echo 'brand'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[brand][]" value="<?php echo $list['brand']; ?>"><span>&nbsp;<?php echo $list['brand']; ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php if(count($color_list)>0){ ?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="Colors">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					  Colors	
					  </a>
				  </h4>

					</div>
					<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="Colors">
						<div class="panel-body">
						<?php foreach ($color_list as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="mobileaccessories(this.value, '<?php echo 'color'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[color][]" value="<?php echo $list['color_name']; ?>"><span>&nbsp;<?php echo $list['color_name']; ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php if(count($discount_list)>0){ ?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="Discount">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					  Discount	
					  </a>
				  </h4>

					</div>
					<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="Discount">
						<div class="panel-body">
						<?php foreach ($discount_list as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="mobileaccessories(this.value, '<?php echo 'discount'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[discount][]" value="<?php echo $list['discount']; ?>"><span>&nbsp;<?php echo $list['discount']; ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php if(count($avalibility_list)>0){ ?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="Availability">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					    Availability
					  </a>
				  </h4>

					</div>
					<?php //echo '<pre>';print_r($avalibility_list);exit; ?>
					<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="Availability">
						<div class="panel-body">
							<select onchange="mobileaccessories(this.value, '<?php echo 'status'; ?>','<?php echo ''; ?>');" name="products[availability]" class="form-control" id="sel1">
								<option value="">Select</option>
								
								<?php foreach ($avalibility_list as $list){ ?>
								<option value="<?php echo $list; ?>"><?php if($list==1){ echo "Instock";}else{ echo "Out of stock";}; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<?php } ?>
				
				
				
			</div>
			<?php } ?>
			</form>
		</div>
        <!-- End Filter Sidebar -->

        <!-- Product List -->
		<div id="sucessmsg" style="display:none;"></div>
        <div class="col-md-9">
          <div class="title"><span><?php echo ucfirst(strtolower(isset($category_name['category_name'])?$category_name['category_name']:'')); ?>&nbsp; Category Products lists</span></div>
		<?php //echo '<pre>';print_r($subcategory_porduct_list);exit; ?>
		<div  style="display:none;" class="alert dark alert-success alert-dismissible" id="sucessmsg"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
            </button>
		</div>
		
		<?php //echo'<pre>';print_r($avg_count);exit;
		$customerdetails=$this->session->userdata('userdetails');
		$cnt=1;foreach($subcategory_porduct_list as $productslist){ 
		//echo'<pre>';print_r($avg_count);exit;
			$currentdate=date('Y-m-d h:i:s A');
				if($productslist['offer_expairdate']>=$currentdate){
				$item_price= ($productslist['item_cost']-$productslist['offer_amount']);
				$percentage= $productslist['offer_percentage'];
				$orginal_price=$productslist['item_cost'];
				}else{
					//echo "expired";
					$item_price= $productslist['special_price'];
					$prices= ($productslist['item_cost']-$productslist['special_price']);
					$percentage= (($prices) /$productslist['item_cost'])*100;
					$orginal_price=$productslist['item_cost'];
				}
				
			
				?>
		 <form action="<?php echo base_url('customer/addcart'); ?>" method="Post" name="addtocart" id="addtocart" >
			<input type="hidden" name="producr_id" id="producr_id" value="<?php echo $productslist['item_id']; ?>" >
			<input type="hidden" name="category_id" id="category_id" value="<?php echo $productslist['category_id']; ?>" >
			<input type="hidden" name="qty" id="qty" value="1" >
			
          <div class=" col-md-3 box-product-outer" style="width:23%">
            <div class="box-product">
              <div class="img-wrapper item">
			   <div class="img_size text-center">
                <a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>">
                  <img alt="Product" src="<?php echo base_url('uploads/products/'.$productslist['item_image']); ?>">
                </a>
				</div>
              
				<?php if($productslist['item_quantity']<=0){ ?>
				<div style="background:#45b1b5;color:#fff;padding:2px;" class="text-center">
					<div style="z-index:1026"><h4>out of stock</h4></div>
				</div>
				<?php } ?>
				
				<div class="option ">
				<?php if($productslist['item_quantity']>0 && $productslist['category_id']==18 || $productslist['category_id']==21){ ?>
				<?php 	if (in_array($productslist['item_id'], $cart_item_ids) &&  in_array($customerdetails['customer_id'], $cust_ids)) { ?>
				<a class="add-to-cart" style="cursor:pointer;" onclick="itemaddtocart('<?php echo $productslist['item_id']; ?>','<?php echo $productslist['category_id']; ?>','<?php echo $cnt; ?>');" data-toggle="tooltip" title="Add to Cart"><i id="addticartitem<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" class="fa fa-shopping-cart text-primary"></i></a>                  
				<?php }else{ ?>	
				<a class="add-to-cart" style="cursor:pointer;" onclick="itemaddtocart('<?php echo $productslist['item_id']; ?>','<?php echo $productslist['category_id']; ?>','<?php echo $cnt; ?>');" data-toggle="tooltip" title="Add to Cart"><i id="addticartitem<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" class="fa fa-shopping-cart"></i></a>                  
				<?php } ?>
				<?php } ?>
				<?php 	if (in_array($productslist['item_id'], $whishlist_item_ids_list) &&  in_array($customerdetails['customer_id'], $customer_ids_list)) { ?>
				<a href="javascript:void(0);" onclick="addwhishlidts('<?php echo $productslist['item_id']; ?>','<?php echo $cnt; ?>');" id="addwhish<?php echo $productslist['item_id']; ?>" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" class="fa fa-heart text-primary"></i></a> 
				<?php }else{ ?>	
				<a href="javascript:void(0);" onclick="addwhishlidts('<?php echo $productslist['item_id']; ?>','<?php echo $cnt; ?>');" id="addwhish" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" class="fa fa-heart "></i></a> 
				<?php } ?>	
				</div>
              </div>
              <h6><a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>"><?php echo $productslist['item_name']; ?></a></h6>
               <div class="price">
               
				<div class="text-center" style="color:#187a7d;">₹ <?php echo ($item_price); ?> 
			<?php if($percentage!=''){ ?> &nbsp;
			<span class="price-old">₹ <?php echo $orginal_price; ?></span>
				<span class="label-tags"><p class=" text-success"> <?php echo number_format($percentage, 2, '.', ''); ?>% off</p></span>
			<?Php }else{ ?>
			<?php } ?>
				</div>
				 <div class="clearfix"></div>
            
              </div>
              <div class="rating text-center">
                <?php foreach ($avg_count as $li){
				$idslist[]=$li['item_id'];			
				if($productslist['item_id']==$li['item_id']){?>
				<?php if(round($li['avg'])==1){  ?>
					    <i class="fa fa-star product-rateing"> </i>
						<i class="fa fa-star product-ratings"></i>
						<i class="fa fa-star product-ratings"></i>
						<i class="fa fa-star product-ratings"></i>
						<i class="fa fa-star product-ratings"></i>
					 	<?php }else if(round($li['avg'])==2){  ?>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-ratings"> </i>
							<i class="fa fa-star product-ratings"> </i>
							<i class="fa fa-star product-ratings"> </i>
						<?php }else if(round($li['avg'])==3){  ?>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-ratings"> </i>
							<i class="fa fa-star product-ratings"> </i>
						<?php }else if(round($li['avg'])==4){  ?>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-rateing"> </i>
							<i class="fa fa-star product-ratings"> </i>
					  <?php }else if(round($li['avg'])==5){  ?>
					  <i class="fa fa-star product-rateing"> </i>
					  <i class="fa fa-star product-rateing"> </i>
					  <i class="fa fa-star product-rateing"> </i>
					  <i class="fa fa-star product-rateing"> </i>
					  <i class="fa fa-star product-rateing"> </i>
					  <?php } ?>			
				
				<?php }?>
					 <?php } ?>	
					 	<?php 	if (!in_array($productslist['item_id'], $idslist)){ ?>
							<i class="fa fa-star product-ratings"></i>
						<i class="fa fa-star product-ratings"></i>
						<i class="fa fa-star product-ratings"></i>
						<i class="fa fa-star product-ratings"></i>
						<i class="fa fa-star product-ratings"></i>
							
						<?php } ?>
				<?php foreach ($rating_count as $li){ 
				if($productslist['item_id']==$li['item_id']){?>
				<a href="<?php echo base_url('category/productview/'.base64_encode($li['item_id'])); ?>">(<?php echo $li['count']; ?>  reviews)</a>
				<?php }} ?>
			</div>
            </div>
			
			
          </div>
		  </form>
		  <?php  
			if(($cnt % 4)==0){?> 
			<div class="clearfix"></div>
			<?php } ?>
		   
		  <?php  $cnt++;} ?>
         
       
       

	 <div class="clearfix"></div>
	  
	 
          
</div>
      
    </div>
	 </div>
	 <div class="clearfix"></div>
	
	 <br>
</body>
<script>
 function itemaddtocart(itemid,catid,val){

jQuery.ajax({
        url: "<?php echo site_url('customer/onclickaddcart');?>",
        type: 'post',
          data: {
          form_key : window.FORM_KEY,
          producr_id: itemid,
		  category_id: catid,
		  qty: '1',
          },
        dataType: 'json',
        success: function (data) {
           if(data.msg==0){
					window.location='<?php echo base_url("customer/"); ?>'; 
				}else{
						jQuery('#sucessmsg').show();
						$("#supcount").empty();
						$("#supcount").append(data.count);
						if(data.msg==2){
						$("#addticartitem"+itemid+val).removeClass("text-primary");
						$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> Product Successfully Removed to cart <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
						}
						if(data.msg==1){
						 $("#addticartitem"+itemid+val).addClass("text-primary");
						//$('#addwhish').css("color", "yellow");
						$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> Product Successfully added to cart <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
						}
				}

        }
      });

 }
function mobileaccessories(val,status,check){
	
	jQuery.ajax({
		
				url: "<?php echo site_url('category/categorywiseearch');?>",
				type: 'post',
			
				data: {
					form_key : window.FORM_KEY,
					categoryid: '<?php echo $this->uri->segment(3); ?>',
					productsvalues: val,
					searchvalue: status,
					unchecked: check,
					mini_mum: $('#input-select').val(),
					maxi_mum: $('#input-number').val(),

					},
				dataType: 'html',
				success: function (data) {
					$("#containerhigh").empty();
					$("#containerhighold").hide();
					$("#containerhigh").show();
					$("#containerhigh").append(data);
	}
});
}
function discount(id){
	var form = document.getElementById("discountform");

document.getElementById("discountform").addEventListener("click", function () {
  form.submit();
});
	
}
function addwhishlidts(id,val){
jQuery.ajax({
			url: "<?php echo site_url('customer/addwhishlist');?>",
			type: 'post',
			data: {
				form_key : window.FORM_KEY,
				item_id: id,
				},
			dataType: 'JSON',
			success: function (data) {
				if(data.msg==0){
					window.location='<?php echo base_url("customer/"); ?>'; 
				}else{
				jQuery('#sucessmsg').show();
				//alert(data.msg);
				if(data.msg==2){
				$('#sucessmsg').show('');
				$("#addwishlistids"+id+val).removeClass("text-primary");
						$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> Product Successfully Removed to Whishlist <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
				document.getElementById("sucessmsg").focus();
				
				}
				if(data.msg==1){
				$('#sucessmsg').show('');
				 $("#addwishlistids"+id+val).addClass("text-primary");
						$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> Product Successfully added to Whishlist <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
				document.getElementById("sucessmsg").focus();				
				}
				
				}
			

			}
		});
	
	
}
function getproduct(id){
	if(id!=''){
	jQuery.ajax({
				url: "<?php echo site_url('category/categorywiseproductslist');?>",
				type: 'post',
				data: {
				subcategoryid: id,
				},
				dataType: 'html',
				success: function (data) {
					
					
					$("#subcategorywise_products").empty();
					$("#subcategorywise_products").append(data);
				}
			});
			
	}
	
	
}
(function($) {
    $(function() {
        $('.test').fSelect();
    });
})(jQuery);
</script>
<script>
		var select = document.getElementById('input-select');

// Append the option elements
for ( var i = '<?php echo floor($minimum_price['item_cost']); ?>'; i <= '<?php echo floor($maximum_price['item_cost']); ?>'; i++ ){

	var option = document.createElement("option");
		option.text = i;
		option.value = i;

	select.appendChild(option);
}

		var html5Slider = document.getElementById('html5');

noUiSlider.create(html5Slider, {
	start: [ '<?php echo floor($minimum_price['item_cost']); ?>', '<?php echo floor($maximum_price['item_cost']); ?>' ],
	connect: true,
	range: {
		'min': <?php echo floor($minimum_price['item_cost']); ?>,
		'max': <?php echo floor($maximum_price['item_cost']); ?>
	}
});

		var inputNumber = document.getElementById('input-number');

html5Slider.noUiSlider.on('update', function( values, handle ) {

	var value = values[handle];

	if ( handle ) {
		inputNumber.value = value;
	} else {
		select.value = Math.round(value);
	}
});

select.addEventListener('change', function(){
	html5Slider.noUiSlider.set([this.value, null]);
});

inputNumber.addEventListener('change', function(){
	html5Slider.noUiSlider.set([null, this.value]);
});
	</script>
	<script>

$('.add-to-cart').on('click', function () {
        var cart = $('.shopping_cart');
        var imgtodrag = $(this).parent().parent('.item').find("img").eq(0);
        if (imgtodrag) {
			//alert();
            var imgclone = imgtodrag.clone()
                .offset({
                top: imgtodrag.offset().top,
                left: imgtodrag.offset().left
            })
                .css({
                'opacity': '0.5',
                    'position': 'absolute',
                    'height': '150px',
                    'width': '150px',
                    'z-index': '1026'
            })
                .appendTo($('body'))
                .animate({
                'top': cart.offset().top + 10,
                    'left': cart.offset().left + 10,
                    'width': 75,
                    'height': 75
            }, 1000, 'easeInOutExpo');
            
            setTimeout(function () {
                cart.effect("shake", {
                    times: 2
                }, 200);
            }, 1500);

            imgclone.animate({
                'width': 0,
                    'height': 0
            }, function () {
                $(this).detach()
            });
        }
    });
</script>
