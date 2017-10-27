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
		<div class="alt_cus"><div class="alert_msg animated slideInUp btn_suc"> <?php echo $this->session->flashdata('success');?>&nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i></div></div>


			<?php endif; ?>
			<?php if($this->session->flashdata('error')): ?>	
	<div class="alt_cus"><div class="alert_msg animated slideInUp btn_war"> <?php echo $this->session->flashdata('error');?>&nbsp; <i class="fa fa-check  text-warning ico_bac" aria-hidden="true"></i></div></div>

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
        <td><?php echo isset($item_details['item_name'])?$item_details['item_name']:'';  ?></td>
        
      </tr>
	  <tr>
					<th>Qty</th>
					<td><?php echo isset($item_details['qty'])?$item_details['qty']:'';  ?></td>

					</tr>
      <tr>
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
    </tbody>
  </table>
</div>
<div class="col-md-4" style="border-right:1px solid #45b1b5">
	<div><h5>Delivery location Address Details</h5></div>
		<div>
			<p><strong>Name :<?php echo isset($item_details['name'])?$item_details['name']:'';  ?></strong></p>
			<p><strong>Email Address :<?php echo isset($item_details['emal_id'])?$item_details['emal_id']:'';  ?></strong></p>
			<p><strong>Address :<?php echo isset($item_details['address1'])?$item_details['address1']:'';  ?></strong></p>
			<?php if(isset($item_details['address2']) && $item_details['address2']!=''){?>
			<p><strong>Address2 :<?php echo isset($item_details['address1'])?$item_details['address1']:'';  ?></strong></p>
			<?php } ?>
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
		<button class="btn btn-danger btn-sm" style="position:absolute;right:0;top:10px;border-radius:5px;">Cancel</button>
		<?php if(isset($item_details['amount_status_paid']) && $item_details['amount_status_paid']==1){ ?>
		<a href="<?php echo base_url('assets/downloads/'.$item_details['invoicename']); ?>" class="site_col" href="" target="_blank">View Invoice</a></p>
		<?php } ?>
		<?php if($item_details['status_deliverd']==4 && $item_details['status_refund']=='' && $currentdate<= $tomorrow){ ?>
		<div><a class="site_col" href="<?php echo base_url('customer/orderrefund/'.base64_encode($item_details['order_item_id'])); ?>"><h5>Return</h5></a></div>
		<?php } ?>
		<p ><a class="site_col" id="review">Review this product</a></p>
		<?php if($item_details['status_deliverd']==4 && $item_details['status_refund']!=''){ ?>
		<p >Your order status is <?php echo $item_details['status_refund']; ?>  Requested</p>
		<p >We will contact you within 72 hrs to clarify your request. Please note your request will be accepted only if it falls within the cartinhour return policy. </p>
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
							<div class=" col-md-6 col-md-offset-3">		
							

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
						<img style="height:70px;width:auto;" src="<?php echo base_url(); ?>assets/home/images/user.png" />
					</div>
					<div class="col-md-8">
						<p><a href="<?php echo base_url('category/productview/'.base64_encode($item_details['item_id'])); ?>">  <td><?php echo isset($item_details['item_name'])?$item_details['item_name']:'';  ?></td></a></p>
						<?php if(isset($item_details['color']) && $item_details['color']!=''){ ?>
						<div>Color: <?php echo isset($item_details['color'])?$item_details['color']:'';  ?></div>
						<?php } ?>
						<div>7 Days Exchange</div>
					
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
							<span class="site_co"><?php if($item_details['order_status']==5){ echo "Item returned"; } ?></span>
					</div>
				</div>
					<div class="clearfix">&nbsp;</div>
						<br>
					<div class=""><span><img src="<?php echo base_url(); ?>assets/home/images/track.png" /></span> &nbsp; 
					<i class="font_span">
					<?php  $timestamp = strtotime($item_details['create_at']) + 2*60*60;
						$time = date('g:i a', $timestamp);?>
					Delivery expected by <?php echo isset($item_details['create_at'])?Date('M-d-Y',strtotime(htmlentities($item_details['create_at']))):'';  ?>  <?php echo $time; ?>
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
	
<script>
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

 