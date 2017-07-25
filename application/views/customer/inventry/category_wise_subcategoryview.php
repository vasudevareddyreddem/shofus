<div class="content-wrapper pad_t100">
    <!-- Content Header (Page header) -->
      <div class="container">
         <!-- Main content -->
      <div class="row">
	  <?php //echo '<pre>';print_r($category_list);exit; ?>
      <div class="box data_box_wid">
            <div class="box-header" style="border-bottom:1px solid #ddd;">
              <h3 class="box-title" >Category wise SubCategory List</h3>
              <a class="pull-right btn btn-sm btn-primary" href="<?php echo base_url('inventory/categorieslist'); ?>" class="box-title">Back</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body"><?php if($this->session->flashdata('success')): ?>
					<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('success');?></div>	
					<?php endif; ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
				  <tr>
					<th>SubCategory Name</th>
					<th>Category Name</th>
					<th>Created Date</th>
					<th>Status</th>
				 </tr>
                </thead>
                <tbody>
                <?php  
                  foreach($subcatelist as $subcatlist) {?>
                <tr>                  
                  <td><?php echo $subcatlist['subcategory_name']; ?></td>
				  <td><?php echo $subcatlist['category_name']; ?></td>    
				<td><?php echo Date('d-M-Y',strtotime(htmlentities($subcatlist['created_at'])));?></td> 				  
                  <td><?php if($subcatlist['status']==1){ echo "Active";}else{ echo "Deactive";} ?></td>                  
				
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
$(document).ready(function() {
    $('#example1').DataTable( {
        "order": [[ 2, "desc" ]]
    } );
} );
</script>