
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
</style>


<body >
<div class="pad_bod">
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
				  <td class="unit">
				    <?php if($items['offer_percentage']!==0 && $items['offer_percentage']!=='' ){
						$offeramount=($items['item_cost'])-($items['offer_amount']);
						echo $offeramount; 
						}else{ 
						echo $items['item_cost'];

						} ?>
				  </td>
				    <td class="action">
                   <button style="background:transprent;" type="submit" ><i class="fa fa-refresh"></i></button>&nbsp;
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

 