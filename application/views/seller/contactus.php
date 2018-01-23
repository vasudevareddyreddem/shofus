<section id="contact_sc">
<div class="srvices_main1">
 <div class="container ">
 <h3 class="text-center wow bounceInRight animated"  id="contact_sc" data-spy="scroll"><span class="span_bg_g">CONTACT US</span></h3>
  <div class="title_lines"></div>
	
			<div class=" col-md-6 ">	  
				<form  class=""id="ajax-contact"  method="post" action="<?php echo base_url(); ?>seller/contact/login_contact" role="form">
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
									<label for="form_lastname">Lastname </label>
									<input id="form_lastname" type="text" name="lname" class="form-control" placeholder="Please enter your lastname "  data-error="Lastname is required.">
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="form_email">Email *</label>
									<input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="form_phone">Phone*</label>
									<input id="form_phone" type="tel" name="phone"  class="form-control" placeholder="Please enter your phone*" required="required" oninvalid="setCustomValidity('Plz enter your correct phone number ')"
								onchange="try{setCustomValidity('')}catch(e){}">
									
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="form_message">Message *</label>
									<textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="" ="required" data-error="Please,leave us a message."></textarea>
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<input type="submit" class="btn btn-primary ">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
							   <br>
								<small class="text-muted"><strong>*</strong> These fields are requied.</small>
							</div>
						</div>
					</div>

				</form>
			</div>
					<div class="col-md-6 pad_10">
				

				   <div class="thumbnail">
						
					</div>
					<div class="clearfix"></div>
					<div class="pad_10">
						<div class="row col1">
							<div class="col-sm-2 widt_col_2" >
								 <i class="fa fa-fax"></i> Website  
							</div>
							<div class="col-sm-10">
								 <a href="https://shofus.com/"> https://shofus.com</a>
							</div>
						</div>
							<div class="row col1">
						   <div class="col-xs-2 widt_col_2">
							   <i class="fa fa-map-marker" style="font-size:16px;"></i>   Address
						   </div>
						   <div class="col-xs-10">
								Plot No.177,1st floor, Sri Vani Nilayam,
								Sardar Patel Nagar, Nizampet ‘X’ Road,
								Hyderabad, Telangana
						   </div>
					   </div>
					   
						<div class="row col1">
							<div class="col-sm-2 widt_col_2">
								<i class="fa fa-phone"></i>   Phone
							</div>
							<div class="col-sm-10">
								 +919494422779
							</div>
						</div>
						
						<div class="row col1">
							<div class="col-sm-2 widt_col_2">
								<i class="fa fa-envelope"></i>   Email
							</div>
							<div class="col-sm-10">
								 <a href="mailto:operations@shofus.com">operations@shofus.com</a> <br> <a href="mailto:support@shofus.com">support@shofus.com</a>
							</div>
						</div>
					</div>
					
              
               
        </div>
    </div>
</section>