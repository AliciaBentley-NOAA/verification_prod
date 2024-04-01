<!doctype html>
<html lang="en">
<title> EMC Verification </title>
<head>
<link rel="stylesheet" type="text/css" href="../../../style/style_headline.css">
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
	<link rel="stylesheet" href="../../../style/emc-footer.css" media="all">
	<!--link rel="stylesheet" href="../../verif_update.css" media="all"-->
        <link rel='stylesheet' href="../../../style/verif_update_headline.css" media="all">

</head>

<body>
<!--
<header >
<nav class="navbar navbar-expand-lg header">
	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="74px" height="20px" viewBox="137.024 137.006 74 74" enable-background="new 137.024 137.006 74 74" xml:space="preserve">
        </svg>
  </a>
</nav>

</header> -->

<!-- Head element -->
<div class="page-top">
	<span><a style="color:#ffffff">Global Model Verification (Medium-Range Weather)</a></span>
</div>

<section id ="content">
<div class="container-fluid">

<div class="row justify-content-md-center">
    <div class="col-md-auto col-overlay-img">
		<a class="img" href="./acc_31days/" target="_top">
		  <div class="img__overlay">Global Models<br/>(Last 31 days)</div>
		  <img src="https://www.emc.ncep.noaa.gov/users/verification/global/gfs/prod/atmos/headline/images/evs.global_det.acc.hgt_p500.last31days.timeseries_valid00z_f120.g004_nhem.png"/>
		</a>
		<div class="img-label"><a class="img-model-icon-lnks" href="./acc_31days/" target="_top">Anomaly Correlation<br>Coefficient (Last 31 days)</a></div>
	</div>
        <div class="col-md-auto col-overlay-img">
                <a class="img" href="./acc_annual/" target="_top">
                  <div class="img__overlay">Global Models/<br/>GFS vs. ECMWF<br/>(1984–2023)</div>
                  <img src="https://emc.ncep.noaa.gov/users/verification/global/gfs/prod/atmos/headline/images/evs.global_det.all_models.acc.hgt_p500.allyears_yearly.timeseries_valid00z_f120.g004_nhem.png"/>
                </a>
                <div class="img-label"><a class="img-model-icon-lnks" href="./acc_annual/" target="_top">Anomaly Correlation<br>Coefficient (1984–2023)</a></div>
        </div>
        <div class="col-md-auto col-overlay-img">
                <a class="img" href="./acc_archive/" target="_top">
                  <div class="img__overlay">Global Models<br/>Archive</div>
                  <img src="https://www.emc.ncep.noaa.gov/users/verification/global/gfs/ops/grid2grid_all_models/acc_archive/images/acc_valid00Z_HGT_P500_fhr120_G002NHX_202311.png"/>
                </a>
                <div class="img-label"><a class="img-model-icon-lnks" href="./acc_archive/" target="_top">Anomaly Correlation<br>Coefficient (Archive)</a></div>
        </div>
        <div class="col-md-auto col-overlay-img">
                <a class="img" href="./gfs_useful_day/" target="_top">
                  <div class="img__overlay">GFS Useful</br>Forecast Day<br/>(1989–2023)</div>
                  <img src="https://emc.ncep.noaa.gov/users/verification/global/gfs/prod/atmos/headline/images/evs.global_det.gfs.acc_0p6.hgt_p500.allyears_yearly.useful_fcst_days_hist_valid00z.g004_nhem.png"/>
                </a>
                <div class="img-label"><a class="img-model-icon-lnks" href="./gfs_useful_day/" target="_top">GFS Useful Forecast<br>Day (1989–2023)</a></div>
	</div>
        <div class="col-md-auto col-overlay-img">
                <a class="img" href="./gfs_tmp_z2/" target="_top">
                  <div class="img__overlay">GFS</br>2-m Temperature<br>(Last 90 days)</div>
                  <img src="https://www.emc.ncep.noaa.gov/users/verification/global/gfs/prod/atmos/headline/images/evs.global_det.gfs.rmse.tmp_z2.last90days.timeseries_valid00z_f024f072f120f240.g104_buk_conus.png">/>
                </a>
                <div class="img-label"><a class="img-model-icon-lnks" href="./gfs_tmp_z2/" target="_top">GFS 2-m Temperature<br>(Last 90 days)</a></div>
        </div>
        <div class="col-md-auto col-overlay-img">
                <a class="img" href="./gfs_precip/" target="_top">
                  <div class="img__overlay">GFS</br>Precipitation</br>(2002–2023)</div>
                  <img src="https://www.emc.ncep.noaa.gov/users/verification/headlines/gfs_precip/annual_gfs_precip_fss_10mm.png"/>
                </a>
                <div class="img-label"><a class="img-model-icon-lnks" href="./gfs_precip/" target="_top">GFS Precipitation<br>(2002–2023)</a></div>
	</div>
        <div class="col-md-auto col-overlay-img">
                <a class="img" href="./acc_dieoff/" target="_top">
                  <div class="img__overlay">GFS vs. GEFS</br>vs. NAEFS<br/>(2023)</div>
                  <img src="https://www.emc.ncep.noaa.gov/users/verification/headlines/acc_dieoff/evs.global_ens.acc.hgt_p500.20230101_20240116.fhrmean_bar_valid00z_f384.g003_nhem.png"/>
                </a>
                <div class="img-label"><a class="img-model-icon-lnks" href="./acc_dieoff/" target="_top">ACC Score Die-off Plot<br>(2023)</a></div>
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
