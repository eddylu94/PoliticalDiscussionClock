<?php

require_once('resultsTable.php');

$ip = '' . $_SERVER['REMOTE_ADDR'];

$time = time();

$query = mysql_query("SELECT MAX(time) FROM Clock");
$row = mysql_fetch_array($query);
$previousTime = intval($row[0]);

$period = $time - $previousTime;

$isPresident = $_POST['isPresident'];

$sql = "INSERT INTO Clock (IPAddress, Time, Period, IsPresident)
VALUES ('$ip', '$time', '$period', '$isPresident')";

mysql_query($sql) or die (); 
mysql_close();

header('Location: index.php');

?>