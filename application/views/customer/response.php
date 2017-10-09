
<?php if($this->session->flashdata('productsuccess')): ?>
			<div class="alt_cus"><div class="alert_msg animated slideInUp btn_suc"> <?php echo $this->session->flashdata('productsuccess');?>&nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i></div></div>
			<?php endif; ?> 
			<?php if($this->session->flashdata('qtyerror')): ?>
				<div class="alt_cus"><div class="alert_msg animated slideInUp btn_war"> <?php echo $this->session->flashdata('qtyerror');?>&nbsp; <i class="fa fa-check  text-warning ico_bac" aria-hidden="true"></i></div></div>

			<?php endif; ?>
			
			<div class="alt_cus"><div style="display:none;" class="alert_msg animated slideInUp btn_war" id="qtymesage"> &nbsp; <i class="fa fa-check  text-warning ico_bac" aria-hidden="true"></i></div></div>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 bhoechie-tab-container">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
                <div class="list-group">
                    <div href="#" class="list-group-item  text-center step_com">

                        <h4 class="glyphicon glyphicon-shopping-cart "></h4>
                        <br/>Check Cart
                    </div>
                    <div href="#"  class="list-group-item text-center step_com">
                        <h4 class="glyphicon glyphicon-folder-open "></h4>
                        <br/>Billing Address
                    </div>
                    <div href="#" class="list-group-item text-center step_com">
                        <h4 class="glyphicon glyphicon-credit-card "></h4>
                        <br/>Payment mode
                    </div>
                    <div href="#" class="list-group-item active text-center">
                        <h4 class="glyphicon glyphicon-ok "></h4>
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
                                
								<?php foreach($order_items as $productslist){

								//echo '<pre>';print_r($order_items);exit; 								?>
								
								<div class="loop" style="border-top: 1px solid #ddd;">
                                <div class="panel-body">
                                    <table class="table borderless">

                                        <tbody>
                                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                            <tr>
                                                <td class="col-md-2">
                                                    <div class="media">
                                                        <a class="thumbnail pull-left" href="<?php echo base_url('category/productview/'.base64_encode($productslist['item_id'])); ?>"> <img class="media-object" src="<?php echo base_url('uploads/products/'.$productslist['item_image']); ?>" style="width: 72px; height: 72px;"> </a>

                                                    </div>
                                                    <br>
                                                    
                                                </td>
                                                <td class="text-left" style="width:250px;">
                                                    <p class="" style="font-size:17px;font-weight:500"><?php echo isset($productslist['item_name'])?$productslist['item_name']:''; ?>&nbsp;<?php echo isset($productslist['product_code'])?$productslist['product_code']:''; ?></p>
                                                    <p><?php echo isset($productslist['brand'])?$productslist['brand']:''; ?></p>
                                                    <p>
													<span style="font-size:20px;font-weight:500">₹<?php echo $productslist['total_price']; ?></span> &nbsp;&nbsp;
                            

                                                </td>


                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="panel-footer text-center" style="background:#fff;">
                                    <div class="pull-left">
                                        <span style="color:#888;font-size:17px">Seller:</span>&nbsp;&nbsp;<span><?php echo isset($productslist['store_name'])?$productslist['store_name']:''; ?></span>
                                    </div>
									<div class="pull-right">
                                        <a href="<?php echo base_url('customer/orederdetails/'.base64_encode($productslist['order_item_id'])); ?>"><span style="color:#888;font-size:17px">Track</span></a>
                                    </div>
                                 
                                    <div class="clearfix"></div>
                                </div>
								
                                </div>
								
								<?php } ?>
								
								
								
								
								
								
                            </div>
                            <!--SHIPPING METHOD END-->
                        </div>
                    </center>
                </div>
               
            </div>
			
        </div>
		
		
		
		
		
    </div>
</div>


<script>
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
