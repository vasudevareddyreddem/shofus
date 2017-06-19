<div class="right_col" role="main">

  <div class="">

    <div class="page-title">

      <div class="title_right pull-right">

        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

          <div class="input-group">

            <input type="text" class="form-control" placeholder="Search for...">

            <span class="input-group-btn">

              <button class="btn btn-default" type="button">Go!</button>

            </span>

          </div>

        </div>

      </div>

    </div>

    <div class="clearfix"></div>

    <div class="row">

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="x_panel">

          <div class="x_title">

            <h2>Food Items</h2>

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

                      <th>Sr.No</th>

                      <th>Item Name</th>
                      <th>Type</th>

                      <th>Discription</th>

                      <th>Item cost</th>

                      <th>Image</th>
                      <th>Status</th>



                      <th>Edit</th>

                      <th>Delete</th>

                    </tr>

                  </thead>

                  <tbody>

                    <?php $i=1;

                    foreach($fooddata as $food_data){?>

                    <tr>

                      <td><?=$i;?></td>

                      <td><?php  echo $food_data->food_name; ?></td>
                      <td><?php  echo $food_data->type; ?></td>

                      <td><?php  echo $food_data->food_discription; ?></td>



                      <td><?php  echo $food_data->food_charges." "."Rupees"; ?></td>

                      <td><img src="<?php echo base_url();?>uploads/hospital/<?php  echo $food_data->food_image; ?>" width="80" height="50" /></td>


                      <td style="color:<?php  if($food_data->status==1){echo "Green";}else{echo "red";} ?>;font-weight:bold">
                      <?php  if($food_data->status==1){echo "Available";}else{echo "Unavailable";} ?></td>
                      <td><a href="<?php echo base_url(); ?>admin/fooditems/edit/<?php  echo $food_data->food_id; ?>"><i class="fa fa-pencil-square-o" style="font-size:18px"></i></a></td>

                      <td><a href="<?php echo base_url(); ?>admin/fooditems/delete/<?php  echo $food_data->food_id; ?>" onclick="return checkDelete('<?php  echo $food_data->food_name; ?>')"><i class="fa fa-trash" style="font-size:18px"></i></a></td>

                    </tr>

                    <?php $i++; } ?>

                  </tbody>

                </table>

              </div>

            </div>

          </div>

          <div class="clearfix"></div>

        </div>

      </div>

    </div>

    <script language="JavaScript" type="text/javascript">

      function checkDelete(id)

      {



        return confirm('Are you sure want to delete "'+id +'" hospital?');

      }

    </script>