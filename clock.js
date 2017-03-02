$(document).ready(() =>{
	generateClickHandlers();
	getTime();
	setInterval(getTime, 100);
});


function getTime() {

	startTimeInMilliseconds = 1488067200000;

	var dateObj = new Date();
	var timeInMilliseconds = dateObj.getTime() - startTimeInMilliseconds;

	var fullMilliseconds = timeInMilliseconds;
	var fullSeconds = Math.floor(fullMilliseconds / 1000);
	var fullMinutes = Math.floor(fullSeconds / 60);
	var fullHours = Math.floor(fullMinutes / 60);

	var milliseconds = fullMilliseconds % 1000;
	var seconds = fullSeconds % 60;
	var minutes = fullMinutes % 60;
	var hours = fullHours;

	var clock = document.getElementById("clock");
	clock.innerHTML = hours + ":" + makeNDigits(minutes.toString(), 2) + ":" + makeNDigits(seconds.toString(), 2); // + "." + makeNDigits(milliseconds.toString(), 3);
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
	$("#overlay").toggleClass("visible");
	$("#submitFormPopup").toggleClass("visible");
	$("#flavorText").text("");
    if (!isOpen) {
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
	$("#submitFormSubmitButton").click((e) =>{
		submitFormSubmit();
	});
}

var submitFormSubmit = () =>{
	var prompts = ["But is it a sandwich?", "Free food in March? Only after 7pm on the 5th floor.", "Make CRM great again!", "Santiago brought up Trump, didn't he?", "I can bench 130lbs."]
	$("#flavorText").text(prompts[Math.floor(Math.random() * prompts.length)]);
}
