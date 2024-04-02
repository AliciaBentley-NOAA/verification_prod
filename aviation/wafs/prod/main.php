<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Home</title>
<!--<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />-->
<link href="main.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../../style/fonts.css" rel="stylesheet" type="text/css" media="all" />
<script src="https://d3js.org/d3.v4.min.js"></script>
</head>
<?php
$randomtoken = base64_encode( openssl_random_pseudo_bytes(32));
$_SESSION['csrfToken']=$randomtoken;
?>
<?php include "mainvars.php"; ?>

<body>
<div id="pageTitle">
NCEP/EMC <?php echo $model; ?> v<?php echo $version; ?> <?php echo $type; ?> Verification
</div>
<div id="pageContents">
<center>
<img src="../../../style/images/icon/aviation.png" width="200"/>
</center>

<br>The World Area Forecast System (WAFS) provides the worldwide aviation community with meteorolgical forecasts for flight planning and safety. There are two World Aera Forecast Centres (WAFCs), one is National Oceanic and Atmospheric Adminstration (NOAA) in the USA and the other is the UK MET Office. NOAA/NCEP/EMC (<a href="https://www.emc.ncep.noaa.gov" target="_blank">the Environmental Modeling Center</a>) generates WAFS aviation products from Global Forecast System (GFS).
<br><br>The WAFS aviation products include hazard and non-hazard aviation weather forecasts at 0.25 degree and non-hazard forecasts at 1.25 degree per International Civil Aviation Organization (ICAO) Nov 2023. The current EVS WAFS verification includes icing severity (hazard weather) at 0.25 degree and temperature, wind (non-hazard weather) at 1.25 degree. The verification of non-hazard aviation weather at 0.25 degree will be added later.

<br><br>Verification for the operational GFS and other operational global deterministic models can be found by navigating the links to the left. The verification is done using the <a href="https://github.com/NOAA-EMC/EVS" target="_blank">EMC Verification System (EVS)</a>, which uses <a href="https://dtcenter.org/community-code/metplus" target="_blank">METplus</a>.

</div>
</body>
</html>
