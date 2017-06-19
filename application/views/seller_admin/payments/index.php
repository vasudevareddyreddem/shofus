   <div class="col-md-9">
  <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
        <!--<div class="row">
        <div class="col-lg-12">
      <div class="row">
       <div class="col-md-7">
           <h3 class="page-header"><i class="fa fa-credit-card" aria-hidden="true"></i>Seller Payments</h3></div>
          <div class="col-md-5 pull-right">
         <form class="navbar-form" action="<?php echo base_url(); ?>seller_admin/payments/seller_search" method="post">
          <input class="form-control" placeholder="Search" name="search" type="text">
         <button class="btn btn-default" type="submit">Go!</button>
          </form>
            </div></div>
          <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="<?php echo base_url();?>seller_admin/dashboard">Home</a></li>
            <li><i class="fa fa-credit-card" aria-hidden="true"></i>Seller Payments</li>
          </ol>
        </div>
      </div>-->
     <div class="row">
        <div class="col-md-12">
          <section class="panel">
            <header class="panel-heading">
              <h3>Seller Payments</h3>
            </header>
            <div class="panel-body">
              <!-- <a href="<?php echo base_url(); ?>seller_admin/payments/create"  class="add_item"><button class="btn btn-primary" type="submit">Add Seller Payment</button></a>-->
             <div class="clearfix"></div>
              <div><?php echo $this->session->flashdata('message');?></div>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                 <th>S.No</th>
               <!--  <th>Seller Id</th>-->
                <th>Order Id</th>
                <th>CIH Comission</th>
                <th>Net Profit</th>
                <th>Amount</th>
				<th>Invoice</th>
               <!-- <th>Date & Time</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>-->
                    </tr>
                  </thead>
                  <?php if(!empty($paymentsdata)): ?>

              <tbody>
                <?php $count = $this->uri->segment(4, 0);

   foreach($paymentsdata as $payments_data){

     $total = 0;

     ?>

                <tr>

                  <td><?= ++$count ?></td>

                <!--  <td><a href="<?php //echo base_url(); ?>seller_admin/payments/seller_details/<?php  //echo $payments_data->seller_id; ?>"><?php  //echo $payments_data->seller_id; ?></a></td>-->
                  <td><?php  echo $payments_data->order_id; ?></td>
                  <td><?php  echo $payments_data->cih_comission; ?></td>
                   <td><?php  echo $payments_data->net_profit; ?></td>
                    <td><?php if($payments_data->amount_status == 0) {echo "Pending"; } else { echo "Deposited";}?></td>
                    <td><a href="<?php echo site_url(); ?>uploads/invoice/<?php echo $payments_data->invoice;  ?>" download ><?php  echo $payments_data->invoice; ?></a></td>
               <!--  <td><?php  //echo $payments_data->date_time; ?></td>
                   <td><?php  //echo $payments_data->status; ?></td>
                  <td><a href="<?php //echo base_url(); ?>seller_admin/payments/edit/<?php  //echo $payments_data->seller_payment_id; ?>"><i class="fa fa-pencil-square-o" style="font-size:18px"></i></a></td>

                   <td>  <a href="<?php //echo base_url(); ?>seller_admin/payments/seller_delete/<?php  //echo $payments_data->seller_payment_id; ?>" onclick="return checkDelete('<?php  //echo $payments_data->seller_payment_id; ?>')"><i class="fa fa-trash-o" style="font-size:18px"></i></a></td>-->

                
                </tr>
                <?php } ?>

              </tbody>

              <?php else: ?>

              <center>

                <strong>No Records Found</strong>

              </center>

              <?php endif; ?>
                </table>
                <center><?= $this->pagination->create_links(); ?></center>
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
  </div>
  </div>
  </div>
  </div>

<script language="JavaScript" type="text/javascript">

function checkDelete(id)
{
return confirm('Are you sure want to delete "'+id +'" payment?');
}

</script>



     