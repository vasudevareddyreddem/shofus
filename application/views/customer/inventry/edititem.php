
<div class="content-wrapper">
		<section class="content" style="padding-top:100px;">
		<div class="container">
			<div class="row">
				<?php if($this->session->flashdata('error')): ?>
					<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('error');?></div>	
					<?php endif; ?>
						<?php if($this->session->flashdata('updatpassword')): ?>
					<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('updatpassword');?></div>	
					<?php endif; ?>
					<?php if(validation_errors()):?>
					<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo validation_errors(); ?></div>	
					<?php  endif;?>
				<form enctype="multipart/form-data" method="post" name="edititem" id="edititem"  action="<?php echo base_url('inventory/edititempost'); ?>" class="well col-md-6 col-md-offset-2" style="background-color:#fff;">
				<div class=""  style="font-size:20px;font-weight:600;border-bottom:1px solid #ddd;margin-bottom:10px;padding-bottom:10px;">Edit Item</div>
				
				<input type="hidden" name="itemid" id="itemid" value="<?php echo isset($item_details['id'])?$item_details['id']:''; ?>">
				
				<div class="form-group" id="oldcatewise">
				<label for="category">Subitem Name</label>
				<select class="form-control" name="subitemid" id="subitemid">
				<option value="">Select</option>
				<?php foreach($item_list as $list){ ?>
				
				<?php if($list['subitem_id']==$item_details['subitemid']){  ?>
					<option value="<?php echo $list['subitem_id'];?>" selected><?php echo $list['subitem_name'];?></option>

				<?php }else{ ?>
				<option value="<?php echo $list['subitem_id'];?>"><?php echo $list['subitem_name'];?></option>
				 <?php } ?>
				<?php } ?>
				</select>
				</div>
				
				<div class="form-group">
				<label for="category">Item Name</label>
				<input type="text"  class="form-control" id="itemname"  name="itemname" value="<?php echo isset($item_details['item_name'])?$item_details['item_name']:''; ?>"/>
				</div>
				
				
				
				
				<div class="btn-group-vertical btn-block text-center" role="group">
				<button type="submit" class="btn btn-danger btn-lg">Update</button>
				
				</div>
				</form>
			</div>
		</div>
    
		</section>
 </div>
   
	<script type="text/javascript">
function getsubcategorynames(id){
	jQuery.ajax({
				url: "<?php echo site_url('inventory/getsubcategories');?>",
				type: 'post',
				data: {
					form_key : window.FORM_KEY,
					categoryid: id,
					},
				dataType: 'json',
				success: function (data) {
				$('#oldcatewise').hide();
				$('#changecatwise').show();
				$('#changesubcategory_list').empty();
				for(i=0; i<data.length; i++) {
						$('#changesubcategory_list').append("<option value="+data[i].subcategory_id+">"+data[i].subcategory_name+"</option>");                      
					}
			
			
				}
			});
}
$(document).ready(function() {
    $('#edititem').bootstrapValidator({
       
          fields: {
			subitemid: {
					validators: {
					notEmpty: {
						message: 'SubItem Name is required'
					}
				}
			}, 
			itemname: {
					validators: {
					notEmpty: {
						message: 'Sub ItemName is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9.,# ]+$/,
					message: 'ItemName can only consist of alphanumaric, space and dot'
					}
				}
			}
        }
    });
});
</script>