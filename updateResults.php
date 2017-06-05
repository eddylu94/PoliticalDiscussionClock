<?php

require_once('resultsTable.php');

$ip = '' . $_SERVER['REMOTE_ADDR'];

$time = time();

$query = mysqli_query($link, "SELECT MAX(time) FROM Clock");
$row = mysqli_fetch_array($query);
$previousTime = intval($row[0]);

$period = $time - $previousTime;

$flavourQuestion = $_POST['flavourQuestion'];
$flavourResponse = $_POST['flavourResponse'];

$sql = "INSERT INTO Clock (IPAddress, Time, Period, FlavourQuestion, FlavourResponse)
VALUES ('$ip', '$time', '$period', '$flavourQuestion', '$flavourResponse')";

mysqli_query($link, $sql) or die (); 
mysqli_close($link);

header('Location: index.php');

?>