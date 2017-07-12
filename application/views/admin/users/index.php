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
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>User Name</th>
                      <th>User Email</th>                      
                      <th>Role</th>                      
                      <th>Action</th>                      
                    </tr>
                  </thead>                  
                  <tbody>
						<?php 
						foreach($users as $user){?>
						<tr>
						<td><?php echo $user['cust_firstname'].' '.$user['cust_lastname']; ?></td>
						<td><?php echo $user['cust_email']; ?></td>
						<td><?php echo $user['role']; ?></td>
						<td><a onclick="deactive('<?php echo base64_encode(htmlentities($user['customer_id'])).'__'.base64_encode(htmlentities($user['status']));?>');" href="javascript:void(0)" style="text-decoration:none;" id="view" data-toggle="modal"  data-target="#exampleFormModal"><?php if(htmlentities($user['status'])==0){ echo "Deactivate";}else{ echo "Activate";} ?></a>
</td>					
</tr>
						<?php } ?>
                  </tbody>
			 
            
                </table>
                
              </div>
            </div>
            </div>
          </section>
        </div>
  <div tabindex="-1" role="dialog" aria-labelledby="exampleFormModalLabel" id="exampleFormModal" class="modal fade" style="display: none;" aria-hidden="true">
		<div class="modal-dialog modal-content" style="margin:27px;">
			<div class="modal-header">
			  <button aria-label="Close" data-dismiss="modal" class="close" type="button">
				<span aria-hidden="true">×</span>
			  </button>
			  <h4 id="exampleFormModalLabel" class="modal-title">Confirmation</h4>
			</div>
			<div class="modal-body">
			<div class="alert alert-danger alert-dismissible" id="errormsg" style="display:none;"></div>
			  <div class="row">
				<div id="content1" class="col-xs-12 col-xl-12 form-group">
				Are you sure ? 
				</div>
				<div class="col-xs-6 col-md-6">
				  <button type="button" aria-label="Close" data-dismiss="modal" class="btn  blueBtn">Cancel</button>
				</div>
				<div class="col-xs-6 col-md-6">
                <a href="/=value" class="btn  blueBtn popid" style="text-decoration:none;float:right;"> <span aria-hidden="true">Ok</span></a>
				</div>
			 </div>
		  </div>
	</div>
</div>
      <!-- page start--> 
      <!-- page end--> 
    </section>
  </section>
  <!--main content end--> 

<script language="JavaScript" type="text/javascript">
function deactive(id){
	$(".popid").attr("href","<?php echo base_url('admin/users/delemp'); ?>"+"?id="+id);
}
</script>



     