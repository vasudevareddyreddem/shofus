<div class="content-wrapper mar_t_con">

    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <form action="#" method="get" class="sidebar-form search-box pull-right hidden-md hidden-lg hidden-sm">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn"><i class="fa fa-search"></i></button>
          </span>
                </div>
            </form>
            <h1>Account</h1>
            <small>Link Your Account</small>
            <ol class="breadcrumb hidden-xs">
                <li><a href="<?php echo base_url('seller/dashboard');?>"><i class="pe-7s-home"></i> Home</a>
                </li>
                <li class="active">Link Your Account</li>
            </ol>
        </div>
    </section>
    <!-- <?php foreach($bank_link as $bank) { ?> -->

<!-- <?php }?> -->
  



<form id="linkaccount" name="linkaccount" action="<?php echo base_url('seller/dashboard/accountupdate'); ?>" method="post" >
    <div class="row setup-content">
      <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
          <h3>Link Your Account</h3>
          <!-- <?php if($bank_link['bank_complete']==0) { ?>
          <p>success</p>

          <?php  } else {?>
          <p>fail</p>
          <?php } ?> -->
          

          <div class="form-group">
            <label class="control-label">Bank Account</label>
            <input class="form-control" maxlength="16" placeholder="Enter your Bank Account" type="text" id="bank_account" name="bank_account" >
          </div>         
          <div class="form-group">
            <label class="control-label">Bank Account Name</label>
            <input maxlength="100" type="text" placeholder="Enter your Bank Account Name" maxlength="12" id="account_name" name="account_name" class="form-control"  />
          </div>
          <div class="form-group">
            <label class="control-label">Bank Account IFSC Code</label>
            <input maxlength="100" type="text"  name="ifsccode" placeholder="Enter your Bank Account IFSC Code" class="form-control" id="ifsccode" />
          </div>
			 <input id="new" type="submit" class="btn btn-primary pull-right " value="Submit">
       </div>
       </div>
       </div>

              </form>

              </div>

              
              
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrapValidator.css"/>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/seller/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/bootstrapValidator.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#linkaccount').bootstrapValidator({
       
        fields: {
      bank_account:
          {
            validators: 
            {
              notEmpty: 
              {
                message: 'Bank Account is required'
              },
              regexp: 
              {
               regexp:  /^[0-9]{9,16}$/,
               message:'Bank Account  must be 9 to 16 digits'
              }
            }
          },
         account_name: {
          validators: {
          notEmpty: {
            message: 'Account Name is required'
          },
          regexp: {
          regexp: /^[a-zA-Z. ]+$/,
          message: 'Account Name can only consist of alphanumaric, space and dot'
          }
        }
        }, 
    ifsccode: {
          validators: {
          notEmpty: {
            message: 'IFCS Code is required'
          },
          regexp: {
          regexp: /^[A-Za-z0-9]{4}\d{7}$/,
          message: 'IFCS Code must be alphanumaric'
          }
        }
        }

     
    
        }
    });
});
</script>