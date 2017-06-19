 <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-users" aria-hidden="true"></i>Edit Seller Payment</h3>
         <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="<?php echo base_url();?>admin/dashboard">Home</a></li>
            <li><i class="fa fa-users" aria-hidden="true"></i>Edit Seller Payment</li>
           <!-- <li><i class="fa fa-square-o"></i>Starters</li>-->
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading">Edit Seller Payment</header>
            <div class="panel-body">

            <?php //print_r($sellerdata); exit;?>
             <form action="<?php echo base_url(); ?>admin/payments/update/<?php echo $paymentsdata->seller_payment_id; ?>/<?php echo $paymentsdata->seller_id; ?>/<?php echo $paymentsdata->order_id; ?>" method="post" enctype="multipart/form-data">

              <div><?php echo $this->session->flashdata('message');?></div>

                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Seller</label>

                    <select name="seller_id" id="seller_id" class="form-control">
                     
                      <?php foreach($sellerdata as $seller_data) { ?>
                     <option <?php echo (isset($paymentsdata->seller_id) && $paymentsdata->seller_id!='' && $paymentsdata->seller_id== $seller_data->seller_id ?'selected':'') ; ?> value="<?php echo $seller_data->seller_id ;?>"><?php  echo $seller_data->seller_shop; ?></option>

                      <?php } ?>

                    </select>
                      <span id="errorseller" style="color:red"> </span>
                </div>

                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputPassword1">Order Id</label>
                  <input type="text" value="<?php echo $paymentsdata->order_id; ?>"  id="order_id" name="order_id" class="form-control">
                    <span id="errororder" style="color:red"></span>
                </div>

                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">CIH Comission</label>
                  <input type="text" value="<?php echo $paymentsdata->cih_comission; ?>" id="cih_comission" name="cih_comission" class="form-control">
                      <span id="errorcomission" style="color:red"> </span>
                </div>

                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Net Profit</label>
                  <input type="text" value="<?php echo $paymentsdata->net_profit; ?>" name="net_profit"  id="net_profit" class="form-control">
                      <span id="errorprofit" style="color:red" ></span>
                </div>

              <!-- <div class="form-group nopaddingRight col-md-6 san-lg">
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
				  <input type="hidden" value="<?php echo $paymentsdata->invoice; ?>" name="hdn_inner_banner"  />
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



