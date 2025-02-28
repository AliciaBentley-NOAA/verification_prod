<!DOCTYPE html
<html>
<head>
<meta charset="UTF-8">
<title>Mesoscale Verification - Parallel - G2O: CAPE</title>
<link rel="stylesheet" type="text/css" href="../../../../../style/style_verif.css">
<script src="../../../../../style/jquery-3.6.1.min.js"></script>
<script type="text/javascript" src="functions_base.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<!-- Head element -->
<div class="page-top">
        <span><a style="color:#ffffff">GRID-TO-OBS: CAPE</a></span>
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
                <span class="bold">Init Hour:</span>
                <select id="inithour" onchange="changeInitHour(this.value);"></select>
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
		<span class="bold" style="color:#FF0000">Select Region and Variable Information: </span><span class="bold">Region:</span>
                <select id="region" onchange="changeRegion(this.value);"></select>
	</div>
        <div class="element">
                <span class="bold">Level:</span>
                <select id="level" onchange="changeLevel(this.value);"></select>
        </div>
        <div class="element">
		<span class="bold">Threshold:</span>
                <select id="threshold" onchange="changeThreshold(this.value);"></select>
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

var url = "https://www.emc.ncep.noaa.gov/users/verification/regional/mesoscale/prod/grid2obs/cape/images/evs.mesoscale.MMMTTTcape_LLL.DDD.PPPHHHFFF.RRR.png";

//====================================================================================================
//Add years & months
//====================================================================================================

var plottypes = [];
var metrics = [];
var dateranges = [];
var inithours = [];
var forecasthours = [];
var regions = [];
var thresholds = [];
var levels = [];

plottypes.push({
        displayName: "Time Series",
        name: "timeseries",
});
plottypes.push({
        displayName: "Performance Diagram",
        name: "perfdiag",
});
plottypes.push({
        displayName: "Threshold Mean",
        name: "threshmean",
});

metrics.push({
        displayName: "Means",
        name: "fbar_obar",
});

dateranges.push({
        displayName: "Last 31 Days",
        name: "last31days",
});
dateranges.push({
        displayName: "Last 90 Days",
        name: "last90days",
});

inithours.push({
        displayName: "00Z",
        name: "_init00z",
});
/*inithours.push({
        displayName: "06Z",
        name: "_init06z",
});*/
inithours.push({
        displayName: "12Z",
        name: "_init12z",
});
/*inithours.push({
        displayName: "18Z",
        name: "_init18z",
});*/

forecasthours.push({
        displayName: "F000",
        name: "_f000",
});
forecasthours.push({
        displayName: "F006",
        name: "_f006",
});
forecasthours.push({
        displayName: "F012",
        name: "_f012",
});
forecasthours.push({
        displayName: "F018",
        name: "_f018",
});
forecasthours.push({
        displayName: "F024",
        name: "_f024",
});
forecasthours.push({
        displayName: "F030",
        name: "_f030",
});
forecasthours.push({
        displayName: "F036",
        name: "_f036",
});
forecasthours.push({
        displayName: "F042",
        name: "_f042",
});
forecasthours.push({
        displayName: "F048",
        name: "_f048",
});
forecasthours.push({
        displayName: "F054",
        name: "_f054",
});
forecasthours.push({
        displayName: "F060",
        name: "_f060",
});

regions.push({
        displayName: "CONUS",
        name: "buk_conus",
});
regions.push({
        displayName: "CONUS - East",
        name: "buk_conus_e",
});
regions.push({
        displayName: "CONUS - West",
        name: "buk_conus_w",
});
regions.push({
        displayName: "CONUS - South",
        name: "buk_conus_s",
});
regions.push({
        displayName: "CONUS - Central",
        name: "buk_conus_c",
});
regions.push({
        displayName: "Alaska",
        name: "alaska",
});

thresholds.push({
        displayName: "NA",
        name: ".",
});

levels.push({
        displayName: "Surface-Based",
        name: "l0",
});
levels.push({
        displayName: "Mixed-Layer",
        name: "l90",
});


timeseries_metrics = ["fbar_obar"]
timeseries_metrics_name = ["Means"]
threshmean_metrics = ["csi", "fbias"]
threshmean_metrics_name = ["Critical Success Index", "Frequency Bias"]
perfdiag_metrics = ["ctc"]
perfdiag_metrics_name = ["Probability of Detection and Success Ratio"]
initgroup1_regions = ["alaska"]
initgroup1_regions_name = ["Alaska"]
non_timeseries_initgroup2_regions = ["buk_conus", "buk_conus_e", "buk_conus_w", "buk_conus_s", "buk_conus_c", "buk_apl", "buk_cpl", "buk_ds", "buk_grb", "buk_grlk", "buk_matl", "buk_mez", "buk_ne", "buk_npl", "buk_nrk", "buk_npw", "buk_pra", "buk_psw", "buk_se", "buk_sw", "buk_spl", "buk_srk"]
non_timeseries_initgroup2_regions_name = ["CONUS", "CONUS - East", "CONUS - West", "CONUS - South", "CONUS - Central", "Appalachia", "Central Plains", "Deep South", "Great Basin", "Great Lakes", "Mid-Atlantic", "Mezqutial", "Northeast/North Atlantic", "Northern Plains", "Northern Rockies", "Pacific Northwest", "Prairie", "Pacific Southwest", "Southeast", "Southwest", "Southern Plains", "Southern Rockies"]
timeseries_initgroup2_regions = ["buk_conus", "buk_conus_e", "buk_conus_w", "buk_conus_s", "buk_conus_c","alaska"]
timeseries_initgroup2_regions_name = ["CONUS", "CONUS - East", "CONUS - West", "CONUS - South", "CONUS - Central","Alaska"]
non_timeseries_fhours = ["_f000-f024","_f012-f036","_f024-f048","_f036-f060","_f048-f072","_f060-f084"]
non_timeseries_fhours_name = ["F00-F024","F012-F036","F024-F048","F036-F060","F048-F072","F060-F084"]
timeseries_fhours = ["_f000","_f006","_f012","_f018","_f024","_f030","_f036","_f042","_f048","_f054","_f060","_f066","_f072","_f078","_f084"]
timeseries_fhours_name = ["F000","F006","F012","F018","F024","F030","F036","F042","F048","F054","F060","F066","F072","F078","F084"]
threshmean_thresholds = ["."]
threshmean_thresholds_name = ["All"]
perfdiag_thresholds = ["."]
perfdiag_thresholds_name = ["All"]
other_thresholds = ["."]
other_thresholds_name = ["NA"]
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
		metric: "fbar_obar",
	        daterange: "last31days",
		inithour: "_init00z",
		forecasthour: "_f012",
		region: "buk_conus",
		threshold: ".",
		level: "l0"
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

	//Change init hour based on passed argument, if any
        var passed_inithour = "";
        if(passed_inithour!=""){
                if(searchByName(passed_inithour,inithours)>=0){
                        imageObj.inithour = passed_inithour;
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

	//Change threshold based on passed argument, if any
        var passed_threshold = "";
        if(passed_threshold!=""){
                if(searchByName(passed_threshold,thresholds)>=0){
                        imageObj.threshold = passed_threshold;
                }
	}

	//Change level based on passed argument, if any
        var passed_level = "";
        if(passed_level!=""){
                if(searchByName(passed_level,levels)>=0){
                        imageObj.level = passed_level;
                }
        }
	//Populate forecast hour and dprog/dt arrays for this run and frame
	populateMenu('plottype');
	populateMenu('forecasthour');
	populateMenu('inithour');
	populateMenu('metric');
	populateMenu('daterange');
	populateMenu('region');
	populateMenu('threshold');
	populateMenu('level');

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
