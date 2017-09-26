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
<div class="pad_bod">
		<div class="row" id="updateqty"></div>
		<div class="row" id="oldcartqty">
		<div id="sticky-anchorupdateqtyhide"></div>
		<?php //echo '<pre>';print_r($details);exit; ?>
		
		<div class="col-md-8 " id="off_set_stic">
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
					<?php if($items['maxtime']<=60){ ?>
					 <td class="action">
					 <span id="errorselect" style="color:red"></span>
						  <select onchange="selectdeliveroptions(this.value)" id="deliverycharge<?php echo $cnt; ?>" name="deliverycharge">
						  <option value="0">Select</option>
						  <?php if($items['category_id']==20 || $items['category_id']==22){ ?>
							  <?php if($items['total_price']>0 && $items['total_price']<=100){ ?>
							  <option value="140<?php echo '/'.$items['id']?>">Fast( Amount: 140)</option>
							  <option value="88">Fastest( Amount: 88)</option>
							  <?php }else if($items['total_price']>100 && $items['total_price']<=200){ ?>
								<option value="130">Fast( Amount: 130)</option>
								<option value="78">Fastest( Amount: 78)</option>
							  <?php }else if($items['total_price']>200 && $items['total_price']<=300){ ?>
								<option value="120">Fast( Amount: 120)</option>
								<option value="68">Fastest( Amount: 68)</option>
							  <?php }else if($items['total_price']>300 && $items['total_price']<=400){ ?>
								<option value="110">Fast( Amount: 110)</option>
								<option value="58">Fastest( Amount: 58)</option>
							  <?php }else if($items['total_price']>400 && $items['total_price']<=500){ ?>
								<option value="100">Fast( Amount: 100)</option>
								<option value="48">Fastest( Amount: 48)</option>
							  <?php }else if($items['total_price']>500 && $items['total_price']<=600){ ?>
								<option value="90">Fast( Amount: 90)</option>
								<option value="38">Fastest( Amount: 38)</option>
							  <?php }else if($items['total_price']>600 && $items['total_price']<=700){ ?>
								<option value="80<?php echo '/'.$items['id']?>">Fast( Amount: 80)</option>
								<option value="28<?php echo '/'.$items['id']?>">Fastest( Amount: 28)</option>
							  <?php }else if($items['total_price']>700 && $items['total_price']<=800){ ?>
								<option value="70<?php echo '/'.$items['id']?>">Fast( Amount: 70)</option>
								<option value="18<?php echo '/'.$items['id']?>">Fastest( Amount: 18)</option>
							  <?php }else if($items['total_price']>800 && $items['total_price']<=900){ ?>
								<option value="60">Fast( Amount: 60)</option>
								<option value="8">Fastest( Amount: 8)</option>
							  <?php }else if($items['total_price']>900){ ?>
								<option value="50">Fast( Amount: 50)</option>
								<option value="0">Fastest( Amount: 0)</option>
							  <?php } ?>
						  <?php }else{  ?>
						    <?php if($items['total_price']>0 && $items['total_price']<=100){ ?>
							  <option value="140">Fast( Amount: 140)</option>
							  <option value="88">Fastest( Amount: 88)</option>
							  <?php }else if($items['total_price']>100 && $items['total_price']<=200){ ?>
								<option value="130">Fast( Amount: 130)</option>
								<option value="78">Fastest( Amount: 78)</option>
							  <?php }else if($items['total_price']>200 && $items['total_price']<=300){ ?>
								<option value="120">Fast( Amount: 120)</option>
								<option value="68">Fastest( Amount: 68)</option>
							  <?php }else if($items['total_price']>300 && $items['total_price']<=400){ ?>
								<option value="110">Fast( Amount: 110)</option>
								<option value="58">Fastest( Amount: 58)</option>
							  <?php }else if($items['total_price']>400 && $items['total_price']<=500){ ?>
								<option value="100">Fast( Amount: 100)</option>
								<option value="48">Fastest( Amount: 48)</option>
							  <?php }else if($items['total_price']>500 && $items['total_price']<=600){ ?>
								<option value="90">Fast( Amount: 90)</option>
								<option value="38">Fastest( Amount: 38)</option>
							  <?php }else if($items['total_price']>600 && $items['total_price']<=700){ ?>
								<option value="80<?php echo '/'.$items['id']?>">Fast( Amount: 80)</option>
								<option value="28<?php echo '/'.$items['id']?>">Fastest( Amount: 28)</option>
							  <?php }else if($items['total_price']>700 && $items['total_price']<=800){ ?>
								<option value="70<?php echo '/'.$items['id']?>">Fast( Amount: 70)</option>
								<option value="18<?php echo '/'.$items['id']?>">Fastest( Amount: 18)</option>
							  <?php }else if($items['total_price']>800 && $items['total_price']<=900){ ?>
								<option value="60<?php echo '/'.$items['id']?>">Fast( Amount: 60)</option>
								<option value="8<?php echo '/'.$items['id']?>">Fastest( Amount: 8)</option>
							  <?php }else if($items['total_price']>900){ ?>
								<option value="50">Fast( Amount: 50)</option>
								<option value="0">Fastest( Amount: 0)</option>
							  <?php } ?>
						  <?php } ?>
						  </select>
						  <span id="errorselect<?php echo $cnt; ?>" style="color:red"></span>
						</td>
				  
					<?php }else { ?>
					 <td class="action"> fghfgh</td>
					
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
              <li class="previous"><a href="<?php echo base_url(''); ?>"><span aria-hidden="true">&larr;</span> Continue Shopping</a></li>
              <button type="submit" >Proceed to Checkout <span aria-hidden="true">&rarr;</span></button>
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
			}	
			
		}
			return false;
			
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
			  $('#errorselect').html('Please select a value');
		  }
		  
	  }
			

	$(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}


function sticky_relocate() {
    var window_top = $(window).scrollTop();
    var footer_top = $("#footer-start").offset().top;
    var div_top = $('#sticky-anchor').offset().top;
    var div_height = $("#sticky").height();
    
    var padding = 20;  // tweak here or get from margins etc
    
    if (window_top + div_height > footer_top - padding)
        $('#sticky').css({top: (window_top + div_height - footer_top + padding) * -1})
    else if (window_top > div_top) {
        $('#sticky').addClass('stick');
        $('#off_set_stic').addClass('col-md-offset-3');
        $('#sticky').css({top: 100})
    } else {
        $('#off_set_stic').removeClass('col-md-offset-3');
        $('#sticky').removeClass('stick');
		$('#sticky').css({top:0})
    }
}

$(function () {
    $(window).scroll(sticky_relocate);
    sticky_relocate();
});

</script>

 