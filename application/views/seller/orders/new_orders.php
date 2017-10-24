<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/datatable/jquery.dataTables.min.css">

<script src="<?php echo base_url();?>assets/vendor/datatable/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/datatable/base/jquery-ui.css">
<script src="<?php echo base_url();?>assets/vendor/datatable/jquery-ui.js"></script>
<div class="content-wrapper mar_t_con" >
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
			<h1>Orders</h1>
			<small>New Orders</small>
			<ol class="breadcrumb hidden-xs">
				<li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
				<li class="active">New Orders</li>
			</ol>
		</div>
	</section>
  <section class="content ">
  <section id="main-content">
    <section class="wrapper">
      
      <div class="row">
        <div class="col-md-12">
          <section class="panel">
            <header class="panel-heading">
              <h3>New Orders</h3>
            </header>
            <div class="panel-body"> 
            <!--  <a href="<?php //echo base_url(); ?>seller/seller_users/create"  class="add_item"><button class="btn btn-primary" type="submit">Add seller Users</button></a>-->
             <div class="clearfix"></div>
              <div><?php echo $this->session->flashdata('message');?></div>
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="example1">
                  <thead>
                    <tr>
                <th>Order Id</th>
                <th>Order Price</th>                
                <th>Qty</th>                
                <th>Total Price</th>                
				<th>Customer Billing Details</th>
				<th>Status</th>
                 </tr>
                  </thead>
                  <?php if(!empty($ordersdata)): ?>

              <tbody>
                <?php $count = $this->uri->segment(4, 0);

   foreach($ordersdata as $orders_data){
     ?>

                <tr>
                  <td><?php  echo $orders_data->order_item_id; ?></td>
                  <td><?php  echo $orders_data->item_price; ?></td>
                  <td><?php  echo $orders_data->qty; ?></td>
                  <td><?php  echo $orders_data->total_price; ?></td>

                   <td><table class="table table-bordered qtytable">
                     <tbody>
                      <tr>
                        <th>Name</th>
                        <td><?php  echo $orders_data->name; ?></td>
                      </tr>
                      <tr>
                        <th>Mobile</th>
                        <td><?php  echo $orders_data->customer_phone; ?></td>
                      </tr>
                      <tr>
                        <th>Email</th>
                        <td><?php  echo $orders_data->customer_email; ?></td>
                      </tr>
                      <tr>
                        <th>Address</th>
                        <td><?php  echo $orders_data->customer_address; ?></td>
                      </tr>
                    </tbody>
                  </table></td>
				  <td>
				  <?php if($orders_data->status_confirmation==1 && $orders_data->status_packing==''){
					echo "Order confirmed ";  
				  }else if($orders_data->status_confirmation==1 && $orders_data->status_packing==2 && $orders_data->status_road=='' ){
					  echo "Packing Order";
				  }else if($orders_data->status_confirmation==1 && $orders_data->status_packing==2 && $orders_data->status_road==3 && $orders_data->status_deliverd=='' || $orders_data->status_deliverd==0){
					  echo "Order on Road";
				  }else if($orders_data->status_confirmation==1 && $orders_data->status_packing==2 && $orders_data->status_road==3 && $orders_data->status_deliverd==4){
					  echo "Delivered";
				  }else{
					 echo "error"; 
				  }
				  ?>
				  
				  
				  
				  </td>

                
                </tr>

                <?php } ?>

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
  </section>
  </div>
  <!--main content end--> 

<script language="JavaScript" type="text/javascript">

function checkDelete(id)
{
return confirm('Are you sure want to delete "'+id +'" Order?');
}
$(document).ready(function() {
    $('#example1').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
} );
</script>



     