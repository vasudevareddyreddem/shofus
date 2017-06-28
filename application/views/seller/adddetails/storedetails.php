
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<style>
.process-step .btn:focus{outline:none}
.process{display:table;width:100%;position:relative}
.process-row{display:table-row}
.process-step button[disabled]{opacity:1 !important;filter: alpha(opacity=100) !important}
.process-row:before{top:40px;bottom:0;position:absolute;content:" ";width:100%;height:1px;background-color:#ccc;z-order:0}
.process-step{display:table-cell;text-align:center;position:relative}
.process-step p{margin-top:4px}
.btn-circle{width:80px;height:80px;text-align:center;font-size:12px;border-radius:50%}
.modal-backdrop.in {
    opacity: 0 !important;
}
</style>

<div class="navigation_main ">
    <nav class="navbar navbar-inverse hm_nav">
      <div class="">
        <div class="navbar-header logo_style" >
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="<?php echo base_url('seller/login'); ?>">
      <img  src="<?php echo base_url(); ?>assets/seller/images/logo.png" class="img-responsive" style="width: 30%;"/></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
        <h4>Building Your Hyper-Local Store</h4>
          
          </ul>
         
          
        </div>
      </div>
    </nav>
  </div>
<div class="" style="margin-bottom:50px;">&nbsp;</div>

<div class="container">
 <div class="row">
 
  <div class="process">
   <div class="process-row nav nav-tabs">
    <div class="process-step">
     <button type="button" class="btn  btn-success btn-circle" data-toggle="tab" href="#menu1"><i class="fa fa-info fa-3x"></i></button>
     <p><strong>Basic details</strong></p>
    </div>
    <div class="process-step">
     <button type="button" class="btn  btn-success btn-circle" data-toggle="tab" href="#menu2"><i class="fa fa-file-text-o fa-3x"></i></button>
     <p><strong>Select your Category</strong></p>
    </div>
    <div class="process-step">
     <button type="button" class=" btn-info btn btn-circle" data-toggle="tab" href="#menu3"><i class="fa fa-image fa-3x"></i></button>
     <p class="text-default" id="error_p"><strong>Store details</strong></p>
    </div>
  <div class="process-step">
     <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu4"><i class="fa fa-image fa-3x"></i></button>
     <p><strong>Personal details</strong></p>
    </div>
    
   </div>
  </div>
 </div>
</div>
<div class="" style="margin-bottom:50px;">&nbsp;</div>
<div class="container" >
  <?php //echo $this->session->flashdata('msg2'); ?>
  <form id="storedetails" name="storedetails" onsubmit="return validation();" action="<?php echo base_url('seller/adddetails/seller_storedetails'); ?>" enctype="multipart/form-data" method="post" >
    <div class="row setup-content">
		<div class="col-xs-12 ">
        <div class="col-md-6 col-md-offset-3">
		<input type="hidden" name="timimageserrormsg" id="timimageserrormsg" value="1">
		<input type="hidden" name="cstimageserrormsg" id="cstimageserrormsg" value="1">
		<input type="hidden" name="tanimgesserrormsg" id="tanimgesserrormsg" value="1">
		<?php //echo '<pre>';print_r($sellerdata);exit; ?>
          <div class="form-group">
            <label class="control-label">Your Store Name (Which displays on our website)</label>
            <input  type="text" class="form-control" name="storename" id="storename" value="<?php echo isset($sellerdata['store_name'])?$sellerdata['store_name']:''; ?>" class="storename">
          </div>
		   <label class="control-label">Enter your Store location</label>
		<div class="form-group">
            <label class="control-label">Address Line 1</label>
            <input  type="text"  name="address1" id="address1" value="<?php echo isset($sellerdata['addrees1'])?$sellerdata['addrees1']:''; ?>" class="form-control" />
          </div>
		  <div class="form-group">
            <label class="control-label">Address Line 2</label>
            <input  type="text"  name="address2" id="address2" value="<?php echo isset($sellerdata['addrees2'])?$sellerdata['addrees2']:''; ?>" class="form-control" />
          </div>
		  <div class="form-group">
            <label class="control-label">Area</label>
				<select class="form-control"  name = "areacode" id = "areacode">
					<option value ="">Select</option>
				
                        <?php foreach($selectareas as $area){?>

						<?php if(($sellerdata['area'])== $area['location_id'] ){?>
						<option  selected="selected" value="<?php echo $area['location_id']; ?>"><?php echo $area['location_name'];?></option>
						<?php } else{ ?>
						<option value = "<?php echo $area['location_id'];?>"><?php echo $area['location_name'];?></option>
					<?php } }; ?>			
				</select>
       
          </div>
		  <div class="form-group">
            <label class="control-label">Pincode</label>
            <input  type="text"  name="pincode" id="pincode" value="<?php echo isset($sellerdata['pin_code'])?$sellerdata['pin_code']:''; ?>" class="form-control" />
          </div>
		  <div class="form-group">
            <label class="control-label">Other Shops (if any): </label>
            <input  type="text"  name="other_shops" id="other_shops" value="<?php echo isset($sellerdata['other_shops'])?$sellerdata['other_shops']:''; ?>" class="form-control"  />
          </div>
		 <div class="form-group">
            <label class="control-label">Other Shop Locations</label>
            <input  type="text"  name="other_shops_location" id="other_shops_location" value="<?php echo isset($sellerdata['other_shops_location'])?$sellerdata['other_shops_location']:''; ?>" class="form-control"  />
          </div>
		 <div class="form-group">
            <label class="control-label">Delivery service on your Own ?</label>
				<select class="form-control" required="required" name = "deliveryes" id = "deliveryes">
					<option value ="">Select</option>
				
					<?php if($sellerdata['deliveryes']==1) {?>
					<option value ="1" selected>YES</option> 
					<?php } else {?>
					<option value ="1">YES</option>
					<?php }if($sellerdata['deliveryes']==0) {?>
					<option value ="0" selected>No</option>
					<?php }else{ ?>
					<option value ="0">No</option>						
					<?php } ?>					
				</select>
       
          </div>
		 <div class="form-group">
            <label class="control-label">Any web link </label>
            <input type="text" id="weblink"  name="weblink" value="<?php echo isset($sellerdata['weblink'])?$sellerdata['weblink']:''; ?>" class="form-control"/>
          </div>
		   <div class="form-group">
            <label class="control-label">TIN / VAT</label>
            <input type="text"  name="tin" id="tin" value="<?php echo isset($sellerdata['tin_vat'])?$sellerdata['tin_vat']:''; ?>" class="form-control" />
            <input type="file" title="Upload" name="timimages" onchange="tinpopupimage(this.value);"  id="timimages" class="form-control" />
			<a onclick="deactive();" href="javascript:void(0)" >Upload</a><span id="backid1"><?php echo isset($sellerdata['tinvatimage'])?$sellerdata['tinvatimage']:''; ?></span>
			<span id="tinimage"></span>
			<span style="color:red" id="tinimageerror"></span>
		
          </div>
		  <div class="form-group">
            <label class="control-label">Tan </label>
            <input  type="text"  name="tan" id="tan" value="<?php echo isset($sellerdata['tan'])?$sellerdata['tan']:''; ?>" class="form-control"/>
			<input type="file" name="tanimages" id="tanimages"  onchange="tanimageuload(this.value)">
			<a onclick="deactive1();" href="javascript:void(0)" >Upload</a><span id="backid2"><?php echo isset($sellerdata['tanimage'])?$sellerdata['tanimage']:''; ?></span>
			<span id="tanimgs"></span>
			<span style="color:red" id="tanimgserror"></span>
          </div>
		<div class="form-group">
            <label class="control-label">Cst </label>
            <input  type="text" id="cst"  name="cst" value="<?php echo isset($sellerdata['cst'])?$sellerdata['cst']:''; ?>" class="form-control"/>
			<input type="file" id="cstimag" name="cstimag"  onchange="cstimageuload(this.value)">
			<a onclick="deactive2();" href="javascript:void(0)" >Upload</a><span id="backid3"><?php echo isset($sellerdata['cstimage'])?$sellerdata['cstimage']:''; ?></span>
			<span id="cstimages"></span>
			<span style="color:red" id="cstimageserror"></span>
          </div>
		
		 <div class="form-group">
            <label class="control-label">GSTIN</label>
            <input  type="text"  name="gstin" id="gstin" value="<?php echo isset($sellerdata['gstin'])?$sellerdata['gstin']:''; ?>" class="form-control"  />
          </div>
		
		 
	
               <a type="submit" class="btn btn-primary" href="<?php echo base_url('seller/adddetails/categories'); ?>">Back</a>
			<input type="submit" id="resubmit" class="btn btn-primary pull-right " value="Next">
              </form>
        </div>
      </div>
	  
	   <div class="modal fade" id="tinpopups" role="dialog" style="opacity:1;">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p><input type="file" name="tinimage" id="tinimage" onchange="tinpopupimage(this.value)" ></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
    </div>
	</div>
	
<footer class="foot_add_d mar_t15">
    <div class="container">
      <div class="row">
                <strong>Copyright &copy; 2017 Cartinhour.</strong> All rights reserved.
      </div>
    </div>
  </footer>

</html>
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrapValidator.css"/>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/bootstrapValidator.js"></script>
<script type="text/javascript">
$('#timimages').hide();
$('#tanimages').hide();
$('#cstimag').hide();



document.getElementById('timimages').onchange = uploadOnChange;
function uploadOnChange() {
    var filename = this.value;
    var lastIndex = filename.lastIndexOf("\\");
    if (lastIndex >= 0) {
        filename = filename.substring(lastIndex + 1);
    }
	jQuery('#backid1').hide();
	jQuery('#tinimageerror').html('');
    document.getElementById("tinimage").innerHTML  = filename;
	document.getElementById("resubmit").disabled = false; 
	
}
document.getElementById('tanimages').onchange = tanuploadOnChange;
function tanuploadOnChange() {
    var filename = this.value;
    var lastIndex = filename.lastIndexOf("\\");
    if (lastIndex >= 0) {
        filename = filename.substring(lastIndex + 1);
    }
	jQuery('#backid2').hide();
	jQuery('#tanimgserror').html('');
    document.getElementById("tanimgs").innerHTML  = filename;
	document.getElementById("resubmit").disabled = false; 
	
}
document.getElementById('cstimag').onchange = cstuploadOnChange;

function cstuploadOnChange() {
    var filename = this.value;
    var lastIndex = filename.lastIndexOf("\\");
    if (lastIndex >= 0) {
        filename = filename.substring(lastIndex + 1);
    }
	jQuery('#backid3').hide();
	$('#editcstimage').hide();
	jQuery('#cstimageserror').html('');
    document.getElementById("cstimages").innerHTML  = filename;
	document.getElementById("resubmit").disabled = false; 
	
}

function deactive(id){
	$('#timimages').trigger("click");	
}
function deactive1(id){
	$('#tanimages').trigger("click");	
}
function deactive2(id){
	$('#cstimag').trigger("click");	
}

 function validation(){
	 
	  var fup = document.getElementById('timimages');
		var fileName = fup.value;
		var ext1 = fileName.substring(fileName.lastIndexOf('.') + 1);

		if(ext1 !=''){
		if(ext1 == "docx" || ext1 == "doc" || ext1 == "pdf" || ext1 == "xlsx" || ext1 == "xls")
		{
		jQuery('#timimageserrormsg').val(1);
		jQuery(tinimageerror).html('');
		} else{
		jQuery('#timimageserrormsg').val(0);
		jQuery('#tinimageerror').html('Uploaded file is not a valid. Only docx,doc,pdf,xlsx,pdf files are allowed');
		return false;
		}
		}
		var fup1 = document.getElementById('tanimages');
		var fileName1 = fup1.value;
		var ext2 = fileName1.substring(fileName1.lastIndexOf('.') + 1);

		if(ext2 !=''){
		if(ext2 == "docx" || ext2 == "doc" || ext2 == "pdf" || ext2 == "xlsx" || ext2 == "xls")
		{
		jQuery('#timimageserrormsg').val(1);
		jQuery('#tanimgserror').html('');
		} else{
		jQuery('#timimageserrormsg').val(0);
		jQuery('#tanimgserror').html('Uploaded file is not a valid. Only docx,doc,pdf,xlsx,pdf files are allowed');
		return false;
		}
		}
		var fup3 = document.getElementById('cstimag');
		var fileName2 = fup3.value;
		var ext3 = fileName2.substring(fileName2.lastIndexOf('.') + 1);

		if(ext3 !=''){
		if(ext3 == "docx" || ext3 == "doc" || ext3 == "pdf" || ext3 == "xlsx" || ext3 == "xls")
		{
		jQuery('#timimageserrormsg').val(1);
		jQuery('#cstimageserror').html('');
		} else{
		jQuery('#timimageserrormsg').val(0);
		jQuery('#cstimageserror').html('Uploaded file is not a valid. Only docx,doc,pdf,xlsx,pdf files are allowed');
		return false;
		}
		}
		return true; 
	
	 
 }
 
$(document).ready(function() {
    $('#storedetails').bootstrapValidator({
       
        fields: {
			storename: {
              validators: {
					notEmpty: {
						message: 'Store Name is required'
					},
                   regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Store Name can only consist of alphanumaric, space and dot'
					}
                }
            },
            address1: {
               validators: {
				notEmpty: {
						message: 'Address Line 1 is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message: 'Address Line 1 wont allow <> [] = % '
					}
            
			}
            },
			address2: {
               validators: {
				notEmpty: {
						message: 'Address Line 2 is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message: 'Address Line 2 wont allow <> [] = % '
					}
            
			}
            },
			pincode: {
               validators: {
				notEmpty: {
						message: 'Pincode is required'
					},
					regexp: {
					regexp:  /^[0-9]{6}$/,
					message:'Pincode must be 6 digits'
					}
            
			}
            },
			areacode: {
               validators: {
				notEmpty: {
					message: 'Please select an Area'
				}
			   }
            
			},
			deliveryes: {
               validators: {
				notEmpty: {
					message: 'Please select a Delivery service'
				}
			   }
            
			},
			weblink: {
               validators: {
				notEmpty: {
					message: 'Weblink is required'
				},
				regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: ' Weblink can only consist of alphanumaric, space and dot'
				}
            
			}
            },
			tin: {
               validators: {
				notEmpty: {
					message: 'Tin is required'
				},
				regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: ' Tin can only consist of alphanumaric, space and dot'
				}
            
			}
            },
			tan: {
               validators: {
				notEmpty: {
					message: 'Tin is required'
				},
				regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: ' Tin can only consist of alphanumaric, space and dot'
				}
            
			}
            },
			cst: {
               validators: {
				notEmpty: {
					message: 'Cst is required'
				},
				regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: ' Cst can only consist of alphanumaric, space and dot'
				}
            
			}
            },
			gstin: {
               validators: {
				notEmpty: {
					message: 'GSTIN is required'
				},
				regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: ' GSTIN can only consist of alphanumaric, space and dot'
				}
            
			}
            }
            
		
        }
    });
});
</script>
		
