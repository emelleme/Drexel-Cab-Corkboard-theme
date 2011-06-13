/* Loads the Google data JavaScript client library */
google.load("gdata", "1");
/* Parses eid from Url variables */
var vars = getUrlVars();
var calTitle = unescape(vars['t']);
//QueryString_Parse();

var d_names = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

var m_names = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

var calendardiv = "calendar";
var mapdiv = "map_canvas";
var panmapdiv = "pano";
var calendarpage = "/wordpress/wp-content/themes/cork/calendar.html";
var sidebarmaxresults = 4;
var maxresults = 15;
var mapheight = "400";
var mapwidth = "520";
var panmapheight = "200";
var panmapwidth = "520";
var calendarButtonText = "Add to Calendar";

sidebarmaxresults--;


var map;
var panorama;
var currentYaw = 180;
var currentPitch = 0;
var timer;
var currentZoom = 0;
var zoomingIn = true;
var latLong = null;
var nomap;
/* Initialization function */
function init() {	
  // init the Google data JS client library with an error handler
  google.gdata.client.init(handleGDError);
  
  /* Check for eid value, and load event information */
  if (vars['eid'])
  {
	  loadEvent(vars['eid']);
	  //if(
  }else
	{
	 var eventDescription = document.getElementById('eventDescription');
	 if(eventDescription){
		 eventDescription.style.position = "relative";
		 eventDescription.style.top = "0px";
		 eventDescription.style.height = "0px";
		 eventDescription.setAttribute("style", "position:relative;top: 0px; height: 0px");
	 }
	 loadaCalendar('u9aiauedp0sneee5u5p1splvl4@group.calendar.google.com');
	}
//loadCalendar("http://www.google.com/calendar/feeds/7m6bsov6i8ogdhi1t5vbvlg9k4%40group.calendar.google.com/public/full/skro9hdhp6dgsvqqbcskjr8cgs");
}


function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');

    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }

    return vars;
}

function loadaCalendar(calLink) {
  loadCalendarByAddress(calLink);
}

/**
 * Adds a leading zero to a single-digit number.  Used for displaying dates.
 */
function padNumber(num) {
  if (num <= 9) {
    return "0" + num;
  }
  return num;
}

/**
 * Determines the full calendarUrl based upon the calendarAddress
 * argument and calls loadCalendar with the calendarUrl value.
 *
 * @param {string} calendarAddress is the email-style address for the calendar
 */ 
function loadCalendarByAddress(calendarAddress) {
  var calendarUrl = 'http://www.google.com/calendar/feeds/' +
                    calendarAddress + 
                    '/public/full';
  loadCalendar(calendarUrl);
}

/**
 * Uses Google data JS client library to retrieve a calendar feed from the specified
 * URL.  The feed is controlled by several query parameters and a callback 
 * function is called to process the feed results.
 *
 * @param {string} calendarUrl is the URL for a public calendar feed
 */  
function loadCalendar(calendarUrl) {
  var service = new 
      google.gdata.calendar.CalendarService('drexel-calendar-1.0');
  var query = new google.gdata.calendar.CalendarEventQuery(calendarUrl);
  query.setOrderBy('starttime');
  query.setSortOrder('ascending');
  query.setFutureEvents(true);
  query.setSingleEvents(true);
  query.setMaxResults(maxresults);
  service.getEventsFeed(query, listEvents, handleGDError);
}

function makeDate(timeObject) {
	var startDateTime = null;
    var startJSDate = null;
	var nostarttime;
	var noendtime;
    var times = timeObject;
    if (times.length > 0) {
		//Time
      startDateTime = times[0].getStartTime();
	  endDateTime = times[0].getEndTime();
	  //Full Date
      startJSDate = startDateTime.getDate();
	  endJSDate = endDateTime.getDate();

		//Date
	  var curr_date = startJSDate.getDate;
	  var end_date = endJSDate.getDate;
	  var sup = "";
	if (curr_date == 1 || curr_date == 21 || curr_date ==31)
	   {
	   sup = "st";
	   }
	else if (curr_date == 2 || curr_date == 22)
	   {
	   sup = "nd";
	   }
	else if (curr_date == 3 || curr_date == 23)
	   {
	   sup = "rd";
	   }
	else
	   {
	   sup = "th";
	   }

	var sup2 = "";
	if (end_date == 1 || end_date == 21 || end_date ==31)
	   {
	   sup2 = "st";
	   }
	else if (end_date == 2 || end_date == 22)
	   {
	   sup2 = "nd";
	   }
	else if (end_date == 3 || end_date == 23)
	   {
	   sup2 = "rd";
	   }
	else
	   {
	   sup2 = "th";
	   }
    
	//Month
	var curmonth = startJSDate.getMonth();
	var endmonth = endJSDate.getMonth();

	//Day
	var curday = startJSDate.getDay();
	var endday = endJSDate.getDay();
    //Reads Tuesday, September 4th, 2009
	//var dateString = d_names[curday] + ", " + m_names[curmonth] + " " + startJSDate.getDate() + ', ' + startJSDate.getFullYear();
	
    
    if (!startDateTime.isDateOnly()) {
		//Parse time
		curhour = startJSDate.getHours();
		if( curhour < 12)
		{
			a_p = "AM";
		}else
		{
			a_p = "PM";
		}
		if(curhour > 12)
		{
			curhour = curhour - 12;
		}
		if(startJSDate.getHours() == 0)
		{
			curhour = 12;
		}

	
		curmin = startJSDate.getMinutes();
		curmin = curmin + "";
		if (curmin.length==1)
		{
			curmin = "0" + curmin;
		}
	}else
		{ 
		nostarttime = true;
		}
	if (!endDateTime.isDateOnly()) {
		//Parse time
		endhour = endJSDate.getHours();
		if( endhour < 12)
		{
			a_pend = "AM";
		}else
		{
			a_pend = "PM";
		}
		if(endhour > 12)
		{
			endhour = endhour - 12;
		}
		if(endJSDate.getHours() == 0)
		{
			endhour = 12;
		}
	
		
		endmin = endJSDate.getMinutes();
		endmin = endmin + "";
		if (endmin.length==1)
		{
			endmin = "0" + endmin;
		}
		var endDate = endJSDate.getDate();
	}else
	{
		noendtime = true;
		var endDate = endJSDate.getDate() - 1;
	}

	var dateString = m_names[curmonth] + " " + startJSDate.getDate() + ', ' + startJSDate.getFullYear();
	var enddateString = m_names[endmonth] + " " + endDate + ', ' + endJSDate.getFullYear();

	var datediff = endJSDate.getDate() - startJSDate.getDate();
	if(dateString == enddateString || datediff < 1) {
		if(startDateTime == endDateTime){
			dateString += " " + curhour + ":" + curmin + " " + a_p;
		}
		else {
			if(!nostarttime){
			dateString += " " + curhour + ":" + curmin + " " + a_p;
			}
			if(!noendtime){
				if(endhour != curhour && endmin != curmin && a_p != a_pend){
			dateString += " - " + endhour + ":" + endmin + " " + a_pend;
				}
			}
		}
	}else {
		if(!nostarttime){
		dateString += " " + curhour + ":" + curmin + " " + a_p;
		}
		if(!noendtime){
		dateString += " - " + enddateString + " " + endhour + ":" + endmin + " " + a_pend;
		}else {
			dateString += " - " + enddateString;
		}
	}
	}

	return dateString;
}

/**
 * Callback function for the Google data JS client library to call when an error
 * occurs during the retrieval of the feed.  Details available depend partly
 * on the web browser, but this shows a few basic examples. In the case of
 * a privileged environment using ClientLogin authentication, there may also
 * be an e.type attribute in some cases.
 *
 * @param {Error} e is an instance of an Error 
 */
function handleGDError(e) {
  //document.getElementById('jsSourceFinal').setAttribute('style', 'display:none');
  if (e instanceof Error) {
    /* alert with the error line number, file and message */
    alert('Error at line ' + e.lineNumber +
          ' in ' + e.fileName + '\n' +
          'Message: ' + e.message);
    /* if available, output HTTP error code and status text */
    if (e.cause) {
      var status = e.cause.status;
      var statusText = e.cause.statusText;
      alert('Root cause: HTTP error ' + status + ' with status text of: ' + 
            statusText);
    }
  } else {
    alert(e.toString());
  }
}

/**
 * Callback function for the Google data JS client library to call with a feed 
 * of events retrieved.
 *
 * Creates an unordered list of events in a human-readable form.  This list of
 * events is added into a div called 'events'.  The title for the calendar is
 * placed in a div called 'calendarTitle'
 *
 * @param {json} feedRoot is the root of the feed, containing all entries 
 */ 
function listEvents(feedRoot) {
  var entries = feedRoot.feed.getEntries();
  var caldiv = document.getElementById(calendardiv);
  var entryLinkHref = null;
  //if (eventDiv.childNodes.length > 0) {
  //  eventDiv.removeChild(eventDiv.childNodes[0]);
  //}	  

  /* create a new unordered list */
  var ul = document.createElement('ul');
  var ul2 = document.createElement('ul');


  /* set the calendarTitle div with the name of the calendar */
  var Title = feedRoot.feed.title.$t;

	//Extract the Header Title in the format of Calendar Name >> Header Name
  var calcat = Title.indexOf(">>");

  //Calendar Name from CalendarName >> HeaderName//
  var calName = Title.substr(0, calcat - 1);

  //Header Name from CalendarName >> HeaderName
  var calTitle = Title.substr(calcat + 3);
  calTitle = calTitle.replace(" ","");
  //var head = document.createElement('h3');
  //head.appendChild(document.createTextNode(calTitle));

	var t = Title.substr(calcat + 3);

  //This will be the id for the new div//
  var currentDiv = calTitle;
  //Create the new Div
  //var thisDiv = document.createElement('div');
  //thisDiv.setAttribute('id',currentDiv);
  //Append it to the Calendar Div
  //caldiv.appendChild(thisDiv);

  var eventDiv = document.getElementById(currentDiv);
  var eventDivmain = document.getElementById("EventsMain");
  if (eventDiv.childNodes.length > 0) {
   eventDiv.removeChild(eventDiv.childNodes[0]);
  }
if(eventDivmain != null){
if (eventDivmain.childNodes.length > 0) {
   eventDivmain.removeChild(eventDivmain.childNodes[0]);
  }
}
  //Append Header to the div
  //eventDiv.appendChild(head);

  /* loop through each event in the feed */
  var len = entries.length;

  for (var i = 0; i < len; i++) { 
    var entry = entries[i];
    var title = entry.getTitle().getText();
    var startDateTime = null;
    var startJSDate = null;
    var times = entry.getTimes();
	var dateString = makeDate(times);
	 var entryLinkHref = null;
    if (entry.id != null) {
      entryLinkHref = entry.id.$t;
    }

	var li = document.createElement('li');
	var li2 = document.createElement('li');
    /* if we have a link to the event, create an 'a' element */
    if (entryLinkHref != null) {    
    
	  entryLink = document.createElement('a');
      entryLink.setAttribute('href', calendarpage + "?eid=" + entryLinkHref+"&t="+t);
	  entryLink.setAttribute('class', 'newsTitle');
	  //entryLink.setAttribute('target', '_blank');
      entryLink.appendChild(document.createTextNode(title));

	
      li.appendChild(entryLink);
	  li.appendChild(document.createElement('br'));
	  datespan = document.createElement('span');
	  datespan.setAttribute('class', 'newsDate');
	  datespan.appendChild(document.createTextNode(dateString));
	  if(i <= sidebarmaxresults){
	  li.appendChild(datespan);
	  }
if(eventDivmain != null){
entryLink2 = document.createElement('a');
      entryLink2.setAttribute('href', calendarpage + "?eid=" + entryLinkHref+"&t="+t);
	  entryLink2.setAttribute('class', 'newsTitle');
	  //entryLink.setAttribute('target', '_blank');
      entryLink2.appendChild(document.createTextNode(title));
	  li2.appendChild(entryLink2);
	  li2.appendChild(document.createElement('br'));
	  datespan2 = document.createElement('span');
	  datespan2.setAttribute('class', 'newsDate');
	  datespan2.appendChild(document.createTextNode(dateString));
	  li2.appendChild(datespan2);
}
    } else {
    if(i <= sidebarmaxresults){
      li.appendChild(document.createTextNode(title + ' - ' + dateString));
      }
    }
	/* Append link item to unordered list */
if(eventDivmain != null){	
ul2.appendChild(li2);
}
if(i <= sidebarmaxresults){
	ul.appendChild(li);
	}
  }//end for loop

  if (i == 0)
  {
	  eventDiv.appendChild(document.createTextNode('There are currently no events scheduled on this calendar.'));
	eventDivmain.appendChild(document.createTextNode('There are currently no events scheduled on this calendar.'));
  }else {

  /* Append unordered list to eventDiv */
  
  eventDiv.appendChild(ul);
if(eventDivmain != null){
  eventDivmain.appendChild(ul2);
}
$("#Events a, #EventsMain a").colorbox({width:"600", height:"500", iframe:true});
  }
}
//-->
