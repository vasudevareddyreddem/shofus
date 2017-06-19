  <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
      <div class="row">
       <div class="col-md-7">
           <h3 class="page-header"><i class="fa fa-list" aria-hidden="true"></i>Delivery Service Fee</h3></div>
          <div class="col-md-5 pull-right">
         <form class="navbar-form" action="<?php echo base_url(); ?>admin/servicefee/search" method="post">
          <input class="form-control" placeholder="Search" name="search" type="text">
         <button class="btn btn-default" type="submit">Go!</button>
          </form>
            </div></div>
          <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="<?php echo base_url();?>admin/dashboard">Home</a></li>
            <li><i class="fa fa-list" aria-hidden="true"></i>Closing Fee</li>
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <section class="panel">
            <header class="panel-heading">
              <h3>Delivery Service Fee</h3>
            </header>
            <div class="panel-body">  
              <div><?php echo $this->session->flashdata('message');?></div>
 <a href="<?php echo base_url(); ?>admin/servicefee/create"  class="add_item"><button class="btn btn-primary" type="submit">Add Delivery Service Fee </button></a>
             <div class="clearfix"></div>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>S.NO</th>
                      
					   <th>Delivery Service Fee</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <?php if(!empty($servicedata)): ?>
                  <tbody>
                    <?php $count = $this->uri->segment(4, 0);
   foreach($servicedata as $service_data){?>
    <tr>
      <td><?=++$count;?></td>
     
	  <td><?php  echo $service_data->service_fee; ?></td>
      <td><a href="<?php echo base_url(); ?>admin/servicefee/edit/<?php  echo $service_data->service_id; ?>"><i class="fa fa-pencil-square-o" style="font-size:18px"></i></a></td>
      <td><a href="<?php echo base_url(); ?>admin/servicefee/delete/<?php  echo $service_data->service_id; ?>" onclick="return checkDelete('<?php  echo $service_data->service_fee; ?>')"><i class="fa fa-trash-o" style="font-size:18px"></i></a></td>
    </tr>
    <?php  } ?>

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
return confirm('Are you sure want to delete "'+id +'" servicefee?');
}

</script>



     