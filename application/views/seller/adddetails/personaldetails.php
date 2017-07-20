
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
     <button type="button" class="btn btn-success btn-circle" data-toggle="tab" href="#menu3"><i class="fa fa-image fa-3x"></i></button>
     <p><strong>Store details</strong></p>
    </div>
  <div class="process-step">
     <button type="button" class="btn-info btn btn-circle" data-toggle="tab" href="#menu4"><i class="fa fa-image fa-3x"></i></button>
     <p><strong>Personal details</strong></p>
    </div>
    
   </div>
  </div>
 </div>
</div>
<div class="" style="margin-bottom:50px;">&nbsp;</div>
<div class="container" >
  <?php echo $this->session->flashdata('msg2'); ?>
  <?php //echo '<pre>';print_r($sellerdata);exit; ?>
  <form id="personalidetails" name="personalidetails" action="<?php echo base_url('seller/adddetails/updatepersonaldetails'); ?>" method="post" >
    <div class="row setup-content">
      <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
          <h3>Personal Details</h3>
          <div class="form-group">
            <label class="control-label">Bank Account</label>
            <input class="form-control" maxlength="16" placeholder="Enter your Bank Account Number" type="text" id="bank_account" name="bank_account" value="<?php echo isset($sellerdata['seller_bank_account'])?$sellerdata['seller_bank_account']:''; ?>">
          </div>         
          <div class="form-group">
            <label class="control-label">Bank Account Name</label>
            <input maxlength="100" type="text" maxlength="12" placeholder="Enter your Bank Account Name" id="account_name" name="account_name" class="form-control"  value="<?php echo isset($sellerdata['seller_account_name'])?$sellerdata['seller_account_name']:''; ?>" />
          </div>
          <div class="form-group">
            <label class="control-label">Bank Account IFSC Code</label>
            <input maxlength="100" type="text" placeholder="Enter your Bank Account IFSCcode"  name="ifsccode" class="form-control" id="ifsccode"  value="<?php echo isset($sellerdata['seller_aaccount_ifsc_code'])?$sellerdata['seller_aaccount_ifsc_code']:''; ?>" />
          </div>
			<div class="" style="padding-right:40px;margin-top:20px;">  
			<a type="submit" class="btn btn-primary" href="<?php echo base_url('seller/storedetails'); ?>">Back</a>
      <a type="submit" class="btn btn-primary" href="<?php echo base_url('seller/adddetails/setpassword'); ?>">Skip This Step</a>
			<!-- <input id="bnt" type="submit" class="btn btn-info " value="Skip"> -->
			<input id="bnt" type="submit" class="btn btn-info pull-right" value="Next">
			</div>
      </div>
      </div>
      </div>
      </form>
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
    $('#personalidetails').bootstrapValidator({
       
        fields: {
			bank_account:
          {
            validators: 
            {
					    notEmpty: 
              {
						    message: 'Bank Account is required'
					    },
              regexp: 
              {
					     regexp:  /^[0-9]{9,16}$/,
					     message:'Bank Account  must be 9 to 16 digits'
					    }
            }
          },
         account_name: {
          validators: {
					notEmpty: {
						message: 'Account Name is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Account Name can only consist of alphanumaric, space and dot'
					}
				}
        }, 
		ifsccode: {
          validators: {
					notEmpty: {
						message: 'IFCS Code is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'IFCS Code can only consist of alphanumaric, space and dot'
					}
				}
        }

	   
		
        }
    });
});
</script> 
		
