 <div class="right_col" role="main">

  <div class="">

    <div class="page-title">

      <div class="title_right pull-right">

        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

        <form role="form" action="<?php echo base_url(); ?>admin/fooditems/search" method="post">

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

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="x_panel">

          <div class="x_title">

            <h2>Products</h2>

            <a href="<?php echo base_url(); ?>admin/fooditems/create"><div class="btn btn-primary pull-right">Add Items</div></a>

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

                      <th>Item Name</th>
                      <th>Type</th>

                      <th>Description</th>

                      <th>Item cost</th>

                      <th>Image</th>
                      <th>Status</th>



                      <th>Edit</th>

                      <th>Delete</th>

                    </tr>

                  </thead>

                  <?php if(!empty($fooddata)): ?> 

                  <tbody>

                   <?php $count = $this->uri->segment(4, 0);

                    foreach($fooddata as $food_data){?>

                    <tr>

                      <td><?= ++$count ?></td>

                      <td><?php  echo $food_data->food_name; ?></td>
                      <td><?php  echo $food_data->type; ?></td>

                      <td class="break-word"  ><?php  echo $food_data->food_discription; ?></td>



                      <td><?php  echo $food_data->food_charges." "."Rupees"; ?></td>

                      <td><img src="<?php echo base_url();?>uploads/hospital/<?php  echo $food_data->food_image; ?>" width="80" height="50" /></td>


                      <td style="color:<?php  if($food_data->status==1){echo "Green";}else{echo "red";} ?>;font-weight:bold">
                      <?php  if($food_data->status==1){echo "Available";}else{echo "Unavailable";} ?></td>
                      <td><a href="<?php echo base_url(); ?>admin/fooditems/edit/<?php  echo $food_data->food_id; ?>"><i class="fa fa-pencil-square-o" style="font-size:18px"></i></a></td>

                      <td><a href="<?php echo base_url(); ?>admin/fooditems/delete/<?php  echo $food_data->food_id; ?>" onclick="return checkDelete('<?php  echo $food_data->food_name; ?>')"><i class="fa fa-trash" style="font-size:18px"></i></a></td>

                    </tr>

                    <?php } ?>

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

    <script language="JavaScript" type="text/javascript">

      function checkDelete(id)

      {



        return confirm('Are you sure want to delete this item "'+id +'" ?');

      }

    </script>
    <style>
	.break-word {
 word-break: break-all !important;
}
	</style>