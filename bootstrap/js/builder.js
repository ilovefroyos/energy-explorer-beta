var builder_cee = {
    notshowpopup: false,
    countComponent: 0,
    adminLeftMenuResize: function(){
	var win = $('#page .span1');
	var win2 = $('#page .border-right');
	$('.border_corner').css({
	    'margin-right':'-' + (((win.width()+win2.width()) / 2)+5) + 'px'
	});
	jQuery('.span1.admin_panel').css({'height':($(window).height())});
    },
    initIsotope: function() {
	$.Isotope.prototype._getCenteredMasonryColumns = function() {
		this.width = this.element.width();

		var parentWidth = this.element.parent().width();
		var colW = this.options.masonry && this.options.masonry.columnWidth ||
				this.$filteredAtoms.outerWidth(true) ||
				parentWidth;

		var cols = Math.floor(parentWidth / colW);
		cols = Math.max(cols, 1);
		this.masonry.cols = cols;

		this.masonry.columnWidth = colW;
	};

	$.Isotope.prototype._masonryReset = function() {
		this.masonry = {};
		this._getCenteredMasonryColumns();
		var i = this.masonry.cols;
		this.masonry.colYs = [];
		while (i--) {
			this.masonry.colYs.push(0);
		}
	};

	$.Isotope.prototype._masonryResizeChanged = function() {
		var prevColCount = this.masonry.cols;
		this._getCenteredMasonryColumns();
		return (this.masonry.cols !== prevColCount);
	};

	$.Isotope.prototype._masonryGetContainerSize = function() {
		var unusedCols = 0,
				i = this.masonry.cols;
		while (--i) {
			if (this.masonry.colYs[i] !== 0) {
				break;
			}
			unusedCols++;
		}

		return {
			height: Math.max.apply(Math, this.masonry.colYs),
			width: (this.masonry.cols - unusedCols) * this.masonry.columnWidth
		};
	};
    },
    setIsotope: function(id) {
	jQuery(id).isotope({
	    itemSelector: '.ini_isotope',
	    animationEngine: 'jquery',
	    animationOptions: {
		duration: 500,
		easing: 'easeOutCirc',
		queue: false
	    }
	});
    },
    reloadIsotope: function(item) {
	setTimeout(function(){
	    jQuery(item).isotope('reLayout');
	},100);	
	setTimeout(function(){
	    jQuery(item).isotope('reLayout');
	},500);
	setTimeout(function(){
	    jQuery(item).isotope('reLayout');
	},1000);
    },
    initSortable: function(item){
	jQuery( item ).sortable({
	    start: function( event, ui ) {
		builder_cee.notshowpopup = true;
		jQuery( item ).find('.arrow').animate({'opacity':0},200);		
	    },
	    stop: function( event, ui ) {
		jQuery( item ).find('.arrow').animate({'opacity':1},200);
		var count_pages = jQuery('.edit_page_name').size();
		for(var i=0;i<count_pages;i++){
		    if(jQuery('.edit_page_name:eq('+i+')').data('position') != i) {
			jQuery('.save_reorder.center.not_display').removeClass('not_display');
		    }
		}
	    }
	}).disableSelection();
    },
    initReorderPage: function() {
	$('.save_reorder').off('click').on('click',function(){
	    if(!$(this).hasClass('disabled')){
		$(this).addClass('disabled');
		var thie__ = $(this);
		var data_order = [];
		$('.row_list').find('.edit_page_name').each(function(){
		    data_order.push($(this).attr('class').split('paged')[1]);	    
		});
		$.ajax({
		    type: "POST",
		    url: "/site/init_reorder_page",
		    data: {
			data_order: data_order
		    }
		}).done(function(msg){
		    $('.other_bg').prepend('<div class="section_bg_popup"><span>PAGE ORDER HAS BEEN CHANGED</span></div>');
		    $('body').animate({scrollTop:'0px'},300);
		    $('.section_bg_popup').animate({'opacity':1},300);
		    setTimeout(function(){
			$('.section_bg_popup').animate({'opacity':0},300);
			setTimeout(function(){$('.section_bg_popup').remove();},300);
		    },2000);
		    thie__.removeClass('disabled');
		}).fail(function(){
		    $('.select_template').prepend('<div class="section_bg_popup"><span style="color:red;">Error while update reorder. Please try later.</span></div>');
		    $('.section_bg_popup').animate({'opacity':1},300);
		    setTimeout(function(){
			$('.section_bg_popup').animate({'opacity':0},300);
			setTimeout(function(){$('.section_bg_popup').remove();},300);
		    },2000);
		    thie__.removeClass('disabled');
		})
	    }
	})
    },
    initPublishedActions: function(){
	$('.view_pg, .unpbl_pg, .del_pg').off('click').on('click',function(){
	    $(this).closest('.edit_page').addClass('active');
	    $(this).addClass('active');
	    builder_cee.buildActionPublishClick($(this));
	});
    },
    buildActionPublishClick: function(this__){
	var id__ = $(this__).parent().parent().attr('class').split('paged')[1];
	if($(this__).hasClass('view_pg')) {
	    $('.view_pg, .unpbl_pg, .del_pg, .edit_page').removeClass('active');
	}else if($(this__).hasClass('unpbl_pg')) {
	    builder_cee.buildPopUpPublish('ARE YOU SURE YOU WANT TO MOVE THIS TO DRAFTS?','SAVE TO DRAFTS!','unpblish',id__);
	}else if($(this__).hasClass('del_pg')) {
	    builder_cee.buildPopUpPublish('ARE YOU SURE YOU WANT TO DELETE THIS PAGE?<br>THIS IS PERMANENT, CAN`T BE UNDONE, ALL THAT.','DELETE THIS PAGE!','delete',id__);
	}	

	
    },
    buildPopUpPublish: function(text,button_text,type,id){
	$('.other_bg').prepend(
		'<div class="section_bg_popup">'
		+'<span>'+text+'</span>'
		+'<div class="button_cee yes">'+button_text+'</div>'
		+'<div class="button_cee no">NO, TAKE ME BACK</div>'
		+'<div class="back_step position_absolute closepopup"></div>'
		+'</div>'
	);
	$('.section_bg_popup').height($('.other_bg').height()+100).animate({'opacity':1,'marginTop':'-50px'},300);
	$('.button_cee.no, .closepopup').off('click').on('click',function(){
	    $('.section_bg_popup').animate({'opacity':0},300);
	    setTimeout(function(){
		$('.section_bg_popup').remove();
		$('.view_pg, .unpbl_pg, .del_pg, .edit_page').removeClass('active');
	    },300);
	});
	
	$('.button_cee.yes').off('click').on('click',function(){	    
	    $.ajax({
		type: "POST",
		url: "/site/init_unpbl_page",
		data: {
		    data_type: type,
		    data_id : id
		}
	    }).done(function(msg){
		$('.section_bg_popup').animate({'opacity':0},300);
		setTimeout(function(){
		    $('.section_bg_popup').remove();
		    if(type == 'delete') {
			$('.paged'+id).parent().remove();
		    }
		    $('.view_pg, .unpbl_pg, .del_pg, .edit_page').removeClass('active');
		},300);
	    }).fail(function(){
		$('.section_bg_popup').animate({'opacity':0},300);
		setTimeout(function(){
		    $('.section_bg_popup').remove();
		    $('.view_pg, .unpbl_pg, .del_pg, .edit_page').removeClass('active');
		},300);
	    });

	});
    },
    initPreSave: function(id,id_pg){
	$(id).off('click').on('click',function(){
	    if(!$(this).hasClass('disabled')){
		$(this).addClass('disabled');
		$(this).after(
		    '<span class="black_reorder_text paged'+id_pg+'"></span>'
		);
		var thie__ = $(this);
		var data_order = [];
		$('.row_list').find('.black_reorder_text').each(function(){
		    data_order.push($(this).attr('class').split('paged')[1]);	    
		});
		$.ajax({
		    type: "POST",
		    url: "/site/init_reorder_page",
		    data: {
			data_order: data_order
		    }
		}).done(function(msg){
		    $('.other_bg').prepend('<div class="section_bg_popup"><span>PAGE HAS BEEN SAVE</span></div>');
		    $('body').animate({scrollTop:'0px'},300);
		    $('.section_bg_popup').height($('.other_bg').height()+100).animate({'opacity':1,'marginTop':'-50px'},300);
		    setTimeout(function(){
			$('.section_bg_popup').animate({'opacity':0},300);
			setTimeout(function(){$('.section_bg_popup').remove();
			    window.location = '/site/addpage'
			},300);
		    },2000);
		    thie__.removeClass('disabled');
		}).fail(function(){
		    $('.select_template').prepend('<div class="section_bg_popup"><span style="color:red;">Error while save page. Please try later.</span></div>');
		    $('.section_bg_popup').animate({'opacity':1},300);
		    setTimeout(function(){
			$('.section_bg_popup').animate({'opacity':0},300);
			setTimeout(function(){$('.section_bg_popup').remove();},300);
		    },2000);
		    thie__.removeClass('disabled');
		})
	    }
	});
    },
    closeStepPopUp: function(ec){
	jQuery(ec).off('click').on('click',function(){
	    if(window.location.pathname.indexOf('/unpublishpage') != -1){
		window.location = '/site/addpage';
	    }else if(window.location.pathname.indexOf('/reorderpage/create') != -1 && !builder_cee.notshowpopup){
		window.location = '/site/addpage';
	    }
	    if($('.other_bg .section_bg_popup').size() >= 1){
		window.location = '/site/addpage';
	    }
	    $('.other_bg').prepend(
		    '<div class="section_bg_popup">'
		    +'<span>Unsaved Changes!</span>'
		    +'<div class="button_cee yes">I WANT TO LEAVE</div>'
		    +'<div class="button_cee no">NO, TAKE ME BACK</div>'
		    +'</div>'
	    );
	    $('.section_bg_popup').height($('.other_bg').height()+100).animate({'opacity':1,'marginTop':'-50px'},300);
	    $('.button_cee.no').off('click').on('click',function(){
		$('.section_bg_popup').animate({'opacity':0},300);
		setTimeout(function(){
		    $('.section_bg_popup').remove();
		    $('.view_pg, .unpbl_pg, .del_pg, .edit_page').removeClass('active');
		},300);
	    });

	    $('.button_cee.yes').off('click').on('click',function(){	    
		window.location = '/site/addpage';
	    });
	});
    },
    setSelectedTextColor: function(this_,color){
	    
	    var iframe_id = $(this_).closest('.component').find('iframe').attr('id');
	    var frame = document.getElementById(iframe_id).contentWindow;
	    
	    var text_selected = '';
	    if (text_selected = frame.getSelection){ // Not IE
		text_selected = frame.getSelection();
	    }else{ // IE
		text_selected = frame.selection.createRange();
	    }	
	    var range = text_selected.getRangeAt(0);
	    var newNode = document.createElement("span");
	    $(newNode).css('color',color);
	    range.surroundContents(newNode);
    },
    editComponent: function(comp,comp_type){
	switch(comp_type) {
	    case 'image_background':
		var open_choose = $(comp).find('.chose_type');
		var open_choose_list = $(comp).find('.chose_type_list');
		$(open_choose).css({'display':'block'}).animate({'opacity':1},300);
		$(open_choose_list).css({'display':'block'}).animate({'opacity':1},300);
		$(comp).find('.lists_type').off('click').on('click',function(){
		    builder_cee.editMediaComponent(comp,$(this).attr('class'));
		});
		
	    break;
	    case 'edit_inline':
		var component_text = $(comp).clone();		
		$(comp).find('.edit_inline_start_edit').hide();
		$(comp).find('.save_edit_icon, .cancel_edit_icon, .color_edit_icon').show();

		var height = $(comp).height()+60;
		var width = $(comp).width();
		
		var comp_clone = $(comp).clone();		
		var edit_inline_start_edit_clone = $(comp).find('.edit_inline_start_edit').clone();		
		$(comp).html('').prepend($(edit_inline_start_edit_clone)).append('<iframe />');		
		var iframe = $(comp).find('iframe');
		
		$(iframe).attr({'allowtransparency':true,'tabindex':0,'height':height,'width':width,'scrolling':'no','id':'iframe_id'+builder_cee.countComponent}).css({'border':'none','margin-top':'-50px'});
		builder_cee.countComponent++;
		
		var class_this = $(comp).attr('class');
		var font_family = $(comp).css('font-family');
		var color = $(comp).css('color');
		var font_size = $(comp).css('font-size');
		var line_height = $(comp).css('line-height');
		var text_transform = $(comp).css('text-transform');
		var letter_spacing = $(comp).css('letter-spacing');
		var font_weight = $(comp).css('font-weight');
		var text_align = $(comp).css('text-align');
		$(comp_clone).attr({'data-maxlength':$(comp).data('maxlength'),'class':class_this,'contenteditable':true}).removeClass('component')
			.css({'font-family':font_family,'color':color,'font-size':font_size,'line-height':line_height,'text-transform':text_transform,'letter-spacing':letter_spacing,'font-weight':font_weight,'text-align':text_align,'top':'0','position':'relative'})
			.find('.edit_inline_start_edit').remove();
		
		$(comp).find('iframe').contents().find('body').css({'background-color':'transparent','margin-top':'50px'}).addClass('fix_iframe').append($(comp_clone));
		$(comp_clone).wChar({message: 'left'}).focus();
		$(comp_clone).keyup(function(){
		    var height = $(this).height()+60;
		    var len_char = $(comp_clone).text().length;
		    $(comp).find('iframe').height(height);
		    $(comp).height(height);		   
		    if($(comp_clone).data('maxlength') <= len_char){
			 $(comp_clone).parent().children('.wChar').html('0 left').addClass('wChar-min');
			 $(comp_clone).html($(comp_clone).data('presave'));
			 
		    }else{
			 $(comp_clone).parent().children('.wChar').html($(comp_clone).data('maxlength')-len_char+' left').removeClass('wChar-min');;
			 $(comp_clone).data('presave',$(comp_clone).html());
		    }
		});
		
		$('head').find('link').each(function(){
		    $(comp).find('iframe').contents().find('head').append($(this).clone());		    
		});
		
		$(comp).find('.edit_inline_start_edit.color_edit_icon').off('click').on('click',function(){
		    if($(this).find('.set_color_text').size() == 0){
			$(this).prepend('<div class="'+comp_type+'_start_edit color_edit_icon set_color_text" onclick="builder_cee.setSelectedTextColor(this,\'#ffffff\');" contenteditable="false" ></div>'
					+'<div class="'+comp_type+'_start_edit color_edit_icon set_color_text" contenteditable="false" style="background-color:#434343;" onclick="builder_cee.setSelectedTextColor(this,\'#434343\');"></div>'
					+'<div class="'+comp_type+'_start_edit color_edit_icon set_color_text" contenteditable="false" style="background-color:#EFF5DC;" onclick="builder_cee.setSelectedTextColor(this,\'#EFF5DC\');"></div>'
			);
		    }else{
			$(this).find('.set_color_text').remove();
		    }
		});
		
		$('.set_color_text').on('click',function(){
		    $(this).parent().find('.set_color_text').remove();
		})

		$(comp).find('.start_edit_icon').off('click').on('click',function(e){		
		    builder_cee.editComponent(comp,type);
		});		
		
		$(comp).find('.edit_inline_start_edit.save_edit_icon').off('click').on('click',function(){		    
		    $(comp).find('.edit_inline_start_edit').hide();
		    $(comp).find('.start_edit_icon').show();
		    $(comp).find('iframe').hide();
		    $(comp).append($(comp_clone).html());
		    $(comp).find('iframe, .wChar').remove();
		    $(comp).css('height','');
		    $(comp).find('.start_edit_icon').off('click').on('click',function(e){		
			builder_cee.editComponent(comp,comp_type);
		    });
		});
		$(comp).find('.edit_inline_start_edit.cancel_edit_icon').off('click').on('click',function(){
		    $(comp).html($(component_text).html());
		    $(comp).find('.edit_inline_start_edit').hide();
		    $(comp).find('.start_edit_icon').show();
		    $(comp).css('height','');
		    $(comp).find('.start_edit_icon').off('click').on('click',function(e){		
			builder_cee.editComponent(comp,comp_type);
		    });
		});
	    break;
	}
    },
    buildComponentEdit: function() {
	$('.component').each(function(){
	    var comp = $(this);
	    var type = $(this).attr('data-type_component');
	    switch(type) {
		case 'image_background':		    
		    $(this).append('<div class="'+type+'_start_edit start_edit_icon">'
			    +'<div class="chose_type"></div>'
				+'<div class="chose_type_list">'
				    +'<span class="lists_type poi">PICTURE OR IMAGE</span>'
				    +'<span class="lists_type bac">BUILD A CHART</span>'
				    +'<span class="lists_type adi">ADD INTERACTIVE</span>'
				+'</div>'
			    +'</div>');
		break;
		case 'edit_inline':
		    $(this).attr('contenteditable','false');
		    $(this).prepend('<div class="'+type+'_start_edit start_edit_icon" contenteditable="false"></div>'
				    +'<div class="'+type+'_start_edit save_edit_icon" contenteditable="false"></div>'
				    +'<div class="'+type+'_start_edit cancel_edit_icon" contenteditable="false"></div>'
				    +'<div class="'+type+'_start_edit color_edit_icon" contenteditable="false"></div>'
				);		    
		break;
	    }
	    
	    $(comp).find('.start_edit_icon').off('click').on('click',function(e){		
		builder_cee.editComponent(comp,type);
	    });
	});
    },
    editMediaComponent: function(comp,click_class){
	switch(click_class){
	    case 'lists_type poi':
		jQuery('.chose_type, .chose_type_list').animate({'opacity':0},300,function(){jQuery('.chose_type, .chose_type_list').hide()});
		jQuery('.border-right.admin_site').prepend(
			'<div class="section_bg_popup">'
			    +'<div class="media_popup_load">'
				+'<div class="media_popup_load_close"></div>'
				+'<span class="media_text">Add an Image. Must Be ***px x ***px</span>'
				+'<div class="media_input_info">Browse</div>'
				+'<div class="media_input_icon"></div>'
				+'<input type="file" class="hidden_input" id="fileupload" name="files[]"/>'
			    +'</div>'
			+'</div>'
		);
		jQuery('.section_bg_popup').animate({'opacity':1,'z-index':101},300);
		jQuery('.section_bg_popup .media_popup_load_close').off('click').on('click',function(){
		    jQuery('.section_bg_popup').remove();
		});
		
		jQuery('#fileupload').fileupload({
			url: '/site/filesUploadHandle',
			dataType: 'json',
			send: function (e, data) {
			    var upload_file_name = data.files[0].name.split('.');
			    var upload_file_size = data.files[0].size;
			    upload_file_name = upload_file_name[upload_file_name.length-1];
			    var sRule = /(jpeg|jpg|png|gif)/i;
			    if(!sRule.test(upload_file_name)){
				jQuery('.section_bg_popup').animate({'opacity':0,'z-index':1},300,function(){jQuery('.section_bg_popup').remove()});
				alert('Error while upload files. Please check type or size.');
				return false;
			    }
			},
			fail: function(e, data) {
			    jQuery('.section_bg_popup').animate({'opacity':0,'z-index':1},300,function(){jQuery('.section_bg_popup').remove()});
			    alert('Error while upload files. Please check type or size.');
			},
			done: function(e,data) {
				if(data.result.result == 'ok'){
				    if($(comp).parent().attr('id') == 'part1'){
					$(comp).find('img').remove();
					$(comp).parent().css('background-image','url('+data.result.result_file_path+')');
				    }else{
					$(comp).find('img').attr('src',data.result.result_file_path);
				    }
				    
				    jQuery('.section_bg_popup').animate({'opacity':0,'z-index':1},300,function(){jQuery('.section_bg_popup').remove()});
				}else{
				    jQuery('.section_bg_popup').animate({'opacity':0,'z-index':1},300,function(){jQuery('.section_bg_popup').remove()});
				    alert('Error while upload files. Please check type or size.');
				}
			}
		});
	 
		jQuery('.section_bg_popup .media_input_info, .section_bg_popup .media_input_icon').off('click').on('click',function(){			
			jQuery('#fileupload').trigger('click');
		});
		
	    break;
	    case 'lists_type bac':
		
		jQuery('.chose_type, .chose_type_list').animate({'opacity':0},300,function(){jQuery('.chose_type, .chose_type_list').hide()});
		jQuery('.border-right.admin_site').prepend(
			'<div class="section_bg_popup">'
			    +'<div class="media_popup_load">'
				+'<div class="media_popup_load_close"></div>'
				+'<span class="media_text">Set Chart Type</span>'
				+'Line 1:<input type="text" id="type_chart_1" />%<br />'
				+'Line 2:<input type="text" id="type_chart_2" />%<br />'
				+'Line 3:<input type="text" id="type_chart_3" />%<br />'
				+'<img src="/bootstrap/img/save_comp.png" width="40" height="40" alt="" class="save_charts type_liner" />'
			    +'</div>'
			+'</div>'
		);
		jQuery('.section_bg_popup').animate({'opacity':1,'z-index':101},300);
		jQuery('.section_bg_popup .media_popup_load_close').off('click').on('click',function(){
		    jQuery('.section_bg_popup').remove();
		});
		
		jQuery('.save_charts').off('click').on('click',function(){
		    if(parseInt($('#type_chart_1').val()) == 0){
			
		    }else if(parseInt($('#type_chart_2').val()) == 0){
			
		    }else if(parseInt($('#type_chart_3').val()) == 0){
			
		    }else if((parseInt($('#type_chart_1').val())+parseInt($('#type_chart_2').val())+parseInt($('#type_chart_3').val()))!=100){
			alert('All data together should be 100%');
			return false;
		    }
		    
		    jQuery(comp).attr('data-type1',parseInt($('#type_chart_1').val()))
		    jQuery(comp).attr('data-type2',parseInt($('#type_chart_2').val()))
		    jQuery(comp).attr('data-type3',parseInt($('#type_chart_3').val()))
		    $(comp).find('img,svg').remove();
		    $(comp).append('<svg class="svg_charts"></svg>');
		    builder_cee.buildCharts('type_liner');
		    jQuery('.section_bg_popup').remove();
		});
		
	    break;
	    case 'lists_type adi':
		
	    break;
	}
	

    },
    buildCharts: function(type){
	switch(type){
	    case 'type_liner':
		var type_chart_1 = jQuery('.svg_charts').parent().attr('data-type1')*4;
		var type_chart_2 = jQuery('.svg_charts').parent().attr('data-type2')*4;
		var type_chart_3 = jQuery('.svg_charts').parent().attr('data-type3')*4;
		
		var s = Snap(".svg_charts");		
		var backLine = s.rect(50,50,410,20);
		// (x,y,width,height) 
		var text1 = s.text(55,10,"Solar 50%");
		var text2 =  s.text(type_chart_1+55,10,"Biogas 25%");
		var text3 =  s.text(type_chart_1+type_chart_2+55,10,"Hydro 25%");
		var line1 = s.rect(55,55,type_chart_1,10);
		var line2 = s.rect(type_chart_1+55,55,type_chart_2,10);
		var line3 = s.rect(type_chart_1+type_chart_2+55,55,type_chart_3,10);
		backLine.attr({fill: "#C5CCB8",'data-bg':'true'});
		line1.attr({fill: "#D25627",'data-position':0,'data-x':55,'data-width':type_chart_1});
		text1.attr({fill: "#D25627",opacity:0,'data-position':0});
		line2.attr({fill: "#26B99A",'data-position':1,'data-x':type_chart_1+55,'data-width':type_chart_2});
		text2.attr({fill: "#26B99A",opacity:0,'data-position':1});
		line3.attr({fill: "#3B97D3",'data-position':2,'data-x':type_chart_1+type_chart_2+55,'data-width':type_chart_3});
		text3.attr({fill: "#3B97D3",opacity:0,'data-position':2});	

		line1.mouseover(function(){
		    clearInterval(anm);
		    builder_cee.setMouseOverLiner(line1);
		    line1.animate({x: 50,y:50,width:type_chart_1+5,height:20}, 500);
		    text1.animate({opacity:1}, 500);	    
		});

		line1.mouseout(function(){
		    line1.animate({x: 55,y:55,width:type_chart_1,height:10}, 500);
		    text1.animate({opacity:0}, 500);
		    builder_cee.setAnimateLiner($(line1.node));
		});

		line2.mouseover(function(){
		    clearInterval(anm);
		    builder_cee.setMouseOverLiner(line2);
		    line2.animate({x: type_chart_1+55,y:50,width:type_chart_2,height:20}, 500);
		    text2.animate({opacity:1}, 500);	    
		});

		line2.mouseout(function(){
		    line2.animate({x: type_chart_1+55,y:55,width:type_chart_2,height:10}, 500);
		    text2.animate({opacity:0}, 500);
		    builder_cee.setAnimateLiner($(line2.node));
		});

		line3.mouseover(function(){
		    clearInterval(anm);
		    builder_cee.setMouseOverLiner(line3);
		    line3.animate({x: type_chart_1+type_chart_2+55,y:50,width:type_chart_3+5,height:20}, 500);
		    text3.animate({opacity:1}, 500);	    
		});

		line3.mouseout(function(){
		    line3.animate({x: type_chart_1+type_chart_2+55,y:55,width:type_chart_3,height:10}, 500);
		    text3.animate({opacity:0}, 500);
		    builder_cee.setAnimateLiner($(text3.node));
		});

		var first_svg = $('.svg rect:not([data-bg="true"])').eq(0);
		line1.animate({x: 50,y:50,width:type_chart_1+5,height:20}, 500);
		text1.animate({opacity:1}, 500);
		builder_cee.setAnimateLiner(first_svg);
	    break;
	}
    },
    setMouseOverLiner: function(liner){
	$('.svg_charts rect[data-position]').each(function(){
	    var position_liner = liner.node.dataset.position;
	    var svg_block = Snap($(this)[0]);
	    var x1 = parseInt(svg_block.attr('data-x'));
	    var w1 = parseInt(svg_block.attr('data-width'));
	    var position = svg_block.node.dataset.position;
	    
	    if(position_liner != position){
		$('.svg_charts text').eq(position).animate({'opacity':0});
		svg_block.animate({x:x1,y:55,width:w1,height:10}, 500);	    
	    }
	    
	});
    },
    setAnimateLiner: function(first_svg){
	if(first_svg == undefined || first_svg == null || !first_svg){
	    return;
	}
		
	window.anm = setInterval(function(){	    
	    first_svg = Snap($(first_svg)[0]);
	    var x1 = parseInt(first_svg.attr('x'));
	    var y1 = parseInt(first_svg.attr('y'));
	    var w1 = parseInt(first_svg.attr('width'));
	    var position = first_svg.node.dataset.position;
	    
	    if(y1 != 55){
		switch(position){
		    case '0':
			x1 += 5;
			w1 -= 5
		    break;
		    case '2':
			w1 -= 5
		    break;
		}
		y1 += 5;	
		$('.svg_charts text').eq(position).animate({'opacity':0});
		first_svg.animate({x:x1,y:y1,width:w1,height:10}, 500);
	    }
	    
	    var animate_svg = $(first_svg.node).next();
	    
	    if($(animate_svg)[0] == undefined){
		first_svg = $('.svg_charts rect[data-position]').eq(0);
	    }else{
		first_svg = animate_svg;
	    }	
	    
	    first_svg = Snap($(first_svg)[0]);
	    
	    var x2 = parseInt(first_svg.attr('x'));
	    var y2 = parseInt(first_svg.attr('y'));
	    var w2 = parseInt(first_svg.attr('width'));
	    var position = first_svg.node.dataset.position
	    switch(position){
		case '0':
		    x2 -= 5;
		    w2 += 5
		break;
		case '2':
		    w2 += 5
		break;
	    }
	    y2 -= 5;	    
	    $('.svg_charts text').eq(position).animate({'opacity':1});
	    if(first_svg.node.dataset.position == undefined){
		first_svg = $('.svg_charts rect[data-position]').eq(0);
	    }else{
		
		first_svg.animate({x:x2,y:y2,width:w2,height:20}, 500);    
	    }
	},3500);
    },
    saveTemplate: function(t_id,display){
	var html_for_save = $('#preview_page').clone();
	$(html_for_save).find('.component').each(function(){
	    $(this).find('.edit_inline_start_edit, .image_background_start_edit').remove();
	});
	
	$.ajax({
	    type: "POST",
	    url: "/site/SaveTemplate",
	    data: {
		data_save: $(html_for_save).html(),
		template_id: t_id,
	    }
	}).done(function(){
	    if(display){
		window.location = '/site/editpage/create';
	    }else{
		window.location = '/site/presavepage/'+t_id;
	    }	    
	}).fail(function(){
	    alert('Error! Please tryy later.')
	});
	
    },
}