  <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
      <div class="row">
       <div class="col-md-7">
           <h3 class="page-header"><i class="fa fa-users" aria-hidden="true"></i>Delivery Boys</h3></div>
          <div class="col-md-5 pull-right">
        <form class="navbar-form" action="<?php echo base_url(); ?>admin/deliveryboy/search" method="post">
          <input class="form-control" placeholder="Search" name="search" status="text">
         <button class="btn btn-default" status="submit">Go!</button>
          </form>
            </div></div>
          <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="<?php echo base_url();?>admin/dashboard">Home</a></li>
            <li><i class="fa fa-users" aria-hidden="true"></i>Delivery Boys</li>
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
             <div><?php echo $this->session->flashdata('message');?></div>
              <a href="<?php echo base_url(); ?>admin/deliveryboy/create"  class="add_item"><button class="btn btn-primary" status="submit">Add Delivery Boy</button></a>
                    <div class="clearfix"></div>
              <div class="table-responsive">      
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                       <th>S.NO</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                      <!--<th>Address</th>
                      <th>Bike Name</th>
                      <th>Bike Number</th>
                      <th>License Number</th>-->
                      <th>Photo</th>
                     <!-- <th>Alternate Number</th>
                      <th>Adhar Number</th>
                      <th>Bank Acc Number</th>-->
                      <th>View</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <?php if(!empty($deliveryboydata)): ?>
                  <tbody>
       <?php $count = $this->uri->segment(4, 0);
   foreach($deliveryboydata as $deliveryboy_data){?>

    <tr>

     <td><?= ++$count ?></td>

      <td><?php  echo $deliveryboy_data->deliveryboy_name; ?></td>
      <td><?php  echo $deliveryboy_data->deliveryboy_email; ?></td>
      <td><?php  echo $deliveryboy_data->deliveryboy_mobile; ?></td>
     <!-- <td><?php  echo $deliveryboy_data->deliveryboy_address; ?></td>
      <td><?php  echo $deliveryboy_data->deliveryboy_bike; ?></td>
      <td><?php  echo $deliveryboy_data->deliveryboy_bikeno; ?></td>
      <td><?php  echo $deliveryboy_data->deliveryboy_license; ?></td>-->
      <?php if($deliveryboy_data->deliveryboy_photo == "") {  ?>
      <td><?php echo "N/A" ?></td>

      <?php } else {?>
      <td><img src="<?php echo base_url();?>uploads/deliveryboys/<?php  echo $deliveryboy_data->deliveryboy_photo; ?>" width="80" height="50" /></td>
      <?php } ?>


<!--<td><?php echo $deliveryboy_data->deliveryboy_alternateno; ?></td>
<td><?php echo $deliveryboy_data->deliveryboy_adhar; ?></td>
<td><?php echo $deliveryboy_data->deliveryboy_bank; ?></td>-->

 <td><a href="<?php echo base_url(); ?>admin/deliveryboy/view_details/<?php  echo $deliveryboy_data->deliveryboy_id; ?>"><i class="fa fa-eye" style="font-size:18px"></i></a></td>

 <td><a href="<?php echo base_url(); ?>admin/deliveryboy/edit/<?php  echo $deliveryboy_data->deliveryboy_id; ?>"><i class="fa fa-pencil-square-o" style="font-size:18px"></i></a></td>

      <td><a href="<?php echo base_url(); ?>admin/deliveryboy/delete/<?php  echo $deliveryboy_data->deliveryboy_id; ?>" onclick="return checkDelete('<?php  echo $deliveryboy_data->deliveryboy_name; ?>')"><i class="fa fa-trash-o" style="font-size:18px"></i></a></td>


    </tr>

    <?php } ?>
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

<script language="JavaScript" status="text/javascript">

function checkDelete(id)
{
return confirm('Are you sure want to delete "'+id +'" delivery boy?');
}

</script>



     