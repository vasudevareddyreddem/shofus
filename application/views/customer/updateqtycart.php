<style>
    /*  bhoechie tab */
    
    div.bhoechie-tab-container {
        z-index: 10;
        background-color: #ffffff;
        padding: 0 !important;
        border-radius: 4px;
        -moz-border-radius: 4px;
        border: 1px solid #ddd;
        // margin-top: 20px;
        -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
        box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
        -moz-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
        background-clip: padding-box;
        opacity: 0.97;
        filter: alpha(opacity=97);
    }
    div.bhoechie-tab-menu {
        padding-right: 0;
        padding-left: 0;
        padding-bottom: 0;
    }
    div.bhoechie-tab-menu div.list-group {
        margin-bottom: 0;
    }
    div.bhoechie-tab-menu div.list-group>a {
        margin-bottom: 0;
    }
    div.bhoechie-tab-menu div.list-group>a .glyphicon,
    div.bhoechie-tab-menu div.list-group>a .fa {
        color: #45b1b9;
    }
    div.bhoechie-tab-menu div.list-group>a:first-child {
        border-top-right-radius: 0;
        -moz-border-top-right-radius: 0;
    }
    div.bhoechie-tab-menu div.list-group>a:last-child {
        border-bottom-right-radius: 0;
        -moz-border-bottom-right-radius: 0;
    }
    div.bhoechie-tab-menu div.list-group>a.active,
    div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
    div.bhoechie-tab-menu div.list-group>a.active .fa {
        background-color: #45b1b9;
        background-image: #45b1b9;
        color: #ffffff;
    }
    div.bhoechie-tab-menu div.list-group>a.active:after {
        content: '';
        position: absolute;
        left: 100%;
        top: 50%;
        margin-top: -13px;
        border-left: 0;
        border-bottom: 13px solid transparent;
        border-top: 13px solid transparent;
        border-left: 10px solid #45b1b9;
    }
    div.bhoechie-tab-content {
        background-color: #ffffff;
        /* border: 1px solid #eeeeee; */
        
        padding-left: 20px;
        padding-top: 10px;
    }
    div.bhoechie-tab div.bhoechie-tab-content:not(.active) {
        display: none;
    }
    .table>tbody>tr>td,
    .table>tbody>tr>th,
    .table>tfoot>tr>td,
    .table>tfoot>tr>th,
    .table>thead>tr>td,
    .table>thead>tr>th {
        border-top: none;
    }
	.panel-body {
		padding: 0px 15px 0px 15px;		
	}
	.panel-footer {
    padding:0px 15px 15px 20px;
	border-top:none;
   
}
.mat-div {
  padding: 0;
  position: relative;
}

.mat-div:after, .mat-div:before {
  content: "";
  position: absolute;
  display: block;
  width: 100%;
  height: 2px;
  background-color: #e2e2e2; 
  bottom: 0;
  left: 0;
  transition: all 0.5s;
}

.mat-div::after {
  background-color: #4a5c63;
  transform: scaleX(0);
}

.mat-label {
  display: block;
  font-size: 16px;
  transform: translateY(25px);
  color: #45b1b9;
  transition: all 0.5s;
}

.mat-input {
  position: relative;
  background: transparent;
  width: 100%;
  border: none;
  outline: none;
  padding: 8px 0;
  font-size: 16px;
}

.is-active::after {
  transform: scaleX(1);
}

.is-active .mat-label {
  color: #4a5c63;
}

.is-completed .mat-label {
  font-size: 12px;
  transform: translateY(0);
}
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 bhoechie-tab-container">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
                <div class="list-group">
                    <a href="#" class="list-group-item active text-center">

                        <h4 class="glyphicon glyphicon-shopping-cart"></h4>
                        <br/>Check Cart
                    </a>
                    <div href="#"  class="list-group-item text-center">
                        <h4 class="glyphicon glyphicon-folder-open site_col"></h4>
                        <br/>Billing Address
                    </div>
                    <div href="#" class="list-group-item text-center">
                        <h4 class="glyphicon glyphicon-credit-card site_col"></h4>
                        <br/>Payment mode
                    </div>
                    <div href="#" class="list-group-item text-center">
                        <h4 class="glyphicon glyphicon-ok site_col"></h4>
                        <br/>Thanks for Shopping
                    </div>

                </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab">
                <!-- flight section -->
                <div class="bhoechie-tab-content active">
                    <center>
                        <div class="">
                            <!--SHIPPING METHOD-->
                            <div class="panel panel-default">
                                <div class="panel-heading " style="background-color:#fff;">

                                    <div class="pull-left">
                                        <h4>My Cart</h4>
                                    </div>
                          
                                    <div class="clearfix"></div>
                                </div>
								<?php $cnt=0;$total='';foreach($cart_items as $productslist){ 
								
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
								}?>
								<input type="hidden" name="orginalqty" id="orginalqty<?php echo $cnt; ?>" value="<?php echo $productslist['item_quantity']; ?>" >

								<input type="hidden" name="product_id" id="product_id<?php echo $cnt; ?>"  value="<?php echo $productslist['item_id']; ?>">

								<div class="loop" style="border-top: 1px solid #ddd;">
                                <div class="panel-body">
                                    <table class="table borderless">

                                        <tbody>
                                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                            <tr>
                                                <td class="col-md-2">
                                                    <div class="media">
                                                        <a class="thumbnail pull-left" href="#"> <img class="media-object" src="<?php echo base_url('uploads/products/'.$productslist['item_image']); ?>" style="width: 72px; height: 72px;"> </a>

                                                    </div>
                                                    <br>
                                                   <div style="width:90px" class="input-group">
                                                        <span class="input-group-btn">
														<button style="width:20px;padding:6px;"type="button" onclick="productqty('<?php echo $cnt; ?>');" class="btn btn-primary btn-number btn-small"  data-type="minus" data-field="quant[2]">
												<span style="margin:-4px" class="glyphicon glyphicon-minus"></span>
                                                        </button>
                                                        </span>
                                                        <input type="text" name="qty" id="qty<?php echo $cnt; ?>" readonly  class="form-control input-number" value="<?php echo $productslist['qty'];  ?>" min="1" max="<?php echo $productslist['item_quantity']; ?>">
                                                        <span class="input-group-btn">
											  <button style="width:20px;padding:6px" onclick="productqtyincreae('<?php echo $cnt; ?>');" type="button" class="btn btn-primary btn-number btn-small" data-type="plus" data-field="quant[2]">
												  <span style="margin:-4px" class="glyphicon glyphicon-plus"></span>
                                                        </button>
                                                        </span>
                                                    </div>
													  <span style="color:red;" id="qtymesage<?php echo $cnt; ?>"></span>
                                                </td>
                                                <td class="text-left" style="width:250px;">
                                                    <p class="" style="font-size:17px;font-weight:500"><?php echo isset($productslist['item_name'])?$productslist['item_name']:''; ?>&nbsp;<?php echo isset($productslist['product_code'])?$productslist['product_code']:''; ?></p>
                                                    <p><?php echo isset($productslist['brand'])?$productslist['brand']:''; ?></p>
                                                    <p><span style="font-size:20px;font-weight:500">₹<?php echo $item_price; ?></span> &nbsp;&nbsp;
                                                        <span class="price-old" style="font-size:16px;color:#bbb">₹ <?php echo $orginal_price; ?></span>&nbsp;&nbsp;
                                                        <span class="site_col" style="font-size:18px;"><?php echo number_format($percentage, 2, '.', ''); ?>% off</span>&nbsp;&nbsp;</p>


                                                </td>


                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="panel-footer text-center" style="background:#fff;">
                                    <div class="pull-left">
                                        <span style="color:#888;font-size:17px">Seller:</span>&nbsp;&nbsp;<span><?php echo isset($productslist['seller_name'])?$productslist['seller_name']:''; ?></span>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo base_url('customer/deletecart/'.base64_encode($productslist['item_id']).'/'.base64_encode($productslist['id'])); ?>" type="button" class="btn btn-danger btn-small">Remove</a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
								
                                </div>
								
								<?php $total +=$productslist['total_price']; ?>
								<?php $cnt++;} ?>
								
								
								
								
								
								
                            </div>
                            <!--SHIPPING METHOD END-->
                        </div>
                    </center>
                </div>
               
            </div>
			
        </div>
		
		<div class="col-md-4 sm_hide" style=" border:1px solid #ddd; position:fixed;right:5% ;background-color:#fff;padding:10px;width:30%" id="social-float">
				<span><img id="imgdisplaying" src="<?php echo base_url(); ?>assets/home/images/track_lig.png" /></span> &nbsp;
			<span style="font-weight:500;font-size:17px" id="deliverymsg"></span>
			<div class="clearfix">&nbsp;</div>
			<div style="border:1px solid #ddd;padding:10px">
				Pincode:<input style="border:none;font-size:17px;" maxlength="6" onkeyup="delveryerrormsg();" id="checkpincode" name="checkpincode" type="text" value=""><span class="pull-right"><a class="site_col" onclick="getareapincode();" style="cursor:pointer">check</a></span>
			</div>
			<div class="clearfix">&nbsp;</div>
			<div>
				<div class="mar_t10">
				<div class="pull-left">
					Subtotal
				</div>
				<div class="pull-right">
					<span>₹</span>
					<span><?php echo $total; ?></span>
				</div>
				</div>
			</div>
			<div class="clearfix">&nbsp;</div>
			<div>
				<div class="mar_t10">
				<div class="pull-left">
					Delivery Charges
				</div>
				<div class="pull-right">
					<span>₹</span>
					<span><?php echo $carttotal_amount['delivertamount']; ?></span>
				</div>
				</div>
			</div>
			<div class="clearfix">&nbsp;</div>
			
			<div class="mar_t10" style="border-top:1px solid #ddd;border-bottom:1px solid #ddd;padding:8px 0px; " >
				<div class="" >
				<div class="pull-left">
					<b>Order Total</b>
				</div>
				<div class="pull-right">
					<span>₹</span>
					<span><b><?php echo $carttotal_amount['pricetotalvalue'] + $carttotal_amount['delivertamount']; ?></b></span>
				</div>
				</div>
				<div class="clearfix">&nbsp;</div>
			</div>
			
			<div>
				<div class="">
					<div class="clearfix">&nbsp;</div>
						<div style="border-bottom:1px solid #ddd;padding:10px">
							<input style="border:none;" id="couponcode" name="couponcode" onkeyup="removecouponmsg();" type="text" value="" placeholder="Enter Promo Code"><span class="pull-right"><a class="site_col" onclick="couponcodeapply();" style="cursor:pointer">Apply</a></span>
						
						</div><span id="couponerrormsg"></span>
			<div class="clearfix">&nbsp;</div>
				</div>
			</div>
			<div class="clearfix">&nbsp;</div>
	
			<div>
				<a href="<?php echo base_url(''); ?>" class="btn btn-warning col-md-6" style="width:48%;" ><i class="fa fa-shopping-cart"></i> Continue Shopping</a> 
				<a href="<?php echo base_url('customer/billing'); ?>" class="btn  btn-primary col-md-6 pull-right"  style="width: 48%;" ><i class="fa fa-bolt" aria-hidden="true"></i>  Proceed to Checkout</a>
			</div>
			</div>
		
		
		<?php if($this->session->flashdata('productsuccess')): ?>
			<div class="alt_cus"><div class="alert_msg animated slideInUp btn_suc"> <?php echo $this->session->flashdata('productsuccess');?>&nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i></div></div>
			<?php endif; ?> 
			<?php if($this->session->flashdata('qtyerror')): ?>
				<div class="alt_cus"><div class="alert_msg animated slideInUp btn_war"> <?php echo $this->session->flashdata('qtyerror');?>&nbsp; <i class="fa fa-check  text-warning ico_bac" aria-hidden="true"></i></div></div>

			<?php endif; ?>
			
			<div class="alt_cus"><div style="display:none;" class="alert_msg animated slideInUp btn_war" id="qtymesage"> &nbsp; <i class="fa fa-check  text-warning ico_bac" aria-hidden="true"></i></div></div>

    </div>
</div>
<script>

function productqty(id){

	var pid=document.getElementById("product_id"+id).value;
	var qtycnt=document.getElementById("qty"+id).value;
	var qty=parseInt(qtycnt);
	if(qty==1){
		
		$('#qty'+id).val(qty);
	}else{
		$('#qty'+id).val(qty - 1);
		$("#qtymesage"+id).html('');
			jQuery.ajax({
				url: "<?php echo site_url('customer/qtyupdatecart');?>",
				type: 'post',
				data: {
					form_key : window.FORM_KEY,
					product_id: pid,
					qty: qty - 1,
					},
				dataType: 'html',
				success: function (data) {
					$("#oldcartqty").empty();
					$("#oldcartqty").empty();
					$("#oldcartqty").append(data);
				
				}
			});
	}
	
	
}
function productqtyincreae(id){
	var pid=document.getElementById("product_id"+id).value;
	var qtycnt1=document.getElementById("qty"+id).value;
	var orginalqtycnt=document.getElementById("orginalqty"+id).value;
	var qty1=parseInt(qtycnt1);
	if(qty1==orginalqtycnt){
		$("#qtymesage"+id).html("Avaiable  Quantity is " +orginalqtycnt);
	}else if(qty1==10){
	$("#qtymesage"+id).html("Maximum allowed Quantity is 10 ");
	}else{
		$("#qtymesage"+id).html("");
		$('#qty'+id).val(qty1 + 1);
			jQuery.ajax({
				url: "<?php echo site_url('customer/qtyupdatecart');?>",
				type: 'post',
				data: {
					form_key : window.FORM_KEY,
					product_id: pid,
					qty: qty1 + 1,
					},
				dataType: 'html',
				success: function (data) {
					$("#oldcartqty").empty();
					$("#oldcartqty").empty();
					$("#oldcartqty").append(data);
				
				}
			});
	}
	
}

var pincodeformat =/^[0-9]+$/;
$('#deliverymsg').html('Check your delivery Status').css("color", "black");
function delveryerrormsg(){
$('#imgdisplaying').show();
$('#deliverymsg').html('Check your delivery Status').css("color", "black");
}
function removecouponmsg(){
	$('#couponerrormsg').html('');
}
function couponcodeapply(){
	var coupon=$('#couponcode').val();
	if(coupon==''){
		$('#couponerrormsg').html('Promo Code is required.').css("color", "red");
		return false;
	}else if(coupon.length ==6){
		$('#couponerrormsg').html('Promo Code is invalid. Please use another one').css("color", "red");
	}else{
		$('#couponerrormsg').html('Promo Code lenth must be 6 characters.').css("color", "red");
		return false;
	}
	
}
function getareapincode(val){
	var pin=$('#checkpincode').val();
	$('#imgdisplaying').hide();
	$('#deliverymsg').html('');
	
	if(pin==''){
		$('#deliverymsg').html('Pincode is required.').css("color", "red");
		return false;
	}
	
	if(pin.length ==6){
			if(!pin.match(pincodeformat)) 
			{
			$('#deliverymsg').html('Please enter correct pincode.').css("color", "red");
			return false;
			}

		jQuery.ajax({
        url: "<?php echo site_url('category/checkpincodes');?>",
        type: 'post',
          data: {
          form_key : window.FORM_KEY,
          pincode: val,
          },
        dataType: 'json',
        success: function (data) {
			$('#imgdisplaying').show();
			if(data.msg==1){
				
				$('#deliverymsg').html('Delivery by with in ' +data.time).css("color", "black");
				
			}else{
				$('#deliverymsg').html('Delivery by with in 4 hours').css("color", "black");
			}
         

        }
      });
	}else{
		$('#deliverymsg').html('Pincode lenth must be 6 digits only.').css("color", "red");
		
	}
}

    $(document).ready(function() {
        $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
            e.preventDefault();
            $(this).siblings('a.active').removeClass("active");
            $(this).addClass("active");
            var index = $(this).index();
            $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
            $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
        });
    });
</script>

<script>
    function pincodechange(val) {
        $("#hide_loc").hide();
        $("#show_loc").show();
    }
</script>
<script>

function checkOffset() {
  var a=$(document).scrollTop()+window.innerHeight;
  var b=$('#footer-start').offset().top;
  if (a<b) {
    $('#social-float').css('bottom', '80px');
  } else {
    $('#social-float').css('bottom', (10+(a-b))+'px');
  }
}
$(document).ready(checkOffset);
$(document).scroll(checkOffset);

</script>
<script>
$(document).ready(function(){
    $("#hide_add_btn").click(function(){
        $("#hide_add").hide();
    });
});
</script>
<script>
$(".mat-input").focus(function(){
  $(this).parent().addClass("is-active is-completed");
});

$(".mat-input").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("is-completed");
  $(this).parent().removeClass("is-active");
})
</script>


