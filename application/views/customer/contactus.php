<!--
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


<div class="wrapper"> 
  
  <div class="jain_container">
    

</header>

<body >
<div class="pad_bod">
		<div class="row">
		<?php if($this->session->flashdata('success')): ?>
			<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> <?php echo $this->session->flashdata('success');?>&nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i></div></div>
			<?php endif; ?> 
			<?php if($this->session->flashdata('qtyerror')): ?>
				<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_war"> <?php echo $this->session->flashdata('qtyerror');?>&nbsp; <i class="fa fa-check  text-warning ico_bac" aria-hidden="true"></i></div></div>

			<?php endif; ?>
		<?php //echo '<pre>';print_r($cart_items);exit; ?>
		<div class="container">
		<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading ">Contact Us</div>
			
			<div class="panel-body">
			<div  style="padding:10px 15px;">
			<section>
        <div class="wizard">
           <?php  ?>
                <div class="tab-content">
                   
					<?php if($this->session->flashdata('errormsg')): ?>
					<div class="alt_cus"><div class="alert_msg animated slideInUp btn_war"> <?php echo $this->session->flashdata('errormsg');?>&nbsp; <i class="fa fa-check  text-warning ico_bac" aria-hidden="true"></i></div></div>

					<?php endif; ?>
                   <form id="contactus" name="contactus" method="post" action="<?php echo base_url('customer/contactuspost'); ?>" class="form-horizontal" enctype="multipart/form-data" role="form">
                        <div class=" form-group">
                            <label class="control-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="">
                        </div>
						

                        <div  class=" form-group">
                           <label class="control-label">Email Address</label>
                            <input id="email" type="text"  class="form-control"  name="email" value="" >
                        </div> 
						<div  class=" form-group">
                           <label class="control-label">Subject</label>
                            <input id="mobile" type="text" class="form-control"  name="Subject" value="" >
                        </div> 
						<div  class=" form-group">
                           <label class="control-label">Message</label>
                           	<textarea  placeholder="Message"  class="form-control" rows="3" id="message" name="message"></textarea>

                        </div>
						


                        <div style="margin-top:10px" class="form-group">
                       

                            <div class="col-sm-12 controls">
                                <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit"> Submit</button>

                            </div>
                        </div>
				</form>
                
                </div>
          
        </div>
    </section>
	   </div>
	   </div>
	   </div>
	   </div>
	   </div>
	   
	   </div>
	   </div>
	</div>
-->
<div class="container">
	<div class="row well" style="background:#fff;">
		

        <!-- Contact Form -->
        <div class="col-sm-8">
          <div class="title"><span>Contact Us</span></div>
          <form>
            <div class="form-group">
              <label for="nameInput">Name (*)</label>
              <input type="text" class="form-control" id="nameInput" placeholder="Name">
            </div>
            <div class="form-group">
              <label for="emailInput">Email Address (*)</label>
              <input type="email" class="form-control" id="emailInput" placeholder="Email Address">
            </div>
            <div class="form-group">
              <label for="subjectInput">Subject</label>
              <input type="text" class="form-control" id="subjectInput" placeholder="Subject">
            </div>
            <div class="form-group">
              <label for="notesInput">Message (*)</label>
              <textarea class="form-control" rows="3" id="notesInput"></textarea>
            </div>
            <button type="button" class="btn btn-theme pull-right">Send <i class="fa fa-arrow-circle-right"></i></button>
          </form>
        </div>
        <!-- End Contact Form -->

        <div class="clearfix visible-xs"></div>

        <!-- Contact Info -->
        <div class="col-sm-4">
          <div class="title"><span>Contact Info</span></div>
          <ul class="list-group list-group-nav">
            <li class="list-group-item">&raquo; 212 Lorem Ipsum. Dolor Sit, Amet</li>
            <li class="list-group-item">&raquo; +123-456-789</li>
            <li class="list-group-item">&raquo; cs@domain.tld</li>
          </ul>

          <!-- Location Map -->
          <div class="title"><span>Our Location</span></div>
          <div class="embed-responsive embed-responsive-4by3">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15220.911859576927!2d78.38824!3d17.496628!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe33ae6c3ea74c04e!2scartinhours.com!5e0!3m2!1sen!2sin!4v1507880221492" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
          <!-- End Location Map -->

        </div>
        <!-- End Contact Info -->

      </div>
</div>
	<script type="text/javascript">

$(document).ready(function() {
    $('#contactus').bootstrapValidator({
       
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
			Subject: {
              validators: {
					notEmpty: {
						message: 'Subject is required'
					},
                   regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: ' Subject can only consist of alphanumaric, space and dot'
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
			message: {
              validators: {
					 notEmpty: {
						message: 'Message is required'
					}
                }
            },
			
        }
    });
});
</script>