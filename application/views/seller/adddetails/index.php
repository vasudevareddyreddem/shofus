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
#mask {
  position: absolute;
  left: 0;
  top: 0;
  z-index: 9000;
  background-color: #000;
  display: none;
}

#boxes .window {
  position: absolute;
  left: 0;
  top: 0;
  width: 440px;
  height: 200px;
  display: none;
  z-index: 9999;
  border-radius: 15px;

}

#boxes #dialog {
  width: 750px;
  height: 300px;
   background-color: #fff;
  font-family: 'Segoe UI Light', sans-serif;
  font-size: 15pt;
  padding:0px 15px;
  margin:0 auto;
  color:#000;
}

#popupfoot {
  font-size: 16pt;
  position: absolute;
  bottom: 0px;
  width: 250px;
  left: 250px;
}
</style>
    

<script type="text/javascript">
  $(document).ready(function(){
    $("#details").click(function(){
        $("#error_stepone").addClass("btn-danger");
        $("#error_p").addClass("text-danger"); 
        $("#error_stepone").removeClass("btn-info");       
    });
});
</script><script type="text/javascript">
  $(document).ready(function() {  

var id = '#dialog';
  
//Get the screen height and width
var maskHeight = $(document).height();
var maskWidth = $(window).width();
  
//Set heigth and width to mask to fill up the whole screen
$('#mask').css({'width':maskWidth,'height':maskHeight});

//transition effect
$('#mask').fadeIn(500); 
$('#mask').fadeTo("slow",0.6);  
  
//Get the window height and width
var winH = $(window).height();
var winW = $(window).width();
              
//Set the popup window to center
$(id).css('top',  winH/2-$(id).height()/2);
$(id).css('left', winW/2-$(id).width()/2);
  
//transition effect
$(id).fadeIn(2000);   
  
//if close button is clicked
$('.window .close').click(function (e) {
//Cancel the link behavior
e.preventDefault();

$('#mask').hide();
$('.window').hide();
});

//if mask is clicked
$('#mask').click(function () {
$(this).hide();
$('.window').hide();
});
  
});
</script>
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
    <div class="process-step" >
     <button type="button" class="btn  btn-info btn-circle" data-toggle="tab" href="#menu1" id="error_stepone"><i class="fa fa-info fa-3x" ></i></button>
     <p class="text-default" id="error_p"><strong>Basic details</strong></p>
    </div>
    <div class="process-step" id="details">
     <button type="button" class="btn  btn-default btn-circle" data-toggle="tab" href="#menu2"><i class="fa fa-file-text-o fa-3x" id="details"></i></button>
     <p><strong>Select your Category</strong></p>
    </div>
    <div class="process-step">
     <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu3"><i class="fa fa-image fa-3x"></i></button>
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
<div class="container " >
  <?php echo $this->session->flashdata('msg2'); ?>
  <?php if($this->session->flashdata('error')): ?>
				<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button><?php echo $this->session->flashdata('error');?></div>
				<?php endif; ?>
				
				<?php //echo '<pre>';print_r($sellerdata);exit; ?>
  <form  id="basicdetails" name="basicdetails" action="<?php echo base_url('seller/adddetails/updatebasicdetails'); ?>" method="post" >
    <div class="row setup-content">
      <div class="col-xs-6 col-md-offset-3 well">
        <div class="col-md-12">
          <h3>Basic Details</h3><br>
          <div class="form-group">
            <label class="control-label">Name</label>
            <input class="form-control" placeholder="Name" type="text" id="seller_name" name="seller_name" value="<?php echo isset($sellerdata['seller_name'])?$sellerdata['seller_name']:''; ?>" >
          </div>
          <div class="form-group">
            <label class="control-label">Email address</label>
			<?php if(isset($sellerdata['seller_email']) && $sellerdata['seller_email']!=''){?>
			            <input class="form-control" placeholder="Email Address"  type="Email" id="seller_email" name="seller_email" value="<?php echo isset($sellerdata['seller_email'])?$sellerdata['seller_email']:''; ?>">
			<?php }else{ ?>
            <input class="form-control" placeholder="Email Address" type="Email" id="seller_email" name="seller_email" value="<?php echo isset($sellerdata['seller_email'])?$sellerdata['seller_email']:''; ?>">
			<?php }?>
          </div>

             <input id="butt" button type="submit" class="btn btn-primary pull-right" ></button>
              </form>
        </div>
      </div>
    </div>
</div>
<div class="clear-fix mar_t10" ></div>



<div id="boxes">
  <div id="dialog" class="window">
  	<div class="row">
			<h2 class="text-center border_head">Checklist Documents </h2>
			</div>
		
		<div class="row">
		<div class="col-md-6" style="border-right:1px solid #ddd;">
			<ul class="doc_list" >
				<li>Adhar Card</li>
				<li>Personal PAN Card</li>
				<li>Company PAN Card</li>
				<li>TIN / TAN / VAT</li>
				<li>GSTIN</li>
				<li>Bank Account Details</li>
				<li>Shop licence number</li>
				<li>Business Details</li>
			</ul>
		</div>
		<div class="col-md-6">
			<img   class="img-responsive thumbnail" src="<?php echo base_url();?>assets/seller_login/images/inv_m.png" />
		</div>
  </div>
  </div>
  <div id="mask"></div>
</div>

<footer class="foot_add_d">
    <div class="container">
      <div class="row">
                <strong>Copyright &copy; 2016-2017 Cartinhour.</strong> All rights reserved.
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
    $('#basicdetails').bootstrapValidator({
       
        fields: {
			seller_name: {
              validators: {
					notEmpty: {
						message: 'Name is required'
					},
                   regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Name can only consist of alphanumaric, space and dot'
					}
                }
            },
            seller_email: {
               validators: {
				notEmpty: {
					message: 'Email is required'
				},
				regexp: {
				regexp: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
				message: 'Please enter a valid email address. For example johndoe@domain.com.'
				}
            
			}
            }
            
		
        }
    });
});
</script>
		


