<?php

require_once('resultsTable.php');

$query = mysqli_query($link, "SELECT MAX(time) FROM Clock");
$row = mysqli_fetch_array($query);
$previousTime = intval($row[0]);

echo $previousTime;

mysqli_query($link, $sql) or die (); 
mysqli_close($link);

?>