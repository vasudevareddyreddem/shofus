<!DOCTYPE html>
<html lang="en">
<head>

</head>

<script type="text/javascript">
$(document).ready(function(){
  var maxField = 10; //Input fields increment limitation
  var addButton = $('.add_button'); //Add button selector
  var wrapper = $('.field_wrapper'); //Input field wrapper
  var fieldHTML = '<div class="field_wrapper nopaddingRight col-md-13 san-lg" ><select class="form-control" onchange="savecat(this.value);"  id="category_id" name="seller_cat[]"><option value="">Select Category</option><?php foreach($getcat as $cat_data){ ?><option value="<?php echo $cat_data->category_id; ?>"><?php echo $cat_data->category_name; ?></option><?php }?></select><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="<?php echo site_url(); ?>assets/seller/images/remove-icon.png"/></a></div>'; //New input field html 
  var x = 1; //Initial field counter is 1
  $(addButton).click(function(){ //Once add button is clicked
    if(x < maxField){ //Check maximum number of input fields
      x++; //Increment field counter
      $(wrapper).append(fieldHTML); // Add field html
    }
  });
  $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
    e.preventDefault();
    $(this).parent('div').remove(); //Remove field html
    x--; //Decrement field counter
  });
});
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#details").click(function(){
        $("#error_stepone").addClass("btn-danger");
        $("#error_p").addClass("text-danger"); 
        $("#error_stepone").removeClass("btn-info");       
    });
});
</script>
<style>
.process-step .btn:focus{outline:none}
.process{display:table;width:100%;position:relative}
.process-row{display:table-row}
.process-step button[disabled]{opacity:1 !important;filter: alpha(opacity=100) !important}
.process-row:before{top:40px;bottom:0;position:absolute;content:" ";width:100%;height:1px;background-color:#ccc;z-order:0}
.process-step{display:table-cell;text-align:center;position:relative}
.process-step p{margin-top:4px}
.btn-circle{width:80px;height:80px;text-align:center;font-size:12px;border-radius:50%}
.pos_re{
	top:44;
	right:-80px;
	position: absolute;
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

 /* multiselect css end */
}
</style>
<div class="navigation_main">
    <nav class="navbar navbar-inverse hm_nav">
      <div class="">
        <div class="navbar-header logo_style" >
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="<?php echo base_url('seller/login'); ?>">
      <img  src="<?php echo base_url(); ?>assets/seller/images/logo.png" class="img-responsive" style="width: 30%;"/></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <h3>Building Your Hyper-Local Store</h3>
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
     <button type="button" class="btn  btn-success btn-circle" data-toggle="tab" href="#menu1"><i class="fa fa-info fa-3x" ></i></button>
     <p><strong>Basic details</strong></p>
    </div>
    <div class="process-step">
     <button type="button" class="btn  btn-info btn-circle" data-toggle="tab" href="#menu2" id="error_stepone"><i class="fa fa-file-text-o fa-3x"></i></button>
     <p class="text-default" id="error_p"><strong>Select your Category</strong></p>
    </div>
    <div class="process-step" id="details">
     <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu3"><i class="fa fa-image fa-3x" ></i></button>
     <p><strong>Store details</strong></p>
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
  <?php echo $this->session->flashdata('msg2'); ?>
  <form id="categories" name="categories" action="<?php echo base_url('seller/adddetails/updateseeler_details'); ?>" enctype="multipart/form-data"ss method="post" >
    <div class="row well">
	<form>
	<div class="col-md-6  ">
			<div class="form-group ">
				<label>Select Location</label>
				<select data-placeholder="Your Favorite Types of Bear" multiple class="chosen-select" tabindex="8">
				  <option value=""></option>
				  <option>American Black Bear</option>
				  <option>Asiatic Black Bear</option>
				  <option>Brown Bear</option>
				  <option>Giant Panda</option>
				  <option>Sloth Bear</option>
				  <option disabled>Sun Bear</option>
				  <option selected>Polar Bear</option>
				  <option disabled>Spectacled Bear</option>
				</select>
			</div>
   
	</div>
	<div class="col-md-6 ">
    <div class="row setup-content">
      <div class="col-xs-12 ">
        <div class="col-md-12">
					<div class="col-md-5">
						<div class="form-group ">
							<label> Add Your Own Category</label>
							<input type="text" class="form-control" />
							
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group ">
							<label> Add Your Own Category</label>
							<input type="file" class="form-control" />
							
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group ">
						<label> &nbsp;</label>
						<input type="hidden" name="centerCount" id="centerCount" value="0" />
						<button class="btn btn-primary" type="button" onclick="addCenter();"><span>Add </span></button>
					</div>
					</div>
         <!-- <h3>Select Your Category</h3>
          <div class="field_wrapper nopaddingRight col-md-8 san-lg pos_r form-group" id="CenterForm" >
		
                 <select class="form-control"  id="seller_cat[]" name="seller_cat[]" onchange="categoryid(this.value);" required="required">
                    <option value="">Select Category</option>
                    <?php foreach($getcat as $cat_data){ ?>
                    <option value="<?php echo $cat_data['category_id']; ?>"><?php echo $cat_data['category_name']; ?></option>                  
                    <?php }?>
                  </select>
		</div>-->
					
					
      
     
	

			 
                </div>
				
		
		


        </div>
      </div>
    </div>
	<div class="clearfix"></div>
	<div class="" style="padding-right:40px;margin-top:20px;">	
		 <a type="submit" class="btn btn-primary" href="<?php echo base_url('seller/adddetails'); ?>">Back</a>

		<input id="bnt" type="submit" class="btn btn-info pull-right" value="Next">
	</div>
	</form>
    </div>
</div>
<footer class="foot_add_d " style="margin-top: 8%">
    <div class="container">
      <div class="row">
                <strong>Copyright &copy; 2017 Cartinhour.</strong> All rights reserved.
      </div>
    </div>
  </footer> 
</html>

   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrapValidator.css"/>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="http://harvesthq.github.io/chosen/chosen.jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/bootstrapValidator.js"></script>
	
<script type="text/javascript">
$(document).ready(function() {
    $('#categories').bootstrapValidator({
       
        fields: {
			  'seller_cat[]': {
              validators: {
					 notEmpty: {
                        message: 'Please select a Category'
                    }
                }
            }
            
		
        }
    });
});

function addCenter() 
    {
		var cCount = document.getElementById('centerCount').value;
        var val = Number(cCount) + 1;
        document.getElementById('centerCount').value= val;
        //alert(val);
        var toDiv = document.getElementById("CenterForm");
        var div = document.createElement('div');
        div.id = 'mainForms'+val;
        div.innerHTML = '<div style="" class="form-group" id="CenterForm"><div style="width:100%" class="field_wrapper nopaddingRight col-md-5 san-lg pos_r" data-plugin="inputGroupFile"><select class="form-control"  id="seller_cat[]" name="seller_cat[]" required="required"><option value="">Select Category</option><?php foreach($getcat as $cat_data){ ?><option value="<?php echo $cat_data['category_id']; ?>"><?php echo $cat_data['category_name']; ?></option><?php }?></select></div></div><button class="btn btn-primary pos_re" type="button" onclick="removeCenterRow(this);"><span>Remove </span></button>';
        toDiv.appendChild(div);
        var divclear = document.createElement('div');
        divclear.className = 'clear';
        divclear.innerHTML = '&nbsp;';
        div.appendChild(divclear);
    }
	function removeCenterRow(input) {
    document.getElementById('CenterForm').removeChild( input.parentNode );
}
function savecat(val){
	
	
	if(val!=''){
		$.ajax({
			type: "POST",
			url: '<?php echo base_url(); ?>seller/sellercategories/savesubcat',
			data: {
			sub_cat_id:val
			},
			success:function(data)
			{
			

			}

		});
		
	}
}


function chose_own(){
  alert('hai');
}
</script>

    <script>
      $(function() {
        $('.chosen-select').chosen();
        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
      });
    </script>
