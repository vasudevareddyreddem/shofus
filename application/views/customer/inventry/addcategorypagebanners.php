
<div class="content-wrapper">
		<section class="content" style="padding-top:100px;">
		<div class="container">
			<div class="row">
				
					<?php if($this->session->flashdata('success')): ?>
					<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('success');?></div>	
					<?php endif; ?>
					<?php if($this->session->flashdata('error')): ?>
					<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('error');?></div>	
					<?php endif; ?>
					
				<form enctype="multipart/form-data" method="post" name="addbanners" id="addbanners"  action="<?php echo base_url('inventory/savecategorypagebanners'); ?>" class="well col-md-6 col-md-offset-2" style="background-color:#fff;">
			
				<div class=""  style="font-size:20px;font-weight:1200;border-bottom:1px solid #ddd;margin-bottom:10px;padding-bottom:10px;">Add category page Banner Images</div>
				
				<div class="row">
						<div class="col-md-6 form-group">
								 <label for="exampleInputEmail1">Image</label>
								<input type="file"  name='image' id="image"  class="form-control" >
						
						</div>
						<div class="col-md-6 form-group">
								 <label for="exampleInputEmail1"> Category page Position</label>
								<select class="form-control" id="position" name="position" >
								<option value="">Select item </option>
								<option value="1">1st position </option>
								<option value="2">2nd position </option>
								<option value="3">3rd position </option>
								<option value="4">4th position </option>
								<option value="5">5th position </option>
								</select>
						</div>
				</div>
				<div class="row">
						<div class="col-md-6 form-group">
								 <label for="exampleInputEmail1">link</label>
								<select class="form-control" id="link" onchange="getselectedproducts(this.value);" name="link" >
								<option value="">Select item </option>
								<!--<option value="1">Category </option>-->
								<option value="2">Subcategory </option>
								<option value="3">Subitem</option>
								<option value="4">Item</option>
								<option value="5">Single Product</option>
								</select>
						</div>
						<div class="col-md-6 form-group" id="selectlist" style="">
							<div class="form-group nopaddingRight san-lg">
								 <label for="exampleInputEmail1">options</label>
								<select class="form-control" id="selecteddata" name="selecteddata" >
								<option value="">Select item </option>
								</select>
							</div>
						</div>
				</div>
				<div class="row">
					<div class="col-md-6 form-group">
						 <label for="exampleInputEmail1">Expiry Date</label>
						<select class="form-control" id="expirydate" name="expirydate" >
						<option value="">Select</option>
						<option value="7">one Week</option>
						<option value="14">two Week</option>
						<option value="4">4 days</option>
						</select>
					</div>
				
				</div>
			
				

				
				<div class="btn-group-vertical btn-block text-center" role="group">
				<button type="submit" class="btn btn-danger btn-lg">Add</button>
				
				</div>
				</form>
				
				
			</div>
		</div>
    
		</section>
 </div>
   
<script type="text/javascript">
$(document).ready(function() {
    $('#addbanners').bootstrapValidator({
       
        fields: {
			image: {
				validators: {
					 notEmpty: {
						message: 'image is required'
					},  
					regexp: {
					regexp: /\.(jpe?g|png|gif)$/i,
					message: 'Uploaded file is not a valid image. Only JPG, PNG and GIF files are allowed'
					}
				}
			},
			position: {
				validators: {
					 notEmpty: {
						message: 'Position is required'
					}
				}
			},
			selecteddata: {
				validators: {
					 notEmpty: {
						message: 'options is required'
					}
				}
			},
			expirydate: {
				validators: {
					 notEmpty: {
						message: 'expiry date is required'
					}
				}
			},
			link: {
				validators: {
					 notEmpty: {
						message: 'Link is required'
					}
				}
			}
        }
    });
});


function getselectedproducts(val){
	if(val!=''){
		jQuery.ajax({
				url: "<?php echo site_url('inventory/getinventoryrelateddata');?>",
				type: 'post',
				data: {
					form_key : window.FORM_KEY,
					option: val,
					},
				dataType: 'json',
				success: function (data) {
				$('#selectlist').show();
				$('#selecteddata').empty();
				$('#selecteddata').empty();
						for(i=0; i<data.length; i++) {
						$('#selecteddata').append("<option value="+data[i].linkis+">"+data[i].name+"</option>");                      
					}
					}
			});
	}

}



</script>