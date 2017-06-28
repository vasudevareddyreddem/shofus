<!DOCTYPE html>
<html lang="en">

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
					Price (8 item)
				</div>
				<div class="pull-right">
					<i class="fa fa-inr" aria-hidden="true"></i>4800
				</div>
				
				<div class="clearfix"></div>
				<div class="mar_t20">
				<div class="pull-left">
					Delivery Charges
				</div>
				<div class="pull-right">
					<i class="fa fa-inr" aria-hidden="true"></i>84
				</div>
				</div>
				<div class="clearfix"></div>
				<hr>
				<div class="mar_t20">
				<div class="pull-left">
					<b>Amount Payable</b>
				</div>
				<div class="pull-right">
					<i class="fa fa-inr" aria-hidden="true"></i><b>4884</b>
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

                    <li role="presentation" class="active">
						 <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-shopping-cart"></i>
                            </span>
							
                        </a>
						<p class="text-center"><b>Check Cart</b> </p>
                    </li>  
					<li role="presentation" class="disabled" >
						   <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
							
                        </a>
						<p class="text-center"><b>Billing Address</b> </p>
                    </li>

                    <li role="presentation" class="disabled">
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

            <form role="form">
                <div class="tab-content">
				 
             <div class="tab-pane active " role="tabpanel" id="step1">
							 <div class="title"><span>Order Confirmation</span></div>
          <div class="table-responsive">
            <table class="table table-bordered table-cart">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Description</th>
                  <th>Quantity</th>
                  <th>Unit price</th>
                  <th>SubTotal</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="img-cart">
                    <a href="detail.html">
                      <img src="<?php echo base_url(); ?>assets/home/images/p1-small-1.jpg" class="img-thumbnail">
                    </a>
                  </td>
                  <td>
                    <p><a href="detail.html" class="d-block">WranglerGrey Printed Slim Fit Round Neck T-Shirt</a></p>
                    <small>Size : S</small>
                  </td>
                  <td class="input-qty"><input type="text" value="1" class="form-control text-center" /></td>
                  <td class="unit">$13.50</td>
                  <td class="sub">$13.50</td>
                  <td class="action">
                    <a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Update"><i class="fa fa-refresh"></i></a>&nbsp;
                    <a href="#" class="text-danger" data-toggle="tooltip" data-placement="top" data-original-title="Remove"><i class="fa fa-trash-o"></i></a>
                  </td>
                </tr>
                <tr>
                  <td class="img-cart">
                    <a href="detail.html">
                      <img src="<?php echo base_url(); ?>assets/home/images/p2-small-1.jpg" class="img-thumbnail">
                    </a>
                  </td>
                  <td>
                    <p><a href="detail.html" class="d-block">CelioKhaki Printed Round Neck T-Shirt</a></p>
                    <small>Size : M</small>
                  </td>
                  <td class="input-qty"><input type="text" value="1" class="form-control text-center" /></td>
                  <td class="unit">$13.50</td>
                  <td class="sub">$13.50</td>
                  <td class="action">
                    <a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Update"><i class="fa fa-refresh"></i></a>&nbsp;
                    <a href="#" class="text-danger" data-toggle="tooltip" data-placement="top" data-original-title="Remove"><i class="fa fa-trash-o"></i></a>
                  </td>
                </tr>
                <tr>
                  <td class="img-cart">
                    <a href="detail.html">
                     <img src="<?php echo base_url(); ?>assets/home/images/p3-small-1.jpg" class="img-thumbnail">
                    </a>
                  </td>
                  <td>
                    <p><a href="detail.html" class="d-block">CelioOff White Printed Round Neck T-Shirt</a></p>
                    <small>Size : L</small>
                  </td>
                  <td class="input-qty"><input type="text" value="1" class="form-control text-center" /></td>
                  <td class="unit">$13.50</td>
                  <td class="sub">$13.50</td>
                  <td class="action">
                    <a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Update"><i class="fa fa-refresh"></i></a>&nbsp;
                    <a href="#" class="text-danger" data-toggle="tooltip" data-placement="top" data-original-title="Remove"><i class="fa fa-trash-o"></i></a>
                  </td>
                </tr>
                <tr>
                  <td class="img-cart">
                    <a href="detail.html">
                      <img src="<?php echo base_url(); ?>assets/home/images/p4-small-1.jpg" class="img-thumbnail">
                    </a>
                  </td>
                  <td>
                    <p><a href="detail.html" class="d-block">Levi'sNavy Blue Printed Round Neck T-Shirt</a></p>
                    <small>Size : XL</small>
                  </td>
                  <td class="input-qty"><input type="text" value="1" class="form-control text-center" /></td>
                  <td class="unit">$13.50</td>
                  <td class="sub">$13.50</td>
                  <td class="action">
                    <a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Update"><i class="fa fa-refresh"></i></a>&nbsp;
                    <a href="#" class="text-danger" data-toggle="tooltip" data-placement="top" data-original-title="Remove"><i class="fa fa-trash-o"></i></a>
                  </td>
                </tr>
                <tr>
                  <td colspan="4" class="text-right">Total</td>
                  <td colspan="2"><b>$54.00</b></td>
                </tr>
              </tbody>
            </table>
          </div>
          <nav aria-label="Shopping Cart Next Navigation">
            <ul class="pager">
              <li class="previous"><a href="products.html"><span aria-hidden="true">&larr;</span> Continue Shopping</a></li>
              <li class="next"><a href="checkout.html">Proceed to Checkout <span aria-hidden="true">&rarr;</span></a></li>
            </ul>
          </nav>
					<div class="clearfix"></div>
					 <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-primary next-step">next</button></li>
                        </ul> 
						
                    </div>
					<div class="tab-pane " role="tabpanel" id="step2">
				<div class=" col-md-10 col-md-offset-1">
					<div class="title"><span> Billing Address</span></div>
						<form >
							<div class="form-group">
							  <label>Name:</label>
							  <input type="text" class="form-control"  placeholder="Enter Name" >
							</div>
							<div class="form-group">
							  <label >Mobile:</label>
							  <input type="text" class="form-control" placeholder="Enter Mobile" >
							</div>
							<div class="form-group">
							  <label for="sel1">Select list:</label>
							  <select class="form-control" id="sel1">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
							  </select>
							</div>
							<div class="form-group">
							  <label >Address 1:</label>
							  <textarea class="form-control" rows="3"></textarea>
							</div>
							<div class="form-group">
							  <label >Address 2:</label>
							  <textarea class="form-control" rows="3"></textarea>
							</div>
							
							
						</form>
						
					<div class="clearfix"></div>
					 <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-primary next-step">next</button></li>
                        </ul>
                       
				 </div>
				 </div>
                    <div class="tab-pane" role="tabpanel" id="step3">
						<div class="container">
						<div class="row">
						<div class="col-md-8">
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingOne">
									 <h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										  HDFC Bank Creadit Card
										</a>
									  </h4>

								</div>
								<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
									<div class="panel-body">
									<h4 class="site_col">Complete your payment using</h4>
										<div class="mar_l20 row">
											<div class="radio"><label><input type="radio" name="radio-product" checked="checked"><span> verify with OTP</span></label></div>
											<div class="radio"><label><input type="radio" name="radio-product"><span>verify with Secure Password</span></label></div>
												<div class="clearfix"></div>
											<div class="col-md-2">
												<input class="form-control" type="text" placeholder="CVV">
											</div>
											<div class="col-md-2 ">
												 <button type="submit" class="btn btn-primary">PAY <i class="fa fa-inr" aria-hidden="true"></i>500</button>
											</div>
										</div>	
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingTwo">
									 <h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								   Wallet
								</a>
							  </h4>

								</div>
								<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
									<div class="panel-body"><p>You'll be redirected to PhonePe page, where you can pay using UPI, credit/debit card or any other VPA.</p>
									<button type="submit " class="btn btn-primary pull-right">CONTINUE</button>
									</div>
									
									<br>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingThree">
									 <h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								  Credit / Debit / ATM Card
								</a>
							  </h4>

								</div>
								<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
									<div class="panel-body">
										<form class="form-horizontal" role="form">
											<fieldset >
											  <legend>Payment</legend>
											  <div class="form-group ">
												<label class="col-sm-3 control-label inpu_pad" for="card-holder-name">Name on Card</label>
												<div class="col-sm-9 inpu_pad">
												  <input type="text" class="form-control" name="card-holder-name" id="card-holder-name" placeholder="Card Holder's Name">
												</div>
											  </div>
											  
											  <div class="form-group">
												<label class="col-sm-3  inpu_pad control-label" for="card-number">Card Number</label>
												<div class="col-sm-9 inpu_pad">
												  <input type="text" class="form-control" name="card-number" id="card-number" placeholder="Debit/Credit Card Number">
												</div>
											  </div>
											  <div class="form-group">
												<label class="col-sm-3 inpu_pad control-label" for="expiry-month">Expiration Date</label>
												<div class="col-sm-9 inpu_pad">
												  <div class="row">
													<div class="col-xs-3 ">
													  <select class="form-control col-sm-2" name="expiry-month" id="expiry-month">
														<option>Month</option>
														<option value="01">Jan (01)</option>
														<option value="02">Feb (02)</option>
														<option value="03">Mar (03)</option>
														<option value="04">Apr (04)</option>
														<option value="05">May (05)</option>
														<option value="06">June (06)</option>
														<option value="07">July (07)</option>
														<option value="08">Aug (08)</option>
														<option value="09">Sep (09)</option>
														<option value="10">Oct (10)</option>
														<option value="11">Nov (11)</option>
														<option value="12">Dec (12)</option>
													  </select>
													</div>
													<div class="col-xs-3">
													  <select class="form-control" name="expiry-year">
														<option value="13">2013</option>
														<option value="14">2014</option>
														<option value="15">2015</option>
														<option value="16">2016</option>
														<option value="17">2017</option>
														<option value="18">2018</option>
														<option value="19">2019</option>
														<option value="20">2020</option>
														<option value="21">2021</option>
														<option value="22">2022</option>
														<option value="23">2023</option>
													  </select>
													</div>
												  </div>
												</div>
											  </div>
											  <div class="form-group">
												<label class="col-sm-3 control-label inpu_pad" for="cvv">Card CVV</label>
												<div class="col-sm-3 inpu_pad">
												  <input type="text" class="form-control" name="cvv" id="cvv" placeholder="Security Code">
												</div>
											  </div>
											  <div class="clearfix"></div>
											  <div class="form-group ">
												<div class=" inpu_pad">
												  <button type="button" class="btn btn-primary pull-right">Pay Now</button>
												</div>
											  </div>
											</fieldset>
										</form>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingFour">
									 <h4 class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
								  Net Banking
								</a>
							  </h4>

								</div>
								<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
									<div class="panel-body">
										<h4 class="site_co">Popular Banks</h4>
											<div class="row">
												<div class="col-sm-3">
													<div class="radio">
														<label>
															<input type="radio" name="radio-product" checked="checked"><span><span><img src="<?php echo base_url(); ?>assets/home/images/axis.png" /> </span>Axis Bank</span>
														</label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="radio">
														<label>
															<input type="radio" name="radio-product" checked="checked"><span><span><img src="<?php echo base_url(); ?>assets/home/images/sbi.png" /> </span>State Bank of India</span>
														</label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="radio">
													<label>
														<input type="radio" name="radio-product" checked="checked"><span><span><img src="<?php echo base_url(); ?>assets/home/images/hdfc.png" /> </span>HDFC Bank</span>
													</label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="radio">
														<label>
															<input type="radio" name="radio-product" checked="checked"><span><span><img src="<?php echo base_url(); ?>assets/home/images/icic.png" /> </span> ICICI Bank</span>
														</label>
													</div>
												</div>
											</div>
												<div class="clearfix"></div>
												<div class="row">
												<h4 class="site_col pad_l15">Other Banks</h4>
												<div class=" col-md-5 ">
												<div class="form-group">
												<label for="bank">Bank name</i></label>
													<select type="text" class="form-control " id="bank">
													<option selected>Choose</option>
													<option value="access">Access Bank</option>
													<option value="citibank">Citibank</option>
													<option value="diamond">Diamond Bank</option>
													<option value="ecobank">Ecobank</option>
													<option value="fidelity">Fidelity Bank</option>
													<option value="fcmb">First City Monument Bank (FCMB)</option>
													<option value="fsdh">FSDH Merchant Bank</option>
													<option value="gtb">Guarantee Trust Bank (GTB)</option>
													<option value="heritage">Heritage Bank</option>
													<option value="Keystone">Keystone Bank</option>
													<option value="rand">Rand Merchant Bank</option>
													<option value="skye">Skye Bank</option>
													<option value="stanbic">Stanbic IBTC Bank</option>
													<option value="standard">Standard Chartered Bank</option>
													<option value="sterling">Sterling Bank</option>
													<option value="suntrust">Suntrust Bank</option>
													<option value="union">Union Bank</option>
													<option value="uba">United Bank for Africa (UBA)</option>
													<option value="unity">Unity Bank</option>
													<option value="wema">Wema Bank</option>
													<option value="zenith">Zenith Bank</option>
													</select>
													</div>
												</div>
											</div>
											
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingFive">
									<h4 class="panel-title">
									<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
									  Cash on Delivery
									</a>
									</h4>
								</div>
								<div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
									<div class="panel-body">
										<h4 class="site_col"> Order Confirmation</h4>
										<div class="checkbox">
											<label>
												<input type="checkbox" value="">
												
													Please Click here to Confirm your Order 
											</label>
											<br>
											<button type="button" class="btn btn-primary pull-right">Confirm Order</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						</div>
						</div>
						</div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-primary next-step">next</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step4">
						<div class="row">
							<div class="col-md-6">
								<h3 class="site_co">Thanks for Shoping </h3>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>
							</div>
							<div class="col-md-6">
								<div class="table-responsive">
								<table class="table table-bordered table-cart">
								  <thead>
									<tr>
									  <th>Product</th>
									  <th>Description</th>
									  <th>Status</th>
									  <th>Price</th>
									  <th>Action</th>
									</tr>
								  </thead>
								  <tbody>
									<tr>
									  <td class="img-cart">
										<a href="detail.html">
										  <img src="<?php echo base_url(); ?>assets/home/images/p1-small-1.jpg" class="img-thumbnail">
										</a>
									  </td>
									  <td>
										<p><a href="detail.html" class="d-block">WranglerGrey Printed Slim Fit Round Neck T-Shirt</a></p>
										<small>Size : S</small>
									  </td>
									  <td class="input-qty">Confirmed</td>
									 
									  <td class="sub">$13.50</td>
									  <td class="action">
										<a>&nbsp;</a>&nbsp;
										<a href="#" class="text-danger" data-toggle="tooltip" data-placement="top" data-original-title="Cancel"><i class="fa fa-trash-o"></i></a>
									  </td>
									</tr>
									
									
									<tr>
									  <td colspan="4" class="text-right">Total</td>
									  <td colspan="2"><b>$54.00</b></td>
									</tr>
								  </tbody>
								</table>
							  </div>
							</div>
							<div class="clearfix"></div>
							
						</div>
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </section>
	   </div>
	   </div>
	   </div>
	   
	   </div>
	   </div>
	</div>
	

<script>
	$(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}
</script>


		

<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/js/common.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/js/owl.carousel.min.js"></script> 

<!-- the overlay element --> 

<script src="<?php echo base_url(); ?>assets/home/js/classie.js"></script> 
<script src="<?php echo base_url(); ?>assets/home/js/modalEffects.js"></script> 

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>

 