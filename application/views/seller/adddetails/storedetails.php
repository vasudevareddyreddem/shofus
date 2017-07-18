
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
/* multiselect css start */
 .chosen-select {
  width: 100%; }

.chosen-select-deselect {
  width: 100%; }

.chosen-container {
  display: inline-block;
  font-size: 14px;
  position: relative;
  vertical-align: middle; }
  .chosen-container .chosen-drop {
    background: #fff;
    border: 1px solid #ccc;
    border-bottom-right-radius: 4px;
    border-bottom-left-radius: 4px;
    -webkit-box-shadow: 0 8px 8px rgba(0, 0, 0, 0.25);
    box-shadow: 0 8px 8px rgba(0, 0, 0, 0.25);
    margin-top: -1px;
    position: absolute;
    top: 100%;
    left: -9000px;
    z-index: 1060; }
  .chosen-container.chosen-with-drop .chosen-drop {
    left: 0;
    right: 0; }
  .chosen-container .chosen-results {
    color: #555555;
    margin: 0 4px 4px 0;
    max-height: 240px;
    padding: 0 0 0 4px;
    position: relative;
    overflow-x: hidden;
    overflow-y: auto;
    -webkit-overflow-scrolling: touch; }
    .chosen-container .chosen-results li {
      display: none;
      line-height: 1.42857;
      list-style: none;
      margin: 0;
      padding: 5px 6px; }
      .chosen-container .chosen-results li em {
        background: #feffde;
        font-style: normal; }
      .chosen-container .chosen-results li.group-result {
        display: list-item;
        cursor: default;
        color: #999;
        font-weight: bold; }
      .chosen-container .chosen-results li.group-option {
        padding-left: 15px; }
      .chosen-container .chosen-results li.active-result {
        cursor: pointer;
        display: list-item; }
      .chosen-container .chosen-results li.highlighted {
        background-color: #337ab7;
        background-image: none;
        color: white; }
        .chosen-container .chosen-results li.highlighted em {
          background: transparent; }
      .chosen-container .chosen-results li.disabled-result {
        display: list-item;
        color: #777777; }
    .chosen-container .chosen-results .no-results {
      background: #eeeeee;
      display: list-item; }
  .chosen-container .chosen-results-scroll {
    background: white;
    margin: 0 4px;
    position: absolute;
    text-align: center;
    width: 321px;
    z-index: 1; }
    .chosen-container .chosen-results-scroll span {
      display: inline-block;
      height: 1.42857;
      text-indent: -5000px;
      width: 9px; }
  .chosen-container .chosen-results-scroll-down {
    bottom: 0; }
    .chosen-container .chosen-results-scroll-down span {
      background: url("chosen-sprite.png") no-repeat -4px -3px; }
  .chosen-container .chosen-results-scroll-up span {
    background: url("chosen-sprite.png") no-repeat -22px -3px; }

.chosen-container-single .chosen-single {
  background-color: #fff;
  -webkit-background-clip: padding-box;
  -moz-background-clip: padding;
  background-clip: padding-box;
  border: 1px solid #ccc;
  border-top-right-radius: 4px;
  border-top-left-radius: 4px;
  border-bottom-right-radius: 4px;
  border-bottom-left-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  color: #555555;
  display: block;
  height: 34px;
  overflow: hidden;
  line-height: 34px;
  padding: 0 0 0 8px;
  position: relative;
  text-decoration: none;
  white-space: nowrap; }
  .chosen-container-single .chosen-single span {
    display: block;
    margin-right: 26px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap; }
  .chosen-container-single .chosen-single abbr {
    background: url("chosen-sprite.png") right top no-repeat;
    display: block;
    font-size: 1px;
    height: 10px;
    position: absolute;
    right: 26px;
    top: 12px;
    width: 12px; }
    .chosen-container-single .chosen-single abbr:hover {
      background-position: right -11px; }
  .chosen-container-single .chosen-single.chosen-disabled .chosen-single abbr:hover {
    background-position: right 2px; }
  .chosen-container-single .chosen-single div {
    display: block;
    height: 100%;
    position: absolute;
    top: 0;
    right: 0;
    width: 18px; }
    .chosen-container-single .chosen-single div b {
      background: url("chosen-sprite.png") no-repeat 0 7px;
      display: block;
      height: 100%;
      width: 100%; }
.chosen-container-single .chosen-default {
  color: #777777; }
.chosen-container-single .chosen-search {
  margin: 0;
  padding: 3px 4px;
  position: relative;
  white-space: nowrap;
  z-index: 1000; }
  .chosen-container-single .chosen-search input[type="text"] {
    background: url("chosen-sprite.png") no-repeat 100% -20px, #fff;
    border: 1px solid #ccc;
    border-top-right-radius: 4px;
    border-top-left-radius: 4px;
    border-bottom-right-radius: 4px;
    border-bottom-left-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    margin: 1px 0;
    padding: 4px 20px 4px 4px;
    width: 100%; }
.chosen-container-single .chosen-drop {
  margin-top: -1px;
  border-bottom-right-radius: 4px;
  border-bottom-left-radius: 4px;
  -webkit-background-clip: padding-box;
  -moz-background-clip: padding;
  background-clip: padding-box; }

.chosen-container-single-nosearch .chosen-search input[type="text"] {
  position: absolute;
  left: -9000px; }

.chosen-container-multi .chosen-choices {
  background-color: #fff;
  border: 1px solid #ccc;
  border-top-right-radius: 4px;
  border-top-left-radius: 4px;
  border-bottom-right-radius: 4px;
  border-bottom-left-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  cursor: text;
  height: auto !important;
  height: 1%;
  margin: 0;
  overflow: hidden;
  padding: 0;
  position: relative; }
  .chosen-container-multi .chosen-choices li {
    float: left;
    list-style: none; }
  .chosen-container-multi .chosen-choices .search-field {
    margin: 0;
    padding: 0;
    white-space: nowrap; }
    .chosen-container-multi .chosen-choices .search-field input[type="text"] {
      background: transparent !important;
      border: 0 !important;
      -webkit-box-shadow: none;
      box-shadow: none;
      color: #555555;
      height: 32px;
      margin: 0;
      padding: 4px;
      outline: 0; }
    .chosen-container-multi .chosen-choices .search-field .default {
      color: #999; }
  .chosen-container-multi .chosen-choices .search-choice {
    -webkit-background-clip: padding-box;
    -moz-background-clip: padding;
    background-clip: padding-box;
    background-color: #eeeeee;
    border: 1px solid #ccc;
    border-top-right-radius: 4px;
    border-top-left-radius: 4px;
    border-bottom-right-radius: 4px;
    border-bottom-left-radius: 4px;
    background-image: -webkit-linear-gradient(top, white 0%, #eeeeee 100%);
    background-image: -o-linear-gradient(top, white 0%, #eeeeee 100%);
    background-image: linear-gradient(to bottom, white 0%, #eeeeee 100%);
    background-repeat: repeat-x;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFFFFFFF', endColorstr='#FFEEEEEE', GradientType=0);
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    color: #333333;
    cursor: default;
    line-height: 13px;
    margin: 6px 0 3px 5px;
    padding: 3px 20px 3px 5px;
    position: relative; }
    .chosen-container-multi .chosen-choices .search-choice .search-choice-close {
      background: url("<?php echo base_url();?>assets/seller_login/images/close.png") right top no-repeat;
      display: block;
      font-size: 1px;
      height: 10px;
      position: absolute;
      right: 4px;
      top: 7px;
      width: 12px;
      cursor: pointer; }
	  .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
		border:none;
	}

 /* multiselect css end */
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
			<h3 class="col-md-offset-3">Store details</h3>
        <div class="col-md-6 col-md-offset-3 well">
	
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
            <select class="form-control"  name = "other_shops" id = "other_shops">
					<option value ="">Select</option>
					<option value ="yes">Yes</option>
					<option value ="No">No</option>		
				</select>
          </div>
		 <div class="form-group">
            <label class="control-label">Other Shop Locations</label>
            <select id="other_shops_location" onchange="removemsg(this.value);" name="other_shops_location[]"   multiple class="chosen-select" tabindex="8">
				  <option value=""></option>
				  <?php foreach($select_areas as $area){ ?>
                    <option value="<?php echo $area->location_name; ?>"><?php echo $area->location_name; ?></option>                  
                    <?php }?>
				</select>

            
          </div>
		
		 <div class="form-group">
            <label class="control-label">Any web link </label>
            <input type="text" id="weblink"  name="weblink" value="<?php echo isset($sellerdata['weblink'])?$sellerdata['weblink']:''; ?>" class="form-control"/>
          </div>
		   <div class="form-group">
            <label class="control-label">GSTIN</label>
            <input type="text"  name="tin" id="tin" value="<?php echo isset($sellerdata['tin_vat'])?$sellerdata['tin_vat']:''; ?>" class="form-control" />
            <input type="file" title="Upload" name="timimages" onchange="tinpopupimage(this.value);"  id="timimages" class="form-control" />
			<a onclick="deactive();" href="javascript:void(0)" >Upload</a><span id="backid1"><?php echo isset($sellerdata['tinvatimage'])?$sellerdata['tinvatimage']:''; ?></span>
			<span id="tinimage"></span>
			<span style="color:red" id="tinimageerror"></span>
		
          </div>
		  <div class="form-group">
            <label class="control-label">TAN </label>
            <input  type="text"  name="tan" id="tan" value="<?php echo isset($sellerdata['tan'])?$sellerdata['tan']:''; ?>" class="form-control"/>
			<input type="file" name="tanimages" id="tanimages"  onchange="tanimageuload(this.value)">
			<a onclick="deactive1();" href="javascript:void(0)" >Upload</a><span id="backid2"><?php echo isset($sellerdata['tanimage'])?$sellerdata['tanimage']:''; ?></span>
			<span id="tanimgs"></span>
			<span style="color:red" id="tanimgserror"></span>
          </div>
		<div class="form-group">
            <label class="control-label">CIN </label>
            <input  type="text" id="cst"  name="cst" value="<?php echo isset($sellerdata['cst'])?$sellerdata['cst']:''; ?>" class="form-control"/>
			<input type="file" id="cstimag" name="cstimag"  onchange="cstimageuload(this.value)">
			<a onclick="deactive2();" href="javascript:void(0)" >Upload</a><span id="backid3"><?php echo isset($sellerdata['cstimage'])?$sellerdata['cstimage']:''; ?></span>
			<span id="cstimages"></span>
			<span style="color:red" id="cstimageserror"></span>
          </div>
		
		 <div class="form-group">
            <label class="control-label">Signature file</label>
            <input  type="text"  name="gstin" id="gstin" value="<?php echo isset($sellerdata['gstin'])?$sellerdata['gstin']:''; ?>" class="form-control"  />
			<input type="file" id="gstimag" name="gstimag"  onchange="gstimageuload(this.value)">
			<a onclick="deactive3();" href="javascript:void(0)" >Upload</a><span id="backid3"><?php echo isset($sellerdata['gstinimage'])?$sellerdata['gstinimage']:''; ?></span>
			<span id="gstimages"></span>
			<span style="color:red" id="gstimageserror"></span>         

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

		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrapValidator.css"/>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="http://harvesthq.github.io/chosen/chosen.jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/bootstrapValidator.js"></script>

	
	
<script type="text/javascript">
$('#timimages').hide();
$('#tanimages').hide();
$('#cstimag').hide();
$('#gstimag').hide();



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
document.getElementById('gstimag').onchange = gstuploadOnChange;
function gstuploadOnChange() {
    var filename = this.value;
    var lastIndex = filename.lastIndexOf("\\");
    if (lastIndex >= 0) {
        filename = filename.substring(lastIndex + 1);
    }
	jQuery('#backid3').hide();
	$('#editcstimage').hide();
	jQuery('#gstimageserror').html('');
    document.getElementById("gstimages").innerHTML  = filename;
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
function deactive3(id){
	$('#gstimag').trigger("click");	
}

 function validation(){
	 
	  var fup = document.getElementById('timimages');
		var fileName = fup.value;
		var ext1 = fileName.substring(fileName.lastIndexOf('.') + 1);

		if(ext1 !=''){
		if(ext1 == "png" || ext1 == "gif" || ext1 == "jpg" || ext1 == "jpe?g")
		{
		jQuery('#timimageserrormsg').val(1);
		jQuery(tinimageerror).html('');
		} else{
		jQuery('#timimageserrormsg').val(0);
		jQuery('#tinimageerror').html('Uploaded file is not a valid. png,gif,jpg files are allowed');
		return false;
		}
		}
		var fup1 = document.getElementById('tanimages');
		var fileName1 = fup1.value;
		var ext2 = fileName1.substring(fileName1.lastIndexOf('.') + 1);

		if(ext2 !=''){
		if(ext2 == "png" || ext2 == "gif" || ext2 == "jpg" || ext2 == "jpe?g")
		{
		jQuery('#timimageserrormsg').val(1);
		jQuery('#tanimgserror').html('');
		} else{
		jQuery('#timimageserrormsg').val(0);
		jQuery('#tanimgserror').html('Uploaded file is not a valid. Only png,gif,jpg files are allowed');
		return false;
		}
		}
		var fup3 = document.getElementById('cstimag');
		var fileName2 = fup3.value;
		var ext3 = fileName2.substring(fileName2.lastIndexOf('.') + 1);

		if(ext3 !=''){
		if(ext3 == "png" || ext3 == "gif" || ext3 == "jpg" || ext3 == "jpe?g")
		{
		jQuery('#timimageserrormsg').val(1);
		jQuery('#cstimageserror').html('');
		} else{
		jQuery('#timimageserrormsg').val(0);
		jQuery('#cstimageserror').html('Uploaded file is not a valid. Only png,gif,jpg files are allowed');
		return false;
		}
		}
		var fup4 = document.getElementById('gstimag');
		var fileName3 = fup4.value;
		var ext4 = fileName3.substring(fileName3.lastIndexOf('.') + 1);

		if(ext4 !=''){
		if(ext4 == "png" || ext4 == "gif" || ext4 == "jpg" || ext4 == "jpe?g")
		{
		jQuery('#timimageserrormsg').val(1);
		jQuery('#gstimageserror').html('');
		} else{
		jQuery('#timimageserrormsg').val(0);
		jQuery('#gstimageserror').html('Uploaded file is not a valid. Only png,gif,jpg files are allowed');
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
			weblink: {
               validators: {

			
				regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: ' Weblink can only consist of alphanumaric, space and dot'
				}
            
			}
            },
			tin: {
               validators: {
                notEmpty: {
            message: 'Please Upload GSTIN'
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
            message: 'Please Upload TAN'
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
            message: 'Please Upload CIN'
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
            message: 'Please Upload Signature'
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

      $(function() {
        $('.chosen-select').chosen();
        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
      });
      function removemsg(id){
	if(id!=''){
		$("#locationmsg").hide();
		document.getElementById("bnt").disabled = false; 
	}else{
	$("#locationmsg").show();	
	}
}
    </script>
		
</html>