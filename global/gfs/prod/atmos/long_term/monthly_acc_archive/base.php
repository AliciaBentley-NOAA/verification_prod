<!DOCTYPE html
<html>
<head>
<meta charset="UTF-8">
<title>GFS Verification - Production - Atmospheric - Long-Term: Monthly Anomaly Correlation Coefficient Archive </title>
<link rel="stylesheet" type="text/css" href="../../../../../../style/style_verif.css">
<script src="../../../../../../style/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="functions_base.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<!-- Head element -->
<div class="page-top">
        <span><a style="color:#ffffff">LONG-TERM (ATMOSPHERIC): MONTHLY ANOMALY CORRELATION COEFFICIENT (ACC) ARCHIVE</a></span>
</div>

<!-- Top menu -->
<div class="page-menu"><div class="table">
        <div class="element">
                <span class="bold" style="color:#FF0000">Select Plot Type: </span><span class="bold">Plot Type:</span>
                <select id="plottype" onchange="changePlotType(this.value);"></select>
        </div>
</div></div>
<!-- /Top menu -->

<!-- Middle menu -->
<div class="page-menu"><div class="table">
        <div class="element">
                <span class="bold" style="color:#FF0000">Select Month and Year: </span><span class="bold">Month:</span>
                <select id="month" onchange="changeMonth(this.value);"></select>
	</div>
        <div class="element">
		<span class="bold">Year:</span>
                <select id="year" onchange="changeYear(this.value);"></select>
	</div>
</div></div>
<!-- /Middle menu -->

<!-- Bottom menu -->
<div class="page-menu"><div class="table">
        <div class="element">
		<span class="bold" style="color:#FF0000">Select Forecast Lead and Valid Hour: </span><span class="bold">Forecast Lead:</span>
                <select id="forecasthour" onchange="changeForecastHour(this.value);"></select>
        </div>
        <div class="element">
		<span class="bold">Valid Hour:</span>
                <select id="validhour" onchange="changeValidHour(this.value);"></select>
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
var url = "https://www.emc.ncep.noaa.gov/users/verification/global/gfs/prod/atmos/long_term/images/evs.global_det.acc.hgt_p500.YYYMMM.PPP_validHHHz_FFF.g004_nhem.png";

//====================================================================================================
//Add years & months
//====================================================================================================

var plottypes = [];
var months = [];
var years = [];
var forecasthours = [];
var validhours = [];

plottypes.push({
        displayName: "Time Series",
        name: "timeseries",
});
plottypes.push({
        displayName: "Forecast Hour Mean",
        name: "fhrmean",
});

months.push({
        displayName: "January",
        name: "01",
});
months.push({
        displayName: "Febuary",
        name: "02",
});
months.push({
        displayName: "March",
        name: "03",
});
months.push({
        displayName: "April",
        name: "04",
});
months.push({
        displayName: "May",
        name: "05",
});
months.push({
        displayName: "June",
        name: "06",
});
months.push({
        displayName: "July",
        name: "07",
});
months.push({
        displayName: "August",
        name: "08",
});
months.push({
        displayName: "September",
        name: "09",
});
months.push({
        displayName: "October",
        name: "10",
});
months.push({
        displayName: "November",
        name: "11",
});
months.push({
        displayName: "December",
        name: "12",
});

years.push({
        displayName: "2006",
        name: "2006",
});
years.push({
        displayName: "2007",
        name: "2007",
});
years.push({
        displayName: "2008",
        name: "2008",
});
years.push({
        displayName: "2009",
        name: "2009",
});
years.push({
        displayName: "2010",
        name: "2010",
});
years.push({
        displayName: "2011",
        name: "2011",
});
years.push({
        displayName: "2012",
        name: "2012",
});
years.push({
        displayName: "2013",
        name: "2013",
});
years.push({
        displayName: "2014",
        name: "2014",
});
years.push({
        displayName: "2015",
        name: "2015",
});
years.push({
        displayName: "2016",
        name: "2016",
});
years.push({
        displayName: "2017",
        name: "2017",
});
years.push({
        displayName: "2018",
        name: "2018",
});
years.push({
        displayName: "2019",
        name: "2019",
});
years.push({
        displayName: "2020",
        name: "2020",
});
years.push({
        displayName: "2021",
        name: "2021",
});
years.push({
        displayName: "2022",
        name: "2022",
});
years.push({
        displayName: "2023",
        name: "2023",
});
years.push({
        displayName: "2024",
        name: "2024",
});


validhours.push({
        displayName: "00Z",
        name: "00",
});
validhours.push({
        displayName: "12Z",
        name: "12",
});

forecasthours.push({
        displayName: "F000",
        name: "f000",
});
forecasthours.push({
        displayName: "F024",
        name: "f024",
});
forecasthours.push({
        displayName: "F048",
        name: "f048",
});
forecasthours.push({
        displayName: "F072",
        name: "f072",
});
forecasthours.push({
        displayName: "F096",
        name: "f096",
});
forecasthours.push({
        displayName: "F120",
        name: "f120",
});
forecasthours.push({
        displayName: "F144",
        name: "f144",
});
forecasthours.push({
        displayName: "F168",
        name: "f168",
});
forecasthours.push({
        displayName: "F192",
        name: "f192",
});
forecasthours.push({
        displayName: "F216",
        name: "f216",
});
forecasthours.push({
        displayName: "F240",
        name: "f240",
});

timeseries_forecasthours = ["000", "024", "048", "072", "096", "120", "144", "168", "192", "216", "240"]
fhrmean_forecasthours = ["240"]

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
        // create a specified date object using Date constructor 
        var dateObj = new Date(); 
        // subtract one day from specified time                           
        dateObj.setDate(dateObj.getDate() - 1); 
        var month  = dateObj.getMonth() - 1;
        if(month == -1){var mm = "12";}
        if(month == -1){var year = dateObj.getFullYear() -1;}
        if(month > -1){var mm = (dateObj.getMonth() +0).toString();}
        if(month > -1){var year = dateObj.getFullYear();}
        var yyyy = year.toString();
	if(mm < 10){mm = "0" + mm;}

	//Set image object based on default years
	imageObj = {
	        plottype: "timeseries",
		month: mm,
		year: yyyy,
		forecasthour: "f120",
		validhour: "00"
        };

        //Change plot type based on passed argument, if any
        var passed_plottype = "";
        if(passed_plottype!=""){
                if(searchByName(passed_plottype,plottypes)>=0){
                        imageObj.plottype = passed_plottype;
                }
        }

        //Change month based on passed argument, if any
        var passed_month = "";
        if(passed_month!=""){
                if(searchByName(passed_month,months)>=0){
                        imageObj.month = passed_month;
                }
	}

	//Change year based on passed argument, if any
        var passed_year = "";
        if(passed_year!=""){
                if(searchByName(passed_year,years)>=0){
                        imageObj.year = passed_year;
                }
        }

	//Change forecast hour based on passed argument, if any
        var passed_forecasthour = "";
        if(passed_forecasthour!=""){
                if(searchByName(passed_forecasthour,forecasthours)>=0){
                        imageObj.forecasthour = passed_forecasthour;
                }
	}

	//Change valid hour based on passed argument, if any
        var passed_validhour = "";
        if(passed_validhour!=""){
                if(searchByName(passed_validhour,validhours)>=0){
                        imageObj.validhour = passed_validhour;
                }
        }

	//Populate forecast hour and dprog/dt arrays for this run and frame
	populateMenu('plottype');
	populateMenu('month');
	populateMenu('year');
	populateMenu('forecasthour');
        populateMenu('validhour');

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
