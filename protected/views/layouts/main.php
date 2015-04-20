<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="default" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/combined.css" />

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:700' rel='stylesheet' type='text/css' />

    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/combined.js"></script>


    <script type="text/javascript">
        window.ondevicemotion = function(event) {
            if (navigator.platform.indexOf("iPad") != -1 && window.devicePixelRatio == 1) {
                var version = "";
                if (event.acceleration) version = "iPad2";
                else version="iPad Mini";
            }
        }
        window.ondevicemotion = null;

        $(document).ready(function (){
            $('#nav').localScroll(800);

            var win = $('#page .span1');
            var win2 = $('#page .border-right');
            $('.border_corner').css({
                'margin-right':'-' + (((win.width()+win2.width()) / 2)+5) + 'px'
            });

            /*
            function myHandler(e) {
                alert($(this).attr('id') + ': ' + e.type);
            }
            */

            bingEventsToViewport();
        });

        $(window).resize(function(){
            var win = $('#page .span1');
            var win2 = $('#page .border-right');
            $('.border_corner').css({
                'margin-right':'-' + (((win.width()+win2.width()) / 2)+5) + 'px'
               });
        });

        function bingEventsToViewport() {
            $('[id^="part"]').bind('enterviewport', function(){
                $(this).find('.label-left').delay(200).addClass('animated slideInLeft');
                $(this).find('.label-right').delay(200).addClass('animated slideInRight');

                if(typeof($(this).data('map-id')) != 'undefined' && $(this).data('map-title')) {
                    $('#map-go-to a').data('id', $(this).data('map-id')).html($(this).data('map-title'));
                    $('#map-go-to').delay(1000).fadeIn(700);
                } else {
                    $('#map-go-to').fadeOut(700);
                }
            }).bullseye();
        }
       
    
        

    </script>

    <script type="text/javascript">
        
        $(window).load(function(){
           $('#indexbg').css({
                "background": "url('/bootstrap/img/bg.png') no-repeat",
                "min-height": "1000px !important",
                "min-height": "1000px !important",
                "background-size": "cover",
                "background-position" :"fixed"
                });
                   
                
        });
 
 
        
        $(document).ready(function(){
            main.caseAnimateIcon();
            main.renewableAnimateIcon();
            main.buildSlider();
            
            
        
            
                  $('.label-third').click( function(event){ 
                     $('.fixed').addClass('disabled');
                    $('.site_logo').addClass('disabled_logo ');
                    $('html,body').css('overflow', 'hidden');
		event.preventDefault(); 
		$('.overlay').fadeIn(700, 
		 	function(){ 
				$('.modal_form') 
					.css('display', 'block') 
					.animate({opacity: 1, top: '50%'}, 500); 
		});
	});
        
        $('.improve').click( function(event){ 
                    $('.fixed').addClass('disabled');
                    $('.site_logo').addClass('disabled_logo ');
		event.preventDefault(); 
		$('.overlay').fadeIn(700, 
		 	function(){ 
				$('.modal_form_improve') 
					.css('display', 'block') 
					.animate({opacity: 1, top: '50%'}, 500); 
		});
	});
	
	$('.modal_close, .overlay').click( function(){ 
             $('.fixed').removeClass('disabled');
                     $('.site_logo').removeClass('disabled_logo ');
            $('html,body').css('overflow', 'auto');
		$('.modal_form, .modal_form_improve')
			.animate({opacity: 0, top: '45%'}, 200,  
				function(){ 
					$(this).css('display', 'none'); 
					$('.overlay').fadeOut(400); 
				}
			);
	});
          
	$('.btn-modal-improve' ).click(function() {
             $(this).toggleClass('clicked');
             $('.btn-modal-improve p').text(function(i, text) {
            return text === "Sent!" ? "Send" : "Sent!";
  });
             
     });   
     
      	
            
});

        
    </script>

    <title>Community Energy Explorer</title>
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
		<br><strong>Mobile Site coming soon.</strong>  <br><br>  
The Community Energy Explorer
is currently designed for larger devices.
Please visit from your tablet, laptop or desktop computer to experience this expansive project.<br><br> <br><br> 
	    </div>
	    <div class="rotator">
	        Please rotate your device to view this site.
	    </div>
	    
	</div>
    </div>   
</div>


    <a href="../"> <div class="site_logo">
                <svg id="logo"></svg>
                
    </div></a>
 
<div class="container-fluid" id="page">
<div class="row-fluid">
   
    <div class="span12"> 
	<div class="row-fluid">
           
	    <div class="span1">
	    <div class="wraper_toper">
            <div class="fixed">


            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
              <li class="dropdown-submenu energy_menu">

                <span class="span_red">Energy in Context</span>
                <a class='ajax-url first' tabindex="-1" href="<?=Yii::app()->createUrl('/context')?>">
                <span class="icon_menu"></span>
                </a>

                <ul class="dropdown-menu">
                  <li>
                  <div class="icon_menu_dropdown"><span class="img_test energy_faq"></span></div>
                  <a class='scroll-url' tabindex="-1" href="<?=Yii::app()->createUrl('context/#faq')?>" >What is Community Energy?</a>
                  </li>
                  <li>
                  <div class="icon_menu_dropdown"><span class="img_test energy_climate"></span></div>
                  <a class='scroll-url' tabindex="-1" href="<?=Yii::app()->createUrl('context/#climate')?>" >Energy and Climate Change</a>
                  </li>

                  <li>
                  <div class="icon_menu_dropdown"><span class="img_test energy_metro"></span></div>
                  <a class='scroll-url' tabindex="-1" href="<?=Yii::app()->createUrl('context/#metro')?>" >Metro Vancouver Demand</a>
                  </li>

                  <li>
                  <div class="icon_menu_dropdown"><span class="img_test energy_clean"></span></div>
                  <a class='scroll-url' tabindex="-1" href="<?=Yii::app()->createUrl('context/#clean')?>" >Is our Energy Clean?</a>
                  </li>

                  <li>
                  <div class="icon_menu_dropdown"><span class="img_test EcoNomies"></span></div>
                  <a class='scroll-url' tabindex="-1" href="<?=Yii::app()->createUrl('context/#economies')?>">Local Energy EcoNomies</a>
                  </li>

                  <li>
                  <div class="icon_menu_dropdown"><span class="img_test District"></span></div>
                  <a class='scroll-url' tabindex="-1" href="<?=Yii::app()->createUrl('context/#district')?>">District Energy</a>
                  </li>

                  <li>
                  <div class="icon_menu_dropdown"><span class="img_test Housing"></span></div>
                  <a class='scroll-url' tabindex="-1" href="<?=Yii::app()->createUrl('context/#housing')?>">Housing, Design & Retrofits</a>
                  </li>

                  <li>
                  <div class="icon_menu_dropdown"><span class="img_test Behaviour"></span></div>
                  <a class='scroll-url' tabindex="-1" href="<?=Yii::app()->createUrl('context/#behaviour')?>">Behaviour</a>
                  </li>
                </ul>
              </li>


              <li class="dropdown-submenu renewable_menu">
                  <span class="span_green">Renewable Energy</span>
                <a tabindex="-1" class="ajax-url first" href="<?=Yii::app()->createUrl('/renewables')?>">
                <span class="icon_menu">
                    <div class="renewable_black"></div>
                    <!--<div class="renewable_animatee"></div>-->
                    <div class="renewable_animate_out"></div>
                    <div class="renewable_animate_in"></div>
                </span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                  <div class="icon_menu_dropdown"><span class="img_test ren_solar"></span></div>
                  <a class='scroll-url' tabindex="-1" href="<?=Yii::app()->createUrl('renewables/#solar')?>" onclick="">Solar</a>
                  </li>
                  <li>
                  <div class="icon_menu_dropdown"><span class="img_test ren_wind"></span></div>
                  <a class='scroll-url' tabindex="-1" href="<?=Yii::app()->createUrl('renewables/#wind')?>" onclick="">Wind</a>
                  </li>
                  <li>
                  <div class="icon_menu_dropdown"><span class="img_test ren_gidropower"></span></div>
                  <a class='scroll-url' tabindex="-1" href="<?=Yii::app()->createUrl('renewables/#hydropower')?> " onclick="">Hydropower</a>
                  </li>

                                    <li>
                  <div class="icon_menu_dropdown"><span class="img_test ren_Industrial"></span></div>
                  <a class='scroll-url' tabindex="-1" href="<?=Yii::app()->createUrl('renewables/#heat-recovery')?>" onclick="">Heat Recovery</a>
                  </li>

                  <li>
                  <div class="icon_menu_dropdown"><span class="img_test ren_Bioenergy"></span></div>
                  <a class='scroll-url' tabindex="-1" href="<?=Yii::app()->createUrl('renewables/#bioenergy')?>" onclick="">Bioenergy</a>
                  </li>
                  <li>
                  
                  </li>
                </ul>
              </li>
                            <li class="dropdown-submenu case_menu">
                              <span class="span_blue">Case Studies</span>
                              <a tabindex="-1" class="ajax-url first" href="<?=Yii::app()->createUrl('/casestudies')?>">
                              <span class="icon_menu">
                                  <div class="case_black"></div>
                                  <div class="case_animatee img3"></div>
                                  <div class="case_animate img1"></div>
                                  <div class="case_animate img2"></div>
                              </span>
                              </a>
                              <ul class="dropdown-menu">
                                <li>
                                    <div class="icon_menu_dropdown"><span class="img_test case_Richmond"></span></div>
                                    <a class="scroll-url richmon-click" tabindex="-1" href="<?=Yii::app()->createUrl('casestudies/#richmond-city-center')?>">Richmond : City Center</a>
                                </li>
                                <li>
                                    <div class="icon_menu_dropdown"><span class="img_test case_surrey"></span></div>
                                    <a class="scroll-url surrey-click" tabindex="-1" href="<?=Yii::app()->createUrl('casestudies/#surrey-suburban-nodes')?>">Surrey : Suburban Nodes </a>
                                </li>
                              </ul>
                            </li>
            </ul>
            </div>
	    </div>
	    </div>
	    <div class="span11 border-right">
                <div id="map-go-to" class="map-go-to">
                    <i class="icon-map-marker"></i>
                    <a href="#">asdasdad</a>
                </div>
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


<div id="map" data-hash="map">
        <iframe id="mapIframe" src="/map/index.html" style="height: 100%;width: 100%;"></iframe>
    <div id="logo-revers">
        <div class="logo_img"></div>
        <ul class="menu_drop_icon dropdown-menu" role="menu" aria-labelledby="dLabel">
            <li class="dropdown-submenu energy_menu nohover">
                <a tabindex="-1" href="javascript:1;" class="first">
                    <svg version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
                             x="0px" y="0px" width="30px" height="26.289px" viewBox="0 0 30 26.289" enable-background="new 0 0 30 26.289"
                             xml:space="preserve">
                        <defs>
                        </defs>
                        <g>
                            <polygon fill="#292B2C" points="14.747,26.289 30,18.966 24.487,17.091 14.809,21.737 5.563,17.882 0,20.136"/>
                            <polygon fill="#292B2C" points="14.747,12.793 30,5.471 15.575,0 0,6.643"/>
                            <polygon fill="#292B2C" points="14.747,19.681 30,12.356 24.146,10.365 14.809,14.852 5.902,11.135 0,13.526"/>
                        </g>
                    </svg>
                </a>
                <ul class="dropdown-menu" >
                    <li>
                        <div class="icon_menu_dropdown"><span class="img_test ren_solar"></span></div>
                        <a tabindex="-1" href="javascript:;">Solar Potential & Cloud Days</a>
                    </li>
                    <li>
                        <div class="icon_menu_dropdown"><span class="img_test ren_wind"></span></div>
                        <a tabindex="-1" href="javascript:;">Wind Energy Potential</a>
                    </li>
                    <li>
                        <div class="icon_menu_dropdown"><span class="img_test biomass"></span></div>
                        <a tabindex="-1" href="javascript:;">Biomass & Agriculture</a>
                    </li>
                    <li>
                        <div class="icon_menu_dropdown"><span class="img_test ren_Industrial"></span></div>
                        <a tabindex="-1" href="javascript:;">Potential Hydro Power</a>
                    </li>
                    <li>
                        <div class="icon_menu_dropdown"><span class="img_test ren_heat"></span></div>
                        <a tabindex="-1" href="javascript:;">Potential Heat Recovery</a>
                    </li>
                    
                    <li>
                        <div class="icon_menu_dropdown"><span class="img_test case_popul"></span></div>
                        <a tabindex="-1" href="javascript:;">Population Density</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
</body>
</html>


