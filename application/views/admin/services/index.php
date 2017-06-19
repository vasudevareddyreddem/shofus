 <div class="right_col" role="main">



      <div class="">



        <div class="page-title">



          <div class="title_right pull-right">



            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">



            <form role="form" action="<?php echo base_url(); ?>admin/services/search" method="post">



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

                <h2>Services</h2>

                                <a href="<?php echo base_url(); ?>admin/services/create"><div class="btn btn-primary pull-right">Add Service Details</div></a>

                <ul class="nav navbar-right panel_toolbox">

                  <!--<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>-->

                  <!--<li><a class="close-link"><i class="fa fa-close"></i></a> </li>-->

                </ul>
                <div class="clearfix"></div>

              </div>

              <div><?php echo $this->session->flashdata('message');?></div>

              <div class="x_content table-responsive">

                <table class="table table-bordered">

                  <thead>

                    <tr>

                      <th>S.No</th>
                      <th>Service Name</th>
                      <th>Service Url</th>
                      <th class="text-center">Edit</th>
                      <th class="text-center" >Delete</th>



                    </tr>
                  </thead>
               <?php if(!empty($servicesdata)): ?> 

                  <tbody>

                    <?php $count = $this->uri->segment(4, 0);
   foreach($servicesdata as $services_data){?>

    <tr>

      <td><?= ++$count ?></td>
      <td><?php  echo $services_data->service_name; ?></td>
      <td><?php  echo $services_data->service_url; ?></td>
      <td class="text-center" ><a href="<?php echo base_url(); ?>admin/services/edit/<?php  echo $services_data->service_id; ?>"><i class="fa fa-pencil-square-o" style="font-size:18px"></i></a></td>
      <td class="text-center" > <a href="<?php echo base_url(); ?>admin/services/delete/<?php  echo $services_data->service_id; ?>" onclick="return checkDelete('<?php  echo $services_data->service_name; ?>')"><i class="fa fa-trash" style="font-size:18px"></i></a></td>



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

return confirm('Are you sure want to delete "'+id +'" Service?');

}

</script>



     