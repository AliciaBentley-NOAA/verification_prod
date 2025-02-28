<!--

/* ============================================================================================================= */
/* Preloading & displaying functions */
/* ============================================================================================================= */

//Populate the dropdown menu with items
function populateMenu(mode){
	if(mode == 'year'){
		var element = document.getElementById("year");
		for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}
		
		for(i=0; i<years.length; i++){
			var option = document.createElement("option");
			option.text = years[i].displayName;
			option.value = years[i].name;
			element.add(option);
		}
	}
        else if(mode == 'month'){
                var element = document.getElementById("month");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<months.length; i++){
                        var option = document.createElement("option");
                        option.text = months[i].displayName;
                        option.value = months[i].name;
                        element.add(option);
                }
        }
        else if(mode == 'day'){
                var element = document.getElementById("day");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<days.length; i++){
                        var option = document.createElement("option");
                        option.text = days[i].displayName;
                        option.value = days[i].name;
                        element.add(option);
                }
        }
        else if(mode == 'leftregion'){
                var element = document.getElementById("leftregion"); 
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}
                
                for(i=0; i<leftregions.length; i++){
                        var option = document.createElement("option");
                        option.text = leftregions[i].displayName;
                        option.value = leftregions[i].name;
                        element.add(option);
                }
        }
        else if(mode == 'leftmodel'){
                var element = document.getElementById("leftmodel");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<leftmodels.length; i++){
                        var option = document.createElement("option");
                        option.text = leftmodels[i].displayName;
                        option.value = leftmodels[i].name;
                        element.add(option);
                }
        }
        else if(mode == 'leftfhr'){
                var element = document.getElementById("leftfhr");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<leftfhrs.length; i++){
                        var option = document.createElement("option");
                        option.text = leftfhrs[i].displayName;
                        option.value = leftfhrs[i].name;
                        element.add(option);
                }
        }
        else if(mode == 'rightregion'){
                var element = document.getElementById("rightregion");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<rightregions.length; i++){
                        var option = document.createElement("option");
                        option.text = rightregions[i].displayName;
                        option.value = rightregions[i].name;
                        element.add(option);
                }
        }
        else if(mode == 'rightmodel'){
                var element = document.getElementById("rightmodel");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<rightmodels.length; i++){
                        var option = document.createElement("option");
                        option.text = rightmodels[i].displayName;
                        option.value = rightmodels[i].name;
                        element.add(option);
                }
        }
        else if(mode == 'rightfhr'){
                var element = document.getElementById("rightfhr");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<rightfhrs.length; i++){
                        var option = document.createElement("option");
                        option.text = rightfhrs[i].displayName;
                        option.value = rightfhrs[i].name;
                        element.add(option);
                }
        }
}

//Format URL to the requested month, year, run & frame
function getURL(fhr,model,region,day,month,year,frame){
	/*
	TOMER EDITS
	I moved this segment into a for loop iterating 5 times, since there are multiple references to "YYY" "MMM" "DDD" in the URL variable.
	A single call to "newurl.replace(...)" only does this once, on the first instance of the substring it finds in the larger string, so 
	this ensures that every reference to "YYY" etc. gets replaced.
	*/

	var newurl = url.replace("RRR",region);
        var newurl = newurl.replace("XXX",model);
        var newurl = newurl.replace("FFF",fhr);
	for(var i=0; i<5; i++){
                newurl = newurl.replace("YYY",year);
		newurl = newurl.replace("MMM",month);
                newurl = newurl.replace("DDD",day);
		newurl = newurl.replace("Z",frame);
	}

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
	
	//Year index
	var idx_var = searchByName(imageObj.year,years);
	
	/*
	TOMER EDITS
	We now have 2 image elements, and each will have a different source. I changed the code below so it calls the "getURL()" function twice;
	first for map_left, and second for map_right. The first call only changes to left_region, and second call to right_region. As you add
	the model and forecast hour to the code, you should add them to the "getURL" calls below and to the "getURL" function above.
	*/
	
	//Display image
	//document.getElementById('loading').style.display = "none";
	var url_left = getURL(imageObj.leftfhr,imageObj.leftmodel,imageObj.leftregion,imageObj.day,imageObj.month,imageObj.year,i);
	document.map_left.src = url_left;
	document.map_left.onerror = function(){this.src='../../../style/images/noimage.png';};
	var url_right = getURL(imageObj.rightfhr,imageObj.rightmodel,imageObj.rightregion,imageObj.day,imageObj.month,imageObj.year,i);
	document.map_right.src = url_right;
	document.map_right.onerror = function(){this.src='../../../style/images/noimage.png';};
	
	//Update dropdown menus
	//TOMER EDITS - The "valid" dropdown menu is no longer there, so this line isn't needed anymore.
	//document.getElementById("valid").selectedIndex = frames.indexOf(parseInt(imageObj.frame));//(parseInt(imageObj.frame) / incrementFrame);
	document.getElementById("year").selectedIndex = searchByName(imageObj.year,years);
	document.getElementById("month").selectedIndex = searchByName(imageObj.month,months);
        document.getElementById("day").selectedIndex = searchByName(imageObj.day,days);
        document.getElementById("leftregion").selectedIndex = searchByName(imageObj.leftregion,leftregions);
        document.getElementById("leftmodel").selectedIndex = searchByName(imageObj.leftmodel,leftmodels);
        document.getElementById("leftfhr").selectedIndex = searchByName(imageObj.leftfhr,leftfhrs);
        document.getElementById("rightregion").selectedIndex = searchByName(imageObj.rightregion,rightregions);
        document.getElementById("rightmodel").selectedIndex = searchByName(imageObj.rightmodel,rightmodels);
        document.getElementById("rightfhr").selectedIndex = searchByName(imageObj.rightfhr,rightfhrs);
	
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

//Preload images for the current run, year & projection
function preload(obj){
	return;
	
	/*
	TOMER EDITS
	Since we're no longer preloading images, I simply added a "return" statement at the beginning of the function
	so it doesn't execute any of the code below. You can then remove any references to "preload()" on your own time.
	*/
	
	//Year index
	var idx_var = searchByName(obj.year,years);
	
	//alert(obj.year);
	//alert(idx_var);
	
	//years[idx_var].images[i] = [];
        //years[idx_var].images[i] = [];
	//years[idx_var].images[i] = [];
	
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

		var urls = getURL(obj.rightfhr,obj.rightmodel,obj.rightregion,obj.leftfhr,obj.leftmodel,obj.leftregion,obj.day,obj.month,obj.year,i);
		
		years[idx_var].images[i] = new Image();
		years[idx_var].images[i].loaded = false;
		years[idx_var].images[i].id = i;
		years[idx_var].images[i].onload = function(){this.loaded = true; remove_loading(this.varid,this.id);};
		years[idx_var].images[i].onerror = function(){remove_loading(this.varid,this.id); this.src='../../../style/images/noimage.png';}; 
		years[idx_var].images[i].src = urls;
		years[idx_var].images[i].year = obj.year;
		years[idx_var].images[i].varid = idx_var;
    }
}

//Remove sign of loading image
function remove_loading(idx_var,idx_frame){
	check1a = parseInt(idx_var);
	check1b = searchByName(imageObj.year,years);
	check2a = frames.indexOf(parseInt(idx_frame));
	check2b = frames.indexOf(parseInt(imageObj.frame));
	
	//Remove if the image just loaded for the currently displayed image
	if((check1a == check1b) && (check2a == check2b)){
		document.getElementById('loading').style.display = "none";
		document.map.src = years[idx_var].images[imageObj.frame].src;
	}
}

/* ============================================================================================================= */
/* Dropdown menu functions */
/* ============================================================================================================= */

//Change the year from dropdown menu
function changeYear(id){
	imageObj.year = id;
	preload(imageObj);
	showImage();
	document.getElementById("year").blur();
}

// Adds a zero in front of the integer
function NumToString(i){
    if(i < 10){return "0"+String(i);}
    return String(i);
}

//Change the month from dropdown menu
function changeMonth(id){
        imageObj.month = id;
        preload(imageObj);
        showImage();
        document.getElementById("month").blur();

        //Get the selected month and year from the dropdown menu
        var selected_month = document.getElementById("month").value; //if it's November, this will be "11"
        var selected_year = document.getElementById("year").value;

	var arr_months = ["01","02","03","04","05","06","07","08","09","10","11","12"];
	if ((0 == selected_year % 4) && (0 != selected_year % 100) || (0 == selected_year % 400)) {
            var arr_days = [31,29,31,30,31,30,31,31,30,31,30,31];
        } else {
            var arr_days = [31,28,31,30,31,30,31,31,30,31,30,31];
        }
        //This gives the position in the "arr_months" array where "selected_month" is contained.
        //If selected_month == "11", then using a 0-based index notation, this will be position number 10.
        var idx = arr_months.indexOf(selected_month);

        //Get the number of days in the selected month
        var month_days = arr_days[idx]; //the 10th position of "arr_days" corresponding with November = 30 days

        //Get the day that's already selected (as an integer), before we clear the dropdown menu content
        var currently_selected_day = parseInt(document.getElementById("day").value);

        //Clear dropdown menu content now that we've saved the current day
        var element = document.getElementById("day");
        for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

        //Add an option for each day of the month
        for(i=1; i<=month_days; i++){
                var option = document.createElement("option");
                option.text = String(i); //formerly days[i].displayName;
                option.value = NumToString(i); //formerly days[i].name;
                element.add(option);
        }

        //Now that we populated the dropdown menu, let's try to select the day that was previously selected if it's
        //contained in this month.
        if(currently_selected_day <= month_days){
        //remember Javascript uses 0-based indexing, so we want to subtract the day by 1 to get its position in the array
        element.options[currently_selected_day - 1].selected = true;
        element.onchange();
        }
}

//Change the day from dropdown menu
function changeDay(id){
        imageObj.day = id;
        preload(imageObj);
        showImage();
        document.getElementById("day").blur();
}


//Change the Left Image "Region" from dropdown menu
function changeLeftregion(id){
        imageObj.leftregion = id;
        preload(imageObj);
        showImage();
        document.getElementById("leftregion").blur();

        //Get the selected model from the dropdown menu
        var selected_model = document.getElementById("leftmodel").value;
       
        //Clear dropdown menu content
        var element = document.getElementById("leftmodel");
        for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

        var selected_leftregion = document.getElementById("leftregion").value;
        if(selected_leftregion=="conus"){
             region_models = conus_models;
             region_models_name = conus_models_name;
        }
        else if(selected_leftregion=="alaska"){
             region_models = alaska_models;
             region_models_name = alaska_models_name;
        }
        else if(selected_leftregion=="hawaii"){
             region_models = hawaii_models;
             region_models_name = hawaii_models_name;
        }
        else if(selected_leftregion=="prico"){
             region_models = prico_models;
             region_models_name = prico_models_name;
        }

        leftmodels = [];
        for(i=0; i<region_models.length; i++){
        leftmodels.push({
                displayName: region_models_name[i],
                name: region_models[i],
                })
        }

        for(i=0; i<leftmodels.length; i++){
        var option = document.createElement("option");
        option.text = leftmodels[i].displayName;
        option.value = leftmodels[i].name;
        element.add(option);
        }

        // Create list of models for the dropdown menu
        var models_values= [];
        for(i=0; i<element.options.length; i++){
               models_values.push(element.options[i].value); //Take the value from this dropdown menu option and append it to "models_values"
        }

        // Check if selected_model is contained in models
        if(models_values.indexOf(selected_model) != -1){ //if this equals -1, this means selected_fhr isn't in fhrs_values
               var idx = models_values.indexOf(selected_model); //if this doesn't equal -1, this returns the index of selected_fhr in fhrs_values
               element.options[idx].selected = true;
               element.onchange();
        }
        else{
               element.options[0].selected = true;
               element.onchange();
        }
}


//Change the Left Image "Model" from dropdown menu
function changeLeftmodel(id){
        imageObj.leftmodel = id;
        preload(imageObj);
        showImage();
        document.getElementById("leftmodel").blur();

        //Get the selected fhr from the dropdown menu
        var selected_fhr = document.getElementById("leftfhr").value;

        //Clear dropdown menu content
        var element = document.getElementById("leftfhr");
        for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

        var selected_leftregion = document.getElementById("leftregion").value;
        var selected_leftmodel = document.getElementById("leftmodel").value;
        if( (selected_leftmodel=="qpe") || (selected_leftmodel=="nohrsc") || (selected_leftmodel=="firewx") ){
             model_fhrs = qpe_fhrs;
        }
	else if( (selected_leftmodel=="cmc_regional") || (selected_leftmodel=="hrrr") || (selected_leftmodel=="namnest") || (selected_leftmodel=="hrefmean") || (selected_leftmodel=="hrefpmmn") || (selected_leftmodel=="hreflpmm") || (selected_leftmodel=="hrefavrg") ){
             model_fhrs = cmc_regional_fhrs;
        }
	else if( (selected_leftmodel=="hireswarw") || (selected_leftmodel=="hireswarwmem2") ){
		if ( (selected_leftregion=="conus") || (selected_leftregion=="hawaii") ){
			model_fhrs = cmc_regional_fhrs;
		}
		else if ( (selected_leftregion=="alaska") || (selected_leftregion=="prico") ){
                        model_fhrs = hiresarw_off_fhrs;
		}
        }
	else if( (selected_leftmodel=="hireswfv3") ){
                if ( (selected_leftregion=="conus") || (selected_leftregion=="hawaii") ){
                        model_fhrs = cmc_regional_fhrs;
                }
                else if ( (selected_leftregion=="alaska") || (selected_leftregion=="prico") ){
                        model_fhrs = hiresfv3_off_fhrs;
                }
        }
        else if( (selected_leftmodel=="ecmwf") || (selected_leftmodel=="ukmet") || (selected_leftmodel=="dwd") || (selected_leftmodel=="jma") || (selected_leftmodel=="metfra") || (selected_leftmodel=="cmc") || (selected_leftmodel=="nam") || (selected_leftmodel=="ndas") || (selected_leftmodel=="ndassoil") || (selected_leftmodel=="sref") ){
             model_fhrs = ecmwf_fhrs;
        }
	else if( (selected_leftmodel=="rap") ){
             model_fhrs = rap_fhrs;
        }
        else if( (selected_leftmodel=="gfs") || (selected_leftmodel=="gefs") || (selected_leftmodel=="cmce") || (selected_leftmodel=="ecme") || (selected_leftmodel=="naefs") ){
             model_fhrs = gfs_fhrs;
        }

        leftfhrs = [];
        for(i=0; i<model_fhrs.length; i++){
        if( (selected_leftmodel=="qpe") || (selected_leftmodel=="nohrsc")){
        leftfhrs.push({
                displayName: "Analysis",
                name: model_fhrs[i],
                })
        }
        else{
        leftfhrs.push({
                displayName: "F"+model_fhrs[i],
                name: model_fhrs[i],
                })
        }
        }

        for(i=0; i<leftfhrs.length; i++){
        var option = document.createElement("option");
        option.text = leftfhrs[i].displayName;           
        option.value = leftfhrs[i].name;
        element.add(option);
        }

        //Create a list of fhrs from the dropdown menu
        var fhrs_values= [];
        for(i=0; i<element.options.length; i++){
               fhrs_values.push(element.options[i].value); //Take the value from this dropdown menu option and append it to "fhrs_values"
        }

        //Check if selected_fhr is contained in fhrs
        if(fhrs_values.indexOf(selected_fhr) != -1){ //if this equals -1, this means selected_fhr isn't in fhrs_values
               var idx = fhrs_values.indexOf(selected_fhr); //if this doesn't equal -1, this returns the index of selected_fhr in fhrs_values
               element.options[idx].selected = true;
               element.onchange();
        }
        else{
               element.options[0].selected = true;
               element.onchange();
        }
}

//Change the Left Image "Fhr" from dropdown menu
function changeLeftfhr(id){
        imageObj.leftfhr = id;
        preload(imageObj);
        showImage();
        document.getElementById("leftfhr").blur();
}








//Change the Right Image "Region" from dropdown menu
function changeRightregion(id){
        imageObj.rightregion = id;
        preload(imageObj);
        showImage();
        document.getElementById("rightregion").blur();

        //Get the selected model from the dropdown menu
        var selected_model = document.getElementById("rightmodel").value;

        //Clear dropdown menu content
        var element = document.getElementById("rightmodel");
        for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

        var selected_rightregion = document.getElementById("rightregion").value;
        if(selected_rightregion=="conus"){
             region_models = conus_models;
             region_models_name = conus_models_name;
        }
        else if(selected_rightregion=="alaska"){
             region_models = alaska_models;
             region_models_name = alaska_models_name;
        }
        else if(selected_rightregion=="hawaii"){
             region_models = hawaii_models;
             region_models_name = hawaii_models_name;
        }
        else if(selected_rightregion=="prico"){
             region_models = prico_models;
             region_models_name = prico_models_name;
        }

        rightmodels = [];
        for(i=0; i<region_models.length; i++){
        rightmodels.push({
                displayName: region_models_name[i],
                name: region_models[i],
                })
        }

        for(i=0; i<rightmodels.length; i++){
        var option = document.createElement("option");
        option.text = rightmodels[i].displayName;
        option.value = rightmodels[i].name;
        element.add(option);
        }

        // Create list of models for the dropdown menu
        var models_values= [];
        for(i=0; i<element.options.length; i++){
               models_values.push(element.options[i].value); //Take the value from this dropdown menu option and append it to "models_values"
        }

        // Check if selected model is contained in models
        if(models_values.indexOf(selected_model) != -1){ //if this equals -1, this means selected_fhr isn't in fhrs_values
               var idx = models_values.indexOf(selected_model); //if this doesn't equal -1, this returns the index of selected_fhr in fhrs_values
               element.options[idx].selected = true;
               element.onchange();
        }
        else{
               element.options[0].selected = true;
               element.onchange();
        }
}





//Change the Right Image "Model" from dropdown menu
function changeRightmodel(id){
        imageObj.rightmodel = id;
        preload(imageObj);
        showImage();
        document.getElementById("rightmodel").blur();

        //Get the selected fhr from the dropdown menu 
        var selected_fhr = document.getElementById("rightfhr").value;

        //Clear dropdown menu content
        var element = document.getElementById("rightfhr");
        for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

        var selected_rightregion = document.getElementById("rightregion").value;
        var selected_rightmodel = document.getElementById("rightmodel").value;
        if( (selected_rightmodel=="qpe") || (selected_rightmodel=="nohrsc") || (selected_rightmodel=="firewx") ){
             model_fhrs = qpe_fhrs;
        }
	else if( (selected_rightmodel=="cmc_regional") || (selected_rightmodel=="hrrr") || (selected_rightmodel=="namnest") || (selected_rightmodel=="hrefmean") || (selected_rightmodel=="hrefpmmn") || (selected_rightmodel=="hreflpmm") || (selected_rightmodel=="hrefavrg") ){
             model_fhrs = cmc_regional_fhrs;
        }
	else if( (selected_rightmodel=="hireswarw") || (selected_rightmodel=="hireswarwmem2") ){
                if ( (selected_rightregion=="conus") || (selected_rightregion=="hawaii") ){
                        model_fhrs = cmc_regional_fhrs;
                }
                else if ( (selected_rightregion=="alaska") || (selected_rightregion=="prico") ){
                        model_fhrs = hiresarw_off_fhrs;
                }
        }
	else if( (selected_rightmodel=="hireswfv3") ){
                if ( (selected_rightregion=="conus") || (selected_rightregion=="hawaii") ){
                        model_fhrs = cmc_regional_fhrs;
                }
                else if ( (selected_rightregion=="alaska") || (selected_rightregion=="prico") ){
                        model_fhrs = hiresfv3_off_fhrs;
                }
        }
        else if( (selected_rightmodel=="ecmwf") || (selected_rightmodel=="ukmet") || (selected_rightmodel=="dwd") || (selected_rightmodel=="jma") || (selected_rightmodel=="metfra") || (selected_rightmodel=="cmc") || (selected_rightmodel=="nam") || (selected_rightmodel=="ndas") || (selected_rightmodel=="ndassoil") || (selected_rightmodel=="sref") ){
             model_fhrs = ecmwf_fhrs;
        }
	else if( (selected_rightmodel=="rap") ){
	     model_fhrs = rap_fhrs;
	}
        else if( (selected_rightmodel=="gfs") || (selected_rightmodel=="gefs") || (selected_rightmodel=="ecme") || (selected_rightmodel=="cmce") || (selected_rightmodel=="naefs") ){
             model_fhrs = gfs_fhrs;
        }

        rightfhrs = [];
        for(i=0; i<model_fhrs.length; i++){
        if( (selected_rightmodel=="qpe") || (selected_rightmodel=="nohrsc") ){
        rightfhrs.push({
                displayName: "Analysis",
                name: model_fhrs[i],
                })
        }
        else{
        rightfhrs.push({
                displayName: "F"+model_fhrs[i],
                name: model_fhrs[i],
                })
        }
        }

        for(i=0; i<rightfhrs.length; i++){
        var option = document.createElement("option");
               option.text = rightfhrs[i].displayName;
               option.value = rightfhrs[i].name;
               element.add(option);
        }

        //Create a list of fhrs from the dropdown menu
        var fhrs_values= [];
        for(i=0; i<element.options.length; i++){
                 fhrs_values.push(element.options[i].value); //Take the value from this dropdown menu option and append it to "fhrs_values"
        }

        //Check if selected_fhr is contained in fhrs
        if(fhrs_values.indexOf(selected_fhr) != -1){ //if this equals -1, this means selected_fhr isn't in fhrs_values
                 var idx = fhrs_values.indexOf(selected_fhr); //if this doesn't equal -1, this returns the index of selected_fhr in fhrs_values
                 element.options[idx].selected = true;
                 element.onchange();
        }
        else{
                 element.options[0].selected = true;
                 element.onchange();
        }
}

//Change the Right Image "Fhr" from dropdown menu
function changeRightfhr(id){
        imageObj.rightfhr = id;
        preload(imageObj);
        showImage();
        document.getElementById("rightfhr").blur();
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
	var curVar = searchByName(imageObj.year,years);
	if(curVar < years.length-1){curVar += 1; changeYear(years[curVar].name);}
}

function pressUp(){
	var curVar = searchByName(imageObj.year,years);
	if(curVar > 0){curVar = curVar - 1; changeYear(years[curVar].name);}
}

*/

/* ============================================================================================================= */
/* Additional functions */
/* ============================================================================================================= */

//Update the URL in the address bar by the current month and year
function generate_url(){
	
	var url = window.location.href.split('?')[0] + "?";
	var append = "";

        //Add month
        append += "day=" + imageObj.day;
	
	//Add month
	append += "month=" + imageObj.month;
	
	//Add year
	append += "&year=" + imageObj.year;
	
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
//		document.getElementById('page-middle').innerHTML = "Swipe Up/Down = Change year | Swipe Left/Right = Change valid time";
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
