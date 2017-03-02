var dataLoaded = false;

getTime();
setInterval(getTime, 100);

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