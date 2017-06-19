<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>::Infinity Hour::</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="<?php echo base_url(); ?>assets/home/images/close-icon.png" type="image/x-icon">
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/home/images/close-icon.ico" type="image/x-icon">
<!-- CSS Style -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/stylesheet/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/stylesheet/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/stylesheet/revslider.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/stylesheet/owl.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/stylesheet/owl_002.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/stylesheet/jquery_002.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/stylesheet/jquery.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/stylesheet/style.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/stylesheet/responsive.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/stylesheet/default.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/home/stylesheet/component.css" />
<link href="<?php echo base_url(); ?>assets/home/stylesheet/css_002.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/home/stylesheet/css_003.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/home/stylesheet/css.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/js/jquery.js"></script> 
</head>
<body>
<?php echo $header; ?> 
<?php echo $content; ?> 
<?php echo $footer; ?>


 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/js/bootstrap.js"></script> 
<script src="<?php echo base_url(); ?>assets/home/js/modernizr.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/js/parallax.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/js/revslider.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/js/common.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/js/jquery_003.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/js/owl.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/js/jquery_002.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/js/jquery.bxslider.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/js/owl.carousel.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/js/jquery.mobile-menu.min.js"></script> 
<script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('#thm-rev-slider').show().revolution({
                dottedOverlay: 'none',
                delay: 5000,
                startwidth: 0,
                startheight:900,

                hideThumbs: 200,
                thumbWidth: 200,
                thumbHeight: 50,
                thumbAmount: 2,

                navigationType: 'thumb',
                navigationArrows: 'solo',
                navigationStyle: 'round',

                touchenabled: 'on',
                onHoverStop: 'on',
                
                swipe_velocity: 0.7,
                swipe_min_touches: 1,
                swipe_max_touches: 1,
                drag_block_vertical: false,
            
                spinner: 'spinner0',
                keyboardNavigation: 'off',

                navigationHAlign: 'center',
                navigationVAlign: 'bottom',
                navigationHOffset: 0,
                navigationVOffset: 20,

                soloArrowLeftHalign: 'left',
                soloArrowLeftValign: 'center',
                soloArrowLeftHOffset: 20,
                soloArrowLeftVOffset: 0,

                soloArrowRightHalign: 'right',
                soloArrowRightValign: 'center',
                soloArrowRightHOffset: 20,
                soloArrowRightVOffset: 0,

                shadow: 0,
                fullWidth: 'on',
                fullScreen: 'on',

                stopLoop: 'off',
                stopAfterLoops: -1,
                stopAtSlide: -1,

                shuffle: 'off',

                autoHeight: 'on',
                forceFullWidth: 'off',
                fullScreenAlignForce: 'off',
                minFullScreenHeight: 0,
                hideNavDelayOnMobile: 1500,
            
                hideThumbsOnMobile: 'off',
                hideBulletsOnMobile: 'off',
                hideArrowsOnMobile: 'off',
                hideThumbsUnderResolution: 0,

                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                startWithSlide: 0,
                fullScreenOffsetContainer: ''
            });
        });
        </script> 
<script type="text/javascript">
    function HideMe()
    {
        jQuery('.popup1').hide();
        jQuery('#fade').hide();
    }
</script> 


<a href="#" id="toTop" style="display: none;"><span id="toTopHover"></span></a>
</body>
</html>
