<!DOCTYPE html
<html>
<head>
<meta charset="UTF-8">
<title>GFS Verification - Production - Atmospheric G2O: 10 meter U Wind</title>
<link rel="stylesheet" type="text/css" href="../../../../../../style/style_verif.css">
<script src="../../../../../../style/jquery-3.6.1.min.js"></script>
<script type="text/javascript" src="functions_base.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<!-- Head element -->
<div class="page-top">
        <span><a style="color:#ffffff">GRID-TO-OBS (ATMOSPHERIC): 10 METER U WIND</a></span>
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
		<span class="bold" style="color:#FF0000">Select Region: </span><span class="bold">Region:</span>
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

var url = "https://www.emc.ncep.noaa.gov/users/verification/global/gfs/prod/atmos/grid2obs/ugrd_10m/images/evs.global_det.MMM.ugrd_z10.DDD.PPP_validHHHz_fFFF.g104_RRR.png";

//====================================================================================================
//Add years & months
//====================================================================================================

var plottypes = [];
var metrics = [];
var dateranges = [];
var validhours = [];
var forecasthours = [];
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
        displayName: "Mean Error (Bias)",
        name: "me",
});
metrics.push({
        displayName: "Root Mean Square Error",
        name: "rmse",
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
        displayName: "00Z",
        name: "00",
});
validhours.push({
        displayName: "03Z",
        name: "03",
});
validhours.push({
        displayName: "06Z",
        name: "06",
});
validhours.push({
        displayName: "09Z",
        name: "09",
});
validhours.push({
        displayName: "12Z",
        name: "12",
});
validhours.push({
        displayName: "15Z",
        name: "15",
});
validhours.push({
        displayName: "18Z",
        name: "18",
});
validhours.push({
        displayName: "21Z",
        name: "21",
});

forecasthours.push({
        displayName: "F000",
        name: "000",
});
forecasthours.push({
        displayName: "F006",
        name: "006",
});
forecasthours.push({
        displayName: "F012",
        name: "012",
});
forecasthours.push({
        displayName: "F018",
        name: "018",
});
forecasthours.push({
        displayName: "F024",
        name: "024",
});
forecasthours.push({
        displayName: "F030",
        name: "030",
});
forecasthours.push({
        displayName: "F036",
        name: "036",
});
forecasthours.push({
        displayName: "F042",
        name: "042",
});
forecasthours.push({
        displayName: "F048",
        name: "048",
});
forecasthours.push({
        displayName: "F054",
        name: "054",
});
forecasthours.push({
        displayName: "F060",
        name: "060",
});
forecasthours.push({
        displayName: "F066",
        name: "066",
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
forecasthours.push({
        displayName: "F264",
        name: "264",
});
forecasthours.push({
        displayName: "F288",
        name: "288",
});
forecasthours.push({
        displayName: "F312",
        name: "312",
});
forecasthours.push({
        displayName: "F336",
        name: "336",
});
forecasthours.push({
        displayName: "F360",
        name: "360",
});
forecasthours.push({
        displayName: "F384",
        name: "384",
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
        displayName: "Mezqutial",
        name: "buk_mez",
});
regions.push({
        displayName: "Northeast/North Atlantic",
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

timeseries_forecasthours = ["000", "006", "012", "018", "024", "030", "036", "042", "048", "054", "060", "066", "072", "096", "120", "144", "168", "192", "216", "240", "264", "288", "312", "336", "360", "384"]
fhrmean_forecasthours = ["240", "384"]
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
		metric: "me",
	        daterange: "last31days",
		validhour: "00",
		forecasthour: "024",
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
	//Populate forecast hour and dprog/dt arrays for this run and frame
	populateMenu('plottype');
	populateMenu('metric');
	populateMenu('daterange');
	populateMenu('validhour');
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
