
		<span id="reupdateqty">
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
			  $cnt=0;foreach($cart_items as $items){ ?>
			   <script>$('#qty'+'<?php echo $cnt; ?>').val('<?php echo $items['qty'];  ?>');</script>
			  <input type="hidden" name="orginalqty" id="orginalqty<?php echo $cnt; ?>" value="<?php echo $items['item_quantity']; ?>" >

			  <form action="<?php  echo base_url('customer/updatecart'); ?>" method="post" name="updatecart" id="updatecart">

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
				   <div class="input-qty">
						<div class="input-group number-spinner">
							<span class="input-group-btn data-dwn">
								<a class="btn btn-primary" onclick="productqty('<?php echo $cnt; ?>');" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></a>
							</span>
							<input type="text" name="qty" id="qty<?php echo $cnt; ?>" readonly class="form-control text-center" value="<?php echo $items['qty'];  ?>" min="1" max="<?php echo $items['item_quantity']; ?>">
							<span class="input-group-btn data-up">
								<a class="btn btn-primary" onclick="productqtyincreae('<?php echo $cnt; ?>');" data-dir="up"><span class="glyphicon glyphicon-plus"></span></a>
							</span>
						</div>
                  </div>
				  <span style="color:red;" id="qtymesage<?php echo $cnt; ?>"></span>
				 </td>
					  
					  
				  <?php }else{ ?>
				  		<td class="input-qty"><span class="label label-warning arrowed"> Out of Stock</span></td>

				
				  <?php } ?>
                  
				  
				  
			 
				<td class="unit"><?php echo $items['item_price']; ?> </td>
				<td class="sub"><?php echo $items['total_price']; ?></td>
		
                  <td class="action">
				  <!--<button style="background:transprent;" type="submit" ><i class="fa fa-refresh"></i></button>&nbsp;-->
                    <a href="<?php echo base_url('customer/deletecart/'.base64_encode($items['item_id']).'/'.base64_encode($items['id'])); ?>" class="text-danger" data-toggle="tooltip" data-placement="top" data-original-title="Remove"><i class="fa fa-trash-o"></i></a>
                  </td>
				  	
                </tr>
				  </form>
					<?php $total +=$items['total_price']; ?>
			  <?php $cnt++;}   ?>
               
             
               
                <tr>
                  <td colspan="4" class="text-right">Total</td>
                  <td colspan="2"><b><?php echo $total; ?></b></td>
                </tr> 
				<tr>
                  <td colspan="4" class="text-right">Grand Total</td>
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
		</tr> No Item In the cart. click on <a  class="site_col" href="<?php echo base_url(''); ?>"> &nbsp;<b> Continue shopping</b></a> </tr>
		<?php } ?>
		<div class="clearfix"></div>
                </div>
         
        </div>
    </section>
	   </div>
	   </div>
	   </div>
	   </span>
	   <div class="clearfix">&nbsp;</div>
<?php if($this->session->flashdata('productsuccess')): ?>
			<div class="alert_msg animated slideInUp btn_suc"> <?php echo $this->session->flashdata('productsuccess');?>&nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></div>
			<?php endif; ?> 
			<?php if($this->session->flashdata('qtyerror')): ?>
				<div class="alert_msg animated slideInUp btn_war"> <?php echo $this->session->flashdata('qtyerror');?>&nbsp; <i class="fa fa-check  text-warning ico_bac" aria-hidden="true"></i></div>

			<?php endif; ?>
			
			<div style="display:none;" class="alert_msg animated slideInUp btn_war" id="qtymesage"> &nbsp; <i class="fa fa-check  text-warning ico_bac" aria-hidden="true"></i></div>

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
	$("#qtymesage"+id).html("Maximum allowwed Quantity is 10 ");
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

 