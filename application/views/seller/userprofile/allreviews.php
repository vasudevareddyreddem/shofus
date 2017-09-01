<link rel="stylesheet" href="<?php echo base_url(); ?>assets/seller/index/css/star-rating.css" media="all" type="text/css"/>
    <script src="<?php echo base_url(); ?>assets/seller/index/js/star-rating.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/seller/index/js/themes/krajee-fa/theme.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/seller/index/js/themes/krajee-svg/theme.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/seller/index/js/themes/krajee-uni/theme.js" type="text/javascript"></script>

	<style>
.glyphicon-minus-sign::before {
    content: "";
}
.label {
    display:none;
}
.rating-container .filled-stars {
    -webkit-text-stroke: 1px #4cae4c;
    color: #4cae4c;
    text-shadow: 1px 1px #ddd;
    white-space: nowrap;
}
</style>
<div class="content-wrapper mar_t_con">
    <section class="content">
        <?php if($this->session->flashdata('message')): ?>
        <div class="alert dark alert-success alert-dismissible" id="infoMessage">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?php echo $this->session->flashdata('message');?></div>
        <?php endif; ?>
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="card-header-headshot">

                            <a  data-toggle="modal" data-target="#myModal">
                                <span style="position:absolute;position: absolute;top:66px;right:120px;
											background: #207ba5; padding:5px; border-radius:50%;color:#fff;" class="glyphicon glyphicon-edit">
								</span>
                            </a>
                            <?php foreach($profiles as $profile){ ?>
                            <?php if($profile[ 'profile_pic']=="" ) { ?>
                            <div class="user-image">
                                <img style="border-radius:50%; border:4px solid #f4f4f4;" class="img-responsive" src="<?php echo base_url();?>uploads/profile/default.jpg" class="img-circle" height="65" width="65" alt="User Image">
                            </div>
                            <?php } else {?>
                            <div class="user-image">
                                <img style="border-radius:50%; border:4px solid #f4f4f4;" class="img-responsive" src="<?php echo base_url();?>uploads/profile/<?php  echo $profile['profile_pic']; ?>" class="img-circle" height="65" width="65" alt="User Image">
                            </div>
                            <?php } ?>
                            <?php } ?>
                        </div>

                    </div>
                    <div class="card-content">
                        <div class="card-content-member">
                            <h4 class="m-t-0">Your ID:<?php echo ucfirst($personal_deatils['seller_rand_id']); ?></h4>
                            <h4 class="m-t-0">Your Name:<?php echo ucfirst($personal_deatils['seller_name']); ?></h4>
                            <p class="m-0"><i class="pe-7s-map-marker"></i>
                               <?php echo ucfirst($personal_deatils['seller_address']); ?></p>
                        </div>
                        <div class="card-content-languages">

                            <div class="card-content-languages-group">
                                <div>
                                    <h4>Categories</h4>
                                </div>
                                <div>
                                    <ul>
                                        <?php foreach($sellers_cat_display as $cat_data){ ?>
                                        <li>
                                            <?php echo $cat_data->category_name;?>.</li>
                                        <?php }?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="card-footer-stats">
                            <div>
                                <!-- <p class="text-center">Total Orders:
                                        <?php foreach($seller_orders as $order_total){ ?>
                                                    <?php echo $order_total->total_order;?>.                     
                                                    <?php }?> </p> -->
                            </div>
                        </div>
                        <div class="card-footer-message">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-8">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="rating-block">
                            <h4>Average user rating</h4>
                            <h2 class="m-b-20"><?php echo isset($average['avg'])?number_format($average['avg'], 2, '.', ''):''; ?> <small>/ 5</small></h2>
                           	 <input type="text" class="rating rating-loading" value="<?php echo isset($average['avg'])?number_format($average['avg'], 2, '.', ''):''; ?>"  title="">

                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <h4 class="m-t-0">Rating breakdown</h4>
                        <div class="pull-left">
                            <div class="review-number">
                                <div>5 <span class="glyphicon glyphicon-star"></span>
                                </div>
                            </div>
                            <div class="review-progress">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo isset($fivepercentage)?$fivepercentage:''; ?>%">
                                        <span class="sr-only">10% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-number"><?php echo isset($five)?$five:''; ?></div>
                        </div>
                        <div class="pull-left">
                            <div class="review-number">
                                <div>4 <span class="glyphicon glyphicon-star"></span>
                                </div>
                            </div>
                            <div class="review-progress">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo isset($fourpercentage)?$fourpercentage:''; ?>%">
                                        <span class="sr-only">80% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-number"><?php echo isset($four)?$four:''; ?></div>
                        </div>
                        <div class="pull-left">
                            <div class="review-number">
                                <div>3 <span class="glyphicon glyphicon-star"></span>
                                </div>
                            </div>
                            <div class="review-progress">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo isset($threepercentage)?$threepercentage:''; ?>%">
                                        <span class="sr-only">70% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-number"><?php echo isset($three)?$three:''; ?></div>
                        </div>
                        <div class="pull-left">
                            <div class="review-number">
                                <div>2 <span class="glyphicon glyphicon-star"></span>
                                </div>
                            </div>
                            <div class="review-progress">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo isset($twopercentage)?$twopercentage:''; ?>%">
                                        <span class="sr-only">60% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-number"><?php echo isset($two)?$two:''; ?></div>
                        </div>
                        <div class="pull-left">
                            <div class="review-number">
                                <div>1 <span class="glyphicon glyphicon-star"></span>
                                </div>
                            </div>
                            <div class="review-progress">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-violet progress-bar-striped active" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo isset($onepercentage)?$onepercentage:''; ?>%">
                                        <span class="sr-only">50% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-number"><?php echo isset($one)?$one:''; ?></div>
                        </div>
                    </div>
                </div>
                <div class="review-block">
				<?php foreach ($product_review_list as $list){ ?>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="review-block-img">
                                <img src="assets/dist/img/avatar.png" class="img-rounded" alt="">
                            </div>
                            <div class="review-block-name"><a href="#"><?php echo $list['name']; ?></a>
                            </div>
                            <div class="review-block-date"><?php echo isset($list['create_at'])?Date('M d Y',strtotime(htmlentities($list['create_at']))):'';  ?>
                                <br/>
								
								<?php 
								
									$startTimeStamp = strtotime(date('Y-m-d'));
									$endTimeStamp = strtotime(Date('Y-m-d',strtotime(htmlentities($list['create_at']))));
									$timeDiff = abs($endTimeStamp - $startTimeStamp);
									$numberDays = $timeDiff/86400;  // 86400 seconds in one day
									 $numberDays = intval($numberDays);
								?>
								<?php echo $numberDays; ?> day ago</div>
                        </div>
                        <div class="col-sm-9">
                            <div class="review-block-rate">
							<?php if($list['rating']==1){ ?>
                                <button type="button" class="btn btn-success btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
								  <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
								  <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
								  <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
								  <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
							<?php }else if($list['rating']==2){ ?>
								<button type="button" class="btn btn-success btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
								 <button type="button" class="btn btn-success btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
								  <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
								  <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
								  <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
								
							<?php }else if($list['rating']==3){ ?>
								<button type="button" class="btn btn-success btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
								 <button type="button" class="btn btn-success btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
								<button type="button" class="btn btn-success btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
								<button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
								  <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
								
							<?php }else if($list['rating']==4){ ?>
								<button type="button" class="btn btn-success btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
								 <button type="button" class="btn btn-success btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
								<button type="button" class="btn btn-success btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
								<button type="button" class="btn btn-success btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
								  <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
								
							<?php }else if($list['rating']==5){ ?>
								<button type="button" class="btn btn-success btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
								 <button type="button" class="btn btn-success btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
								<button type="button" class="btn btn-success btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
								<button type="button" class="btn btn-success btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
								<button type="button" class="btn btn-success btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
							<?php }else{ ?>
								<button type="button" class="btn btn-success btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
								<button type="button" class="btn btn-success btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
								<button type="button" class="btn btn-success btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
								<button type="button" class="btn btn-success btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
								<button type="button" class="btn btn-success btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>

							<?php } ?>
                               
                            </div>
                            <div class="review-block-description"><?php echo $list['review_content']; ?> </div>
                        </div>
                    </div>
                    <hr/>
				<?php } ?>
			
                  
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Change Profile Pic</h4>
            </div>
            <div class="modal-body">
                <form name="profile_pic" id="profile_pic" action="<?php echo base_url('/seller/user_profile/profile_pic_store'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group nopaddingRight col-md-6 san-lg">
                        <label for="exampleInputFile">Change profile Pic</label>
                        <input type="file" name="picture" id="picture">
                    </div>
					<div class="clearfix"></div>
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </form>
				<div class="clearfix"></div>
            </div>
		
           
        </div>

    </div>
</div>

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