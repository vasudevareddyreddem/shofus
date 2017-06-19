  <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
        <div class="row">
        <div class="col-lg-12">
      <div class="row">
       <div class="col-md-7">
           <h3 class="page-header"><i class="fa fa-credit-card" aria-hidden="true"></i>Seller Payments</h3></div>
          <!--<div class="col-md-5 pull-right">
         <form class="navbar-form" action="<?php echo base_url(); ?>admin/payments/seller_search" method="post">
          <input class="form-control" placeholder="Search" name="search" type="text">
         <button class="btn btn-default" type="submit">Go!</button>
          </form>
            </div>-->
			</div>
          <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="<?php echo base_url();?>admin/dashboard">Home</a></li>
            <li><i class="fa fa-credit-card" aria-hidden="true"></i>Seller Payments</li>
          </ol>
        </div>
      </div>
     <div class="row">
        <div class="col-md-12">
          <section class="panel">
            <header class="panel-heading">
              <h3>Seller Payments</h3>
            </header>
            <div class="panel-body">
			<div>
               <a href="<?php echo base_url(); ?>admin/payments/seller_payments"  class="add_item"><button class="btn btn-primary" type="submit">Back</button></a>
			   </div>
			   <div>
			    <a href="<?php echo base_url(); ?>admin/payments/create/<?php echo $this->uri->segment(4); ?>/<?php echo $this->uri->segment(5); ?>"  class="add_item"><button class="btn btn-primary" type="submit">Add Seller Payment</button></a>
				</div>
             <div class="clearfix"></div>
              <div><?php echo $this->session->flashdata('message');?></div>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                 <th>S.No</th>
                 <th>Seller Name</th>
				 <th>Store Name</th>
                <th>Order Id</th>
                <th>CIH Comission</th>
                <th>Net Profit</th>
                <th>Pay</th>
				<th>Invoice</th>
               <!-- <th>Date & Time</th>
                <th>Status</th>-->
                <th>Edit</th>
               <th>Delete</th>
                    </tr>
                  </thead>
                  <?php if(!empty($paymentsdata)): ?>

              <tbody>
                

                <tr>

                  <td>1</td>

                  <td><?php  echo $paymentsdata->seller_name; ?></td>
				  <td><?php  echo $paymentsdata->seller_shop; ?></td>
                  <td><?php  echo $paymentsdata->order_id; ?></td>
                  <td><?php  echo $paymentsdata->cih_comission; ?></td>
                   <td><?php  echo $paymentsdata->net_profit; ?></td>
                    <td><a href="#" >Payment</a></td>
                   <td><a href="<?php echo site_url(); ?>uploads/invoice/<?php echo $paymentsdata->invoice;  ?>" download ><?php  echo $paymentsdata->invoice; ?></a></td>
                  <td><a href="<?php echo base_url(); ?>admin/payments/edit/<?php echo $paymentsdata->seller_payment_id; ?>"><i class="fa fa-pencil-square-o" style="font-size:18px"></i></a></td>

                   <td>  <a href="<?php echo base_url(); ?>admin/payments/seller_delete/<?php echo $paymentsdata->seller_payment_id; ?>/<?php echo $paymentsdata->seller_id; ?>/<?php echo $paymentsdata->order_id; ?>" onclick="return checkDelete('<?php  echo $paymentsdata->seller_shop; ?>')"><i class="fa fa-trash-o" style="font-size:18px"></i></a></td>
                  
                
                </tr>

                

              </tbody>

              <?php else: ?>

              <center>

                <strong>No Records Found</strong>

              </center>

              <?php endif; ?>
                </table>
                
              </div>
            </div>
          </section>
        </div>
      </div>
      <!-- page start--> 
      <!-- page end--> 
    </section>
  </section>
  <!--main content end--> 

<script language="JavaScript" type="text/javascript">

function checkDelete(id)
{
return confirm('Are you sure want to delete "'+id +'" payment?');
}

</script>



     