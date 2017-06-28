
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
<header>
<!--wrapper start here -->

<div class="wrapper"> 
  <!--header part start here -->
  <div class="jain_container">
    

</header>
<div class="" style="margin-top:130px;">
	
</div>
<body >
<div class="pad_bod">
		<div class="row">
		
		<?php //echo '<pre>';print_r($cart_items);exit; ?>
		<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading ">Cart</div>
			<div class="panel-body">
			<section>
        <div class="wizard">
           
            <form role="form">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
					 <?php if($this->session->flashdata('success')): ?>
			<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button><?php echo $this->session->flashdata('success');?></div>
			<?php endif; ?>
          <div class="table-responsive">
		  <form action="<?php  echo base_url('customer/updatecart'); ?>" method="POST" name="updatecart" id="updatecart">
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
			$total='';
			  foreach($cart_items as $items){ ?>
                <tr>
                  <td class="img-cart">
                    <a href="detail.html">
                      <img src="<?php echo base_url(); ?>assets/home/images/p1-small-1.jpg" class="img-thumbnail">
                    </a>
                  </td>
                  <td>
                    <p><a href="<?php echo base_url('category/productview/'.base64_encode($items['item_id'])); ?>" class="d-block"><?php echo $items['item_name']; ?></a></p>
                  </td>
                  <td class="input-qty"><input type="text" value="<?php echo $items['qty']; ?>" class="form-control text-center" /></td>
				  
				  <?php if($items['offer_percentage']!==0 && $items['offer_percentage']!=='' ){ ?>
					 
					 <?php 
						$offeramount=($items['item_cost'])-($items['offer_amount']);
						$amount=(($offeramount) * ($items['qty']));
						$total+= $amount; 
					 ?>
					 
					<td class="unit"><?php echo $offeramount; ?> </td>
					<td class="sub"><?php echo $amount; ?></td>					 
				 <?php  }else{ 
				 
				 $withoutofferamount=(($items['item_cost']) * ($items['qty']));
					$total+= $withoutofferamount; 
					?>
					<td class="unit"><?php echo $items['item_cost']; ?> </td>
					<td class="sub"><?php echo $withoutofferamount; ?></td>	
				  
				 <?php } ?>
                  <td class="action">
                    <a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Update"><i class="fa fa-refresh"></i></a>&nbsp;
                    <a href="#" class="text-danger" data-toggle="tooltip" data-placement="top" data-original-title="Remove"><i class="fa fa-trash-o"></i></a>
                  </td>
				  	
                </tr>
				
			  <?php } ?>
               
             
               
                <tr>
                  <td colspan="4" class="text-right">Total</td>
                  <td colspan="2"><b><?php echo $total; ?></b></td>
                </tr>
              </tbody>
            </table>
			</form>
          </div>
          <nav aria-label="Shopping Cart Next Navigation">
            <ul class="pager">
              <li class="previous"><a href="<?php echo base_url(''); ?>"><span aria-hidden="true">&larr;</span> Continue Shopping</a></li>
              <li class="next"><a href="<?php echo base_url('customer/checkout'); ?>">Proceed to Checkout <span aria-hidden="true">&rarr;</span></a></li>
            </ul>
          </nav>
						<div class="clearfix"></div>
          
                    </div>
                
                   
                
                </div>
            </form>
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
</script>

		

<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/js/common.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/js/owl.carousel.min.js"></script> 

<!-- the overlay element --> 

<script src="<?php echo base_url(); ?>assets/home/js/classie.js"></script> 
<script src="<?php echo base_url(); ?>assets/home/js/modalEffects.js"></script> 

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>

 