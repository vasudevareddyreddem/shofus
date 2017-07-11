  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
			<div class="container">
				 <!-- Main content -->
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
        <?php if($this->session->flashdata('dashboard')): ?>  
      <div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button><?php echo $this->session->flashdata('dashboard');?></div>
      <?php endif; ?>
      <?php if($this->session->flashdata('sucesss')): ?>  
      <div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button><?php echo $this->session->flashdata('sucesss');?></div>
      <?php endif; ?>
        
        <div class="col-md-8 col-md-offset-2" style="margin-top:100px">
          <!-- general form elements -->
          <h1>Dashboard</h1>  
          </div>
          </div>
		  
		
			</div>

  </div>
  </div>
  <!-- /.content-wrapper -->

  