/* 
 CEE Ajax navigation
 */

var init = true, 
                state = window.history.pushState !== undefined;
	
/**
 * Load partial page from 
 * @param {type} pageurl
 * @returns {undefined}
 */
function loadAjaxPage(pageurl){
    //to get the ajax content and display in div with id 'content'
    
    var pageurl_split = pageurl.split('/');    
    var split_ = pageurl_split[pageurl_split.length-1];
    if(split_.indexOf('#') != -1){
	var split_1 = pageurl_split[pageurl_split.length-2];
	pageurl_split.splice([pageurl_split.length-1],1);
	pageurl_split.splice([pageurl_split.length-1],1);
	
	var pageurl_new = pageurl_split.join('/')+ '/index.php/'+split_1+'/'+split_;
    }else{
	delete(pageurl_split[pageurl_split.length-1]);    
	var pageurl_new = pageurl_split.join('/') + 'index.php/'+split_;
    }
    
    jQuery.get(pageurl_new,{},function(data){
        jQuery('#content').html(data);
        window.scrollTo(0, 0);
        
        //to change the browser URL to the given link location
        //pageurl = pageurl.split('#').shift();
        if( pageurl !== window.location.href ){
            window.history.pushState({pageurl:pageurl},'',pageurl);
        }
        
        // check hashtag
        if( window.location.hash ){
            scrollToPage(window.location.hash);
        }
        
        // Refresh parallax	
        enableParallax();	
	main.buildSlider();
    });
}

/**
 * Scroll page to the element with `hash` id
 * @param {string} hash
 * @returns {Boolean}
 */
function scrollToPage(hash){
    
    var dest=0;
    if( jQuery(hash).length<=0 ){
        return false;
    }
    
    if( jQuery(hash).offset().top > jQuery(document).height()-jQuery(window).height() ){
         dest=jQuery(document).height()-jQuery(window).height();
    }else{
         dest=jQuery(hash).offset().top;
    }
    jQuery('html,body').scrollTop(window.win_s);
    //go to destination
    jQuery('html,body').animate({scrollTop:dest}, 1000,function(){
        window.location.hash = hash;
    });
    
    return true;
}

function getScrollTop() {
    window.win_s = jQuery(window).scrollTop(); 
}

function enableClick() {
    
    if ('ontouchstart' in document.documentElement) {
	var events = 'touchstart'
    }else{
	var events = 'click'
    }
    
    
    // Bind click on left menu item
    jQuery('.dropdown-menu a.ajax-url').on(events,function(event){	
        if( !state ){
            return true;
        }        
	getScrollTop();
        var pageurl = jQuery(this).prop('href');	      
        var pathname = window.location.pathname;
	
	if(pageurl.indexOf(pathname) == -1){
	    loadAjaxPage(pageurl);
	}
	
        return false;
    });
        
//    jQuery(window).on('popstate',function(e) {
//        var state = e.originalEvent.state;        
//        // Load page by AJAX
//        if( state && state.pageurl ){
//            loadAjaxPage(state.pageurl);
//            return false;
//        }        
//    });
    
    /**
     * Scroll page by submenu item
     */
    jQuery('a.scroll-url').on(events,function(event){
	event.preventDefault();
        event.stopPropagation();	
	getScrollTop();
        var pathname = window.location.pathname;
	var pathname_new = pathname;
        if( pathname == '' || pathname == '/' || pathname.indexOf('test') != -1  || pathname.indexOf('cee') != -1){
            pathname = '/casestudies';
        }else if(pathname_new.indexOf('/casestudies') == -1) {
	    pathname = 'content';
	}

        if( this.href.indexOf(pathname) >-1 && pathname_new.indexOf('/casestudies') != -1){
            scrollToPage(this.hash);
            return false;
        }

        //Need to load another segment by Ajax
        loadAjaxPage(this.href);
        
        return false;
    });
}

jQuery(document).ready(function(){
    
    enableClick();    
    
});

