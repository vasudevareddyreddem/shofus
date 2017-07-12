    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrapValidator.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrap-chosen.css"/>
    <script src="<?php echo base_url(); ?>assets/dist/js/bootstrapValidator.js"></script>
    
    <script src="<?php echo base_url(); ?>assets/dist/js/autocomplete.js"></script>
    <script>
      $(function() {
        $('.chosen-select').chosen();
        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
      });
    </script>

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
			<h1>Support</h1>
			<small>seller support</small>
			<ol class="breadcrumb hidden-xs">
				<li><a href="<?php echo base_url('seller/dashboard'); ?>"><i class="pe-7s-home"></i> Home</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div>
	</section>
  <section class="content ">
  <section id="main-content">
    <section class="wrapper">
   
     <div class="row">
	   <?php if($this->session->flashdata('sucess')): ?>
			<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button><?php echo $this->session->flashdata('sucess');?></div>
			<?php endif; ?>
	<div class="col-xs-12 col-sm-12 col-md-12 m-b-20">
		<!-- Nav tabs -->
		
		<!-- Tab panels -->
		<div class="tab-content">
				<div class="panel-body">
				 <div id="categoryiddoc" class="form-group nopaddingRight "></div>
				 <form name="notifications" id="notifications" action="<?php echo base_url('seller/services/notificationpost'); ?>" method="post" enctype="multipart/form-data">
                
                

				 <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">subject</label>
                  <input class="form-control" placeholder="Subject" type="text" id="subject" name="subject">
                </div>
				 <div class="form-group nopaddingRight col-md-12 san-lg">
                  <label for="exampleInputEmail1">Message</label>
                  <textarea  placeholder="Message" class="form-control" rows="3" id="message" name="message"></textarea>
                </div>
                
               
               
                
               
				
                <div class="clearfix"></div>
				<div style="margin-top: 20px; margin-left: 15px;">
                <button type="submit" class="btn btn-primary" >Submit</button>
				</div>
              </form>
				</div>
			
			
		</div>
	</div>
	

		</div>
 
    </section>
  </section>
  </section>
  </div>
  <!--main content end--> 

     
		
  
 
      
	
	<script type="text/javascript">
$(document).ready(function() {
    $('#notifications').bootstrapValidator({
       
        fields: {
            
			subject: {
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
			message: {
              validators: {
					notEmpty: {
						message: 'Message is required'
					}
                }
            }
        }
    });
});
</script>



		
