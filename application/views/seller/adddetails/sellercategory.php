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
    <div class="row setup-content">
      <div class="col-xs-12 ">
        <div class="col-md-12">
          <h3>Select Your Category</h3>
          <div class="field_wrapper nopaddingRight col-md-5 san-lg pos_r form-group" id="CenterForm" >
		
                 <select class="form-control"  id="seller_cat[]" name="seller_cat[]" onchange="categoryid(this.value);" required="required">
                    <option value="">Select Category</option>
                    <?php foreach($getcat as $cat_data){ ?>
                    <option value="<?php echo $cat_data['category_id']; ?>"><?php echo $cat_data['category_name']; ?></option>                  
                    <?php }?>
                  </select>
		</div>
			<div class="form-group">
						<input type="hidden" name="centerCount" id="centerCount" value="0" />
						<button class="btn btn-primary" type="button" onclick="addCenter();"><span>Add </span></button>
					</div>
      
     
	

			 
                </div>
		</form>
			<div class="col-md-6" style="padding-right:30px;">	
					 <a type="submit" class="btn btn-primary" href="<?php echo base_url('seller/adddetails'); ?>">Back</a>

				<input type="submit" class="btn btn-info pull-right" value="Next">
			</div>


        </div>
      </div>
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
