<div class="content-wrapper pad_t100">
    <!-- Content Header (Page header) -->
      <div class="container">
         <!-- Main content -->
      <div class="row">
	  <?php //echo '<pre>';print_r($category_list);exit; ?>
      <div class="box data_box_wid">
            <div class="box-header" style="border-bottom:1px solid #ddd;">
              <h3 class="box-title">Delivery boy's status List</h3>
              <a class="pull-right btn btn-sm btn-primary" href="<?php echo base_url('inventory/categoryadd'); ?>" class="box-title">Add</a>
            </div>
			
            <!-- /.box-header -->
			<?php //echo '<pre>';print_r($category_list);exit;

			?>
            <div class="box-body">
			<?php if($this->session->flashdata('success')): ?>
					<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('success');?></div>	
					<?php endif; ?>
					<?php 	if(count($deliveryboy_list)>0){ ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
					<th>Customer Id</th>
					<th>Customer Name</th>
					<th>Customer Mobile Number</th>
					<th>Status</th>
					<th>Current Location</th>
				 </tr>
                </thead>
                <tbody>
                <?php 
							
                  foreach($deliveryboy_list as $list) { ?>
                <tr>                  
                 <td><?php echo isset($list['customer_id'])?$list['customer_id']:''; ?></td>
				 <td><?php echo isset($list['cust_firstname'])?$list['cust_firstname']:''; ?>&nbsp;<?php echo isset($list['cust_lastname'])?$list['cust_lastname']:''; ?></td>
				<td><?php echo isset($list['cust_mobile'])?$list['cust_mobile']:''; ?></td>
				<td><?php if($list['active_status']==1){ echo "Active"; }else{ echo "Deactive"; } ?></td>
				<td><?php echo isset($list['address1'])?$list['address1']:''; ?>&nbsp;<?php echo isset($list['address2'])?$list['address2']:''; ?></td>
				 </tr>
				<?php } ?>
                </tbody>              
              </table>
			  <?php } else{?>
				<p>No data available</p>
				<?php } ?>
             
            </div>
            <!-- /.box-body -->
          </div>

</div>
</div>
</div>
<script>
$(document).ready(function() {
    $('#example1').DataTable( {
        "order": [[ 2, "desc" ]]
    } );
} );
</script>

