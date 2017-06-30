<style>
.container {
    position: relative;
    width: 50%;
}

.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%)
}

.container:hover .image {
  opacity: 0.3;
}

.container:hover .middle {
  opacity: 1;
}

.text {
  background-color: #4CAF50;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
}
</style> -->

<div class="content-wrapper mar_t_con" >
  <section class="content">
  <?php if($this->session->flashdata('message')): ?>
                <div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button><?php echo $this->session->flashdata('message');?></div>
                <?php endif; ?>
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
      <h1>Dashboard</h1>
      <small>&nbsp;</small>
      <ol class="breadcrumb hidden-xs">
        <li><a href="<?php echo base_url('seller/dashboard');?>"><i class="pe-7s-home"></i> Home</a></li>
        <li><i class="pe-7s-home"></i>Change Profile Pic</a></li>
        
      </ol>
    </div>
  </section>
  <form name="profile_pic" id="profile_pic" action="<?php echo base_url('/seller/user_profile/profile_pic_store'); ?>" method="post" enctype="multipart/form-data">
    <div class="form-group nopaddingRight col-md-6 san-lg">
      <label for="exampleInputFile">Change profile Pic</label>
        <input type="file" name="picture" id="picture">
    </div>
    <button type="submit" class="btn btn-primary pull-left" >Submit</button>
</form>
  
  </section>
  </div>
<script src="<?php echo base_url(); ?>assets/dist/js/bootstrapValidator.js"></script>
 <script type="text/javascript">
$(document).ready(function() {
    $('#profile_pic').bootstrapValidator({       
        fields: {
        picture: {
        validators: {
           notEmpty: {
            message: 'Profile Pic is required'
          },  
          regexp: {
          regexp: /\.(jpe?g|png|gif)$/i,
          message: 'Uploaded file is not a valid image. Only JPG, PNG and GIF files are allowed'
          }
        }
      },
        }
    });
});
</script>