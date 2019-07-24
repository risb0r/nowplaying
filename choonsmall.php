<?php

require('mysqlconf.php');

$query =  mysql_query("SELECT * FROM $table ORDER BY id DESC LIMIT 5");

while( $row = mysql_fetch_array($query) ) {

//This is the output for each track.
echo "<div align=\"center\"><strong>$row[artist]</strong><br />\n";
echo "<small>$row[title]</small><br /></a></div><br />";

}

?>
