<body >
<div class="container">
		<div class="row">
	
		
			<section>
       
           
             
					 
          <div class="table-responsive panel col-md-offs">
		  <?php if($this->session->flashdata('adderror')): ?>
			<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button><?php echo $this->session->flashdata('adderror');?></div>
			<?php endif; ?>
			<?php if($this->session->flashdata('productsuccess')): ?>
			<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button><?php echo $this->session->flashdata('productsuccess');?></div>
			<?php endif; ?>
            <table class="table ">
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
			  //echo '<pre>';print_r($whistlist_items);exit;
			  foreach($whistlist_items as $items){ ?>
			  <form action="<?php echo base_url('customer/addcart'); ?>" method="Post" name="addtocart" id="addtocart" >
				<input type="hidden" name="producr_id" id="producr_id" value="<?php echo $items['item_id']; ?>" >
				<input type="hidden" name="wishlist" id="wishlist" value="1" >
         
			    <tr>
                  <td class="">
                    <a href="<?php echo base_url('category/productview/'.base64_encode($items['item_id'])); ?>">
                      <img style="width:150px;" src="<?php echo base_url('uploads/products/'.$items['item_image']); ?>" class="img-thumbnail">
                    </a>
                  </td>
				  <td>
                    <p><a href="<?php echo base_url('category/productview/'.base64_encode($items['item_id'])); ?>" class="d-block"><?php echo $items['item_name']; ?></a></p>
					<small>Status : <?php if($items['item_status']=1){ echo "In Stock";}else{ "Out of Stock";} ?></small>
				  </td>
				   <?Php if($items['item_quantity']!=0){ ?>
					     <td class="input-qty">
				   <div class="input-qty">
						<div class="input-group number-spinner">
							<span class="input-group-btn data-dwn">
								<a class="btn btn-primary"  data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></a>
							</span>
							<input type="text" name="qty" id="qty" readonly class="form-control text-center" value="1" min="1" max="<?php echo $items['item_quantity']; ?>">
							<span class="input-group-btn data-up">
								<a class="btn btn-primary" data-dir="up"><span class="glyphicon glyphicon-plus"></span></a>
							</span>
						</div>
                  </div>
				 </td>
					  
					  
				  <?php }else{ ?>
				  		<td class="input-qty"><span class="label label-warning arrowed"> Out of Stock</span></td>

				
				  <?php } ?>
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
          
               
          
       
    </section>
	  
	 
	   
	   </div>
	 <!-- track start-->




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

<script>
$(document).ready(function(){
    $("#review").click(function(){
        $(".rev_form").toggle();
    });
});
</script>

		

<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/js/common.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/js/owl.carousel.min.js"></script> 

<!-- the overlay element --> 

<script src="<?php echo base_url(); ?>assets/home/js/classie.js"></script> 
<script src="<?php echo base_url(); ?>assets/home/js/modalEffects.js"></script> 

 