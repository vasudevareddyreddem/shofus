    <!--main content start-->
    <?php //print_r($newordersdata);?>
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
      <div class="row">
       <div class="col-md-7">
           <h3 class="page-header"><i class="fa fa-users" aria-hidden="true"></i>New Orders</h3></div>
          <div class="col-md-5 pull-right">
        <form class="navbar-form" action="<?php echo base_url(); ?>admin/new_orders/search" method="post">
          <input class="form-control" placeholder="Search" name="search" type="text">
         <button class="btn btn-default" type="submit">Go!</button>
          </form>
            </div></div>
          <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="<?php echo base_url();?>admin/dashboard">Home</a></li>
            <li><i class="fa fa-users" aria-hidden="true"></i>New Orders</li>
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <section class="panel">
            <header class="panel-heading">
              <h3>New Orders</h3>
            </header>
            <div class="panel-body">  
            <!-- <a href="<?php //echo base_url(); ?>admin/deliveryboy/create"  class="add_item"><button class="btn btn-primary" type="submit">Add Delivery Boy</button></a>-->
                    <div class="clearfix"></div>
                    <div><?php echo $this->session->flashdata('message');?></div>
              <div class="col-md-6 nopaddingRight">
                <h3 class="del_boy">New Orders</h3>
                <div class="table-responsive">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                       <th>S.NO</th>
                      <th>Order Id</th>
                      <th>Shop / Pick-up Address</th>
                      <th>View</th>
                      <th>Status</th>
                      <th>Assign orders</th>
                    </tr>
                  </thead>
                  <?php if(!empty($newordersdata)):?>
                  <tbody>
                     <?php $i=1;
//echo "<pre>";print_r($newordersdata);exit;
   foreach($newordersdata as $neworders_data){
    if($neworders_data->order_status=='0'){
		
		//echo "<pre>";print_r($newordersdata);exit;
?>

    <tr>

      <td><?=$i;?></td>
     
       <td><?php  echo $neworders_data->order_id; ?></td>
       <td><?php  echo $neworders_data->seller_name; ?></br> <?php  echo $neworders_data->seller_address; ?></td>
      
       <td><a href="<?php echo base_url('admin/new_orders/view_detail/'.$neworders_data->order_id); ?>" target="_blank"><i class="fa fa-eye" style="font-size:18px"></i></a></td>
      
      <td class="text-center" style="color:<?php  if( $neworders_data->order_status=='' || $neworders_data->order_status=='0' ){echo "Red";}elseif($neworders_data->order_status=='1'){echo "Blue";}elseif($neworders_data->order_status=='2'){echo "Brown";}elseif($neworders_data->order_status=='3'){echo "Green";}

         else{echo "Orange";} ?>;font-weight:bold">

        <?php  

        if($neworders_data->order_status=='' || $neworders_data->order_status=='0'){echo "Not Assigned";}
        elseif($neworders_data->order_status=='1'){ ?> <?php echo "Assigned";  } 
         elseif($neworders_data->order_status=='2'){ ?><?php echo "In-Progress";   }
         elseif($neworders_data->order_status=='3'){ ?> <?php echo "Delivered";   }
        else{
          echo "N/A";
        }
        ?>

        </td>         

<td><span onclick="assignorders(<?php echo $neworders_data->order_id ?>,<?php echo $neworders_data->seller_id?>)">AssignToDelivery</span></td>
    </tr>

    <?php $i++; }
    }
     ?>
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
                <h3 class="del_boy">Delivery Boys</h3>
                <div class="table-responsive" id="dBoys">
                  





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
function assignorders(oid,sid){
 /* alert(oid);
  alert(sid);*/

$.ajax
({
 
type: "POST",
 url: "<?php echo base_url();?>admin/orders/assign",
data: {orderid:oid,sellerid:sid},
cache: false,
success: function(data)
{
 
  //alert(data);
  $("#dBoys").html(data);
  
//location.reload();
//window.location.href="<?php echo base_url(); ?>";
} 
})
//alert("hi");
}
</script>



     