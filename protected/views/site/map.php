<div id="logo-revers">
    <div class="logo_img"></div>
    <div class="Trolltype">HOME</div>
    <ul class="menu_drop_icon dropdown-menu" role="menu" aria-labelledby="dLabel">
        <li class="dropdown-submenu energy_menu">
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
             <li class="labele">
                 <a tabindex="-1" href="javascript:;">Labels</a>
                 <div class="icon_menu_labele"></div>
             </li>
             <li>
                 <div class="icon_menu_dropdown"><span class="img_test case_popul"></span></div>
                 <a tabindex="-1" href="javascript:;">POPULATION</a>
             </li>
            <li>
                <div class="icon_menu_dropdown"><span class="img_test ren_solar"></span></div>
                <a tabindex="-1" href="javascript:;">Solar</a>
            </li>
            <li>
                <div class="icon_menu_dropdown"><span class="img_test cloud"></span></div>
                <a tabindex="-1" href="javascript:;">Cloudy Days</a>
            </li>
            <li>
                <div class="icon_menu_dropdown"><span class="img_test ren_wind"></span></div>
                <a tabindex="-1" href="javascript:;">Wind</a>
            </li>
            <li>
                <div class="icon_menu_dropdown"><span class="img_test ren_gidropower"></span></div>
                <a tabindex="-1" href="javascript:;">Hydro</a>
            </li>

            <li>
                <div class="icon_menu_dropdown"><span class="img_test biomass"></span></div>
                <a tabindex="-1" href="javascript:;">BioMass </a>
            </li>
            <li>
                <div class="icon_menu_dropdown"><span class="img_test ren_Industrial"></span></div>
                <a tabindex="-1" href="javascript:;">Industrial Heat</a>
            </li>

            <li>
                <div class="icon_menu_dropdown"><span class="img_test agro"></span></div>
                <a tabindex="-1" href="javascript:;">Agriculture</a>
            </li>

        </ul>
        </li>
    </ul>


</div>

<div id="mapbox_content">

</div>


<div id="mapbox_legend">
    <div class="item solar smal">
        <div class="name">
        Solar
        </div>
        <div class="less">Less</div>
        <div class="more">more</div>
        <div class="colors clearfix">
               <div class="items item1">
                    <div class="caption">10</div>
               </div>
               <div class="items item2">
                    <div class="caption">20</div>
               </div>
               <div class="items item3">
                    <div class="caption">30</div>
               </div>
               <div class="items item4">
                    <div class="caption">40</div>
               </div>
        </div>
        <div class="arr"></div>
    </div>

    <div class="item biomass smal">
        <div class="name">
            BIOMASS POTENTIAL
        </div>
        <div class="less">Less</div>
        <div class="more">more</div>
        <div class="colors clearfix">
               <div class="items item1"></div>
               <div class="items item2"></div>
               <div class="items item3"></div>
               <div class="items item4"></div>
        </div>
        <div class="arr"></div>
    </div>


    <div class="item wind smal">
        <div class="name">
            Wind Speed
        </div>
        <div class="less">Less</div>
        <div class="more">more</div>
        <div class="colors clearfix">
               <div class="items item1"></div>
               <div class="items item2"></div>
               <div class="items item3"></div>
               <div class="items item4"></div>
               <div class="items item5"></div>
        </div>
        <div class="arr"></div>
    </div>

    <div class="item hydro smal">
        <div class="name">
            Hydro Energy
        </div>
        <div class="less">Less</div>
        <div class="more">more</div>
        <div class="circle clearfix">
               <div class="items item1"></div>
               <div class="items item2"></div>
               <div class="items item3"></div>
               <div class="items item4"></div>
               <div class="items item5"></div>
               <div class="items item6"></div>
        </div>
        <div class="arr"></div>
    </div>

    <div class="item Industrial smal">
        <div class="name">
            InDustrial Heat
        </div>
        <div class="less">Less</div>
        <div class="more">more</div>
        <div class="circle clearfix">
               <div class="items item1"></div>
               <div class="items item2"></div>
               <div class="items item3"></div>
               <div class="items item4"></div>
               <div class="items item5"></div>
               <div class="items item6"></div>
        </div>
        <div class="arr"></div>
    </div>

    <div class="item agriculture smal">
        <div class="name">
            agriculture use
        </div>

        <div class="colors clearfix">
               <div class="items item1">
                    <div class="caption">crops & other</div>
               </div>
               <div class="items item2">
                    <div class="caption">mixed</div>
               </div>
               <div class="items item3">
                    <div class="caption">livestock</div>
               </div>
        </div>
        <div class="arr"></div>
    </div>
</div>




<script type="text/javascript">
    jQuery(document).ready(function(){
//	jQuery('#mapbox_content').css({height:jQuery(window).height()});
//	var southWest = L.latLng(49.70, -122.20),
//	    northEast = L.latLng(48.80, -123.75),
//	    bounds = L.latLngBounds(southWest, northEast);
//
//	    
//
//	var lenn = L.mapbox.map('mapbox_content', 'http://pilipenko.gbksoft.com/test/server/CEE.tilejson', {
//	    maxBounds: bounds,
//	    maxZoom: 18,
//	    minZoom: 11,
//	    zoom: 12,
//	});

	jQuery('#mapbox_content').css({height:jQuery(window).height()});
    // ----------------------- create map object ------------ //
    var CEE_base_grey = L.tileLayer('http://pilipenko.gbksoft.com/cee_map/CEE_V001_base/{z}/{x}/{y}.png', {
            maxZoom: 15,
            minZoom: 11,
           //attribution: 'Map tiles by CIRs, Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>'
        }); 
    // add toner labels
    var Stamen_TonerLabels = L.tileLayer('http://{s}.tile.stamen.com/toner-labels/{z}/{x}/{y}.png', {
        //attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
        subdomains: 'abcd',
        minZoom: 11,
        maxZoom: 15
    });
    //var googleImagery = new L.Google('SATELLITE');
    // Roads layer
//    var CEE_roads = L.tileLayer('http://pilipenko.gbksoft.com/cee_map/CEE_V001_grey_roads/{z}/{x}/{y}.png', {
//            maxZoom: 18,
//            minZoom: 11,
//           //attribution: 'Map tiles by CIRs, Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>'
//        }); 

    // create map instance and setup 
    var bounds = [[48.6624, -123.9258], [49.7533, -122.02]];
    var map = L.map('mapbox_content', {
        center: [49.2503, -123.062],
        zoom: 11,
        maxZoom:15,
        minZoom:11,
        maxBounds:bounds,
        layers: [CEE_base_grey, Stamen_TonerLabels]});
	var lenn = map;
	window.lenn = map;
	
	lenn.on('ready', function() {	    
	    jQuery(window).resize(function(){
		jQuery('#mapbox_content').css({height:jQuery(window).height()});		
	    });
	});	
    
    // --- openshift tiles --- //
    // cloud tiles
    var cloudTiles = L.tileLayer('https://tileserver-jklee.rhcloud.com/clouds/{z}/{x}/{y}.png');
    // var cloudGrid = L.mapbox.gridLayer('https://tileserver-jklee.rhcloud.com/cloudDays/{z}/{x}/{y}.grid.json'),
    //     myGridControl = L.mapbox.gridControl(cloudGrid,{position:'bottomright'}).addTo(map);

    // population
    var population  = L.tileLayer('http://pilipenko.gbksoft.com/cee_map/population/{z}/{x}/{y}.png');
        
    // biomass
    var biomassTiles = L.tileLayer('http://pilipenko.gbksoft.com/cee_map/biomass/{z}/{x}/{y}.png');
    // var biomassGrid = L.mapbox.gridLayer('joeyklee.j18p72a4'),
    //     myGridControl = L.mapbox.gridControl(biomassGrid,{position:'bottomright'}).addTo(map);

    // solar
    var solarTiles = L.tileLayer('http://pilipenko.gbksoft.com/cee_map/solar/{z}/{x}/{y}.png');
    // var solarGrid = L.mapbox.gridLayer('joeyklee.j2cggnmb'),
    //     myGridControl = L.mapbox.gridControl(solarGrid,{position:'bottomright'}).addTo(map);

    // agriculture
    var agTiles = L.tileLayer('http://pilipenko.gbksoft.com/cee_map/agriculture/{z}/{x}/{y}.png');
    // var solarGrid = L.mapbox.gridLayer('joeyklee.j2cggnmb'),
    //     myGridControl = L.mapbox.gridControl(solarGrid,{position:'bottomright'}).addTo(map);

    //wind
    var windTiles = L.tileLayer('http://pilipenko.gbksoft.com/cee_map/wind/{z}/{x}/{y}.png');

    // -------------------- Create Layer groups for the layer toggler -------------------- //
    //  --- define layer groups --- //
    // solar
    var feature1 = L.layerGroup([solarTiles]);
    // population
    var feature2 = L.layerGroup([population]);
    // industrial
    var feature4 = L.layerGroup([]); 
    // biomass              
    var feature5 = L.layerGroup([biomassTiles]);
    // hydro
    var feature6 = L.layerGroup([]);
    // clouds
    var feature7 = L.layerGroup([cloudTiles]);
    // wind
    var feature3 = L.layerGroup([windTiles]);
    // agriculture
    var feature8 = L.layerGroup([agTiles]);

    // --- Layer toggler objects --- //
    // basemaps
    var baseMaps = {
        "CEE Map": CEE_base_grey,
        //"Google Imagery": googleImagery
    };
    // overlays
    var overlayMaps = {
        "Solar Potential": feature1,
        "Population": feature2,
        "Industrial": feature4,
        "Biomass": feature5,
        "Hydro": feature6,
        "Agriculture": feature8,
        "Cloud Days": feature7,
        "Wind": feature3,
        "Labels" : Stamen_TonerLabels
    };
    L.control.layers(baseMaps, overlayMaps, {position:'topleft'}).addTo(map); //bottomright
    
     $("#map .dropdown-menu:not([role='menu']) li").click(function() {
        $(this).toggleClass("click");
	var eqs = 0;
	var itm = false;
	if(jQuery(this).find('.img_test').hasClass('ren_solar')) {
	    eqs = 1;	    
	    itm = jQuery('#mapbox_legend .item.solar');
	    
	}else if(jQuery(this).find('.img_test').hasClass('case_popul')) {
	    eqs = 2;
	}else if(jQuery(this).find('.img_test').hasClass('ren_Industrial')) {
	    eqs = 3;	    
	    itm = jQuery('#mapbox_legend .item.Industrial');
	    
	}else if(jQuery(this).find('.img_test').hasClass('biomass')) {
	    eqs = 4;	    
	    itm = jQuery('#mapbox_legend .item.biomass');
	    
	}else if(jQuery(this).find('.img_test').hasClass('ren_gidropower')) {
	    eqs = 5;	    
	    itm = jQuery('#mapbox_legend .item.hydro');
	    
	}else if(jQuery(this).find('.img_test').hasClass('agro')) {
	    eqs = 6;	    
	    itm = jQuery('#mapbox_legend .item.agriculture');
	    
	}else if(jQuery(this).find('.img_test').hasClass('cloud')) {
	    eqs = 7;
	}else if(jQuery(this).find('.img_test').hasClass('ren_wind')) {
	    eqs = 8;	    
	    itm = jQuery('#mapbox_legend .item.wind');
	    
	}else if(jQuery(this).find('.img_test').hasClass('map_deman')) {
	    eqs = 0;
	}
	
	if(itm){
	    var itm_clone = itm.clone();
	    itm.remove();
	    jQuery('#mapbox_legend').prepend(itm_clone);

	    itm_clone.toggleClass('active');
	    var itm_size = jQuery('#mapbox_legend .item.active').size();

	    if(itm_size >= 4) {
		jQuery('#mapbox_legend .item.active').removeClass('big').addClass('smal');
		jQuery('#mapbox_legend .item.active:eq(0)').removeClass('smal').addClass('big');
	    }else{
		jQuery('#mapbox_legend .item.active').removeClass('smal').addClass('big');
	    }

	    itm_clone.fadeToggle(1);

	    $("#mapbox_legend .item").off('click').on('click',function() {
		if($(this).hasClass("big")){
		    $(this).removeClass("big").addClass("smal");
		} else {
		    $(this).removeClass("smal").addClass("big");
		}
	    });
	}
	
	$('.leaflet-control-layers-overlays label:eq('+eqs+')').trigger('click');
    });
    
    // -------------------- Data Rendered as SVG by geojson -------------------- //
    // --- Wind Layer --- //
    d3.json("/map_geo/wind_optimized.geojson", function(data) {
 
        // -------------- Set Scales -------------- //
        // get max and min
        var dataMax = d3.max(data.features, function(d){
            return d.properties.EU_12031_C});
        var dataMin = d3.min(data.features, function(d){
            return d.properties.EU_12031_C});

        var color = d3.scale.quantize()
                              .domain([dataMin,dataMax])
                              .range(colorbrewer.Blues[7]);

        // --- optional :start  -- //
        function highlightFeature(e) {
            var layer = e.target;
            layer.setStyle({
                weight: 0,
                color: '#ffffff',
                opacity: 0,
                fillOpacity: 0.0
            });

            if (!L.Browser.ie && !L.Browser.opera) {
                layer.bringToFront();
            }
        }

        var geojson;
        function resetHighlight(e) {
            geojson.resetStyle(e.target);
            e.target.closePopup();
        }
        function windPopUp(e) {
            // does this feature have a property named popupContent?
            var popupContent = "<p><center>Average wind speed at 80m (m/s):"+ "<br/>" 
                                + e.target.feature.properties.EU_12031_C+ "</center></p>";
            e.target.bindPopup(popupContent);
        }

        function onEachFeature(feature, layer) {
            layer.on({
                mouseover: highlightFeature,
                mouseout: resetHighlight,
                click: windPopUp
            });
        }
        // --- optional: end --- //

        // Style Wind
         var windStyle = function(feature){
            return {
                fillOpacity:0.20,
                weight:0,
                opacity:0,
                color: color(feature.properties.EU_12031_C)
            }
        };
        

        // geojson = L.geoJson(data, {
        //     style: windStyle,
        //     onEachFeature: onEachFeature //windPopUp
        // }).addTo(feature3);

    }); // d3 end

    // --- Industrial Layer --- //
    d3.json("/map_geo/industrial.geojson", function(data) {

        // -------------- Set Scales -------------- //
        // get max and min
        var dataMax = d3.max(data.features, function(d){
            return d.properties.PotentE});
        var dataMin = d3.min(data.features, function(d){
            return d.properties.PotentE});
        // Set the Color - Not necessary for this case
        var color = d3.scale.linear()
                      .domain([dataMin, dataMax])
                      .range(["#6631E8","#6631E8"])
        // Set the Scale - Log Scale for emphasis
        var scale = d3.scale.log()
                      .domain([dataMin,dataMax])
                      .range([1, 15])
        // Style the Industrial Points Using helpful D3 tools 
        var industrialStyle = function (feature, latlng) {
            return L.circleMarker(latlng, {
                radius: scale(feature.properties.PotentE),
                fillColor: color(feature.properties.PotentE),
                color: "#000",
                weight: 1,
                opacity: 0,
                fillOpacity: 0.6
            });
        } 
        // Set the PopUp Content
        var industrialPopUp = function onEachFeature(feature, layer) {
            // does this feature have a property named popupContent?
            var popupContent = "<p><center>Industry:"+ "<br/>" 
                                + feature.properties.CATEGORY+ "</center></p>";
            layer.bindPopup(popupContent);
        }
        // Load Geojson Points using Native Leaflet
        var industralPoints = L.geoJson(data, {
            onEachFeature: industrialPopUp,
            pointToLayer: industrialStyle
        }).addTo(feature4);
    }); // D3 End

    // --- Hydro Layer --- // 
    d3.json("/map_geo/bchydro_data.geojson", function(data){

        // -------------- Set Scales -------------- //
        // get max and min
        var dataMax = d3.max(data.features, function(d){
            return d.properties.AVG_ANN_EN});
        var dataMin = d3.min(data.features, function(d){
            return d.properties.AVG_ANN_EN});
        // Set the Color - Not necessary for this case
        var color = d3.scale.linear()
                      .domain([dataMin, dataMax])
                      .range(["#56ABFF","#56ABFF"])
        // Set the Scale - Log Scale for emphasis
        var scale = d3.scale.log()
                      .domain([dataMin,dataMax])
                      .range([1, 15])
        // Style the Industrial Points Using helpful D3 tools 
        var hydroStyle = function (feature, latlng) {
            return L.circleMarker(latlng, {
                radius: scale(feature.properties.AVG_ANN_EN),
                fillColor: color(feature.properties.AVG_ANN_EN),
                color: "#000",
                weight: 1,
                opacity: 0,
                fillOpacity: 0.6
            });
        }
        // Set the PopUp Content
        var hydroPopUp = function onEachFeature(feature, layer) {
            // does this feature have a property named popupContent?
            var popupContent = "<p><center>Potential Hydro Energy:"+ "<br/>" 
                                + feature.properties.AVG_ANN_EN + "</center></p>";
            layer.bindPopup(popupContent);
        }
        // Load Geojson Points using Native Leaflet
        var hydroPoints = L.geoJson(data, {
            onEachFeature: hydroPopUp,
            pointToLayer: hydroStyle
        }).addTo(feature6);
    }); // d3 end


    //L.control.locate({position:"topleft"}).addTo(map);

}); // jQuery End


</script>