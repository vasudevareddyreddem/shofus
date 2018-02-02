 
<style>
.links li>a{
	font-size:14px !important;
	font-weight:400 !important;
	padding:5px;
	
}
</style>
  <!--footer start here -->
  <footer class="sm_hide">
    <div class="footer-inner" id="footer-start">
      <div class="newsletter-row">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 col"> 
              <!-- Footer Payment Link -->
              <div class="payment-accept">
                <div><img title="Cash On Delivery" style="cursor:pointer" src="<?php echo base_url(); ?>assets/home/images/payment-1.png" alt=""> &nbsp;&nbsp;<img style="cursor:pointer" title="Swipe On Delivery" src="<?php echo base_url(); ?>assets/home/images/payment-2.png" alt=""> </div>
              </div>
            </div>
            <!-- Footer Newsletter -->
			
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col1">
              <div class="newsletter-wrap">
					<?php if($this->session->flashdata('successmsg')): ?>	
						<div class="alt_cus"><div class="alert_msg animated slideInUp btn_suc"> <?php echo $this->session->flashdata('successmsg');?>&nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i></div></div>

					<?php endif; ?>
					<?php if($this->session->flashdata('errormsg')): ?>	
						<div class="alt_cus"><div class="alert_msg animated slideInUp btn_war"> <?php echo $this->session->flashdata('errormsg');?>&nbsp; <i class="fa fa-check  text-warning ico_bac" aria-hidden="true"></i></div></div>

					<?php endif; ?>						
			
                <form name="subscribe" id="subscribe" action="<?php echo base_url('customer/subscribe'); ?>" method="post" id="newsletter-validate-detail1">
                  <div id="container_form_news form-group">
                    <div id="container_form_news2">
					<span style="font-size:18px;color:#d32134;font-weight:400">EMAIL SUBSCRIPTION</span> &nbsp;&nbsp;&nbsp;
                      <input name="newsletter1" id="newsletter1" class="input-text required-entry validate-email" placeholder="Enter your email address" type="text">
                      <button type="submit" title="Subscribe" class="button subscribe"><span>Subscribe</span></button>
                    </div>
                    <!--container_form_news2--> 
                  </div>
                  <!--container_form_news-->
                </form>
              </div>
              <!--newsletter-wrap--> 
            </div>
          </div>
        </div>
        <!--footer-column-last--> 
      </div>
      <div class="container_main" style="margin-top:50px;" >
        <div class="row">
          <div class="col-sm-12 col-xs-12 col-lg-12" >
            <div class="footer-column" >
              <h4>reach us</h4>
              <p style="font-size:15px;font-weight:300">Plot No. 177, Sri Vani Nilayam,
                1st floor,Beside Sri Chaitanya High School,
                Sardar Patel Nagar, Nizampet Road,
                after JNTU , Hyderabad,
                Telangana, 500072</p>
              <div class="social">
                <ul class="link">
                  <li class="fb pull-left"><a target="_blank" href="https://www.facebook.com/cartinhoursdotcom" target="_blank" title="Facebook"></a></li>
                  <li class="tw pull-left"><a target="_blank" href="https://twitter.com/cartinhours" target="_blank" title="Twitter"></a></li>
                  <li class="googleplus pull-left"><a target="_blank" href="https://plus.google.com/u/0/106334687276812209130" target="_blank" title="GooglePlus"></a></li>
                 <li class="linkedin pull-left"><a target="_blank" href="https://www.linkedin.com/company/cartinhours" title="Linkedin"></a></li>
                </ul>
              </div>
            </div>
            <div class="footer-column" >
              <h4>Quick Links</h4>
              <ul class="links" >
                <li class="first"><a href="<?php echo base_url(); ?>">Home</a></li>
				
				<?php $cnt=1;foreach ($sidecaregory_list as $list){?>
				<?php if($cnt <=4){ ?>
                  <li><a href="<?php echo base_url('category/subcategorys/'.base64_encode($list['category_id'])); ?>"><?php echo ucfirst(strtolower($list['category_name'])); ?></a></li>
				<?php }?>
				<?php $cnt++;} ?>
				<li><a id="readmore" class="btn btn-small btn-primary " style="width:40%">Read More ....</a></li>
				<div style="display:none" id="showmore">
				<?php $cnt1=1;foreach ($sidecaregory_list as $list){?>
				<?php if($cnt1 >4){ ?>
                  <li><a href="<?php echo base_url('category/subcategorys/'.base64_encode($list['category_id'])); ?>"><?php echo ucfirst(strtolower($list['category_name'])); ?></a></li>
				<?php }?>
				<?php $cnt1++;} ?>
				</div>
				
				
				
                
              </ul>
            </div>
            <div class="footer-column">
              <h4>My info</h4>
              <ul class="links">
                <li class="first"><a href="<?php echo base_url('customer/account');?>">My Account</a></li>
                <li><a href="<?php echo base_url('customer/cart');?>">My Cart</a></li>
                <li><a href="<?php echo base_url('customer/orders');?>">My Orders</a></li>
                <li><a href="<?php echo base_url('customer/trackorders');?>">Track</a></li>
                <li class="last"><a href="<?php echo base_url('customer/wishlist'); ?>">My Wishlist</a></li>
              </ul>
            </div>
            <div class="footer-column">
              <h4>Information</h4>
              <ul class="links">
                <li class="first"><a  href="<?php echo base_url(); ?>">Careers</a></li>
				<li><a href="<?php echo base_url(); ?>">About Us</a></li>
				<!--<li><a href="<?php echo base_url('customer/aboutus'); ?>">About Us</a></li>-->
                <li><a href="http://seller.shofus.com/seller/login" target="_blank">Sell on shofus </a></li>
                <li><a href="<?php echo base_url('customer/contactus'); ?>">Contact Us</a></li>
              </ul>
            </div>
          </div>
        </div>
        <!--row--> 
        
      </div>
      
      <!--container--> 
    </div>
     
  </footer>
  
</div>


<script src="<?php echo base_url(); ?>assets/home/js/classie.js"></script> 
<script src="<?php echo base_url(); ?>assets/home/js/modalEffects.js"></script> 
<script type="text/javascript">
    $(document).ready(function(){
		var cnt=2;
		$("#readmore").click(function(){
				$("#loadcon").slideToggle("slow", "linear");
				if((cnt % 2) === 0){
			$("#readmore").text("Read Less..");
			}else{
				$("#readmore").text("Read More..");
			}
			cnt++;
		});
		 $('#readmore').click(function(){
          $('#showmore').toggle();

      });
      $('#frgt_pass').click(function(){
          $('#log_sign').hide();
          $('#show_pass').show();

      });
       $('.md-close').click(function(){
            $('#modal-8').hide();
            $('.md-overlay').hide();
          });
       $('#show_login').click(function(){
          $('#log_sign').show();
          $('#show_pass').hide();
       })
    });
	$(document).ready(function() {
    $('#subscribe').bootstrapValidator({
       
        fields: {
            newsletter1: {
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
			
        }
    });
});
  </script> 

<!-- Login popup end here -->

