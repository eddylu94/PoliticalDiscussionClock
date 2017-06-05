<?php

require_once('resultsTable.php');  

$query = mysqli_query($link, "SELECT Time, Period, FlavourQuestion, FlavourResponse FROM `Clock` ORDER BY ID DESC LIMIT 15");

while($rows = mysqli_fetch_array($query)) {
    $time = $rows['Time'];
    $period = $rows['Period'];
	
	$question = $rows['FlavourQuestion'];
	$response = $rows['FlavourResponse'];

    $resetDate = date("F j, Y", $time);
    $resetTime = date("G:i:s", $time);

    $timeInSeconds = $period;

	$fullSeconds = $timeInSeconds;
	$fullMinutes = floor($fullSeconds / 60);
	$fullHours = floor($fullMinutes / 60);

	$seconds = $fullSeconds % 60;
	$minutes = $fullMinutes % 60;
	$hours = $fullHours;

	$duration = $hours . ":" . makeNDigits(strval($minutes), 2) . ":" . makeNDigits(strval($seconds), 2);

    echo '<tr><td>' . $resetDate . '</td><td>' . $resetTime . '</td><td>' . $duration . '</td><td>' . $question . '</td><td>' . $response . '</td></tr>';
}

function makeNDigits($value, $n) {
	if (strlen($value) < $n) {
		for ($i = 0; $i < $n - strlen($value); $i++) {
			$value = "0" . $value;
		}
	}
	return $value;
}

mysqli_close($link);

?>