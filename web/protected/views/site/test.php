<style>
    .svg_charts {
	width: 500px;
	height: 200px;
	margin: 50px auto;
	display: block;
    }
</style>
<svg class="svg_charts"></svg>



<script type="text/javascript">  
    jQuery(document).ready(function(){
	var s = Snap(".svg_charts");
	var backLine = s.rect(50,50,410,20);
	// (x,y,width,height) 
	var text1 = s.text(55,10,"Solar 50%");
	var text2 =  s.text(255,10,"Biogas 25%");
	var text3 =  s.text(355,10,"Hydro 25%");
	var line1 = s.rect(55,55,200,10);
	var line2 = s.rect(255,55,100,10);
	var line3 = s.rect(355,55,100,10);
	backLine.attr({fill: "#C5CCB8",'data-bg':'true'});
	line1.attr({fill: "#D25627",'data-position':0,'data-x':55,'data-width':200});
	text1.attr({fill: "#D25627",opacity:0,'data-position':0});
	line2.attr({fill: "#26B99A",'data-position':1,'data-x':255,'data-width':100});
	text2.attr({fill: "#26B99A",opacity:0,'data-position':1});
	line3.attr({fill: "#3B97D3",'data-position':2,'data-x':355,'data-width':100});
	text3.attr({fill: "#3B97D3",opacity:0,'data-position':2});	
  
	line1.mouseover(function(){
	    clearInterval(anm);
	    setMouseOver(line1);
	    line1.animate({x: 50,y:50,width:205,height:20}, 500);
	    text1.animate({opacity:1}, 500);	    
	});
	
	line1.mouseout(function(){
	    line1.animate({x: 55,y:55,width:200,height:10}, 500);
	    text1.animate({opacity:0}, 500);
	    setAnimate($(line1.node));
	});
	
	line2.mouseover(function(){
	    clearInterval(anm);
	    setMouseOver(line2);
	    line2.animate({x: 255,y:50,width:100,height:20}, 500);
	    text2.animate({opacity:1}, 500);	    
	});
	
	line2.mouseout(function(){
	    line2.animate({x: 255,y:55,width:100,height:10}, 500);
	    text2.animate({opacity:0}, 500);
	    setAnimate($(line2.node));
	});
	
	line3.mouseover(function(){
	    clearInterval(anm);
	    setMouseOver(line3);
	    line3.animate({x: 355,y:50,width:105,height:20}, 500);
	    text3.animate({opacity:1}, 500);	    
	});
	
	line3.mouseout(function(){
	    line3.animate({x: 355,y:55,width:100,height:10}, 500);
	    text3.animate({opacity:0}, 500);
	    setAnimate($(text3.node));
	});
	
	var first_svg = $('.svg rect:not([data-bg="true"])').eq(0);
	line1.animate({x: 50,y:50,width:205,height:20}, 500);
	text1.animate({opacity:1}, 500);
	setAnimate(first_svg);
    });
    
    function setMouseOver(liner) {
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
    }
    
    function setAnimate(first_svg) {
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
    }
</script>