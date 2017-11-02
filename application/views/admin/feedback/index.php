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

            <h2>Feedback</h2>

            

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
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                      <th>Comments</th>
                      <th>Delete</th>

                    </tr>

                  </thead>

                  <?php if(!empty($feedbackdata)): ?> 

                  <tbody>

                   <?php $count = $this->uri->segment(4, 0);

                    foreach($feedbackdata as $feedback_data){?>

                    <tr>

                      <td><?= ++$count ?></td>

                      <td><?php  echo $feedback_data->name; ?></td>
                      <td><?php  echo $feedback_data->email; ?></td>

                      <td class="break-word"  ><?php  echo $feedback_data->phone_no; ?></td>
                      
                      <td><?php  echo $feedback_data->comments; ?></td>

                      <td><a href="<?php echo base_url(); ?>admin/feedback/delete/<?php  echo $feedback_data->feedback_id; ?>" onclick="return checkDelete('<?php  echo $feedback_data->name; ?>')"><center><i class="fa fa-trash" style="font-size:18px"></i></center></a></td>
                     
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
        return confirm('Are you sure want to delete "'+id +'" Feedback?');

      }

    </script>