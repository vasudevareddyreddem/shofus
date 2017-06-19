
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
      <a class="navbar-brand" href="#">
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
        <div class="col-md-6">
		<input type="hidden" name="timimageserrormsg" id="timimageserrormsg" value="1">
		<input type="hidden" name="cstimageserrormsg" id="cstimageserrormsg" value="1">
		<input type="hidden" name="tanimgesserrormsg" id="tanimgesserrormsg" value="1">
          <div class="form-group">
            <label class="control-label">Your Store Name (Which displays on our website)</label>
            <input  type="text" class="form-control" name="storename" id="storename" class="storename">
          </div>
		   <label class="control-label">Enter your Store location</label>
		<div class="form-group">
            <label class="control-label">Address Line 1</label>
            <input  type="text"  name="address1" id="address1" class="form-control" />
          </div>
		  <div class="form-group">
            <label class="control-label">Address Line 2</label>
            <input  type="text"  name="address2" id="address2" class="form-control" />
          </div>
		  <div class="form-group">
            <label class="control-label">Pincode</label>
            <input  type="text"  name="pincode" id="pincode" class="form-control" />
          </div>
		  <div class="form-group">
            <label class="control-label">Other Shops (if any): </label>
            <input  type="text"  name="other_shops" id="other_shops" class="form-control"  />
          </div>
		 <div class="form-group">
            <label class="control-label">Other Shop Locations</label>
            <input  type="text"  name="other_shops_location" id="other_shops_location" class="form-control"  />
          </div>
		 <div class="form-group">
            <label class="control-label">Delivery service on your Own ?</label>
            <input  type="radio" name="deliveryes"  id="deliveryes" value="1" />YES
            <input  type="radio" name="deliveryes"  id="deliveryes" value="0" />No
          </div>
		 <div class="form-group">
            <label class="control-label">Any web link </label>
            <input type="text" id="weblink"  name="weblink" class="form-control"/>
          </div>
		   <div class="form-group">
            <label class="control-label">TIN / VAT</label>
            <input type="text"  name="tin" id="tin" class="form-control" />
            <input type="file" title="Upload" name="timimages" onchange="tinpopupimage(this.value);" id="timimages" class="form-control" />
			<a onclick="deactive();" href="javascript:void(0)" >Upload</a>
			<span id="tinimage"></span>
			<span style="color:red" id="tinimageerror"></span>
		
          </div>
		  <div class="form-group">
            <label class="control-label">Tan </label>
            <input  type="text"  name="tan" id="tan" class="form-control"/>
			<input type="file" name="tanimages" id="tanimages" onchange="tanimageuload(this.value)">
			<a onclick="deactive1();" href="javascript:void(0)" >Upload</a>
			<span id="tanimgs"></span>
			<span style="color:red" id="tanimgserror"></span>
          </div>
		<div class="form-group">
            <label class="control-label">Cst </label>
            <input  type="text" id="cst"  name="cst" class="form-control"/>
			<input type="file" id="cstimag" name="cstimag" onchange="cstimageuload(this.value)">
			<a onclick="deactive2();" href="javascript:void(0)" >Upload</a>
			<span id="cstimages"></span>
			<span style="color:red" id="cstimageserror"></span>
          </div>
		
		 <div class="form-group">
            <label class="control-label">GSTIN</label>
            <input  type="text"  name="gstin" id="gstin" class="form-control"  />
          </div>
		
		 
	
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
	


</html>
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrapValidator.css"/>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/bootstrapValidator.js"></script>
<script type="text/javascript">
$('#timimages').hide();
$('#tanimages').hide();
$('#cstimag').hide();
function tinpopupimage(imagename){
 $('input[type="file"]').change(function(e){
	var fileName0 = e.target.files[0].name;
		document.getElementById("tinimage").innerHTML = fileName0; 
	});
	var fup = document.getElementById('timimages');
		var fileName = fup.value;
		var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
		if(ext !=''){
			if(ext == "docx" || ext == "doc" || ext == "pdf" || ext == "xlsx" || ext == "xls")
			{
			jQuery('#timimageserrormsg').val(1);
			jQuery(tinimageerror).html('')
			 document.getElementById("resubmit").disabled = false; 
			} else{
				document.getElementById("resubmit").disabled = true; 
			jQuery('#timimageserrormsg').val(0);
			jQuery('#tinimageerror').html('Uploaded file is not a valid. Only docx,doc,pdf,xlsx,pdf files are allowed');
			return false;
			
			}
		}
	
}

function deactive(id){
	$('#timimages').trigger("click");	
	var imgname=document.getElementById("timimages").value;	
}
function deactive1(id){
	$('#tanimages').trigger("click");	
	var imgname=document.getElementById("timimages").value;	
}
function deactive2(id){
	$('#cstimag').trigger("click");	
	var imgname=document.getElementById("timimages").value;	
}
function tanimageuload(imagename){
	$('input[type="file"]').change(function(e){
	var fileName = e.target.files[0].name;
		document.getElementById("tanimgs").innerHTML = fileName; 
	});
	var fup = document.getElementById('tanimages');
		var fileName = fup.value;
		var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
		if(ext !=''){
			if(ext == "docx" || ext == "doc" || ext == "pdf" || ext == "xlsx" || ext == "xls")
			{
				document.getElementById("resubmit").disabled = false; 
			jQuery('#tanimgesserrormsg').val(1);
			jQuery('#tanimgserror').html('')
			} else{
			jQuery('#tanimgesserrormsg').val(0);
			jQuery('#tanimgserror').html('Uploaded file is not a valid. Only docx,doc,pdf,xlsx,pdf files are allowed');
			return false;
			}
		}
	
}
function cstimageuload(imagename){
	$('input[type="file"]').change(function(e){
	var fileName1 = e.target.files[0].name;
		document.getElementById("cstimages").innerHTML = fileName1; 
	});
	var fup = document.getElementById('cstimag');
		var fileName = fup.value;
		var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
		if(ext !=''){
			if(ext == "docx" || ext == "doc" || ext == "pdf" || ext == "xlsx" || ext == "xls")
			{
			document.getElementById("resubmit").disabled = false; 
			jQuery('#cstimageserrormsg').val(1);
			jQuery('#cstimageserror').html('')
			} else{
			jQuery('#cstimageserrormsg').val(0);
			jQuery('#cstimageserror').html('Uploaded file is not a valid. Only docx,doc,pdf,xlsx,pdf files are allowed');
			return false;
			}
		}
}
 function validation(){
	 
	 var imageerror1=document.getElementById("timimageserrormsg").value;
	 var imageerror2=document.getElementById("cstimageserrormsg").value;
	 var imageerror3=document.getElementById("tanimgesserrormsg").value;
	if(imageerror1==0 || imageerror2 ==0 || imageerror3 ==0){
		return false; 
	 }else{
		return true; 
	 }
	 
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
		
