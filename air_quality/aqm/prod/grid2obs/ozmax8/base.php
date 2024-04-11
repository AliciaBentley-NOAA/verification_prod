<!DOCTYPE html
<html>
<head>
<meta charset="UTF-8">
<title>AQM Atmospheric Verification - Parallel - G2O: Geopotential Height</title>
<link rel="stylesheet" type="text/css" href="../../../../../style/style_verif.css">
<script src="../../../../../style/jquery-3.6.1.min.js"></script>
<script type="text/javascript" src="functions_base.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<!-- Head element -->
<div class="page-top">
        <span><a style="color:#ffffff">GRID-TO-OBS (ATMOSPHERIC): Daily MAX 8HR-AVG OZONE</a></span>
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
        <!-- div class="element">
                <span class="bold">Valid Hour:</span>
                <select id="validhour" onchange="changeValidHour(this.value);"></select>
	</div> -->
        <div class="element">
		<span class="bold">Forecast Hour:</span>
		<select id="forecasthour"
onchange="changeForecastHour(this.value);"></select> </div> </div></div> <!--
Middle menu -->

<!-- Bottom menu --> <div class="page-menu"><div class="table"> <div
class="element"> <span class="bold" style="color:#FF0000">Select Region and
Variable Information: </span><span class="bold">Region:</span> <select
id="region" onchange="changeRegion(this.value);"></select> </div> <div
class="element"> <span class="bold">Level:</span> <select id="level"
onchange="changeLevel(this.value);"></select> </div> </div></div> <!-- Bottom
menu -->

<!-- Images --> <div id="page-map"> <table id="tbl-map" style="margin:auto">
<tbody> <tr> <td id ="td-map"> <img name="map_image"
src="../latest/model_latest.gif" style="width:100%"> </td> </tr> </tbody>
</table> </div>

<!-- /Footer --> <div class="page-footer"> <span></div>

<script type="text/javascript">
//====================================================================================================
//User-defined years
//====================================================================================================

//Global variables
var minFrame = 0; //Minimum frame for every variable
var maxFrame = 26; //Maximum frame for every variable
var incrementFrame = 1; //Increment for every frame

var startFrame = 0; //Starting frame

var url = "https://www.emc.ncep.noaa.gov/users/verification/air_quality/aqm/prod/grid2obs/images/evs.aqm.MMM.ozmax8.LLL.DDD.PPP_HHH_fFFF.RRR.png";

//====================================================================================================
//Add years & months
//====================================================================================================

var plottypes = []; var metrics = []; var dateranges = []; var validhours = [];
var inithours = []; var forecasthours = [];
var levels = [];
var regions = [];

// plottypes.push({
//         displayName: "Time Series",
//         name: "timeseries",
// });
plottypes.push({
        displayName: "Performance Diagram",
        name: "perfdiag",
});
// plottypes.push({
//         displayName: "Vertical Profile",
//         name: "vertprof",
// });
// plottypes.push({
//         displayName: "Forecast Hour Mean by Vertical Profile",
//         name: "vertprof_fhrmean",
// });

metrics.push({
displayName: "Contingency Table Counts",
        name: "ctc",
});

dateranges.push({
        displayName: "Last 31 Days",
        name: "last31days",
});
// dateranges.push({
//         displayName: "Last 90 Days",
//         name: "last90days",
// });

// validhours.push({
//         displayName: "00Z",
//         name: "00",
// });
// validhours.push({
//         displayName: "12Z",
//         name: "12",
// });
inithours.push({
        displayName: "06Z",
        name: "init06z",
});
inithours.push({
        displayName: "12Z",
        name: "init12z",
});

regions.push({
        displayName: "CONUS",
	name: "buk_conus",
});
regions.push({
        displayName: "CONUS EAST",
	name: "buk_conus_e",
});
regions.push({
        displayName: "CONUS CENTRAL",
	name: "buk_conus_c",
});
regions.push({
        displayName: "CONUS SOUTH",
	name: "buk_conus_s",
});
regions.push({
        displayName: "CONUS WEST",
	name: "buk_conus_w",
});
regions.push({
        displayName: "Appalachia",
        name: "buk_apl",
});
regions.push({
        displayName: "Central Plains",
        name: "buk_cpl",
});
regions.push({
        displayName: "Deep South",
        name: "buk_ds",
});
regions.push({
        displayName: "Great Basin",
        name: "buk_grb",
});
regions.push({
        displayName: "Great Lakes",
        name: "buk_grlk",
});
regions.push({
        displayName: "Mid-Atlantic",
        name: "buk_matl",
});
regions.push({
        displayName: "Mezquital",
        name: "buk_mez",
});
regions.push({
        displayName: "Northeast/NorthAtlantic",
        name: "buk_ne",
});
regions.push({
        displayName: "Northern Plains",
        name: "buk_npl",
});
regions.push({
        displayName: "Northern Rockies",
        name: "buk_nrk",
});
regions.push({
        displayName: "Pacific Northwest",
        name: "buk_npw",
});
regions.push({
        displayName: "Prairie",
        name: "buk_pra",
});
regions.push({
        displayName: "Pacific Southwest",
        name: "buk_psw",
});
regions.push({
        displayName: "Southeast",
        name: "buk_se",
});
regions.push({
        displayName: "Southwest",
        name: "buk_sw",
});
regions.push({
        displayName: "Southern Plains",
        name: "buk_spl",
});
regions.push({
        displayName: "Southern Rockies",
        name: "buk_srk",
});

levels.push({
        displayName: "Surface Layer Daily 8HR Average",
        name: "l1",
});
t06z_forecasthours = ["29", "53", "77"]
t12z_forecasthours = ["23", "47", "71"]
// fhrmean_forecasthours = ["240", "384"]
// vertprof_forecasthours = ["000", "006", "012", "018", "024", "030", "036", "042", "048", "054", "060", "066", "072", "096", "120", "144", "168", "192", "216", "240", "264", "288", "312", "336", "360", "384"]
// vertprof_fhrmean_forecasthours = ["240", "384"]
// vertprof_levels = ["all", "trop", "ltrop", "utrop", "strat"]
// vertprof_levels_name = ["All", "Troposphere", "Lower Troposphere", "Upper Troposphere", "Stratosphere"]
// non_vertprof_levels = ["p1000", "p925", "p850", "p700", "p500", "p300", "p250", "p200", "p100", "p50", "p20", "p10", "p5"]
// non_vertprof_levels_name = ["1000 hPa", "925 hPa", "850 hPa", "700 hPa", "500 hPa", "300 hPa", "250 hPa", "200 hPa", "100 hPa", "50 hPa", "20 hPa", "10 hPa", "5 hPa"]
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
	        plottype: "perfdiag",
		metric: "ctc",
	        daterange: "last31days",
		inithour: "init06z",
		forecasthour: "29",
		level: "l1",
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

	//Change init hour based on passed argument, if any
        var passed_inithour = "";
        if(passed_inithour!=""){
                if(searchByName(passed_inithour,inithours)>=0){
                        imageObj.inithour = passed_inithour;
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
	populateMenu('inithour');
	populateMenu('forecasthour');
	populateMenu('level');
	populateMenu('region');

	//changePlotType("timeseries");
	//changeForecastHour("120");
	//changePlotType("perfdiag");
	changeInitHour("init06z");
	changeForecastHour("29");
	//changeLevel("l1");

        //Populate the frames arrays
        frames = [];
        for(i=minFrame;i<=maxFrame;i=i+incrementFrame){frames.push(i);}

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
