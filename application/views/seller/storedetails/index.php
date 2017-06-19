<!DOCTYPE html>
<html lang="en">
<head>


<style>
.process-step .btn:focus{outline:none}
.process{display:table;width:100%;position:relative}
.process-row{display:table-row}
.process-step button[disabled]{opacity:1 !important;filter: alpha(opacity=100) !important}
.process-row:before{top:40px;bottom:0;position:absolute;content:" ";width:100%;height:1px;background-color:#ccc;z-order:0}
.process-step{display:table-cell;text-align:center;position:relative}
.process-step p{margin-top:4px}
.btn-circle{width:80px;height:80px;text-align:center;font-size:12px;border-radius:50%}
#Hunter_clean_btn{display: none;}
</style>
<script>
  $().ready(function(e) {

    $('#timePicker').hunterTimePicker({
      callback: function(e){
        alert(e.val());
      }
    });
    
    $(".time-picker").hunterTimePicker();
  });
</script>

<script>
	$().ready(function(e) {

		$('#timePicker').hunterTimePicker({
			callback: function(e){
				alert(e.val());
			}
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
</head>
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
     <button type="button" class="btn  btn-success btn-circle" data-toggle="tab" href=""><i class="fa fa-info fa-3x"></i></button>
     <p><strong>Basic details</strong></p>
    </div>
    <div class="process-step">
     <button type="button" class="btn  btn-success btn-circle" data-toggle="tab" href="#"><i class="fa fa-file-text-o fa-3x"></i></button>
     <p><strong>Select your Category</strong></p>
    </div>
    <div class="process-step">
     <button type="button" class="btn btn-info btn-circle" data-toggle="tab" href="#" id="error_stepone"><i class="fa fa-image fa-3x"></i></button>
     <p class="text-default" id="error_p"><strong>Store details</strong></p>
    </div>
  <div class="process-step">
     <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu4"><i class="fa fa-image fa-3x" id="details"></i></button>
     <p><strong>Personal details</strong></p>
    </div>
    
   </div>
  </div>
  
 </div>
</div>
<div class="" style="margin-bottom:50px;">&nbsp;</div>
<div class="container" >
  <?php echo $this->session->flashdata('msg2'); ?>
  <form  action="<?php echo base_url(); ?>seller/storedetails/updatestoredetails" enctype="multipart/form-data" method="post" >
    <div class="row setup-content">
      <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
        
          <h3>Store Details</h3>
          <div class="form-group">
            <label class="control-label">Business Name</label>
            <input class="form-control" placeholder="Bussiness Name" type="text" id="business_name" name="business_name" required="required" >
          </div>
           <div class="form-group">
            <label class="control-label">Seller Location</label>
            <input maxlength="100" type="text" required="required" name="seller_location" class="form-control" placeholder="Enter Your Location" />
          </div>
          <div class="form-group">
            <label class="control-label">Other Shop Location</label>
            <input maxlength="100" type="text"  name="other_shop" class="form-control" placeholder="Other Shop Location(Optinal)" />
          </div>
          <div class="form-group">
            <label class="control-label">Number of outlets</label>
            <input maxlength="100" type="text"  name="out_lets" class="form-control" placeholder="Number of outlets(Optinal)" />
          </div>
			<div class="col-md-6" style="padding-left: 0px;">
			<div class="form-group" >
			   <label class="control-label">Shop Open timings </label>
                <div class='input-group time-picker' id=''>
                    <input type='text' class=" time-picker form-control" name="seller_open_time" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
            </div>
            </div>
			<div class="col-md-6" style="padding-right: 0px;">
			<div class="form-group">
			   <label class="control-label">Shop Close timings </label>
                <div class='input-group time-picker' id=''>
                    <input type='text' class=" time-picker form-control" name="seller_close_time" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
            </div>
            </div>
          <div class="form-group">
            <label class="control-label">Do you currently offer delivery on your own or via us?</label>
            <input maxlength="100" type="text"  name="delivery_own_us" class="form-control" placeholder="Number of outlets(Optinal)" />
          </div>                   
          <div class="form-group">
            <label class="control-label">Any Web Link</label>
            <input maxlength="100" type="text"  name="web_link" class="form-control" placeholder="Any Web Link(Optinal)" />
          </div>
          <div class="form-group">
            <label class="control-label">KYC documents of store</label>
            <input  type="file" class="form-control" name="report_file" />
          </div>

             <input type="submit" class="btn btn-primary pull-right " value="Next">
              </form>
        </div>
      </div>
    </div>
</div>
</html>
