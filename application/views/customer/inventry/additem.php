
<div class="content-wrapper">
		<section class="content" style="padding-top:100px;">
		<div class="container">
			<div class="row">
				<?php if($this->session->flashdata('addsuccess')){ ?>

					<div class="alert dark alert-warning alert-dismissible" id="infoMessage">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
					 <?php foreach($this->session->flashdata('addsuccess') as $error){?>
					
					<?php echo $error.'<br/>'; ?>
					
					
					<?php } ?></div><?php } ?>
				
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
				<form enctype="multipart/form-data" method="post" name="additem" id="additem"  action="<?php echo base_url('inventory/additempost'); ?>" class="well col-md-6 col-md-offset-2" style="background-color:#fff;">
				<?php if($this->session->flashdata('error')): ?>
					<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('error');?></div>	
					<?php endif; ?>
			
				<div class=""  style="font-size:20px;font-weight:600;border-bottom:1px solid #ddd;margin-bottom:10px;padding-bottom:10px;">Add Item</div>
				<div class=""  style="font-size:20px;font-weight:600;border-bottom:1px solid #ddd;margin-bottom:10px;padding-bottom:10px;"><a href="<?php echo base_url('inventory/itemlist'); ?>">Back</a></div>
				
				
				<div class="form-group">
				<label for="category">subitem Name</label>
				<select class="form-control" name="subitemid" id="subitemid">
				<option value="">Select</option>
				<?php foreach($item_list as $list){ ?>
				<option value="<?php echo $list['subitem_id'];?>"><?php echo $list['subitem_name'];?></option>
				<?php } ?>
				</select>
				</div>
				<div class="form-group">
				<label for="category">Item Name</label>
				<input type="text"  class="form-control" id="itemname"  name="itemname"/>
				</div>
				

				
				
				<div class="btn-group-vertical btn-block text-center" role="group">
				<button type="submit" class="btn btn-danger btn-lg">Add</button>
				
				</div>
				</form>
				
				<form enctype="multipart/form-data" method="post" name="importsubitem" id="importsubitem"  action="<?php echo base_url('inventory/subimportitem'); ?>" class="well col-md-6 col-md-offset-2" style="background-color:#fff;">
				<div class=""  style="font-size:20px;font-weight:600;border-bottom:1px solid #ddd;margin-bottom:10px;padding-bottom:10px;">Import Item</div>
				<a id="fashionproducts" href="<?php echo base_url('assets/subcategoryimportfiles'); ?>/importsitem.xlsx" >Download sample Import File</a>

				<div class="form-group">
				<label for="category">Subitem Name</label>
				<select class="form-control" name="subitemid" id="subitemid">
				<option value="">Select</option>
				<?php foreach($item_list as $list){ ?>
				<option value="<?php echo $list['subitem_id'];?>"><?php echo $list['subitem_name'];?></option>
				<?php } ?>
				</select>
				</div>
				
				<div class="form-group">
				<label for="category">Import File File</label>
				<input type="file" placeholder="" class="form-control" id="importitemfile" name="importitemfile" />
				</div>
				<div class="btn-group-vertical btn-block text-center" role="group">
				<button type="submit" class="btn btn-danger btn-lg">Import</button>
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
				$('#subcategory_list').empty();
				$('#subcategory_lists').empty();
						for(i=0; i<data.length; i++) {
						$('#subcategory_list').append("<option value="+data[i].subcategory_id+">"+data[i].subcategory_name+"</option>");                      
						$('#subcategory_lists').append("<option value="+data[i].subcategory_id+">"+data[i].subcategory_name+"</option>");                      
					}
					}
			});
}

$(document).ready(function() {
    $('#importsubitem').bootstrapValidator({
       
        fields: {
            category_list: {
					validators: {
					notEmpty: {
						message: 'Pease select Category'
					}
				}
			}, 
			subcategory_lists: {
					validators: {
					notEmpty: {
						message: 'Pease select subCategory'
					}
				}
			}, 
			
			importsubitemfile: {
					validators: {
						notEmpty: {
						message: 'Pease select subCategory'
					},
					regexp: {
					regexp: /\.(xlsx|xls)$/i,
					message: 'Uploaded file is not a valid image. Only xl files are allowed'
					}
				}
			}
        }
    });
});

$(document).ready(function() {
    $('#additem').bootstrapValidator({
       
        fields: {
            subitemid: {
					validators: {
					notEmpty: {
						message: 'Subitem is required'
					}
				}
			}, 
			 
			itemname: {
					validators: {
					notEmpty: {
						message: 'ItemName is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9.,&-_@#$ ]+$/,
					message: ' Sub ItemName can only consist of alphanumaric, space and dot'
					}
				}
			},
			category_list: {
					validators: {
					notEmpty: {
						message: 'Please select Category '
					}
				}
			}
        }
    });
});
</script>