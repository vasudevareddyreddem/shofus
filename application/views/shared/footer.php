 
<style>
.links li>a{
	font-size:14px !important;
	font-weight:400 !important;
	padding:5px;
	
}
</style>
  <!--footer start here -->
  <footer>
    <div class="footer-inner" id="footer-start">
      <div class="newsletter-row">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col"> 
              <!-- Footer Payment Link -->
              <div class="payment-accept">
                <div><img title="Cash On Delivery" style="cursor:pointer" src="<?php echo base_url(); ?>assets/home/images/payment-1.png" alt=""> &nbsp;&nbsp;<img style="cursor:pointer" title="Swipe On Delivery" src="<?php echo base_url(); ?>assets/home/images/payment-2.png" alt=""> </div>
              </div>
            </div>
            <!-- Footer Newsletter -->
			
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col1">
              <div class="newsletter-wrap">
					<?php if($this->session->flashdata('successmsg')): ?>	
						<div class="alt_cus"><div class="alert_msg animated slideInUp btn_suc"> <?php echo $this->session->flashdata('successmsg');?>&nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i></div></div>

					<?php endif; ?>
					<?php if($this->session->flashdata('errormsg')): ?>	
						<div class="alt_cus"><div class="alert_msg animated slideInUp btn_war"> <?php echo $this->session->flashdata('errormsg');?>&nbsp; <i class="fa fa-check  text-warning ico_bac" aria-hidden="true"></i></div></div>

					<?php endif; ?>						
                <h4>Sign up for emails</h4>
                <form name="subscribe" id="subscribe" action="<?php echo base_url('customer/subscribe'); ?>" method="post" id="newsletter-validate-detail1">
                  <div id="container_form_news form-group">
                    <div id="container_form_news2">
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
          <div class="col-sm-8 col-xs-12 col-lg-12" >
            <div class="footer-column" >
              <h4>About Company</h4>
              <p style="font-size:15px;font-weight:300">Plot No. 177, Sri Vani Nilayam,
                1st floor,Beside Sri Chaitanya High School,
                Sardar Patel Nagar, Nizampet Road,
                after JNTU , Hyderabad,
                Telangana, 500072</p>
              <div class="social">
                <ul class="link">
                  <li class="fb pull-left"><a target="_blank" href="#" title="Facebook"></a></li>
                  <li class="tw pull-left"><a target="_blank" href="#" title="Twitter"></a></li>
                  <li class="googleplus pull-left"><a target="_blank" href="#" title="GooglePlus"></a></li>
                  <li class="linkedin pull-left"><a target="_blank" href="#" title="Linkedin"></a></li>
                </ul>
              </div>
            </div>
            <div class="footer-column" >
              <h4>Quick Links</h4>
              <ul class="links" >
                <li class="first"><a href="#">Home</a></li>
              
                <li><a href="#">Electronics</a></li>
                
              </ul>
            </div>
            <div class="footer-column">
              <h4>Style Advisor</h4>
              <ul class="links">
                <li class="first"><a href="#">My Account</a></li>
                <li><a href="#">My Cart</a></li>
                <li><a href="#">My Orders</a></li>
                <li><a href="#">Track</a></li>
                <li class="last"><a href="#">My Wishlist</a></li>
              </ul>
            </div>
            <div class="footer-column">
              <h4>Information</h4>
              <ul class="links">
                <li class="first"><a title="Site Map" href="#">Careers</a></li>
				<li><a href="#">About Us</a></li>
                <li><a href="#">Search Terms</a></li>
                <li><a href="#">Sale with us </a></li>
                <li><a href="#">Contact Us</a></li>
              </ul>
            </div>
          </div>
        </div>
        <!--row--> 
        
      </div>
      
      <!--container--> 
    </div>
    <!--footer-inner-->
    
    <!--<div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-xs-12 coppyright">© 2017 Cart in Hours. All Rights Reserved.</div>
        </div>
        
      </div>
     
    </div>-->
    <!--footer-bottom--> 
    <!-- BEGIN SIMPLE FOOTER --> 
  </footer>
  <!--footer end here --> 
  
  <!--body part end here --> 
</div>



<!-- Login popup start here -->

<div class="md-overlay"></div>

<!-- the overlay element --> 

<script src="<?php echo base_url(); ?>assets/home/js/classie.js"></script> 
<script src="<?php echo base_url(); ?>assets/home/js/modalEffects.js"></script> 
<script type="text/javascript">
    $(document).ready(function(){
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

