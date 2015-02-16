var main = {
    case_animate:'',
    renewable_animate:'',
    renewable_counter:0,
    caseAnimateIcon: function(){	
	$('#page .dropdown-submenu.case_menu').off('mouseenter').on('mouseenter',function(){
	    if(main.case_animate == ''){
	    var scroller =   $('.case_menu .icon_menu');

	    scroller.find('.case_black').stop(true, true).animate({opacity: 0}, 500);
	    $('.case_menu .icon_menu').find('.img1').addClass('active').stop(true, true).animate({opacity: 1}, 500);
	    main.case_animate = setInterval(function() {
				var active_item = scroller.find('.case_animate.active');
				var next_item = (active_item.next().length == 0) ? scroller.find('.case_animate:eq(0)') : active_item.next();

				next_item.animate({opacity: 1}, 600);

				active_item.animate({opacity: 0}, 600, function() {
				    active_item.removeClass('active');
				    next_item.addClass('active');
				});
			    }, 1200)
	    }
	});
	$('#page .dropdown-submenu.case_menu').off('mouseleave').on('mouseleave',function(){
	    var scroller =   $('.case_menu .icon_menu');
	    clearInterval(main.case_animate);
	    main.case_animate = '';
	    
	    var active_item = scroller.find('.case_animate');
	    var next_item = scroller.find('.case_black');
	    
	    active_item.stop(true, true).animate({opacity: 0}, 500);
	    next_item.stop(true, true).animate({opacity: 1}, 500);
	    $(active_item).removeClass('active');
	    
	});
    },    
    renewableAnimateIcon: function(){
	$('#page .dropdown-submenu.renewable_menu').off('mouseenter').on('mouseenter',function(){
	    var scroller =   $('.renewable_menu .icon_menu');
	    scroller.find('.renewable_black').stop(true, true).animate({opacity: 0}, 500);
	    scroller.find('.renewable_animate_in').stop(true, true).animate({opacity: 1}, 500);
	    scroller.find('.renewable_animate_out').stop(true, true).animate({opacity: 1}, 500);
	    main.renewable_counter = 0;
	    main.renewable_animate = setInterval(function() {
					    var renewable_in = scroller.find('.renewable_animate_in');
					    var renewable_out = scroller.find('.renewable_animate_out');
					    if(main.renewable_counter == 360){
						main.renewable_counter = 0;
					    }
					    $(renewable_out).css('transform','rotate(-'+main.renewable_counter+'deg)');
					    $(renewable_out).css('-webkit-transform','rotate(-'+main.renewable_counter+'deg)');
					    $(renewable_out).css('-ms-transform','rotate(-'+main.renewable_counter+'deg)');
					    $(renewable_in).css('transform','rotate('+main.renewable_counter+'deg)');
					    $(renewable_in).css('-webkit-transform','rotate('+main.renewable_counter+'deg)');
					    $(renewable_in).css('-ms-transform','rotate('+main.renewable_counter+'deg)');
					    main.renewable_counter += 3;
					}, 10)
	});
	$('#page .dropdown-submenu.renewable_menu').off('mouseleave').on('mouseleave',function(){
	    clearInterval(main.renewable_animate);
	    var scroller =   $('.renewable_menu .icon_menu');
	    scroller.find('.renewable_black').stop(true, true).animate({opacity: 1}, 500);
	    scroller.find('.renewable_animate_in').stop(true, true).animate({opacity: 0}, 500);
	    scroller.find('.renewable_animate_out').stop(true, true).animate({opacity: 0}, 500);

	});
    },
    buildSlider: function() {
	jQuery(".rslides").responsiveSlides({
	    auto: false,
	    pager: true,
	    nav: true,
	    speed: 300,
	    maxwidth: 799,
	    pause: true,
	    pauseControls: true,
	    after: function(){
		jQuery('.rslides_nav.prev').each(function(){
		    var slider_h = jQuery(this).prev().height();
		    var prev = jQuery(this);
		    var next = jQuery(this).next();
		    var to_top = (slider_h/2)+44;
		    prev.css({marginTop:-to_top});
		    next.css({marginTop:-to_top});
		});		
	    }
	});
	
	jQuery('.rslides_nav.prev').each(function(){
	    var slider_h = jQuery(this).prev().height();
	    var prev = jQuery(this);
	    var next = jQuery(this).next();
	    var to_top = (slider_h/2)+44;
	    prev.css({marginTop:-to_top});
	    next.css({marginTop:-to_top});
	});
	
	var imgs = jQuery('img');
	var scroll_step = 450;
	if(navigator.userAgent.indexOf('Firefox') == -1){
	    scroll_step = 350;
	}
	
	if ('ontouchstart' in document.documentElement) {
	    imgs.addClass('no_filter');
	}else{
	    jQuery(document).on('scroll',function(){
		var scroll = jQuery(document).scrollTop();
		imgs.each(function(){
		    if(!jQuery(this).hasClass('no_filter') && (jQuery(this).offset().top-scroll_step) <= scroll) {
			jQuery(this).addClass('no_filter');
			setTimeout(function(){
			    jQuery(this).width(jQuery(this).width()-50);
			},500)
		    }
		});
	    });
	}
	
	
    }
}

$( document ).ready(function() {
    if($( ".container-fluid" ).hasClass( "first_step" )){
        $(".close_step").hide();
    }
    
    $("#mapbox_legend .item").off('click').on('click',function() {
        if($(this).hasClass("big")){
            $(this).removeClass("big").addClass("smal");
        } else {
            $(this).removeClass("smal").addClass("big");
        }
    });
    
    jQuery('.toper h2').each(function(){
	var this_s = jQuery(this);
	setTimeout(function(){
	    jQuery(this_s).width(jQuery(this_s).width()+1).css('clear','both');	
	},500);
    })
});

