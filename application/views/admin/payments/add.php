 <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-users" aria-hidden="true"></i>Add Seller Payment</h3>
         <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="<?php echo base_url();?>admin/dashboard">Home</a></li>
            <li><i class="fa fa-users" aria-hidden="true"></i>Delivery Boy</li>
           <!-- <li><i class="fa fa-square-o"></i>Starters</li>-->
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading"> Add Seller Payment </header>
            <div class="panel-body">

            <?php //print_r($sellerdata); exit;?>
             <form action="<?php echo base_url(); ?>admin/payments/insert/<?php echo $this->uri->segment(4); ?>/<?php echo $this->uri->segment(5); ?>" method="post" enctype="multipart/form-data" onSubmit="return paymentvalidateof();">

              <div><?php echo $this->session->flashdata('message');?></div>

                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Seller</label>
                    <select name="seller_id" id="seller_id" class="form-control"s>
                         <option value="">None Selected </option>
                      <?php foreach($sellerdata as $seller) { ?>
                     <option value="<?php echo $seller->seller_id ;?>"><?php  echo $seller->seller_shop; ?></option>
                      <?php } ?>
                    </select>
                      <span id="errorseller" style="color:red"></span>
                </div>
				 <script type="text/javascript">

for(var i=0;i<document.getElementById('seller_id').length;i++)

{

if(document.getElementById('seller_id').options[i].value=="<?php echo $singlesellerdata->seller_id; ?>")

{

document.getElementById('seller_id').options[i].selected=true

}

}     

</script>

                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Order Id</label>
                  <input type="text" id="order_id" name="order_id" value="<?php echo $order_id;  ?>" class="form-control">
                    <span id="errororder" style="color:red"> </span>
                </div>

                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">CIH Comission</label>
                  <input type="text" id="cih_comission" name="cih_comission" class="form-control">
                      <span id="errorcomission" style="color:red"> </span>
                </div>

                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Net Profit</label>
                  <input type="text" id="net_profit" name="net_profit" class="form-control">
                      <span id="errorprofit" style="color:red"> </span>
                </div>

                <!--<div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Amount</label>
             <select class="form-control" id="amount_status" name="amount_status">
                    <option value="">Select Status</option>
                    <option value="Deposited">Deposited</option>
                    <option value="Pending">Pending</option>
                  </select>
                          <span id="erroramount" style="color:red">  </span>
                </div>-->

               
<div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputFile">Invoice</label>
                  <input type="file" name="invoice" id="invoice">
				  
				   <span style="color:red" id="errorinvoice"></span>
                </div>
				<div class="clearfix"></div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="submit" class="btn btn-danger" onclick="window.location='<?php echo base_url(); ?>admin/payments/seller_payments';return false;">Cancel</button>
              </form>
            </div>
          </section>
        </div>
      </div>
      <!-- page start--> 
      <!-- page end--> 
    </section>
  </section>
  <!--main content end--> 


<script>
	
	function paymentvalidateof()

{

var seller_id=document.getElementById('seller_id');

var order_id=document.getElementById('order_id');

var cih_comission=document.getElementById('cih_comission');

var net_profit=document.getElementById('net_profit');

var amount_status=document.getElementById('amount_status');

var invoice=document.getElementById('invoice');



if(seller_id.value==""){

document.getElementById('errorseller').innerHTML="Please Select Seller Shop";

$("#seller_id").focus();

return false;	

}	

else{

	document.getElementById('errorseller').innerHTML="";

}

if(order_id.value==""){

document.getElementById('errororder').innerHTML="Please Enter Order id";

$("#order_id").focus();

return false;	

}	

else{

	document.getElementById('errororder').innerHTML="";

}



if(cih_comission.value==""){

document.getElementById('errorcomission').innerHTML="Please Enter CIH Comission";

$("#cih_comission").focus();

return false;	

}	

else{

	document.getElementById('errorcomission').innerHTML="";

}


if(net_profit.value==""){

document.getElementById('errorprofit').innerHTML="Please Enter Net Profit";

$("#net_profit").focus();

return false;	

}	

else{

	document.getElementById('errorprofit').innerHTML="";

}

if(amount_status.value==""){

document.getElementById('erroramount').innerHTML="Please Select Status";

$("#amount_status").focus();

return false;	

}	

else{

	document.getElementById('erroramount').innerHTML="";

}

	

if(invoice.value==""){

document.getElementById('errorinvoice').innerHTML="Please Upload Invoice";

$("#invoice").focus();

return false;	

}	

else{

	document.getElementById('errorinvoice').innerHTML="";

}



}
</script>
