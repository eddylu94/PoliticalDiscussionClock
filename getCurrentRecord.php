<?php

require_once('resultsTable.php');

$query = mysqli_query($link, "SELECT MAX(period) FROM Clock");
$row = mysqli_fetch_array($query);
$currentRecord = intval($row[0]);

echo $currentRecord;

mysqli_query($link, $sql) or die (); 
mysqli_close($link);

?>