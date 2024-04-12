<!DOCTYPE html
<html>
<head>
<meta charset="UTF-8">
<title>GFS Verification - Production - Atmospheric - Long-Term: Monthly and Yearly Statistics</title>
<link rel="stylesheet" type="text/css" href="../../../../../../style/style_verif.css">
<script src="../../../../../../style/jquery-3.6.1.min.js"></script>
<script type="text/javascript" src="functions_base.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<!-- Head element -->
<div class="page-top">
        <span><a style="color:#ffffff">LONG-TERM (ATMOSPHERIC): MONTHLY AND YEARLY STATISTICS</a></span>
</div>

<!-- Top menu -->
<div class="page-menu"><div class="table">
        <div class="element">
                <span class="bold" style="color:#FF0000">Select Frequency and Metric: </span><span class="bold">Frequency:</span>
                <select id="frequency" onchange="changeFrequency(this.value);"></select>
	</div>
        <div class="element">
                <span class="bold">Metric:</span>
                <select id="metric" onchange="changeMetric(this.value);"></select>
        </div>
</div></div>
<!-- /Top menu -->

<!-- Top menu -->
<div class="page-menu"><div class="table">
        <div class="element">
                <span class="bold" style="color:#FF0000">Select Plot Type and Models: </span><span class="bold">Plot Type:</span>
                <select id="plottype" onchange="changePlotType(this.value);"></select>
	</div>
        <div class="element">
                <span class="bold">Models:</span>
                <select id="model" onchange="changeModel(this.value);"></select>
        </div>
</div></div>
<!-- /Top menu -->

<!-- Middle menu -->
<div class="page-menu"><div class="table">
        <div class="element">
		<span class="bold" style="color:#FF0000">Select Date Range, Hour, and Forecast Day: </span><span class="bold">Date Range:</span>
                <select id="daterange" onchange="changeDateRange(this.value);"></select>
	</div>
        <div class="element">
                <span class="bold">Hour:</span>
                <select id="validinithour" onchange="changeValidInitHour(this.value);"></select>
        </div>
        <div class="element">
                <span class="bold">Forecast Day:</span>
                <select id="forecasthour" onchange="changeForecastHour(this.value);"></select>
        </div>
</div></div>
<!-- Middle menu -->

<!-- Bottom menu -->
<div class="page-menu"><div class="table">
        <div class="element">
		<span class="bold" style="color:#FF0000">Select Variable and Region: </span><span class="bold">Variable:</span>
		<select id="variable" onchange="changeVariable(this.value);"></select>
        </div>
        <div class="element">
		<span class="bold">Level:</span>
                <select id="level" onchange="changeLevel(this.value);"></select>
	</div>
        <div class="element">
		<span class="bold">Region:</span>
                <select id="region" onchange="changeRegion(this.value);"></select>
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
var url = "https://www.emc.ncep.noaa.gov/users/verification/global/gfs/prod/atmos/long_term/images/evs.global_det.EEE.MMM.VVV_LLL.DDD_QQQ.PPP_HHHFFF.g004_RRR.png";

//====================================================================================================
//Add years & months
//====================================================================================================

var frequencys = [];
var plottypes = [];
var metrics = [];
var models = [];
var dateranges = [];
var forecasthours = [];
var validinithours =[];
var variables = [];
var levels = [];
var regions = [];

frequencys.push({
        displayName: "Monthly",
        name: "monthly",
});
frequencys.push({
        displayName: "Yearly",
        name: "yearly",
});

metrics.push({
        displayName: "Anomaly Correlation Coefficient",
        name: "acc",
});
metrics.push({
        displayName: "Mean Error (Bias)",
        name: "me",
});
metrics.push({
        displayName: "Root Mean Square Error",
        name: "rmse",
});

plottypes.push({
        displayName: "Time Series (with difference)",
        name: "timeseriesdiff",
});
plottypes.push({
        displayName: "Forecast Day by Valid Date",
        name: "leaddate",
});
plottypes.push({
        displayName: "Useful Forecast Day Time Series",
        name: "useful_fcst_days_timeseries",
});

models.push({
        displayName: "All Models",
        name: "all_models",
});
models.push({
        displayName: "GFS/ECMWF",
        name: "gfs_ecmwf",
});
models.push({
        displayName: "GFS - 4 Cycles",
        name: "gfs_4cycles",
});

dateranges.push({
        displayName: "All Years",
        name: "allyears",
});
dateranges.push({
        displayName: "Past 10 Years",
        name: "past10years",
});

validinithours.push({
        displayName: "Valid 00Z",
        name: "valid00z",
});

forecasthours.push({
        displayName: "Day 0",
        name: "_f000",
});
forecasthours.push({
        displayName: "Day 1",
        name: "_f024",
});
forecasthours.push({
        displayName: "Day 2",
        name: "_f048",
});
forecasthours.push({
        displayName: "Day 4",
        name: "_f072",
});
forecasthours.push({
        displayName: "Day 5",
        name: "_f120",
});
forecasthours.push({
        displayName: "Day 6",
        name: "_f144",
});
forecasthours.push({
        displayName: "Day 7",
        name: "_f168",
});
forecasthours.push({
        displayName: "Day 8",
        name: "_f192",
});
forecasthours.push({
        displayName: "Day 9",
        name: "_f216",
});
forecasthours.push({
        displayName: "Day 10",
        name: "_f240",
});

variables.push({
        displayName: "Geopotential Height",
        name: "hgt",
});

levels.push({
        displayName: "1000 hPa",
        name: "p1000",
});
levels.push({
        displayName: "500 hPa",
        name: "p500",
});

regions.push({
        displayName: "Northern Hemisphere",
        name: "nhem",
});
regions.push({
        displayName: "Southern Hemisphere",
        name: "shem",
});

monthly_acc_plottypes = ["timeseriesdiff", "leaddate", "useful_fcst_days_timeseries"]
monthly_acc_plottypes_name = ["Time Series (with difference)", "Forecast Day by Valid Date", "Useful Forecast Day Time Series"]
monthly_non_acc_plottypes = ["timeseriesdiff", "leaddate"]
monthly_non_acc_plottypes_name = ["Time Series (with difference)", "Forecast Day by Valid Date"]
yearly_plottypes = ["annualmean"]
yearly_plottypes_name = ["Annual Mean"]
timeseriesdiff_forecasthours = ["_f000", "_f024", "_f048", "_f072", "_f096", "_f120", "_f144", "_f168", "_f192", "_f216", "_f240"]
timeseriesdiff_forecasthours_name = ["Day 0", "Day 1", "Day 2", "Day 3", "Day 4", "Day 5", "Day 6", "Day 7", "Day 8", "Day 9", "Day 10"]
leaddate_forecasthours = [""]
leaddate_forecasthours_name = ["Days 0-10"]
annualmean_forecasthours = [""]
annualmean_forecasthours_name = ["Days 0-10"]
useful_fcst_days_forecasthours = [""]
useful_fcst_days_forecasthours_name = ["NA"]
leaddate_forecasthours = [""]
leaddate_forecasthours_name = ["Days 0-10"]
useful_fcst_days_models = ["all_models", "gfs", "ecmwf", "cmc", "ukmet", "fnmoc"]
useful_fcst_days_models_name = ["All Models", "GFS", "ECMWF", "CMC", "UKMET", "FNMOC"]
non_useful_fcst_days_models = ["all_models", "gfs_ecmwf", "gfs_4cycles"]
non_useful_fcst_days_models_name = ["All Models", "ECMWF/GFS", "GFS - 4 Cycles"]
gfs_4cycles_validinithours = ["init00z06z12z18z"]
gfs_4cycles_validinithours_name = ["Init 00Z,06Z,12Z,18Z"]
non_gfs_4cycles_validinithours = ["valid00z"]
non_gfs_4cycles_validinithours_name = ["Valid 00Z"]
acc_variables = ["hgt"]
acc_variables_name = ["Geopotential Height"]
non_acc_variables = ["hgt", "ugrd_vgrd"]
non_acc_variables_name = ["Geopotential Height", "Vector Wind"]
//useful_fcst_days_variables = ["hgt"]
//useful_fcst_days_variables_name = ["Geopotential Height"]
//non_useful_fcst_days_variables = ["hgt", "ugrd_vgrd"]
//non_useful_fcst_days_variables_name = ["Geopotential Height", "Vector Wind"]
hgt_levels = ["p1000", "p500"]
hgt_levels_name = ["1000 hPa", "500 hPa"]
ugrd_vgrd_levels = ["p850", "p200"]
ugrd_vgrd_levels_name = ["850 hPa", "200 hPa"]
hgt_regions = ["nhem", "shem"]
hgt_regions_name = ["Northern Hemisphere", "Southern Hemisphere"]
ugrd_vgrd_regions = ["tropics"]
ugrd_vgrd_regions_name = ["Tropics"]
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
	        frequency: "monthly",
		plottype: "timeseriesdiff",
		metric: "acc",
		model: "all_models",
		daterange: "allyears",
		forecasthour: "_f120",
		validinithour: "valid00z",
		variable: "hgt",
		level: "p500",
		region: "nhem"
        };


        //Change frequency based on passed argument, if any
        var passed_frequency = "";
        if(passed_frequency!=""){
                if(searchByName(passed_frequency,frequencys)>=0){
                        imageObj.frequency = passed_frequency;
                }
	}

	//Change plottype based on passed argument, if any
        var passed_plottype = "";
        if(passed_plottype!=""){
                if(searchByName(passed_plottype,plottypes)>=0){
                        imageObj.plottype = passed_plottype;
                }
        }

	//Change plottype based on passed argument, if any
        var passed_metric = "";
        if(passed_metric!=""){
                if(searchByName(passed_metric,metrics)>=0){
                        imageObj.metric = passed_metric;
                }
        }

        //Change model based on passed argument, if any
        var passed_model = "";
        if(passed_model!=""){
                if(searchByName(passed_model,models)>=0){
                        imageObj.model = passed_model;
                }
	}

	//Change date range based on passed argument, if any
        var passed_daterange = "";
        if(passed_daterange!=""){
                if(searchByName(passed_daterange,dateranges)>=0){
                        imageObj.daterange = passed_daterange;
                }
	}

	//Change forecast hour based on passed argument, if any
        var passed_forecasthour = "";
        if(passed_forecasthour!=""){
                if(searchByName(passed_forecasthour,forecasthours)>=0){
                        imageObj.forecasthour = passed_forecasthour;
                }
	}

	//Change valid/init hour based on passed argument, if any
        var passed_validinithour = "";
        if(passed_validinithour!=""){
                if(searchByName(passed_validinithour,validinithours)>=0){
                        imageObj.validinithour = passed_validinithour;
                }
	}

	//Change variable based on passed argument, if any
        var passed_variable = "";
        if(passed_variable!=""){
                if(searchByName(passed_variable,variables)>=0){
                        imageObj.variable = passed_variable;
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
	populateMenu('frequency');
	populateMenu('plottype');
	populateMenu('metric');
	populateMenu('model');
	populateMenu('daterange');
	populateMenu('forecasthour');
	populateMenu('validinithour');
	populateMenu('variable');
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
