
<div class="wrapper"> 
  <!--header part start here -->
  <div class="jain_container">
			<div class="" style="margin-top:180px;">
				
			</div>
		<body >
		<div class="container">
			<div class="row">
				<section class="content">
      <div class="row">
        <div class="col-xs-12">
			<div class="box">
        
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Order Id</th>
                  <th>Item Name</th>
                  <th>Amount</th>
                  <th>Date</th>
                  <th>Status</th>
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
                  <td><?php echo $orders['create_at'] ?></td>
                  <td>
				  <?php   if($orders['order_status']==1){ echo "confirmed";} else{ echo "pending";}?>
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
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
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

 