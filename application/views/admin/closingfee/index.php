  <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
      <div class="row">
       <div class="col-md-7">
           <h3 class="page-header"><i class="fa fa-list" aria-hidden="true"></i>Closing Fee</h3></div>
          <div class="col-md-5 pull-right">
         <form class="navbar-form" action="<?php echo base_url(); ?>admin/closingfee/search" method="post">
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
              <h3>Closing Fee</h3>
            </header>
            <div class="panel-body">  
              <div><?php echo $this->session->flashdata('message');?></div>
 <a href="<?php echo base_url(); ?>admin/closingfee/create"  class="add_item"><button class="btn btn-primary" type="submit">Add Closing Fee </button></a>
             <div class="clearfix"></div>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>S.NO</th>
                       <th>Product Price</th>
					   <th>Closing Fee</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <?php if(!empty($closingdata)): ?>
                  <tbody>
                    <?php $count = $this->uri->segment(4, 0);
   foreach($closingdata as $closing_data){?>
    <tr>
      <td><?=++$count;?></td>
      <td><?php  echo $closing_data->product_price; ?></td>
	  <td><?php  echo $closing_data->closing_fee; ?></td>
      <td><a href="<?php echo base_url(); ?>admin/closingfee/edit/<?php  echo $closing_data->closing_id; ?>"><i class="fa fa-pencil-square-o" style="font-size:18px"></i></a></td>
      <td><a href="<?php echo base_url(); ?>admin/closingfee/delete/<?php  echo $closing_data->closing_id; ?>" onclick="return checkDelete('<?php  echo $closing_data->closing_fee; ?>')"><i class="fa fa-trash-o" style="font-size:18px"></i></a></td>
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
return confirm('Are you sure want to delete "'+id +'" closingfee?');
}

</script>



     