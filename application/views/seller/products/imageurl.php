<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/datatable/jquery.dataTables.min.css">

<script src="<?php echo base_url();?>assets/vendor/datatable/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/datatable/base/jquery-ui.css">
<script src="<?php echo base_url();?>assets/vendor/datatable/jquery-ui.js"></script>
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
			<h1>Image urls</h1>
			<small>Image urls</small>
			<ol class="breadcrumb hidden-xs">
				<li><a href="<?php echo base_url('seller/dashboard'); ?>"><i class="pe-7s-home"></i> Home</a></li>
				<li class="active">Image urls</li>
			</ol>
		</div>
	</section>
  <section class="content ">
  <section id="main-content">
    <section class="wrapper">
      	<a href="<?php echo base_url('seller/products/imageslist');?> " class="pull-right btn btn-sm btn-primary">list</a>

	<div class="row">
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
				 <label for="exampleInputEmail1">Image</label>
				<input type="file" onchange="enablesubbmit();"  name='picture1' id="picture1"  class="form-control" >
			</div>
			<span  style="color:red" id="othererrors"></span>
		</div>
		<div class="col-md-6 form-group">
			<div class="form-group nopaddingRight san-lg">
			 <label for="exampleInputEmail1"></label>
				<span id="imgurlid"></span>
			</div>
			
		</div>
		
		
	</div>
	
	
	
      <!-- page start--> 
      <!-- page end--> 
    </section>
  </section>
  </section>
  </div>
  <!--main content end--> 

<script>
function enablesubbmit(id){
	
	var fup = document.getElementById('picture1');
		var fileName = fup.value;
		var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
		if(ext !=''){
			if(ext == "png" || ext == "jpg" || ext == "jpeg" )
			{
			jQuery('#othererrors').html('');
			} else{
			jQuery('#othererrors').html('Uploaded file is not a valid. Only png,jpg,jpeg files are allowed');
			fup.focus();
			return false;
			}
		}
	var file_data    = $('#picture1').prop('files')[0];
		var form_data    = new FormData();
        form_data.append('sellerid', jQuery("#picture1").val());
        form_data.append('picture1', file_data);form_data.append('picture1', file_data);

		jQuery.ajax({
				dataType: 'json',
				cache: false,
				contentType: false,
				processData: false,
					url: "<?php echo base_url('seller/products/getimageurl');?>",
					data: form_data,
					type: 'POST',
					success: function (data) {
					$('#imgurlid').empty();
					$('#imgurlid').append(data.url);
					
				}
		});
}

</script>



     