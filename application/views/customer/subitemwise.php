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
   
   #input-select,
   #input-number {
   padding: 7px;
   margin: 15px 5px 5px;
   width: 110px;
   } 
   #input-select1,
   #input-number1 {
   padding: 7px;
   margin: 15px 5px 5px;
   width: 110px;
   }
   .wish{
   color:#ef5350;
   }
   #slider-text{
   padding-top: 40px;
   display: block;
   }
   #slider-text .col-md-6{
   overflow: hidden;
   }
   #slider-text h2 {
   font-family: 'Josefin Sans', sans-serif;
   font-weight: 400;
   font-size: 30px;
   letter-spacing: 3px;
   margin: 30px auto;
   padding-left: 40px;
   }
   #slider-text h2::after{
   border-top: 2px solid #c7c7c7;
   content: "";
   position: absolute;
   bottom: 35px;
   width: 100%;
   }
   #itemslider h4{
   font-family: 'Josefin Sans', sans-serif;
   font-weight: 400;
   font-size: 12px;
   margin: 10px auto 3px;
   }
   #itemslider h5{
   font-family: 'Josefin Sans', sans-serif;
   font-weight: bold;
   font-size: 12px;
   margin: 3px auto 2px;
   }
   #itemslider h6{
   font-family: 'Josefin Sans', sans-serif;
   font-weight: 300;;
   font-size: 10px;
   margin: 2px auto 5px;
   }
   .badge {
   background: #b20c0c;
   position: absolute;
   height: 40px;
   width: 40px;
   border-radius: 50%;
   line-height: 31px;
   font-family: 'Josefin Sans', sans-serif;
   font-weight: 300;
   font-size: 14px;
   border: 2px solid #FFF;
   box-shadow: 0 0 0 1px #b20c0c;
   top: 5px;
   right: 25%;
   }
   #slider-control img{
   padding-top: 60%;
   margin: 0 auto;
   }
   @media screen and (max-width: 992px){
   #slider-control img {
   padding-top: 70px;
   margin: 0 auto;
   }
   }
   .carousel-showmanymoveone .carousel-control {
   width: 4%;
   background-image: none;
   }
   .carousel-showmanymoveone .carousel-control.left {
   margin-left: 5px;
   }
   .carousel-showmanymoveone .carousel-control.right {
   margin-right: 5px;
   }
   .carousel-showmanymoveone .cloneditem-1,
   .carousel-showmanymoveone .cloneditem-2,
   .carousel-showmanymoveone .cloneditem-3,
   .carousel-showmanymoveone .cloneditem-4,
   .carousel-showmanymoveone .cloneditem-5 {
   display: none;
   }
   @media all and (min-width: 768px) {
   .carousel-showmanymoveone .carousel-inner > .active.left,
   .carousel-showmanymoveone .carousel-inner > .prev {
   left: -50%;
   }
   .carousel-showmanymoveone .carousel-inner > .active.right,
   .carousel-showmanymoveone .carousel-inner > .next {
   left: 50%;
   }
   .carousel-showmanymoveone .carousel-inner > .left,
   .carousel-showmanymoveone .carousel-inner > .prev.right,
   .carousel-showmanymoveone .carousel-inner > .active {
   left: 0;
   }
   .carousel-showmanymoveone .carousel-inner .cloneditem-1 {
   display: block;
   }
   }
   @media all and (min-width: 768px) and (transform-3d), all and (min-width: 768px) and (-webkit-transform-3d) {
   .carousel-showmanymoveone .carousel-inner > .item.active.right,
   .carousel-showmanymoveone .carousel-inner > .item.next {
   -webkit-transform: translate3d(50%, 0, 0);
   transform: translate3d(50%, 0, 0);
   left: 0;
   }
   .carousel-showmanymoveone .carousel-inner > .item.active.left,
   .carousel-showmanymoveone .carousel-inner > .item.prev {
   -webkit-transform: translate3d(-50%, 0, 0);
   transform: translate3d(-50%, 0, 0);
   left: 0;
   }
   .carousel-showmanymoveone .carousel-inner > .item.left,
   .carousel-showmanymoveone .carousel-inner > .item.prev.right,
   .carousel-showmanymoveone .carousel-inner > .item.active {
   -webkit-transform: translate3d(0, 0, 0);
   transform: translate3d(0, 0, 0);
   left: 0;
   }
   }
   @media all and (min-width: 992px) {
   .carousel-showmanymoveone .carousel-inner > .active.left,
   .carousel-showmanymoveone .carousel-inner > .prev {
   left: -16.666%;
   }
   .carousel-showmanymoveone .carousel-inner > .active.right,
   .carousel-showmanymoveone .carousel-inner > .next {
   left: 16.666%;
   }
   .carousel-showmanymoveone .carousel-inner > .left,
   .carousel-showmanymoveone .carousel-inner > .prev.right,
   .carousel-showmanymoveone .carousel-inner > .active {
   left: 0;
   }
   .carousel-showmanymoveone .carousel-inner .cloneditem-2,
   .carousel-showmanymoveone .carousel-inner .cloneditem-3,
   .carousel-showmanymoveone .carousel-inner .cloneditem-4,
   .carousel-showmanymoveone .carousel-inner .cloneditem-5,
   .carousel-showmanymoveone .carousel-inner .cloneditem-6  {
   display: block;
   }
   }
   @media all and (min-width: 992px) and (transform-3d), all and (min-width: 992px) and (-webkit-transform-3d) {
   .carousel-showmanymoveone .carousel-inner > .item.active.right,
   .carousel-showmanymoveone .carousel-inner > .item.next {
   -webkit-transform: translate3d(16.666%, 0, 0);
   transform: translate3d(16.666%, 0, 0);
   left: 0;
   }
   .carousel-showmanymoveone .carousel-inner > .item.active.left,
   .carousel-showmanymoveone .carousel-inner > .item.prev {
   -webkit-transform: translate3d(-16.666%, 0, 0);
   transform: translate3d(-16.666%, 0, 0);
   left: 0;
   }
   .carousel-showmanymoveone .carousel-inner > .item.left,
   .carousel-showmanymoveone .carousel-inner > .item.prev.right,
   .carousel-showmanymoveone .carousel-inner > .item.active {
   -webkit-transform: translate3d(0, 0, 0);
   transform: translate3d(0, 0, 0);
   left: 0;
   }
   }
   @media (max-width: 1024px) {
   #input-select,
   #input-number {
   padding: 7px;
   margin: 15px 5px 5px;
   width: 77px;
   }
   }
   </style>
   <?php if(isset($subitemwise_item_list)&& count($subitemwise_item_list)>0){ ?>
		<section>
			<div class="col-md-offset-3">
			<ul class="sec-des">
			<?php foreach ($subitemwise_item_list as $list){ ?>
				<a href="<?php echo base_url('category/item/'.base64_encode($list['id'])); ?>"><li><?php echo $list['item_name']; ?></li></a>
			<?php } ?>
			</ul>
			</div>
		</section>
		<?php } ?>
		<div class="clearfix">&nbsp;</div>
	
   <span id="filtersubitemwisedata"></span>
   <span id="subitemwisedata">
 <div class="col-sm-3">
            <div class="title"><span>Filters</span></div>
			<input type="hidden" id="subitemid" name="subitemid" value="<?php echo $subitemid; ?>">
			<input type="hidden" id="subcatid" name="subcatid" value="<?php echo $subcatid; ?>">
              <div class="row">
				  <div class="col-md-6">
				  <h4>Min:<span class="site_col"><?php echo $minimum_price['item_cost']; ?></span></h4>
				  <input type="hidden" id="min" name="min" value="<?php echo $minimum_price['item_cost']; ?>">
				  </div>
				  <div class="col-md-6">
				 <h4>Max:<span class="site_col"><?php echo $maximum_price['item_cost']; ?></span></h4>
				  <input type="hidden" id="max" name="max" value="<?php echo $maximum_price['item_cost']; ?>">
				  </div>
			</div>
		  <div class="row">
		  <div class="col-md-6">
		   <select class="form-control" name="mimimum_price" id="mimimum_price" onchange="subitemwisefilters(this.value, '<?php echo 'mimimum_price'; ?>','<?php echo ''; ?>');">
				 <?php for( $i=floor($minimum_price['item_cost']); $i<=floor($maximum_price['item_cost']); $i+=1000 ){  ?>
				<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
				<?php } ?>
				
			  </select>
		  </div>
		  <div class="col-md-6">
		   <select class="form-control" id="maximum_price" name="maximum_price" onchange="subitemwisefilters(this.value, '<?php echo 'maximum_price'; ?>','<?php echo ''; ?>');">
				 <?php if($minimum_price['item_cost'] !=$maximum_price['item_cost']){ ?>
					 <?php for( $i=floor($minimum_price['item_cost']+1000); $i<=floor($maximum_price['item_cost']); $i+=1000 ){  ?>
					<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
					<?php } ?>
				 <?php }else{ ?>
				 <option value="<?php echo $maximum_price['item_cost']; ?>"><?php echo $maximum_price['item_cost']; ?></option>
				 <?php } ?>

			  </select>
		  </div>
		  </div><br>
               <input type="hidden" name="categoryid" id="categoryid" value="<?php echo $this->uri->segment(3);?>">
               <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  <?php if(isset($offer_list) && count($offer_list)>0){?>
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
                           <div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'offer'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[offers][]" value="<?php echo $list['offers']; ?>"><span>&nbsp;<?php echo number_format($list['offers'], 2, '.', ''); ?></span></label></div>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
                  <?php if(isset($brand_list) && count($brand_list)>0){?>
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
                           <div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'brand'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[brand][]" value="<?php echo $list['brand']; ?>"><span>&nbsp;<?php echo $list['brand']; ?></span></label></div>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
                  <?php if(isset($discount_list) && count($discount_list)>0){ ?>
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
                           <div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'discount'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[discount][]" value="<?php echo $list['discount']; ?>"><span>&nbsp;<?php echo $list['discount']; ?></span></label></div>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
               <?php if(isset($color_list) && count($color_list)>0){ ?>
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
                           <div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'colour'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[color][]" value="<?php echo $list['colour']; ?>"><span>&nbsp;<?php echo $list['colour']; ?></span></label></div>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
				  	<?php  if(isset($sizes_list) && count($sizes_list)>0){ ?>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingThree">
						 <h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					  SIZE	
					  </a>
				  </h4>

					</div>
					<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
						<?php foreach ($sizes_list as $list){ ?>
							<div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'size'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[size][]" value="<?php echo $list['size']; ?>"><span>&nbsp;<?php echo $list['size']; ?></span></label></div>
						
						<?php } ?>
						</div>
					</div>
				</div>
				<?php  } ?>
						<?php if(isset($ram_list) && count($ram_list)>0){?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingThreecomram">
							<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							RAM	
							</a>
							</h4>

						</div>
						<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThreecomram">
							<div class="panel-body">
							<?php foreach ($ram_list as $list){ ?>
								<div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'ram'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[ram][]" value="<?php echo $list['ram']; ?>"><span>&nbsp;<?php echo $list['ram']; ?></span></label></div>

							<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if(isset($os_list) && count($os_list)>0){?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingos">
							<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseos" aria-expanded="false" aria-controls="collapseos">
							OS	
							</a>
							</h4>

						</div>
						<div id="collapseos" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingos">
							<div class="panel-body">
							<?php foreach ($os_list as $list){ ?>
								<div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'os'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[os][]" value="<?php echo $list['os']; ?>"><span>&nbsp;<?php echo $list['os']; ?></span></label></div>

							<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if(isset($sim_list) && count($sim_list)>0){?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingsim_list">
							<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapsesim_list" aria-expanded="false" aria-controls="collapsesim_list">
							Sim Type	
							</a>
							</h4>

						</div>
						<div id="collapsesim_list" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingsim_list">
							<div class="panel-body">
							<?php foreach ($sim_list as $list){?>
								<div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'sim_type'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[sim_type][]" value="<?php echo $list['sim_type']; ?>"><span>&nbsp;<?php echo $list['sim_type']; ?></span></label></div>

							<?php }   ?>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if(isset($camera_list) && count($camera_list)>0){?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingcamera">
							<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapsecamera" aria-expanded="false" aria-controls="collapsecamera">
							Camera	
							</a>
							</h4>

						</div>
						<div id="collapsecamera" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingcamera">
							<div class="panel-body">
							<?php foreach ($camera_list as $list){ ?>
								<div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'camera'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[camera][]" value="<?php echo $list['camera']; ?>"><span>&nbsp;<?php echo $list['camera']; ?></span></label></div>

							<?php }  ?>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if(isset($internal_memeory_list) && count($internal_memeory_list)>0){?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headinginternal_memeory">
							<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseinternal_memeory" aria-expanded="false" aria-controls="collapseinternal_memeory">
							Internal Memory	
							</a>
							</h4>

						</div>
						<div id="collapseinternal_memeory" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headinginternal_memeory">
							<div class="panel-body">
							<?php foreach ($internal_memeory_list as $list){ ?>
								<div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'internal_memeory'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[internal_memeory][]" value="<?php echo $list['internal_memeory']; ?>"><span>&nbsp;<?php echo $list['internal_memeory']; ?></span></label></div>

							<?php   } ?>
							</div>
						</div>
					</div>
					<?php } ?>
						<?php if(isset($screen_size_list) && count($screen_size_list)>0){?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingscreen_size">
							<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapsescreen_size" aria-expanded="false" aria-controls="collapsescreen_size">
							Screen size	
							</a>
							</h4>

						</div>
						<div id="collapsescreen_size" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingscreen_size">
							<div class="panel-body">
							<?php foreach ($screen_size_list as $list){ ?>
								<div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'screen_size'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[screen_size][]" value="<?php echo $list['screen_size']; ?>"><span>&nbsp;<?php echo $list['screen_size']; ?></span></label></div>

							<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if(isset($Processor_list) && count($Processor_list)>0){?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingProcessor">
							<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseProcessor" aria-expanded="false" aria-controls="collapseProcessor">
							Processor	
							</a>
							</h4>

						</div>
						<div id="collapseProcessor" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingProcessor">
							<div class="panel-body">
							<?php foreach ($Processor_list as $list){  ?>
								<div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'Processor'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[Processor][]" value="<?php echo $list['Processor']; ?>"><span>&nbsp;<?php echo $list['Processor']; ?></span></label></div>

							<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
				
					<?php if(isset($type_list) && count($type_list)>0){?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingProcessor3">
							<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseProcessor3" aria-expanded="false" aria-controls="collapseProcessor3">
							type	
							</a>
							</h4>

						</div>
						<div id="collapseProcessor3" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingProcessor3">
							<div class="panel-body">
							<?php foreach ($type_list as $list){  ?>
								<div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'type'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[type][]" value="<?php echo $list['type']; ?>"><span>&nbsp;<?php echo $list['type']; ?></span></label></div>

							<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if(isset($printer_type) && count($printer_type)>0){?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingProcessor4">
							<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseProcessor4" aria-expanded="false" aria-controls="collapseProcessor4">
							Printer Type	
							</a>
							</h4>
						</div>
						<div id="collapseProcessor4" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingProcessor4">
							<div class="panel-body">
							<?php foreach ($printer_type as $list){  ?>
								<div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'printer_type'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[printer_type][]" value="<?php echo $list['printer_type']; ?>"><span>&nbsp;<?php echo $list['printer_type']; ?></span></label></div>

							<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
					
					<?php if(isset($max_copies) && count($max_copies)>0){?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingProcessor6">
							<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseProcessor6" aria-expanded="false" aria-controls="collapseProcessor6">
							Max Copies	
							</a>
							</h4>
						</div>
						<div id="collapseProcessor6" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingProcessor6">
							<div class="panel-body">
							<?php foreach ($max_copies as $list){  ?>
								<div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'max_copies'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[max_copies][]" value="<?php echo $list['max_copies']; ?>"><span>&nbsp;<?php echo $list['max_copies']; ?></span></label></div>

							<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if(isset($paper_size) && count($paper_size)>0){?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingProcessor7">
							<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseProcessor7" aria-expanded="false" aria-controls="collapseProcessor7">
							Max Copies	
							</a>
							</h4>
						</div>
						<div id="collapseProcessor7" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingProcessor7">
							<div class="panel-body">
							<?php foreach ($paper_size as $list){  ?>
								<div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'paper_size'; ?>','<?php echo ''; ?>');" id="checkbox1" name="products[paper_size][]" value="<?php echo $list['paper_size']; ?>"><span>&nbsp;<?php echo $list['paper_size']; ?></span></label></div>

							<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if(isset($headphone_jack) && count($headphone_jack)>0){?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingProcessor8">
							<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseProcessor8" aria-expanded="false" aria-controls="collapseProcessor8">
							Headphone Jack	
							</a>
							</h4>
						</div>
						<div id="collapseProcessor8" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingProcessor8">
							<div class="panel-body">
							<?php foreach ($headphone_jack as $list){  ?>
								<div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'headphone_jack'; ?>','<?php echo ''; ?>');" id="headphone_jack" name="products[headphone_jack][]" value="<?php echo $list['headphone_jack']; ?>"><span>&nbsp;<?php echo $list['headphone_jack']; ?></span></label></div>

							<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if(isset($noise_reduction) && count($noise_reduction)>0){?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingProcessor9">
							<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseProcessor9" aria-expanded="false" aria-controls="collapseProcessor9">
							Noise Reduction	
							</a>
							</h4>
						</div>
						<div id="collapseProcessor9" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingProcessor9">
							<div class="panel-body">
							<?php foreach ($noise_reduction as $list){  ?>
								<div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'noise_reduction'; ?>','<?php echo ''; ?>');" id="noise_reduction" name="products[noise_reduction][]" value="<?php echo $list['noise_reduction']; ?>"><span>&nbsp;<?php echo $list['noise_reduction']; ?></span></label></div>

							<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if(isset($usb_port) && count($usb_port)>0){?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingProcessor10">
							<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseProcessor10" aria-expanded="false" aria-controls="collapseProcessor10">
							Usb Port	
							</a>
							</h4>
						</div>
						<div id="collapseProcessor10" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingProcessor10">
							<div class="panel-body">
							<?php foreach ($usb_port as $list){  ?>
								<div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'usb_port'; ?>','<?php echo ''; ?>');" id="usb_port" name="products[usb_port][]" value="<?php echo $list['usb_port']; ?>"><span>&nbsp;<?php echo $list['usb_port']; ?></span></label></div>

							<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if(isset($compatible_for) && count($compatible_for)>0){?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingProcessor11">
							<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseProcessor11" aria-expanded="false" aria-controls="collapseProcessor11">
							Compatible For	
							</a>
							</h4>
						</div>
						<div id="collapseProcessor11" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingProcessor11">
							<div class="panel-body">
							<?php foreach ($compatible_for as $list){  ?>
								<div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'compatible_for'; ?>','<?php echo ''; ?>');" id="compatible_for" name="products[compatible_for][]" value="<?php echo $list['compatible_for']; ?>"><span>&nbsp;<?php echo $list['compatible_for']; ?></span></label></div>

							<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if(isset($scanner_type) && count($scanner_type)>0){?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingProcessor12">
							<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseProcessor12" aria-expanded="false" aria-controls="collapseProcessor12">
							Scanner Type	
							</a>
							</h4>
						</div>
						<div id="collapseProcessor12" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingProcessor12">
							<div class="panel-body">
							<?php foreach ($scanner_type as $list){  ?>
								<div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'scanner_type'; ?>','<?php echo ''; ?>');" id="scanner_type" name="products[scanner_type][]" value="<?php echo $list['scanner_type']; ?>"><span>&nbsp;<?php echo $list['scanner_type']; ?></span></label></div>

							<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if(isset($resolution) && count($resolution)>0){?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingProcessor13">
							<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseProcessor13" aria-expanded="false" aria-controls="collapseProcessor13">
							Resolution	
							</a>
							</h4>
						</div>
						<div id="collapseProcessor13" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingProcessor13">
							<div class="panel-body">
							<?php foreach ($resolution as $list){  ?>
								<div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'resolution'; ?>','<?php echo ''; ?>');" id="resolution" name="products[resolution][]" value="<?php echo $list['resolution']; ?>"><span>&nbsp;<?php echo $list['resolution']; ?></span></label></div>

							<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if(isset($f_stop) && count($f_stop)>0){?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingProcessor14">
							<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseProcessor14" aria-expanded="false" aria-controls="collapseProcessor14">
							F/stop	
							</a>
							</h4>
						</div>
						<div id="collapseProcessor14" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingProcessor14">
							<div class="panel-body">
							<?php foreach ($f_stop as $list){  ?>
								<div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'f_stop'; ?>','<?php echo ''; ?>');" id="f_stop" name="products[f_stop][]" value="<?php echo $list['f_stop']; ?>"><span>&nbsp;<?php echo $list['f_stop']; ?></span></label></div>

							<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if(isset($minimum_focusing_distance) && count($minimum_focusing_distance)>0){?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingProcessor15">
							<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseProcessor15" aria-expanded="false" aria-controls="collapseProcessor15">
							Focusing Distance	
							</a>
							</h4>
						</div>
						<div id="collapseProcessor15" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingProcessor15">
							<div class="panel-body">
							<?php foreach ($minimum_focusing_distance as $list){  ?>
								<div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'minimum_focusing_distance'; ?>','<?php echo ''; ?>');" id="minimum_focusing_distance" name="products[minimum_focusing_distance][]" value="<?php echo $list['minimum_focusing_distance']; ?>"><span>&nbsp;<?php echo $list['minimum_focusing_distance']; ?></span></label></div>

							<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if(isset($aperture_withmaxfocal_length) && count($aperture_withmaxfocal_length)>0){?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingProcessor16">
							<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseProcessor16" aria-expanded="false" aria-controls="collapseProcessor16">
							Maximum Focuc Length	
							</a>
							</h4>
						</div>
						<div id="collapseProcessor16" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingProcessor16">
							<div class="panel-body">
							<?php foreach ($aperture_withmaxfocal_length as $list){  ?>
								<div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'aperture_withmaxfocal_length'; ?>','<?php echo ''; ?>');" id="aperture_withmaxfocal_length" name="products[aperture_withmaxfocal_length][]" value="<?php echo $list['aperture_withmaxfocal_length']; ?>"><span>&nbsp;<?php echo $list['aperture_withmaxfocal_length']; ?></span></label></div>

							<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if(isset($picture_angle) && count($picture_angle)>0){?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingProcessor17">
							<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseProcessor17" aria-expanded="false" aria-controls="collapseProcessor17">
							Picture Angle
							</a>
							</h4>
						</div>
						<div id="collapseProcessor17" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingProcessor17">
							<div class="panel-body">
							<?php foreach ($picture_angle as $list){  ?>
								<div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'picture_angle'; ?>','<?php echo ''; ?>');" id="picture_angle" name="products[picture_angle][]" value="<?php echo $list['picture_angle']; ?>"><span>&nbsp;<?php echo $list['picture_angle']; ?></span></label></div>

							<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
					
					<?php if(isset($weight_list) && count($weight_list)>0){?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingProcessor19">
							<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseProcessor19" aria-expanded="false" aria-controls="collapseProcessor19">
							Weight
							</a>
							</h4>
						</div>
						<div id="collapseProcessor19" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingProcessor19">
							<div class="panel-body">
							<?php foreach ($weight_list as $list){  ?>
								<div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'weight'; ?>','<?php echo ''; ?>');" id="weight" name="products[weight][]" value="<?php echo $list['weight']; ?>"><span>&nbsp;<?php echo $list['weight']; ?></span></label></div>

							<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if(isset($occasion_list) && count($occasion_list)>0){?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingProcessor20">
							<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseProcessor20" aria-expanded="false" aria-controls="collapseProcessor20">
							Occasion
							</a>
							</h4>
						</div>
						<div id="collapseProcessor20" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingProcessor20">
							<div class="panel-body">
							<?php foreach ($occasion_list as $list){  ?>
								<div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'occasion'; ?>','<?php echo ''; ?>');" id="occasion" name="products[occasion][]" value="<?php echo $list['occasion']; ?>"><span>&nbsp;<?php echo $list['occasion']; ?></span></label></div>

							<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if(isset($material_list) && count($material_list)>0){?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingProcessor21">
							<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseProcessor21" aria-expanded="false" aria-controls="collapseProcessor21">
							Material
							</a>
							</h4>
						</div>
						<div id="collapseProcessor21" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingProcessor21">
							<div class="panel-body">
							<?php foreach ($material_list as $list){  ?>
								<div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'material'; ?>','<?php echo ''; ?>');" id="material" name="products[material][]" value="<?php echo $list['material']; ?>"><span>&nbsp;<?php echo $list['material']; ?></span></label></div>

							<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if(isset($collar_type) && count($collar_type)>0){?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingProcessor22">
							<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseProcessor22" aria-expanded="false" aria-controls="collapseProcessor22">
							Collar Type
							</a>
							</h4>
						</div>
						<div id="collapseProcessor22" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingProcessor22">
							<div class="panel-body">
							<?php foreach ($collar_type as $list){  ?>
								<div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'collar_type'; ?>','<?php echo ''; ?>');" id="collar_type" name="products[collar_type][]" value="<?php echo $list['collar_type']; ?>"><span>&nbsp;<?php echo $list['collar_type']; ?></span></label></div>
							<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if(isset($gender_list) && count($gender_list)>0){?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingProcessor23">
							<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseProcessor23" aria-expanded="false" aria-controls="collapseProcessor23">
							Gender
							</a>
							</h4>
						</div>
						<div id="collapseProcessor23" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingProcessor23">
							<div class="panel-body">
							<?php foreach ($gender_list as $list){  ?>
								<div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'gender'; ?>','<?php echo ''; ?>');" id="gender" name="products[gender][]" value="<?php echo $list['gender']; ?>"><span>&nbsp;<?php echo $list['gender']; ?></span></label></div>
							<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if(isset($sleeve_list) && count($sleeve_list)>0){?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingProcessor24">
							<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseProcessor24" aria-expanded="false" aria-controls="collapseProcessor24">
							Sleeve
							</a>
							</h4>
						</div>
						<div id="collapseProcessor24" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingProcessor24">
							<div class="panel-body">
							<?php foreach ($sleeve_list as $list){  ?>
								<div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'sleeve'; ?>','<?php echo ''; ?>');" id="sleeve" name="products[sleeve][]" value="<?php echo $list['sleeve']; ?>"><span>&nbsp;<?php echo $list['sleeve']; ?></span></label></div>
							<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if(isset($look_list) && count($look_list)>0){?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingProcessor25">
							<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseProcessor25" aria-expanded="false" aria-controls="collapseProcessor25">
							Look
							</a>
							</h4>
						</div>
						<div id="collapseProcessor25" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingProcessor25">
							<div class="panel-body">
							<?php foreach ($look_list as $list){  ?>
								<div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'look'; ?>','<?php echo ''; ?>');" id="look" name="products[look][]" value="<?php echo $list['look']; ?>"><span>&nbsp;<?php echo $list['look']; ?></span></label></div>
							<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if(isset($style_code) && count($style_code)>0){?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingProcessor26">
							<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseProcessor26" aria-expanded="false" aria-controls="collapseProcessor26">
							Style Code
							</a>
							</h4>
						</div>
						<div id="collapseProcessor26" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingProcessor26">
							<div class="panel-body">
							<?php foreach ($style_code as $list){  ?>
								<div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'style_code'; ?>','<?php echo ''; ?>');" id="style_code" name="products[style_code][]" value="<?php echo $list['style_code']; ?>"><span>&nbsp;<?php echo $list['style_code']; ?></span></label></div>
							<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if(isset($inner_material) && count($inner_material)>0){?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingProcessor27">
							<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseProcessor27" aria-expanded="false" aria-controls="collapseProcessor27">
							Inner Material
							</a>
							</h4>
						</div>
						<div id="collapseProcessor27" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingProcessor27">
							<div class="panel-body">
							<?php foreach ($inner_material as $list){  ?>
								<div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'inner_material'; ?>','<?php echo ''; ?>');" id="inner_material" name="products[inner_material][]" value="<?php echo $list['inner_material']; ?>"><span>&nbsp;<?php echo $list['inner_material']; ?></span></label></div>
							<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>	
					<?php if(isset($waterproof) && count($waterproof)>0){?>
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab" id="headingProcessor28">
							<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseProcessor28" aria-expanded="false" aria-controls="collapseProcessor28">
							Water proof
							</a>
							</h4>
						</div>
						<div id="collapseProcessor28" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingProcessor28">
							<div class="panel-body">
							<?php foreach ($waterproof as $list){  ?>
								<div class="checkbox"><label><input type="checkbox" onclick="subitemwisefilters(this.value, '<?php echo 'waterproof'; ?>','<?php echo ''; ?>');" id="waterproof" name="products[waterproof][]" value="<?php echo $list['waterproof']; ?>"><span>&nbsp;<?php echo $list['waterproof']; ?></span></label></div>
							<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
               </div>
             
                
                 
                 
              
                
               </div>
	 
	 <div class="col-sm-9" id="aftercategorysearch">
	 <div id="sucessmsg" style="display:none;"></div>
	 <div  style="display:none;" class="alert dark alert-success alert-dismissible" id="sucessmsg"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
            </button>
		</div>
		
          <div class="title"><span><?php echo ucfirst(strtolower(isset($subitemwise[0]['subitem_name'])?$subitemwise[0]['subitem_name']:'')); ?>&nbsp; subitem wise Products lists</span></div>
		<?php //echo '<pre>';print_r($subcategory_porduct_list);exit; ?>
		<?php 
		if(count($subitemwise)>0){
		 $customerdetails=$this->session->userdata('userdetails');
		$cnt=1;foreach($subitemwise as $productslist){ 
		//echo'<pre>';print_r($whishlist_item_ids_list);exit;
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
			
          <div class=" col-md-3 col-xs-6 col-sm-6 box-product-outer sub_ct_width" >
            <div class="box-product">
             <div class="img-wrapper  img_hover item" style="position:relative">
			  <div class="text-center img_size">
                <a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>">
                  <img alt="Product" src="<?php echo base_url('uploads/products/'.$productslist['item_image']); ?>">
                </a>
				</div>
                
				<?php if($productslist['item_quantity']<=0 || $productslist['item_status']==0){ ?>
				<div  class="text-center out_of_stoc">
					<div style="z-index:1026"><h4>out of stock</h4></div>
				</div>
				<?php } ?>
				
				<div class="option">
				<?php if($productslist['item_quantity']>0 && $productslist['category_id']==18 || $productslist['category_id']==21){ ?>
				<?php 	if (in_array($productslist['item_id'], $cart_item_ids) &&  in_array($customerdetails['customer_id'], $cust_ids)) { ?>
				<a style="cursor:pointer;" onclick="itemaddtocart('<?php echo $productslist['item_id']; ?>','<?php echo $productslist['category_id']; ?>','<?php echo $cnt; ?>');" id="cartitemtitle<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" data-toggle="tooltip" title="Added to Cart"><i id="addticartitem<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" class="fa fa-shopping-cart text-primary"></i></a>                  
				<?php }else{ ?>	
				<a style="cursor:pointer;" onclick="itemaddtocart('<?php echo $productslist['item_id']; ?>','<?php echo $productslist['category_id']; ?>','<?php echo $cnt; ?>');" id="cartitemtitle<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" data-toggle="tooltip" title="Add to Cart"><i id="addticartitem<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" class="fa fa-shopping-cart"></i></a>                  
				<?php } ?>
				<?php } ?>
				<?php 	if (in_array($productslist['item_id'], $whishlist_item_ids_list) &&  in_array($customerdetails['customer_id'], $customer_ids_list)) { ?>
				<a href="javascript:void(0);" onclick="addwhishlidts('<?php echo $productslist['item_id']; ?>','<?php echo $cnt; ?>');" id="addwhish<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" data-toggle="tooltip" title="Added to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" class="fa fa-heart text-primary"></i></a> 
				<?php }else{ ?>	
				<a href="javascript:void(0);" onclick="addwhishlidts('<?php echo $productslist['item_id']; ?>','<?php echo $cnt; ?>');" id="addwhish<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" data-toggle="tooltip" title="Add to Wishlist" class="wishlist"><i id="addwishlistids<?php echo $productslist['item_id']; ?><?php echo $cnt; ?>" class="fa fa-heart "></i></a> 
				<?php } ?>	
				</div>
              </div>
              <h6><a href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>"><?php echo $productslist['item_name']; ?></a></h6>
               <div class="price">
               
				<div class="text-center" style="color:#187a7d;">₹ <?php echo number_format($item_price, 2 ); ?> 
			<?php if($percentage!=''){ ?> &nbsp;
			<span class="price-old">₹ <?php echo number_format($orginal_price, 2); ?></span>
				<span class="label-tags"><p class=" text-success"> <?php echo number_format($percentage, 2, '.', ''); ?>% off</p></span>
			<?Php }else{ ?>
			<?php } ?>
				</div>
				<div class="clearfix"></div>
            
              </div>
               <div class="rating text-center">
                <?php if(count($avg_count)>0){foreach ($avg_count as $li){
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
				
				<?php } ?>
			</div>
            </div>
          </div>
		  </form>
		  <?php  
			if(($cnt % 4)==0){?> 
			<div class="clearfix"></div>
			<?php } ?>
		   
		  <?php  $cnt++;} ?>
		  
		<?php } else{  ?>
		<div > No Products are available</div>
		<?php } ?>
         
        </div>
		</span>
	
	 <div class="clearfix"></div>
	 <br>
</body>
<script>

function subitemwisefilters(val,status,check){
		if(status=='mimimum_price'){
			var minamt=val;
		}else{
			var minamt=$('#min').val();
		}
		if(status=='maximum_price'){
			var maxamt=val;
		}else{
			var maxamt=$('#max').val();
		}
	jQuery.ajax({
		
				url: "<?php echo site_url('category/subitemwise_search');?>",
				type: 'post',
			
				data: {
					form_key : window.FORM_KEY,
					subcatid: $('#subcatid').val(),
					subitemid: $('#subitemid').val(),
					productsvalues: val,
					searchvalue: status,
					unchecked: check,
					mini_mum: minamt,
					maxi_mum: maxamt,

					},
				dataType: 'html',
				success: function (data) {
					$("#subitemwisedata").empty();
   					$("#subitemwisedata").hide();
   					$("#filtersubitemwisedata").show();
   					$("#filtersubitemwisedata").append(data);
				}
		});
}

</script>
