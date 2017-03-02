<?php

require_once('resultsTable.php');

$query = mysql_query("SELECT MAX(time) FROM Clock");
$row = mysql_fetch_array($query);
$previousTime = intval($row[0]);

echo $previousTime;

mysql_query($sql) or die (); 
mysql_close();

?>