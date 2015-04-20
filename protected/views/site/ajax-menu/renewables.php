<?php 
    if(stristr($_SERVER['HTTP_USER_AGENT'],'macos') || stristr($_SERVER['HTTP_USER_AGENT'],'window') || stristr($_SERVER['HTTP_USER_AGENT'],'linux')){
	$img = 'svg';
    }else{
	$img = 'png';
    }
?>

<script>

$(document).scroll(function(){

    $('section').each(function(){
        if (
           $(this).offset().top < window.pageYOffset + 10
        && $(this).offset().top + $(this).height() > window.pageYOffset + 10
        ) {
           history.pushState(null,null,'#'+$(this).attr('id'));
        }
          

    });
});

</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-45724446-1', 'auto');
  ga('send', 'pageview');

</script>

    <div class="wrapper"> <div  class="improve"><img src="../bootstrap/img/icon/improve.svg"><span>HELP US BETA TEST THIS WEBSITE</span></div></div>
   
    <div class="overlay"></div>
<div class="modal_form_improve">
<form class="sendEmail">
     <img class="modal_close" src="../bootstrap/img/icon/close.svg">
  <img class="logo_modal" src="../bootstrap/img/logo1.svg"><br><br>
  <p class="text-center">THE COMMUNITY ENERGY EXPLORER</p><br>
      <p class="text-center">Thank you to our early supporters. We have completed our beta test survey <br>& will soon be in contact with interested beta testers.</p><br>
      
</div>
 
<div id="part1renewables">
   
    <div class="toper green <?php echo $img;?>_img">
        <h2>
        Renewable Energy
        in Metro Vancouver
        </h2>
        <div class="text">
        This section provides an inventory of the potential capacity of select renewable energy resources across the Metro Vancouver region, and describes issues arising from the associated technologies. 
<br/><br/>However it does not reflect constraints of economic viability, social acceptability or current regulations.  Existing data from various sources are analyzed and mapped using new techniques suitable to communicating energy resources at a regional scale.
        </div>
    </div>

</div>




 <!--  SOLAR    -->
 <!--  SOLAR    -->
 <!--  SOLAR    -->
    
    

<section id="solar">    
<div   id="part2" data-map-title="MAP SOLAR ENERGY" data-map-id="0" data-hash="solar">
    <a id="solar"></a>
    <div class="smallArrowRight green header_margin <?php echo $img;?>_img">
        <h2>Solar Energy</h2>
        <h3 class="line">
            EXPLORING Solar Energy potential
        </h3>
        <div class="text">
            Solar energy can be collected using panels to produce hot water or electricity. 
<br/><br/>Solar Enery from the sun can provide energy to buildings using proven systems such as solar photovoltaic (PV) and solar thermal energy.
        </div>
    </div>

  <img class="imgposition2" src="http://www.energyexplorer.ca/images/solar_big.jpg" align="right" alt="img">

   <div class="block-big-text-green">Solar</div>
</div>

    <div  id="part3" data-map-title="MAP SOLAR ENERGY" data-map-id="0" data-hash="solar">
    <a id="solar"></a>
    <div class="smallArrowLeft green <?php echo $img;?>_img">
        <h2>PhotoVoltaics vs solar hot water</h2>
        <h3 class="line">
            Sunlight in, electricity savings out
        </h3>
        <div class="text">
            There are two main forms of solar energy harnessing technologies: Photovoltaics and Solar hot water. </br>

            Photovoltaic solar panels take the sunlight energy directly from the sun and process incoming light in its solar cells.

            Solar hot water systems use the energy from the sun to heat water on site. The water can be used for showers, dishwashing, laundry, or otheneeds. 
        </div>
    </div>
    <br/>
    <div class="label-right" style="margin-top:75px;">
       Solar Energy Types
    </div>    
     <ul class="rslides" id="slider">
      <li>
        <img class="no_filter" src="http://www.energyexplorer.ca/images/Solar_Potential_Slide1.<?php echo $img;?>" alt="img">
            <div class="caprion_of_the_slider">
            <p>Photovoltaics in a solar farm can distribute energy in the form of electricity at larger scales</p>
            
      </li>
      <li>
        <img src="http://www.energyexplorer.ca/images/Solar_Potential_Slide2.<?php echo $img;?>" alt="img2" align="center">
            <div class="caprion_of_the_slider">
            <p>Solar hot water can either heat the water supply or provide space heating</p>
       
      </li>
      </ul>                   
       <br><br><br>                

</div>



 <div  id="part3" data-map-title="MAP SOLAR ENERGY" data-map-id="0" data-hash="solar">
    <a id="solar"></a>
    <div class="smallArrowRight green <?php echo $img;?>_img">
        <h2>Solar Potential</h2>
        <h3 class="line">
            Harnessing the power of the sun
        </h3>
        <div class="text">
            Energy generated from assessed south and flat roofs has the potential to heat 650,000 typical households or provide electricity for 900,000 typical households for a year. 
        </div>
    </div>
    <br/>
    <div class="label-left" style="margin-top:90px;">
     Solar Heat and Power
    </div>
    <div class="center_block">
      <img class="no_filter" src="http://www.energyexplorer.ca/images/Solar_Potential_Potential.<?php echo $img;?>" align="center" alt="img">
    </div>
    
<?php /*
    <ul class="rslides" id="slider">
      <li>
        <img class="no_filter" src="http://www.energyexplorer.ca/images/Solar_Potential_SunOrientation.<?php echo $img;?>" alt="img">
            <div class="caprion_of_the_slider">
            <p>Summer solar angle of incidence</p>
            
      </li>
      <li>
        <img class="no_filter" src="http://www.energyexplorer.ca/images/Solar_Potential_SunOrientation2.<?php echo $img;?>" alt="img2" align="center">
            <div class="caprion_of_the_slider">
            <p>Winter solar angle of incidence</p>
       
      </li>
    </ul>
*/ ?>
    <div class="label-left">
       solar energy videos
    </div>    
    <br/><br/>
    <ul class="rslides" id="slider">
      <li>
       <iframe src="//player.vimeo.com/video/19776200?title=0&amp;byline=0&amp;portrait=0&amp;color=c9ff23" width="100%" height="350" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
      </li>
      <li>
        <iframe src="//player.vimeo.com/video/61109273?title=0&amp;byline=0&amp;portrait=0&amp;color=c9ff23" width="100%" height="350" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
      </li>
    </ul>                  
<br/><br/>
    </div>

    <div   id="part3" data-map-title="MAP SOLAR ENERGY" data-map-id="0" data-hash="solar">
    <a id="solar"></a>
    <div class="smallArrowLeft green <?php echo $img;?>_img">
        <h2>Issues around Solar Energy</h2>
        <h3 class="line">
            Here comes the sun
            <!-- Geography matters -->        </h3>
        <div class="text">
            When implementing PV or solar hot water pannels, it is important to consider the diurnal and seasonal variability of sunlight. </br>
           While energy derived from the sun is a enticing option, there are a number of concerns around the viability of solar systems. 
        </div>
    </div>
    <br/>
    <div class="label-right" style="margin-top:75px;">
       Solar Shade
    </div>
    <div class="inline_block">
	<div class="span6">
	       <img class="no_filter" src="http://www.energyexplorer.ca/images/SolarShade.<?php echo $img;?>" align="center" alt="">
	</div>

        <div class="span5">
	 <div class="span12 text-iner-right ">
	     </br></br>The energy produced by a solar panel changes throughout the day and year depending on sun angles and cloud cover. 
<br/>
    <br/>
This intermittency in energy output requires consideration of additional energy technologies to supply energy when the sun is not shining.
         </div>
        </div>
        </div>
    
    <div class="label-left">
       Intermittency
    </div>
    <div class="inline_block">
        <div class="span5">
	<div class="span12 text-iner-right left">
	    </br>The energy produced by a solar panel changes throughout the day and year depending on sun angles and cloud cover. 
<br/>
    <br/>
This intermittency in energy output requires consideration of additional energy technologies to supply energy when the sun is not shining.
	</div>
            </div>
	<div class="span6 right">
		<img class="no_filter" src="http://www.energyexplorer.ca/images/SolarIntermetency.<?php echo $img;?>" align="center" alt="" class="add_bull">
	</div>

    </div>

</div>


     
   <div  id="part4"  data-map-title="MAP SOLAR ENERGY" data-map-id="0">
     <a id="solar"></a>
    <div class="smallArrowLeft green <?php echo $img;?>_img">
        <h2>Solar by the Numbers</h2>
        <h3 class="line">
           Geography matters
        </h3>
        <div class="text">
           Given that rooftops are some of the most suitable locations for siting PV or solar hot water systems, where might solar energy systems have a high potential for growth?
        </div>
        <div class="label-left" style="margin-top:110px; ">
     Available Rooftop Solar Sites
    </div>
    
    <div class="center_block">
     <br/><br/><br/>
     <img class="no_filter" src="http://www.energyexplorer.ca/images/Solar_Rooftop_Chart.<?php echo $img;?>" align="center" alt="img" >
       <br/>
       <br/>
    </div>
  </div>
   </div>
      
        <div   id="part3" class="part3" data-map-title="MAP SOLAR ENERGY" data-map-id="0">
    <a id="solar"></a>
    <div class="LargeArrowLeft green <?php echo $img;?>_img">
        <h2>Local Examples : YVR AIRPORT</h2>
        <h3 class="line">
Vancouver International Airport’s Solar Hot Water System, Richmond, B.C</h3>
        <div class="text">
            In 2003, the Vancouver International Airport installed 100 solar panels on the roof o the domestic terminal building. The system uses evacuated tube solar collectors to absorb solar energy and transfers the heat to water.
<br/>
    <br/>
The panels heat over 3000 litres of water every hour, which has led to a 25% decrease in natural gas use in the terminal.
<br/>
    <br/>
The cost of the project was about $500,000 and the airport reports energy savings of more than $100,000 a year. Furthermore, by reducing natural gas use, the airport has also amanged to lower its carbon emissions. 
        </div>
    </div>
 <br/>
    <div class="label-right">
       solar hot water at yvr
    </div>
      <img src="http://www.energyexplorer.ca/images/yvrhotwater-long.jpg" align="center" alt="img">

    </div>

        <div  style="height:900px" id="part3" class="part3_1" data-map-title="MAP SOLAR ENERGY" data-map-id="0">
    <a id="solar"></a>
    <div class="LargeArrowRight green <?php echo $img;?>_img">
        <h2>Local Examples : T’Sou-ke Nation</h2>
        <h3 class="line">
            Sum-SHA-Thut, Sooke, B.c.
        </h3>
        <div class="text">
            The T’Sou-ke Nation is a small First Nation community located on the very southern tip of Vancouver Island. The community has completed a 75-kilowatt solar power installation, which is the largest in B.C. to date. The project is called Sum-SHA-Thut, the Sencoten term for “sunshine”.
	    <br/><br/>
	    The T’Sou-ke solar power installation generates electricity from photovoltaic panels. They have also installed solar thermal panels on 37 (out of 86) homes to pre-heat hot water, further reducing energy consumption and their carbon emissions. 
        </div>
    </div>
  <br/>
    <div class="label-left" style="margin-top:-120px;">
       T’Sou-ke Nation solar power 
    </div>
      <img style="margin-top:-45px;" src="http://www.energyexplorer.ca/images/tsoukesolar-long.jpg" align="center" alt="img">
   </div>
      
 </section>    
 <!-- WIND -->
 <!-- WIND -->
 <!-- WIND -->
      
      
 <section id="wind"> <a id="wind"></a>   
<div   id="part3" class="block_h_wind part3_2" data-map-title="MAP WIND ENERGY" data-map-id="1" >
    
    <div class="smallArrowLeft green header_margin <?php echo $img;?>_img">
        
        <h2>Wind</h2>
           <h3 class="line">
            Where can wind energy take our cities?
        </h3>
        <div class="text">
            Wind turbines provide some of the most iconic imagery when it to comes to renewable energy. 
            While establishing wind energy may face challenges, technological developments can help overcome the barriers limiting their presence in our communities.  
        </div>
    </div>
  <img class="imgposition2" src="http://www.energyexplorer.ca/images/wind_big.jpg" align="right" alt="img">
   <div class="block-big-text-green">
       Wind
    </div>
</div>
 <div  id="part3" class="part3_3" data-map-title="MAP WIND ENERGY" data-map-id="1">
    <a id="wind"></a>
    <div class="smallArrowRight green <?php echo $img;?>_img">
        <h2>Components of the System</h2>
        <h3 class="line">
            From turbulence to turbine
        </h3>
        <div class="text">
       Wind turbines use moving masses of air to spin their propellers and subsequently a generator which produces electricity. </br>
            Developing wind energy depends largely on available wind resources and innovative technologies that help harness higher wind speeds in low wind speed sites. 
        </div>
    </div>
     <br/>
    <div class="label-left" style="margin-top:95px;">
     Wind Farms harness power
    </div>
    <div class="center_block">
      <img class="no_filter" src="http://www.energyexplorer.ca/images/wind_farm.<?php echo $img;?>" align="middle" alt="img">
    </div>
    
    <div class="label-left">
     Wind Power 101 : two videos
    </div>
    <br/><br/>
       <ul class="rslides" id="slider">
     <li class="wideo">
        <iframe width="100%" height="350" src="//www.youtube.com/embed/niZ_cvu9Fts?list=PL7jUlt6AhEPzNM6uKy9nrr3mKdMHlb_P0" frameborder="0" allowfullscreen></iframe>

      </li>
      <li>
        <iframe width="100%" height="350" src="//www.youtube.com/embed/zutUe_0X3PA?list=PL7jUlt6AhEPzNM6uKy9nrr3mKdMHlb_P0" frameborder="0" allowfullscreen></iframe>

       
      </li>
</ul><br/><br/>
    </div>
     <div   style="height:780px" id="part3" class="part3_4" data-map-title="MAP WIND ENERGY" data-map-id="1">  
    <a id="wind"></a>
    <div class="smallArrowRight green <?php echo $img;?>_img">
        <h2>Local Examples : Dawson Creek</h2>
        <h3 class="line">
           Bear mountain wind park, dawson creek, B.C
        </h3>
        <div class="text">
            The T’Sou-ke Nation is a small First Nation community located on the very southern tip of Vancouver Island. The community has completed a 75-kilowatt solar power installation, which is the largest in B.C. to date. The project is called Sum-SHA-Thut, the Sencoten term for “sunshine”.
        </div>
    </div>
     <br/>
    <div class="label-right" style="margin-top:-180px;">
	Wind Power in Dawson Creek
    </div>
      <img style="margin-top:-100px;" src="http://www.energyexplorer.ca/images/windfarm-long.jpg" align="center" alt="img">

   </div>


<!-- HYDRO -->
<!-- HYDRO -->
<!-- HYDRO -->
 </section>  
     
     
 <section id="hydropower"><a id="hydropower"></a>   
 <div   id="part3" class="block_h_hydro part3_5" data-map-title="MAP HYDRO ENERGY" data-map-id="3">
    
    <div class="smallArrowLeft green header_margin <?php echo $img;?>_img">
        
        <h2>Hydropower</h2>
           <h3 class="line">
            Run-of-river technology provides a lower-impact hydropower solution
        </h3>
        <div class="text">
            Hydropower is considered a valuable and "clean" source of electricity, providing in many cases a secure local energy supply and other value added activities like fishing and recreation.
        </div>
    </div>
  <img class="imgposition2" src="http://www.energyexplorer.ca/images/fitzsimmonscreekROR-main.jpg" align="right" alt="img">
   <div class="block-big-text-green" >Run of River
</div>
</div>
<div  id="part3" class="part3_6" data-map-title="MAP HYDRO ENERGY" data-map-id="3">
    <div class="smallArrowRight green <?php echo $img;?>_img">
        <h2>Components of the System</h2>
        <h3 class="line">
            Reducing environmental impact while adding energy diversity
        </h3>
        <div class="text">
            Run-of-river (ROR) technologies generate electricity by harnessing the energy from water flows in streams and rivers, without the use of large dams. </br>
Typically, ROR projects funnel a river's flow through electricity generating turbines and then return the water back to the river downstream as opposed to impounding the water which is done in traditional hydroelectric dams.
        </div>
    </div>
     <br/>
    <div class="label-left" style="margin-top:95px;">
     Run of River overview
    </div>
    <div class="center_block">
       <br/>
    <img class="no_filter" src="/bootstrap/img/hydro_1.<?php echo $img;?>" align="center" alt="img">
 <br/>
    </div>
</div>
   <div  id="part3" class="part3_7" data-map-title="MAP HYDRO ENERGY" data-map-id="3">
    <a id="wind"></a>
    <div class="smallArrowLeft green <?php echo $img;?>_img">
        <h2>Run of River Potential</h2>
        <h3 class="line">
           Bear mountain wind park, dawson creek, B.C
        </h3>
        <div class="text">
            Energy generated from run-of-river projects in British Columbia has the potential to power up to 7,500 typical households for a year.
        </div>
    </div>
    <div class="label-right" style="margin-top:105px;">
     Run of River Potential
    </div>
    <div class="center_block">
     <br/><br/><br/>
      <img src="/bootstrap/img/hydro_2.<?php echo $img;?>" align="middle" alt="img">
       <br/>
       <br/>
    </div>
    <div class="label-left">
     micro hydro video
    </div>
    <br><br><br>
    <div class="center_block">
	<iframe src="//player.vimeo.com/video/8629111?title=0&amp;byline=0&amp;portrait=0&amp;color=c9ff23" width="100%" height="350" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe><br/><br/>
    </div>
   </div>
      
<div  id="part3" class="part3_8" data-map-title="MAP HYDRO ENERGY" data-map-id="3">
    <a id="hydropower"></a>
    <div class="smallArrowLeft green <?php echo $img;?>_img">
        <h2>Run of River Considerations</h2>
        <h3 class="line">
            An intricately connected system
        </h3>
        <div class="text">
            Installing ROR technologies on BC's rivers and streams requires careful consideration of their affect on fishbearing streams, protected areas, and aquatic recreation, to name a few.
        </div>
    </div>    
     <div class="label-right" style="margin-top:105px;">
     Fish Bearing Streams
    </div>
    <div class="inline_block">
 <div class="span6">
        <img class="no_filter" src="/bootstrap/img/hydro_3.<?php echo $img;?>" align="left" alt="">
    </div>
        <div class="span5">
    <div class="span12 text-iner-right">
	 To minimize impacts on native fish populations run-of-river projects can be installed upstream of fish bearing reaches. 
	 </br></br>
	The assessment of potential sites in Metro Vancouver accounts for known fish bearing streams.
    </div>
    <br/><br/>
        </div>
        </div>
    
    <div class="label-left">
     Protected Areas
    </div>
    
  <div class="inline_block">

      <div class="span5">
    <div class="span12 text-iner-right left">
	Many of the potential run-of-river sites in Metro Vancouver are located in protected areas.
	</br></br>
	These areas are designated as watersheds for drinking water or recreational areas, this raises key policy and public acceptance issues.
    </div>
          </div>
    <div class="span6 right">
        <img class="no_filter" src="/bootstrap/img/hydro_4.<?php echo $img;?>" align="right" alt="">
         <br/>
    </div>
    </div>
    

    
    <div class="label-right">
     Recreation
    </div>
    <div class="inline_block">
	<div class="span6">
	    <img class="no_filter" src="/bootstrap/img/hydro_5.<?php echo $img;?>" align="left" alt="">
	</div>
        <div class="span5">
	<div class="span12 text-iner-right right">
	    Many recreationists enjoy using creeks and rivers for activities such as kayaking, canoeing and fishing. 
	    </br></br>
	    However, there are opportunities for recreation and energy production to co-exist on the same stream. Various conditions are often negiotiated during project planning.
	 <br/>
         </div>
    </div>
    </div>
    

    </div> 
 
     
   <div style="height:800px;" id="part4" data-map-title="MAP HYDRO ENERGY" data-map-id="3"> >  
     <a id="hydropower"></a>
    <div class="smallArrowLeft green <?php echo $img;?>_img">
        <h2>Run of River Potential</h2>
        <h3 class="line">
            Going with the flow 
        </h3>
        <div class="text">
            The water resources of metro Vancouver that might appropriately house ROR systems lie largely in the northern part of the region.
        </div>
        <div class="label-left" style="margin-top:150px; ">
     Hydropower potential by municipality
    </div>
    
    <div class="center_block">
<!--     <br/><br/><br/>-->
     <img class="no_filter" src="http://www.energyexplorer.ca/images/Hydro_GWH_Chart.<?php echo $img;?>" align="center" alt="img" >
<!--       <br/>
       <br/>-->
    </div>
  </div>
  
  <div id="part3" class="part3_9" data-map-title="MAP HYDRO ENERGY" data-map-id="3">
    <a id="hydropower"></a>
    <div class="LargeArrowLeft green <?php echo $img;?>_img">
        <h2>Local Examples : Fitzsimmons Creek</h2>
        <h3 class="line">
           Fitzsimmons Creek Run-of-River Project, Whistler, B.C
        </h3>
        <div class="text">
            The Run-of-River facility at Fitzsimmons Creek in Whistler began generating electrivity in 2011. The system diverts water flow from the creek to run a turbine that produces electricity before returning the water to the creek.
	    </br></br>
	    The project has the ability to produce over 33 GWh of energy per year, which is enough to power Whistler Blackcomb’s summer and winter operations. The length of the stream where the project was installed is not a fish bearing area of the creek and the weir was constructed to maintain minimum water levels.

        </div>
    </div>
    <br/>
    <div class="label-left">
	Run of River at Fitzsimmons Creek
   </div>
      <img src="http://www.energyexplorer.ca/images/fitzsimmons.jpg" align="center" alt="img">
   </div>
            

 </section>


<!-- HEAT REVCOVERY-->
<!-- HEAT REVCOVERY-->
<!-- HEAT REVCOVERY-->

<section id="heat-recovery"><a id="heat-recovery"></a>
<div  id="part3" class="block_h_hydro" data-map-title="MAP HEAT RECOVERY" data-map-id="4">
    
    <div class="smallArrowRight green header_margin <?php echo $img;?>_img">
        
        <h2>Heat Recovery</h2>
        <h3 class="line">
            One person's trash is another person's treasure
        </h3>
        <div class="text">
Industrial heat recovery is a promising way to take waste and turn it into a usable energy resource for our communities. </br>
            
            There are various available methods that can capture the resulting heat energy from industrial processes.        </div>
    </div>    

  <img class="imgposition2" src="http://www.energyexplorer.ca/images/heatrecovery.jpg" align="right" alt="img">

   <div class="block-big-text-green">Heat<br/> Recovery</div>
</div>
</section>
 

<!-- BIOENERGY -->
<!-- BIOENERGY -->
<!-- BIOENERGY -->

<section id="bioenergy">        
<div id="part3" class="part3_2" data-map-title="MAP BIOENERGY" data-map-id="2">
    <a id="bioenergy"></a>
    <div class="LargeArrowRight green header_margin <?php echo $img;?>_img">
        <h2>Bioenergy</h2>
        <h3 class="line">
            Exploring Bioenergy in the Form of...
        </h3>
        <div class="text">
            Bioenergy describes the energy contained in biological material, such as wood, crops, manure and garbage. British Columbia has large natural biomass resources that can be used to produce energy at the individual level (eg. high-efficiency wood stoves), farm level (eg. biogas), or in district energy plants.
	    <br><br>
	    The two main types of bioenergy come from biofuel sources and biomass sources. Biofuel can be bioethanol (fermentation of starch crops), biodiesel (vegetable oils and animal fats), and biogas (methane from anaerobic digestion of organic waste or syngas from wood). Biomass sources can come from foresty waste, construction wood waste, fuel crops (dried manure and stemwood), garbage, charcoal or biochar.
<!--	    <br><br>
	    The difference between bioenergy and fossil fuels: Burning bioenergy releases carbon that has been sequestered from the atmosphere, and therefore can be considered carbon neutral. In constract, burning fossil fuels releases carbon that has been buried beneath the earth for millions of years, releasing additional carbon into the atmosphere.
        -->
	</div>
    </div>

  <img class="imgposition2" src="http://www.energyexplorer.ca/images/bio_big.jpg" align="right" alt="img">

   <div class="block-big-text-green">Bioenergy</div>
</div>
 <div id="part3" data-map-title="MAP BIOENERGY" data-map-id="2">
    <a id="bioenergy"></a>
    <div class="smallArrowLeft green <?php echo $img;?>_img">
        <h2>Forest Biomass</h2>
        <h3 class="line">
Harvesting wood sustainably       </h3>
        <div class="text">
Sustainably harvested forest biomass can be used as a fuel for generating heat or electriity.  
        </div>
    </div>
    <div class="label-right" style="margin-top:95px;">
     Plant. Extract. Energy.
    </div>
    <ul class="rslides renewables_last" id="slider">
      <li>
        <img class="no_filter" src="http://www.energyexplorer.ca/images/plant_wood.<?php echo $img;?>" alt="img">
            <div class="caprion_of_the_slider">
            <p>Trees Planted</p>
            
      </li>
      <li>
        <img class="no_filter" src="http://www.energyexplorer.ca/images/harvest_wood.<?php echo $img;?>" alt="img2" align="center">
            <div class="caprion_of_the_slider">
            <p>Lower Quality Wood Extracted</p>
       
      </li>
      <li>
        <img class="no_filter" src="http://www.energyexplorer.ca/images/process_wood.<?php echo $img;?>" alt="img2" align="center">
            <div class="caprion_of_the_slider">
            <p>Wood Chips arrive at biomass plant</p>
       
      </li>
      </ul>

    </div>
            </section>  

<?php
/**
 * Footer2
 */
$this->renderPartial('footer2');
