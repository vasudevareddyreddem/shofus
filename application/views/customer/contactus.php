
<div class="container">
	<div class="row well" style="background:#fff;">
		
<?php if($this->session->flashdata('success')): ?>
			<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> <?php echo $this->session->flashdata('success');?>&nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i></div></div>
			<?php endif; ?> 
			<?php if($this->session->flashdata('qtyerror')): ?>
				<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_war"> <?php echo $this->session->flashdata('qtyerror');?>&nbsp; <i class="fa fa-check  text-warning ico_bac" aria-hidden="true"></i></div></div>

			<?php endif; ?>
        <!-- Contact Form -->
        <div class="col-sm-8">
          <div class="title"><span>Contact Us</span></div>
           <form id="contactus" name="contactus" method="post" action="<?php echo base_url('customer/contactuspost'); ?>" class="form-horizontal" enctype="multipart/form-data" role="form">

            <div class="form-group">
              <label for="nameInput">Name *</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Name">
            </div>
            <div class="form-group">
              <label for="emailInput">Email Address*</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
            </div>
            <div class="form-group">
              <label for="subjectInput">Subject*</label>
              <input type="text" class="form-control" id="Subject" name="Subject" placeholder="Subject">
            </div>
            <div class="form-group">
              <label for="notesInput">Message*</label>
              <textarea class="form-control" rows="3" id="message" name="message"></textarea>
            </div>
            <button type="submit" class="btn btn-theme pull-right">Send <i class="fa fa-arrow-circle-right"></i></button>
          </form>
        </div>
        <!-- End Contact Form -->

        <div class="clearfix visible-xs"></div>

        <!-- Contact Info -->
        <div class="col-sm-4">
          <div class="title"><span>Contact Info</span></div>
          <ul class="list-group list-group-nav">
            <li class="list-group-item">&raquo; Plot No. 177, Sri Vani Nilayam, 1st floor,Beside Sri Chaitanya High School, Sardar Patel Nagar, Nizampet Road, after JNTU , Hyderabad, Telangana, 500072</li>
            <li class="list-group-item">&raquo; 040-48541273</li>
            <li class="list-group-item">&raquo; support@cartinhours.com</li>
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