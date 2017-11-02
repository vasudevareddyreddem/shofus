<style>
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
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
	border:none;
}
tr th:first-child,
tr th:last-child {
    width:40%;
	font-weight:400;
	color:#aaa;
}

</style>

<body >
<div class="container">
		<div class="row">
		
		
	 <!-- track start-->
<div class="row" >
  <?php if($this->session->flashdata('success')): ?>
		<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> <?php echo $this->session->flashdata('success');?>&nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i></div></div>


			<?php endif; ?>
			<?php if($this->session->flashdata('error')): ?>	
	<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_war"> <?php echo $this->session->flashdata('error');?>&nbsp; <i class="fa fa-check  text-warning ico_bac" aria-hidden="true"></i></div></div>

			<?php endif; ?>
	
			<div class="panel panel-primary">
			<div class="panel-body" style="padding-top:10px">
			
<div class="col-md-4" style="border-right:1px solid #45b1b5">
<table class="table " >
	<div><h5>ORDER DETAILS</h5></div>
	<?php //echo '<pre>';print_r($item_details);exit; ?>
    <tbody>
      <tr>
       <th>Order ID</th>
        <td><?php echo isset($item_details['order_item_id'])?$item_details['order_item_id']:'';  ?></td>
        
      </tr>
	  <tr>
       <th>Item Name</th>
        <td style="text-transform: uppercase;"><?php echo isset($item_details['item_name'])?$item_details['item_name']:'';  ?></td>
        
      </tr>
	  <tr>
					<th>Qty</th>
					<td><?php echo isset($item_details['qty'])?$item_details['qty']:'';  ?></td>

					</tr>
      <tr>
	  <tr>
       <th>Sold By</th>
        <td><?php echo isset($item_details['store_name'])?$item_details['store_name']:'';  ?></td>
        
      </tr>
      <th>Order Date</th>
        <td><?php echo isset($item_details['create_at'])?Date('M-d-Y h:i:s A',strtotime(htmlentities($item_details['create_at']))):'';  ?></td>
        
      </tr>
      <tr>
        <th>Amount </th>
		<?php if(isset($item_details['payment_type']) && $item_details['payment_type']==4){ ?>
			<td>₹ <?php echo number_format($item_details['total_price'], 2); ?>   through &nbsp; Paytm</td>
		<?php }else if(isset($item_details['payment_type']) && $item_details['payment_type']==3){ ?>
		<td>₹ <?php echo number_format($item_details['total_price'], 2); ?>  through &nbsp; Swipe on Delivery</td>
		<?php }else if(isset($item_details['payment_type']) && $item_details['payment_type']==2){ ?>
		<td>₹ <?php echo number_format($item_details['total_price'], 2); ?>  through &nbsp; Cash On Delivery</td>
		<?php }else if(isset($item_details['payment_type']) && $item_details['payment_type']==1){ ?>
        <td>₹ <?php echo number_format($item_details['total_price'], 2); ?>  through &nbsp; <?php echo isset($item_details['payment_mode'])?$item_details['payment_mode']:'';  ?></td>
        <?php } ?>
      </tr>
	  <tr>
        <th>Amount Status </th>
			<td><?php
		if(isset($item_details['amount_status_paid']) && $item_details['amount_status_paid']==1){
			echo "Paid";
		}else{
			echo "Pending";
			
		}  ?>
		</td>
		
      </tr>
	  <tr>
        <th>Delivery Amount</th>
        <td>₹ <?php echo isset($item_details['delivery_amount'])?$item_details['delivery_amount']:'';  ?></td>
        
      </tr>
	  <?php if($item_details['status_confirmation']==5){ ?>
	   <tr>
       <th>Status</th>
        <td>
			cancelled
		</td>
        
      </tr>
	  <?php } ?>
    </tbody>
  </table>
</div>
<div class="col-md-4" style="border-right:1px solid #45b1b5">
	<div><h5>Delivery location Address Details</h5></div>
		<div>
			<p><strong>Name :<?php echo isset($item_details['name'])?$item_details['name']:'';  ?></strong></p>
			<p><strong>Email Address :<?php echo isset($item_details['emal_id'])?$item_details['emal_id']:'';  ?></strong></p>
			<p><strong>Address :<?php echo isset($item_details['address1'])?$item_details['address1']:'';  ?></strong></p>
			<p><strong>City :<?php echo isset($item_details['city'])?$item_details['city']:'';  ?></strong></p>
			<p><strong>State :<?php echo isset($item_details['state'])?$item_details['state']:'';  ?></strong></p>
			<p><strong>Pincode :<?php echo isset($item_details['pincode'])?$item_details['pincode']:'';  ?></strong></p>
			
			<p><strong>Phone :<?php echo isset($item_details['mobile'])?$item_details['mobile']:'';  ?></strong></p>
			<!--<p><strong>Delivery location area :<?php echo isset($item_details['location_name'])?$item_details['location_name']:'';  ?></strong></p>
		--></div>
    
</div>
<?php //echo base64_decode($this->uri->segment('3'));
		//echo '<pre>';print_r($item_details);exit;
		$currentdate=date('Y-m-d h:i:s A');
		$tomorrow = date('Y-m-d h:i:s A',strtotime($item_details['create_at'] . "+1 days"));
		 ?>
		 
		<div class="col-md-4" >
		<?php if($item_details['status_deliverd']!=4 && $item_details['status_confirmation']!=5){ ?>
		<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal" style="position:absolute;right:0;top:10px;border-radius:5px;">Cancel</button>
		<?php } ?>
		<?php if(isset($item_details['amount_status_paid']) && $item_details['amount_status_paid']==1){ ?>
		<a href="<?php echo base_url('assets/downloads/'.$item_details['invoicename']); ?>" class="site_col" href="" target="_blank">View Invoice</a></p>
		<?php } ?>
		<?php if($item_details['status_deliverd']==4 && $item_details['status_refund']=='' ){ ?>
		<div><a class="site_col" href="<?php echo base_url('customer/orderrefund/'.base64_encode($item_details['order_item_id'])); ?>"><h5>Return</h5></a></div>
		<?php } ?>
		<p ><a class="site_col" id="review">Review this product</a></p>
		<?php if($item_details['status_deliverd']==4 && $item_details['status_refund']!=''){ ?>
		<p >Your order is Requested for <?php echo $item_details['status_refund']; ?>  </p>
		<p >Return policy : <?php echo $item_details['return_policy']; ?>  </p>
		<p >We will contact you within 12 hrs to clarify your request. Please note that your request will be accepted only if it falls within the sellers return policy of cartinhours.com. </p>
		<?php } ?>
		</div>
		</div>
		</div>
		</div>
		<div class="row rev_form" style="display:none">
	
			<div class="panel panel-primary">
			<div class="panel-body">
				<form  id="addreview" name="addreview" action="<?php echo base_url('category/productreview'); ?>" method="POST">
					<input type="hidden" name="product_id" id="product_id" value="<?php echo $item_details['item_id']; ?>">
					<input type="hidden" name="order_item_id" id="order_item_id" value="<?php echo $item_details['order_item_id']; ?>">
					<input type="hidden" name="customer_id" id="customer_id" value="<?php echo $customerdetail['customer_id']; ?>">
					<input type="hidden" name="seller_id" id="seller_id" value="<?php echo $item_details['seller_id']; ?>">
					<div class="row">
							<div class=" col-md-6 col-md-offset-3" style="padding:20px">		
							

								<div class="form-group">
									<label for="email">Email:</label>
									<input type="text" name="email" id="email" value="<?php echo $customerdetail['cust_email']; ?>" class="form-control" placeholder="Email">
								</div>
								<div class="form-group">
									<label for="pwd">Name:</label>
									<input type="text" id="name" name="name" value="<?php echo $customerdetail['cust_firstname'].' '.$customerdetail['cust_lastname']; ?>" class="form-control" placeholder="Name">
								</div>
								<div class="form-group starrr" id="stars">
									<label for="pwd">Rate this product</label>
									<input type="hidden" id="count" name="count" class="form-control" value="" placeholder="Name">
								</div>
								
								<div class="form-group">
									<label for="pwd">Your Review:</label>
									<textarea id="review" name="review" class="form-control" rows="5" placeholder="Your Review"></textarea>
								</div>
							  
								<button type="submit" class="btn btn-primary pull-right">Submit</button>
							</div>
					</div>
						
					</form>
				 </div>

				</div>
		</div>
		<div class="row">
	
			<div class="panel panel-primary">
			<div class="panel-body"  style="padding:20px 0px;">
				<div class="col-md-4">
					<div class="col-md-4">
						<a href="<?php echo base_url('category/productview/'.base64_encode($item_details['item_id'])); ?>"><img style="height:70px;width:auto;" src="<?php echo base_url('uploads/products/'.$item_details['item_image']);?>" /></a>
					</div>
					<div class="col-md-8">
						<p><a style="text-transform: uppercase;" href="<?php echo base_url('category/productview/'.base64_encode($item_details['item_id'])); ?>">  <td><?php echo isset($item_details['item_name'])?$item_details['item_name']:'';  ?></td></a></p>
						<?php if(isset($item_details['color']) && $item_details['color']!=''){ ?>
						<div>Color: <?php echo isset($item_details['color'])?$item_details['color']:'';  ?></div>
						<?php } ?>
						<div><?php echo $item_details['return_policy']; ?></div>
					
					</div>
				</div>
				<div class="col-md-5">
					<div class="stepwizard">
						<div class="stepwizard-row">
							<div class="stepwizard-step">
							
								<?php if($item_details['status_confirmation']==1){ ?>
								<button type="button" class="btn btn-primary btn-circle">1</button>
								<?php }else{ ?>
								<button type="button" class="btn btn-defaultt btn-circle" disabled="disabled">1</button>
								<?php } ?>
								<p>Order Confirmation</p>
							</div>
							<div class="stepwizard-step">
								<?php if($item_details['status_packing']==2){ ?>
								<button type="button" class="btn btn-primary btn-circle">2</button>
								<?php }else{ ?>
								<button type="button" class="btn btn-defaultt btn-circle"disabled="disabled">2</button>
								<?php } ?>
								<p>Packing Order</p>
							</div>
							<div class="stepwizard-step">
								<?php if($item_details['status_road']==3){ ?>
								<button type="button" class="btn btn-primary btn-circle">3</button>
								<?php }else{ ?>
								<button type="button" class="btn btn-defaultt btn-circle" disabled="disabled">3</button>
								<?php } ?>
								<p>Order on Road</p>
							</div> 
							<div class="stepwizard-step">
									<?php if($item_details['status_deliverd']==4){ ?>
								<button type="button" class="btn btn-primary btn-circle">4</button>
								<?php }else{ ?>
								<button type="button" class="btn btn-defaultt btn-circle" disabled="disabled">4</button>
								<?php } ?>
								<p>Delivered</p>
							</div> 
							</div> 
					</div>
				

				</div>
				<div class="col-md-3">
					<div class="col-md-3">
							<span class="font_span">₹<?php echo number_format(isset($item_details['total_price'])?$item_details['total_price']:'', 2);  ?></span>
					</div>
					<div class="col-md-9">
							<span class="btn btn-sm btn-danger pull-right ">
							<?php if($item_details['status_confirmation']==5){ 
								echo "cancelled";
									
									 }else { ?>
									 <?php if($item_details['status_confirmation']==5){ 
									
									echo "cancelled"; 
									}else{ 
									
											if($item_details['status_confirmation']==1 && $item_details['status_packing']==''){
												echo "Order Confirmed ";  
											  }else if($item_details['status_confirmation']==1 && $item_details['status_packing']==2 && $item_details['status_road']==''){
												  echo "Packing Order";
											  }else if($item_details['status_confirmation']==1 && $item_details['status_packing']==2 && $item_details['status_road']==3 && $item_details['status_deliverd']=='' || $item_details['status_deliverd']==0){
												  echo "Order on Road";
											  }else if($item_details['status_confirmation']==1 && $item_details['status_packing']==2 && $item_details['status_road']==3 && $item_details['status_deliverd']==4 && $item_details['status_refund']==''){
												  echo "Delivered";
											  }else if($item_details['status_refund']!=''){
												 echo $item_details['status_refund']; 
											  }
									  
									}
									  ?>
									<?php } ?>
							</span>
					</div>
				</div>
					<div class="clearfix">&nbsp;</div>
						<br>
					<div class=""><span>
					<img src="<?php echo base_url(); ?>assets/home/images/track.png" /></span> &nbsp; 
					<i class="font_span">
					<?php $time = date("H:i:s a",strtotime($item_details['create_at']));
					$begin1 = new DateTime('12:00 am');
					$end1 = new DateTime('7:00 pm');
					$begin2 = new DateTime('7:01 pm');
					$end2 = new DateTime('11:59 pm');
					$convertdate=date("g:i a", strtotime($time));
					$now = new DateTime($convertdate);

					if ($now >= $begin1 && $now <= $end1){
						$times=' today 10 pm';
					}else{
						$times=' tomorrow 2pm';
					}
					
					?>
					Delivery expected by <?php echo isset($times)?$times:'';  ?>
					</i></div>
					<hr	>
				<div class="col-md-3 col-md-offset-9">
						<span class="font_span"><b>Total</b></span>&nbsp;&nbsp;
						<span class="font_span">₹<?php echo number_format($item_details['total_price']+$item_details['delivery_amount'], 2); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
						<?php if(isset($item_details['discount']) && $item_details['discount']!=''){ ?>
						<span class="font_span site_col">Savings</span>&nbsp;&nbsp;
						<span class="font_span">₹<?php echo isset($item_details['discount'])?$item_details['discount']:'';  ?></span>
						<?php } ?>
				</div>

			</div>
		</div>
		</div>
		

	 <!-- track end-->
	   
	   </div>
	</div>


  <!-- Modal -->
  <div class="modal   fade" id="myModal" role="dialog" ">
    <div class="modal-dialog">
				<div class="panel panel-primary">
                    <div class="panel-heading">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="panel-title">Request Cancellation </h4>
                    </div>
                    <form action="#" method="post" accept-charset="utf-8">
                    <div class="modal-body" style="padding: 20px;">
						
					<div class="row">
						<div class="col-md-8">
							<label>Item Details</label>
						</div>
						<div class="col-md-2">
							<label>Qty</label>
						</div>
						<div class="col-md-2">
							<label>Subtotal</label>
						</div>
					</div>
					<hr style="border-top:1px solid #f5f5f5;">
					<div class="row">
						<div class="col-md-8">
							<div class="col-md-3">
								<img class="thumbnail"style="height:100px;width:auto;" src="<?php echo base_url('uploads/products/'.$item_details['item_image']);?>">
							</div>
							<div class="col-md-9">
								<div><?php echo isset($item_details['item_name'])?$item_details['item_name']:'';  ?>&nbsp;<?php echo isset($item_details['internal_memeory'])?$item_details['internal_memeory']:'';  ?>&nbsp;<?php echo isset($item_details['ram'])?$item_details['ram'].' RAM':'';  ?></div>
								<p>Color:<span><?php echo isset($item_details['colour'])?$item_details['colour']:'';  ?></span></p>
							</div>
						</div>
						<div class="col-md-2">
							<?php echo isset($item_details['qty'])?$item_details['qty']:'';  ?>
						</div>
						<div class="col-md-2">
							<?php echo number_format(isset($item_details['total_price'])?$item_details['total_price']:'', 2);  ?>
						</div>
					</div>
					<hr style="border-top:1px solid #f5f5f5;">
					<div class="row" style="padding:5px 30px">
					
						<div class="form-group">
						<label for="sel1">Reason for Cancellation</label>
						  <select class="form-control" id="reason" name="reason">
							<option value="">Select</option>
							<option value="order placed by mistake">order placed by mistake</option>
							<option value="Bought it from somewhere else">Bought it from somewhere else</option>
							<option value="item price/shipping cost is too high">item price/shipping cost is too high</option>
							<option value="My reason is not listed">My reason is not listed</option>
							<option value="Expected delivery time is too long">Expected delivery time is too long</option>
							<!--<option value="Need to change shipping address">Need to change shipping address</option>-->
						  </select>
						  <span id="errormeg" style="color:red"></span>
						</div>
						<div class="form-group">
						  <label for="comment">Comment:</label>
						  <textarea class="form-control" rows="2" id="comment" name="comment"></textarea>
						</div>
						<!--<p><strong>Note:</strong> Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
						-->
						<hr style="border-top:1px solid #f5f5f5;">
						<button type="button" onclick="submmtingcancle();" class="btn btn-danger  btn-sm pull-right" style="border-radius:5px;"> Confirm Cancellation</button>
					</div>
						
                          
                    </div>  
                       
                  
                </div>
      
    </div>
	<div class="clearfix"></div>
  </div>
 
  

	
<script>
function submmtingcancle(){
	var reason=$('#reason').val();
	var comment=$('#comment').val();
	var pids=$('#product_id').val();
	var oid=$('#order_item_id').val();
	var cid=$('#customer_id').val();
	if(reason==''){
		$('#errormeg').html('Please select a reason');
		return false;
	}
	$('#errormeg').html('');
	jQuery.ajax({
        url: "<?php echo site_url('customer/cancelorder');?>",
        type: 'post',
          data: {
          form_key : window.FORM_KEY,
			reasons: reason,
			comments: comment,
			pid: pids,
			order_items_id:oid,
			cust_id:cid,
		  qty: '1',
          },
        dataType: 'json',
        success: function (data) {
		  if(data.msg==1){
			 location.reload();   
		  }

        }
      });

}
var __slice = [].slice;

(function($, window) {
    var Starrr;

    Starrr = (function() {
        Starrr.prototype.defaults = {
            rating: void 0,
            numStars: 5,
            change: function(e, value) {}
        };

        function Starrr($el, options) {
            var i, _, _ref,
                _this = this;

            this.options = $.extend({}, this.defaults, options);
            this.$el = $el;
            _ref = this.defaults;
            for (i in _ref) {
                _ = _ref[i];
                if (this.$el.data(i) != null) {
                    this.options[i] = this.$el.data(i);
                }
            }
            this.createStars();
            this.syncRating();
            this.$el.on('mouseover.starrr', 'i', function(e) {
                return _this.syncRating(_this.$el.find('i').index(e.currentTarget) + 1);
            });
            this.$el.on('mouseout.starrr', function() {
                return _this.syncRating();
            });
            this.$el.on('click.starrr', 'i', function(e) {
                return _this.setRating(_this.$el.find('i').index(e.currentTarget) + 1);
            });
            this.$el.on('starrr:change', this.options.change);
        }

        Starrr.prototype.createStars = function() {
            var _i, _ref, _results;

            _results = [];
            for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
                _results.push(this.$el.append("<i class='fa fa-star-o'></i>"));
            }
            return _results;
        };

        Starrr.prototype.setRating = function(rating) {
            if (this.options.rating === rating) {
                rating = void 0;
            }
            this.options.rating = rating;
            this.syncRating();
            return this.$el.trigger('starrr:change', rating);
        };

        Starrr.prototype.syncRating = function(rating) {
            var i, _i, _j, _ref;

            rating || (rating = this.options.rating);
            if (rating) {
                for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
                    this.$el.find('i').eq(i).removeClass('fa-star-o').addClass('fa-star');
                }
            }
            if (rating && rating < 5) {
                for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
                    this.$el.find('i').eq(i).removeClass('fa-star').addClass('fa-star-o');
                }
            }
            if (!rating) {
                return this.$el.find('i').removeClass('fa-star').addClass('fa-star-o');
            }
        };

        return Starrr;

    })();
    return $.fn.extend({
        starrr: function() {
            var args, option;

            option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
            return this.each(function() {
                var data;

                data = $(this).data('star-rating');
                if (!data) {
                    $(this).data('star-rating', (data = new Starrr($(this), option)));
                }
                if (typeof option === 'string') {
                    return data[option].apply(data, args);
                }
            });
        }
    });
})(window.jQuery, window);

$(function() {
    return $(".starrr").starrr();
});

$( document ).ready(function() {
      
  $('#stars').on('starrr:change', function(e, value){
    $('#count').html(value);
	document.getElementById("count").value=value;
  });

});
$(document).ready(function(){
    $("#review").click(function(){
        $(".rev_form").toggle();
    });
});

$(document).ready(function() {
    $('#addreview').bootstrapValidator({
       
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
			email: {
             validators: {
					notEmpty: {
						message: 'Email is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
					message: 'Please enter a valid email address. For example johndoe@domain.com.'
					}
				}
            },
			review: {
               validators: {
					notEmpty: {
						message: 'Please enter a review'
					}
				}
            }
        }
    });
});
</script>

 