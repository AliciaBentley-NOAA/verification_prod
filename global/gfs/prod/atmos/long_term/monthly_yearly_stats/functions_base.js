<!--

/* ============================================================================================================= */
/* Preloading & displaying functions */
/* ============================================================================================================= */

//Populate the dropdown menu with items
function populateMenu(mode){
	if(mode == 'frequency'){
		var element = document.getElementById("frequency");
		for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}
		
		for(i=0; i<frequencys.length; i++){
			var option = document.createElement("option");
			option.text = frequencys[i].displayName;
			option.value = frequencys[i].name;
			element.add(option);
		}
	}
	else if(mode == 'plottype'){
                var element = document.getElementById("plottype");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<plottypes.length; i++){
                        var option = document.createElement("option");
                        option.text = plottypes[i].displayName;
                        option.value = plottypes[i].name;
                        element.add(option);
                }
        }
        else if(mode == 'metric'){
                var element = document.getElementById("metric");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<metrics.length; i++){
                        var option = document.createElement("option");
                        option.text = metrics[i].displayName;
                        option.value = metrics[i].name;
                        element.add(option);
                }
        }
	else if(mode == 'model'){
                var element = document.getElementById("model");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<models.length; i++){
                        var option = document.createElement("option");
                        option.text = models[i].displayName;
                        option.value = models[i].name;
                        element.add(option);
                }
        }
        else if(mode == 'daterange'){
                var element = document.getElementById("daterange");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<dateranges.length; i++){
                        var option = document.createElement("option");
                        option.text = dateranges[i].displayName;
                        option.value = dateranges[i].name;
                        element.add(option);
                }
        }
        else if(mode == 'forecasthour'){
                var element = document.getElementById("forecasthour");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<forecasthours.length; i++){
                        var option = document.createElement("option");
                        option.text = forecasthours[i].displayName;
                        option.value = forecasthours[i].name;
                        element.add(option);
                }
        }
	else if(mode == 'validinithour'){
                var element = document.getElementById("validinithour");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<validinithours.length; i++){
                        var option = document.createElement("option");
                        option.text = validinithours[i].displayName;
                        option.value = validinithours[i].name;
                        element.add(option);
                }
        }
        else if(mode == 'variable'){
                var element = document.getElementById("variable");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<variables.length; i++){
                        var option = document.createElement("option");
                        option.text = variables[i].displayName;
                        option.value = variables[i].name;
                        element.add(option);
                }
        }
        else if(mode == 'level'){
                var element = document.getElementById("level");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<levels.length; i++){
                        var option = document.createElement("option");
                        option.text = levels[i].displayName;
                        option.value = levels[i].name;
                        element.add(option);
                }
        }
        else if(mode == 'region'){
                var element = document.getElementById("region");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<regions.length; i++){
                        var option = document.createElement("option");
                        option.text = regions[i].displayName;
                        option.value = regions[i].name;
                        element.add(option);
                }
        }
}

//Format URL to the requested items
function getURL(frequency,plottype,metric,model,daterange,forecasthour,validinithour,variable,level,region,frame){
        var newurl = url.replace("QQQ",frequency);
	var newurl = newurl.replace("PPP",plottype);
	var newurl = newurl.replace("MMM",metric);
	var newurl = newurl.replace("EEE",model);
	var newurl = newurl.replace("DDD",daterange);
	var newurl = newurl.replace("FFF",forecasthour);
	var newurl = newurl.replace("HHH",validinithour);
	var newurl = newurl.replace("VVV",variable);
	var newurl = newurl.replace("LLL",level);
	var newurl = newurl.replace("RRR",region);
	for(var i=0; i<5; i++){
		newurl = newurl.replace("Z",frame);
	}
	//document.getElementById("page-map").innerHTML = newurl;
	return newurl;
}

//Search for a name within an object
function searchByName(keyname, arr){
    for (var i=0; i < arr.length; i++){
        if (arr[i].name === keyname){
            return i;
        }
    }
	return -1;
}

//Display the current image object
function showImage(){
	
	//Frequency index
	var idx_var = searchByName(imageObj.frequency,frequencys);
	
	//Display image
	//document.getElementById('loading').style.display = "none";
	var url = getURL(imageObj.frequency,imageObj.plottype,imageObj.metric,imageObj.model,imageObj.daterange,imageObj.forecasthour,imageObj.validinithour,imageObj.variable,imageObj.level,imageObj.region,i);
	document.map_image.src = url;
	
	//Update dropdown menus
	//TOMER EDITS - The "valid" dropdown menu is no longer there, so this line isn't needed anymore.
	//document.getElementById("valid").selectedIndex = frames.indexOf(parseInt(imageObj.frame));//(parseInt(imageObj.frame) / incrementFrame);
	document.getElementById("frequency").selectedIndex = searchByName(imageObj.frequency,frequencys);
        document.getElementById("plottype").selectedIndex = searchByName(imageObj.plottype,plottypes);
        document.getElementById("metric").selectedIndex = searchByName(imageObj.metric,metrics);
        document.getElementById("model").selectedIndex = searchByName(imageObj.model,models);
	document.getElementById("daterange").selectedIndex = searchByName(imageObj.daterange,dateranges);
	document.getElementById("forecasthour").selectedIndex = searchByName(imageObj.forecasthour,forecasthours);
	document.getElementById("validinithour").selectedIndex = searchByName(imageObj.validinithour,validinithours);
	document.getElementById("variable").selectedIndex = searchByName(imageObj.variable,variables);
	document.getElementById("level").selectedIndex = searchByName(imageObj.level,levels);
	document.getElementById("region").selectedIndex = searchByName(imageObj.region,regions);
	//Update URL in address bar
	generate_url();
}

//Format integer as a string by number of characters
function formatString(i,val){
	if(val==3){
		if(i<10){return "00"+i;}
		if(i<100){return "0"+i;}
		return i;
	}
}

//Preload images for the current run, plot type & projection
function preload(obj){
	return;
	
	/*
	TOMER EDITS
	Since we're no longer preloading images, I simply added a "return" statement at the beginning of the function
	so it doesn't execute any of the code below. You can then remove any references to "preload()" on your own time.
	*/
	
	//Plot Type index
	var idx_var = searchByName(obj.frequency,frequencys);
	
	//alert(obj.frequency);
	//alert(idx_var);
	
	//frequencys[idx_var].images[i] = [];
        //frequencys[idx_var].images[i] = [];
	//frequencys[idx_var].images[i] = [];
	
/*	//Arrange list of hour indices to loop through
	var frameidx = frames.indexOf(imageObj.frame);
	var hrs_loop = [frameidx];
	
	for(i=1; i<frames.length; i++){
		
		var idx_up = frameidx + i;
		var idx_down = frameidx - i;
		
		if(idx_up<=frames.indexOf(maxFrame)){hrs_loop.push(idx_up);}
		if(idx_down>=frames.indexOf(minFrame)){hrs_loop.push(idx_down);}
	}
*/	
	//Loop through all forecast hours & pre-load image
	for (var i1=0; i1<frames.length; i1++){
		var i = frames[i1];

		var urls = getURL(obj.frequency,i);
		
		frequencys[idx_var].images[i] = new Image();
		frequencys[idx_var].images[i].loaded = false;
		frequencys[idx_var].images[i].id = i;
	        frequencys[idx_var].images[i].onload = function(){this.loaded = true; remove_loading(this.varid,this.id);};
		frequencys[idx_var].images[i].onerror = function(){remove_loading(this.varid,this.id);};
		frequencys[idx_var].images[i].src = urls;
		frequencys[idx_var].images[i].frequency = obj.frequency;
		frequencys[idx_var].images[i].varid = idx_var;
    }
}

//Remove sign of loading image
function remove_loading(idx_var,idx_frame){
	check1a = parseInt(idx_var);
	check1b = searchByName(imageObj.frequency,frequencys);
	check2a = frames.indexOf(parseInt(idx_frame));
	check2b = frames.indexOf(parseInt(imageObj.frame));
	
	//Remove if the image just loaded for the currently displayed image
	if((check1a == check1b) && (check2a == check2b)){
		document.getElementById('loading').style.display = "none";
		document.map.src = frequencys[idx_var].images[imageObj.frame].src;
	}
}

/* ============================================================================================================= */
/* Dropdown menu functions */
/* ============================================================================================================= */

//Change the frequency from dropdown menu
function changeFrequency(id){
	imageObj.frequency = id;
	preload(imageObj);
	showImage();
	document.getElementById("frequency").blur();

	var selected_frequency = document.getElementById("frequency").value;
        var selected_metric = document.getElementById("metric").value;

        //Plot Type
	var selected_plottype = document.getElementById("plottype").value;
        var element = document.getElementById("plottype");
        for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}
        if(selected_frequency=="monthly"){
		if(selected_metric=="acc"){
			frequency_plottypes = monthly_acc_plottypes;
                        frequency_plottypes_name = monthly_acc_plottypes_name;
                }
		else{
			frequency_plottypes = monthly_non_acc_plottypes;
                        frequency_plottypes_name = monthly_non_acc_plottypes_name;
		}
        }
        else if(selected_frequency=="yearly"){
             frequency_plottypes = yearly_plottypes;
             frequency_plottypes_name = yearly_plottypes_name;
        }
        plottypes = [];
        for(i=0; i<frequency_plottypes.length; i++){
        plottypes.push({
                displayName: frequency_plottypes_name[i],
                name: frequency_plottypes[i],
                })
        }
	for(i=0; i<plottypes.length; i++){
        var option = document.createElement("option");
        option.text = plottypes[i].displayName;
        option.value = plottypes[i].name;
        element.add(option);
        }
	var plottypes_values= [];
        for(i=0; i<element.options.length; i++){
               plottypes_values.push(element.options[i].value);
        }
        if(plottypes_values.indexOf(selected_plottype) != -1){
               var idx = plottypes_values.indexOf(selected_plottype);
               element.options[idx].selected = true;
               element.onchange();
        }
        else{
               element.options[0].selected = true;
               element.onchange();
        }
}

//Change the plot type from dropdown menu
function changePlotType(id){
        imageObj.plottype = id;
        preload(imageObj);
        showImage();
        document.getElementById("plottype").blur();

        var selected_plottype = document.getElementById("plottype").value;
	//Model
	var selected_model = document.getElementById("model").value;
        var element = document.getElementById("model");
	for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}
        if(selected_plottype=="useful_fcst_days_timeseries"){
             plottype_models = useful_fcst_days_models;
             plottype_models_name = useful_fcst_days_models_name;
        }
        else{
	     plottype_models = non_useful_fcst_days_models;
             plottype_models_name = non_useful_fcst_days_models_name;
        }
	models = [];
        for(i=0; i<plottype_models.length; i++){
        models.push({
                displayName: plottype_models_name[i],
                name: plottype_models[i],
                })
        }
	for(i=0; i<models.length; i++){
        var option = document.createElement("option");
        option.text = models[i].displayName;
        option.value = models[i].name;
        element.add(option);
        }
        var models_values= [];
        for(i=0; i<element.options.length; i++){
               models_values.push(element.options[i].value);
        }
        if(models_values.indexOf(selected_model) != -1){
               var idx = models_values.indexOf(selected_model);
               element.options[idx].selected = true;
               element.onchange();
        }
        else{
               element.options[0].selected = true;
               element.onchange();
        }
	//Forecast Hours
        var selected_forecasthour = document.getElementById("forecasthour").value;
        var element = document.getElementById("forecasthour");
        for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}
        if(selected_plottype=="timeseriesdiff"){
                plottype_forecasthours = timeseriesdiff_forecasthours;
		plottype_forecasthours_name = timeseriesdiff_forecasthours_name;
        }
        else if(selected_plottype=="leaddate"){
                plottype_forecasthours = leaddate_forecasthours;
		plottype_forecasthours_name = leaddate_forecasthours_name;
        }
        else if(selected_plottype=="annualmean"){
                plottype_forecasthours = annualmean_forecasthours;
		plottype_forecasthours_name = annualmean_forecasthours_name;
        }
	else if(selected_plottype=="useful_fcst_days_timeseries"){
                plottype_forecasthours = useful_fcst_days_forecasthours;
                plottype_forecasthours_name = useful_fcst_days_forecasthours_name;
        }
        forecasthours = [];
        for(i=0; i<plottype_forecasthours.length; i++){
        forecasthours.push({
                displayName: plottype_forecasthours_name[i],
                name: plottype_forecasthours[i],
                })
        }
        for(i=0; i<forecasthours.length; i++){
        var option = document.createElement("option");
        option.text = forecasthours[i].displayName;
        option.value = forecasthours[i].name;
        element.add(option);
        }
        var fhrs_values= [];
        for(i=0; i<element.options.length; i++){
               fhrs_values.push(element.options[i].value);
        }
        if(fhrs_values.indexOf(selected_forecasthour) != -1){
               var idx = fhrs_values.indexOf(selected_forecasthour);
               element.options[idx].selected = true;
               element.onchange();
        }
        else{
               element.options[0].selected = true;
               element.onchange();
        }
	//Variables
	//var selected_variable = document.getElementById("variable").value;
        //var element = document.getElementById("variable");
        //for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}
        //if(selected_plottype=="useful_fcst_days_timeseries"){
        //        plottype_variables = useful_fcst_days_variables;
        //        plottype_variables_name = useful_fcst_days_variables_name;
        //}
	//else{
        //        plottype_variables = non_useful_fcst_days_variables;
        //        plottype_variables_name = non_useful_fcst_days_variables_name;
	//}
	//variables = [];
        //for(i=0; i<plottype_variables.length; i++){
        //variables.push({
        //        displayName: plottype_variables_name[i],
        //        name: plottype_variables[i],
        //        })
        //}
	//for(i=0; i<variables.length; i++){
        //var option = document.createElement("option");
        //option.text = variables[i].displayName;
        //option.value = variables[i].name;
        //element.add(option);
        //}
	//var variable_values= [];
        //for(i=0; i<element.options.length; i++){
        //       variable_values.push(element.options[i].value);
        //}
        //if(variable_values.indexOf(selected_variable) != -1){
        //       var idx = variable_values.indexOf(selected_variable);
        //       element.options[idx].selected = true;
        //       element.onchange();
        //}
        //else{
        //       element.options[0].selected = true;
        //       element.onchange();
        //}
}

//Change the metric from dropdown menu
function changeMetric(id){
        imageObj.metric = id;
        preload(imageObj);
        showImage();
        document.getElementById("metric").blur();

	var selected_frequency = document.getElementById("frequency").value;
        var selected_metric = document.getElementById("metric").value;
        //Plot Type
        var selected_plottype = document.getElementById("plottype").value;
        var element = document.getElementById("plottype");
        for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}
        if(selected_frequency=="monthly"){
                if(selected_metric=="acc"){
                        frequency_plottypes = monthly_acc_plottypes;
                        frequency_plottypes_name = monthly_acc_plottypes_name;
                }
                else{
                        frequency_plottypes = monthly_non_acc_plottypes;
                        frequency_plottypes_name = monthly_non_acc_plottypes_name;
                }
        }
        else if(selected_frequency=="yearly"){
             frequency_plottypes = yearly_plottypes;
             frequency_plottypes_name = yearly_plottypes_name;
        }
        plottypes = [];
        for(i=0; i<frequency_plottypes.length; i++){
        plottypes.push({
                displayName: frequency_plottypes_name[i],
                name: frequency_plottypes[i],
                })
        }
        for(i=0; i<plottypes.length; i++){
        var option = document.createElement("option");
        option.text = plottypes[i].displayName;
        option.value = plottypes[i].name;
        element.add(option);
        }
        var plottypes_values= [];
        for(i=0; i<element.options.length; i++){
               plottypes_values.push(element.options[i].value);
        }
        if(plottypes_values.indexOf(selected_plottype) != -1){
               var idx = plottypes_values.indexOf(selected_plottype);
               element.options[idx].selected = true;
               element.onchange();
        }
        else{
               element.options[0].selected = true;
               element.onchange();
        }

	//Variable
	var selected_variable = document.getElementById("variable").value;
        var element = document.getElementById("variable");
        for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}
        if(selected_metric=="acc"){
                metric_variables = acc_variables;
                metric_variables_name = acc_variables_name;
        }
        else{
                metric_variables = non_acc_variables;
                metric_variables_name = non_acc_variables_name;
        }
	variables = [];
        for(i=0; i<metric_variables.length; i++){
        variables.push({
                displayName: metric_variables_name[i],
                name: metric_variables[i],
                })
        }
	for(i=0; i<variables.length; i++){
        var option = document.createElement("option");
        option.text = variables[i].displayName;
        option.value = variables[i].name;
        element.add(option);
        }
        var variable_values= [];
        for(i=0; i<element.options.length; i++){
               variable_values.push(element.options[i].value);
        }
        if(variable_values.indexOf(selected_variable) != -1){
               var idx = variable_values.indexOf(selected_variable);
               element.options[idx].selected = true;
               element.onchange();
        }
        else{
               element.options[0].selected = true;
               element.onchange();
        }
}

//Change the model from dropdown menu
function changeModel(id){
        imageObj.model = id;
        preload(imageObj);
        showImage();
        document.getElementById("model").blur();

	var selected_model = document.getElementById("model").value;

        //Valid Init Hour
        var selected_validinithour = document.getElementById("validinithour").value;
        var element = document.getElementById("validinithour");
	for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}
        if(selected_model=="gfs_4cycles"){
	     model_validinithours = gfs_4cycles_validinithours;
             model_validinithours_name = gfs_4cycles_validinithours_name;
        }
        else{
             model_validinithours = non_gfs_4cycles_validinithours;
             model_validinithours_name = non_gfs_4cycles_validinithours_name;
        }
        validinithours = [];
        for(i=0; i<model_validinithours.length; i++){
        validinithours.push({
                displayName: model_validinithours_name[i],
                name: model_validinithours[i],
                })
        }
	for(i=0; i<validinithours.length; i++){
        var option = document.createElement("option");
        option.text = validinithours[i].displayName;
        option.value = validinithours[i].name;
        element.add(option);
        }
        var validinithours_values= [];
        for(i=0; i<element.options.length; i++){
               validinithours_values.push(element.options[i].value);
        }
        if(validinithours_values.indexOf(selected_validinithour) != -1){
               var idx = validinithours_values.indexOf(selected_validinithour);
               element.options[idx].selected = true;
               element.onchange();
        }
        else{
               element.options[0].selected = true;
               element.onchange();
        }
}

//Change the date range from dropdown menu
function changeDateRange(id){
        imageObj.daterange = id;
        preload(imageObj);
        showImage();
        document.getElementById("daterange").blur();
}

//Change the forecast hour from dropdown menu
function changeForecastHour(id){
        imageObj.forecasthour = id;
        preload(imageObj);
        showImage();
        document.getElementById("forecasthour").blur();
}

//Change the valid/init hour from dropdown menu
function changeValidInitHour(id){
        imageObj.validinithour = id;
        preload(imageObj);
        showImage();
        document.getElementById("validinithour").blur();
}

//Change the variable from dropdown menu
function changeVariable(id){
        imageObj.variable = id;
        preload(imageObj);
        showImage();
        document.getElementById("variable").blur();

	var selected_variable = document.getElementById("variable").value;
        if(selected_variable=="hgt"){
             variable_levels = hgt_levels;
             variable_levels_name = hgt_levels_name;
	     variable_regions = hgt_regions;
             variable_regions_name = hgt_regions_name;
        }
        else if(selected_variable=="ugrd_vgrd"){
             variable_levels = ugrd_vgrd_levels;
             variable_levels_name = ugrd_vgrd_levels_name;
	     variable_regions = ugrd_vgrd_regions;
             variable_regions_name = ugrd_vgrd_regions_name;
        }

        //Level
        var selected_level = document.getElementById("level").value;
        var element = document.getElementById("level");
        for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}
	levels = [];
        for(i=0; i<variable_levels.length; i++){
        levels.push({
                displayName: variable_levels_name[i],
                name: variable_levels[i],
                })
        }
	for(i=0; i<levels.length; i++){
        var option = document.createElement("option");
        option.text = levels[i].displayName;
        option.value = levels[i].name;
        element.add(option);
        }
	var levels_values= [];
        for(i=0; i<element.options.length; i++){
               levels_values.push(element.options[i].value);
        }
	if(levels_values.indexOf(selected_level) != -1){
               var idx = levels_values.indexOf(selected_level);
               element.options[idx].selected = true;
               element.onchange();
        }
        else{
               element.options[0].selected = true;
               element.onchange();
        }

	//Region
        var selected_region = document.getElementById("region").value;
        var element = document.getElementById("region");
        for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}
        regions = [];
        for(i=0; i<variable_regions.length; i++){
        regions.push({
                displayName: variable_regions_name[i],
                name: variable_regions[i],
                })
        }
	for(i=0; i<regions.length; i++){
        var option = document.createElement("option");
        option.text = regions[i].displayName;
        option.value = regions[i].name;
        element.add(option);
        }
	var regions_values= [];
        for(i=0; i<element.options.length; i++){
               regions_values.push(element.options[i].value);
        }
	if(regions_values.indexOf(selected_region) != -1){
               var idx = regions_values.indexOf(selected_region);
               element.options[idx].selected = true;
               element.onchange();
        }
        else{
               element.options[0].selected = true;
               element.onchange();
        }
}

//Change the level from dropdown menu
function changeLevel(id){
        imageObj.level = id;
        preload(imageObj);
        showImage();
        document.getElementById("level").blur();
}

//Change the region from dropdown menu
function changeRegion(id){
        imageObj.region = id;
        preload(imageObj);
        showImage();
        document.getElementById("region").blur();
}

// Adds zeros in front of the integer
function NumToString(i){
    if(i < 10){return "00"+String(i);}
    else if(i < 100){return "0"+String(i);}
    return String(i);
}
/* ============================================================================================================= */
/* Keyboard controls */
/* ============================================================================================================= */

/* function keys(e){
	//Left
	if(e.keyCode == 37){
		prevFrame();
		return !(e.keyCode);
	}
	//Up
	else if(e.keyCode == 38){
		pressUp();
		return !(e.keyCode);
	}
	//Right
	else if(e.keyCode == 39){
		nextFrame();
		return !(e.keyCode);
	}
	//Down
	else if(e.keyCode == 40){
		pressDown();
		return !(e.keyCode);
	}
}

function prevFrame(){
	var curFrame = parseInt(imageObj.frame);
	if(curFrame > minFrame){curFrame = curFrame - incrementFrame;}
	changeValid(curFrame);
}

function nextFrame(){
	var curFrame = parseInt(imageObj.frame);
	if(curFrame < maxFrame){curFrame = curFrame + incrementFrame;}
	changeValid(curFrame);
}

function pressDown(){
	var curVar = searchByName(imageObj.frequency,frequencys);
	if(curVar < frequencys.length-1){curVar += 1; changeFrequency(frequencys[curVar].name);}
}

function pressUp(){
	var curVar = searchByName(imageObj.frequency,frequencys);
	if(curVar > 0){curVar = curVar - 1; changeFrequency(frequencys[curVar].name);}
}

*/

/* ============================================================================================================= */
/* Additional functions */
/* ============================================================================================================= */

//Update the URL in the address bar
function generate_url(){
	
	var url = window.location.href.split('?')[0] + "?";
	var append = "";

	//Add frequency
	append += "&frequency=" + imageObj.frequency;
	
	//Get new URL
	var total = url + append;
	
	//Update in address bar without reloading page
	var pagename = window.location.href.split('/');
	pagename = pagename[pagename.length-1];
	pagename = pagename.split(".php")[0];
	var stateObj = { foo: "bar" };
	history.replaceState(stateObj, "", pagename+".php?"+append);
	
	//Update selected menu item based on this
//	document.getElementById('maptype').selectedIndex = searchByName(pagename,maptypes);

	return total;
}

function updateMobile(){
	if( navigator.userAgent.match(/Android/i)
	|| navigator.userAgent.match(/webOS/i)
	|| navigator.userAgent.match(/iPhone/i)
	|| navigator.userAgent.match(/iPod/i)
	//|| navigator.userAgent.match(/iPad/i)
	|| navigator.userAgent.match(/BlackBerry/i)
	|| navigator.userAgent.match(/Windows Phone/i)
	){
//		document.getElementById('page-middle').innerHTML = "Swipe Up/Down = Change plot type | Swipe Left/Right = Change valid time";
	}


/*	//Swipe for mobile devices only when focused on image
	var element = document.getElementsByName("map")[0];
	element.addEventListener("touchstart", touchStart, false);
	element.addEventListener("touchend", touchEnd, false);
	element.addEventListener("touchmove", touchMove, false);

}

function touchStart(e){
    xInit = e.touches[0].clientX;
    yInit = e.touches[0].clientY;
};

function touchMove(e){
	e.preventDefault();
    xPos = e.touches[0].clientX;
    yPos = e.touches[0].clientY;
};

function touchEnd() {
    if ( ! xPos || ! yPos ) {
        return;
    }
	
    //Get difference in x & y positions
    var xDiff = xInit - xPos;
    var yDiff = yInit - yPos;
	
	//Determine whether swipe was vertical or horizontal
    if ( Math.abs(xDiff) > Math.abs(yDiff) ){
        if( xDiff > 0 ){
            //Left swipe
			nextFrame();
        }
		else{
            //Right swipe
			prevFrame();
        }                       
    }
	else{
        if ( yDiff > 0 ){
            //Up swipe
			pressDown();
        }
		else{ 
            //Down swipe
			pressUp();
        }                                                                 
    }
	
    //reset values
    xInit = null;
    yInit = null;  
	xPos = null;
	yPos = null;
*/
};

-->
