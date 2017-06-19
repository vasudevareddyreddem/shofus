<style>
    .add_button {
        border: 0 none;
        left: 440px;
        margin-left: 10px;
        margin-top: 10px;
        position: relative;
        top: -28px;
        vertical-align: text-bottom;
    }
    .remove_button {
        border: 0 none;
        left: 440px;
        margin-left: 10px;
        margin-top: 10px;
        position: relative;
        top: -26px;
        vertical-align: text-bottom;
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div> <div class="clearfix"><div class="field_wrapper nopaddingRight col-md-13 san-lg" ><input type="file" class="form-control" name="report_file[]" value=""/><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="<?php echo site_url(); ?>assets/seller_admin/images/remove-icon.png"/></a></div></div></div>'; //New input field html 
        var x = 1; //Initial field counter is 1
        $(addButton).click(function() { //Once add button is clicked
            if (x < maxField) { //Check maximum number of input fields
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); // Add field html
            }
        });
        $(wrapper).on('click', '.remove_button', function(e) { //Once remove button is clicked
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
</script>
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrapValidator.css"/>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/bootstrapValidator.js"></script>
<div class="content-wrapper mar_t_con">

    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <form action="#" method="get" class="sidebar-form search-box pull-right hidden-md hidden-lg hidden-sm">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
						<button type="submit" name="search" id="search-btn" class="btn"><i class="fa fa-search"></i></button>
					</span>
                </div>
            </form>
            <h1>Update</h1>
            <small>Update Your Details</small>
            <ol class="breadcrumb hidden-xs">
                <li><a href="<?php echo base_url('seller/dashboard');?>"><i class="pe-7s-home"></i> Home</a>
                </li>
                <li class="active">Update Your Details</li>
            </ol>
        </div>
    </section>
    <!--body start here -->
    <div class="faq_main">
	
	      
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-10 m-b-20">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs">
				<li class="active"><a href="#tab1" data-toggle="tab">Basic details</a></li>
				<li><a href="#tab2" data-toggle="tab">your Category</a></li>
				<li ><a href="#tab3" data-toggle="tab">Store details</a></li>
				<li><a href="#tab4" data-toggle="tab">Personal details</a></li>
			</ul>
			<!-- Tab panels -->
			<div class="tab-content">
				<div class="tab-pane fade in active" id="tab1">
					  <section class="panel">
								<?php if($this->session->flashdata('updatemessage')): ?>
								<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button><?php echo $this->session->flashdata('updatemessage');?></div>
								<?php endif; ?>
                                                <div class="panel-body">
                                                    <form  id="basicdetails" name="basicdetails" action="<?php echo base_url('seller/personnel_details/updatebd'); ?>" method="post" enctype="multipart/form-data">
                                                        <div class="form-group nopaddingRight col-md-6 san-lg">
                                                            <label for="exampleInputEmail1">Seller Name</label>
                                                            <input class="form-control" placeholder="Name" type="text" id="seller_name" name="seller_name" value="<?php echo $seller_storedetails['seller_name'];   ?>">
                                                        </div>
                                                        <div class="form-group nopaddingRight col-md-6 san-lg">
                                                            <label for="exampleInputEmail1">Seller Email</label>
                                                            <input class="form-control" placeholder="Email" type="text" id="seller_email" name="seller_email" value="<?php echo $seller_storedetails['seller_email']   ?>">
                                                        </div>
                                                        <div class="form-group nopaddingRight col-md-6 san-lg">
                                                            <label for="exampleInputEmail1">Seller Address</label>
                                                            <input class="form-control" placeholder="Type of Category" type="text" id="seller_address" name="seller_address" value="<?php echo $seller_storedetails['seller_address'];   ?>">
                                                        </div> <div class="clearfix"></div>

                                                        <div style="margin-top: 20px; margin-left: 15px;">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                     
                                                    </form> 
													<a type="submit" class="btn btn-danger" href="<?php echo base_url('seller/personnel_details'); ?>">Cancel</a>
												</div>
                                                </div>
                                            </section>
				</div>
				<div class="tab-pane fade" id="tab2">
					tab2
				</div>
				<div class="tab-pane fade" id="tab3">
					 <section class="panel">
								<?php if($this->session->flashdata('updatemessage')): ?>
								<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button><?php echo $this->session->flashdata('updatemessage');?></div>
								<?php endif; ?>
                                                <div class="panel-body">
                                                    <form id="personalidetails"  name="personalidetails" action="<?php echo base_url('seller/personnel_details/personal_details_updatebd'); ?>" method="post" enctype="multipart/form-data">
														<div class="form-group nopaddingRight col-md-6 san-lg">
														<label class="control-label">Your Store Name (Which displays on our website)</label>
														<input  type="text" class="form-control" name="storename" id="storename" value="<?php echo $seller_storedetails['store_name'];   ?>" class="storename">
														</div>
														<div class="form-group nopaddingRight col-md-6 san-lg">
														<label class="control-label">Address Line 1</label>
														<input  type="text"  name="address1" id="address1" value="<?php echo $seller_storedetails['addrees1'];   ?>" class="form-control" />
														</div>


														<div class="form-group nopaddingRight col-md-6 san-lg">
														<label class="control-label">Address Line 2</label>
														<input  type="text"  name="address2" id="address2" value="<?php echo $seller_storedetails['addrees2'];   ?>" class="form-control" />
														</div>
														<div class="form-group nopaddingRight col-md-6 san-lg">
														<label class="control-label">Pincode</label>
														<input  type="text"  name="pincode" id="pincode"  value="<?php echo $seller_storedetails['pin_code'];   ?>" class="form-control" />
														</div>
														<div class="form-group nopaddingRight col-md-6 san-lg">
														<label class="control-label">Other Shops (if any): </label>
														<input  type="text"  name="other_shops" id="other_shops" value="<?php echo $seller_storedetails['other_shops'];   ?>"  class="form-control"  />
														</div>
														<div class="form-group nopaddingRight col-md-6 san-lg">
														<label class="control-label">Other Shop Locations</label>
														<input  type="text"  name="other_shops_location" id="other_shops_location" value="<?php echo $seller_storedetails['other_shops_location'];   ?>"  class="form-control"  />
														</div>
														<div class="form-group nopaddingRight col-md-6 san-lg">
														<label class="control-label">Delivery service on your Own ?</label>
														<select class="form-control" required="required" name ="deliveryes" id ="deliveryes">
														<option value=""></option>
														<?php if($seller_storedetails['deliveryes']=="1") {?>
														<option value="1" selected>YES</option>	
														<?php }else{ ?>
														<option value="1">YES</option>
														<?php } ?>
														<?php if($seller_storedetails['deliveryes']=="0") {?> 
														<option value="0" selected>No</option>	
														<?php }else{ ?>
														<option value="0">No</option>	
														<?php } ?>
														</select>
														</div>
														<div class="form-group nopaddingRight col-md-6 san-lg">
														
														<label class="control-label">Any web link </label>
														<input type="text" id="weblink"  name="weblink" value="<?php echo $seller_storedetails['weblink'];   ?>"  class="form-control"/>
														</div>
														<div class="form-group nopaddingRight col-md-6 san-lg">
															<label class="control-label">TIN / VAT</label>
															<input type="text"  name="edittin" id="edittin"  value="<?php echo $seller_storedetails['tin_vat'];   ?>"  class="form-control" />
															<input type="file" title="Upload" name="edittinvat" onchange="tinvateditimage();" id="tineditimage" class="form-control" />
															<a onclick="tinhideimage();" href="javascript:void(0)" >Replace</a>
															<span id="edittinvatimage"></span>
															<span id="oldtinvatimages">
															<a id="oldtanimage" target="_blank" href="<?php echo site_url('assets/sellerfile/'); ?><?php echo $seller_storedetails['tinvatimage'];?>" ><?php echo $seller_storedetails['tinvatimage'];?></a></span>
														</div>	
														<div class="form-group nopaddingRight col-md-6 san-lg">
															<label class="control-label">Tan </label>
															<input  type="text"  name="tan" id="tan" value="<?php echo $seller_storedetails['tan'];   ?>" class="form-control"/>
															<input type="file" name="tanimages" id="tanimages" onchange="tanimageuload(this.value)">
															<a onclick="deactive1();" href="javascript:void(0)" >Replace</a>
															<span id="tanimgs"></span>
															<span style="color:red" id="tanimgserror"></span>
															<span id="oldtanimg"><a target="_blank" href="<?php echo site_url('assets/sellerfile/'); ?><?php echo $seller_storedetails['tanimage'];?>" ><?php echo $seller_storedetails['tanimage'];?></a></span>

														</div>
														<div class="form-group nopaddingRight col-md-6 san-lg">
															<label class="control-label">Cst </label>
															<input  type="text" id="cst"  name="cst" value="<?php echo $seller_storedetails['cst'];   ?>" class="form-control"/>
															<input type="file" id="cstimag" name="cstimag" onchange="cstimageuload(this.value)">
															<a onclick="deactive2();" href="javascript:void(0)" >Replace</a>
															<span id="cstimages"></span>
															<span style="color:red" id="cstimageserror"></span>
															<span id="editcstimage"><a target="_blank" href="<?php echo site_url('assets/sellerfile/'); ?><?php echo $seller_storedetails['cstimage'];?>" ><?php echo $seller_storedetails['cstimage'];?></a></span>

														</div>
														<div class="form-group nopaddingRight col-md-6 san-lg">
														  <label class="control-label">GSTIN</label>
															<input  type="text"  name="gstin" id="gstin" value="<?php echo $seller_storedetails['gstin'];   ?>" class="form-control"  />
														</div>

															 <div class="clearfix"></div>
                                                        <div style="margin-top: 20px; margin-left: 15px;">
                                                            <button type="submit" id="resubmit" class="btn btn-primary">Submit</button>
                                                     
                                                    </form> 
													<a type="submit" class="btn btn-danger" href="<?php echo base_url('seller/personnel_details'); ?>">Cancel</a>
												</div>
												</div>
                                                </div>
                                            </section>
				</div>
				<div class="tab-pane fade" id="tab4">
					  <section class="panel">
								<?php if($this->session->flashdata('updatemessage')): ?>
								<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button><?php echo $this->session->flashdata('updatemessage');?></div>
								<?php endif; ?>
                                                <div class="panel-body">
                                                    <form id="personalidetails"  name="personalidetails" action="<?php echo base_url('seller/personnel_details/personal_details_updatebd'); ?>" method="post" enctype="multipart/form-data">
                                                        <div class="form-group nopaddingRight col-md-6 san-lg">
                                                            <label for="exampleInputEmail1">Bank account</label>
                                                            <input class="form-control" placeholder="Name" type="text" id="bank_account" name="bank_account" value="<?php echo $seller_storedetails['seller_bank_account']?>">
                                                        </div>
                                                        <div class="form-group nopaddingRight col-md-6 san-lg">
                                                            <label for="exampleInputEmail1">Pan Card</label>
                                                            <input class="form-control" placeholder="Email" type="text" id="pan_card" name="pan_card" value="<?php echo $seller_storedetails['seller_pan_card'];   ?>">

                                                        </div>


                                                        <div class="form-group nopaddingRight col-md-6 san-lg">
                                                            <label for="exampleInputEmail1">Adhar Number</label>
                                                            <input class="form-control" placeholder="Adhar Number" type="text" name="seller_adhar" id="seller_adhar" value="<?php echo $seller_storedetails['seller_adhar']; ?>">
                                                        </div>
															 <div class="clearfix"></div>
                                                        <div style="margin-top: 20px; margin-left: 15px;">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                     
                                                    </form> 
													<a type="submit" class="btn btn-danger" href="<?php echo base_url('seller/personnel_details'); ?>">Cancel</a>
												</div>
												</div>
                                                </div>
                                            </section>
				</div>
			</div>
		</div>
		
	</div>
	
	
	
    </div>
</div>
</div>
</div>
</div>
</div>

<!--body end here -->
  
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
            },
			seller_address: {
               validators: {
				notEmpty: {
					message: 'Address Line is required'
				},
				regexp: {
				regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~'"\\|=^?$%*)(_+-]*$/,
				message: 'Address Line wont allow <>[]'
				}
            
			}
            }
            
		
        }
    });
});

$(document).ready(function() {
    $('#personalidetails').bootstrapValidator({
       
        fields: {
			bank_account: {
              validators: {
					notEmpty: {
						message: 'Bank Account is required'
					},
                   regexp: {
					regexp:  /^[0-9]{11,16}$/,
					message:'Bank Account  must be 10 to 14 digits'
					}
                }
            },
            seller_adhar: {
               validators: {
				notEmpty: {
					message: 'Aadhar Number is required'
				},
				stringLength: {
								min: 12,
								message: 'Aadhar Number must be 12 digits'
							},
				regexp: {
				regexp: /^[0-9]+$/,
				message: ' Aadhar Number can only consist of digits'
				}
            
			}
            },
			pan_card: {
               validators: {
				notEmpty: {
					message: 'Pan Card Number is required'
				},
				regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: ' Pan Card Number can only consist of alphanumaric, space and dot'
				}
            
			}
            }
            
		
        }
    });
});

$('#tineditimage').hide();
$('#tanimages').hide();
$('#cstimag').hide();
function tinhideimage(){
	$('#tineditimage').trigger("click");	
}
function tinvateditimage(){
	 $('#tineditimage').change(function(e){
	var fileName0 = e.target.files[0].name;
	alert(fileName0);
		document.getElementById("edittinvatimage").innerHTML = fileName0; 
	});
	
}


function deactive1(id){
	$('#tanimages').trigger("click");	
}
function deactive2(id){
	$('#cstimag').trigger("click");	
}
</script>