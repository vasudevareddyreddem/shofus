<div class="content-wrapper mar_t_con">
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
			<h1>Contact</h1>
			<small>Contact us</small>
			<ol class="breadcrumb hidden-xs">
				<li><a href="<?php echo base_url('seller/dashboard'); ?>"><i class="pe-7s-home"></i> Home</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div>
	</section>
  <section class="content ">
  <div class="">
    <div class="col-md-12 mar_b50" > 
	<div class="panel_cus panel-primary ">
     
			<div class=" col-md-6 pad_10">	  
				<form name="contactus" class=""id="contactus"  method="post" action="<?php echo base_url('seller/contactus/details'); ?>" role="form">
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
									<input id="form_phone" maxlength="10" type="tel" name="phone"  class="form-control" placeholder="Please enter your phone*" required oninvalid="setCustomValidity('Plz enter your correct phone number ')"
								onchange="try{setCustomValidity('')}catch(e){}">
									
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="form_message">Message *</label>
									<textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required" data-error="Please,leave us a message."></textarea>
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<input id="but" type="submit" class="btn btn-primary " value="Send message">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
							   <br>
								<small class="text-muted"><strong>*</strong> These fields are required.</small>
							</div>
						</div>
					</div>

				</form>
			</div>
					<div class="col-md-6 pad_10">
					<!-- <div class="thumbnail">
						<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1902.603941571986!2d78.38998466067792!3d17.49758717711942!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1494410712406" width="100%" height="300px" frameborder="0" style="border:0" allowfullscreen></iframe>
				   </div> -->

				   <div class="thumbnail">
					 <div style="width: 100%"><iframe width="100%" height="300" src="https://www.maps.ie/create-google-map/map.php?width=100%&amp;height=300&amp;hl=en&amp;q=%20Sri%20Vani%20Nilayam%2C%20Sardar%20Patel%20Nagar%2C%20Nizampet%20%E2%80%98X%E2%80%99%20Road%2C%20Hyderabad%2C%20Telangana+(Cartinhour)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.mapsdirections.info/it/misura-distanza-area-google-maps.html">Misurare distanze google maps</a></iframe></div><br />
				   </div> 
					</div>
					<div class="clearfix"></div>
					
        </div>
    </div>
           </div>
           </section>
           </div>
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrapValidator.css"/>
   
    <script src="<?php echo base_url(); ?>assets/dist/js/bootstrapValidator.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#contactus').bootstrapValidator({
       
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
		// lname: {
  //         validators: {
		// 				notEmpty: {
		// 				message: 'Lastname is required'
		// 			},
		// 			regexp: {
		// 			regexp: /^[a-zA-Z0-9. ]+$/,
		// 			message: 'Lastname can only consist of alphanumaric, space and dot'
		// 		}
		//   }
  //       },
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