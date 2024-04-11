<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Home</title>
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="main.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../../../style/fonts.css" rel="stylesheet" type="text/css" media="all" />
<script src="https://d3js.org/d3.v4.min.js"></script>
</head>
<?php
$randomtoken = base64_encode( openssl_random_pseudo_bytes(32));
$_SESSION['csrfToken']=$randomtoken;
?>
<?php include "mainvars.php"; ?>

<body>
<div id="pageTitle">
NCEP/EMC <?php echo $model; ?> <?php echo $version; ?> <?php echo $type; ?> Verification
</div>
<div id="pageContents">
<center>
<img src="https://www.emc.ncep.noaa.gov/users/verification/style/images/ncep_logo.gif" alt="" width="150" />
<br><br>The National Centers for Environmental Prediction (NCEP)'s Time-Lagged North American Rapid Refresh Ensemble Forecast (NARRE-TL) provides probabilistic guidance out to 24 hours. The Environmental Modeling Center (EMC) is responsible for the enhancements, transition to operations, and maintenance of the NARRE-TL. The forecasts are made hourly by NWS Central Operations.
<br><br><!--The current operational version of the NARRE is version <?php echo $version; ?> as of <?php echo $implementation_date; ?>. The service change notice can be found <a href="https://www.weather.gov/media/notification/pdf2/scn22-104_gfs.v12.3.0_aaa.pdf" target="_blank">here</a>.--> Verification for the operational NARRE-TL can be found by navigating the links to the left.
<br><br>Verification is done using the <a href="https://github.com/NOAA-EMC/EVS" target="_blank">EMC Verification System (EVS)</a>, which uses <a href="https://dtcenter.org/community-code/metplus" target="_blank">METplus</a>.
</center>
</div>
</body>
</html>
