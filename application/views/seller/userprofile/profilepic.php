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
</style>

<div class="content-wrapper mar_t_con" >
  <section class="content">
  <!-- <div><?php echo $this->session->flashdata('message');?></div> -->
  <form name="profilepic" id="profilepic" action="<?php echo base_url('/seller/user_profile/profile_pic_store'); ?>" method="post" enctype="multipart/form-data">
<?php foreach($profiles as $profile){ ?>
                                <?php if($profile['profile_pic'] == "") {  ?>
                                <div class="container">
								  <img src="<?php echo base_url();?>uploads/profile/default.jpg" alt="Avatar" class="image" style="width:100%">
								  <div class="middle">
								  <h2>Change Profile Pic</h2>
								    <input type="file" name="picture" id="picture">
								  </div>
								</div>
                          <?php } else {?>
                          <div class="container">
								  <img src="<?php echo base_url();?>uploads/profile/<?php  echo $profile['profile_pic']; ?>" alt="Avatar" class="image" style="width:100%">
								  <div class="middle">
								  <h2>Change Profile Pic</h2> 
								    <input type="file" name="picture" id="picture">
								  </div>
								</div>
                                <?php } ?>
                                <?php } ?>
                <button type="submit" class="btn btn-primary pull-right" >Submit</button>
</form>
  
  </section>
  </div>