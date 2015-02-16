var fillFadeDuration = 120;
var strokeFadeDuration = 500;
var strokeAnimDuration = 6;
var squareTimer = null;
var logoDim = 75;
var squareDim = logoDim/4;
var squareStrokeWidth = 1;
var mapStrokeWidth = 1;
var squareFadeTimeout = fillFadeDuration/2.5;
var squares = [
    // Row 0
    {x: 0, y: 0, colour: "#000000", alpha: 0},
    {x: squareDim, y: 0, colour: "#d25627", alpha: 1},
    {x: squareDim*2, y: 0, colour: "#f04941", alpha: 1},
    {x: squareDim*3, y: 0, colour: "#ca3732", alpha: 1},
    // Row 1
    {x: 0, y: squareDim, colour: "#14a085", alpha: 1},
    {x: squareDim, y: squareDim, colour: "#e57e25", alpha: 1},
    {x: squareDim*2, y: squareDim, colour: "#c5ccb8", alpha: 1},
    {x: squareDim*3, y: squareDim, colour: "#e1e9d1", alpha: 1},
    // Row 2
    {x: 0, y: squareDim*2, colour: "#26b99a", alpha: 1},
    {x: squareDim, y: squareDim*2, colour: "#3b97d3", alpha: 1},
    {x: squareDim*2, y: squareDim*2, colour: "#e1e9d1", alpha: 1},
    {x: squareDim*3, y: squareDim*2, colour: "#eff5dc", alpha: 1},
    // Row 3
    {x: 0, y: squareDim*3, colour: "#000000", alpha: 0},
    {x: squareDim, y: squareDim*3, colour: "#2980ba", alpha: 1},
    {x: squareDim*2, y: squareDim*3, colour: "#9778b5", alpha: 1},
    {x: squareDim*3, y: squareDim*3, colour: "#894b9d", alpha: 1},
];

// Order in which we draw the squares (controls how strokes overlap)
// Gray squares go beneath everything else
var drawOrder = [6, 7, 10, 11, 0, 1, 2, 3, 4, 5, 8, 9, 12, 13, 14, 15];
// Order in which we animate the squares
var fadeOrder = [3, 2, 1, 5, 4, 8, 9, 13, 14, 15, 11, 7, 6, 10];
var unfadeOrder = [10, 6, 7, 11, 15, 14, 13, 9, 8, 4, 5, 1, 2, 3];

var i = 0;
var colours2squares = {};

function fadeSquares(element1) {
    if (i >= fadeOrder.length) {
        drawMap(element1);
        return;
    }
    fadeFill(squares[fadeOrder[i]].elem,0);
    squareTimer = setTimeout(function(){ fadeSquares(element1)}, squareFadeTimeout);
    i++;
}

function unFadeSquares(element1) {
    if (i >= unfadeOrder.length) {

        return;
    }
    fadeFill(squares[unfadeOrder[i]].elem,1);
    console.log(unfadeOrder[i]);
    squareTimer = setTimeout(function(){ unFadeSquares(element1)}, squareFadeTimeout);
    i++;
}


function fadeFill(elem,revers) {
    elem.animate({"fill-opacity": revers}, fillFadeDuration);
}

// 3. Draw the map
function drawMap(element2) {

    Snap.load("/images/Map_cleaner.svg", function (f) {

        map = f.select("svg");
        element2.append(map);

        // Align the map and squares
        var t = new Snap.Matrix();
        t.translate(11, 0);
        map.transform(t);

        // Collect the map's groups and initialize its path animations
        for (var i = 0; i < squares.length; i++) {
            var g = map.select("#sq" + i);
            if (g) {
                squares[i].squareGroup = g;
                var paths = g.selectAll("path");
                for (var j = 0; j < paths.length; j++) {
                    var len = paths[j].getTotalLength();
                    paths[j].attr({
                        "totalLength": len,
                        "stroke-dasharray": len + " " + len,
                        "stroke-dashoffset": ""+len
                    });
                }
            }
        }

        var strokeFadeOrder = fadeOrder.reverse();
        var k = 0;
        drawMapPaths();

        function drawMapPaths() {
            if (k >= strokeFadeOrder.length) {
                return;
            }
            var idx = strokeFadeOrder[k];
            // Fade square stroke
            var elem = squares[idx].elem;

            if (elem) {
                elem.animate({"stroke-opacity": 0}, fillFadeDuration);
            }

            // Draw map group
            var g = squares[idx].squareGroup;
            var timeout = 0;
            if (g) {
                paths = g.selectAll("path");
                for (var j = 0; j < paths.length; j++) {
                    var len = paths[j].attr("totalLength");
                    paths[j].animate({"stroke-dashoffset": 1},
                            strokeAnimDuration*len/4);
                    if (strokeAnimDuration*len > timeout) {
                        timeout = strokeAnimDuration*len;
                    }
                }
            }
            squareTimer = setTimeout(drawMapPaths, squareFadeTimeout);
            k++;
        }

    });
}

function draw_initial_squer(element){
    // 1. Draw the initial filled squares
    for (var i = 0; i < drawOrder.length; i++) {
        var j = drawOrder[i];
        var s = element.rect(squares[j].x, squares[j].y, squareDim, squareDim);
        s.attr({
            fill: squares[j].colour,
            stroke: squares[j].colour,
            "stroke-width": squareStrokeWidth,
            "fill-opacity": squares[j].alpha,
            "stroke-opacity": squares[j].alpha
        });
        squares[j].elem = s;
        colours2squares[s.attr("stroke")] = j;
    }
}

function draw_initial_squer_2(element){
    // 1. Draw the initial filled squares
    for (var i = 1; i < unfadeOrder.length ; i++) {
        var j = unfadeOrder[i];
        var s = element.rect(squares[j].x, squares[j].y, squareDim, squareDim);
        s.attr({
            fill: squares[j].colour,
            stroke: squares[j].colour,
            "stroke-width": squareStrokeWidth,
            "fill-opacity": 0,
            "stroke-opacity": squares[j].alpha
        });
        squares[j].elem = s;
        colours2squares[s.attr("stroke")] = j;
    }
}


var logo1;
var logo;
var logo2;
var arrr;

$(function(){


    logo1 = Snap("#logo2");
    logo = Snap("#logo");
    logo2 = Snap(".logo_img");



    var flag2 = true;



/*
 line = arrr.path("M0 0 12 12"),
 line2 = arrr.path("M0 25 12 12"),
 matrix = new Snap.Matrix().translate(2, 2);
 line.attr({
 stroke: "#323232",
 strokeWidth: 2,
 strokeLinecap: "round"
 });
 line2.attr({
 stroke: "#323232",
 strokeWidth: 2,
 strokeLinecap: "round"
 });
арр меню
    arrr.node.onclick = function () {
        if(flag2 == true){

            $('#map .radio_menu.dropdown-menu').animate({minWidth:"370px",width:"370px"}, 400);
            $('#map .menu_drop_icon').animate({minWidth:"75px",width:"75px"}, 500, function(){
                $('#map .menu_drop_icon.dropdown-menu,#map .radio_menu.dropdown-menu').css("overflow","visible")
            });

            line.animate({path: "M0 0 25 25"}, 700);
            line2.animate({path: "M0 25 25 0"}, 700);
            flag2 = false;
        } else{
            $('#map .menu_drop_icon.dropdown-menu,#map .radio_menu.dropdown-menu').css("overflow","hidden");
            $('#map .radio_menu.dropdown-menu').animate({minWidth:"0",width:"0"}, 500);
            $('#map .menu_drop_icon').animate({minWidth:"0",width:"0"}, 500);
            line.animate({path: "M0 0 12 12"}, 700);
            line2.animate({path: "M0 25 12 12"}, 700);
            flag2 = true;
        }
    }
 line.transform(matrix);
 line2.transform(matrix);
*/



    draw_initial_squer(logo1);
    draw_initial_squer(logo);
    // 2. Fade the squares' fills to transparent according to fadeOrder
    var flag = true;

    $('#logo').hover(
        function() {
            if (flag == false) {
                $('.Trolltype').animate({top:"-75px"}, 200);
            }
        }, function() {
            if (flag == false) {
                $('.Trolltype').animate({top:"0px"}, 200);
            }
        }
    );

    logo.node.onclick = function () {
        if (flag == true) {
            i = 0;
            fadeSquares(logo);
            setTimeout(function () {
                jQuery('#page .span1').addClass('animated fadeOutLeftBig');
                jQuery('#page .span11.border-right').addClass('animated fadeOutRightBig');
                setTimeout(function () {
                    jQuery('#page').hide();
                    jQuery('#map').addClass('activeee');
                    jQuery('.site_logo, #logo-revers').addClass('animated_left');
                    lenn._onResize();
                    flag = false;
                }, 250)
            }, 1700);

        }
        if (flag == false) {
            i = 0;
            map.attr({visibility: "hidden"});
            i = 0;
            unFadeSquares(logo);
            i = 0;
            draw_initial_squer_2(logo);
            i = 0;
            $('.Trolltype').animate({top:"0px"}, 100);
            setTimeout(function () {
            jQuery('#page .span1').removeClass('fadeOutLeftBig').addClass('animated fadeInLeftBig');
            jQuery('#page .span11.border-right').removeClass('fadeOutRightBig').addClass('animated fadeInRightBig');
                jQuery('.site_logo').removeClass('animated_left');
                jQuery('#logo-revers').removeClass('animated_left');
                setTimeout(function () {
                    jQuery('#page .span1').removeClass('animated fadeInLeftBig fadeOutLeftBig');
                    jQuery('#page .span11.border-right').removeClass('animated fadeInRightBig fadeOutRightBig');

                    jQuery('#page').show();
                    jQuery('#map').removeClass('activeee');
                }, 700);
            }, 600);
            flag = true;
        }
    }
});

function enableParallax(){

    var ofset;

    if ($( document ).width() < 1290 && $( document ).width() > 1100 ){
        ofset =  $(".fixed").position().left;
        ofset = ofset + 18;
        $('.site_logo').css("left", ofset);
        $('#map #logo-revers ').css("left", ofset);
    } else if( $( document ).width() < 1100 ){

        ofset =  $(".fixed").position().left;
        ofset = ofset + 10;
        $('.site_logo').css("left", ofset);
        $('#map #logo-revers ').css("left", ofset);

    }
    else{
        ofset =  $(".fixed").position().left;
        ofset =  $(".fixed").position().left;
        ofset = ofset + 35;
        $('.site_logo').css("left", ofset);
        $('#map #logo-revers').css("left", ofset);
    }

    $('#part1').parallax("60%", 0.6);
}

$( document ).ready(function() {
    enableParallax();
    jQuery('.site_logo').addClass('animatede');
    jQuery('#logo-revers').addClass('animatede');
   
});

$( window ).resize(function() {
    var ofset;

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
        ofset = ofset + 35;
        $('.site_logo').css("left", ofset);
        $('#map #logo-revers').css("left", ofset);
    }

    var smerch;
    var tmp;

    if ($( document ).width() < 1131) {
        smerch = 0;
    }

    if ($( document ).width() > 1131){
        tmp = ($( document ).width() - 1131);
        smerch = ($( document ).width()/tmp)-5;
        console.log(smerch);
    }

});