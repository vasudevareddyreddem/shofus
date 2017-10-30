
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 bhoechie-tab-container bhoechie-tab-container">
            <div  class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
                <div class="list-group">
                    <div href="<?php echo base_url('customer/cart'); ?>" class="list-group-item text-center step_com">

                        <h4 class="glyphicon glyphicon-shopping-cart"></h4>
                        <br/>Check Cart
                      </div>
                    <div href="<?php echo base_url('customer/billing'); ?>" class="list-group-item  text-center step_com">
                        <h4 class="glyphicon glyphicon-folder-open"></h4>
                        <br/>Billing Address
                    </div>
                     <div href="#" class="list-group-item active  text-center">
                        <h4 class="glyphicon glyphicon-credit-card"></h4>
                        <br/>Payment mode
                    </div>
                    <div href="#" class="list-group-item text-center">
                        <h4 class="glyphicon glyphicon-ok"></h4>
                        <br/>Thanks for Shopping
                    </div>

                </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab">
			
			
			
			
                <!-- train section -->
         <div class="bhoechie-tab-content active">
                
                <center>
                  
                            <!--SHIPPING METHOD-->
                            <div class="">
                                <div >

                                    <div class="text-center">
                                      
										<img style="width:20%" src="<?php echo base_url(); ?>assets/home/images/payment_img.png" />
                                    </div>
									
									<form action="<?php echo base_url('customer/orderpaymenttype'); ?>" method="post" onSubmit="return checkvalidation(this.form);">
									<div class="row" style="margin-top:50px;">
									<span id="paymenterrormsg" style="color:red"></span>
									 <div class="radio">
										<label class="col-md-6" style="font-size:18px">
											<input type="radio" id="radio1"  name="payment"  value="2"><span >Cash On Delivery</span>
										</label>
								
										<label class="col-md-6" style="font-size:18px">
											<input type="radio" id="radio2" name="payment"  value="3"><span >Swipe on Delivery</span>
										</label>
										<!--<label class="col-md-4">
											<input type="radio" id="radio3" name="payment"  value="4"><span>Paytm</span>
										</label>-->
									 </div>
									 
										
										  
										</div>
									</div>
                                    <div class="clearfix"></div>
									
									
							<div  style="padding:50px 15px;margin-top:25px;border-top:1px solid #ddd;">
							  <a  href="<?php echo base_url('customer/billing'); ?>" class="btn btn-primary pull-left btn-sm"> Back</a>
							<button class="pull-right btn btn-primary  btn-sm" name="submit_form" type="submit">Proceed to Payment</span><span aria-hidden="true">&rarr;</span></button>
         
							</form>
                                
							<!--<form method="post" name="payuForm" action="https://test.payu.in/_payment">
							<input name="key" type="hidden" value="<?php echo $this->config->item('MERCHANTKEY'); ?>" />
							<input name="txnid" type="hidden"  value="<?php echo $txnid; ?>" />
							<input type="hidden" name="hash" value="<?php echo $hash; ?>"/>
							<input type="hidden" name="xyz" value="<?php echo $hash ?>"/>
							<input name="amount" type="hidden" value="<?php echo $carttotal_amount['pricetotalvalue']+$carttotal_amount['delivertamount']; ?>" />
							<input name="productinfo" type="hidden" value="<?php echo $productinfo; ?>">
							<input name="udf1" type="hidden" value="">
							<input name="udf2" type="hidden" value="">
							<input name="udf3" type="hidden" value="">
							<input name="udf4" type="hidden" value="">
							<input name="udf5" type="hidden" value="">
							<input name="firstname" id="firstname" type="hidden" value="<?php echo $billimgdetails['name']; ?>"/>
							<input name="email" id="email"  type="hidden"  value='<?php echo $emailid; ?>'>
							<input name="phone"   type="hidden"  value="<?php echo $billimgdetails['mobile']; ?>">
							<input name="surl" type="hidden" value="<?php echo base_url('customer/success'); ?>" size="64" />
							<input name="furl" type="hidden" value="<?php echo base_url('customer/paymentfailure'); ?>" size="64" />
							<input name="curl" type="hidden" value="<?php echo base_url('payu/cancel'); ?>" />
							<div  style="padding:50px 15px;margin-top:50px;border-top:1px solid #ddd;">
							  <a  href="<?php echo base_url('customer/billing'); ?>" class="btn btn-primary pull-left"> Back</a>
							<button class="pull-right btn btn-primary btn-small" name="submit_form" type="submit">Proceed to Payment</span><span aria-hidden="true">&rarr;</span></button>
         
							</div>
							</form>-->
							
							<div class="clearfix"></div>
							</div>
							
								
								
								
								
								
								
								
                            </div>
                            <!--SHIPPING METHOD END-->
                    
                    </center>

               
            </div>
			
        </div>
		
		<div class="col-md-4 sm_hide" style=" border:1px solid #ddd; ;background-color:#fff;padding:5px;">
			<span><img id="imgdisplaying" src="<?php echo base_url(); ?>assets/home/images/track_lig.png" /></span> &nbsp;
			<span style="font-weight:500;font-size:17px" id="oldmsg">	Delivery within <?php echo $this->session->userdata('time');?></span>
			<span style="font-weight:500;font-size:17px" id="deliverymsg" style="display:none;"></span>
			<div class="clearfix">&nbsp;</div>
			<div style="border:1px solid #ddd;padding:10px " >
				Pincode: &nbsp;&nbsp;<input readonly style="border-top:none;border-right:none;border-left:none;border-bottom:1px solid #ddd;font-size:17px;" maxlength="6" onkeyup="delveryerrormsg();" id="checkpincode" name="checkpincode" type="text" value=" <?php echo $this->session->userdata('pincode');?>"><span class="pull-right"><a class="site_col"  style="text-decoration:none;">check</a></span>
			</div>
			<div class="clearfix">&nbsp;</div>
			<div>
				<div class="mar_t10">
				<div class="pull-left">
					Subtotal
				</div>
				<div class="pull-right">
					<span>₹</span>
					<span><?php echo number_format($carttotal_amount['pricetotalvalue'], 2); ?></span>
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
					<span><?php echo number_format($carttotal_amount['delivertamount'], 2); ?></span>
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
						<?php $amt=$carttotal_amount['pricetotalvalue'] + $carttotal_amount['delivertamount'];
					echo number_format($amt, 2);
					?>
					</div>
				</div>
				<div class="clearfix">&nbsp;</div>
			</div>
			
			
			<div class="clearfix">&nbsp;</div>
	
			
			</div>
		
		
		<div class="clearfix"></div><br>
    </div>
</div>
</div>
<div class="clearfix"></div><br>

<script>
function checkvalidation(form){
	
if ($("#radio1").prop("checked")) {
	$('#paymenterrormsg').html('');
   return true;
}else if ($("#radio2").prop("checked")) {
	$('#paymenterrormsg').html('');
   return true;
}else if ($("#radio3").prop("checked")) {
	$('#paymenterrormsg').html('');
   return true;
}else{
	$('#paymenterrormsg').html('Please select a payment mode method')
	return false;
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
    //plugin bootstrap minus and plus
    //http://jsfiddle.net/laelitenetwork/puJ6G/
    $('.btn-number').click(function(e) {
        e.preventDefault();

        fieldName = $(this).attr('data-field');
        type = $(this).attr('data-type');
        var input = $("input[name='" + fieldName + "']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if (type == 'minus') {

                if (currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                }
                if (parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if (type == 'plus') {

                if (currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                }
                if (parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });
    $('.input-number').focusin(function() {
        $(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function() {

        minValue = parseInt($(this).attr('min'));
        maxValue = parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());

        name = $(this).attr('name');
        if (valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if (valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }


    });
    $(".input-number").keydown(function(e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
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
    $('#social-float').css('bottom', '150px');
  } else {
    $('#social-float').css('bottom', (50+'px');
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
<script>

function checkOffset() {
  var a=$(document).scrollTop()+window.innerHeight;
  var b=$('#footer-start').offset().top;
  if (a<b) {
    $('#social-float').css('bottom', '140px');
  } else {
    $('#social-float').css('bottom', (140+(a-b))+'px');
  }
}
$(document).ready(checkOffset);
$(document).scroll(checkOffset);

</script>
