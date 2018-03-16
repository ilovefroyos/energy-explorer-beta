<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap-responsive.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/global.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/responsiveslides.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/animate.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/template_admin.css" />
	<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:700' rel='stylesheet' type='text/css'>

	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/main.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/jquery.color.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/jquery.bullseye-1.0-min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/responsiveslides.min.js"></script>
	<script>
window.ondevicemotion = function(event) {
if (navigator.platform.indexOf("iPad") != -1 && window.devicePixelRatio == 1) {
    var version = "";
    if (event.acceleration) version = "iPad2";
    else version="iPad Mini";
    alert(version);

}
window.ondevicemotion = null;
	</script>

	<script>
		
    function resizeLogo() {
	if ($( document ).width() < 1290 && $( document ).width() > 1100 ){
	    ofset =  $(".fixed").position().left;
	    ofset = ofset + 18;
	    $('.site_logo').css("left", ofset);
	    $('#map #logo-revers').css("left", ofset);
	} else if( $( document ).width() < 1100 ){
	    ofset =  $(".fixed").position().left;
	    ofset = ofset + 10;
	    $('.site_logo').css("left", ofset);
	    $('#map #logo-revers').css("left", ofset);

	}
	else{
	    ofset =  $(".fixed").position().left;
	    ofset =  $(".fixed").position().left;
	    ofset = ofset + 35;
	    $('.site_logo').css("left", ofset);
	    $('#map #logo-revers').css("left", ofset);
	}
    }
		
    $(document).ready(function (){
	resizeLogo();
        $(".richmon-click").click(function (){
        //$(this).animate(function(){
            $('html, body').animate({
            scrollTop: $("#part2").offset().top
            }, 2000);
        //});
        });
     var win = $('#page .span1');
     var win2 = $('#page .border-right');
     $('.border_corner').css({
         'margin-right':'-' + (((win.width()+win2.width()) / 2)+5) + 'px'
         });


        function myHandler(e) {
            alert($(this).attr('id') + ': ' + e.type);
        }

        $('#part2').bind('enterviewport', function(){
            $("#part2 .label-right").delay( 200 ).addClass('animated slideInRight');

        }).bullseye();

        $('#part3').bind('enterviewport', function(){
            $("#part3 .label-left").delay( 200 ).addClass('animated slideInLeft');
            setTimeout(function () {$("#part3 img").addClass('no-grayscale')}, 800);
        }).bullseye();

        $('#part4').bind('enterviewport', function(){
            $(".rslides_nav").delay( 1000).addClass('active');
            $("#part4 .label-right").delay( 200 ).addClass('animated slideInRight')
        }).bullseye();

        $('#part5').bind('enterviewport', function(){
            $("#part5 .label-left").delay( 200 ).addClass('animated slideInLeft');
            setTimeout(function () {$("#part5 img").addClass('no-grayscale')}, 800);
        }).bullseye();
    });

 $(window).resize(function(){
    resizeLogo();
     var win = $('#page .span1');
     var win2 = $('#page .border-right');
     $('.border_corner').css({
         'margin-right':'-' + (((win.width()+win2.width()) / 2)+5) + 'px'
         });
 });
	    $(document).ready(function(){
		main.caseAnimateIcon();
		main.renewableAnimateIcon();
		$("#slider").responsiveSlides({
                pager: true,
                nav: true,
                speed: 300,
                maxwidth: 400
              });
	    });

	</script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="container-fluid" id="mobile_page">
    <div class="row-fluid">
	<div class="span12">
	    <div class="logo_text">
		<div class="site_logo">
				<div id="logo2">
            <div class="block">
                <div class="block1"></div>
                <div class="block2"></div>
                <div class="block3"></div>
                <div class="block4"></div>
                <div class="block5"></div>
                <div class="block6"></div>
                <div class="block7"></div>
                <div class="block8"></div>
                <div class="block9"></div>
                <div class="block10"></div>
                <div class="block11"></div>
                <div class="block12"></div>
                <div class="block13"></div>
                <div class="block14"></div>
                <div class="block15"></div>
                <div class="block16"></div>
            </div>
            <div class="map"><img src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/img/Logo.png" alt="logo"/></div>
        </div>
		</div>
		Community Energy explorer
	    </div>
	    <div class="rotator">
	        Pleas rotate your devise to landscape and you sea site
	    </div>
	    <div class="bottom_text">
		<div class='text_block'>
		    An expansive project tracing Community Energy in the Metro Vancouver Area, the Community Energy Explorer is best viewed in a desktop environment. 
		</div>
		<div class='button_block'>
		    <img src='/bootstrap/img/mobile_button.png' />
		</div>
	    </div>
	    
	</div>
    </div>   
</div>

<div class="container-fluid" id="page">
<div class="row-fluid">
    <div class="span12">
	<div class="row-fluid">

	    <div class="span11 border-right">
	    <div class='border_corner'></div>
		    <!-- mainmenu -->
		    <?php if(isset($this->breadcrumbs)):?>
			    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
				    'links'=>$this->breadcrumbs,
			    )); ?><!-- breadcrumbs -->
		    <?php endif?>

		    <?php echo $content; ?>

		    <div class="clear"></div>
	    </div>
	    </div>
	</div><!-- page -->
    </div>
</div>
</body>
</html>
