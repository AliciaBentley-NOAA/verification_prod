<!DOCTYPE html
<html>
<head>
<meta charset="UTF-8">
<title>GEFS Verification</title>
<link rel="stylesheet" type="text/css" href="../../../../../../style/style_verif.css">
<script src="../../../../../../style/jquery-3.6.1.min.js"></script>
<script type="text/javascript" src="functions_base.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<!-- Head element -->
<div class="page-top">
        <span><a style="color:#ffffff">GRID-TO-GRID (ATMOSPHERIC): TEMPERATURE</a></span>
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
		<span class="bold" style="color:#FF0000">Select Region and Level: </span><span class="bold">Region:</span>
                <select id="region" onchange="changeRegion(this.value);"></select>
	</div>
        <div class="element">
                <span class="bold">Level:</span>
                <select id="level" onchange="changeLevel(this.value);"></select>
        </div>
</div></div>
<!-- Bottom menu -->

<!-- Images -->
<div id="page-map">
<table id="tbl-map" style="margin:auto">
     <tbody>
       <tr>
        <td id ="td-map">
           <img name="map_image" src="../latest/model_latest.gif" style="width:100%">
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

var url = "https://www.emc.ncep.noaa.gov/users/verification/global/gefs/prod/atmos/grid2grid/images/evs.global_ens.MMM.tmp_pLLL.DDD.PPP_validHHH_fFFF.g003_RRR.png";

//====================================================================================================
//Add years & months
//====================================================================================================

var plottypes = [];
var metrics = [];
var dateranges = [];
var validhours = [];
var forecasthours = [];
var levels = [];
var regions = [];

plottypes.push({
        displayName: "Time Series",
        name: "timeseries",
});
plottypes.push({
        displayName: "Forecast Hour Mean",
        name: "fhrmean",
});



metrics.push({
        displayName: "Anomaly Correlation Coefficient",
        name: "acc",
});
metrics.push({
        displayName: "Root Mean Square Error and Spread",
        name: "rmse_sprd",
});
metrics.push({
        displayName: "Mean Error (Bias) and Mean Abs. Error",
        name: "me_mae",
});
metrics.push({
        displayName: " Continuous Ranked Probability Skill Score",
        name: "crpss",
});



dateranges.push({
        displayName: "Last 31 Days",
        name: "last31days",
});
dateranges.push({
        displayName: "Last 90 Days",
        name: "last90days",
});






validhours.push({
        displayName: "00Z and 12Z",
        name: "00z_12z",
});






forecasthours.push({
        displayName: "F120",
        name: "120",
});
forecasthours.push({
        displayName: "F240",
        name: "240",
});
forecasthours.push({
        displayName: "F360",
        name: "360",
});




regions.push({
        displayName: "Global",
        name: "glb",
});
regions.push({
        displayName: "Northern Hemisphere",
        name: "nhem",
});
regions.push({
        displayName: "Southern Hemisphere",
        name: "shem",
});
regions.push({
        displayName: "Tropics",
        name: "tropics",
});
regions.push({
        displayName: "CONUS",
        name: "buk_conus",
});







levels.push({
        displayName: "850 hPa",
        name: "850",
});
levels.push({
        displayName: "500 hPa",
        name: "500",
});


timeseries_forecasthours = ["120", "240", "360"]
fhrmean_forecasthours = ["384"]
leaddate_forecasthours = ["384"]
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
	        plottype: "timeseries",
		metric: "acc",
	        daterange: "last31days",
		validhour: "00z_12z",
		forecasthour: "120",
		level: "850",
		region: "nhem",
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
                        imageObj.metric = passed_metric;
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

        //Change level based on passed argument, if any
        var passed_level = "";
        if(passed_level!=""){
                if(searchByName(passed_level,levels)>=0){
                        imageObj.level = passed_level;
                }
        }


	//Change region based on passed argument, if any
        var passed_region = "";
        if(passed_region!=""){
                if(searchByName(passed_region,regions)>=0){
                        imageObj.region = passed_region;
                }
        }
	//Populate forecast hour and dprog/dt arrays for this run and frame
	populateMenu('plottype');
	populateMenu('metric');
	populateMenu('daterange');
	populateMenu('validhour');
	populateMenu('forecasthour');
	populateMenu('level');
	populateMenu('region');

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
