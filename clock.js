﻿var recordTime = document.getElementById("recordTime");

$.get('getCurrentRecord.php', function (data) {
	var timeInSeconds = parseInt(data);

	var fullSeconds = timeInSeconds;
	var fullMinutes = Math.floor(fullSeconds / 60);
	var fullHours = Math.floor(fullMinutes / 60);

	var seconds = fullSeconds % 60;
	var minutes = fullMinutes % 60;
	var hours = fullHours;

	recordTime.innerHTML = hours + ":" + makeNDigits(minutes.toString(), 2) + ":" + makeNDigits(seconds.toString(), 2);
	recordTime.style.display = "inline-block";
});

var isClockDataLoaded = false;

getTime();
setInterval(getTime, 100);

$(document).ready(() => {
	generateClickHandlers();
	getTime();
	setInterval(getTime, 100);
});

var clock = document.getElementById("clock");

var startTimeInSeconds;

$.get('getLatestTime.php', function(data) {
	startTimeInSeconds = parseInt(data);
	isClockDataLoaded = true;
	clock.style.display = "block";
});

function getTime() {
	if (isClockDataLoaded) {
		var dateObj = new Date();
		var timeInSeconds = Math.floor(dateObj.getTime() / 1000) - startTimeInSeconds;

		var fullSeconds = timeInSeconds;
		var fullMinutes = Math.floor(fullSeconds / 60);
		var fullHours = Math.floor(fullMinutes / 60);

		var seconds = fullSeconds % 60;
		var minutes = fullMinutes % 60;
		var hours = fullHours;

		clock.innerHTML = hours + ":" + makeNDigits(minutes.toString(), 2) + ":" + makeNDigits(seconds.toString(), 2);
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
		var prompts = ["But is it a sandwich?", "Free food in March? Only after 7pm on the 5th floor.", "Make CRM great again!", "Santiago brought up Trump, didn't he?", "I can bench 130lbs.", "In Miami...", "Anyone want to go to the Grand Coulee Dam?", "Is that near Lake Chelan?", "UCI has been code complete since 3/10", "Is that a euphemism?", "It's too bright to sit outside", "He means he went around the whole room", "When I am happy I won't have time to make these anymore", "Wreaths are offensive", "On a school night?!?", "Hululululu", "Women, not women"]
		var prompt = prompts[Math.floor(Math.random() * prompts.length)];
		$("#flavorText").text(prompt);
		$("#flavourQuestion").val(prompt);
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
	$("#flavourResponse").val(isYes ? "Yes" : "No");
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
