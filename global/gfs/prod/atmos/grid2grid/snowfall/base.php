<!DOCTYPE html
<html>
<head>
<meta charset="UTF-8">
<title>GFS Verification - Production - Atmospheric G2G: Snowfall</title>
<link rel="stylesheet" type="text/css" href="../../../../../../style/style_verif.css">
<script src="../../../../../../style/jquery-3.6.1.min.js"></script>
<script type="text/javascript" src="functions_base.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<!-- Head element -->
<div class="page-top">
        <span><a style="color:#ffffff">GRID-TO-GRID (ATMOSPHERIC): SNOWFALL</a></span>
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
		<span class="bold" style="color:#FF0000">Select Region and Variable Information: </span>
	</div>
	<div class="element">
                <span class="bold">Region:</span>
                <select id="region" onchange="changeRegion(this.value);"></select>
        </div>
        <div class="element">
		<span class="bold">Threshold:</span>
                <select id="threshold" onchange="changeThreshold(this.value);"></select>
	</div>
        <div class="element">
                <span class="bold">Derived From:</span>
                <select id="derivedvar" onchange="changeDerivedVar(this.value);"></select>
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

var url = "https://www.emc.ncep.noaa.gov/users/verification/global/gfs/prod/atmos/grid2grid/images/evs.global_det.MMMTTTVVV_a24_z0.DDD.PPP_validHHHz_fFFF.RRR.png";

//====================================================================================================
//Add years & months
//====================================================================================================

var plottypes = [];
var metrics = [];
var dateranges = [];
var validhours = [];
var forecasthours = [];
var regions = [];
var thresholds = [];
var derivedvars = [];

plottypes.push({
        displayName: "Time Series",
        name: "timeseries",
});
plottypes.push({
        displayName: "Forecast Hour Mean",
        name: "fhrmean",
});

metrics.push({
        displayName: "Equitable Threat Score",
        name: "ets",
});
metrics.push({
        displayName: "Frequency Bias",
        name: "fbias",
});
metrics.push({
        displayName: "Fraction Skill Score - Width 1",
        name: "fss_width1",
});
metrics.push({
        displayName: "Fraction Skill Score - Width 13",
        name: "fss_width13",
});
metrics.push({
        displayName: "Fraction Skill Score - Width 23",
        name: "fss_width23",
});
metrics.push({
        displayName: "Fraction Skill Score - Width 33",
        name: "fss_width33",
});
metrics.push({
        displayName: "Fraction Skill Score - Width 43",
        name: "fss_width43",
});
metrics.push({
        displayName: "Fraction Skill Score - Width 53",
        name: "fss_width53",
});
metrics.push({
        displayName: "Fraction Skill Score - Width 63",
        name: "fss_width63",
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
        displayName: "12Z",
        name: "12",
});

forecasthours.push({
        displayName: "F024",
        name: "024",
});
forecasthours.push({
        displayName: "F048",
        name: "048",
});
forecasthours.push({
        displayName: "F072",
        name: "072",
});
forecasthours.push({
        displayName: "F096",
        name: "096",
});
forecasthours.push({
        displayName: "F120",
        name: "120",
});
forecasthours.push({
        displayName: "F144",
        name: "144",
});
forecasthours.push({
        displayName: "F168",
        name: "168",
});
forecasthours.push({
        displayName: "F192",
        name: "192",
});
forecasthours.push({
        displayName: "F216",
        name: "216",
});
forecasthours.push({
        displayName: "F240",
        name: "240",
});

regions.push({
        displayName: "CONUS",
        name: "g211_buk_conus",
});
regions.push({
        displayName: "CONUS - East",
        name: "g211_buk_conus_e",
});
regions.push({
        displayName: "CONUS - West",
        name: "g211_buk_conus_w",
});
regions.push({
        displayName: "CONUS - South",
        name: "g211_buk_conus_s",
});
regions.push({
        displayName: "CONUS - Central",
        name: "g211_buk_conus_c",
});

thresholds.push({
        displayName: "≥ 1 in",
        name: "_ge0p0254.",
});
thresholds.push({
        displayName: "≥ 2 in",
        name: "_ge0p0508.",
});
thresholds.push({
        displayName: "≥ 4 in",
        name: "_ge0p1016.",
});
thresholds.push({
        displayName: "≥ 8 in",
        name: "_ge0p2032.",
});
thresholds.push({
        displayName: "≥ 12 in",
        name: "_ge0p3048.",
});

derivedvars.push({
        displayName: "WEASD - Water Equiv. of Accum. Snow Depth",
        name: "weasd",
});
derivedvars.push({
        displayName: "SNOD - Snow Depth",
        name: "snod",
});

timeseries_forecasthours = ["024", "048", "072", "096", "120", "144", "168", "192", "216", "240"]
fhrmean_forecasthours = ["240"]
regions_name = ["CONUS", "CONUS - East", "CONUS - West", "CONUS - South", "CONUS - Central"]
fss_regions = ["g240_buk_conus", "g240_buk_conus_e", "g240_buk_conus_w", "g240_buk_conus_s", "g240_buk_conus_c"]
non_fss_regions = ["g211_buk_conus", "g211_buk_conus_e", "g211_buk_conus_w", "g211_buk_conus_s", "g211_buk_conus_c"]
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
		metric: "fbias",
	        daterange: "last31days",
		validhour: "12",
		forecasthour: "024",
		region: "g211_buk_conus",
		threshold: "_ge0p0254.",
		derivedvar: "snod"
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

	//Change derived var based on passed argument, if any
        var passed_derivedvar = "";
        if(passed_derivedvar!=""){
                if(searchByName(passed_derivedvar,derivedvars)>=0){
                        imageObj.derivedvar = passed_derivedvar;
                }
        }
	//Populate forecast hour and dprog/dt arrays for this run and frame
	populateMenu('plottype');
	populateMenu('metric');
	populateMenu('daterange');
	populateMenu('validhour');
	populateMenu('forecasthour');
	populateMenu('region');
	populateMenu('threshold');
	populateMenu('derivedvar');

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
