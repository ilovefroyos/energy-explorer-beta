
$(document).ready(function(){
 
    

 $('#map .dropdown-submenu.energy_menu.nohover .dropdown-menu', window.parent.document).show();

       
	// ---------- Initialize Map Object ---------- //
	var map = L.map('map', {
	    center: [49.2503, -123.062],
	    zoom: 11,
	    maxZoom:20,
	    attributionControl:false,
	    zoomControl: false
	});
	var info = L.mapbox.infoControl({position:'bottomleft'});
	info.addTo(map);

	var CEE_base_grey = L.tileLayer('http://tiles.energyexplorer.ca/CEE_V001_base/{z}/{x}/{y}.png', {
	        maxZoom: 15,
	        minZoom: 10,
            zIndex:1,
	       attribution: 'Map tiles by <a href="http://cirs.ubc.ca/">CIRs</a>, Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>'
	    }).addTo(map); 
    var CEE_Labels = L.tileLayer('http://tiles.energyexplorer.ca/metro_labels_overlap/{z}/{x}/{y}.png', {
        // attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
        subdomains: 'abcd',
        minZoom: 10,
        maxZoom: 15,
        zIndex:1000
    }).addTo(map);
    // Roads layer
    var CEE_roads = L.tileLayer('http://tiles.energyexplorer.ca/CEE_V001_grey_roads/{z}/{x}/{y}.png', {
            maxZoom: 15,
            minZoom: 10,
            zIndex:5,
           // attribution: 'Map tiles by <a href="http://cirs.ubc.ca/">CIRs</a>, Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>'
    }).addTo(map);

	// --- openshift tiles --- //
    // cloud tiles - tileserver-jklee
    var cloudTiles = L.tileLayer('http://tiles.energyexplorer.ca/clouds/{z}/{x}/{y}.png',{zIndex:7});
    // population
    var population  = L.tileLayer('http://tiles.energyexplorer.ca/population/{z}/{x}/{y}.png',{zIndex:4});
    // biomass
    var biomassTiles = L.tileLayer('http://tiles.energyexplorer.ca/biomass/{z}/{x}/{y}.png',{zIndex:3});
    var biomassGrid = new L.UtfGrid('http://tiles.energyexplorer.ca/biomass/{z}/{x}/{y}.grid.json', {
            useJsonP: false
        });
    biomassGrid.on('mouseover', function (e) {
            if (e.data) {
                document.getElementById('hover').innerHTML = "<center><p class='title'>Biomass Harvest Potential (tonnes hectares <sup>-1</sup> year<sup>-1</sup>): <br> " + e.data.Biomass + "</p><p class='value'</p></center>";
                // document.getElementById('hover').innerHTML = "<center>" + e.data.Biomass +"</center>";
            } else {
                document.getElementById('hover').innerHTML = 'Hover on features';
            }
        });
    // solar
    var solarTiles = L.tileLayer('http://tiles.energyexplorer.ca/solar/{z}/{x}/{y}.png',{zIndex:3});
    var solarGrid = new L.UtfGrid('http://tiles.energyexplorer.ca/solar/{z}/{x}/{y}.grid.json', {
            useJsonP: false
        });
    solarGrid.on('mouseover', function (e) {
            if (e.data) {
                document.getElementById('hover').innerHTML = "<center><p class='title'>Solar Radiation Potential (kWh): <br> " + e.data.S_Rad_kWh + "</p><p class='value'</p></center";
            } else {
                document.getElementById('hover').innerHTML = 'Hover on features';
            }
        });
    // agriculture
    var agTiles = L.tileLayer('http://tiles.energyexplorer.ca/agriculture_col2/{z}/{x}/{y}.png',{zIndex:3});
    var agGrid = new L.UtfGrid('http://tiles.energyexplorer.ca/agriculture_col2/{z}/{x}/{y}.grid.json', {
            useJsonP: false
        });
    agGrid.on('mouseover', function (e) {
            if (e.data) {
                document.getElementById('hover').innerHTML = "<center> <p class='title'>Land Use Category: <br> " + e.data.cat + "</p><p class='value'</p></center>";
            } else {
                document.getElementById('hover').innerHTML = 'Hover on features';
            }
        });
    //wind
    var windTiles = L.tileLayer('http://tiles.energyexplorer.ca/wind/{z}/{x}/{y}.png',{zIndex:3});
    var windGrid = new L.UtfGrid('http://tiles.energyexplorer.ca/wind/{z}/{x}/{y}.grid.json', {
            useJsonP: false
        });
    windGrid.on('mouseover', function (e) {
            if (e.data) {
                document.getElementById('hover').innerHTML = "<center><p class='title'>Average wind speed at 80m height (ms<sup>-1</sup>): <br> " + e.data.EU_12031_C + "</p><p class='value'</p></center>";
            } else {
                document.getElementById('hover').innerHTML = 'Hover on features';
            }
            
        });
   
    
	// ----------- Create Layer groups for the layer toggler ----------- //
    //  --- define layer groups --- //
    var solarclouds = L.layerGroup([solarTiles, solarGrid, cloudTiles]);
     var windgroup = L.layerGroup([windTiles, windGrid]);
    var biomassag = L.layerGroup([biomassTiles, biomassGrid, agTiles, agGrid]);
   

    var industrial = L.featureGroup([]).bringToFront();
    var hydro = L.featureGroup([]).bringToFront();

    var toggler = {
        "Solar Potential & Cloud Days": solarclouds,
        "Wind Energy": windgroup,
        "Biomass Potential & Agriculture": biomassag,
        "Hydropower": hydro,
        "Industrial Heat":industrial,
        "Population Density": population
    };
    L.control.layers(toggler,null, {position:'bottomleft'}).addTo(map); //bottomright

    // console.log($("input:radio:eq(1)"));
    $("input:radio[name=leaflet-base-layers]").click(function() {
       
       $('.hoverinfo').empty();
 
        var value = $(this).parent().children('span').text();
//         console.log(value);
        $('.legend').empty();
//        $('#hover .value').empty();

        // Solar & clouds
        if($.trim(value) === 'Solar Potential & Cloud Days'){
            $('.hoverinfo').html('SOLAR RADIATION POTENTIAL');
              $('#hover .title').html("SOLAR RADIATION POTENTIAL");
          $('.legend').append('<table><tr><td rowspan="2">LOW 0.2 KWH</td><td class="titlelegend">SOLAR POTENTIAL</td><td rowspan="2">HIGH 1.2 KWH</td></tr><tr><td><img class="solarlegend" src="img/SOLAR.png" /></td></tr></table>');
            $('.legend').append('<table><tr><td rowspan="2">MIN 192 DAYS</td><td class="titlelegend">CLOUDY DAYS</td><td rowspan="2">MAX 304 DAYS</td></tr><tr><td><img class="solarlegend" src="img/clouds_legend.png" /></td></tr></table>');
           // map.setView([49.2503, -123.062], 11);
           
        } else {
            $('.solarlegend').remove();
        }
         //  wind energy
        if($.trim(value) === 'Wind Energy'){
             $('.hoverinfo').html('AVERAGE WIND SPEED AT 80 METERS');
             $('#hover .title').html("AVERAGE WIND SPEED AT 80 METERS");
         $('.legend').append('<table><tr><td rowspan="2">LOW 1.8 MS<sup>-1</sup></td><td class="titlelegend">WIND SPEED</td><td rowspan="2">HIGH 7.8 MS<sup>-1</sup></td></tr><tr><td><img class="wind" src="img/WIND.png" /></td></tr></table>');
           // map.setView([49.2503, -123.062], 11);
        } else {
            $('.wind').remove();
        }
        //  biomass & agriculture
        if($.trim(value) === 'Biomass Potential & Agriculture'){
             $('.hoverinfo').html('BIOMASS HARVEST POTENTIAL');
               $('#hover .title').html("BIOMASS HARVEST POTENTIAL");
            $('.legend').append('<table><tr><td rowspan="2">LESS</td><td class="titlelegend">BIOMASS POTENTIAL</td><td rowspan="2">MORE</td></tr><tr><td><img class="biomassag" src="img/BIOMASS.png" /></td></tr>\
            <tr><td>&nbsp;</td></tr>\
            <tr><td rowspan="3">&nbsp;</td><td class="titlelegend">AGRICULTURE USE</td><td rowspan="3">&nbsp;</td></tr><tr><td><img class="biomassag" src="img/AG.png" /></td></tr><tr><td><div class="col-sm-4">CROPS & OTHER</div><div class="col-sm-4">MIXED</div><div class="col-sm-4">LIVESTOCK</div></td></tr></table>');
           // map.setView([49.281732, -122.831565], 11);
        } else {
            $('.biomassag').remove();
        }
       
        
        //Hydropower
        if($.trim(value) === 'Hydropower'){
        $('.hoverinfo').html('POTENTIAL HYDRO POWER');
      
            $('#hover .title').html("POTENTIAL HYDRO POWER");
            $('#hover .value').html("CLICK A CIRCLE");
           $('.legend').append('<img class="hydro" src="img/HYDRO.png" />');
           $('.legend').append('<p class="hydro">Potential run-of-river power from low (0.5 units) to high (79.1 units).</p>');
           // map.setView([49.343507, -122.997733], 11);
        } else {
            $('.hydro').remove();
        }
        
        // Industrial & Hydro
        if($.trim(value) === 'Industrial Heat'){
             $('.hoverinfo').html('POTENTIAL HEAT RECOVER');
            $('#hover .title').html("POTENTIAL HEAT RECOVERY");
            $('#hover .value').html("CLICK A CIRCLE");
           $('.legend').append('<img class="industrial" src="img/INDUSTRIAL.png" />');
           $('.legend').append('<p class="industrial">Potential Industrial heat recovery from low (8.0 units) to high (39554.7 units), labeled by industry.</p>');
           // map.setView([49.343507, -122.997733], 11);
        } else {
            $('.industrial').remove();
        }
        //  Population Density
        if($.trim(value) === 'Population Density'){
 $('.hoverinfo').html('POPULATION DENSITY OF METRO VANCOUVER');
             $('#hover .title').html("POPULATION DENSITY OF METRO VANCOUVER");
             $('#hover .value').html("EACH DOT = 1 PERSON");
         $('.legend').append('<table><tr><td rowspan="2">&nbsp;</td><td>POPULATION DENSITY</td><td rowspan="2">&nbsp;</td></tr><tr><td><img class="solarlegend" src="img/POP.png" /></td></tr></table>');
           // map.setView([49.212254, -122.951041], 11);
        } else {
            $('.pop').remove();
        }
        
         $('#infoside').show();
    });

    // ---------------- industrial hydro ------------------ //
    // --- Industrial Layer --- //
    d3.json("data/industrial.geojson", function(data) {
        // -------------- Set Scales -------------- //
        // get max and min
        var dataMax = d3.max(data.features, function(d){
            return d.properties.PotentE});
        var dataMin = d3.min(data.features, function(d){
            return d.properties.PotentE});
        // Set the Color - Not necessary for this case
        var color = d3.scale.linear()
                      .domain([dataMin, dataMax])
                      .range(["#6631E8","#6631E8"]);
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
        function onEachFeature(feature, layer) {
            // does this feature have a property named popupContent?
            var popupContent = "<p><center>Industry:"+ "<br/>" 
                                + feature.properties.CATEGORY+ "</center></p>";
            layer.bindPopup(popupContent);
            // console.log(layer);
        }

        // Load Geojson Points using Native Leaflet
        var industralPoints = L.geoJson(data, {
            onEachFeature: onEachFeature,
            pointToLayer: industrialStyle
        }).addTo(industrial);
    }); // D3 End

    // --- Hydro Layer --- // 
    d3.json("data/bchydro_data.geojson", function(data){
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
        }).addTo(hydro);
    }); // d3 end



    // ---------------- Donut chart ----------------- //
    d3.json('data/ceei_2010_metrovan_formatted.geojson', function(data){
        // console.log(data);

        var svgstyle = function style(feature) {
            return {
                fillColor: "#fff",
                weight: 1,
                opacity: 0,
                color: '#2C3E50', //#fff
                // dashArray: '3',
                fillOpacity: 0
            };
        }

        function highlightFeature(e) {
            var layer = e.target;

            layer.setStyle({
                weight: 2,
                opacity: 0.85,
                color: '#2C3E50', //#fff
                dashArray: '',
                fillOpacity: 0
            });
            //  uncomment if you want this layer to render on top
            // if (!L.Browser.ie && !L.Browser.opera) {
            //     layer.bringToFront();
            // }

            // info.update(layer.feature.properties);
        }

        function resetHighlight(e) {
            geojson.resetStyle(e.target);
            // info.update();
        }
         var lastClickedLayer;
        function makegraph(e){
            hideMenuLayers();

            var temp = e.target.feature.properties;
            // delete temp.metroname;
            document.getElementById('piecity').innerHTML = temp.metroname;
            $('#piecityWrap').show();

            var keys = [];
            for(var k in temp) if(k !== "metroname") keys.push(k);

            var dat = [];
            for (var i in temp) if(i !== "metroname") dat.push(temp[i]);

            var listOfObjects = [];
            for(var i = 0; i < keys.length; i++){
                var singleObj = {}
                singleObj['label'] = keys[i];
                singleObj['value'] = dat[i];
                listOfObjects.push(singleObj);
            }
            // Donut chart example
            var energypie = nv.addGraph(function() {
              var chart = nv.models.pieChart()
                  .x(function(d) { return d.label })
                  .y(function(d) { return d.value })
                  .margin({top: -10, right: -10, bottom:-10, left: -10})
                  // .margin({top: 0, right: 0, bottom:0, left: 0})
                  .showLegend(false)
                  .showLabels(true)     //Display pie labels
                  .labelThreshold(.05)  //Configure the minimum slice size for labels to show up
                  .labelType("percent") //Configure what type of data to show in the label. Can be "key", "value" or "percent"
                  .donut(true)          //Turn on Donut mode. Makes pie chart look tasty!
                  .donutRatio(0.35)     //Configure how big you want the donut hole size to be.
                  ;

                d3.select("#pietemp")
                    .style("display", "block")
                    .datum(listOfObjects)
                    .transition().duration(350)
                    .style({ 'width': '100%', 'height': '100%' })
                    .style("padding", "0")
                    .call(chart);


              return chart;
            }); // nvd3 end


 if(lastClickedLayer){
                   geojson.resetStyle(lastClickedLayer);
            }
             var layer = e.target;
                
                layer.setStyle({
                weight: 2,
                opacity: 0.85,
                // color: '#2C3E50', //#fff
                fillColor: '#fff',
                dashArray: '',
                fillOpacity: 0.15
                });

                    lastClickedLayer = layer ;
        }


        function onEachFeature(feature, layer) {
            layer.on({
              //  mouseover: highlightFeature,
              //  mouseout: resetHighlight,
                click: makegraph,
            });

        }


        geojson = L.geoJson(data, {
            style: svgstyle,
            onEachFeature: onEachFeature
        }).addTo(map);

    }); // d3 end

    // --- add ip locator --- //
    // L.control.locate({position:"bottomright"}).addTo(map);

        $('.map-go-back').on('click', function(e) {
        e.preventDefault();
        window.parent.window.logoAnimate();
        window.parent.window.location.href=window.parent.window.location.href;
    });

    function hideMenuLayers() {
        $('#map .dropdown-submenu.energy_menu.nohover .dropdown-menu', window.parent.document).hide();
    }

    map.on('click', function(e) {
        hideMenuLayers();
    });
}); // docready end