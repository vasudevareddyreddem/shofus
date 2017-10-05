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
                    <a href="#" class="list-group-item text-center">

                        <h4 class="glyphicon glyphicon-shopping-cart"></h4>
                        <br/>Check Cart
                    </a>
                    <a href="#" class="list-group-item active text-center">
                        <h4 class="glyphicon glyphicon-folder-open"></h4>
                        <br/>Billing Address
                    </a>
                    <a href="#" class="list-group-item text-center">
                        <h4 class="glyphicon glyphicon-credit-card"></h4>
                        <br/>Payment mode
                    </a>
                    <a href="#" class="list-group-item text-center">
                        <h4 class="glyphicon glyphicon-ok"></h4>
                        <br/>Thanks for Shopping
                    </a>

                </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab">
			
			
			
			
                <!-- train section -->
         <div class="bhoechie-tab-content active">
                    <center>
		<div class="col-sm-12 col-xs-12 login-register-form m-b-3 text-left">
		<div class="row">
		 <div class="title"><span>Select a Delivery Address</span></div>
			<div class="col-md-6" id="hide_add">
				<div style="background:#fff;border:1px solid #ddd;border-radius:4px;padding:5px 20px;">
				<div style="padding-bottom:10px;">
					<div class="checkbox pull-left">
					  <label>
							<input type="checkbox" checked="checked">
							<span style="font-weight:500"> &nbsp; Carinhour</span>
					  </label>
					</div>
								
					<div class="pull-right" >
						<a style="cursor:pointer;line-height:35px;font-size:13px;padding-right:15px;"><span class=" site_col"> Change</span></a>
					</div>
					<i id="hide_add_btn" style="position:absolute;top:5px; right:20px;background:#f5f5f5;border-radius:25px; padding:5px;opacity:0.5;cursor:pointer" class="fa fa-times" aria-hidden="true"></i>
				</div>
				<div class="clearfix"> &nbsp;	</div>
				<div class="" style="border-top:1px solid #ddd;"> &nbsp;</div>
					<div><b>bayapureddy</b></div>	
					<div>Plot no 177 srivani nilayam</div>	
					<div>Sardar Vallabhbhai Patel,</div>	
					<div>Hyderabad-500082</div>	
					<div>Telangana</div>
					<br>					
					<div>8500226782</div>	
				</div>
			</div>
			<div class="col-md-6  ">
				<div style="background:#fff;border:1px solid #ddd;border-radius:4px;padding:5px 20px;">
				<div style="padding-bottom:10px;">
					<div class="checkbox pull-left">
					  <label>
							<input type="checkbox" checked="checked">
							<span style="font-weight:500"> &nbsp; Carinhourssss</span>
					  </label>
					</div>
								
					<div class="pull-right" >
						<a style="cursor:pointer;line-height:35px;font-size:13px;padding-right:15px;"><span class=" site_col"> Change</span></a>
					</div>
					<i  style="position:absolute;top:5px; right:20px;background:#f5f5f5;border-radius:25px; padding:5px;opacity:0.5;cursor:pointer" class="fa fa-times" aria-hidden="true"></i>
				</div>
				<div class="clearfix"> &nbsp;	</div>
				<div class="" style="border-top:1px solid #ddd;"> &nbsp;</div>
					<div><b>bayapureddy</b></div>	
					<div>Plot no 177 srivani nilayam</div>	
					<div>Sardar Vallabhbhai Patel,</div>	
					<div>Hyderabad-500082</div>	
					<div>Telangana</div>
					<br>					
					<div>8500226782</div>	
				</div>
			</div><div class="col-md-6  ">
				<div style="background:#fff;border:1px solid #ddd;border-radius:4px;padding:5px 20px;">
				<div style="padding-bottom:10px;">
					<div class="checkbox pull-left">
					  <label>
							<input type="checkbox" checked="checked">
							<span style="font-weight:500"> &nbsp; Carinhourssss</span>
					  </label>
					</div>
								
					<div class="pull-right" >
						<a style="cursor:pointer;line-height:35px;font-size:13px;padding-right:15px;"><span class=" site_col"> Change</span></a>
					</div>
					<i  style="position:absolute;top:5px; right:20px;background:#f5f5f5;border-radius:25px; padding:5px;opacity:0.5;cursor:pointer" class="fa fa-times" aria-hidden="true"></i>
				</div>
				<div class="clearfix"> &nbsp;	</div>
				<div class="" style="border-top:1px solid #ddd;"> &nbsp;</div>
					<div><b>bayapureddy</b></div>	
					<div>Plot no 177 srivani nilayam</div>	
					<div>Sardar Vallabhbhai Patel,</div>	
					<div>Hyderabad-500082</div>	
					<div>Telangana</div>
					<br>					
					<div>8500226782</div>	
				</div>
			</div><div class="col-md-6  ">
				<div style="background:#fff;border:1px solid #ddd;border-radius:4px;padding:5px 20px;">
				<div style="padding-bottom:10px;">
					<div class="checkbox pull-left">
					  <label>
							<input type="checkbox" checked="checked">
							<span style="font-weight:500"> &nbsp; Carinhourssss</span>
					  </label>
					</div>
								
					<div class="pull-right" >
						<a style="cursor:pointer;line-height:35px;font-size:13px;padding-right:15px;"><span class=" site_col"> Change</span></a>
					</div>
					<i  style="position:absolute;top:5px; right:20px;background:#f5f5f5;border-radius:25px; padding:5px;opacity:0.5;cursor:pointer" class="fa fa-times" aria-hidden="true"></i>
				</div>
				<div class="clearfix"> &nbsp;	</div>
				<div class="" style="border-top:1px solid #ddd;"> &nbsp;</div>
					<div><b>bayapureddy</b></div>	
					<div>Plot no 177 srivani nilayam</div>	
					<div>Sardar Vallabhbhai Patel,</div>	
					<div>Hyderabad-500082</div>	
					<div>Telangana</div>
					<br>					
					<div>8500226782</div>	
				</div>
			</div>
			
			
			
		</div>
			<div class="clearfix"> &nbsp;	</div>
          <div class="title"><span>Please Enter Your Information</span></div>
		<form action="<?php echo base_url('customer/billingaddresspost'); ?>" method="post" name="billingaddress" id="billingaddress">
		
			<div class="mat-div form-group">
				 <label for="first-name" class="mat-label">Name</label>
					 <input type="text" id="name" name="name" class="mat-input" value="">
		    </div>
			<div class="mat-div form-group">
				 <label for="first-name" class="mat-label">Mobile</label>
				 <input type="text" id="mobile" name="mobile" class="mat-input" value="" >
		    </div>
			<div class="mat-div form-group">
				 <label for="first-name" class="mat-label">Address1</label>
				<input type="text" id="address1" name="address1" class="mat-input" value=""  >
		    </div>
			<div class="mat-div form-group ">
				 <label for="first-name" class="mat-label">Address2</label>
				<input type="text" class="mat-input" id="address2" name="address2" value="" >
		    </div>
			
             <a href="#" class="btn btn-primary "> Back</a>
          <button class="pull-right btn btn-primary btn-small" type="submit">Proceed to Checkout</span><span aria-hidden="true">&rarr;</span></button>
         
          </form>
        </div>
           </center>
      </div>

               

               
            </div>
			
        </div>
		
		<div class="col-md-4 sm_hide" style=" border:1px solid #ddd; position:fixed;right:5% ;background-color:#fff;padding:10px;width:30%" id="social-float">
				<span><img src="<?php echo base_url(); ?>assets/home/images/track_lig.png" /></span> &nbsp;
			<span style="font-weight:500;font-size:17px">Delivery by 10AM-11AM ,3rd Oct,2017</span>
			<div class="clearfix">&nbsp;</div>
			<div style="border:1px solid #ddd;padding:10px">
				<input style="border:none;font-size:17px;" type="text" value="Pincode 500062"><span class="pull-right"><a class="site_col" style="cursor:pointer">Change</a></span>
			</div>
			<div class="clearfix">&nbsp;</div>
			<div>
				<div class="mar_t10">
				<div class="pull-left">
					Subtotal
				</div>
				<div class="pull-right">
					<span>₹</span>
					<span>50</span>
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
					<span>50</span>
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
					<span><b>50</b></span>
				</div>
				</div>
				<div class="clearfix">&nbsp;</div>
			</div>
			
			
			<div class="clearfix">&nbsp;</div>
	
			
			</div>
		
		
		
    </div>
</div>


<script>


	$(document).ready(function() {
    $('#billingaddress').bootstrapValidator({
       
        fields: {
            
             name: {
              validators: {
					notEmpty: {
						message: 'Name is required'
					},
                   regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Name can only consist of alphanumaric, space and dot'
					}
                }
            },
			mobile: {
              validators: {
					 notEmpty: {
						message: 'Mobile Number is required'
					},
                    regexp: {
					regexp:  /^[0-9]{10}$/,
					message:'Mobile Number must be 10 to 14 digits'
					}
                }
            },
			area: {
              validators: {
					notEmpty: {
						message: 'Please select an area'
					}
                }
            },
			address1: {
				validators: {
					notEmpty: {
						message: 'Address1 is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message: 'Address1 wont allow <> [] = % '
					}
				
				}
			},
			address2: {
				validators: {
					
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message: 'Address2 wont allow <> [] = % '
					}
				
				}
			}
			
			
        }
    });
});


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
    $('#social-float').css('bottom', '34%');
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
