<style>
.body_img {
    background-image: url("../assets/seller/images/welcome_sel.png ");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
	width: 100%;
    height:250px;
}
.tit_welc{
	color:#fff;
	font-weight:600;
	font-size:28px;
	margin-top:16%;
}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/datatable/jquery.dataTables.min.css">

<script src="<?php echo base_url();?>assets/vendor/datatable/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/datatable/base/jquery-ui.css">
<script src="<?php echo base_url();?>assets/vendor/datatable/jquery-ui.js"></script>
<?php $details=	$this->session->userdata('seller_firsttime');
//echo $details;exit; 
 if($this->session->flashdata('updatpassword')=="Password successfully changed!"){
 ?>
<script>
  $(document).ready(function() {
   $('#view1').trigger("click");
});
</script>

<?php
 //$bank= $this->session->userdata('bank_complete');
 }?>
 
 


<div class="cover">
<a href="javascript:void(0)"  style="text-decoration:none;" id="view1" data-toggle="modal"  data-target="#dashboardpopup">
</a>
</div>

	
	<div class="content-wrapper mar_t_con">
	<?php if($this->session->flashdata('welcome')): ?>
					<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('welcome');?></div>
					<?php endif; ?>
          <?php if($this->session->flashdata('succes')): ?>
          <div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button><?php echo $this->session->flashdata('succes');?></div>
          <?php endif; ?>
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
			
			<h1>Dashboard</h1>
			<small>&nbsp;</small>
			<ol class="breadcrumb hidden-xs">
				<li><a href="<?php echo base_url('seller/dashboard');?>"><i class="pe-7s-home"></i> Dashboard</a></li>
				
			</ol>
		</div>
	</section>
  <section class="content ">  

      
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-8 m-b-20">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab1" data-toggle="tab">New Orders</a></li>
			<li><a href="#tab2" data-toggle="tab">Return Orders</a></li>
		</ul>
		<!-- Tab panels -->
		<div class="tab-content">
			<div class="tab-pane fade in active" id="tab1">
				<div class="panel-body">
					 <div class="table-responsive" id="example1">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Order id</th>
                                            <th>Customer Name</th>
                                            <th>Product Name</th>
                                            <th>Product Price</th>
                                            <th>Deliveryboy Id</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $SNO=1;
									foreach($ordersdata as $order_data){ ?>
                                        <tr >
                                            
                                            <td><?php  echo $order_data->order_item_id; ?></td>
                                            <td><?php  echo $order_data->cust_firstname .' '. $order_data->cust_lastname; ?></td>
                                            <td><?php  echo $order_data->item_name; ?></td>
                                            <td><?php  echo $order_data->total_price; ?></td>
                                            <td><?php  echo $order_data->delivery_boy_id; ?></td>
                                       <?php $SNO++; } ?>
							</tbody>
                    </table>
                </div>
				</div>
			</div>
			<div class="tab-pane fade" id="tab2">
				<div class="panel-body">
					<div class="faq_main">

    <div class="container" style="width:100%">
    
      <!-- <h1 class="head_title">My Returns</h1> -->
     <div><?php echo $this->session->flashdata('message');?></div>
      <div class="faq"> 
	  	 <div class="table-responsive" id="example2">
		<table class="table table-bordered table-striped" id="example1">
                  <thead>
                    <tr>
                <th>Order Id</th>
				<th>Product Name</th>
				<th>Item Price</th>
				<th>Qty</th>
				<th>Total price</th>
				<th>Customer Billing Details</th>
				<th>Status</th>
              
                    </tr>
                  </thead>
                  <?php if(!empty($returnitemdata)): ?>

              <tbody>
                <?php $count = $this->uri->segment(4, 0);

   foreach($returnitemdata as $orders_data){
     ?>

                <tr>
                  <td><?php  echo $orders_data->order_item_id; ?></td>
                  <td><?php  echo $orders_data->item_name; ?></td>
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
                  </table>
				  </td>
				  <td><?php  echo $orders_data->status_refund; ?></td>

                
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
    </div>
  
  </div>
					
				</div>
			</div>
		</div>
	</div>
	 <div class="col-sm-6 col-md-4 mar_t40 unpin_hide">
		<!-- Default Panel -->
		<div class="panel panel-bd lobidisable">
			<div class="panel-heading">
				<div class="panel-title">
					<h4>Seller Ads</h4>
				</div>
			</div>
			<div class="panel-body">
        <div class="">
          <ul class="demo2">
          <?php foreach($seller_ad as $seller_ads) { ?>
              <li class="news-item">
                <table cellpadding="4">
                  <tr>
                      <td><?php echo $seller_ads->message; ?></td>
                  </tr>
                </table>
              </li>
              <?php } ?>
          </ul>
        </div>
				</div>
			</div>
		</div>
		

</div>

				
  

                 </section> <!-- /.content -->
             </div>
             
             </div>
             </div>
			<div class="modal fade" id="dashboardpopup" role="dialog">
  
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content bac_img">
        <div class="modal-header"  style="background-color:#5cb85c;color:#fff;padding:10px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Successfully completed</h4>
        </div>
        <div class="modal-body  body_img">
          <h3 class="text-center tit_welc">Welcome to Your Seller Portal.</h3>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

      
    </div>
  </div>

  


  


   
<script type="text/javascript">
    $(function () {
    $(".demo2").bootstrapNews({
            newsPerPage: 4,
            autoplay: true,
            pauseOnHover: true,
            navigation: false,
            direction: 'up',
            newsTickerInterval: 2500,
            onToDo: function () {
                //console.log(this);
            }
        });
    
    });

   
</script>
