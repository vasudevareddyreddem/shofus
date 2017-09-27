<!DOCTYPE html>
<html lang="en">

<style>
.panel-title > a:before {
    float: left !important;
    font-family: FontAwesome;
    content:"\f1db";
    padding-right: 5px;
}

.panel-title > a:hover, 
.panel-title > a:active, 
.panel-title > a:focus  {
    text-decoration:none;
}
// #sticky {
 
    // height:80%;

 
// }
#sticky.stick {
    position: fixed !important;
    top: 0;
    z-index: 10;
    border-radius: 0 0 0.5em 0.5em;
}
</style>


<body >
<div class="pad_bod container">
		<div class="row" id="updateqty"></div>
		<div class="row" id="oldcartqty">
		<div id="sticky-anchorupdateqtyhide"></div>
		<?php //echo '<pre>';print_r($details);exit; ?>
		
		<div class="col-md-12 " >
		<div class="panel panel-primary">
			<div class="panel-heading ">Payment</div>
			<div class="panel-body">
			<section>
        <div class="wizard">
           
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="disabled">
						 <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-shopping-cart"></i>
                            </span>
							
                        </a>
						<p class="text-center"><b>Check Cart</b> </p>
                    </li>  
					<li role="presentation" class="disabled" >
						   <a href="javascript:void(0);" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
							
                        </a>
						<p class="text-center"><b>Billing Address</b> </p>
                    </li>
					<li role="presentation" class="active" >
						   <a href="javascript:void(0);" data-toggle="tab" aria-controls="step3" role="tab" title="Delivery Charges">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
							
                        </a>
						<p class="text-center"><b>Delivery Charges</b> </p>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="javascript:void(0);" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-credit-card"></i>
                            </span>
                        </a>
						<p class="text-center"><b>Payment mode </b></p>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="javascript:void(0);" data-toggle="tab" aria-controls="step4" role="tab" title="Step 4">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
						<p class="text-center"><b>Thanks for Shopping </b></p>
                    </li>
                </ul>
            </div>

                <div class="tab-content">
				 
				<div class="title"><span>Order Confirmation</span></div>
          <div class="table-responsive">
		  
			
			<?php if(count($details)>0){   ?>
			<form  onsubmit="return validateForm()" action="<?php  echo base_url('customer/orderpayment'); ?>" method="post" name="updatecart" id="updatecart">

            <table class="table table-bordered table-cart">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Unit price</th>
                  <th>SubTotal</th>
                  <th>Delivery Charges</th>
				
                </tr>
              </thead>
              <tbody>
			  <?php 
			  //echo '<pre>';print_r($cart_items);exit; 
			$total=$deverytotal='';
			
			  $cnt=0;foreach($details as $items){ 
			  //echo '<pre>';print_r($items);exit;
			  ?>
			  <script>$('#qty'+'<?php echo $cnt; ?>').val('');</script>
				<input type="hidden" name="orginalqty" id="orginalqty<?php echo $cnt; ?>" value="<?php echo $items['item_quantity']; ?>" >


			  <input type="hidden" name="product_id" id="product_id<?php echo $cnt; ?>"  value="<?php echo $items['item_id']; ?>">
                <tr>
                  <td class="img-cart">
                    <a href="<?php echo base_url('category/productview/'.base64_encode($items['item_id'])); ?>">
                      <img src="<?php echo base_url('uploads/products/'.$items['item_image']); ?>" class="img-thumbnail">
                    </a>
                  </td>
                  <td>
                    <p><a href="<?php echo base_url('category/productview/'.base64_encode($items['item_id'])); ?>" class="d-block"><?php echo $items['item_name']; ?></a></p>
                  </td>
				  
				  <?Php if($items['item_qty']!=0){ ?>
					     <td class="input-qty">
				  
					<span style="font-size:16px;" id="qtymesage<?php echo $cnt; ?>"><?php echo $items['qty'];  ?></span>
					</td>
					  
					  
				  <?php }else{ ?>
				  		<td class="input-qty"><span class="label label-warning arrowed"> Out of Stock</span></td>

				
				  <?php } ?>
                  
				  
				  
			 
				<td class="unit"><?php echo $items['item_price']; ?> </td>
				<td class="sub"><?php echo $items['total_price']; ?></td>
					<?php 
					//echo '<pre>';print_r($items);exit; 
					if($items['maxtime']<=60 && $items['time']!=0){ ?>
					 <td class="action">
					 <span id="errorselect" style="color:red"></span>
						  <select onchange="selectdeliveroptions(this.value);productitem_idpurpose('0','<?php echo $cnt; ?>');" id="deliverycharge<?php echo $cnt; ?>" name="deliverycharge">
						  <option value="0">Select</option>
						  <?php if($items['category_id']==20 || $items['category_id']==22){ ?>
								  <?php if($items['total_price']>0 && $items['total_price']<=100){ ?>
								<?php if($items['delivery_amount']==140){  ?>
									<option selected="selected" value="140<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 140)</option>
									  <?php }else{ ?>
											<option value="140<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 140)</option>
									  <?php } ?>
								<?php if($items['delivery_amount']==88){  ?>
											<option selected="selected" value="88<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 88)</option>
									  <?php }else{ ?>
											<option value="88<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 88)</option>
								<?php } ?>
							 <?php }else if($items['total_price']>100 && $items['total_price']<=200){ ?>
								<?php if($items['delivery_amount']==130){  ?>
											<option selected="selected" value="130<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 130)</option>
									<?php }else{ ?>
											<option value="130<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 130)</option>
								<?php } ?>
								<?php if($items['delivery_amount']==88){  ?>
											<option selected="selected" value="78<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 78)</option>
									  <?php }else{ ?>
											<option value="78<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 78)</option>
								<?php } ?>
							  <?php }else if($items['total_price']>200 && $items['total_price']<=300){ ?>
									<?php if($items['delivery_amount']==120){  ?>
											<option selected="selected" value="120<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 120)</option>
									<?php }else{ ?>
											<option value="120<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 120)</option>
								<?php } ?>
								<?php if($items['delivery_amount']==68){  ?>
											<option selected="selected" value="68<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 68)</option>
									  <?php }else{ ?>
											<option value="68<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 68)</option>
								<?php } ?>
							  <?php }else if($items['total_price']>300 && $items['total_price']<=400){ ?>
									<?php if($items['delivery_amount']==110){  ?>
												<option selected="selected" value="110<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 110)</option>
										<?php }else{ ?>
												<option value="110<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 110)</option>
									<?php } ?>
									<?php if($items['delivery_amount']==58){  ?>
												<option selected="selected" value="58<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 58)</option>
										  <?php }else{ ?>
												<option value="58<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 58)</option>
									<?php } ?>
							  <?php }else if($items['total_price']>400 && $items['total_price']<=500){ ?>
									<?php if($items['delivery_amount']==100){  ?>
									<option selected="selected" value="100<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 100)</option>
										<?php }else{ ?>
												<option value="100<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 100)</option>
									<?php } ?>
									<?php if($items['delivery_amount']==48){  ?>
												<option selected="selected" value="48<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 48)</option>
										  <?php }else{ ?>
												<option value="48<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 48)</option>
									<?php } ?>
							  <?php }else if($items['total_price']>500 && $items['total_price']<=600){ ?>
									<?php if($items['delivery_amount']==90){  ?>
												<option selected="selected" value="90<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 90)</option>
										<?php }else{ ?>
												<option value="90<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 90)</option>
									<?php } ?>
									<?php if($items['delivery_amount']==38){  ?>
												<option selected="selected" value="38<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 38)</option>
										  <?php }else{ ?>
												<option value="38<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 38)</option>
									<?php } ?>
							  <?php }else if($items['total_price']>600 && $items['total_price']<=700){ ?>
									<?php if($items['delivery_amount']==80){  ?>
									<option selected="selected" value="80<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 80)</option>
									<?php }else{ ?>
												<option value="80<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 80)</option>
									<?php } ?>
									<?php if($items['delivery_amount']==28){  ?>
												<option selected="selected" value="28<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 28)</option>
										  <?php }else{ ?>
												<option value="28<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 28)</option>
									<?php } ?>
							  <?php }else if($items['total_price']>700 && $items['total_price']<=800){ ?>
							 		 <?php if($items['delivery_amount']==70){  ?>
										<option selected="selected" value="70<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 70)</option>
										<?php }else{ ?>
												<option value="70<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 70)</option>
									<?php } ?>
									<?php if($items['delivery_amount']==18){  ?>
												<option selected="selected" value="18<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 18)</option>
										  <?php }else{ ?>
												<option value="18<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 18)</option>
									<?php } ?>
							  <?php }else if($items['total_price']>800 && $items['total_price']<=900){ ?>
								    <?php if($items['delivery_amount']==60){  ?>
											<option selected="selected" value="60<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 60)</option>
											<?php }else{ ?>
													<option value="60<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 60)</option>
										<?php } ?>
										<?php if($items['delivery_amount']==8){  ?>
													<option selected="selected" value="8<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 8)</option>
											  <?php }else{ ?>
													<option value="8<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 8)</option>
										<?php } ?>
							  <?php }else if($items['total_price']>900){ ?>
									<?php if($items['delivery_amount']==50){  ?>
												<option selected="selected" value="50<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 50)</option>
										<?php }else{ ?>
												<option value="50<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 50)</option>
									<?php } ?>
									<?php if($items['delivery_amount']==0){  ?>
												<option selected="selected" value="0<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 0)</option>
										  <?php }else{ ?>
												<option value="0<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 0)</option>
									<?php } ?>
							  <?php } ?>
							
						  <?php }else{  ?>
						    <?php if($items['total_price']>0 && $items['total_price']<=100){ ?>
								<?php if($items['delivery_amount']==140){  ?>
									<option selected="selected" value="140<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 140)</option>
									  <?php }else{ ?>
											<option value="140<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 140)</option>
									  <?php } ?>
								<?php if($items['delivery_amount']==88){  ?>
											<option selected="selected" value="88<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 88)</option>
									  <?php }else{ ?>
											<option value="88<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 88)</option>
								<?php } ?>
							 <?php }else if($items['total_price']>100 && $items['total_price']<=200){ ?>
								<?php if($items['delivery_amount']==130){  ?>
											<option selected="selected" value="130<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 130)</option>
									<?php }else{ ?>
											<option value="130<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 130)</option>
								<?php } ?>
								<?php if($items['delivery_amount']==88){  ?>
											<option selected="selected" value="78<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 78)</option>
									  <?php }else{ ?>
											<option value="78<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 78)</option>
								<?php } ?>
							  <?php }else if($items['total_price']>200 && $items['total_price']<=300){ ?>
									<?php if($items['delivery_amount']==120){  ?>
											<option selected="selected" value="120<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 120)</option>
									<?php }else{ ?>
											<option value="120<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 120)</option>
								<?php } ?>
								<?php if($items['delivery_amount']==68){  ?>
											<option selected="selected" value="68<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 68)</option>
									  <?php }else{ ?>
											<option value="68<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 68)</option>
								<?php } ?>
							  <?php }else if($items['total_price']>300 && $items['total_price']<=400){ ?>
									<?php if($items['delivery_amount']==110){  ?>
												<option selected="selected" value="110<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 110)</option>
										<?php }else{ ?>
												<option value="110<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 110)</option>
									<?php } ?>
									<?php if($items['delivery_amount']==58){  ?>
												<option selected="selected" value="58<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 58)</option>
										  <?php }else{ ?>
												<option value="58<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 58)</option>
									<?php } ?>
							  <?php }else if($items['total_price']>400 && $items['total_price']<=500){ ?>
									<?php if($items['delivery_amount']==100){  ?>
									<option selected="selected" value="100<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 100)</option>
										<?php }else{ ?>
												<option value="100<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 100)</option>
									<?php } ?>
									<?php if($items['delivery_amount']==48){  ?>
												<option selected="selected" value="48<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 48)</option>
										  <?php }else{ ?>
												<option value="48<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 48)</option>
									<?php } ?>
							  <?php }else if($items['total_price']>500 && $items['total_price']<=600){ ?>
									<?php if($items['delivery_amount']==90){  ?>
												<option selected="selected" value="90<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 90)</option>
										<?php }else{ ?>
												<option value="90<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 90)</option>
									<?php } ?>
									<?php if($items['delivery_amount']==38){  ?>
												<option selected="selected" value="38<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 38)</option>
										  <?php }else{ ?>
												<option value="38<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 38)</option>
									<?php } ?>
							  <?php }else if($items['total_price']>600 && $items['total_price']<=700){ ?>
									<?php if($items['delivery_amount']==80){  ?>
									<option selected="selected" value="80<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 80)</option>
									<?php }else{ ?>
												<option value="80<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 80)</option>
									<?php } ?>
									<?php if($items['delivery_amount']==28){  ?>
												<option selected="selected" value="28<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 28)</option>
										  <?php }else{ ?>
												<option value="28<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 28)</option>
									<?php } ?>
							  <?php }else if($items['total_price']>700 && $items['total_price']<=800){ ?>
							 		 <?php if($items['delivery_amount']==70){  ?>
										<option selected="selected" value="70<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 70)</option>
										<?php }else{ ?>
												<option value="70<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 70)</option>
									<?php } ?>
									<?php if($items['delivery_amount']==18){  ?>
												<option selected="selected" value="18<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 18)</option>
										  <?php }else{ ?>
												<option value="18<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 18)</option>
									<?php } ?>
							  <?php }else if($items['total_price']>800 && $items['total_price']<=900){ ?>
								    <?php if($items['delivery_amount']==60){  ?>
											<option selected="selected" value="60<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 60)</option>
											<?php }else{ ?>
													<option value="60<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 60)</option>
										<?php } ?>
										<?php if($items['delivery_amount']==8){  ?>
													<option selected="selected" value="8<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 8)</option>
											  <?php }else{ ?>
													<option value="8<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 8)</option>
										<?php } ?>
							  <?php }else if($items['total_price']>900){ ?>
									<?php if($items['delivery_amount']==50){  ?>
												<option selected="selected" value="50<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 50)</option>
										<?php }else{ ?>
												<option value="50<?php echo '/'.$items['id'].'/'.'1';?>">Fast( Amount: 50)</option>
									<?php } ?>
									<?php if($items['delivery_amount']==0){  ?>
												<option selected="selected" value="0<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 0)</option>
										  <?php }else{ ?>
												<option value="0<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 0)</option>
									<?php } ?>
							  <?php } ?>
						  <?php } ?>
						  </select>
						  <span id="errorselect<?php echo $cnt; ?>" style="color:red"></span>
						</td>
				  
					<?php }else { ?>
					 <td class="action"> 
					 		 <select onchange="selectdeliveroptions(this.value);productitem_idpurpose('0','<?php echo $cnt; ?>');" id="deliverycharge<?php echo $cnt; ?>" name="deliverycharge">
								<option value="0">Select</option>
						 <?php if($items['total_price']>0 && $items['total_price']<=100){ ?>
								
								<?php if($items['delivery_amount']==88){  ?>
											<option selected="selected" value="88<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 88)</option>
									  <?php }else{ ?>
											<option value="88<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 88)</option>
								<?php } ?>
							 <?php }else if($items['total_price']>100 && $items['total_price']<=200){ ?>
							
								<?php if($items['delivery_amount']==88){  ?>
											<option selected="selected" value="78<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 78)</option>
									  <?php }else{ ?>
											<option value="78<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 78)</option>
								<?php } ?>
							  <?php }else if($items['total_price']>200 && $items['total_price']<=300){ ?>
								
								<?php if($items['delivery_amount']==68){  ?>
											<option selected="selected" value="68<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 68)</option>
									  <?php }else{ ?>
											<option value="68<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 68)</option>
								<?php } ?>
							  <?php }else if($items['total_price']>300 && $items['total_price']<=400){ ?>
									
									<?php if($items['delivery_amount']==58){  ?>
												<option selected="selected" value="58<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 58)</option>
										  <?php }else{ ?>
												<option value="58<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 58)</option>
									<?php } ?>
							  <?php }else if($items['total_price']>400 && $items['total_price']<=500){ ?>
									
									<?php if($items['delivery_amount']==48){  ?>
												<option selected="selected" value="48<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 48)</option>
										  <?php }else{ ?>
												<option value="48<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 48)</option>
									<?php } ?>
							  <?php }else if($items['total_price']>500 && $items['total_price']<=600){ ?>
								
									<?php if($items['delivery_amount']==38){  ?>
												<option selected="selected" value="38<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 38)</option>
										  <?php }else{ ?>
												<option value="38<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 38)</option>
									<?php } ?>
							  <?php }else if($items['total_price']>600 && $items['total_price']<=700){ ?>
									
									<?php if($items['delivery_amount']==28){  ?>
												<option selected="selected" value="28<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 28)</option>
										  <?php }else{ ?>
												<option value="28<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 28)</option>
									<?php } ?>
							  <?php }else if($items['total_price']>700 && $items['total_price']<=800){ ?>
							 		
									<?php if($items['delivery_amount']==18){  ?>
												<option selected="selected" value="18<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 18)</option>
										  <?php }else{ ?>
												<option value="18<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 18)</option>
									<?php } ?>
							  <?php }else if($items['total_price']>800 && $items['total_price']<=900){ ?>
								  
										<?php if($items['delivery_amount']==8){  ?>
													<option selected="selected" value="8<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 8)</option>
											  <?php }else{ ?>
													<option value="8<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 8)</option>
										<?php } ?>
							  <?php }else if($items['total_price']>900){ ?>
									
									<?php if($items['delivery_amount']==0){  ?>
												<option selected="selected" value="0<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 0)</option>
										  <?php }else{ ?>
												<option value="0<?php echo '/'.$items['id'].'/'.'2';?>">Fastest( Amount: 0)</option>
									<?php } ?>
							  <?php } ?>
						</select>
						<span id="errorselect<?php echo $cnt; ?>" style="color:red"></span>
					 
					 
					 </td>
					
					<?php } ?>
				  	
                </tr>
				  </form>
				 
				<?php $total +=$items['total_price']; ?>
				<?php $deverytotal +=$items['delivery_amount']; ?>
			  <?php $cnt++;}   ?>
               
             
               
                <tr>
                  <td colspan="4" class="text-right">Total</td>
                  <td colspan="2"><b><?php echo $total; ?></b></td>
                </tr> 
				<tr>
                  <td colspan="4" class="text-right">Grand Total</td>
                  <td colspan="2" id="grandtotalvalu"><b><?php echo $total+$deverytotal; ?></b></td>
                </tr>
				
              </tbody>
            </table>
			<nav aria-label="Shopping Cart Next Navigation">
            <ul class="pager">
              <li class="previous"><a style="border:none;background:none;" href="<?php echo base_url('customer/billing'); ?>"><span class=" btn btn-primary btn-small"><span aria-hidden="true">&larr;</span> Back</span></a></li>
              <button class="pull-right btn btn-primary btn-small" type="submit" >Proceed to Checkout <span aria-hidden="true">&rarr;</span></span></button>
            </ul>
          </nav>
			</form>
          </div>
          
		  
		<?php }else{ ?>
		</tr> No Item In the cart. click on <a  class="site_col" href="<?php echo base_url(''); ?>"> &nbsp;<b> Continue shopping</b></a> </tr>
		<?php } ?>
		<div class="clearfix"></div>
                </div>
         
        </div>
    </section>
	   </div>
	   </div>
	   </div>
		<div class="clearfix">&nbsp;</div>
		
	   </div>
	   </div>
	</div>
	</div>
	</div>
	<div class="clearfix">&nbsp;</div>
	
<?php if($this->session->flashdata('productsuccess')): ?>
			<div class="alt_cus"><div class="alert_msg animated slideInUp btn_suc"> <?php echo $this->session->flashdata('productsuccess');?>&nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i></div></div>
			<?php endif; ?> 
			<?php if($this->session->flashdata('qtyerror')): ?>
				<div class="alt_cus"><div class="alert_msg animated slideInUp btn_war"> <?php echo $this->session->flashdata('qtyerror');?>&nbsp; <i class="fa fa-check  text-warning ico_bac" aria-hidden="true"></i></div></div>

			<?php endif; ?>
			
			<div class="alt_cus"><div style="display:none;" class="alert_msg animated slideInUp btn_war" id="qtymesage"> &nbsp; <i class="fa fa-check  text-warning ico_bac" aria-hidden="true"></i></div></div>

<script>

	  function validateForm(){
		  $('#errorselect').html('');
		  var cnt;
		var nt =<?php echo $count;?>;
		//var cnt='';
		for(cnt = 0; cnt <= nt; cnt++){
			var values=$("#deliverycharge"+cnt).val();
			if(values!=0){
				$('#errorselect'+cnt).html('');
			}else{
				$('#errorselect'+cnt).html('Please select a value');
				var errorcnt='erorr';
			}	
			
		}
		if(errorcnt!='erorr'){
			return true;
		}else{
			return false;
		}
			
			
	  }
	  function productitem_idpurpose(val,id){
		  if(val==0 && id!=''){
		  $('#errorselect'+id).html('Please select a value');
		  }else{
			$('#errorselect'+id).html('');
		  }
	  }
	  function selectdeliveroptions(val){
		  if(val!='0'){
		  jQuery.ajax({
				url: "<?php echo site_url('customer/updatedeliveytype');?>",
				type: 'post',
				data: {
					form_key : window.FORM_KEY,
					product_id: val,
					},
				dataType: 'json',
				success: function (data) {
					$('#grandtotalvalu').empty();
					$('#grandtotalvalu').append(data.amt);
					
				
				}
			});
		  }else{
			  //$('#errorselect').html('Please select a value');
			  
		  }
		  
	  }
			

</script>

 