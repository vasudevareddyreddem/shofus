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
</style>
<div class="navigation_main">
    <nav class="navbar navbar-inverse hm_nav">
      <div class="">
        <div class="navbar-header logo_style" >
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="#">
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
  <form  action="<?php echo base_url('seller/adddetails/updateseeler_details'); ?>" method="post" >
    <div class="row setup-content">
      <div class="col-xs-12 ">
        <div class="col-md-12">
          <h3>Select Your Category</h3>
         
			<div id="test">	</div>	
      
           </div>

             <input type="submit" class="btn btn-primary " value="Next">
              </form>
        </div>
      </div>
    </div>
</div>
</html>
 <link title="defaut" type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/demo/css/jquery.multiSelect.css" media="screen">
<link href="<?php echo base_url(); ?>assets/demo/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/demo/js/jquery.multiSelect.min.js"></script>
 <?php foreach($getcat as $cat_data){ 

$data[]=$cat_data['category_name'];
 }
 //$details=explode('');
$details= json_encode($data);


 ?>      
	   <script type="text/javascript">
            $("#test").multiSelect({
                title: "Categories",
                elements: <?php echo $details; ?>
            });
        </script>

<script>

function addCenter() 
    {
		var cCount = document.getElementById('centerCount').value;
        var val = Number(cCount) + 1;
        document.getElementById('centerCount').value= val;
        //alert(val);
        var toDiv = document.getElementById("CenterForm");
        var div = document.createElement('div');
        div.id = 'mainForms'+val;
        div.innerHTML = '<div class="form-group" id="CenterForm"><div class="field_wrapper nopaddingRight col-md-5 san-lg pos_r" data-plugin="inputGroupFile"><select class="form-control"  id="category_id" name="seller_cat[]" required="required"><option value="">Select Category</option><?php foreach($getcat as $cat_data){ ?><option value="<?php echo $cat_data['category_id']; ?>"><?php echo $cat_data['category_name']; ?></option><?php }?></select></div></div><button class="btn btn-primary" type="button" onclick="removeCenterRow(this);"><span>Remove File</span></button>';
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
