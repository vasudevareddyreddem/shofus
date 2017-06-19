  <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
      <div class="row">
       <div class="col-md-7">
           <h3 class="page-header"><i class="fa fa-users" aria-hidden="true"></i>Assign Orders</h3></div>
          <div class="col-md-5 pull-right">
        <form class="navbar-form" action="<?php echo base_url(); ?>admin/assign_orders/search" method="post">
          <input class="form-control" placeholder="Search" name="search" type="text">
         <button class="btn btn-default" type="submit">Go!</button>
          </form>
            </div></div>
          <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="<?php echo base_url();?>admin/dashboard">Home</a></li>
            <li><i class="fa fa-users" aria-hidden="true"></i>Assign Orders</li>
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <section class="panel">
            <header class="panel-heading">
              <h3>Delivery Boys</h3>
            </header>
            <div class="panel-body">  
            <!-- <a href="<?php //echo base_url(); ?>admin/deliveryboy/create"  class="add_item"><button class="btn btn-primary" type="submit">Add Delivery Boy</button></a>-->
                    <div class="clearfix"></div>
                    <div><?php echo $this->session->flashdata('message');?></div>
              <div class="col-md-6 nopaddingRight">
                <h3 class="del_boy">Busy Delivery Boy</h3>
                <div class="table-responsive">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                       <th>S.NO</th>
                      <th>Boy Name</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <?php if(!empty($busydeliveryboysdata)):?>
                  <tbody>
                     <?php $i=1;

   foreach($busydeliveryboysdata as $busydeliveryboys_data){?>

    <tr>

      <td><?=$i;?></td>

      <td><?php  echo $busydeliveryboys_data->deliveryboy_name; ?></td>
      
      <td><?php  echo "busy" ?></td>


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
         
      <!-- page start--> 
      <!-- page end--> 
       <div class="col-md-6 nopaddingRight">
                <h3 class="del_boy">Free Delivery Boys</h3>
                <div class="table-responsive">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                       <th>S.NO</th>
                      <th>Boy Name</th>
                      <th>Current Location</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <?php if(!empty($freedeliveryboysdata)):?>
                  <tbody>
                     <?php $i=1;

   foreach($freedeliveryboysdata as $freedeliveryboys_data){?>

    <tr>

      <td><?=$i;?></td>

      <td><?php  echo $freedeliveryboys_data->deliveryboy_name; ?></td>
      <td><?php  echo $freedeliveryboys_data->current_location; ?></td>
      <td><a href="<?php echo base_url(); ?>admin/assign_orders/assign/<?php echo $freedeliveryboys_data->deliveryboy_id; ?>"><?php  echo "Assign Order" ?></a></td>


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
return confirm('Are you sure want to delete "'+id +'" delivery boy?');
}

</script>



     