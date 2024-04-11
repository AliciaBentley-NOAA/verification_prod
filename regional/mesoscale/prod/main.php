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
NCEP/EMC Operational Mesoscale Model Verification
</div>
<div id="pageContents">
<center>
<img src="https://www.emc.ncep.noaa.gov/users/verification/style/images/ncep_logo.gif" alt="" width="150" />
<br><br>
The National Centers for Environmental Prediction (NCEP)'s North American Mesoscale <b>(NAM)</b> and Rapid Refresh <b>(RAP)</b> provide forecasts for NCEP’s operational production suite of numerical guidance. This page displays verification statistics for these operational mesoscale models.
<br>
Verification statistics for the <b>GFS</b>, are included for comparison.
<br>

<br><br>
Verification is done using the <a href="https://github.com/NOAA-EMC/EVS" target="_blank">EMC Verification System (EVS)</a>, which uses <a href="https://dtcenter.org/community-code/metplus" target="_blank">METplus</a>.
</center>
</div>
</body>
</html>
