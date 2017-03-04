<?php

require_once('resultsTable.php');

$query = mysql_query("SELECT MAX(period) FROM Clock");
$row = mysql_fetch_array($query);
$currentRecord = intval($row[0]);

echo $currentRecord;

mysql_query($sql) or die (); 
mysql_close();

?>