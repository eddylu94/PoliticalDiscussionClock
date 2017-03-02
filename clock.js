﻿var dataLoaded = false;

getTime();
setInterval(getTime, 100);

$(document).ready(() =>{
	generateClickHandlers();
	getTime();
	setInterval(getTime, 100);
});

var clock = document.getElementById("clock");

var startTimeInSeconds;

$.get('getLatestTime.php', function(data) {
	startTimeInSeconds = parseInt(data);
	clock.style.display = "block";
	dataLoaded = true;
});

function getTime() {
	if (dataLoaded) {
		var dateObj = new Date();
		var timeInSeconds = Math.floor(dateObj.getTime() / 1000) - startTimeInSeconds;

		var fullSeconds = timeInSeconds;
		var fullMinutes = Math.floor(fullSeconds / 60);
		var fullHours = Math.floor(fullMinutes / 60);

		var seconds = fullSeconds % 60;
		var minutes = fullMinutes % 60;
		var hours = fullHours;

		clock.innerHTML = hours + ":" + makeNDigits(minutes.toString(), 2) + ":" + makeNDigits(seconds.toString(), 2); // + "." + makeNDigits(milliseconds.toString(), 3);
	}
}

function makeNDigits(value, n) {
	if (value.length < n) {
		for (var i = 0; i < n - value.length; i++) {
			value = "0" + value;
		}
	}
	return value;
}

var toggleSubmitFormPopup = function (isOpen) {
	if (isOpen) {
		$("#overlay").css("display", "flex");
		$("#submitFormPopup").css("display", "flex");
		var prompts = ["But is it a sandwich?", "Free food in March? Only after 7pm on the 5th floor.", "Make CRM great again!", "Santiago brought up Trump, didn't he?", "I can bench 130lbs."]
		$("#flavorText").text(prompts[Math.floor(Math.random() * prompts.length)]);
	}
	if (!isOpen) {
		$("#overlay").css("display", "none");
		$("#submitFormPopup").css("display", "none");
        $("#checkBoxButton_yes").html("&#9744; Yes");
        $("#checkBoxButton_no").html("&#9744; No");
        $("#submitFormSubmitButton").attr("disabled", true);
    }
}
                
var toggleCheckBoxes = function (isYes) {
    $("#submitFormSubmitButton").attr("disabled", false);
    $("#checkBoxButton_yes").html( isYes ? "&#9745; Yes" : "&#9744; Yes");
    $("#checkBoxButton_no").html( isYes ? "&#9744; No" : "&#9745; No");
}

var generateClickHandlers = () =>{
	$("#checkBoxButton_yes").click((e) =>{
		toggleCheckBoxes(true);
	});
	$("#checkBoxButton_no").click((e) =>{
		toggleCheckBoxes(false);
	});
	$("#resetButton").click((e) =>{
		toggleSubmitFormPopup(true);
	});
	$("#overlay").click((e) =>{
		toggleSubmitFormPopup(false);
	});
	$("#closeButton").click((e) =>{
		toggleSubmitFormPopup(false);
	});
}
