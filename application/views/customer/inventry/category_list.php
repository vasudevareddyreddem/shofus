<div class="content-wrapper pad_t100">
    <!-- Content Header (Page header) -->
      <div class="container">
         <!-- Main content -->
      <div class="row">
	  <?php //echo '<pre>';print_r($category_list);exit; ?>
      <div class="box data_box_wid">
            <div class="box-header">
              <h3 class="box-title">Category List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
					<th>Category Name</th>
					<th>Created Date</th>
					<th>Status</th>
					<th>Action</th>
				 </tr>
                </thead>
                <tbody>
                <?php  
                  foreach($category_list as $catlist) {?>
                <tr>                  
                  <td><?php echo $catlist['category_name']; ?></td>
				  <td><?php echo $catlist['created_at']; ?></td>    
                  <td><?php if($catlist['status']==1){ echo "Active";}else{ echo "Deactivae";} ?></td>                  
                  <td><?php echo $catlist['status']; ?></td>                  
                                
                
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
