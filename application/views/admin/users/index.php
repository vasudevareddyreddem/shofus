  <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
      <div class="row">
       <div class="col-md-7">
           <h3 class="page-header"><i class="fa fa-users" aria-hidden="true"></i>Admin Users</h3></div>
          <div class="col-md-5 pull-right">
         <form class="navbar-form" action="<?php echo base_url(); ?>admin/admin_users/search" method="post">
          <input class="form-control" placeholder="Search" name="search" type="text">
         <button class="btn btn-default" type="submit">Go!</button>
          </form>
            </div></div>
          <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="<?php echo base_url();?>admin/dashboard">Home</a></li>
            <li><i class="fa fa-users" aria-hidden="true"></i>Users</li>
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <section class="panel">
            <header class="panel-heading">
              <h3>Admin Users</h3>
            </header>

            <div class="panel-body">
              <div><?php echo $this->session->flashdata('message');?></div>
   <a href="<?php echo base_url(); ?>admin/users/create"  class="add_item"><button class="btn btn-primary" type="submit">Add Users</button></a>
             <div class="clearfix"></div>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>S.NO</th>
                      <th>Admin Name</th>
                      <th>Admin Email</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <?php if(!empty($users)): ?>
                  <tbody>
                    <?php $i=1;
   foreach($users as $admin_users_data){?>
    <tr>
      <td><?=$i;?></td>
      <td><?php  echo $admin_users_data->admin_name; ?></td>
      <td><?php  echo $admin_users_data->admin_email; ?></td>
      <td><a href="<?php echo base_url(); ?>admin/admin_users/edit/<?php  echo $admin_users_data->admin_id; ?>"><i class="fa fa-pencil-square-o" style="font-size:18px"></i></a></td>
     <!-- <td><a href="<?php // echo base_url(); ?>admin/admin_users/delete/<?php  echo $admin_users_data->admin_id; ?>" onclick="return checkDelete('<?php // echo $admin_users_data->admin_name; ?>')"><i class="fa fa-trash-o" style="font-size:18px"></i></a></td>-->
 <td class="text-center" > <?php if($admin_users_data->admin_id!=1){ ?> <a href="<?php echo base_url(); ?>admin/admin_users/delete/<?php  echo $admin_users_data->admin_id; ?>" onclick="return checkDelete('<?php  echo $admin_users_data->admin_name; ?>')"><i class="fa fa-trash-o" style="font-size:18px"></i></a><?php }else{?> No Action <?php } ?></td>
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
return confirm('Are you sure want to delete "'+id +'" admin user?');
}

</script>



     