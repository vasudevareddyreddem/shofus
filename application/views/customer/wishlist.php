
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

.stepwizard-step p {
    margin-top: 10px;    
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;     
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;
    
}

.stepwizard-step {    
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
.font_span{
	font-size:17px;
}
</style>


<body >
<div class="container">
		<div class="row">
		<?php //echo '<pre>';print_r($whistlist_items);exit; ?>
		<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading ">Wishlist</div>
			<div class="panel-body">
			<section>
        <div class="">
           
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
					 
          <div class="table-responsive">
		  <?php if($this->session->flashdata('adderror')): ?>
			<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button><?php echo $this->session->flashdata('adderror');?></div>
			<?php endif; ?>
            <table class="table table-bordered table-cart">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Product Name</th>
				          <th>Quantity</th>
                  <th>Unit price</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
			  <?php 
			  foreach($whistlist_items as $items){ ?>
			  <form action="<?php echo base_url('customer/addcart'); ?>" method="Post" name="addtocart" id="addtocart" >
				<input type="hidden" name="producr_id" id="producr_id" value="<?php echo $items['item_id']; ?>" >
				<input type="hidden" name="wishlist" id="wishlist" value="1" >
         
			    <tr>
                  <td class="img-cart">
                    <a href="<?php echo base_url('category/productview/'.base64_encode($items['item_id'])); ?>">
                      <img src="<?php echo base_url('uploads/products/'.$items['item_image']); ?>" class="img-thumbnail">
                    </a>
                  </td>
				  <td>
                    <p><a href="<?php echo base_url('category/productview/'.base64_encode($items['item_id'])); ?>" class="d-block"><?php echo $items['item_name']; ?></a></p>
					<small>Status : <?php if($items['item_status']=1){ echo "In Stock";}else{ "Out of Stock";} ?></small>
				  </td>
				   <td class="input-qty">
				   <div class="input-qty">
						<div class="input-group number-spinner">
							<span class="input-group-btn data-dwn">
								<a class="btn btn-primary " data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></a>
							</span>
							<input type="text" name="qty" id="qty" class="form-control text-center" value="1" min="1" max="20">
							<span class="input-group-btn data-up">
								<a class="btn btn-primary " data-dir="up"><span class="glyphicon glyphicon-plus"></span></a>
							</span>
						</div>
                  </div>
				  </td>
				  <?php 
					$currentdate=date('Y-m-d h:i:s A');
						if($items['offer_expairdate']>=$currentdate){
									$item_price= ($items['item_cost']-$items['offer_amount']);
									$percentage= $items['offer_percentage'];
									$orginal_price=$items['item_cost'];
						}else{
							//echo "expired";
							$item_price= $items['special_price'];
							$prices= ($items['item_cost']-$items['special_price']);
							$percentage= (($prices) /$items['item_cost'])*100;
							$orginal_price=$items['item_cost'];
						}
					?>
				  <td class="unit">
				  <?php echo $item_price ; ?>
				  </td>
				    <td class="action">
                   <button style="background:transprent;" type="submit" ><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>&nbsp;
                    <a href="<?php echo base_url('customer/deletewishlist/'.base64_encode($items['id'])); ?>" class="text-danger" data-toggle="tooltip" data-placement="top" data-original-title="Remove"><i class="fa fa-trash-o"></i></a>
                   </td>
				  </tr>
				  
				  </form>
			<?php } ?>
              
              </tbody>
            </table>
			</form>
          </div>
         
						<div class="clearfix"></div>
          
                    </div>
                
                   
                
                </div>
          
        </div>
    </section>
	   </div>
	   </div>
	   </div>
	   
	   </div>
	 <!-- track start-->
		<div class="row">
	
			<div class="panel panel-primary">
			<div class="panel-body">
				<div class="col-md-4">
					<div class="col-md-4">
						<img style="width:60px" src="<?php echo base_url(); ?>assets/home/images/user.png" />
					</div>
					<div class="col-md-8">
						<p><a>Drapes Crepe Printed Salwar Suit Dupatta Material</a></p>
						<div>Color: Black</div>
						<div>30 Days Exchange</div>	<div>Color: Black</div>
						<div>30 Days Exchange</div>
					
					</div>
				</div>
				<div class="col-md-5">
					<div class="stepwizard">
						<div class="stepwizard-row">
							<div class="stepwizard-step">
								<button type="button" class="btn btn-primary btn-circle">1</button>
								<p>Select State</p>
							</div>
							<div class="stepwizard-step">
								<button type="button" class="btn btn-defaultt btn-circle">2</button>
								<p>Property Address</p>
							</div>
							<div class="stepwizard-step">
								<button type="button" class="btn btn-defaultt btn-circle" disabled="disabled">3</button>
								<p>List Price</p>
							</div> 
							<div class="stepwizard-step">
								<button type="button" class="btn btn-defaultt btn-circle" disabled="disabled">4</button>
								<p>Commission Offered</p>
							</div> 
							</div> 
					</div>
				

				</div>
				<div class="col-md-3">
					<div class="col-md-3">
							<span class="font_span">₹500</span>
					</div>
					<div class="col-md-9">
							<span class="site_co">2 Offers Applied</span>
					</div>
				</div>
					<div class="clearfix">&nbsp;</div>
						<br>
					<div class=""><span><img src="<?php echo base_url(); ?>assets/home/images/track.png" /></span> &nbsp; <i class="font_span">Delivery expected by Tue, Jun 27th '17</i></div>
					<hr	>
				<div class="col-md-3 col-md-offset-9">
						<span class="font_span"><b>Toatal</b></span>&nbsp;&nbsp;
						<span class="font_span">₹500</span>&nbsp;&nbsp;&nbsp;&nbsp;
						<span class="font_span site_col">Savings</span>&nbsp;&nbsp;
						<span class="font_span">₹44</span>
				</div>

			</div>
		</div>
		</div>
	 <!-- track end-->
	   
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

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
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
</script>


		

<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/js/common.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/js/owl.carousel.min.js"></script> 

<!-- the overlay element --> 

<script src="<?php echo base_url(); ?>assets/home/js/classie.js"></script> 
<script src="<?php echo base_url(); ?>assets/home/js/modalEffects.js"></script> 

 