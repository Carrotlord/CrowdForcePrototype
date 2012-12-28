// +++++ Container: Global Vars +++++
var clockTimer;
// ----- End Container: Global Vars -----

String.prototype.contains = function(it) { return this.indexOf(it) != -1; };

// +++++ Container: Clock gadget functions +++++
function leadingZero(integer) {
    if (integer < 10) {
        return "0"+integer;
    } else {
        return ""+integer;
    }
}

function changeImage() {
    var url = document.getElementById("inputimage").value;
    document.getElementById("desktop").innerHTML = "<img src=\"" + url + "\" alt=\"Desktop Image\" title=\"My Image\" />";
}

function getFullTime() {
    var time = new Date();
    var suffix = "";
    var currentHour = time.getHours();
    if (currentHour == 12) {
        suffix = "pm";
    } else if (currentHour > 12) {
        currentHour -= 12;
        suffix = "pm";
    } else if (currentHour == 0) {
        currentHour = 12;
        suffix = "am";
    } else {
        suffix = "am";
    }
    var currentMinute = time.getMinutes();
    var currentSecond = time.getSeconds();
    var fullTime = currentHour + ":" + leadingZero(currentMinute) + " " + suffix;
    return fullTime;
}

function getFullDate() {
    var time = new Date();
    var weekDays = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday",
                    "Saturday"];
    var months = ["January","February","March","April","May","June","July","August",
                  "September","October","November","December"];
    var currentMonth = months[time.getMonth()];
    var currentDayOfWeek = weekDays[time.getDay()];
    var currentDay = time.getDate();
    var currentYear = time.getFullYear();
    var fullDate = currentDayOfWeek + " - " + currentMonth + " " + currentDay + ", " +
                   currentYear;
    return fullDate;
}

function showTime() {
    setElementContent("clocktime",getFullTime());
    clockTimer = window.setTimeout(showTime ,500);
}
// ----- End Container: Clock gadget functions -----

// +++++ Container: HTML document management functions +++++
function setElementContent(id,newContent) {
    try {
        document.getElementById(id).innerHTML = newContent;
    } catch (error) {
        alert("Error: "+error.description+"\n\n"+
              "Trying to set the contents of HTML element with ID\n"+
              id+" but that ID doesn't exist.");
    }
}

function getElementContent(id) {
    return document.getElementById(id).innerHTML;
}
// ----- End Container: HTML document management functions -----

// +++++ Container: Search management functions +++++
function getSearchBoxName() {
    return document.getElementById("searchbox").name;
}

function getSearchFormName() {
    return document.getElementById("searchform").name;
}

function getQuery() {
    return document.forms[getSearchFormName()][getSearchBoxName()].value;
}

function setSearchFormAction(actionString) {
    document.getElementById("searchform").action = actionString;
}

function setSearchBoxName(nameString) {
    document.getElementById("searchbox").name = nameString;
}

function setQuery(query) {
    document.forms[getSearchFormName()][getSearchBoxName()].value = query;
}

function imFeelingLucky() {
    document.getElementById("imfeelinglucky").name = "btnI";
    document.forms[getSearchFormName()]["btnI"].value = "Search";
}

// +++++ Container: Startup function +++++
function pageStartup() {
    showTime();
}

/** Returns true iff txt is a valid display name, email, or password. */
function checkIfValid(txt, mode) {
    if (mode === "DNAME") {
        var notAllowed = "~`!@#$%,?\"'";
        for (var i = 0; i < notAllowed.length; i++) {
            var c = notAllowed.charAt(i);
            if (txt.contains(c)) {
                return false;
            }
        }
    } else if (mode === "PASS") {
        var notAllowed = "0000001";
        for (var i = 0; i < notAllowed.length; i++) {
            var c = notAllowed.charAt(i);
            if (txt.contains(c)) {
                return false;
            }
        }
    } else if (mode === "EMAIL") {
        if (!txt.contains("@")) {
            return false;
        }
        var notAllowed = undefined;
        for (var i = 0; i < notAllowed.length; i++) {
            var c = notAllowed.charAt(i);
            if (txt.contains(c)) {
                return false;
            }
        }
    } else {
        alert("ERROR: BAD TYPE - " + mode);
        return false;
    }
    return true;
}
