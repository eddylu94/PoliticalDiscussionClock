getTime();
setInterval(getTime, 100);

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