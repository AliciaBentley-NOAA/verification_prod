
<!DOCTYPE html
<html>
<head>
<meta charset="UTF-8">
<title>GEFS</title>
<link rel="stylesheet" type="text/css" href="../../../../style/style_headline.css">
<script src="../../../../style/jquery-3.6.1.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>



<!-- Head element -->
<div class="page-top">
	<span><a style="color:#ffffff">Global Model Anomaly Correlation Coefficient (Last 31 days)</a></span>
</div>

<!-- Image -->
<div id="page-map">
	<image name="map" style="width:100%" src="https://www.emc.ncep.noaa.gov/users/verification/global/gfs/prod/atmos/headline/images/evs.global_det.acc.hgt_p500.last31days.timeseries_valid00z_f120.g004_nhem.png">
</div>

<!-- /Footer -->
<div class="page-footer">
        <span><b>Description:</b> An Anomaly Correlation Coefficient (ACC) score of 1.0 on a particular valid date indicates that <u>the forecast made 5 days prior to that valid date</u> was highly accurate (i.e., essentially perfect) across the Northern Hemisphere. The closer the GFS (black line) is to an ACC score of 1.0 across the time series, the more accurate the GFS's <u>5-day forecasts valid during the last 31 days</u> were. Colored lines represent other weather models, according to the key. The first number to the right of a weather model's name is that weather model's average ACC score during the last 31 days. The number of "days" written to the right of the average ACC score represents the number of 00Z forecasts included in the 31-day average. This number may be less than 31 if any 5-day forecasts valid during the last 31 days were missing.</span>
</div>


<script type="text/javascript">
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
//====================================================================================================
//User-defined variables
//====================================================================================================

//Global variables
var minFrame = 0; //Minimum frame for every variable
var maxFrame = 26; //Maximum frame for every variable
var incrementFrame = 1; //Increment for every frame

var startFrame = 0; //Starting frame

var cycle = 2018100600;

/*
When constructing the URL below, DDD = domain, VVV = variable, LLL = level, SSS = season, Y = frame number.
For X and Y, labeling one X or Y represents an integer (e.g. 0, 10, 20). Multiple of these represent a string
format (e.g. XX = 00, 06, 12 --- XXX = 000, 006, 012).
*/

var url = "https://www.emc.ncep.noaa.gov/gmb/yluo/test/ECMWF/DDDzLLL_VVV_SSS.gif";
/* var url = "https://www.emc.ncep.noaa.gov/mmb/gmanikin/fv3gfs/20180301/fv3_DDD_VVV_2018030100_0Y.png"; */
/*  var url = "https://www.emc.ncep.noaa.gov/users/Alicia.Bentley/fv3gefs/2018030100/images/DDD/mean_diff/VVV_Y.png"; */

//====================================================================================================
//Add variables & domains
//====================================================================================================

var variables = [];
var domains = [];
var levels = [];
var seasons = [];
var maptypes = [];
var validtimes = []; 


variables.push({
        displayName: "RMSE/Ensemble Spread",
        name: "rms",
});
variables.push({
        displayName: "ROC curve",
        name: "roc",
});
variables.push({
        displayName: "Economic Values",
        name: "eval",
});
variables.push({
        displayName: "Ranked Prob Skill Score",
        name: "rpss",
});
variables.push({
        displayName: "Brier Skill Score",
        name: "bss",
});
variables.push({
        displayName: "CRP Score",
        name: "crp",
});
variables.push({
        displayName: "CRP Skill Score",
        name: "crps",
});
variables.push({
        displayName: "Mean/Absolute Error",
        name: "err",
});
variables.push({
        displayName: "Anomaly Correlation",
        name: "pac",
});



domains.push({
        displayName: "N. Hemisphere",
        name: "nh",
});
domains.push({
        displayName: "S. Hemisphere",
        name: "sh",
});
domains.push({
        displayName: "Tropics",
        name: "tr",
});







levels.push({
        displayName: "500 hPa",
        name: "500",
});
levels.push({
        displayName: "1000 hPa",
        name: "1000",
});




seasons.push({
        displayName: "Summer 2020",
        name: "sum2020",
});
seasons.push({
        displayName: "Spring 2020",
        name: "spr2020",
});
seasons.push({
        displayName: "Winter 2019/2020",
        name: "win1920",
});
seasons.push({
        displayName: "Fall 2019",
        name: "fal2019",
});
seasons.push({
        displayName: "Summer 2019",
        name: "sum2019",
});
seasons.push({
        displayName: "Spring 2019",
        name: "spr2019",
});
seasons.push({
        displayName: "Winter 2018/2019",
        name: "win1819",
});
seasons.push({
        displayName: "Fall 2018",
        name: "fal2018",
});
seasons.push({
        displayName: "Summer 2018",
        name: "sum2018",
});
seasons.push({
        displayName: "Spring 2018",
        name: "spr2018",
});
seasons.push({
        displayName: "Winter 2017/2018",
        name: "win1718",
});
seasons.push({
        displayName: "Fall 2017",
        name: "fal2017",
});
seasons.push({
        displayName: "Summer 2017",
        name: "sum2017",
});
seasons.push({
        displayName: "Spring 2017",
        name: "spr2017",
});


validtimes.push({
        displayName: "0000 UTC",
        name: "00Z",
});
validtimes.push({
        displayName: "1200 UTC",
        name: "12Z",
});


maptypes.push({
        url: "geo_00Z.php",
        displayName: "0000 UTC",
        name: "geo_00Z",
});
maptypes.push({
        url: "geo_12Z.php",
        displayName: "1200 UTC",
        name: "geo_12Z",
});

//====================================================================================================
//Initialize the page
//====================================================================================================

//function for keyboard controls
document.onkeydown = keys;

//Decare object containing data about the currently displayed map
imageObj = {};

//Initialize the page
initialize();

//Format initialized run date & return in requested format
function formatDate(offset,format){
	var newdate = String(cycle);
	var yyyy = newdate.slice(0,4);
	var mm = newdate.slice(4,6);
	var dd = newdate.slice(6,8);
	var hh = newdate.slice(8,10);
	var curdate = new Date(yyyy,parseInt(mm)-1,dd,hh);
	
	//Offset by run
	var newOffset = curdate.getHours() + offset;
	curdate.setHours(newOffset);
	
	var yy = String(curdate.getFullYear()).slice(2,4);
	yyyy = curdate.getFullYear();
	mm = curdate.getMonth()+1;
	dd = curdate.getDate();
	if(dd < 10){dd = "0" + dd;}
	hh = curdate.getHours();
	if(hh < 10){hh = "0" + hh;}
	
	var wkday = curdate.getDay();
	var day_str = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
	
	//Return in requested format
	if(format == 'valid'){
		//06Z Thu 03/22/18 (90 h)
		var txt = hh + "Z " + day_str[wkday] + " " + mm + "/" + dd + "/" + yy;
		return txt;
	}
}

//Initialize the page
function initialize(){
	
	//Set image object based on default variables
	imageObj = {
		variable: "rms",
		domain: "nh",
		level: "500",
                season: "sum2020",
//                validtime: "00Z",
//                frame: startFrame,
	};
	
        //Change domain based on passed argument, if any
        var passed_domain = "";
        if(passed_domain!=""){
                if(searchByName(passed_domain,domains)>=0){
                        imageObj.domain = passed_domain;
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
	populateMenu('variable');
	populateMenu('domain');
	populateMenu('level');
	populateMenu('season');
 //       populateMenu('validtime');
	
	//Populate the frames arrays
	frames = [];
	for(i=minFrame;i<=maxFrame;i=i+incrementFrame){frames.push(i);}
	
	//Predefine empty array for preloading images
	for(i=0; i<variables.length; i++){
		variables[i].images = [];
		variables[i].loaded = [];
		variables[i].dprog = [];
	}
	
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
