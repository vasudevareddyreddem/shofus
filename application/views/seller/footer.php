 <div class="clearfix"></div>
 <!--footer part start here -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="ftr">
            <div class="queries">Download our seller apps from here</div>
            <a href="#" class="googleApp" target="_blank"><img src="<?php echo base_url();?>assets/seller_login/images/google.png" class="img-responsive" /></a> <!--<a href="#" class="googleApp" target="_blank"><img src="<?php //echo base_url();?>assets/seller_login/images/play.png" class="img-responsive" /></a>--> </div>
        </div>
        <div class="col-md-2"> &nbsp;</div>
        <div class="col-md-2">
          <div class="siteMap">
            <p>Site Map</p>
            <ul>
              <li><a href="<?php echo base_url();?>seller/login">Home</a></li>
              <li><a href="#">Cart in Hour </a></li>
              <li><a href="#">Resources</a></li>
              <li><a href="#">Seller Diaries</a></li>
              <li><a href="<?php echo base_url();?>seller/faq">FAQs</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-4">
          <div class="siteMap">
            <p>Social</p>
            <ul class="social-network social-circle">
              <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
              <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
            </ul>
            <!-- <a class="social" href="#" target="_blank"><img src="images/fb.png"></a> <a class="social" href="#" target="_blank"><img src="images/twit.png"></a> <a class="social" href="" target="_blank"><img src="images/lin.png"></a> <a class="social" href="" target="_blank"><img src="images/googlePlus.png"></a> <a class="social" href="" target="_blank"><img src="images/youtube.png"></a> --></div>
        </div>
      </div>
    </div>
  </footer>
 <!-- <div class="cont_btm">
	<button class="btn btn-primary"> test btn</button>
	 <form>
                <div class="row" style="width:300px;background:#fff;padding:10px;border-radius:5px">
                    <div class="">
                        <div class="form-group">
                            <label for="name">
                                Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Subject</label>
                            <select id="subject" name="subject" class="form-control" required="required">
                                <option value="na" selected="">Choose One:</option>
                                <option value="service">General Customer Service</option>
                                <option value="suggestions">Suggestions</option>
                                <option value="product">Product Support</option>
                            </select>
                        </div>
                    </div>
                   
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                            Send Message</button>
                    </div>
                </div>
                </form>
  </div>-->
  <!--footer part end here 
  <div class="fter">
    <div class="container">
      <div class="row">
        <div class="col-md-12">&copy; <span class="year">2017</span> Cart in Hour. All rights reserved.</div>
      </div>
    </div>
  </div>
</div>-->
<script src="<?php echo base_url();?>assets/seller_login/js/jssor.slider-22.2.16.mini.js" type="text/javascript"></script> 
<script type="text/javascript">
        jQuery(document).ready(function ($) {

            var jssor_1_options = {
              $AutoPlay: true,
              $SlideDuration: 800,
              $SlideEasing: $Jease$.$OutQuint,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*responsive code begin*/
            /*remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1920);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            /*responsive code end*/
        });
    </script>
	
	
	
	
	<script>
	
	function loginvalidateof()

{
var seller_name=document.getElementById('seller_name');

var seller_password=document.getElementById('seller_password');




if(seller_name.value!=""){

	document.getElementById('errorname').innerHTML="";

}
else{
document.getElementById('errorname').innerHTML="Enter the Email/Mobile Number";
$("#seller_name").focus();
return false;
}





if(seller_password.value!=""){

	document.getElementById('errorpassword').innerHTML="";

}
else{
document.getElementById('errorpassword').innerHTML="Enter the Password";
$("#seller_password").focus();
return false;
}


}
</script>
	
	
	
	
	
	
	
	
</body>
</html>
