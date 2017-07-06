  <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
      <div class="row">
       <div class="col-md-7">
           <h3 class="page-header"><i class="fa fa-list" aria-hidden="true"></i>Categories</h3></div>
          <div class="col-md-5 pull-right">
         <form class="navbar-form" action="<?php echo base_url(); ?>admin/categories/search" method="post">
          <input class="form-control" placeholder="Search" name="search" type="text">
         <button class="btn btn-default" type="submit">Go!</button>
          </form>
            </div></div>
          <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="<?php echo base_url();?>admin/dashboard">Home</a></li>
            <li><i class="fa fa-list" aria-hidden="true"></i>Categories</li>
          </ol>
        </div>
      </div>
      <div class="row">


      
	   <?php if($this->session->flashdata('success')): ?>
					<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button><?php echo $this->session->flashdata('success');?></div>	
					<?php endif; ?>
        <div class="col-md-12">
          <section class="panel">
            <header class="panel-heading">
              <h3>Categories</h3>
            </header>
            <div class="panel-body">  
              <div><?php echo $this->session->flashdata('message');?></div>
 <a href="<?php echo base_url(); ?>admin/categories/create"  class="add_item"><button class="btn btn-primary" type="submit">Add Category</button></a>
             <div class="clearfix"></div>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>S.NO</th>
                      <th>Category</th>
                      <th>Status</th>
                      <th>Edit</th>
                    </tr>
                  </thead>
                  <?php if(!empty($categoriesdata)): ?>
                  <tbody>
				  
				  <?php //echo '<pre>';print_r($categoriesdata);exit; ?>
                    <?php $i=1;
   foreach($categoriesdata as $categories_data){?>
    <tr>
      <td><?=$i;?></td>
      <td><?php  echo $categories_data->category_name; ?></td>
      <td><a href="<?php echo base_url('admin/categories/status/'.$categories_data->category_id.'/'.$categories_data->status); ?>"><?php if($categories_data->status ==1){ echo "Active"; }else{ echo "Pending";} ?></a></td>
      <td><a href="<?php echo base_url(); ?>admin/categories/edit/<?php  echo $categories_data->category_id; ?>"><i class="fa fa-pencil-square-o" style="font-size:18px"></i></a></td>
    </tr>
    <?php $i++; } ?>

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

<script language="JavaScript" type="text/javascript">

function checkDelete(id)
{
return confirm('Are you sure want to delete "'+id +'" category?');
}

</script>



     