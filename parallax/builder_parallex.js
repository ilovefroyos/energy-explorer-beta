var builder_parallex = {
    controller: {},
    setSpeadScroll: 15,
    setOffset: -25,
    introInit: function(){
	jQuery(document).mousewheel(function(event, delta) {
	   var this_scrollLeft = jQuery(document).scrollLeft();
	   var scroll = event.deltaY;
	   
	   if(scroll < -5){
	       scroll = -5;
	   }else if(scroll > 5){
	       scroll = 5;
	   }
	   
	   if(scroll != 0){
	    this_scrollLeft -= (scroll * builder_parallex.setSpeadScroll);
	    jQuery(document).scrollLeft(this_scrollLeft);
	   }
	   
	   if(!jQuery('.part2_2_2').hasClass('actived') && this_scrollLeft >= parseInt(jQuery('.start_part2_0').css('left'))){
	       jQuery('.part2_2_2').animate({'marginLeft':-500,top:-50},50000);
	   }
	   
	   if(!jQuery('.part2_2_3').hasClass('actived') && this_scrollLeft >= parseInt(jQuery('.start_part2_1').css('left'))){
	       jQuery('.part2_2_3').animate({'marginLeft':-500,top:-50},50000);
	   }
	   
   
	   event.preventDefault();	   
	});
	builder_parallex.controller = new ScrollMagic({vertical:false});
	this.svgPosition();
        this.initPage1();
	this.initPage2();
	this.initPage3();
	this.initPage4();
    },
    svgPosition: function(){
	    var part1_w = jQuery('.part1').width();
	    var part2_w = jQuery('.part2_1').width();
	    var part3_w = jQuery('.part3_1').width();	
	    var part4_w = jQuery('.part4_1').width();
	    
	    jQuery('.par_step_2 img.lvl_two').css({left:part1_w});
	    jQuery('.par_step_3 img.lvl_two').css({left:part1_w+part2_w});
	    jQuery('.par_step_4 img.lvl_two').css({left:part1_w+part2_w+part3_w});
	    
	    
            	    
	    jQuery('.par_step_1 .dinamic_img, .par_step_1 [class^="start_part"]').each(function(){
		var ileft = jQuery(this).data('left');
		jQuery(this).css({left:(part1_w*ileft)/100});
	    });	
	    
	    jQuery('.par_step_2 .dinamic_img, .par_step_2 [class^="start_part"]').each(function(){
		var ileft = jQuery(this).data('left');
		jQuery(this).css({left:((part2_w*ileft)/100)+part1_w});
	    });	
	    
	    jQuery('.par_step_3 .dinamic_img, .par_step_3 [class^="start_part"]').each(function(){
		var ileft = jQuery(this).data('left');
		jQuery(this).css({left:((part3_w*ileft)/100)+part2_w+part1_w});
	    });	
	    
	    jQuery('.par_step_4 .dinamic_img, .par_step_4 [class^="start_part"]').each(function(){
		var ileft = jQuery(this).data('left');
		jQuery(this).css({left:((part4_w*ileft)/100)+part3_w+part2_w+part1_w});
	    });	
    },
    setTweenMax: function(element,obj_anim,trigger_elem,durat){
	var tween = new TimelineMax()
	.add(TweenMax.to(element, 1, obj_anim));
	var scene = new ScrollScene({triggerElement: trigger_elem, duration:durat, offset: builder_parallex.setOffset})
		.setTween(tween)
		.addTo(builder_parallex.controller);
	scene.addIndicators();
    },
    setTweenMaxTwoStage: function(element1,obj_anim1,element2,obj_anim2,trigger_elem,durat){
	var tween = new TimelineMax()
	.add(TweenMax.to(element1, 1, obj_anim1)
	).add( TweenMax.to(element2, 1, obj_anim2));
	var scene = new ScrollScene({triggerElement: trigger_elem, duration:durat, offset: builder_parallex.setOffset})
		.setTween(tween)
		.addTo(builder_parallex.controller);
	scene.addIndicators();
    },    
    setTweenMaxThreeStage: function(element1,obj_anim1,element2,obj_anim2,element3,obj_anim3,trigger_elem,durat){
	var tween = new TimelineMax()
	.add(TweenMax.to(element1, 1, obj_anim1)
	).add(TweenMax.to(element2, 1, obj_anim2)
	).add( TweenMax.to(element3, 1, obj_anim3));
	var scene = new ScrollScene({triggerElement: trigger_elem, duration:durat, offset: builder_parallex.setOffset})
		.setTween(tween)
		.addTo(builder_parallex.controller);
	scene.addIndicators();
    },
    sliderForPart4: function() {
	var first = jQuery('.part4_slider:eq(0)');
	var last = jQuery('.part4_slider:eq(2)');
	var anim_dur = 500;
	first.addClass('active').css({opacity:1});
	
	jQuery('.part4_6_4').off('click').on('click',function(){
	    var active = jQuery('.part4_slider.active');
	    var prev = active.prev();
	    if(prev.hasClass('part4_slider')){
		active.removeClass('active').animate({opacity:0},anim_dur);
		prev.addClass('active').animate({opacity:1},anim_dur);
	    }else{
		active.removeClass('active').animate({opacity:0},anim_dur);
		last.addClass('active').animate({opacity:1},anim_dur);
	    }
	});
	
	jQuery('.part4_6_5').off('click').on('click',function(){
	    var active = jQuery('.part4_slider.active');
	    var next = active.next();
	    if(next.hasClass('part4_slider')){
		active.removeClass('active').animate({opacity:0},anim_dur);
		next.addClass('active').animate({opacity:1},anim_dur);
	    }else{
		active.removeClass('active').animate({opacity:0},anim_dur);
		first.addClass('active').animate({opacity:1},anim_dur);
	    }
	});		
	
    },
    initPage1: function(){            
	jQuery('.part1_2_3, .part1_2_4').animate({'marginLeft':500,top:-50},50000);            

	this.setTweenMax([".part1_5_1"],{marginLeft:1500},".start_part1_1",2000);
	this.setTweenMax([".part1_2_1"],{marginLeft:-500},".start_part1_1",3500);
	this.setTweenMax([".part1_2_5"],{marginLeft:-120},".start_part1_1",1000); 
	this.setTweenMax([".part1_2_7"],{marginLeft:120},".start_part1_1",1000); 

	this.setTweenMax([".part1_4_1"],{marginLeft:-200},".start_part1_2",1000);

	this.setTweenMax([".part1_2_2"],{marginLeft:-500},".start_part1_3",3500);
	this.setTweenMax([".part1_5_2"],{marginLeft:500},".start_part1_3",2000);

	this.setTweenMax([".part1_4_1"],{marginLeft:20},".start_part1_4",500);
    },
    initPage2: function(){
	this.setTweenMax([".part2_4_1"],{marginLeft:2500},".start_part2_1",4000);
	
	this.setTweenMax([".part2_2_6"],{marginLeft:80},".start_part2_2",1500);
	this.setTweenMax([".part2_2_7"],{marginLeft:-80},".start_part2_2",1500);
	this.setTweenMax([".part2_2_1"],{marginLeft:-300},".start_part2_2",1500);
	this.setTweenMax([".part2_4_2"],{marginLeft:-900},".start_part2_2",2000);
	this.setTweenMax([".part2_6_1"],{css:{top:'54.5%',height:'11%'}},".start_part2_2",1500);
	
	this.setTweenMax([".part2_2_4"],{marginLeft:-500},".start_part2_3",2500);
	
	this.setTweenMax([".part2_3_1"],{css:{top:'55.5%',marginLeft:-170}},".start_part2_4",1500);
    },
    initPage3: function() {
	this.setTweenMax([".part3_4_1"],{marginLeft:-600},".start_part3_1",1500);
	
	this.setTweenMax([".part3_4_3"],{css:{top:'35%',height:'16%'}},".start_part3_2",1000);	
	
	this.setTweenMax([".part3_4_2"],{marginLeft:1800},".start_part3_3",4000);	
	this.setTweenMax([".part3_2_1"],{marginLeft:-60},".start_part3_3",1000);
	this.setTweenMax([".part3_2_3"],{marginLeft:60},".start_part3_3",1000);
		
	this.setTweenMax([".part3_6_1"],{opacity:1},".start_part3_4",500);	
	
	this.setTweenMax([".part3_6_2"],{opacity:1},".start_part3_5",500);	
	
	this.setTweenMax([".part3_6_3"],{opacity:1},".start_part3_6",500);	
	
    },
    initPage4: function() {
	this.setTweenMax([".part4_4_1"],{marginLeft:2800},".start_part4_1",6000);	
	this.setTweenMax([".part4_4_2"],{marginLeft:-800},".start_part4_2",1500);
	this.sliderForPart4();
    }
}