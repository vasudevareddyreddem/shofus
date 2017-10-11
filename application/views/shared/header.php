<!--wrapper start here -->
<style>
 .hi {
  color: green;
}
#locationarea_chosen{
	width:350px !important;
}
 .chosen-container-multi .chosen-choices .search-choice .search-choice-close {
     background: url("<?php echo base_url();?>assets/home/images/close.png") right top no-repeat;
      display: block;
      font-size: 1px;
      height: 10px;
      position: absolute;
      right: 4px;
      top: 7px;
      width: 12px;
      cursor: pointer; }
	  .affix{
	top:0;
}

 
  .login-or {
    position: relative;
    font-size: 18px;
    color: #aaa;
    margin-top: 10px;
            margin-bottom: 10px;
    padding-top: 10px;
    padding-bottom: 10px;
  }
  .span-or {
    display: block;
    position: absolute;
    left: 50%;
    top: -2px;
    margin-left: -25px;
    background-color: #fff;
    width: 50px;
    text-align: center;
  }
  .hr-or {
    background-color: #cdcdcd;
    height: 1px;
    margin-top: 0px !important;
    margin-bottom: 0px !important;
  }
  h3 {
    text-align: center;
    line-height: 300%;
  }
  
</style>

<div class="sidebar_right" >
			<ul style="padding:0 ">
				
				<div class="clearfix"></div>
				<?php //echo '<pre>';print_r($sidecaregory_list);exit; ?>
				<?php foreach ($sidecaregory_list as $categories){ ?>
				<?php if($categories['category_image']==''){ ?>
				<li  class=" spin ">
					<a  href="<?php echo base_url('category/subcategoryview/'.base64_encode($categories['category_id'])); ?>" class="menu_ti2  ">
					    <span class="menu_tit"><?php echo $categories['category_name'] ; ?></span>
					</a>
				</li>
				<div class="clearfix"></div>
				<?php }else{ ?>
				<li  class=" spin ">
					<a  href="<?php echo base_url('category/subcategoryview/'.base64_encode($categories['category_id'])); ?>" class="menu_ti2  ">
						<span ><img  class=" circ_icon" src="<?php echo base_url('assets/categoryimages/'.$categories['category_image']); ?>" /></span>
					    <span class="menu_tit"><?php echo $categories['category_name'] ; ?></span>
					</a>
				</li>
				<div class="clearfix"></div>
				<?php } ?>
				<?php } ?>
				
				<!--<li id="hover_li" class=" spin ">-->
				<li id="" class=" spin ">
					<a  class="menu_ti2  ">
						<span   ><img class=" circ_icon"src="<?php echo base_url(); ?>assets/home/images/more_cat.png" />
						</span>
						<span style="position:relative" class="menu_tit">More Categories
						<span style="position:absolute;top:0;left:20px;font-size:12px;">Coming Soon</span>
						</span>
					</a>
					<ul id="left_box" class="right_cust" style="display:none">
						
						
							<div class="col-md-3">
								<ul style="background-color:#fff;" class="list_cat">
								<?php foreach ($allcategories_list as $categories){ ?>
								
								<li  ><a href="<?php echo base_url('category/subcategoryview/'.base64_encode($categories['category_id'])); ?>" style="color:#666; background-color:#fff;"><?php echo $categories['category_name'] ; ?></a></li>
									
								<?php } ?>
									
								</ul>
							</div>
						</div>
					</ul>
				</li>
				<div class="clearfix"></div>
			
				
				
				
				
			</ul>
</div>
<div class="wrapper"> 
  <!--header part start here -->
  <div class="jain_container">
    <nav class="navbar navbar-default nav_cus" role="navigation">
	<div class="top-navbar sm_hide" style="color:#fff;">
    <div class="container-fluid" style="padding:0 40px">
      <div class=" row">
        <div class="social-media pull-left" > Stay connected:
          <ul>
            <li><a href="#" class=""><span class=""><i class="" aria-hidden="true"><img src="<?php echo base_url(); ?>assets/home/images/fb.png" /></i></span></a></li>&nbsp;
            <li><a href="#" class=""><span class=""><i class="" aria-hidden="true"><img src="<?php echo base_url(); ?>assets/home/images/gmai.png" /></i></span></a></li>&nbsp;
            <li><a href="#" class=""><span class=""><i class="" aria-hidden="true"><img src="<?php echo base_url(); ?>assets/home/images/tiw.png" /></i></span></a></li>
           
          </ul>
        </div>  
		<div class="top-menu pull-right " > 
          <ul>
            <li>
				<a style="paddings-top:10px;color:#fff;" class="tel" target="_blank" href="<?php echo base_url('seller/login');?>"><span class=""></span> &nbsp; Sale with us </a>
			</li>&nbsp;
            <li>
				<a class="tel" href="<?php echo base_url('customer/trackorders');?>"><span class=""><img src="<?php echo base_url(); ?>assets/home/images/track.png" /></span> &nbsp; Track your order </a></li>&nbsp;
            <li>
				<a class="" href="mailto:support@cartinhours.com"><i><span style="font-size:16px;top:5px" class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;</i>support@cartinhours.com</a>
			</li>
           
          </ul>
        </div> 
		
      </div>
    </div>
  </div>
      <div class="container1 container-fluid hm_nav">
        <div class="navbar-header pull-left" style="padding-right:50px;">
			  <!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <i class="icon-menu"></i> Menu </button>-->
			  <a class="navbar-brand" href="<?php echo base_url(); ?>" data-toggle="popover" title="Cartinhours" data-content="header"> <img src="<?php echo base_url(); ?>assets/home/images/logo.png" /></a>
		  </div>
        <div class="pull-left searc_width" >
          <div class=" navbar-collapse" >
          <!--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">-->
            <div class="row">
            <div  >
			<div class="form-horizontal form-horizontal_x">
                  <div class=" smallsearch">
                    <div class="cart_search">
                      <input id="" onkeyup="searchfunction(this.value);" class="flipkart-navbar-input col-xs-11"  placeholder="Search for Products, Brands and more" autocomplete="off" spellcheck="false">
                      <button class="flipkart-navbar-button col-xs-1 pull-right"> <i class="fa fa-search font_si" aria-hidden="true"></i></button>
                    </div>
					<div style="display:none;" class="search_fun" id="addingdropdown"></div>
					
                  </div>
                </div>
              </div>
			
            </div>
          </div>
        </div>
		
		  <div class="clearfix hide_clear" style="padding-bottom:10px;"></div>
		  <div class="medias list_ad ">
		  
		  <?php if($this->session->userdata('userdetails')){ ?>
		  <span class="medias user_log">
				<a ><i><img src="<?php echo base_url(); ?>assets/home/images/userr.png" /></i>
				<p><?php echo $details['cust_firstname'].' '.$details['cust_lastname']; ?></p>
				</a>
						
			</span>
			<div id="user_sow" style="display:none;">
							<ul class="log_list" >
								<span class="top_fix_niv glyphicon glyphicon-triangle-top"></span>
								<li class="font_list"><a href="<?php echo base_url('customer/account');?>">  <span >My Account</span> </a></li>
								<li class="font_list"><a href="<?php echo base_url('customer/cart');?>">  <span >My Cart</span> </a></li>
								<li class="font_list"><a href="<?php echo base_url('customer/orders');?>">  <span >My Orders</span> </a></li>
								<li class="font_list"><a href="<?php echo base_url('customer/trackorders');?>">  <span >Track</span> </a></li>
								<li class="font_list"><a href="<?php echo base_url('customer/wishlist'); ?>">  <span >My Wishlist</span> </a></li>
								<li class="font_list"><a href="<?php echo base_url('customer/changepassword');?>">  <span >Change Password</span> </a></li>
								<li class="font_list"><a href="<?php echo base_url('customer/logout');?>">  <span >Logout</span> </a></li>
							</ul>
			</div>
		  <?php }else{ ?>
			<span class="medias user_log text-center">
			<a href="<?php echo base_url('customer'); ?>" ><i class="" aria-hidden="true">
			</i><img src="<?php echo base_url(); ?>assets/home/images/userr.png" />
			<p>Sign Up/Sign In</p></a>
			</span>
		  <?php } ?>
			
			<span class="medias text-center"><a href="javascript:void(0);" onclick="locationopenpopup();" ><i class="" aria-hidden="true" data-toggle="tooltip" title="Change Your Location Here" ><img  src="<?php echo base_url(); ?>assets/home/images/location.png" /></i>
				<p>Location</p></a>
			</span></a></span>
			
			<?php if($this->session->userdata('userdetails')){ ?>
			<span class="medias text-center shopping_cart" style="position:relative;"><a href="<?php echo base_url('customer/cart'); ?>"><i class="" aria-hidden="true"><img src="<?php echo base_url(); ?>assets/home/images/cart.png" /></i>
				<p>Cart</p></a>
				<?php if(count($cartitemcount)>0){ ?>
						<span id="supcount" style="position:absolute;top:-10px;right:0px;font-size:12px;border:1px solid #45b1b9;padding:0px 4px;border-radius:25%;color:#45b1b9">
					<?php echo count($cartitemcount); ?>
						<?php
						}else{ 
						echo "";
						}?>
				
				</span>
			</span>

			<?php }else{ ?>
			<span class="medias text-center shopping_cart" style="position:relative;"><a href=" <?php echo base_url('customer'); ?>"><i class="" aria-hidden="true"><img src="<?php echo base_url(); ?>assets/home/images/cart.png" /></i>
				<p>Cart</p></a>
				<span style="position:absolute;top:-5px;right:-5px;font-size:12px"></span>
			</span>
			<?php } ?>	
			<span class="medias text-center"><a href="<?php echo base_url('customer/nearstores'); ?>"><i class="" aria-hidden="true"><img src="<?php echo base_url(); ?>assets/home/images/store.png" /></i>
				<p>Near by stores</p></a>
			</span>
		 </div>
	</div>
	  <div class="top-navbar1">
    <div class="container">
      <?php if(count($qucikjump)>0){ ?>
      <div class=" row qucik_jmp">
	  
		  <ul class="navbar_1"><li><span style="color:#555">Quick Jump to </span></li>
		  <?php foreach($qucikjump as $list){ ?>
		  <?php //echo '<pre>';print_r($list);exit; ?>
			  <li><a href="<?php echo base_url('category/subcategoryview/'.base64_encode($list['category_id']).'/'.base64_encode('quick').'/'.base64_encode($list['subcategory_id']));?>"><?php echo $list['subcategory_name']; ?></a></li>
		  <?php } ?>
			
			
		</ul>
	  </div>
	<?php } ?>
	 
    </nav>
	
	 

	
	<!-- end popup start here -->   

<div id="fademaskpurpose"  class="mask_hide"></div>
<div class="loc_pop_cus" id="removepopuplocation" style="display:none;">
	<div style="position:absolute;top:-16px;left:58%" > <i class="fa fa-sort-asc " style="font-size:40px;color:#fff;" aria-hidden="true"></i></div>
	<div class="main" style="width:400px;">
      <div class="row">
        <div class="">
			<div class="form-group">
				<form id="form1" action="<?php echo base_url(''); ?>" method="post">

			  <label for="sel1">Select Your Delivery Location:</label>
			  <input type="hidden" type="">
				<select onchange="document.getElementById('form1').submit()" name="locationid" id="locationid" class="validate-select sel_are">
				<option value="">Select Area </option>
				<?php foreach($locationdata as $location_data) {?>
				<option value="<?php echo $location_data['location_id']; ?>"><?php echo $location_data['location_name']; ?></option>

				<?php } ?>
				</select>
				
				</form>
			</div> 
        </div>
       
      </div>
      <div class="login-or">
        <hr class="hr-or">
        <span class="span-or">or</span>
      </div>

		 <form  onSubmit="return validations();" action="<?php echo base_url('customer/locationsearch'); ?>" method="post">
        <div class="form-group">
          <label for="inputUsernameEmail">Select Your  Shop location</label></br>
		  <span id="locationmsg"></span>
		
			<div id="selectedlocation"><?php echo $this->session->userdata('location_area'); ?> </div>

	
          <select data-placeholder="select your nearest area"  name="locationarea[]" id="locationarea" multiple  class="chosen-select" tabindex="1">
              <option value=""></option>
              <?php foreach($locationdata as $location_data) {?>
			  <option value="<?php echo $location_data['location_id']; ?>"><?php echo $location_data['location_name']; ?></option>
          	<?php }  ?>
            </select>
			<div class="clearfix">&nbsp;</div>
			<button type="submit" id="formsubmmition" class="btn btn-primary btn-block">Submit</button>
        </div>
      </form>
    </div>
	</div>

 


<!-- the overlay element --> 
<script src="<?php echo base_url(); ?>assets/customer/js/select.js"></script>
    <script>
      $(function() {
        $('.chosen-select').chosen();
        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
      });
    </script>
<script src="<?php echo base_url(); ?>assets/home/js/classie.js"></script> 
<script src="<?php echo base_url(); ?>assets/home/js/modalEffects.js"></script> 
<script src="<?php echo base_url(); ?>assets/home/js/chosen.js"></script> 
<script type="text/javascript">

$("#fademaskpurpose").addClass("mask_hide");
function locationopenpopup (){
$('#removepopuplocation').show();
$("#fademaskpurpose").removeClass("mask_hide");
}
 $(document).ready(function(){
	closepopup (); 
 });
function closepopup (){
	$('#location_seacrh').hide();
}
function validations(){
	var areaids=document.getElementById('locationarea').value;
	if(areaids==''){
		$("#locationmsg").html("Please select a Shop location").css("color", "red");
		return false;
	}else{
		$("#locationmsg").html("");
		return true;
	}

}



function searchfunction(val){
	$('#addingdropdown').hide();
	$('#addingdropdown').empty();
	var length=val.length;
	if(length >=1){
	
		jQuery.ajax({
			url: "<?php echo site_url('home/search_functionality');?>",
			type: 'post',
			data: {
				form_key : window.FORM_KEY,
				searchvalue: val,
				},
			dataType: 'html',
			success: function (data) {
			$('#addingdropdown').show();
			$("#addingdropdown").append(data);	


			}
		});
		
	}
	
}



 
    $(document).ready(function(){
      $('#frgt_pass').click(function(){
          $('#log_sign').hide();
          $('#show_pass').show();

      });
       $('.md-close').click(function(){
            $('#modal-8').hide();
            $('.md-overlay').hide();
          });
       $('#show_login').click(function(){
          $('#log_sign').show();
          $('#show_pass').hide();
       })
    });
  </script> 

<!-- Login popup end here -->
<script>
function registershow(){
	
$("#modal-8").show();	
} 
</script>
	

<script type="text/javascript" language="javascript">
 

$(document).ready(function(){
    $(".user_log").click(function(){
        $("#user_sow").fadeToggle();
    });
});

</script>
<script>
$(document).ready(function(){
    $("#hide_btn").click(function(){
        $("#hide_loc").hide();
    });
    $("#show_loc").click(function(){
        $("#show_loc").show();
    });
});
</script>
<script>
$("#hover_li").hover(function(){
    $('#left_box').fadeToggle();
});
</script>
<script>
$("#hover_li1").hover(function(){
    $('#left_box1').fadeToggle();
});
</script>

<script type="text/javascript" language="javascript">
   $(window).scroll(function() {
if ($(this).scrollTop() > 50) {
$('.hm_nav').addClass('affix');
$('.hm_nav').addClass('animated fadeInDown');
}
else{
$('.hm_nav').removeClass('fadeInDown');
$('.hm_nav').removeClass('animated affix	');
}
 });
</script>
