<!DOCTYPE html
<html>
<head>
<meta charset="UTF-8">
<title>GEFS Verification - Parallel - Atmospheric G2O: Geopotential Height</title>
<link rel="stylesheet" type="text/css" href="../../../../../../style/style_verif.css">
<script src="../../../../../../style/jquery-3.6.1.min.js"></script>
<script type="text/javascript" src="functions_base.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<!-- Head element -->
<div class="page-top">
        <span><a style="color:#ffffff">GRID-TO-OBS (ATMOSPHERIC): TEMPERATURE</a></span>
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
           <img name="map_image" src="../images/evs.global_ens.rmse_spread.tmp_p700.last31days.timeseries.valid00z_12z_f360.g003_glb.png" style="width:100%">
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

var url = "https://www.emc.ncep.noaa.gov/users/verification/global/gefs/prod/atmos/grid2obs/images/evs.global_ens.MMM.tmp_LLL.DDD.PPP_validHHH_fFFF.g003_RRR.png";

//====================================================================================================
//Add years & months
//====================================================================================================

var plottypes = [];
var metrics = [];
var obstypes = [];
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
plottypes.push({
        displayName: "Vertical Profile",
        name: "vertprof",
});
plottypes.push({
        displayName: "Forecast Hour Mean by Vertical Profile",
        name: "vertprof_fhrmean",
});




metrics.push({
        displayName: "Mean Error (Bias)",
        name: "me",
});
metrics.push({
        displayName: "Mean Absolute Error",
        name: "mae",
});
metrics.push({
        displayName: "Root Mean Square Error and Spread",
        name: "rmse_sprd",
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






//forecasthours.push({
//        displayName: "F000",
//        name: "000",
//});
//forecasthours.push({
//        displayName: "F012",
//        name: "012",
//});
//forecasthours.push({
//        displayName: "F024",
//        name: "024",
//});
//forecasthours.push({
//        displayName: "F036",
//        name: "036",
//});
//forecasthours.push({
//        displayName: "F048",
//        name: "048",
//});
//forecasthours.push({
//        displayName: "F060",
//        name: "060",
//});
//forecasthours.push({
//        displayName: "F072",
//        name: "072",
//});

//forecasthours.push({
//        displayName: "F084",
//        name: "084",
//});

//forecasthours.push({
//        displayName: "F096",
//        name: "096",
//});

//forecasthours.push({
//        displayName: "F108",
//        name: "108",
//});

forecasthours.push({
        displayName: "F120",
        name: "120",
});

//forecasthours.push({
//        displayName: "F132",
//        name: "132",
//});

//forecasthours.push({
//        displayName: "F144",
//        name: "144",
//});

//forecasthours.push({
//        displayName: "F156",
//        name: "156",
//});

//forecasthours.push({
//        displayName: "F168",
//        name: "168",
//});

//forecasthours.push({
//        displayName: "F180",
//        name: "180",
//});


//forecasthours.push({
//        displayName: "F192",
//        name: "192",
//});

//forecasthours.push({
//        displayName: "F204",
//        name: "204",
//});

//forecasthours.push({
//        displayName: "F216",
//        name: "216",
//});

//forecasthours.push({
//        displayName: "F228",
//        name: "228",
//});


forecasthours.push({
        displayName: "F240",
        name: "240",
});

//forecasthours.push({
//        displayName: "F252",
//        name: "252",
//});

//forecasthours.push({
//        displayName: "F264",
//        name: "264",
//});

//forecasthours.push({
//        displayName: "F276",
//        name: "276",
//});


//forecasthours.push({
//        displayName: "F288",
//        name: "288",
//});

//forecasthours.push({
//        displayName: "F300",
//        name: "300",
//});


//forecasthours.push({
//        displayName: "F312",
//        name: "312",
//});

//forecasthours.push({
//        displayName: "F324",
//        name: "324",
//});


//forecasthours.push({
//        displayName: "F336",
//        name: "336",
//});

//forecasthours.push({
//        displayName: "F348",
//        name: "348",
//});


forecasthours.push({
        displayName: "F360",
        name: "360",
});

//forecasthours.push({
//        displayName: "F372",
//        name: "372",
//});


//forecasthours.push({
//        displayName: "F384",
//        name: "384",
//});

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
        displayName: "1000 hPa",
        name: "p1000",
});
levels.push({
        displayName: "925 hPa",
        name: "p925",
});
levels.push({
        displayName: "850 hPa",
        name: "p850",
});
levels.push({
        displayName: "700 hPa",
        name: "p700",
});
levels.push({
        displayName: "500 hPa",
        name: "p500",
});
//levels.push({
//        displayName: "300 hPa",
//        name: "p300",
//});
levels.push({
        displayName: "250 hPa",
        name: "p250",
});
levels.push({
        displayName: "200 hPa",
        name: "p200",
});
levels.push({
        displayName: "100 hPa",
        name: "p100",
});
levels.push({
        displayName: "50 hPa",
        name: "p50",
});
levels.push({
        displayName: "10 hPa",
        name: "p10",
});

obstypes.push({
        displayName: "Analysis",
        name: "analysis",
});


timeseries_forecasthours = ["120","240","360"]
fhrmean_forecasthours = ["384"]
vertprof_forecasthours = ["000", "012", "024","036", "048", "060","072", "084", "096", "108", "120", "132", "144", "156", "168", "180", "192", "204", "216", "228", "240", "252", "264", "276", "288", "300", "312", "324", "336", "348", "360", "372", "384"]
vertprof_fhrmean_forecasthours = [ "384"]
vertprof_vhrs = ["12z"]
vertprof_vhrs_name = ["12Z"]
non_vertprof_vhrs = ["00z_12z"]
non_vertprof_vhrs_name = ["00Z and 12Z"]
vertprof_levels = ["all"]
vertprof_levels_name = ["All"]
non_vertprof_levels = ["p1000", "p925", "p850", "p700", "p500", "p250", "p200", "p100", "p50", "p10"]
non_vertprof_levels_name = ["1000 hPa", "925 hPa", "850 hPa", "700 hPa", "500 hPa", "250 hPa", "200 hPa", "100 hPa", "50 hPa", "10 hPa"]
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
		metric: "rmse_sprd",
                obstype: "analysis",
	        daterange: "last31days",
		validhour: "00z_12z",
		forecasthour: "120",
		level: "p700",
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
	populateMenu('obstype');
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
