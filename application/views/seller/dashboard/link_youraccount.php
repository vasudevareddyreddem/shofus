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
            <h1>Update</h1>
            <small>Update Your Details</small>
            <ol class="breadcrumb hidden-xs">
                <li><a href="<?php echo base_url('seller/dashboard');?>"><i class="pe-7s-home"></i> Home</a>
                </li>
                <li class="active">Update Your Details</li>
            </ol>
        </div>
    </section>



<form id="personalidetails" name="personalidetails" action="<?php echo base_url('seller/dashboard/accountupdate'); ?>" method="post" >
    <div class="row setup-content">
      <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
          <h3>Link Your Account</h3>
          <div class="form-group">
            <label class="control-label">Bank Account</label>
            <input class="form-control" maxlength="16" placeholder="Enter your Bank Account" type="text" id="bank_account" name="bank_account" >
          </div>         
          <div class="form-group">
            <label class="control-label">Bank Account Name</label>
            <input maxlength="100" type="text" maxlength="12" id="account_name" name="account_name" class="form-control"  />
          </div>
          <div class="form-group">
            <label class="control-label">Bank Account IFSC Code</label>
            <input maxlength="100" type="text"  name="ifsccode" class="form-control" id="ifsccode" />
          </div>
			 <input id="new" type="submit" class="btn btn-primary pull-right " value="Submit">
       </div>
       </div>
       </div>

              </form>

              </div>