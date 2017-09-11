 

  <!--footer start here -->
  <footer>
    <div class="footer-inner" id="footer-start">
      <div class="newsletter-row">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col"> 
              <!-- Footer Payment Link -->
              <div class="payment-accept">
                <div><img src="<?php echo base_url(); ?>assets/home/images/payment-1.png" alt=""> <img src="<?php echo base_url(); ?>assets/home/images/payment-2.png" alt=""> <img src="<?php echo base_url(); ?>assets/home/images/payment-3.png" alt=""> <img src="<?php echo base_url(); ?>assets/home/images/payment-4.png" alt=""></div>
              </div>
            </div>
            <!-- Footer Newsletter -->
			
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col1">
              <div class="newsletter-wrap">
					<?php if($this->session->flashdata('successmsg')): ?>	
					<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('successmsg');?></div>
					<?php endif; ?>
					<?php if($this->session->flashdata('errormsg')): ?>	
					<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('errormsg');?></div>
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
      <div class="container_main">
        <div class="row">
          <div class="col-sm-8 col-xs-12 col-lg-12">
            <div class="footer-column">
              <h4>About Company</h4>
              <p>Krupa Towers Building, A-11&A-12,
                NO:201, 3rd Floor, 1st Road,
                Western Hills, Near JNTU, Addagutta,
                Kukatpally, Hyderabad,
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
            <div class="footer-column">
              <h4>Quick Links</h4>
              <ul class="links">
                <li class="first"><a href="#">Home</a></li>
                <li><a href="#">Food </a></li>
                <li><a href="#">Fashion</a></li>
                <li><a href="#">Electronics</a></li>
                <li class="last"><a href="#">Grocery</a></li>
              </ul>
            </div>
            <div class="footer-column">
              <h4>Style Advisor</h4>
              <ul class="links">
                <li class="first"><a href="#">Your Account</a></li>
                <li><a href="#">Information</a></li>
                <li><a href="#">Addresses</a></li>
                <li><a href="#">Discount</a></li>
                <li class="last"><a href="#">Orders History</a></li>
              </ul>
            </div>
            <div class="footer-column">
              <h4>Information</h4>
              <ul class="links">
                <li class="first"><a title="Site Map" href="#">Site Map</a></li>
                <li><a href="#">Search Terms</a></li>
                <li><a href="#">Advanced Search</a></li>
                <li><a href="#">About Us</a></li>
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
    
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-xs-12 coppyright">© 2017 Cart in Hour. All Rights Reserved.</div>
        </div>
        <!--row--> 
      </div>
      <!--container--> 
    </div>
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

