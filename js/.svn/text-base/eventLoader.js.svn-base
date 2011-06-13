/* Street View Helper Functions */
function spiral() {
  currentYaw += 2;
  panorama.panTo({yaw:currentYaw, pitch:currentPitch});
}
 
function stopAndZoom() {
  clearInterval(timer);
  zoomingIn = true;
  timer = window.setInterval(zoom, 500);
}
 
function zoom() {
  if (zoomingIn) {
    currentZoom++;
  } else {
    currentZoom--;
  }
 
  panorama.panTo({yaw:currentYaw, pitch:currentPitch, zoom:currentZoom});
  if (currentZoom == 2) {
    zoomingIn = false;
  }
  if (currentZoom == 0) {
    clearInterval(timer);
    timer = window.setInterval(spiral, 200);
  }
}
/* End Street View Helper Functions */

function codeAddress(addy) {
    var address = addy;
    geocoder.getLatLng(
    address,
    function(point) {
      if (!point) {
        //Dont Draw Map
		nomap = true;
      } else {
	latLong = point;
        map.setCenter(point, 17);
		map.setUIToDefault();
        var marker = new GMarker(point);
        map.addOverlay(marker);
        marker.openInfoWindowHtml(address);
      }
    }
  );
    
  }

function codeforPanorama(addy) {
    var address = addy;
	geocoder.getLatLng(
    address,
    function(point) {
      if (!point) {
        alert(address + " not found");
      } else {
		  latLong = point;
        panorama.setLocationAndPOV(point, {yaw: currentYaw, pitch: currentPitch, zoom: currentZoom});
		 timer = window.setInterval(spiral, 100);
      }
    }
  );
    
  }

/**
 * Uses Google data JS client library to retrieve a calendar feed from the specified
 * URL.  The feed is controlled by several query parameters and a callback 
 * function is called to process the feed results.
 *
 * @param {string} calendarUrl is the URL for a public calendar feed
 */  
function loadEvent(eventUrl) {
  var service = new 
  google.gdata.calendar.CalendarService('drexel-calendar-1.0');
  service.getCalendarEventEntry(eventUrl, eventInfo, handleGDError);
}



/**
 * Callback function for the Google data JS client library to call with a feed 
 * of events retrieved.
 *
 * See 
 *
 * @param {json} feedRoot is the root of the feed, containing all entries 
 */ 
function eventInfo(entryRoot) {
  var entry = entryRoot.entry;
  var calendarTitle = document.getElementById('calendarTitle');
  var eventTitle = document.getElementById('eventTitle');
  var eventDate = document.getElementById('eventDate');
  var eventDescription = document.getElementById('eventDescription');
  var eventButton = document.getElementById('eventSubscribe');
  var descriptionDiv = document.createElement('div');
  
  /* set the calendarTitle div with the name of the calendar */
  var Title = entry.title.$t;
  if(calTitle == '' || !calTitle){
  var Author = entry['gd$who'][0].valueString;
  //Calendar Name from CalendarName >> HeaderName//
  var calcat = Author.indexOf(">>");
  var calName = Author.substr(calcat + 3);
  }else
	 {
	  var calName = calTitle;
	 }
  var email = entry['gd$who'][0].email;
  var subscribelink = 'http://www.google.com/calendar/feeds/' + email + '/public/full';
  var headID = document.getElementsByTagName("head")[0];       
  var atomNode = document.createElement('link');
  atomNode.type = 'application/atom+xml';
  atomNode.rel = 'alternate';
  atomNode.href = subscribelink;
  atomNode.title = calName;
  headID.appendChild(atomNode);
    
  var locations = entry.getLocations();
  var times = entry.getTimes();
  var desc = entry.getContent().$t;

  if(desc == "") {
	  desc = "For more information about " + Title  + " email cab@drexel.edu.";
  }

  var date = makeDate(times);
  if (locations.length < 0)
	{
		 var curlocation = locations[0].getValueString();
		 var locationtext = curlocation;
		 if (curlocation == '' || curlocation == ' ')
		 {
			 //No Map. Suppress Map.
			//var maps = document.getElementById(mapdiv);
			//maps.style.height = "0px";
			//maps.style.width = "0px";
		 }else {
		 var caldiv = document.getElementById(calendardiv)
		  var topmapdiv = document.createElement('div');
		  topmapdiv.setAttribute('id', mapdiv);
		  topmapdiv.style.position = 'relative';
		  topmapdiv.style.height = mapheight;
		  topmapdiv.style.width = mapwidth;
		  topmapdiv.setAttribute('style', 'position:relative; width: ' + mapwidth +'px; height: ' + mapheight + 'px;border:none;');
		  caldiv.appendChild(topmapdiv);

		  map = new GMap2(document.getElementById(mapdiv));
		  
		  /* Create the bottom Map */
		  /*var streetmapdiv = document.createElement('div');
		  streetmapdiv.setAttribute('id', panmapdiv);
		  streetmapdiv.style.position = 'relative';
		  streetmapdiv.style.height = 200;
		  streetmapdiv.style.width = 520;
		  streetmapdiv.setAttribute('style', 'position:relative;width:520px; height:200px;border:1px solid');
		  caldiv.appendChild(streetmapdiv);
		  panorama = new GStreetviewPanorama(document.getElementById("pano")); */
		  
		  geocoder = new GClientGeocoder();
		  map.setMapType(G_NORMAL_MAP);
		 codeAddress(locationtext);
		 //codeforPanorama(locationtext);
		 }
		
	}else
	  {
		//No Map. Suppress Map.
		//var maps = document.getElementById(mapdiv);
		//maps.style.height = "0px";
		//maps.style.width = "0px";
	  }
	calendarTitle.appendChild(document.createTextNode(calName));
   eventTitle.appendChild(document.createTextNode(Title));
   eventDate.appendChild(document.createTextNode(date));
   
   descriptionDiv.innerHTML = desc;
   eventDescription.appendChild(descriptionDiv);
   //Create Input button form
   var form = document.createElement('form');
   form.setAttribute('action', subscribelink);
   var button = document.createElement('input');
   button.setAttribute('type','submit');
   button.setAttribute('value',calendarButtonText);
   form.appendChild(button);
   eventButton.appendChild(form);
}

google.setOnLoadCallback(init);
//-->