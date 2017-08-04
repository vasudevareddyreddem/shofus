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
			<small>Total Orders</small>
			<ol class="breadcrumb hidden-xs">
				<li><a href="<?php echo base_url('seller/dashboard');?>"><i class="pe-7s-home"></i> Home</a></li>
				<li class="active">Total Orders</li>
			</ol>
		</div>
	</section>
  <section class="content ">
  <section id="main-content">
    <section class="wrapper">
      <!--<div class="row">
        <div class="col-lg-12">
       <div class="row">
       <div class="col-md-7">
           <h3 class="page-header"><i class="fa fa-list-ol" aria-hidden="true"></i>Orders</h3></div>
          <div class="col-md-5 pull-right">
         <form class="navbar-form" action="<?php echo base_url(); ?>seller/categories/search" method="post">
          <input class="form-control" placeholder="Search" name="search" type="text">
         <button class="btn btn-default" type="submit">Go!</button>
          </form>
            </div></div> 
          <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="<?php echo base_url();?>seller/dashboard">Home</a></li>
            <li><i class="fa fa-list-ol" aria-hidden="true"></i>Orders</li>
          </ol>
        </div>
      </div>-->
      <div class="row">
        <div class="col-md-12">
          <section class="panel">
            <header class="panel-heading">
              <h3>Orders</h3>
            </header>
            <div class="panel-body"> 
            <!--  <a href="<?php //echo base_url(); ?>seller/seller_users/create"  class="add_item"><button class="btn btn-primary" type="submit">Add seller Users</button></a>-->
             <div class="clearfix"></div>
              <div><?php echo $this->session->flashdata('message');?></div>
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                 <th>S.No</th>
                <th>Order Id</th>
                <th>Product Name</th>
                <th>Total Price</th>
                <!-- <th>Delivery Date</th>
                <th>Delivery Time</th> -->
                <th>Customer Details</th>
                <th>Order Status</th>
                <!-- <th>Delete</th> -->
                    </tr>
                  </thead>
                  <?php if(!empty($ordersdata)): ?>

              <tbody>
                <?php $count = $this->uri->segment(4, 0);

   foreach($ordersdata as $orders_data){
     ?>

                <tr>
                  <td><?= ++$count ?></td>
                  <td><?php  echo $orders_data->order_id; ?></td>
                  <td><?php  echo $orders_data->item_name; ?></td>
                  <td><?php  echo $orders_data->total_price; ?></td>
                 <!-- <td><?php  echo $orders_data->delivery_date; ?></td>
                  <td><?php  echo $orders_data->delivery_time; ?></td>
 -->
                   <td><table class="table table-bordered qtytable">
                    <tbody>
                      <tr>
                        <th>Name</th>
                        <td><?php  echo $orders_data->cust_firstname . $orders_data->cust_lastname; ?></td>
                      </tr>
                      <tr>
                        <th>Mobile</th>
                        <td><?php  echo $orders_data->cust_mobile; ?></td>
                      </tr>
                      <tr>
                        <th>Email</th>
                        <td><?php  echo $orders_data->cust_email; ?></td>
                      </tr>
                      <tr>
                        <th>Address</th>
                        <td><?php  echo $orders_data->address1; ?></td>
                      </tr>
                    </tbody>
                  </table></td>

               <td class="text-center" style="color:<?php  if( $orders_data->order_status=='' || $orders_data->order_status=='0' ){echo "Red";}elseif($orders_data->order_status=='1'){echo "Blue";}elseif($orders_data->order_status=='2'){echo "Brown";}elseif($orders_data->order_status=='3'){echo "Green";}

         else{echo "Orange";} ?>;font-weight:bold">

        <?php  

        if($orders_data->order_status=='' || $orders_data->order_status=='0'){echo "Not Assigned";}
        elseif($orders_data->order_status=='1'){ ?> <a href="<?php echo base_url(); ?>seller/orders/assigned_orders"><?php echo "Assigned"; ?></a> <?php } 
         elseif($orders_data->order_status=='2'){ ?><a href="<?php echo base_url(); ?>seller/orders/inprogress_orders" style="color: Brown"><?php echo "In-Progress";  ?></a> <?php }
         elseif($orders_data->order_status=='3'){ ?> <a href="<?php echo base_url(); ?>seller/orders/delivered_orders" style="color: Green"><?php echo "Delivered";  ?></a> <?php }
        else{
          echo "N/A";
        }
        ?>

        </td>         

                   <!-- <td>  <a href="<?php echo base_url(); ?>seller/orders/delete/<?php  echo $orders_data->order_id; ?>" onclick="return checkDelete('<?php  echo $orders_data->order_id; ?>')"><i class="fa fa-trash-o" style="font-size:18px"></i></a></td> -->

                
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
        "order": [[ 2, "desc" ]]
    } );
} );

</script>



     