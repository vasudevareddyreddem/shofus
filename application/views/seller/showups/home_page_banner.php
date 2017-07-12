
<script src="<?php echo base_url(); ?>assets/dist/js/bootstrapValidator.js"></script>
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
			<h1>Show Ups</h1>
			<small>Home Page banner</small>
			<ol class="breadcrumb hidden-xs">
				<li><a href="<?php echo base_url('seller/dashboard');?>"><i class="pe-7s-home"></i> Home</a></li>
				<li class="active">Home Page banner</li>
			</ol>
		</div>
	</section>
  <section class="content ">
  <div class="faq_main">
    <div class="container" style="width:100%">
    <div class="panel-body">
				 <div id="categoryiddoc" class="form-group nopaddingRight "></div>
				 <form name="addbanner" id="addbanner" action="<?php echo base_url(); ?>seller/showups/save_banner" method="post" enctype="multipart/form-data">
    
				<div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputFile">Banner</label>
                  <input type="file" name="picture_one" id="picture_one">
				 </div>
                </div>                          
                <div class="clearfix"></div>
				<div style="margin-top: 20px; margin-left: 15px;">
                <button type="submit" class="btn btn-primary" >Submit</button>
                <button type="submit" class="btn btn-danger" onclick="window.location='<?php echo base_url(); ?>seller/dashboard';return false;">Cancel</button>
				</div>
              </form>
				</div>
			</div>
    </div>
    </div>
    </section>
    </div>


<script type="text/javascript">
$(document).ready(function() {
    $('#addbanner').bootstrapValidator({
       
        fields: {
           
			picture_one: {
				validators: {
					 notEmpty: {
						message: 'Banner is required'
					},  
					regexp: {
					regexp: /\.(jpe?g|png|gif)$/i,
					message: 'Uploaded file is not a valid image. Only JPG, PNG and GIF files are allowed'
					}
				}
			},
        }
    });
});
</script>