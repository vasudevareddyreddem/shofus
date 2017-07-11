  <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
      <div class="row">
       <div class="col-md-7">
           <h3 class="page-header"><i class="fa fa-users" aria-hidden="true"></i>Users</h3></div>
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
              <h3>Users</h3>
            </header>
            <div class="panel-body">
              <div><?php echo $this->session->flashdata('message');?></div>
   <a href="<?php echo base_url(); ?>admin/users/create"  class="add_item"><button class="btn btn-primary" type="submit">Add User</button></a>
             <div class="clearfix"></div>
             <?php if(!empty($users)): ?>
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>S.NO</th>
                      <th>User Name</th>
                      <th>User Email</th>                      
                    </tr>
                  </thead>                  
                  <tbody>
                    <?php $i=1;
    foreach($users as $user){?>
    <tr>
      <td><?=$i;?></td>
      <td><?php echo $user->cust_firstname; ?></td>
      <td><?php echo $user->cust_email; ?></td>      
    <?php $i++; } ?>
                  </tbody>
                   <?php else: ?>
              <center>
                <strong>No Records Found</strong>
              </center>

              <?php endif; ?>
                </table>
                
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

  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>



     