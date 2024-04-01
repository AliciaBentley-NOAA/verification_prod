<!doctype html>
<html lang="en">
<title> EMC Verification </title>
<head>
<link rel="stylesheet" type="text/css" href="../../style/style_headline.css">
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


	
	<!-- Google font -->	
	<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<!-- Add icon library -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	
	<!--<link rel="stylesheet" href="emc.css" media="all">-->
	<link rel="stylesheet" href="../../style/emc-footer.css" media="all">
	<link rel="stylesheet" href="../../style/verif_update.css" media="all">
        <!-- link rel="stylesheet" href="./verif_update_test.css" media="all" -->
</head>

<body>

<!-- <div class="wrapper">
<header >
<nav class="navbar navbar-expand-lg header">
	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="74px" height="20px" viewBox="137.024 137.006 74 74" enable-background="new 137.024 137.006 74 74" xml:space="preserve">
        </svg>
  </a>
</nav>

</header> -->

<!-- Head element -->
<div class="page-top">
        <span><a style="color:#ffffff">Hurricane Model Verification</a></span>
</div>

<section id ="content">
<div class="container-fluid">

<div class="row justify-content-md-center">
    	<div class="col-md-auto col-overlay-img">
                <a class="img" href="global_det_abstk/" target="_top">
                  <div class="img__overlay">GFS<br>ECMWF<br>UKM<br>CMC</div>
                  <img src="https://www.emc.ncep.noaa.gov/users/verification/headlines/hurricane/2023/evs.hurricane_global_det.abstk_err.al.2023.season.png"/>
                </a>
                <div class="img-label"><a class="img-model-icon-lnks" href="global_det_abstk/"  target="_top">Global Det. Model<br>Absolute Track Error</a></div>
        </div>
	<div class="col-md-auto col-overlay-img">
                <a class="img" href="global_ens_abstk/" target="_top">
                  <div class="img__overlay">GEFS<br>EMCE<br>UKME<br>CMCE</div>
                  <img src="https://www.emc.ncep.noaa.gov/users/verification/headlines/hurricane/2023/evs.hurricane_global_ens.abstk_err.al.2023.season.png"/>
                </a>
                <div class="img-label"><a class="img-model-icon-lnks" href="global_ens_abstk/" target="_top">Global Ensemble<br>Absolute Track Error</a></div>
        </div>
        <div class="col-md-auto col-overlay-img">
                <a class="img" href="regional_abstk/" target="_top">
                  <div class="img__overlay">HAFS-A/B<br>HWRF/HMON<br>GFS<br>COAMPS-TC</div>
                  <img src="https://www.emc.ncep.noaa.gov/users/verification/headlines/hurricane/2023/evs.hurricane_regional.abstk_err.al.2023.season.png"/>
                </a>
                <div class="img-label"><a class="img-model-icon-lnks" href="regional_abstk/"  target="_top">Hurricane Model<br>Absolute Track Error</a></div>
        </div>
        <div class="col-md-auto col-overlay-img">
                <a class="img" href="global_det_abswind/" target="_top">
                  <div class="img__overlay">GFS<br>ECMWF<br>UKM<br>CMC</div>
                  <img src="https://www.emc.ncep.noaa.gov/users/verification/headlines/hurricane/2023/evs.hurricane_global_det.abswind_err.al.2023.season.png"/>
                </a>
                <div class="img-label"><a class="img-model-icon-lnks" href="global_det_abswind/"  target="_top">Global Det. Model<br>Absolute Intensity Error</a></div>
        </div>
        <div class="col-md-auto col-overlay-img">
                <a class="img" href="global_ens_abswind/" target="_top">
                  <div class="img__overlay">GEFS<br>EMCE<br>UKME<br>CMCE</div>
                  <img src="https://www.emc.ncep.noaa.gov/users/verification/headlines/hurricane/2023/evs.hurricane_global_ens.abswind_err.al.2023.season.png"/>
                </a>
                <div class="img-label"><a class="img-model-icon-lnks" href="global_ens_abswind/" target="_top">Global Ensemble<br>Absolute Intensity Error</a></div>
        </div>
        <div class="col-md-auto col-overlay-img">
                <a class="img" href="regional_abswind/" target="_top">
                  <div class="img__overlay">HAFS-A/B<br>HWRF/HMON<br>GFS<br>COAMPS-TC</div>
                  <img src="https://www.emc.ncep.noaa.gov/users/verification/headlines/hurricane/2023/evs.hurricane_regional.abswind_err.al.2023.season.png"/>
                </a>
                <div class="img-label"><a class="img-model-icon-lnks" href="regional_abswind/"  target="_top">Hurricane Model<br>Absolute Intensity Error</a></div>
        </div>
</div>

</div> <!-- Closes Container-Fluid div-->
</section><!-- Closes Content section-->

<!-- 	</div> --><!-- Close wrapper -->	
	<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
