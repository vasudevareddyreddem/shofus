<?php //echo '<pre>';print_r($orders_list);exit; ?>
<div class="wrapper"> 
  <!--header part start here -->
  <div class="jain_container">
			
		<body >
		<div class="container">
			<div class="row">
				<section class="content">
      <div class="row">
        <div class="col-xs-12">
			<div class="box">
        
            <!-- /.box-header -->
            <div class="box-body">
			<?php if($this->session->flashdata('successmsg')): ?>
			<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button><?php echo $this->session->flashdata('successmsg');?></div>
			<?php endif; ?>
			<?php if($this->session->flashdata('permissionerror')): ?>
			<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button><?php echo $this->session->flashdata('permissionerror');?></div>
			<?php endif; ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Order Id</th>
                  <th>Item Name</th>
                  <th>Amount</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php 
				//echo '<pre>';print_r($orders_list);exit;
				
				foreach ($orders_list as $orders){ ?>
                <tr>
                  <td><?php echo $orders['order_item_id'] ?></td>
                  <td><?php echo $orders['item_name'] ?> </td>
                  <td><?php echo $orders['total_price'] ?></td>
                  <td><?php echo Date('d-M-Y',strtotime(htmlentities($orders['create_at'])));?></td>
                 <td>
				  <?php 
				  if($orders['order_status']==1)
				  { 
					echo "Order Confirmation";
				  }else if($orders['order_status']==2){
					  
					  echo "Packing Order";
				  }else if($orders['order_status']==3){
					  
					  echo "Order on Road";
				  }else if($orders['order_status']==4){
					  
					  echo "Delivered";
				  }else if($orders['order_status']==5){
					  
					  echo "Return";
				  }else{
					  
					 echo " "; 
					}
					?>
				  </td>
				  <td>
				  <a href="<?php echo base_url('customer/orederdetails/'.base64_encode($orders['order_item_id'])); ?>">view</a>
				  </td>
                </tr>
                <?php } ?>
              
                </tbody>
                <tfoot>
                <tr>
                <th>Order Id</th>
                  <th>Item Name</th>
                  <th>Amount</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          </div>
          </section>
		  </div>
<script>
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
			</div>
		</div>
	</div>

	




		

<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/js/common.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/js/owl.carousel.min.js"></script> 

<!-- the overlay element --> 

<script src="<?php echo base_url(); ?>assets/home/js/classie.js"></script> 
<script src="<?php echo base_url(); ?>assets/home/js/modalEffects.js"></script> 

 