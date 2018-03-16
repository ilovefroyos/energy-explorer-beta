
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
	

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400' rel='stylesheet' type='text/css' />
	<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css' />
	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400' rel='stylesheet' type='text/css' />
	<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:700' rel='stylesheet' type='text/css' />
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/wchar/wchar.css" rel="Stylesheet" type="text/css"  />
	
	<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>

	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/main.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/jquery.color.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/snap.svg-min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/jquery.bullseye-1.0-min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/mcVideoPlugin.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/responsiveslides.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/jquery.transit.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/jquery.slideshowify.min.js"></script>
	
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/builder.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/jquery.easing.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/jquery.isotope.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/jquery_file_uploader/jquery.iframe-transport.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/jquery_file_uploader/jquery.fileupload.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/base64.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/wchar/wchar.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/jquery.localscroll-1.2.7-min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/jquery.parallax-1.1.3.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/jquery.scrollTo-1.4.2-min.js"></script>
	
	
	
	<script type="text/javascript">
	    
    $(document).load(function(){
	builder_cee.reloadIsotope('.row_sections');	
	
    });
    
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
	if(jQuery('[data-type_component="image_background"]').find('.svg_charts').size() != 0){
	    jQuery('.svg_charts').find('*').remove();
	    builder_cee.buildCharts('type_liner');
	}
	builder_cee.initIsotope();
	builder_cee.setIsotope('.row_sections');
	builder_cee.reloadIsotope('.row_sections');
	builder_cee.closeStepPopUp('.close_step');
		
        $(".richmon-click").click(function (){
            $('html, body').animate({
            scrollTop: $("#part2").offset().top
            }, 2000);
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
	   builder_cee.adminLeftMenuResize();
	   builder_cee.reloadIsotope('.row_sections');
	   resizeLogo();
	});
	    $(document).ready(function(){
		main.caseAnimateIcon();
		main.renewableAnimateIcon();
		$("#slider").responsiveSlides({
                pager: true,
                nav: true,
                speed: 300,
                maxwidth: 400,
                pause: true,
                pauseControls: true
              });
	      builder_cee.adminLeftMenuResize();
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
            <svg id="logo2"></svg>
        </div>
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
	    <div class="span1 admin_panel">
            <div class="fixed">
            <div class="site_logo">
 <svg id="logo"><defs></defs><rect x="37.5" y="18.75" width="18.75" height="18.75" fill="#c5ccb8" stroke="#c5ccb8" style="stroke-width: 1px; fill-opacity: 1; stroke-opacity: 1;"></rect><rect x="56.25" y="18.75" width="18.75" height="18.75" fill="#e1e9d1" stroke="#e1e9d1" style="stroke-width: 1px; fill-opacity: 1; stroke-opacity: 1;"></rect><rect x="37.5" y="37.5" width="18.75" height="18.75" fill="#e1e9d1" stroke="#e1e9d1" style="stroke-width: 1px; fill-opacity: 1; stroke-opacity: 1;"></rect><rect x="56.25" y="37.5" width="18.75" height="18.75" fill="#eff5dc" stroke="#eff5dc" style="stroke-width: 1px; fill-opacity: 1; stroke-opacity: 1;"></rect><rect x="0" y="0" width="18.75" height="18.75" fill="#000000" stroke="#000000" style="stroke-width: 1px; fill-opacity: 0; stroke-opacity: 0;"></rect><rect x="18.75" y="0" width="18.75" height="18.75" fill="#d25627" stroke="#d25627" style="stroke-width: 1px; fill-opacity: 1; stroke-opacity: 1;"></rect><rect x="37.5" y="0" width="18.75" height="18.75" fill="#f04941" stroke="#f04941" style="stroke-width: 1px; fill-opacity: 1; stroke-opacity: 1;"></rect><rect x="56.25" y="0" width="18.75" height="18.75" fill="#ca3732" stroke="#ca3732" style="stroke-width: 1px; fill-opacity: 1; stroke-opacity: 1;"></rect><rect x="0" y="18.75" width="18.75" height="18.75" fill="#14a085" stroke="#14a085" style="stroke-width: 1px; fill-opacity: 1; stroke-opacity: 1;"></rect><rect x="18.75" y="18.75" width="18.75" height="18.75" fill="#e57e25" stroke="#e57e25" style="stroke-width: 1px; fill-opacity: 1; stroke-opacity: 1;"></rect><rect x="0" y="37.5" width="18.75" height="18.75" fill="#26b99a" stroke="#26b99a" style="stroke-width: 1px; fill-opacity: 1; stroke-opacity: 1;"></rect><rect x="18.75" y="37.5" width="18.75" height="18.75" fill="#3b97d3" stroke="#3b97d3" style="stroke-width: 1px; fill-opacity: 1; stroke-opacity: 1;"></rect><rect x="0" y="56.25" width="18.75" height="18.75" fill="#000000" stroke="#000000" style="stroke-width: 1px; fill-opacity: 0; stroke-opacity: 0;"></rect><rect x="18.75" y="56.25" width="18.75" height="18.75" fill="#2980ba" stroke="#2980ba" style="stroke-width: 1px; fill-opacity: 1; stroke-opacity: 1;"></rect><rect x="37.5" y="56.25" width="18.75" height="18.75" fill="#9778b5" stroke="#9778b5" style="stroke-width: 1px; fill-opacity: 1; stroke-opacity: 1;"></rect><rect x="56.25" y="56.25" width="18.75" height="18.75" fill="#894b9d" stroke="#894b9d" style="stroke-width: 1px; fill-opacity: 1; stroke-opacity: 1;"></rect></svg>
            </div>

            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
              <li class="dropdown-submenu energy_menu">
                <span class="span_red">Add / Remove<br/>Content</span>
                <a tabindex="-1" href="javascript:;" class="first">
                <span class="icon_menu"></span>
                </a>
                <ul class="dropdown-menu">
		    
                  <li class="<?php echo $this->add_menu;?>">
		    <div class="icon_menu_dropdown"><span class="img_test add_adm"></span></div>
		    <a tabindex="-1" href="/site/addpage">ADD A PAGE</a>
                  </li>
		    
                  <li class="<?php echo $this->unp_menu;?>">
		    <div class="icon_menu_dropdown"><span class="img_test unp_adm"></span></div>
		    <a tabindex="-1" href="/site/unpublishpage">UNPUBLISH OR DELETE A PAGE</a>
                  </li>

                  <li class="<?php echo $this->edit_menu;?>">
		    <div class="icon_menu_dropdown"><span class="img_test edit_adm"></span></div>
		    <a tabindex="-1" href="/site/editpage">EDIT DRAFTS</a>
                  </li>

                  <li class="<?php echo $this->reorder_menu;?>">
		    <div class="icon_menu_dropdown"><span class="img_test reorder_adm"></span></div>
		    <a tabindex="-1" href="/site/reorderpage">REORDER PAGES</a>
                  </li>

                </ul>
              </li>
            </ul>
            </div>
	    </div>
	    <div class="span11 border-right admin_site">
	    <div class="admin_panel_top">
            <div class="mode">
                Admin Mode
            </div>
            <a href="/" class="log_out">
                Log OUT
            </a>
	    </div>
	    <div class="close_step"></div>
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
