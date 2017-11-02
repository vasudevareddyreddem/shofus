<?php $this->load->helper('msg_helper');


?>
 <div class="right_col" role="main">

      <div class="">

        <div class="page-title">

          <div class="title_right pull-right">

            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

            <form role="form" action="<?php echo base_url(); ?>admin/bulkorders/search" method="post">

              <div class="input-group">

                <input type="text" name="search" class="form-control" placeholder="Search for...">

                <span class="input-group-btn">

                <button class="btn btn-default" type="submit">Go!</button>

                </span>

                </div>
                </form>

            </div>

          </div>

        </div>

        <div class="clearfix"></div>

        <div class="row">

          <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">

            <div class="x_panel">

              <div class="x_title">

                <h2>Bulk Orders</h2>

                               <!-- <a href="<?php //echo base_url(); ?>admin/bulkorders/create"><div class="btn btn-primary pull-right">Add bulkorders</div></a>-->

                <!--<ul class="nav navbar-right panel_toolbox">

                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>

                  <li><a class="close-link"><i class="fa fa-close"></i></a> </li>

                </ul>-->

                <div class="clearfix"></div>

              </div>
              
           <div><?php echo $this->session->flashdata('message');?></div>

              <div class="x_content table-responsive">

                <table class="table table-bordered">

                  <thead>

                    <tr>
                    <th>S.No</th>
                      <th>Order&nbsp;ID</th>

                      <th>Customer Name</th>

                      <th>Food Item</th>

                      <th>Phone Number</th>

                       <th>Email</th>

                      <th>Address</th>
                      <th>Order Date</th>
                      <th>From Date</th>
                      <th>To Date</th>

                      <th>Status</th>

                      <th>View</th>

                      <th>Edit</th>

                      <th>Delete</th>

                    </tr>

                  </thead>

                  <?php if(!empty($orderdata)): ?> 

                  <tbody>
            <?php $count = $this->uri->segment(4, 0);

					  foreach( $orderdata as $order_data)
              {   ?>

					   <tr>
                    <td><?= ++$count ?></td>
                    <td><?php echo"#";echo $order_data->order_id;?></td>
              
                      <td><?php echo $order_data->user_name;?></td>

                      <td>

                      <?php  //echo $order_data->food_id;
                        $names=getmsgfrom($order_data->food_id);
              //echo "<pre>";print_r($names); exit;
            $item_qty=explode(",",$order_data->food_qty); 
            $j=0;
              foreach($names as $name_list )
            { 
            echo $name_list->food_name."-".$item_qty[$j]." <br>" ;
             $j++; 
          }
           
           
//print_r($name_list);exit;
             ?>
                         </td>

                      <td><?php echo $order_data->phone;?></td>

                      <td><?php echo $order_data->email;?></td>

                      <td><?php echo $order_data->address;?></td>
                      <td style="width:23% !important"><?php $oldformat=$order_data->ordertime; if($oldformat!='week' && $oldformat!='month'){ echo $newDate = date("d-m-Y", strtotime($oldformat));}else{echo $oldformat;}?></td>
                      <td><?php if($order_data->fromdate==""){ echo "N/A";}else{echo $order_data->fromdate;}?></td>
                      <td><?php if($order_data->todate==""){ echo "N/A";}else{echo $order_data->todate;}?></td>

                       <td style="color:<?php if($order_data->order_status==0)
                       {
                        echo "#6A1B0B";
                        }
                        if($order_data->order_status==1)
                       {
                        echo "Orange";
                        }
                        if($order_data->order_status==2)
                       {
                        echo "Green";
                        }
                        if($order_data->order_status==3)
                       {
                        echo "Red";
                        }?>;font-weight:bold"">

                       <?php 
                       if($order_data->order_status==0)
                       {
                        echo "Pending..";
                        }
                        if($order_data->order_status==1)
                       {
                        echo "In-progress";
                        }
                        if($order_data->order_status==2)
                       {
                        echo "Delivered";
                        }
                        if($order_data->order_status==3)
                       {
                        echo "Rejected";
                        }

                        ?>
                          
                        </td>

                      <td><a href="<?php echo base_url(); ?>admin/bulkorders/view/<?php  echo $order_data->order_id; ?>"><i class="fa fa-eye" style="font-size:18px"></i></a></td>

                      <td><a href="<?php echo base_url(); ?>admin/bulkorders/edit/<?php  echo $order_data->order_id; ?>"><i class="fa fa-pencil-square-o" style="font-size:18px"></i></a></td>

                      <td><a href="<?php echo base_url(); ?>admin/bulkorders/delete/<?php  echo $order_data->order_id; ?>" onclick="return checkDelete('<?php  echo $order_data->order_id; ?>')"><i class="fa fa-trash" style="font-size:18px"></i></a></td>

					  </tr>

					  <?php }?>

                  
                  </tbody>

                  <?php else: ?>
                    <center><strong>No Records Found</strong></center>
                  <?php endif; ?>

                </table>

              </div>

            </div>

          </div>

          <center><?= $this->pagination->create_links(); ?></center>

          <div class="clearfix"></div>

        </div>

      </div>

    </div>

	<script>

	function checkDelete(id)

{

  

return confirm('Are you sure want to delete "'+id +'" Order?');

}

</script>