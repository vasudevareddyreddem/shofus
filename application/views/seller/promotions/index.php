<div class="content-wrapper mar_t_con" >
<section class="content-header">
		<div class="header-icon">
			<i class="pe-7s-note2"></i>
		</div>
		<div class="header-title">
			<form action="#" method="get" class="sidebar-form search-box pull-right hidden-md hidden-lg hidden-sm">
				<div class="input-group">
					<input type="text" name="q" class="form-control" placeholder="Search...">
					<span class="input-group-btn">
						<button type="submit" name="search" id="search-btn" class="btn"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</form>  
			<h1>Promotions</h1>
			<small>Select</small>
			<ol class="breadcrumb hidden-xs">
				<li><a href="<?php echo base_url('seller/dashboard');?>"><i class="pe-7s-home"></i> Home</a></li>
				<li class="active">Promotions</li>
			</ol>
		</div>
	</section>
  <section class="content ">
  
  <div class="faq_main mar_t15">
   
		
   
  


   <form  name="promotions" id="promotions" class=""  method="post" action="<?php echo base_url('seller/promotions/storepromotions'); ?>" role="form">
          <div class="messages" id="form-messages"></div>
          <?php echo $this->session->flashdata('msg1'); ?>
          <div class="controls">
            <div class="row mar_t10">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="form_name">Firstname *</label>
                  <input id="form_name" type="text" name="fname" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="form_email">Email *</label>
                  <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
             
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="form_phone">Phone*</label>
                  <input id="form_phone" maxlength="10" type="tel" name="phone"  class="form-control" placeholder="Please enter your phone*" required oninvalid="setCustomValidity('Plz enter your correct phone number ')"
                onchange="try{setCustomValidity('')}catch(e){}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="form_message">Message *</label>
                  <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
            </div>
            <div class="row">
              
              <div class="col-md-12">
                <input type="submit" class="btn btn-primary pull-right" value="Send message">
              </div>
            </div>
          </div>

        </form>
   
  
 
  </div>
     </section>
  </div>

   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrapValidator.css"/>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/bootstrapValidator.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#promotions').bootstrapValidator({
       
        fields: {
			        fname: {
          validators: {
						notEmpty: {
						message: 'Firstname is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Firstname can only consist of alphanumaric, space and dot'
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
					message: 'Please enter a valid email address.For example johndoe@domain.com.'
					}
				}
			},
			phone: {
				validators: {
					notEmpty: {
						message: 'Phone is required'
					},
					regexp: {
					regexp:  /^[0-9]{10}$/,
					message:'Phone must be 10 digits'
					}
				}
			},
			message : {
				validators: {
					notEmpty: {
						message: 'Please enter a Message'
					}
				}
			}
            
		
        }
    });
});
</script>
		
  
  <!--body end here --> 
  