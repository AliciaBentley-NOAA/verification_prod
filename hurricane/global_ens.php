<!DOCTYPE html
<html>
<head>
<meta charset="UTF-8">
<title>TC Verification</title>
<link rel="stylesheet" type="text/css" href="style_hurricane.css">
<script src="jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="functions_hurricane.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<!-- Head element -->
<div class="page-top">
        <span><a style="color:#ffffff">TROPICAL CYCLONE VERIFICATION</a></span>
</div>

<!-- Top menu -->
<div class="page-menu"><div class="table">
        <div class="element">
                <span class="bold">Year:</span>
                <select id="year" onchange="changeYear(this.value);"></select>
        </div>
        <div class="element">
                <span class="bold"> Basin:</span>
                <select id="leftregion" onchange="changeLeftregion(this.value);"></select>
        </div>
        <div class="element">
                <span class="bold"> Storm Name:</span>
                <select id="leftmodel" onchange="changeLeftmodel(this.value);"></select>
        </div>
        <div class="element">
                <span class="bold"> Model Type:</span>
                <select id="rightregion" onchange="changeRightregion(this.value);"></select>
        </div>
        <div class="element">
                <span class="bold"> Statistic:</span>
                <select id="rightmodel" onchange="changeRightmodel(this.value);"></select>
        </div>
</div></div>

<!-- /Top menu -->






<!-- Images -->
<div id="page-map">
<table id="tbl-map" style="margin:auto">
     <tbody>
       <tr>
        <td id ="td-map">
           <img name="map_main" src="https://www.emc.ncep.noaa.gov/users/verification/hurricane/2023/global_ens/al/season/plots/evs.hurricane_global_ens.abstk_err.al.2023.season.png" style="width:100%">
        </td>
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

var url = "https://www.emc.ncep.noaa.gov/users/verification/hurricane/YYY/MMM/BBB/NNN/plots/evs.hurricane_MMM.EEE.BBB.YYY.NNN.png";

//====================================================================================================
//Add years & months
//====================================================================================================

var years = [];
var leftregions = [];
var leftmodels = [];
var rightregions = [];
var rightmodels = [];


years.push({
        displayName: "2023",
        name: "2023",
});
years.push({
        displayName: "2022",
        name: "2022",
});
//years.push({
//        displayName: "2021",
//        name: "2021",
//});




leftregions.push({
        displayName: "North Atlantic",
        name: "al",
});
leftregions.push({
        displayName: "East Pacific",
        name: "ep",
});





al_2023 = ["season","ARLENE02","BRET03","CINDY04","DON05","EMILY07","FRANKLIN08","GERT06","HAROLD09","IDALIA10","JOSE11","KATIA12","LEE13","MARGOT14","NIGEL15","OPHELIA16","PHILIPPE17","RINA18","SEAN19","TAMMY20","TWENTYON21","TWENTYTW22"]; 
al_2023_name = ["ALL STORMS","ARLENE","BRET","CINDY","DON","EMILY","FRANKLIN","GERT","HAROLD","IDALIA","JOSE","KATIA","LEE","MARGOT","NIGEL","OPHELIA","PHILIPPE","RINA","SEAN","TAMMY","TWENTYON","TWENTYTW"];
ep_2023 = ["season","ADRIAN01","BEATRIZ02","CALVIN03","FOUR04","DORA05","EUGENE06","FERNANDA07","GREG08","HILARY09","IRWIN10","JOVA11","TWELVE12","KENNETH13","FOURTEEN14","LIDIA15","MAX16","NORMA17","OTIS18","PILAR19","RAMON20"];
ep_2023_name = ["ALL STORMS","ADRIAN","BEATRIZ","CALVIN","FOUR","DORA","EUGENE","FERNANDA","GREG","HILARY","IRWIN","JOVA","TWELVE","KENNETH","FOURTEEN","LIDIA","MAX","NORMA","OTIS","PILAR","RAMON"];

al_2022 = ["season","ALEX01","BONNIE02","COLIN03","DANIELLE05","EARL06","FIONA07","GASTON08","HERMINE10","IAN09","ELEVEN11","TWELVE12","JULIA13","KARL14","LISA15","MARTIN16","NICOLE17"];
al_2022_name = ["ALL STORMS","ALEX","BONNIE","COLIN","DANIELLE","EARL","FIONA","GASTON","HERMINE","IAN","ELEVEN","TWELVE","JULIA","KARL","LISA","MARTIN","NICOLE"];
ep_2022 = ["season","AGATHA01","BLAS02","CELIA03","BONNIE04","DARBY05","ESTELLE06","FRANK07","GEORGETTE08","HOWARD09","IVETTE10","JAVIER11","KAY12","LESTER13","MADELINE14","NEWTON15","ORLENE16","PAINE17","JULIA18","ROSLYN19"];
ep_2022_name = ["ALL STORMS","AGATHA","BLAS","CELIA","BONNIE (AL)","DARBY","ESTELLE","FRANK","GEORGETTE","HOWARD","IVETTE","JAVIER","KAY","LESTER","MADELINE","NEWTON","ORLENE","PAINE","JULIA (AL)","ROSLYN"];

//al_2021 = ["season","ANA01","BILL02","CLAUDETTE03","DANNY04","ELSA05","FRED06","GRACE07","HENRI08","IDA09","JULIAN11","KATE10","LARRY12","MINDY13","NICHOLAS14","ODETTE15","PETER16","ROSE17","SAM18","TERESA19","VICTOR20","WANDA21"];
//al_2021_name = ["ALL STORMS","ANA","BILL","CLAUDETTE","DANNY","ELSA","FRED","GRACE","HENRI","IDA","JULIAN","KATE","LARRY","MINDY","NICHOLAS","ODETTE","PETER","ROSE","SAM","TERESA","VICTOR","WANDA"];
//ep_2021 = ["season","ANDRES01","BLANCA02","CARLOS03","DOLORES04","ENRIQUE05","FELICIA06","GUILLERMO07","HILDA08","IGNACIO10","JIMENA09","KEVIN11","LINDA12","MARTY13","NORA14","OLAF15","PAMELA16","RICK17","SANDRA19","TERRY18"];
//ep_2021_name = ["ALL STORMS","ANDRES","BLANCA","CARLOS","DOLORES","ENRIQUE","FELICIA","GUILLERMO","HILDA","IGNACIO","JIMENA","KEVIN","LINDA","MARTY","NORA","OLAF","PAMELA","RICK","SANDRA","TERRY"];



rightregions.push({
        displayName: "Global Deterministic",
        name: "global_det",
});
rightregions.push({
        displayName: "Global Ensemble",
        name: "global_ens",
});
rightregions.push({
        displayName: "Regional",
        name: "regional",
});




error_types = ["abstk_err","altk_bias","crtk_bias","abswind_err","wind_bias"]; 
error_types_name = ["Track Error","Along-Track Bias","Cross-Track Bias","Intensity Error","Intensity Bias"];


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
                year: "2023",
                leftregion: "al",
                leftmodel: "season",
                rightregion: "global_ens",
                rightmodel: "abstk_err",
	};


        //Change year based on passed argument, if any
        var passed_year = "";
        if(passed_year!=""){
                if(searchByName(passed_year,years)>=0){
                        imageObj.year = passed_year;
                }
        }

        //Change leftregion based on passed argument, if any
        var passed_leftregion = "";
        if(passed_leftregion!=""){
                if(searchByName(passed_leftregion,leftregions)>=0){
                        imageObj.leftregion = passed_leftregion;
                }
        }

        //Change leftmodel based on passed argument, if any
        var passed_leftmodel = "";
        if(passed_leftmodel!=""){
                if(searchByName(passed_leftmodel,leftmodels)>=0){
                        imageObj.leftmodel = passed_leftmodel;
                }
        }

        //Change rightregion based on passed argument, if any
        var passed_rightregion = "";
        if(passed_rightregion!=""){
                if(searchByName(passed_rightregion,rightregions)>=0){
                        imageObj.rightregion = passed_rightregion;
                }
        }

        //Change rightmodel based on passed argument, if any
        var passed_rightmodel = "";
        if(passed_rightmodel!=""){
                if(searchByName(passed_rightmodel,rightmodels)>=0){
                        imageObj.rightmodel = passed_rightmodel;
                }
        }


	//Populate forecast hour and dprog/dt arrays for this run and frame
	populateMenu('year');
        populateMenu('leftregion');	
        populateMenu('leftmodel');
        populateMenu('rightregion'); 
        populateMenu('rightmodel');

        changeLeftregion("al");
        changeLeftmodel("season");
        changeRightregion("global_ens");
        changeRightmodel("abstk_err");
	
	//Preload images and display map
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
