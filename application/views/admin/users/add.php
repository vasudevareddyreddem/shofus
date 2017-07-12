<!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
      <div class="row">
       <div class="col-md-7">
           <h3 class="page-header"><i class="fa fa-list" aria-hidden="true"></i></h3></div>
          <div class="col-md-5 pull-right">
         <form class="navbar-form" action="<?php echo base_url(); ?>admin/categories/search" method="post">
          <input class="form-control" placeholder="Search" name="search" type="text">
         <button class="btn btn-default" type="submit">Go!</button>
          </form>
            </div></div>
          <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="<?php echo base_url();?>admin/dashboard">Home</a></li>
            <li><i class="fa fa-list" aria-hidden="true"></i></li>
          </ol>
        </div>
      </div>
      <div class="row">
        
      <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading"> Add User </header>
            <div class="panel-body">
              <form role="form"  id="event_user" name="event_user" onsubmit="return validationcheck();" action="<?php echo base_url('admin/users/insert'); ?>" method="post">
              <div><?php echo $this->session->flashdata('message');?></div>
              <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">First Name</label>
                  <input type="text" name="first_name" placeholder="Enter  First Name" id="first_name" class="form-control">
                  <span style="color:red"> <?php echo form_error('first_name'); ?> </span>
                  <span id="fst_msg" style="color:red"> </span>
              </div>               
                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Last Name</label>
                  <input type="text" name="last_name" placeholder="Enter  Last Name" id="last_name" class="form-control">
                  <span style="color:red"> <?php echo form_error('last_name'); ?> </span>
                  <span id="lst_msg" style="color:red"> </span>
                </div>
                <div class="form-group nopaddingRight col-md-6 san-lg">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="text" name="email_id" placeholder="Enter  Email Address" id="email_id"  class="form-control">
                   <span style="color:red"> <?php echo form_error('email_id'); ?> </span>
                  <span id="email_msg" style="color:red"> </span>            
                </div>
                <div class="form-group nopaddingRight col-md-7">
                  <label for="exampleInputPassword1">Select Role</label>
                  <select class="form-control m-bot15" id="role_id" name="role_id">
                    <option value="">Select Role</option>
                    <?php foreach($roles as $role){ ?>
                    <option value="<?php echo $role['role_id'] ?>"><?php echo $role['role'] ?></option>
                     <?php } ?>
                  </select>
                  <span style="color:red"> <?php echo form_error('role_id'); ?> </span>
                  <span id="role_msg" style="color:red"> </span>
                </div>
                <div class="clearfix"></div>
                <button type="submit" class="btn btn-primary" >Submit</button>
                <button type="submit" class="btn btn-danger" onclick="window.location='<?php echo base_url(); ?>admin/dashboard';return false;">Cancel</button>
              </form>
            </div>
          </section>
        </div>
      </div>
      </section>
      </section>
   <!--    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrapValidator.css"/>
    
    <script src="<?php echo base_url(); ?>assets/dist/js/bootstrapValidator.js"></script>
    <script type="text/javascript">
$(document).ready(function() {
    $('#event_user').bootstrapValidator({
       
        fields: {
      first_name:
          {
            validators: 
            {
              notEmpty: 
              {
                message: 'First name is required'
              },
              
            }
          },
         last_name: {
          validators: {
          notEmpty: {
            message: 'Last Name is required'
          },
          
        }
        },
        email_id: {
          validators: {
          notEmpty: {
            message: 'Email is required'
          },
          regexp: {
        regexp: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
        message: 'Please enter a valid email address. For example johndoe@domain.com.'
        } 
        }
        },
        role_id: {
               validators: {
          notEmpty: {
            message: 'Please select a Role'
          }
        }
            }, 
        }
    });
});
</script> -->

<script type="text/javascript">
function validationcheck(){
  //first name
  var fst_name=document.getElementById('first_name').value;
  //alert(fst_name);die;
  if(fst_name==''){
  jQuery('#fst_msg').html('Plese enter First name');
  $("#fst_msg").focus();
  return false;
  }else{
  jQuery('#fst_msg').html('');  
  }

  //last name
  var lst_name=document.getElementById('last_name').value;
  
  if(lst_name==''){
  jQuery('#lst_msg').html('Plese enter Last name');
  $("#lst_msg").focus();
  return false;
  }else{
  jQuery('#lst_msg').html('');  
  }
  var email=document.getElementById('email_id').value;
  var email_reg = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;



//email 
if(email!=""){

if (!email_reg.test(email)) {
document.getElementById('email_msg').innerHTML="Invalid Email Format";
$("#email_id").focus();
return false;
} 
else{
  document.getElementById('email_msg').innerHTML="";
}
}
else{
document.getElementById('email_msg').innerHTML="Enter the Email";
$("#email_id").focus();
return false;
}


//role
  var role=document.getElementById('role_id').value;
  
  if(role==''){
  jQuery('#role_msg').html('Plese Select Role');
  $("#role_msg").focus();
  return false;
  }else{
  jQuery('#role_msg').html('');  
  }

    
}
</script>