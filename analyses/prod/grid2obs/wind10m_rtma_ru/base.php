<!DOCTYPE html
<html>
<head>
<meta charset="UTF-8">
<title>RTMA-RU Verification</title>
<link rel="stylesheet" type="text/css" href="../../../../style/style_verif.css">
<script src="../../../../style/jquery-3.6.1.min.js"></script>
<script type="text/javascript" src="functions_base.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<!-- Head element -->
<div class="page-top">
    <span><a style="color:#ffffff">RTMA-RU GRID-TO-OBS: 10-M WIND</a></span>
</div>

<!-- Top menu -->
<div class="page-menu"><div class="table">
    <div class="element">
        <span class="bold" style="color:#FF0000">Select Plot Type and Metric: </span><span class="bold">Plot Type:</span>
        <select id="plottype" onchange="changePlotType(this.value);"></select>
	</div>
    <div class="element">
        <span class="bold">Metric:</span>
        <select id="metric" onchange="changeMetric(this.value);"></select>
    </div>
</div></div>
<!-- /Top menu -->

<!-- Middle menu -->
<div class="page-menu"><div class="table">
    <div class="element">
        <span class="bold" style="color:#FF0000">Select Date Range and Forecast: </span><span class="bold"> Date Range:</span>
        <select id="daterange" onchange="changeDateRange(this.value);"></select>
	</div>
    <div class="element">
        <span class="bold">Valid Hour:</span>
        <select id="validhour" onchange="changeValidHour(this.value);"></select>
	</div>
    <div class="element">
        <span class="bold">Forecast Hour:</span>
        <select id="forecasthour" onchange="changeForecastHour(this.value);"></select>
    </div>
</div></div>
<!-- Middle menu -->

<!-- Bottom menu -->
<div class="page-menu"><div class="table">
    <div class="element">
		<span class="bold" style="color:#FF0000">Select Region, Level, and Validation Data: </span><span class="bold">Region:</span>
        <select id="region" onchange="changeRegion(this.value);"></select>
    </div>   
    <div class="element">
        <span class="bold">Level:</span>
        <select id="level" onchange="changeLevel(this.value);"></select>
    </div> 
    <div class="element">
        <span class="bold">Validation Data:</span>
        <select id="obstype" onchange="changeObstype(this.value);"></select>
    </div>    
</div></div>
<!-- Bottom menu -->

<!-- Images -->
<div id="page-map">
<table id="tbl-map" style="margin:auto">
     <tbody>
       <tr>
        <td id ="td-map">
           <img name="map_image" src="../images/evs.rtma_ru.bcrmse_me.wind_z10.last31days.vhrmean.buk_conus.png" style="width:100%">
        </td>
      </tr>
    </tbody>
</table>
</div>

<!-- /Footer -->
<div class="page-footer">
        <span></div>

<script type="text/javascript">
//====================================================================================================
//User-defined years
//====================================================================================================

var url1 = "https://www.emc.ncep.noaa.gov/users/verification/analyses/prod/grid2obs/images/evs.rtma_ru.MMM.wind_LLL.DDD.PPP.RRR.png";
var url2 = "https://www.emc.ncep.noaa.gov/users/verification/analyses/prod/grid2obs/images/evs.rtma_ru.MMM.wind_LLL.DDD.PPP.RRR.png";

// evs.rtofs.me.sst_z0_ghrsst.last60days.fhrmean_valid00z.natl.png

//====================================================================================================
//Add years & months
//====================================================================================================

var plottypes = [];
var metrics = [];
var levels = [];
var obstypes = [];
var dateranges = [];
var validhours = [];
var forecasthours = [];
var regions = [];





plottypes.push({
        displayName: "Valid Hour Mean",
        name: "vhrmean",
});



metrics.push({
        displayName: "Bias-corrected RMSE and Mean Error (Bias)",
        name: "bcrmse_me",
});




dateranges.push({
        displayName: "Last 31 Days",
        name: "last31days",
});





validhours.push({
        displayName: "All",
        name: "all",
});




forecasthours.push({
        displayName: "Analysis",
        name: "analysis",
});





regions.push({
        displayName: "CONUS",
        name: "buk_conus",
});
regions.push({
        displayName: "CONUS East",
        name: "buk_conus_e",
});
regions.push({
        displayName: "CONUS West",
        name: "buk_conus_w",
});
regions.push({
        displayName: "CONUS South",
        name: "buk_conus_s",
});
regions.push({
        displayName: "CONUS Central",
        name: "buk_conus_c",
});





levels.push({
        displayName: "10 meters",
        name: "z10",
});







obstypes.push({
        displayName: "METARS",
        name: "truth",
});





timeseries_forecasthours = ["000", "024", "048", "072", "096", "120", "144", "168", "192"]
fhr_forecasthours = ["384"]
leaddate_forecasthours = ["240", "384"]
vhrmean_forecasthours = ["analysis"]

//====================================================================================================
//Initialize the page
//====================================================================================================

//function for keyboard controls
//document.onkeydown = keys;

//Decare object containing data about the currently displayed map
imageObj = {};

//Initialize the page
initialize();

//Initialize the page
function initialize(){
	
	//Set image object based on default years
	imageObj = {
        plottype: "vhrmean",
	metric: "bcrmse_me",
	obstype: "truth",
	level: "z10",
        daterange: "last31days",
	validhour: "all",
	forecasthour: "analysis",
	region: "buk_conus",        
        };


    //Change plot type based on passed argument, if any
        var passed_plottype = "";
        if(passed_plottype!=""){
                if(searchByName(passed_plottype,plottypes)>=0){
                        imageObj.plottype = passed_plottype;
                }
	}

	//Change metric based on passed argument, if any
        var passed_metric = "";
        if(passed_metric!=""){
                if(searchByName(passed_metric,metrics)>=0){
                        imageObj.metrics = passed_metric;
                }
	}

	//Change date range based on passed argument, if any
        var passed_daterange = "";
        if(passed_daterange!=""){
                if(searchByName(passed_daterange,dateranges)>=0){
                        imageObj.daterange = passed_daterange;
                }
	}

	//Change valid hour based on passed argument, if any
        var passed_validhour = "";
        if(passed_validhour!=""){
                if(searchByName(passed_validhour,validhours)>=0){
                        imageObj.validhour = passed_validhour;
                }
	}

	//Change forecast hour based on passed argument, if any
        var passed_forecasthour = "";
        if(passed_forecasthour!=""){
                if(searchByName(passed_forecasthour,forecasthours)>=0){
                        imageObj.forecasthour = passed_forecasthour;
                }
	}

	//Change region based on passed argument, if any
        var passed_region = "";
        if(passed_region!=""){
                if(searchByName(passed_region,regions)>=0){
                        imageObj.region = passed_region;
                }
        }
        
	//Change obstype based on passed argument, if any
        var passed_obstype = "";
        if(passed_obstype!=""){
                if(searchByName(passed_obstype,obstypes)>=0){
                        imageObj.obstype = passed_obstype;
                }
        }
        
	//Populate forecast hour and dprog/dt arrays for this run and frame
	populateMenu('plottype');
	populateMenu('metric');
        populateMenu('level');
    	populateMenu('obstype');
	populateMenu('daterange');
	populateMenu('validhour');
	populateMenu('forecasthour');
	populateMenu('region');

	changePlotType("vhrmean");
	changeForecastHour("analysis");
	changeMetric("bcrmse_me");
        changeObstype("truth");
    
	//Preload images and display map
	preload(imageObj);
	showImage();
	
	//Update mobile display for swiping
	updateMobile();

}

var xInit = null;                                                        
var yInit = null;                  
var xPos = null;
var yPos = null;


</script>
</body></html>
