<!DOCTYPE html>
<html lang="en">
<?php
// Merchant key here as provided by Payu
$MERCHANT_KEY = "gtKFFx"; //Please change this value with live key for production
   $hash_string = '';
// Merchant Salt as provided by Payu
$SALT = "eCwWELxi"; //Please change this value with live salt for production

// End point - change to https://secure.payu.in for LIVE mode

$PAYU_BASE_URL = "https://test.payu.in";

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
   // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
         
  ) {
    $formError = 1;
  } else {
    
	$hashVarsSeq = explode('|', $hashSequence);
 
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;
	echo '<pre>';print_r($hash_string);exit;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
<html>
  <head>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
	  alert();return false;
      payuForm.submit();
    }
  </script>
  </head>
<style>
.panel-title > a:before {
    float: left !important;
    font-family: FontAwesome;
    content:"\f1db";
    padding-right: 5px;
}

.panel-title > a:hover, 
.panel-title > a:active, 
.panel-title > a:focus  {
    text-decoration:none;
}
</style>

<div class="" style="margin-top:150px;">
	
</div>
<body >
<div class="pad_bod">
		<div class="row">
		<div class="col-md-3" style="position: fixed;">
		<div class="panel panel-primary">
			<div class="panel-heading ">Price details</div>
			<div class="panel-body">
				<div class="pull-left">
					Price (<?php if(count($carttotal_amount['itemcount']) >0){  echo $carttotal_amount['itemcount'].'  '.'items';}else{  echo "item";  }?>)
				</div>
				<div class="pull-right">
					<i class="fa fa-inr" aria-hidden="true"></i><?php echo isset($carttotal_amount['pricetotalvalue'])?$carttotal_amount['pricetotalvalue']:''; ?>
				</div>
				
				<div class="clearfix"></div>
				<div class="mar_t20">
				<div class="pull-left">
					Delivery Charges
				</div>
				<div class="pull-right">
					<i class="fa fa-inr" aria-hidden="true"></i><?php echo isset($carttotal_amount['delivertamount'])?$carttotal_amount['delivertamount']:''; ?>
				</div>
				</div>
				<div class="clearfix"></div>
				<hr>
				<div class="mar_t20">
				<div class="pull-left">
					<b>Amount Payable</b>
				</div>
				<div class="pull-right">
					<i class="fa fa-inr" aria-hidden="true"></i><b>
				<?php 	$totalpayamount=$carttotal_amount['pricetotalvalue'] + $carttotal_amount['delivertamount'];
					echo $totalpayamount;
				?>
				</b>
				</div>
				</div>
				
			</div>
		</div>
		</div>
		
		<div class="col-md-offset-3 col-md-8 col-md-offset-right-1">
		<div class="panel panel-primary">
			<div class="panel-heading ">Payment</div>
			<div class="panel-body">
			<section>
        <div class="wizard">
           
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation">
						 <a href="<?php echo base_url('customer/cart'); ?>" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-shopping-cart"></i>
                            </span>
							
                        </a>
						<p class="text-center"><b>Check Cart</b> </p>
                    </li>  
					<li role="presentation" class="" >
						   <a href="<?php echo base_url('customer/billing'); ?>" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
							
                        </a>
						<p class="text-center"><b>Billing Address</b> </p>
                    </li>

                    <li role="presentation" class="active">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-credit-card"></i>
                            </span>
                        </a>
						<p class="text-center"><b>Payment mode </b></p>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab" title="Step 4">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
						<p class="text-center"><b>Thanks for Shopping </b></p>
                    </li>
                </ul>
            </div>

         
			<div class="tab-content">
					<div class="title"><span>Billing Address</span></div>
					 <?php if($this->session->flashdata('paymenterror')): ?>
						<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button><?php echo $this->session->flashdata('paymenterror');?></div>
			<?php endif; ?>
						<div class="container">
						<div class="row">
						<form action="https://test.payu.in/_payment/" method="POST" >
						<input type="hidden" name="key" value="<?php echo $this->config->item('MERCHANTKEY'); ?>" />
						<input type="hidden" name="salt" value="<?php echo $this->config->item('salt'); ?>" />
						<input type="hidden" name="url" value="<?php echo $this->config->item('paymentbaseurl'); ?>" />
						<input type="hidden" name="txnid" value="<?php echo $txnid; ?>" >
						<input type="hidden" name="hash" value="<?php echo $hashvalue; ?>"/>
						<input type="hidden" name="surl" value="<?php echo $this->config->item('paymentbaseurl'); ?>" />   <!--Please change this parameter value with your success page absolute url like http://mywebsite.com/response.php. -->
						<input type="hidden" name="furl" value="<?php echo $this->config->item('paymentbaseurl'); ?>" /><!--Please change this parameter value with your failure page absolute url like http://mywebsite.com/response.php. -->
						<input type="hidden" name="amount" value="<?php echo $carttotal_amount['pricetotalvalue']; ?>" />
						<input type="hidden" name="firstname" id="firstname" value="<?php echo $billimgdetails['name']; ?>" />
						<input name="email" type="hidden" id="email" value="<?php echo $emailid; ?>" /></td>
						<input name="phone" type="hidden" value="<?php echo $billimgdetails['mobile']; ?>" /></td>
						<input type="hidden" name="productinfo" value="<?php echo $productinfo; ?>">

						<input type="radio" name="paymentmode" value="0" >Cash on Delivery<br>
						<input type="radio" name="paymentmode" value="1"> Female<br>
						<input type="radio" name="paymentmode" value="2"> Other 
						<button type="submit">Pay</button>
						
						</form>
						</div>
                       
                    
    </section>
	
	   </div>
	   </div>
	   
	   </div>
	   </div>
	</div>
	

<script>

	$(document).ready(function() {
    $('#billingaddress').bootstrapValidator({
       
        fields: {
            
             name: {
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
			mobile: {
              validators: {
					 notEmpty: {
						message: 'Mobile Number is required'
					},
                    regexp: {
					regexp:  /^[0-9]{10}$/,
					message:'Mobile Number must be 10 to 14 digits'
					}
                }
            },
			area: {
              validators: {
					notEmpty: {
						message: 'Please select an area'
					}
                }
            },
			address1: {
				validators: {
					notEmpty: {
						message: 'Address1 is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message: 'Address1 wont allow <> [] = % '
					}
				
				}
			},
			address2: {
				validators: {
					
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message: 'Address2 wont allow <> [] = % '
					}
				
				}
			}
			
			
        }
    });
});
</script>

 