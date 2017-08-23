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
#sticky {
 
    height:80%;

 
}
#sticky.stick {
    position: fixed !important;
    top: 0;
    z-index: 10;
    border-radius: 0 0 0.5em 0.5em;
}
</style>


<body >
<div class="pad_bod">
		<div class="row">
		<div id="sticky-anchor"></div>
		<div class="col-md-3" id="sticky">
		<div class="panel panel-primary">
			<div class="panel-heading ">Price details</div>
			<div class="panel-body">
				<div class="pull-left">
					Price (<?php if(count($cart_items) >0){  echo count($cart_items).'  '.'items';}else{  echo "item";  }?>)
				</div>
				<div class="pull-right">
					<i class="fa fa-inr" aria-hidden="true"></i><?php echo isset($carttotal_amount['pricetotalvalue'])?$carttotal_amount['pricetotalvalue']:''; ?>
				</div>
				
				<div class="clearfix"></div>
				<div class="mar_t20">
				<div class="pull-left">
					Delivery Charges
				</div>
				<div class="pull-right">
					<i class="fa fa-inr" aria-hidden="true"></i><?php echo isset($carttotal_amount['delivertamount'])?$carttotal_amount['delivertamount']:''; ?>
				</div>
				</div>
				<div class="clearfix"></div>
				<hr>
				<div class="mar_t20">
				<div class="pull-left">
					<b>Amount Payable</b>
				</div>
				<div class="pull-right">
					<i class="fa fa-inr" aria-hidden="true"></i><b>
				<?php 	$totalpayamount=$carttotal_amount['pricetotalvalue'] + $carttotal_amount['delivertamount'];
					echo $totalpayamount;
				?>
				</b>
				</div>
				</div>
				
			</div>
		</div>
		</div>
		
		<div class="col-md-8 " id="off_set_stic">
		<div class="panel panel-primary">
			<div class="panel-heading ">Payment</div>
			<div class="panel-body">
			<section>
        <div class="wizard">
           
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
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
		  <?php if($this->session->flashdata('productsuccess')): ?>
			<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button><?php echo $this->session->flashdata('productsuccess');?></div>
			<?php endif; ?>
			
			<?php if(count($cart_items)>0){   ?>
            <table class="table table-bordered table-cart">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Unit price</th>
                  <th>SubTotal</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
			  <?php 
			  //echo '<pre>';print_r($cart_items);exit; 
			$total='';
			  foreach($cart_items as $items){ ?>
			  <form action="<?php  echo base_url('customer/updatecart'); ?>" method="post" name="updatecart" id="updatecart">

			  <input type="hidden" name="product_id" id="product_id"  value="<?php echo $items['item_id']; ?>">
                <tr>
                  <td class="img-cart">
                    <a href="<?php echo base_url('category/productview/'.base64_encode($items['item_id'])); ?>">
                      <img src="<?php echo base_url('uploads/products/'.$items['item_image']); ?>" class="img-thumbnail">
                    </a>
                  </td>
                  <td>
                    <p><a href="<?php echo base_url('category/productview/'.base64_encode($items['item_id'])); ?>" class="d-block"><?php echo $items['item_name']; ?></a></p>
                  </td>
				  
				  
                  <td class="input-qty">
				   <div class="input-qty">
						<div class="input-group number-spinner">
							<span class="input-group-btn data-dwn">
								<a class="btn btn-primary " data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></a>
							</span>
							<input type="text" name="qty" id="qty" class="form-control text-center" value="<?php echo $items['qty'];  ?>" min="1" max="20">
							<span class="input-group-btn data-up">
								<a class="btn btn-primary " data-dir="up"><span class="glyphicon glyphicon-plus"></span></a>
							</span>
						</div>
                  </div>
				  
				  
				  
				  
				  </td>
				  
				  <?php if($items['offer_percentage']!==0 && $items['offer_percentage']!=='' ){ ?>
					 
					 <?php if(date('m/d/Y') <= $items['offer_expairdate']){

            $offeramount=($items['item_cost'])-($items['offer_amount']);
            $amount=(($offeramount) * ($items['qty']));
            $total+= $amount;?>
            <td class="unit"><?php echo $offeramount; ?> </td>
			<td class="sub"><?php echo $amount; ?></td> 

          <?php }else{
            $withoutofferamount=($items['item_cost']);
            $amount=(($withoutofferamount) * ($items['qty']));
            $total+= $amount; 
           ?>
			<td class="unit"><?php echo $withoutofferamount; ?> </td>
			<td class="sub"><?php echo $amount; ?></td>
         <?php } ?>
           
                     
         <?php  }else{ ?>
			 
			 <td class="unit"><?php echo $items['item_cost']; ?> </td>
			<td class="sub"><?php echo $items['item_cost']; ?></td>
		<?php  } ?>
                  <td class="action">
				  <button style="background:transprent;" type="submit" ><i class="fa fa-refresh"></i></button>&nbsp;
                    <a href="<?php echo base_url('customer/deletecart/'.base64_encode($items['item_id']).'/'.base64_encode($items['id'])); ?>" class="text-danger" data-toggle="tooltip" data-placement="top" data-original-title="Remove"><i class="fa fa-trash-o"></i></a>
                  </td>
				  	
                </tr>
				  </form>
				
			  <?php }   ?>
               
             
               
                <tr>
                  <td colspan="4" class="text-right">Total</td>
                  <td colspan="2"><b><?php echo $total; ?></b></td>
                </tr> 
				<tr>
                  <td colspan="4" class="text-right">grand Total</td>
                  <td colspan="2"><b><?php echo $carttotal_amount['pricetotalvalue'] + $carttotal_amount['delivertamount']; ?></b></td>
                </tr>
				
              </tbody>
            </table>
			</form>
          </div>
          <nav aria-label="Shopping Cart Next Navigation">
            <ul class="pager">
              <li class="previous"><a href="<?php echo base_url(''); ?>"><span aria-hidden="true">&larr;</span> Continue Shopping</a></li>
              <li class="next"><a href="<?php echo base_url('customer/billing'); ?>">Proceed to Checkout <span aria-hidden="true">&rarr;</span></a></li>
            </ul>
          </nav>
		  
		<?php }else{ ?>
		</tr> No Item In the cart. click on <a href="<?php echo base_url(''); ?>">Continue shopping</a> </tr>
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
	

<script>

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
$(function() {
    var action;
    $(".number-spinner a").mousedown(function () {
        btn = $(this);
        input = btn.closest('.number-spinner').find('input');
        btn.closest('.number-spinner').find('a').prop("disabled", false);

    	if (btn.attr('data-dir') == 'up') {
            action = setInterval(function(){
                if ( input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max')) ) {
                    input.val(parseInt(input.val())+1);
                }else{
                    btn.prop("disabled", true);
                    clearInterval(action);
                }
            }, 50);
    	} else {
            action = setInterval(function(){
                if ( input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min')) ) {
                    input.val(parseInt(input.val())-1);
                }else{
                    btn.prop("disabled", true);
                    clearInterval(action);
                }
            }, 50);
    	}
    }).mouseup(function(){
        clearInterval(action);
    });
});

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

 