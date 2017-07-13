<div class="content-wrapper pad_t100">
    <!-- Content Header (Page header) -->
      <div class="container">
         <!-- Main content -->
      <div class="row">
	  <?php //echo '<pre>';print_r($category_list);exit; ?>
      <div class="box data_box_wid">
            <div class="box-header">
              <h3 class="box-title">SubCategory List</h3>
              <a href="<?php echo base_url('inventory/addsubcategory'); ?>" class="box-title">Add</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
					<th>SubCategory Name</th>
					<th>Category Name</th>
					<th>Created Date</th>
					<th>Status</th>
					<th>Action</th>
				 </tr>
                </thead>
                <tbody>
                <?php  
                  foreach($subcategory_details as $subcatlist) {?>
                <tr>                  
                  <td><a href="<?php echo base_url('inventory/categoryview/'.base64_encode($subcatlist['subcategory_id'])); ?>"><?php echo $subcatlist['subcategory_name']; ?></a></td>
				  <td><?php echo $subcatlist['created_at']; ?></td>    
                  <td><?php if($subcatlist['status']==1){ echo "Active";}else{ echo "Deactivae";} ?></td>                  
				<td>
				<a href="<?php echo base_url('inventory/categoryview/'.base64_encode($subcatlist['subcategory_id'])); ?>">View</a> | &nbsp;
				<a href="<?php echo base_url('inventory/categoryedit/'.base64_encode($subcatlist['subcategory_id'])); ?>">Edit</a> | &nbsp;
				<a href="<?php echo base_url('inventory/categorystatus/'.base64_encode($subcatlist['subcategory_id']).'/'.base64_encode($subcatlist['status'])); ?>"><?php if($subcatlist['status']==1){ echo "Active";}else{ echo "Deactive";} ?></a>
				</td>
                 </tr>
                 <?php }?>
                </tbody>              
              </table>
             
            </div>
            <!-- /.box-body -->
          </div>

</div>
</div>
</div>
<script>
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>