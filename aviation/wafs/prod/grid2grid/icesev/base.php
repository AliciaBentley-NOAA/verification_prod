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
    <span><a style="color:#ffffff">GRID-TO-GRID (ATMOSPHERIC): ICING SEVEVITY</a></span>
</div>

<!-- Top menu -->
<div class="page-menu"><div class="table">
    <div class="element">
        <span class="bold" style="color:#FF0000">Select Metric: </span>
        <select hidden id="plottype" onchange="changePlotType(this.value);"></select>
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
           <img name="map_image" src="../images/evs.wafs.ctc.icesev_p812.last90days.roc_f033.g193_npo.png" style="width:100%">
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

var url = "https://www.emc.ncep.noaa.gov/users/verification/aviation/wafs/prod/grid2grid/images/evs.wafs.ctc.icesev_pLLL.DDD.MMM_fFFF.g193RRR.png";
//  evs.wafs.ctc.icesev_p812.last90days.roc_f030.g193_nhem.png

//====================================================================================================
//Add years & months
//====================================================================================================

var plottypes = [];
var metrics = [];
var levels = [];
var dateranges = [];
var forecasthours = [];
var regions = [];

//------------------------

plottypes.push({
        displayName: "Categorical",
        name: "ctc",
});

//------------------------

metrics.push({
    displayName: "ROC Curve",
        name: "roc",
});
metrics.push({
    displayName: " Frequency Bias",
        name: "fbias",
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
        displayName: "392.7 hPa",
        name: "392",
});
levels.push({
        displayName: "506 hPa",
        name: "506",
});
levels.push({
        displayName: "595.2 hPa",
        name: "595",
});
levels.push({
        displayName: "696.8 hPa",
        name: "696",
});
levels.push({
        displayName: "812 hPa",
        name: "812",
});

//------------------------

forecasthours.push({
        displayName: "F06",
        name: "006",
});
forecasthours.push({
        displayName: "F09",
        name: "009",
});
forecasthours.push({
        displayName: "F12",
        name: "012",
});
forecasthours.push({
        displayName: "F15",
        name: "015",
});
forecasthours.push({
        displayName: "F18",
        name: "018",
});
forecasthours.push({
        displayName: "F21",
        name: "021",
});
forecasthours.push({
        displayName: "F24",
        name: "024",
});
forecasthours.push({
        displayName: "F27",
        name: "027",
});
forecasthours.push({
        displayName: "F30",
        name: "030",
});
forecasthours.push({
        displayName: "F33",
        name: "033",
});
forecasthours.push({
        displayName: "F36",
        name: "036",
});


timeseries_forecasthours = ["006", "009", "012", "015", "018", "021", "024", "027", "030", "033", "036"]


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
	plottype: "ctc",	
	metric: "roc",
	level: "595",
        daterange: "last90days",
	forecasthour: "012",
	region: "glb",
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
    	//populateMenu('obstype');
	populateMenu('daterange');
	//populateMenu('validhour');
	populateMenu('forecasthour');
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
