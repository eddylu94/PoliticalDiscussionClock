<?php

require_once('resultsTable.php');

$ip = '' . $_SERVER['REMOTE_ADDR'];

$time = time();

$query = mysql_query("SELECT MAX(time) FROM Clock");
$row = mysql_fetch_array($query);
$previousTime = intval($row[0]);

$period = $time - $previousTime;

$flavourQuestion = $_POST['flavourQuestion'];
$flavourResponse = $_POST['flavourResponse'];

$sql = "INSERT INTO Clock (IPAddress, Time, Period, FlavourQuestion, FlavourResponse)
VALUES ('$ip', '$time', '$period', '$flavourQuestion', '$flavourResponse')";

mysql_query($sql) or die (); 
mysql_close();

header('Location: index.php');

?>