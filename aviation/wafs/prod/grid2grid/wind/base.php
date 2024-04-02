<!DOCTYPE html
<html>
<head>
<meta charset="UTF-8">
<title>WAFS Verification</title>
<link rel="stylesheet" type="text/css" href="../../../../../style/style_verif.css">
<script src=".../../../../../style/jquery-3.6.1.min.js"></script>
<script type="text/javascript" src="functions_base.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<!-- Head element -->
<div class="page-top">
    <span><a style="color:#ffffff">GRID-TO-GRID (ATMOSPHERIC): WIND</a></span>
</div>

<!-- Top menu -->
<div class="page-menu"><div class="table">
    <div class="element">
        <span class="bold" style="color:#FF0000">Select Variable, Metric: </span>
        <select hidden id="plottype" onchange="changePlotType(this.value);"></select>
    </div>
    <div class="element">
        <span class="bold">Variable:</span>
        <select id="variable" onchange="changeVariable(this.value);"></select>
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
        <span class="bold" style="color:#FF0000">Select Date Range and Forecast: </span>
	<span class="bold"> Date Range:</span>
        <select id="daterange" onchange="changeDateRange(this.value);"></select>
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
        <span class="bold" style="color:#FF0000">Select Region, Level: </span>
	<span class="bold">Region:</span>
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
           <img name="map_image" src="../images/evs.wafs.sl1l2.wind_p850.last90days.rmse_f036.g045_tropics.png" style="width:100%">
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

var url = "https://www.emc.ncep.noaa.gov/users/verification/aviation/wafs/prod/grid2grid/images/evs.wafs.sl1l2.VVV_pLLL.DDD.MMM_fFFF.g045RRR.png";
//  evs.wafs.sl1l2.wind_p850.last90days.rmse_f036.g045_tropics.png

//====================================================================================================
//Add years & months
//====================================================================================================

var plottypes = [];
var metrics = [];
var levels = [];
var dateranges = [];
var forecasthours = [];
var regions = [];
var variables = [];

//------------------------

plottypes.push({
        displayName: "Time Series",
        name: "timeseries",
});

//------------------------

metrics.push({
        displayName: "Root Mean Square Error",
        name: "rmse",
});

//------------------------

dateranges.push({
        displayName: "Last 90 Days",
        name: "last90days",
});
dateranges.push({
        displayName: "Last 31 Days",
        name: "last31days",
});
dateranges.push({
        displayName: "Long Range",
        name: "lastdays",
});

//------------------------

regions.push({
        displayName: "Global",
        name: "glb",
});
regions.push({
        displayName: "Asia",
        name: "asia",
});
regions.push({
        displayName: "Australia and New Zealand",
        name: "aunz",
});
regions.push({
        displayName: "Middle East",
        name: "east",
});
regions.push({
        displayName: "North America",
        name: "namer",
});
regions.push({
        displayName: "North Atlantic - Area 2",
        name: "natl_ar2",
});
regions.push({
        displayName: "Northern Hemisphere",
        name: "nhem",
});
regions.push({
        displayName: "North Pacific",
        name: "npo",
});
regions.push({
        displayName: "Southern Hemisphere",
        name: "shem",
});
regions.push({
        displayName: "Tropics",
        name: "tropics",
});

//------------------------

levels.push({
        displayName: "100 hPa",
        name: "100",
});
levels.push({
        displayName: "150 hPa",
        name: "150",
});
levels.push({
        displayName: "200 hPa",
        name: "200",
});
levels.push({
        displayName: "250 hPa",
        name: "250",
});
levels.push({
        displayName: "300 hPa",
        name: "300",
});
levels.push({
        displayName: "400 hPa",
        name: "400",
});
levels.push({
        displayName: "500 hPa",
        name: "500",
});
levels.push({
        displayName: "600 hPa",
        name: "600",
});
levels.push({
        displayName: "700 hPa",
        name: "700",
});
levels.push({
        displayName: "850 hPa",
        name: "850",
});

//------------------------

forecasthours.push({
        displayName: "F06",
        name: "006",
});
forecasthours.push({
        displayName: "F12",
        name: "012",
});
forecasthours.push({
        displayName: "F18",
        name: "018",
});
forecasthours.push({
        displayName: "F24",
        name: "024",
});
forecasthours.push({
        displayName: "F30",
        name: "030",
});
forecasthours.push({
        displayName: "F36",
        name: "036",
});

//------------------------

variables.push({
        displayName: "Wind Speed",
        name: "wind",
});
variables.push({
        displayName: "Wind Speed>=80knots",
        name: "wind80",
});
variables.push({
        displayName: "Wind Direction>=10knots",
        name: "wdir",
});


timeseries_forecasthours = ["006", "012", "018", "024", "030", "036"]


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
	metric: "rmse",
	level: "300",
        daterange: "last90days",
	forecasthour: "012",
	region: "glb",
        variable: "wind",
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
        
	//Change variable based on passed argument, if any
        var passed_variable = "";
        if(passed_variable!=""){
                if(searchByName(passed_variable,variables)>=0){
                        imageObj.variable = passed_variable;
                }
	}

	//Populate forecast hour and dprog/dt arrays for this run and frame
        populateMenu('plottype');
	populateMenu('metric');
        populateMenu('level');
    	//populateMenu('obstype');
	populateMenu('daterange');
	//populateMenu('validhour');
	populateMenu('forecasthour');
	populateMenu('region');
	populateMenu('variable');
    
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
