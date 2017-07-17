<script src="<?php echo base_url();?>assets/vendor/datatable/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/datatable/base/jquery-ui.css">
<script src="<?php echo base_url();?>assets/vendor/datatable/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/bootstrapValidator.js"></script>
 <style>
	
	.preview_box{clear: both; padding: 5px; margin-top: 10px; text-align: center;}
	.preview_box img{width: 900px; height: 500px;}
</style> 
<div class="content-wrapper mar_t_con" >
	<section class="content-header">
		<div class="header-icon">
			<i class="pe-7s-note2"></i>
		</div>
		<div class="header-title">
			  
			<h1>Show Ups</h1>
			<small>Add Home Page banner</small>
			<ol class="breadcrumb hidden-xs">
				<li><a href="<?php echo base_url('seller/dashboard');?>"><i class="pe-7s-home"></i> Home</a></li>
				<li class="active">Add Home Page banner</li>
			</ol>
		</div>
	</section>
  	<section class="content ">
<div class="faq_main">
		<?php if($this->session->flashdata('active')): ?>
			<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button><?php echo $this->session->flashdata('active');?></div>	
			<?php endif; ?>
			<?php if($this->session->flashdata('deactive')): ?>
			<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button><?php echo $this->session->flashdata('deactive');?></div>	
			<?php endif; ?>
  			<!-- <div class="alert alert-danger" role="alert">
  				<h3>Note</h3>
  				<p>Image Height :500px,width:1000px;</p>
  			</div> -->
    		<div class="container" style="width:100%"> 
    		<?php $total = 6; ?>
    		<?php foreach($banner_count as $count){ ?>
    			<?php if($total - $count['imagecount']) { ?>
    			<button class="btn btn-info pull-right" type="button">
  				Remaining <span class="badge"><?php echo $total - $count['imagecount'];?></span>
  				</button>
  				<?php } else{ ?>
  				<button class="btn btn-danger pull-right" type="button">
  				<?php echo date('Y-m-d')." Home Banners Over!"; ?>
  				</button>
  				<?php } ?>
			
			<?php }?>
    		<div class="well col-md-12">
    		<a href="<?php echo base_url('seller/showups/homepagebanner');?> " class="pull-right btn btn-sm btn-primary">Back</a>
			<form name="addbanner" id="addbanner" action="<?php echo base_url('seller/showups/save_banner'); ?>" method="post" enctype="multipart/form-data" >
			 	<div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputFile">Home Page Banner</label>
                  <input type="file" name="home_banner" id="home_banner">
                  <div class="preview_box">
				<!-- Preview -->
        				<img id="preview_img" src=""/>
        			</div>
				</div>
                  	
				
                <div class="clearfix"></div>
				<div style="margin-top: 20px; margin-left: 15px;">				
                <button type="submit" class="btn btn-primary pull-right" >Submit</button>
                <button type="submit" class="btn btn-danger pull-right" onclick="window.location='<?php echo base_url(); ?>seller/showups/homepagebanner';return false;">Cancel</button>
                
				</div>
            </form>
				</div>

				</div>
				</section>
				</div>

				<script type="text/javascript">
					$(document).ready(function() {
    $('#addbanner').bootstrapValidator({
       
        fields: {
			home_banner: {
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


// function filePreview(input) {
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();
//         reader.onload = function (e) {
//             $('#addbanner + img').remove();
//             $('#addbanner').after('<img src="'+e.target.result+'" width="450" height="300"/>');
//         }
//         reader.readAsDataURL(input.files[0]);
//     }
// }
// $("#home_banner").change(function () {
//     filePreview(this);
// });



$(document).ready(function(){
    //Image file input change event
    $("#home_banner").change(function(){
        readImageData(this);//Call image read and render function
    });
});

function readImageData(imgData){
	if (imgData.files && imgData.files[0]) {
        var readerObj = new FileReader();
        
        readerObj.onload = function (element) {
            $('#preview_img').attr('src', element.target.result);
        }
        
        readerObj.readAsDataURL(imgData.files[0]);
    }
}
</script>